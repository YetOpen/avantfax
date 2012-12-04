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

	$fnid			= array_key_exists('fnid', $_REQUEST) ? $_REQUEST['fnid'] : NULL;

	$addressbook	= new AFAddressBook;
	$addressbook->loadbyfaxnumid($fnid);
	
	$to_person		= decode_xmlReady($addressbook->get_to_person());
	$to_company		= decode_xmlReady($addressbook->get_company());
	$to_location	= decode_xmlReady($addressbook->get_to_location());
	$to_voice		= decode_xmlReady($addressbook->get_to_voicenumber());
	
	xml_header();
	
	echo "<response>
	<row>
		<to_company>$to_company</to_company>
		<to_person>$to_person</to_person>
		<to_location>$to_location</to_location>
		<to_voicenumber>$to_voice</to_voicenumber>
	</row>
</response>";
