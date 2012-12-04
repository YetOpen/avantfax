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

	$dl				= new DistributionList;
	$list			= $dl->get_distrolists();
	$distrolists	= array();
	
	if (is_array($list)) {
		foreach ($list as $info) {
			$distrolists[$info['dl_id']] = $info['listname'];
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('distrolists',		$distrolists);
	$usmarty->assign('numfaxesinbox',	get_inbox_count());	// number of faxes in inbox
	display_template('distrolist.tpl',	$usmarty);
