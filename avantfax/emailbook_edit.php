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
	$message		= NULL;
	$error			= NULL;
	$faxnumbers		= array();
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('abookemail_id', array_key_exists('abookemail_id', $_REQUEST) ? $_REQUEST['abookemail_id'] : NULL, FR_NUMBER);
	$formdata->newRule('contact_name');
	$formdata->newRule('contact_email');
		
	$formdata->newRule('delete');
	$formdata->newRule('create');
	$formdata->newRule('save');
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
			extract($formdata->dbReady());

			if ($abookemail_id) { // save or delete
				if (!$addressbook->load_contact_by_id($abookemail_id)) {
					echo $addressbook->get_error();
					exit;
				}
				
				if ($save) {
					if ($addressbook->update_contact($contact_name, $contact_email)) {
						$message = $LANG['CONTACT_SAVED'];
					} else {
						$error		= "Error: ".$addressbook->get_error();
					}
				} elseif ($delete) {
					$addressbook->remove_contact($abookemail_id);
					$message = $LANG['CONTACT_DELETED'];
				}
			} elseif ($create) {
				if ($addressbook->create_contact($contact_name, $contact_email)) {
					$message		= $LANG['CONTACT_SAVED'];
				} else {
					$error			= $addressbook->get_error();
				}
			}
		}
	} elseif ($formdata->abookemail_id) {
		if ($addressbook->load_contact_by_id($formdata->abookemail_id)) {
			$formdata->contact_name  = decode_xmlReady($addressbook->get_contact_name());
			$formdata->contact_email = decode_xmlReady($addressbook->get_contact_email());
		} else {
			$create = true;
		}
	} else {
		$create = true;
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('error',				$error);
	$usmarty->assign('create',				$create);
	$usmarty->assign('message',				$message);
	$usmarty->assign('fvalues',				$formdata->htmlReady());
	display_template('emailbook_edit.tpl',	$usmarty);
