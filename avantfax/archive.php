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
	
	$faxesperpage	= ($_SESSION[USERSESSION]->faxperpagearchive) ? $_SESSION[USERSESSION]->faxperpagearchive : $DEFAULT_FAXES_PER_PAGE_ARCHIVE;	
	$pagelimit		= array_key_exists('pagelimit', $_GET) ? $_GET['pagelimit'] : $faxesperpage;
	$pageindex		= array_key_exists('pageindex', $_GET) ? $_GET['pageindex'] : 0;
		
	/******************************************************************************************************************************
			SETUP FORM RULES
	 ******************************************************************************************************************************/
	$formdata = new FormRules;
//	$formdata->debug = true;
	$formdata->newRule('regexp');
	$formdata->newRule('sentrecvd');
	$formdata->newRule('companyid',		NULL, FR_NUMBER);
	$formdata->newRule('category',		NULL, FR_NUMBER);
	$formdata->newRule('kw');
	$formdata->newRule('faxid');
	$formdata->newRule('start_day',		date("d"));
	$formdata->newRule('start_month',	date("m"));
	$formdata->newRule('start_year',	date("Y"));
	$formdata->newRule('end_day',		date("d"));
	$formdata->newRule('end_month',		date("m"));
	$formdata->newRule('end_year',		date("Y"));
	$formdata->newRule('userid', 		$_SESSION[USERSESSION]->superuser ? NULL : $_SESSION[USERSESSION]->get_uid(), FR_NUMBER);
	$formdata->newRule('pageindex',		$pageindex, FR_NUMBER, 0);
	$formdata->newRule('pagelimit',		$pagelimit, FR_NUMBER, 10);
	
	$archive		= new FaxPDFArchive;
	$faxcat			= new FaxPDFCategory;
	$day_list		= array();
	$year_list		= array();
	$user_list		= array('');
	$month_list		= array();
	$category_list	= array('');
	$total_results	= NULL;
	$results_string	= NULL;
	
	/******************************************************************************************************************************
			PROCESS FORM
	 ******************************************************************************************************************************/
	if (array_key_exists('kw', $_GET)) {
		$formdata->processForm($_GET);
		
		if ($formerror = $formdata->getFormErrors()) {
			$error = "<li>".join("<li>", $formerror);
		}
		
		// not checking if error
		
		extract($formdata->dbReady());
		
		if ($end_day		== "*")		$end_day		= "";
		if ($end_month		== "*")		$end_month		= "";
		if ($end_year		== "*")		$end_year		= "";
		if ($start_day		== "*")		$start_day		= "";
		if ($start_month	== "*")		$start_month	= "";
		if ($start_year		== "*")		$start_year		= "";
		
		$end_date		= NULL;
		$start_date		= NULL;
		
		if ($end_day && $end_month && $end_year) {			
			$end_date = date("Y-m-d 23:59:59", mktime(0, 0, 0, $end_month, $end_day, $end_year));
		} elseif (!$end_day && $end_month && $end_year) {
			$end_date = date("Y-m-t 23:59:59", mktime(0, 0, 0, $end_month, 1, $end_year));
		} elseif (!$end_day && !$end_month && $end_year) {
			$end_date = "$end_year-12-31 23:59:59";
		} elseif (!$end_day && !$end_month && !$end_year) {
			$end_date = NULL;
		}
		
		if ($start_day && $start_month && $start_year) {
			if (!$end_date) {
				$start_date = date("Y-m-d", mktime(0, 0, 0, $start_month, $start_day, $start_year));
			} else {
				$start_date = date("Y-m-d 00:00:00", mktime(0, 0, 0, $start_month, $start_day, $start_year));
			}
		} elseif (!$start_day && $start_month && $start_year) {
			if (!$end_date) {
				$start_date = date("Y-m", mktime(0, 0, 0, $start_month, 1, $start_year));
			} else {
				$start_date = date("Y-m-d 00:00:00", mktime(0, 0, 0, $start_month, 1, $start_year));
			}
		} elseif (!$start_day && !$start_month && $start_year) {
			if (!$end_date) {
				$start_date = date("Y", mktime(0, 0, 0, 1, 1, $start_year));
			} else {
				$start_date = date("Y-m-d 00:00:00", mktime(0, 0, 0, 1, 1, $start_year));
			}
		} elseif (!$start_day && !$start_month && !$start_year) {
			$start_date = NULL;
		}
		
		if (array_key_exists('opensearch', $_REQUEST)) {
			$start_date		= NULL;
			$end_day		= "";
			$end_month		= "";
			$end_year		= "";
			$start_day		= "";
			$start_month	= "";
			$start_year		= "";
		}

		$criteria = array(
			'start_date'	=> $start_date,
			'end_date'		=> $end_date,
			'keywords'		=> $kw,
			'companyid'		=> $companyid,
			'sentrecvd'		=> $sentrecvd,
			'category'		=> $category,
			'faxid'			=> $faxid,
			'userid'		=> $formdata->userid,							// faxes sent by this userid
			'categories'	=> $_SESSION[USERSESSION]->get_faxcats(),		// viewable categories
			'modemdevs'		=> $_SESSION[USERSESSION]->get_modemdevs(),		// viewable modem devices
			'didroutes'		=> $_SESSION[USERSESSION]->get_didrouting(),	// viewable DID routes
			'superuser'		=> $_SESSION[USERSESSION]->superuser,
			'pagelimit'		=> $pagelimit,
			'pageindex'		=> $pageindex
		);
		
		$total_results = $archive->search_archive($criteria);
	} else {
		$criteria = array(
			'start_date'	=> date("Y-m-d 00:00:00"),
			'end_date'		=> date("Y-m-d 23:59:59"),
			'keywords'		=> NULL,
			'companyid'		=> NULL,
			'sentrecvd'		=> "*",
			'category'		=> NULL,
			'faxid'			=> $formdata->faxid,
			'userid'		=> $formdata->userid,							// faxes sent by this userid
			'categories'	=> $_SESSION[USERSESSION]->get_faxcats(),		// viewable categories
			'modemdevs'		=> $_SESSION[USERSESSION]->get_modemdevs(),		// viewable modem devices
			'didroutes'		=> $_SESSION[USERSESSION]->get_didrouting(),	// viewable DID routes
			'superuser'		=> $_SESSION[USERSESSION]->superuser,
			'pagelimit'		=> $pagelimit,
			'pageindex'		=> $pageindex
		);
		
		$total_results = $archive->search_archive($criteria);
	}

	if ($_SESSION[USERSESSION]->superuser) {
		$categories = $faxcat->get_categories();
		
		if (is_array($categories)) {
			foreach ($categories as $cat) {
				$category_list[$cat['catid']] = $cat['name'];
			}
		}
	} else {
		$categories = $_SESSION[USERSESSION]->get_faxcats();
		if (is_array($categories)) {
			foreach ($categories as $cat) {
				if ($catname = $faxcat->get_name($cat)) {
					$category_list[$cat] = $catname;
				}
			}
		}
	}
	
	if ($_SESSION[USERSESSION]->superuser) {
		$archiveuser = new AFUserAccount;
		while ($archiveuser->list_accounts()) {
			$user_list[$archiveuser->get_uid()] = $archiveuser->username;
		}
	}

	$day_list["*"] = "";
	for ($i = 1; $i < 32; $i++) {
		$day_list["$i"] = $i;
	}
	
	$month_list["*"] = "";
	for ($i = 1; $i < 13; $i++) {
		$month_list["$i"] = $LANG['MONTHS'][$i];
	}
	
	$year_list["*"] = "";
	for ($i = 2004; $i < 2016; $i++) {
		$year_list["$i"] = $i;
	}

	$sentrecvd_list = array("*" => $LANG['BOTH_SENT_RECVD'], "s" => $LANG['ONLY_MY_SENT'], "r" => $LANG['ONLY_RECVD']);
	
	$show_results	= NULL;
	$index			= 0;
	
	if ($total_results) {
		$results_string	= sprintf($LANG['CONCLUSION'], $total_results);
		$show_results	= array();
		
		while ($archive->next_archive_entry($fid)) {
			if ($archive->load_fax($fid)) {
				$company_details = get_company_details($archive->get_faxnumid(), $archive->get_origfaxnum(), $archive->get_companyid());
				
				$thumb = $archive->get_thumbnail();
				if (!file_exists($INSTALLDIR.$thumb)) {
					$thumb = NOTHUMB;
				}
				
				$show_results[$index]['faxid']			= $archive->get_fid();
				$show_results[$index]['pages']			= $archive->get_pages();
				$show_results[$index]['userid']			= $archive->get_userid();
				$show_results[$index]['tiffpath']		= $archive->get_tiffpath();
				$show_results[$index]['thumbnail']		= $thumb;
				$show_results[$index]['description']	= $archive->get_description();
				$show_results[$index]['archstamp']		= $archive->get_archstamp();
				$show_results[$index]['modemdev']		= $archive->get_modemdev();
				$show_results[$index]['faxcategory']	= $faxcat->get_name($archive->get_faxcatid());
				$show_results[$index]['faxnum_loadby']	= $company_details['faxnum_loadby'];
				$show_results[$index]['company_name']	= $company_details['company_name'];
				$show_results[$index]['company_fax']	= $company_details['company_fax'];
				$show_results[$index]['cdescription']	= $company_details['description'];
				$show_results[$index]['faxnum_cid']		= $company_details['faxnum_cid'];
				
				if ($_SESSION[USERSESSION]->superuser) {
					if ($uid = $archive->get_userid()) {
						$archiveuser = new AFUserAccount;
						if ($archiveuser->load($uid)) {
							$show_results[$index]['archiveuser']	= $archiveuser->username;
						}
					}
				}
				
				$index++;
			}
		}
	}

	/******************************************************************************************************************************
			SETUP PAGING SUPPORT
	 ******************************************************************************************************************************/
	if ($pageindex < 0) {
		$pageindex = 0;
	}
	
	$numpages		= ($total_results > $pagelimit) ? ceil($total_results/$pagelimit) : 0;
	$pageindex		= ($pageindex > ($numpages-1)) ? $numpages-1 : $pageindex;
	$request_uri	= $_SERVER["REQUEST_URI"];
	if (preg_match('/pageindex=(\d+)/', $request_uri, $matches)) {
		// Array ([0] => "pageindex=1" , [1] => "1")
		$newpageindex = str_replace($matches[1], "XXPAGEINDEXXX", $matches[0]); // pageindex=1 becomes pageindex=XXPAGEINDEXXX
		$request_uri = str_replace($matches[0], $newpageindex, $request_uri);
	} elseif (strstr($request_uri, '?')) {
		$request_uri .= "&pageindex=XXPAGEINDEXXX";
	} else {
		$request_uri .= "?pageindex=XXPAGEINDEXXX";
	}
	
	/******************************************************************************************************************************
			SHOW TEMPLATE
	 ******************************************************************************************************************************/
	$usmarty = new UserSmarty;
	$usmarty->assign('day_list',		$day_list);
	$usmarty->assign('year_list',		$year_list);
	$usmarty->assign('user_list',		$user_list);
	$usmarty->assign('month_list',		$month_list);
	$usmarty->assign('category_list',	$category_list);
	$usmarty->assign('sentrecvd_list',	$sentrecvd_list);
	$usmarty->assign('archive',			$show_results);
	$usmarty->assign('results_string',	$results_string);
	$usmarty->assign('fvalues',			$formdata->htmlReady());
	$usmarty->assign('INC_LIST',		"<script language=\"javascript\" type=\"text/javascript\" src=\"js/archivebook.js\"></script>");
	$usmarty->assign('WIDE_TABLE',		(!$ARCHIVE_WIDE) ? 90 : 100);
	$usmarty->assign('numfaxesinbox',	get_inbox_count());	// number of faxes in inbox
	$usmarty->assign('totalfaxes',		$total_results);
	$usmarty->assign('numpages',		$numpages);
	$usmarty->assign('currentpage',		$pageindex);
	$usmarty->assign('currentindex',	($pageindex*$pagelimit)+1);
	$usmarty->assign('currentmax',		($pageindex*$pagelimit)+$index);
	$usmarty->assign('uri',				$request_uri);
	display_template('archive.tpl',		$usmarty);
