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

	require_once 'check_login.php';
	
	// need faxnumid and fid [and vf (viewfax)]
	
	$fax = new ArchiveIn;
	
	if ($fax->load_fax($_POST['fid'])) {
		if ($fax->set_faxnumid($_POST['faxnumid'])) {
		
			$addressbook	= new AFAddressBook;
			$addressbook->loadbyfaxnumid($_POST['faxnumid']);
			$addressbook->inc_faxfrom();
			
			if (isset($_POST['rurl'])) {
				header("Location: ".$_POST['rurl']);
			} elseif (isset($_POST['vf'])) {
				header("Location: viewfax.php?fid=".$_POST['fid']);
			} elseif (isset($_POST['va'])) {
				header("Location: ".$_SERVER['HTTP_REFERER']); // go back
			} else {
				header("Location: inbox.php");
			}
		}
	}
