/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

var _arVersion	= navigator.appVersion.split("MSIE");
var _bVersion	= parseFloat(_arVersion[1]);
var is_IE		= ((_bVersion >= 5.5) && (_bVersion <= 7)) ? true : false;

var newwindow;

/**
 * close_window
 *
 * @param integer seconds
 * @return void
 */
function close_window (seconds) {
	var s = (seconds != undefined) ? seconds * 1000 : 3000;

	setTimeout('window.close()', s);
}

/**
 * changeDisplayedFax
 *
 * @param string imagepath
 * @param string page
 * @param integer pagenum
 * @return void
 */

var divs_to_fade	= new Array('viewimagediv1', 'viewimagediv2');
var imgs_to_fade	= new Array('viewimage1', 'viewimage2');
var imgs_counter	= 0;
var page_text;
var faximageArr;

function changeDisplayedFax (imgpath, pagenum) {
	var i		= imgs_counter+1;
	if (i == 2)
		i = 0;
	
	var vimage	= $(imgs_to_fade[i]);
	
	// change image and title
	vimage.setAttribute ('src',		imgpath);
	vimage.setAttribute ('title',	page_text + ' ' + pagenum);
	
	new Effect.Highlight ('thumb_'+pagenum, { startcolor:'#FF9933' });

	if (is_IE) {
		Effect.Fade(divs_to_fade[imgs_counter], { duration:0.7 }); // , from:1.0, to:0.0
		imgs_counter++;
		if (imgs_counter == 2) imgs_counter = 0;
		Effect.Appear(divs_to_fade[imgs_counter], { delay: 0.2,  duration:0.7 }); // , duration:1, from:0.0, to:1.0
	} else {	
		Effect.Fade(divs_to_fade[imgs_counter], { duration:0.7 }); // , from:1.0, to:0.0
		imgs_counter++;
		if (imgs_counter == 2) imgs_counter = 0;
		Effect.Appear(divs_to_fade[imgs_counter], { delay: 0.2,  duration:0.7 }); // , duration:1, from:0.0, to:1.0
	}
}

/**
 * showDisplayedFax
 *
 * @return void
 */
function showDisplayedFax (id, page, imagesArr) {
	page_text	= page;
	faximageArr	= imagesArr;
	Effect.Appear(id, { duration:0.5 });
}

/**
 * showNextImage
 *
 * @return void
 */
function showNextImage () {
	if (is_IE) {
		return;
	}
	
	// find current path loaded in page
	var path	= $(imgs_to_fade[imgs_counter]).getAttribute('src');
	var found	= false;
	var nextimg	= null;
	
	// get next image
	var len = faximageArr.length;
	for (var i = 0; i < len; i++) {
		if (found == true) {
			nextimg = faximageArr[i];
			break;
		}
		
		if (path == faximageArr[i]) {
			found = true;
		}
	}
	
	// show it in browser
	if (nextimg != null) {
		changeDisplayedFax (nextimg, i+1);
	} else {
		changeDisplayedFax (faximageArr[0], 1);
	}
}

/**
 * serialize_array
 *
 * @param string arrName
 * @param array arrData
 * @return string
 */
function serialize_array (arrName, arrData) {
	var len		= arrData.length;
	var retval	= '';
	
	for (var i =0; i < len; i++) {
		if (i > 0) retval += ',';
		retval += escape (arrData[i]);
	}
	return retval;
}

/**
 * mkwin
 *
 * @param string url
 * @return void
 */
function mkwin (url) {
	newwindow = window.open(url,'assoc','height=230,width=550,resizable=yes');
	if (window.focus) {
		newwindow.focus();
	}
}

/**
 * mknoteswin
 *
 * @param string url
 * @return void
 */
function mknoteswin (url) {
	newwindow = window.open(url,'notes','height=210,width=500,resizable=yes');
	if (window.focus) {
		newwindow.focus();
	}
}

/**
 * mkpdfwin
 *
 * @param string url
 * @return void
 */
function mkpdfwin (url) {
	newwindow = window.open(url,'_blank','height=600,width=800,resizable=yes');
	if (window.focus) {
		newwindow.focus();
	}
}

/**
 * newfax
 *
 * @return void
 */
function newfax () {
	alert ('New FAX');
}

/**
 * preloadImg
 *
 * @param string img
 * @return void
 */
function preloadImg (img) {
	var preload	= new Image();
	preload.src	= img;
}

/**
 * imageRoll
 *
 * @return void
 */
function imageRoll () {
	var images	= document.getElementsByTagName('img');
	var regex	= new RegExp(/imgRoll (\S+)/);
	
	for (i = 0; i < images.length; i++) {
		if (images[i].className.match(regex)) {
			images[i].setAttribute('osrc', images[i].getAttribute('src'));
			preloadImg (images[i].className.match(regex)[1]);
			images[i].onmouseout	= function () {	this.setAttribute('src', this.getAttribute('osrc')); }
			images[i].onmouseover	= function () {	this.setAttribute('src', this.className.match(regex)[1]); }
		}
	}
}

/**
 * previewImage
 *
 * @return void
 */
function previewImage () {
	var rowArr		= document.getElementsByTagName('tr');
	var previewDIV	= $('faxpreview');
	var regex		= new RegExp(/previewimg/);
	
	for (i = 0; i < rowArr.length; i++) {
		if (rowArr[i].className.match(regex)) {
			rowArr[i].onmouseover = function () {
				if (this.getAttribute('name') == 'images/nothumb.gif') {
					previewDIV.innerHTML = "<img src=\""+this.getAttribute('name')+"\" alt=\"no preview image\" />";
				} else {
					previewDIV.innerHTML = "<img src=\"file.php?file="+this.getAttribute('name')+"\" alt=\"\" />";
				}
				previewDIV.style.display = "block";
				this.style.background = "#FFF0B6";
			}
			
			rowArr[i].onmouseout = function () {
				previewDIV.style.display = "none";
				this.style.background = "#FFFFFF";
			}
			
			rowArr[i].onmousemove = function (e) {
				var curleft = curtop = 0;
				var obj = this;
				
				if (obj.offsetParent) {
					curleft = obj.offsetLeft;
					curtop = obj.offsetTop;
					while (obj = obj.offsetParent) {
						curleft += obj.offsetLeft;
						curtop += obj.offsetTop;
					}
				}
				curleft -= 110; // orig
				
//				if (is_IE) {
//					tempX = event.clientX;
//					tempY = event.clientY;
//				} else {
//					tempX = obj.pageX;
//					tempY = obj.pageY;	
//				}
//				
//				leftPos = obj.offsetLeft;
//				topPos = obj.offsetTop;
				
//				window.status = "Mouse X: " + tempX + "; Mouse Y: " + tempY + "; LeftPos: " + leftPos + "; TopPos: " + topPos;
				
//				$('regexp').value = document.body.scrollHeight + ' ' + curtop;
				
				// check if Top is low as the bottom
				if ((document.body.scrollHeight - curtop) < 130) {
					curtop = document.body.scrollHeight - 140;
				}
				
//				$('regexp').value += ' -> '+ curtop;
				
				previewDIV.style.top = curtop + 'px';
				previewDIV.style.left = curleft + 'px';
			}
		}
	}
}

/**
 * highlightrow
 *
 * @return void
 */
function highlightrow () {
	var rowArr	= document.getElementsByTagName('tr');
	var regex	= new RegExp(/highlight/);
	
	for (i = 0; i < rowArr.length; i++) {
		if (rowArr[i].className.match(regex)) {
			rowArr[i].onmouseover = function () {
				this.style.background = "#FFF0B6";
			}
			
			rowArr[i].onmouseout = function () {
				this.style.background = "#FFFFFF";
			}
		}
	}
}

/**
 * decFaxCount
 *
 */
function decFaxCount () {
	if ($('inboxcount')) {
		var count = parseInt ($('inboxcount').innerHTML);
		count--;
		$('inboxcount').innerHTML = count;
	}
}

/**
 * selectAllFaxes
 *
 * @return void
 */
var allChecked = false;

function selectAllFaxes() {
	var checks	= document.getElementsByTagName('input');
	var regex	= new RegExp(/checkbox/);
	
	if (allChecked == false) {
		allChecked = true;
	} else {
		allChecked = false;
	}
	
	for (i = 0; i < checks.length; i++) {
		if (checks[i].type.match(regex)) {
			checks[i].checked = allChecked;
		}
	}
}

/**
 * checkInbox
 *
 * @param integer currentCnt
 * @param bool useAlert
 * @return void
 */
 
var checkInboxTimeout = 30;
var currentInboxCnt;
var InboxTakeFocus = false;
var InboxDoPopupNewFax = false;

function checkInbox (currentCnt) {
	currentInboxCnt = currentCnt;
	performInboxCheck();
}

/**
 * performInboxCheck
 *
 */
function performInboxCheck () {
	var reqURL	= 'ajax/ajaxinbox.php';
	var url		= reqURL + '?randid=' + Math.random();
	var myXHR	= new XHRObject (url, function (htmlData) {
		// process data
		if (htmlData != currentInboxCnt) {
			if (htmlData > currentInboxCnt && InboxTakeFocus) {
				window.focus ();
			}
			
			if (htmlData > currentInboxCnt && InboxDoPopupNewFax) {
				alert ('New FAX');
			}
			window.location.reload();
		}
	}, function (error) {}, false, 'GET', null); // (url, onReady, onError, wantXML, rmethod, sendData)
	
	setTimeout('performInboxCheck ()', checkInboxTimeout*1000);
}

/**
 * addLoadEvent
 *
 * @return void
 */
function addLoadEvent (func) {
	var oldonload = window.onload;
	
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			oldonload();
			func();
		}
	}
}

/**
 * gotoInbox
 *
 * @return void
 */
function gotoInbox () {
	window.location.href = "inbox.php";	
}


// onLoad Events
addLoadEvent (imageRoll);
addLoadEvent (previewImage);
addLoadEvent (highlightrow);
