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
	
	$didroutes = new DIDRouting;
	$didr_list = array();
	
	while ($didroutes->list_routes($didr_id, $alias, $routecode)) {
		$didr_list[$didr_id] = "$routecode - $alias";
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('didroutes',			$didr_list);
	display_template('conf_didroute.tpl',	$asmarty);
