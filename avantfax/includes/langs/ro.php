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

$LANGUAGE = "ro";
$LANGUAGE_NAME = "Romanian";

$LANG = array();

$LANG['ISO'] = "charset=iso-8859-2";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Yes";
$LANG['NO'] = "No";

$LANG['DATE'] = "Data";
$LANG['FROM'] = "De la";
$LANG['TO'] = "Catre";

$LANG['DATE_START'] = "Data de inceput";
$LANG['DATE_END'] = "Data de sfarsit";

$LANG['TO_PERSON'] = "In atentia d-lui (d-nei)";
$LANG['TO_COMPANY'] = "Catre ";
$LANG['TO_LOCATION'] = "Locatia";
$LANG['TO_VOICENUMBER'] = "Catre numarul";

$LANG['MY_COMPANY'] = "Firma";
$LANG['MY_LOCATION'] = "Locatia";
$LANG['MY_VOICENUMBER'] = "Numar de voce";
$LANG['MY_FAXNUMBER'] = "Numar de fax";

$LANG['VIEW_FAX'] = "Vizualizare Fax";
$LANG['ROTATE_FAX'] = "Rotire Fax";
$LANG['DOWNLOAD_PDF'] = "Download PDF";
$LANG['DOWNLOAD_TIFF'] = "Download TIFF";
$LANG['EMAIL_PDF'] = "Email PDF";
$LANG['ADD_NOTE_FAX'] = "Adauga o nota";
$LANG['ARCHIVE_FAX'] = "Muta in arhiva";
$LANG['DELETE_FAX'] = "Sterge definitiv";

$LANG['DELETE_CONFIRM'] = "Va rog sa confirmati ca vreti sa stergeti acest fax.";

$LANG['ASSIGN_CNAME'] = "Asignati un nume de companie";
$LANG['ASSIGN_MISSING'] = "Trebuie sa introduceti un nume de companie";
$LANG['ASSIGN_NOTE'] = "Modificati nota/descrierea acestui fax";
$LANG['ASSIGN_NOTE_SAVED'] = "Nota/descrierea salvata.";
$LANG['ASSIGN_OK'] = "Numele de companie a fost asignat cu success";
$LANG['FAXES'] = "faxuri";

$LANG['NAME'] = "Nume";
$LANG['DESCRIPTION'] = "Descriere";
$LANG['SAVE'] = "Salveaza";
$LANG['DELETE'] = "Sterge";
$LANG['CANCEL'] = "Anuleaza";
$LANG['CREATE'] = "Creeaza";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "Selecteaza";
$LANG['CONTACT_SAVED'] = "Detaliile de contact salvate";
$LANG['CONTACT_DELETED'] = "Contact sters";
$LANG['RUBRICA_SAVED'] = "Detaliile companiei salvate";
$LANG['RUBRICA_DELETED'] = "Companie stearsa";

$LANG['FAX_FILES'] = "Selectati fisierele de trimis prin fax";
$LANG['FAX_DEST'] = "Numerele de destinatie pentru fax";
$LANG['FAX_CPAGE'] = "Foloseste pagina de garda";
$LANG['FAX_REGARDING'] = "Referitor la";
$LANG['FAX_COMMENTS'] = "Comentarii";
$LANG['FAX_FILETYPES'] = "Puteti atasa doar fisiere de tipul: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Trebuie sa selectati un fisier de trimis prin fax";
$LANG['FAX_DEST_MISSING'] = "Trebuie sa introduceti numerele unde veti trimite faxul";
$LANG['FAX_SUBMITTED'] = "Fax-ul dvs. a fost trimis in coada de asteptare.<br />Veti primi un e-mail de confirmare o data ce faxul a fost trimis.";
$LANG['FAX_FILESIZE'] = "Fisierul depaseste marimea admisa";
$LANG['FAX_MAXSIZE'] = "Marimea maxima admisa este $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Numele dvs.";
$LANG['UPDATE'] = "Actualizeaza";
$LANG['USER_DETAILS_SAVED'] = "Setarile utilizatorului au fost salvate.";

$LANG['LANGUAGE'] = "Limba";
$LANG['EMAIL_SIG'] = "Semnatura e-mail";

$LANG['NEXT_FAX'] = "Faxul Urmator";
$LANG['PREV_FAX'] = "Faxul Anterior";

$LANG['LOGIN_TEXT'] = "Introduceti numele si parola pentru a accesa interfata fax.";
$LANG['LOGIN_DISABLED'] = "Contul dvs. a fost dezactivat.  Va rugam contactati administratorul.";
$LANG['LOGIN_INCORRECT'] = "Nume sau parola gresit(a).  Reincercati.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "nume utilizator";
$LANG['PASSWORD'] = "parola";
$LANG['USER'] = "Utilizator";
$LANG['BUTTON_LOGIN'] = "Autentificare";
$LANG['BUTTON_LOGOUT'] = "Sfarsit sesiune";
$LANG['BUTTON_SETTINGS'] = "Setari";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Inbox";
$LANG['MENU_OUTBOX'] = "Outbox"; // <--- NEW
$LANG['MENU_SENDFAX'] = "Trimite Fax";
$LANG['MENU_ARCHIVE'] = "Arhiva";
$LANG['MENU_CONTACTS'] = "Contacte";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "Email";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Companie";
$LANG['CONTACT_HEADER_NEWFAX'] = "Numar de fax nou";
$LANG['CONTACT_HEADER_FAXNUM'] = "Numar de fax";
$LANG['NEW_ENTRY'] = "Inregistrare noua";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES; // <----- NEW
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts"; // <----- NEW
$LANG['UPLOAD_BUTTON'] = "Upload"; // <----- NEW

$LANG['SEND_EMAIL_HEADER'] = "Trimite fax prin e-mail";
$LANG['EMAIL_RECIPIENTS'] = "Destinatari Email";
$LANG['MESSAGE_PROMPT'] = "Mesaj e-mail";
$LANG['BUTTON_SEND'] = "Trimite";
$LANG['SUBJECT'] = "Subiect";
$LANG['PDF_FILENAME'] = "Nume fisier PDF";

$LANG['EMAIL_SUCCESS'] = "E-mail-ul a fost trimis.";
$LANG['EMAIL_FAILURE'] = "Trimiterea e-mail-ului a esuat.";

$LANG['PN_PAGE'] = "Pagina";
$LANG['PN_PAGE_UP'] = "Pagina anterioara";
$LANG['PN_PAGE_DN'] = "Pagina urmatoare";
$LANG['PN_PAGES'] = "Pagini";
$LANG['PN_OF'] = "din";

$LANG['NUM_DIALS'] = "Dials"; // <--- NEW
$LANG['KILL_JOB'] = "Kill job"; // <--- NEW
$LANG['PROMPT_CLOSEWINDOW'] = "Inchide fereastra";

$LANG['LAST_UPDATED'] = "Actualizat ultima data";
$LANG['BACK'] = "[ Inapoi ]";
$LANG['EDIT'] = "Editeaza";
$LANG['ADD'] = "Adauga";
$LANG['WARNCAT'] = "Va rog selectati o categorie";
$LANG['TITLE'] = "Titlu";
$LANG['CATEGORY'] = "Categorie";
$LANG['CATEGORY_NAME'] = "Nume Categorie";

$LANG['LAST_MOD'] = "Modificat ultima data de catre";

$LANG['MONTHS'][] = array("");
$LANG['MONTHS'][] = "Ianuarie";
$LANG['MONTHS'][] = "Februarie";
$LANG['MONTHS'][] = "Martie";
$LANG['MONTHS'][] = "Aprilie";
$LANG['MONTHS'][] = "Mai";
$LANG['MONTHS'][] = "Junie";
$LANG['MONTHS'][] = "Iulie";
$LANG['MONTHS'][] = "August";
$LANG['MONTHS'][] = "Septembrie";
$LANG['MONTHS'][] = "Octombrie";
$LANG['MONTHS'][] = "Noiembrie";
$LANG['MONTHS'][] = "Decembrie";

$LANG['ERROR_PASS'] = "N-a fost gasit nici un utilizator.";
$LANG['NEWPASS_MSG'] = "Contul de utilizator %s are acest e-mail asociat.  Un utilizator web de la  %s a cerut sa-i fie trimisa o noua parola.

Noua parola este: %s

Daca aceasta a fost o greseala va puteti logina cu noua parola si apoi schimba parola.";

$LANG['ADMIN_NEWPASS_MSG'] = "Parola contului de administrator a fost setata la:\n\t%s\n de catre un utilizator de la %s";

$LANG['REGWARN_MAIL'] = "Va rog introduceti o adresa de mail valida";

$LANG['REGWARN_PASS'] = "Va rog introduceti o parola valida.  Fara spatii, mai mult de ".MIN_PASSWD_SIZE." caractere si sa contina 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Parola si verificarea nu sunt identice, va rog reincercati.";
$LANG['REGWARN_USERNAME_INUSE'] = "Acest nume de utilizator este deja folosit. Va rog reincercati.";

$LANG['USER_UPDATE_ERROR'] = "Eroare in actualizarea contului";
$LANG['PASS_TOO_LONG'] = "Parola prea lunga";
$LANG['PASS_TOO_SHORT'] = "Parola prea scurta";
$LANG['PASS_ALREADY_USED'] = "Aceasta parola a mai fost folosita.  Va rog sa creati o parola noua.";
$LANG['PASS_ERROR_CHANGING'] = "Eroare la schimbarea parolei pentru";
$LANG['PASS_ERROR_RESETTING'] = "Eroare la reinitializarea parolei pentru";
$LANG['ERROR_SENDING_EMAIL'] = "Email nu a putut fi trimis.";
$LANG['REGWARN_USERNAME'] = "Numai caracterele alfa-numerice sunt permise in numele de utilizator.";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "Adresa e-mail este deja folosita.";

$LANG['LOST_PASSWORD'] = "Ai uitat parola?";

$LANG['PROMPT_UNAME'] = "Utilizator";
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


$LANG['PROMPT_EMAIL'] = "Adresa e-mail";
$LANG['BUTTON_SEND_PASS'] = "Trimite Parola";
$LANG['REGISTER_VPASS'] = "Verifica Parola";
$LANG['FIELDS_REQUIRED'] = "Campurile marcate cu un asterix (*) sunt necesare.";

$LANG['NEW_PASS_DESC'] = "Va rog sa introduceti adresa de mail si apoi sa apasati pe butonul Trimite Parola.<br /><br />Veti primi o parola noua in scurt timp.  Folositi aceasta parola pentru a accesa situl.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Introduceti numele de utilizator si adresa si adresa de mail apoi apasati butonul Trimite Parola.<br /><br />Veti primi o noua parola in scurt timp.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Parola va fi trimisa la adresa de mail specificata.<br /><br />Dupa autentificare veti putea schimba parola<br /><br />";

$LANG['SEARCH_TITLE'] = "Cauta";
$LANG['KEYWORDS'] = "Cuvinte cheie";
$LANG['COMPANY_SEARCH'] = "Cautare dupa companie";
$LANG['COMPANY_LIST'] = "Lista Firme";
$LANG['SENT_RECVD'] = "Trimise / Receptionate";
$LANG['BOTH_SENT_RECVD'] = "Faxuri trimise si receptionate";
$LANG['ONLY_MY_SENT'] = "Doar fax-urile trimise de catre mine";
$LANG['ONLY_RECVD'] = "Doar faxurile receptionate";
$LANG['CONCLUSION'] = "Au fost gasite un total de %d";
$LANG['NOKEYWORD'] = "Nu a fost gasit nimic";

$LANG['SEARCH_WHITEPAGES'] = "Cauta pagini albe";

$LANG['PWD_NEEDS_RESET'] = "Parola trebuie schimbata inainte de a putea continua.";
$LANG['PWD_REQUIREMENTS'] = "Parola trebuie sa contina minimum ".MIN_PASSWD_SIZE." caractere";
$LANG['OPASS'] = "Parola Veche";
$LANG['NPASS'] = "Parola Noua";
$LANG['VPASS'] = "Verifica Parola";
$LANG['OPASS_WRONG'] = "Parola veche nu este corecta.";
$LANG['NAME_MISSING'] = "Trebuie sa introduceti un nume";

$LANG['MODIFY_FAXNUMS'] = "Modificati numerele de fax ale companiei";
$LANG['MODIFY_EMAILS'] = "Modificati lista de contacte e-mail";
$LANG['TITLE_FAXNUMS'] = "Numere de fax";
$LANG['TITLE_EMAILS'] = "Adrese e-mail";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Detalii Utilizator Nou";
$LANG['NEW_USER_MESSAGE'] = "Salut %s,

Acest email contine numele de utilizator si parola pentru a va putea autentifica in AvantFAX (http://%s)

Nume utilizator - %s
Parola - %s

Va rog sa nu raspundeti la acest mesaj. Acest mesaj este generat automat si are un scop informativ.";

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

$LANG['FAXCAT_NOT_CREATED'] = "Categoria fax '%s' nu a fost creata";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Categoria fax '%s' exista deja";

$LANG['FAX_FAILED'] = "Nu am reusit sa trimit fax-ul";
$LANG['FAX_WHY']["done"] = "Finalizat";
$LANG['FAX_WHY']["format_failed"] = "format esuat";
$LANG['FAX_WHY']["no_formatter"] = "lipsa formatare";
$LANG['FAX_WHY']["poll_no_document"] = "Nu exista document pentru retransmitere";
$LANG['FAX_WHY']["killed"] = "intrerupt";
$LANG['FAX_WHY']["rejected"] = "respins";
$LANG['FAX_WHY']["blocked"] = "blocat";
$LANG['FAX_WHY']["removed"] = "sters";
$LANG['FAX_WHY']["timedout"] = "expirat";
$LANG['FAX_WHY']["poll_rejected"] = "retransmitere respinsa";
$LANG['FAX_WHY']["poll_failed"] = "retransmitere esuata";
$LANG['FAX_WHY']["requeued"] = "repus la coada";

$LANG['COMPANY_EXISTS'] = "Numele companiei exista deja";
$LANG['FAXNUMID_NOT_CREATED'] = "Nu am putut crea faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Nu exista nume de companie pentru acest numar de fax";
$LANG['CANT_CHANGE_FAXNUM'] = "Nu puteti schimba un numar de fax definit";

$LANG['MODEM_EXISTS'] = "Modemul exista deja";
$LANG['MODEM_NOT_CREATED'] = "Modemul nu a fost creat";
$LANG['NO_MODEMS_CONFIGURED'] = "Nu exista modem-uri configurate";
$LANG['MODEM_DOESNT_EXIST'] = "Modemul %s nu exista";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "Categoria a fost stearsa";
$LANG['ADMIN_FAXCAT_CREATED'] = "Categoria a fost creata";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Categoria a fost actualizata";

$LANG['ADMIN_MODEM_CREATED'] = "Modemul a fost creat";
$LANG['ADMIN_MODEM_DELETED'] = "Modemul a fost sters";
$LANG['ADMIN_MODEM_UPDATED'] = "Modemul a fost actualizat";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Disponibil";
$LANG['FAXSEND'] = "In curs de trimitere a unui fax";
$LANG['FAXRECV'] = "In curs de receptionare a unui fax";
$LANG['FAXRECVFROM'] = "In curs de receptionare a unui fax de la";

$LANG['MODEM_DEVICE'] = "Port";
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

$LANG['ADMIN_PRINTER'] = "Printer"; // <----- NEW
$LANG['PRINT'] = "Print"; // <----- NEW

$LANG['ADMIN_CONFIGURE'] = "Configure..."; // <----- NEW
$LANG['ADMIN_USERS'] = "Utilizatori";
$LANG['ADMIN_NEW_USER'] = "Utilizator nou";
$LANG['ADMIN_EDIT_USER'] = "Modifica utilizator";
$LANG['ADMIN_DEL_USER'] = "Sterge Utilizator";
$LANG['ADMIN_LAST_LOGIN'] = "Ultima autentificare";
$LANG['ADMIN_LAST_IP'] = "Ultimul IP";
$LANG['ADMIN_USER_LIST'] = "Lista utilizatori";
$LANG['ADMIN_FAXCATS'] = "Categorii FAx";
$LANG['ADMIN_CONFMODEMS'] = "Configureaza Modemuri";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Statistici";
$LANG['ADMIN_SYSLOGS'] = "Istoric sistem";
$LANG['ADMIN_SYSFUNC'] = "Functii de sistem";
$LANG['ADMIN_NOUSERS'] = "Nu a fost creat nici un utilizator";
$LANG['ADMIN_ACC_ENABLED'] = "Cont activ";
$LANG['ADMIN_PWDCYCLE'][] = "Ciclu expirare parola";
$LANG['ADMIN_PWDCYCLE'][] = "Niciodata";
$LANG['ADMIN_PWDCYCLE'][] = "La fiecare 3 luni";
$LANG['ADMIN_PWDCYCLE'][] = "La fiecare 6 luni";
$LANG['ADMIN_PWDEXP'] = "Data de expirare a parolei";
$LANG['SUPERUSER'] = "Super utilizator";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "Utilizatorul poate sterge fax-uri";
$LANG['ADMIN_FAXLINES'] = "Linii fax vizibile";
$LANG['ADMIN_CATEGORIES'] = "Categorii fax vizualizabile";
$LANG['REBOOT'] = "Restarteaza server";
$LANG['SHUTDOWN'] = "Opreste server";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "Va rugam asteptati";
$LANG['LOGTEXT'] = "Informatii istoric";
$LANG['QUESTION_DELUSER'] = "Sunteti sigur ca vreti sa stergeti";

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
