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
	
	if (!ENABLE_OCR_SUPPORT) {
		exit("You must enable ENABLE_OCR_SUPPORT in local_config.php first\n");
	}
	
	// make list of all the faxes in the archive
	$criteria = array(
	 	'start_date'	=> NULL,
		'end_date'		=> NULL,
		'keywords'		=> NULL,
		'companyid'		=> NULL,
		'sentrecvd'		=> NULL,
		'category'		=> NULL,
		'userid'		=> NULL,	// faxes sent by this userid
		'categories'	=> NULL,	// viewable categories
		'modemdevs'		=> NULL,	// viewable modem devices
		'didroutes'		=> NULL,	// viewable DID routes
		'superuser'		=> true
	);
	
	$archive = new FaxPDFArchive;
	$num_results = $archive->search_archive($criteria);
	
	echo "$num_results faxes in the Archive\n";
	
	if ($num_results) {
		while ($archive->next_archive_entry($fid)) {
			if ($archive->load_fax($fid)) {
				echo "Processing faxid $fid\n";
				$path = $INSTALLDIR.$archive->get_tiffpath();
					
				if ($ocr_data = ocr_faxcontent($path)) {
					$archive->set_faxcontent($ocr_data);
				}
			}
		}
	}
