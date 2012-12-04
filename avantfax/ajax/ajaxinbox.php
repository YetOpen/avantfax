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

	require_once '../check_login.php';

	$modeminst		= new FaxModem;
	$didr			= new DIDRouting;
	$inbox			= new ArchiveIn;
	
	$modems			= ($_SESSION[USERSESSION]->superuser) ? $modeminst->get_modems()	: $_SESSION[USERSESSION]->get_modemdevs();
	$routes			= ($_SESSION[USERSESSION]->superuser) ? $didr->get_routes()			: $_SESSION[USERSESSION]->get_didrouting();
	$faxcats		= ($_SESSION[USERSESSION]->superuser) ? NULL						: $_SESSION[USERSESSION]->get_faxcats();
	
	$faxcount		= ($ENABLE_DID_ROUTING) ? $inbox->get_num_faxes($routes, $faxcats)	: $inbox->get_num_faxes($modems, $faxcats);
	
	echo $faxcount;
