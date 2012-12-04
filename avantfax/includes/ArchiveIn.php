<?php
/**
 * AvantFAX - HylaFAX Web 2.0 interface
 *
 * PHP 5
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

/**
 * CLASS: ArchiveIn extends FaxPDFArchive
	METHODS:
		public function create($path, $faxnid, $faxnumber, $modem, $pages, $date = NULL, $didr_id = NULL)
        public function set_archivebox($faxid)
        public function rotate_fax()
        private function set_modemdev($modem) 
 */
class ArchiveIn extends FaxPDFArchive
{
	/**
	 * create - $faxnid is 0 when there are multiple results
	 *
	 * @param string path
	 * @param integer faxnid
	 * @param string faxnumber
	 * @param string modem
	 * @param integer pages
	 * @param string date
	 * @param integer didr_id
	 * @return bool
	 * @access public
	 */
	public function create($path, $faxnid, $faxnumber, $modem, $pages, $date = NULL, $didr_id = NULL) {
		$this->create_fax($path, $faxnid, $faxnumber, $pages, $date, $didr_id); // pdf path and faxnumid
		$res = $this->set_modemdev($modem);
		avantfaxlog("ArchiveIn> fax '$path' from fax number '$faxnumber' - $modem");
		return $res;
	}
	
	/**
	 * set_archivebox - remove fax from inbox
	 *
	 * @param integer faxid
	 * @return bool
	 * @access public
	 */
	public function set_archivebox($faxid) {
		global $INSTALLDIR;
		
		if ($this->load_fax($faxid)) {
			$this->dbdata['inbox'] = false;
			
			if ($this->faxarchive->update_entry($this->dbdata)) {
// Don't delete thumbnail images
//				for ($i = 0; $i < $this->dbdata['pages']; $i++) {
//					$file = $INSTALLDIR.DIRECTORY_SEPARATOR.$this->dbdata['faxpath'].DIRECTORY_SEPARATOR.PREVIMG.$i.PREVIMGSFX;
//					if (file_exists($file))
//						unlink($file);
//				}
				return true;
			} else {
				$this->error = "Invalid faxid";
			}
		}
		
		$this->error = "No faxid to set archivebox";
		return false;
	}
	
	/**
	 * rotate_fax
	 *
	 * @return bool
	 * @access public
	 */
	public function rotate_fax() {
		if (!array_key_exists('fid', $this->dbdata)) { $this->error = "No fid loaded"; return false; }
		if (!$this->dbdata['inbox']) { $this->error = "Not in inbox"; return false; }
		
		global $CONVERT, $INSTALLDIR, $DPI, $TIFFCP, $TIFFPS, $PNMSCALE, $PNMDEPTH, $PPMTOGIF, $GSN, $GSN2, $TIFFSPLIT, $TMPDIR;

		$pages	= $this->dbdata['pages'];
		$path	= $INSTALLDIR.DIRECTORY_SEPARATOR.$this->dbdata['faxpath'];
		
		// tiffsplit TIF
		// loop per page
		// create Inbox thumbnail
		// create viewfax thumnails
		// use all rotated tif files to create new rotated tif file
		// return
	
		$faxfile	= $path.DIRECTORY_SEPARATOR.TIFFNAME;
		$preview	= $path.DIRECTORY_SEPARATOR.THUMBNAIL;
		
		$ran		= genpasswd();
		$basedir	= $TMPDIR.$ran.DIRECTORY_SEPARATOR;
		$tmpfile	= $basedir."rotate-$ran";
		
		mkdirs($basedir);
		
		// start timing how long it takes to convert faxes
		$time_start = microtime(true);
	
		system("$TIFFSPLIT $faxfile ${basedir}rot_");
		
		// list the tiff files
		$faxfiles = scandir($basedir);
		$tiff_list = array();
		
		$cnt = 0;		
		
		foreach ($faxfiles as $file) {
			if (!strstr($file, "rot_"))
				continue;
			
			$newfile = "${basedir}r${file}";
			
			system("$CONVERT -rotate 180 ${basedir}${file} $newfile");
			
			if ($cnt === 0) {
				system("$CONVERT -scale ".PREV_TN." $newfile $preview");
			}

			$final_file = "$path/".PREVIMG.$cnt.PREVIMGSFX;
//			system("$CONVERT -scale ".PREV_SP." $newfile $final_file"); // doesn't work on all TIFs
			system("$TIFFPS $newfile > $tmpfile.ps 2>/dev/null");
			system("$GSN -sOutputFile=$tmpfile.2 $tmpfile.ps -c quit > /dev/null 2>&1");
			system("$PNMSCALE -width ".PREV_SP." $tmpfile.2 2>/dev/null | $PNMDEPTH 31 | $PPMTOGIF 2>/dev/null > $final_file");
			
			$tiff_list[] = $newfile;
			$cnt++;
		}
		
		// create rotated TIF image
		$file_list = implode(" ", $tiff_list);
		system("$CONVERT $file_list $faxfile");
//		system("$CONVERT -rotate 180 $faxfile $tmpfile-orig.tif"); // super slow
		
		$time_end = microtime(true);
		$time = $time_end - $time_start;
		avantfaxlog("ArchiveIn> Rotated $faxfile ($pages pages) in $time secs at $DPI dpi");
		return true;
	}
	
	/**
	 * prune_inbox
	 *
	 * @param integer days
	 * @return void
	 * @access public
	 */
	public function prune_inbox($days) {
		$date =  date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-$days, date("Y")));
		
		$results = $this->faxarchive->query("SELECT fid FROM FaxArchive WHERE inbox = true AND archstamp < ".$this->faxarchive->quote($date), false);
		
		if (is_array($results)) {
			foreach ($results as $value) {
				extract($value);
				echo "prune_inbox> Archiving faxid '$fid'\n";
				$this->set_archivebox($fid);
			}
		}
	}

	/**
		PRIVATE METHODS
	*/

	/**
	 * set_modemdev
	 *
	 * @param string modem
	 * @return 
	 * @access private
	 */
	private function set_modemdev($modemdev) {
		if (!$modemdev) { $this->error = "Modem missing"; return false; }
		
		$this->dbdata['modemdev']	= $modemdev;
		$this->dbdata['inbox']			= true;
		
		return $this->faxarchive->update_entry($this->dbdata);
	}
}
