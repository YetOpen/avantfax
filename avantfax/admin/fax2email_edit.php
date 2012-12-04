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
	
	$addressbook	= new AFAddressBook;
	$create			= false;
	$error			= NULL;
	$success		= NULL;
		
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('abook_id', array_key_exists('abook_id', $_REQUEST) ? $_REQUEST['abook_id'] : NULL, FR_NUMBER);
	$formdata->newRule('company');
	$formdata->newRule('email', NULL, FR_ARRAY);
	$formdata->newRule('printer', NULL, FR_ARRAY);
	$formdata->newRule('faxcatid', NULL, FR_ARRAY);
	$formdata->newRule('abookfax_id', NULL, FR_ARRAY);
	$formdata->newRule('save');
	$formdata->newRule('delete');
	$formdata->newRule('_submit_check');

	if (!$addressbook->loadbycid($formdata->abook_id)) {
		exit;
	}

	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('_submit_check', $_POST)) {
		$formdata->processForm($_POST);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
	
		if (!$error) {
			extract($formdata->dbReady());
			$arrays = $formdata->htmlReady();
		
			if ($save) {
				if ($addressbook->set_company($company)) {
					// save all of the faxnumbers and their descriptions
					$count = count($arrays['abookfax_id']);
					for ($i = 0; $i < $count; $i++) {
						if ($addressbook->loadbyfaxnumid($arrays['abookfax_id'][$i])) {
							$addressbook->save_settings(array('email' => $arrays['email'][$i], 'faxcatid' => $arrays['faxcatid'][$i], 'printer' => $arrays['printer'][$i]));
						}
					}

					$success = $LANG['RUBRICA_SAVED'];
				} else {
					$error = "Error: ".$addressbook->get_error();
				}
			} elseif ($formdata->delete) {
				if ($addressbook->loadbyfaxnum($RESERVED_FAX_NUM, $mult)) {
					$newcid = $addressbook->get_companyid();
					
					// reassign this fax number's faxes to the reserved fax number entry in order to not to lose trace of the fax
					$farchive = new FaxPDFArchive;
					$farchive->reassign($abook_id, $newcid);
					
					// delete the fax company entry
					$addressbook->reassign($newcid);
					
					$success = $LANG['RUBRICA_DELETED'];
				} else {
					$error = "Error 2: ".$addressbook->get_error();
				}
			}
		}
	}
	
	$faxnums	= $addressbook->get_faxnums();
	
	$faxcat		= new FaxPDFCategory;
	$categories = array(0 => '');
	while ($faxcat->get_list($catid, $catname)) {
		$categories[$catid] = $catname;
	}

	$formdata->company	= $addressbook->get_company();
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('categories',			$categories);
	$asmarty->assign('faxnums',				$faxnums);
	$asmarty->assign('success',				$success);
	$asmarty->assign('error',				$error);
	$asmarty->assign('fvalues',				$formdata->htmlReady());
	display_template('fax2email_edit.tpl',	$asmarty);
