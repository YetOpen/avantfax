/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 * PHP 5 only
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

/**
 * highlightrow - highlights rows assigned with the "highlight" class
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
 * init - executes various functions upon window load
 *
 * @return void
 */
function init () {
	highlightrow ();
}

window.onload = init;
