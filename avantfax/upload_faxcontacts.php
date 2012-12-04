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
	
	$message		= NULL;
	$error			= NULL;
	$numcontacts	= 0;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('upload');
	$formdata->newRule('catid', NULL, FR_NUMBER);
	$formdata->newRule('MAX_FILE_SIZE');
	$formdata->newRule('_submit_check');
	
	$fupload = new FileUpload;
	$fupload->limit_mimetype(array('text/x-vcard', 'application/x-awk', 'text/plain'));
	
	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('_submit_check', $_POST)) {
		$formdata->processForm($_POST);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}

		/******************************************************************************************************************************
			UPLOAD FILES
		 ******************************************************************************************************************************/
		foreach ($_FILES as $file) {
			if (array_key_exists('size', $file)) {
				if ($file['size']) {
					if ($fupload->load_file($file)) {
						// get email addresses into array
						// - load file into array
						$vcf = file($fupload->get_tempname());
						
						$name	= NULL;
						$fax	= NULL;
						$work	= NULL;
						$org	= NULL;
						
						foreach ($vcf as $line) {
							// - search for FN:David Mimms
							if (strstr($line, "FN:")) {
								$name = parse_entry($line);
							}
							
							// - search for ORG:iFAX Solutions, Inc;
							if (strstr($line, "ORG:")) {
								$org  = str_replace(";", '', parse_entry($line));
							}
							
							// THIS ONE IS TRICKY BECAUSE IT COULD COME BEFORE OR AFTER FAX
							// AND THEREFORE BEING ADDED TO AN INCORRECT ENTRY
							// - search for WORK:+12125558001
							/*if(strstr($line, "WORK:")) {
								$work = str_replace(";", '', parse_entry($line));
							}*/
							
							// - search for "EMAIL;" in EMAIL;INTERNET;WORK:david@avant-fax.com
							if (strstr($line, "EMAIL;")) {
								$email = parse_entry($line);
								
							//	$numcontacts++;
								$emailbook	= new AFAddressBook;
								$emailbook->create_contact($name, $email);
							}
							
							// - search for "FAX:" in TEL;HOME;FAX:+12125558000
							if (strstr($line, "FAX:")) {
								$fax = parse_entry($line);
								
								if (!$org) $org = $name;
								
								$addressbook	= new AFAddressBook;
								if ($addressbook->create($org)) {
									$org = NULL;
									$numcontacts++;
									if ($addressbook->create_faxnumid($fax)) {
										$addressbook->save_settings(array('description' => NULL, 'faxcatid' => $formdata->catid, 'to_person' => $name,
																		'to_location' => NULL, 'to_voicenumber' => $work));
									}
								}
							}
						}
					} else {
						$error .= "<li>vCard file problem: ".$fupload->get_error()." '".$fupload->get_mimetype()."'</li>";
					}
				}
			}
		}
		
		if (!$error)
			$message = sprintf($LANG['CONTACTS_UPLOADED'], $numcontacts);
	}
	
	function parse_entry($val) {
		// - explode at colon :
		list($j, $m) = explode(':', $val);
		$m = str_replace("\r", '', $m);
		$m = str_replace("\n", '', $m);
		return $m;
	}

	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('error',					$error);
	$usmarty->assign('create',					true);
	$usmarty->assign('message',					$message);
	display_template('addressbook_edit.tpl',	$usmarty);
