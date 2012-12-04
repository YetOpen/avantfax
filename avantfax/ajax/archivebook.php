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

	require_once '../includes/classes.php';

	$addressbook	= new AFAddressBook;
	$query			= array_key_exists('q', $_REQUEST) ? $_REQUEST['q'] : NULL;
	
	xml_header();
	echo "<response>\n";

	if ($SHOW_ALL_CONTACTS || strlen($query) > 1) {
		$results = $addressbook->search_companies($query);
		
		if (is_array($results)) {
			foreach ($results as $info) {
				extract($info);
				
				$company = decode_xmlReady($company);
				
				echo "<row>\n<company>$company</company>\n<cid>$abook_id</cid>\n</row>\n";
			}
		}
	}
	
	echo "</response>";
