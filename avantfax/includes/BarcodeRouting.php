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
 * CLASS: BarcodeRouting
	METHODS:
 		public function __construct()
        public function create($barcode, $alias, $contact = NULL)
        public function delete_route($id)
        public function get_routes()
        public function list_routes(&$barcode_id, &$alias, &$barcode)
        public function load_route($barcode)
        public function loadbyid($barcode_id)
        public function get_alias()
        public function get_contact()
        public function get_barcode_id()
        public function get_barcode()
        public function get_error()
		public function get_faxcatid()
        public function set_alias($alias)
        public function set_barcode($barcode)
        public function set_contact($contact)
		public function set_faxcatid($faxcatid)
 *
 */
class BarcodeRouting
{
	private	$barcode_id	= NULL,
			$error		= NULL,
			$alias		= NULL,
			$contact	= NULL,
			$barcode	= NULL,
			$faxcatid	= NULL,
			$printer	= NULL;
	
	private	$barcoderoute;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->barcoderoute = new MDBOData('BarcodeRoute');
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
	public function create($barcode, $alias, $contact = NULL, $printer = NULL, $faxcatid = NULL) {
		global $LANG;
		$this->alias		= $alias;
		$this->barcode		= $barcode;
		$this->contact		= $contact;
		$this->printer		= $printer;
		$this->faxcatid		= $faxcatid;
		
		if ($this->contact && invalid_email($this->contact)) {
			$this->error = $LANG['REGWARN_MAIL'];
			return false;
		}
		
		if (!$this->alias || !$this->barcode || $this->barcode == "<NONE>") {
			$this->error = $LANG['BARCODEROUTE_NOT_CREATED'];
			return false;
		}
		
		if ($this->barcoderoute->find(array('barcode' => $this->barcode))) {
			// check if barcode already exists
			$this->error = $LANG['BARCODEROUTE_EXISTS'];
			return false;
		}
		
		// add route to DB
		if ($this->barcoderoute->new_entry(array('barcode' => $this->barcode, 'alias' => $this->alias, 'contact' => $this->contact, 'printer' => $this->printer, 'faxcatid' => $this->faxcatid))) {
			$this->barcode_id = $this->barcoderoute->get_id();
			return true;
		}
		
		$this->error = $LANG['BARCODEROUTE_NOT_CREATED'];
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
		$this->barcoderoute->data->set_id($id);
		return $this->barcoderoute->delete_entry();
	}
	
	/**
	 * get_routes - return array of all routes configured
	 *
	 * @return array
	 * @access public
	 */
	public function get_routes() {
		global $LANG;
		
		$_routes = $this->barcoderoute->query("SELECT barcode_id FROM BarcodeRoute ORDER BY alias", false);
		if (is_array($_routes)) {
			$routes = array(0);
			
			foreach ($_routes as $route) {
				$routes[] = $route['barcode_id'];
			}
			
			return $routes;
		}
		
		$this->error = $LANG['BARCODEROUTE_NO_ROUTES'];
		return NULL;
	}
	
	/**
	 * list_routes
	 *
	 * @param integer barcode_id
	 * @param string alias
	 * @param integer barcode
	 * @return bool
	 * @access public
	 */
	public function list_routes(&$barcode_id, &$alias, &$barcode) {
		global $LANG;
		static $queried, $results;
		
		if (!$queried) {
			$results = $this->barcoderoute->query("SELECT * FROM BarcodeRoute ORDER BY alias", false);
			$queried = true;
		}
		
		if (is_array($results)) {
			if ($data = array_shift($results)) {
				$barcode		= $data['barcode'];
				$barcode_id		= $data['barcode_id'];
				$alias			= $data['alias'];
				return true;
			}
		}
		
		$queried = false;
		$this->error = $LANG['BARCODEROUTE_NO_ROUTES'];
		return false;
	}
	
	/**
	 * load_route
	 *
	 * @param integer barcode
	 * @return bool
	 * @access public
	 */
	public function load_route($barcode) {
		global $LANG;
		
		if (!$barcode) { $this->error = "Barcode not selected"; return false; }
		
		if ($data = $this->barcoderoute->find(array('barcode' => $barcode))) {
			$this->alias		= $data['alias'];
			$this->barcode		= $data['barcode'];
			$this->contact		= $data['contact'];
			$this->printer		= $data['printer'];
			$this->barcode_id	= $data['barcode_id'];
			$this->faxcatid		= $data['faxcatid'];
			return true;
		}
		$this->error = sprintf($LANG['BARCODEROUTE_DOESNT_EXIST'], $barcode);
		return false;
	}
	
	/**
	 * loadbyid
	 *
	 * @param integer barcode_id 
	 * @return bool
	 * @access public
	 */
	public function loadbyid($barcode_id) {
		global $LANG;
		
		if (!$barcode_id) { $this->error = "Barcode ID not selected"; return false; }
		
		if ($data = $this->barcoderoute->find(array('barcode_id' => $barcode_id))) {
			$this->alias		= $data['alias'];
			$this->barcode		= $data['barcode'];
			$this->contact		= $data['contact'];
			$this->printer		= $data['printer'];
			$this->barcode_id	= $data['barcode_id'];
			$this->faxcatid		= $data['faxcatid'];
			return true;
		}
		
		$this->error = sprintf($LANG['BARCODEROUTE_DOESNT_EXIST'], $barcode_id);
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
	 * get_barcode_id
	 *
	 * @return integer
	 * @access public
	 */
	public function get_barcode_id() {
		return $this->barcode_id;
	}
	
	/**
	 * get_barcode
	 *
	 * @return integer
	 * @access public
	 */
	public function get_barcode() {
		return $this->barcode;
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
		if (!$this->barcode_id) { $this->error = "No entry loaded"; return false; }
		
		$this->alias = $alias;
		return $this->barcoderoute->update_entry(array('alias' => $alias));
	}
	
	/**
	 * set_barcode
	 *
	 * @param integer var
	 * @return bool
	 * @access public
	 */
	public function set_barcode($barcode) {
		if (!$this->barcode_id) { $this->error = "No entry loaded"; return false; }
	
		$this->barcode = $barcode;
		return $this->barcoderoute->update_entry(array('barcode' => $barcode));
	}
	
	/**
	 * set_contact
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_contact($contact) {
		if (!$this->barcode_id) { $this->error = "No entry loaded"; return false; }
		
		$this->contact = $contact;
		return $this->barcoderoute->update_entry(array('contact' => $contact));
	}

	/**
	 * set_printer
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_printer($printer) {
		if (!$this->barcode_id) { $this->error = "No entry loaded"; return false; }
	
		$this->printer = $printer;
		return $this->barcoderoute->update_entry(array('printer' => $printer));
	}
	
	/**
	 * set_faxcatid
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_faxcatid($faxcatid) {
		if (!$this->barcode_id) { $this->error = "No entry loaded"; return false; }
		
		$this->faxcatid = $faxcatid;
		$this->barcoderoute->data->set_id($this->barcode_id);
		return $this->barcoderoute->update_entry(array('faxcatid' => $faxcatid));
	}
}
