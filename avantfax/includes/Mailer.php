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
 * CLASS: Mailer
	METHODS:
		public function __construct()
		public function sendmail($to)
		public function attachFile($file, $altname = NULL)
		public function embeddImage($image)
		public function setMessage($text)
 */

/**
 * Mailer class
 *
 */
class Mailer extends htmlMimeMail5
{
	/**
	 * __construct
	 *
	 * @return void
	 * @access public
	 */
	public function __construct() {
		parent::__construct();
		
		$this->setFrom('AvantFAX <'.ADMIN_EMAIL.'>');
		$this->setReturnPath(ADMIN_EMAIL);
	
		if (USE_SMTPSERVER) {
			$this->setSMTPParams(SMTP_SERVER, SMTP_PORT, SMTP_LOCALHOST, SMTP_AUTH, SMTP_USERNAME, SMTP_PASSWORD);
		}
		
		switch (EMAIL_ENCODING_TEXT) {
			case 'SevenBitEncoding':	$this->setTextEncoding(new SevenBitEncoding); break;
			case 'QPrintEncoding':		$this->setTextEncoding(new QPrintEncoding); break;
			case 'Base64Encoding':		$this->setTextEncoding(new Base64Encoding); break;
		}
		
		switch (EMAIL_ENCODING_HTML) {
			case 'SevenBitEncoding':	$this->setHTMLEncoding(new SevenBitEncoding); break;
			case 'QPrintEncoding':		$this->setHTMLEncoding(new QPrintEncoding); break;
			case 'Base64Encoding':		$this->setHTMLEncoding(new Base64Encoding); break;
		}
		
		$this->setTextCharset(EMAIL_ENCODING_CHARSET);
		$this->setHTMLCharset(EMAIL_ENCODING_CHARSET);
		$this->setHeadCharset(EMAIL_ENCODING_CHARSET);
	}
	
	/**
	 * sendmail
	 *
	 * @param mixed $to
	 * @return bool
	 * @access public
	 */
	public function sendmail($to) {
		return $this->send($to, (USE_SMTPSERVER) ? 'smtp' : 'mail');
	}
	
	/**
	 * attachFile
	 *
	 * @param string $file
	 * @param string $altname
	 * @return void
	 * @access public
	 */
	public function attachFile($file, $altname = NULL) {
		if ($file)
			$this->addAttachment(new fileAttachment($file, get_filetype($file), $altname));
	}
	
	/**
	 * embeddImage
	 *
	 * @param string $image
	 * @return void
	 * @access public
	 */
	public function embeddImage($image) {
		if ($image)
			$this->addEmbeddedImage(new fileEmbeddedImage($image, get_filetype($image), basename($image), new Base64Encoding()));
	}
	
	/**
	 * setMessage
	 *
	 * @param string $text
	 * @return void
	 * @access public
	 */
	public function setMessage($text) {
		global $SYSTEM_EMAIL_SIG_HTML, $SYSTEM_EMAIL_SIG_TEXT;
	
		$converted = str_replace("\n", "<br />", $text);
		$html = "<html><body>$converted<br /><br />$SYSTEM_EMAIL_SIG_HTML</body></html>";
		
		$text = "$text\n\n\n\n$SYSTEM_EMAIL_SIG_TEXT";
		
		$this->setText(html_entity_decode($text, ENT_QUOTES, "UTF-8"));
		$this->setHtml($html);
		$this->rebuild();
	}
	
	/**
	 * getError
	 *
	 * @return mixed
	 * @access public
	 */
	public function getError() {
		return $this->errors;
	}
}
