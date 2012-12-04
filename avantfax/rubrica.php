<?php
/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 * PHP 5 only
 *
 * @author		David D. Mimms, Jr. <david@avantfax.com>
 * @copyright		2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright		2007 iFAX Solutions, Inc.
 * @license 		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

	require_once 'check_login.php';

	$INC_LIST = "<script type=\"text/javascript\" src=\"js/xhrobject.js\"></script>
<script type=\"text/javascript\" src=\"js/archivebook.js\"></script>";
	
	$cid = array_key_exists('cid', $_GET) ? $_GET['cid'] : NULL;
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('cid',			$cid);
	$usmarty->assign('INC_LIST',	$INC_LIST);
	display_template('rubrica.tpl',	$usmarty);
