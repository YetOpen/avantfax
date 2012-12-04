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
	
	$reboot		= false;
	$shutdown	= false;
	$error		= NULL;
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule ('reboot');
	$formdata->newRule ('shutdown');
	$formdata->newRule ('download_ar');
	$formdata->newRule ('download_db');
	$formdata->newRule ('_submit_check');

	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists ('_submit_check', $_POST)) {
		$formdata->processForm ($_POST);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join ("<li>", $formerror);
		}
	
		if (!$error) {
			if ($formdata->reboot) {
				system ("sudo /sbin/reboot");
				$reboot = true;
			} elseif ($formdata->shutdown) {
				system ("sudo /sbin/halt");
				$shutdown = true;
			} elseif ($formdata->download_ar) {
				// download fax archive
				$basname	= "avantfax-archive-".date ("Ymd").".tar.gz";
				$tmpfile	= $TMPDIR.$basname;
				system ("tar -czf $tmpfile $ARCHIVE $ARCHIVE_SENT");
				header ("Location: ../tmp/$basname");
				exit;
			} elseif ($formdata->download_db) {
				// download fax database dump
				$basname	= "avantfax-schema-".date ("Ymd").".sql.gz";
				$tmpfile	= $TMPDIR.$basname;
				system ("mysqldump --user=".AFDB_USER." --password=".AFDB_PASS." ".AFDB_NAME." | gzip -9 > $tmpfile");
				header ("Location: ../tmp/$basname");
				exit;
			}
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign ('shutdown',			$shutdown);
	$asmarty->assign ('reboot',				$reboot);
	display_template ('system_func.tpl',	$asmarty);
