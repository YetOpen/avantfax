/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

/**
 * addContact - add contacts to sendfax/refax destinations text area
 *
 * @return void
 */
function addContact() {
	var xwin	= window.opener;
	var reqURL	= 'ajax/ajaxdlist.php?dl_id=';
	var text	= xwin.$('dest').value;
	
	var dl_id	= $('dl_id').value;
	
	var url		= reqURL + dl_id + '&randid=' + Math.random();
	var myXHR	= new XHRObject (url, function (html) {
		xwin.$('dest').value = html + '; ' + text;
	}, function (error) {}, false, 'GET', null);
}
