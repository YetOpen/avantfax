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
	$formdata->newRule('myselect', NULL, FR_ARRAY);
	$formdata->newRule('add');
	
	$dlist	= new DistributionList;
	$added	= false;
	$error	= NULL;
		
	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('dl_id', $_REQUEST)) {
		$formdata->processForm($_REQUEST);
		
		if (!$dlist->load_list($formdata->dl_id)) {
			exit("<p>Couldn't load list $formdata->dl_id</p>");
		}
		
		// process form
		if (!$error) {
			$dlist->set_moduser($_SESSION[USERSESSION]->get_uid());

			if ($dlist->add_entries($formdata->myselect)) {
				$added = true;
			} else {
				$error = $dlist->get_error();
			}
		}
	}
	
	$INC_LIST = "<script language=\"javascript\" type=\"text/javascript\" src=\"js/ajaxbook.js\"></script>";
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('error',					$error);
	$usmarty->assign('added',					$added);
	$usmarty->assign('INC_LIST',				$INC_LIST);
	$usmarty->assign('fvalues',					$formdata->htmlReady());
	display_template('distrolist_helper.tpl',	$usmarty);
