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
 * addContact
 *
 * @return void
 */

function addContact() {
	var xwin	= window.opener;
	var text	= xwin.$('dest').value;
	
	var xselect = $('myselect');
	var len		= xselect.options.length;

	var ntext	= '';
	var value	= null;
	var save_val= null;
	
	for (var i = len-1; i >= 0; i--) {
		if (xselect.options[i].selected) {
			if (ntext) {
				value = xselect.options[i].value.split ('|');
				ntext = value[1] + '; ' + ntext;
				
				if (!save_val)  save_val = value[0];
			} else {
				value = xselect.options[i].value.split ('|');
				ntext = value[1];
				
				if (!save_val)  save_val = value[0];
			}
			xselect.remove(i);
		}
	}

	xwin.$('dest').value = ntext + '; ' + text;
	
	// lookup to_company, to_person, to_location, to_voicenumber and prefill form
	preFillTo (xwin, save_val);
}

/**
 * addSingleContact
 *
 * @return void
 */
function addSingleContact() {
	var xwin	= window.opener;
	var text	= xwin.$('dest').value;
	
	var xselect = $('myselect');
	var ntext	= '';
	
	value = xselect.options[xselect.selectedIndex].value.split ('|');
	xwin.$('dest').value = value[1];
}

/**
 * preFillTo
 *
 * @param window xwin
 * @param integer fnid
 * @return void
 */
function preFillTo (xwin, fnid) {
	var url		= 'ajax/ajaxprefillto.php?fnid=' + fnid;
	var myXHR	= new XHRObject (url, function (xmldoc) {
		xwin.$('to_person').value		= xmldoc.getElementsByTagName('to_person')[0].firstChild.data;
		xwin.$('to_company').value 		= xmldoc.getElementsByTagName('to_company')[0].firstChild.data;
		xwin.$('to_location').value		= xmldoc.getElementsByTagName('to_location')[0].firstChild.data;
		xwin.$('to_voicenumber').value	= xmldoc.getElementsByTagName('to_voicenumber')[0].firstChild.data;
	}, function (error) {}, true, 'GET', null);
}
