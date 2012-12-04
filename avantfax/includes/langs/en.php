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

$LANGUAGE = "en";
$LANGUAGE_NAME = "English";

$LANG = array();

$LANG['ISO'] = "charset=UTF-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Yes";
$LANG['NO'] = "No";

$LANG['DATE'] = "Date";
$LANG['FROM'] = "From";
$LANG['TO'] = "To";

$LANG['DATE_START'] = "Start Date";
$LANG['DATE_END'] = "End Date";

$LANG['TO_PERSON'] = "To person";
$LANG['TO_COMPANY'] = "To company";
$LANG['TO_LOCATION'] = "To location";
$LANG['TO_VOICENUMBER'] = "To voice number";

$LANG['MY_COMPANY'] = "Company";
$LANG['MY_LOCATION'] = "Location";
$LANG['MY_VOICENUMBER'] = "Voice number";
$LANG['MY_FAXNUMBER'] = "Fax number";

$LANG['VIEW_FAX'] = "View Fax";
$LANG['ROTATE_FAX'] = "Rotate Fax";
$LANG['DOWNLOAD_PDF'] = "Download PDF";
$LANG['DOWNLOAD_TIFF'] = "Download TIFF";
$LANG['EMAIL_PDF'] = "Email PDF";
$LANG['ADD_NOTE_FAX'] = "Add a note";
$LANG['ARCHIVE_FAX'] = "Move to Archive";
$LANG['DELETE_FAX'] = "Permanently delete";

$LANG['DELETE_CONFIRM'] = "Please confirm you want to delete this fax.";

$LANG['ASSIGN_CNAME'] = "Assign a company name";
$LANG['ASSIGN_MISSING'] = "You must enter a company name";
$LANG['ASSIGN_NOTE'] = "Modify this fax's note / description";
$LANG['ASSIGN_NOTE_SAVED'] = "Note / description saved.";
$LANG['ASSIGN_OK'] = "Company name was successfully assigned.";
$LANG['FAXES'] = "faxes";

$LANG['NAME'] = "Name";
$LANG['DESCRIPTION'] = "Description";
$LANG['SAVE'] = "Save";
$LANG['DELETE'] = "Delete";
$LANG['CANCEL'] = "Cancel";
$LANG['CREATE'] = "Create";
$LANG['EMAIL'] = "Email";
$LANG['SELECT'] = "Select";
$LANG['CONTACT_SAVED'] = "Contact details saved";
$LANG['CONTACT_DELETED'] = "Contact deleted";
$LANG['RUBRICA_SAVED'] = "Company details saved";
$LANG['RUBRICA_DELETED'] = "Company deleted";

$LANG['FAX_FILES'] = "Select the files to FAX";
$LANG['FAX_DEST'] = "Destination fax numbers";
$LANG['FAX_CPAGE'] = "Use cover page";
$LANG['FAX_REGARDING'] = "Regarding";
$LANG['FAX_COMMENTS'] = "Comments";
$LANG['FAX_FILETYPES'] = "You can attach the following file types: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "You must choose a file to fax";
$LANG['FAX_DEST_MISSING'] = "You must enter the destination fax numbers";
$LANG['FAX_SUBMITTED'] = "Your fax has been successfully queued to be faxed.<br />You will receive a confirmation email once the fax is sent.";
$LANG['FAX_FILESIZE'] = "File size is over the limit.";
$LANG['FAX_MAXSIZE'] = "Max file size is $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue";

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded";
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized";
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit";
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)";
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)";
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded";
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory";
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file";

$LANG['YOUR_NAME'] = "Your name";
$LANG['UPDATE'] = "Update";
$LANG['USER_DETAILS_SAVED'] = "User settings have been saved.";

$LANG['LANGUAGE'] = "Language";
$LANG['EMAIL_SIG'] = "E-mail signature";

$LANG['NEXT_FAX'] = "Next Fax";
$LANG['PREV_FAX'] = "Previous Fax";

$LANG['LOGIN_TEXT'] = "Enter your username and password to access the fax interface.";
$LANG['LOGIN_DISABLED'] = "Your account has been disabled.  Please contact the administrator.";
$LANG['LOGIN_INCORRECT'] = "Incorrect username or password.<br />Please try again.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX.";
$LANG['ACCESS_DENIED'] = "Access denied";

$LANG['USERNAME'] = "username";
$LANG['PASSWORD'] = "password";
$LANG['USER'] = "User";
$LANG['BUTTON_LOGIN'] = "Login";
$LANG['BUTTON_LOGOUT'] = "Logout";
$LANG['BUTTON_SETTINGS'] = "Settings";

$LANG['MENU_MENU'] = "Menu";
$LANG['MENU_INBOX'] = "Inbox";
$LANG['MENU_OUTBOX'] = "Outbox";
$LANG['MENU_SENDFAX'] = "Send Fax";
$LANG['MENU_ARCHIVE'] = "Archive";
$LANG['MENU_CONTACTS'] = "Contacts";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes";
$LANG['FAXES_PER_PAGE']  = "faxes per page";
$LANG['INBOX_SHOW'] = "Inbox - show";
$LANG['ARCHIVE_SHOW'] = "Archive - show";

$LANG['CONTACT_HEADER_EMAIL'] = "Email";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Company";
$LANG['CONTACT_HEADER_NEWFAX'] = "New fax number";
$LANG['CONTACT_HEADER_FAXNUM'] = "Fax number";
$LANG['NEW_ENTRY'] = "New entry";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts";
$LANG['UPLOAD_BUTTON'] = "Upload";

$LANG['SEND_EMAIL_HEADER'] = "Forward fax via email";
$LANG['EMAIL_RECIPIENTS'] = "Email recipients";
$LANG['EMAIL_CCRECIPIENTS'] = "Email recipients (CC)";
$LANG['EMAIL_BCCRECIPIENTS'] = "Email recipients (BCC)";
$LANG['MESSAGE_PROMPT'] = "Email message";
$LANG['BUTTON_SEND'] = "Send";
$LANG['SUBJECT'] = "Subject";
$LANG['PDF_FILENAME'] = "PDF file name";

$LANG['EMAIL_SUCCESS'] = "The email was sent successfully.";
$LANG['EMAIL_FAILURE'] = "The email failed to send.";

$LANG['PN_PAGE'] = "Page";
$LANG['PN_PAGE_UP'] = "Page Up";
$LANG['PN_PAGE_DN'] = "Page Down";
$LANG['PN_PAGES'] = "Pages";
$LANG['PN_OF'] = "of";
$LANG['NUM_DIALS'] = "Dials";
$LANG['KILL_JOB'] = "Kill job";

$LANG['PROMPT_CLOSEWINDOW'] = "Close Window";

$LANG['LAST_UPDATED'] = "Last Updated";
$LANG['BACK'] = "Back";
$LANG['EDIT'] = "Edit";
$LANG['ADD'] = "Add";
$LANG['WARNCAT'] = "Please select a category";
$LANG['TITLE'] = "Title";
$LANG['CATEGORY'] = "Category";
$LANG['CATEGORY_NAME'] = "Category name";

$LANG['LAST_MOD'] = "Last modified by";

$LANG['MONTHS'] = array("");
$LANG['MONTHS'][] = "January";
$LANG['MONTHS'][] = "February";
$LANG['MONTHS'][] = "March";
$LANG['MONTHS'][] = "April";
$LANG['MONTHS'][] = "May";
$LANG['MONTHS'][] = "June";
$LANG['MONTHS'][] = "July";
$LANG['MONTHS'][] = "August";
$LANG['MONTHS'][] = "September";
$LANG['MONTHS'][] = "October";
$LANG['MONTHS'][] = "November";
$LANG['MONTHS'][] = "December";

$LANG['ERROR_PASS'] = "Sorry, no corresponding user was found.";
$LANG['NEWPASS_MSG'] = "The user account %s has this email associated with it.  A web user from %s has just requested that a new password be sent.

Your New Password is: %s

If this was an error just login with your new password and then change your password to what you would like it to be.";

$LANG['ADMIN_NEWPASS_MSG'] = "The admin account password was reset to:\n\t%s\n by a user from %s";

$LANG['REGWARN_MAIL'] = "Please enter a valid e-mail address.";
$LANG['REGWARN_PASS'] = "Please enter a valid password.  No spaces, more than ".MIN_PASSWD_SIZE." characters and contain 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Password and verification do not match, please try again.";
$LANG['REGWARN_USERNAME_INUSE'] = "This username already in use. Please try another.";

$LANG['USER_UPDATE_ERROR'] = "Error updating account";
$LANG['PASS_TOO_LONG'] = "Password too long";
$LANG['PASS_TOO_SHORT'] = "Password too short";
$LANG['PASS_ALREADY_USED'] = "This password has already been used.  Please create a new one.";
$LANG['PASS_ERROR_CHANGING'] = "Error changing password for";
$LANG['PASS_ERROR_RESETTING'] = "Error resetting password for";
$LANG['ERROR_SENDING_EMAIL'] = "Email failed to send";
$LANG['REGWARN_USERNAME'] = "Non-alphanumeric characters are not allowed in username.";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "Email address is already in use.";

$LANG['LOST_PASSWORD'] = "Lost your Password?";

$LANG['PROMPT_UNAME'] = "Username";
$LANG['PROMPT_PASSWORD'] = "Password";
$LANG['PROMPT_CAN_REUSE_PWD'] = "User can reuse old passwords";
$LANG['REPLY_TO_FAX'] = "Reply to FAX";
$LANG['REPLY_TO_FAX_TIP'] = "The original fax will be the first document faxed after the coverpage";
$LANG['PROMPT_EMAIL'] = "E-mail Address";
$LANG['BUTTON_SEND_PASS'] = "Send Password";
$LANG['REGISTER_VPASS'] = "Verify Password";
$LANG['FIELDS_REQUIRED'] = "Fields marked with an asterisk (*) are required.";

$LANG['NEW_PASS_DESC'] = "Please enter your e-mail address then click on the Send Password button.<br /><br />You will receive a new password shortly.<br /><br />Use this new password to access the site.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Enter your username and e-mail address then click on the Send Password button.<br /><br />You will receive a new password shortly.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Your password will be sent to the given e-mail address.<br /><br />Once you have received your new password you can login in and change it.<br /><br />";

$LANG['SEARCH_TITLE'] = "Search";
$LANG['KEYWORDS'] = "Keywords";
$LANG['COMPANY_SEARCH'] = "Company search";
$LANG['COMPANY_LIST'] = "Company list";
$LANG['SENT_RECVD'] = "Sent / Received";
$LANG['BOTH_SENT_RECVD'] = "Both sent and received faxes";
$LANG['ONLY_MY_SENT'] = "Only sent faxes";
$LANG['ONLY_RECVD'] = "Only received faxes";
$LANG['CONCLUSION'] = "Total %d results found.";
$LANG['NOKEYWORD'] = "No results were found";

$LANG['SEARCH_WHITEPAGES'] = "Search the White Pages";

$LANG['PWD_NEEDS_RESET'] = "Your password must be changed before you can continue.";
$LANG['PWD_REQUIREMENTS'] = "Password must be at least ".MIN_PASSWD_SIZE." characters.";
$LANG['OPASS'] = "Old Password";
$LANG['NPASS'] = "New Password";
$LANG['VPASS'] = "Verify Password";
$LANG['OPASS_WRONG'] = "Old password is incorrect.";
$LANG['NAME_MISSING'] = "You must enter a name.";

$LANG['MODIFY_FAXNUMS'] = "Modify company fax numbers";
$LANG['MODIFY_EMAILS'] = "Modify your email address book";
$LANG['TITLE_FAXNUMS'] = "Fax Numbers";
$LANG['TITLE_EMAILS'] = "Email Addresses";

$LANG['TITLE_DISTROLIST'] = "Distribution Lists";
$LANG['DISTROLIST_NAME'] = "List name";
$LANG['DISTROLIST_DELETE'] = "Delete list";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Delete this distribution list?";
$LANG['DISTROLIST_SAVENAME'] = "Save list name";

$LANG['CHANGES_SAVED'] = "Changes saved";
$LANG['DISTROLIST_DELETED'] = "List deleted";
$LANG['DISTROLIST_NOT_CREATED'] = "List not created";
$LANG['DISTROLIST_EXISTS'] = "List already exists";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Enter a name for the list";
$LANG['DISTROLIST_ADD'] = "Add entries";
$LANG['DISTROLIST_REMOVE'] = "Remove entries";
$LANG['DISTROLIST_REFRESH_LIST'] = "Refresh List";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "New User Details";
$LANG['NEW_USER_MESSAGE'] = "Hello %s,

This email contains your username and password to log into AvantFAX (http://%s)

Username - %s
Password - %s

Please do not respond to this message as it is automatically generated and is for information purposes only";

$LANG['DIDROUTE_EXISTS'] = "Route already exists";
$LANG['DIDROUTE_NOT_CREATED'] = "Route was not created";
$LANG['DIDROUTE_NO_ROUTES'] = "No DID/DTMF Routes configured";
$LANG['DIDROUTE_DOESNT_EXIST'] = "Route %s does not exist";
$LANG['ADMIN_PRINTER'] = "Printer";
$LANG['PRINT'] = "Print";

$LANG['ADMIN_DIDROUTE_CREATED'] = "The route was created";
$LANG['ADMIN_DIDROUTE_DELETED'] = "The route was deleted";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "The route was updated";
$LANG['ADMIN_DIDROUTES'] = "DID/DTMF Route groups";
$LANG['DIDROUTE_ROUTECODE'] = "DID/DTMF digits";
$LANG['DIDROUTE_CATCHALL'] = "Catch All";
$LANG['ADMIN_CONFDIDROUTING'] = "DID/DTMF Groups";
$LANG['GROUP'] = "Group";

$LANG['USER_ANYMODEM'] = "User can fax from any modem";

$LANG['BARCODEROUTE_BARCODE'] = "Barcode";
$LANG['MISSING_BARCODE'] = "Missing barcode";
$LANG['ADMIN_BARCODEROUTE_DELETED'] = "Barcode route deleted";
$LANG['ADMIN_BARCODEROUTE_UPDATED'] = "Barcode route updated";
$LANG['ADMIN_BARCODEROUTE_CREATED'] = "Barcode route created";
$LANG['BARCODEROUTE_NOT_CREATED'] = "Barcode route not created";
$LANG['BARCODEROUTE_EXISTS'] = "Barcode route exists";
$LANG['BARCODEROUTE_NO_ROUTES'] = "No barcode routes";
$LANG['BARCODEROUTE_DOESNT_EXIST'] = "Barcode route %s doesn't exist";

$LANG['FAXCAT_NOT_CREATED'] = "Fax category '%s' was not created";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Fax category '%s' already exists";

$LANG['FAX_FAILED'] = "Problem sending the fax.";
$LANG['FAX_WHY']["done"] = "Done";
$LANG['FAX_WHY']["format_failed"] = "format failed";
$LANG['FAX_WHY']["no_formatter"] = "no formatter";
$LANG['FAX_WHY']["poll_no_document"] = "poll no document";
$LANG['FAX_WHY']["killed"] = "killed";
$LANG['FAX_WHY']["rejected"] = "rejected";
$LANG['FAX_WHY']["blocked"] = "blocked";
$LANG['FAX_WHY']["removed"] = "removed";
$LANG['FAX_WHY']["timedout"] = "timed out";
$LANG['FAX_WHY']["poll_rejected"] = "poll rejected";
$LANG['FAX_WHY']["poll_failed"] = "poll failed";
$LANG['FAX_WHY']["requeued"] = "requeued";

$LANG['COMPANY_EXISTS'] = "Company name already exists";
$LANG['FAXNUMID_NOT_CREATED'] = "Could not create faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "No company for this fax number";
$LANG['CANT_CHANGE_FAXNUM'] = "You can't change an established fax number";

$LANG['MODEM_EXISTS'] = "Modem device already exists";
$LANG['MODEM_NOT_CREATED'] = "Modem device was not created";
$LANG['NO_MODEMS_CONFIGURED'] = "No modems configured";
$LANG['MODEM_DOESNT_EXIST'] = "Modem %s does not exist";

$LANG['COVER_EXISTS'] = "Cover page already exists";
$LANG['COVER_NOT_CREATED'] = "Cover page was not created";
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured";
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist";

$LANG['ADMIN_FAXCAT_DELETED'] = "The category was deleted";
$LANG['ADMIN_FAXCAT_CREATED'] = "The category was created";
$LANG['ADMIN_FAXCAT_UPDATED'] = "The category was updated";

$LANG['ADMIN_MODEM_CREATED'] = "The modem was created";
$LANG['ADMIN_MODEM_DELETED'] = "The modem was deleted";
$LANG['ADMIN_MODEM_UPDATED'] = "The modem was updated";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created";
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted";
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated";

$LANG['FAXFREE'] = "Idle";
$LANG['FAXSEND'] = "Sending a fax";
$LANG['FAXRECV'] = "Receiving a fax";
$LANG['FAXRECVFROM'] = "Receiving a fax from";

$LANG['MODEM_DEVICE'] = "Device";
$LANG['MODEM_CONTACT'] = "Contact";
$LANG['MODEM_ALIAS'] = "Alias";

$LANG['COVER_FILE'] = "File name";
$LANG['COVER_TITLE'] = "Coverpage Title";
$LANG['SELECT_COVERPAGE'] = "Select cover page";

$LANG['MISSING_CATEGORY_NAME'] = "You must enter a category name";
$LANG['MISSING_DEVICE_NAME'] = "You must enter a device name";
$LANG['MISSING_ALIAS_NAME'] = "You must enter an alias";
$LANG['MISSING_CONTACT_NAME'] = "You must enter a contact name";
$LANG['MISSING_ROUTE'] = "You must enter the DID/DTMF digits";

$LANG['MISSING_FILE_NAME'] = "You must enter a file name";
$LANG['MISSING_TITLE_NAME'] = "You must enter a title";

$LANG['ADMIN_CONFIGURE'] = "Configure...";
$LANG['ADMIN_USERS'] = "Users";
$LANG['ADMIN_NEW_USER'] = "New User";
$LANG['ADMIN_EDIT_USER'] = "Modify User";
$LANG['ADMIN_DEL_USER'] = "Delete User";
$LANG['ADMIN_LAST_LOGIN'] = "Last Login";
$LANG['ADMIN_LAST_IP'] = "Last IP";
$LANG['ADMIN_USER_LIST'] = "User List";
$LANG['ADMIN_FAXCATS'] = "Fax Categories";
$LANG['ADMIN_CONFMODEMS'] = "Modems";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages";

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by...";
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender";
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender";
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode";
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode";
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword";
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword";

$LANG['ADMIN_DASHBOARD'] = "Dashboard";
$LANG['ADMIN_STATS'] = "Statistics";
$LANG['ADMIN_SYSLOGS'] = "System Logs";
$LANG['ADMIN_SYSFUNC'] = "System Functions";
$LANG['ADMIN_NOUSERS'] = "No users created";
$LANG['ADMIN_ACC_ENABLED'] = "Account active";
$LANG['ADMIN_PWDCYCLE'][] = "Password expiration cycle";
$LANG['ADMIN_PWDCYCLE'][] = "Never";
$LANG['ADMIN_PWDCYCLE'][] = "Every 3 Months";
$LANG['ADMIN_PWDCYCLE'][] = "Every 6 Months";
$LANG['ADMIN_PWDEXP'] = "Password expiration date";
$LANG['SUPERUSER'] = "Super user";
$LANG['IS_ADMIN'] = "Administrator";
$LANG['USER_CANDEL'] = "User can delete faxes";
$LANG['ADMIN_FAXLINES'] = "Viewable fax lines";
$LANG['ADMIN_CATEGORIES'] = "Viewable fax categories";
$LANG['REBOOT'] = "Reboot server";
$LANG['SHUTDOWN'] = "Shutdown server";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "Please wait";
$LANG['LOGTEXT'] = "Log information";
$LANG['QUESTION_DELUSER'] = "Are you sure you want to delete";

$LANG['TSI_ID'] = "TSI ID";
$LANG['PRIORITY'] = "Priority";
$LANG['BLACKLIST'] = "Blacklist";
$LANG['MODIFY_FAXJOB'] = "Modify Job";
$LANG['NEW_DESTINATION'] = "New Destination";
$LANG['SCHEDULE_FAX'] = "Schedule delivery";
$LANG['FAX_NUMTRIES'] = "Number of tries";
$LANG['FAX_KILLTIME'] = "Kill time";
$LANG['NOW'] = "Now";
$LANG['MINUTES'] = "Minutes";
$LANG['HOURS'] = "Hours";
$LANG['DAYS'] = "Days";

$LANG['ADMIN_CONFDYNCONF'] = "Black List";
$LANG['DYNCONF_MISSING_CALLID'] = "You must enter the CallID";
$LANG['DYNCONF_NOT_CREATED'] = "Rule not created";
$LANG['DYNCONF_EXISTS'] = "Rule exists";
$LANG['DYNCONF_CALLID'] = "Caller ID";
$LANG['DYNCONF_CREATED'] = "Rule created";
$LANG['DYNCONF_DELETED'] = "Rule deleted";
$LANG['DYNCONF_UPDATED'] = "Rule updated";
$LANG['OPTIONS'] = "Options";

$LANG['MUST_CREATE_ROUTES'] = "<a href=\"conf_didroute.php\">You must first create a DID/DTMF group</a>";
$LANG['MUST_CREATE_MODEMS'] = "<a href=\"conf_modems.php\">You must first create a modem</a>";
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">You must first create a category</a>";

$LANG['EXPLAIN_CATEGORIES'] = "Categories are useful for organizing faxes in the AvantFAX Archive.  Normal users are limited to viewing the categories assigned to them.";
$LANG['EXPLAIN_DYNCONF'] = "HylaFAX's DynamicConfig and RejectCall features are used to reject fax transmissions from known offenders.  To add an entry to this Black List, enter the Caller ID of the sender you would like to block.  Optionally, you may select a device if you only want to block this sender on that device.";
$LANG['EXPLAIN_DIDROUTE'] = "DID/DTMF routing is used to route faxes sent to a hunt group.  HylaFAX must be properly configured for this to work.  An individual entry must be created for each hunt group you intend to use with AvantFAX.  The DID/DTMF digits field is for hunt group information as received by HylaFAX -- typically the last 3 or 4 digits or even 10 digits of the fax number. The Alias field is used to describe the location or purpose for the hunt group.  For example, Sales or Support for a fax line dedicated for those departments.  The Contact field is for an email address, and every fax that arrives for this group will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Normal users can only view faxes from the hunt groups assigned to them.";
$LANG['EXPLAIN_MODEMS'] = "A Modem entry must be created for each modem device you intend to use with AvantFAX.  The Device field is for the name of the device as it is configured in HylaFAX (ie: ttyS0, ttyds01 or boston00). The Alias field is used to describe the location or purpose for the modem.  For example, Sales or Support for a fax line dedicated for those departments.  The Contact field is for an email address, and every fax that arrives on this modem will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Normal users can only view faxes from the modems assigned to them.";
$LANG['EXPLAIN_COVERS'] = "A Cover Page entry must be created for each cover page you intend to use with AvantFAX.  The File field is for the name of the template file found in the images/ folder (ie: cover.ps, custom.ps, or mycover.html). The Title field is used to describe the cover page.  For example: Generic, Sales Dept, Accounting Dept.  Anyone can choose any of the cover pages defined here.";
$LANG['EXPLAIN_FAX2EMAIL'] = "Routing by Sender (formerly Fax2Email) is for routing individual fax numbers to a specific email address.  If you want the faxes sent from 18002125555 to be emailed to sales@yourcompany.com, you must select the company in the list on the left and enter the email address into the Email field.  The Company field allows you to modify the company name as displayed in the Address Book.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Also, you may select a category to automatically categorizing the fax.";
$LANG['EXPLAIN_BARCODEROUTE'] = "Barcode based routing is used to route faxes based on the barcode contained in the fax.  Enter the barcode that you want matched to this rule in the Barcode field.  The Alias field is used to describe the purpose for this rule.  For example for a specific service or product.  The Contact field is for an email address, and every fax that arrives for this group will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Also, you may select a category to automatically categorizing the fax.";
