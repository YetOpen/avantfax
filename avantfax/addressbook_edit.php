<?php
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

	require_once 'check_login.php';
	
	$addressbook	= new AFAddressBook;
	$create			= false;
	$message		= NULL;
	$error			= NULL;
	$faxnumbers		= array();
	
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
	$formdata->newRule('company');
	$formdata->newRule('abook_id', array_key_exists('abook_id', $_REQUEST) ? $_REQUEST['abook_id'] : NULL, FR_NUMBER);
	$formdata->newRule('faxnumber', NULL, FR_ARRAY);
	$formdata->newRule('description', NULL, FR_ARRAY);
	$formdata->newRule('abookfax_id', NULL, FR_ARRAY);
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

			if ($abook_id && !$create) { // save or delete
				if (!$addressbook->loadbycid($abook_id)) {
					echo $addressbook->get_error();
					exit;
				}
				
				if ($save) {
					if ($addressbook->set_company($company)) {
						// save all of the faxnumbers and their descriptions
						$count = count($arrays['abookfax_id']);
						for ($i = 0; $i < $count; $i++) {
							if ($addressbook->loadbyfaxnumid($arrays['abookfax_id'][$i])) {
								$addressbook->save_settings(array('description' => $arrays['description'][$i], 'faxcatid' => $arrays['faxcatid'][$i],
																'faxnumber' => $arrays['faxnumber'][$i], 'to_person' => $arrays['to_person'][$i],
																'to_location' => $arrays['to_location'][$i], 'to_voicenumber' => $arrays['to_voicenumber'][$i]));
							}
						}
						
						// add new fax number to entry
						if ($new_faxnum) {
							if ($addressbook->create_faxnumid($new_faxnum)) {
								$addressbook->save_settings(array('description' => $new_desc, 'faxcatid' => $newfaxcatid, 'to_person' => $new_to_person,
																'to_location' => $new_to_location, 'to_voicenumber' => $new_to_voicenumber));
							} else {
								$error = $addressbook->get_error();
							}
						}

						$message = $LANG['RUBRICA_SAVED'];
					} else {
						$error = "Error: ".$addressbook->get_error();
					}
				} elseif ($delete && $_SESSION[USERSESSION]->can_del) {
					if ($addressbook->loadbyfaxnum($RESERVED_FAX_NUM, $mult)) {
						$newcid = $addressbook->get_companyid();
						
						// reassign this fax number's faxes to the reserved fax number entry in order to not to lose trace of the fax
						$farchive = new FaxPDFArchive;
						$farchive->reassign($abook_id, $newcid);
						
						// delete the fax company entry
						$addressbook->delete_companyfaxids($abook_id);
						$addressbook->delete_cid($abook_id);
						
						$message = $LANG['RUBRICA_DELETED'];
					} else {
						$error		= "Error: ".$addressbook->get_error();
					}
				}
			} elseif ($create) {
				if ($addressbook->create($company)) {
					if ($addressbook->create_faxnumid($new_faxnum)) {
						$addressbook->save_settings(array('description' => $new_desc, 'faxcatid' => $newfaxcatid, 'to_person' => $new_to_person,
														'to_location' => $new_to_location, 'to_voicenumber' => $new_to_voicenumber));
						
						$message = $LANG['RUBRICA_SAVED'];
					} else {
						$error		= $addressbook->get_error();
					}
				} else {
					$error			= $addressbook->get_error();
				}
			}
		}
	} elseif ($formdata->abook_id) {
		if ($addressbook->loadbycid($formdata->abook_id)) {
			$formdata->company	= decode_entity($addressbook->get_company());
			$faxnumbers			= $addressbook->get_faxnums();
		} else {
			$create = true;
		}
	} else {
		$create = true;
	}
	
	// categories
	$faxcategories	= array('');
	$categories		= $_SESSION[USERSESSION]->get_faxcats();
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
	$usmarty->assign('error',					$error);
	$usmarty->assign('create',					$create);
	$usmarty->assign('message',					$message);
	$usmarty->assign('faxnumbers',				$faxnumbers);
	$usmarty->assign('faxcategories',			$faxcategories);
	$usmarty->assign('fvalues',					$formdata->htmlReady());
	display_template('addressbook_edit.tpl',	$usmarty);
