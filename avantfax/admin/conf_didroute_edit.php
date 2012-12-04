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
	
	$didr		= new DIDRouting;
	$create		= true;
	$error		= NULL;
	$message	= NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('route', NULL, FR_STRING, 0, 0, $LANG['MISSING_ROUTE'], true);
	$formdata->newRule('alias', NULL, FR_STRING, 0, 0, $LANG['MISSING_ALIAS_NAME'], true);
	$formdata->newRule('contact');
	$formdata->newRule('printer');
	$formdata->newRule('faxcatid');
	$formdata->newRule('didr_id', NULL, FR_NUMBER);
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
			if ($formdata->didr_id) {
				if ($formdata->delete) {
					$didr->delete_route($formdata->didr_id);
					$message = $LANG['ADMIN_DIDROUTE_DELETED'];
				} elseif ($formdata->save && $formdata->alias) {
					if ($didr->loadbyid($formdata->didr_id)) {
						$didr->set_alias($formdata->alias);
						$didr->set_contact($formdata->contact);
						$didr->set_printer($formdata->printer);
						$didr->set_routecode($formdata->route);
						$didr->set_faxcatid($formdata->faxcatid);
						$message = $LANG['ADMIN_DIDROUTE_UPDATED'];
					} else {
						$error = $didr->get_error();
					}
				}
				$create = false;
			} elseif ($formdata->create && $formdata->alias && $formdata->route) {
				if ($didr->create($formdata->route, $formdata->alias, $formdata->contact, $formdata->printer, $formdata->faxcatid)) {
					// created the route
					$message = $LANG['ADMIN_DIDROUTE_CREATED'];
				} else {
					$error = $didr->get_error();
				}
			}
		}
	} elseif (array_key_exists('didr_id', $_GET)) {
		if ($didr->loadbyid($_GET['didr_id'])) {
			$formdata->contact		= $didr->get_contact();
			$formdata->printer		= $didr->get_printer();
			$formdata->alias		= $didr->get_alias();
			$formdata->route		= $didr->get_route();
			$formdata->didr_id		= $didr->get_didr_id();
			$formdata->faxcatid		= $didr->get_faxcatid();
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
	display_template('conf_didroute_edit.tpl',	$asmarty);
