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

define('FR_ARRAY',		10);
define('FR_STRING',	11);
define('FR_NUMBER',	12);
define('FR_DATE',		13);
define('FR_EMAIL',		14);

/**
 * CLASS: FormRules class
	METHODS:
		public function newRule($varname, $defaultval = null, $vartype = FR_STRING, $minlen = null, $maxlen = null, $error_str = null, $required = false, $sanitize = true, $execfunc = NULL)
		public function htmlReady()
		public function dbReady()
		public function dbQueryReady()
		public function unsetRule($varname)
		public function setDateFmt($format, $delim)
		public function processForm(array $post)
		public function setVals($assoc_array)
		public function frSerialize($array)
		public function frUnSerialize($string)
		public function getRawDate($varname)
		public function getCSSErrorIDs()
		public function addCSSErrorID($varname)
		public function getFormErrors()
		public function getErrors()
		public function clearErrors()
		private function __unset($varname)
		private function __isset($varname)
		private function __get($varname)
		private function __set($varname, $value)
		private function checkRequired($post)
		private function sanitize(&$value)
		private function removeSlashes(&$value)
		private function checkValueType($varname, $value, $vartype)
		private function setRuleValue($varname, $value)
		private function checkValueSize($varname, $value, $minlen, $maxlen, $vartype)
		private function checkDateSpan($varname, $value, $minlen, $maxlen)
		private function datecheck($date)
		private function convertDateFmt($date)
		private function convertDateFmtSQL($date)
		function htmlentity_array($val)
 */
class FormRules
{
	private	$errorsArray	= array(),
			$formErrors		= array(),
			$rulesArray		= array(),
			$cssArray		= array(),
			$is_processed	= false,
			$from_db		= false,
			$datefmt		= "ymd",
			$datedelim		= '/';
				
	public	$debug			= false; // set to false
	
	/**
	 * newRule - create new rule
	 *
	 * @param $varname
	 * @param $defaultval (Default: null)
	 * @param $vartype (Default: FR_STRING)
	 * @param $minlen (Default: null)
	 * @param $maxlen (Default: null)
	 * @param $error_str (Default: null)
	 * @param $required (Default: false)
	 * @param $sanitize (Default: true)
	 * @param $execfunc (Default: null)
	 * @return bool
	 * @access public
	 */
	public function newRule($varname, $defaultval = null, $vartype = FR_STRING, $minlen = null, $maxlen = null, $error_str = null, $required = false, $sanitize = true, $execfunc = NULL) {
		if (!$varname) {
			$this->errorsArray[] = "Must set variable name";
			return false;
		}

		if (array_key_exists($varname, $this->rulesArray)) {
			$this->errorsArray[] = "$varname already exists";
			return false;
		}
		
		if ($defaultval) {
			if (!$this->checkValueType($varname, $defaultval, $vartype)) {
				return false;
			}
			
			if (!$this->checkValueSize($varname, $defaultval, $minlen, $maxlen, $vartype)) {
				return false;
			}
		}
		
		if ($required && !$error_str) {
			$this->errorsArray[] = "$varname is required and requires error string";
			return false;
		}
		
		if ($this->debug) {
			echo "<p>newRule: $varname = "; print_r($defaultval); echo "\n";
		}
		$this->rulesArray[$varname] = array('value' => $defaultval, 'vartype' => $vartype, 'minlen' => $minlen, 'maxlen' => $maxlen, 
		'required' => $required, 'error' => $error_str, 'sanitize' => $sanitize, 'execfunc' => $execfunc);
		return true;
	}
	
	/**
	 * htmlReady - return values encoded in entities and without slashes
	 *
	 * @return array Array of all variables htmlencoded
	 * @access public
	 */
	public function htmlReady() {
		$retarr = array();
		
		foreach ($this->rulesArray as $varname => $array) {
			switch ($array['vartype']) {
				case FR_ARRAY:
					$val = $array['value'];
					break;
				default:
					$val = (get_magic_quotes_gpc()) ? stripslashes($array['value']) : $array['value'];
			}
			
			if ($array['sanitize'] == true) {
				$val2 = is_string($val) ? htmlentities($val, ENT_QUOTES, "UTF-8") : $val;
				
				$retarr[$varname] = ($this->is_processed or $this->from_db) ? $val : $val2;
			} else {
				$retarr[$varname] = $val;
			}
		}
		return $retarr;
	}
	
	/**
	 * dbReady - return values with slashes if needed
	 *
	 * @return array Array of all variables ready for database entry
	 * @access public
	 */
	public function dbReady() {
		$retarr = array();
		
		foreach ($this->rulesArray as $varname => $array) {
			if ($this->debug) {
				echo "<p>dbReady $varname: "; print_r($array['value']); echo "\n";
			}
			
			switch ($array['vartype']) {
				case FR_DATE:
					$retarr[$varname] = $this->convertDateFmtSQL($array['value']);
					break;
				case FR_ARRAY:
					$retarr[$varname] = $this->frSerialize($array['value']);
					break;
				case FR_NUMBER:
					$retarr[$varname] = ($array['value'] == null) ? 0 : $array['value'];
					break;
				default:
					$retarr[$varname] = (get_magic_quotes_gpc()) ? $array['value'] : addslashes($array['value']);
			}
		}
		
		return $retarr;
	}
	
	/**
	 * dbQueryReady - return query string for UPDATE query
	 *
	 * @return string All variables formated for database query (INSERT, UPDATE)
	 * @access public
	 */
	public function dbQueryReady() {
		$arr = array();
		
		foreach ($this->rulesArray as $varname => $array) {
			switch ($array['vartype']) {
				case FR_DATE:
					$val = $this->convertDateFmtSQL($array['value']);
					break;
				case FR_ARRAY:
					$val = $this->frSerialize($array['value']);
					break;
				case FR_NUMBER:
					$val = ($array['value'] == null) ? 0 : $array['value'];
					break;
				default:
					$val = (get_magic_quotes_gpc()) ? $array['value'] : addslashes($array['value']);
			}
			$arr[] = "`$varname` = '$val'";
		}
		
		return join(", ", $arr);
	}
	
	/**
	 * unsetRule - delete a rule
	 *
	 * @param $varname
	 * @return bool
	 * @access public
	 */
	public function unsetRule($varname) {
		if (array_key_exists($varname, $this->rulesArray)) {
			if ($this->debug)
				echo "<p>unsetRule $varname\n";
		
			unset($this->rulesArray[$varname]);
			return true;
		}
		
		return false;
	}
	
	/**
	 * setDateFmt
	 *
	 * @param $format
	 * @param $delim
	 * @return void
	 * @access public
	 */
	public function setDateFmt($format, $delim) {
		$this->datefmt = strtolower($format);
		$this->datedelim = $delim;
	}
	
	/**
	 * processForm - sanitize input data and check rules
	 *
	 * @param array $post
	 * @return bool
	 * @access public
	 */
	public function processForm(array $post) {
		// check that form sent all required fields
		$retval = $this->checkRequired($post);
		
		foreach ($post as $varname => $value) {
			// if var no exist, error
			if (!array_key_exists($varname, $this->rulesArray)) {
				$this->formErrors[] = "$varname doesn't exist";
				$this->cssArray[] = $varname;
				$retval = false;
				
				if ($this->debug)
					echo "<p>processForm1: Adding $varname to cssArray\n";
				continue;
			}
			
			if ($this->rulesArray[$varname]['sanitize'] == true) {
				$this->sanitize($value);
			}
			
			if (!$this->checkValueType($varname, $value, $this->rulesArray[$varname]['vartype'])) {
				$this->formErrors[] = ($this->rulesArray[$varname]['error']) ? $this->rulesArray[$varname]['error'] : 
													$this->errorsArray[count($this->errorsArray) - 1]; // get last error message
				$this->cssArray[] = $varname;
				$retval = false;
				
				if ($this->debug)
					echo "<p>processForm2: Adding $varname to cssArray\n";
				continue;
			}
			
			if (!$this->checkValueSize($varname, $value, $this->rulesArray[$varname]['minlen'], $this->rulesArray[$varname]['maxlen'],
				$this->rulesArray[$varname]['vartype'])) {
				$this->formErrors[]	= ($this->rulesArray[$varname]['error']) ? $this->rulesArray[$varname]['error'] :
													$this->errorsArray[count($this->errorsArray) - 1]; // get last error message
				$this->cssArray[]		= $varname;
				$retval = false;
				
				if ($this->debug)
					echo "<p>processForm3: Adding $varname to cssArray\n";
				continue;
			}
			
			if ($this->rulesArray[$varname]['required'] && !$value) {
				$this->formErrors[]	= $this->rulesArray[$varname]['error'];
				$this->cssArray[]		= $varname;
				if ($this->debug)
					echo "<p>processForm4: Adding $varname to cssArray\n";
			}
			
			// execute the custom function
			if (function_exists($this->rulesArray[$varname]['execfunc']) && $value) {
				if ($this->debug)
					echo "<p>processForm: executing ".$this->rulesArray[$varname]['execfunc']."\n";
				
				$execfuncmsg = NULL;
				if (!$this->rulesArray[$varname]['execfunc']($value, $execfuncmsg)) {
					$this->formErrors[]	= $execfuncmsg;
					$this->cssArray[]		= $varname;
					$retval = false;
					
					if ($this->debug)
						echo "<p>processForm: ".$this->rulesArray[$varname]['execfunc']." error '$execfuncmsg'\n";
				}
			}
			
			$this->rulesArray[$varname]['value'] = $value;
			
			if ($this->debug) {
				echo "<p>processForm $varname: "; print_r($value); echo "\n";
			}
		}
	
		$this->is_processed = true;
		return $retval;
	}
	
	/**
	 * setVals - set data from DB
	 *
	 * @param $assoc_array Array of column names with data
	 * @return bool
	 * @access public
	 */
	public function setVals($assoc_array) {
		$retval = true;
		$this->from_db = true;
		
		foreach ($assoc_array as $varname => $value) {
			if (!$this->setRuleValue($varname, $value)) {
				$retval = false;
			}
		}
		return $retval;
	}
	
	/**
	 * frSerialize
	 *
	 * @param $array
	 * @return string
	 * @access public
	 */
	public function frSerialize($array) {
		$retval = serialize($array);
		$retval = preg_replace("#;#msi",'0x3B', $retval);
		$retval = addcslashes($retval, "\0..\37!@\@\177..\377"); 
		$retval = addslashes($retval);
		return $retval;
	}
	
	/**
	 * frUnSerialize
	 *
	 * @param $string
	 * @return array
	 * @access public
	 */
	public function frUnSerialize($string) {
		$retval = stripslashes($string);
		$retval = stripcslashes($retval);
		$retval = preg_replace("/0x3B/", ";", $retval);
		$retval = unserialize($retval);
		return $retval;
	}
	
	/**
	 * getRawDate
	 *
	 * @param $varname
	 * @return mktime
	 * @access public
	 */
	public function getRawDate($varname) {
		if (!array_key_exists($varname, $this->rulesArray)) {
			$this->errorsArray[] = "$varname doesn't exist";
				
			if ($this->debug)
				echo "<p>getRawDate: $varname doesn't exist\n";
				
			return false;
		}
		
		if (($date_arr = $this->datecheck($this->rulesArray[$varname]['value'])) == false) {
			$this->errorsArray[] = "$varname date is of incorrect format";
			return false;
		}
		
		return mktime(0, 0, 0, $date_arr['month'], $date_arr['day'], $date_arr['year']);;
	}
	
	/**
	 * getCSSErrorIDs
	 *
	 * @return string
	 * @access public
	 */
	public function getCSSErrorIDs() {
		if (!count($this->cssArray)) return null;
	
		return "#".join(', #', $this->cssArray);
	}
	
	/**
	 * addCSSErrorID
	 *
	 * @param varname
	 * @return bool
	 * @access public
	 */
	public function addCSSErrorID($varname) {
		if (!array_key_exists($varname, $this->rulesArray)) {
			return false;
		}
		
		$this->cssArray[] = $varname;
		return true;
	}
	
	/**
	 * getFormErrors
	 *
	 * @return array
	 * @access public
	 */
	public function getFormErrors() {
		return $this->formErrors;
	}
	
	/**
	 * getErrors
	 *
	 * @return array
	 * @access public
	 */
	public function getErrors() {
		return $this->errorsArray;
	}
	
	/**
	 * clearErrors
	 * 
	 * @return void
	 * @access public
	 */
	public function clearErrors() {
		$this->errorsArray = array();
	}
	
	/**
	 * __unset
	 *
	 * @param string varname
	 * @return void
	 * @access private
	 */
	private function __unset($varname) {
		$this->unsetRule($varname);
	}
	
	/**
	 * __isset
	 *
	 * @param string varname
	 * @return bool
	 * @access private
	 */
	private function __isset($varname) {
		if (array_key_exists($varname, $this->rulesArray)) {
			return isset($this->rulesArray[$varname]['value']);
		}
		return false;
	}
	
	/**
	 * __get
	 *
	 * @param string varname
	 * @return mixed value of varname
	 * @access private
	 */
	private function __get($varname) {
		if ($this->debug) {
			echo "<p>FormRules get: $varname\n";
		}
		
		if (array_key_exists($varname, $this->rulesArray)) {
			return $this->rulesArray[$varname]['value'];
		}
		
		trigger_error("FormRules get: rule '$varname' doesn't exist");
		return null;
	}
	
	/**
	 * __set
	 *
	 * @param string varname
	 * @param mixed value for varname
	 * @return void
	 * @access private
	 */
	private function __set($varname, $value) {
		if ($this->debug)
			echo "<p>FormRules set: $varname\n";
				
		$this->setRuleValue($varname, $value);
	}
	
	/**
	 * checkRequired - check that form has sent all required fields
	 *
	 * @param array $post
	 * @return bool
	 * @access private
	 */
	private function checkRequired($post) {
		$retval = true;
		
		foreach ($this->rulesArray as $varname => $array) {
			if ($array['required'] == true && !array_key_exists($varname, $post)) {
				$this->formErrors[] = $array['error'];
				$this->cssArray[] = $varname;
				$retval = false;
				
				if ($this->debug)
					echo "<p>checkRequired: Adding $varname to cssArray\n";
			}
		}
		
		return $retval;
	}
	
	/**
	 * sanitize - run htmlentities on value
	 *
	 * @param string $value
	 * @return void
	 * @access private
	 */
	private function sanitize(&$value) {
		if (is_array($value)) {
			foreach ($value as $k => $v) {
				if (is_array($v)) {
					$this->sanitize($value[$k]);
				} else {
					$value[$k] = (get_magic_quotes_gpc()) ? htmlentities(stripslashes($v), ENT_QUOTES, "UTF-8") :
											htmlentities($v, ENT_QUOTES, "UTF-8");
				}
			}
		} else {
			$value = (get_magic_quotes_gpc()) ? htmlentities(stripslashes($value), ENT_QUOTES, "UTF-8") :
								htmlentities($value, ENT_QUOTES, "UTF-8");
		}
	}
	
	/**
	 * 
	 *
	 * @param 
	 * @return 
	 * @access private
	 *
	private function removeSlashes(&$value) {
		if (is_array($value)) {
			foreach ($value as $k => $v) {
				if (is_array($v)) {
					$this->removeSlashes($value[$k]);
				} else {
					$value[$k] = (get_magic_quotes_gpc()) ? stripslashes($v) : $v;
				}
			}
		} else {
			$value = (get_magic_quotes_gpc()) ? stripslashes($value) : $value;
		}
	}
	
	/**
	 * checkValueType
	 *
	 * @param string $varname
	 * @param string $value
	 * @param string $vartype
	 * @return bool
	 * @access private
	 */
	private function checkValueType($varname, $value, $vartype) {
		if ($value != null)
			switch ($vartype) {
				case FR_ARRAY:
					if (!is_array($value)) {
						$this->errorsArray[] = "$varname is not an array";
						return false;
					}
					break;
				case FR_STRING:
					if (!is_string($value)) {
						$this->errorsArray[] = "$varname is not a string";
						return false;
					}
					break;
				case FR_NUMBER:
					if (!is_numeric($value)) {
						$this->errorsArray[] = "$varname is not a number";
						return false;
					}
					break;
				case FR_EMAIL:
					if (!preg_match("/^[^@]+@([-\w]+\.)+[A-Za-z]{2,4}$/", $value)) {
						$this->errorsArray[] = "$varname is not an email address";
						return false;
					}
					break;
				case FR_DATE:
					if ($this->datecheck($value) == false) {
						$this->errorsArray[] = "$varname is not a proper date";
						return false;
					}
					break;
				default:
					$this->errorsArray[] = "$varname is not of proper type";
					return false;
			}
		return true;
	}
	
	/**
	 * setRuleValue
	 *
	 * @param string $varname
	 * @param string $value
	 * @return bool
	 * @access private
	 */
	private function setRuleValue($varname, $value, $encode = true) {
		if (!array_key_exists($varname, $this->rulesArray)) {
			$this->errorsArray[] = "$varname doesn't exist";
			
			if ($this->debug)
				echo "<p>setRuleValue: $varname doesn't exist\n";
			
			return false;
		}
		
		// convert SQL DATE to chosen date format
		if ($this->rulesArray[$varname]['vartype'] == FR_DATE) {
			$value = $this->convertDateFmt($value);
		}
		
		// if Array, unserialize the value
		if ($this->rulesArray[$varname]['vartype'] == FR_ARRAY) {
			if (!is_array($value)) {
				$value = $this->frUnSerialize($value);
				
				if (!is_array($value)) {
					$value = array();
				}
			}
		}
		
		if (!$this->checkValueType($varname, $value, $this->rulesArray[$varname]['vartype'])) {
			if ($this->debug) {
				echo "<p>setRuleValue: checkValueType failed on $varname = "; print_r($value); echo "\n";
			}
			return false;
		}

		if (!$this->checkValueSize($varname, $value, $this->rulesArray[$varname]['minlen'], 
			$this->rulesArray[$varname]['maxlen'], $this->rulesArray[$varname]['vartype'])) {
			if ($this->debug) {
				echo "<p>setRuleValue: checkValueSize failed on $varname = "; print_r($value); echo "\n";
			}
			
			return false;
		}
		
// mod
		$this->rulesArray[$varname]['value'] = (get_magic_quotes_runtime() && $this->rulesArray[$varname]['vartype'] != FR_ARRAY) ? 
				stripslashes($value) : $value;
//				htmlentities(stripslashes($value), ENT_QUOTES, "UTF-8") : htmlentities($value, ENT_QUOTES, "UTF-8");
		
		if ($this->debug) {
			echo "<p>setRuleValue: $varname = "; print_r($this->rulesArray[$varname]['value']); echo "\n";
		}
		
		return true;
	}
	
	/**
	 * checkValueSize
	 *
	 * @param string $varname
	 * @param string $value
	 * @param integer $minlen
	 * @param integer $maxlen
	 * @param string $vartype
	 * @return bool
	 * @access private
	 */
	private function checkValueSize($varname, $value, $minlen, $maxlen, $vartype) {
		switch ($vartype) {
			case FR_ARRAY:
				if (is_array($value)) {
					$len = count($value);
					
					if ($minlen && $len < $minlen) {
						$this->errorsArray[] = "$varname value too small";
						return false;
					} elseif ($maxlen && $len > $maxlen) {
						$this->errorsArray[] = "$varname value too large";
						return false;
					}
				} elseif ($value != null) {
					return false;
				}
				break;
			case FR_DATE:
				return $this->checkDateSpan($varname, $value, $minlen, $maxlen);
				break;
			case FR_NUMBER:
				if ($minlen && $value < $minlen) {
					$this->errorsArray[] = "$varname value too small";
					return false;
				} elseif ($maxlen && $value > $maxlen) {
					$this->errorsArray[] = "$varname value too large";
					return false;
				}
				break;
			default: // DATE, STRING, EMAIL
				$len = strlen($value);
		
				if ($minlen && $len < $minlen) {
					$this->errorsArray[] = "$varname value too small";
					return false;
				}
				
				if ($maxlen && $len > $maxlen) {
					$this->errorsArray[] = "$varname value too large";
					return false;
				}
		}
		
		return true;
	}
	
	/**
	 * checkDateSpan
	 *
	 * @param string $varname
	 * @param string $value
	 * @param integer $minlin
	 * @param integer $maxlen
	 * @return bool
	 * @access private
	 */
	private function checkDateSpan($varname, $value, $minlen, $maxlen) {
		if (is_array($value)) {
			return false;
		}
		
		if (($date_arr = $this->datecheck($value)) == false) {
			$this->errorsArray[] = "$varname date is of incorrect format";
			return false;
		}
		
		$currdate	= mktime(0, 0, 0, $date_arr['month'], $date_arr['day'], $date_arr['year']);
		$mindate	= null;
		$maxdate	= null;
		
		// check max/min value for date correctness
		if ($minlen) {
			if (($minlen_arr = $this->datecheck($minlen)) == false) {
				$this->errorsArray[] = "$varname minimum date is of incorrect format";
				return false;
			}
			
			$mindate = mktime(0, 0, 0, $minlen_arr['month'], $minlen_arr['day'], $minlen_arr['year']);
		}
		
		if ($maxlen) {
			if (($maxlen_arr = $this->datecheck($maxlen)) == false) {
				$this->errorsArray[] = "$varname maximum date is of incorrect format";
				return false;
			}
			
			$maxdate = mktime(0, 0, 0, $maxlen_arr['month'], $maxlen_arr['day'], $maxlen_arr['year']);
		}
		
		// compare date ranges
		if ($mindate && $currdate < $mindate) {
			$this->errorsArray[] = "$varname date is under range";
			return false;
		}
		
		if ($maxdate && $currdate > $maxdate) {
			$this->errorsArray[] = "$varname date is out of range";
			return false;
		}

		return true;
	}
	
	/**
	 * datecheck
	 *
	 * @param string date
	 * @return array
	 * @access private
	 */
	private function datecheck($date) {
		$date	= str_replace($this->datedelim, "-", $date);
		$format	= $this->datefmt;
		
		if (count($datebits = explode('-', $date)) != 3) return false;
		
		$year	= intval($datebits[strpos($format, 'y')]);
		$month	= intval($datebits[strpos($format, 'm')]);
		$day	= intval($datebits[strpos($format, 'd')]);
		
		if (checkdate($month, $day, $year) == false) return false;
		
		if ($this->debug) echo "<p>datecheck: $year - $month - $day\n";
		
		return array('year' => $year, 'month' => $month, 'day' => $day);
	}
	
	/**
	 * convertDateFmt - Convert from SQL to chosen format
	 *
	 * @param string date
	 * @return string
	 * @access private
	 */
	private function convertDateFmt($date) {
		$format = $this->datefmt;
		
		list($year, $month, $day) = explode("-", $date);
		
		$pos_y	= strpos($format, 'y');
		$pos_m	= strpos($format, 'm');
		$pos_d	= strpos($format, 'd');
		
		$ret = array();
		for ($i = 0; $i < 3; $i++) {
			if ($i == $pos_y) $ret[] = $year;
			if ($i == $pos_m) $ret[] = $month;
			if ($i == $pos_d) $ret[] = $day;
		}
		
		$date = join($this->datedelim, $ret);
		
		if ($this->debug) 
			echo "<p>convertDateFmt: $date ($this->datefmt)\n";
		
		return $date;
	}
	
	/**
	 * convertDateFmtSQL - Convert from chosen format to SQL Date format
	 *
	 * @param string date
	 * @return string
	 * @access private
	 */
	private function convertDateFmtSQL($date) {
		$format	= $this->datefmt;
		
		$order	= explode($this->datedelim, $date);
		
		if (count($order) < 3) return null;
		
		$year		= $order[strpos($format, 'y')];
		$month		= $order[strpos($format, 'm')];
		$day		= $order[strpos($format, 'd')];
		
		$date		= "$year-$month-$day";
		
		if ($this->debug)
			echo "<p>convertDateFmtSQL: $date ($this->datefmt)\n";
		
		return $date;
	}
	
} /* END OF CLASS */

	/**
	 * htmlentity_array
	 *
	 * @param string $val
	 * @return string
	 * @access public
	 */
	function htmlentity_array($val) {
		return htmlentities($val, ENT_QUOTES, "UTF-8");
	}
