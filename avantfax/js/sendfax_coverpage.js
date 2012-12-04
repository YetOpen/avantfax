/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

function chgtx () {
	 if (window.ActiveXObject) return;

	$('coverpagediv').style.display = ($('coverpagediv').style.display == "none") ? "block" : "none";
}

function toggle_box () {
	if ($('coverpagediv').style.display == "block") {
		$('coverpagediv').style.display = "none";
		$('cp_switch').checked = false;
	} else {
		$('coverpagediv').style.display = "block";
		$('cp_switch').checked = true;
	}
}

function init_box (val) {
	if (val) {
		$('coverpagediv').style.display ="block";
		$('cp_switch').checked = true;
	} else {
		$('coverpagediv').style.display ="none";
	}
}
