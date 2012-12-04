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

	require_once 'includes/classes.php';

	avantfax_session();
	
	if (!array_key_exists(USERSESSION, $_SESSION)) {
		header("Location: index.php");
		exit;
	}
	
	if (!$_SESSION[USERSESSION]->check_login()) {
		header("Location: index.php");
		exit;
	}
	
	set_user_prefs($_SESSION[USERSESSION]);
