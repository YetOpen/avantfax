<?php
/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 * This requires PEAR::MDB2.  pear install MDB2_driver_mysql
 *
 * PHP 5 only
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

define('SQL_NONE',	1);
define('SQL_ALL',	2);

require_once 'MDB2.php';
require_once 'MDB2/Driver/mysql.php';
require_once 'MDB2/Driver/Datatype/mysql.php';

/**
 * CLASS: SQL
	METHODS:
		public function connect($db_user, $db_pass, $db_name, $db_host, $db_engine)
        function __destruct()
        public function __toString()
        public function disconnect()
        public function query($query, &$num = 0, $type = SQL_NONE)
        public function getRecords()
        public function quote($string)
        public function getResult()
        public function getError()
        public function getLastQuery()
        public function getInsertID()
        public function XMLHeader()
        public function genXML($xmlTitle = true, $mysqlStyle = "response", $metaHeader = "row", $htmlEntities = true)
        public function fixAmp($content)
 */
class SQL
{
	private	$db			= null,
			$result		= null,
			$error		= null,
			$record		= null,
			$statement	= null;
				
	public	$debug		= false;
	
	/**
	 * connect
	 *
	 * @param $db_user
	 * @param $db_pass
	 * @param $db_name
	 * @param $db_host
	 * @param $db_engine
	 * @return bool
	 * @access public
	 */
	public function connect($db_user, $db_pass, $db_name, $db_host, $db_engine) {
		$dsn = array(
			'phptype'	=> $db_engine,
			'username'	=> $db_user,
			'password'	=> $db_pass,
			'hostspec'	=> $db_host,
			'database'	=> $db_name
		);
		
		$options = array(
			'persistent'	=> false
		);
	
		$this->db =& MDB2::singleton($dsn, $options);

		if (PEAR::isError($this->db)) {
//			$this->error = $this->db->getMessage()."::".$this->db->getUserInfo();
			return false;
		}
		
		$this->db->setFetchMode(MDB2_FETCHMODE_ASSOC);
		$this->db->setOption('portability', MDB2_PORTABILITY_NONE);
		
		$res =& $this->db->query("SET CHARACTER SET 'utf8'");
		if (PEAR::isError($res)) {
			return false;
		}
		
		$this->db->query("SET NAMES 'utf8'");
	
		return true;
	}
	
	/**
	 * deconstructor
	 *
	 * @access public
	 */
	function __destruct() {
		if ($this->db)
			$this->disconnect();
	}
	
	/**
	 * __toString
	 *
	 * @return string
	 * @access public
	 */
	public function __toString() {
		return $this->statement;
	}
	
	/**
	 * disconnect
	 *
	 * @return void
	 * @access public
	 */
	public function disconnect() {
		$this->db->disconnect();
	}
	
	/**
	 * query
	 *
	 * @param $query
	 * @param $num
	 * @param $type
	 * @return bool
	 * @access public
	 */
	public function query($query, &$num = 0, $type = SQL_NONE) {
		$this->record = array();
		$_data = array();
		
		$executed = true;
		$this->statement = $query;
		
		if ($this->debug == true) {
			echo "<p>$query</p>\n";
		}
		
		if (preg_match("/^SELECT/i", $query)) {
			$this->result =& $this->db->query($query);
			
			if (PEAR::isError($this->result)) {
				$this->error = $this->result->getMessage()."::".$this->result->getUserInfo();
				trigger_error("SQL Query: ".$this->error, E_USER_ERROR);
				return false;
			}
		
			if ($num = $this->result->numRows()) {
				switch ($type) {
					case SQL_ALL:
						// get all the records
						while($_row = $this->result->fetchRow()) {
							if (is_array($_row)) {
								$_row = array_map('stripslashes', $_row);
							} else {
								$_row = stripslashes($_row);
							}
							$_data[] = $_row;   
						}
						$this->result->free();
						$this->record = $_data;
						break;
					case SQL_NONE:
					default:
						// records will be looped over with next()
						break;   
				}
			}
		} else {
			$aff =& $this->db->exec($query);

			if (PEAR::isError($aff)) {
				$this->error = $aff->getMessage()."::".$aff->getUserInfo();
				trigger_error("SQL Query: ".$this->error, E_USER_ERROR);
				$executed = false;
			} else {
				$num = $aff;
			}
		}
		return $executed;
	}
	
	/**
	 * query
	 *
	 * @return array Array of all records
	 * @access public
	 */
	public function getRecords() {
		return $this->record;
	}
	
	/**
	 * query
	 *
	 * @return array Array of all records
	 * @access public
	 */
	public function quote($string) {
		return $this->db->quote($string);
	}
	
	/**
	 * getResult
	 *
	 * @return array Array of next record
	 * @access public
	 */
	public function getResult() {
		if ($this->record = $this->result->fetchRow()) {
			if (is_array($this->record)) {
				$this->record = array_map('stripslashes', $this->record);
			} else {
				$this->record = stripslashes($this->record);
			}
			return $this->record;
		} else {
			$this->record = array();
			$this->result->free();
			return false;
		}
	}
	
	/**
	 * getError
	 *
	 * @return string
	 * @access public
	 */
	public function getError() {
		return $this->error;
	}
	
	/**
	 * getLastQuery
	 *
	 * @return string
	 * @access public
	 */
	public function getLastQuery() {
		return $this->statement;
	}
	
	/**
	 * getInsertID
	 *
	 * @return int
	 * @access public
	 */
	public function getInsertID() {
		return $this->db->lastInsertID();
	}
	
	/**
	 * XMLHeader
	 *
	 * @return void
	 * @access public
	 */
	public function XMLHeader() {
		header("Cache-Control: private");
		header("Content-Type: application/xml");
	}
	
	/**
	 * genXML
	 *
	 * @param $xmlTitle
	 * @param $mysqlStyle
	 * @param $metaHeader
	 * @param $htmlEntities
	 * @return array Array of next record
	 * @access public
	 */
	public function genXML($xmlTitle = true, $mysqlStyle = "response", $metaHeader = "row", $htmlEntities = true) {
		if (count($this->record) == 0) {
			return "<noelement></noelement>";
		}
		
		$retVal = ($xmlTitle) ? "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n" : "";
		
		$query = addslashes($this->statement);
		
		if ($mysqlStyle === false) $mysqlStyle = "response";
		
		// root element name
		$retVal .= ($mysqlStyle === true) ? "<resultset statement=\"$query\">" : "<$mysqlStyle>\n";
		
		foreach ($this->record as $info) {
			$retVal .= "<$metaHeader>\n";
			foreach ($info as $key => $val) {
				$val = ($htmlEntities) ? htmlspecialchars($val, ENT_QUOTES, "UTF-8") : $val;
				$val = $this->fixAmp($val);
				$retVal .= ($mysqlStyle === true) ? "<field name=\"$key\">$val</field>\n" : "<$key>$val</$key>\n";
			}
			$retVal .= "</$metaHeader>\n";
		}
		
		$retVal .= ($mysqlStyle === true) ? "</resultset>" : "</$mysqlStyle>";
		
		return $retVal;
	}
	
	/**
	 * fixAmp
	 *
	 * @param $content
	 * @return array Array of next record
	 * @access public
	 */
	public function fixAmp($content) {
		return str_replace('&amp;amp;', '&amp;', $content);
	}
}
