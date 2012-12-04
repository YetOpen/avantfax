#!/usr/bin/php
<?php
/**
 * AvantFAX - HylaFAX Web 2.0 interface
 *
 * PHP 4.4
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 *
 * @description: Stand alone faxcover script for use with AvantFAX compatible cover sheets
	
	How:  Looks for faxcover values preceded by XXXX- (ie. XXXX-to) encapsulated in () in the ps file
	example:	0 0 32 0 0 (Attention: XXXX-to) ts
	becomes:	0 0 32 0 0 (Attention: Recipient's name) ts
 */
	
	$COVERPAGE_FILE		= "/var/www/avantfax/images/cover.ps";
	$FROM_COMPANY		= "";
	$FROM_LOCATION		= "";
	$FROM_VOICENUMBER	= "";
	$FROM_FAXNUMBER		= "";
	
	error_reporting(E_ERROR);
	$CPAGE_LINELEN		= 80;
	define('FAXCOVER_DATE_FORMAT', "%d.%m.%Y %H:%M");
	define('COVERPAGE_MATCH', 'XXXX-');
	
	$options = getopt("t:c:p:l:m:z:r:v:x:C:D:L:N:V:X:s:f:n:");
	
	if (!isset($options['f']) or !isset($options['n'])) {
		exit("usage: faxcover [-t to] [-c comments] [-p #pages] [-l to-location] [-m maxcomments] [-z maxlencomments] [-r regarding] [-v to-voice-number] [-x to-company] [-C template-file] [-D date-format] [-L from-location] [-N from-fax-number] [-V from-voice-number] [-X from-company] [-s pagesize] -f from -n fax-number\n");
	}
	
	if (!isset($options['C'])) {
		$options['C'] = $COVERPAGE_FILE;
	}
	
	$todays_date	= (isset($options['D'])) ? strftime($options['D']) : strftime(FAXCOVER_DATE_FORMAT);
	$maxlen			= (isset($options['z'])) ? $options['z'] : $CPAGE_LINELEN;
	
	// parse comments
	if (isset($options['c'])) {
		$tmpcmnt	= $options['c'];
		$ctemp		= wordwrap($tmpcmnt, $maxlen, "\n", true);
		$comments	= explode("\n", $ctemp);
	} else {
		$comments	= array();
	}
	
	$values = array();
	$values['to']					= (isset($options['t']))	? $options['t']	: NULL;
	$values['to-company']			= (isset($options['x']))	? $options['x']	: NULL;
	$values['to-location']			= (isset($options['l']))	? $options['l']	: NULL;
	$values['to-voice-number']		= (isset($options['v']))	? $options['v']	: NULL;
	$values['to-fax-number']		= (isset($options['n']))	? $options['n']	: NULL;
	$values['regarding']			= (isset($options['r']))	? $options['r']	: NULL;
	$values['from']					= (isset($options['f']))	? $options['f']	: NULL;
	$values['from-company']			= (isset($options['X']))	? $options['X']	: $FROM_COMPANY;
	$values['from-location']		= (isset($options['L']))	? $options['L']	: $FROM_LOCATION;
	$values['from-voice-number']	= (isset($options['V']))	? $options['V']	: $FROM_VOICENUMBER;
	$values['from-fax-number']		= (isset($options['N']))	? $options['N']	: $FROM_FAXNUMBER;
	$values['page-count']			= (isset($options['p']))	? $options['p']	: NULL;
	$values['todays-date']			= $todays_date;
	$values['pageWidth']			= (isset($options['s']))	? $options['s']	: NULL; // ???
	$values['pageLength']			= (isset($options['s']))	? $options['s']	: NULL; // ???
	
	$i = 0;
	if (is_array($comments)) {
		foreach ($comments as $comment) {
			$values["comments$i"]	=	(isset($comment)) ? rem_nl($comment) : NULL;
			$i++;
		}
	}
	
	$tpl = process_template($options['C'], COVERPAGE_MATCH, $values);
	echo implode("", $tpl);
	
	/**
	 * process_template
	 *
	 * @param string $template
	 * @param string $match
 	 * @param array $values
	 * @return string
	 */
	function process_template($template, $match, $values) {
		$lines			= file($template);
		$matchlen		= strlen($match);
		$return			= array();
		
		foreach ($lines as $line) {
			// search line if it matches "XXXX-symbol)".  if so, swap the appropriate value
			if (preg_match("/".$match."/", $line)) {
				// start by finding the symbol
				$pos_start	= strpos($line, $match) + $matchlen;
				$pos_end	= strpos($line, ")");
				$symbol		= substr($line, $pos_start, $pos_end - $pos_start);
				$newsymbol	= NULL;
				
				if (array_key_exists($symbol, $values)) {
					$newsymbol = unaccent($values[$symbol]);
				}
				
				// swap symbols
				$line = str_replace("$match$symbol", $newsymbol, $line);
			}
			
			$return[] = $line;
		}
		
		return $return;
	}
	
	/**
	 * unaccent - convert special chars to postscript
	 *
	 * @param string $text
	 * @return integer
	 */
	function unaccent($text) {
		$search = array(	"à", "á", "â", "ä",
							"è", "é", "ê", "ë",
							"ì", "í",  "î", "ï",
							"ò", "ó", "ô", "ö",
							"ù", "ú", "û", "ü",
							"^", "(", ")", "’", "\\",
							"”", "¡", "™", "£",
							"¢", "∞", "§", "¶",
							"•", "ª", "º", "–",
							"≠", "œ", "∑", "´",
							"®", "†", "¥", "¨",
							"’", "»", "Å", "Í",
							"Î", "Ï", "˝", "Ó",
							"Ô", "", "Ò", "Ú",
							"Æ", "¸", "˛", "Ç",
							"◊", "ı", "˜", "Â",
							"¯", "˘", "¿", "ˆ",
							"ø", "“", "‘", "å",
							"ß", "∂", "ƒ", "©",
							"˙", "˚", "¬", "…",
							"æ", "≈", "ç", "√",
							"∫", "≤", "≥", "÷",
							"⁄", "€", "‹", "›",
							"ﬁ", "ﬂ", "‡", "°",
							"·", "‚", "—", "±",
							"Œ", "„", "´", "‰",
							"ˇ", "Á", "¨", "ˆ",
							"Ø", "∏", "”");
		$replace = array(	"\210", "\207", "\211", "\212", 
							"\217", "\216", "\220", "\221",
							"\223", "\222", "\224", "\225",
							"\230", "\227", "\231", "\232",
							"\235", "\234", "\236", "\237",
							"\136", "\(", "\)", "\325", "\\\\",
							"\323", "\301", "\252", "\243",
							"\242", "\245", "\244", "\246",
							"\245", "\237", "\274", "\320",
							"\271", "\317", "\345", "\253",
							"\250", "\240", "\264", "\254",
							"\325", "\310", "\201", "\352",
							"\353", "\354", "\375", "\356",
							"\357", "\360", "\361", "\362",
							"\256", "\374", "\376", "\202",
							"\340", "\365", "\367", "\345",
							"\370", "\371", "\300", "\366",
							"\277", "\322", "\324", "\214",
							"\247", "\266", "\304", "\251",
							"\372", "\373", "\302", "\311",
							"\276", "\273", "\215", "\326",
							"\362", "\243", "\263", "\270",
							"\244", "\333", "\334", "\335",
							"\336", "\337", "\340", "\260",
							"\341", "\342", "\321", "\261",
							"\316", "\343", "\253", "\344",
							"\377", "\347", "\254", "\366",
							"\257", "\325", "\323");
		
		$text = html_entity_decode($text, ENT_QUOTES, "UTF-8");
		
		return str_replace($search, $replace, $text);
	}
	
	/**
	 * rem_nl
	 *
	 * @param string $str
	 * @return string
	 */
	function rem_nl($str) {
		$str = preg_replace("/\r/", "", $str);
		return preg_replace("/\n/", "", $str);
	}
