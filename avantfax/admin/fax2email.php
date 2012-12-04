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

	$gcid			= array_key_exists('abook_id', $_REQUEST) ? $_REQUEST['abook_id'] : NULL;
	$addressbook	= new AFAddressBook;
	$companies		= $addressbook->get_companies(true);
	$company_list	= array();
	
	if (is_array($companies)) {
		foreach ($companies as $entry) {
			$company_list[$entry['abook_id']] = $entry['company'];
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$asmarty = new AdminSmarty;
	$asmarty->assign('selected_cid',	$gcid);
	$asmarty->assign('list',			$company_list);
	display_template('fax2email.tpl',	$asmarty);
