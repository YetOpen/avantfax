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
	
	$message	= NULL;
	$error		= NULL;
	
	$fax = new FaxPDFArchive;
	if (!$fax->load_fax($_REQUEST['fid'])) {	// they still have to fill out the email
		header("Location: inbox.php");			// invalid fid
		exit;
	}
	
	if (!$_SESSION[USERSESSION]->superuser) {
		if (!$fax->user_has_rights($_SESSION[USERSESSION]->uid, $_SESSION[USERSESSION]->get_modemdevs(),
			$_SESSION[USERSESSION]->get_didrouting(), $_SESSION[USERSESSION]->get_faxcats())) {
			header("Location: inbox.php");
			exit;
		}
	}
	
	$addressbook	= new AFAddressBook;
	if ($addressbook->loadbyfaxnumid($fax->get_faxnumid())) {
		$company_name = $addressbook->get_company();
	} elseif ($addressbook->loadbycid($fax->get_companyid())) {
		$company_name = $addressbook->get_company();
	} else {
		$company_name = $fax->get_origfaxnum();
	}
	
	$altname = "fax-$company_name.pdf"; //-".$fax->get_archstamp()."
	$altname = str_replace(":", "", $altname);
	$altname = str_replace(" ", "-", $altname);
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('emails', NULL, FR_STRING, 0, 0, $LANG['REGWARN_MAIL'], true);
	$formdata->newRule('cc_emails');
	$formdata->newRule('bcc_emails');
	$formdata->newRule('subject', decode_entity($company_name));
	$formdata->newRule('filename', decode_entity($altname));
	$formdata->newRule('msg', "\n\n\n".$_SESSION[USERSESSION]->email_sig);
	$formdata->newRule('category', NULL, FR_NUMBER);
	$formdata->newRule('archive', NULL, FR_NUMBER);
	$formdata->newRule('fid', $_REQUEST['fid'], FR_NUMBER);
	$formdata->newRule('url', $_SERVER["HTTP_REFERER"]);
	$formdata->newRule('_submit_check');

	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('_submit_check', $_POST)) {
		$formdata->processForm($_POST);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
		
		if (isset($formdata->cancel)) {
			header("Location: ".$formdata->url);
			exit;
		}
		
		if (!$error) {
			if (!$fax->load_fax($formdata->fid)) {
				header("Location: inbox.php");
				exit;
			}
			
			$from = '"'.$_SESSION[USERSESSION]->name.'" <'.$_SESSION[USERSESSION]->email.'>';
			
			if (send_mail($formdata->emails, $from, $formdata->subject, $formdata->msg, $INSTALLDIR.$fax->get_pdfpath(), $formdata->filename,
							$INSTALLDIR.$fax->get_thumbnail(), $formdata->cc_emails, $formdata->bcc_emails)) {
				// add any new emails to address book
				$addressbook = new AFAddressBook;
				$addressbook->create_contacts($formdata->emails);
				
				if ($formdata->category) {
					$fax->set_category($formdata->category, $_SESSION[USERSESSION]->get_uid());
				}
				
				if ($formdata->archive) {
					$faxin = new ArchiveIn;
					$faxin->set_archivebox($formdata->fid);
				}
				
				// show status of sent email
				$message = $LANG['EMAIL_SUCCESS'];
			} else {
				// show error message
				$error = $LANG['EMAIL_FAILURE'];
			}
		}
	}

	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$faxcat			= new FaxPDFCategory;
	$category_list	= array("");
	if ($_SESSION[USERSESSION]->superuser) {
		$categories	= $faxcat->get_categories();
		if (is_array($categories)) {
			foreach ($categories as $cat) {
				$category_list[$cat['catid']] = $cat['name'];
			}
		}
	} else {
		$categories	= $_SESSION[USERSESSION]->get_faxcats();
		if (is_array($categories)) {
			foreach ($categories as $cat) {
				if ($catname = $faxcat->get_name($cat)) {
					$category_list[$cat] = $catname;
				}
			}
		}
	}
	
	$usmarty = new UserSmarty;
	$usmarty->assign('error',		$error);
	$usmarty->assign('message',		$message);
	$usmarty->assign('categories',	$category_list);
	$usmarty->assign('fullemail',	$_SESSION[USERSESSION]->name." &lt;".$_SESSION[USERSESSION]->email."&gt;");
	$usmarty->assign('IN_INBOX',	$fax->get_inbox());
	$usmarty->assign('fvalues',		$formdata->htmlReady());
	display_template('email.tpl',	$usmarty);
