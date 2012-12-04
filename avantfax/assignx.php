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

	$fid			= array_key_exists('fid', $_REQUEST) ? $_REQUEST['fid'] : NULL;
	$resfax			= new FaxPDFArchive;
	$addressbook	= new AFAddressBook;
	$error			= NULL;
	$message		= NULL;
	$processed		= false;

	if (!$fid) exit;
	if (!$resfax->load_fax($fid)) { // load the reserved fax's ID
		exit;
	}
	
	$INC_LIST = "<script language=\"javascript\" type=\"text/javascript\" src=\"js/ajaxbook.js\"></script>";

	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('fid', $resfax->get_fid(), FR_NUMBER);
	$formdata->newRule('regexp');
	$formdata->newRule('abook_id', NULL, FR_NUMBER);
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
		
			$resfax->set_faxnumid("0"); // disassociate the faxnumber id from XXXX
			
			if ($formdata->abook_id) {
				// assign companyid to reserved fax
				$resfax->set_companyid($formdata->abook_id);
				
				$message = $LANG['ASSIGN_OK'];
			} elseif ($formdata->regexp) {
				// create company name
				if ($addressbook->create($formdata->regexp)) {
					// assign companyid to reserved fax
					$resfax->set_companyid($addressbook->get_companyid());
					$message = $LANG['ASSIGN_OK'];
				} else {
					$message = $resfax->get_error();
				}
			} else {
				$message = $LANG['ASSIGN_MISSING'];
			}
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('error',		$error);
	$usmarty->assign('processed',	$processed);
	$usmarty->assign('message',		$message);
	$usmarty->assign('INC_LIST',	$INC_LIST);
	$usmarty->assign('fvalues',		$formdata->htmlReady());
	display_template('assignx.tpl',	$usmarty);
