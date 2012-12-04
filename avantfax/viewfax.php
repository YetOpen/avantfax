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
	
	$inbox			= new ArchiveIn;
	$addressbook	= new AFAddressBook;
	
	if ($ENABLE_DID_ROUTING) {
		$didr		= new DIDRouting;
		$devices	= ($_SESSION[USERSESSION]->superuser) ? $didr->get_routes()			: $_SESSION[USERSESSION]->get_didrouting();
	} else {
		$modeminst	= new FaxModem;
		$devices	= ($_SESSION[USERSESSION]->superuser) ? $modeminst->get_modems()	: $_SESSION[USERSESSION]->get_modemdevs();
	}
	
	$faxcats		= ($_SESSION[USERSESSION]->superuser) ? NULL						: $_SESSION[USERSESSION]->get_faxcats();
	
	// set the devices viewable for this user
	$inbox->viewable_devices($devices, $faxcats);
	
	// load faxarchive
	if (!$inbox->load_fax($_GET['fid'])) {
		header("Location: inbox.php"); // if fails, forward back to inbox.php
		exit;
	}
	
	if (!$inbox->get_inbox()) {
		header("Location: inbox.php"); // if fax is no longer in inbox there won't be anymore images to show
		exit;
	}
	
	// check  if the user has the rights to this fax
	if (!$_SESSION[USERSESSION]->superuser) {
		if (!$inbox->user_has_rights($_SESSION[USERSESSION]->uid, $_SESSION[USERSESSION]->get_modemdevs(),
			$_SESSION[USERSESSION]->get_didrouting(), $_SESSION[USERSESSION]->get_faxcats())) {
			header("Location: inbox.php");
			exit;
		}
	}
	
	$company_details = get_company_details($inbox->get_faxnumid(), $inbox->get_origfaxnum(), $inbox->get_companyid());
	
	$inbox_data						= array();
	$inbox_data['images']			= $inbox->get_faximages();
	$inbox_data['pages']			= $inbox->get_pages();
	$inbox_data['prev_fid']			= $inbox->get_fid_prev();
	$inbox_data['next_fid']			= $inbox->get_fid_next();
	$inbox_data['fid']				= $inbox->get_fid();
	$inbox_data['tiffpath']			= $inbox->get_tiffpath();
	$inbox_data['archstamp']		= $inbox->get_archstamp();
	$inbox_data['faxnum_loadby']	= $company_details['faxnum_loadby'];
	$inbox_data['company_name']		= $company_details['company_name'];
	$inbox_data['company_fax']		= $company_details['company_fax'];
	$inbox_data['description']		= $company_details['description'];
	$inbox_data['faxnum_cid']		= $company_details['faxnum_cid'];
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('inbox',			$inbox_data);
	$usmarty->assign('numfaxesinbox',	get_inbox_count());	// number of faxes in inbox
	display_template('viewfax.tpl',		$usmarty);
