<?php
/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 * PHP 5 only
 *
 * @author		Danijel Getejanc <getejanc@gmail.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

$LANGUAGE = "rs";
$LANGUAGE_NAME = "Serbian";

$LANG = array();

$LANG['ISO'] = "charset=iso-8859-2";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Da";
$LANG['NO'] = "Ne";

$LANG['DATE'] = "Datum";
$LANG['FROM'] = "Od";
$LANG['TO'] = "Za";

$LANG['DATE_START'] = "Početni datum";
$LANG['DATE_END'] = "Krajnji datum";

$LANG['TO_PERSON'] = "Za lice";
$LANG['TO_COMPANY'] = "Za kompanju";
$LANG['TO_LOCATION'] = "Za lokaciju";
$LANG['TO_VOICENUMBER'] = "Za govornu poštu";

$LANG['MY_COMPANY'] = "Kompanija";
$LANG['MY_LOCATION'] = "Lokacija";
$LANG['MY_VOICENUMBER'] = "Broj govorne pošte";
$LANG['MY_FAXNUMBER'] = "Broij faksa";

$LANG['VIEW_FAX'] = "Pogledaj Fax";
$LANG['ROTATE_FAX'] = "Rotiraj Fax";
$LANG['DOWNLOAD_PDF'] = "Preuzmi PDF";
$LANG['DOWNLOAD_TIFF'] = "Preuzmi TIFF";
$LANG['EMAIL_PDF'] = "Email PDF";
$LANG['ADD_NOTE_FAX'] = "Dodaj napomenu...";
$LANG['ARCHIVE_FAX'] = "Premesti u arhivu";
$LANG['DELETE_FAX'] = "Trajno izbriši";

$LANG['DELETE_CONFIRM'] = "Molim potvrdu da želite obrisati ovaj fax.";

$LANG['ASSIGN_CNAME'] = "Dodeli naziv kompanije";
$LANG['ASSIGN_MISSING'] = "Morate uneti ime kompanije";
$LANG['ASSIGN_NOTE'] = "Izmenite ovaj fax napomena / opis";
$LANG['ASSIGN_NOTE_SAVED'] = "Napomena / opis su sačuvani.";
$LANG['ASSIGN_OK'] = "Naziv kompanije je uspešno dodeljen.";
$LANG['FAXES'] = "faksovi";

$LANG['NAME'] = "Ime";
$LANG['DESCRIPTION'] = "Opis";
$LANG['SAVE'] = "Sačuvaj";
$LANG['DELETE'] = "Izbriši";
$LANG['CANCEL'] = "Odustani";
$LANG['CREATE'] = "Kreiraj";
$LANG['EMAIL'] = "Elektronska pošta";
$LANG['SELECT'] = "Izaberi";
$LANG['CONTACT_SAVED'] = "Detalji kontakta sačuvani";
$LANG['CONTACT_DELETED'] = "Kontakti izbrisani";
$LANG['RUBRICA_SAVED'] = "Detalji kompanije sačuvani";
$LANG['RUBRICA_DELETED'] = "Kompanija izbrisana";

$LANG['FAX_FILES'] = "Izaberite dokument za FAX";
$LANG['FAX_DEST'] = "Broj odredišta za fax";
$LANG['FAX_CPAGE'] = "Koristi naslovnu stranicu";
$LANG['FAX_REGARDING'] = "U vezi sa";
$LANG['FAX_COMMENTS'] = "Komentari";
$LANG['FAX_FILETYPES'] = "Možete priložiti tipove datoteka: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Morate izabrati fajl za fax";
$LANG['FAX_DEST_MISSING'] = "Morate uneti broj faksa na koji želite poslati dokument";
$LANG['FAX_SUBMITTED'] = "Vaš fax je uspešno predat na čekanje za slanje faksom.<br />Dobićete potvrdu e-poštom kad fax bude poslat.";
$LANG['FAX_FILESIZE'] = "Veličina dokumenta je prekoračila limit.";
$LANG['FAX_MAXSIZE'] = "Maksimalna veličina datoteke je $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Obavesti o obnovi čekanja";

$LANG['FUPLOAD_NO_FILE'] = "Fajl nije otpremljen";
$LANG['FUPLOAD_NOT_ALLOWED'] = "Neovlašćen tip datoteke";
$LANG['FUPLOAD_OVER_LIMIT'] = "Veličina fajla je prekoračila limit";
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "Veliina fajla je preko limita (INI)";
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "Veliina fajla je preko limita (FORM)";
$LANG['FUPLOAD_NOT_COMPLETE'] = "Datoteka nije u potpunosti odpremljena";
$LANG['FUPLOAD_NO_TEMPDIR'] = "Nema privremenog direktorijuma";
$LANG['FUPLOAD_CANT_WRITE'] = "Ne mogu upisati otpremljenu fajl";

$LANG['YOUR_NAME'] = "Vaše ime";
$LANG['UPDATE'] = "Ažuriraj";
$LANG['USER_DETAILS_SAVED'] = "Korisnička podešavanja su sačuvana.";

$LANG['LANGUAGE'] = "Jezik";
$LANG['EMAIL_SIG'] = "Potpis e-poašta";

$LANG['NEXT_FAX'] = "Sledeći Fax";
$LANG['PREV_FAX'] = "Prethodni Fax";

$LANG['LOGIN_TEXT'] = "Unesite Vaše korisničko ime i lozinku za pristup FAX interfejsu.";
$LANG['LOGIN_DISABLED'] = "Vaš nalog je ukinut. Molimo kontaktirajte sistem administratora.";
$LANG['LOGIN_INCORRECT'] = "Pogrešno korisničko ime ili lozinka.<br />Molimo pokušajte ponovo.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Pristup odbijen";

$LANG['USERNAME'] = "korisnički nalog";
$LANG['PASSWORD'] = "lozinka";
$LANG['USER'] = "Korisnik";
$LANG['BUTTON_LOGIN'] = "Prijavljivanje";
$LANG['BUTTON_LOGOUT'] = "Odjava";
$LANG['BUTTON_SETTINGS'] = "Podešavanja";

$LANG['MENU_MENU'] = "Meni";
$LANG['MENU_INBOX'] = "Prijem";
$LANG['MENU_OUTBOX'] = "Slanje";
$LANG['MENU_SENDFAX'] = "Pošalji Fax";
$LANG['MENU_ARCHIVE'] = "Arhiviraj";
$LANG['MENU_CONTACTS'] = "Kontakti";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "E-pošta";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Kompanija";
$LANG['CONTACT_HEADER_NEWFAX'] = "Novi fax broj";
$LANG['CONTACT_HEADER_FAXNUM'] = "Fax broj";
$LANG['NEW_ENTRY'] = "Novi unos";
$LANG['UPLOAD_CONTACTS'] = "Otpremi datoteku kontakata ".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = "%d uspešno otpremnljenih kontakata";
$LANG['UPLOAD_BUTTON'] = "Otpremi";

$LANG['SEND_EMAIL_HEADER'] = "Prosledi fax putem e-pošte";
$LANG['EMAIL_RECIPIENTS'] = "E-pošta primaoca";
$LANG['MESSAGE_PROMPT'] = "E-pošta poruka";
$LANG['BUTTON_SEND'] = "Pošalji";
$LANG['SUBJECT'] = "Predmet";
$LANG['PDF_FILENAME'] = "Ime PDF dokumenta";

$LANG['EMAIL_SUCCESS'] = "E-pošta je uspeano poslata.";
$LANG['EMAIL_FAILURE'] = "Slanje e-pošte nije uspelo!";

$LANG['PN_PAGE'] = "Strana";
$LANG['PN_PAGE_UP'] = "Gore stranica";
$LANG['PN_PAGE_DN'] = "Dole stranica";
$LANG['PN_PAGES'] = "Strane";
$LANG['PN_OF'] = "od";
$LANG['NUM_DIALS'] = "Birano";
$LANG['KILL_JOB'] = "Obustavi proces";

$LANG['PROMPT_CLOSEWINDOW'] = "Zatvori prozor";

$LANG['LAST_UPDATED'] = "Poslednji put ažurirano";
$LANG['BACK'] = "Nazad";
$LANG['EDIT'] = "Izmeni";
$LANG['ADD'] = "Dodaj";
$LANG['WARNCAT'] = "Molimo izaberite kategoriju";
$LANG['TITLE'] = "Naslov";
$LANG['CATEGORY'] = "Kategorija";
$LANG['CATEGORY_NAME'] = "Ime kategorije";

$LANG['LAST_MOD'] = "Poslednje izmene od";

$LANG['MONTHS'] = array("");
$LANG['MONTHS'][] = "Januar";
$LANG['MONTHS'][] = "Februar";
$LANG['MONTHS'][] = "Mart";
$LANG['MONTHS'][] = "April";
$LANG['MONTHS'][] = "Maj";
$LANG['MONTHS'][] = "Jun";
$LANG['MONTHS'][] = "Jul";
$LANG['MONTHS'][] = "Avgust";
$LANG['MONTHS'][] = "Septembar";
$LANG['MONTHS'][] = "Octobar";
$LANG['MONTHS'][] = "Novembar";
$LANG['MONTHS'][] = "Decembar";

$LANG['ERROR_PASS'] = "Nažalost, odgovarajući korisnik nije pronađen.";
$LANG['NEWPASS_MSG'] = "Korisnički nalog %s poseduje ovaj email i povezan je sa njom.  Web korisnik sa %s upravo je podneo zahtev za dodelom i slanjem nove lozinke.

Vaša nova lozinka je: %s

Ako je ovo bila greška samo se prijavite sa novom lozinkom, a potom promenite Vašu lozinku u onu u koju biste vi želite da bude.";

$LANG['ADMIN_NEWPASS_MSG'] = "Administratorsiki nalog lozinka je resetovana na:\n\t%s\n Od strane korisnika %s";

$LANG['REGWARN_MAIL'] = "Molimo unesite valinu e-mail adresu.";
$LANG['REGWARN_PASS'] = "Molimo unesite valinu lozinku.  Bez razmaka, više od ".MIN_PASSWD_SIZE." karaktera koji sadrže  0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Lozinka i verifikacija se ne poklapaju, molimo ponovite unos.";
$LANG['REGWARN_USERNAME_INUSE'] = "Ovaj korisnički narlog već postoji. Molimo pokušajte ponovo.";

$LANG['USER_UPDATE_ERROR'] = "Greaka u ažuriranju naloga";
$LANG['PASS_TOO_LONG'] = "Lozinka je suviae dugačka";
$LANG['PASS_TOO_SHORT'] = "Lozinka je suviše kratka";
$LANG['PASS_ALREADY_USED'] = "Ova lozinka je već iskorištena. Molimo Vas da napravite novu.";
$LANG['PASS_ERROR_CHANGING'] = "Greška u izmeni lozinke za";
$LANG['PASS_ERROR_RESETTING'] = "Greška u resetovanju lozinke za";
$LANG['ERROR_SENDING_EMAIL'] = "Greška u slanju E-pošte";
$LANG['REGWARN_USERNAME'] = "Ne-alfanumerički karakteri nisu dozvoljeni u korisničkom nalogu";
$LANG['REGWARN_NOUSERNAME'] = "Morate uneti korisnički nalog";
$LANG['REGWARN_MAIL_EXISTS'] = "E-mail adresa je već u upotrebi.";

$LANG['LOST_PASSWORD'] = "Izgubiliste Vašu lozinku?";

$LANG['PROMPT_UNAME'] = "Korisnički nalog";
$LANG['PROMPT_PASSWORD'] = "Lozinka";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Korisniku omogućeno ponovno korišćenje stare lozinke";
$LANG['REPLY_TO_FAX'] = "Odgovori na FAX";
$LANG['REPLY_TO_FAX_TIP'] = "Fax original biće prvi dokument posle naslovne strane";
$LANG['PROMPT_EMAIL'] = "E-mail Adressa";
$LANG['BUTTON_SEND_PASS'] = "Pošalji lozinku";
$LANG['REGISTER_VPASS'] = "Porvrda lozinke";
$LANG['FIELDS_REQUIRED'] = "Polja označena jenom zvezdicom (*) su obavezna.";

$LANG['NEW_PASS_DESC'] = "Molimo unesite Vašu e-mail adresu, a potom kliknite na dugme Pošalji lozinku.<br /><br  />Primićete uskoro novu lozinku.<br /><br />Iskoristite novu lozinku za pristup sajtu.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Molimo unesite Vašu e-mail adresu, a potom kliknite na dugme Pošalji lozinku.<br /><br  />Primićete uskoro novu lozinku.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Vaša lozina biće poslata na datu e-mail adresu.<br /><br />Jednom kada dobijete novu lozinku, možete se prijaviti i promeniti je.<br /><br />";

$LANG['SEARCH_TITLE'] = "Pretraga";
$LANG['KEYWORDS'] = "Kljune reči";
$LANG['COMPANY_SEARCH'] = "Pretraga kompanija";
$LANG['COMPANY_LIST'] = "Lilsta kompanija";
$LANG['SENT_RECVD'] = "Poslato / Primljeno";
$LANG['BOTH_SENT_RECVD'] = "Oba poslata i primljena faksa";
$LANG['ONLY_MY_SENT'] = "Samo poslati faksovi";
$LANG['ONLY_RECVD'] = "Samo primljeni faksovi";
$LANG['CONCLUSION'] = "Ukupno %d rezultata pronađeno.";
$LANG['NOKEYWORD'] = "Nisu pronađeni rezultati";

$LANG['SEARCH_WHITEPAGES'] = "Pretraži bele stranice";

$LANG['PWD_NEEDS_RESET'] = "Pre nego što nastavite, Vaša lozinka mora biti promenjena.";
$LANG['PWD_REQUIREMENTS'] = "Lozinka mora biti minimum ".MIN_PASSWD_SIZE." karaktera.";
$LANG['OPASS'] = "Stara lozinka";
$LANG['NPASS'] = "Nova lozinka";
$LANG['VPASS'] = "Potvrda lozinke";
$LANG['OPASS_WRONG'] = "Stara lozinka je pogrešna.";
$LANG['NAME_MISSING'] = "Morate uneti ime.";

$LANG['MODIFY_FAXNUMS'] = "Izmeni boj faksa kompanije";
$LANG['MODIFY_EMAILS'] = "Izmeni Vša adresar za e-poštu";
$LANG['TITLE_FAXNUMS'] = "Brojevi faksa";
$LANG['TITLE_EMAILS'] = "E-mail adrese";

$LANG['TITLE_DISTROLIST'] = "Lista dostave";
$LANG['DISTROLIST_NAME'] = "Lista imena";
$LANG['DISTROLIST_DELETE'] = "Izbriši liste";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Izbriši ovu listu dostave?";
$LANG['DISTROLIST_SAVENAME'] = "Sačuvaj spisak imena";

$LANG['CHANGES_SAVED'] = "Promene sačuvane";
$LANG['DISTROLIST_DELETED'] = "Lista je obrisana";
$LANG['DISTROLIST_NOT_CREATED'] = "Lista nije kreirana";
$LANG['DISTROLIST_EXISTS'] = "Lista već postoji";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Unesite ime za listu";
$LANG['DISTROLIST_ADD'] = "Dodaj stavku";
$LANG['DISTROLIST_REMOVE'] = "Ukloni stavku";
$LANG['DISTROLIST_REFRESH_LIST'] = "Osveži listu";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Novi detalji korisnika";
$LANG['NEW_USER_MESSAGE'] = "Zdravo %s,

Ovaj e-pošta sadrži Vaš korisnički nalog i lozinku za prijavljivanje na AvantFAX (http://%s)

Korisnički nalog - %s
Lozinka - %s

Molimo da ne odgovarate na ovu poruku koja se automatski generiše i služi samo za informisanje.";

$LANG['DIDROUTE_EXISTS'] = "Ruta već postoji";
$LANG['DIDROUTE_NOT_CREATED'] = "Ruta nije kreirana";
$LANG['DIDROUTE_NO_ROUTES'] = "Nije konfigurisana DID/DTMF ruta";
$LANG['DIDROUTE_DOESNT_EXIST'] = "Ruta %s ne postoji";
$LANG['ADMIN_PRINTER'] = "Štampa";
$LANG['PRINT'] = "Štampaj";

$LANG['ADMIN_DIDROUTE_CREATED'] = "Ruta je kreirana";
$LANG['ADMIN_DIDROUTE_DELETED'] = "Ruta je izbrisana";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "Ruta je osvežena";
$LANG['ADMIN_DIDROUTES'] = "DID/DTMF grupe ruta";
$LANG['DIDROUTE_ROUTECODE'] = "DID/DTMF brojevi";
$LANG['DIDROUTE_CATCHALL'] = "Obuhvati sve";
$LANG['ADMIN_CONFDIDROUTING'] = "DID/DTMF grupe";
$LANG['GROUP'] = "Grupa";

$LANG['USER_ANYMODEM'] = "Korisnik može slati faks sa bilokog modema";

$LANG['BARCODEROUTE_BARCODE'] = "Barcode";
$LANG['MISSING_BARCODE'] = "Nedostaje barcode";
$LANG['ADMIN_BARCODEROUTE_DELETED'] = "Barcode ruta izbrisana";
$LANG['ADMIN_BARCODEROUTE_UPDATED'] = "Barcode ruta osvežena";
$LANG['ADMIN_BARCODEROUTE_CREATED'] = "Barcode ruta kreirana";
$LANG['BARCODEROUTE_NOT_CREATED'] = "Barcode ruta nije kreirana";
$LANG['BARCODEROUTE_EXISTS'] = "Barcode već postoji";
$LANG['BARCODEROUTE_NO_ROUTES'] = "Barcode rute nema";
$LANG['BARCODEROUTE_DOESNT_EXIST'] = "Barcode ruta %s ne postoji";

$LANG['FAXCAT_NOT_CREATED'] = "Fax kategorija '%s' nije kreirana";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Fax kategorija '%s' već postoji";

$LANG['FAX_FAILED'] = "Problem prilikom slanja faksa.";
$LANG['FAX_WHY']["done"] = "Gotovo";
$LANG['FAX_WHY']["format_failed"] = "Pogrešan format";
$LANG['FAX_WHY']["no_formatter"] = "Nema formata";
$LANG['FAX_WHY']["poll_no_document"] = "glasanje bez dokumenata";
$LANG['FAX_WHY']["killed"] = "zaustavljen proces";
$LANG['FAX_WHY']["rejected"] = "odbijeno";
$LANG['FAX_WHY']["blocked"] = "blokirano";
$LANG['FAX_WHY']["removed"] = "premešteno";
$LANG['FAX_WHY']["timedout"] = "isteklo vreme";
$LANG['FAX_WHY']["poll_rejected"] = "odbijeno glasanje";
$LANG['FAX_WHY']["poll_failed"] = "pogrešno glasanje";
$LANG['FAX_WHY']["requeued"] = "obavezujuće";

$LANG['COMPANY_EXISTS'] = "Ime kompanije već postoji";
$LANG['FAXNUMID_NOT_CREATED'] = "Nije moguće kreirati faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Nema kompanije za ovaj broj faksa";
$LANG['CANT_CHANGE_FAXNUM'] = "Ne možete menjati osnovni broj faksa";

$LANG['MODEM_EXISTS'] = "Modemski uređaj već postoji";
$LANG['MODEM_NOT_CREATED'] = "Modemski uređaj nije kreiran";
$LANG['NO_MODEMS_CONFIGURED'] = "Nema konfigurisanih modema";
$LANG['MODEM_DOESNT_EXIST'] = "Modem %s ne postoji";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "Kategorija je izbrisana";
$LANG['ADMIN_FAXCAT_CREATED'] = "Kategorija je kreirana";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Kategorija je osvežena";

$LANG['ADMIN_MODEM_CREATED'] = "Modem je kreiran";
$LANG['ADMIN_MODEM_DELETED'] = "Modem je izbrisan";
$LANG['ADMIN_MODEM_UPDATED'] = "Modem je osvežen";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Besposlen";
$LANG['FAXSEND'] = "Slanje faksa";
$LANG['FAXRECV'] = "Primanje faksa";
$LANG['FAXRECVFROM'] = "Primanje faksa od";

$LANG['MODEM_DEVICE'] = "Uređaj";
$LANG['MODEM_CONTACT'] = "Kontakt";
$LANG['MODEM_ALIAS'] = "Alias";

$LANG['COVER_FILE'] = "File name"; // <--- NEW
$LANG['COVER_TITLE'] = "Coverpage Title"; // <--- NEW
$LANG['SELECT_COVERPAGE'] = "Select cover page"; // <--- NEW

$LANG['MISSING_CATEGORY_NAME'] = "Morate uneti naziv kategorije";
$LANG['MISSING_DEVICE_NAME'] = "Morate uneti naziv uređaja";
$LANG['MISSING_ALIAS_NAME'] = "Morate uneti alias";
$LANG['MISSING_CONTACT_NAME'] = "Morate uneti ime za kontakt";
$LANG['MISSING_ROUTE'] = "Morate uneti DID/DTMF brojeve";

$LANG['MISSING_FILE_NAME'] = "You must enter a file name"; // <----- NEW
$LANG['MISSING_TITLE_NAME'] = "You must enter a title"; // <----- NEW

$LANG['ADMIN_CONFIGURE'] = "Konfigurisanje...";
$LANG['ADMIN_USERS'] = "Korisnici";
$LANG['ADMIN_NEW_USER'] = "Novi korisnik";
$LANG['ADMIN_EDIT_USER'] = "Izmena korisnika";
$LANG['ADMIN_DEL_USER'] = "Izbriši korisnika";
$LANG['ADMIN_LAST_LOGIN'] = "Poslednja prijava";
$LANG['ADMIN_LAST_IP'] = "Poslednja IP adresa";
$LANG['ADMIN_USER_LIST'] = "Lista korisnika";
$LANG['ADMIN_FAXCATS'] = "Fax kategorije";
$LANG['ADMIN_CONFMODEMS'] = "Modemi";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Konfigurisanje rutiranja po ...";
$LANG['ADMIN_ROUTEBY_SENDER'] = "Rutiranje po pošiljaocu";
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Pošiljaoc";
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Rutiranje po barkodu(Barcode)";
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode";
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Rutiranje po ključnim rečima";
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Ključna reč";

$LANG['ADMIN_DASHBOARD'] = "Kontrolna tabla"; // <----- NEW
$LANG['ADMIN_STATS'] = "Statistika";
$LANG['ADMIN_SYSLOGS'] = "System Logs";
$LANG['ADMIN_SYSFUNC'] = "Sistemske funkcije";
$LANG['ADMIN_NOUSERS'] = "Nema kreiranih korisnika";
$LANG['ADMIN_ACC_ENABLED'] = "Aktivni nalozi";
$LANG['ADMIN_PWDCYCLE'][] = "Ciklusi isticanja lozinke";
$LANG['ADMIN_PWDCYCLE'][] = "Nikad";
$LANG['ADMIN_PWDCYCLE'][] = "Svaka 3 meseca";
$LANG['ADMIN_PWDCYCLE'][] = "Svakih 6 meseci";
$LANG['ADMIN_PWDEXP'] = "Datum isticanja lozinke";
$LANG['SUPERUSER'] = "Super korisnik";
$LANG['IS_ADMIN'] = "Administrator";
$LANG['USER_CANDEL'] = "Korisniku omogućeno brisanje faksova";
$LANG['ADMIN_FAXLINES'] = "Vidljive faks linije";
$LANG['ADMIN_CATEGORIES'] = "Vidljive faks kategorije";
$LANG['REBOOT'] = "Restart servera";
$LANG['SHUTDOWN'] = "Gašenje servera";
$LANG['DOWNLOADARCHIVE'] = "Preuzimanje arhive";
$LANG['DOWNLOADDB'] = "Preuzimanje baze podataka";
$LANG['PLSWAIT'] = "Molimo Vas sačekajte";
$LANG['LOGTEXT'] = "Dnevnik informacija";
$LANG['QUESTION_DELUSER'] = "Da li ste sigurni da želite izbrisati?";

$LANG['TSI_ID'] = "TSI ID";
$LANG['PRIORITY'] = "Prioritet";
$LANG['BLACKLIST'] = "Lista nepoželjnih";
$LANG['MODIFY_FAXJOB'] = "Izmeni posao";
$LANG['NEW_DESTINATION'] = "Nova destinacija";
$LANG['SCHEDULE_FAX'] = "Raspored isporuka - auto";
$LANG['FAX_NUMTRIES'] = "Broj pokušaja";
$LANG['FAX_KILLTIME'] = "Vreme isteka";
$LANG['NOW'] = "Sad";
$LANG['MINUTES'] = "Minuti";
$LANG['HOURS'] = "Sati";
$LANG['DAYS'] = "Dana";

$LANG['ADMIN_CONFDYNCONF'] = "Lista nepoželjnih";
$LANG['DYNCONF_MISSING_CALLID'] = "Morate uneti CallID";
$LANG['DYNCONF_NOT_CREATED'] = "Pravilo nije kreirano";
$LANG['DYNCONF_EXISTS'] = "Pravilo već postoji";
$LANG['DYNCONF_CALLID'] = "Caller ID";
$LANG['DYNCONF_CREATED'] = "Pravilo je kreirano";
$LANG['DYNCONF_DELETED'] = "Pravilo je izbrisano";
$LANG['DYNCONF_UPDATED'] = "Pravilo je osveženo";
$LANG['OPTIONS'] = "Opcije";

$LANG['MUST_CREATE_ROUTES'] = "<a href=\"conf_didroute.php\">Prvo morate kreirati DID/DTMF grupu</a>";
$LANG['MUST_CREATE_MODEMS'] = "<a href=\"conf_modems.php\">Prvo morate kreirati modem</a>";
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">Prvo morate kreirati kategoriju</a>";

$LANG['EXPLAIN_CATEGORIES'] = "Kategorije su korisne za organizovanje faksova u AvantFAX arhivi. Obinčim korisnicima su dodeljena ograničenja na uvid i pristup kategorijama.";
$LANG['EXPLAIN_DYNCONF'] = "HylaFAX's DynamicConfig i RejectCall funkcije se koriste za odbijanje prijema faksova od poznatih prestupnika.  Da biste dodali stavku na ovu Crnu listu, unesite Caller ID pošiljaoca kojeg želite da blokirate.   Opciono, možete izabrati uređaj ako samo želite da ovog pošiljaoca na tom aparatu.";
$LANG['EXPLAIN_DIDROUTE'] = "DID/DTMF rutiranje se koristi za preusmeravanje faksova na određenu prijemnu grupu.   HylaFAX moraju se ispravno konfigurisati za rad.  Pojedinačne prijave moraju biti kreirane za svaku prijemnu grupu koju  nameravate da kristite sa AvantFAX.  DID/DTMF brjčana polja su za identifikovanje informacija primljenih od HylaFAX --  obično poslednje 3 ili 4 cifre ili čak 10 cifara broja faksa. Polje Alias se koristi za opis lokacije odnosno namena mu je za identifikovanje grupe.  NPR: Faks linije dodeljene za oba odeljenje Prodaju ili Podršku. Polje Kontakti je za adresu e-pošte, i svaki faks koji bude stigao za ovu grupu biće poslat kontakt e-mail adresu.  Polje Štampanje određuje koji CUPS/lpr štampač će štampati Fax.  Obični koristnici mogu samo videti faksove  iz identifikacione koje su im dodeljene.";
$LANG['EXPLAIN_MODEMS'] = "Modemska odrednica mora da se dodeli svakom uređaju koji se namerava koristiti pomoću AvantiFAX-a.  Polje uređaja koristi se za ime uređaja, kao što je podešeno u HylaFAX-u (npr: ttySO, ttyds01, ttyIAX1 ili beograd00). Alternativno polje koristi se za opis lokacije ili svrhe modema. Na primer, faks linija namenjena za odeljenja prodaje ili podrške.  Kontakt polje namenjeno je za upis imejl adrese, tako da će svaki faks koji je povezan na ovaj modem biti dostavljen Kontaktu putem imejla.  Polje za štampač specifikuje određeni CUPS/lpr štampač, pomoću kojeg će se određeni faks odštampati.  Uobičajeno, korisnici mogu da vide samo one faks uređaje koji imaju dodeljene modemske odrednice.";
$LANG['EXPLAIN_COVERS'] = "A Cover Page entry must be created for each cover page you intend to use with AvantFAX.  The File field is for the name of the template file found in the images/ folder (ie: cover.ps, custom.ps, or mycover.html). The Title field is used to describe the cover page.  For example: Generic, Sales Dept, Accounting Dept.  Anyone can choose any of the cover pages defined here."; // <--- NEW
$LANG['EXPLAIN_FAX2EMAIL'] = "Usmeravanje od strane Pošiljaoca (Fax2Email) služi za usmeravanje pojedinačnih brojeva faksa na specifičnu imejl adresu. Ukoliko želite da faksevi poslati sa 18002125555 budu prosleđeni mejlom na sales@yourcompany.com, treba da označite kompaniju u listi sa leve strane i da ukucate imejl adresu u Imejl polje. Polje kompanije dozvoljava da modifikujete ime kompanije kao što je prikazano u Adresaru. Polje za štampač specifikuje određeni CUPS/lpr štampač, pomoću kojeg će se određeni faks odštampati. Takođe, možete da odaberete kategoriju kako biste automatski kategorisali faks.";
$LANG['EXPLAIN_BARCODEROUTE'] = "Usmeravanje na osnovu barkoda koristi se da usmeri faks na isbivz barkoda koji se nalazi na faksu.   Unesite barkod koji želite da se podudara sa pravilom u polju Barkod.  Alternativno polje služi za opis i svru za ovo pravilo.  Na primer za određenu uslugu ili proizvod.  Polje Kontakti je za adresu e-pošte, i svaki faks koji bude stigao za ovu grupu biće poslat kontakt e-mail adresu.  Polje Štampanje određuje koji CUPS/lpr štampač će štampati Fax.  Obični koristnici mogu samo videti faksove  iz identifikacione koje su im dodeljene."; // <----- NEW
