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
 * Functions:
	function xml_header()
	function bardecode($filename)
	function phone_lookup($var)
	function avantfaxlog($text, $echo = false)
	function avantfax_session()
	function system_v($cmd)
	function str_len($var)
	function rem_nl($str)
	function tmpfilename($suffix)
	function clean_faxnum($fnum)
	function genpasswd($len = MIN_PASSWD_SIZE)
	function invalid_email($email)
	function new_mailer($from, $subject, $text)
	function fupload_error_code($code)
	function sendmaillog($logtext)
	function split_emails($emails)
	function trim_value(&$val)
	function decode_xmlReady($val)
	function decode_entity($val)
	function get_admin_email()
	function mime_by_suffix($filename)
	function get_inbox_count()
	function set_user_prefs($user)
	function display_template($template, $smarty)
	function submit_fax(array $data)
	function exec_sendfax($command)
	function ocr_faxcontent($filename)
	function get_company_details($abookfax_id, $orig_faxnum, $companyid)
	function list_languages()
	function get_filetype($file)
	function mkdirs($dir, $mode = 0777, $recursive = true)
	function get_max_fileupload()
	function faxinfo($path)
	function send_mail($to, $from, $subject, $text, $file = NULL, $altname = NULL, $embedd = NULL)
	function annotate_fax($filename, $string)
	function tiff2pdf($tiff_file, $pdf)
	function convert2pdf($path, $convertfiles)
	function pdf_preview($path)
	function static_preview($path, $pages)
	function unaccent($text)
	function process_template($template, $match, $values)
	function process_html_template($template, $match, $values)
	
 */

	/**
	 * xml_header
	 *
	 * @return void
	 */
	function xml_header() {
		header("Cache-Control: no-cache");
		header("Content-Type: application/xml");
		echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
	}
	
	/**
	 * bardecode
	 *
	 * @param string filename
	 * @return string
	 */
	function bardecode($filename) {
		if (!ENABLE_BARDECODE_SUPPORT or !file_exists(BARDECODE_BINARY)) return NULL;
		
		$command = sprintf(BARDECODE_COMMAND, escapeshellarg($filename));
		
		exec($command, $data, $retval);
		
		if ($retval == 0) {
			return implode("\n", $data);
		}
		
		return NULL;
	}
	
	/**
	 * phone_lookup
	 *
	 * @param string $var fax number
	 * @return bool
	 */
	function phone_lookup($var) {
		if (preg_match("/unknown/i", $var) or preg_match("/unspecified/i", $var) or !$var) {
 			return NULL;
 		}
		
		$nvar			= clean_faxnum($var);
		$addressbook	= new AFAddressBook;

		if ($addressbook->loadbyfaxnum($nvar, $mult)) {
			return $addressbook->get_company();
		} else {
			return NULL;
		}
	}
	
	/**
	 * avantfaxlog
	 *
	 * @param string text
	 * @param bool echo
	 * @return void
	 */
	function avantfaxlog($text, $echo = false) {
		$sl	= new MDBOData('SysLog');
		$sl->new_entry(array('logtext' => $text));
		
		if ($echo) echo "$text\n";
	}
	
	/**
	 * avantfax_session
	 *
	 * @return void
	 */
	function avantfax_session() {
		session_name("AvantFAX");
		session_start();
	}
	
	/**
	 * system_v
	 *
	 * @param string cmd
	 * @return integer
	 */
	function system_v($cmd) {
		echo "$cmd\n";
		system($cmd, $retval);
		return $retval;
	}
	
	/**
	 * str_len
	 *
	 * @param string var
	 * @return string var
	 */
	function str_len($var) {
		if (extension_loaded('mbstring')) {
			return mb_strlen($var, "UTF-8");
		}
		return strlen($var);
	}
	
	/**
	 * rem_nl
	 *
	 * @param string $str
	 * @return string
	 */
	function rem_nl($str) {
		$str = preg_replace("/\r/", "", $str);
		return preg_replace("/\n/", "", $str);
	}
	
	/**
	 * tmpfilename - generate temp file name with suffix
	 *
	 * @param string suffix
	 * @return string
	 */
	function tmpfilename($suffix) {
		global $TMPDIR;
		return $TMPDIR."avantfax-".genpasswd().".$suffix";
	}
	
	/**
	 * clean_faxnum
	 *
	 * @param string fnum
	 * @return string fnum
	 */
	function clean_faxnum($fnum) {
		$res = preg_replace("/[^\+\w]/", "", $fnum); // strip non alpha num except for +
		return $res;
	}
	
	/**
	 * genpasswd
	 *
	 * @param integer len
	 * @return string
	 */
	function genpasswd($len = MIN_PASSWD_SIZE) {
		return substr(md5(microtime()), 0, $len);
	}

	/**
	 * invalid_email
	 *
	 * @param string email
	 * @return bool
	 */
	function invalid_email($email) {
		if (!preg_match("/^[^@]+@([-\w]+\.)+[A-Za-z]{2,4}$/", $email)) {
			return true; // email address is invalid
		}
		return false;
	}
	
	
	/**
	 * new_mailer
	 *
	 * @param string from
	 * @param string subject
	 * @param string text
	 * @return Mailer
	 */
	function new_mailer($from, $subject, $text) {
		$mailer = new Mailer;
		
		$from_address = preg_replace("/(.*?) <(.*?)>/i", '$2', $from);
		
		$mailer->setReturnPath($from_address);
		$mailer->setFrom(decode_entity($from));
		$mailer->setSubject(decode_entity($subject));
		$mailer->setMessage($text);
		return $mailer;
	}
	
	/**
	 * fupload_error_code
	 *
	 * @param integer code
	 * @return string
	 */
	function fupload_error_code($code) {
		global $LANG;
		
		switch ($code) {
			case FU_NO_FILE:		return $LANG['FUPLOAD_NO_FILE'];
			case FU_INVALIDMIME:	return $LANG['FUPLOAD_NOT_ALLOWED'];
			case FU_OVER_SIZE:		return $LANG['FUPLOAD_OVER_LIMIT'];
			case FU_INI_SIZE:		return $LANG['FUPLOAD_OVER_LIMIT_INI'];
			case FU_FORM_SIZE:		return $LANG['FUPLOAD_OVER_LIMIT_FORM'];
			case FU_PARTIAL:		return $LANG['FUPLOAD_NOT_COMPLETE'];
			case FU_NO_TMPDIR:		return $LANG['FUPLOAD_NO_TEMPDIR'];
			case FU_CANT_WRITE:		return $LANG['FUPLOAD_CANT_WRITE'];
		}
	}
	
	
	/**
	 * sendmaillog
	 *
	 * @param string logtext
	 * @return void
	 */
	function sendmaillog($logtext) {
		$log = str_replace("<", "&lt;", $logtext);
		$log = str_replace(">", "&gt;", $log);
		$log = str_replace("\"", "&quot;", $log);
		avantfaxlog("send_mail> $log");
	}
	
	/**
	 * split_emails
	 *
	 * @param string $val
	 * @return array
	 */
	function split_emails($emails) {
		$emails		= decode_entity($emails);
		$to_addy	= preg_split("/[;]/", $emails, -1, PREG_SPLIT_NO_EMPTY);
		
		array_walk($to_addy, 'trim_value');
		
		return  $to_addy;
	}
	
	/**
	 * trim_value
	 *
	 * @param string $arr
	 * @return void
	 */
	function trim_value(&$val) {
		$val = trim($val);
	}
	
	/**
	 * decode_xmlReady
	 *
	 * @param string $val
	 * @return string
	 */
	function decode_xmlReady($val) {
		$val = decode_entity($val);
		$val = str_replace("<", "&lt;", $val);
		$val = str_replace(">", "&gt;", $val);
//		$val = str_replace("\"", "&quot;", $val);
		$val = str_replace("&", "&amp;", $val);
		return $val;
	}
	
	/**
	 * decode_entity
	 *
	 * @param string $val
	 * @return string
	 */
	function decode_entity($val) {
		return html_entity_decode($val, ENT_QUOTES, "UTF-8");
	}
	
	/**
	 * get_admin_email - return system's admin email address
	 *
	 * @return string
	 */
	function get_admin_email() {
		return ADMIN_EMAIL;
	}
	
	/**
	 * mime_by_suffix
	 *
	 * @param string filename
	 * @return string
	 */
	function mime_by_suffix($filename) {
		switch (substr(strrchr($filename, "."), 1)) {
			case 'pdf':
				return 'application/pdf';
			case 'ps':
			case 'eps':
				return 'application/postscript';
			case 'tif':
			case 'tiff':
				return 'image/tiff';
			case 'txt':
				return 'text/plain';
			case 'gif':
				return 'image/gif';
		}
		return NULL;
	}
	
	/**
	 * get_inbox_count
	 *
	 * @return integer
	 */
	function get_inbox_count() {
		global $ENABLE_DID_ROUTING;
		
		$inbox = new ArchiveIn;
		
		if ($ENABLE_DID_ROUTING) {
			$didr			= new DIDRouting;
			$devices		= ($_SESSION[USERSESSION]->superuser) ? $didr->get_routes()			: $_SESSION[USERSESSION]->get_didrouting();
		} else {
			$modeminst		= new FaxModem;
			$devices		= ($_SESSION[USERSESSION]->superuser) ? $modeminst->get_modems()	: $_SESSION[USERSESSION]->get_modemdevs();
		}
		
		$faxcats			= ($_SESSION[USERSESSION]->superuser) ? NULL						: $_SESSION[USERSESSION]->get_faxcats();
		
		return $inbox->get_num_faxes($devices, $faxcats);
	}
	
	/**
	 * set_user_prefs
	 *
	 * @param object $user
	 * @return void
	 */
	function set_user_prefs($user) {
		global $USER_FULLNAME, $SUPERUSER, $IS_ADMIN, $SESSION_CAN_DEL, $LANG, $SF_MAXSIZE;
		
		// set these variables
		$USER_FULLNAME		= $_SESSION[USERSESSION]->name;
		$SUPERUSER			= $_SESSION[USERSESSION]->superuser;
		$SESSION_CAN_DEL	= $_SESSION[USERSESSION]->can_del;
		$IS_ADMIN			= $_SESSION[USERSESSION]->is_admin;
		$lang				= $_SESSION[USERSESSION]->language;
		if ($lang) {
			include_once "langs/$lang.php";
		}
	}
	
	/**
	 * display_template
	 *
	 * @param object $template
	 * @param object $smarty
	 * @return void
	 */
	function display_template($template, $smarty) {
		global $SHOWSERVER_DETAILS, $AVANTFAX_VERSION, $AVANTFAX_SERVERNAME, $SF_FILESIZE,
				$SF_MAXSIZE, $SHOW_ALL_CONTACTS, $LANG, $IS_ADMIN, $ENABLE_DID_ROUTING,
				$RESERVED_FAX_NUM, $ENABLE_DL_TIFF, $SENDFAX_USE_COVERPAGE, $USER_FULLNAME,
				$FOCUS_ON_NEW_FAX, $SUPERUSER, $SESSION_CAN_DEL, $FOCUS_ON_NEW_FAX_POPUP,
				$SENDFAX_REQUEUE_EMAIL;

		$smarty->assign('ENABLE_BARDECODE_SUPPORT',	ENABLE_BARDECODE_SUPPORT);
		$smarty->assign('SENDFAX_USE_COVERPAGE',	$SENDFAX_USE_COVERPAGE);
		$smarty->assign('AVANTFAX_SERVERNAME',		$AVANTFAX_SERVERNAME);
		$smarty->assign('SHOW_ALL_CONTACTS',		$SHOW_ALL_CONTACTS);
		$smarty->assign('SHOWSERVER_DETAILS',		$SHOWSERVER_DETAILS);
		$smarty->assign('ENABLE_DID_ROUTING',		$ENABLE_DID_ROUTING);
		$smarty->assign('ENABLE_OCR_SUPPORT',		ENABLE_OCR_SUPPORT);
		$smarty->assign('FOCUS_ON_NEW_FAX',			$FOCUS_ON_NEW_FAX);
		$smarty->assign('FOCUS_ON_NEW_FAX_POPUP',	$FOCUS_ON_NEW_FAX_POPUP);
		$smarty->assign('AVANTFAX_VERSION',			$AVANTFAX_VERSION);
		$smarty->assign('RESERVED_FAX_NUM',			$RESERVED_FAX_NUM);
		$smarty->assign('MAX_USERNAME_SIZE',		MAX_USERNAME_SIZE);
		$smarty->assign('SESSION_CAN_DEL',			$SESSION_CAN_DEL);
		$smarty->assign('MAX_PASSWD_SIZE',			MAX_PASSWD_SIZE);
		$smarty->assign('MIN_PASSWD_SIZE',			MIN_PASSWD_SIZE);
		$smarty->assign('SENDFAX_REQUEUE_EMAIL',	$SENDFAX_REQUEUE_EMAIL);
		$smarty->assign('ENABLE_DL_TIFF',			$ENABLE_DL_TIFF);
		$smarty->assign('INBOX_LIST_MODEM',			INBOX_LIST_MODEM);
		$smarty->assign('USER_FULLNAME',			$USER_FULLNAME);
		$smarty->assign('MAX_EMAIL_SIZE',			MAX_EMAIL_SIZE);
		$smarty->assign('SF_MAXSIZE',				$SF_MAXSIZE);
		$smarty->assign('SF_FILESIZE',				$SF_FILESIZE);
		$smarty->assign('WHITEPAGES',				WHITEPAGES);
		$smarty->assign('SUPERUSER',				$SUPERUSER);
		$smarty->assign('IS_ADMIN',					$IS_ADMIN);
		$smarty->assign('LANG',						$LANG);
		$smarty->assign('NOTHUMB',					NOTHUMB);
		
		$smarty->display($template);
	}
	
	/**
	 * submit_fax
	 *
	 * @param array fax_data
	 * @return array or NULL
	 */
	function submit_fax(array $data) {
		global $SENDFAX, $FAXCOVER, $TMPDIR, $NUM_PAGES_FOLLOW, $DEFAULT_TSI_ID, $INSTALLDIR;
		
		$debug = false;
		
		if ($debug)
			print_r($data);
		
		extract($data);
		
		$to_company2	= ($to_company)		? '-x '.$to_company		: NULL;
		$regarding2		= ($regarding)		? '-r '.$regarding		: NULL;
		$to_person2		= ($to_person)		? '-t '.$to_person		: NULL;
		$from_cp		= ($from_person)	? '-f '.$from_person	: NULL;
		
		$cp_args		= "$from_cp $to_person2 $to_company2 $comments $regarding2";	// -o user doesn't exist in faxcover
		$sf_args		= "$user $from $to_company2 $comments $regarding2";				// $to_person doesn't exist in sendfax
		$cpsf_args		= "$user $from $regarding2";
		
		if ($to_location) {
			$cp_args .= " -l $to_location";
			$sf_args .= " -y $to_location";
		}
		
		if ($to_voicenumber) {
			$cp_args .= " -v $to_voicenumber";
			$sf_args .= " -V $to_voicenumber";
		}
		
		if ($from_company) {
			$cp_args .= " -X $from_company";
			$sf_args .= " -X $from_company";
		}
		
		if ($from_location) {
			$cp_args .= " -L $from_location";
			$sf_args .= " -Y $from_location";
		}
		
		if ($from_voicenumber) {
			$cp_args .= " -V $from_voicenumber";
			$sf_args .= " -U $from_voicenumber";
		}
	
		if ($from_faxnumber) {
			$cp_args .= " -N $from_faxnumber";
			$sf_args .= " -W $from_faxnumber";
		}
		
		if ($numtries) {
			$sf_args .= " -t $numtries";
			$cpsf_args	.= " -t $numtries";
		}
		
		if ($killtime) {
			$sf_args .= ' -k "'.$killtime.'"';
			$cpsf_args	.= ' -k "'.$killtime.'"';
		}
		
		if ($tsi) {
			$sf_args .= " -S $tsi";
			$cpsf_args	.= " -S $tsi";
		} elseif ($DEFAULT_TSI_ID) {
			$sf_args .= " -S ".escapeshellarg($DEFAULT_TSI_ID);
			$cpsf_args	.= " -S ".escapeshellarg($DEFAULT_TSI_ID);
		}
		
		if ($priority) {
			$sf_args .= ' -P "'.$priority.'"';
			$cpsf_args	.= ' -P "'.$priority.'"';
		}
		
		if ($sendtime) {
			$sf_args .= ' -a "'.$sendtime.'"';
			$cpsf_args	.= ' -a "'.$sendtime.'"';
		}
		
		$nrequeue = ($notify_requeue) ? '-R' : '-D';
		
		$use_coverpage = ($coverpage) ? '-C ' . $INSTALLDIR . '/images/' . $whichcover : "-n";
		
		if (count($files)) {
			$faxfiles = implode(" ", $files);
			
			return exec_sendfax("$SENDFAX $nrequeue $use_coverpage $sf_args $modem $destinations $faxfiles");
		} else { // SEND ONLY COVER PAGE AS FAX
			// make ps out of coverpage and send it
			$psfile = $TMPDIR.genpasswd().".ps";
			
			$fcommand = "$FAXCOVER $cp_args -C '" . $INSTALLDIR . "/images/$whichcover' -p $NUM_PAGES_FOLLOW -n $first_dest > $psfile";
			if ($debug) { print_r($fcommand); }
			$o = exec($fcommand, $output, $retval);
			
			if (is_file($psfile)) {// success
				return exec_sendfax("$SENDFAX $nrequeue -n $cpsf_args $modem $destinations $psfile");
			} else {
				echo "<p>Couldn't create $psfile</p>";
				avantfaxlog("Couldn't create $psfile");
			}
		}
		return NULL;
	}
	
	/**
	 * exec_sendfax
	 *
	 * @param string command
	 * @return array
	 */
	function exec_sendfax($command) {
		$o = exec($command." 2>&1", $sendfax_output, $retval);
		
		$debug = false;
		
		if ($retval == 0) {// success
			if ($debug) { echo "<p>$command"; }
			
			$result = str_replace("(", "", $sendfax_output[0]);
			$result = str_replace(")", "", $result);
			//	request id is 80 (group id 80) for host localhost (3 files)
			//	request id is 81 (group id 81) for host localhost (1 file)
			$output = split(" ", $result);
			
			return array('jobid' => $output[3], 'groupid' => $output[6], 'host' => $output[9], 'numfiles' => $output[10]);
		}
		
		if ($debug) {
			echo "<p>"; print_r($o); echo "<p>"; print_r($sendfax_output); 	echo "<p>$command";
		}
		
		$forlog = implode("\n", $sendfax_output);
		
		avantfaxlog("Exec_sendfax failed: $command");
		avantfaxlog("Exec_sendfax error: $forlog");
		
		return $forlog;
	}
	
	/**
	 * ocr_faxcontent
	 *
	 * @param string filename
	 * @return string
	 */
	function ocr_faxcontent($filename) {
		global $TIFFSPLIT, $TMPDIR;
		
		$faxcontent	= NULL;
		
		if (ENABLE_OCR_SUPPORT && file_exists(OCR_BINARY)) {
			$ran		= genpasswd();
			$basedir	= $TMPDIR.$ran.DIRECTORY_SEPARATOR;
			$tmpfile	= $basedir."ocr-$ran";
			
			mkdirs($basedir);
			
			// start timing how long it takes to convert faxes
			$time_start = microtime(true);
		
			system_v("$TIFFSPLIT $filename ${basedir}ocr_");
			
			// list the tiff files
			$faxfiles = scandir($basedir);
			
			foreach ($faxfiles as $file) {
				if (!strstr($file, "ocr_"))
					continue;
				
				$command = sprintf(OCR_COMMAND, $basedir.$file, $tmpfile, OCR_LANGUAGE);
				system_v($command);
	
				// get fax content
				if ($content = file_get_contents($tmpfile.".txt"))
					$faxcontent .= $content;
			}
			
			$time_end = microtime(true);
			$time = round($time_end - $time_start, 1);
			avantfaxlog("ocr_faxcontent> processed $filename in $time s");
		} elseif (!file_exists(OCR_BINARY)) {
			echo "ocr_faxcontent> ".OCR_BINARY." not found\n";
		} elseif (ENABLE_OCR_SUPPORT) {
			echo "ocr_faxcontent> No tif file to process\n";
		}
		
		return $faxcontent;
	}
	
	/**
	 * get_company_details
	 *
	 * @param integer fid
	 * @return array
	 */
	function get_company_details($abookfax_id, $orig_faxnum, $companyid) {
		global $RESERVED_FAX_NUM;
		$addressbook	= new AFAddressBook;
		$result			= array('faxnum_loadby' => NULL, 'company_name' => NULL, 'company_fax' => NULL, 'faxnum_cid' => NULL, 'description' => NULL);
		
		// load the rubrica information according to the fax number's db id
		if ($addressbook->loadbyfaxnumid($abookfax_id)) {
			$result['faxnum_loadby']	= "faxnumid";
			$result['company_name']		= $addressbook->get_company();
			$result['company_fax']		= $addressbook->get_faxnumber();
			
			if ($result['company_name'] === $RESERVED_FAX_NUM) {
				// assignx
				$result['assign_type']	= "x";
			} elseif ($result['company_fax'] == $result['company_name']) {
				// assign
				$result['faxnum_cid']	= $addressbook->get_companyid();
				$result['assign_type']	= "c";
			} else {
				// already assigned
				$result['faxnum_cid']	= $addressbook->get_companyid();
				$result['description']	= $addressbook->get_description();
			}
		} elseif ($addressbook->loadbyfaxnum($orig_faxnum, $mult)) {
			$result['faxnum_loadby'] = "faxnum";
			// load the rubrica info according to fax's original faxnumber
			if ($mult) {
				$mult_nums = array();
				
				while ($addressbook->get_multinfo($faxnumid, $company)) {
					$desc1 = $addressbook->get_description();
					$mult_nums[$faxnumid] = ($desc1) ? "$company - $desc1" : $company;
				}
				
				$result['mult_nums']		= $mult_nums;
			} elseif ($addressbook->loadbycid($companyid)) { // was a reserved fax number
				$result['mult_nums']		= NULL;
				$result['company_name']		= $addressbook->get_company();
				$result['company_fax']		= $addressbook->get_faxnumber();
				
				if ($result['company_fax'] == $result['company_name']) {
					// assign
					$result['assign_type']	= "c";
					$result['faxnum_cid']	= $addressbook->get_companyid();
				} else {
					// already assigned
					$result['assign_type']	= "n"; // doesn't matter what the value is
					$result['faxnum_cid']	= $addressbook->get_companyid();
					$result['description']	= $addressbook->get_description();
				}
			}
		} else {
			$result['faxnum_loadby']	= "faxnumid";
			$result['company_name']		= $RESERVED_FAX_NUM;
			$result['company_fax']		= $orig_faxnum;
			$result['assign_type']		= "x";
		}
		return $result;
	}

	/**
	 * list_languages
	 *
	 * @param string $current_lang
	 * @return void
	 */
	function list_languages() {
		global $INSTALLDIR;
		$langs = array();
		$dh = opendir($INSTALLDIR.'/includes/langs/');
		while (($file = readdir($dh)) !== false) {
			if ($file != "." && $file != "..") {
				$filecontents = file($INSTALLDIR.'/includes/langs/'.$file);
				
				foreach ($filecontents as $line) {
					if (strstr($line, '$LANGUAGE_NAME =')) {
						$langs[$file]['name'] = preg_replace("/^".'\$LANGUAGE_NAME'." = \"(.*?)\";\n/i", '$1', $line);
						break;
					}
					
					if (strstr($line, '$LANGUAGE =')) {
						$langs[$file]['lang'] = preg_replace("/^".'\$LANGUAGE'." = \"(.*?)\";\n/i", '$1', $line);
					}
				}
			}
		}
		closedir($dh);
		ksort($langs);
		$retlang = array();
		
		foreach ($langs as $lang) {
			if ($lang['lang']) {
				$retlang[$lang['lang']] = $lang['name'].' ('.$lang['lang'].')';
			}
		}
		
		return $retlang;
	}
	
	/**
	 * get_filetype
	 *
	 * @param string file
	 * @return string
	 */
	function get_filetype($file) {
		global $HAS_MIME_FUNCTION, $HAS_FILEINFO;
		$mime_content_type = NULL;
		
		if (is_file($file)) {
			if ($HAS_MIME_FUNCTION) {
				$mime_content_type = mime_content_type($file);
			} elseif ($HAS_FILEINFO) {
				$minfo = new finfo(FILEINFO_MIME);
				$mime_content_type = $minfo->file($file);
			} else {
				$mime_content_type = mime_by_suffix($file);
			}
		}
		
		return $mime_content_type;
	}
	
	/**
	 * mkdirs
	 *
	 * @param string dir
	 * @param integer mode
	 * @param bool recursive
	 * @return bool
	 */
	function mkdirs($dir, $mode = 0777, $recursive = true) {
		if (is_null($dir) || $dir === "") {
			return false;
		}
		
		if (is_dir($dir) || $dir === "/") {
			return true;
		}
		
		if (mkdirs(dirname($dir), $mode, $recursive)) {
			if (mkdir($dir, $mode) || is_dir($dir)) {
				return chmod($dir, $mode);
			} else {
				avantfaxlog("mkdirs> Error creating directory $dir");
				return false;
			}
		}
		
		return false;
	}
	
	/**
	 * get_max_fileupload
	 *
	 * @return array
	 */
	function get_max_fileupload() {
		$maxsize		= ini_get('upload_max_filesize');
		$maxsize_abb	= $maxsize;
		
		// if size is like 2M
		if (!is_numeric($maxsize)) {
			if (strpos($maxsize, 'M') !== false) {
				$maxsize = intval($maxsize)*1024*1024;
			} elseif (strpos($maxsize, 'K') !== false) {
				$maxsize = intval($maxsize)*1024;
			} elseif (strpos($maxsize, 'G') !== false) {
				$maxsize = intval($maxsize)*1024*1024*1024;
			}
		} else { // if size is 20000
			if (round($maxsize / (1024*1024*1024)) > 0) {
				$maxsize_abb = round($maxsize / (1024*1024*1024))."G";
			} elseif (round($maxsize / (1024*1024)) > 0) {
				$maxsize_abb = round($maxsize / (1024*1024))."M";
			} elseif (round($maxsize / (1024)) > 0) {
				$maxsize_abb = round($maxsize / (1024))."K";
			}
		}
		
		$maxsize_abb .= "B";
		
		return array("max" => $maxsize, "abbrev" => $maxsize_abb);
	}
	
	/**
	 * faxinfo - return faxinfo from tiff file, return false on error
	 *
	 * @param string path
	 * @return array
	 */
	function faxinfo($path) {
		global $FAXINFO, $RESERVED_FAX_NUM, $CALLIDn_CIDNumber;
		
		exec("$FAXINFO -n $path", $array);
		
		$values = array();
		
		foreach ($array as $key => $val) {
			$pos	= strpos($val, ":");
			$left	= substr($val, 0, $pos);
			$right	= substr($val, $pos + 1);
			$values[trim($left)] = trim($right);
		}
		
//		if (isset($values['Sender'])) {
//			$values['Sender'] = strtolower(clean_faxnum($values['Sender']));
//		}
		
		if (preg_match("/UNKNOWN/i", $values['Sender']) or preg_match("/UNSPECIFIED/i", $values['Sender']) or !isset($values['Sender']) or empty($values['Sender'])) {
			avantfaxlog("faxinfo> XDEBUG CHECK sender '${values['Sender']}' in faxfile '$path'");
			$values['Sender'] = $RESERVED_FAX_NUM;
		}
		
		// strip SIP code from CallerID using regex
		$values["CallID1$CALLIDn_CIDNumber"] = strip_sipinfo($values["CallID$CALLIDn_CIDNumber"]);
		
		if ($values['Sender'] && $values['Pages'] && $values['Received']) {
			return $values;
		}
		
		return false;
	}
	
	/**
	 * strip_sipinfo
	 * @param string string
	 * @return string
	 *
	 */
	function strip_sipinfo($string) {
		// strip SIP code from CallerID using regex
		if (preg_match('/^(.*)@(.*)$/', $string, $match)) {
			$string = $match[1];
		}
		return $string;
	}
	
	/**
	 * send_mail
	 *
	 * @param string to
	 * @param string from
	 * @param string subject
	 * @param string text
	 * @param string file
	 * @param string altname
	 * @param string embedd
	 * @return bool
	 */
	function send_mail($to, $from, $subject, $text, $file = NULL, $altname = NULL, $embedd = NULL, $cc = NULL, $bcc = NULL) {
		$mailer = new_mailer($from, $subject, $text);
		$mailer->attachFile($file, $altname);
		$mailer->embeddImage($embedd);
		
		if ($cc) {
			$mailer->setCc(implode(",", split_emails($cc)));
		}
		
		if ($bcc) {
			$mailer->setBcc(implode(",", split_emails($bcc)));
		}
		
		$emails = split_emails($to);
		
		if ($mailer->sendmail($emails)) {
			sendmaillog("'$subject' sent to '$to' from '$from' - $file ($altname)");
			return true;
		}
		
		sendmaillog("FAILED to send '$subject' to $to from '$from' - $file ($altname)");
		avantfaxlog("send_mail> MAIL ERROR: ".$mailer->getError());
		return false;
	}
	
	/**
	 * annotate_fax
	 *
	 * @param string filename
	 * @param string string
	 * @return void
	 */
	function annotate_fax($filename, $string) {
		global $TIFFSPLIT, $TMPDIR, $CONVERT, $GSCMD;
			
		if (ENABLE_FAX_ANNOTATION && file_exists($filename)) {
			$ran		= genpasswd();
			$basedir	= $TMPDIR.$ran.DIRECTORY_SEPARATOR;
			$tmpfile	= $basedir."annotate-$ran";
			
			mkdirs($basedir);
			
			// start timing how long it takes to convert faxes
			$time_start = microtime(true);
		
			system_v("$TIFFSPLIT $filename ${basedir}ann_");
			
			// list the tiff files
			$faxfiles = scandir($basedir);
			$ps_list = array();
			
			foreach ($faxfiles as $file) {
				if (!strstr($file, "ann_"))
					continue;
				
				$command = "$CONVERT ${basedir}${file} -pointsize 25 -gravity ".ANN_GRAVITY." -annotate 0 \"$string\" ${basedir}c${file}.ps";
				system_v($command);
				avantfaxlog("annotate_fax> exec: ".$command);
				$ps_list[] = "${basedir}c${file}.ps";
			}
			
			$file_list	= implode(" ", $ps_list);
			$final_file	= $basedir.PDFNAME;
			$cmd		= sprintf($GSCMD, $final_file, $file_list);
			system_v($cmd);
			
			$time_end	= microtime(true);
			
			chmod($final_file, 0666);
			
			$time		= round($time_end - $time_start, 1);
			avantfaxlog("annotate_fax> processed $filename in $time s");
			
			if (file_exists($final_file)) {
				return $final_file;
			}
		}
		return NULL;
	}
	
	/**
	 * tiff2pdf - convert tiff to pdf and check for corruption
	 *
	 * @param string tiff_file
	 * @param string pdf
	 * @return integer
	 */
	function tiff2pdf($tiff_file, $pdf) {
		global $CONVERT, $TIFFPS, $GSR, $HYLATIFF2PS, $HYLASPOOL;

		// start timing how long it takes to convert faxes
		$time_start = microtime(true);

		chmod($tiff_file, 0666);
		
//		$negate =(HAS_NEGATIVE_TIFF) ? "-negate" : "";
		// run tiff file through convert in order to remove any weird stuff
//		system("$CONVERT $negate -rotate 0 $tiff_file $tiff_file.tif");
//		rename("$tiff_file.tif", $tiff_file);

		// check for corruption
		// $sender, $pages, $date, $format
		$faxinfo = faxinfo($tiff_file);
		if (!$faxinfo) {
			echo "tiff2pdf:  Found corrupted fax\n";
			avantfaxlog("tiff2pdf> failed: $tiff_file corrupted");
			exit;
		}
		
		if ($HYLATIFF2PS) {
			system("(cd $HYLASPOOL; bin/tiff2pdf -o $pdf $tiff_file 2>/dev/null)");
		} else {
			system("$TIFFPS $tiff_file | $GSR -sOutputFile=$pdf - -c quit 2>/dev/null");
		}

		$time_end = microtime(true);
		
		if (!is_file($pdf)) {
			avantfaxlog("tiff2pdf> failed to create $pdf");
		} else {
			avantfaxlog("tiff2pdf> successfully created $pdf");
			chmod($pdf, 0666);
		}
		
		return round($time_end - $time_start, 1);
	}
	
	/**
	 * convert2pdf - convert ps and tiff files to pdf for sent faxes
	 *
	 * @param string path
	 * @param array convertfiles
	 * @return bool
	 */
	function convert2pdf($path, $convertfiles) {
		global $GSCMD, $TIFFPS, $GSR;
		
		$pdffile		= $path.DIRECTORY_SEPARATOR.PDFNAME;	// full path to final PDF file
		$tiffile		= $path.DIRECTORY_SEPARATOR.TIFFNAME;	// full path to where TIF file will be saved
		
		$convert_tiff	= array();
		$del_tif		= array();
		
		$convert_ps		= NULL;
		$coverpage		= NULL;
		$tmpcover		= NULL;
		$list_pdf		= NULL;
		$tmpps			= NULL;
		$tmptif			= NULL;
		
		echo "convert2pdf> starting\n";

		for ($i = 0; $i < count($convertfiles); $i++) {
			if (preg_match("/\.tif/i", $convertfiles[$i])) {
				$convert_tiff[] = $convertfiles[$i];
			} elseif (preg_match("/\.ps/i", $convertfiles[$i])) {
				$convert_ps .= $convertfiles[$i]." ";
			} elseif (preg_match("/cover/i", $convertfiles[$i])) {
				$coverpage = $convertfiles[$i];
			} else {
				$list_pdf .= $convertfiles[$i]." ";
			}
		}
		
		// start timing how long it takes to convert faxes
		$time_start = microtime(true);
		
		// convert cover page (.ps) to PDF
		if (isset($coverpage)) {
			echo "convert2pdf> converting coverpage to pdf\n";
			$tmpcover = tmpfilename('pdf');
			$cmd = sprintf($GSCMD, $tmpcover, $coverpage);
			system_v($cmd);
			$list_pdf = "$tmpcover $list_pdf";
		}
		
		// convert the PostScript files to PDF
		if (isset($convert_ps)) {
			echo "convert2pdf> converting postscript to pdf\n";
			$tmpps = tmpfilename('pdf');
			$cmd = sprintf($GSCMD, $tmpps, $convert_ps);
			system_v($cmd);
			$list_pdf .= $tmpps." ";
		}
		
		// convert TIF files to PDF
		if (is_array($convert_tiff)) {
			echo "convert2pdf> processing tiffs\n";
			foreach ($convert_tiff as $tiff) {
				$tmptif = tmpfilename('pdf');
				system_v("$TIFFPS $tiff | $GSR -sOutputFile=$tmptif - -c quit $is_quiet");
				$list_pdf .= $tmptif." ";
				$del_tif[] = $tmptif;
			}
		}
		
		// create the final PDF
		if (isset($list_pdf)) {
			$list_pdf = trim($list_pdf);
			$cnt = explode(" ", $list_pdf);
			
			if (count($cnt) > 1) {		// if multiple PDFs, combine them
				echo "convert2pdf> creating final pdf\n";
				$cmd = sprintf($GSCMD, $pdffile, $list_pdf);
				system_v($cmd);
			} else {					// otherwise, just copy the single PDF to $pdffile
				echo "convert2pdf> copying $list_pdf to $pdffile\n";
				copy($list_pdf, $pdffile);
			}
		}
		
		$time_end = microtime(true);
		chmod($pdffile, 0666);
		
		echo "convert2pdf> cleaning up...";
		
		if (isset($tmpps))		{ unlink($tmpps); }
		if (isset($tmpcover))	{ unlink($tmpcover); }
		if (is_array($del_tif)) {
			foreach ($del_tif as $tiff) {
				unlink($tiff);
			}
		}
		
		echo "done\n";
		
		$ret = true;
		
		if (!is_file($pdffile)) {
			avantfaxlog("convert2pdf> failed to create $pdffile", true);
			$ret = false;
		} else {
			$time = round($time_end - $time_start, 1);
			avantfaxlog("convert2pdf> created $pdffile in ${time}ms", true);
		}
		
		return $ret;
	}
	
	/**
	 * pdf_preview - make thumbnail image of fax.pdf located in $path
	 *
	 * @param string path
	 * @return void
	 */
	function pdf_preview($path) {
		global $TIFFCP, $TIFFPS, $PNMSCALE, $PNMDEPTH, $PPMTOGIF, $PNMQUANT, $GSN, $GSN2, $NOTHUMBIMG, $quiet;
		
		$faxfile		= $path.DIRECTORY_SEPARATOR.PDFNAME;
		
		if (file_exists($faxfile)) {
			$tmpfile	= tmpfilename('tif');
			$preview	= $path.DIRECTORY_SEPARATOR.THUMBNAIL;
			$final_file	= $path.DIRECTORY_SEPARATOR.PREVIMG.'0'.PREVIMGSFX;
			$is_quiet	= ($quiet) ? ">/dev/null 2>/dev/null" : NULL;
			
			// create tif image from PDF
			if (system_v("$GSN2 -sOutputFile=$tmpfile $faxfile -c quit $is_quiet") == 0) {
				system_v("$PNMSCALE -width ".PREV_TN." $tmpfile 2>/dev/null | $PNMDEPTH 31 | $PPMTOGIF 2>/dev/null > $preview"); // create thumb.gif from tif
				
				if (!filesize($preview)) {
					avantfaxlog("static_preview> Using pnmquant to create $preview");
					system_v("$PNMSCALE -width ".PREV_TN." $tmpfile 2>/dev/null | $PNMDEPTH 31 | $PNMQUANT 256 2>/dev/null | $PPMTOGIF 2>/dev/null > $preview");
				}
				
				system_v("$PNMSCALE -width ".PREV_SP." $tmpfile 2>/dev/null | $PNMDEPTH 31 | $PPMTOGIF 2>/dev/null > $final_file");
				
				if (!filesize($final_file)) {
					avantfaxlog("static_preview> Using pnmquant to create $final_file");
					system_v("$PNMSCALE -width ".PREV_SP." $tmpfile 2>/dev/null | $PNMDEPTH 31 | $PNMQUANT 256 2>/dev/null | $PPMTOGIF 2>/dev/null > $final_file");
				}
			} else {
				avantfaxlog("pdf_preview> failed to generate $preview", true);
				copy($NOTHUMBIMG, $preview); // if fails, copy the nothumb.gif place holder image
			}
			
			if (file_exists($tmpfile))
				unlink($tmpfile);
		} else {
			avantfaxlog("pdf_preview> $faxfile doesn't exist", true);
		}
	}
	
	/**
	 * static_preview - make preview images of tiff file
	 *
	 * @param string path
	 * @param integer pages
	 * @return integer
	 */
	function static_preview($path, $pages) {
		global $CONVERT, $INSTALLDIR, $DPI, $TIFFCP, $TIFFPS, $PNMSCALE, $PNMDEPTH, $PPMTOGIF, $GSN, $GSN2, $TIFFSPLIT, $TMPDIR;
		
		// tiffsplit TIF
		// loop per page
		// create Inbox thumbnail
		// create viewfax thumnails
		// return
	
		$faxfile	= $path.DIRECTORY_SEPARATOR.TIFFNAME;
		$preview	= $path.DIRECTORY_SEPARATOR.THUMBNAIL;
		
		$ran		= genpasswd();
		$basedir	= $TMPDIR.$ran.DIRECTORY_SEPARATOR;
		$tmpfile	= $basedir."faxrcvd-$ran";
		
		mkdirs($basedir);
		
		// start timing how long it takes to convert faxes
		$time_start = microtime(true);
	
		system("$TIFFSPLIT $faxfile ${basedir}thumb_");
		
		// list the tiff files
		$faxfiles = scandir($basedir);
		$tiff_list = array();
		
		$cnt = 0;
		
		foreach ($faxfiles as $file) {
			if (!strstr($file, "thumb_"))
				continue;
			
			$newfile = "${basedir}${file}";
						
			if ($cnt === 0) {
				system("$CONVERT -scale ".PREV_TN." $newfile $preview");
				chmod($preview, 0666);
			}
			
			echo "Processing page ".($cnt+1)."\n";

			$final_file = $path.DIRECTORY_SEPARATOR.PREVIMG.$cnt.PREVIMGSFX;
//			system("$CONVERT -scale ".PREV_SP." $newfile $final_file"); // doesn't work on all TIFs
			system("$TIFFPS $newfile > $tmpfile.ps 2>/dev/null");
			system("$GSN -sOutputFile=$tmpfile.2 $tmpfile.ps -c quit > /dev/null 2>&1");
			system("$PNMSCALE -width ".PREV_SP." $tmpfile.2 2>/dev/null | $PNMDEPTH 31 | $PPMTOGIF 2>/dev/null > $final_file");
			
			chmod($final_file, 0666);
			$cnt++;
		}
		
		$time_end = microtime(true);
		return round($time_end - $time_start, 1);
	}
	
	/**
	 * unaccent - convert special chars to postscript
	 *
	 * @param string $text
	 * @return integer
	 */
	function unaccent($text) {
		$search = array(	"à", "á", "â", "ä",
							"è", "é", "ê", "ë",
							"ì", "í",  "î", "ï",
							"ò", "ó", "ô", "ö",
							"ù", "ú", "û", "ü",
							"^", "(", ")", "’", "\\",
							"”", "¡", "™", "£",
							"¢", "∞", "§", "¶",
							"•", "ª", "º", "–",
							"≠", "œ", "∑", "´",
							"®", "†", "¥", "¨",
							"’", "»", "Å", "Í",
							"Î", "Ï", "˝", "Ó",
							"Ô", "", "Ò", "Ú",
							"Æ", "¸", "˛", "Ç",
							"◊", "ı", "˜", "Â",
							"¯", "˘", "¿", "ˆ",
							"ø", "“", "‘", "å",
							"ß", "∂", "ƒ", "©",
							"˙", "˚", "¬", "…",
							"æ", "≈", "ç", "√",
							"∫", "≤", "≥", "÷",
							"⁄", "€", "‹", "›",
							"ﬁ", "ﬂ", "‡", "°",
							"·", "‚", "—", "±",
							"Œ", "„", "´", "‰",
							"ˇ", "Á", "¨", "ˆ",
							"Ø", "∏", "”");
		$replace = array(	"\210", "\207", "\211", "\212", 
							"\217", "\216", "\220", "\221",
							"\223", "\222", "\224", "\225",
							"\230", "\227", "\231", "\232",
							"\235", "\234", "\236", "\237",
							"\136", "(", ")", "\325", "\\\\",
							"\323", "\301", "\252", "\243",
							"\242", "\245", "\244", "\246",
							"\245", "\237", "\274", "\320",
							"\271", "\317", "\345", "\253",
							"\250", "\240", "\264", "\254",
							"\325", "\310", "\201", "\352",
							"\353", "\354", "\375", "\356",
							"\357", "\360", "\361", "\362",
							"\256", "\374", "\376", "\202",
							"\340", "\365", "\367", "\345",
							"\370", "\371", "\300", "\366",
							"\277", "\322", "\324", "\214",
							"\247", "\266", "\304", "\251",
							"\372", "\373", "\302", "\311",
							"\276", "\273", "\215", "\326",
							"\362", "\243", "\263", "\270",
							"\244", "\333", "\334", "\335",
							"\336", "\337", "\340", "\260",
							"\341", "\342", "\321", "\261",
							"\316", "\343", "\253", "\344",
							"\377", "\347", "\254", "\366",
							"\257", "\325", "\323");
		
		if (is_array($text)) {
			print "<p>Got ";
			print_r($text);
			exit;
		}
		
		$text = decode_entity($text);
		
		return str_replace($search, $replace, $text);
	}
	
	/**
	 * process_template
	 *
	 * @param string $template
	 * @param string $match
 	 * @param array $values
	 * @return string
	 */
	function process_template($template, $match, $values) {
		$lines			= file($template);
		$matchlen		= strlen($match);
		$return			= array();
		
		foreach ($lines as $line) {
			// search line if it matches "XXXX-symbol)".  if so, swap the appropriate value
			if (preg_match("/".$match."/", $line)) {
				// start by finding the symbol
				$pos_start	= strpos($line, $match) + $matchlen;
				$pos_end	= strpos($line, ")");
				$symbol		= substr($line, $pos_start, $pos_end - $pos_start);
				$newsymbol	= NULL;
				
				if (array_key_exists($symbol, $values)) {
					$newsymbol = unaccent($values[$symbol]);
				}
				
				// swap symbols
				$line = str_replace("$match$symbol", $newsymbol, $line);
			}
			
			$return[] = $line;
		}
		
		return $return;
	}
	
	/**
	 * process_html_template
	 *
	 * @param string $template
	 * @param string $match
 	 * @param array $values
	 * @return string
	 */
	function process_html_template($template, $match, $values) {
		$lines			= file($template);
		$matchlen		= strlen($match);
		$return			= array();
		
		foreach ($lines as $line) {
			// search line if it matches "XXXX-symbol".  if so, swap the appropriate value
			if (preg_match("/".$match."/", $line)) {
				$symbol_ar	= preg_split("/$match\b/", $line);
				
				if (count($symbol_ar)) {
					foreach ($symbol_ar as $symbol) {
						$symbol_ar2	= preg_split("/[\b<]/", $symbol);
						
						if (count($symbol_ar2)) {
							foreach ($symbol_ar2 as $symbol2) {
								$newsymbol	= NULL;
								
								if (array_key_exists($symbol2, $values)) {
									$newsymbol = $values[$symbol2]; //htmlentities($values[$symbol2], ENT_QUOTES, "UTF-8");
								}
								
								// swap symbols
								$line = str_replace("$match$symbol2", $newsymbol, $line);
							}
						}
					}
				}
			}
			
			$return[] = $line;
		}
		
		return $return;
	}
