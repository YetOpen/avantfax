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

/**
 * CLASS: AFUserPasswords
	METHODS:
		public function __construct()
        public function log_password($pwd, $uid)
        public function password_used($pwd, $uid)
        public function clear_hashes($uid)
*/

class AFUserPasswords
{
	protected	$upid,
				$uid,
				$pwdhash;
	
	private		$userpasswords;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->userpasswords = new MDBOData('UserPasswords');
	}
	
	/**
	 * log_password
	 *
	 * @return bool
	 * @access public
	 */
	public function log_password($pwd, $uid) {
		return $this->userpasswords->new_entry(array('uid' => $uid, 'pwdhash' => md5($pwd)));
	}
	
	/**
	 * password_used
	 *
	 * @return bool
	 * @access public
	 */
	public function password_used($pwd, $uid) {
		return $this->userpasswords->find(array('uid' => $uid, 'pwdhash' => md5($pwd)));
	}
	
	/**
	 * clear_hashes
	 *
	 * @return bool
	 * @access public
	 */
	public function clear_hashes($uid) {
		return $this->userpasswords->query("DELETE FROM UserPasswords WHERE uid = ".$this->userpasswords->quote($uid));
	}	
}
