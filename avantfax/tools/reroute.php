#!/usr/bin/php
<?php
/**
 * AvantFAX - HylaFAX Web 2.0 interface
 *
 * PHP 5
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

	require realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR).'/includes/classes.php';
	
	// check for proper arguments
	if ($_SERVER['argc'] < 2) {
		exit("Usage: ".$_SERVER['argv'][0]." [device | DIDnum] email-address\n");
	}
	
	$device		= $_SERVER['argv'][1];
	$email		= $_SERVER['argv'][2];

	$modem		= new FaxModem;
	$didr		= new DIDRouting;

	// if in Modem mode
	if (!$ENABLE_DID_ROUTING) {
		if (!$modem->load_device($device)) {
			exit("Error loading device \"$device\"; is it configured with AvantFAX?\n");
		}
		
		$modem->set_contact($email);
	} else {
		if (!$didr->load_route($device)) {
			exit("Error loading DID route for \"$device\"; is it configured with AvantFAX?\n");
		}
		
		$didr->set_contact($email);
	}
