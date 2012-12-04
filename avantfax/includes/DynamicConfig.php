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
 * CLASS: DynamicConfig
	METHODS:
		public function __construct()
		public function get_dynconf_id()
		public function get_device()
		public function get_callid()
		public function lookup($device, $callid)
		public function list_rules()
		public function remove($id)
		public function get_error()
		public function create($device, $callid)
		public function load_rule($id)
		public function save_rule($device, $callid)
*/

class DynamicConfig
{
	private	$dynconf_id	= NULL,
			$device		= NULL,
			$callid		= NULL;

	private	$error		= NULL;
	
	private $dynamicconfig;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->dynamicconfig = new MDBOData('DynConf');
	}
	
	/**
	 * get_dynconf_id
	 *
	 * @return integer
	 * @access public
	 */
	public function get_dynconf_id() {
		return $this->dynconf_id;
	}
	
	/**
	 * get_device
	 *
	 * @return integer
	 * @access public
	 */
	public function get_device() {
		return $this->device;
	}
	
	/**
	 * get_callid
	 *
	 * @return integer
	 * @access public
	 */
	public function get_callid() {
		return $this->callid;
	}
	
	/**
	 * lookup - search for a RejectCall rule for $callid
	 *
	 * @param device
	 * @param callid
	 * @return string
	 * @access public
	 */ 
	public function lookup($device, $callid) {
		if ($res = $this->dynamicconfig->find(array('callid' => $callid))) {
			foreach ($res as $result) {
				if (!$result['device']) // match rules for all devices
					return true;
			
				if ($result['device'] == $device) // match rules for specific devices
					return true;
			}
		}
		return false;
	}
	
	/**
	 * list_rules
	 *
	 * @param device
	 * @param callid
	 * @return string
	 * @access public
	 */
	public function list_rules() {
		return $this->dynamicconfig->query("SELECT dynconf_id, device, callid FROM DynConf ORDER BY callid", false);
	}
	
	/**
	 * remove
	 *
	 * @param dynconf_id
	 * @return string
	 * @access public
	 */
	public function remove($id) {
		$this->dynamicconfig->data->set_id($id);
		return $this->dynamicconfig->delete_entry();
	}
	
	/**
	 * get_error
	 *
	 * @return string
	 * @access public
	 */
	public function get_error() {
		return $this->error();
	}
	
	/**
	 * create - create a new rule
	 *
	 * @param string device
	 * @param string callid
	 * @return bool
	 * @access public
	 */
	public function create($device, $callid) {
		global $LANG;
		
		$this->callid	= $callid;
		$this->device	= $device;
		$rule			= array('callid' => $callid, 'device' => $device);
		
		// check if rule already exists
		if ($this->dynamicconfig->find($rule)) {
			$this->error = $LANG['DYNCONF_EXISTS'];
			return false;
		}
		
		// add to DB
		if ($this->dynamicconfig->new_entry($rule)) {
			$this->dynconf_id = $this->dynamicconfig->get_id();
			return true;
		}
		
		$this->error = $LANG['DYNCONF_NOT_CREATED'];
		return false;
	}
	
	/**
	 * load_rule
	 *
	 * @param integer id
	 * @return bool
	 * @access public
	 */
	public function load_rule($id) {
		if (!$id) { $this->error = "DynConf not selected"; return false; }
		
		if ($this->dynamicconfig->load($id)) {
			$data = $this->dynamicconfig->get_info();
			$this->dynconf_id	= $data['dynconf_id'];
			$this->device		= $data['device'];
			$this->callid		= $data['callid'];
			return true;
		}
		
		$this->error = "Rule $id doesn't exist";
		return false;
	}
	
	/**
	 * save_rule
	 *
	 * @param string device
 	 * @param string callid
	 * @return bool
	 * @access public
	 */
	public function save_rule($device, $callid) {
		if (!$this->dynconf_id) { $this->error = "DynConf not loaded"; return false; }
		
		$this->device	= $device;
		$this->callid	= $callid;
		
		return $this->dynamicconfig->update_entry(array('device' => $device, 'callid' => $callid));
	}
}
