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

	require realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR).'/includes/classes.php';
	$db = new avantfaxSQL;
	
	// lookup all FaxNum's (faxnumid, companyid, faxnum, email, description, to_person, to_location, to_voicenumber, faxcatid, faxfrom, faxto) 
	// and their respective Rubrica entry (cid, company, email)
	$db->query("SELECT FaxNum.*, Rubrica.company from FaxNum LEFT JOIN Rubrica ON (FaxNum.companyid = Rubrica.cid) ORDER BY faxnumid", $nr, SQL_ALL);
	$faxnums = ($nr) ? $db->getRecords() : NULL;

	// Map information into new tables: AddressBookFAX (abookfax_id, abook_id, faxnumber, email, description, to_person, to_location, 
	// to_voicenumber, faxcatid, faxfrom, faxto) and AddressBook (abook_id, company)	
	if (is_array($faxnums)) {
		foreach ($faxnums as $faxrecord) {
			$abook_id	= NULL;
			// check if AddressBook exists for company
			if ($db->query("SELECT abook_id from AddressBook WHERE company = ".$db->quote($faxrecord['company']), $nr)) {
				if ($nr) {
					$result		= $db->getResult();
					$abook_id	= $result['abook_id'];
				} else {
					if ($db->query("INSERT INTO AddressBook SET company = ".$db->quote($faxrecord['company']))) {
						$abook_id = $db->getInsertID();
						echo "Created AddressBook entry for '".$faxrecord['company']."'\n";
						
						$db->query("UPDATE FaxArchive SET companyid = ".$db->quote($abook_id)." WHERE companyid = ".$db->quote($faxrecord['companyid']));
						echo "Updated FaxArchive for new companyid '$abook_id'\n";
					} else {
						echo "** Error creating AddressBook entry for '".$faxrecord['company']."' **\n";
					}
				}
			}
			
			// check if AddressBookFAX entry already exists for fax number
			if ($db->query("SELECT abookfax_id from AddressBookFAX WHERE faxnumber = ".$db->quote($faxrecord['faxnum']), $nr)) {
				if (!$nr) {
					if ($db->query("INSERT INTO AddressBookFAX SET
									abook_id = ".$db->quote($abook_id).",
									faxnumber = ".$db->quote($faxrecord['faxnum']).",
									email = ".$db->quote($faxrecord['email']).",
									description = ".$db->quote($faxrecord['description']).",
									to_person = ".$db->quote($faxrecord['to_person']).",
									to_location = ".$db->quote($faxrecord['to_location']).",
									to_voicenumber = ".$db->quote($faxrecord['to_voicenumber']).",
									faxcatid = ".$db->quote($faxrecord['faxcatid']).",
									faxfrom = ".$db->quote($faxrecord['faxfrom']).",
									faxto = ".$db->quote($faxrecord['faxto']))) {
						echo "Created AddressBookFAX entry for '".$faxrecord['faxnum']."'\n";
						
						$abookfax_id = $db->getInsertID();
						
						$db->query("UPDATE FaxArchive SET faxnumid = ".$db->quote($abookfax_id)." WHERE faxnumid = ".$db->quote($faxrecord['faxnumid']));
						echo "Updated FaxArchive for new faxnumid '$abookfax_id'\n";
					} else {
						echo "** Error creating AddressBookFAX entry for '".$faxrecord['faxnum']."' **\n";
					}
				}
			}
		}
	}
	
	// Select all emails from UserRubrica and map them to new AddressBookEmail tables
	$db->query("SELECT * from UserRubrica ORDER BY urid", $nr, SQL_ALL);
	$useremails = ($nr) ? $db->getRecords() : NULL;
	
	if (is_array($useremails)) {
		foreach ($useremails as $record) {
			// check if AddressBookFAX entry already exists for fax number
			if ($db->query("SELECT abookemail_id from AddressBookEmail WHERE contact_email = ".$db->quote($record['email']), $nr)) {
				if (!$nr) {
					if ($db->query("INSERT INTO AddressBookEmail SET
									contact_name = ".$db->quote($record['name']).",
									contact_email = ".$db->quote($record['email']))) {
						echo "Created AddressBookEmail entry for '".$record['email']."'\n";
					} else {
						echo "** Error creating AddressBookEmail entry for '".$record['email']."' **\n";
					}
				}
			}
		}
	}
