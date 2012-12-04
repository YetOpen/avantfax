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

$LANGUAGE = "zh";
$LANGUAGE_NAME = "简体中文";

$LANG = array();

$LANG['ISO'] = "charset=utf-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "是";
$LANG['NO'] = "否";

$LANG['DATE'] = "日期";
$LANG['FROM'] = "发件人";
$LANG['TO'] = "收件人";

$LANG['DATE_START'] = "开始日期";
$LANG['DATE_END'] = "结束日期";

$LANG['TO_PERSON'] = "收件人";
$LANG['TO_COMPANY'] = "收件人公司";
$LANG['TO_LOCATION'] = "收件人地点";
$LANG['TO_VOICENUMBER'] = "收件人电话号码";

$LANG['MY_COMPANY'] = "公司";
$LANG['MY_LOCATION'] = "地点";
$LANG['MY_VOICENUMBER'] = "电话号码";
$LANG['MY_FAXNUMBER'] = "传真号码";

$LANG['VIEW_FAX'] = "查看传真";
$LANG['ROTATE_FAX'] = "旋转传真";
$LANG['DOWNLOAD_PDF'] = "下载PDF文件";
$LANG['DOWNLOAD_TIFF'] = "下载TIFF文件";
$LANG['EMAIL_PDF'] = "邮件发送PDF文件";
$LANG['ADD_NOTE_FAX'] = "添加注释";
$LANG['ARCHIVE_FAX'] = "归档";
$LANG['DELETE_FAX'] = "永久删除";

$LANG['DELETE_CONFIRM'] = "请确认你想删除该传真";

$LANG['ASSIGN_CNAME'] = "指定公司名称";
$LANG['ASSIGN_MISSING'] = "必须输入公司名称";
$LANG['ASSIGN_NOTE'] = "修改该传真的注释/描述";
$LANG['ASSIGN_NOTE_SAVED'] = "注释/描述已保存";
$LANG['ASSIGN_OK'] = "已成功指定公司名称。";
$LANG['FAXES'] = "份传真";

$LANG['NAME'] = "姓名";
$LANG['DESCRIPTION'] = "描述";
$LANG['SAVE'] = "保存";
$LANG['DELETE'] = "删除";
$LANG['CANCEL'] = "取消";
$LANG['CREATE'] = "创建";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "选择";
$LANG['CONTACT_SAVED'] = "联系人信息已保存";
$LANG['CONTACT_DELETED'] = "已删除联系人";
$LANG['RUBRICA_SAVED'] = "公司信息已保存";
$LANG['RUBRICA_DELETED'] = "已删除公司";

$LANG['FAX_FILES'] = "请选择要传真的文件";
$LANG['FAX_DEST'] = "收件人传真号码";
$LANG['FAX_CPAGE'] = "使用传真封面";
$LANG['FAX_REGARDING'] = "关于";
$LANG['FAX_COMMENTS'] = "注释";
$LANG['FAX_FILETYPES'] = "只能附加".SENDFAXFILETYPES."格式的文件.";
$LANG['FAX_FILE_MISSING'] = "必须选择一个要发送的文件";
$LANG['FAX_DEST_MISSING'] = "必须输入收件人传真号码";
$LANG['FAX_SUBMITTED'] = "您的传真已成功提交到发送队列.<br />传真发送后您会收到一封确认邮件.";
$LANG['FAX_FILESIZE'] = "文件大小超出限制.";
$LANG['FAX_MAXSIZE'] = "文件最大允许的大小是$SF_MAXSIZE";
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
$LANG['USER_DETAILS_SAVED'] = "用户设置已保存.";

$LANG['LANGUAGE'] = "语言";
$LANG['EMAIL_SIG'] = "E-mail签名";

$LANG['NEXT_FAX'] = "下一份传真";
$LANG['PREV_FAX'] = "前一份传真";

$LANG['LOGIN_TEXT'] = "请输入用户名和密码登录传真系统.";
$LANG['LOGIN_DISABLED'] = "你的帐户已被禁用，请联系管理员。";
$LANG['LOGIN_INCORRECT'] = "用户名或密码不正确，请重试.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "用户名";
$LANG['PASSWORD'] = "密码";
$LANG['USER'] = "用户";
$LANG['BUTTON_LOGIN'] = "登录";
$LANG['BUTTON_LOGOUT'] = "退出";
$LANG['BUTTON_SETTINGS'] = "设置";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "收件箱";
$LANG['MENU_OUTBOX'] = "发件箱";
$LANG['MENU_SENDFAX'] = "发传真";
$LANG['MENU_ARCHIVE'] = "档案柜";
$LANG['MENU_CONTACTS'] = "联系人";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "Email";
$LANG['CONTACT_HEADER_FAX'] = "传真";
$LANG['CONTACT_HEADER_COMPANY'] = "公司";
$LANG['CONTACT_HEADER_NEWFAX'] = "新传真号码";
$LANG['CONTACT_HEADER_FAXNUM'] = "传真号码";
$LANG['NEW_ENTRY'] = "新项目";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES; // <----- NEW
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts"; // <----- NEW
$LANG['UPLOAD_BUTTON'] = "Upload"; // <----- NEW

$LANG['SEND_EMAIL_HEADER'] = "通过邮件转发传真";
$LANG['EMAIL_RECIPIENTS'] = "邮件收件人";
$LANG['MESSAGE_PROMPT'] = "Email message";
$LANG['BUTTON_SEND'] = "发送";
$LANG['SUBJECT'] = "主题";
$LANG['PDF_FILENAME'] = "PDF文件名";

$LANG['EMAIL_SUCCESS'] = "邮件成功发送";
$LANG['EMAIL_FAILURE'] = "邮件发送错误";

$LANG['PN_PAGE'] = "页码";
$LANG['PN_PAGE_UP'] = "上一页";
$LANG['PN_PAGE_DN'] = "下一页";
$LANG['PN_PAGES'] = "页数";
$LANG['PN_OF'] = "/";

$LANG['NUM_DIALS'] = "拨号次数";
$LANG['KILL_JOB'] = "删除任务";
$LANG['PROMPT_CLOSEWINDOW'] = "关闭窗口";

$LANG['LAST_UPDATED'] = "最后修改日期";
$LANG['BACK'] = "[ 返回 ]";
$LANG['EDIT'] = "编辑";
$LANG['ADD'] = "添加";
$LANG['WARNCAT'] = "请选择分类";
$LANG['TITLE'] = "标题";
$LANG['CATEGORY'] = "分类";
$LANG['CATEGORY_NAME'] = "分类名称";

$LANG['LAST_MOD'] = "最后修改人";

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

$LANG['ERROR_PASS'] = "对不起，没有找到对应的用户。";
$LANG['NEWPASS_MSG'] = "用户帐号%s对应您的邮件地址。%s上的web用户刚要求重发新密码。

您的新密码是: %s

如果这是一个错误，请用新密码登录后更改密码。";

$LANG['ADMIN_NEWPASS_MSG'] = "管理员帐户密码重设为:\n\t%s\n，发起请求的用户来自%s";

$LANG['REGWARN_MAIL'] = "请输入有效的电子邮件地址。";

$LANG['REGWARN_PASS'] = "请输入有效的密码，不含空格，长度至少".MIN_PASSWD_SIZE."个字符，包含0-9, a-z, A-Z。";
$LANG['REGWARN_VPASS2'] = "新密码与重复密码不一致，请重试。";
$LANG['REGWARN_USERNAME_INUSE'] = "该用户名已在使用，请选择其他用户名。";

$LANG['USER_UPDATE_ERROR'] = "帐户更新错误";
$LANG['PASS_TOO_LONG'] = "密码太长";
$LANG['PASS_TOO_SHORT'] = "密码太短";
$LANG['PASS_ALREADY_USED'] = "该密码已在使用，请输入新的密码。";
$LANG['PASS_ERROR_CHANGING'] = "密码更改失败，用户：";
$LANG['PASS_ERROR_RESETTING'] = "密码重设失败，用户：";
$LANG['ERROR_SENDING_EMAIL'] = "邮件发送失败";
$LANG['REGWARN_USERNAME'] = "用户名不允许含有字母数字以外的字符。";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "Email已在使用中.";

$LANG['LOST_PASSWORD'] = "忘记密码?";

$LANG['PROMPT_UNAME'] = "用户名";
$LANG['PROMPT_PASSWORD'] = "密码";
$LANG['PROMPT_CAN_REUSE_PWD'] = "允许用户重复使用旧密码";
$LANG['REPLY_TO_FAX'] = "回复传真";
$LANG['REPLY_TO_FAX_TIP'] = "原件将会在封面后首先发送";
$LANG['TITLE_DISTROLIST'] = "分发列表";
$LANG['DISTROLIST_NAME'] = "列表名";
$LANG['DISTROLIST_DELETE'] = "删除列表";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "删除该分发列表?";
$LANG['DISTROLIST_SAVENAME'] = "保存列表名";

$LANG['CHANGES_SAVED'] = "更改已保存";
$LANG['DISTROLIST_DELETED'] = "列表已删除";
$LANG['DISTROLIST_NOT_CREATED'] = "列表未创建";
$LANG['DISTROLIST_EXISTS'] = "列表已存在";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "请输入列表名";
$LANG['DISTROLIST_ADD'] = "添加项目";
$LANG['DISTROLIST_REMOVE'] = "删除项目";
$LANG['DISTROLIST_REFRESH_LIST'] = "刷新列表";

$LANG['PROMPT_EMAIL'] = "E-mail地址";
$LANG['BUTTON_SEND_PASS'] = "发送密码";
$LANG['REGISTER_VPASS'] = "验证密码";
$LANG['FIELDS_REQUIRED'] = "带有星号(*)的字段是必须填写的.";

$LANG['NEW_PASS_DESC'] = "请输入您的电子邮件地址，然后按发送密码按钮。<br /><br />您很快就会收到新的密码，请用新密码访问。<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "输入您的用户名以及电子邮件地址，然后按发送密码按钮。<br /><br />您很快就会收到新的密码。<br /><br />";
$LANG['RESETTING_PASSWORD'] = "您的新密码会发到指定的邮件地址。<br /><br />收到新密码后您可以登录并可根据需要修改密码。<br /><br />";

$LANG['SEARCH_TITLE'] = "搜索";
$LANG['KEYWORDS'] = "关键词";
$LANG['COMPANY_SEARCH'] = "搜索公司";
$LANG['COMPANY_LIST'] = "公司列表";
$LANG['SENT_RECVD'] = "发送/接收";
$LANG['BOTH_SENT_RECVD'] = "发出以及收到的传真";
$LANG['ONLY_MY_SENT'] = "仅我发出的传真";
$LANG['ONLY_RECVD'] = "仅收到的传真";
$LANG['CONCLUSION'] = "共找到%d条结果";
$LANG['NOKEYWORD'] = "没有找到结果";

$LANG['SEARCH_WHITEPAGES'] = "搜索白页";

$LANG['PWD_NEEDS_RESET'] = "继续使用前必须更改密码.";
$LANG['PWD_REQUIREMENTS'] = "密码长度至少为".MIN_PASSWD_SIZE."个字符.";
$LANG['OPASS'] = "旧密码";
$LANG['NPASS'] = "新密码";
$LANG['VPASS'] = "重复密码";
$LANG['OPASS_WRONG'] = "旧密码错误";
$LANG['NAME_MISSING'] = "必须输入名字";

$LANG['MODIFY_FAXNUMS'] = "修改公司传真号码";
$LANG['MODIFY_EMAILS'] = "修改邮件地址簿";
$LANG['TITLE_FAXNUMS'] = "传真号码";
$LANG['TITLE_EMAILS'] = "Email地址";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "新用户详细资料";
$LANG['NEW_USER_MESSAGE'] = "%s您好,

该邮件含有您登录邮件管理系统 AvantFAX (http://%s)的用户名以及密码

用户名 - %s
密码 - %s

该邮件由系统自动生成，请勿回复。";

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

$LANG['FAXCAT_NOT_CREATED'] = "没有创建传真分类'%s'";
$LANG['FAXCAT_ALREADY_EXISTS'] = "传真分类'%s'已存在";

$LANG['FAX_FAILED'] = "传真发送有问题";
$LANG['FAX_WHY']["done"] = "完成";
$LANG['FAX_WHY']["format_failed"] = "格式错误";
$LANG['FAX_WHY']["no_formatter"] = "没有格式转换器";
$LANG['FAX_WHY']["poll_no_document"] = "poll no document";
$LANG['FAX_WHY']["killed"] = "终止";
$LANG['FAX_WHY']["rejected"] = "拒绝";
$LANG['FAX_WHY']["blocked"] = "阻止";
$LANG['FAX_WHY']["removed"] = "移除";
$LANG['FAX_WHY']["timedout"] = "超时";
$LANG['FAX_WHY']["poll_rejected"] = "poll被拒绝";
$LANG['FAX_WHY']["poll_failed"] = "poll失败";
$LANG['FAX_WHY']["requeued"] = "重新排队";

$LANG['COMPANY_EXISTS'] = "公司名称已存在";
$LANG['FAXNUMID_NOT_CREATED'] = "无法生成faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "没有对应该传真号的公司";
$LANG['CANT_CHANGE_FAXNUM'] = "不能更改已经存在的传真号码";

$LANG['MODEM_EXISTS'] = "Modem设备已存在";
$LANG['MODEM_NOT_CREATED'] = "Modem设备未创建";
$LANG['NO_MODEMS_CONFIGURED'] = "未配置modem";
$LANG['MODEM_DOESNT_EXIST'] = "Modem %s不存在";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "分类已删除";
$LANG['ADMIN_FAXCAT_CREATED'] = "分类已创建";
$LANG['ADMIN_FAXCAT_UPDATED'] = "分类已更新";

$LANG['ADMIN_MODEM_CREATED'] = "Modem已创建";
$LANG['ADMIN_MODEM_DELETED'] = "Modem已删除";
$LANG['ADMIN_MODEM_UPDATED'] = "Modem已更新";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "空闲";
$LANG['FAXSEND'] = "正在发送传真";
$LANG['FAXRECV'] = "正在接收传真";
$LANG['FAXRECVFROM'] = "正在接收传真：";

$LANG['MODEM_DEVICE'] = "设备";
$LANG['MODEM_CONTACT'] = "联系人";
$LANG['MODEM_ALIAS'] = "别名";

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
$LANG['ADMIN_USERS'] = "用户";
$LANG['ADMIN_NEW_USER'] = "新用户";
$LANG['ADMIN_EDIT_USER'] = "更改用户";
$LANG['ADMIN_DEL_USER'] = "删除用户";
$LANG['ADMIN_LAST_LOGIN'] = "最近一次登录";
$LANG['ADMIN_LAST_IP'] = "最近登录IP";
$LANG['ADMIN_USER_LIST'] = "用户清单";
$LANG['ADMIN_FAXCATS'] = "传真分类";
$LANG['ADMIN_CONFMODEMS'] = "配置modem";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "统计";
$LANG['ADMIN_SYSLOGS'] = "系统日志";
$LANG['ADMIN_SYSFUNC'] = "系统功能";
$LANG['ADMIN_NOUSERS'] = "没有创建用户";
$LANG['ADMIN_ACC_ENABLED'] = "帐户有效";
$LANG['ADMIN_PWDCYCLE'][] = "密码失效周期";
$LANG['ADMIN_PWDCYCLE'][] = "从不";
$LANG['ADMIN_PWDCYCLE'][] = "每3个月";
$LANG['ADMIN_PWDCYCLE'][] = "每6个月";
$LANG['ADMIN_PWDEXP'] = "密码失效日期";
$LANG['SUPERUSER'] = "超级用户";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "用户允许删除传真";
$LANG['ADMIN_FAXLINES'] = "允许查看的传真线";
$LANG['ADMIN_CATEGORIES'] = "允许查看的传真类别";
$LANG['REBOOT'] = "重启服务器";
$LANG['SHUTDOWN'] = "关闭服务器";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "请等待";
$LANG['LOGTEXT'] = "日志信息";
$LANG['QUESTION_DELUSER'] = "确定要删除吗？";

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
