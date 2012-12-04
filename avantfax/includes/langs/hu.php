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

$LANGUAGE = "hu";
$LANGUAGE_NAME = "Magyar";

$LANG = array();

$LANG['ISO'] = "charset=UTF-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Igen";
$LANG['NO'] = "Nem";

$LANG['DATE'] = "Dátum";
$LANG['FROM'] = "Feladó";
$LANG['TO'] = "Címzett";
$LANG['DATE_START'] = "Kezdő Dátum";
$LANG['DATE_END'] = "Vége Dátum";

$LANG['TO_LOCATION'] = "Helynek";
$LANG['TO_VOICENUMBER'] = "Telefonszámnak";
$LANG['TO_PERSON'] = "Személynek";
$LANG['TO_COMPANY'] = "Cégnek";

$LANG['VIEW_FAX'] = "Fax megtekintése";
$LANG['ROTATE_FAX'] = "Fax forgatása";
$LANG['MY_COMPANY'] = "Cég";
$LANG['MY_LOCATION'] = "Hely";
$LANG['MY_VOICENUMBER'] = "Telefonszám";
$LANG['MY_FAXNUMBER'] = "Fax szám";

$LANG['DOWNLOAD_PDF'] = "PDF letöltése";
$LANG['DOWNLOAD_TIFF'] = "TIFF letöltése";
$LANG['EMAIL_PDF'] = "PDF küldése";
$LANG['ADD_NOTE_FAX'] = "Megjegyzés hozzáadása";
$LANG['ARCHIVE_FAX'] = "Archivumba áthelyez";
$LANG['DELETE_FAX'] = "Maradéktalan törlés";

$LANG['DELETE_CONFIRM'] = "Kérem erősítse meg a törlést!";

$LANG['ASSIGN_CNAME'] = "Cégnév hozzárendelése";
$LANG['ASSIGN_MISSING'] = "Meg kell adnia egy cégnevet";
$LANG['ASSIGN_NOTE'] = "Fax megjeygzésének módosítása";
$LANG['ASSIGN_NOTE_SAVED'] = "Megjegyzés elmentve.";
$LANG['ASSIGN_OK'] = "Cégnév sikeresen hozzárendelve.";
$LANG['FAXES'] = "fax";

$LANG['NAME'] = "Név";
$LANG['DESCRIPTION'] = "Leírás";
$LANG['SAVE'] = "Mentés";
$LANG['DELETE'] = "Törlés";
$LANG['CANCEL'] = "Mégse";
$LANG['CREATE'] = "Létrehoz";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "Kiválaszt";
$LANG['CONTACT_SAVED'] = "Kontakt tulajdonságai mentve";
$LANG['CONTACT_DELETED'] = "Kontakt törölve";
$LANG['RUBRICA_SAVED'] = "Kontakt tulajdonságai mentve";
$LANG['RUBRICA_DELETED'] = "Kontakt törölve";

$LANG['FAX_FILES'] = "Fájlok kiválasztása faxolásra";
$LANG['FAX_DEST'] = "Cél fax számok";
$LANG['FAX_CPAGE'] = "Fedőlap használata";
$LANG['FAX_REGARDING'] = "Regarding";
$LANG['FAX_COMMENTS'] = "Megjegyzések";
$LANG['FAX_FILETYPES'] = "Csak ".SENDFAXFILETYPES." fájlokat csatolhat.";
$LANG['FAX_FILE_MISSING'] = "Ki kell választania egy fájlt a faxoláshoz";
$LANG['FAX_DEST_MISSING'] = "Meg kell adnia legalább egy cél faxszámot";
$LANG['FAX_SUBMITTED'] = "A fax sikeresen sorbaállítva.<br />Kapni fog egy értesítést az elküldésről.";
$LANG['FAX_FILESIZE'] = "Fájlméret meghaladja a maximumot.";
$LANG['FAX_MAXSIZE'] = "Maximum fájlméret: $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Az Ön neve";
$LANG['UPDATE'] = "Frissítés";
$LANG['USER_DETAILS_SAVED'] = "Felhasználó beállításai mentve.";

$LANG['LANGUAGE'] = "Nyelv";
$LANG['EMAIL_SIG'] = "E-mail aláírás";

$LANG['NEXT_FAX'] = "Következő Fax";
$LANG['PREV_FAX'] = "Előző Fax";

$LANG['LOGIN_TEXT'] = "Adja meg felhasználónevét és jelszavát a fax felület eléréséhez.";
$LANG['LOGIN_DISABLED'] = "A fiókja ki lett kapcsolva.  Kérem vegye fel a kapcsolatot a rendszergazdával.";
$LANG['LOGIN_INCORRECT'] = "Érvénytelen felhasználónév, vagy jelszó.  Kérem próbálja újra.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "felhasználónév";
$LANG['PASSWORD'] = "jelszó";
$LANG['USER'] = "Felhasználó";
$LANG['BUTTON_LOGIN'] = "Belépés";
$LANG['BUTTON_LOGOUT'] = "Kilépés";
$LANG['BUTTON_SETTINGS'] = "Beállítások";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Beérkezett";
$LANG['MENU_OUTBOX'] = "Kimenő";
$LANG['MENU_SENDFAX'] = "Fax küldés";
$LANG['MENU_ARCHIVE'] = "Archívum";
$LANG['MENU_CONTACTS'] = "Kontaktok";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "Email";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Cég";
$LANG['CONTACT_HEADER_NEWFAX'] = "Új fax szám";
$LANG['CONTACT_HEADER_FAXNUM'] = "Fax szám";
$LANG['NEW_ENTRY'] = "Új bejegyzés";
$LANG['UPLOAD_CONTACTS'] = "Kontakt fájl feltöltése".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = "%d sikeresen feltöltve";
$LANG['UPLOAD_BUTTON'] = "Feltölt";

$LANG['SEND_EMAIL_HEADER'] = "Fax továbbítása email-ben";
$LANG['EMAIL_RECIPIENTS'] = "Email címzettek";
$LANG['MESSAGE_PROMPT'] = "Email üzenet";
$LANG['BUTTON_SEND'] = "Küldés";
$LANG['SUBJECT'] = "Tárgy";
$LANG['PDF_FILENAME'] = "PDF fájlnév";

$LANG['EMAIL_SUCCESS'] = "Az email sikeresen elküldve.";
$LANG['EMAIL_FAILURE'] = "Az email küldése sikertelen.";

$LANG['PN_PAGE'] = "Oldal";
$LANG['PN_PAGE_UP'] = "Oldal Fel";
$LANG['PN_PAGE_DN'] = "Oldal Le";
$LANG['PN_PAGES'] = "Oldalak";
$LANG['PN_OF'] = "of";

$LANG['NUM_DIALS'] = "Hívások"; 
$LANG['KILL_JOB'] = "Munka kilövése"; 
$LANG['PROMPT_CLOSEWINDOW'] = "Ablak bezárása";

$LANG['LAST_UPDATED'] = "Utoljára frissítve";
$LANG['BACK'] = "[ Vissza ]";
$LANG['EDIT'] = "Szerkesztés";
$LANG['ADD'] = "Hozzádás";
$LANG['WARNCAT'] = "Kérem válasszon kategóriát";
$LANG['TITLE'] = "Cím";
$LANG['CATEGORY'] = "Kategória";
$LANG['CATEGORY_NAME'] = "Kategória név";

$LANG['LAST_MOD'] = "Utoljára módosítva";

$LANG['MONTHS'][] = array ("");
$LANG['MONTHS'][] = "Január";
$LANG['MONTHS'][] = "Február";
$LANG['MONTHS'][] = "Március";
$LANG['MONTHS'][] = "Április";
$LANG['MONTHS'][] = "Május";
$LANG['MONTHS'][] = "Június";
$LANG['MONTHS'][] = "Július";
$LANG['MONTHS'][] = "Augusztus";
$LANG['MONTHS'][] = "Szeptember";
$LANG['MONTHS'][] = "Október";
$LANG['MONTHS'][] = "November";
$LANG['MONTHS'][] = "December";

$LANG['ERROR_PASS'] = "Elnézést, nem találtam ilyen felhasználót.";
$LANG['NEWPASS_MSG'] = "A(z) %s felhasználói fiókhoz, már hozzá van rendelve ez az email.  A web user from %s has just requested that a new password be sent.

Az új jelszava: %s

Ha ez egy hiba volt, csak lépjen be az új jelszavával és változtassa meg, amire szeretné.";

$LANG['ADMIN_NEWPASS_MSG'] = "Az admin felhasználó jelszava vissza lett állítva:\n\t%s\n egy felhasználó által, innen: %s";

$LANG['REGWARN_MAIL'] = "Kérem adjon meg érvényes e-mail címet.";

$LANG['REGWARN_PASS'] = "Kérem, adjon meg érvényes jelszót.  Szóközök nélkül, legalább ".MIN_PASSWD_SIZE." karaktert és tartalmazhat: 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Jelszó ellenőrzés nem egyezik, kérem próbálja újra.";
$LANG['REGWARN_USERNAME_INUSE'] = "Ez a felhasználónév már használatban van. Kérem próbáljon másikat.";

$LANG['USER_UPDATE_ERROR'] = "Hiba a fiók frissítésekor";
$LANG['PASS_TOO_LONG'] = "Jelszó túl hosszú";
$LANG['PASS_TOO_SHORT'] = "Jelszó túl rövid";
$LANG['PASS_ALREADY_USED'] = "Ez a jelszó már használatban van.  Kérem készítsen másikat.";
$LANG['PASS_ERROR_CHANGING'] = "Hiba a jelszó megváltoztatásakor:";
$LANG['PASS_ERROR_RESETTING'] = "Hiba a jelszó visszaállításakor:";

$LANG['ERROR_SENDING_EMAIL'] = "Email küldése sikertelen";
$LANG['REGWARN_USERNAME'] = "Csak számok és betűk engedélyezettek a felhasználónévben.";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "Email cím már használatban van.";
$LANG['LOST_PASSWORD'] = "Elvesztette a jelszavát?";

$LANG['PROMPT_UNAME'] = "Felhasználónév";
$LANG['PROMPT_PASSWORD'] = "Jelszó"; 
$LANG['PROMPT_CAN_REUSE_PWD'] = "Felhasználó használhat régi jelszavakat"; 
$LANG['REPLY_TO_FAX'] = "Válasz a faxra"; 
$LANG['REPLY_TO_FAX_TIP'] = "Az eredeti fax lesz az első faxolt dokumentum a fedőlap után";
$LANG['PROMPT_EMAIL'] = "E-mail cím";
$LANG['BUTTON_SEND_PASS'] = "Jelszó küldése";
$LANG['REGISTER_VPASS'] = "Jelszó ellenőrzése";
$LANG['FIELDS_REQUIRED'] = "A csillaggal (*) jelölt mezők megadása kötelező.";

$LANG['NEW_PASS_DESC'] = "Kérem adja meg az e-mail címét, majd kattintson a Jelszó Küldése gombra.<br /><br />Hamarosan kapni fog egy új jelszót.  Használja ezt az új jelszót a belépésre.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Adja meg a felhasználónevét és jelszavát, majd kattintson a Jelszó Küldése gombra.<br /><br />Hamarosan kapni fog egy új jelszót.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "A jelszavát elkülve a megadott e-mail címre.<br /><br />Ahogy megkapta az új jelszavát, beléphet és megváltoztathatja azt.<br /><br />";

$LANG['SEARCH_TITLE'] = "Keresés";
$LANG['KEYWORDS'] = "Kulcsszavak";
$LANG['COMPANY_SEARCH'] = "Cég keresés";
$LANG['COMPANY_LIST'] = "Cég lista";
$LANG['SENT_RECVD'] = "Küldött / Fogadott";
$LANG['BOTH_SENT_RECVD'] = "Küldött és fogadott faxok is";
$LANG['ONLY_MY_SENT'] = "Csak a küldött faxaim";
$LANG['ONLY_RECVD'] = "Csak a fogadott faxaim";
$LANG['CONCLUSION'] = "Összesen %d találat.";
$LANG['NOKEYWORD'] = "Nincs találat";

$LANG['SEARCH_WHITEPAGES'] = "Keresés a telefonkönyvben";

$LANG['PWD_NEEDS_RESET'] = "A jelszavát meg kell változtatnia a folytatás előtt.";
$LANG['PWD_REQUIREMENTS'] = "A jelszónak legalább ".MIN_PASSWD_SIZE." karakter hosszúnak kell lennie.";
$LANG['OPASS'] = "Régi jelszó";
$LANG['NPASS'] = "Új jelszó";
$LANG['VPASS'] = "Jelszó ellenőrzése";
$LANG['OPASS_WRONG'] = "A régi jelszó érvénytelen.";
$LANG['NAME_MISSING'] = "Meg kell adnia egy nevet.";

$LANG['MODIFY_FAXNUMS'] = "Cégek fax számainak módosítása";
$LANG['MODIFY_EMAILS'] = "Email névjegyzék módosítása";
$LANG['TITLE_FAXNUMS'] = "Fax Számok";
$LANG['TITLE_EMAILS'] = "Email Címek";

$LANG['TITLE_DISTROLIST'] = "Disztribúciós listák"; 
$LANG['DISTROLIST_NAME'] = "Lista neve"; 
$LANG['DISTROLIST_DELETE'] = "Lista törlése"; 
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Törli ezt a listát?"; 
$LANG['DISTROLIST_SAVENAME'] = "Lista nevének mentése"; 

$LANG['CHANGES_SAVED'] = "Változások elmentve"; 
$LANG['DISTROLIST_DELETED'] = "Lista törölve"; 
$LANG['DISTROLIST_NOT_CREATED'] = "Lista nem jött létre"; 
$LANG['DISTROLIST_EXISTS'] = "Lista már létezik"; 
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Adjon meg nevet a listának"; 
$LANG['DISTROLIST_ADD'] = "Bejegyzés hozzáadása"; 
$LANG['DISTROLIST_REMOVE'] = "Bejegyzés eltávolítása"; 
$LANG['DISTROLIST_REFRESH_LIST'] = "Lista frissítése"; 

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Új Felhasználó Adatai";
$LANG['NEW_USER_MESSAGE'] = "Hello %s,

Ez az email tartalmazza a belépéshez szükséges felhasználónevét és jelszavát (http://%s)

Felhasználónév - %s
Jelszó - %s

Kérem ne válaszoljon erre az üzenetre, mert autómatikusan lett létrehozva és tájékoztató jellegű.";

$LANG['DIDROUTE_EXISTS'] = "Az útvonal már létezik";
$LANG['DIDROUTE_NOT_CREATED'] = "Az útvonal nem jött létre";
$LANG['DIDROUTE_NO_ROUTES'] = "Nincsenek DID/DTMF útvonalak beállítva";
$LANG['DIDROUTE_DOESNT_EXIST'] = "%s útvonal nem létezik";

$LANG['ADMIN_DIDROUTE_CREATED'] = "Az útvonal létrejött";
$LANG['ADMIN_DIDROUTE_DELETED'] = "Az útvonal nem jött létre";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "Az útvonal módosítva";
$LANG['ADMIN_DIDROUTES'] = "DID/DTMF útvonal csoportok";
$LANG['DIDROUTE_ROUTECODE'] = "DID/DTMF számok";
$LANG['DIDROUTE_CATCHALL'] = "Mindent elfog";
$LANG['ADMIN_CONFDIDROUTING'] = "DID/DTMF beállítása";
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

$LANG['FAXCAT_NOT_CREATED'] = "A(z) '%s' fax kategória nem jött létre";
$LANG['FAXCAT_ALREADY_EXISTS'] = "A(z) '%s' fax kategória már létezik";

$LANG['FAX_FAILED'] = "Probléma a fax küldésekor.";
$LANG['FAX_WHY']["done"] = "Kész";
$LANG['FAX_WHY']["format_failed"] = "formázás sikertelen";
$LANG['FAX_WHY']["no_formatter"] = "nincs formázó";
$LANG['FAX_WHY']["poll_no_document"] = "nincs dokumentum";
$LANG['FAX_WHY']["killed"] = "megölve";
$LANG['FAX_WHY']["rejected"] = "visszautasítva";
$LANG['FAX_WHY']["blocked"] = "blokkolva";
$LANG['FAX_WHY']["removed"] = "eltávolítva";
$LANG['FAX_WHY']["timedout"] = "időtúllépés";
$LANG['FAX_WHY']["poll_rejected"] = "poll rejected";
$LANG['FAX_WHY']["poll_failed"] = "poll failed";
$LANG['FAX_WHY']["requeued"] = "újra sorbaállítva";

$LANG['COMPANY_EXISTS'] = "Cégnév már létezik";
$LANG['FAXNUMID_NOT_CREATED'] = "faxnumid -t nem lehet létrehozni";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Nincs cég ehhez a faxszámhoz";
$LANG['CANT_CHANGE_FAXNUM'] = "Nem változtathatja meg az alapított faxszámot";

$LANG['MODEM_EXISTS'] = "Modem eszköz már létezik";
$LANG['MODEM_NOT_CREATED'] = "Modem eszköz nem található";
$LANG['NO_MODEMS_CONFIGURED'] = "Nincs konfigurált modem";
$LANG['MODEM_DOESNT_EXIST'] = "%s modem nem létezik";
$LANG['ADMIN_PRINTER'] = "Printer"; // <----- NEW
$LANG['PRINT'] = "Print"; // <----- NEW

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "A kategória törölve";
$LANG['ADMIN_FAXCAT_CREATED'] = "A kategória létrehozva";
$LANG['ADMIN_FAXCAT_UPDATED'] = "A kategória frissítve";

$LANG['ADMIN_MODEM_CREATED'] = "A modem létrehozva";
$LANG['ADMIN_MODEM_DELETED'] = "A modem törölve";
$LANG['ADMIN_MODEM_UPDATED'] = "A modem frissítve";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Szabad";
$LANG['FAXSEND'] = "Faxot küld";
$LANG['FAXRECV'] = "Faxot fogad";
$LANG['FAXRECVFROM'] = "Faxot fogad innen:";

$LANG['MODEM_DEVICE'] = "Eszköz";
$LANG['MODEM_CONTACT'] = "Kontakt";
$LANG['MODEM_ALIAS'] = "Alias";

$LANG['COVER_FILE'] = "File name"; // <--- NEW
$LANG['COVER_TITLE'] = "Coverpage Title"; // <--- NEW
$LANG['SELECT_COVERPAGE'] = "Select cover page"; // <--- NEW

$LANG['MISSING_CATEGORY_NAME'] = "Meg kell adnia egy kategórianevet"; // <----- NEW
$LANG['MISSING_DEVICE_NAME'] = "Meg kell adnia egy eszköznevet"; // <----- NEW
$LANG['MISSING_ALIAS_NAME'] = "Meg kell adnia egy alias-t"; // <----- NEW
$LANG['MISSING_CONTACT_NAME'] = "Meg kell adnia egy kontakt nevet"; // <----- NEW
$LANG['MISSING_ROUTE'] = "You must enter the DID/DTMF digits"; // <----- NEW

$LANG['MISSING_FILE_NAME'] = "You must enter a file name"; // <----- NEW
$LANG['MISSING_TITLE_NAME'] = "You must enter a title"; // <----- NEW

$LANG['ADMIN_CONFIGURE'] = "Configure..."; // <----- NEW
$LANG['ADMIN_USERS'] = "Felhasználók";
$LANG['ADMIN_NEW_USER'] = "Új Felhasználó";
$LANG['ADMIN_EDIT_USER'] = "Felhasználó Módosítása";
$LANG['ADMIN_DEL_USER'] = "Felhasználó Törlése";
$LANG['ADMIN_LAST_LOGIN'] = "Utolsó Belépés";
$LANG['ADMIN_LAST_IP'] = "Utolsó IP";
$LANG['ADMIN_USER_LIST'] = "Felhasználó Lista";
$LANG['ADMIN_FAXCATS'] = "Fax Kategóriák";
$LANG['ADMIN_CONFMODEMS'] = "Modemek Beállítása";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Statisztikák";
$LANG['ADMIN_SYSLOGS'] = "Rendszer naplók";
$LANG['ADMIN_SYSFUNC'] = "Rendszer Funkciók";
$LANG['ADMIN_NOUSERS'] = "Nincs létrehozott felhasználó";
$LANG['ADMIN_ACC_ENABLED'] = "Fiók aktív";
$LANG['ADMIN_PWDCYCLE'][] = "Jelszó elévülési ciklus";
$LANG['ADMIN_PWDCYCLE'][] = "Soha";
$LANG['ADMIN_PWDCYCLE'][] = "3 havonta";
$LANG['ADMIN_PWDCYCLE'][] = "Minen 6. hónapban";
$LANG['ADMIN_PWDEXP'] = "Jelszó elévülési dátum";
$LANG['SUPERUSER'] = "Super user";
$LANG['IS_ADMIN'] = "Adminisztrátor";
$LANG['USER_CANDEL'] = "Felhasználó törölhet faxokat";
$LANG['ADMIN_FAXLINES'] = "Megtekinthető fax vonalak";
$LANG['ADMIN_CATEGORIES'] = "Megtekinthető fax kategóriák";
$LANG['REBOOT'] = "Szerver újraindítása";
$LANG['SHUTDOWN'] = "Szerver leállítása";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "Kérem várjon";
$LANG['LOGTEXT'] = "Napló információ";
$LANG['QUESTION_DELUSER'] = "Biztosan törölni akarja";

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
