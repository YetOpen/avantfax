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

// Example class to use PAM authentication using 'pwauth'
// http://code.google.com/p/pwauth/
// Be sure to edit config.h to enable PAM support before compiling pwauth
// Note: you might need to add "-lpam" to LIB in the Makefile in order for pwauth to compile with PAM support
/* Example PAM file: /etc/pam.d/pwauth
#%PAM-1.0
auth	sufficient	/lib/security/pam_stack.so service=system-auth
account	sufficient	/lib/security/pam_stack.so service=system-auth
*/


define('PWAUTHPATH', '/usr/local/bin/pwauth');

class PWAuth implements CustomAuth
{
	/**
	 * login
	 * - Returns true on success, false on failure
	 *
	 * @param string username
	 * @param string password
	 * @return bool
	 */
	public function login($username, $password) {
		$descriptorspec = array(
			0 => array("pipe", "r"),
			1 => array("pipe", "w"),
			2 => array("pipe", "w")
		);
		
		avantfaxlog("class PWAuth> authenticating user '$username'");

		$process = proc_open(PWAUTHPATH, $descriptorspec, $pipes);

		if (is_resource($process)) {
			fwrite($pipes[0], "$username\n$password");
			fclose($pipes[0]);

			$output = stream_get_contents($pipes[1]);
			fclose($pipes[1]);
			fclose($pipes[2]);

			$return_value = proc_close($process);

			switch($return_value) {
				case 0:	// Valid Login
					return true;
				case 1: // Login doesn't exist or password incorrect
				case 2: // Password was incorrect
				default:
					avantfaxlog("class PWAuth> authentication failed for user '$username', return value $return_value");
					return false;
			}
		}

		avantfaxlog("class PWAuth> error executing ".PWAUTHPATH);
		return false;
	}
}
