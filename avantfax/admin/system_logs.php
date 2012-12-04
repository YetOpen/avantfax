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
	
	$error	= NULL;
	$syslog = new MDBOData('SysLog');
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('kw');
	$formdata->newRule('day',		date("d"));
	$formdata->newRule('month',		date("m"));
	$formdata->newRule('year',		date("Y"));
	$formdata->newRule('_submit_check');

	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('_submit_check', $_GET)) {
		$formdata->processForm($_GET);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
		
		if (!$error) {
			extract($formdata->dbReady());
			if ($day == "*")	$day = "";
			if ($month == "*")	$month = "";
			if ($year == "*")	$year = "";
			
			if ($day && $month && $year) {
				if ($day < 10)		$day = "0$day";
				if ($month < 10)	$month = "0$month";
				if ($month == "0")	$month = date("m");
			
				$date = "$year-$month-$day";
			} elseif (!$day && $month && $year) {
				if ($month < 10) $month = "0$month";
				$date = "$year-$month";
			} elseif (!$month && $year) {
				$date = "$year";
			} elseif (!$year) {
				$date = NULL;
			}
		
			$query = "SELECT DATE_FORMAT(logdate, ".ARCHIVE_DATE_FORMAT.") AS logdate, logtext FROM SysLog WHERE ";
			
			if ($kw)
				$query .= " logtext LIKE '%$kw%'";
			if ($kw && $date)
				$query .= " AND";
			if ($date)
				$query .= " logdate LIKE '$date%'";
			if (!$kw && !$date)
				$query .= " logdate";
			
			$query .= " ORDER BY syslogid DESC";
			
			$results	= $syslog->query($query, false);
		}
	} else {
		$date	= date("Y-m-d");
		$results	= $syslog->query("SELECT DATE_FORMAT(logdate, ".ARCHIVE_DATE_FORMAT.") AS logdate, logtext FROM SysLog WHERE logdate LIKE '$date%' ORDER BY syslogid DESC", false);
	}
	
	$days = array("*");
	for ($i = 1; $i < 32; $i++)
		$days[$i] = $i;
	
	$months = array("*");
	for ($i = 1; $i < 13; $i++)
		$months[$i] = $LANG['MONTHS'][$i];
	
	$years = array("*");
	for ($i = 2004; $i < 2016; $i++)
		$years[$i] = $i;
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('months',			$months);
	$asmarty->assign('days',			$days);
	$asmarty->assign('years',			$years);
	$asmarty->assign('syslog',			$results);
	$asmarty->assign('fvalues',			$formdata->htmlReady());
	display_template('system_logs.tpl',	$asmarty);
