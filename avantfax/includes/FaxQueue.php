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
 *		JobFmt: "%-3j %3i %1a %15o %40M %-12.12e %5P %5D %7z %.25s"
 */

/**
 * CLASS: FaxQueue
	METHODS:
		public function __construct()
        public function process_queue()
		public function process_failed_queue()
        public function get_queue()
        public function list_owner($owner)
        public function killjob($user, $jid)
 */

class FaxQueue
{
	private	$queue,
			$keys = array('jid', 'pri', 's', 'owner', 'mailaddr', 'number', 'pages', 'dials', 'tts', 'status'),
			$fkeys = array('jid', 'pri', 's', 'owner', 'mailaddr', 'number', 'pages', 'dials', 'status');
	
	/**
	 * __construct
	 *
	 * @param integer num_modems
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->process_queue();
	}
	
	/**
	 * process_queue
	 *
	 * @param integer num_modems
	 * @return void
	 * @access public
	 */
	public function process_queue() {
		global $FAXSENDQ;
		
		exec($FAXSENDQ, $output);
		array_shift($output); 		// HylaFAX scheduler on ...
		
		foreach ($output as $line) {
			if (preg_match("/^Modem /", $line)) {	// match "/^Modem/
				array_shift($output);				// remove entry from array
			} else {
				break;
			}
		}
		
		array_shift($output);		// blank line
		array_shift($output);		// Title line: JID  Owner Number Dials
		
		$this->queue = array();
		
		if (is_array($output)) {
			$i = 0;
			$indices = count($this->keys) -1;
			
			foreach ($output as $q) {
				$arr = explode(" ", $q);
				$j = 0;
				
				foreach ($arr as $a) {
					if ($a) {
						if ($j < $indices) {
							$this->queue[$i][$this->keys[$j]] = $a;
							$j++;
						} else {
							if (isset($this->queue[$i][$this->keys[$j]])) {
								$this->queue[$i][$this->keys[$j]] .= " $a";
							} else {
								$this->queue[$i][$this->keys[$j]] = $a;
							}
						}
					}
				}
				$i++;
			}
		}
	}
	
	/**
	 * process_failed_queue
	 *
	 * @param integer num_modems
	 * @return void
	 * @access public
	 */
	public function process_failed_queue() {
		global $FAXDONEQ;
		
		exec($FAXDONEQ, $output);
		array_shift($output); 		// HylaFAX scheduler on ...
		
		foreach ($output as $line) {
			if (preg_match("/^Modem /", $line)) {	// match "/^Modem/
				array_shift($output);				// remove entry from array
			} else {
				break;
			}
		}
		
		array_shift($output);		// blank line
		array_shift($output);		// JID  Owner Number Dials
		
		$this->queue	= array();
		$queue			= array();
		
		if (is_array($output)) {
			$i = 0;
			$indices = count($this->fkeys) - 1;
			
			foreach ($output as $q) {
				$arr = explode(" ", $q);
				$j = 0;
				
				foreach ($arr as $a) {
					if ($a) {
						if ($j < $indices) {
							$queue[$i][$this->fkeys[$j]] = $a;
							$j++;
						} else {
							if (isset($queue[$i][$this->fkeys[$j]])) {
								$queue[$i][$this->fkeys[$j]] .= " $a";
							} else {
								$queue[$i][$this->fkeys[$j]] = $a;
							}
						}
					}
				}
				$i++;
			}
			
			foreach ($queue as $q) {
				if ($q['s'] == 'F')
					$this->queue[] = $q;
			}
		}
	}
	
	/**
	 * get_queue
	 *
	 * @return array
	 * @access public
	 */ 
	public function get_queue() {
		global $FAXMAILUSER, $WWWUSER;
		$ret	= array();
		$user	= new AFUserAccount;
		
		foreach ($this->queue as $q) {
			if ($q['owner'] === $FAXMAILUSER || $q['owner'] === $WWWUSER) {
				if ($user->loadbyemail($q['mailaddr'])) {
					$q['user']	= $user->name;
				} else {
					$q['user']	= $q['mailaddr'];
				}
			} elseif ($user->load_username($q['owner'])) {
				$q['user']	= $user->name;
			} else {
				$q['user'] = $q['owner'];
			}
			$ret[] = $q;
		}
		
		return $ret;
	}
	
	/**
	 * list_owner - list faxes by owner
	 *
	 * @param string owner
	 * @return array
	 * @access public
	 */
	public function list_owner($owner) {
		global $FAXMAILUSER, $WWWUSER;
		$ret	= array();
		$user	= new AFUserAccount;
		
		foreach ($this->queue as $q) {
			if ($q['owner'] === $owner) {
				if ($user->load_username($q['owner'])) {
					$q['user']	= $user->name;
				} else {
					$q['user']	= $owner;
				}
				$ret[] = $q;
			} elseif ($q['owner'] === $FAXMAILUSER || $q['owner'] === $WWWUSER) {
				if ($user->loadbyemail($q['mailaddr'])) {
					if ($owner == $user->username) {
						$q['user']	= $user->name;
						$ret[]		= $q;
					}
				}
			}
		}
		
		return $ret;
	}
	
	/**
	 * killjob
	 *
	 * @param string user
	 * @param integer jid
	 * @return bool
	 * @access public
	 */
	public function killjob($user, $jid) {
		global $FAXRM;
		
		$res = shell_exec("export FAXUSER=$user; $FAXRM $jid; unset FAXUSER");
		avantfaxlog("FQ>killjob (jid $jid): $res  ($user)");
		return true;
	}
	
	/**
	 * faxalter
	 *
	 * @param string user
	 * @param integer jid
	 * @param array operations
	 * @return bool
	 * @access public
	 */
	public function faxalter($user, $jid, array $operations) {
		global $FAXALTER;

		$ops		= "";
		$killjob	= false;
		
		foreach ($operations as $op => $value) {
			switch ($op) {
				case 'resubmit':	$ops .= ' -r ';		$killjob	= true; break;
				case 'sendtime':	$ops .= ' -a "'.	$value.'"'; break;
				case 'destination':	$ops .= ' -d "'.	$value.'"'; break;
				case 'killtime':	$ops .= ' -k "'.	$value.'"'; break;
				case 'device':		$ops .= ' -m "'.	$value.'"'; break;
				case 'priority':	$ops .= ' -P "'.	$value.'"'; break;
				case 'tries':		$ops .= ' -t "'.	$value.'"'; break;
			}
		}
		
		avantfaxlog("FQ>($user) $FAXALTER $ops $jid");
		$res = shell_exec("export FAXUSER=$user; $FAXALTER $ops $jid; unset FAXUSER");
		avantfaxlog("FQ>faxalter (jid $jid): $res ($user)");
		
		if ($killjob) {
			$this->killjob($user, $jid);
		}
		
		return true;
	}
}
