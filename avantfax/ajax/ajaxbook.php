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

	require_once "../includes/classes.php";

	$addressbook	= new AFAddressBook;
	$query			= array_key_exists('q', $_REQUEST) ? $_REQUEST['q'] : NULL;
	
	xml_header();
	echo "<response>\n";

	if ($SHOW_ALL_CONTACTS || strlen($query) > 1) {
		$results = $addressbook->search_companies($query);
		
		if (is_array($results)) {
			foreach ($results as $info) {
				if ($info['company'] === $RESERVED_FAX_NUM) continue;
				
				extract($info);
				
				$addressbook->loadbycid($abook_id);
				$rdata = $addressbook->get_faxnums();
				if (is_array($rdata)) {
					foreach ($rdata as $rinfo) {
						extract($rinfo);
						
						$c_line = $company;
						if ($description)
							$c_line .= " ($description)";
						
						$c_line = decode_xmlReady($c_line);

						echo "<row>\n";
						echo "<company>$c_line - $faxnumber</company>\n";
						echo "<cid>$abook_id</cid>\n<faxnum>$faxnumber</faxnum>\n<fnid>$abookfax_id</fnid>\n";
						echo "</row>\n";
					}
				}
			}
		}
	}
	echo "</response>";
