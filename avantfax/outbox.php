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

	$refresh_timeout	= 60;
	$fq					= new FaxQueue;

	// for superuser, show all faxes in queue
	if ($_SESSION[USERSESSION]->superuser) {
		$queue = $fq->get_queue();
	} else { // get this user's fax queue
		$queue = $fq->list_owner($_SESSION[USERSESSION]->username);
	}
	
	if (array_key_exists('kill', $_GET)) {
		$jid = substr($_GET['kill'], 0, 8); // location jid
		$found = false;
		
		foreach ($queue as $q) { // only kill job if it exists and user has permission
			if ($q['jid'] == $jid) {
				$fq->killjob($q['owner'], $jid);
				$found = true;
				break;
			}
		}
		
		// couldn't find the fax, check doneq
		if (!$found) {
			// process failed fax queue
			$fq->process_failed_queue();
			
			// for superuser, show all faxes in queue
			if ($_SESSION[USERSESSION]->superuser) {
				$queue = $fq->get_queue();
			} else { // get this user's fax queue
				$queue = $fq->list_owner($_SESSION[USERSESSION]->username);
			}
			
			foreach ($queue as $q) { // only kill job if it exists and user has permission
				if ($q['jid'] == $jid) {
					$fq->killjob($q['owner'], $jid);
					break;
				}
			}
		}
		
		// reload fax queue
		$fq->process_queue();
		
		if ($_SESSION[USERSESSION]->superuser) {// for superuser, show all faxes in queue
			$queue = $fq->get_queue();
		} else { // get this user's fax queue
			$queue = $fq->list_owner($_SESSION[USERSESSION]->username);
		}
	}
	
	$faxqueue		= array();
	$addressbook	= new AFAddressBook;
	
	if (is_array($queue)) {
		foreach ($queue as $q) {
			$q['company'] = $q['number'];
			
			if ($addressbook->loadbyfaxnum($q['number'], $mult)) {
				$q['company'] = $addressbook->get_company();
			}
			
			$faxqueue[] = $q;
		}
	}
	
	// process failed fax queue
	$fq->process_failed_queue();
	
	// for superuser, show all faxes in queue
	if ($_SESSION[USERSESSION]->superuser) {
		$failed_queue = $fq->get_queue();
	} else { // get this user's fax queue
		$failed_queue = $fq->list_owner($_SESSION[USERSESSION]->username);
	}
	
	$failed_faxqueue	= array();
	
	if (is_array($failed_queue)) {
		foreach ($failed_queue as $q) {
			$q['company'] = $q['number'];
			
			if ($addressbook->loadbyfaxnum($q['number'], $mult)) {
				$q['company'] = $addressbook->get_company();
			}
			
			$failed_faxqueue[] = $q;
		}
	}
	
	$INC_LIST = "<meta http-equiv=\"refresh\" content=\"$refresh_timeout;URL=outbox.php\" />";
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('queue',			$faxqueue);
	$usmarty->assign('failed_queue',	$failed_faxqueue);
	$usmarty->assign('queue_count',		count($failed_faxqueue) + count($faxqueue));
	$usmarty->assign('numfaxesinbox',	get_inbox_count());	// number of faxes in inbox
	$usmarty->assign('INC_LIST',		$INC_LIST);
	display_template('outbox.tpl',		$usmarty);
