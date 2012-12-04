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
	
	$cnt		= 0;
	$modem_list	= array();
	$modeminst	= new FaxModem;
	$modems		= $modeminst->get_modems();
	if (is_array($modems)) {
		foreach ($modems as $modem) {
			$modeminst->load_device($modem);
			$modem_list[$cnt]['alias']	= $modeminst->get_alias();
			$modem_list[$cnt]['status']	= $modeminst->get_status();
			$cnt++;
		}
	}
	
	$cnt	= 0;
	$users	= array();
	$user	= new AFUserAccount;
	while ($user->list_accounts()) {
		$users[$cnt]['uid']			= $user->get_uid();
		$users[$cnt]['name']		= $user->name;
		$users[$cnt]['last_ip']		= $user->last_ip;
		$users[$cnt]['email']		= $user->email;
		$users[$cnt]['superuser']	= $user->superuser;
		$users[$cnt]['username']	= $user->username;
		$users[$cnt]['last_login']	= $user->last_login;
		$cnt++;
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('modems',		$modem_list);
	$asmarty->assign('users',		$users);
	display_template('users_list.tpl',	$asmarty);
