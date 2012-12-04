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

	$error = NULL;
	
	/******************************************************************************************************************************
			SETUP COVER PAGES
	 ******************************************************************************************************************************/	
	$coverinst		= new Covers;
	$covers			= $coverinst->get_covers();
	$cover_list		= array();
	$first_cover	= NULL;

	if (is_array($covers)) {
		foreach ($covers as $cover) {
			if ($coverinst->load_cover($cover)) {
				if (!$first_cover) $first_cover = $cover;
				$cover_list[$coverinst->get_cover_id()] = $coverinst->get_title();
			}
		}
	}
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('opass', NULL, FR_STRING, 0, MAX_PASSWD_SIZE);
	$formdata->newRule('npass', NULL, FR_STRING, 0, MAX_PASSWD_SIZE);
	$formdata->newRule('vpass', NULL, FR_STRING, 0, MAX_PASSWD_SIZE);
	
	$formdata->newRule('email',				$_SESSION[USERSESSION]->email, FR_STRING, 0, 0, $LANG['REGWARN_MAIL'], true);
	$formdata->newRule('name',				$_SESSION[USERSESSION]->name, FR_STRING, 0, 0, $LANG['NAME_MISSING'], true);
	$formdata->newRule('from_company',		$_SESSION[USERSESSION]->from_company);
	$formdata->newRule('from_location',		$_SESSION[USERSESSION]->from_location);
	$formdata->newRule('from_voicenumber',	$_SESSION[USERSESSION]->from_voicenumber);
	$formdata->newRule('from_faxnumber',	$_SESSION[USERSESSION]->from_faxnumber);
	$formdata->newRule('user_tsi',			$_SESSION[USERSESSION]->user_tsi);
	$formdata->newRule('email_sig',			$_SESSION[USERSESSION]->email_sig);
	$formdata->newRule('language',			$_SESSION[USERSESSION]->language);
	$formdata->newRule('coverpage_id',		$_SESSION[USERSESSION]->coverpage_id);
	$formdata->newRule('faxperpageinbox',	$_SESSION[USERSESSION]->faxperpageinbox, FR_NUMBER);
	$formdata->newRule('faxperpagearchive',	$_SESSION[USERSESSION]->faxperpagearchive, FR_NUMBER);
	$formdata->newRule('url',				$_SERVER['HTTP_REFERER']);
	
	$formdata->newRule('update');
	$formdata->newRule('cancel');
	
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
		
			if (isset($formdata->update)) {
				$_SESSION[USERSESSION]->name				= $formdata->name;
				$_SESSION[USERSESSION]->from_company		= $formdata->from_company;
				$_SESSION[USERSESSION]->from_location		= $formdata->from_location;
				$_SESSION[USERSESSION]->from_voicenumber	= $formdata->from_voicenumber;
				$_SESSION[USERSESSION]->from_faxnumber		= $formdata->from_faxnumber;
				$_SESSION[USERSESSION]->email_sig			= $formdata->email_sig;
				$_SESSION[USERSESSION]->language			= $formdata->language;
				$_SESSION[USERSESSION]->user_tsi			= $formdata->user_tsi;
				$_SESSION[USERSESSION]->coverpage_id		= $formdata->coverpage_id;
				$_SESSION[USERSESSION]->faxperpageinbox		= $formdata->faxperpageinbox;
				$_SESSION[USERSESSION]->faxperpagearchive	= $formdata->faxperpagearchive;
				
				if (!$_SESSION[USERSESSION]->set_email($formdata->email)) {
					$error .= "<li>".$_SESSION[USERSESSION]->get_error()."</li>\n";
				}
				
				$_SESSION[USERSESSION]->user_update();
				
				if (!empty($formdata->opass)) {
					if ($formdata->npass === $formdata->vpass) {
						if (!$_SESSION[USERSESSION]->set_newpassword($formdata->opass, $formdata->npass)) {
							$error = "<li>".$_SESSION[USERSESSION]->get_error()."</li>\n";
						}
					} else {
						$error = "<li>".$LANG['REGWARN_VPASS2']."</li>\n";
					}
				}
				
				if (!$error) {	header("Location: ". decode_entity($formdata->url)); }
			} elseif (isset($formdata->cancel)) {
				if ($grep_function("/settings/", $formdata->url)) {
					header("Location: inbox.php");
				}
				header("Location: ".$formdata->url);
			}
		}
	}
	
	$faxesperpagelist = array('10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50, '100' => 100);	
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('error',				$error);
	$usmarty->assign('div_size',			60);
	$usmarty->assign('languages',			list_languages());
	$usmarty->assign('numfaxesinbox',		get_inbox_count());	// number of faxes in inbox
	$usmarty->assign('cover_list',			$cover_list);
	$usmarty->assign('faxesperpagelist',	$faxesperpagelist);
	$usmarty->assign('fvalues',				$formdata->htmlReady());
	display_template('settings.tpl',		$usmarty);
