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

define('FU_NO_FILE',		201);
define('FU_INVALIDMIME',	202);
define('FU_OVER_SIZE',		203);
define('FU_INI_SIZE',		204);
define('FU_FORM_SIZE',		205);
define('FU_PARTIAL',		206);
define('FU_NO_TMPDIR',		207);
define('FU_CANT_WRITE',	208);

/**
 * CLASS: FileUpload
 * METHODS:
		public function load_file($file)
		public function limit_mimetype($array)
		public function limit_size($size)
		public function set_name($filename)
		public function set_randname($n = 9)
		public function get_tempname()
		public function get_name()
		public function get_mimetype()
		public function get_filesize()
		public function get_error()
		public function movefile($dir)
	
	Example:
	$fupload = new FileUpload;
	$fupload->limit_mimetype(array('image/jpeg', 'application/pdf', 'image/tiff'));
	$fupload->limit_size(1*1024*1024);
	if ($fupload->load_file($_FILES['image'])) {
		if ($fupload->movefile($uploaddir)) {
			$image_path = $relativedir.DIRECTORY_SEPARATOR.$fupload->get_name();
		}
	}
	
 */

class FileUpload
{
	public		$debug		= false;

	protected	$mimelimit	= array(),
				$sizelimit	= 0,
				$file_size	= 0,
				$filename	= null,
				$mimetype	= null,
				$tmpname	= null,
				$error		= null;

	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	// control file size and mimetype
	public function load_file($file) {
		if ($file['error'] !== UPLOAD_ERR_OK) {
			switch ($file['error']) {
				case UPLOAD_ERR_INI_SIZE:
					$this->error = FU_INI_SIZE;
					break;
				case UPLOAD_ERR_FORM_SIZE:
					$this->error = FU_FORM_SIZE;
					break;
				case UPLOAD_ERR_PARTIAL:
					$this->error = FU_PARTIAL;
					break;
				case UPLOAD_ERR_NO_FILE:
					$this->error = FU_NO_FILE;
					break;
				case UPLOAD_ERR_NO_TMP_DIR:
					$this->error = FU_NO_TMPDIR;
					break;
				case UPLOAD_ERR_CANT_WRITE:
					$this->error = FU_CANT_WRITE;
					break;
			}
			return false;
		}
		
		if (is_uploaded_file($file['tmp_name'])) {
			$this->tmpname = $file['tmp_name'];
		} else {
			$this->error = FU_NO_FILE;
			return false;
		}
		
		// clean upload file name
		$filename = $file['name'];
//		$filename = strtolower($filename);
		$filename = preg_replace("/[^\w\.-_]/", "_", $filename);
		
		$this->filename = $filename;
		
		// check file size
		$this->file_size = $file['size'];
		if ($this->sizelimit != 0 and $this->file_size > $this->sizelimit) {
			$this->error = FU_OVER_SIZE;
			return false;
		}
		
		// check mimetype
		if (function_exists('mime_content_type')) {
			$this->mimetype = mime_content_type($this->tmpname);
		} elseif (extension_loaded('fileinfo')) {
			$minfo = new finfo(FILEINFO_MIME);
			$this->mimetype = $minfo->file($this->tmpname);
		} else {
			$this->mimetype = $file['type'];
		}
		
		// check if extra data is added behind a semicolon, if so remove it
		if (strpos($this->mimetype, ";")) {
			$split = explode(";", $this->mimetype);
			$this->mimetype = $split[0];
		}
		
		// check if extra data is added behind a space, if so remove it
		if (strpos($this->mimetype, " ")) {
			$split = explode(" ", $this->mimetype);
			$this->mimetype = $split[0];
		}
		
		if (count($this->mimelimit)) {
			$match = false;
			
			foreach ($this->mimelimit as $mime) {
				if ($mime === $this->mimetype) {
					$match = true;
				}
			}
			
			if ($match == false) {
				$this->error = FU_INVALIDMIME;
				return false;
			}
		}
		
		return true;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function limit_mimetype($array) {
		if (is_array($array)) {
			$this->mimelimit = $array;
		} else {
			$this->mimelimit = array($array);
		}
		return true;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function limit_size($size) {
		$this->sizelimit = $size;
		return true;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function set_name($filename) {
		$this->filename = $filename;
		return true;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function set_randname($n = 9) {
		$this->filename = substr(md5(microtime()), 0, $n).$this->filename;
		return $this->filename;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function get_tempname() {
		return $this->tmpname;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function get_name() {
		return $this->filename;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function get_mimetype() {
		return $this->mimetype;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function get_filesize() {
		return $this->file_size;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function get_error() {
		return $this->error;
	}
	
	/* ------------------------------------------------------------------------- // ---------------------------------------------------------------------- //
	
	 ******************************************************************************************************************************/
	public function movefile($dir) {
		if (!file_exists($dir)) {
			if (mkdir($dir, 0770)) {
				chmod($dir, 0770);
			} else {
				return false;
			}
		}
		
		return move_uploaded_file($this->tmpname, $dir.DIRECTORY_SEPARATOR.$this->filename);
	}
}
