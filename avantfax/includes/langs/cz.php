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

$LANGUAGE = "cz";
$LANGUAGE_NAME = "Česky";

$LANG = array();

$LANG['ISO'] = "charset=UTF-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Ano";
$LANG['NO'] = "Ne";

$LANG['DATE'] = "Datum";
$LANG['FROM'] = "Od";
$LANG['TO'] = "Pro";

$LANG['DATE_START'] = "Od Data";
$LANG['DATE_END'] = "Do Data";

$LANG['TO_PERSON'] = "Osoba";
$LANG['TO_COMPANY'] = "Firma";
$LANG['TO_LOCATION'] = "Oddělení";
$LANG['TO_VOICENUMBER'] = "Hlasové tel. číslo";

$LANG['MY_COMPANY'] = "Naše firma";
$LANG['MY_LOCATION'] = "Lokalita";
$LANG['MY_VOICENUMBER'] = "Telefon";
$LANG['MY_FAXNUMBER'] = "Faxové číslo";

$LANG['VIEW_FAX'] = "Prohlížet Fax";
$LANG['ROTATE_FAX'] = "Rotovat Fax";
$LANG['DOWNLOAD_PDF'] = "Uložit jako PDF";
$LANG['DOWNLOAD_TIFF'] = "Uložit jako TIFF";
$LANG['EMAIL_PDF'] = "Poslat e-mailem jako PDF";
$LANG['ADD_NOTE_FAX'] = "Přidat poznámku";
$LANG['ARCHIVE_FAX'] = "Přesunout do archivu";
$LANG['DELETE_FAX'] = "Trvale smazat";

$LANG['DELETE_CONFIRM'] = "Opravdu smazat tento fax?";

$LANG['ASSIGN_CNAME'] = "Přiřadit společnost";
$LANG['ASSIGN_MISSING'] = "Musíte zadat jméno firmy";
$LANG['ASSIGN_NOTE'] = "Změnit tuto poznámku /komentář";
$LANG['ASSIGN_NOTE_SAVED'] = "Poznámka/komentář uloženy.";
$LANG['ASSIGN_OK'] = "Jméno firmy úspěšně přiřazeno.";
$LANG['FAXES'] = "faxů";

$LANG['NAME'] = "Skutečné jméno uživatele";
$LANG['DESCRIPTION'] = "Popis";
$LANG['SAVE'] = "Uložit";
$LANG['DELETE'] = "Smazat";
$LANG['CANCEL'] = "Storno";
$LANG['CREATE'] = "Vytvořit";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "Zvolit";
$LANG['CONTACT_SAVED'] = "Detaily kontaktu uloženy";
$LANG['CONTACT_DELETED'] = "Kontakt smazán";
$LANG['RUBRICA_SAVED'] = "Detaily firmy uloženy";
$LANG['RUBRICA_DELETED'] = "Firma smazána";

$LANG['FAX_FILES'] = "Zvolte soubory pro FAX";
$LANG['FAX_DEST'] = "Faxová čísla příjemců";
$LANG['FAX_CPAGE'] = "Použít úvodní stránku";
$LANG['FAX_REGARDING'] = "Předmět";
$LANG['FAX_COMMENTS'] = "Krátký text nebo poznámka bez diakritiky";
$LANG['FAX_FILETYPES'] = "Můžete použít pouze soubory typu: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Zvolte soubor k odfaxování";
$LANG['FAX_DEST_MISSING'] = "Zadejte faxová čísla příjemce/ů";
$LANG['FAX_SUBMITTED'] = "Váš fax byl úspěšně zařazen do fronty k odeslání.<br />Dostanete do Vaší e-mail schránky potvrzení po úspěšném odeslání.";
$LANG['FAX_FILESIZE'] = "Velikost souboru je větší než limit 2 MB.";
$LANG['FAX_MAXSIZE'] = "Max. velikost souboru je $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Vaše jméno";
$LANG['UPDATE'] = "Uložit";
$LANG['USER_DETAILS_SAVED'] = "Nastavení uživatele byla uložena.";

$LANG['LANGUAGE'] = "Jazyk";
$LANG['EMAIL_SIG'] = "Automatický podpis pod E-mail";

$LANG['NEXT_FAX'] = "Další Fax";
$LANG['PREV_FAX'] = "Předcházející Fax";

$LANG['LOGIN_TEXT'] = "Zadejte Vaše jméno a heslo pro přístup k faxserveru.";
$LANG['LOGIN_DISABLED'] = "Váš účet byl zablokován. Kontaktujte Vašeho správce IT.";
$LANG['LOGIN_INCORRECT'] = "Chybné jméno nebo heslo. Zkuste to znovu.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "Jméno";
$LANG['PASSWORD'] = "Heslo";
$LANG['USER'] = "Uživatel";
$LANG['BUTTON_LOGIN'] = "Přihlásit";
$LANG['BUTTON_LOGOUT'] = "Odhlásit";
$LANG['BUTTON_SETTINGS'] = "Nastavení";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Došlé faxy";
$LANG['MENU_OUTBOX'] = "Odcházející faxy";
$LANG['MENU_SENDFAX'] = "Poslat Fax";
$LANG['MENU_ARCHIVE'] = "Archiv";
$LANG['MENU_CONTACTS'] = "Kontakty";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "E-mail";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Firma";
$LANG['CONTACT_HEADER_NEWFAX'] = "Nové faxové číslo";
$LANG['CONTACT_HEADER_FAXNUM'] = "Faxové číslo";
$LANG['NEW_ENTRY'] = "Nový záznam";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES; // <----- NEW
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts"; // <----- NEW
$LANG['UPLOAD_BUTTON'] = "Upload"; // <----- NEW

$LANG['SEND_EMAIL_HEADER'] = "Přeposlat fax e-mailem";
$LANG['EMAIL_RECIPIENTS'] = "E-mail příjemci";
$LANG['MESSAGE_PROMPT'] = "E-mailová zpráva";
$LANG['BUTTON_SEND'] = "Poslat";
$LANG['SUBJECT'] = "Předmět";
$LANG['PDF_FILENAME'] = "Jméno PDF souboru";

$LANG['EMAIL_SUCCESS'] = "E-mail byl poslán úspěšně.";
$LANG['EMAIL_FAILURE'] = "Chyba při posílíní e-mailu.";

$LANG['PN_PAGE'] = "Stránka";
$LANG['PN_PAGE_UP'] = "O stránku nahoru";
$LANG['PN_PAGE_DN'] = "O stránku dolů";
$LANG['PN_PAGES'] = "Stránky";
$LANG['PN_OF'] = "z";
$LANG['NUM_DIALS'] = "Pokusy";
$LANG['KILL_JOB'] = "Opravdu smazat fax?";

$LANG['PROMPT_CLOSEWINDOW'] = "Zavřít okno";

$LANG['LAST_UPDATED'] = "Naposledy aktualizováno";
$LANG['BACK'] = "[ Zpět ]";
$LANG['EDIT'] = "Editovat";
$LANG['ADD'] = "Přidat";
$LANG['WARNCAT'] = "Zvolte prosím kategorii";
$LANG['TITLE'] = "Nadpis";
$LANG['CATEGORY'] = "Kategorie";
$LANG['CATEGORY_NAME'] = "Jméno kategorie";

$LANG['LAST_MOD'] = "Naposledy změněno uživatelem";

$LANG['MONTHS'][] = array ("");
$LANG['MONTHS'][] = "Leden";
$LANG['MONTHS'][] = "Únor";
$LANG['MONTHS'][] = "Březen";
$LANG['MONTHS'][] = "Duben";
$LANG['MONTHS'][] = "Květen";
$LANG['MONTHS'][] = "Červen";
$LANG['MONTHS'][] = "Červenec";
$LANG['MONTHS'][] = "Srpen";
$LANG['MONTHS'][] = "Září";
$LANG['MONTHS'][] = "Říjen";
$LANG['MONTHS'][] = "Listopad";
$LANG['MONTHS'][] = "Prosinec";

$LANG['ERROR_PASS'] = "Uživatel nenalezen.";
$LANG['NEWPASS_MSG'] = "Účet uživatele %s má přiřazený tento e-mail. Web uživatel %s požadoval poslat nové heslo.

Vaše nové heslo je: %s

Pokud je toto chyba,přihlašte se s tímto heslem a ihned ho změnte.";

$LANG['ADMIN_NEWPASS_MSG'] = "Admin heslobzlo resetováno na:\n\t%s\n uživatelem %s";

$LANG['REGWARN_MAIL'] = "Zadejte platnou e-mailovou adresu.";

$LANG['REGWARN_PASS'] = "Zadejte platné heslo.Bez mezer,více než ".MIN_PASSWD_SIZE." znaků a obsahující znaky 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Hesla nejsou shodná,zkuste to znovu.";
$LANG['REGWARN_USERNAME_INUSE'] = "Jméno je již použito,zkuste jiné.";

$LANG['USER_UPDATE_ERROR'] = "Chyba při update účtu";
$LANG['PASS_TOO_LONG'] = "Heslo příliš dlouhé";
$LANG['PASS_TOO_SHORT'] = "Heslo příliš krátké";
$LANG['PASS_ALREADY_USED'] = "Toto heslo již bzlo použito dříve.Vytvořte nové.";
$LANG['PASS_ERROR_CHANGING'] = "Chyba při změně hesla pro";
$LANG['PASS_ERROR_RESETTING'] = "Chyba při resetu hesla pro";

$LANG['ERROR_SENDING_EMAIL'] = "Chyba při poslání e-mailu";

$LANG['REGWARN_USERNAME'] = "Použití diakritiky ve jméně uživatele není možné.";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "E-mailové adresa se již používá.";

$LANG['LOST_PASSWORD'] = "Zapoměli jste heslo?";

$LANG['PROMPT_UNAME'] = "Jméno uživatele";
$LANG['PROMPT_PASSWORD'] = "Heslo";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Uživatel může znovu použít staré hesla";
$LANG['REPLY_TO_FAX'] = "Odpovědět na FAX";
$LANG['REPLY_TO_FAX_TIP'] = "Původní fax bude poslán jako první hned po úvodní straně.";
$LANG['PROMPT_EMAIL'] = "E-mailová adresa";
$LANG['BUTTON_SEND_PASS'] = "Poslat heslo";
$LANG['REGISTER_VPASS'] = "Znovu zadat nové heslo";
$LANG['FIELDS_REQUIRED'] = "Položky označené hvězdičkou (*) je nutné vyplnit.";

$LANG['NEW_PASS_DESC'] = "Zadejte prosím Vaši e-mailovou adresu a potom klikněte na tlačítko Poslat heslo.<br /><br />Vaše nové heslo Vám bude brzy posláno.<br /><br />Použijte toto heslo pro přístup na faxserver.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Zadejte prosím Vaši e-mailovou adresu a potom klikněte na tlačítko Poslat heslo.<br /><br />Vaše nové heslo Vám bude brzy posláno.<br /><br />Použijte toto heslo pro přístup na faxserver.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Vaše heslo bude zasláno na danou e-mailovou adresu.<br /><br />Jakmile heslo obdržíte,přihlaste se a změnte ho.<br /><br />";

$LANG['SEARCH_TITLE'] = "Vyhledat";
$LANG['KEYWORDS'] = "Hledat slovo nebo frázi";
$LANG['COMPANY_SEARCH'] = "Vyhledat firmu";
$LANG['COMPANY_LIST'] = "Seznam pro firmu";
$LANG['SENT_RECVD'] = "Posláno / Přijmuto";
$LANG['BOTH_SENT_RECVD'] = "Poslané i přijmuté faxy";
$LANG['ONLY_MY_SENT'] = "Jen moje poslané faxy";
$LANG['ONLY_RECVD'] = "Jen přijmuté faxy";
$LANG['CONCLUSION'] = "Celkem %d výsledků nalezeno.";
$LANG['NOKEYWORD'] = "Nic nenalezeno";

$LANG['SEARCH_WHITEPAGES'] = "Hledat ve Zlatých stránkách";

$LANG['PWD_NEEDS_RESET'] = "Vaše heslo musí být změněno než budete moci pokračovat.";
$LANG['PWD_REQUIREMENTS'] = "Heslo musí být nejméně ".MIN_PASSWD_SIZE." znaků dlouhé.";
$LANG['OPASS'] = "Původní heslo";
$LANG['NPASS'] = "Nové heslo";
$LANG['VPASS'] = "Znovu nové heslo";
$LANG['OPASS_WRONG'] = "Původní heslo je chybné.";
$LANG['NAME_MISSING'] = "Nutno zadat jméno.";

$LANG['MODIFY_FAXNUMS'] = "Změnit faxová čísla firmy";
$LANG['MODIFY_EMAILS'] = "Změnit Váš seznam e-mailových adres";
$LANG['TITLE_FAXNUMS'] = "Faxová čísla";
$LANG['TITLE_EMAILS'] = "E-mailové adresy";

$LANG['TITLE_DISTROLIST'] = "Distribuční seznamy";
$LANG['DISTROLIST_NAME'] = "Název seznamu";
$LANG['DISTROLIST_DELETE'] = "Smazat seznam";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Smazat distribuční seznam?";
$LANG['DISTROLIST_SAVENAME'] = "Uložit název seznamu";

$LANG['CHANGES_SAVED'] = "Změny uloženy";
$LANG['DISTROLIST_DELETED'] = "Seznam smazán";
$LANG['DISTROLIST_NOT_CREATED'] = "Seznam není vytvořen";
$LANG['DISTROLIST_EXISTS'] = "Seznam již existuje";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Zadejte jméno seznamu";
$LANG['DISTROLIST_ADD'] = "Přidat položku";
$LANG['DISTROLIST_REMOVE'] = "Odebrat položku";
$LANG['DISTROLIST_REFRESH_LIST'] = "Znovu načíst";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Nový uživatel-detaily";
$LANG['NEW_USER_MESSAGE'] = "Dobrý den %s,

Tento e-mail obsahuje jméno a heslo pro přístup na AvantFAX. (http://%s)

Jméno - %s
Heslo - %s

Neodpovídejte na tuto zprávu,byla vytvořena automaticky pro informativní účely.";

$LANG['DIDROUTE_EXISTS'] = "Cesta již existuje";
$LANG['DIDROUTE_NOT_CREATED'] = "Cesta nebyla vytvořena";
$LANG['DIDROUTE_NO_ROUTES'] = "Žádná DID/DTMF cesta konfigurována";
$LANG['DIDROUTE_DOESNT_EXIST'] = "Cesta %s neexistuje";
$LANG['ADMIN_PRINTER'] = "Printer"; // <----- NEW
$LANG['PRINT'] = "Print"; // <----- NEW

$LANG['ADMIN_DIDROUTE_CREATED'] = "Cesta vytvořena";
$LANG['ADMIN_DIDROUTE_DELETED'] = "Cesta smazána";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "Cesta updatována";
$LANG['ADMIN_DIDROUTES'] = "DID/DTMF Route groups";
$LANG['DIDROUTE_ROUTECODE'] = "DID/DTMF digits";
$LANG['DIDROUTE_CATCHALL'] = "Catch All";
$LANG['ADMIN_CONFDIDROUTING'] = "Konfigurovat DID/DTMF";
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

$LANG['FAXCAT_NOT_CREATED'] = "Fax kategorie '%s' nebyla vytvořena";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Fax kategorie '%s'již existuje";

$LANG['FAX_FAILED'] = "Problém s odesláním faxu.";
$LANG['FAX_WHY']["done"] = "Hotovo";
$LANG['FAX_WHY']["format_failed"] = "Chyba formátu";
$LANG['FAX_WHY']["no_formatter"] = "no formatter";
$LANG['FAX_WHY']["poll_no_document"] = "poll no document";
$LANG['FAX_WHY']["killed"] = "smazáno";
$LANG['FAX_WHY']["rejected"] = "odmítnuto";
$LANG['FAX_WHY']["blocked"] = "blokováno";
$LANG['FAX_WHY']["removed"] = "odstraněno";
$LANG['FAX_WHY']["timedout"] = "čas vypršel";
$LANG['FAX_WHY']["poll_rejected"] = "poll rejected";
$LANG['FAX_WHY']["poll_failed"] = "poll failed";
$LANG['FAX_WHY']["requeued"] = "Zařazen do fronty";

$LANG['COMPANY_EXISTS'] = "Jméno firmy již existuje";
$LANG['FAXNUMID_NOT_CREATED'] = "Nelze vytvořit faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Žádná firma pro toto fax číslo";
$LANG['CANT_CHANGE_FAXNUM'] = "Nelze změnit číslo po navázání spojení";

$LANG['MODEM_EXISTS'] = "Modemové zařízení již existuje";
$LANG['MODEM_NOT_CREATED'] = "Modemové zařízení nevytvořeno";
$LANG['NO_MODEMS_CONFIGURED'] = "Žádné modemy nakonfigurovány";
$LANG['MODEM_DOESNT_EXIST'] = "Modem %s neexistuje";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "Kategorie bzla smazána";
$LANG['ADMIN_FAXCAT_CREATED'] = "Kategorie byla vytvořena";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Kategorie byla aktualizována";

$LANG['ADMIN_MODEM_CREATED'] = "Modem vytvořen";
$LANG['ADMIN_MODEM_DELETED'] = "Modem smazán";
$LANG['ADMIN_MODEM_UPDATED'] = "Modem aktualizován";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Čeká";
$LANG['FAXSEND'] = "Posílá se fax";
$LANG['FAXRECV'] = "Přijímá se fax";
$LANG['FAXRECVFROM'] = "Přijímá se fax od";

$LANG['MODEM_DEVICE'] = "Zařízení";
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
$LANG['ADMIN_USERS'] = "Uživatelé";
$LANG['ADMIN_NEW_USER'] = "Nový uživatel";
$LANG['ADMIN_EDIT_USER'] = "Modifikovat Uživatele";
$LANG['ADMIN_DEL_USER'] = "Smazat uživatele";
$LANG['ADMIN_LAST_LOGIN'] = "Naposledy přihlášen";
$LANG['ADMIN_LAST_IP'] = "Naposledy z adresy IP";
$LANG['ADMIN_USER_LIST'] = "Seznam uživatelů";
$LANG['ADMIN_FAXCATS'] = "Faxové kategorie";
$LANG['ADMIN_CONFMODEMS'] = "Konfigurovat modemy";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW
$LANG['ADMIN_ASETTINGS'] = "Admin nastavení";

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Statistiky";
$LANG['ADMIN_SYSLOGS'] = "System logy";
$LANG['ADMIN_SYSFUNC'] = "System funkce";
$LANG['ADMIN_NOUSERS'] = "Žádní uživatelé nejsou vytvořeni";
$LANG['ADMIN_ACC_ENABLED'] = "Aktivní účet";
$LANG['ADMIN_PWDCYCLE'][] = "Heslo expiruje";
$LANG['ADMIN_PWDCYCLE'][] = "Nikdy";
$LANG['ADMIN_PWDCYCLE'][] = "Každé 3 měsíce";
$LANG['ADMIN_PWDCYCLE'][] = "Každých 6 měsíců";
$LANG['ADMIN_PWDEXP'] = "Datum expirace hesla";
$LANG['SUPERUSER'] = "Super uživatel";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "Uživatel může mazat faxy";
$LANG['ADMIN_FAXLINES'] = "Sledovatelné fax linky";
$LANG['ADMIN_CATEGORIES'] = "Sledovatelné fax kategorie";
$LANG['REBOOT'] = "Restart serveru";
$LANG['SHUTDOWN'] = "Ukončit server";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "Prosím čekejte";
$LANG['LOGTEXT'] = "Log information";
$LANG['QUESTION_DELUSER'] = "Opravdu smazat";

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
