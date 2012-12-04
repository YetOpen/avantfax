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

define('SQL_AND',	' AND ');
define('SQL_OR',	' OR ');

/**
 * CLASS: MDBO
 * @description
 * This class uses Reflection on classes to perform the basic functions for inserting, updating, selecting (get), searching (find),
 * querying (query), deleting (delete) records in a database for an iMDBObject based on the class' public variables.
	METHODS:
		public function __construct(iMDBObject $dbobject)
        public function insert(iMDBObject $dbobject)
        public function update(iMDBObject $dbobject)
        public function get(iMDBObject $dbobject)
        public function find(iMDBObject $dbobject, $query_logic = SQL_AND, $limit = NULL, $offset = NULL, $include_index = false)
        public function query($query)
        public function delete(iMDBObject $dbobject)
        public function get_num_results()
        public function getRecords()
        public function getError()
        public function set_quoting($bool)
        private function query_construct(iMDBObject $dbobject, $saveEmpty = false, $separator = ", ")
        private function exec_query()
        private function quote($var)
 */

class MDBO
{
	public		$debug = false;		// default is set to false
	
	protected	$db_name_table,
				$db_name_id,
				$query,
				$db,				// SQL class
				$quoting = true;
					
	private		$num_results;
	
	/**
	 * construct
	 *
	 * @return integer
	 * @access public
	 */
	public function __construct(iMDBObject $dbobject) {
		$this->db = $dbobject->get_db();
	}
	
	/**
	 * insert
	 *
	 * @param iMDBObject $dbobject
	 * @return bool
	 * @access public
	 */
	public function insert(iMDBObject $dbobject) {
		$query_data = $this->query_construct($dbobject, true);
		
		if (empty($query_data['values'])) return false;
		
		$this->query = "INSERT INTO ".$dbobject->get_table_name()." ".$query_data['insert']; // SET ". $query_data['values'];
		
		if ($this->exec_query()) {
			$dbobject->set_id($this->db->getInsertID());
			return true;
		}
		
		return false;
	}
	
	/**
	 * update
	 *
	 * @param iMDBObject $dbobject
	 * @return bool
	 * @access public
	 */
	public function update(iMDBObject $dbobject) {
		$query_data = $this->query_construct($dbobject, true);
		
		if (empty($query_data['where'])) return false;
		
		$this->query = "UPDATE ".$dbobject->get_table_name()." SET ". $query_data['values']. " WHERE ". $query_data['where'];
		
		return $this->exec_query();
	}
	
	/**
	 * get
	 *
	 * @param iMDBObject $dbobject
	 * @return bool
	 * @access public
	 */
	public function get(iMDBObject $dbobject) {
		$query_data = $this->query_construct($dbobject);
		
		$this->query = "SELECT * FROM ".$dbobject->get_table_name()." WHERE ". $query_data['where'];
		
		if ($this->debug)
			echo "<p>MDBO get> ".$this->query."</p>\n";
		
		if ($this->db->query($this->query, $this->num_results)) {
			if ($this->num_results) {
				$dbobject->set_vars($this->db->getResult());
				return true;
			}
		}
		return false;
	}
	
	/**
	 * find
	 *
	 * @param iMDBObject $dbobject
	 * @param const query_logic
	 * @param integer limit
	 * @param integer offset
	 * @param bool include_index
	 * @return array Array of Database records
	 * @access public
	 */
	public function find(iMDBObject $dbobject, $query_logic = SQL_AND, $limit = NULL, $offset = NULL, $include_index = false, $reduce_array = true) {
		$query_data = $this->query_construct($dbobject, false, $query_logic);
		
		if ($include_index === true) {
			$query_data['where'] .= " AND ". $query_data['values'];
		}
		
		$search = ($query_data['where_val'] == NULL) ? $query_data['values'] : $query_data['where'];
		
		$this->query = "SELECT * FROM ".$dbobject->get_table_name()." WHERE ". $search;
		
		if ($limit)
			$this->query .= " LIMIT $limit";
		
		if ($limit && $offset)
			$this->query .= " OFFSET $offset";
		
		if ($this->exec_query()) {
			$res = $this->getRecords();
			
			if ($this->debug)
				echo "<p>MDBO find res:";
			
			if ($reduce_array) {
				if (count($res) == 1) {
					if ($this->debug)
						print_r($res[0]);
					
					return $res[0];
				}
			}
			
			if ($this->debug)
				print_r($res);
			
			return $res;
		}
		return NULL;
	}
	
	/**
	 * query
	 *
	 * @param $query
	 * @return bool
	 * @access public
	 */
	public function query($query) {
		$this->query = $query;
		return $this->exec_query();
	}
	
	/**
	 * delete
	 *
	 * @param iMDBObject $dbobject
	 * @return bool
	 * @access public
	 */
	public function delete(iMDBObject $dbobject) {
		$this->query = "DELETE FROM ".$dbobject->get_table_name()." WHERE ".$dbobject->get_table_id()." = ".$this->quote($dbobject->get_id());
		
		return $this->exec_query();
	}
	
	/**
	 * get_num_results
	 *
	 * @return int num_results
	 * @access public
	 */
	public function get_num_results() {
		return $this->num_results;
	}
	
	/**
	 * get_num_results
	 *
	 * @return int num_results
	 * @access public
	 */
	public function getRecords() {
		return $this->db->getRecords();
	}
	
	/**
	 * getError
	 *
	 * @return string error
	 * @access public
	 */
	public function getError() {
		return $this->db->getError();
	}
	
	/**
	 * getError
	 *
	 * @return string error
	 * @access public
	 */
	public function set_quoting($bool) {
		$this->quoting = $bool;
	}
	
	/**
	 * quote
	 *
	 * @return mixed quoted data for SQL
	 * @access public
	 */
	public function quote($var) {
		if ($this->debug)
			echo "MDBO quote> $var\n";
	
		if (!$this->quoting) {
			return "'$var'";
		}
		
		switch ($var) {
			case 'CURRENT_TIMESTAMP()':
			case 'LOCALTIMESTAMP()':
			case 'LOCALTIME()':
			case 'CURDATE()':
			case 'NOW()':
				$str = $var;
				break;
			default:
				$str = $this->db->quote($var);
		
				if (PEAR::isError($str)) {
					trigger_error("MDBO quote> $var: ". $str->getMessage(). ' :: '. $str->getUserInfo());
					return "'$var'";
				}
				break;
		}
		
		return $str;
	}
	
	/**
	 * This method constructs the SQL query
	 *
	 * @param iMDBObject $dbobject
	 * @param boolean $saveEmpty
	 * @param string $separator
	 * @return array Array with two keys: values and where
	 * @access private
	 */
	private function query_construct(iMDBObject $dbobject, $saveEmpty = false, $separator = ", ") {
		$table_id		= $dbobject->get_table_id();
		$where			= NULL;
		$q				= array();
		$where_val		= NULL;
		$column_side	= array();
		$value_side		= array();
		
		foreach ($dbobject as $prop_name => $prop_value) {
			if ($prop_name === $table_id) {
				if ($prop_value === $dbobject->get_id()) {
					$where			= "$prop_name = ".$this->quote($prop_value);
					$where_val	= $prop_value;
				}
			} else {
				if (!empty($prop_value) || $saveEmpty === true || $prop_value === 0 || $prop_value === '0' || $prop_value === false) {
					$thisline			= "$prop_name = ".$this->quote($prop_value);
					$column_side[]	= "$prop_name";
					$value_side[]	= $this->quote($prop_value);
				
					if ($this->debug)
						echo "MDBO qc> $thisline\n";
					
					$q[] = $thisline;
				}
			}
		}
		
		$insert = "(".implode($separator, $column_side).") VALUES (".implode($separator, $value_side).")";
		
		$ret = array('values' => implode($separator, $q), 'where' => $where, 'where_val' => $where_val, 'insert' => $insert);
		
		if ($this->debug) {
				echo "<p>MDBO query_construct>\n";
				print_r($ret);
		}
		return $ret;
	}
	
	/**
	 * exec_query
	 *
	 * @return bool
	 * @access private
	 */
	private function exec_query() {
		if ($this->query) {
			if ($this->debug)
				echo "<p>MDBO exec_query> ".$this->query."\n";
			return $this->db->query($this->query, $this->num_results, SQL_ALL);
		}
		return false;
	}
}
