#!/usr/bin/php
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
	require realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR).'/includes/classes.php';
	
	$criteria = array(
	 	'start_date'	=> NULL,
		'end_date'		=> NULL,
		'keywords'		=> NULL,
		'companyid'		=> NULL,
		'sentrecvd'		=> '*',
		'category'		=> NULL,
		'faxid'			=> NULL,
		'userid'		=> NULL,
		'categories'	=> NULL,
		'modemdevs'		=> NULL,
		'didroutes'		=> NULL,
		'superuser'		=> true
	);
	
	$quiet = true;
	
	// search for all faxes
	$archive = new FaxPDFArchive;
	$results = $archive->search_archive($criteria);
	
	if ($results) {
		echo "$results faxes in Archive\n";
		$fax = new FaxPDFArchive;
		while ($archive->next_archive_entry($fid)) {
			$fax->load_fax($fid);
			
			$thumbnail	= $INSTALLDIR.$fax->get_thumbnail();
			$path		= dirname($thumbnail);
			$preview	= $path.DIRECTORY_SEPARATOR.PREVIMG.'0'.PREVIMGSFX;
			
			// check if thumbnail image exists
			if (is_file($thumbnail) && is_file($preview)) continue;
			
			echo "Creating images in: $path\n";
			
			// create thumbnail of fax
			pdf_preview($path);
		}
	} else {
		echo "No faxes found\n";
	}
	
	echo "Done\n";
