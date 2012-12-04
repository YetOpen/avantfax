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
	
	$error		= NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('oldpwd');
	$formdata->newRule('newpwd', NULL, FR_STRING, MIN_PASSWD_SIZE, MAX_PASSWD_SIZE, $LANG['REGWARN_PASS'], true);
	$formdata->newRule('conpwd');
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
			$_SESSION[USERSESSION]->init_db();
			if ($formdata->newpwd === $formdata->conpwd) {
				if ($_SESSION[USERSESSION]->set_newpassword($formdata->oldpwd, $formdata->newpwd)) {
					header("Location: admin.php");
					exit;
				} else {
					$error = $_SESSION[USERSESSION]->get_error();
				}
			} else {
				$error = $LANG['REGWARN_VPASS2'];
			}
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('error',			$error);
	$asmarty->assign('fvalues',			$formdata->htmlReady());
	display_template('pwdexpired.tpl',	$asmarty);
