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

	require_once '../check_login.php';
	
	if (!$_SESSION[USERSESSION]->can_del) { header("Location: index.php"); }
	
	$error		= NULL;
	$fax		= new FaxPDFArchive;
	$nextfid	= array_key_exists('nextfid', $_REQUEST)	? $_REQUEST['nextfid']	: NULL;
	$fid		= array_key_exists('fid', $_REQUEST)		? $_REQUEST['fid'] 		: NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('fid', $fid, FR_NUMBER);
	$formdata->newRule('nextfid', $nextfid, FR_NUMBER);
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
			if ($fax->load_fax($formdata->fid)) {
				if (!$_SESSION[USERSESSION]->superuser) {
					if (!$fax->user_has_rights($_SESSION[USERSESSION]->uid, $_SESSION[USERSESSION]->get_modemdevs(), $_SESSION[USERSESSION]->get_didrouting(), $_SESSION[USERSESSION]->get_faxcats())) {
						avantfaxlog("delete> Access denied to delete fax '".$fax->get_fid()."' by ".$_SESSION[USERSESSION]->username);
						exit;
					}
				}
				
			
				if ($fax->delete_fax()) {
					avantfaxlog("delete> Fax '".$fax->get_fid()."' deleted by ".$_SESSION[USERSESSION]->username);
				}
			} else {
				// show error?
				avantfaxlog("delete> FAILURE to delete Fax '".$fax->get_fid()."' by ".$_SESSION[USERSESSION]->username);
			}
			exit;
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('error',		$error);
	$usmarty->assign('fvalues',		$formdata->htmlReady());
	display_template('delete.tpl',	$usmarty);
