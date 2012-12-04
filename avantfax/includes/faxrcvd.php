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
		exit("Usage: ".$_SERVER['argv'][0]." file devID commID error-msg [CIDNumber] [CIDName] [DIDnum]\n");
	}
	
	$debug		= false;
	$tiff_file	= $_SERVER['argv'][1];
	$modemdev	= $_SERVER['argv'][2];
	
	$commID		= ($_SERVER['argc'] >= 4) ? $_SERVER['argv'][3] : "";
	$errormsg	= ($_SERVER['argc'] >= 5) ? $_SERVER['argv'][4] : "";
	
	$CIDNumber	= NULL;
	$CIDName	= NULL;
	$DIDNum		= NULL;
	
	// check if modemdev is configured for use
	$modem		= new FaxModem;
	if (!$modem->load_device($modemdev)) {
		avantfaxlog("faxrcvd> Found unconfigured modem: $modemdev.  Configuring...", true);
		$modem->create($modemdev, $modemdev, NULL);
	}
	
	//
	//	PROCESS TIFF FILE
	//
	// get the sender and pages
	if (file_exists($tiff_file)) {
		$faxinfo = faxinfo($tiff_file);
		if (!$faxinfo) {
			avantfaxlog("faxrcvd> failed: $tiff_file $modemdev corrupted", true);
			exit;
		}
		
		$sender	=	$faxinfo['Sender'];
		$pages	=	$faxinfo['Pages'];
		$date	=	$faxinfo['Received'];
		
		if (array_key_exists("CallID$CALLIDn_CIDNumber", $faxinfo)) {
			if ($faxinfo["CallID$CALLIDn_CIDNumber"] != "<NONE>") {
				$CIDNumber = $faxinfo["CallID$CALLIDn_CIDNumber"];
			}
		}
		
		if (array_key_exists("CallID$CALLIDn_CIDName", $faxinfo)) {
			if ($faxinfo["CallID$CALLIDn_CIDName"] != "<NONE>") {
				$CIDName = $faxinfo["CallID$CALLIDn_CIDName"];
			}
		}

		if (array_key_exists("CallID$CALLIDn_DIDNum", $faxinfo)) {
			if ($faxinfo["CallID$CALLIDn_DIDNum"] != "<NONE>") {
				$DIDNum = $faxinfo["CallID$CALLIDn_DIDNum"];
			}
		}
	} else {
		avantfaxlog("faxrcvd> failed: $tiff_file not found", true);
		exit;
	}
	
	$company_name	= ($CIDName)	? $CIDName		: $sender;
	$company_fax	= ($CIDNumber)	? $CIDNumber	: $sender;
	
	avantfaxlog("faxrcvd> executing: $tiff_file $modemdev '$commID' '$errormsg' CIDNum: '$CIDNumber' CIDName: '$CIDName' DID: '$DIDNum'", true);
	avantfaxlog("faxrcvd> PROCESSING FAX from '$company_fax' ($pages pages) received '$date'", true);
	
	//
	//	CREATE THUMBNAILS AND PDF
	//
	// preprare directory by year, month, day, fax number, hourminsec
	list($day, $hour) = explode(" ", $date);
	$day		= preg_replace("/:/", DIRECTORY_SEPARATOR, $day);
	$chour		= $hour;
	$hylfaxid	= str_replace("recvq/fax", "", $tiff_file);
	$hylfaxid	= str_replace(".tif", "", $hylfaxid);
	$cpfax		= preg_replace("/\+/", "", clean_faxnum($company_fax));
	$faxpath	= $ARCHIVE.DIRECTORY_SEPARATOR.$day.DIRECTORY_SEPARATOR.$cpfax.DIRECTORY_SEPARATOR.$hylfaxid;

	// create the directories
	mkdirs($faxpath);
	
	$faxfile	= $faxpath.DIRECTORY_SEPARATOR.TIFFNAME;
	$pdffile	= $faxpath.DIRECTORY_SEPARATOR.PDFNAME;
	$thumbnail	= $faxpath.DIRECTORY_SEPARATOR.THUMBNAIL;

	// copy tiff file to new location
	$tiff_prog	= ($TIFF_TO_G4) ? $TIFFCPG4 : $TIFFCP;
	
	// if fax failed to copy
	if (system_v("$tiff_prog $tiff_file $faxfile") != 0) {
		avantfaxlog("faxrcvd> Failed to copy $tiff_file to $faxfile", true);
		exit;
	}
	
	echo "Create PDF\n";
	
	// create pdf in new dir
	tiff2pdf($faxfile, $pdffile);
	
	echo "Create Thumbnails\n";
	
	static_preview($faxpath, $pages);
	
	//
	//	ADDRESSBOOK
	//
	$addressbook	= new AFAddressBook;
	// lookup database entry for this fax number
	if ($addressbook->loadbyfaxnum($company_fax, $mult)) {
		if ($mult) {
			$faxnumid = 0;
			echo "WARNING: Multiple results for faxnumber\n";
		} else {
			$faxnumid = $addressbook->get_faxnumid();
			$addressbook->inc_faxfrom();
		}
	} else { // if it doesn't exist, create it
		echo $addressbook->get_error()."\n";
		
		if ($addressbook->create($company_name)) {
			$addressbook->inc_faxfrom();
			avantfaxlog("faxrcvd> Created company '$company_name'", true);
			
			if ($addressbook->create_faxnumid($company_fax)) {
				$faxnumid = $addressbook->get_faxnumid();
				$addressbook->inc_faxfrom();
				avantfaxlog("faxrcvd> Created fax number '$company_fax'", true);
			} else {
				$faxnumid = 0;
				avantfaxlog("faxrcvd> Couldn't create faxnumid".$addressbook->get_error(), true);
			}
		} elseif ($addressbook->get_error() == $LANG['COMPANY_EXISTS']) { // Company already exists, so create a new fax number
			if ($addressbook->loadbycid($addressbook->get_companyid())) {
				if ($addressbook->create_faxnumid($company_fax)) {
					$faxnumid = $addressbook->get_faxnumid();
					$addressbook->inc_faxfrom();
					avantfaxlog("faxrcvd> Created new fax number '$company_fax' for company '$company_name'", true);
				} else {
					$faxnumid = 0;
					avantfaxlog("faxrcvd> Failed to create new fax number '$company_fax' for company '$company_name'", true);
				}
			}
		} else {
			avantfaxlog("faxrcvd> FAILED to create company '$company_fax' - ".$addressbook->get_error(), true);
			$faxnumid = 0;
		}
	}

	//
	//	LOAD DID/DTMF Routing info
	//
	$didr_id	= 0;
	if ($ENABLE_DID_ROUTING) {
		$didr		= new DIDRouting;
		$didr_id	= ($didr->load_route($DIDNum)) ? $didr->get_didr_id() : 0;
		
		if ($didr_id) {
			echo "Found DID for ".$didr->get_alias() . "\n";
		} elseif ($DIDNum && $AUTOCONFDID) {
			avantfaxlog("faxrcvd> configuring DID '$DIDNum'", true);
			if ($didr->create($DIDNum, $DIDNum, NULL)) {
				$didr_id = $didr->get_didr_id();
			}
		}
	}
	
	//
	//	ADD FAX TO ARCHIVE
	//
	$inbox	= new ArchiveIn;
	$faxid	= NULL;
	// create entry for fax in database
	if ($inbox->create($faxpath, $faxnumid, $company_fax, $modemdev, $pages, "$day $chour", $didr_id)) {
		$faxid = $inbox->get_fid();
		avantfaxlog("faxrcvd> Inserted $faxpath from $company_name to Inbox", true);
	} else {
		avantfaxlog("faxrcvd> FAILED to insert $faxpath from $company_name to Inbox - ".$inbox->get_error(), true);
	}
	
	//
	//	PROCESS FAX ANNOTATION
	//
	if (ENABLE_FAX_ANNOTATION) {
		$ann_pdf = annotate_fax($faxfile, "FaxID: $faxid");
		rename($ann_pdf, $pdffile);
	}
	
	//
	//	PROCESS ROUTING PRIORITIES
	//	From lowest to highest: DID/Modem, Fax2Email, Barcode
	//
	$barcode			= new BarcodeRouting;
	$printer			= $PRINTERNAME;
	$printer_type		= "SYS";
	$email_recipient	= NULL;
	$email_type			= NULL;
	$faxcatid			= NULL;
	$category_type		= NULL;
	
	// if in Modem mode
	if (!$ENABLE_DID_ROUTING) {
		// fax category
		if ($test_faxcatid = $modem->get_faxcatid()) {
			$faxcatid = $test_faxcatid;
			$category_type = "MODEM";
		}
		
		// printer
		if ($test_printer = $modem->get_printer()) {
			$printer = $test_printer;
			$printer_type = "MODEM";
		}
		
		// email
		if ($test_email = $modem->get_contact()) {
			$email_recipient = $test_email;
			$email_type = "MODEM";
		}
	} elseif ($didr_id) { // in DID/DTMF mode
		// fax category
		if ($test_faxcatid = $didr->get_faxcatid()) {
			$faxcatid = $test_faxcatid;
			$category_type = "DID";
		}
		
		// printer
		if ($test_printer = $didr->get_printer()) {
			$printer = $test_printer;
			$printer_type = "DID";
		}
		
		// email
		if ($test_email = $didr->get_contact()) {
			$email_recipient = $test_email;
			$email_type = "DID";
		}
	}
	
	// check Fax2Email category
	if ($test_faxcatid = $addressbook->get_category()) {
		$faxcatid = $test_faxcatid;
		$category_type = "Fax2Email";
	}
	
	// check Fax2Email printer
	if ($test_printer = $addressbook->get_printer()) {
		$printer = $test_printer;
		$printer_type = "Fax2Email";
	}
	
	// check Fax2Email email
	if ($test_email = $addressbook->get_email()) {
		$email_recipient = $test_email;
		$email_type		= "Fax2Email";
	}
	
	// check Barcode rules
	if ($bardecode = bardecode($faxfile)) {
		$inbox->set_note($bardecode, NULL, NULL);
		// fax category
		if ($barcode->load_route($bardecode)) {
			if ($test_faxcatid = $barcode->get_faxcatid()) {
				$faxcatid = $test_faxcatid;
				$category_type = "BARCODE";
			}
			
			// printer
			if ($test_printer = $barcode->get_printer()) {
				$printer		= $test_printer;
				$printer_type	= "BARCODE";
			}
			
			// email
			if ($test_email = $barcode->get_contact()) {
				$email_recipient = $test_email;
				$email_type = "BARCODE";
			}
		}
	}

	// OCR Data
	if ($ocr_data = ocr_faxcontent ($faxfile)) {
		$inbox->set_faxcontent ($ocr_data);
	}
	
	//
	//	SET FAX CATEGORY
	//
	if ($faxcatid) {
		echo "Setting $category_type category id $faxcatid\n";
		$inbox->set_category($faxcatid);
	}	
	
	//
	//	SEND EMAIL
	//
	$company = $addressbook->get_company();
	if (!$company) $company = $company_name;
	
	$from		= get_admin_email();
	$subject	= "fax: $company " . strftime(EMAIL_DATE_FORMAT);
	$text		= "${LANG['FROM']}: $company";
	
	if ($desc = $addressbook->get_description()) {
		$text .= " ($desc)\n";
	}
	
	$text	.= "\nfax id: $faxid\n${LANG['PN_PAGES']}: $pages\n";
	
	$thumb	= ($FAXRCVD_INCLUDE_THUMBNAIL) ? $thumbnail : NULL;
	$addpdf = ($FAXRCVD_INCLUDE_PDF) ? $pdffile : NULL;
	
	if ($email_recipient) {
		if ($email_type == "Fax2Email") {
			if ($ARCHIVEFAX2EMAIL) {
				echo "Archiving fax\n";
				$inbox->set_archivebox($faxid);
			}
		}
		
		if (send_mail($email_recipient, $from, $subject, $text, $addpdf, NULL, $thumb)) {
			avantfaxlog("faxrcvd> Fax sent to $email_type contact $email_recipient", true);
		}
	}
	
	//
	//	PRINTING SUPPORT
	//
	if ($PRINTFAXRCVD == true) {
		avantfaxlog("faxrcvd> Sending fax to $printer_type printer $printer", true);
		if ($FAXRCVD_PRINT_PDF) {
			$printerArg = ($printer) ? "-P ".escapeshellcmd($printer) : NULL;
			$cmd = $PDFPRINTCMD." $printerArg ".escapeshellarg($pdffile);
		} else {
			$cmd = sprintf($PRINTFAXCMD, escapeshellarg($tiff_file), ($printer) ? "-P ".escapeshellcmd($printer) : NULL);
		}
		
		system_v($cmd);
		avantfaxlog($cmd);
		
		if ($printer_type == "Fax2Email") {
			if ($ARCHIVEFAX2EMAIL) {
				echo "Archiving fax\n";
				$inbox->set_archivebox($faxid);
			}
		}
	}
	exit;
