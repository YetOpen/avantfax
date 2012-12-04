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

/*
 * CLASS: AFUserAccount
 	METHODS:
		public function __construct()
		public function init_db()
        public function create(array $details)
        public function list_accounts()
        public function update()
        public function user_update()
        public function change_password($pwd)
        public function reset_password($email)
        public function set_newpassword($oldpwd, $newpwd)
        public function login($username, $password, $admin = false)
        public function load($userid)
        public function load_username($username)
		public function loadbyemail($email)
        public function remove($userid)
        public function get_error()
        public function is_expired()
        public function check_login()
        public function check_admin_login()
        public function get_uid()
        public function get_modemdevs()
        public function get_faxcats()
        public function get_didrouting()
		public function get_allvalues()
        public function set_faxcats($val)
        public function set_modemdevs($val)
        public function set_didrouting($val)
        public function set_username($username)
        public function set_email($email)
        private function __unset($varname)
        private function __isset($varname)
        private function __get($varname)
        private function __set($varname, $value)
        private function load_vals(array $data)
*/

class AFUserAccount
{
	/* relative to the database */
	protected	$uid,
				$dbdata;
	
	/* only for the class */
	private		$error,
				$debug				= false,
				$logged_in 			= false,
				$admin_logged_in	= false,
				$pwdexpired;
	
	private		$useraccount, $userpasswords;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->userpasswords	= new AFUserPasswords;
		$this->useraccount		= new MDBOData('UserAccount');
	}
	
	/**
	 * init_db
	 *
	 * @return void
	 * @access public
	 */
	public function init_db() {
		$this->useraccount	= new MDBOData('UserAccount');
		$this->load($this->uid);
	}

	/**
	 * create - create a new account
	 *
	 * @param array details
	 * @return bool
	 * @access public
	 */
	public function create(array $details) {
		global $LANG, $SYSTEM_IP, $grep_function, $SUDO, $FAXADDUSER;
		
		$this->load_vals($details);
		
		// assign random password is one is not defined
		if (!$this->dbdata['password']) {
			$pwdxemail						= genpasswd();
			$this->dbdata['password']		= md5($pwdxemail);
			$this->dbdata['wasreset']		= true;
		} else {
			$pwdxemail						= $this->dbdata['password'];
			$this->dbdata['password']		= md5($this->dbdata['password']);
			$this->dbdata['wasreset']		= false;
		}
		
		if ($grep_function("/[^\.\w]/", $this->dbdata['username'])) {
			$this->error = $LANG['REGWARN_USERNAME'];
			return false;
		}
		
		// check if email already exists
		if ($this->useraccount->find(array('email' => $this->dbdata['email']))) {
			$this->error = $LANG['REGWARN_MAIL_EXISTS'];
			return false;
		}
		
		// check if username already exists
		if ($this->useraccount->find(array('username' => $this->dbdata['username']))) {
			$this->error = $LANG['REGWARN_USERNAME_INUSE'];
			return false;
		}
		
		// calculate when password should expire
		switch ($this->dbdata['pwdcycle']) {
			case "3":	$this->dbdata['pwdexpire'] = date("Y-m-d", mktime(0, 0, 0, date("m")+3, date("d"), date("Y"))); break;
			case "6":	$this->dbdata['pwdexpire'] = date("Y-m-d", mktime(0, 0, 0, date("m")+6, date("d"), date("Y"))); break;
			default:	$this->dbdata['pwdexpire'] = NULL; break;
		}
		
		if ($this->useraccount->new_entry($this->dbdata)) {
			$this->uid = $this->useraccount->get_id();
			
			// Add them to HylaFAX
			system("$SUDO $FAXADDUSER -u ".escapeshellarg($this->uid)." -p ".escapeshellarg($pwdxemail)." ".escapeshellarg($this->dbdata['username']));
			
			avantfaxlog("class UserAccount> Account created: $this->name (".$this->dbdata['username'].") &lt;$this->email&gt; Pwd: $pwdxemail");
	
			// email new password to email address
			send_mail($this->dbdata['email'], get_admin_email(), $LANG['NEW_USER_MESSAGE_SUBJECT'],
							sprintf($LANG['NEW_USER_MESSAGE'], $this->dbdata['name'], $SYSTEM_IP, $this->dbdata['username'], $pwdxemail));
			return true;
		} else {
			$this->error = "Account creation failed";
			avantfaxlog("class UserAccount> Account creation failed");
			return false;
		}
	}
	
	/**
	 * list_accounts
	 * get list of accounts for admin
	 * first call runs sql query and returns first result
	 * subsequent calls return next result
	 * after last result, return false
	 *
	 * @return bool
	 * @access public
	 */
	public function list_accounts() {
		static $queried, $results;
		
		// check if $queried already exists
		if ($queried != true) { // run query
			$results	= $this->useraccount->query("SELECT * FROM UserAccount WHERE deleted is null OR deleted = 0 ORDER BY name", false);
			$queried	= true;
		}
		
		if (is_array($results)) {
			if ($data = array_shift($results)) {
				$this->load_vals($data);
				return true;
			}
		}
		
		$queried	= false;
		$results	= NULL;
		return false;
	}
	
	/**
	 * update - update the account
	 *
	 * @return bool
	 * @access public
	 */
	public function update() {
		if (!$this->uid) { $this->error = "No uid set"; return false; }
		
		return $this->useraccount->update_entry($this->dbdata);
	}
	
	/**
	 * user_update - update the account
	 *
	 * @return bool
	 * @access public
	 */
	public function user_update() {
		if (!$this->uid) { $this->error = "No uid set"; return false; }
		
		return $this->useraccount->update_entry($this->dbdata);
	}
	
	/**
	 * change_password - pwd must be min 8 chars
	 *
	 * @param string pwd
	 * @return bool
	 * @access public
	 */
	public function change_password($pwd) {
		if (!$this->uid) { $this->error = "No uid set"; return false; }
		
		global $FAXADDUSER, $FAXDELUSER, $SUDO, $LANG;
		
		if (str_len($pwd) < MIN_PASSWD_SIZE)	{ $this->error = $LANG['PASS_TOO_SHORT'];	return false; }
		if (str_len($pwd) > MAX_PASSWD_SIZE)	{ $this->error = $LANG['PASS_TOO_LONG'];	return false; }
		
		// check if password has already been used before
		if (!$this->dbdata['pwd_reuse']) {
			if ($this->userpasswords->password_used($pwd, $this->uid)) {
				$this->error = $LANG['PASS_ALREADY_USED'];
				return false;
			}
		}
		
		// update pwdexpire
		switch ($this->dbdata['pwdcycle']) {
			case "3":	$this->dbdata['pwdexpire'] = date("Y-m-d", mktime(0, 0, 0, date("m")+3, date("d"), date("Y"))); break;
			case "6":	$this->dbdata['pwdexpire'] = date("Y-m-d", mktime(0, 0, 0, date("m")+6, date("d"), date("Y"))); break;
			default:		$this->dbdata['pwdexpire'] = NULL; break;
		}
		
		// change the password, unset wasreset
		if ($this->useraccount->update_entry(array('pwdexpire' => $this->dbdata['pwdexpire'], 'password' => md5($pwd), 'wasreset' => FALSE))) {
			// save password to UserPasswords db
			if ($this->userpasswords->log_password($pwd, $this->uid)) {
				avantfaxlog("class UserAccount> Successfully changed password for ".$this->dbdata['username']);
				// change their hylafax password
				system("$SUDO $FAXDELUSER '".escapeshellarg($this->dbdata['username'])."' ; $SUDO $FAXADDUSER -u ".escapeshellarg($this->uid)." -p ".escapeshellarg($pwd)." ".escapeshellarg($this->dbdata['username']));
				return true;
			}
		}
		
		avantfaxlog("class UserAccount> failed to change password for ".$this->dbdata['username']);
		return false;
	}
	
	/**
	 * reset_password - automatic password creation and emailing of password to client
	 *
	 * @param string email
	 * @return bool
	 * @access public
	 */
	public function reset_password($email) {
		if (!$email) return false;
	
		global $LANG;
		
		$pwd		= genpasswd();

		if ($result = $this->useraccount->find(array('email' => $email))) {
			$this->load($result['uid']);
			$username	= $result['username'];
			
			if (!$this->useraccount->update_entry(array('password' => md5($pwd), 'wasreset' => TRUE))) {
				$this->error = "${LANG['PASS_ERROR_RESETTING']} $username";
				avantfaxlog("class UserAccount> Error reseting password for $username");
				return false;
			}
			
			avantfaxlog("class UserAccount> reset password \"$pwd\" for $username &lt;$email&gt; from IP: ".$_SERVER['REMOTE_ADDR']);
			
			// email new password to email address
			if (send_mail($email, get_admin_email(), "password reset", sprintf($LANG['NEWPASS_MSG'], $username, $_SERVER['REMOTE_ADDR'], $pwd))) {
				return true;
			}
			
			$this->error = $LANG['ERROR_SENDING_EMAIL'];
		} else {
			$this->error = $LANG['ERROR_PASS'];
			avantfaxlog("class UserAccount> Attempt to reset password for email '$email' from IP: ".$_SERVER['REMOTE_ADDR']);
		}
		return false;
	}
	
	/**
	 * set_newpassword
	 *
	 * @param string oldpwd
	 * @param string newpwd
	 * @return bool
	 * @access public
	 */
	public function set_newpassword($oldpwd, $newpwd) {
		if (!$this->uid) { $this->error = "No uid set"; return false; }
		global $LANG;
		
		if (str_len($oldpwd) < MIN_PASSWD_SIZE) {
			$this->error = $LANG['PASS_TOO_SHORT'];
			return false;
		}
		
		$oldpwd = md5($oldpwd);
		
		if ($this->useraccount->find(array('uid' => $this->uid, 'password' => $oldpwd))) {
			if ($this->change_password($newpwd)) {
				avantfaxlog("class UserAccount> set new password for \"$this->username\" from IP: ".$_SERVER['REMOTE_ADDR']);
				return true;
			}
		} else {
			$this->error = $LANG['OPASS_WRONG'];
		}
		return false;
	}

	/**
	 * login - log the user in
	 *
	 * @param string username
	 * @param string password
	 * @return bool
	 * @access public
	 */
	public function login($username, $password, $admin = false) {
		global $LANG;
		
		$credentials = array('username' => $username, 'password' => md5($password));
		
		if ($admin === true)
			$credentials['is_admin'] = true;
		
		if ($data = $this->useraccount->find($credentials)) {
			if ($data['acc_enabled'] == true) {
				avantfaxlog("class UserAccount> Login successful for '$username' from IP: '${_SERVER['REMOTE_ADDR']}'");
				
				$expire = date("Y-m-d");
				// CHECK PWD EXPIRATION DATE
				if ($expire >= $data['pwdexpire'] && $data['pwdcycle'] != 0)
					$this->pwdexpired = true;
				
				// users must create a password on first login
				if ($data['last_login'] == NULL)
					$this->pwdexpired = true;
					
				// if password was automatically reset, they must change it
				if ($data['wasreset'] == TRUE)
					$this->pwdexpired = true;
						
				$this->logged_in = true;
				
				if ($data['is_admin'])
					$this->admin_logged_in = true;
				
				$this->load_vals($data);
				$this->useraccount->data->set_id($this->uid);
				
				// update last_login & last_ip
				$data['last_login']	= 'NOW()';
				$data['last_ip']	= $_SERVER['REMOTE_ADDR'];
				$this->useraccount->update_entry($data);
				return true;
			} else {
				$this->logged_in = false;
				$this->error = $LANG['LOGIN_DISABLED'];
			}
		} else {
			$this->logged_in = false;
			$this->error = $LANG['LOGIN_INCORRECT'];
		}
		
		$passwd = "XXXXXX".substr($password, -3);
		
		avantfaxlog("class UserAccount> failed login attempt for '$username' pwd: '$passwd' from IP: '${_SERVER['REMOTE_ADDR']}'");
		return false;
	}
	
	
	/**
	 * login_webauth - log the user in using an alternate method
	 *
	 * @param string username
	 * @return bool
	 * @access public
	 */
	public function login_webauth($username, $admin = false) {
		global $LANG;
		
		$credentials = array('username' => $username);
		
		if ($admin === true)
			$credentials['is_admin'] = true;
		
		if ($data = $this->useraccount->find($credentials)) {
			if ($data['acc_enabled'] == true) {
				avantfaxlog("class UserAccount> Alternate Login successful for user '$username' from IP: '${_SERVER['REMOTE_ADDR']}'");
				
				$this->logged_in = true;
				
				if ($data['is_admin'])
					$this->admin_logged_in = true;
				
				$this->load_vals($data);
				$this->useraccount->data->set_id($this->uid);
				
				// update last_login & last_ip
				$data['last_login']	= 'NOW()';
				$data['last_ip']	= $_SERVER['REMOTE_ADDR'];
				$this->useraccount->update_entry($data);
				return true;
			} else {
				$this->logged_in = false;
				$this->error = $LANG['LOGIN_DISABLED'];
			}
		} else {
			$this->logged_in = false;
			$this->error = sprintf($LANG['LOGIN_ALT_FAILED'], $username);
		}
				
		avantfaxlog("class UserAccount> failed webauth login attempt for user '$username' from IP: '${_SERVER['REMOTE_ADDR']}'");
		return false;
	}
	
	/**
	 * login_alternate_auth - log the user in using an external program (ie: pwauth)
	 *
	 * @param string username
	 * @return bool
	 * @access public
	 */
	public function login_alternate_auth($username, $password, $admin = false) {
		global $LANG, $ALTERNATE_AUTH_CLASS;
		
		$myclass = new $ALTERNATE_AUTH_CLASS;
		
		if (!$myclass instanceof CustomAuth) {
			trigger_error("'$ALTERNATE_AUTH_CLASS' is not a CustomAuth class");
			exit;
		}
		
		if (!$myclass->login($username, $password)) {
			avantfaxlog("class UserAccount> failed '$ALTERNATE_AUTH_CLASS' login attempt for user '$username' from IP: '${_SERVER['REMOTE_ADDR']}'");
			$this->error = $LANG['LOGIN_INCORRECT'];
			$this->logged_in = false;
			return false;
		}
		
		$credentials = array('username' => $username);
		
		if ($admin === true)
			$credentials['is_admin'] = true;
		
		if ($data = $this->useraccount->find($credentials)) {
			if ($data['acc_enabled'] == true) {
				avantfaxlog("class UserAccount> '$ALTERNATE_AUTH_CLASS' login successful for user '$username' from IP: '${_SERVER['REMOTE_ADDR']}'");
				
				$this->logged_in = true;
				
				if ($data['is_admin'])
					$this->admin_logged_in = true;
				
				$this->load_vals($data);
				$this->useraccount->data->set_id($this->uid);
				
				// update last_login & last_ip
				$data['last_login']	= 'NOW()';
				$data['last_ip']	= $_SERVER['REMOTE_ADDR'];
				$this->useraccount->update_entry($data);
				return true;
			} else {
				$this->logged_in = false;
				$this->error = $LANG['LOGIN_DISABLED'];
			}
		} else {
			$this->logged_in = false;
			$this->error = sprintf($LANG['LOGIN_ALT_FAILED'], $username);
		}
				
		avantfaxlog("class UserAccount> failed '$ALTERNATE_AUTH_CLASS' login attempt for user '$username' from IP: '${_SERVER['REMOTE_ADDR']}'");
		return false;
	}
	
	
	/**
	 * load - load the account referrenced by userid
	 *
	 * @param integer userid
	 * @return bool
	 * @access public
	 */
	public function load($userid) {
		if (!$userid) { $this->error = "No userid"; return false; }
		
		if ($this->useraccount->load($userid)) {
			$this->load_vals($this->useraccount->get_info());
			
			return true;
		} else {
			$this->error = "Invalid userid";
		}
		return false;
	}
	
	/**
	 * load_username - load the account referrenced by username
	 *
	 * @param string username 
	 * @return bool
	 * @access public
	 */
	public function load_username($username) {
		if (!$username) { $this->error = "No username"; return false; }
		
		if ($data = $this->useraccount->find(array('username' => $username))) {
			$this->load_vals($data);
			
			return true;
		} else {
			$this->error = "Invalid username";
		}
		return false;
	}
	
	/**
	 * loadbyemail - load the account referrenced by email address
	 *
	 * @param string email
	 * @return bool
	 * @access public
	 */
	public function loadbyemail($email) {
		if (!$email) { $this->error = "No email"; return false; }
		
		if ($data = $this->useraccount->find(array('email' => $email))) {
			$this->load_vals($data);
			
			return true;
		} else {
			$this->error = "Invalid username";
		}
		return false;
	}
	
	/**
	 * remove
	 * keep entry in DB so that sent faxes can still be referrenced to this user
	 * remove the username and email in case they are to be used again later
	 * 
	 * NB: if they set the username, the password needs to be changed in order to update hosts.faxd
	 * But I don't have a plain text password to use with faxadduser
	 *
	 * @param integer userid
	 * @return bool
	 * @access public
	 */
	public function remove($userid) {
		if (!$userid) { $this->error = "No UserAccount to remove"; return false; }
		global $SUDO, $FAXDELUSER;
	
		if ($this->useraccount->load($userid)) {
			$this->load_vals($this->useraccount->get_info());
			// remove user from hylafax hosts
			system("$SUDO $FAXDELUSER ".escapeshellarg($this->dbdata['username']));
			avantfaxlog("class UserAccount> removed '".$this->dbdata['username']."' from hosts file");
		} else {
			avantfaxlog("class UserAccount> Error deleting account $userid: Not found");
			return false;
		}
		
		$this->useraccount->update_entry(array('deleted' => TRUE, 'acc_enabled' => FALSE, 'wasreset' => TRUE, 'email' => NULL, 'username' => NULL, 'password' => NULL));
		
		// delete old password hashes
		$this->userpasswords->clear_hashes($userid);
		
		avantfaxlog("class UserAccount> userid '$userid' removed");
		return true;
	}

	/**
	 * 
	 */
	public function get_error()				{ return $this->error; }
	public function is_expired()			{ return $this->pwdexpired; }
	public function check_login()			{ return $this->logged_in; }
	public function check_admin_login()	{ return $this->admin_logged_in; }

	public function get_uid()				{ return $this->uid; }
	public function get_allvalues()			{ return $this->dbdata; }

	/**
	 * get_modemdevs
	 *
	 * @return array
	 * @access public
	 */
	public function get_modemdevs() {
		if (is_array($this->dbdata)) {
			if (array_key_exists('modemdevs', $this->dbdata)) {
				return explode("|", $this->dbdata['modemdevs']);
			}
		}
		return array();
	}
	
	/**
	 * get_faxcats
	 *
	 * @return array
	 * @access public
	 */
	public function get_faxcats() {
		if (array_key_exists('faxcats', $this->dbdata)) {
			return explode("|", $this->dbdata['faxcats']);
		}
		return array();
	}
	
	/**
	 * get_didrouting
	 *
	 * @return array
	 * @access public
	 */
	 public function get_didrouting() {
	 	if (is_array($this->dbdata)) {
			if (array_key_exists('didrouting', $this->dbdata)) {
				return explode("|", $this->dbdata['didrouting']);
			}
		}
		return array();
	}
	
	/**
	 * set_faxcats
	 *
	 * @param string val
	 * @return bool
	 * @access public
	 */
	public function set_faxcats(array $val = NULL) {
		if (!$this->uid) return false;
		
		if (count($val)) {
			$this->faxcats = implode("|", $val);
		} else {
			$this->faxcats = NULL;
		}
		
		return true;
	}
	
	/**
	 * set_didrouting
	 *
	 * @param string val
	 * @return bool
	 * @access public
	 */
	public function set_didrouting(array $val = NULL) {
		if (!$this->uid) return false;
		
		if (count($val)) {
			$this->didrouting = implode("|", $val);
		} else {
			$this->didrouting = NULL;
		}
		
		return true;
	}
	
	/**
	 * set_modemdevs
	 *
	 * @param string val
	 * @return bool
	 * @access public
	 */
	public function set_modemdevs(array $val = NULL) {
		if (!$this->uid) return false;
		
		if (count($val)) {
			$this->modemdevs = implode("|", $val);
		} else {
			$this->modemdevs = NULL;
		}
		
		return true;
	}
	
	/**
	 * set_username
	 *
	 * @param string val
	 * @return bool
	 * @access public
	 */
	public function set_username($username) {
		if (!$this->uid) return false;
		global $LANG, $grep_function;
		
		if ($grep_function("/[^\.\w]/", $this->username)) {
			$this->error = $LANG['REGWARN_USERNAME'];
			return false;
		}
		
		if ($this->useraccount->query("SELECT uid FROM UserAccount WHERE username = ".$this->useraccount->quote($username)." AND uid != ".$this->useraccount->quote($this->uid))) {
			$this->error = $LANG['REGWARN_USERNAME_INUSE'];
			return false;
		}
		
//		$this->useraccount->update_entry(array('username' => $username));
		$this->dbdata['username'] = $username;
		return true;
	}
	
	/**
	 * set_email - check validity of email address and if another user is already using it
	 *
	 * @param string val
	 * @return bool
	 * @access public
	 */
	public function set_email($email)	{
		if (!$this->uid) return false;
		global $LANG;
		
		// check if being used by another account
		if ($this->useraccount->query("SELECT uid FROM UserAccount WHERE email = ".$this->useraccount->quote($email)." AND uid != ".$this->useraccount->quote($this->uid))) {
			$this->error = $LANG['REGWARN_MAIL_EXISTS'];
			return false;
		}

		$this->dbdata['email'] = $email;
		return true;
	}
	
	/**
	 * PRIVATE FUNCTIONS
	 */
	
	/**
	 * __unset
	 *
	 * @param string varname
	 * @return void
	 * @access private
	 */
	private function __unset($varname) {
		if (is_array($this->dbdata)) {
			$this->unsetRule($this->dbdata[$varname]);
		}
	}
	
	/**
	 * __isset
	 *
	 * @param string varname
	 * @return bool
	 * @access private
	 */
	private function __isset($varname) {
		if (is_array($this->dbdata)) {
			if (array_key_exists($varname, $this->dbdata)) {
				return isset($this->dbdata[$varname]);
			}
		}
		return false;
	}
	
	/**
	 * __get
	 *
	 * @param string varname
	 * @return mixed value of varname
	 * @access private
	 */
	private function __get($varname) {
		if (is_array($this->dbdata)) {
			if (array_key_exists($varname, $this->dbdata)) {
				return html_entity_decode($this->dbdata[$varname], ENT_QUOTES, "UTF-8");
			}
		}
		return NULL;
	}
	
	/**
	 * __set
	 *
	 * @param string varname
	 * @param mixed value for varname
	 * @return void
	 * @access private
	 */
	private function __set($varname, $value) {
		// except for email, username and password
		$this->dbdata[$varname] = $value;
		
		if ($this->debug)
			echo "<p>Setting: $varname = $value";
	}
	
	/**
	 * load_vals
	 *
	 * @param array data
	 * @return bool
	 * @access private
	 */
	private function load_vals(array $data) {
		if (is_array($this->dbdata)) {
			$this->dbdata	= array_merge($this->dbdata, $data);
		} else {
			$this->dbdata	= $data; 
		}
			
		if (array_key_exists('uid', $this->dbdata)) {
			$this->uid		= $this->dbdata['uid'];
//			unset($this->dbdata['uid']);
		}
		return true;
	}
}
