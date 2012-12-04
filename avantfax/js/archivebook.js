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
 * CompanyList
 *
 * @param object selectObj
 * @param object queryObj
 * @param object index ('cid', 'fnid', 'faxnum')
 * @return new class
 */
function CompanyList (selectObj, queryObj, index) {
	var reqURL	= 'ajax/archivebook.php?q=';
	var drvObj	= $(queryObj);
	var vObj	= $(selectObj);
	var selectedValue = null;
	var showAll	= false;
	
	if (!index) index = 'cid';
	
	this.setSelected = function (value) {
		selectedValue = value;
	}
	
	this.allcontacts = function (value) {
		showAll = value;	
	}

	this.query = function () {
		if (drvObj.value || showAll) {
			var url = reqURL + drvObj.value + "&randid=" + Math.random();
			 // (url, onReady, onError, wantXML, rmethod, sendData)
			var myXHR = new XHRObject (url, this.procResponse, this.procError, true, 'GET', null);
		}
		return true;
	}

	this.procError = function (error) {
//		alert ("Error: " + error);
	}

	this.procResponse = function (xmldoc) {
		// process data
		var len = xmldoc.getElementsByTagName('cid').length;
		
		vObj.options.length = len;
		
		for (var i = 0; i < len; i++) {
			var val = xmldoc.getElementsByTagName(index)[i].firstChild.data;
			vObj.options[i].text = xmldoc.getElementsByTagName('company')[i].firstChild.data;
			vObj.options[i].value = val;
			vObj.options[i].defaultSelected = true;
			vObj.options[i].selected = (val == selectedValue) ? true : false;
		}
	}
}
