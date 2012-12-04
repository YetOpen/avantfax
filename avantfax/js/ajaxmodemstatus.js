/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

var listmodems;
var checkModemTimeout = 20; // 20 seconds

/**
 * init_check_modems
 *
 */
function init_check_modems () {
	var modems	= Array();
	var spans	= document.getElementsByTagName('span');
	
	for (var i = 0; i < spans.length; i++) {
		if (spans[i].className.match(/modem-status/)) {
			var j = modems.length;
			modems[j] = spans[i].getAttribute('id');
		}
	}
	
	listmodems = serialize_array('modems', modems);
	
	// sleep and call check_modem_status
	run_check_modem();
}

/**
 * run_check_modem
 *
 */
function run_check_modem () {
	check_modem_status();
	setTimeout('run_check_modem()', checkModemTimeout*1000);
}

/**
 * check_modem_status
 *
 */
function check_modem_status () {
	var url		= 'ajax/ajaxmodemstatus.php?randid=' + Math.random() + '&modems=' + listmodems;
	
	// (url, onReady, onError, wantXML, rmethod, sendData)
	var myXHR	= new XHRObject (url, function (xmldoc) {
			// process data
			var len = xmldoc.getElementsByTagName('modem').length;
			
			for (var i = 0; i < len; i++) {
				var modem	= xmldoc.getElementsByTagName('modem')[i].firstChild.data;
				var css		= xmldoc.getElementsByTagName('class')[i].firstChild.data;
				var status	= xmldoc.getElementsByTagName('status')[i].firstChild.data;
				
				$(modem).innerHTML = "[<span class=\""+css+"\">"+status+"</span>]";
			}
		}
		, function (error) {}, true, 'GET', null);
}

addLoadEvent (init_check_modems);