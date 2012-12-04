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
 * CLASS: MDBOData
	METHODS:
		public function __construct($classType)
		public function debug($bool = NULL)
		public function load($id)
		public function new_entry(array $info)
		public function update_entry(array $info = NULL)
		public function delete_entry(array $info = NULL)
		public function get_info()
		public function get_id()
		public function find(array $info, $query_logic = SQL_AND, $limit = NULL, $offset = NULL)
		public function findext(array $info)
		public function query($query)
		public function get_error()
		public function quoting($bool)
		public function quote($str)
		public function __isset($varname)
		public function __get($varname)
		public function __set($varname, $value)

 * @description
 * This class manipulates iMDBObjects by utilizing the MDBObject and MDBO classes.
 
 * @example

		$distrolist = new MDBOData('DistroList');
		$distrolist->debug(true);
		
		print_r($distrolist->find(array('list_name' => 'Demo')));
		
		print_r($distrolist->query("SELECT * FROM `DistroList` WHERE `listname` = 'Demo'"));
 
		if (!$distrolist->load(5)) {
			echo "Failed to load\n";
			exit;
		}
		
		$data = array('list_name' => "Demo");
		$distrolist->new_entry($data);
		print_r($distrolist->get_info());
		
		$distrolist->data->set_id(5);
		if ($distrolist->delete_entry()) {
			echo "deleted!\n";
		} else {
			echo "not deleted\n";
		}
*/

class MDBOData
{
	public		$data;
	protected	$dbo;
	
	/**
	 * construct - create new instance to handle iMDBObjects
	 *
	 * @param classType
	 * @access public
	 */
	public function __construct($classType) {
		$this->data	= new $classType;
		
		if (!$this->data instanceof iMDBObject) {
			trigger_error("'$classType' is not a iMDBObject");
			exit;
		}
		
		$this->dbo	= new MDBO($this->data);
	}
	
	/**
	 * The load function
	 *
	 * @param int id
	 * @return bool
	 * @access public
	 */
	public function load($id) {
		if (!is_numeric($id))
			return false;
		
		$this->data->set_id($id);
		return $this->dbo->get($this->data);
	}
	
	/**
	 * The new_entry function
	 *
	 * @param array Array of database columns to create
	 * @return bool
	 * @access public
	 */
	public function new_entry(array $info) {
		$this->data->set_vars($info);
		if ($this->dbo->insert($this->data)) {
			return true;
		}
		return false;
	}
	
	/**
	 * The get function
	 *
	 * @param array Array of column values to update
	 * @return bool
	 * @access public
	 */
	public function update_entry(array $info = NULL) {
		if (is_array($info))
			$this->data->set_vars($info);

		return $this->dbo->update($this->data);
	}
	
	/**
	 * The get function
	 *
	 * @param array Array of column values
	 * @return bool
	 * @access public
	 */
	public function delete_entry(array $info = NULL) {
		if (is_array($info))
			$this->data->set_vars($info);
		
		return $this->dbo->delete($this->data);
	}
	
	/**
	 * The get_info function
	 *
	 * @return array Array of column values
	 * @access public
	 */
	public function get_info() {
		$info = array();
		
		foreach ($this->data as $key => $val) {
			$info[$key] = $val;
		}
		
		return $info;
	}
	
	/**
	 * The get_id function
	 *
	 * @return int id
	 * @access public
	 */
	public function get_id() {
		return $this->data->get_id();
	}
	
	/**
	 * find
	 *
	 * @return array Array of column values
	 * @access public
	 */
	public function find(array $info, $query_logic = SQL_AND, $limit = NULL, $offset = NULL, $include_index = false, $reduce_array = true) {
		$this->data->set_vars($info);
		return $this->dbo->find($this->data, $query_logic, $limit, $offset, $include_index, $reduce_array);
	}
	
	/**
	 * findext
	 *
	 * @return array Array of column values
	 * @access public
	 */
	public function findext(array $info) {
		return $this->find($info, SQL_AND, NULL, NULL, true /* include index */);
	}
	
	/**
	 * get
	 *
	 * @return array Array of column values
	 * @access public
	 */
	public function get(array $info) {
		$this->data->set_vars($info);
		return $this->dbo->get($this->data);
	}
	
	/**
	 * query
	 *
	 * @param $query SQL query
	 * @return array Array of column values
	 * @return NULL on no results
	 * @return false on error
	 * @access public
	 */
	public function query($query, $reduce_array = true) {
		if ($this->dbo->query($query)) {
			if ($this->dbo->get_num_results()) {
				$results = $this->dbo->getRecords();
				
				if ($reduce_array && is_array($results)) {
					if (count($results) == 1)
						return $results[0];
				}
			
				return $results;
			}
			
			return NULL;
		}
		
		return false;
	}
	
	/**
	 * get_error
	 *
	 * @return string
	 * @access public
	 */
	public function get_error() {	
		return $this->dbo->getError();
	}
	
	/**
	 * quoting
	 *
	 * @return void
	 * @access public
	 */
	public function quoting($bool) {
		$this->dbo->set_quoting($bool);
	}
	
	/**
	 * quote
	 *
	 * @param string $str
	 * @return string
	 * @access public
	 */
	public function quote($str) {
		return $this->dbo->quote($str);
	}
	
	/**
	 * __isset
	 *
	 * @param string varname
	 * @return bool
	 * @access public
	 */
	public function __isset($varname) {
		return isset($this->data->$varname);
	}
	
	/**
	 * __get
	 *
	 * @param string varname
	 * @return mixed value of varname
	 * @access public
	 */
	public function __get($varname) {
		return $this->data->$varname;
	}
	
	/**
	 * __set
	 *
	 * @param string varname
	 * @param mixed value for varname
	 * @return void
	 * @access public
	 */
	public function __set($varname, $value) {
		$this->data->$varname = $value;
	}
	
	/**
	 * The debug function
	 *
	 * @return bool
	 * @access public
	 */
	public function debug($bool = NULL) {
		if ($bool)
			$this->dbo->debug = $bool;
		
		$this->data->debug($bool);
		
		return $this->dbo->debug;
	}
}
