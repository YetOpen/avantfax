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
 * CLASS: FaxPDFCategory
	METHODS:
		public function __construct()
        public function create($name)
        public function set_name($name, $catid)
        public function get_list(&$catid, &$name)
        public function get_categories()
        public function get_error()
        public function get_name($catid)
        public function delete_category($catid)
*/

class FaxPDFCategory
{
	private $error = NULL;
	private $faxcategory;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->faxcategory = new MDBOData('FaxCategory');
	}
	
	/**
	 * create - create a new modem
	 *
	 * @param string catname
	 * @return bool
	 * @access public
	 */
	public function create($name) {
		global $LANG;
		
		// check if device already exists
		if ($this->faxcategory->find(array('name' => $name))) {
			$this->error = sprintf($LANG['FAXCAT_ALREADY_EXISTS'], $name);
			return false;
		}

		// add modem to DB
		if ($this->faxcategory->new_entry(array('name' => $name))) {
			return true;
		}

		$this->error = sprintf($LANG['FAXCAT_NOT_CREATED'], $name);
		return false;
	}
	
	/**
	 * set_name
	 *
	 * @param string name
	 * @param integer catid
	 * @return bool
	 * @access public
	 */
	public function set_name($name, $catid) {
		if (!$name || !$catid) {
			$this->error = "No name or catid to set";
			return false;
		}
		
		$this->faxcategory->data->set_id($catid);
		return $this->faxcategory->update_entry(array('name' => $name));
	}
	
	/**
	 * get_list
	 *
	 * @param integer catid
	 * @param string name
	 * @return bool
	 * @access public
	 */
	public function get_list(&$catid, &$name) {
		static $queried, $results;
		
		if (!$queried) {
			$results = $this->faxcategory->query("SELECT * FROM FaxCategory ORDER BY name", false);
			$queried = true;
		}
		
		if (is_array($results)) {
			if ($data = array_shift($results)) {
				$catid	= $data['catid'];
				$name	= $data['name'];
				return true;
			}
		}
		
		$queried = false;
		return false;
	}
	
	/**
	 * get_categories
	 *
	 * @param integer catid
	 * @param string name
	 * @return bool
	 * @access public
	 */
	public function get_categories() {
		return $this->faxcategory->query("SELECT * FROM FaxCategory ORDER BY name", false);
	}
	
	/**
	 * get_error
	 *
	 * @return string
	 * @access public
	 */
	//
	public function get_error() {
		return $this->error;
	}
	
	/**
	 * get_name
	 *
	 * @param integer catid
	 * @return string
	 * @access public
	 */
	public function get_name($catid) {
		if (!$catid) { $this->error = "No catid sent"; return NULL; }
		
		if ($results = $this->faxcategory->find(array('catid' => $catid))) {
			return $results['name'];
		}
		return NULL;
	}
	
	/**
	 * delete_category
	 *
	 * @param integer catid
	 * @return bool
	 * @access public
	 */
	public function delete_category($catid) {
		if (!$catid) { $this->error = "No catid sent"; return NULL; }
		
		$this->faxcategory->data->set_id($catid);
		return $this->faxcategory->delete_entry();
	}
}
