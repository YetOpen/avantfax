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

	avantfax_session();
	
	$addressbook	= new AFAddressBook;
	$contacts		= $addressbook->get_contacts();
	$query			= array_key_exists('q', $_REQUEST) ? $_REQUEST['q'] : NULL;
	
	xml_header();
	echo "<response>\n";
	
	if ($contacts) {
		foreach ($contacts as $id => $email) {
			$email = decode_xmlReady($email);
		
			if ($query) {
				if (strstr($email, $query)) {
					echo "<row>\n<id>$id</id>\n<email>$email</email>\n</row>\n";
				}
			} else {
				echo "<row>\n<id>$id</id>\n<email>$email</email>\n</row>\n";
			}
		}
	}
	
	echo "</response>";
