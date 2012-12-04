/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

var currentDialog	= 0;
var mainBtnID		= 'mainbtn';

/**
 * dialogWindow
 */
function dialogWindow(htmlContent) {
	var newDIV	= createDivID();
	var content	= Builder.node('div', {'align': 'center'});
	content.innerHTML = htmlContent;
	
	document.getElementsByTagName("body")[0].appendChild(buildDialog(newDIV, content));
	
	Effect.Appear(newDIV, { duration:0.2 }); // set visibility containerDIV to true
	new Draggable(newDIV);
}

/**
 * closeDialog
 */
function closeDialog() {
	var del;
	
	if (del = $(currentDialog)) {
		Effect.Fade(currentDialog, { duration:0.2 });
		del.parentNode.removeChild(del);
	}
}

/**
 * createDivID
 */
function createDivID() {
	var divID = 'dialog'+Math.floor(Math.random()*1000);
	
	if (currentDialog)
		closeDialog (currentDialog);
	
	currentDialog = divID;
	
	return divID;
}

/**
 * buildDialog
 */
function buildDialog(divID, node) {
	var lastDiv = Builder.node('div',{className:'otr'});
	
	lastDiv.appendChild(node);
	
	var element = Builder.node('div',{className:'outer-dialogcontainer', id: divID},
		Builder.node('div',{className:'inner-dialogcontainer'},
			Builder.node('div',{className:'dialog-container'},
				Builder.node('div',{className:'ot50'},
					Builder.node('div',{className:'ob'},
						Builder.node('div',{className:'ol'},
							Builder.node('div',{className:'or'},
								Builder.node('div',{className:'obl'},
									Builder.node('div',{className:'obr'},
										Builder.node('div',{className:'otl'},
											lastDiv
										)
									)
								)
							)
						)
					)
				)
			)
		)
	);
	
	$(element).hide();
	return element;
}

/**
 * setFocusButton
 */
function setFocusButton() {
	$(mainBtnID).focus();
}

/**
 * getFormInputs
 */
function getFormInputs(formID) {
	var postdata = "";
	
	for (var i = 0; i < $(formID).length; i++) {
		if (!$(formID).elements[i].name) continue;
		
		if (i > 0) postdata += "&";
		postdata += $(formID).elements[i].name + '=' + encodeURI ($(formID).elements[i].value);
	}
	
	return postdata;
}

/**
 * submitAJAXForm
 */
function submitAJAXForm(formURL, formID) {
	$(mainBtnID).onclick	= function () {
		var postdata = getFormInputs (formID);
		var myXHR = new XHRObject (formURL, function (response) {
			if (response) {
				dialogWindow (response);
				setTimeout ('setFocusButton ()', 100);
			} else {
				closeDialog();
			}
		}, function (error) {}, false, 'POST', postdata);
		return false;
	}
}

/**
 * dialogDeleteFax
 */
function dialogDeleteFax(fid, nextfid) {
	var url			= 'ajax/delete.php?fid='+fid+'&nextfid='+nextfid;
	
	var myXHR		= new XHRObject (url, function (htmlData) {
		dialogWindow (htmlData);
		setTimeout ('setFocusButton ()', 100);
		removeFaxDIV (fid, nextfid);
	}, function (error) {}, false, 'GET', null);
}

/**
 * archiveFax
 */
function archiveFax(fid, nextfid) {
	var divID		= "faxid_"+fid;
	var url			= 'ajax/archivefax.php?fid='+fid;
	var myXHR		= new XHRObject (url, function (htmlData) {
		if (nextfid == 0) {		// make div disappear
			Effect.Fade(divID, { duration:0.2 });
			decFaxCount ();
		}
		
		if (nextfid == -1) {
			window.location.href = 'inbox.php';
		}
		
		if (nextfid >= 1) {
			window.location.href = 'viewfax.php?fid='+nextfid;
		}
	}, function (error) {}, false, 'GET', null);
}

/**
 * removeFaxDIV
 */
function removeFaxDIV(fid, nextfid) {
	var url		= 'ajax/delete.php';
	var divID	= "faxid_"+fid;
	
	// onclick submit_btn, perform login
	$(mainBtnID).onclick	= function () {
		var postdata = getFormInputs ('delete_fax');
		var myXHR = new XHRObject (url, function (response) {
			closeDialog();
			
			if (nextfid == 0) {		// make div disappear
				Effect.Fade(divID, { duration:0.2 });
				decFaxCount ();
			}
			
			if (nextfid == -1) {
				window.location.href = 'inbox.php';
			}
			
			if (nextfid >= 1) {
				window.location.href = 'viewfax.php?fid='+nextfid;
			}
		}, function (error) {}, false, 'POST', postdata);
		return false;
	}
}

/**
 * getSelectedFaxIDs - NEW
 */
function getSelectedFaxIDs() {
	var fids	= Array();
	var checks	= document.getElementsByTagName('input');
	var regex	= new RegExp(/checkbox/);
	
	for (i = 0; i < checks.length; i++) {
		if (checks[i].type.match(regex)) {
			if (checks[i].checked == true) {
				var j = fids.length;
				fids[j] = checks[i].getAttribute('value');
			}
		}
	}

	return fids;
}

/**
 * dialogDeleteFaxes - NEW
 */
function dialogDeleteSelectedFaxes() {
	var fids		= getSelectedFaxIDs();
	
	if (fids == '') return false;
	
	var listfids	= serialize_array('fids', fids);
	var url			= 'ajax/ajaxdeletefaxes.php?fids='+listfids;
	
	var myXHR		= new XHRObject (url, function (htmlData) {
		dialogWindow (htmlData);
		setTimeout ('setFocusButton ()', 100);
		
		var formURL	= 'ajax/ajaxdeletefaxes.php';
		var formID	= 'deleteselectedfaxes';
		
		$(mainBtnID).onclick	= function () {
			var postdata = getFormInputs (formID);
			var myXHR2 = new XHRObject (formURL, function (response) {
				window.location.href = 'inbox.php';
			}, function (error) {}, false, 'POST', postdata);
			return false;
		}
		
	}, function (error) {}, false, 'GET', null);
}

/**
 * archiveSelectedFaxes - NEW
 */
function archiveSelectedFaxes() {
	var fids		= getSelectedFaxIDs();
	
	if (fids == '') return false;
	
	var listfids	= serialize_array('fids', fids);
	var url			= 'ajax/ajaxarchivefax.php?fids='+listfids;
	var myXHR		= new XHRObject (url, function (htmlData) {
		window.location.href = 'inbox.php';
	}, function (error) {}, false, 'GET', null);
}


/**
 * dialogNote
 */
function dialogNote(fid) {
	var url			= 'ajax/set_note.php?fid='+fid;
	
	var myXHR		= new XHRObject (url, function (htmlData) {
		dialogWindow (htmlData);
		submitAJAXForm ('ajax/set_note.php', 'set_note');
	}, function (error) {}, false, 'GET', null);
}

/**
 * dialogFaxAlter
 */
function dialogFaxAlter(jid, resubmit, owner) {
	var url			= 'ajax/faxalter.php?jid='+jid+'&r='+resubmit+'&owner='+owner;
	
	var myXHR		= new XHRObject (url, function (htmlData) {
		dialogWindow (htmlData);
		setTimeout ('setFocusButton ()', 100);
		submitAJAXForm ('ajax/faxalter.php', 'faxalter');
	}, function (error) {}, false, 'GET', null);
}

// .disabled = true;