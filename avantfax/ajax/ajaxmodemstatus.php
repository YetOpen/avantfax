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

	require_once '../check_login.php';

	$modeminst		= new FaxModem;
	$modems			= array_key_exists('modems', $_REQUEST) ? explode(",", $_REQUEST['modems']) : NULL;
	
	xml_header();
	echo "<response>\n";
		
	if (count($modems)) {
		foreach ($modems as $modem) {
			if ($modeminst->load_device($modem)) {
				$info = $modeminst->get_status();
				
				echo "<row>\n<modem>$modem</modem>\n<status>".$info['status']."</status>\n<class>".$info['class']."</class>\n</row>\n";
			}
		}
	}
	
	echo "</response>\n";
