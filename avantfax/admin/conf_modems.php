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
	
	$modem = new FaxModem;
	$devices = array();
	while ($modem->list_modems($devid, $alias, $device)) {
		$devices[$device] = "$device - $alias";
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('devices',			$devices);
	display_template('conf_modems.tpl',	$asmarty);
