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
		exit("usage: ".$_SERVER['argv'][0]." filename
Example: ".$_SERVER['argv'][0]." users.txt
One user entry per line with fields: name, username, password, and email separated by 1 tab
Example:
John Doe\tjohndoe\tpassw0rd\tjohn.doe@mycompany.com
NOTE: Be sure to set \$AVANTFAX_SERVERNAME in includes/local_config.php before running this script\n");
	}
	
	$lines = file($_SERVER['argv'][1], FILE_IGNORE_NEW_LINES);
	
	$user_details = array(
		'name'		=> NULL,
		'username'	=> NULL,
		'password'	=> NULL,
		'email'		=> NULL,
		'email_sig' => NULL,
		'from_company'		=> $FROM_COMPANY,
		'from_location'		=> $FROM_LOCATION,
		'from_voicenumber'	=> $FROM_VOICENUMBER,
		'from_faxnumber'	=> $FROM_FAXNUMBER,
		'superuser'	=> 0,
		'can_del'	=> 0,
		'language'	=> $dft_config_lang,
		'pwdcycle'	=> 0,
		'pwd_reuse'	=> 0,
		'is_admin'	=> 0,
		'acc_enabled' => 1
	);
	
	if (is_array($lines)) {
		foreach ($lines as $line) {
			$line = rtrim($line);
			if (!$line) continue;
			
			list($name, $username, $password, $email) = explode("\t", $line, 4);
	
			$user_details['name']		= $name;
			$user_details['username']	= $username;
			$user_details['password']	= $password;
			$user_details['email']		= $email;
			
			$user = new AFUserAccount;
			
			if ($user->create($user_details)) {
		//		$user->set_faxcats($arrays['faxcats']);
		//		$user->set_didrouting($arrays['didrouting']);
		//		$user->set_modemdevs($arrays['modemdevs']);
		//		$user->update();
				echo "user> $name: ".$LANG['USER_DETAILS_SAVED']."\n";
			} else {
				echo "Error> $name: ".$user->get_error()."\n";
			}
		}
	}
