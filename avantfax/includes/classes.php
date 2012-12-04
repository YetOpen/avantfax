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

require_once 'config.php';


/**
 * __autoload function
 *
 * @param string class_name
 */
function __autoload($class_name) {
	require_once $class_name . '.php';
}

/**
 * AFSmarty
 */
class AFSmarty extends Smarty
{
	public function __construct() {
		$this->plugins_dir[]	= PLUGINS_DIR;
	}

	public function no_cache() {
		$this->caching			= false;
	}
	
	public function enable_caching() {
		$this->caching			= true;
	}
}

/**
 * AdminSmarty
 */
class AdminSmarty extends AFSmarty
{
	public function __construct() {
		$this->template_dir		= ADMINTHEME_DIR . 'templates';
		$this->compile_dir		= ADMINTHEME_DIR . 'templates_c';
		$this->config_dir		= ADMINTHEME_DIR . 'configs';
		$this->cache_dir		= ADMINTHEME_DIR . 'cache';
		parent::__construct();
	}
}

/**
 * UserSmarty
 *
 */
class UserSmarty extends AFSmarty
{
	public function __construct() {
		$this->template_dir		= USERTHEME_DIR . 'templates';
		$this->compile_dir		= USERTHEME_DIR . 'templates_c';
		$this->config_dir		= USERTHEME_DIR . 'configs';
		$this->cache_dir		= USERTHEME_DIR . 'cache';
		parent::__construct();
	}
}

/**
 * avantfaxSQL class
 *
 * For use with the AvantFAX database
 * Extends the SQL class
 */
class avantfaxSQL extends SQL
{
	protected	$db_user	= AFDB_USER,
				$db_pass	= AFDB_PASS,
				$db_name	= AFDB_NAME,
				$db_engine	= AFDB_ENGINE,
				$db_host	= AFDB_HOST;

	public function __construct() {
		if (!$this->connect($this->db_user, $this->db_pass, $this->db_name, $this->db_host, $this->db_engine)) {
			if (array_key_exists('SERVER_ADDR', $_SERVER)) {	
				header("Location: no-database.php");
				exit;
			}
		}
		$this->debug = false; // output SQL queries
	}
}

/**
 * afDB class
 *
 * For use with the AvantFAX database
 * Extends the MDBObject class
 */
class afDB extends MDBObject
{
	public function __construct() {
		$this->db = new avantfaxSQL;		// connect to AvantFAX database
	}
}

/**
 * DATABASE EXTRACTION CLASSES
 * - Public variables are the column names of the database
 * - The constructor must set the table_id_name variable to the unique column id
 * - Class name must match Table name
 * - Must extend the afDB class
 */

/**
 * DistroList class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class DistroList extends afDB
{
	public $dl_id, $listname, $listdata, $lastmod_date, $lastmod_user;
	
	public function __construct() {
		$this->table_id_name	= 'dl_id';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * UserAccount class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class UserAccount extends afDB
{
	public $uid, $name, $username, $password, $email, $email_sig, $from_company, $from_location, $from_voicenumber, $from_faxnumber,
		$superuser, $can_del, $last_mod, $last_login, $last_ip, $language, $modemdevs, $didrouting, $faxcats, $pwdexpire, $pwdcycle, $user_tsi,
		$pwd_reuse, $wasreset, $acc_enabled, $deleted, $any_modem, $coverpage_id, $faxperpageinbox, $faxperpagearchive, $is_admin;
	
	public function __construct() {
		$this->table_id_name	= 'uid';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * UserPasswords class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class UserPasswords extends afDB
{
	public $upid, $uid, $pwdhash;
	
	public function __construct() {
		$this->table_id_name	= 'upid';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * AddressBook class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */

class AddressBook extends afDB
{
	public $abook_id, $company;
	
	public function __construct() {
		$this->table_id_name	= 'abook_id';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * AddressBookEmail class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */

class AddressBookEmail extends afDB
{
	public $abookemail_id, $abook_id, $contact_name, $contact_email;
	
	public function __construct() {
		$this->table_id_name	= 'abookemail_id';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}


/**
 * AddressBookFAX class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */

class AddressBookFAX extends afDB
{
	public $abookfax_id, $abook_id, $faxnumber, $email, $description, $to_person, $to_location, $to_voicenumber, $faxcatid, $printer, $faxfrom, $faxto;
	
	public function __construct() {
		$this->table_id_name	= 'abookfax_id';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * Modems class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class Modems extends afDB
{
	public $devid, $device, $alias, $contact, $printer, $faxcatid;
	
	public function __construct() {
		$this->table_id_name	= 'devid';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * CoverPages class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class CoverPages extends afDB
{
	public $cover_id, $title, $file;
	
	public function __construct() {
		$this->table_id_name	= 'cover_id';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * DIDRoute class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class DIDRoute extends afDB
{
	public $didr_id, $routecode, $alias, $contact, $printer, $faxcatid;
	
	public function __construct() {
		$this->table_id_name	= 'didr_id';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * BarcodeRoute class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class BarcodeRoute extends afDB
{
	public $barcode_id, $barcode, $alias, $contact, $printer, $faxcatid;
	
	public function __construct() {
		$this->table_id_name	= 'barcode_id';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 *  class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class FaxArchive extends afDB
{
	public $fid, $faxnumid, $companyid, $faxpath, $pages, $faxcatid, $didr_id, $description, $lastoperation, $lastmoduser, $lastmoddate,
		$archstamp, $modemdev, $userid, $origfaxnum, $inbox, $faxcontent;
	
	public function __construct() {
		$this->table_id_name	= 'fid';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * FaxCategory class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class FaxCategory extends afDB
{
	public $catid, $name;
	
	public function __construct() {
		$this->table_id_name	= 'catid';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * SysLog class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class SysLog extends afDB
{
	public $syslogid, $logdate, $logtext;
	
	public function __construct() {
		$this->table_id_name	= 'syslogid';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * DynConf class
 *
 * For use with the (class name) table
 * Extends the afDB class
 */
class DynConf extends afDB
{
	public $dynconf_id, $device, $callid;
	
	public function __construct() {
		$this->table_id_name	= 'dynconf_id';
		
		$this->table_name		= get_class();
		parent::__construct();
	}
}

/**
 * CustomAuth interface
 *
 */
interface CustomAuth
{
	public function login($username, $password);
}

