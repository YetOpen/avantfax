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
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('dl_id', array_key_exists('dl_id', $_REQUEST) ? $_REQUEST['dl_id'] : NULL, FR_NUMBER);
	$formdata->newRule('dlname');
	$formdata->newRule('dl_list', NULL, FR_ARRAY);
	// BUTTONS
	$formdata->newRule('savename');
	$formdata->newRule('create');
	$formdata->newRule('refresh');
	$formdata->newRule('remove');
	$formdata->newRule('delete');
	$formdata->newRule('_submit_check');
	
	$create		= ($formdata->dl_id) ? false : true;
	$dlist		= new DistributionList;
	$error		= NULL;
	$message	= NULL;
	$dlname		= NULL;
	$dl_list	= NULL;
	$list		= array();
	
	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('_submit_check', $_POST)) {
		$formdata->processForm($_POST);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
		
		if (!$error) {
			if ($formdata->dl_id) {
				if (!$dlist->load_list($formdata->dl_id)) {
					exit("<p>Couldn't load list $formdata->dl_id</p>");
				}
				$dlname		= $dlist->get_listname();
				$dl_list	= $dlist->list_entries();
			}
			
			$dlist->set_moduser($_SESSION[USERSESSION]->get_uid());
			
			if ($formdata->create) {
				if ($dlist->create($formdata->dlname)) {
					$formdata->dl_id	= $dlist->get_dl_id();
					$dlname	= $dlist->get_listname();
					$create	= false;
				} else {
					$error	= $dlist->get_error();
				}
			} elseif ($formdata->savename) {
				$dlist->set_listname($formdata->dlname);
				$dlname = $formdata->dlname;
			} elseif ($formdata->remove) {
				$dlist->remove_entries($formdata->dl_list);
				$dl_list = $dlist->list_entries();
			} elseif ($formdata->delete) {
				$dlist->delete_list($formdata->dl_id);
				$message = $LANG['DISTROLIST_DELETED'];
			}
		}
	} elseif ($formdata->dl_id) {
		if (!$dlist->load_list($formdata->dl_id)) {
			exit("<p>Couldn't load list $formdata->dl_id</p>");
		}
		$dlname			= decode_xmlReady($dlist->get_listname());
		$dl_list		= $dlist->list_entries();
	}
	
	$formdata->dlname	= $dlname;
	$formdata->dl_list	= $dl_list;
	
	$contact_list		= array();
	$addressbook		= new AFAddressBook;
	if (is_array($dl_list)) {
		foreach ($dl_list as $entry) {
			$info		= explode("|", $entry);
			$fnid		= $info[0];
			
			if (array_key_exists(1, $info))
				$faxnum = $info[1];
			
			if ($fnid) {
				if ($addressbook->loadbyfaxnumid($fnid)) {
					$company = $addressbook->get_company();
					if (!$company) $company = $RESERVED_FAX_NUM;
					$list[] = array("company" => htmlspecialchars($company, ENT_QUOTES, "UTF-8")." - ".$addressbook->get_faxnumber(), "fnid" => $entry);
				}
			}
		}
	}
	
	sort($list);
	foreach ($list as $entry) {
		$contact_list[$entry['fnid']] = $entry['company'];
	}

	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('error',				$error);
	$usmarty->assign('create',				$create);
	$usmarty->assign('message',				$message);
	$usmarty->assign('contact_list',		$contact_list);
	$usmarty->assign('fvalues',				$formdata->htmlReady());
	display_template('distrolist_edit.tpl',	$usmarty);
