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

$LANGUAGE = "nl";
$LANGUAGE_NAME = "Nederlands";

$LANG = array();

$LANG['ISO'] = "charset=iso-8859-1";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Ja";
$LANG['NO'] = "Nee";

$LANG['DATE'] = "Datum";
$LANG['FROM'] = "Van";
$LANG['TO'] = "Naar";

$LANG['DATE_START'] = "Start Datum";
$LANG['DATE_END'] = "Eind Datum";

$LANG['TO_PERSON'] = "Naar persoon";
$LANG['TO_COMPANY'] = "Naar bedrijf";
$LANG['TO_LOCATION'] = "Naar locatie";
$LANG['TO_VOICENUMBER'] = "Naar telefoonnummer";

$LANG['MY_COMPANY'] = "Bedrijf";
$LANG['MY_LOCATION'] = "Locatie";
$LANG['MY_VOICENUMBER'] = "telefoon nummer";
$LANG['MY_FAXNUMBER'] = "Fax nummer";

$LANG['VIEW_FAX'] = "Bekijk Fax";
$LANG['ROTATE_FAX'] = "Draai Fax";
$LANG['DOWNLOAD_PDF'] = "Download PDF";
$LANG['DOWNLOAD_TIFF'] = "Download TIFF";
$LANG['EMAIL_PDF'] = "Email PDF";
$LANG['ADD_NOTE_FAX'] = "Voeg notitie toe";
$LANG['ARCHIVE_FAX'] = "Verplaats naar Archief";
$LANG['DELETE_FAX'] = "Permanent verwijderen";

$LANG['DELETE_CONFIRM'] = "Bevestig a.u.b. dat u deze fax wilt verwijderen.";

$LANG['ASSIGN_CNAME'] = "Koppel een bedrijfsnaam";
$LANG['ASSIGN_MISSING'] = "U moet een bedrijfsnaam invoeren";
$LANG['ASSIGN_NOTE'] = "Bewerk deze fax's notitie / beschrijving";
$LANG['ASSIGN_NOTE_SAVED'] = "Notitie / beschrijving opgeslagen.";
$LANG['ASSIGN_OK'] = "Bedrijfsnaam is succesvol gekoppeld.";
$LANG['FAXES'] = "faxen";

$LANG['NAME'] = "Naam";
$LANG['DESCRIPTION'] = "Beschrijving";
$LANG['SAVE'] = "Opslaan";
$LANG['DELETE'] = "Verwijderen";
$LANG['CANCEL'] = "Annuleren";
$LANG['CREATE'] = "Aanmaken";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "Selecteren";
$LANG['CONTACT_SAVED'] = "Contact details opgeslagen";
$LANG['CONTACT_DELETED'] = "Contact verwijderd";
$LANG['RUBRICA_SAVED'] = "Bedrijs details opgeslagen";
$LANG['RUBRICA_DELETED'] = "Bedrijf verwijderd";

$LANG['FAX_FILES'] = "Selecteer the bestanden om te FAXEN";
$LANG['FAX_DEST'] = "Doel fax nummers";
$LANG['FAX_CPAGE'] = "Gebruik voorpagina";
$LANG['FAX_REGARDING'] = "Betreft";
$LANG['FAX_COMMENTS'] = "Commentaar";
$LANG['FAX_FILETYPES'] = "U kunt alleen bestanden toevoegen bestanden: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "U moet een bestand kiezen om te faxen";
$LANG['FAX_DEST_MISSING'] = "U moet een doel faxnummer invoeren";
$LANG['FAX_SUBMITTED'] = "Uw fax is succesvol queued om te faxen.<br />U ontvangt een bevestigingsmail als de fax is verzonden.";
$LANG['FAX_FILESIZE'] = "Bestands grootte boven de limiet.";
$LANG['FAX_MAXSIZE'] = "Maximale bestands grootte is $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Uw naam";
$LANG['UPDATE'] = "Bewerk";
$LANG['USER_DETAILS_SAVED'] = "Gebruikers gegevens zijn opgeslagen.";

$LANG['LANGUAGE'] = "Taal";
$LANG['EMAIL_SIG'] = "E-mail handtekening";

$LANG['NEXT_FAX'] = "Volgende Fax";
$LANG['PREV_FAX'] = "Vorige Fax";

$LANG['LOGIN_TEXT'] = "Voer uw gebruikersnaam en password in om de fax interface te gebruiken.";
$LANG['LOGIN_DISABLED'] = "Uw account is afgesloten. Neem contact op met de beheerder.";
$LANG['LOGIN_INCORRECT'] = "Foute gebruikersnaam of password. Probeer nog eens.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "gebruikersnaam";
$LANG['PASSWORD'] = "password";
$LANG['USER'] = "Gebruiker";
$LANG['BUTTON_LOGIN'] = "Inloggen";
$LANG['BUTTON_LOGOUT'] = "Uitloggen";
$LANG['BUTTON_SETTINGS'] = "Voorkeuren";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Inbak";
$LANG['MENU_OUTBOX'] = "Uitbak";
$LANG['MENU_SENDFAX'] = "Verzend Fax";
$LANG['MENU_ARCHIVE'] = "Archief";
$LANG['MENU_CONTACTS'] = "Contacten";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "Email";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Bedrijf";
$LANG['CONTACT_HEADER_NEWFAX'] = "Nieuw fax nummer";
$LANG['CONTACT_HEADER_FAXNUM'] = "Fax nummer";
$LANG['NEW_ENTRY'] = "Nieuwe toevoeging";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES; // <----- NEW
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts"; // <----- NEW
$LANG['UPLOAD_BUTTON'] = "Upload"; // <----- NEW

$LANG['SEND_EMAIL_HEADER'] = "Doorsturen fax via email";
$LANG['EMAIL_RECIPIENTS'] = "Email ontvangers";
$LANG['MESSAGE_PROMPT'] = "Email bericht";
$LANG['BUTTON_SEND'] = "Verzenden";
$LANG['SUBJECT'] = "Onderwerp";
$LANG['PDF_FILENAME'] = "PDF bestandsnaam";

$LANG['EMAIL_SUCCESS'] = "De email is succesvol verzonden.";
$LANG['EMAIL_FAILURE'] = "De email is niet verzonden.";

$LANG['PN_PAGE'] = "Pagina";
$LANG['PN_PAGE_UP'] = "Pagina omhoog";
$LANG['PN_PAGE_DN'] = "Pagina naar beneden";
$LANG['PN_PAGES'] = "Pagina's";
$LANG['PN_OF'] = "van";

$LANG['NUM_DIALS'] = "Wordt contact gemaakt";
$LANG['KILL_JOB'] = "Breek opdracht af";
$LANG['PROMPT_CLOSEWINDOW'] = "Sluit Window";

$LANG['LAST_UPDATED'] = "Laatste Bewerking";
$LANG['BACK'] = "[ Terug ]";
$LANG['EDIT'] = "Aanpassen";
$LANG['ADD'] = "Toevoegen";
$LANG['WARNCAT'] = "Selecteer een categorie";
$LANG['TITLE'] = "Titel";
$LANG['CATEGORY'] = "Categorie";
$LANG['CATEGORY_NAME'] = "Categorie naam";

$LANG['LAST_MOD'] = "Laatste bewerking door";

$LANG['MONTHS'][] = array("");
$LANG['MONTHS'][] = "Januari";
$LANG['MONTHS'][] = "Februari";
$LANG['MONTHS'][] = "Maart";
$LANG['MONTHS'][] = "April";
$LANG['MONTHS'][] = "Mei";
$LANG['MONTHS'][] = "Juni";
$LANG['MONTHS'][] = "Juli";
$LANG['MONTHS'][] = "Augustus";
$LANG['MONTHS'][] = "September";
$LANG['MONTHS'][] = "Oktober";
$LANG['MONTHS'][] = "November";
$LANG['MONTHS'][] = "December";

$LANG['ERROR_PASS'] = "Sorry, geen overeenkomstige gebruiker gevonden.";
$LANG['NEWPASS_MSG'] = "Het gebruikers account %s heeft deze email aan zich gekoppeld.  Een web gebruiker van %s heeft gevraagd een nieuw password toe te zenden.

Uw nieuwe Password is: %s

Als dit een fout is, log dan gewoon in met het nieuwe password en verander uw password naar wat u wil.";

$LANG['ADMIN_NEWPASS_MSG'] = "Het admin account password is gereset naar:\n\t%s\n door een gebruiker van %s";

$LANG['REGWARN_MAIL'] = "Voer een geldig email adres in.";

$LANG['REGWARN_PASS'] = "Voer een geldig password in. Geen spaties, meer dan ".MIN_PASSWD_SIZE." karakters en bevat 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Password en verificatie komen niet overeen, probeer opnieuw.";
$LANG['REGWARN_USERNAME_INUSE'] = "Deze gebruikersnaam is al in gebruik. Gebruik een andere.";

$LANG['USER_UPDATE_ERROR'] = "Fout bij bewerken account";
$LANG['PASS_TOO_LONG'] = "Password te lang";
$LANG['PASS_TOO_SHORT'] = "Password te kort";
$LANG['PASS_ALREADY_USED'] = "Dit password is al eens gebruikt. Cre�er een nieuwe.";
$LANG['PASS_ERROR_CHANGING'] = "Fout bij veranderen van password voor";
$LANG['PASS_ERROR_RESETTING'] = "Fout bij resetten van password voor";
$LANG['ERROR_SENDING_EMAIL'] = "Fout bij versturen van email";
$LANG['REGWARN_USERNAME'] = "Niet-alphabetische karakters mogen niet gebruikt worden in gebruikersnaam.";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "Email adres is al in gebruik.";

$LANG['LOST_PASSWORD'] = "Uw password vergeten?";

$LANG['PROMPT_UNAME'] = "Gebruikersnaam";
$LANG['PROMPT_PASSWORD'] = "Password";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Gebruiker kan oude passworden hergebruiken";
$LANG['REPLY_TO_FAX'] = "Beantwoord deze FAX";
$LANG['REPLY_TO_FAX_TIP'] = "De originele fax zal het eerste document zijn na de voorpagina";
$LANG['TITLE_DISTROLIST'] = "Distributie lijst";
$LANG['DISTROLIST_NAME'] = "Lijst naam";
$LANG['DISTROLIST_DELETE'] = "Verwijder lijst";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Deze distributie lijst verwijderen?";
$LANG['DISTROLIST_SAVENAME'] = "Sla lijst naam op";

$LANG['CHANGES_SAVED'] = "Veranderingen opgeslagen";
$LANG['DISTROLIST_DELETED'] = "Lijst verwijderd";
$LANG['DISTROLIST_NOT_CREATED'] = "Lijst niet aangemaakt";
$LANG['DISTROLIST_EXISTS'] = "Lijst bestaat al";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Voer een naam in voor de lijst";
$LANG['DISTROLIST_ADD'] = "Voeg informatie toe";
$LANG['DISTROLIST_REMOVE'] = "Verwijder informatie";
$LANG['DISTROLIST_REFRESH_LIST'] = "Ververs Lijst";

$LANG['PROMPT_EMAIL'] = "E-mail Adres";
$LANG['BUTTON_SEND_PASS'] = "Verzend Password";
$LANG['REGISTER_VPASS'] = "Verifieer Password";
$LANG['FIELDS_REQUIRED'] = "Velden gemarkeerd met een sterretje (*) zijn verplicht.";

$LANG['NEW_PASS_DESC'] = "Vul uw email adres in en klik op de Verzenden Password knop.<br /><br />U ontvang binnen korte tijd een nieuw password.  Gebruik dit nieuwe password om de site te openen.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Vul uw gebruikersnaam en e-mail adres in en klik op de Verzenden Password knop.<br /><br />U ontvang binnen korte tijd een nieuw password.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Uw password wordt verzonden naar uw email adres.<br /><br />Als u uw nieuwe password heeft ontvangen, kunt u inloggen en het veranderen.<br /><br />";

$LANG['SEARCH_TITLE'] = "Zoeken";
$LANG['KEYWORDS'] = "Sleutelwoorden";
$LANG['COMPANY_SEARCH'] = "Zoek bedrijven";
$LANG['COMPANY_LIST'] = "Lijst van bedrijven";
$LANG['SENT_RECVD'] = "Verzonden / Ontvangen";
$LANG['BOTH_SENT_RECVD'] = "Verzonden en ontvangen faxen";
$LANG['ONLY_MY_SENT'] = "Alleen mijn verzonden faxen";
$LANG['ONLY_RECVD'] = "Alleen ontvangen faxen";
$LANG['CONCLUSION'] = "Totaal %d resultaten gevonden.";
$LANG['NOKEYWORD'] = "Geen resultaten gevonden";

$LANG['SEARCH_WHITEPAGES'] = "Doorzoek de gouden gids";

$LANG['PWD_NEEDS_RESET'] = "Uw password moet veranderd worden voor u verder kunt gaan.";
$LANG['PWD_REQUIREMENTS'] = "Password moet minstens ".MIN_PASSWD_SIZE." karakters bevatten";
$LANG['OPASS'] = "Oude Password";
$LANG['NPASS'] = "Nieuwe Password";
$LANG['VPASS'] = "Controleer Password";
$LANG['OPASS_WRONG'] = "Oude password is niet correct.";
$LANG['NAME_MISSING'] = "U moet een naam invullen.";

$LANG['MODIFY_FAXNUMS'] = "Bewerk Bedrijfs fax nummers";
$LANG['MODIFY_EMAILS'] = "Bewerk uw email adressenboek";
$LANG['TITLE_FAXNUMS'] = "Fax Nummers";
$LANG['TITLE_EMAILS'] = "Email Adressen";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Nieuw gebruiker gegevens";
$LANG['NEW_USER_MESSAGE'] = "Hallo %s,

Deze email bevat uw gebruikersnaam en password om in te loggen bij AvantFAX (http://%s)

Gebruikersnaam - %s
Password - %s

Reageer niet op dit bericht omdat het automatisch is gegenereerd en alleen voor informatie doeleinden gebruikt wordt";

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

$LANG['FAXCAT_NOT_CREATED'] = "Fax categorie '%s' is niet gemaakt";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Fax categorie '%s' bestaat al";

$LANG['FAX_FAILED'] = "Probleem bij verzenden van de fax.";
$LANG['FAX_WHY']["done"] = "Klaar";
$LANG['FAX_WHY']["format_failed"] = "Bewerken mislukt";
$LANG['FAX_WHY']["no_formatter"] = "Geen bewerker";
$LANG['FAX_WHY']["poll_no_document"] = "poll geen document";
$LANG['FAX_WHY']["killed"] = "Afgebroken";
$LANG['FAX_WHY']["rejected"] = "Tegengehouden";
$LANG['FAX_WHY']["blocked"] = "Geblokkeerd";
$LANG['FAX_WHY']["removed"] = "verwijderd";
$LANG['FAX_WHY']["timedout"] = "over tijd";
$LANG['FAX_WHY']["poll_rejected"] = "poll tegengehouden";
$LANG['FAX_WHY']["poll_failed"] = "poll mislukt";
$LANG['FAX_WHY']["requeued"] = "opnieuw opgenomen in de que";

$LANG['COMPANY_EXISTS'] = "Bedrijfsnaam bestaat al";
$LANG['FAXNUMID_NOT_CREATED'] = "Kan geen faxnumid maken";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Geen bedrijf bij dit fax nummer";
$LANG['CANT_CHANGE_FAXNUM'] = "U kunt geen toegewezen fax nummer veranderen";

$LANG['MODEM_EXISTS'] = "Modem bestaat al";
$LANG['MODEM_NOT_CREATED'] = "Modem is niet aangemaakt";
$LANG['NO_MODEMS_CONFIGURED'] = "Geen modems geconfigureerd";
$LANG['MODEM_DOESNT_EXIST'] = "Modem %s bestaat niet";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "De categorie is verwijderd";
$LANG['ADMIN_FAXCAT_CREATED'] = "De categorie is aangemaakt";
$LANG['ADMIN_FAXCAT_UPDATED'] = "De categorie is bijgewerkt";

$LANG['ADMIN_MODEM_CREATED'] = "Het modem is aangemaakt";
$LANG['ADMIN_MODEM_DELETED'] = "Het modem is verwijderd";
$LANG['ADMIN_MODEM_UPDATED'] = "Het modem is bijgewerkt";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Klaar voor gebruik";
$LANG['FAXSEND'] = "Verzendt een fax";
$LANG['FAXRECV'] = "Ontvangt een fax";
$LANG['FAXRECVFROM'] = "Ontvangt een fax van";

$LANG['MODEM_DEVICE'] = "Apparaat";
$LANG['MODEM_CONTACT'] = "Contact";
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
$LANG['ADMIN_USERS'] = "Gebruikers";
$LANG['ADMIN_NEW_USER'] = "Nieuwe gebruiker";
$LANG['ADMIN_EDIT_USER'] = "Bewerk gebruiker";
$LANG['ADMIN_DEL_USER'] = "Verwijder gebruiker";
$LANG['ADMIN_LAST_LOGIN'] = "Laatste Login";
$LANG['ADMIN_LAST_IP'] = "Laatste IP";
$LANG['ADMIN_USER_LIST'] = "Gebruikers lijst";
$LANG['ADMIN_FAXCATS'] = "Fax Categorie�n";
$LANG['ADMIN_CONFMODEMS'] = "Configureer Modems";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Statistieken";
$LANG['ADMIN_SYSLOGS'] = "Systeem Logbestanden";
$LANG['ADMIN_SYSFUNC'] = "Systeem Functies";
$LANG['ADMIN_NOUSERS'] = "Geen gebruikers aangemaakt";
$LANG['ADMIN_ACC_ENABLED'] = "Account actief";
$LANG['ADMIN_PWDCYCLE'][] = "Password verloop periode";
$LANG['ADMIN_PWDCYCLE'][] = "Nooit";
$LANG['ADMIN_PWDCYCLE'][] = "Elke 3 Maanden";
$LANG['ADMIN_PWDCYCLE'][] = "Elke 6 Maanden";
$LANG['ADMIN_PWDEXP'] = "Password verloop datum";
$LANG['SUPERUSER'] = "Super gebruiker";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "Gebruiker kan faxen verwijderen";
$LANG['ADMIN_FAXLINES'] = "Zichtbaren fax lijnen";
$LANG['ADMIN_CATEGORIES'] = "Zichtbaren fax categorie�n";
$LANG['REBOOT'] = "Server opnieuw opstarten";
$LANG['SHUTDOWN'] = "Server afsluiten";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "Wacht a.u.b.";
$LANG['LOGTEXT'] = "Log informatie";
$LANG['QUESTION_DELUSER'] = "Wilt u echt verwijderen";

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
