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

	error_reporting(E_ALL);
	ini_set('magic_quotes_runtime', false);
    setlocale(LC_CTYPE, "it_IT.UTF-8");
	
	if (ini_get('register_globals')) {
		exit("Error: register_globals must be set to Off in /etc/php.ini");
	}
	
	$AVANTFAX_VERSION	= '3.3.5';
	
	$INSTALLDIR	= realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
	
	define('USERSESSION',		'user');
	define('ADMIN_THEME_PATH',	'admin_theme');
	define('USER_THEME_PATH',	'main_theme');
	define('PLUGINS_PATH',		'plugins');
	
	define('ADMINTHEME_DIR',	$INSTALLDIR.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.ADMIN_THEME_PATH.DIRECTORY_SEPARATOR);
	define('USERTHEME_DIR',		$INSTALLDIR.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.USER_THEME_PATH.DIRECTORY_SEPARATOR);
	define('PLUGINS_DIR',		$INSTALLDIR.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.PLUGINS_PATH.DIRECTORY_SEPARATOR);
	
	if (file_exists($INSTALLDIR.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'local_config.php')) {
		include($INSTALLDIR.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'local_config.php');
	}
	
	if (!isset($dft_config_lang))
		$dft_config_lang = 'en';			// default system language
	
	if (!isset($EMAIL_TPL))
		$EMAIL_TPL = 'en';					// default system language
	
	if (!defined('AFDB_USER'))
		define('AFDB_USER',	'avantfax');	// username
	
	if (!defined('AFDB_PASS'))
		define('AFDB_PASS',	'd58fe49');		// password
	
	if (!defined('AFDB_NAME'))
		define('AFDB_NAME',	'avantfax');	// database name
	
	if (!defined('AFDB_ENGINE'))
		define('AFDB_ENGINE',	'mysql');	// database engine

	if (!defined('AFDB_HOST'))
		define('AFDB_HOST',	'localhost');	// database server
	
	if (!defined('ADMIN_EMAIL'))
		define('ADMIN_EMAIL',	'root@localhost');
	
	if (!defined('RESTRICTED_USER_MODE'))
		define('RESTRICTED_USER_MODE', false);
	
	if (!defined('INBOX_LIST_MODEM'))
		define('INBOX_LIST_MODEM', false);
		
	if (!isset($FOCUS_ON_NEW_FAX))
		$FOCUS_ON_NEW_FAX	= false;

	if (!isset($FOCUS_ON_NEW_FAX_POPUP))
		$FOCUS_ON_NEW_FAX_POPUP	= false;
	
	if (!isset($FROM_COMPANY))
		$FROM_COMPANY		= '';
	if (!isset($FROM_LOCATION))
		$FROM_LOCATION		= '';
	if (!isset($FROM_FAXNUMBER))
		$FROM_FAXNUMBER		= '';
	if (!isset($FROM_VOICENUMBER))
		$FROM_VOICENUMBER	= '';
	if (!isset($DEFAULT_TSI_ID))
		$DEFAULT_TSI_ID		= '';
	
	if (!isset($BINARYDIR))
		$BINARYDIR			= '/usr/bin';	// typical on Linux, while /usr/local/bin would be typical for FreeBSD
	
	if (!isset($HYLAFAX_PREFIX))
		$HYLAFAX_PREFIX		= '/usr';		// if you installed hylafax from source, your installation may default to /usr/local
		
	if (!isset($HYLASPOOL))
		$HYLASPOOL			= '/var/spool/hylafax';
	
	if (!isset($HYLATIFF2PS))
		$HYLATIFF2PS		= false;
	
	if (!isset($FAXMAILUSER))
		$FAXMAILUSER		= 'faxmail';
		
	if (!isset($WWWUSER))
		$WWWUSER			= 'apache';
	
	// enable interface to show link for downloading the original TIFF file
	if (!isset($ENABLE_DL_TIFF))
		$ENABLE_DL_TIFF		= false;
	
	if (!isset($SHOW_ALL_CONTACTS))
		$SHOW_ALL_CONTACTS = true;
	
	if (!isset($NUM_PAGES_FOLLOW))
		$NUM_PAGES_FOLLOW = 0;
	
	// Toggle if you want to show the Cover page form in sendfax.php (set: true or false)
	if (!isset($SENDFAX_USE_COVERPAGE))
		$SENDFAX_USE_COVERPAGE = true;
	
	if (!isset($SENDFAX_REQUEUE_EMAIL))
		$SENDFAX_REQUEUE_EMAIL = true;
	
	// if you need to change the document size (in lowercase)
	if (!isset($PAPERSIZE))
		$PAPERSIZE = 'a4';
	
	// Cover Page options
	if (!isset($CPAGE_LINELEN))
		$CPAGE_LINELEN = 80;  // max line length
	
	// if you would like see all faxes that arrive including those routed to an email address, set this to false.
	if (!isset($ARCHIVEFAX2EMAIL))
		$ARCHIVEFAX2EMAIL = true;
	
	if (!isset($ARCHIVE_WIDE))
		$ARCHIVE_WIDE = true;
	
	// Printing support for received faxes, disabled by default
	if (!isset($PRINTFAXRCVD))
		$PRINTFAXRCVD	= false;
	
	if (!isset($PRINTERNAME))
		$PRINTERNAME		= '';					// the name of the print queue
	
	if (!isset($PRINTCMD))
		$PRINTCMD			= '/usr/bin/lpr';
	
	if (!isset($PRINTFAX2PS))
		$PRINTFAX2PS		= '/usr/bin/fax2ps';	// the print command
	
	if (!isset($PRINTFAXCMD))
		$PRINTFAXCMD		= "$PRINTFAX2PS %s | $PRINTCMD %s";	// TIFF file, printer
	
	if (!isset($PDFPRINTCMD))
		$PDFPRINTCMD		= '/usr/bin/lpr';
	
	if (!isset($FAXRCVD_PRINT_PDF))
		$FAXRCVD_PRINT_PDF	= false;
	
	if ($FAXRCVD_PRINT_PDF)
		$PRINTFAXCMD		= "$PRINTCMD %s %s";	// printer, pdffile
	
	if (!isset($COVERPAGE_FILE))
		$COVERPAGE_FILE		= "cover.ps";
	
	if (!isset($HTML2PS))
		$HTML2PS = "/usr/local/bin/html2ps";
	
	if (!isset($USE_HTML_COVERPAGE))
		$USE_HTML_COVERPAGE		= file_exists($HTML2PS);
	
	define('COVERPAGE_MATCH', 'XXXX-');
	
	if (!isset($AVANTFAX_DEBUG))
		$AVANTFAX_DEBUG			= false;
	
	if (!isset($SHOWSERVER_DETAILS))
		$SHOWSERVER_DETAILS		= false;
	
	if (!isset($AVANTFAX_SERVERNAME)) {
		exec("hostname", $hostname);
		$AVANTFAX_SERVERNAME	= (array_key_exists('SERVER_NAME', $_SERVER)) ? $_SERVER['SERVER_NAME'] : implode("", $hostname);
	}
	if (!isset($SYSTEM_EMAIL_SIG_HTML))
		$SYSTEM_EMAIL_SIG_HTML	= "<a href=\"http://www.avantfax.com/\">AvantFAX</a>";
	
	if (!isset($SYSTEM_EMAIL_SIG_TEXT))
		$SYSTEM_EMAIL_SIG_TEXT	= "www.AvantFAX.com";
	
	// SMTP server support for using external mail server (mail server not on this machine)
	if (!defined('USE_SMTPSERVER'))
		define('USE_SMTPSERVER', false);
	
	if (!defined('SMTP_SERVER'))
		define('SMTP_SERVER', 'localhost');
	
	if (!defined('SMTP_PORT'))
		define('SMTP_PORT', 25);
	
	if (!defined('SMTP_AUTH'))
		define('SMTP_AUTH', false);
		
	if (!defined('SMTP_USERNAME'))
		define('SMTP_USERNAME', '');
	
	if (!defined('SMTP_PASSWORD'))
		define('SMTP_PASSWORD', '');
	
	if (!defined('SMTP_LOCALHOST'))
		define('SMTP_LOCALHOST', 'localhost');

	if (!isset($NOTIFY_INCLUDE_PDF))
		$NOTIFY_INCLUDE_PDF		= false;
	
	if (!isset($NOTIFY_ON_SUCCESS))
		$NOTIFY_ON_SUCCESS		= true;
	
	if (!isset($FAXRCVD_INCLUDE_THUMBNAIL))
		$FAXRCVD_INCLUDE_THUMBNAIL = true;
		
	if (!isset($FAXRCVD_INCLUDE_PDF))
		$FAXRCVD_INCLUDE_PDF = true;
		
	if (!isset($ENABLE_DID_ROUTING))
		$ENABLE_DID_ROUTING		= false;
	
	if (!isset($CALLIDn_CIDNumber))
		$CALLIDn_CIDNumber		= 1;
	
	if (!isset($CALLIDn_CIDName))
		$CALLIDn_CIDName		= 2;

	if (!isset($CALLIDn_DIDNum))
		$CALLIDn_DIDNum			= 3;
		
	if (!isset($AUTOCONFDID))
		$AUTOCONFDID			= true;
		
	if (!isset($ALTERNATE_AUTH_ENABLE))
		$ALTERNATE_AUTH_ENABLE	= false;
		
	if (!isset($ALTERNATE_AUTH_FALLBACK))
		$ALTERNATE_AUTH_FALLBACK	= true;
		
	if (!isset($ALTERNATE_AUTH_CLASS))
		$ALTERNATE_AUTH_CLASS	= "PAMAuth";
	
	if (!isset($DEFAULT_FAXES_PER_PAGE_INBOX))
		$DEFAULT_FAXES_PER_PAGE_INBOX = 25;

	if (!isset($DEFAULT_FAXES_PER_PAGE_ARCHIVE))
		$DEFAULT_FAXES_PER_PAGE_ARCHIVE = 30;
	
	if (!defined('ENABLE_BARDECODE_SUPPORT'))
		define('ENABLE_BARDECODE_SUPPORT', false);
	
	if (!defined('BARDECODE_BINARY'))
		define('BARDECODE_BINARY', "/var/spool/hylafax/bin/bardecode");
	
	if (!defined('BARDECODE_COMMAND'))
		define('BARDECODE_COMMAND',	BARDECODE_BINARY." -t any -f %s");
	
	if (!defined('ENABLE_FAX_ANNOTATION'))
		define('ENABLE_FAX_ANNOTATION', false);
	
	if (!defined('ENABLE_OCR_SUPPORT'))
		define('ENABLE_OCR_SUPPORT', false);
	
	if (!defined('OCR_BINARY'))
		define('OCR_BINARY', "/usr/local/bin/tesseract");
	
	if (!defined('OCR_COMMAND'))
		define('OCR_COMMAND', OCR_BINARY." %s %s -l %s");
	
	if (!defined('OCR_LANGUAGE'))
		define('OCR_LANGUAGE', "eng");
	
	if (!defined('EMAIL_ENCODING_TEXT'))
		define('EMAIL_ENCODING_TEXT', "Base64Encoding");

	if (!defined('EMAIL_ENCODING_HTML'))
		define('EMAIL_ENCODING_HTML', "Base64Encoding");
	
	if (!defined('EMAIL_ENCODING_CHARSET'))
		define('EMAIL_ENCODING_CHARSET', "UTF-8");
	
	if (!defined('FAXCOVER_DATE_FORMAT'))
		define('FAXCOVER_DATE_FORMAT', "%d.%m.%Y %H:%M");
	
	if (!defined('EMAIL_DATE_FORMAT'))
		define('EMAIL_DATE_FORMAT', "%d.%m.%Y %H:%M");

	if (!defined('ARCHIVE_DATE_FORMAT'))
		define('ARCHIVE_DATE_FORMAT', "'%d.%m.%Y %H:%i'");
		
	if (!defined('WHITEPAGES'))
		define('WHITEPAGES', 'http://www.whitepages.com/search/ReversePhone?full_phone=');
	
	if (!defined('MAX_USERNAME_SIZE'))
		define('MAX_USERNAME_SIZE',	15);
	
	if (!defined('MAX_PASSWD_SIZE'))
		define('MAX_PASSWD_SIZE',	15);
	
	if (!defined('MIN_PASSWD_SIZE'))
		define('MIN_PASSWD_SIZE',	8);

	if (!defined('MAX_EMAIL_SIZE'))
		define('MAX_EMAIL_SIZE',	99);
	
	if (!defined('HAS_NEGATIVE_TIFF'))
		define('HAS_NEGATIVE_TIFF', false);
	
	/**
	 * errorHandler
	 *
	 * @param string $errno
	 * @param string $errstr
	 * @param string $errfile
	 * @param string $errline
	 * @param array $errcontext
	 * @return false
	 */
	function errorHandler($errno, $errstr, $errfile = NULL, $errline = NULL, array $errcontext = NULL) {
		var_dump(debug_backtrace());
		error_log("$errfile ($errline): $errstr");
		return false;
	}
	
	if ($AVANTFAX_DEBUG) {
		set_error_handler('errorHandler', E_USER_ERROR);
	}
	
	$HAS_MIME_FUNCTION	= function_exists('mime_content_type');
	$HAS_FILEINFO		= extension_loaded('fileinfo');
	
	// Try to dynamically load the fileinfo library
	if (!$HAS_FILEINFO) {
		$HAS_FILEINFO	= @dl('fileinfo.so');
	}
	
	$grep_function	= 'preg_match';
	// USE mbstring function if it is available
	if (extension_loaded('mbstring')) {
		mb_internal_encoding("UTF-8");
		$grep_function	= 'mb_ereg_match';
	}
	
	// AvantFAX directories under INSTALLDIR
	$ARCHIVE		= $INSTALLDIR.DIRECTORY_SEPARATOR.'faxes'.DIRECTORY_SEPARATOR.'recvd';
	$ARCHIVE_SENT	= $INSTALLDIR.DIRECTORY_SEPARATOR.'faxes'.DIRECTORY_SEPARATOR.'sent';
	$TMPDIR			= $INSTALLDIR.DIRECTORY_SEPARATOR.'tmp'.DIRECTORY_SEPARATOR;
	$PHONEBOOK		= $INSTALLDIR.DIRECTORY_SEPARATOR.'pbook.phb'; // phone book for WHFC
	$FAXCOVER		= $INSTALLDIR.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'faxcover.php';
	
	// tiff
	$TIFFCP			= $BINARYDIR.DIRECTORY_SEPARATOR.'tiffcp';
	$TIFFCPG4		= $BINARYDIR.DIRECTORY_SEPARATOR.'tiffcp -c g4';
	$TIFFPS			= $BINARYDIR.DIRECTORY_SEPARATOR.'tiff2ps -2ap';
	$TIFFSPLIT		= $BINARYDIR.DIRECTORY_SEPARATOR.'tiffsplit';
	
	if (!isset($TIFF_TO_G4))
		$TIFF_TO_G4 = false;
	
	// imagemagick
	$CONVERT		= $BINARYDIR.DIRECTORY_SEPARATOR.'convert'; // a source install may put this in /usr/local/bin/
	
	// netpbm
	$PNMSCALE		= $BINARYDIR.DIRECTORY_SEPARATOR.'pnmscale';
	$PNMDEPTH		= $BINARYDIR.DIRECTORY_SEPARATOR.'pnmdepth';
	$PPMTOGIF		= $BINARYDIR.DIRECTORY_SEPARATOR.'ppmtogif';
	$PNMQUANT		= $BINARYDIR.DIRECTORY_SEPARATOR.'pnmquant';
	
	// psresize
	$PSRESIZE		= $BINARYDIR.DIRECTORY_SEPARATOR.'psresize';

	// ghostscript
	if (!isset($DPI))
		$DPI		= 92;
	
	if (!isset($DPIS))
		$DPIS		= 200;
	
	$GS				= $BINARYDIR.DIRECTORY_SEPARATOR.'gs';
	$GSR			= "$GS -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -dCompatibility=1.4 -sPAPERSIZE=$PAPERSIZE";	// tiff2pdf (faxrcvd)
	$GSN			= "$GS -q -dNOPAUSE -sPAPERSIZE=$PAPERSIZE -sDEVICE=pnm -r${DPI}x${DPI}";					// static preview (faxrvd & rotate)
	$GSN2			= "$GS -q -dNOPAUSE -sPAPERSIZE=$PAPERSIZE -sDEVICE=pnm";									// static preview (faxrvd & rotate)
	$GSTIFF			= "$GS -sDEVICE=tiffg4 -r${DPIS}x${DPIS} -dNOPAUSE -sPAPERSIZE=$PAPERSIZE";					// convert2pdf (notify)
	$GSCMD			= "$GS -dCompatibilityLevel=1.4 -dSAFER -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile=%s -sPAPERSIZE=$PAPERSIZE -f %s >/dev/null 2>/dev/null"; // output, input

	if (!defined('ANN_GRAVITY'))
		define('ANN_GRAVITY', "southeast");

	// hylafax
	$FAXINFO		= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'sbin'.DIRECTORY_SEPARATOR.'faxinfo';
	$FAXSTAT		= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'bin'.DIRECTORY_SEPARATOR.'faxstat -s';
	$FAXADDUSER		= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'sbin'.DIRECTORY_SEPARATOR.'faxadduser';
	$FAXDELUSER		= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'sbin'.DIRECTORY_SEPARATOR.'faxdeluser';
	$FAXGETTY		= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'sbin'.DIRECTORY_SEPARATOR.'faxgetty';
	$SENDFAX		= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'bin'.DIRECTORY_SEPARATOR.'sendfax';
	$FAXRM			= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'bin'.DIRECTORY_SEPARATOR.'faxrm';
	$FAXALTER		= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'bin'.DIRECTORY_SEPARATOR.'faxalter';
	
	$FAXSENDQ		= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'bin'.DIRECTORY_SEPARATOR.'faxstat -s';
	$FAXDONEQ		= $HYLAFAX_PREFIX.DIRECTORY_SEPARATOR.'bin'.DIRECTORY_SEPARATOR.'faxstat -d';
	
	// sudo
	$SUDO			= $BINARYDIR.DIRECTORY_SEPARATOR.'sudo';
	
	$SYSTEM_IP		= (array_key_exists('SERVER_ADDR', $_SERVER)) ? $_SERVER['SERVER_ADDR'] : $AVANTFAX_SERVERNAME;
	
	$RESERVED_FAX_NUM = 'XXXXXXX';

	define('THUMBNAIL',		'thumb.gif');
	define('NOTHUMB',		'images/nothumb.gif');
	define('PDFNAME',		'fax.pdf');
	define('TIFFNAME',		'fax.tif');
	define('PREVIMG',		'prev');
	define('PREVIMGSFX',	'.gif');
	
	define('CONTACTFILETYPES',	"vCard (.vcf)");
	define('SENDFAXFILETYPES',	"PostScript (.ps), PDF (.pdf), TIFF (.tif), Text (.txt)");
	
	if (!defined('PREV_TN'))
		define('PREV_TN', 80);		// thumbnail
	
	if(!defined('PREV_SP'))
		define('PREV_SP', 750);		// static preview
	
	$NOTHUMBIMG = $INSTALLDIR.DIRECTORY_SEPARATOR.NOTHUMB;
	
	if ($ENABLE_DID_ROUTING) $AVANTFAX_VERSION .= '&dagger;';
	
	require_once 'functions.php';					// include the system wide functions file
	
	// used in sendfax and refax
	$upload_sizes	= get_max_fileupload();
	$SF_FILESIZE	= $upload_sizes['max'];
	$SF_MAXSIZE		= $upload_sizes['abbrev'];
	
	require_once "langs/$dft_config_lang.php";		// require the default language file
