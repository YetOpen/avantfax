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
	
	$modem		= new FaxModem;
	$create		= true;
	$error		= NULL;
	$message	= NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('devid', NULL, FR_NUMBER);
	$formdata->newRule('device', NULL, FR_STRING, 0, 0, $LANG['MISSING_DEVICE_NAME'], true);
	$formdata->newRule('alias', NULL, FR_STRING, 0, 0, $LANG['MISSING_ALIAS_NAME'], true);
	$formdata->newRule('printer');
	$formdata->newRule('faxcatid');
	$formdata->newRule('contact');
	$formdata->newRule('device2');
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
			if ($formdata->devid) {
				if ($formdata->delete) {
					$modem->delete_device($formdata->devid);
					$message = $LANG['ADMIN_MODEM_DELETED'];
				} elseif ($formdata->save && $formdata->alias) {
					if ($modem->load_device($formdata->device2)) {
						$modem->set_contact($formdata->contact);
						$modem->set_printer($formdata->printer);
						$modem->set_faxcatid($formdata->faxcatid);
						$modem->set_alias($formdata->alias);
						$message = $LANG['ADMIN_MODEM_UPDATED'];
					} else {
						$error = $modem->get_error();
					}
				}
				$create = false;
			} elseif ($formdata->create && $formdata->alias && $formdata->device) {						// create new modem
				if ($modem->create($formdata->device, $formdata->alias, $formdata->contact, $formdata->printer, $formdata->faxcatid)) {
					$message = $LANG['ADMIN_MODEM_CREATED'];
				} else {
					$error = $modem->get_error();
				}
			}
		}
	} elseif (array_key_exists('device', $_GET)) {
		if ($modem->load_device($_GET['device'])) {
			$formdata->device	= $modem->get_device();
			$formdata->device2	= $modem->get_device();
			$formdata->alias	= $modem->get_alias();
			$formdata->contact	= $modem->get_contact();
			$formdata->devid	= $modem->get_devid();
			$formdata->printer	= $modem->get_printer();
			$formdata->faxcatid	= $modem->get_faxcatid();
		}
		$create = false;
	}
	
	$faxcat		= new FaxPDFCategory;
	$categories = array(0 => '');
	while ($faxcat->get_list($catid, $catname)) {
		$categories[$catid] = $catname;
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('create',					$create);
	$asmarty->assign('categories',				$categories);
	$asmarty->assign('message',					$message);
	$asmarty->assign('error',					$error);
	$asmarty->assign('fvalues',					$formdata->htmlReady());
	display_template('conf_modems_edit.tpl',	$asmarty);
