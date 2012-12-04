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
 * CLASS FaxPDFArchive
 * METHODS:
 *	public function __construct()
 *	public function get_faxcatid()
 *	public function get_num_faxes($devices, $faxcats)
 *	public function get_error()
 *	public function user_has_rights(array $modems, array $routes, array $faxcat)
 *	public function get_fid_prev()
 *	public function get_fid_next()
 *	public function search_archive($criteria)
 *	public function next_archive_entry(&$fid)
 *	public function viewable_devices($devices, $faxcats)
 *	public function list_inbox($devices, $index = 0, $limit = 25)
 *	public function load_fax($faxid)
 *	public function set_category($catid, $userid = 0)
 *	public function remove_category($catid)
 *	public function set_note($desc, $catid, $userid)
 *	public function set_faxcontent($faxcontent)
 *	public function delete_fax($fid = NULL)
 *	public function prune_archive($days)
 *	public function set_faxnumid($id)
 *	public function set_companyid($id)
 *	public function reassign($oldcid, $newcid)
 *	public function get_userid()
 *	public function get_archstamp()
 *	public function get_fid()
 *	public function get_description()
 *	public function get_lastmoduser()
 *	public function get_lastmoddate()
 *	public function get_faxnumid()
 *	public function get_origfaxnum()
 *	public function get_tiffpath()
 *	public function get_pdfpath()
 *	public function get_faximages()
 *	public function get_pages()
 *	public function get_inbox()
 *	public function get_companyid()
 *	public function get_thumbnail()
 *	public function get_didr_id()
 *	public function get_modemdev()
 *	protected function create_fax($path, $faxnid, $faxnumber, $pages, $date = NULL, $didr_id = NULL)
 *	private function load_vals($data)
 */

class FaxPDFArchive
{
	protected	$thumbnail			= NULL,
				$tiffpath			= NULL,
				$pdfpath			= NULL,
				$faximages			= NULL,
				$m_archstamp		= NULL,
				$m_lastmoddate		= NULL,
				$m_lastoperation	= NULL,
				$error				= NULL;
					
	private		$archive_results,
				$sqlroutes,
				$debug;// = true;
	
	protected	$faxarchive, $dbdata;
	
	/**
	 * construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		$this->faxarchive	= new MDBOData('FaxArchive');
		$this->dbdata		= array();
	}
	
	/**
	 * get_faxcatid
	 *
	 * @return integer
	 * @access public
	 */
	public function get_faxcatid() {
		if (!array_key_exists('fid', $this->dbdata)) { $this->error = "No fid loaded"; return false; }
		return $this->dbdata['faxcatid'];
	}
	
	/**
	 * get_num_faxes
	 *
	 * @param string modem
	 * @return integer
	 * @access public
	 */
	public function get_num_faxes($devices, $faxcats) {
		$this->viewable_devices($devices, $faxcats);
		$results = $this->faxarchive->query("SELECT fid FROM FaxArchive WHERE inbox=TRUE $this->sqlroutes", false);
		return count($results);
	}
	
	/**
	 * get_error
	 *
	 * @return string
	 * @access public
	 */
	public function get_error() { return $this->error; }
	
	/**
	 * user_has_rights
	 *
	 * @param array modems
	 * @param array routes
	 * @param array faxcats
	 * @return bool
	 * @access public
	 */
	public function user_has_rights($userid, array $modems, array $routes, array $faxcat) {
		if (!array_key_exists('fid', $this->dbdata)) { $this->error = "No fid loaded"; return false; }
		
		$has_rights = false;
		
		$modems = $this->check_empty_array($modems);
		$faxcat = $this->check_empty_array($faxcat);
		$routes = $this->check_empty_array($routes);
		
		if ($userid == $this->dbdata['userid']) {
			$has_rights = true;
		}
		
		if (is_array($modems)) {
			if (in_array($this->dbdata['modemdev'], $modems)) {
	//			echo "Found modemdev ".$this->dbdata['modemdev']." in\n";print_r($modems);
				$has_rights = true;
			}
		}
		
		if (is_array($faxcat)) {
			if (in_array($this->dbdata['faxcatid'], $faxcat)) {
	//			echo "Found faxcatid ".$this->dbdata['faxcatid']." in\n";print_r($faxcat);
				$has_rights = true;
			}
		}
		
		if (is_array($routes)) {
			if (in_array($this->dbdata['didr_id'], $routes)) {
	//			echo "Found route ".$this->dbdata['didr_id']." in\n";print_r($routes);
				$has_rights = true;
			}
		}
		
		return $has_rights;
	}
	
	/**
	 * check_empty_array
	 *
	 * @param 
	 * @return integer
	 * @access public
	 */
	public function check_empty_array(array $a) {
		$cnt = count($a);
		
		if ($cnt > 0) {
			if ($a[0] == NULL) {
				array_shift($a);
			}
		}
	
		return $a;
	}
	
	/**
	 * get_fid_prev - get FaxID of previous fax in Inbox
	 *
	 * @return integer
	 * @access public
	 */
	public function get_fid_prev() {
		if (!array_key_exists('fid', $this->dbdata)) { $this->error = "No fid loaded"; return false; }
		
		$results	= $this->faxarchive->query("SELECT fid FROM FaxArchive WHERE inbox=TRUE $this->sqlroutes ORDER BY fid DESC", false);
		$fid		= NULL;
		
		if (is_array($results)) {
			while ($info = array_shift($results)) {
				if ($info['fid'] == $this->dbdata['fid']) {
					return $fid;
				} else {
					$fid = $info['fid'];
				}
			}
		}
		
		return NULL;
	}
	
	/**
	 * get_fid_next
	 *
	 * @return integer
	 * @access public
	 */
	public function get_fid_next() {
		if (!array_key_exists('fid', $this->dbdata)) { $this->error = "No fid loaded"; return false; }
		
		$results	= $this->faxarchive->query("SELECT fid FROM FaxArchive WHERE inbox=TRUE $this->sqlroutes ORDER BY fid DESC", false);
		$is_next	= false;
		
		if (is_array($results)) {
			while ($info = array_shift($results)) {
				if ($is_next) {
					return $info['fid'];
				}
				
				if ($info['fid'] == $this->dbdata['fid']) {
					$is_next = true;
				}
			}
		}
		
		return NULL;
	}
	
	/**
	 * search_archive - make list of faxes in archive by date, companyid, category, modemdev, sent and/or received
	 *
	 *
	 *	 $criteria = array(
	 *	 	'start_date'	=> NULL,
	 *		'end_date'		=> NULL,
	 *		'keywords'		=> NULL,
	 *		'companyid'		=> NULL,
	 *		'sentrecvd'		=> NULL,
	 *		'category'		=> NULL,
	 *		'faxid'			=> NULL,
	 *		'userid'		=> NULL,	// faxes sent by this userid
	 *		'categories'	=> NULL,	// viewable categories
	 *		'modemdevs'		=> NULL,	// viewable modem devices
	 *		'didroutes'		=> NULL,	// viewable DID routes
	 *		'superuser'		=> bool,
	 *		'pagelimit'		=> 25,
	 *		'pageindex'		=> 0
	 *	);
	 *
	 * @param array criteria
	 * @return integer
	 * @access public
	 */
	public function search_archive($criteria) {
		global $ENABLE_DID_ROUTING;
		
		extract($criteria);
		
		$query = "SELECT fid FROM FaxArchive LEFT JOIN AddressBookFAX ON (FaxArchive.faxnumid=AddressBookFAX.abookfax_id) WHERE inbox = FALSE ";
		
		$query_didroutes	= $this->prepare_didroutes($didroutes);
		$query_categories	= $this->prepare_categories($categories);
		$query_modemdevs	= $this->prepare_modemdevs($modemdevs);
		$query_category		= $this->faxarchive->quote($category);
		$query_userid		= $this->faxarchive->quote($userid);
		
		if ($query_didroutes == "didr_id = ''")
			$query_didroutes = "didr_id = 'X'";
		
//		RESTRICTED_USER_MODE

		switch ($sentrecvd) {
			case "s": // show only my sent faxes
				if ($userid) {
					$query .= " AND userid = ".$query_userid." ";
				} else {
					$query .= " AND userid is not null ";
				}
				
				$query .= " AND modemdev is null ";
				break;
			case "r": // show only received faxes I can view
				if ($ENABLE_DID_ROUTING) {				// DID
					if (!$superuser) {					// Not Superuser
						if ($category) {
							if ($query_didroutes) {
								$query .= " AND (".$query_didroutes.")";
							}
						} else {
							if ($query_didroutes && $query_categories) {
								if (RESTRICTED_USER_MODE) {
									$query .= " AND (((".$query_didroutes.") AND (".$query_categories.")) OR ((".$query_didroutes.") AND FaxArchive.faxcatid is null))";
								} else {
									$query .= " AND (((".$query_didroutes.") OR (".$query_categories.")) OR ((".$query_didroutes.") AND FaxArchive.faxcatid is null))";
								}
							} elseif (!$query_didroutes && $query_categories) {
								$query .= " AND (".$query_categories.")";
							} elseif ($query_didroutes && !$query_categories) {
								$query .= " AND (".$query_didroutes.")";
							}
						}
					} else {
						$query .= " AND modemdev is not null ";
					}
				} else {								// Not DID
					if (!$superuser) {					// Not Superuser
						if ($category) {
							if ($query_modemdevs) {
								$query .= " AND (".$query_modemdevs.")";
							}
						} else {
							if ($query_modemdevs && $query_categories) {
								if (RESTRICTED_USER_MODE) {
									$query .= " AND (((".$query_modemdevs.") AND (".$query_categories.")) OR ((".$query_modemdevs.") AND FaxArchive.faxcatid is null))";
								} else {
									$query .= " AND (((".$query_modemdevs.") OR (".$query_categories.")) OR ((".$query_modemdevs.") AND FaxArchive.faxcatid is null))";
								}
							} elseif (!$query_modemdevs && $query_categories) {
								$query .= " AND (".$query_categories.")";
							} elseif ($query_modemdevs && !$query_categories) {
								$query .= " AND (".$query_modemdevs.")";
							}
						}
					} else {							// Superuser
						$query .= " AND modemdev is not null ";
					}
				}
				
				if ($category) {						// category ID specified
					$query .= " AND FaxArchive.faxcatid = ".$query_category." ";
				}
				
				$query .= " AND userid = 0 ";			// remove users from results
				break;
			case "*":									// show only viewable modemlines and categories, and my sent faxes
				if ($ENABLE_DID_ROUTING) {				// DID
					if (!$superuser) {					// Not Superuser
						if ($category) {
							if ($query_didroutes) {
								$query .= " AND (".$query_didroutes." OR userid = ".$query_userid.")";
							}
						} else {
							if ($query_didroutes && $query_categories) {
								if (RESTRICTED_USER_MODE) {
									$query .= " AND (((".$query_didroutes.") AND (".$query_categories.")) OR ((".$query_didroutes.") AND FaxArchive.faxcatid is null) OR userid = ".$query_userid.")";
								} else {
									$query .= " AND (((".$query_didroutes.") OR (".$query_categories.")) OR ((".$query_didroutes.") AND FaxArchive.faxcatid is null) OR userid = ".$query_userid.")";
								}
							} elseif (!$query_didroutes && $query_categories) {
								$query .= " AND (".$query_categories." OR userid = ".$query_userid.")";
							} elseif ($query_didroutes && !$query_categories) {
								$query .= " AND (".$query_didroutes." OR userid = ".$query_userid.")";
							}
						}
					}
				} else {
					if (!$superuser) {					// Not Superuser
						if ($category) {
							if ($query_modemdevs) {
								$query .= " AND (".$query_modemdevs." OR userid = ".$query_userid.")";
							}
						} else {
							if ($query_modemdevs && $query_categories) {
								if (RESTRICTED_USER_MODE) {
									$query .= " AND (((".$query_modemdevs.") AND (".$query_categories.")) OR ((".$query_modemdevs.") AND FaxArchive.faxcatid is null) OR userid = ".$query_userid.")";
								} else {
									$query .= " AND (((".$query_modemdevs.") OR (".$query_categories.")) OR ((".$query_modemdevs.") AND FaxArchive.faxcatid is null) OR userid = ".$query_userid.")";
								}
							} elseif (!$query_modemdevs && $query_categories) {
								$query .= " AND (".$query_categories." OR userid = ".$query_userid.")";
							} elseif ($query_modemdevs && !$query_categories) {
								$query .= " AND (".$query_modemdevs." OR userid = ".$query_userid.")";
							}
						}
					} else {							// Superuser
						if ($userid) {					// if userid specified
							$query .= " AND userid = ".$query_userid." ";
						}
					}
				}
				
				if ($category) {						// category ID specified
					$query .= " AND FaxArchive.faxcatid = ".$query_category." ";
				}
				break;
			default:
				if ($ENABLE_DID_ROUTING) {
					if (!$superuser) {
						$query .= " AND (".$query_didroutes." OR userid = ".$query_userid.") ";
					}
				} else {
					if (!$superuser) {
						$query .= " AND (".$query_modemdevs." OR userid = ".$query_userid.") ";
					} else {
						if ($userid) {
							$query .= " AND userid = ".$query_userid." ";
						}
					}
				}
				break;
		}
		
		if ($start_date && $end_date) {
			$query .= " AND (archstamp > ".$this->faxarchive->quote("$start_date")." AND archstamp < ".$this->faxarchive->quote("$end_date").") ";
		} elseif ($start_date) {
			$query .= " AND archstamp LIKE ".$this->faxarchive->quote("$start_date%")." ";
		}
		
		if ($faxid) {
			$query .= " AND FaxArchive.fid = ".$this->faxarchive->quote($faxid);
		}

		if ($keywords) {
			$keywords		= trim($keywords);
			$keywords		= preg_replace("/ /", "%", $keywords);
			$lc_kw			= strtolower($keywords);
			$uc_kw			= strtoupper($keywords);
			
			$query .= " AND (FaxArchive.description LIKE ".$this->faxarchive->quote("%$keywords%").
							" OR FaxArchive.description LIKE ".$this->faxarchive->quote("%$lc_kw%").
							" OR FaxArchive.description LIKE ".$this->faxarchive->quote("%$uc_kw%").
							" OR FaxArchive.faxcontent LIKE ".$this->faxarchive->quote("%$keywords%").
							" OR FaxArchive.faxcontent LIKE ".$this->faxarchive->quote("%$lc_kw%").
							" OR FaxArchive.faxcontent LIKE ".$this->faxarchive->quote("%$uc_kw%").") ";
		}
		
		if ($companyid) {
			$query .= " AND (AddressBookFAX.abook_id = ".$this->faxarchive->quote($companyid)." OR FaxArchive.companyid = ".$this->faxarchive->quote($companyid).") ";
		}
		
		$query .= " ORDER BY fid DESC";
		
		$archive_numrows	= $this->faxarchive->query($query, false);
		$numrows			= count($archive_numrows);
		$archive_numrows	= NULL;
				
		$numpages	= ($numrows > $pagelimit) ? ceil($numrows/$pagelimit) : 0;
		$pageindex	= ($pageindex > ($numpages-1)) ? $numpages-1 : $pageindex;
		
		if ($pageindex < 0) {
			$pageindex = 0;
		}
		
		$offset = $pageindex * $pagelimit;
		
		$query .= " LIMIT $offset, $pagelimit";
		
		$this->archive_results = $this->faxarchive->query($query, false);
		
//		echo $query."\n";
		
		return $numrows;
	}

	/**
	 * next_archive_entry - return next archive entry
	 *
	 * @param integer faxid
	 * @return bool
	 * @access public
	 */
	public function next_archive_entry(&$fid) {
		if (is_array($this->archive_results)) {
			if ($data = array_shift($this->archive_results)) {
				$fid = $data['fid'];
				return true;
			}
		}
		
		$this->archive_results = NULL;
		return false;
	}
	
	/**
	 * viewable_devices
	 *
	 * @param array devices
	 * @return void
	 * @access public
	 */
	public function viewable_devices($devices, $faxcats) {
		global $ENABLE_DID_ROUTING;
		$myroutes		= array();
		$mycategories	= array();
		
		// limit by devices or DID groups
		if (is_array($devices)) {
			foreach ($devices as $device) {
				if ($device === '') continue;
			
				if ($ENABLE_DID_ROUTING) {
					$myroutes[] = "didr_id = ".$this->faxarchive->quote($device);
				} else {
					$myroutes[] = "modemdev = ".$this->faxarchive->quote($device);
				}
			}
		}
		
		$this->sqlroutes = (count($myroutes)) ? " AND (".join(" OR ", $myroutes).")" : " AND modemdev = '' ";
		
		// limit by fax categories
		if (is_array($faxcats)) {
			foreach ($faxcats as $ids) {
				$mycategories[] = "faxcatid = ".$this->faxarchive->quote($ids);
			}
			
			$mycategories[] = "(faxcatid is null or faxcatid = '')"; // allow faxes without a fax category id
			
			$this->sqlroutes .= (count($mycategories)) ? " AND (".join(" OR ", $mycategories).")" : " AND faxcatid = '' ";
		}
	}
	
	/**
	 * list_inbox
	 * first call runs sql query and returns first result
	 * subsequent calls return next result
	 * after last result, return false
	 *
	 * @param string modem
	 * @return bool
	 * @access public
	 */
	public function list_inbox($devices, $index = 0, $limit = 25, $faxcats) {
		static $queried, $results;
		
		$order_by = (INBOX_LIST_MODEM == true) ? 'modemdev, fid DESC' : 'fid DESC';
		
		// check if $queried already exists
		if ($queried != true) { // run query
			$this->viewable_devices($devices, $faxcats);
			
			$query = "SELECT FaxArchive.*, DATE_FORMAT(FaxArchive.archstamp, ".ARCHIVE_DATE_FORMAT.")
					AS m_archstamp FROM FaxArchive WHERE inbox=TRUE $this->sqlroutes ORDER BY $order_by";
			
			$num_rows = $this->faxarchive->query($query, false);
			
			if ($index < 0) {
				$index = 0;
			}
			
			$offset = $index * $limit;
			
			$query .= " LIMIT $offset, $limit";
			
			$results = $this->faxarchive->query($query, false);
			
			$queried = true;
		}
		
		if (is_array($results)) {
			if ($data = array_shift($results)) {
				$this->load_vals($data);
				return true;
			}
		}
		
		$queried	= false;
		$results	= NULL;
		return false;
	}
		
	/**
	 * load_fax
	 *
	 * @param integer faxid
	 * @return bool
	 * @access public
	 */
	public function load_fax($faxid) {
		if (!$faxid) {$this->error = "No faxid to load"; return false; }
		
		$result = $this->faxarchive->query("SELECT FaxArchive.*,
											DATE_FORMAT(FaxArchive.archstamp,		".ARCHIVE_DATE_FORMAT.") AS m_archstamp,
											DATE_FORMAT(FaxArchive.lastmoddate,		".ARCHIVE_DATE_FORMAT.") AS m_lastmoddate,
											DATE_FORMAT(FaxArchive.lastoperation,	".ARCHIVE_DATE_FORMAT.") AS m_lastoperation
											FROM FaxArchive WHERE fid = ".$this->faxarchive->quote($faxid));
		if ($result) {
			$this->load_vals($result);
			return true;
		}
		
		$this->error = "load_fax error: $faxid didn't load";
		return false;
	}

	/**
	 * set_category
	 *
	 * @param integer category id
	 * @param integer userid
	 * @return bool
	 * @access public
	 */
	public function set_category($catid, $userid = 0) {
		if (!array_key_exists('fid', $this->dbdata)) {$this->error = "No fid loaded"; return false; }
		
		$this->dbdata['faxcatid']		= $catid;
		$this->dbdata['lastmoduser']	= $userid;
		
		return $this->faxarchive->update_entry($this->dbdata);
	}
	
	/**
	 * remove_category
	 *
	 * @param integer categoryid
	 * @return bool
	 * @access public
	 */
	public function remove_category($catid) {
		if (!$catid) { $this->error = "No valid catid sent"; return false; }
		
		return $this->faxarchive->query("UPDATE FaxArchive SET faxcatid = NULL WHERE faxcatid = ".$this->faxarchive->quote($catid));
	}
	
	/**
	 * set_note - give the fax a description
	 *
	 * @param string description
	 * @param integer userid
	 * @return bool
	 * @access public
	 */
	public function set_note($description, $category, $userid) {
		if (!array_key_exists('fid', $this->dbdata)) {$this->error = "No fid loaded"; return false; }

		$this->dbdata['faxcatid']		= $category;
		$this->dbdata['description']	= $description;
		$this->dbdata['lastmoduser']	= $userid;
		$this->dbdata['lastmoddate']	= 'NOW()';
		
		$this->faxarchive->update_entry($this->dbdata);

		avantfaxlog("FaxArchive> userid '$userid' has changed description for faxid '".$this->dbdata['fid']."' to '".$this->dbdata['description']."'");
		return true;
	}
	
	/**
	 * set_faxcontent
	 *
	 * @param string faxcontent
	 * @return bool
	 * @access public
	 */
	public function set_faxcontent($faxcontent) {
		if (!array_key_exists('fid', $this->dbdata)) {$this->error = "No fid loaded"; return false; }

		$this->dbdata['faxcontent']	= $faxcontent;
		
		$this->faxarchive->update_entry($this->dbdata);
		
		$len = strlen($faxcontent);

		avantfaxlog("FaxArchive> faxcontent ($len chars) set for faxid '".$this->dbdata['fid']."'");
		return true;
	}
	
	/**
	 * delete_fax
	 *
	 * @param integer fid
	 * @return bool
	 * @access public
	 */
	public function delete_fax($fid = NULL) {
		if ($fid) {
			if (!$this->load_fax($fid)) {
				$this->error = "Invalid fid";
				return false;
			}
		} elseif (!array_key_exists('fid', $this->dbdata) && !$fid) {
			$this->error = "No fid loaded";
			return false;
		}
	
		global $INSTALLDIR;
		
		// remove entry from database and delete fax files
		$this->faxarchive->delete_entry(array('fid' => $this->dbdata['fid']));
		
		if ($this->dbdata['inbox']) {
			for ($i = 0; $i < $this->dbdata['pages']; $i++) {
				if (file_exists($INSTALLDIR.$this->dbdata['faxpath'].DIRECTORY_SEPARATOR.PREVIMG.$i.PREVIMGSFX))
					@unlink($INSTALLDIR.$this->dbdata['faxpath'].DIRECTORY_SEPARATOR.PREVIMG.$i.PREVIMGSFX);
			}
		}
		
		if (file_exists($INSTALLDIR.$this->thumbnail))
			@unlink($INSTALLDIR.$this->thumbnail);
	
		if (file_exists($INSTALLDIR.$this->tiffpath))
			@unlink($INSTALLDIR.$this->tiffpath);

		if (file_exists($INSTALLDIR.$this->pdfpath))
			@unlink($INSTALLDIR.$this->pdfpath);
		
		if (file_exists($INSTALLDIR.$this->dbdata['faxpath']))
			@rmdir($INSTALLDIR.$this->dbdata['faxpath']);
		
		return true;
	}
	
	/**
	 * prune_archive
	 *
	 * @param integer days
	 * @return void
	 * @access public
	 */
	public function prune_archive($days) {
		$date =  date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-$days, date("Y")));
		
		$results = $this->faxarchive->query("SELECT fid FROM FaxArchive WHERE archstamp < ".$this->faxarchive->quote($date), false);
		
		if (is_array($results)) {
			foreach ($results as $value) {
				extract($value);
				avantfaxlog("prune_archive> deleting faxid '$fid'");
				$this->delete_fax($fid);
			}
		}
	}
	
	/**
	 * set_faxnumid - set this ID when user has selected what company they want to use in case of single fax number being used by multiple companies
	 *
	 * @param integer id
	 * @return bool
	 * @access public
	 */
	public function set_faxnumid($id) {
		if (!array_key_exists('fid', $this->dbdata)) {$this->error = "No fid loaded"; return false; }
	
		// add entry to database
		$this->dbdata['faxnumid'] = $id;
		
		if (!$this->faxarchive->update_entry($this->dbdata)) {
			$this->error = "faxnumid not updated";
			avantfaxlog("class FaxArchive> faxnumid not updated for fid '".$this->dbdata['fid']."'");
			return false;
		}
		return true;
	}
	
	/**
	 * set_companyid - set this ID when user has selected what company they want to use in case of reserved fax number
	 *
	 * @param integer id
	 * @return bool
	 * @access public
	 */
	public function set_companyid($id) {
		if (!array_key_exists('fid', $this->dbdata)) {$this->error = "No fid loaded"; return false; }
		
		$this->dbdata['companyid'] = $id;
		
		if (!$this->faxarchive->update_entry($this->dbdata)) {
			$this->error = "companyid not updated";
			avantfaxlog("class FaxArchive> companyid not updated for fid '".$this->dbdata['fid']."'");
			return false;
		}
		return true;
	}
	
	/**
	 * reassign - when a company is assigned to a new company, the reserved faxes need to be reassigned
	 *
	 * @param integer oldcid
	 * @param integer newcid 
	 * @return bool
	 * @access public
	 */
	public function reassign($oldcid, $newcid) {
		if (!$newcid or !$oldcid) return false;
		
		return $this->faxarchive->query("UPDATE FaxArchive SET companyid = ". $this->faxarchive->quote($newcid)." WHERE companyid = ".$this->faxarchive->quote($oldcid));
	}
	
	/**
	 * get_userid
	 *
	 * @return integer
	 * @access public
	 */
	public function get_userid() {
		if (!array_key_exists('fid', $this->dbdata)) { $this->error = "No fid loaded"; return false; }
		return $this->dbdata['userid'];
	}
	
	/**
	 *	get functions
	 */
	public function get_fid()			{ return array_key_exists('fid', $this->dbdata)				? $this->dbdata['fid'] : NULL;			}
	public function get_description()	{ return array_key_exists('description', $this->dbdata)		? $this->dbdata['description'] : NULL;	}
	public function get_lastmoduser()	{ return array_key_exists('lastmoduser', $this->dbdata)		? $this->dbdata['lastmoduser'] : NULL;	}
	public function get_faxnumid()		{ return array_key_exists('faxnumid', $this->dbdata)		? $this->dbdata['faxnumid'] : NULL;		}
	public function get_origfaxnum()	{ return array_key_exists('origfaxnum', $this->dbdata)		? $this->dbdata['origfaxnum'] : NULL;	}
	public function get_pages()			{ return array_key_exists('pages', $this->dbdata)			? $this->dbdata['pages'] : NULL;		}
	public function get_inbox()			{ return array_key_exists('inbox', $this->dbdata)			? $this->dbdata['inbox'] : NULL;		}
	public function get_companyid() 	{ return array_key_exists('companyid', $this->dbdata)		? $this->dbdata['companyid'] : NULL;	}
	public function get_didr_id()		{ return array_key_exists('didr_id', $this->dbdata)			? $this->dbdata['didr_id'] : NULL;		}
	public function get_modemdev()		{ return array_key_exists('modemdev', $this->dbdata)		? $this->dbdata['modemdev'] : NULL;		}
	public function get_tiffpath()		{ return $this->tiffpath;		}
	public function get_pdfpath()		{ return $this->pdfpath;		}
	public function get_thumbnail()		{ return $this->thumbnail;		}
	public function get_faximages()		{ return $this->faximages;		}
	public function get_archstamp()		{ return $this->m_archstamp;	}
	public function get_lastmoddate()	{ return $this->m_lastmoddate;	}

	/**
	 * PROTECTED FUNCTIONS
	 */
	
	/**
	 * create_fax - create new Fax record
	 *
	 * @param string path
	 * @param integer faxnid
	 * @param string faxnumber
	 * @param integer pages
	 * @param string date
	 * @return bool
	 * @access protected
	 */
	protected function create_fax($path, $faxnid, $faxnumber, $pages, $date = NULL, $didr_id = NULL) {
		global $INSTALLDIR;
		$this->dbdata				= array();
		$this->dbdata['faxpath']	= $path;
		$this->dbdata['faxnumid']	= $faxnid;
		$this->dbdata['origfaxnum']	= clean_faxnum($faxnumber);
		$this->dbdata['pages']		= $pages;
		$this->dbdata['didr_id']	= $didr_id;
		$this->dbdata['archstamp']	= $date;
		
		// remove $INSTALLDIR from path
		$this->dbdata['faxpath'] = str_replace($INSTALLDIR, "", $this->dbdata['faxpath']);
		echo "FAXPATH: ".$this->dbdata['faxpath']."\n";
		
		if ($this->faxarchive->new_entry($this->dbdata)) {
			$this->dbdata['fid'] = $this->faxarchive->get_id();
			return true;
		}
		
		$this->error = "No id created";
		avantfaxlog("class FaxArchive> Fax not inserted into database for faxpath '".$this->dbdata['faxpath']."'");
		return false;
	}
	
	/**
	 * PRIVATE FUNCTIONS
	 */

	/**
	 * prepare_didroutes
	 *
	 * @param mixed didroutes
	 * @return string
	 * @access private
	 */
	private function prepare_didroutes($didroutes) {
		$query = NULL;
	
		$num = count($didroutes);
		if ($num) {
			
			for ($i = 0; $i < $num; $i++) {
				if ($i != 0) $query .= " OR ";
				$query .= "didr_id = ".$this->faxarchive->quote($didroutes[$i]);
			}
			
		} else {
			$query .= " didr_id = ".$this->faxarchive->quote($didroutes)." ";
		}
		
		return $query;
	}
	
	/**
	 * prepare_modemdevs
	 *
	 * @param mixed modemdevs
	 * @return string
	 * @access private
	 */
	private function prepare_modemdevs($modemdevs) {
		$query = NULL;
		
		$num = count($modemdevs);
		if ($num) {
			for ($i = 0; $i < $num; $i++) {
				if ($i != 0) $query .= " OR ";
				$query .= "modemdev = ".$this->faxarchive->quote($modemdevs[$i]);
			}
		} else {
			$query .= " modemdev = ".$this->faxarchive->quote($modemdevs)." ";
		}
		
		return $query;
	}
	
	/**
	 * prepare_categories
	 *
	 * @param mixed categories
	 * @return string
	 * @access private
	 */
	private function prepare_categories($categories) {
		$query = NULL;
	
		$num = count($categories);
		if ($num) {
			for ($i = 0; $i < $num; $i++) {
				if ($i != 0) $query .= " OR ";
				$query .= "FaxArchive.faxcatid = ".$this->faxarchive->quote($categories[$i]);
			}
//			$query .= " OR FaxArchive.faxcatid is null";
		} else {
			$query .= " FaxArchive.faxcatid = ".$this->faxarchive->quote($categories);//." OR FaxArchive.faxcatid is null ";
		}
		
		return $query;
	}

	/**
	 * load_vals
	 *
	 * @param array data
	 * @return void
	 * @access private
	 */
	private function load_vals(array $data) {
		if (array_key_exists('m_archstamp', $data)) {
			$this->m_archstamp = $data['m_archstamp'];
			unset($data['m_archstamp']);
		}
		
		if (array_key_exists('m_lastmoddate', $data)) {
			$this->m_lastmoddate = $data['m_lastmoddate'];
			unset($data['m_lastmoddate']);
		}
		
		if (array_key_exists('m_lastoperation', $data)) {
			$this->m_lastoperation = $data['m_lastoperation'];
			unset($data['m_lastoperation']);
		}
		
		$this->dbdata		= $data;
		$this->pdfpath		= $this->dbdata['faxpath'].DIRECTORY_SEPARATOR.PDFNAME;
		$this->thumbnail	= $this->dbdata['faxpath'].DIRECTORY_SEPARATOR.THUMBNAIL;
		$this->tiffpath		= $this->dbdata['faxpath'].DIRECTORY_SEPARATOR.TIFFNAME;
		
		if (array_key_exists('pages', $this->dbdata)) {
			for ($i = 0; $i < $this->dbdata['pages']; $i++) {
				$this->faximages[$i] = $this->dbdata['faxpath'].DIRECTORY_SEPARATOR.PREVIMG.$i.PREVIMGSFX;
			}
		}
		
		if ($this->debug)
			print_r($this->dbdata);
	}
}
