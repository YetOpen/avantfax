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

// # 0 0 * * *       /var/www/avantfax/includes/avantfaxcron.php -t 2
	require_once 'classes.php';

	$options = getopt("i:t:d:");
	
	if (!isset($options['t'])) {
		echo "usage: avantfaxcron.php [-i num-days] [-d num-days] -t num-days
options:
 -i num-days	prune Inbox of faxes older than number of days
 -d num-days	delete faxes from Inbox/Archive that are older than number of days
 -t num-days	clean AvantFAX temporary directory of files older than number of days
";
		exit;
	}
	
	$tmpdays	= $options['t'];
	$recdays	= (isset($options['i'])) ? $options['i'] : NULL;
	$deldays	= (isset($options['d'])) ? $options['d'] : NULL;
	
	// remove old faxes from Inbox
	if ($recdays != NULL) {
		$inbox = new ArchiveIn;
		$inbox->prune_inbox($recdays);
	}
	
	// delete faxes from Inbox/Archive
	if ($deldays != NULL) {
		$archive = new FaxPDFArchive;
		$archive->prune_archive($deldays);
	}
	
	$today = time();
	
	// remove old temporary files
	foreach (scandir($TMPDIR) as $file) {
		if ($file != '..' && $file != '.' && $file != 'index.html') {
			if ($dayfile = filemtime($TMPDIR.$file)) {
				$diff = round(($today - $dayfile) / 60 / 60 / 24);

				if ($diff >= $tmpdays) {
					deltree($TMPDIR.$file);
				}
			} else {
				echo "Stat error: $TMPDIR.$file\n";
			}
		}
	}
	
	function deltree($path) {
		if (is_dir($path)) {
			foreach (scandir($path) as $file) {
				if ($file == '..' || $file == '.')
					continue;
				deltree($path.DIRECTORY_SEPARATOR.$file);
			}
			rmdir($path);
		} else {
			unlink($path);
		}
	}
