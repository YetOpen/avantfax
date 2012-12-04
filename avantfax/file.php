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
	
	if (!array_key_exists('file', $_REQUEST)) exit;
	
	$file = $INSTALLDIR.$_REQUEST['file'];
	
	if (!file_exists($file)) {
		exit("<p>$file doesn't exist</p>");
	}
	
	$mime_content_type = get_filetype($file);
	
	switch($mime_content_type) {
		case 'application/pdf':
		case 'image/gif':
		case 'image/jpeg':
		case 'image/png':
		case 'image/tiff':
			break;
		default:
			exit("Invalid file type: $file $mime_content_type");
	}
	
	header("Pragma: public");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: must-revalidate");
	header("Content-type: ".$mime_content_type);
	header("Content-Length: ".filesize($file));
	header("Content-disposition: inline; filename=$file");
	header("Accept-Ranges: ".filesize($file)); 
	readfile($file);
