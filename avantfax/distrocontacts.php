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
	
	$dl		= new DistributionList;
	$dlist	= $dl->get_distrolists();

	$INC_LIST = "<script language=\"javascript\" type=\"text/javascript\" src=\"js/dlcontacts.js\"></script>";
	
	$list = array();
	if (is_array($dlist)) {
		foreach ($dlist as $info) {
			$list[$info['dl_id']] = $info['listname'];
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('contactlist',			$list);
	$usmarty->assign('INC_LIST',			$INC_LIST);
	display_template('distrocontacts.tpl',	$usmarty);
