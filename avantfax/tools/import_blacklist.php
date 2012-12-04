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
	
	if (empty($_SERVER['argv'][1])) {
		exit("usage: ".$_SERVER['argv'][0]." filename [device]
Example: ".$_SERVER['argv'][0]." blacklist.txt ttyS0
One CallID (fax number) per line\n");
	}
	
	$lines	= file($_SERVER['argv'][1], FILE_IGNORE_NEW_LINES);
	$device	= (array_key_exists(2, $_SERVER['argv'])) ? $_SERVER['argv'][2] : NULL;
	$cnt	= 0;
	
	if (is_array($lines)) {
		foreach ($lines as $callid) {
			$callid = rtrim($callid);
			if (!$callid) continue;
			
			$dc = new DynamicConfig;
			
			if ($dc->create($device, $callid)) {
				echo "Created Rule: $callid\n";
				$cnt++;
			} else {
				echo "Skipping existing rule: $callid\n";
			}
		}
	}
	
	echo "Created $cnt rules\n";
