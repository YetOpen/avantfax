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

$LANGUAGE = "sv";
$LANGUAGE_NAME = "Svenska";

$LANG = array();

$LANG['ISO'] = "charset=iso-8859-1";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Ja";
$LANG['NO'] = "Nej";

$LANG['DATE'] = "Datum";
$LANG['FROM'] = "Fr�n";
$LANG['TO'] = "Till";

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

$LANG['VIEW_FAX'] = "Visa Fax";
$LANG['ROTATE_FAX'] = "Rotera Fax";
$LANG['DOWNLOAD_PDF'] = "Ladda ner PDF";
$LANG['DOWNLOAD_TIFF'] = "Ladda ner TIFF";
$LANG['EMAIL_PDF'] = "E-posta PDF";
$LANG['ADD_NOTE_FAX'] = "L�gg till notering";
$LANG['ARCHIVE_FAX'] = "Flytta till arkivet";
$LANG['DELETE_FAX'] = "Radera permanent";

$LANG['DELETE_CONFIRM'] = "Bekr�fta att du vill ta bort faxet.";

$LANG['ASSIGN_CNAME'] = "Tilldela ett f�retagsnamn";
$LANG['ASSIGN_MISSING'] = "Du m�ste mata in ett f�retagsnamn";
$LANG['ASSIGN_NOTE'] = "�ndra faxets notering / beskrivning";
$LANG['ASSIGN_NOTE_SAVED'] = "Notering / beskrivning sparad.";
$LANG['ASSIGN_OK'] = "F�retagsnamnet sparat.";
$LANG['FAXES'] = "fax";

$LANG['NAME'] = "Namn";
$LANG['DESCRIPTION'] = "Beskrivning";
$LANG['SAVE'] = "Spara";
$LANG['DELETE'] = "Radera";
$LANG['CANCEL'] = "Avbryt";
$LANG['CREATE'] = "Skapa";
$LANG['EMAIL'] = "E-post";
$LANG['SELECT'] = "V�lj";
$LANG['CONTACT_SAVED'] = "Kontaktinfo sparades";
$LANG['CONTACT_DELETED'] = "Kontakten togs bort";
$LANG['RUBRICA_SAVED'] = "F�retagsinfo sparades";
$LANG['RUBRICA_DELETED'] = "F�retaget togs bort";

$LANG['FAX_FILES'] = "V�lj filer att faxa";
$LANG['FAX_DEST'] = "Mottagande faxnummer";
$LANG['FAX_CPAGE'] = "Anv�nd f�rs�ttsblad";
$LANG['FAX_REGARDING'] = "Ang�nde";
$LANG['FAX_COMMENTS'] = "Kommentarer";
$LANG['FAX_FILETYPES'] = "Du kan bara bifoga filer i formaten: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Du m�ste v�lja en fil att faxa";
$LANG['FAX_DEST_MISSING'] = "Du m�ste fylla i mottagande faxnummer";
$LANG['FAX_SUBMITTED'] = "Ditt fax har lagts till den utg�nde faxk�n. Du kommer att f� en bekr�ftelse via e-post n�r det har skickats.";
$LANG['FAX_FILESIZE'] = "Filen �verskrider storleksgr�nsen.";
$LANG['FAX_MAXSIZE'] = "Maximal filstorlek �r $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Ditt namn";
$LANG['UPDATE'] = "Uppdatera";
$LANG['USER_DETAILS_SAVED'] = "Anv�ndarinst�llningarna sparades.";

$LANG['LANGUAGE'] = "Spr�k";
$LANG['EMAIL_SIG'] = "E-postsignatur";

$LANG['NEXT_FAX'] = "N�sta Fax";
$LANG['PREV_FAX'] = "F�reg�nde Fax";

$LANG['LOGIN_TEXT'] = "Fyll i ditt anv�ndarnamn och l�senord f�r att komma �t faxsidorna.";
$LANG['LOGIN_DISABLED'] = "Ditt konto �r inaktiverat, kontakta systemadministrat�ren.";
$LANG['LOGIN_INCORRECT'] = "Felaktigt anv�ndarnamn eller l�senord. Var god f�rs�k igen.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "Anv�ndarnamn";
$LANG['PASSWORD'] = "L�senord";
$LANG['USER'] = "Anv�ndare";
$LANG['BUTTON_LOGIN'] = "Logga in";
$LANG['BUTTON_LOGOUT'] = "Logga ut";
$LANG['BUTTON_SETTINGS'] = "Inst�llningar";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Inkorg";
$LANG['MENU_OUTBOX'] = "Outbox"; // <--- NEW
$LANG['MENU_SENDFAX'] = "Skicka Fax";
$LANG['MENU_ARCHIVE'] = "Arkiv";
$LANG['MENU_CONTACTS'] = "Kontakter";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "E-post";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "F�retag";
$LANG['CONTACT_HEADER_NEWFAX'] = "Nytt faxnummer";
$LANG['CONTACT_HEADER_FAXNUM'] = "Faxnummer";
$LANG['NEW_ENTRY'] = "Ny post";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES; // <----- NEW
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts"; // <----- NEW
$LANG['UPLOAD_BUTTON'] = "Upload"; // <----- NEW

$LANG['SEND_EMAIL_HEADER'] = "Vidarebfordra fax via e-post";
$LANG['EMAIL_RECIPIENTS'] = "E-postmottagare";
$LANG['MESSAGE_PROMPT'] = "E-postmeddelande";
$LANG['BUTTON_SEND'] = "Skicka";
$LANG['SUBJECT'] = "�mne";
$LANG['PDF_FILENAME'] = "PDF:ens filnamn";

$LANG['EMAIL_SUCCESS'] = "E-postmeddelandet skickades.";
$LANG['EMAIL_FAILURE'] = "Misslyckades att skicka e-postmeddelandet.";

$LANG['PN_PAGE'] = "Sida";
$LANG['PN_PAGE_UP'] = "Visa f�reg�ende sida";
$LANG['PN_PAGE_DN'] = "Visa n�sta sida";
$LANG['PN_PAGES'] = "Sidor";
$LANG['PN_OF'] = "av";

$LANG['NUM_DIALS'] = "Dials"; // <--- NEW
$LANG['KILL_JOB'] = "Kill job"; // <--- NEW
$LANG['PROMPT_CLOSEWINDOW'] = "St�ng f�nstret";

$LANG['LAST_UPDATED'] = "Senast uppdaterad";
$LANG['BACK'] = "[ Tillbaka ]";
$LANG['EDIT'] = "Editera";
$LANG['ADD'] = "L�gg till";
$LANG['WARNCAT'] = "V�lj kategori";
$LANG['TITLE'] = "Titel";
$LANG['CATEGORY'] = "Kategori";
$LANG['CATEGORY_NAME'] = "Kategorinamn";

$LANG['LAST_MOD'] = "Senast �ndrad av";

$LANG['MONTHS'][] = array("");
$LANG['MONTHS'][] = "januari";
$LANG['MONTHS'][] = "februari";
$LANG['MONTHS'][] = "mars";
$LANG['MONTHS'][] = "april";
$LANG['MONTHS'][] = "maj";
$LANG['MONTHS'][] = "juni";
$LANG['MONTHS'][] = "juli";
$LANG['MONTHS'][] = "augusti";
$LANG['MONTHS'][] = "september";
$LANG['MONTHS'][] = "oktober";
$LANG['MONTHS'][] = "november";
$LANG['MONTHS'][] = "december";

$LANG['ERROR_PASS'] = "Ingen matchande anv�ndare hittades.";
$LANG['NEWPASS_MSG'] = "Anv�ndarkontot %s har den h�r e-postadressen registrerad. En webanv�ndare p� %s har beg�rt ut ett nytt l�senord f�r anv�ndaren.

Ditt nya l�senord �r: %s

Om n�got blivit fel kan du logga in med ditt nya l�senord och �ndra till ett du sj�lv vill ha.";

$LANG['ADMIN_NEWPASS_MSG'] = "Administrat�rsl�senordet har blivit �terst�llt till:\n\t%s\n av en anv�ndare p� %s";

$LANG['REGWARN_MAIL'] = "Var v�nlig fyll i en giltig e-postadress";

$LANG['REGWARN_PASS'] = "Var v�nlig fyll i ett giltigt l�senord. Det m�ste inneh�lla ".MIN_PASSWD_SIZE." eller fler tecken i serierna 0-9, a-z och A-Z.";
$LANG['REGWARN_VPASS2'] = "L�senordet och verifieringen st�mmer inte �verens, var v�nlig f�rs�k igen.";
$LANG['REGWARN_USERNAME_INUSE'] = "Detta anv�ndarnamn finns redan i bruk, f�rs�k med ett annat.";

$LANG['USER_UPDATE_ERROR'] = "Ett fel uppstod n�r kontot uppdaterades";
$LANG['PASS_TOO_LONG'] = "L�senordet �r f�r l�ngt";
$LANG['PASS_TOO_SHORT'] = "L�senordet �r f�r kort";
$LANG['PASS_ALREADY_USED'] = "Detta l�senord har redan anv�nts, var v�nlig skapa ett nytt";
$LANG['PASS_ERROR_CHANGING'] = "Ett fel uppstod n�r l�senordet skulle �ndras f�r";
$LANG['PASS_ERROR_RESETTING'] = "Ett fel uppstod n�r l�senordet skulle �terst�llas f�r";
$LANG['ERROR_SENDING_EMAIL'] = "E-postmeddelandet gick inte att skicka";
$LANG['REGWARN_USERNAME'] = "Anv�ndarnamnet f�r bara inneh�lla alfanumeriska tecken";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "E-postadressen anv�nds redan";

$LANG['LOST_PASSWORD'] = "Har du gl�mt l�senordet?";

$LANG['PROMPT_UNAME'] = "Anv�ndarnamn";
$LANG['PROMPT_PASSWORD'] = "Password"; // <----- NEW
$LANG['PROMPT_CAN_REUSE_PWD'] = "User can reuse old passwords"; // <----- NEW
$LANG['REPLY_TO_FAX'] = "Reply to FAX"; // <------ NEW
$LANG['REPLY_TO_FAX_TIP'] = "The original fax will be the first document faxed after the coverpage"; // <------ NEW
$LANG['TITLE_DISTROLIST'] = "Distribution Lists"; // <----- NEW
$LANG['DISTROLIST_NAME'] = "List name"; // <----- NEW
$LANG['DISTROLIST_DELETE'] = "Delete list"; // <----- NEW
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Delete this distribution list?"; // <----- NEW
$LANG['DISTROLIST_SAVENAME'] = "Save list name"; // <----- NEW

$LANG['CHANGES_SAVED'] = "Changes saved"; // <----- NEW
$LANG['DISTROLIST_DELETED'] = "List deleted"; // <----- NEW
$LANG['DISTROLIST_NOT_CREATED'] = "List not created"; // <----- NEW
$LANG['DISTROLIST_EXISTS'] = "List already exists"; // <----- NEW
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Enter a name for the list"; // <----- NEW
$LANG['DISTROLIST_ADD'] = "Add entries"; // <----- NEW
$LANG['DISTROLIST_REMOVE'] = "Remove entries"; // <----- NEW
$LANG['DISTROLIST_REFRESH_LIST'] = "Refresh List"; // <----- NEW

$LANG['PROMPT_EMAIL'] = "E-postadress";
$LANG['BUTTON_SEND_PASS'] = "Skicka l�senord";
$LANG['REGISTER_VPASS'] = "Verifiera l�senord";
$LANG['FIELDS_REQUIRED'] = "F�lt markerade med en asterisk (*) �r obligatoriska.";

$LANG['NEW_PASS_DESC'] = "Fyll i din e-postadress och klicka p� knappen 'Skicka l�senord'.<br /><br />Du kommer att f� ett nytt l�senord utskickat alldeles strax.  Anv�nd det nya l�senordet f�r att komma in p� sidan.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Fyll i ditt anv�ndarnamn och din e-postadress och klicka p� knappen 'Skicka l�senord'.<br /><br />Du kommer att f� ett nytt l�senord utskickat alldeles strax.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Ditt l�senord kommer att skickas till den angivna e-postadressen.<br /><br />N�r du tagit emot ditt nya l�senord kan du logga in och �ndra det.<br /><br />";

$LANG['SEARCH_TITLE'] = "S�k";
$LANG['KEYWORDS'] = "S�kord";
$LANG['COMPANY_SEARCH'] = "F�retagss�kning";
$LANG['COMPANY_LIST'] = "F�retagslista";
$LANG['SENT_RECVD'] = "Skickat / Mottaget";
$LANG['BOTH_SENT_RECVD'] = "B�de skickade och mottagna fax";
$LANG['ONLY_MY_SENT'] = "Bara skickade fax";
$LANG['ONLY_RECVD'] = "Bara mottagna fax";
$LANG['CONCLUSION'] = "Hittade totalt %d resultat.";
$LANG['NOKEYWORD'] = "Hittade inga resultat";

$LANG['SEARCH_WHITEPAGES'] = "S�k i 'vita sidorna'";

$LANG['PWD_NEEDS_RESET'] = "Ditt l�senord m�ste �ndras innan du kan forts�tta.";
$LANG['PWD_REQUIREMENTS'] = "L�senordet m�ste inneh�lla minst ".MIN_PASSWD_SIZE." tecken";
$LANG['OPASS'] = "Gammalt l�senord";
$LANG['NPASS'] = "Nytt l�senord";
$LANG['VPASS'] = "Verifiera l�senordet";
$LANG['OPASS_WRONG'] = "Det gamla l�senordet �r fel.";
$LANG['NAME_MISSING'] = "Du m�ste ange ett namn.";

$LANG['MODIFY_FAXNUMS'] = "�ndra faxnummer";
$LANG['MODIFY_EMAILS'] = "�ndra i e-postadressboken";
$LANG['TITLE_FAXNUMS'] = "Faxnummer";
$LANG['TITLE_EMAILS'] = "E-postadresser";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Nya anv�ndaruppgifter";
$LANG['NEW_USER_MESSAGE'] = "Hej %s,

Det h�r brevet inneh�ller ditt anv�ndarnamn och l�senord f�r att logga in p� Avisita och Rits faxsystem AvantFAX (http://%s)

Anv�ndarnamn - %s
L�senord - %s

Var v�nlig att inte svara p� detta brev eftersom det �r automatgenererat och endast skickat i informationssyfte.";

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

$LANG['FAXCAT_NOT_CREATED'] = "Faxkategorin '%s' skapades inte";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Faxkategorin '%s' finns redan";

$LANG['FAX_FAILED'] = "Ett problem uppstod n�r faxet skulle skickas.";
$LANG['FAX_WHY']["done"] = "Klar";
$LANG['FAX_WHY']["format_failed"] = "formateringen misslyckades";
$LANG['FAX_WHY']["no_formatter"] = "ingen formaterare";
$LANG['FAX_WHY']["poll_no_document"] = "dokumentet saknades vid pollning";
$LANG['FAX_WHY']["killed"] = "d�dad";
$LANG['FAX_WHY']["rejected"] = "avvisat";
$LANG['FAX_WHY']["blocked"] = "blockerat";
$LANG['FAX_WHY']["removed"] = "borttaget";
$LANG['FAX_WHY']["timedout"] = "tog f�r l�ng tid";
$LANG['FAX_WHY']["poll_rejected"] = "pollning avvisades";
$LANG['FAX_WHY']["poll_failed"] = "pollning misslyckades";
$LANG['FAX_WHY']["requeued"] = "�terk�at";

$LANG['COMPANY_EXISTS'] = "F�retagsnamnet finns redan";
$LANG['FAXNUMID_NOT_CREATED'] = "Kunde inte skapa faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Inget f�retag kopplat till detta faxnummer";
$LANG['CANT_CHANGE_FAXNUM'] = "Du kan inte �ndra ett etablerat faxnummer";

$LANG['MODEM_EXISTS'] = "Modemenheten finns redan";
$LANG['MODEM_NOT_CREATED'] = "Modemenheten skapades ej";
$LANG['NO_MODEMS_CONFIGURED'] = "Inga modem konfigurerade";
$LANG['MODEM_DOESNT_EXIST'] = "Modemet %s finns inte";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "Kategorin togs bort";
$LANG['ADMIN_FAXCAT_CREATED'] = "Kategorin skapades";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Kategorin uppdaterades";

$LANG['ADMIN_MODEM_CREATED'] = "Modemet skapades";
$LANG['ADMIN_MODEM_DELETED'] = "Modemet uppdaterades";
$LANG['ADMIN_MODEM_UPDATED'] = "Modemet togs bort";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Inaktiv";
$LANG['FAXSEND'] = "Skickar ett fax";
$LANG['FAXRECV'] = "Tar emot ett fax";
$LANG['FAXRECVFROM'] = "Tar emot ett fax fr?";

$LANG['MODEM_DEVICE'] = "Enhet";
$LANG['MODEM_CONTACT'] = "Kontakt";
$LANG['MODEM_ALIAS'] = "Alias";

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
$LANG['ADMIN_USERS'] = "Anv�ndare";
$LANG['ADMIN_NEW_USER'] = "Ny anv�ndare";
$LANG['ADMIN_EDIT_USER'] = "�ndra anv�ndare";
$LANG['ADMIN_DEL_USER'] = "Ta bort anv�ndare";
$LANG['ADMIN_LAST_LOGIN'] = "Senaste inloggning";
$LANG['ADMIN_LAST_IP'] = "Senaste IP-adress";
$LANG['ADMIN_USER_LIST'] = "Anv�ndarlista";
$LANG['ADMIN_FAXCATS'] = "Faxkategorier";
$LANG['ADMIN_CONFMODEMS'] = "Konfigurera modem";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Statistik";
$LANG['ADMIN_SYSLOGS'] = "Systemloggar";
$LANG['ADMIN_SYSFUNC'] = "Systemfunktioner";
$LANG['ADMIN_NOUSERS'] = "Inga anv�ndare skapades";
$LANG['ADMIN_ACC_ENABLED'] = "Kontot aktivt";
$LANG['ADMIN_PWDCYCLE'][] = "Nollst�ll l�senord";
$LANG['ADMIN_PWDCYCLE'][] = "Aldrig";
$LANG['ADMIN_PWDCYCLE'][] = "Var 3:e m�nad";
$LANG['ADMIN_PWDCYCLE'][] = "Var 6:e m�nad";
$LANG['ADMIN_PWDEXP'] = "Nollst�ll l�senordet den";
$LANG['SUPERUSER'] = "Superanv�ndare";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "Anv�ndaren kan ta bort fax";
$LANG['ADMIN_FAXLINES'] = "Visa faxlinjer";
$LANG['ADMIN_CATEGORIES'] = "Visa faxkategorier";
$LANG['REBOOT'] = "Starta om servern";
$LANG['SHUTDOWN'] = "St�ng av servern";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "Var v�nlig v�nta";
$LANG['LOGTEXT'] = "Loginformation";
$LANG['QUESTION_DELUSER'] = "�r du s�ker p� att du vill ta bort";

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
