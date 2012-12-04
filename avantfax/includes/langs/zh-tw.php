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

$LANGUAGE = "zh-tw";
$LANGUAGE_NAME = "正體中文";

$LANG = array();

$LANG['ISO'] = "charset=utf-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "是";
$LANG['NO'] = "否";

$LANG['DATE'] = "日期";
$LANG['FROM'] = "寄件者";
$LANG['TO'] = "收件者";

$LANG['DATE_START'] = "開始日期";
$LANG['DATE_END'] = "結束日期";

$LANG['TO_PERSON'] = "收件者";
$LANG['TO_COMPANY'] = "收件者公司";
$LANG['TO_LOCATION'] = "收件者所在地";
$LANG['TO_VOICENUMBER'] = "收件者電話號碼";

$LANG['MY_COMPANY'] = "公司";
$LANG['MY_LOCATION'] = "所在地";
$LANG['MY_VOICENUMBER'] = "電話號碼";
$LANG['MY_FAXNUMBER'] = "傳真號碼";

$LANG['VIEW_FAX'] = "檢視傳真";
$LANG['ROTATE_FAX'] = "旋轉傳真";
$LANG['DOWNLOAD_PDF'] = "下載 PDF";
$LANG['DOWNLOAD_TIFF'] = "下載 TIFF";
$LANG['EMAIL_PDF'] = "以 E-mail 傳送 PDF";
$LANG['ADD_NOTE_FAX'] = "加上註解";
$LANG['ARCHIVE_FAX'] = "歸檔";
$LANG['DELETE_FAX'] = "永久刪除";

$LANG['DELETE_CONFIRM'] = "請確定你要刪除這個傳真。";

$LANG['ASSIGN_CNAME'] = "指定公司名稱";
$LANG['ASSIGN_MISSING'] = "必須輸入公司名稱";
$LANG['ASSIGN_NOTE'] = "修改這個傳真的註解/詳細資料";
$LANG['ASSIGN_NOTE_SAVED'] = "註解/詳細資料已儲存";
$LANG['ASSIGN_OK'] = "已成功指定公司名稱。";
$LANG['FAXES'] = "份傳真";

$LANG['NAME'] = "姓名";
$LANG['DESCRIPTION'] = "詳細資料";
$LANG['SAVE'] = "儲存";
$LANG['DELETE'] = "刪除";
$LANG['CANCEL'] = "取消";
$LANG['CREATE'] = "建立";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "選取";
$LANG['CONTACT_SAVED'] = "聯絡人資訊已儲存";
$LANG['CONTACT_DELETED'] = "已刪除聯絡人";
$LANG['RUBRICA_SAVED'] = "公司資訊已儲存";
$LANG['RUBRICA_DELETED'] = "已刪除公司";

$LANG['FAX_FILES'] = "請選取要傳真的檔案";
$LANG['FAX_DEST'] = "收件者傳真號碼";
$LANG['FAX_CPAGE'] = "使用傳真封面";
$LANG['FAX_REGARDING'] = "關於";
$LANG['FAX_COMMENTS'] = "註解";
$LANG['FAX_FILETYPES'] = "只能附加 ".SENDFAXFILETYPES." 格式的檔案。";
$LANG['FAX_FILE_MISSING'] = "必須選取一個要傳送的檔案";
$LANG['FAX_DEST_MISSING'] = "必須輸入收件者傳真號碼";
$LANG['FAX_SUBMITTED'] = "您的傳真已成功提交到傳送佇列.<br />傳真傳送後您會收到一封確認郵件。";
$LANG['FAX_FILESIZE'] = "文件大小超過限制。";
$LANG['FAX_MAXSIZE'] = "文件允許最大的大小是 $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "您的姓名";
$LANG['UPDATE'] = "更新";
$LANG['USER_DETAILS_SAVED'] = "使用者設定已儲存.";

$LANG['LANGUAGE'] = "語言";
$LANG['EMAIL_SIG'] = "E-mail 簽章";

$LANG['NEXT_FAX'] = "下一份傳真";
$LANG['PREV_FAX'] = "上一份傳真";

$LANG['LOGIN_TEXT'] = "請輸入使用者名稱和密碼登入傳真系統。";
$LANG['LOGIN_DISABLED'] = "你的帳號已停用，請聯絡系統管理員。";
$LANG['LOGIN_INCORRECT'] = "使用者名稱或密碼錯誤，請重試。";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "使用者名稱";
$LANG['PASSWORD'] = "密碼";
$LANG['USER'] = "使用者";
$LANG['BUTTON_LOGIN'] = "登入";
$LANG['BUTTON_LOGOUT'] = "登出";
$LANG['BUTTON_SETTINGS'] = "設定";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "收件匣";
$LANG['MENU_OUTBOX'] = "寄件匣";
$LANG['MENU_SENDFAX'] = "傳送傳真";
$LANG['MENU_ARCHIVE'] = "檔案櫃";
$LANG['MENU_CONTACTS'] = "聯絡人";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "E-mail";
$LANG['CONTACT_HEADER_FAX'] = "傳真";
$LANG['CONTACT_HEADER_COMPANY'] = "公司";
$LANG['CONTACT_HEADER_NEWFAX'] = "新傳真號碼";
$LANG['CONTACT_HEADER_FAXNUM'] = "傳真號碼";
$LANG['NEW_ENTRY'] = "新項目";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES; // <----- NEW
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts"; // <----- NEW
$LANG['UPLOAD_BUTTON'] = "Upload"; // <----- NEW

$LANG['SEND_EMAIL_HEADER'] = "透過 E-mail 轉發傳真";
$LANG['EMAIL_RECIPIENTS'] = "E-mail 收件者";
$LANG['MESSAGE_PROMPT'] = "E-mail 訊息";
$LANG['BUTTON_SEND'] = "傳送";
$LANG['SUBJECT'] = "主旨";
$LANG['PDF_FILENAME'] = "PDF 檔案名稱";

$LANG['EMAIL_SUCCESS'] = "E-mail 傳送成功";
$LANG['EMAIL_FAILURE'] = "E-mail 傳送失敗";

$LANG['PN_PAGE'] = "頁碼";
$LANG['PN_PAGE_UP'] = "上一頁";
$LANG['PN_PAGE_DN'] = "下一頁";
$LANG['PN_PAGES'] = "頁數";
$LANG['PN_OF'] = "/";

$LANG['NUM_DIALS'] = "撥號次數";
$LANG['KILL_JOB'] = "刪除任務";
$LANG['PROMPT_CLOSEWINDOW'] = "關閉視窗";

$LANG['LAST_UPDATED'] = "最後修改日期";
$LANG['BACK'] = "[ 返回 ]";
$LANG['EDIT'] = "編輯";
$LANG['ADD'] = "加上";
$LANG['WARNCAT'] = "請選擇分類";
$LANG['TITLE'] = "標題";
$LANG['CATEGORY'] = "分類";
$LANG['CATEGORY_NAME'] = "分類名稱";

$LANG['LAST_MOD'] = "最後修改人";

$LANG['MONTHS'][] = array("");
$LANG['MONTHS'][] = "一月";
$LANG['MONTHS'][] = "二月";
$LANG['MONTHS'][] = "三月";
$LANG['MONTHS'][] = "四月";
$LANG['MONTHS'][] = "五月";
$LANG['MONTHS'][] = "六月";
$LANG['MONTHS'][] = "七月";
$LANG['MONTHS'][] = "八月";
$LANG['MONTHS'][] = "九月";
$LANG['MONTHS'][] = "十月";
$LANG['MONTHS'][] = "十一月";
$LANG['MONTHS'][] = "十二月";

$LANG['ERROR_PASS'] = "對不起，沒有找到相對應的使用者。";
$LANG['NEWPASS_MSG'] = "使用者帳號 %s 對應您的 E-mail 位址。%s 上的 web 使用者剛剛要求重寄新密碼。

您的新密碼是: %s

如果這只是一個錯誤，請用新密碼登入後更改密碼。";

$LANG['ADMIN_NEWPASS_MSG'] = "系統管理者帳號的密碼重設為:\n\t%s\n，發出請求的使用者來自於 %s";

$LANG['REGWARN_MAIL'] = "請輸入有效的 E-mail 位址。";

$LANG['REGWARN_PASS'] = "請輸入有效的密碼，不含空格，長度至少要 ".MIN_PASSWD_SIZE." 個字元，包含 0-9, a-z, A-Z。";
$LANG['REGWARN_VPASS2'] = "新密碼與重複輸入的密碼不一致，請重新輸入。";
$LANG['REGWARN_USERNAME_INUSE'] = "該使用者名稱已存在，請選擇其他名稱。";

$LANG['USER_UPDATE_ERROR'] = "帳號更新錯誤";
$LANG['PASS_TOO_LONG'] = "密碼太長";
$LANG['PASS_TOO_SHORT'] = "密碼太短";
$LANG['PASS_ALREADY_USED'] = "這個密碼已在使用，請輸入新的密碼。";
$LANG['PASS_ERROR_CHANGING'] = "密碼更改失敗，使用者：";
$LANG['PASS_ERROR_RESETTING'] = "密碼重設失敗，使用者：";
$LANG['ERROR_SENDING_EMAIL'] = "E-mail 傳送失敗";
$LANG['REGWARN_USERNAME'] = "使用者名稱不允許含有字母數字以外的字元。";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "E-mail 已被使用。";

$LANG['LOST_PASSWORD'] = "忘記密碼？";

$LANG['PROMPT_UNAME'] = "使用者名稱";
$LANG['PROMPT_PASSWORD'] = "密碼";
$LANG['PROMPT_CAN_REUSE_PWD'] = "允許使用者重複使用舊密碼";
$LANG['REPLY_TO_FAX'] = "回覆傳真";
$LANG['REPLY_TO_FAX_TIP'] = "原件將會在封面後首先傳送";
$LANG['TITLE_DISTROLIST'] = "群組傳送列表";
$LANG['DISTROLIST_NAME'] = "列表名稱";
$LANG['DISTROLIST_DELETE'] = "刪除列表";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "刪除這個群組傳送列表？";
$LANG['DISTROLIST_SAVENAME'] = "儲存列表名稱";

$LANG['CHANGES_SAVED'] = "變更已儲存";
$LANG['DISTROLIST_DELETED'] = "列表已刪除";
$LANG['DISTROLIST_NOT_CREATED'] = "列表未建立";
$LANG['DISTROLIST_EXISTS'] = "列表已存在";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "請輸入列表名稱";
$LANG['DISTROLIST_ADD'] = "加入項目";
$LANG['DISTROLIST_REMOVE'] = "刪除項目";
$LANG['DISTROLIST_REFRESH_LIST'] = "更新列表";

$LANG['PROMPT_EMAIL'] = "E-mail 位址";
$LANG['BUTTON_SEND_PASS'] = "傳送密碼";
$LANG['REGISTER_VPASS'] = "驗證密碼";
$LANG['FIELDS_REQUIRED'] = "帶有星號(*)的欄位是必須填寫的。";

$LANG['NEW_PASS_DESC'] = "請輸入您的 E-mail 位址，並按下傳送密碼按鈕。<br /><br />您將很快的收到新密碼。<br /><br />之後使用新密碼登入系統。<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "輸入您的 使用者名稱 和 E-mail 位址，並按下傳送密碼按鈕。<br /><br />您很快就會收到新密碼。<br /><br />";
$LANG['RESETTING_PASSWORD'] = "您的新密碼將會傳送到指定的 E-mail 位址。<br /><br />收到新密碼後您可以登入系統並更改密碼。<br /><br />";

$LANG['SEARCH_TITLE'] = "搜尋";
$LANG['KEYWORDS'] = "關鍵字";
$LANG['COMPANY_SEARCH'] = "搜尋公司";
$LANG['COMPANY_LIST'] = "公司列表";
$LANG['SENT_RECVD'] = "已傳送/已接收";
$LANG['BOTH_SENT_RECVD'] = "包含已傳送和已接收的傳真";
$LANG['ONLY_MY_SENT'] = "只有我已傳送的傳真";
$LANG['ONLY_RECVD'] = "只有已接收的傳真";
$LANG['CONCLUSION'] = "共找到 %d 條結果。";
$LANG['NOKEYWORD'] = "沒有找到結果";

$LANG['SEARCH_WHITEPAGES'] = "搜尋空白頁";

$LANG['PWD_NEEDS_RESET'] = "繼續使用前必須更改密碼.";
$LANG['PWD_REQUIREMENTS'] = "密碼長度至少要 ".MIN_PASSWD_SIZE." 個字元.";
$LANG['OPASS'] = "舊密碼";
$LANG['NPASS'] = "新密碼";
$LANG['VPASS'] = "重複新密碼";
$LANG['OPASS_WRONG'] = "舊密碼錯誤";
$LANG['NAME_MISSING'] = "必須輸入名字";

$LANG['MODIFY_FAXNUMS'] = "修改公司傳真號碼";
$LANG['MODIFY_EMAILS'] = "修改 E-mail 位址簿";
$LANG['TITLE_FAXNUMS'] = "傳真號碼";
$LANG['TITLE_EMAILS'] = "E-mail 位址";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "新使用者詳細資料";
$LANG['NEW_USER_MESSAGE'] = "%s 您好,

這個郵件含有您登入 E-mail 管理系統 AvantFAX (http://%s) 的使用者名稱以及密碼

使用者名稱 - %s
密碼 - %s

這個郵件由系統自動產生，請勿回覆。";

$LANG['DIDROUTE_EXISTS'] = "Route already exists"; // <------ NEW
$LANG['DIDROUTE_NOT_CREATED'] = "Route was not created"; // <------ NEW
$LANG['DIDROUTE_NO_ROUTES'] = "No DID/DTMF Routes configured"; // <------ NEW
$LANG['DIDROUTE_DOESNT_EXIST'] = "Route %s does not exist"; // <------ NEW
$LANG['ADMIN_PRINTER'] = "Printer"; // <----- NEW
$LANG['PRINT'] = "Print"; // <----- NEW

$LANG['ADMIN_DIDROUTE_CREATED'] = "The route was created"; // <------ NEW
$LANG['ADMIN_DIDROUTE_DELETED'] = "The route was deleted"; // <------ NEW
$LANG['ADMIN_DIDROUTE_UPDATED'] = "The route was updated"; // <------ NEW
$LANG['ADMIN_DIDROUTES'] = "DID/DTMF Route groups";
$LANG['DIDROUTE_ROUTECODE'] = "DID/DTMF digits"; // <------ NEW
$LANG['DIDROUTE_CATCHALL'] = "Catch All"; // <------ NEW
$LANG['ADMIN_CONFDIDROUTING'] = "Configure DID/DTMF"; // <------ NEW
$LANG['GROUP'] = "Group"; // <------ NEW

$LANG['USER_ANYMODEM'] = "User can fax from any modem"; // <----- NEW

$LANG['BARCODEROUTE_BARCODE'] = "Barcode"; // <----- NEW
$LANG['MISSING_BARCODE'] = "Missing barcode"; // <----- NEW
$LANG['ADMIN_BARCODEROUTE_DELETED'] = "Barcode route deleted"; // <----- NEW
$LANG['ADMIN_BARCODEROUTE_UPDATED'] = "Barcode route updated"; // <----- NEW
$LANG['ADMIN_BARCODEROUTE_CREATED'] = "Barcode route created"; // <----- NEW
$LANG['BARCODEROUTE_NOT_CREATED'] = "Barcode route not created"; // <----- NEW
$LANG['BARCODEROUTE_EXISTS'] = "Barcode route exists"; // <----- NEW
$LANG['BARCODEROUTE_NO_ROUTES'] = "No barcode routes"; // <----- NEW
$LANG['BARCODEROUTE_DOESNT_EXIST'] = "Barcode route %s doesn't exist"; // <----- NEW

$LANG['FAXCAT_NOT_CREATED'] = "沒有建立傳真分類 '%s'";
$LANG['FAXCAT_ALREADY_EXISTS'] = "傳真分類 '%s' 已存在";

$LANG['FAX_FAILED'] = "傳真傳送有問題";
$LANG['FAX_WHY']["done"] = "完成";
$LANG['FAX_WHY']["format_failed"] = "格式錯誤";
$LANG['FAX_WHY']["no_formatter"] = "沒有格式轉譯器";
$LANG['FAX_WHY']["poll_no_document"] = "輪詢(poll) 沒有文件";
$LANG['FAX_WHY']["killed"] = "終止";
$LANG['FAX_WHY']["rejected"] = "拒絕";
$LANG['FAX_WHY']["blocked"] = "中止";
$LANG['FAX_WHY']["removed"] = "移除";
$LANG['FAX_WHY']["timedout"] = "逾時";
$LANG['FAX_WHY']["poll_rejected"] = "輪詢(poll) 被拒絕";
$LANG['FAX_WHY']["poll_failed"] = "輪詢(poll) 失敗";
$LANG['FAX_WHY']["requeued"] = "重新排入佇列";

$LANG['COMPANY_EXISTS'] = "公司名稱已存在";
$LANG['FAXNUMID_NOT_CREATED'] = "無法建立 faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "這個傳真號碼沒有相對應的公司";
$LANG['CANT_CHANGE_FAXNUM'] = "不能更改已存在的傳真號碼";

$LANG['MODEM_EXISTS'] = "數據機裝置已存在";
$LANG['MODEM_NOT_CREATED'] = "數據機裝置未建立";
$LANG['NO_MODEMS_CONFIGURED'] = "尚未設定數據機";
$LANG['MODEM_DOESNT_EXIST'] = "數據機 %s 不存在";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "分類已刪除";
$LANG['ADMIN_FAXCAT_CREATED'] = "分類已建立";
$LANG['ADMIN_FAXCAT_UPDATED'] = "分類已更新";

$LANG['ADMIN_MODEM_CREATED'] = "數據機已建立";
$LANG['ADMIN_MODEM_DELETED'] = "數據機已刪除";
$LANG['ADMIN_MODEM_UPDATED'] = "數據機已更新";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "閒置";
$LANG['FAXSEND'] = "正在傳送傳真";
$LANG['FAXRECV'] = "正在接收傳真";
$LANG['FAXRECVFROM'] = "正在接收傳真：";

$LANG['MODEM_DEVICE'] = "裝置";
$LANG['MODEM_CONTACT'] = "聯絡人";
$LANG['MODEM_ALIAS'] = "別名";

$LANG['COVER_FILE'] = "File name"; // <--- NEW
$LANG['COVER_TITLE'] = "Coverpage Title"; // <--- NEW
$LANG['SELECT_COVERPAGE'] = "Select cover page"; // <--- NEW

$LANG['MISSING_CATEGORY_NAME'] = "You must enter a category name"; // <----- NEW
$LANG['MISSING_DEVICE_NAME'] = "You must enter a device name"; // <----- NEW
$LANG['MISSING_ALIAS_NAME'] = "You must enter an alias"; // <----- NEW
$LANG['MISSING_CONTACT_NAME'] = "You must enter a contact name"; // <----- NEW
$LANG['MISSING_ROUTE'] = "You must enter the DID/DTMF digits"; // <----- NEW

$LANG['MISSING_FILE_NAME'] = "You must enter a file name"; // <----- NEW
$LANG['MISSING_TITLE_NAME'] = "You must enter a title"; // <----- NEW

$LANG['ADMIN_CONFIGURE'] = "Configure..."; // <----- NEW
$LANG['ADMIN_USERS'] = "個使用者";
$LANG['ADMIN_NEW_USER'] = "新增使用者";
$LANG['ADMIN_EDIT_USER'] = "更改使用者";
$LANG['ADMIN_DEL_USER'] = "刪除使用者";
$LANG['ADMIN_LAST_LOGIN'] = "最近一次登入的時間";
$LANG['ADMIN_LAST_IP'] = "最近一次登入的 IP";
$LANG['ADMIN_USER_LIST'] = "使用者列表";
$LANG['ADMIN_FAXCATS'] = "傳真分類";
$LANG['ADMIN_CONFMODEMS'] = "設定數據機";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "統計";
$LANG['ADMIN_SYSLOGS'] = "系統紀錄";
$LANG['ADMIN_SYSFUNC'] = "系統功能";
$LANG['ADMIN_NOUSERS'] = "沒有建立使用者";
$LANG['ADMIN_ACC_ENABLED'] = "帳號有效";
$LANG['ADMIN_PWDCYCLE'][] = "密碼過期週期";
$LANG['ADMIN_PWDCYCLE'][] = "從不";
$LANG['ADMIN_PWDCYCLE'][] = "每 3 個月";
$LANG['ADMIN_PWDCYCLE'][] = "每 6 個月";
$LANG['ADMIN_PWDEXP'] = "密碼失效日期";
$LANG['SUPERUSER'] = "超級使用者";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "使用者允許刪除傳真";
$LANG['ADMIN_FAXLINES'] = "允許檢視傳真線路";
$LANG['ADMIN_CATEGORIES'] = "允許檢視傳真類別";
$LANG['REBOOT'] = "重新啟動伺服器";
$LANG['SHUTDOWN'] = "伺服器關機";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "請稍後";
$LANG['LOGTEXT'] = "紀錄資訊";
$LANG['QUESTION_DELUSER'] = "確定要刪除嗎？";

$LANG['TSI_ID'] = "TSI ID"; // <----- NEW
$LANG['PRIORITY'] = "Priority"; // <----- NEW
$LANG['BLACKLIST'] = "Blacklist"; // <----- NEW
$LANG['MODIFY_FAXJOB'] = "Modify Job"; // <----- NEW
$LANG['NEW_DESTINATION'] = "New Destination"; // <----- NEW
$LANG['SCHEDULE_FAX'] = "Schedule delivery"; // <----- NEW
$LANG['FAX_NUMTRIES'] = "Number of tries"; // <----- NEW
$LANG['FAX_KILLTIME'] = "Kill time"; // <----- NEW
$LANG['NOW'] = "Now"; // <----- NEW
$LANG['MINUTES'] = "Minutes"; // <----- NEW
$LANG['HOURS'] = "Hours"; // <----- NEW
$LANG['DAYS'] = "Days"; // <----- NEW

$LANG['ADMIN_CONFDYNCONF'] = "Configure DynamicConfig"; // <----- NEW
$LANG['DYNCONF_MISSING_CALLID'] = "You must enter the CallID"; // <----- NEW
$LANG['DYNCONF_NOT_CREATED'] = "Rule not created"; // <----- NEW
$LANG['DYNCONF_EXISTS'] = "Rule exists"; // <----- NEW
$LANG['DYNCONF_CALLID'] = "Caller ID"; // <----- NEW
$LANG['DYNCONF_CREATED'] = "Rule created"; // <----- NEW
$LANG['DYNCONF_DELETED'] = "Rule deleted"; // <----- NEW
$LANG['DYNCONF_UPDATED'] = "Rule updated"; // <----- NEW
$LANG['OPTIONS'] = "Options"; // <----- NEW

$LANG['MUST_CREATE_ROUTES'] = "<a href=\"conf_didroute.php\">You must first create a DID/DTMF group</a>"; // <----- NEW
$LANG['MUST_CREATE_MODEMS'] = "<a href=\"conf_modems.php\">You must first create a modem</a>"; // <----- NEW
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">You must first create a category</a>"; // <----- NEW

$LANG['EXPLAIN_CATEGORIES'] = "Categories are useful for organizing faxes in the AvantFAX Archive.  Normal users are limited to viewing the categories assigned to them."; // <----- NEW
$LANG['EXPLAIN_DYNCONF'] = "HylaFAX's DynamicConfig and RejectCall features are used to reject fax transmissions from known offenders.  Enter the Caller ID of the sender you would like to block.  Optionally, you may select a device if you only want to block this sender on that device."; // <----- NEW
$LANG['EXPLAIN_DIDROUTE'] = "DID/DTMF routing is used to route faxes sent to a hunt group.  HylaFAX must be properly configured for this to work.  A separate entry must be created for each hunt group you intend to use with AvantFAX.  The DID/DTMF digits field is for hunt group information as received by HylaFAX -- typically the last 3 or 4 digits or even 10 digits of the fax number. The Alias field is used to describe the location or purpose for the hunt group.  For example, Sales or Support for a fax line dedicated for those departments.  The Contact field is for an email address, and every fax that arrives for this group will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Normal users can only view faxes from the hunt groups assigned to them."; // <----- NEW
$LANG['EXPLAIN_MODEMS'] = "A Modem entry must be created for each modem device you intend to use with AvantFAX.  The Device field is for the name of the device as it is configured in HylaFAX (ie: ttyS0, ttyds01 or boston00). The Alias field is used to describe the location or purpose for the modem.  For example, Sales or Support for a fax line dedicated for those departments.  The Contact field is for an email address, and every fax that arrives on this modem will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Normal users can only view faxes from the modems assigned to them."; // <----- NEW
$LANG['EXPLAIN_COVERS'] = "A Cover Page entry must be created for each cover page you intend to use with AvantFAX.  The File field is for the name of the template file found in the images/ folder (ie: cover.ps, custom.ps, or mycover.html). The Title field is used to describe the cover page.  For example: Generic, Sales Dept, Accounting Dept.  Anyone can choose any of the cover pages defined here.";
$LANG['EXPLAIN_FAX2EMAIL'] = "Fax2Email is for routing individual fax numbers to a specific email address.  If you want the faxes sent from 18002125555 to be emailed to sales@yourcompany.com, you must select the company in the list on the left and enter the email address into the Email field.  The Company field allows you to modify the company name as displayed in the Address Book.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Also, you may select a category to automatically categorizing the fax."; // <----- NEW
$LANG['EXPLAIN_BARCODEROUTE'] = "Barcode based routing is used to route faxes based on the barcode contained in the fax.  Enter the barcode that you want matched to this rule in the Barcode field.  The Alias field is used to describe the purpose for this rule.  For example for a specific service or product.  The Contact field is for an email address, and every fax that arrives for this group will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Also, you may select a category to automatically categorizing the fax."; // <----- NEW
