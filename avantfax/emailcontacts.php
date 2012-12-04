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

	$INC_LIST = "<script language=\"javascript\" type=\"text/javascript\" src=\"js/emailbook.js\"></script>";
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('INC_LIST',			$INC_LIST);
	$usmarty->assign('EMAILDEST_ID',		(array_key_exists('emaildest_id', $_GET)) ? $_GET['emaildest_id'] : NULL);
	display_template('emailcontacts.tpl',	$usmarty);
