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

	$addressbook	= new AFAddressBook;
	$modeminst		= new FaxModem;
	$didr			= new DIDRouting;
	$inbox			= new ArchiveIn;
	$modemlist		= array();
	$inbox_list		= array();
	$error			= NULL;
	
	$modems			= ($_SESSION[USERSESSION]->superuser) ? $modeminst->get_modems()	: $_SESSION[USERSESSION]->get_modemdevs();
	$routes			= ($_SESSION[USERSESSION]->superuser) ? $didr->get_routes()			: $_SESSION[USERSESSION]->get_didrouting();
	$faxcats		= ($_SESSION[USERSESSION]->superuser) ? NULL						: $_SESSION[USERSESSION]->get_faxcats();
	
	$devices		= ($ENABLE_DID_ROUTING) ? $routes : $modems;
	$faxesperpage	= ($_SESSION[USERSESSION]->faxperpageinbox) ? $_SESSION[USERSESSION]->faxperpageinbox : $DEFAULT_FAXES_PER_PAGE_INBOX;

	/******************************************************************************************************************************
			Paging support
	 ******************************************************************************************************************************/	
	$formdata = new FormRules;
	$formdata->newRule('pageindex', 0, FR_NUMBER, 0);
	$formdata->newRule('pagelimit', $faxesperpage, FR_NUMBER, 10);
	
	$pageindex = $formdata->pageindex;
	$pagelimit = $formdata->pagelimit;
	
	if (array_key_exists('pageindex', $_GET)) {
		$formdata->processForm($_GET);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
		
		if (!$error)
			extract($formdata->dbReady());
	}
	
	/******************************************************************************************************************************
			Get modem aliases and current status
	 ******************************************************************************************************************************/
	$index = 0;
	
	if (count($modems)) {
		foreach ($modems as $modem) {
			if ($modeminst->load_device($modem)) {
				$modemlist[$index]['device']	= $modem;
				$modemlist[$index]['alias']		= $modeminst->get_alias();
				$modemlist[$index]['status']	= $modeminst->get_status();
				$index++;
			}
		}
	}
	
	/******************************************************************************************************************************
			SETUP PAGING SUPPORT
	 ******************************************************************************************************************************/
	$numfaxes	= $inbox->get_num_faxes($devices, $faxcats);
	$numpages	= ($numfaxes > $pagelimit) ? ceil($numfaxes/$pagelimit) : 0;
	$pageindex	= ($pageindex > ($numpages-1)) ? $numpages-1 : $pageindex;

	if ($pageindex < 0) {
		$pageindex = 0;
	}
	
	/******************************************************************************************************************************
			Prepare to show inbox
	 ******************************************************************************************************************************/
	$index = 0;
	
	while ($inbox->list_inbox($devices, $pageindex, $pagelimit, $faxcats)) {
		$modeminst->load_device($inbox->get_modemdev());
		
		$didr_alias = ($didr->loadbyid($inbox->get_didr_id())) ? $didr->get_alias() : NULL;
		
		$company_details = get_company_details($inbox->get_faxnumid(), $inbox->get_origfaxnum(), $inbox->get_companyid());
		
		$thumb = $inbox->get_thumbnail();
		if (!file_exists($INSTALLDIR.$thumb)) {
			$thumb = NULL;
		}

		$inbox_list[$index]['faxid']			= $inbox->get_fid();
		$inbox_list[$index]['pages']			= $inbox->get_pages();
		$inbox_list[$index]['tiffpath']			= $inbox->get_tiffpath();
		$inbox_list[$index]['thumbnail']		= $thumb;
		$inbox_list[$index]['archstamp']		= $inbox->get_archstamp();
		$inbox_list[$index]['modem_alias']		= $modeminst->get_alias();
		$inbox_list[$index]['did_group']		= $didr_alias;
		$inbox_list[$index]['faxnum_loadby']	= $company_details['faxnum_loadby'];
		$inbox_list[$index]['company_name']		= $company_details['company_name'];
		$inbox_list[$index]['company_fax']		= $company_details['company_fax'];
		$inbox_list[$index]['description']		= $company_details['description'];
		$inbox_list[$index]['faxnum_cid']		= $company_details['faxnum_cid'];
		
		$index++;
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('modemlist',		$modemlist);
	$usmarty->assign('inbox',			$inbox_list);
	$usmarty->assign('numfaxesinbox',	$numfaxes);
	$usmarty->assign('numpages',		$numpages);
	$usmarty->assign('currentpage',		$pageindex);
	$usmarty->assign('currentindex',	($pageindex*$pagelimit)+1);
	$usmarty->assign('currentmax',		($pageindex*$pagelimit)+$index);
	$usmarty->assign('INC_LIST',		"<script language=\"javascript\" type=\"text/javascript\" src=\"js/ajaxmodemstatus.js\"></script>");
	display_template('inbox.tpl',		$usmarty);
