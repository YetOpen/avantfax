#!/usr/bin/php
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

// # 0 * * * *       /var/www/avantfax/includes/phb.php

	require_once 'classes.php';
	
	$handle = fopen($PHONEBOOK, 'w');
	fputs($handle, "PBOOK1.1");
	
	$addressbook	= new AFAddressBook;
	
	$company_list	= $addressbook->get_companies();
	
	if ($company_list) {
		foreach ($company_list as $entry) {
			extract($entry);
			fputs($handle, "$company|");
			
			$addressbook->loadbycid($abook_id);
			$faxnums = $addressbook->get_faxnums();
			
			$cnt = 0;
			
			foreach ($faxnums as $fax) {
				if ($cnt > 0) fputs($handle, ";");
				if (strlen($fax['faxnumber'])) {
					$cnt++;
					fputs($handle, $fax['faxnumber']);
				}
			}
			fputs($handle, "|||||||");
		}
	}
	
	fclose($handle);
