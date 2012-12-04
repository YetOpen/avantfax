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
 * INTERFACE: iMDBObject
	METHODS:
		public function get_table_name()
		public function get_table_id()
		public function get_db()
		public function get_id()
		public function set_id($id)
		public function set_vars(array $vals)
	
 * @description
 * This class is used for storing data in a table.  The class that extends this class must list all of a database table's fields as public variables.

		CREATE TABLE IF NOT EXISTS DistroList(
			dl_id			INT auto_increment KEY,
			listname		VARCHAR(255) NOT NULL,
			listdata		TEXT,
			lastmod_date	TIMESTAMP,
			lastmod_user	INT
		) DEFAULT CHARACTER SET utf8;

		class afDB extends MDBObject
		{
			public function __construct() {
				$this->db = new avantfaxSQL;		// connect to AvantFAX database
			}
		}

		class DistroList extends afDB
		{
			public $dl_id, $listname, $listdata, $lastmod_date, $lastmod_user;
			
			public function __construct() {
				$this->table_id_name	= 'dl_id';
				
				$this->table_name		= get_class();
				parent::__construct();
			}
		}
 */

interface iMDBObject
{
	public function get_table_name();
	public function get_table_id();
	public function get_db();
	public function get_id();
	public function set_id($id);
	public function set_vars(array $vals);
}

/**
 * CLASS: MDBObject implements iMDBObject
 */
class MDBObject implements iMDBObject
{
	protected	$table_id_name,
				$table_name,
				$db;
					
	private		$debug = false; // set to false
	
	/**
	 * The get_table_name function
	 *
	 * @return string
	 * @access public
	 */
	public function get_table_name() {
		return $this->table_name;
	}
	
	/**
	 * The get_table_id function
	 *
	 * @return string
	 * @access public
	 */
	public function get_table_id() {
		return $this->table_id_name;
	}
	
	/**
	 * The get_db function
	 *
	 * @return SQL object
	 * @access public
	 */
	public function get_db() {
		return $this->db;
	}
	
	/**
	 * The get_id function
	 *
	 * @return int id
	 * @access public
	 */
	public function get_id() {
		return $this->{$this->table_id_name};
	}
	
	/**
	 * The set_id function
	 *
	 * @param int id
	 * @return bool
	 * @access public
	 */
	public function set_id($id) {
		if (!is_numeric($id))
			return false;
		
		$this->{$this->table_id_name} = $id;
		
		if ($this->debug)
			echo "<p>$this->table_id_name = $id</p>\n";
		
		return true;
	}
	
	/**
	 * The set_vars function
	 *
	 * @param array Array of database columns
	 * @return void
	 * @access public
	 */
	public function set_vars(array $vals) {
		if ($this->debug)
			echo "<p>MDBObject set_vars start</p>\n";
	
		foreach ($vals as $key => $val) {
			$this->$key = $val;
			
			if ($this->debug)
				echo "$key = $val\n";
		}
		
		if ($this->debug)
			echo "<p>MDBObject set_vars done</p>\n";
	}
	
	/**
	 * The debug function
	 *
	 * @return bool
	 * @access public
	 */
	public function debug($bool) {
		$this->debug = $bool;
	}
}
