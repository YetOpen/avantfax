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
 * CLASS: DIDRouting
	METHODS:
 		public function __construct()
        public function create($route, $alias, $contact = NULL, $printer = NULL, $faxcatid = NULL)
        public function delete_route($id)
        public function get_routes()
        public function list_routes(&$didr_id, &$alias, &$routecode)
        public function load_route($routecode)
        public function loadbyid($didr_id)
        public function get_alias()
        public function get_contact()
        public function get_didr_id()
        public function get_route()
        public function get_error()
		public function get_faxcatid()
        public function set_alias($alias)
        public function set_routecode($routecode)
        public function set_contact($contact)
		public function set_faxcatid($faxcatid)
 *
 */
class DIDRouting
{
	private	$didr_id	= NULL,
			$error		= NULL,
			$alias		= NULL,
			$contact	= NULL,
			$routecode	= NULL,
			$faxcatid	= NULL,
			$printer	= NULL;
	
	private	$didroute;
	private	$all_data;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->didroute = new MDBOData('DIDRoute');
		$this->all_data	= array();
	}
	
	/**
	 * create - create a new route
	 *
	 * @param string route
	 * @param string alias
	 * @param string contact
	 * @param string printer
	 * @return bool
	 * @access public
	 */
	public function create($route, $alias, $contact = NULL, $printer = NULL, $faxcatid = NULL) {
		global $LANG;
		$this->alias		= $alias;
		$this->routecode	= $route;
		$this->contact		= $contact;
		$this->printer		= $printer;
		$this->faxcatid		= $faxcatid;
		
		if ($this->contact && invalid_email($this->contact)) {
			$this->error = $LANG['REGWARN_MAIL'];
			return false;
		}
		
		if (!$this->alias || !$this->routecode || $this->routecode == "<NONE>") {
			$this->error = $LANG['DIDROUTE_NOT_CREATED'];
			return false;
		}
		
		if ($this->didroute->find(array('routecode' => $this->routecode))) {
			// check if routecode already exists
			$this->error = $LANG['DIDROUTE_EXISTS'];
			return false;
		}
		
		// add route to DB
		if ($this->didroute->new_entry(array('routecode' => $this->routecode, 'alias' => $this->alias, 'contact' => $this->contact, 'printer' => $this->printer, 'faxcatid' => $this->faxcatid))) {
			$this->didr_id = $this->didroute->get_id();
			return true;
		}
		
		$this->error = $LANG['DIDROUTE_NOT_CREATED'];
		return false;
	}
	
	/**
	 * delete_route - delete the route
	 *
	 * @param integer id
	 * @return bool
	 * @access public
	 */
	public function delete_route($id) {
		$this->didroute->data->set_id($id);
		return $this->didroute->delete_entry();
	}
	
	/**
	 * get_routes - return array of all routes configured
	 *
	 * @return array
	 * @access public
	 */
	public function get_routes() {
		global $LANG;
		
		$_routes = $this->didroute->query("SELECT didr_id FROM DIDRoute ORDER BY alias", false);
		if (is_array($_routes)) {
			$routes = array(0);
			
			foreach ($_routes as $route) {
				$routes[] = $route['didr_id'];
			}
			
			return $routes;
		}
		
		$this->error = $LANG['DIDROUTE_NO_ROUTES'];
		return NULL;
	}
	
	/**
	 * list_routes
	 *
	 * @param integer didr_id
	 * @param string alias
	 * @param integer routecode
	 * @return bool
	 * @access public
	 */
	public function list_routes(&$didr_id, &$alias, &$routecode) {
		global $LANG;
		static $queried, $results;
		
		if (!$queried) {
			$results = $this->didroute->query("SELECT * FROM DIDRoute ORDER BY alias", false);
			$queried = true;
		}
		
		if (is_array($results)) {
			if ($data = array_shift($results)) {
				$routecode		= $data['routecode'];
				$didr_id		= $data['didr_id'];
				$alias			= $data['alias'];
				return true;
			}
		}
		
		$queried = false;
		$this->error = $LANG['DIDROUTE_NO_ROUTES'];
		return false;
	}
	
	/**
	 * load_route
	 *
	 * @param integer routecode
	 * @return bool
	 * @access public
	 */
	public function load_route($routecode) {
		global $LANG;
		
		if (!$routecode) { $this->error = "Route code not selected"; return false; }
		
		if ($data = $this->didroute->find(array('routecode' => $routecode))) {
			$this->alias		= $data['alias'];
			$this->routecode	= $data['routecode'];
			$this->contact		= $data['contact'];
			$this->printer		= $data['printer'];
			$this->didr_id		= $data['didr_id'];
			$this->faxcatid		= $data['faxcatid'];
			$this->all_data		= $data;
			return true;
		}
		$this->error = sprintf($LANG['DIDROUTE_DOESNT_EXIST'], $routecode);
		return false;
	}
	
	/**
	 * loadbyid
	 *
	 * @param integer didr_id 
	 * @return bool
	 * @access public
	 */
	public function loadbyid($didr_id) {
		global $LANG;
		
		if (!$didr_id) { $this->error = "Route ID not selected"; return false; }
		
		if ($data = $this->didroute->find(array('didr_id' => $didr_id))) {
			$this->alias		= $data['alias'];
			$this->routecode	= $data['routecode'];
			$this->contact		= $data['contact'];
			$this->printer		= $data['printer'];
			$this->didr_id		= $data['didr_id'];
			$this->faxcatid		= $data['faxcatid'];
			$this->all_data		= $data;
			return true;
		}
		
		$this->error = sprintf($LANG['DIDROUTE_DOESNT_EXIST'], $didr_id);
		return false;
	}
	
	/**
	 * get_alias
	 *
	 * @return string
	 * @access public
	 */
	public function get_alias() {
		return $this->alias;
	}
	
	/**
	 * get_contact
	 *
	 * @return string
	 * @access public
	 */
	public function get_contact() {
		return $this->contact;
	}

	/**
	 * get_printer
	 *
	 * @return string
	 * @access public
	 */
	public function get_printer() {
		return $this->printer;
	}
	
	/**
	 * get_faxcatid
	 *
	 * @return string
	 * @access public
	 */
	public function get_faxcatid() {
		return $this->faxcatid;
	}
	
	/**
	 * get_didr_id
	 *
	 * @return integer
	 * @access public
	 */
	public function get_didr_id() {
		return $this->didr_id;
	}
	
	/**
	 * get_route
	 *
	 * @return integer
	 * @access public
	 */
	public function get_route() {
		return $this->routecode;
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
	 * set_alias
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_alias($alias) {
		if (!$this->didr_id) { $this->error = "No entry loaded"; return false; }
		
		$this->alias = $alias;
		$this->didroute->data->set_id($this->didr_id);
		$this->all_data['alias'] = $this->alias;
		return $this->didroute->update_entry($this->all_data);
	}
	
	/**
	 * set_routecode
	 *
	 * @param integer var
	 * @return bool
	 * @access public
	 */
	public function set_routecode($routecode) {
		if (!$this->didr_id) { $this->error = "No entry loaded"; return false; }
	
		$this->routecode = $routecode;
		$this->didroute->data->set_id($this->didr_id);
		$this->all_data['routecode'] = $this->routecode;
		return $this->didroute->update_entry($this->all_data);
	}
	
	/**
	 * set_contact
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_contact($contact) {
		if (!$this->didr_id) { $this->error = "No entry loaded"; return false; }
		
		$this->contact = $contact;
		$this->didroute->data->set_id($this->didr_id);
		$this->all_data['contact'] = $this->contact;
		return $this->didroute->update_entry($this->all_data);
	}

	/**
	 * set_printer
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_printer($printer) {
		if (!$this->didr_id) { $this->error = "No entry loaded"; return false; }
	
		$this->printer = $printer;
		$this->didroute->data->set_id($this->didr_id);
		$this->all_data['printer'] = $this->printer;
		return $this->didroute->update_entry($this->all_data);
	}
	
	/**
	 * set_faxcatid
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_faxcatid($faxcatid) {
		if (!$this->didr_id) { $this->error = "No entry loaded"; return false; }
		
		$this->faxcatid = $faxcatid;
		$this->didroute->data->set_id($this->didr_id);
		$this->all_data['faxcatid'] = $this->faxcatid;
		return $this->didroute->update_entry($this->all_data);
	}
}
