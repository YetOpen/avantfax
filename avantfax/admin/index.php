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

	require_once '../includes/classes.php';
	
	avantfax_session();
	
	if (array_key_exists(USERSESSION, $_SESSION)) {
		if ($_SESSION[USERSESSION]->check_admin_login()) {
			header("Location: admin.php");
			exit;
		}
	}
	
	$error = NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('username');
	$formdata->newRule('password');
	$formdata->newRule('_submit_check');
	
	$_SESSION[USERSESSION] = new AFUserAccount;
	
	/******************************************************************************************************************************
			CHECK FOR ALTERNATE AUTHENTICATION
	 ******************************************************************************************************************************/
	if (array_key_exists('PHP_AUTH_USER', $_SERVER) && $_SERVER['PHP_AUTH_USER'] != "") {
		if ($_SESSION[USERSESSION]->login_webauth($_SERVER['PHP_AUTH_USER'], true)) {
			header("Location: admin.php");
			exit;
		}
		$error = $_SESSION[USERSESSION]->get_error();
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
			if ($ALTERNATE_AUTH_ENABLE) {
				if ($_SESSION[USERSESSION]->login_alternate_auth($formdata->username, $formdata->password, true)) {
					header("Location: admin.php");
					exit;
				}
			}
			
			if (!$ALTERNATE_AUTH_ENABLE || ($ALTERNATE_AUTH_ENABLE && $ALTERNATE_AUTH_FALLBACK)) {
				if ($_SESSION[USERSESSION]->login($formdata->username, $formdata->password, true)) {
					if ($_SESSION[USERSESSION]->is_expired()) {
						header("Location: pwdexpired.php");
					} else {
						header("Location: admin.php");
					}
					exit;
				}
			}
			
			$error = $_SESSION[USERSESSION]->get_error();
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('error',		$error);
	display_template('index.tpl',	$asmarty);
