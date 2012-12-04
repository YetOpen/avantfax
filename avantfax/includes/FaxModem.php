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
 * CLASS: FaxModem
	METHODS:
		public function __construct()
        public function create($device, $alias, $contact = NULL, $printer = NULL, $faxcatid = NULL)
        public function delete_device($device)
        public function get_modems()
        public function list_modems(&$devid, &$alias, &$device)
        public function load_device($device)
        public function get_status()
        public function get_alias()
        public function get_contact()
        public function get_devid()
        public function get_device()
        public function get_error()
		public function get_printer()
		public function get_faxcatid()
        public function set_alias($alias)
        public function set_contact($contact)
		public function set_faxcatid($faxcatid)
*/

class FaxModem
{
	private	$devid		= NULL,
			$error		= NULL,
			$alias		= NULL,
			$device		= NULL,
			$printer	= NULL,
			$faxcatid	= NULL,
			$contact	= NULL;
	
	private	$status		= array(),
			$all_data	= array();
	
	private	$modems;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->modems = new MDBOData('Modems');
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
	public function create($device, $alias, $contact = NULL, $printer = NULL, $faxcatid = NULL) {
		global $LANG;
		$this->alias	= $alias;
		$this->device	= $device;
		$this->contact	= $contact;
		$this->printer	= $printer;
		$this->faxcatid	= $faxcatid;
				
		if (!$this->alias || !$this->device) {
			$this->error = $LANG['MODEM_NOT_CREATED'];
			return false;
		}
		
		// check if device already exists
		if ($this->modems->find(array('device' => $this->device))) {
			$this->error = $LANG['MODEM_EXISTS'];
			return false;
		}
		
		// add modem to DB
		if ($this->modems->new_entry(array('device' => $this->device, 'alias' => $this->alias, 'contact' => $this->contact, 'printer' => $this->printer, 'faxcatid' => $this->faxcatid))) {
			$this->didr_id = $this->modems->get_id();
			return true;
		}
		
		$this->error = $LANG['MODEM_NOT_CREATED'];
		return false;
	}
	
	/**
	 * delete_device - delete the modem
	 *
	 * @param string device
	 * @return bool
	 * @access public
	 */
	public function delete_device($device) {
		$this->modems->data->set_id($device);
		return $this->modems->delete_entry();
	}
	
	/**
	 * get_modems - return array of all modems configured
	 *
	 * @return array
	 * @access public
	 */
	public function get_modems() {
		global $LANG;
		
		$ret	= array();
		$modem	= $this->modems->query("SELECT device FROM Modems ORDER BY alias", false);
		
		if (is_array($modem)) {
			foreach ($modem as $device) {
				$ret[] = $device['device'];
			}
			return $ret;
		}
		
		$this->error = $LANG['NO_MODEMS_CONFIGURED'];
		return NULL;
	}
	
	/**
	 * list_modems
	 *
	 * @param integer devid
	 * @param string alias
	 * @param string device
	 * @return bool
	 * @access public
	 */
	public function list_modems(&$devid, &$alias, &$device) {
		global $LANG;
		static $queried, $results;
		
		if (!$queried) {
			$results = $this->modems->query("SELECT * FROM Modems ORDER BY device", false);
			$queried = true;
		}
		
		if (is_array($results)) {
			if ($data = array_shift($results)) {
				$device		= $data['device'];
				$devid		= $data['devid'];
				$alias		= $data['alias'];
				return true;
			}
		}
		
		$queried = false;
		$this->error = $LANG['NO_MODEMS_CONFIGURED'];
		return false;
	}
	
	/**
	 * load_device
	 *
	 * @param string device
	 * @return bool
	 * @access public
	 */
	public function load_device($device) {
		global $LANG;
		
		if (!$device) { $this->error = "Modem not selected"; return false; }
		
		if ($data = $this->modems->find(array('device' => $device))) {
			$this->alias	= $data['alias'];
			$this->device	= $data['device'];
			$this->contact	= $data['contact'];
			$this->devid	= $data['devid'];
			$this->printer	= $data['printer'];
			$this->faxcatid	= $data['faxcatid'];
			$this->all_data	= $data;
			return true;
		}
		
		$this->error = sprintf($LANG['MODEM_DOESNT_EXIST'], $device);
		return false;
	}
	
	/**
	 * get_status
	 *
	 * @return string
	 * @access public
	 */
	public function get_status() {
		global $FAXSTAT, $LANG;
	
		// load all modem status.  the status array is not persistant so modem 
		//	status will be refreshed with every page view, but only once every page view
		if (count($this->status) == 0) {
			$status = NULL;
			
			exec("$FAXSTAT 2>/dev/null", $array);
			for ($i = 0; $i < count($array); $i++) {
				preg_match("/ ([a-zA-Z0-9]*) /", $array[$i], $match);
				if (!empty($match[1])) {
					$status = substr($array[$i], strpos($array[$i], ': ')+2);
					$status = trim($status);
					
					//	$status = "Receiving from \"00 39 0438 395832\"";
					switch (substr($status, 0, 2)) {
						case "Ru": // Running (free)
							$code = array('class' => 'modem-free', 'status' => $LANG['FAXFREE']);
							break;
						case "Se": // Sending fax
							$z = str_replace("Sending job ", "", $status);
							$code = array('class' => 'modem-send', 'status' => $LANG['FAXSEND']." {JID: $z}");
							break;
						case "Re": // Receiving facsimile
							$code = array('class' => 'modem-recv', 'status' => $LANG['FAXRECV']); 
							$z = str_replace("Receiving from ", "", $status);
							$z = str_replace("Receiving facsimile", "", $z);
							$z = preg_replace("/Receiving \[(\d+)\] from /", "", $z);
							
							$company = $z;
							if ($res = phone_lookup($z)) {
								$company = $res;
							}
							
							if ($company) {
								$code = array('class' => 'modem-recv-from', 'status' => $LANG['FAXRECVFROM'].' '.$company);
							}
							break;
						default: // Please Wait
							$code = array('class' => NULL, 'status' => $LANG['PLSWAIT']);
							break;
					}
					$this->status[$match[1]] = $code;
				}
			}
		}
		
		// return the cached code 
		if (isset($this->status[$this->device])) {
			return $this->status[$this->device];
		} else {
			return array('class' => 'modem-wait', 'status' => $LANG['PLSWAIT']);
		}
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
	 * get_contract
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
	 * get_devid
	 *
	 * @return integer
	 * @access public
	 */
	public function get_devid() {
		return $this->devid;
	}
	
	/**
	 * get_device
	 *
	 * @return string
	 * @access public
	 */
	public function get_device() {
		return $this->device;
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
		if (!$this->devid) { $this->error = "No modem loaded"; return false; }
		
		$this->alias = $alias;
		$this->modems->data->set_id($this->devid);
		$this->all_data['alias'] = $this->alias;
		return $this->modems->update_entry($this->all_data);
	}
	
	/**
	 * set_contact
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_contact($contact) {
		if (!$this->devid) { $this->error = "No modem loaded"; return false; }
		
		$this->contact = $contact;
		$this->modems->data->set_id($this->devid);
		$this->all_data['contact'] = $this->contact;
		return $this->modems->update_entry($this->all_data);
	}
	
	/**
	 * set_printer
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_printer($printer) {
		if (!$this->devid) { $this->error = "No modem loaded"; return false; }
	
		$this->printer = $printer;
		$this->modems->data->set_id($this->devid);
		$this->all_data['printer'] = $this->printer;
		return $this->modems->update_entry($this->all_data);
	}
	
	/**
	 * set_faxcatid
	 *
	 * @param string var
	 * @return bool
	 * @access public
	 */
	public function set_faxcatid($faxcatid) {
		if (!$this->devid) { $this->error = "No modem loaded"; return false; }
		
		$this->faxcatid = $faxcatid;
		$this->modems->data->set_id($this->devid);
		$this->all_data['faxcatid'] = $this->faxcatid;
		return $this->modems->update_entry($this->all_data);
	}
}
