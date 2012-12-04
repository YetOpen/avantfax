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
	
	$fid	= array_key_exists('fid', $_REQUEST) ? $_REQUEST['fid'] : NULL;
	$data	= array();
	$fax	= new ArchiveIn;
	
	if (!$fax->load_fax($fid)) {
		header("Location: inbox.php");
		exit;
	}
	
	if (!$_SESSION[USERSESSION]->superuser) {
		if (!$fax->user_has_rights($_SESSION[USERSESSION]->uid, $_SESSION[USERSESSION]->get_modemdevs(),
			$_SESSION[USERSESSION]->get_didrouting(), $_SESSION[USERSESSION]->get_faxcats())) {
			exit($LANG['ACCESS_DENIED']);
		}
	}
	
	$company_details	= get_company_details($fax->get_faxnumid(), $fax->get_origfaxnum(), $fax->get_companyid());
	$data['date']		= $fax->get_archstamp();
	$data['pages']		= $fax->get_pages();
	$data['faxnum']		= $fax->get_origfaxnum();
	$data['sender']		= $company_details['company_name'];
	
	// preview image
	$faximages			= $fax->get_faximages();
	$actual_image		= (file_exists($INSTALLDIR.$faximages[0]));
	$data['image']		= ($actual_image) ? $faximages[0] : $fax->get_thumbnail();
	$data['imgw']		= ($actual_image) ? 600 : 300;
	$data['imgh']		= ($actual_image) ? 500 : 200;
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('data',			$data);
	display_template('txreport.tpl',	$usmarty);
