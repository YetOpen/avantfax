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

// Example class to use PAM authentication using PHP's built-in PAM library
// For details on PAM with PHP, see http://svn.php.net/viewvc/pecl/pam/trunk/README?view=markup
// You must create a PHP file for PAM to use in /etc/pam.d/
/*
Example: /etc/pam.d/php
#%PAM-1.0
auth		required	pam_stack.so service=system-auth
account		required	pam_stack.so service=system-auth
session		required	pam_stack.so service=system-auth

OR for LDAP only:

#%PAM-1.0
auth		required	pam_ldap.so
account		required	pam_ldap.so
session		required	pam_ldap.so

OR for testing PAM support:

#%PAM-1.0
auth     required       pam_permit.so
account  required       pam_permit.so

*/

class PAMAuth implements CustomAuth
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
		$error = NULL;
		
		avantfaxlog("class PAMAuth> authenticating user '$username'");

		// Check if PAM extension is loaded
		if (!function_exists('pam_auth')) {
			avantfaxlog("class PAMAuth> error: PAM extension isn't loaded");
			return false;
		}

		if (pam_auth($username, $password, $error)) {
			return true;
		}

		avantfaxlog("class PAMAuth> authentication failed: $error");
		return false;
	}
}
