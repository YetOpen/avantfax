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
	$fids		= array_key_exists('fids', $_REQUEST) ? $_REQUEST['fids'] : NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('fids', $fids);
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
			$fids = explode(",", $formdata->fids);

			foreach ($fids as $fid) {
				if ($fax->load_fax($fid)) {
					if (!$_SESSION[USERSESSION]->superuser) {
						if (!$fax->user_has_rights($_SESSION[USERSESSION]->uid, $_SESSION[USERSESSION]->get_modemdevs(), $_SESSION[USERSESSION]->get_didrouting(), $_SESSION[USERSESSION]->get_faxcats())) {
							avantfaxlog("ajaxdeletefaxes> Access denied to delete fax '".$fax->get_fid()."' by ".$_SESSION[USERSESSION]->username);
							continue;
						}
					}
					
					if ($fax->delete_fax()) {
						avantfaxlog("ajaxdeletefaxes> Fax '".$fax->get_fid()."' deleted by ".$_SESSION[USERSESSION]->username);
					} else {
						avantfaxlog("ajaxdeletefaxes> FAILURE to delete Fax '".$fax->get_fid()."' by ".$_SESSION[USERSESSION]->username);
					}
				} else {
					avantfaxlog("ajaxdeletefaxes> FAILURE to delete Fax '".$fax->get_fid()."' by ".$_SESSION[USERSESSION]->username);
				}
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
	display_template('ajaxdeletefaxes.tpl',	$usmarty);
