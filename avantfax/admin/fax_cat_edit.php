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
	
	$faxcat		= new FaxPDFCategory;
	$create		= true;
	$error		= NULL;
	$message	= NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('name', NULL, FR_STRING, 0, 0, $LANG['MISSING_CATEGORY_NAME'], true);
	$formdata->newRule('catid', (array_key_exists('catid', $_REQUEST)) ? $_REQUEST['catid'] : NULL, FR_NUMBER);
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
			if ($formdata->catid) {
				if ($formdata->delete) {
					$faxcat->delete_category($formdata->catid);
					$archive = new FaxPDFArchive;
					$archive->remove_category($formdata->catid); // remove referrence to all faxes in DB for that catid
					$message = $LANG['ADMIN_FAXCAT_DELETED'];
				} elseif ($formdata->save && $formdata->name) {
					if ($faxcat->set_name($formdata->name, $formdata->catid)) {
						$message = $LANG['ADMIN_FAXCAT_UPDATED'];
					} else {
						$error = $faxcat->get_error();
					}
				}
				$create = false;
			} elseif ($formdata->create && $formdata->name) {
				if ($faxcat->create($formdata->name)) {
					$message = $LANG['ADMIN_FAXCAT_CREATED'];
				} else {
					$error = $faxcat->get_error();
				}
			}
		}
	} elseif ($formdata->catid) {
		$formdata->name	= $faxcat->get_name($formdata->catid);
		$create = false;
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('create',				$create);
	$asmarty->assign('error',				$error);
	$asmarty->assign('message',				$message);
	$asmarty->assign('fvalues',				$formdata->htmlReady());
	display_template('fax_cat_edit.tpl',	$asmarty);
