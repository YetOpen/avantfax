#!/usr/bin/php
<?php
/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 * PHP 5 only
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

	require_once 'classes.php';

	// check for proper arguments
	if ($_SERVER['argc'] < 3) {
		exit("Usage: ".$_SERVER['argv'][0]." qfile why jobtime [nextTry]\n");
	}
	
	$debug		= false;
	$quiet		= true;
	
	$qfile		= $_SERVER['argv'][1];
	$why		= $_SERVER['argv'][2];
	$jobtime	= ($_SERVER['argc'] >= 4) ? $_SERVER['argv'][3] : NULL;
	$nextTry	= ($_SERVER['argc'] >= 5) ? $_SERVER['argv'][4] : NULL;

	// open qfile for sender information
	if (!file_exists($qfile)) { exit("$qfile doesn't exist\n"); }
	
	avantfaxlog("notify> Executing: $qfile $why $jobtime $nextTry (${_SERVER['argc']})", true);
	
	// parse "why" argument
	$faxdone	= false;
	$fatal		= false;
	$alert		= false;
	
	switch ($why) {
		case "done":
			$faxdone = true;
			break;
		case "blocked":
		case "requeued":
			$alert = true; // retries
			break;
		case "format_failed":
		case "no_formatter":
		case "poll_no_document":
		case "killed":
		case "rejected":
		case "removed":
		case "timedout":
		case "poll_rejected":
		case "poll_failed":
		default:
			$fatal = true;
			break;
	}
	
	$file_data		= file($qfile);
	$faxfiles		= array();
	$file_cnt		= 0;
	
	// parse for totpages, external (phone number), mailaddr, groupid, to_location, to_voice, to_person, to_company, regarding, owner (username), and the various fax files
	foreach ($file_data as $line) {
		$line		= trim($line);
		$line_info	= explode(":", $line);

		if ($line_info[0] == "totpages") {			// total pages
			$totpages = $line_info[1];
			echo "$line_info[0]: $totpages\n";
		} elseif ($line_info[0] == "status") {
			$status = $line_info[1];
			echo "$line_info[0]: $status\n";
		} elseif ($line_info[0] == "external") {	// the fax number
			$external = clean_faxnum($line_info[1]);
			echo "$line_info[0]: $external\n";
		} elseif ($line_info[0] == "jobid") {		// HylaFAX jobid
			$jobid = $line_info[1];
			echo "$line_info[0]: $jobid\n";
		} elseif ($line_info[0] == "mailaddr") {	// the mailaddr
			$mailaddr = $line_info[1];
			echo "$line_info[0]: $mailaddr\n";
		} elseif ($line_info[0] == "groupid") {		// gets the groupid
			$groupid = $line_info[1];
			echo "$line_info[0]: $groupid\n";
		} elseif ($line_info[0] == "location") {	// gets the to_location
			$to_location = (isset($line_info[1])) ? $line_info[1] : NULL;
			echo "$line_info[0]: $to_location\n";
		} elseif ($line_info[0] == "voice") {		// gets the to_voice number
			$to_voice = (isset($line_info[1])) ? $line_info[1] : NULL;
			echo "$line_info[0]: $to_voice\n";
		} elseif ($line_info[0] == "receiver") {	// gets the to_person
			$to_person = (isset($line_info[1])) ? $line_info[1] : NULL;
			echo "$line_info[0]: $to_person\n";
		} elseif ($line_info[0] == "company") {		// gets the to_company
			$to_company = (isset($line_info[1])) ? $line_info[1] : NULL;
			echo "$line_info[0]: $to_company\n";
		} elseif ($line_info[0] == "regarding") {	// gets the RE: text
			$regarding = (isset($line_info[1])) ? $line_info[1] : NULL;
			echo "$line_info[0]: $regarding\n";
		} elseif ($line_info[0] == "owner") {		// the sender's username
			$owner = strtolower ($line_info[1]);
			echo "$line_info[0]: $owner\n";
		} elseif (preg_match("/postscript/", $line_info[0]) || preg_match("/pdf/", $line_info[0]) || preg_match("/tiff/", $line_info[0])) {
			echo "Found file: $line_info[3]\n";
			if (!preg_match("/\;/", $line_info[3])) {
				$faxfiles[$file_cnt] = $line_info[3];
				$file_cnt++;
			}
		}
	}

	if (!$to_company) {
		$to_company = $external;
	}

	$addressbook	= new AFAddressBook;
	// lookup database entry for this fax number
	if ($addressbook->loadbyfaxnum($external, $mult)) {
		if ($mult) {
			$cid = 0;
			avantfaxlog("notify> Found fax number with multiple companies", true);
		} else {
			$cid = $addressbook->get_companyid();
			$addressbook->inc_faxto(); // increment faxto count
		}
	} else { // if it doesn't exist, create it
		if ($addressbook->create($to_company)) {
			if ($addressbook->create_faxnumid($external)) {
				// set to_location, to_voice, to_person
				$addressbook->save_settings(array('description' => NULL, 'faxcatid' => NULL, 'to_person' => $to_person, 'to_location' => $to_location, 'to_voicenumber' => $to_voice));
				
				$cid = $addressbook->get_companyid();
				$addressbook->inc_faxto(); // increment faxto count
				avantfaxlog("notify> Created company '$external' with cid '$cid'", true);
			} else {
				$cid = 0;
				avantfaxlog("notify> FAILED to create faxnumid for '$external' - ".$addressbook->get_error(), true);
			}
		} else {
			avantfaxlog("notify> FAILED to create company '$external' - ".$addressbook->get_error(), true);
			$cid = 0;
		}
	}
	
	// admin's email address
	$from		= get_admin_email();
	
	// get user info (email address, userid)
	$user		= new AFUserAccount;
	$user_id	= 0;
	
	// lookup username for email address in mailaddr
	if ($owner === $FAXMAILUSER || $owner === $WWWUSER) {
		if ($user->loadbyemail($mailaddr)) {
			$owner	= $user->username;
			$to		= $user->email;
			$user_id = $user->get_uid();
			@include "lang/".$user->language.".php";
		} else {
			$to		= $mailaddr; // couldn't load username, use mailaddr
			avantfaxlog("notify> Failed to load account for email '$mailaddr' - ".$user->get_error(), true);
		}
	} else {
		if (!$user->load_username($owner)) {
			$to = $mailaddr; // couldn't load username, use $mailaddr
			avantfaxlog("notify> Failed to load account name '$owner' - ".$user->get_error(), true);
		} else {
			$to = $user->email;
			$user_id = $user->get_uid();
			@include "langs/".$user->language.".php";
		}
	}
	
	if ($company = $addressbook->get_company()) {} else { $company = $external; }
	
	// send confirmation email the fax to sender
	$subject	= "fax: $company " . strftime(EMAIL_DATE_FORMAT);
	$text		= "${LANG['TO']}: $company";
	
	if ($desc = $addressbook->get_description()) $text .= " ($desc)";
	if (!empty($regarding)) $text .= "\nRe: $regarding\n";

	// if fatal, notify sender
	if ($fatal) {
		$subject	= $LANG['FAX_WHY'][$why]." $subject";
		$text		= $LANG['FAX_FAILED'].": ".$LANG['FAX_WHY'][$why]." $status\n\n$text";
		
		// create the temp directory
		$faxpath	= $TMPDIR.date("Y-m-d-").$external."-".date("His")."-".$jobid;
		mkdirs($faxpath);
		
		// create pdf out of ps and tiff files
		if (convert2pdf($faxpath, $faxfiles)) {
			echo "Emailing pdf file to $to\n";
			$pdf_file = $faxpath.'/'.PDFNAME;
			send_mail($to, $from, $subject, $text, $pdf_file, $external.".pdf");
			unlink($pdf_file);
			rmdir($faxpath);
		} else {
			avantfaxlog("notify> FAILED to create PDF for failed fax", true);
			send_mail($to, $from, $subject, $text."\nFAILED to create PDF for failed fax");
		}
		exit;
	}
	
	// if alert, notify sender
	if ($alert) {
		$subject	= "Fax $groupid ".$LANG['TO']." $external ".$LANG['FAX_WHY'][$why];
		$text		= $LANG['FAX_WHY'][$why]." $status\n\n$text";
		if ($nextTry)
			$text	.= "\nFAX --> $nextTry";
		send_mail($to, $from, $subject, $text);
		exit;
	}
	
	// only if faxdone, create pdf file and db entry
	if (!$faxdone) exit;
	
	// preprare directory by year, month, day, fax number, hourminsec
	$faxpath	= $ARCHIVE_SENT.date(DIRECTORY_SEPARATOR."Y".DIRECTORY_SEPARATOR."m".DIRECTORY_SEPARATOR."d".DIRECTORY_SEPARATOR).$external.DIRECTORY_SEPARATOR.date("His").DIRECTORY_SEPARATOR.$jobid;
	// create the directories
	mkdirs($faxpath);

	// create pdf out of ps and tiff files
	if (convert2pdf($faxpath, $faxfiles)) {
		$pdf_file	= $faxpath.DIRECTORY_SEPARATOR.PDFNAME;
		$thumbnail	= $faxpath.DIRECTORY_SEPARATOR.THUMBNAIL;
		
		// create thumbnail of fax
		pdf_preview($faxpath);
	
		// create entry for fax in database
		$outbox		= new ArchiveOut;
		if ($outbox->create($faxpath, $user_id, $cid, $external, $totpages)) {
			$text	.= "\nFax ID: ".$outbox->get_fid()."\n${LANG['PN_PAGES']}: $totpages\n";
			if (isset($regarding)) {
				$regarding = decode_entity($regarding);
				$outbox->set_note($regarding, NULL, $user_id);
			}
		} else {
			avantfaxlog("notify> FAILED to add Sent fax '$faxpath' to ArchiveOut", true);
		}
	
		if ($NOTIFY_ON_SUCCESS) {
			// send the email to the contact
			send_mail($to, $from, $subject, "Fax: OK\n\n".$text, ($NOTIFY_INCLUDE_PDF) ? $pdf_file : NULL,
						($NOTIFY_INCLUDE_PDF) ? $external.'.pdf' : NULL,
						($NOTIFY_INCLUDE_PDF) ? NULL : $thumbnail);
			avantfaxlog("notify> Notification email sent to $to", true);
		} else {
			avantfaxlog("notify> Skipping notification email to $to as per config setting NOTIFY_ON_SUCCESS", true);
		}
	} else {
		avantfaxlog("notify> FAILED to create PDF for Archive", true);
		// send the email to the contact
		send_mail($to, $from, $subject, "Fax: OK\nFailed to create PDF for Archive:-(\n\n".$text);
	}
	
	echo "Done\n";
	exit;
