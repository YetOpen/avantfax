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
 * CLASS: ArchiveOut extends FaxPDFArchive
	METHODS:
		public function create($path, $userid, $cid, $origfaxnum, $pages)
 */
class ArchiveOut extends FaxPDFArchive
{
	/**
	 * create
	 *
	 * @param string path
	 * @param integer userid
	 * @param integer cid
	 * @param string origfaxnum
	 * @param integer pages
	 * @return bool
	 * @access public
	 */
	public function create($path, $userid, $cid, $origfaxnum, $pages) {
		global $INSTALLDIR;
		$this->faxpath		= $path;
		$this->userid		= $userid;
		$this->pages		= $pages;
		$this->companyid	= $cid;
		$this->origfaxnum	= clean_faxnum($origfaxnum);
		
		// remove $INSTALLDIR from path
		$this->faxpath		= str_replace($INSTALLDIR, "", $this->faxpath);
		
		if ($this->faxarchive->new_entry(array('userid' => $this->userid, 'faxpath' => $this->faxpath, 'companyid' => $this->companyid,
												'archstamp' => 'NOW()', 'inbox' => FALSE, 'origfaxnum' => $this->origfaxnum, 'pages' => $this->pages))) {
			$this->dbdata['fid']= $this->faxarchive->get_id();
		} else {
			$this->error	= "No fid created";
			avantfaxlog("class ArchiveOut> Fax not inserted into database for faxpath '$this->faxpath'");
			return false;
		}

		avantfaxlog("class ArchiveOut> fax '$this->faxpath' sent by userid '$this->userid' to companyid '$this->companyid'");
		return true;
	}
}
