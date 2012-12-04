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

	require_once 'check_login.php';
	
	if (!isset($_REQUEST['fid'])) {
		header("Location: sendfax.php");
	}

	$addressbook	= new AFAddressBook;
	$fid			= $_REQUEST['fid'];
	$debug			= false;
	$error			= NULL;
	$results		= NULL;
	$message		= NULL;
	$fax_data		= array();
	$modeminst		= new FaxModem;
	
	$modems			= ($_SESSION[USERSESSION]->superuser) ? $modeminst->get_modems() : $_SESSION[USERSESSION]->get_modemdevs();
	$modem_list		= ($_SESSION[USERSESSION]->any_modem) ? array('any' => "") : array();
	$first_modem	= ($_SESSION[USERSESSION]->any_modem) ? "any" : NULL;
	
	if (is_array($modems)) {
		foreach ($modems as $device) {
			if ($modeminst->load_device($device)) {
				if (!$first_modem && !$_SESSION[USERSESSION]->any_modem) $first_modem = $device;
				$modem_list[$device] = $modeminst->get_alias();
			}
		}
	}
	
	/******************************************************************************************************************************
			SETUP COVER PAGES
	 ******************************************************************************************************************************/
	$coverinst		= new Covers;
	$covers			= $coverinst->get_covers();
	$cover_list		= array();
	$first_cover	= NULL;
	$selected_cover	= NULL;

	if (is_array($covers)) {
		foreach ($covers as $cover) {
			if ($coverinst->load_cover($cover)) {
				if (!$first_cover) $first_cover = $cover;
				if ($_SESSION[USERSESSION]->coverpage_id == $coverinst->get_cover_id()) {
					$selected_cover = $cover;
				}
				$cover_list[$cover] = $coverinst->get_title();
			}
		}
	}
	
	// lookup sender and PDF file path in db
	$archive = new FaxPDFArchive;
	
	if (!$archive->load_fax($fid)) {
		header("Location: sendfax.php");
		exit;
	}
	
	if (!$_SESSION[USERSESSION]->superuser) {
		if (!$archive->user_has_rights($_SESSION[USERSESSION]->uid, $_SESSION[USERSESSION]->get_modemdevs (),
										$_SESSION[USERSESSION]->get_didrouting(), $_SESSION[USERSESSION]->get_faxcats())) {
			header("Location: sendfax.php");
			exit;
		}
	}
	
	$faxpdf	= $archive->get_pdfpath();
	$fnid	= $archive->get_faxnumid();
	
	if ($fnid) {
		$addressbook->loadbyfaxnumid($fnid);
		$faxnum = $addressbook->get_faxnumber();
	} else {
		$faxnum = $archive->get_origfaxnum();
		if ($addressbook->loadbyfaxnum($faxnum, $mult)) {
			$fnid = $addressbook->get_faxnumid();
		}
	}
	
	// if there aren't any numbers in the faxnumber or if it's a reserved number, make it blank
	if (!$grep_function("/[0-9]/", $faxnum) || $faxnum == $RESERVED_FAX_NUM) $faxnum = "";
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('fid', $fid, FR_NUMBER);
	$formdata->newRule('destinations');
	$formdata->newRule('coverpage');
	$formdata->newRule('whichcover', $selected_cover);
	$formdata->newRule('regarding');
	$formdata->newRule('to_person');
	$formdata->newRule('to_company');
	$formdata->newRule('to_location');
	$formdata->newRule('to_voicenumber');
	$formdata->newRule('comments');
	$formdata->newRule('user_tsi', $_SESSION[USERSESSION]->user_tsi);
	$formdata->newRule('modem', $first_modem, FR_STRING, 0, 0, $LANG['NO_MODEMS_CONFIGURED'], true);
	$formdata->newRule('priority');
	$formdata->newRule('sendtime');
	$formdata->newRule('sendtimeHour');
	$formdata->newRule('sendtimeMin');
	$formdata->newRule('killtime');
	$formdata->newRule('numtries');
	$formdata->newRule('notify_requeue');
	$formdata->newRule('sendtime_unit');
	$formdata->newRule('killtime_unit');
	$formdata->newRule('MAX_FILE_SIZE');
	$formdata->newRule('_submit_check');
	
	/******************************************************************************************************************************
			SETUP FILE UPLOAD
	 ******************************************************************************************************************************/
	$fupload = new FileUpload;
	$fupload->limit_mimetype(array('application/pdf', 'application/postscript', 'image/tiff', 'text/plain'));
	$fax_data['files'] = array();
	
	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('_submit_check', $_POST)) {
		$formdata->processForm($_POST);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
		
		$fax_data['files'][] = $INSTALLDIR.$faxpdf; // PDF FAX FILE
		
		/******************************************************************************************************************************
			UPLOAD FILES
		 ******************************************************************************************************************************/
		foreach ($_FILES as $file) {
			if (array_key_exists('size', $file)) {
				if ($file['size']) {
					if ($fupload->load_file($file)) {
						$filepath = $TMPDIR.$fupload->set_randname();
						$fupload->movefile($TMPDIR);		// move the file to avantfax/tmp
						chmod($filepath, 0666);
						$fax_data['files'][] = $filepath;	// add to fax list
					} else {
						$error = fupload_error_code($fupload->get_error())." (".$fupload->get_mimetype().")";
					}
				}
			}
		}
		
		$first_dest = NULL;
		
		// check that destinations is not blank
		if ($formdata->destinations) {
			// remove duplicates
			$destinations = explode(";", trim($formdata->destinations));
			
			if (!empty($destinations[1])) {					// MULTIPLE DESTINATIONS
				$filedests = $TMPDIR.genpasswd();
				$handle = fopen($filedests, "w");
				foreach ($destinations as $dests) {
					$dests = preg_replace("/[^\w,#*@\ \"]/", "", $dests);
					$dests = str_replace("\r", "", $dests);
					$dests = str_replace("\n", "", $dests);
					fwrite($handle, $dests."\n");
					
					if (!$first_dest) $first_dest = $dests;
				}
				fclose($handle);
				chmod($filedests, 0666);
				$destfile = " -z $filedests";
			} else {											// SINGLE DESTINATION
				$destinations = str_replace(";", "", $formdata->destinations);
				$destinations = str_replace(" ", "", $destinations);
				$destinations = str_replace("\r", "", $destinations);
				$destinations = str_replace("\n", "", $destinations);
				$dial = (!empty($formdata->to_person)) ? "\"".$formdata->to_person."\"@": "";
				$dial .= escapeshellarg($destinations);
				$destfile = " -d $dial";
				$first_dest = escapeshellarg($destinations);
			}
		}
		
		// select which outgoing modem to use
		$outgoing_modem	= (count($modems) == 1) ? $modems[0] : '';
		$use_modem			= '';
		
		if ($formdata->modem != "any") {
			$use_modem			= ' -h ';
			$use_modem			.= ($formdata->modem) ? $formdata->modem : $outgoing_modem;
			$use_modem			.= '@localhost';
		}
		
		$fax_data['modem']					= $use_modem;
		$fax_data['destinations']			= $destfile;
		$fax_data['first_dest']				= $first_dest;
		
		$fax_data['from_person']			= escapeshellarg($_SESSION[USERSESSION]->name);
		$fax_data['from_company']			= escapeshellarg($_SESSION[USERSESSION]->from_company);
		$fax_data['from_location']			= escapeshellarg($_SESSION[USERSESSION]->from_location);
		$fax_data['from_voicenumber']		= escapeshellarg($_SESSION[USERSESSION]->from_voicenumber);
		$fax_data['from_faxnumber']			= escapeshellarg($_SESSION[USERSESSION]->from_faxnumber);
		
		// check coverpage elements
		$fax_data['coverpage']				= $formdata->coverpage;
		$fax_data['whichcover']				= $formdata->whichcover;
		$fax_data['notify_requeue']			= $formdata->notify_requeue;
		$fax_data['to_person']				= escapeshellarg($formdata->to_person);
		$fax_data['to_location']			= escapeshellarg($formdata->to_location);
		$fax_data['to_voicenumber']			= escapeshellarg($formdata->to_voicenumber);
		$fax_data['tsi']					= escapeshellarg(decode_entity($formdata->user_tsi));
		
		$comments							= ($formdata->comments) ? ' -c '.escapeshellarg($formdata->comments) : NULL;
		$fax_data['comments']				= preg_replace("/\!/", "&#33;", $comments); // swap with it's htmlentity
		
		$fax_data['to_company']				= escapeshellarg($formdata->to_company);
		$fax_data['regarding']				= escapeshellarg($formdata->regarding);
		
		$fax_data['user']					= '-o '.escapeshellarg($_SESSION[USERSESSION]->username);
		$fax_data['from']					= '-f '.escapeshellarg($_SESSION[USERSESSION]->email);
		
		$fax_data['priority']				= ($formdata->priority != '*') ? $formdata->priority : NULL;
		$fax_data['numtries']				= ($formdata->numtries) ? $formdata->numtries : NULL;
		$fax_data['killtime']				= ($formdata->killtime) ? "now + ".$formdata->killtime." ".$formdata->killtime_unit : NULL;
		$fax_data['sendtime']				= ($formdata->sendtime && $formdata->sendtimeHour && $formdata->sendtimeMin) ? $formdata->sendtimeHour.":".$formdata->sendtimeMin : NULL;
		
		if (!$error && ($formdata->coverpage || count($fax_data['files']))) {
			$results = submit_fax($fax_data);
			
			if (is_array($results)) {
				$message = $LANG['FAX_SUBMITTED'];
			} else {
				$message = $LANG['FAX_FAILED']."<br />sendfax: $results";
			}
		}
	}

	$INC_LIST = "<script language=\"javascript\" type=\"text/javascript\" src=\"js/ajaxbook.js\"></script>
<script language=\"javascript\" type=\"text/javascript\" src=\"js/faxcontacts.js\"></script>
<script language=\"javascript\" type=\"text/javascript\" src=\"js/sendfax_coverpage.js\"></script>
<script language=\"javascript\" type=\"text/javascript\" src=\"js/multifile_upload.js\"></script>";

	$priority_list = array('*' => "");
	for ($i = 0; $i < 255; $i+=10) $priority_list["$i"] = $i;
	
	$units = array('minutes' => $LANG['MINUTES'], 'hours' => $LANG['HOURS'], 'days' => $LANG['DAYS']);
	$unitHours = array();
	$unitMins = array();
	
	for ($i = 0; $i < 24; $i++) {
		$cnt = $i;
		
		if ($cnt < 10) {
			$cnt = "0$cnt";
		}
		
		$unitHours["$cnt"] = "$cnt";
	}
	
	for ($i = 0; $i < 60; $i++) {
		$cnt = $i;
		
		if ($cnt < 10) {
			$cnt = "0$cnt";
		}
		
		$unitMins["$cnt"] = "$cnt";
	}

	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('message',			$message);
	$usmarty->assign('error',			$error);
	$usmarty->assign('results',			$results);
	$usmarty->assign('modem_list',		$modem_list);
	$usmarty->assign('cover_list',		$cover_list);
	$usmarty->assign('priority_list',	$priority_list);
	$usmarty->assign('units',			$units);
	$usmarty->assign('unitHours',		$unitHours);
	$usmarty->assign('unitMins',		$unitMins);
	$usmarty->assign('INC_LIST',		$INC_LIST);
	$usmarty->assign('fvalues',			$formdata->htmlReady());
	$usmarty->assign('fnid',			$archive->get_faxnumid());
	$usmarty->assign('faxnum',			$faxnum);
	$usmarty->assign('faxpdf',			$faxpdf);
	$usmarty->assign('thumbnail',		$archive->get_thumbnail());
	display_template('refax.tpl',		$usmarty);
