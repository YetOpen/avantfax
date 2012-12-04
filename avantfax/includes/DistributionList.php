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

define("DL_SEPARATOR", ":");

/*
 * CLASS: DistroList
	METHODS:
		public function __construct()
        public function get_dl_id()
        public function get_listname()
        public function get_lastmod()
        public function get_error()
        public function create($listname)
        public function delete_list($list_id)
        public function get_distrolists()
        public function load_list($id)
        public function set_listname($listname)
        public function list_entries()
        public function add_entries($entries)
        public function remove_entries($entries)
*/

class DistributionList
{
	private	$dl_id			= NULL,
			$error			= NULL,
			$listname		= NULL,
			$listdata		= NULL,
			$lastmod_date	= NULL,
			$lastmod_user	= NULL;
	
	private $distrolist;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->distrolist = new MDBOData('DistroList');
	}
	
	/**
	 * get_dl_id
	 *
	 * @return integer
	 * @access public
	 */
	public function get_dl_id() {
		return $this->dl_id;
	}
	
	/**
	 * get_listname
	 *
	 * @return string
	 * @access public
	 */
	public function get_listname() {
		return $this->listname;
	}
	
	/**
	 * get_lastmod
	 *
	 * @return array
	 * @access public
	 */
	public function get_lastmod() {
		return array('date' => $this->lastmode_date, 'user' => $this->lastmod_user);
	}
	
	/**
	 * get_error
	 *
	 * @return string
	 * @access public
	 */ 
	public function get_error() {
		return $this->error;
	}
	
	/**
	 * create - create a new list
	 *
	 * @param string listname
	 * @return bool
	 * @access public
	 */
	public function create($listname) {
		global $LANG;
		$this->listname   = $listname;
		
		if (!$this->listname) {
			$this->error = $LANG['DISTROLIST_ENTER_LISTNAME'];
			return false;
		}
		
		// check if device already exists
		if ($this->distrolist->find(array('listname' => $this->listname))) {
			$this->error = $LANG['DISTROLIST_EXISTS'];
			return false;
		}
		
		// add to DB
		if ($this->distrolist->new_entry(array('listname' => $this->listname, 'lastmod_user' => $this->lastmod_user))) {
			$this->dl_id = $this->distrolist->get_id();
			return true;
		}
		
		$this->error = $LANG['DISTROLIST_NOT_CREATED'];
		return false;
	}
	
	/**
	 * delete_list - delete the list
	 *
	 * @param integer list_id
	 * @return bool
	 * @access public
	 */
	public function delete_list($list_id) {
		$this->distrolist->data->set_id($list_id);
		return $this->distrolist->delete_entry();
	}
	
	/**
	 * get_distrolists - return array of all DistroList
	 *
	 * @return bool
	 * @access public
	 */
	public function get_distrolists() {
		return $this->distrolist->query("SELECT dl_id, listname FROM DistroList ORDER BY listname", false);
	}
	
	/**
	 * load_list
	 *
	 * @param integer id
	 * @return bool
	 * @access public
	 */
	public function load_list($id) {
		if (!$id) { $this->error = "DList not selected"; return false; }
		
		if ($this->distrolist->load($id)) {
			$data = $this->distrolist->get_info();
			$this->dl_id		= $data['dl_id'];
			$this->listname		= $data['listname'];
			$this->listdata		= $data['listdata'];
			$this->lastmod_date	= $data['lastmod_date'];
			$this->lastmod_user	= $data['lastmod_user'];
			return true;
		}
		
		$this->error = "List $id doesn't exist.";
		return false;
	}
	
	/**
	 * set_listname
	 *
	 * @param string listname
	 * @return bool
	 * @access public
	 */
	public function set_listname($listname) {
		if (!$this->dl_id) { $this->error = "No list loaded"; return false; }
		$this->listname = $listname;
		return $this->distrolist->update_entry(array('listname' => $this->listname, 'lastmod_user' => $this->lastmod_user));
	}
	
	/**
	 * list_entries
	 *
	 * @return array
	 * @access public
	 */
	public function list_entries() {
		if (!$this->dl_id) { $this->error = "No list loaded"; return false; }
		
		return explode(DL_SEPARATOR, $this->listdata);
	}
	
	/**
	 * add_entries - add array 'entries' to list
	 *
	 * @param array entries
	 * @return bool
	 * @access public
	 */
	public function add_entries($entries) {
		if (!$this->dl_id) { $this->error = "No list loaded"; return false; }
		
		if (!is_array($entries)) return false;
		
		// check for duplicates
		$mylist		= $this->list_entries();
		$diff		= array_diff($entries, $mylist); // find new entries
		$newlist	= array_merge($mylist, $diff);
		
		// add new entries to db
		$this->listdata = join(DL_SEPARATOR, $newlist);
		
		return $this->distrolist->update_entry(array('listdata' => $this->listdata, 'lastmod_user' => $this->lastmod_user));
	}
	
	/**
	 * remove_entries - remove array 'entries' from list
	 *
	 * @param array entries
	 * @return bool
	 * @access public
	 */
	public function remove_entries($entries) {
		if (!$this->dl_id) { $this->error = "No list loaded"; return false; }
		
		if (!is_array($entries)) return false;
		
		// remove entries
		$mylist	= $this->list_entries();
		$diff		= array_diff($mylist, $entries);
		
		// update list in db
		$this->listdata = join(DL_SEPARATOR, $diff);
		
		return $this->distrolist->update_entry(array('listdata' => $this->listdata, 'lastmod_user' => $this->lastmod_user));
	}
	
	/**
	 * set_moduser
	 *
	 * @param integer moduser
	 * @return void
	 * @access public
	 */
	public function set_moduser($moduser) {
		$this->lastmod_user = $moduser;
	}
}
