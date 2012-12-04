<?php
/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 * PHP 5 only
 *
 * @author		David D. Mimms, Jr. <david@avantfax.com>
 * @copyright		2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright		2007 iFAX Solutions, Inc.
 * @license 		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

	require_once 'check_login.php';
	
	$rentry			= new AFFaxNum;
	$create			= false;
	$message		= NULL;
	$error			= NULL;
	$faxnumbers = array();
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('company');
	$formdata->newRule('cid', array_key_exists('cid', $_REQUEST) ? $_REQUEST['cid'] : NULL, FR_NUMBER);
	$formdata->newRule('fax', NULL, FR_ARRAY);
	$formdata->newRule('desc', NULL, FR_ARRAY);
	$formdata->newRule('faxnumid', NULL, FR_ARRAY);
	$formdata->newRule('faxcatid', NULL, FR_ARRAY);	
	$formdata->newRule('to_person', NULL, FR_ARRAY);
	$formdata->newRule('to_location', NULL, FR_ARRAY);
	$formdata->newRule('to_voicenumber', NULL, FR_ARRAY);
	$formdata->newRule('new_faxnum');
	$formdata->newRule('new_desc');
	$formdata->newRule('newfaxcatid');
	$formdata->newRule('new_to_person');
	$formdata->newRule('new_to_location');
	$formdata->newRule('new_to_voicenumber');
	
	$formdata->newRule('delete');
	$formdata->newRule('create');
	$formdata->newRule('save');
	$formdata->newRule('_submit_check');
	
	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('_submit_check', $_POST)) {
		$formdata->processForm($_POST);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
		
		if (!$error) {
			extract($formdata->dbReady());
			$arrays = $formdata->htmlReady();

			if ($cid) { // save or delete
				if (!$rentry->loadbycid($cid)) {
					echo $rentry->get_error();
					exit;
				}
				
				if ($save) {
					if ($rentry->set_company($company)) {
						// save all of the faxnumbers and their descriptions
						$count = count($arrays['faxnumid']);
						for ($i = 0; $i < $count; $i++) {
							if ($rentry->loadbyfaxnumid($arrays['faxnumid'][$i])) {
								$rentry->save_settings(array('description' => $arrays['desc'][$i], 'faxcatid' => $arrays['faxcatid'][$i],
															'faxnum' => $arrays['fax'][$i], 'to_person' => $arrays['to_person'][$i],
															'to_location' => $arrays['to_location'][$i], 'to_voicenumber' => $arrays['to_voicenumber'][$i]));
							}
						}
						
						// add new fax number to entry
						if ($new_faxnum) {
							if ($rentry->create_faxnumid($new_faxnum)) {
								$rentry->save_settings(array('description' => $new_desc, 'faxcatid' => $newfaxcatid, 'to_person' => $new_to_person,
															'to_location' => $new_to_location, 'to_voicenumber' => $new_to_voicenumber));
							} else {
								$error = $rentry->get_error();
							}
						}
	
						$message = $LANG['RUBRICA_SAVED'];
					} else {
						$error = "Error: ".$rentry->get_error();
					}
				} elseif ($delete && $_SESSION['user']->can_del) {
					$reserved = new AFFaxNum;
					if ($reserved->loadbyfaxnum($RESERVED_FAX_NUM, $mult)) {
						$newcid = $reserved->get_companyid();
						
						// reassign this fax number's faxes to the reserved fax number entry in order to not to lose trace of the fax
						$farchive = new FaxPDFArchive;
						$farchive->reassign($cid, $newcid);
						
						// delete the fax company entry
						$rentry->delete_companyfaxids($cid);
						$rentry->delete_cid($cid);
						
						$message = $LANG['RUBRICA_DELETED'];
					} else {
						$error		= "Error: ".$rentry->get_error();
					}
				}
			} elseif ($create) {
				if ($rentry->create($company)) {
					if ($rentry->create_faxnumid($new_faxnum)) {
						$rentry->save_settings(array('description' => $new_desc, 'faxcatid' => $newfaxcatid, 'to_person' => $new_to_person,
												'to_location' => $new_to_location, 'to_voicenumber' => $new_to_voicenumber));
						
						$message = $LANG['RUBRICA_SAVED'];
					} else {
						$error		= $rentry->get_error();
					}
				} else {
					$error			= $rentry->get_error();
				}
			}
		}
	} elseif ($formdata->cid) {
		if ($rentry->loadbycid($formdata->cid)) {
			$formdata->company	= $rentry->get_company();
			$faxnumbers			= $rentry->get_faxnums();
		} else {
			$create = true;
		}
	} else {
		$create = true;
	}
	
	// categories
	$faxcategories	= array();
	$categories		= $_SESSION['user']->get_faxcats();
	$faxcat			= new FaxPDFCategory;
	foreach ($categories as $cat) {
		if ($catname = $faxcat->get_name($cat)) {
			$faxcategories[$cat] = $catname;
		}
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('error',				$error);
	$usmarty->assign('create',				$create);
	$usmarty->assign('message',				$message);
	$usmarty->assign('faxcategories',		$faxcategories);
	$usmarty->assign('faxnumbers',			$faxnumbers);
	$usmarty->assign('fvalues',				$formdata->htmlReady());
	display_template('rubrica_edit.tpl',	$usmarty);
