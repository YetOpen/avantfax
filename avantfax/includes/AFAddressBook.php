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
 * CLASS: AFAddressBook
	METHODS:
		public function __construct()
		public function create($companyname)
		public function loadbycid($cid)
		public function get_companies($with_reserved = false) // array(cid, company name, bool fax2email)
		public function search_companies($query)
		public function totalfaxes(&$from, &$to)
		public function get_companyid()
		public function set_company($companyname)
		public function delete_cid($cid)
		public function has_fax2email()
		public function get_company()
		public function get_error()
		private function load_vals($data)
		public function create_faxnumid($faxnumber)
		public function delete_companyfaxids($cid)
		public function delete_faxnumid($abookfax_id)
		public function loadbyfaxnumid($abookfax_id)
		public function loadbyfaxnum($faxnumber, &$mult)
		public function reassign($newcid)
		public function save_settings(array $data)
		public function get_multinfo(&$abookfax_id, &$company)
		public function get_faxnums()
		public function get_faxnumber()
		public function get_description()
		public function get_category()
		public function get_printer()
		public function get_faxnumid()
		public function get_email()
		public function get_faxfrom()
		public function get_faxto()
		public function get_to_person()
		public function get_to_location()
		public function get_to_voicenumber()
		public function inc_faxfrom()
		public function inc_faxto()
		private function load_faxvals(array $data)
		public function create_contact($name, $email)
		public function create_contacts($string)
		public function get_contacts() // email contacts Name <email>
		public function make_contact_list(&$abookemail_id, &$name, &$email)
		public function remove_contact($abookemail_id)
		public function load_contact_by_id($abookemail_id)
		public function update_contact($name, $email)
		public function get_contact_name()
		public function get_contact_email()
*/

/*
class AddressBook
	public $abook_id, $company;

class AddressBookEmail
	public 

class AddressBookFAX
	public $abookfax_id, $abook_id, $faxnumer, $email, $description, $to_person, $to_location, $to_voicenumber, $faxcatid, $printer, $faxfrom, $faxto;

*/

class AFAddressBook
{
	protected	$abook_id, // the addressbook id, one per company
				$company; // the company name
						
	protected	$email_array,
				$fax_array;
	
	private		$addressbook,
				$addressbookfax,
				$addressbookemail;
	
	private		$error = NULL;
	
	/**
	 * construct
	 *
	 * @return integer
	 * @access public
	 */
	public function __construct() {
		$this->addressbook		= new MDBOData('AddressBook');
		$this->addressbookfax	= new MDBOData('AddressBookFAX');
		$this->addressbookemail	= new MDBOData('AddressBookEmail');
		$this->email_array		= array();
		$this->fax_array		= array();
	}
	
	/**
	 * create - create a new address book entry
	 * 
	 * @param string companyname
	 * @return bool
	 * @access public
	 */
	public function create($companyname) {
		global $LANG;
		
		if (!$companyname) {
			$this->error = $LANG['ASSIGN_MISSING'];
			return false;
		}
		
		$this->company = $companyname;
		
		$lookup = array('company' => $this->company);
		
		// check if entry already exists
		if ($res = $this->addressbook->find($lookup)) {
			$this->abook_id = $res['abook_id'];
			$this->error = $LANG['COMPANY_EXISTS'];
			return false;
		}
		
		// add to DB
		if ($this->addressbook->new_entry($lookup)) {
			$this->abook_id = $this->addressbook->get_id();
			return true;
		}
		
		$this->error = "No abook_id created";
		return false;
	}
	
	/**
	 * loadbycid - loads company by cid
	 *
	 * @param integer cid
	 * @return bool
	 * @access public
	 */
	public function loadbycid($cid) {
		if (!$cid) { $this->error = "No abook_id loaded"; return false; }
		
		$this->abook_id = $cid;
		
		if ($data = $this->addressbook->find(array('abook_id' => $this->abook_id))) {
			$this->company = $data['company'];
			return true;
		}
		
		$this->abook_id = NULL;
		return false;
	}
	
	/**
	 * get_companies - get companies to make a list
	 *
	 * @param bool with_reserved "except reserved number"
	 * @return array
	 * @access public
	 */
	public function get_companies($with_reserved = false) {
		global $RESERVED_FAX_NUM;
		$sql = (!$with_reserved) ? "WHERE company != ".$this->addressbook->quote($RESERVED_FAX_NUM) : NULL;
		$results = $this->addressbook->query("SELECT * FROM AddressBook $sql ORDER BY company", false);
		return $results;
	}
	
	/**
	 * search_companies - static get companies to make a list
	 *
	 * @param string query
	 * @return array
	 * @access public
	 */
	public function search_companies($query) {
		$keywords		= trim($query);
		$keywords		= preg_replace("/ /", "%", $keywords);
		$lc_kw			= strtolower($keywords);
		$uc_kw			= strtoupper($keywords);
		
		$sql = "company LIKE ".$this->addressbook->quote("%$keywords%");
		$sql .= " OR company LIKE ".$this->addressbook->quote("%$lc_kw%");
		$sql .= " OR company LIKE ".$this->addressbook->quote("%$uc_kw%");
		
		return $this->addressbook->query("SELECT * FROM AddressBook WHERE $sql ORDER BY company", false);
	}
	
	/**
	 * totalfaxes - totalfaxes returns total number of faxes sent and received with this company
	 *
	 * @param integer from
	 * @param integer to
	 * @return void
	 * @access public
	 */
	public function totalfaxes(&$from, &$to) {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		$from	= $this->fax_array['faxfrom'];
		$to		= $this->fax_array['faxto'];
		return true;
	}
	
	/**
	 * get_companyid
	 *
	 * @return integer
	 * @access public
	 */
	public function get_companyid() {
		if (!$this->abook_id) { $this->error = "No abook_id loaded"; return NULL; }
		return $this->abook_id;
	}
	
	/**
	 * set_company
	 *
	 * @param string name
	 * @return bool
	 * @access public
	 */
	public function set_company($companyname) {
		global $LANG;
		
		if (!$this->abook_id) {	$this->error = "No abook_id loaded"; return false; }
		if (!$companyname) {	$this->error = $LANG['ASSIGN_MISSING']; return false; }

		// sets company name for loaded company
		$this->company = $companyname;
		return $this->addressbook->update_entry(array('company' => $this->company));
	}
	
	/**
	 * delete_cid - delete the company id
	 *
	 * @param integer cid
	 * @return bool
	 * @access public
	 */
	public function delete_cid($cid) {
		if (!$cid) { $this->error = "No abook_id loaded"; return false; }
		$this->addressbook->data->set_id($cid);
		return $this->addressbook->delete_entry();
	}
	
	/**
	 * has_fax2email - check if company is configured for fax2email
	 *
	 * @return bool
	 * @access public
	 */
	public function has_fax2email() {
		if ($this->addressbookfax->query("SELECT email FROM AddressBookFAX
											WHERE abook_id = ".$this->addressbookfax->quote($this->abook_id)." 
											AND email is not null AND email != ''")) {
			return true;
		}
		return false;
	}

	/**
	 * get_company - gets company name
	 *
	 * @return string
	 * @access public
	 */
	public function get_company() {
		if (!$this->abook_id) { $this->error = "No abook_id loaded"; return false; }
		
		if (!$this->company) {
			$this->loadbycid($this->abook_id);
		}
		
		return $this->company;
	}
	
	/**
	 * get_error - gets company name
	 *
	 * @return string
	 * @access public
	 */
	public function get_error() {
		return $this->error;
	}
	
	/**
	 *
	 * FAX
	 */
	 
	/**
	 * create_faxnumid - add a new fax number to loaded company
	 *
	 * @param string faxnum
	 * @return bool
	 * @access public
	 */
	public function create_faxnumid($faxnumber) {
		if (!$this->abook_id) { $this->error = "No abook_id loaded"; return false; }
		global $LANG;
		
		$this->fax_array = array();
		$this->fax_array['faxnumber'] = clean_faxnum($faxnumber);
		
		if (!$this->fax_array['faxnumber']) {
			$this->error = "fax number missing";
			return false;
		}
		
		$lookup = array('abook_id' => $this->abook_id, 'faxnumber' => $this->fax_array['faxnumber']);
		
		// check if device already exists
		if ($this->addressbookfax->findext($lookup)) {
			$this->error = "Company already has this fax number";
			return false;
		}
		
		// add to DB
		if ($this->addressbookfax->new_entry($lookup)) {
			$this->fax_array['abookfax_id'] = $this->addressbookfax->get_id();
			return true;
		}
		
		$this->error = $LANG['FAXNUMID_NOT_CREATED'];
		$this->fax_array['abookfax_id'] = NULL;
		return false;
	}
	
	/**
	 * delete_companyfaxids - delete the company id
	 *
	 * @param integer cid
	 * @return bool
	 * @access public
	 */
	public function delete_companyfaxids($cid) {
		if (!$cid) { $this->error = "No abook_id sent"; return false; }
		
		return $this->addressbookfax->query("DELETE FROM AddressBookFAX WHERE abook_id = ".$this->addressbookfax->quote($cid));
	}
	
	/**
	 * delete_faxnumid - delete the faxnumber
	 *
	 * @param integer faxnumid
	 * @return bool
	 * @access public
	 */
	public function delete_faxnumid($abookfax_id) {
		if (!$abookfax_id) { $this->error = "No abookfax_id sent"; return false; }
		
		return $this->addressbookfax->delete_entry(array('abookfax_id' => $abookfax_id));
	}

	/**
	 * loadbyfaxnumid - loads info for this faxnumid
	 *
	 * @param integer faxnumid
	 * @return bool
	 * @access public
	 */
	public function loadbyfaxnumid($abookfax_id) {
		if (!$abookfax_id) {
			$this->error = "No faxnumid sent";
			return false;
		}
		
		global $LANG;
		$this->fax_array = array();
		
		if ($data = $this->addressbookfax->find(array('abookfax_id' => $abookfax_id))) {
			return $this->load_faxvals($data);
		}
		
		$this->error = $LANG['NO_COMPANY_FOR_FAXNUM'];
		return false;
	}
	
	/**
	 * loadbyfaxnum - look up comany name by fax number and load the cid
	 *
	 * @param string faxnum
	 * @param integer mult
	 * @return bool
	 * @access public
	 */
	public function loadbyfaxnum($faxnumber, &$mult) {
		if (!$faxnumber) {
			$this->error = "No faxnumber sent";
			return false;
		}
	
		global $LANG;
		$mult = false;
		$this->multiple = false;
		
		$faxnumber = clean_faxnum($faxnumber);
		
		// check if device already exists
		if ($results = $this->addressbookfax->find(array('faxnumber' => $faxnumber), SQL_AND, NULL, NULL, false, false /* don't reduce the array*/)) {
			if (is_array($results)) {
				$num = count($results);
				// if the find method returns an array, each row of results must be a separate array
				if ($num == 1) {
					$this->load_faxvals($results[0]);
				} elseif ($num > 1) {
					$mult = true;
					$this->multiple = true;
				}
			}
			return true;
		}
		
		$this->error = $LANG['NO_COMPANY_FOR_FAXNUM']." '$faxnumber'";
		return false;
	}
	
	/**
	 * reassign - reassign a faxnumber to another company
	 *
	 * @param integer newcid
	 * @return bool
	 * @access public
	 */
	public function reassign($newcid) {
		if (!$newcid) { $this->error = "No abook_id loaded"; return false; }
		if (!$this->abook_id) { $this->error = "No abook_id loaded"; return false; }
		
		if ($this->addressbookfax->find(array('abook_id' => $newcid))) {
			if ($this->addressbookfax->query("UPDATE AddressBookFAX SET abook_id = ".$this->addressbookfax->quote($newcid). " 
												WHERE abook_id = ".$this->addressbookfax->quote($this->abook_id))) {
				return $this->delete_cid($this->abook_id); // delete old cid
			} else {
				$this->error = "Error updating AddressBookFAX";
			}	
		} else {
			$this->error = "Invalid cid";
		}
		return false;
	}
	
	/**
	 * save_settings - sets description for loaded faxnumber
	 *
	 * @return bool
	 * @access public
	 */
	public function save_settings(array $data) {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		
		if (array_key_exists('faxnumber', $data)) {
			if (!$data['faxnumber']) {
				return $this->delete_faxnumid($this->fax_array['abookfax_id']);
			}
		}
		
		$this->fax_array = array_merge($this->fax_array, $data);
		
		return $this->addressbookfax->update_entry($this->fax_array);
	}

	/**
	 * get_multinfo
	 *
	 * @param integer abookfax_id
	 * @param string company
	 * @return bool
	 * @access public
	 */
	public function get_multinfo(&$abookfax_id, &$company) {
		if (!$this->multiple) { $this->error = "No multiple results"; return false; }

		static $queried, $results;
		
		if (!$queried) {
			$faxnumber = (array_key_exists('faxnumber', $this->fax_array)) ? $this->fax_array['faxnumber'] : NULL;
			
			$results = $this->addressbookfax->query("SELECT AddressBookFAX.abookfax_id, AddressBook.company FROM AddressBookFAX
													JOIN AddressBook USING(abook_id)
													WHERE AddressBookFAX.faxnumber = ". $this->addressbookfax->quote($faxnumber));
			$queried = true;
		}
		
		// returns the company name and id
		if (is_array($results)) {
			if ($data = array_shift($results)) {
				$abookfax_id = $data['abookfax_id'];
				$company = $data['company'];
				return true;
			}
		}
		
		$this->multiple	= false;
		$this->fax_array['faxnumber']	= NULL;
		$queried			= false;
		$results				= NULL;
		return false;
	}
	
	/**
	 * get_faxnums - static look up fax numbers for loaded company and return fax number and fax number id
	 *
	 * @return array
	 * @access public
	 */
	public function get_faxnums() {
		if (!$this->abook_id) { $this->error = "No abook_id loaded"; return NULL; }
		
		return $this->addressbookfax->find(array('abook_id' => $this->abook_id), SQL_AND, NULL, NULL, false, false /* don't reduce the array*/);
	}
	
	/**
	 * get_faxnumber - returns description loaded faxnumber
	 *
	 * @return string
	 * @access public
	 */
	public function get_faxnumber() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		
		return $this->fax_array['faxnumber'];
	}
	
	/**
	 * get_description - returns description loaded faxnumber
	 *
	 * @return string
	 * @access public
	 */
	public function get_description() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return array_key_exists('description', $this->fax_array) ? $this->fax_array['description'] : NULL;
	}
	
	/**
	 * get_category - returns category loaded faxnumber
	 *
	 * @return integer
	 * @access public
	 */
	public function get_category() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return array_key_exists('faxcatid', $this->fax_array) ? $this->fax_array['faxcatid'] : NULL;
	}
	
	/**
	 * get_printer - returns printer loaded faxnumber
	 *
	 * @return integer
	 * @access public
	 */
	public function get_printer() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return array_key_exists('printer', $this->fax_array) ? $this->fax_array['printer'] : NULL;
	}
	
	/**
	 * get_faxnumid
	 *
	 * @return integer
	 * @access public
	 */
	public function get_faxnumid() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return $this->fax_array['abookfax_id'];
	}
	
	/**
	 * get_email - gets fax number id's email if set
	 *
	 * @return string
	 * @access public
	 */
	public function get_email() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return array_key_exists('email', $this->fax_array) ? $this->fax_array['email'] : NULL;
	}

	/**
	 * get_faxfrom - get number of faxes recvd from this fax num
	 *
	 * @return integer
	 * @access public
	 */
	public function get_faxfrom() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return array_key_exists('faxfrom', $this->fax_array) ? $this->fax_array['faxfrom'] : NULL;
	}
	
	/**
	 * get_faxto - get number of faxes sent to this fax num
	 *
	 * @return integer
	 * @access public
	 */
	public function get_faxto() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return array_key_exists('faxto', $this->fax_array) ? $this->fax_array['faxto'] : NULL;
	}
	
	/**
	 * get_to_person
	 *
	 * @return string
	 * @access public
	 */
	public function get_to_person() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return array_key_exists('to_person', $this->fax_array) ? $this->fax_array['to_person'] : NULL;
	}
	
	/**
	 * get_to_location
	 *
	 * @return string
	 * @access public
	 */
	public function get_to_location() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return array_key_exists('to_location', $this->fax_array) ? $this->fax_array['to_location'] : NULL;
	}
	
	/**
	 * get_to_voicenumber
	 *
	 * @return string
	 * @access public
	 */
	public function get_to_voicenumber() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		return array_key_exists('to_voicenumber', $this->fax_array) ? $this->fax_array['to_voicenumber'] : NULL;
	}
	
	/**
	 * inc_faxfrom - increment number of faxes sent to this num
	 *
	 * @return bool
	 * @access public
	 */
	public function inc_faxfrom() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		
		$faxfrom = array_key_exists('faxfrom', $this->fax_array) ? $this->fax_array['faxfrom']+1 : 1;
		
		return $this->save_settings(array('faxfrom' => $faxfrom));
	}
	
	/**
	 * inc_faxto - increment number of faxes sent to this num
	 *
	 * @return bool
	 * @access public
	 */
	public function inc_faxto() {
		if (!array_key_exists('abookfax_id', $this->fax_array)) { $this->error = "No abookfax_id loaded"; return false; }
		
		$faxto = array_key_exists('faxto', $this->fax_array) ? $this->fax_array['faxto']+1 : 1;
		
		return $this->save_settings(array('faxto' => $faxto));
	}
	
	/**
	 * PRIVATE FUNCTIONS
	 */
	
	/**
	 * load_faxvals
	 *
	 * @param array data
	 * @return void
	 * @access public
	 */
	private function load_faxvals(array $data) {
		$this->fax_array	= $data;
		$this->abook_id		= $data['abook_id'];
		$this->company		= NULL; // force lookup of company name
		return true;
	}
	
	/**
	 *
	 * CONTACTS
	 */
	
	/**
	 * create - used by the contact editing page
	 *
	 * @param string name
	 * @param string email
	 * @return bool
	 * @access public
	 */
	public function create_contact($name, $email) {
		global $LANG;
		
		$this->email_array['contact_name']	= $name;
		$this->email_array['contact_email']	= $email;
		
		if (!$this->email_array['contact_email']) {
			$this->error = $LANG['REGWARN_MAIL'];
			return false;
		}

		if (!$this->email_array['contact_name']) {
			$this->error = $LANG['NAME_MISSING'];
			return false;
		}

		// check if email address already exists for this user
		if ($this->addressbookemail->find(array('contact_email' => $this->email_array['contact_email']))) {
			$this->error =  $LANG['REGWARN_MAIL_EXISTS'];
			return false;
		}
		
		if ($this->addressbookemail->new_entry(array('contact_name' => $this->email_array['contact_name'],
														'contact_email' => $this->email_array['contact_email']))) {
			$this->email_array['abookemail_id'] = $this->addressbookemail->get_id();
			return true;
		}
		
		$this->error = "AddressBookEmail contact not created.";
		return false;
	}
	
	/**
	 * create_contacts - could be just email or both name and email or list of names & emails used when forwarding PDFs via email
	 *
	 * @param string email
	 * @return void
	 * @access public
	 */
	public function create_contacts($string) {
		// separate string by comma or semicolon
		$arr = preg_split("/[;]/", $string, -1, PREG_SPLIT_NO_EMPTY);
		
		for ($i = 0; $i < count($arr); $i++) {
			// two possibilites:
			// david mimms <david.mimms@example.com>
			// david.mimms@example.com
			$data = explode("<", $arr[$i]);
			
			$name = $data[0];
			$email = (array_key_exists(1, $data)) ? $data[1] : NULL;
			
			if ($email) {
				$email	= preg_replace("/[<>]/", "", $email);
				$email	= trim($email);
			}
			
			$name	= preg_replace("/[<>]/", "", $name);
			$name	= trim($name);
			
			if (invalid_email($email)) {		// if email is not an email address
				if (!invalid_email($name)) {	// test if name is an email address
					$email = $name;				// copy name into email
					
					list($name, $j) = explode("@", $name);		// get first part of email address for name
					$name = preg_replace("/[._]/", " ", $name);	// replace . and _ with a space
					
					$this->create_contact($name, $email);		// send to contact_create
				}
			} else { // email is valid address
				$this->create_contact($name, $email);			// send to contact_create
			}
		}
	}
	
	/**
	 * get_contacts - returns array of contacts in format '"name" <email>'
	 *
	 * @return array
	 * @access public
	 */
	public function get_contacts() {
		$results = $this->addressbookemail->query("SELECT abookemail_id, CONCAT('&quot;', contact_name, '&quot; &lt;', contact_email, '&gt;') as contact
													FROM AddressBookEmail ORDER BY contact_name", false);
		if (!is_array($results)) {
			$this->error = "No contacts found.";
			return NULL;
		}
		
		$contacts = array();
		
		foreach ($results as $data) {
			$contacts[$data['abookemail_id']] = $data['contact'];
		}
		
		return $contacts;
	}
	
	/**
	 * make_contact_list - returns info for editing contacts used by contact editing page
	 *
	 * @param integer abookemail_id
	 * @param string name
	 * @param string email
	 * @return bool
	 * @access public
	 */
	public function make_contact_list(&$abookemail_id, &$name, &$email) {
		static $queried, $results;
		
		if (!$queried) {
			$results = $this->addressbookemail->query("SELECT abookemail_id, contact_name, contact_email FROM AddressBookEmail ORDER BY contact_name");
			$queried = true;
		}
		
		if (is_array($results)) {
			if ($data = array_shift($results)) {
				$abookemail_id	= $data['abookemail_id'];
				$name			= $data['contact_name'];
				$email			= $data['contact_email'];
				return true;
			}
		}
		
		$queried	= false;
		$results	= NULL;
		$this->clear();
		return false;
	}
	
	/**
	 * remove_contact - used by contact editing page
	 *
	 * @param integer user id
	 * @return bool
	 * @access public
	 */
	public function remove_contact($abookemail_id) {
		return $this->addressbookemail->query("DELETE FROM AddressBookEmail WHERE abookemail_id = ".$this->addressbookemail->quote($abookemail_id));
	}
	
	/**
	 * load_contact_by_id - used by contact editing page
	 *
	 * @param integer
	 * @return bool
	 * @access public
	 */
	public function load_contact_by_id($abookemail_id) {
		$this->email_array['abookemail_id'] = $abookemail_id;
		
		if ($data = $this->addressbookemail->find(array('abookemail_id' => $this->email_array['abookemail_id']))) {
			$this->email_array['contact_name']	= $data['contact_name'];
			$this->email_array['contact_email']	= $data['contact_email'];
			return true;
		}
		
		$this->email_array['abookemail_id'] = NULL;
		$this->error = "Invalid abookemail_id for this account '$this->email_array['abookemail_id']'";
		return false;
	}
	
	/**
	 * update_contact - used by contact editing page
	 *
	 * @param string name
	 * @param string email
	 * @return bool
	 * @access public
	 */
	public function update_contact($name, $email) {
		if (!$this->email_array['abookemail_id']) { $this->error = "No abookemail_id loaded"; return false; }
	
		global $LANG;
		
		$this->email_array['contact_name'] = $name;
		$this->email_array['contact_email'] = $email;
		
		if (!$this->email_array['contact_email']) {
			$this->error = $LANG['REGWARN_MAIL'];
			return false;
		}
		
		if (!$this->email_array['contact_name']) {
			$this->error = $LANG['NAME_MISSING'];
			return false;
		}
		
		return $this->addressbookemail->update_entry(array('contact_name' => $this->email_array['contact_name'],
															'contact_email' => $this->email_array['contact_email']));
	}
	
	/**
	 * get_name
	 *
	 * @return string name
	 * @access public
	 */
	public function get_contact_name() {
		return $this->email_array['contact_name'];
	}
	
	/**
	 * get_contact_email
	 *
	 * @return string email
	 * @access public
	 */
	public function get_contact_email() {
		return $this->email_array['contact_email'];
	}
}
