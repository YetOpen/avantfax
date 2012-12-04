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

	require_once '../includes/classes.php';
	
	$dl_id = array_key_exists('dl_id', $_REQUEST) ? $_REQUEST['dl_id'] : NULL;
	
	$dlist = new DistributionList;
	if (!$dlist->load_list($dl_id))
		exit("Invalid list id");
	
	header("Cache-Control: no-cache");
	
	$list		= $dlist->list_entries();
	$faxnums	= array();
	
	foreach ($list as $entry) {
		$data = explode("|", $entry);
		if (array_key_exists(1, $data))
			$faxnums[] = $data[1];
	}
	
	$response	= join("; ", $faxnums);
	
	echo $response;
