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

$LANGUAGE = "no";
$LANGUAGE_NAME = "Norwegian";

$LANG = array();

$LANG['ISO'] = "charset=iso-8859-1";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Ja";
$LANG['NO'] = "Nei";

$LANG['DATE'] = "Dato";
$LANG['FROM'] = "Fra";
$LANG['TO'] = "Til";

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

$LANG['VIEW_FAX'] = "Se på faks";
$LANG['ROTATE_FAX'] = "Rotere faks";
$LANG['DOWNLOAD_PDF'] = "Last ned PDF";
$LANG['DOWNLOAD_TIFF'] = "Last ned TIFF";
$LANG['EMAIL_PDF'] = "Send PDF som epost";
$LANG['ADD_NOTE_FAX'] = "Legg til notat";
$LANG['ARCHIVE_FAX'] = "Flytt til arkiv";
$LANG['DELETE_FAX'] = "Slette permanent";

$LANG['DELETE_CONFIRM'] = "Vil du slette denne faksen?";

$LANG['ASSIGN_CNAME'] = "Firmanavn";
$LANG['ASSIGN_MISSING'] = "Du må spesifisere firmanavn";
$LANG['ASSIGN_NOTE'] = "Endre notatet / beskrivelsen til denne faksen";
$LANG['ASSIGN_NOTE_SAVED'] = "Notat / beskrivelsen lagret.";
$LANG['ASSIGN_OK'] = "Firmanavn ble registrert uten problemer.";
$LANG['FAXES'] = "fakser";

$LANG['NAME'] = "Navn";
$LANG['DESCRIPTION'] = "Beskrivelser";
$LANG['SAVE'] = "Lagre";
$LANG['DELETE'] = "Slette";
$LANG['CANCEL'] = "Kansellere";
$LANG['CREATE'] = "Lage";
$LANG['EMAIL'] = "Epost";
$LANG['SELECT'] = "Velg";
$LANG['CONTACT_SAVED'] = "Oppføringsdetaljer lagret";
$LANG['CONTACT_DELETED'] = "Oppføring slettet";
$LANG['RUBRICA_SAVED'] = "Firmadetaljer lagret";
$LANG['RUBRICA_DELETED'] = "Firma slettet";

$LANG['FAX_FILES'] = "Velg filer som skal sendes som faks";
$LANG['FAX_DEST'] = "Faksnummer til mottaker";
$LANG['FAX_CPAGE'] = "Bruk forside";
$LANG['FAX_REGARDING'] = "Vedrørende";
$LANG['FAX_COMMENTS'] = "Kommentarer";
$LANG['FAX_FILETYPES'] = "Du kan bare legge ved filer: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Du må velge en fil som skal fakses";
$LANG['FAX_DEST_MISSING'] = "Du må skrive inn faksnummer til mottaker";
$LANG['FAX_SUBMITTED'] = "Faksen har blitt lagt til i sendekøen uten problemer.<br />Du vil motta en bekrefelse på epost med en gang faksen er sendt.";
$LANG['FAX_FILESIZE'] = "Filstørrelsen er over grensen.";
$LANG['FAX_MAXSIZE'] = "Maks. filstørrelse er $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Ditt navn";
$LANG['UPDATE'] = "Oppdater";
$LANG['USER_DETAILS_SAVED'] = "Brukerinnstillinger har blitt lagret.";

$LANG['LANGUAGE'] = "Språk";
$LANG['EMAIL_SIG'] = "epost signatur";

$LANG['NEXT_FAX'] = "Neste faks";
$LANG['PREV_FAX'] = "Forrige faks";

$LANG['LOGIN_TEXT'] = "Tast inn brukernavn og passord for å få tilgang til faksen.";
$LANG['LOGIN_DISABLED'] = "Kontoen din har blitt deaktivert.  Vennligst kontakt administrator.";
$LANG['LOGIN_INCORRECT'] = "Feil brukernavn eller passord.  Vennligst prøv igjen.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "Brukernavn";
$LANG['PASSWORD'] = "Passord";
$LANG['USER'] = "Bruker";
$LANG['BUTTON_LOGIN'] = "Logg inn";
$LANG['BUTTON_LOGOUT'] = "Logg ut";
$LANG['BUTTON_SETTINGS'] = "Innstillinger";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Innboks";
$LANG['MENU_OUTBOX'] = "Utboks";
$LANG['MENU_SENDFAX'] = "Send faks";
$LANG['MENU_ARCHIVE'] = "Arkiv";
$LANG['MENU_CONTACTS'] = "Kontakter";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "Epost";
$LANG['CONTACT_HEADER_FAX'] = "Faks";
$LANG['CONTACT_HEADER_COMPANY'] = "Firma";
$LANG['CONTACT_HEADER_NEWFAX'] = "Nytt faksnummer";
$LANG['CONTACT_HEADER_FAXNUM'] = "Faksnummer";
$LANG['NEW_ENTRY'] = "Ny oppføring";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES; // <----- NEW
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts"; // <----- NEW
$LANG['UPLOAD_BUTTON'] = "Upload"; // <----- NEW

$LANG['SEND_EMAIL_HEADER'] = "Videresend faks via epost";
$LANG['EMAIL_RECIPIENTS'] = "Epostmottakere";
$LANG['MESSAGE_PROMPT'] = "Epost beskjed";
$LANG['BUTTON_SEND'] = "Send";
$LANG['SUBJECT'] = "Emne";
$LANG['PDF_FILENAME'] = "PDF filnavn";

$LANG['EMAIL_SUCCESS'] = "Eposten ble sendt uten problemer.";
$LANG['EMAIL_FAILURE'] = "Sending av epost mislyktes.";

$LANG['PN_PAGE'] = "Side";
$LANG['PN_PAGE_UP'] = "Opp en side";
$LANG['PN_PAGE_DN'] = "Ned en side";
$LANG['PN_PAGES'] = "Sider";
$LANG['PN_OF'] = "av";

$LANG['NUM_DIALS'] = "Slår nummer";
$LANG['KILL_JOB'] = "Avslutt jobb";
$LANG['PROMPT_CLOSEWINDOW'] = "Lukk vindu";

$LANG['LAST_UPDATED'] = "Sist oppdatert";
$LANG['BACK'] = "[ Tilbake ]";
$LANG['EDIT'] = "Redigere";
$LANG['ADD'] = "Legg til";
$LANG['WARNCAT'] = "Velg en kategori";
$LANG['TITLE'] = "Titel";
$LANG['CATEGORY'] = "Kategori";
$LANG['CATEGORY_NAME'] = "Kategorinavn";

$LANG['LAST_MOD'] = "Sist endret av";

$LANG['MONTHS'][] = array("");
$LANG['MONTHS'][] = "Januar";
$LANG['MONTHS'][] = "Februar";
$LANG['MONTHS'][] = "Mars";
$LANG['MONTHS'][] = "April";
$LANG['MONTHS'][] = "Mai";
$LANG['MONTHS'][] = "Juni";
$LANG['MONTHS'][] = "Juli";
$LANG['MONTHS'][] = "August";
$LANG['MONTHS'][] = "September";
$LANG['MONTHS'][] = "Oktober";
$LANG['MONTHS'][] = "November";
$LANG['MONTHS'][] = "Desember";

$LANG['ERROR_PASS'] = "Beklager, ingen tilsvarende bruker ble funnet.";
$LANG['NEWPASS_MSG'] = "Denne epostadressen er assosiert med brukerkontoen %s.  En bruker fra %s har nettopp bedt om å få tilsendt nytt passord.

Ditt nye passord er: %s

Viss dette var en feil så bare logg deg inn med nye passordet og forandre til det du ønsker å benytte.";

$LANG['ADMIN_NEWPASS_MSG'] = "Passordet til administrator ble satt tilbake til:\n\t%s\n av en bruker fra %s";

$LANG['REGWARN_MAIL'] = "Skriv inn en gyldig epostadresse.";

$LANG['REGWARN_PASS'] = "Skriv inn et gyldig passord.  (Ingen mellomrom, mer enn ".MIN_PASSWD_SIZE." tegn og inneholder tall eller bokstaver fra A til Z (små og store)).";
$LANG['REGWARN_VPASS2'] = "Passord og bekreftelse stemmer ikke, vennligst prøv igjen.";
$LANG['REGWARN_USERNAME_INUSE'] = "Dette brukernavnet er allerede i bruk. Vennligst prøv et annet.";

$LANG['USER_UPDATE_ERROR'] = "Feil ved oppdatering av konto";
$LANG['PASS_TOO_LONG'] = "For langt passord";
$LANG['PASS_TOO_SHORT'] = "For kort passord";
$LANG['PASS_ALREADY_USED'] = "Dette passordet er allerede i bruk.  Vennligst lag et nytt.";
$LANG['PASS_ERROR_CHANGING'] = "Feil ved endring av passord til";
$LANG['PASS_ERROR_RESETTING'] = "Feil ved tilbakestilling av passord til";
$LANG['ERROR_SENDING_EMAIL'] = "Sending av epost mislyktes";
$LANG['REGWARN_USERNAME'] = "Bare alfanumeriske tegn er tillatt i brukernavn.";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "Epostadressen er allerede i bruk.";
$LANG['LOST_PASSWORD'] = "Har du glemt passordet ditt?";

$LANG['PROMPT_UNAME'] = "Brukernavn";
$LANG['PROMPT_PASSWORD'] = "Passord";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Bruker kan gjenbruke gamle passord";
$LANG['REPLY_TO_FAX'] = "Svar på FAKS";
$LANG['REPLY_TO_FAX_TIP'] = "Den originale faksen vil bli det første dokumentet som fakses etter forsiden";
$LANG['TITLE_DISTROLIST'] = "Distribusjonslister";
$LANG['DISTROLIST_NAME'] = "Listenavn";
$LANG['DISTROLIST_DELETE'] = "Slett liste";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Slette denne distibusjonslisten?";
$LANG['DISTROLIST_SAVENAME'] = "Lagre listenavn";

$LANG['CHANGES_SAVED'] = "Endringer lagret";
$LANG['DISTROLIST_DELETED'] = "Liste slettet";
$LANG['DISTROLIST_NOT_CREATED'] = "Liste ikke opprettet";
$LANG['DISTROLIST_EXISTS'] = "Liste eksisterer allerede";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Gi et navn til listen";
$LANG['DISTROLIST_ADD'] = "Legg til oppføringer";
$LANG['DISTROLIST_REMOVE'] = "Fjern oppføringer";
$LANG['DISTROLIST_REFRESH_LIST'] = "Oppdater liste";


$LANG['PROMPT_EMAIL'] = "Epostadresse";
$LANG['BUTTON_SEND_PASS'] = "Send passord";
$LANG['REGISTER_VPASS'] = "Bekreft passord";
$LANG['FIELDS_REQUIRED'] = "Felter merket med stjerne (*) er obligatoriske.";

$LANG['NEW_PASS_DESC'] = "Skriv inn epostadressen din og klikk på Send passord-knappen.<br /><br />Du vil motta et nytt passord snart.  Bruk dette til å få tilgang til siden.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Skriv inn brukernavn og epostadressen og klikk på Send passord-knappen.<br /><br />Du vil motta et nytt passord snart.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Ditt passord vil bli sendt til den oppgitte epostadressen.<br /><br />Når du har mottatt ditt nye passord kan du logge inn og forandre det.<br /><br />";

$LANG['SEARCH_TITLE'] = "Søk";
$LANG['KEYWORDS'] = "Nøkkelord";
$LANG['COMPANY_SEARCH'] = "Firmasøk";
$LANG['COMPANY_LIST'] = "Firmaliste";
$LANG['SENT_RECVD'] = "Sendt / Mottatt";
$LANG['BOTH_SENT_RECVD'] = "Både sendte og mottatte fakser";
$LANG['ONLY_MY_SENT'] = "Bare mine sendte fakser";
$LANG['ONLY_RECVD'] = "Bare mottatte fakser";
$LANG['CONCLUSION'] = "Totalt %d resultater funnet.";
$LANG['NOKEYWORD'] = "Ingen resultater ble funnet";

$LANG['SEARCH_WHITEPAGES'] = "Søk Gule sider";

$LANG['PWD_NEEDS_RESET'] = "Passordet ditt må forandres før du kan fortsette.";
$LANG['PWD_REQUIREMENTS'] = "Passordet må være minst ".MIN_PASSWD_SIZE." tegn.";
$LANG['OPASS'] = "Gammelt passord";
$LANG['NPASS'] = "Nytt passord";
$LANG['VPASS'] = "Bekreft passord";
$LANG['OPASS_WRONG'] = "Gammelt passord er feil.";
$LANG['NAME_MISSING'] = "Du må skrive et navn.";

$LANG['MODIFY_FAXNUMS'] = "Redigere faksnummer-registeret";
$LANG['MODIFY_EMAILS'] = "Redigere din epost-adressebok";
$LANG['TITLE_FAXNUMS'] = "Faksnumre";
$LANG['TITLE_EMAILS'] = "Epost-addresser";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Detaljer for ny bruker";
$LANG['NEW_USER_MESSAGE'] = "Hallo %s,

Denne eposten inneholder ditt brukernavn og passord for å logge på AvantFAX (http://%s)

Brukernavn - %s
Passord - %s

Vennligst ikke svar på denne beskjeden da den er generert automatisk og kun er til informasjon";

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

$LANG['FAXCAT_NOT_CREATED'] = "Fakskategori '%s' ble ikke laget";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Fakskategori '%s' finnes allerede";

$LANG['FAX_FAILED'] = "Problem under sending av faks.";
$LANG['FAX_WHY']["done"] = "Ferdig";
$LANG['FAX_WHY']["format_failed"] = "feil format";
$LANG['FAX_WHY']["no_formatter"] = "intet format";
$LANG['FAX_WHY']["poll_no_document"] = "poll intet dokument";
$LANG['FAX_WHY']["killed"] = "kansellert";
$LANG['FAX_WHY']["rejected"] = "forkastet";
$LANG['FAX_WHY']["blocked"] = "blokkert";
$LANG['FAX_WHY']["removed"] = "fjernet";
$LANG['FAX_WHY']["timedout"] = "tidsavbrutt";
$LANG['FAX_WHY']["poll_rejected"] = "poll forkastet";
$LANG['FAX_WHY']["poll_failed"] = "poll feilet";
$LANG['FAX_WHY']["requeued"] = "lagt i kø på nytt";

$LANG['COMPANY_EXISTS'] = "Firmanavn eksisterer allerede";
$LANG['FAXNUMID_NOT_CREATED'] = "Kunne ikke lage faksnummerID";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Intet firma til dette faksnummeret";
$LANG['CANT_CHANGE_FAXNUM'] = "Du kan ikke forandre et etablert faksnummer";

$LANG['MODEM_EXISTS'] = "Modemet eksisterer allerede";
$LANG['MODEM_NOT_CREATED'] = "Modemet ble ikke lagret";
$LANG['NO_MODEMS_CONFIGURED'] = "Ingen modem er konfigurert";
$LANG['MODEM_DOESNT_EXIST'] = "Modem %s eksisterer ikke";
$LANG['ADMIN_PRINTER'] = "Printer"; // <----- NEW
$LANG['PRINT'] = "Print"; // <----- NEW

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "Kategorien ble slettet";
$LANG['ADMIN_FAXCAT_CREATED'] = "Kategorien ble laget";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Kategorien ble oppdatert";

$LANG['ADMIN_MODEM_CREATED'] = "Modemet ble lagret";
$LANG['ADMIN_MODEM_DELETED'] = "Modemet ble slettet";
$LANG['ADMIN_MODEM_UPDATED'] = "Modemet ble oppdatert";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Klar";
$LANG['FAXSEND'] = "Sender faks";
$LANG['FAXRECV'] = "Mottar faks";
$LANG['FAXRECVFROM'] = "Mottar en faks fra";

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
$LANG['ADMIN_USERS'] = "Brukere";
$LANG['ADMIN_NEW_USER'] = "Ny bruker";
$LANG['ADMIN_EDIT_USER'] = "Endre bruker";
$LANG['ADMIN_DEL_USER'] = "Slett bruker";
$LANG['ADMIN_LAST_LOGIN'] = "Siste pålogging";
$LANG['ADMIN_LAST_IP'] = "Siste IP-adresse";

$LANG['ADMIN_USER_LIST'] = "Brukerliste";
$LANG['ADMIN_FAXCATS'] = "Fakskategorier";
$LANG['ADMIN_CONFMODEMS'] = "Konfigurere modem";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Statistikk";
$LANG['ADMIN_SYSLOGS'] = "Systemlogg";
$LANG['ADMIN_SYSFUNC'] = "Systemfunksjoner";
$LANG['ADMIN_NOUSERS'] = "Ingen brukere lagret";
$LANG['ADMIN_ACC_ENABLED'] = "Konto aktivert";
$LANG['ADMIN_PWDCYCLE'][] = "Passordet sin utløpssyklus";
$LANG['ADMIN_PWDCYCLE'][] = "Aldri";
$LANG['ADMIN_PWDCYCLE'][] = "Hver 3. måned";
$LANG['ADMIN_PWDCYCLE'][] = "Hver 6. måned";
$LANG['ADMIN_PWDEXP'] = "Passordet sin utløpsdato";
$LANG['SUPERUSER'] = "Superbruker";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "Bruker kan slette fakser";
$LANG['ADMIN_FAXLINES'] = "Synlige fakslinjer";
$LANG['ADMIN_CATEGORIES'] = "Synlige fakskategorier";
$LANG['REBOOT'] = "Starte server på nytt";
$LANG['SHUTDOWN'] = "Stoppe server";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "Vennligst vent";
$LANG['LOGTEXT'] = "Logginformasjon";
$LANG['QUESTION_DELUSER'] = "Er du sikker på at du vil slette";

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
