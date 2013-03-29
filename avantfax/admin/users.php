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
	
	$uid		= array_key_exists('uid', $_REQUEST) ? $_REQUEST['uid'] : NULL;
	$user		= new AFUserAccount;
	$error		= NULL;
	$saved		= false;
	$message	= NULL;
	
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

    // List available audio files
    $audio_list = array ('');
    $audiodir = "../includes/audio";
    if (is_dir ($audiodir)) {
        foreach (glob ($audiodir."/{*.ogg,*.wav,*.mp3}",GLOB_BRACE) as $audiofile) {
            $fn = basename($audiofile);
            $audio_list [$fn] = $fn;
        }
    }
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('name',					NULL, FR_STRING, 0, 0, $LANG['NAME_MISSING'], true);
	$formdata->newRule('username',				NULL, FR_STRING, 0, 0, $LANG['REGWARN_NOUSERNAME'], true);
	$formdata->newRule('password');
	$formdata->newRule('email',					NULL, FR_STRING, 0, 0, $LANG['REGWARN_MAIL'], true);
	$formdata->newRule('email_sig');
	$formdata->newRule('coverpage_id');
	$formdata->newRule('audiofile');
	$formdata->newRule('from_company',			$FROM_COMPANY);
	$formdata->newRule('from_location',			$FROM_LOCATION);
	$formdata->newRule('from_voicenumber',		$FROM_VOICENUMBER);
	$formdata->newRule('from_faxnumber',		$FROM_FAXNUMBER);
	$formdata->newRule('user_tsi',				$DEFAULT_TSI_ID);
	$formdata->newRule('superuser',				NULL, FR_NUMBER);
	$formdata->newRule('can_del',				NULL, FR_NUMBER);
	$formdata->newRule('any_modem',				NULL, FR_NUMBER);
	$formdata->newRule('language',				$dft_config_lang);
	$formdata->newRule('modemdevs',				NULL, FR_ARRAY);
	$formdata->newRule('didrouting',			NULL, FR_ARRAY);
	$formdata->newRule('faxcats',				NULL, FR_ARRAY);
	$formdata->newRule('pwd_reuse',				NULL, FR_NUMBER);
	$formdata->newRule('is_admin',				NULL, FR_NUMBER);
	$formdata->newRule('acc_enabled',			NULL, FR_NUMBER);
	$formdata->newRule('faxperpageinbox',		$DEFAULT_FAXES_PER_PAGE_INBOX, FR_NUMBER);
	$formdata->newRule('faxperpagearchive',		$DEFAULT_FAXES_PER_PAGE_ARCHIVE, FR_NUMBER);
	$formdata->newRule('pwdcycle');
	$formdata->newRule('_submit_check');
	
	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('_submit_check', $_POST)) {
		if ($uid) {
			$formdata->newRule('uid', $uid, FR_NUMBER);
			$formdata->newRule('acc_enabled', NULL, FR_NUMBER);
			$formdata->newRule('delete');
		}
	
		$formdata->processForm($_POST);
				
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
	
		if (!$error) {
			/******************************************************************************************************************************
					EDIT USER
			 ******************************************************************************************************************************/
			if ($uid) {
				if ($formdata->delete) {
					header("Location: deluser.php?uid=$formdata->uid");
					exit;
				}
				
				if (!$user->load($uid)) {
					$error .= "<li>".$user->get_error();
				}
				
				extract($formdata->dbReady());
				$arrays = $formdata->htmlReady();
	
				if (!$user->set_username($username)) {
					$error .= "<li>".$user->get_error();
				}
				
				if (!$user->set_email($email)) {
					$error .= "<li>".$user->get_error();
				}
				
				$user->name			= $name;
				$user->superuser	= $superuser;
				$user->can_del		= $can_del;
				$user->any_modem	= $any_modem;
				$user->language		= $language;
				$user->acc_enabled	= $acc_enabled;
				$user->is_admin		= $is_admin;
				$user->coverpage_id	= $coverpage_id;
				$user->audiofile	= $audiofile;
				$pexpires			= $user->pwdexpire;
				
				if ($user->pwdcycle != $pwdcycle) { // update new expire date
					$user->pwdcycle = $pwdcycle;
					
					// calculate when password should expire
					switch ($pwdcycle) {
						case "3": $pexpires = date("Y-m-d", mktime(0, 0, 0, date("m")+3, date("d"), date("Y"))); break;
						case "6": $pexpires = date("Y-m-d", mktime(0, 0, 0, date("m")+6, date("d"), date("Y"))); break;
						default:  $pexpires = NULL; break;
					}
				}
				
				$user->pwdexpire = $pexpires;
				
				// if account is not enabled, remove entry from hosts
				if (!$acc_enabled) {
					system("$SUDO $FAXDELUSER ".escapeshellarg($user->username));
					$user->wasreset = true; // make user enter new password when account is re-enabled
				}
				
				$user->set_faxcats($arrays['faxcats']);
				$user->set_didrouting($arrays['didrouting']);
				$user->set_modemdevs($arrays['modemdevs']);
				
				$user->from_company		= $from_company;
				$user->from_location	= $from_location;
				$user->from_voicenumber	= $from_voicenumber;
				$user->from_faxnumber	= $from_faxnumber;
				$user->user_tsi	        = $user_tsi;
				$user->pwd_reuse		= isset($pwd_reuse) ? $pwd_reuse : 0;

				$user->faxperpageinbox		= $faxperpageinbox;
				$user->faxperpagearchive	= $faxperpagearchive;
				
				if (!$error)
					$user->update();
				
				if (!$error && $password) {
					if (!$user->change_password($password)) {
						$error .= "<li>".$user->get_error();
					}
				}
				
				if (!$error) {
					$saved = true;
					$message = $LANG['USER_DETAILS_SAVED'];
				}
			} else {
				/******************************************************************************************************************************
						NEW USER
				 ******************************************************************************************************************************/
				$formdata->unsetRule('_submit_check');
				$user_details	= $formdata->dbReady();
				$arrays			= $formdata->htmlReady();
				
				$user = new AFUserAccount;
				if (!$error) {
					if ($user->create($user_details)) {
						$user->set_faxcats($arrays['faxcats']);
						$user->set_didrouting($arrays['didrouting']);
						$user->set_modemdevs($arrays['modemdevs']);
						
						$user->update();
					
						$formdata->newRule('uid', $user->get_uid(), FR_NUMBER);
						
						$saved		= true;
						$message	= $LANG['USER_DETAILS_SAVED'];
					} else {
						$error = $user->get_error();
					}
				}
			}
		}
	} elseif ($uid) { // load user details
		/******************************************************************************************************************************
				LOAD USER
		 ******************************************************************************************************************************/
		if ($user->load($uid)) {
			$formdata->newRule('uid', $uid, FR_NUMBER);
			
			$values = $user->get_allvalues();
			unset($values['modemdevs']);
			unset($values['faxcats']);
			unset($values['didrouting']);
			unset($values['password']);
			$formdata->setVals($values);
			$formdata->didrouting	= $user->get_didrouting();
			$formdata->faxcats		= $user->get_faxcats();
			$formdata->modemdevs	= $user->get_modemdevs();
		}
	}
	
	$faxcategory	= new FaxPDFCategory;
	$faxcategories	= array();
	$categories		= array();
	while ($faxcategory->get_list($catid, $name)) {
		$faxcategories[]	= $catid;
		$categories[]		= $name;
	}

	$didr				= new DIDRouting;
	$didroutes			= array('0');
	$routenames			= array($LANG['DIDROUTE_CATCHALL']);
	while ($didr->list_routes($didr_id, $alias, $routecode)) {
		$didroutes[]	= $didr_id;
		$routenames[]	= "&nbsp;$alias ($routecode)";
	}
	
	$modem			= new FaxModem;
	$modem_list		= $modem->get_modems();
	$modemdevs		= array();
	$modems			= array();
	if (is_array($modem_list)) {
		foreach ($modem_list as $device) {
			$modem->load_device($device);
			$modemdevs[]	= $modem->get_device();
			$modems[]		= $modem->get_alias();
		}
	}
	
	$cycles = array("0" => $LANG['ADMIN_PWDCYCLE'][1], "3" => $LANG['ADMIN_PWDCYCLE'][2], "6" => $LANG['ADMIN_PWDCYCLE'][3]);
	
	$faxesperpagelist = array('10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50, '100' => 100);
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('faxcategories',		$faxcategories);
	$asmarty->assign('categories',			$categories);
	$asmarty->assign('didroutes',			$didroutes);
	$asmarty->assign('routes',				$routenames);
	$asmarty->assign('modemdevs',			$modemdevs);
	$asmarty->assign('cover_list',			$cover_list);
	$asmarty->assign('audio_list',			$audio_list);
	$asmarty->assign('modems',				$modems);
	$asmarty->assign('cycles',				$cycles);
	$asmarty->assign('error',				$error);
	$asmarty->assign('saved',				$saved);
	$asmarty->assign('message',				$message);
	$asmarty->assign('fvalues',				$formdata->htmlReady());
	$asmarty->assign('faxesperpagelist',	$faxesperpagelist);
	$asmarty->assign('languages',			list_languages());
	display_template('users.tpl',			$asmarty);
