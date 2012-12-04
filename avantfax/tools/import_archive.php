#!/usr/bin/php
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

	require_once '/var/www/avantfax/includes/classes.php';
	
	if (empty($_SERVER['argv'][2])) {
		exit("usage: ".$_SERVER['argv'][0]." faxPath faxCategoryId\nExample: ".$_SERVER['argv'][0]." /var/www/avantfax/faxes/ 3\n");
	}
	
	$faxpath	= $_SERVER['argv'][1];	// path to the avantfax archive faxes/ directory
	$faxcatid	= $_SERVER['argv'][2];	// fax category id, found in the database with "select * from FaxCategory;"
	$userid		= 1;			// default ID: admin user id
	$modemdev	= 'ttyS0';		// device to use as receiving device
	$callidn	= 'CallID1';	// the CallIDn value that holds the caller ID phone number information (see 'faxinfo fax.tif' for info)
	$def_cid	= 1;			// default company id should company creation fail
	$def_fid	= 1;			// default fax number id should fax number creation fail
	$debug		= false;		// view faxinfo for each fax imported

	$count		= 0;
	
	$len = strlen($faxpath);
	if ($faxpath[$len-1] != '/')  $faxpath .= '/';
	
	$faxes = getFiles($faxpath);

	// received faxes
 	foreach ($faxes as $fax) {
		if (strstr($fax, "recvd")) {
			if (strstr($fax, ".tif")) {
				print "RECV: $fax\n";
				$faxinfo = faxinfo($fax);
				$company_name = $faxinfo['Sender'];
				
				if ($debug) print_r($faxinfo);
				
				$faxpath = dirname($fax);
				
				// check if fax number already exists, otherwise create address book entry
				$_info = getFaxNumberId($faxinfo[$callidn], $company_name);
				
				if (is_array($_info)) {
					extract($_info);
				} else {
					$companyid = $def_cid;
					$faxnumid = $def_fid;
				}
				
				// add faxes to archive
				$inbox	= new ArchiveIn;
				$faxid	= NULL;
				// create entry for fax in database
				if ($inbox->create($faxpath, $faxnumid, $faxinfo[$callidn], $modemdev, $faxinfo['Pages'], $faxinfo['Received'], NULL)) {
					$faxid = $inbox->get_fid();
					$inbox->set_category($faxcatid);
					$inbox->set_archivebox($faxid);
					avantfaxlog("> Inserted $faxpath from $company_name ($faxnumid) to Inbox", true);
					$count++;
				} else {
					avantfaxlog("> FAILED to insert $faxpath from $company_name ($faxnumid) to Inbox - ".$inbox->get_error(), true);
				}
			}
		}
		
		if (strstr($fax, "sent")) {
			if (strstr($fax, ".pdf")) {
				print "SEND: $fax\n";
				$faxinfo = sentfaxInfo($fax);
				
				if ($debug) print_r($faxinfo);
				
				// check if fax number already exists, otherwise create address book entry
				$_info = getFaxNumberId($faxinfo['origfaxnum']);
				
				if (is_array($_info)) {
					extract($_info);
				} else {
					$companyid = $def_cid;
					$faxnumid = $def_fid;
				}
				
				$faxpath = dirname($fax);
				
				// add fax to archive
				// create entry for fax in database
				$outbox		= new ArchiveOut;
				if ($outbox->create($faxpath, $userid, $companyid, $faxinfo['origfaxnum'], 1)) {
					$outbox->set_note(NULL, $faxcatid, $userid);
					avantfaxlog("> Inserted $faxpath from ${faxinfo['origfaxnum']} ($faxnumid) to Inbox", true);
					$count++;
				} else {
					avantfaxlog("> FAILED to add Sent fax '$faxpath' ($faxnumid) to ArchiveOut", true);
				}
			}
		}
	}
	
	echo "$count records added\n";
	
	function getFaxNumberId($faxnumber, $company = NULL) {
		$faxnumid = 0;
		$companyid = 0;
		
		if (!$company) $company = $faxnumber;
		
		$addressbook	= new AFAddressBook;
		// lookup database entry for this fax number
		if ($addressbook->loadbyfaxnum($faxnumber, $mult)) {
			if ($mult) {
				avantfaxlog("> Found fax number with multiple companies", true);
			} else {
				$faxnumid = $addressbook->get_faxnumid();
				$companyid = $addressbook->get_companyid();
			}
		} else { // if it doesn't exist, create it
			if ($addressbook->create($company)) {
				if ($addressbook->create_faxnumid($faxnumber)) {
					$faxnumid = $addressbook->get_faxnumid();
					$companyid = $addressbook->get_companyid();
					avantfaxlog("> Created company '$faxnumber' with cid '$companyid'", true);
				} else {
					avantfaxlog("> FAILED to create faxnumid for '$faxnumber' - ".$addressbook->get_error(), true);
				}
			} else {
				avantfaxlog("> FAILED to create company '$faxnumber' - ".$addressbook->get_error(), true);
			}
		}
		return array('faxnumid'=>$faxnumid, 'companyid'=>$companyid);
	}
	
	function sentfaxInfo($path) {
		global $faxpath, $userid, $faxcatid;
		
		$npath = str_replace($faxpath.'sent/', "", $path);
		$xinfo = explode("/", $npath);
		$info = array(
			'file'			=> '/faxes/sent/'.$npath,
			'origfaxnum'	=> $xinfo[3],
			'date'			=> $xinfo[0].'-'.$xinfo[1].'-'.$xinfo[2], 'time' => $xinfo[4],
			'userid'		=> $userid,
			'faxcatid'		=> $faxcatid
		);
		
		return $info;
	}
	
	
	function getFiles($directory, $exempt = array('.','..'), &$files = array()) { 
        $handle = opendir($directory); 
        while (false !== ($resource = readdir($handle))) { 
            if (!in_array(strtolower($resource),$exempt)) { 
                if (is_dir($directory.$resource.'/')) 
                    array_merge($files, getFiles($directory.$resource.'/',$exempt,$files)); 
                else 
                    $files[] = $directory.$resource; 
            } 
        } 
        closedir($handle); 
        return $files; 
    }
