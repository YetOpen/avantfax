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
	
	$barcode	= new BarcodeRouting;
	$create		= true;
	$error		= NULL;
	$message	= NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('barcode', NULL, FR_STRING, 0, 0, $LANG['MISSING_BARCODE'], true);
	$formdata->newRule('alias', NULL, FR_STRING, 0, 0, $LANG['MISSING_ALIAS_NAME'], true);
	$formdata->newRule('contact');
	$formdata->newRule('printer');
	$formdata->newRule('faxcatid');
	$formdata->newRule('barcode_id', NULL, FR_NUMBER);
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
			if ($formdata->barcode_id) {
				if ($formdata->delete) {
					$barcode->delete_route($formdata->barcode_id);
					$message = $LANG['ADMIN_BARCODEROUTE_DELETED'];
				} elseif ($formdata->save && $formdata->alias) {
					if ($barcode->loadbyid($formdata->barcode_id)) {
						$barcode->set_alias($formdata->alias);
						$barcode->set_contact($formdata->contact);
						$barcode->set_printer($formdata->printer);
						$barcode->set_barcode($formdata->barcode);
						$barcode->set_faxcatid($formdata->faxcatid);
						$message = $LANG['ADMIN_BARCODEROUTE_UPDATED'];
					} else {
						$error = $barcode->get_error();
					}
				}
				$create = false;
			} elseif ($formdata->create && $formdata->alias && $formdata->barcode) {
				if ($barcode->create($formdata->barcode, $formdata->alias, $formdata->contact, $formdata->printer, $formdata->faxcatid, $formdata->faxcatid)) {
					// created the barcode
					$message = $LANG['ADMIN_BARCODEROUTE_CREATED'];
				} else {
					$error = $barcode->get_error();
				}
			}
		}
	} elseif (array_key_exists('barcode_id', $_GET)) {
		if ($barcode->loadbyid($_GET['barcode_id'])) {
			$formdata->contact		= $barcode->get_contact();
			$formdata->printer		= $barcode->get_printer();
			$formdata->alias		= $barcode->get_alias();
			$formdata->barcode		= $barcode->get_barcode();
			$formdata->barcode_id	= $barcode->get_barcode_id();
			$formdata->faxcatid		= $barcode->get_faxcatid();
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
	$asmarty->assign('create',						$create);
	$asmarty->assign('categories',					$categories);
	$asmarty->assign('message',						$message);
	$asmarty->assign('error',						$error);
	$asmarty->assign('fvalues',						$formdata->htmlReady());
	display_template('conf_barcoderoute_edit.tpl',	$asmarty);
