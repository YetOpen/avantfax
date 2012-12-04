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

$LANGUAGE = "de";
$LANGUAGE_NAME = "Deutsch";

$LANG = array();

$LANG['ISO'] = "charset=iso-8859-15";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Ja";
$LANG['NO'] = "Nein";

$LANG['DATE'] = "Datum";
$LANG['FROM'] = "Von";
$LANG['TO'] = "An";

$LANG['DATE_START'] = "Anfangsdatum";
$LANG['DATE_END'] = "Enddatum";

$LANG['TO_PERSON'] = "An Ansprechpartner";
$LANG['TO_COMPANY'] = "An Firma";
$LANG['TO_LOCATION'] = "An Ort";
$LANG['TO_VOICENUMBER'] = "An Telefonnummer";

$LANG['MY_COMPANY'] = "Firma";
$LANG['MY_LOCATION'] = "Ort";
$LANG['MY_VOICENUMBER'] = "Telefonnummer";
$LANG['MY_FAXNUMBER'] = "Faxnummer";

$LANG['VIEW_FAX'] = "Fax ansehen";
$LANG['ROTATE_FAX'] = "Fax drehen";
$LANG['DOWNLOAD_PDF'] = "Download PDF";
$LANG['DOWNLOAD_TIFF'] = "Download TIFF";
$LANG['EMAIL_PDF'] = "E-Mail PDF";
$LANG['ADD_NOTE_FAX'] = "Notiz hinzuf&uuml;gen";
$LANG['ARCHIVE_FAX'] = "In das Archiv verschieben";
$LANG['DELETE_FAX'] = "L&ouml;schen";

$LANG['DELETE_CONFIRM'] = "Bitte das L&ouml;schen des Faxes best&auml;tigen.";

$LANG['ASSIGN_CNAME'] = "Firmenname vergeben";
$LANG['ASSIGN_MISSING'] = "Sie m&uuml;ssen einen Firmennamen angeben";
$LANG['ASSIGN_NOTE'] = " this fax's note / Beschreibung";
$LANG['ASSIGN_NOTE_SAVED'] = "Notiz / Beschreibung gespeichert.";
$LANG['ASSIGN_OK'] = "Firmenname wurde erfolgreich vergeben.";
$LANG['FAXES'] = "Fax(e)";

$LANG['NAME'] = "Name";
$LANG['DESCRIPTION'] = "Beschreibung";
$LANG['SAVE'] = "Speichern";
$LANG['DELETE'] = "L&ouml;schen";
$LANG['CANCEL'] = "Abbrechen";
$LANG['CREATE'] = "Erstellen";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "Auswahl";
$LANG['CONTACT_SAVED'] = "Kontakt Details gespeichert";
$LANG['CONTACT_DELETED'] = "Kontakt gel&ouml;scht";
$LANG['RUBRICA_SAVED'] = "Firmen Details gespeichert";
$LANG['RUBRICA_DELETED'] = "Firma gel&ouml;scht";

$LANG['FAX_FILES'] = "Dateien zum faxen ausw&auml;hlen";
$LANG['FAX_DEST'] = "Ziel Faxnummer";
$LANG['FAX_CPAGE'] = "Titelseite benutzen";
$LANG['FAX_REGARDING'] = "Betreff";
$LANG['FAX_COMMENTS'] = "Kommentare";
$LANG['FAX_FILETYPES'] = "Sie k&ouml;nnen nur ".SENDFAXFILETYPES." Dateien anh&auml;ngen.";
$LANG['FAX_FILE_MISSING'] = "Sie m&uuml;ssen eine Datei zum faxen ausw&auml;hlen";
$LANG['FAX_DEST_MISSING'] = "Sie m&uuml;ssen eine Ziel Faxnummer angeben";
$LANG['FAX_SUBMITTED'] = "Ihr Fax wurde erfolgreich zum faxen in die Warteschlange verschoben. Sie erhalten eine Best&auml;tigungs E-Mail wenn das Fax verschickt wurde.";
$LANG['FAX_FILESIZE'] = "Dateigr&ouml;sse ist &uuml;ber dem Limit.";
$LANG['FAX_MAXSIZE'] = "Maximale Dateigr&ouml;sse: $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Ihr Name";
$LANG['UPDATE'] = "&Uuml;bernehmen";
$LANG['USER_DETAILS_SAVED'] = "Benutzer Einstellungen wurden gespeichert.";

$LANG['LANGUAGE'] = "Sprache";
$LANG['EMAIL_SIG'] = "E-Mail Signatur";

$LANG['NEXT_FAX'] = "N&auml;chstes Fax";
$LANG['PREV_FAX'] = "Vorheriges Fax";

$LANG['LOGIN_TEXT'] = "Benutzername und Passwort f&uuml;r den Zugriff auf das Fax interface eingeben.";
$LANG['LOGIN_DISABLED'] = "Ihr Benutzerkonto wurde gesperrt. Bitte wenden Sie sich an den Administrator.";
$LANG['LOGIN_INCORRECT'] = "Benutzername oder Passwort falsch. Versuchen Sie es erneut.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "Benutzername";
$LANG['PASSWORD'] = "Passwort";
$LANG['USER'] = "Benutzer";
$LANG['BUTTON_LOGIN'] = "Anmelden";
$LANG['BUTTON_LOGOUT'] = "Abmelden";
$LANG['BUTTON_SETTINGS'] = "Einstellungen";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Eingang";
$LANG['MENU_OUTBOX'] = "Ausgang";
$LANG['MENU_SENDFAX'] = "Fax senden";
$LANG['MENU_ARCHIVE'] = "Archiv";
$LANG['MENU_CONTACTS'] = "Kontakte";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "Email";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Firma";
$LANG['CONTACT_HEADER_NEWFAX'] = "Neue Faxnummer";
$LANG['CONTACT_HEADER_FAXNUM'] = "Faxnummer";
$LANG['NEW_ENTRY'] = "Neuer Eintrag";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES; // <----- NEW
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts"; // <----- NEW
$LANG['UPLOAD_BUTTON'] = "Upload"; // <----- NEW

$LANG['SEND_EMAIL_HEADER'] = "Fax per E-Mail weiterleiten";
$LANG['EMAIL_RECIPIENTS'] = "E-Mail Empf&auml;nger";
$LANG['MESSAGE_PROMPT'] = "E-Mail Nachricht";
$LANG['BUTTON_SEND'] = "Senden";
$LANG['SUBJECT'] = "Betreff";
$LANG['PDF_FILENAME'] = "PDF Dateiname";

$LANG['EMAIL_SUCCESS'] = "Die E-Mail wurde erfolgreich versandt.";
$LANG['EMAIL_FAILURE'] = "Das Versenden der E-Mail ist fehlgeschlagen.";

$LANG['PN_PAGE'] = "Seite";
$LANG['PN_PAGE_UP'] = "Seite rauf";
$LANG['PN_PAGE_DN'] = "Seite runter";
$LANG['PN_PAGES'] = "Seiten";
$LANG['PN_OF'] = "von";

$LANG['NUM_DIALS'] = "w&auml;hlt";
$LANG['KILL_JOB'] = "Job abbrechen";
$LANG['PROMPT_CLOSEWINDOW'] = "Fenster schliessen";

$LANG['LAST_UPDATED'] = "Letztes Update";
$LANG['BACK'] = "[ Zur&uuml;ck ]";
$LANG['EDIT'] = "Bearbeiten";
$LANG['ADD'] = "Hinzuf&uuml;gen";
$LANG['WARNCAT'] = "Bitte eine Kategorie w&auml;hlen";
$LANG['TITLE'] = "Titel";
$LANG['CATEGORY'] = "Kategorie";
$LANG['CATEGORY_NAME'] = "Kategorie Name";

$LANG['LAST_MOD'] = "Letze &Auml;nderung von";

$LANG['MONTHS'][] = array ("");
$LANG['MONTHS'][] = "Januar";
$LANG['MONTHS'][] = "Februar";
$LANG['MONTHS'][] = "M&auml;rz";
$LANG['MONTHS'][] = "April";
$LANG['MONTHS'][] = "Mai";
$LANG['MONTHS'][] = "Juni";
$LANG['MONTHS'][] = "Juli";
$LANG['MONTHS'][] = "August";
$LANG['MONTHS'][] = "September";
$LANG['MONTHS'][] = "Oktober";
$LANG['MONTHS'][] = "November";
$LANG['MONTHS'][] = "Dezember";

$LANG['ERROR_PASS'] = "Es wurde kein entsprechender Benutzer gefunden.";
$LANG['NEWPASS_MSG'] = "Der Benutzer %s ist mit dieser Email-Adresse verkn&uuml;pft.  Ein Web-Benutzer %s hat gerade ein neues Passwort angefordert.

Ihr neues Passwort ist: %s

Wenn dies ein Irrtum war, loggen Sie sich mit diesem neuen Passwort ein und &Auml;ndern Sie es auf ein beliebiges neues ihrer Wahl.";

$LANG['ADMIN_NEWPASS_MSG'] = "Das Passwort f&uuml;r den Admin-Account wurde zur&uuml;ckgesetzt auf:\n\t%s\n von einem Benutzer von %s";

$LANG['REGWARN_MAIL'] = "Bitte geben Sie eine g&uuml;ltige Email-Adresse an.";

$LANG['REGWARN_PASS'] = "Bitte geben Sie ein g&uuml;ltiges Passwort ein.  Keine Leerzeichen und mehr als ".MIN_PASSWD_SIZE." Zeichen aus 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Passwort und &Uuml;berpr&uuml;fung stimmen nicht &uuml;berein. Bitte Versuchen Sie es noch einmal.";
$LANG['REGWARN_USERNAME_INUSE'] = "Dieser Benutzername existiert bereits. Versuchen Sie einen anderen.";

$LANG['USER_UPDATE_ERROR'] = "Fehler beim &auml;ndern des Kontos";
$LANG['PASS_TOO_LONG'] = "Passwort zu lang";
$LANG['PASS_TOO_SHORT'] = "Passwort zu kurz";
$LANG['PASS_ALREADY_USED'] = "Dieses Passwort wurde bereits benutzt. Bitte erstellen Sie ein neues.";
$LANG['PASS_ERROR_CHANGING'] = "Fehler beim Passwort &auml;ndern von";
$LANG['PASS_ERROR_RESETTING'] = "Fehler beim Passwort zur&uuml;cksetzen von";
$LANG['ERROR_SENDING_EMAIL'] = "Fehler beim senden der E-Mail";
$LANG['REGWARN_USERNAME'] = "Nicht alphanumerische Zeichen sind nicht erlaubt im Benutzernamen.";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "E-Mail Adresse bereits in Benutzung.";

$LANG['LOST_PASSWORD'] = "Passwort vergessen?";

$LANG['PROMPT_UNAME'] = "Benutzername";
$LANG['PROMPT_PASSWORD'] = "Passwort";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Benutzer kann altes Passwort wiederverwenden";
$LANG['REPLY_TO_FAX'] = "Antwort an FAX";
$LANG['REPLY_TO_FAX_TIP'] = "Das Originalfax wird als erstes Dokument nach dem Deckblat gesendet.";
$LANG['TITLE_DISTROLIST'] = "Verteiler Listen";
$LANG['DISTROLIST_NAME'] = "Listenname";
$LANG['DISTROLIST_DELETE'] = "Liste l&ouml;schen";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Diese Verteilerliste l&ouml;schen?";
$LANG['DISTROLIST_SAVENAME'] = "Listennamen sichern";

$LANG['CHANGES_SAVED'] = "&Auml;nderungen gesichert";
$LANG['DISTROLIST_DELETED'] = "Liste gel&ouml;scht";
$LANG['DISTROLIST_NOT_CREATED'] = "Liste nicht erstellt";
$LANG['DISTROLIST_EXISTS'] = "Liste existiert bereits";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "geben Sie einen Namen f&uuml;r die Liste ein";
$LANG['DISTROLIST_ADD'] = "Eintr&auml;ge hinzuf&uuml;gen";
$LANG['DISTROLIST_REMOVE'] = "Eintr&auml;ge l&ouml;schen";
$LANG['DISTROLIST_REFRESH_LIST'] = "Liste neu laden";


$LANG['PROMPT_EMAIL'] = "E-Mail Adresse";
$LANG['BUTTON_SEND_PASS'] = "Passwort senden";
$LANG['REGISTER_VPASS'] = "Passwort verifizieren";
$LANG['FIELDS_REQUIRED'] = "Mit Stern (*) markierte Felder sind erforderlich.";

$LANG['NEW_PASS_DESC'] = "Bitte geben Sie Ihre E-Mail Adresse an und klicken dann auf Passwort senden.<br /><br />Sie erhalten in K&uuml;rze ein neues Passwort. Benutzen Sie dieses Passwort um Zugriff zu erlangen.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Geben Sie Ihren Benutzernamen und E-Mail Adresse an und klicken auf Passwort senden.<br /><br />Sie werden in K&uuml;rze ein neues Passwort erhalten.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Ihr Passwort wird an die von Ihnen angegebene E-Mail Adresse geschickt.<br /><br />Sobald Sie Ihr neues Passwort erhalten haben, k&ouml;nnen Sie sich damit anmleden um es zu &auml;ndern.<br /><br />";

$LANG['SEARCH_TITLE'] = "Suchen";
$LANG['KEYWORDS'] = "Schl&uuml;sselw&ouml;rter";
$LANG['COMPANY_SEARCH'] = "Firmen Suche";
$LANG['COMPANY_LIST'] = "Firmen Liste";
$LANG['SENT_RECVD'] = "Gesendet / Empfangen";
$LANG['BOTH_SENT_RECVD'] = "Beides gesendete und empfangene Faxe";
$LANG['ONLY_MY_SENT'] = "Nur meine gesendeten Faxe";
$LANG['ONLY_RECVD'] = "Nur empfangene Faxes";
$LANG['CONCLUSION'] = "Gesamt %d gefunden.";
$LANG['NOKEYWORD'] = "Keine Ergebnisse gefunden";

$LANG['SEARCH_WHITEPAGES'] = "Telefonbuch durchsuchen";

$LANG['PWD_NEEDS_RESET'] = "Ihr Passwort muss ge&auml;ndert werden bevor Sie fortfahren k&ouml;nnen.";
$LANG['PWD_REQUIREMENTS'] = "Das Passwort muss mindestens ".MIN_PASSWD_SIZE." Zeichen lang sein.";
$LANG['OPASS'] = "Altes Passwort";
$LANG['NPASS'] = "Neues Passwort";
$LANG['VPASS'] = "Password";
$LANG['OPASS_WRONG'] = "Altes Passwort ist falsch.";
$LANG['NAME_MISSING'] = "Sie m&uuml;ssen einen Namen eingeben.";

$LANG['MODIFY_FAXNUMS'] = "Faxnummern bearbeiten";
$LANG['MODIFY_EMAILS'] = "E-Mail Adressbuch bearbeiten";
$LANG['TITLE_FAXNUMS'] = "Fax Nummern";
$LANG['TITLE_EMAILS'] = "E-Mail Adressen";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Details Ihres neuen Benutzerkontos";
$LANG['NEW_USER_MESSAGE'] = "Hallo %s,

Diese E-Mail enth&auml;llt Ihren Benutzernamen und Passwort f&uuml;r die Anmeldung an AvantFAX (http://%s)

Benutzername - %s
Passwort - %s

Bitte antworten Sie nicht auf diese automatisch generierte E-Mail";

$LANG['DIDROUTE_EXISTS'] = "Route already exists"; // <------ NEW
$LANG['DIDROUTE_NOT_CREATED'] = "Route was not created"; // <------ NEW
$LANG['DIDROUTE_NO_ROUTES'] = "No DID/DTMF Routes configured"; // <------ NEW
$LANG['DIDROUTE_DOESNT_EXIST'] = "Route %s does not exist"; // <------ NEW

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

$LANG['FAXCAT_NOT_CREATED'] = "Fax Kategorie '%s' wurde nicht erzeugt";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Fax Kategorie '%s' existiert bereits";

$LANG['FAX_FAILED'] = "Problem das Fax zu senden.";
$LANG['FAX_WHY']["done"] = "Fertig";
$LANG['FAX_WHY']["format_failed"] = "Formatierung fehlgeschlagen";
$LANG['FAX_WHY']["no_formatter"] = "kein Formatierer";
$LANG['FAX_WHY']["poll_no_document"] = "kein Dokument abgefragt";
$LANG['FAX_WHY']["killed"] = "gestoppt";
$LANG['FAX_WHY']["rejected"] = "zur&uuml;ckgewiesen";
$LANG['FAX_WHY']["blocked"] = "geblockt";
$LANG['FAX_WHY']["removed"] = "entfernt";
$LANG['FAX_WHY']["timedout"] = "Zeit&uuml;berschreitung";
$LANG['FAX_WHY']["poll_rejected"] = "Abfrage zur&uuml;ckgewiesen";
$LANG['FAX_WHY']["poll_failed"] = "Abfrage fehlgeschlagen";
$LANG['FAX_WHY']["requeued"] = "Neu eingereiht";

$LANG['COMPANY_EXISTS'] = "Firmenname existiert bereits";
$LANG['FAXNUMID_NOT_CREATED'] = "Konnte keine faxnumid erstellen";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Keine Firma f&uuml;r diese Faxnummer";
$LANG['CANT_CHANGE_FAXNUM'] = "Sie k&ouml;nnen keine bestehende Faxnummer &Auml;ndern";

$LANG['MODEM_EXISTS'] = "Modem Schnitstelle existiert bereits";
$LANG['MODEM_NOT_CREATED'] = "Modem device was not created";
$LANG['NO_MODEMS_CONFIGURED'] = "Keine Modems konfiguriert";
$LANG['MODEM_DOESNT_EXIST'] = "Modem %s existiert nicht";
$LANG['ADMIN_PRINTER'] = "Printer"; // <----- NEW
$LANG['PRINT'] = "Print"; // <----- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "Die Kategorie wurde gel&ouml;scht";
$LANG['ADMIN_FAXCAT_CREATED'] = "Die Kategorie wurde angelegt";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Die Kategorie wurde aktualisiert";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_MODEM_CREATED'] = "Das Modem wurde angelegt";
$LANG['ADMIN_MODEM_DELETED'] = "Das Modem wurde gel&ouml;scht";
$LANG['ADMIN_MODEM_UPDATED'] = "Das Modem wurde aktualisiert";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Leerlauf";
$LANG['FAXSEND'] = "Sendet ein Fax";
$LANG['FAXRECV'] = "Empfange ein Fax";
$LANG['FAXRECVFROM'] = "Empfange ein Fax von";

$LANG['MODEM_DEVICE'] = "Ger&auml;t";
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
$LANG['ADMIN_USERS'] = "Benutzer";
$LANG['ADMIN_NEW_USER'] = "Neuer Benutzer";
$LANG['ADMIN_EDIT_USER'] = " Benutzer";
$LANG['ADMIN_DEL_USER'] = "Benutzer l&ouml;schen";
$LANG['ADMIN_LAST_LOGIN'] = "Letzte Anmeldung";
$LANG['ADMIN_LAST_IP'] = "Letzte IP";
$LANG['ADMIN_USER_LIST'] = "Benutzer Liste";
$LANG['ADMIN_FAXCATS'] = "Fax Kategorien";
$LANG['ADMIN_CONFMODEMS'] = "Modems konfigurieren";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Statistiken";
$LANG['ADMIN_SYSLOGS'] = "System Logs";
$LANG['ADMIN_SYSFUNC'] = "System Funktionen";
$LANG['ADMIN_NOUSERS'] = "Kein Benutzer erstellt";
$LANG['ADMIN_ACC_ENABLED'] = "Account active";
$LANG['ADMIN_PWDCYCLE'][] = "Passwort Erneuerungszyklus";
$LANG['ADMIN_PWDCYCLE'][] = "Nie";
$LANG['ADMIN_PWDCYCLE'][] = "Alle 3 Monate";
$LANG['ADMIN_PWDCYCLE'][] = "Alle 6 Monate";
$LANG['ADMIN_PWDEXP'] = "Passwort Erneuerungsdatum";
$LANG['SUPERUSER'] = "Super user";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "Benutzer kann Faxe l&ouml;schen";
$LANG['ADMIN_FAXLINES'] = "Sichtbare Faxzeilen";
$LANG['ADMIN_CATEGORIES'] = "Sichtbare Faxkategorien";
$LANG['REBOOT'] = "Server rebooten";
$LANG['SHUTDOWN'] = "Server herunterfahren";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "Bitte warten";
$LANG['LOGTEXT'] = "Log Information";
$LANG['QUESTION_DELUSER'] = "Sind Sie sicher, dass sie folgenden Benuzter l&ouml;schen wollen:";

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
