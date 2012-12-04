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
	
	$abook_id		= array_key_exists('abook_id', $_REQUEST) ? $_REQUEST['abook_id'] : NULL;
	$addressbook	= new AFAddressBook;
	$error			= NULL;
	$message		= NULL;
	$processed		= false;

	if (!$addressbook->loadbycid($abook_id)) { // load the company's ID
		exit;
	}
	
	$INC_LIST = "<script language=\"javascript\" type=\"text/javascript\" src=\"js/ajaxbook.js\"></script>";
	
	$lookup_whitepages = (!$grep_function("/\D/", $addressbook->get_company())) ? $addressbook->get_company() : false;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('abook_id', $addressbook->get_companyid(), FR_NUMBER);
	$formdata->newRule('regexp');
	$formdata->newRule('myselect', NULL, FR_NUMBER);
	$formdata->newRule('_submit_check');
	
	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('_submit_check', $_POST)) {
		$formdata->processForm($_POST);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
		
		if (!$error) {
			$processed		= true;
			
			if ($formdata->myselect) {
				$oldcid = $addressbook->get_companyid();
				// assign the new company's ID in myselect to this
				if ($addressbook->reassign($formdata->myselect)) {
					// reassign all faxes that were reserved and assigned this old company
					$faxarchive = new FaxPDFArchive;
					$faxarchive->reassign($oldcid, $formdata->myselect);
					$message = $LANG['ASSIGN_OK'];
				} else {
					$message = "Error reassigning company";
				}
			} elseif ($formdata->regexp) {
				// set company name
				$addressbook->set_company($formdata->regexp);
				$message = $LANG['ASSIGN_OK'];
			} else {
				$message = $LANG['ASSIGN_MISSING'];
			}
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('error',				$error);
	$usmarty->assign('processed',			$processed);
	$usmarty->assign('message',				$message);
	$usmarty->assign('INC_LIST',			$INC_LIST);
	$usmarty->assign('fvalues',				$formdata->htmlReady());
	$usmarty->assign('lookup_whitepages',	$lookup_whitepages);
	display_template('assign.tpl',			$usmarty);
