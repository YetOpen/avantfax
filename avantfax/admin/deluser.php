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
	
	$uid	= array_key_exists('uid', $_REQUEST) ? $_REQUEST['uid'] : NULL;

	if (!$uid) { header("Location: index.php"); }
	
	$error	= NULL;
	$user	= new AFUserAccount;
	$user->load($uid);
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('uid', $uid, FR_NUMBER);
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
			$user->remove($uid);
			header("Location: admin.php");
			exit;
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('username',		$user->name);
	$asmarty->assign('error',			$error);
	$asmarty->assign('fvalues',			$formdata->htmlReady());
	display_template('deluser.tpl',		$asmarty);
