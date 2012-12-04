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
 * EmailList - 
 *
 * @param object selectObj
 * @param object queryObj
 * @return new class
 */
function EmailList (selectObj, queryObj) {
	var reqURL			= 'ajax/ajaxemailbook.php?q=';
	var drvObj			= $(queryObj);
	var vObj			= $(selectObj);
	var selectedValue	= null;
		
	this.setSelected = function (value) {
		selectedValue = value;
	}

	this.query = function () {
		var url = reqURL + drvObj.value + "&randid=" + Math.random();
		 // (url, onReady, onError, wantXML, rmethod, sendData)
		var myXHR = new XHRObject (url, this.procResponse, function (error) {}, true, 'GET', null);
		return true;
	}
		
	this.procResponse = function (xmldoc) {
		// process data
		var len = xmldoc.getElementsByTagName('email').length;
		
		vObj.options.length = len;
		
		for (var i = 0; i < len; i++) {
			var val = xmldoc.getElementsByTagName('email')[i].firstChild.data;
			
			vObj.options[i].text	= val.unescapeHTML();
			vObj.options[i].value	= val.unescapeHTML();
			vObj.options[i].defaultSelected = true;
			vObj.options[i].selected = (val == selectedValue) ? true : false;
		}
	}
}

/**
 * EmailListID
 *
 * @param object selectObj
 * @param object queryObj
 * @return new class
 */
function EmailListID (selectObj, queryObj) {
	var reqURL			= 'ajax/ajaxemailbook.php?q=';
	var drvObj			= $(queryObj);
	var vObj			= $(selectObj);
	var selectedValue	= null;
		
	this.setSelected = function (value) {
		selectedValue = value;
	}

	this.query = function () {
		var url = reqURL + drvObj.value + "&randid=" + Math.random();
		 // (url, onReady, onError, wantXML, rmethod, sendData)
		var myXHR = new XHRObject (url, this.procResponse, function (error) {}, true, 'GET', null);
		return true;
	}
	
	this.procResponse = function (xmldoc) {
		// process data
		var len = xmldoc.getElementsByTagName('email').length;
		
		vObj.options.length = len;
		
		for (var i = 0; i < len; i++) {
			var val = xmldoc.getElementsByTagName('email')[i].firstChild.data;
			
			vObj.options[i].text	= val.unescapeHTML();
			vObj.options[i].value	= xmldoc.getElementsByTagName('id')[i].firstChild.data;
			vObj.options[i].defaultSelected = true;
			vObj.options[i].selected = (val == selectedValue) ? true : false;
		}
	}
}

/**
 * addEmail - adds email addresses from a select list to the emails text area in email.php
 *
 * @return void
 */
function addEmail (fieldname) {
	var xwin		= window.opener;
	var text		= xwin.$(fieldname).value;
	var xselect		= $('abookemail_id');
	var len			= xselect.options.length;
	var ntext		= '';
	var value		= null;
	
	for (var i = len-1; i >= 0; i--) {
		if (xselect.options[i].selected) {
			if (ntext) {
				ntext = xselect.options[i].value + ';' + ntext;
			} else {
				ntext = xselect.options[i].value;
			}
			xselect.remove(i);
		}
	}

	xwin.$(fieldname).value = ntext + ';' + text;
}
