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
	
	$dynconf	= new DynamicConfig;
	$create		= true;
	$error		= NULL;
	$message	= NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('device', NULL, FR_STRING);
	$formdata->newRule('callid', NULL, FR_STRING, 0, 0, $LANG['DYNCONF_MISSING_CALLID'], true);
	$formdata->newRule('dynconf_id', NULL, FR_NUMBER);
	$formdata->newRule('delete');
	$formdata->newRule('save');
	$formdata->newRule('create');
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
			if ($formdata->dynconf_id) {
				if ($formdata->delete) {
					$dynconf->remove($formdata->dynconf_id);
					$message = $LANG['DYNCONF_DELETED'];
				} elseif ($formdata->save && $formdata->callid) {
					if ($dynconf->load_rule($formdata->dynconf_id)) {
						$dynconf->save_rule($formdata->device, $formdata->callid);
						$message = $LANG['DYNCONF_UPDATED'];
					} else {
						$error = $dynconf->get_error();
					}
				}
				$create = false;
			} elseif ($formdata->create && $formdata->callid) {
				if ($dynconf->create($formdata->device, $formdata->callid)) {
					// created the route
					$message = $LANG['DYNCONF_CREATED'];
				} else {
					$error = $dynconf->get_error();
				}
			}
		}
	} elseif (array_key_exists('dynconf_id', $_GET)) {
		if ($dynconf->load_rule($_GET['dynconf_id'])) {
			$formdata->device		= $dynconf->get_device();
			$formdata->callid		= $dynconf->get_callid();
			$formdata->dynconf_id	= $dynconf->get_dynconf_id();
		}
		$create = false;
	}
	
	
	$modeminst		= new FaxModem;
	$modems			= $modeminst->get_modems();
	$modem_list		= array('');
	
	if (is_array($modems)) {
		foreach ($modems as $device) {
			if ($modeminst->load_device($device)) {
				$modem_list[$device] = $modeminst->get_alias();
			}
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('modems',					$modem_list);
	$asmarty->assign('message',					$message);
	$asmarty->assign('create',					$create);
	$asmarty->assign('error',					$error);
	$asmarty->assign('fvalues',					$formdata->htmlReady());
	display_template('conf_dynconf_edit.tpl',	$asmarty);
