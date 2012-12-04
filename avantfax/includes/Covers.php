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
 * CLASS: Covers
	METHODS:
		public function __construct()
		public function create($title, $file)
		public function delete_cover($file)
		public function get_covers()
		public function list_covers(&$title, &$file)
		public function load_cover($file)
		public function get_cover_id()
		public function get_title()
		public function get_file()
		public function set_title($title)
		public function set_file($file)
*/

class Covers
{
	private	$cover_id	= NULL,
		$title			= NULL,
		$file			= NULL;
	
	private	$all_data	= array();
	
	private	$covers;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->covers = new MDBOData('CoverPages');
	}
	
	/**
	 * create - create a new modem
	 *
	 * @param string device
	 * @param string alias
	 * @param string contact
	 * @return bool
	 * @access public
	 */
	public function create($title, $file) {
		global $LANG;
		$this->title	= $title;
		$this->file		= $file;
				
		if (!$this->title || !$this->file) {
			$this->error = $LANG['COVER_NOT_CREATED'];
			return false;
		}
		
		// check if cover already exists
		if ($this->covers->find(array('file' => $this->file))) {
			$this->error = $LANG['COVER_EXISTS'];
			return false;
		}
		
		// add cover to DB
		if ($this->covers->new_entry(array('file' => $this->file, 'title' => $this->title))) {
			$this->cover_id = $this->covers->get_id();
			return true;
		}
		
		$this->error = $LANG['COVER_NOT_CREATED'];
		return false;
	}
	
	/**
	 * delete_cover - delete the cover page
	 *
	 * @param string device
	 * @return bool
	 * @access public
	 */
	public function delete_cover($id) {
		$this->covers->data->set_id($id);
		return $this->covers->delete_entry();
	}
	
	/**
	 * get_covers - return array of all covers configured
	 *
	 * @return array
	 * @access public
	 */
	public function get_covers() {
		global $LANG;
		
		$ret	= array();
		$cover	= $this->covers->query("SELECT file FROM CoverPages ORDER BY file", false);
		
		if (is_array($cover)) {
			foreach ($cover as $file) {
				$ret[] = $file['file'];
			}
			return $ret;
		}
		
		$this->error = $LANG['NO_COVERS_CONFIGURED'];
		return NULL;
	}
	
	/**
	 * list_covers
	 *
	 * @param string title
	 * @param string file
	 * @return bool
	 * @access public
	 */
	public function list_covers(&$title, &$file) {
		global $LANG;
		static $queried, $results;
		
		if (!$queried) {
			$results = $this->covers->query("SELECT * FROM CoverPages ORDER BY title", false);
			$queried = true;
		}
		
		if (is_array($results)) {
			if ($data = array_shift($results)) {
				$title		= $data['title'];
				$file		= $data['file'];
				return true;
			}
		}
		
		$queried = false;
		$this->error = $LANG['NO_COVERS_CONFIGURED'];
		return false;
	}
	
	/**
	 * load_cover
	 *
	 * @param string file
	 * @return bool
	 * @access public
	 */
	public function load_cover($file) {
		global $LANG;
		
		if (!$file) { $this->error = "Cover page not selected"; return false; }
		
		if ($data = $this->covers->find(array('file' => $file))) {
			$this->cover_id	= $data['cover_id'];
			$this->title	= $data['title'];
			$this->file		= $data['file'];
			$this->all_data	= $data;
			return true;
		}
		
		$this->error = sprintf($LANG['COVER_DOESNT_EXIST'], $file);
		return false;
	}
	
	/**
	 * get_cover_id
	 *
	 * @return string
	 * @access public
	 */
	public function get_cover_id() {
		return $this->cover_id;
	}
	
	/**
	 * get_title
	 *
	 * @return string
	 * @access public
	 */
	public function get_title() {
		return $this->title;
	}
	
	/**
	 * get_file
	 *
	 * @return string
	 * @access public
	 */
	public function get_file() {
		return $this->file;
	}
	
	/**
	 * set_title
	 *
	 * @param string title
	 * @return bool
	 * @access public
	 */
	public function set_title($title) {
		if (!$this->cover_id) { $this->error = "No cover page loaded"; return false; }
		
		$this->title = $title;
		$this->covers->data->set_id($this->cover_id);
		$this->all_data['title'] = $this->title;
		return $this->covers->update_entry($this->all_data);
	}
	
	/**
	 * set_file
	 *
	 * @param string file
	 * @return bool
	 * @access public
	 */
	public function set_file($file) {
		if (!$this->cover_id) { $this->error = "No cover page loaded"; return false; }
		
		$this->file = $file;
		$this->covers->data->set_id($this->cover_id);
		$this->all_data['file'] = $this->file;
		return $this->covers->update_entry($this->all_data);
	}
}
