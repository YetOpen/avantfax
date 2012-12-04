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
 * XHRObject
 *
 * @param string url
 * @param function onReady
 * @param function onError
 * @param bool wantXML
 * @param function rmethod
 * @param mixed sendData
 * @return new class
 */
function XHRObject (url, onReady, onError, wantXML, rmethod, sendData) {
	var http_request = false;

	if (window.XMLHttpRequest) { // Mozilla, Safari,...
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType) {
			if (wantXML == true) {
				http_request.overrideMimeType('text/xml');
			} else {
				http_request.overrideMimeType('text/html');
			}
		}
	} else if (window.ActiveXObject) { // IE
		try {
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}

	if (!http_request) {
		onError ('Cannot create an XMLHTTP instance');
		return false;
	}
	
	http_request.onreadystatechange = function () {
		try {
			if (http_request.readyState == 4) {
				if (http_request.status == 200) {
					var response = (wantXML == true) ? http_request.responseXML : http_request.responseText;
					onReady (response);
				} else {
					onError (http_request.statusText);
				}
			}
		} catch( e ) {
			onError (e.description);
		}
	};
	
	if (rmethod == 'POST') {
		http_request.open('POST', url, true);
		http_request.setRequestHeader ('Content-Type', 'application/x-www-form-urlencoded');
//		http_request.setRequestHeader ('Content-length', sendData.length);
		http_request.setRequestHeader ('Connection', 'close');
		http_request.send(sendData);
	} else {
		http_request.open('GET', url, true);
		http_request.send(sendData);
	}
}
