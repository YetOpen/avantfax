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
	
	$cover		= new Covers;
	$create		= true;
	$error		= NULL;
	$message	= NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('cover_id', NULL, FR_NUMBER);
	$formdata->newRule('file', NULL, FR_STRING, 0, 0, $LANG['MISSING_FILE_NAME'], true);
	$formdata->newRule('title', NULL, FR_STRING, 0, 0, $LANG['MISSING_TITLE_NAME'], true);
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
			if ($formdata->cover_id) {
				if ($formdata->delete) {
					$cover->delete_cover($formdata->cover_id);
					$message = $LANG['ADMIN_COVER_DELETED'];
				} elseif ($formdata->save && $formdata->title) {
					if ($cover->load_cover($formdata->file)) {
						$cover->set_title($formdata->title);
						$message = $LANG['ADMIN_COVER_UPDATED'];
					} else {
						$error = $cover->get_error();
					}
				}
				$create = false;
			} elseif ($formdata->create && $formdata->title && $formdata->file) {						// create new cover page
				if ($cover->create($formdata->title, $formdata->file)) {
					$message = $LANG['ADMIN_COVER_CREATED'];
				} else {
					$error = $cover->get_error();
				}
			}
		}
	} elseif (array_key_exists('file', $_GET)) {
		if ($cover->load_cover($_GET['file'])) {
			$formdata->file		= $cover->get_file();
			$formdata->title	= $cover->get_title();
			$formdata->cover_id	= $cover->get_cover_id();
		}
		$create = false;
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('create',					$create);
	$asmarty->assign('message',					$message);
	$asmarty->assign('error',					$error);
	$asmarty->assign('fvalues',					$formdata->htmlReady());
	display_template('conf_covers_edit.tpl',	$asmarty);
