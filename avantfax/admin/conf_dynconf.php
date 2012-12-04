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
	
	$dc	= new DynamicConfig;
	$list	= $dc->list_rules();
	$flist	= array();
	
	if (is_array($list)) {
		foreach ($list as $entry) {
			$dev = ($entry['device']) ? " - ".$entry['device'] : "";
			$flist[$entry['dynconf_id']] = $entry['callid'].$dev;
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('rules',				$flist);
	display_template('conf_dynconf.tpl',	$asmarty);
