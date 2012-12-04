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
 * @param string index ('cid', 'fnid', 'faxnum', 'mix' (fnid|faxnum))
 * @return new class
 */
function CompanyList (selectObj, queryObj, index) {
	var reqURL	= 'ajax/ajaxbook.php?q=';
	var drvObj	= $(queryObj);
	var vObj	= $(selectObj);
	var selectedValue = null;
	var showAll	= false;
	
	if (!index) index = 'cid';
	
	var nindex = (index == 'mix') ? 'faxnum' : index;
	
	this.setSelected = function (value) {
		selectedValue = value;
	}
	
	this.allcontacts = function (value) {
		showAll = value;	
	}
	
	this.query = function () {
		if (drvObj.value || showAll) {
			var url = reqURL + drvObj.value + "&randid=" + Math.random();
			var myXHR = new XHRObject (url, this.procResponse, function (error) {}, true, 'GET', null);
		}
		return true;
	}
	
	this.procResponse = function (xmldoc) {
		var len = xmldoc.getElementsByTagName('cid').length;
		
		vObj.options.length = len;
		
		for (var i = 0; i < len; i++) {
			var val = xmldoc.getElementsByTagName(nindex)[i].firstChild.data;
			var fnid = xmldoc.getElementsByTagName('fnid')[i].firstChild.data;
			vObj.options[i].text = xmldoc.getElementsByTagName('company')[i].firstChild.data;
			vObj.options[i].value = (index == 'mix') ? fnid + '|' + val : val;
			vObj.options[i].defaultSelected = true;
			vObj.options[i].selected = (val == selectedValue) ? true : false;
		}
	}
}
