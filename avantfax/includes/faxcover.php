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

/**
	Desc: re-implement the HylaFax cover page program to support newer style EPS files
	How:  Looks for faxcover values preceded by XXXX- (ie. XXXX-to) encapsulated in () in the ps file
	example: 0 0 32 0 0 (Attention: XXXX-to) ts
	becomes: 0 0 32 0 0 (Attention: Recipient's name) ts
*/
	
	require_once 'classes.php';
	
	$options = getopt("t:c:p:l:m:z:r:v:x:C:D:L:N:V:X:s:f:n:M:");
	
	if (!isset($options['f']) or !isset($options['n'])) {
		exit("Usage: faxcover [-t to] [-c comments] [-p #pages] [-l to-location] [-m maxcomments] [-z maxlencomments]".
			" [-r regarding] [-v to-voice-number] [-x to-company] [-C template-file] [-D date-format] [-L from-location]".
			" [-M from-mail-address] [-N from-fax-number] [-V from-voice-number] [-X from-company] [-s pagesize] -f from -n fax-number\n");
	}
	
	$using_html_cp	= false;
	$coverpage_file	= $INSTALLDIR.'/images/'.$COVERPAGE_FILE; // set default cover page
	
	// do database lookup using FROM email to find user's full name
	$from_name	= $options['f'];
	$from_email	= (isset($options['M'])) ? $options['M'] : NULL;
	
	avantfaxlog("faxcover> from: '$from_name' email: '$from_email'");
	
	$db = new avantfaxSQL;
	
	 // retrieve user's name from db by 'email'
	if ($from_email) {
		if ($db->query("SELECT name FROM UserAccount WHERE email = ".$db->quote($from_email), $nr)) {
			if ($nr) {
				$data = $db->getResult();
				$from_name	= $data['name'];
			} elseif (!invalid_email($from_name)) {// check if from is an email address
				if ($db->query("SELECT name FROM UserAccount WHERE email = ".$db->quote($from_name), $nr)) {
					if ($nr) {
						$data = $db->getResult();
						$from_email	= $from_name;
						$from_name	= $data['name'];
					}
				}
			}
		}
	} else { // retrieve email address from db by 'name'
		if ($db->query("SELECT email FROM UserAccount WHERE name = ".$db->quote($from_name), $nr)) {
			if ($nr) {
				$data = $db->getResult();
				$from_email	= $data['email'];
			} elseif ($db->query("SELECT name, email FROM UserAccount WHERE username = ".$db->quote($from_name), $nr)) { // otherwise, lookup by username
				if ($nr) {
					$data = $db->getResult();
					$from_name	= $data['name'];
					$from_email	= $data['email'];
				} else {
					$db->query("SELECT name FROM UserAccount WHERE email = ".$db->quote($from_name), $nr); // lookup by email address
					if ($nr) {
						$data = $db->getResult();
						$from_email	= $from_name;
						$from_name	= $data['name'];
					}
				}
			}
		}	
	}
	
	// process commmand line cover page argument
	if (isset($options['C'])) {
		$tmp_cpfile = (file_exists($options['C'])) ? $options['C'] : $INSTALLDIR.'/images/'.$options['C'];
		
		$cp_format = strtolower(pathinfo($tmp_cpfile, PATHINFO_EXTENSION));
		
		if ($cp_format == "html" || $cp_format == "htm") { // specified file is html format
			if ($USE_HTML_COVERPAGE) {
				$coverpage_file = $tmp_cpfile;
				$using_html_cp = true;
			}
		} elseif ($cp_format == "ps") {
			$coverpage_file = $tmp_cpfile; // use ps file
		}
	}
	
	$values = array();
	$values['from']					= $from_name;
	$values['from-mail-address']	= $from_email;
	$values['to']					= (isset($options['t']))	? $options['t']	: NULL;
	$values['to-company']			= (isset($options['x']))	? $options['x']	: NULL;
	$values['to-location']			= (isset($options['l']))	? $options['l']	: NULL;
	$values['to-voice-number']		= (isset($options['v']))	? $options['v']	: NULL;
	$values['to-fax-number']		= (isset($options['n']))	? $options['n']	: NULL;
	$values['regarding']			= (isset($options['r']))	? $options['r']	: NULL;
	$values['from-company']			= (isset($options['X']))	? $options['X']	: $FROM_COMPANY;
	$values['from-location']		= (isset($options['L']))	? $options['L']	: $FROM_LOCATION;
	$values['from-voice-number']	= (isset($options['V']))	? $options['V']	: $FROM_VOICENUMBER;
	$values['from-fax-number']		= (isset($options['N']))	? $options['N']	: $FROM_FAXNUMBER;
	$values['page-count']			= (isset($options['p']))	? $options['p']	: NULL;
	$values['pageSize']				= (isset($options['s']))	? $options['s']	: NULL;
	$values['todays-date']			= (isset($options['D']))	? strftime($options['D']) : strftime(FAXCOVER_DATE_FORMAT);
	
	if ($using_html_cp) {
		$values['comments']			= (isset($options['c']))	? str_replace("\n", "<br />", $options['c'])	: NULL;
		$tpl = process_html_template($coverpage_file, COVERPAGE_MATCH, $values);
		// output to temp file
		$filedata = implode("\n", $tpl);
		
		$filename = tmpfilename("html");
		
		if (!$handle = fopen($filename, 'w')) {
			 exit("Cannot open file ($filename)");
		}
	
		if (fwrite($handle, $filedata) === FALSE) {
			exit("Cannot write to file ($filename)");
		}
		fclose($handle);
		
		// feed tmp file to html2ps
		system("$HTML2PS $filename");
	} else {
		$maxlen			= (isset($options['z'])) ? $options['z'] : $CPAGE_LINELEN;
		
		// parse comments
		if (isset($options['c'])) {
			$tmpcmnt	= $options['c'];
			$ctemp		= wordwrap($tmpcmnt, $maxlen, "\n", true);
			$comments	= explode("\n", $ctemp);
		} else {
			$comments	= array();
		}
		
		$i = 0;
		if (is_array($comments)) {
			foreach ($comments as $comment) {
				$values["comments$i"]	=	(isset($comment)) ? rem_nl($comment) : NULL;
				$i++;
			}
		}
		
		$tpl = process_template($coverpage_file, COVERPAGE_MATCH, $values);
		echo implode("", $tpl);
	}
