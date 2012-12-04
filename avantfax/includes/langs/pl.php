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

$LANGUAGE = "pl";
$LANGUAGE_NAME = "Polski";

$LANG = array();

$LANG['ISO'] = "charset=UTF-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Tak";
$LANG['NO'] = "Nie";

$LANG['DATE'] = "Data";
$LANG['FROM'] = "Od";
$LANG['TO'] = "Do";

$LANG['DATE_START'] = "Rozpoczęto";
$LANG['DATE_END'] = "Zakończono";

$LANG['TO_PERSON'] = "Do";
$LANG['TO_COMPANY'] = "Firma";
$LANG['TO_LOCATION'] = "Adres";
$LANG['TO_VOICENUMBER'] = "Numer telefonu";

$LANG['MY_COMPANY'] = "Firma";
$LANG['MY_LOCATION'] = "Adres";
$LANG['MY_VOICENUMBER'] = "Numer telefonu";
$LANG['MY_FAXNUMBER'] = "Numer faksu";

$LANG['VIEW_FAX'] = "Obejrzyj faks";
$LANG['ROTATE_FAX'] = "Obróć faks";
$LANG['DOWNLOAD_PDF'] = "Pobierz PDF";
$LANG['DOWNLOAD_TIFF'] = "Pobierz TIFF";
$LANG['EMAIL_PDF'] = "Wyślij PDF jako e-mail";
$LANG['ADD_NOTE_FAX'] = "Dodaj notatkę / Ustaw kategorię";
$LANG['ARCHIVE_FAX'] = "Przenieś do archiwum";
$LANG['DELETE_FAX'] = "Trwale usuń";

$LANG['DELETE_CONFIRM'] = "Proszę potwierdzić chęć usunięcia faksu.";

$LANG['ASSIGN_CNAME'] = "Przydziel nazwę firmy";
$LANG['ASSIGN_MISSING'] = "Musisz podać nazwę firmy";
$LANG['ASSIGN_NOTE'] = "Modyfikuj notatkę faksu / opis";
$LANG['ASSIGN_NOTE_SAVED'] = "Notatka / opis zapisane.";
$LANG['ASSIGN_OK'] = "Nazwa firmy została poprawnie przydzielona.";
$LANG['FAXES'] = "faksy";

$LANG['NAME'] = "Nazwa";
$LANG['DESCRIPTION'] = "Opis";
$LANG['SAVE'] = "Zapisz";
$LANG['DELETE'] = "Usuń";
$LANG['CANCEL'] = "Anuluj";
$LANG['CREATE'] = "Utwórz";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "Wybierz";
$LANG['CONTACT_SAVED'] = "Dane kontaktu zapisane";
$LANG['CONTACT_DELETED'] = "Kontakt skasowany";
$LANG['RUBRICA_SAVED'] = "Dane firmy zapisane";
$LANG['RUBRICA_DELETED'] = "Firma usunięte";

$LANG['FAX_FILES'] = "Wybierz pliki do przefaksowania";
$LANG['FAX_DEST'] = "Docelowe numery faksów";
$LANG['FAX_CPAGE'] = "Użyj strony tytułowej";
$LANG['FAX_REGARDING'] = "Pozdrowienia";
$LANG['FAX_COMMENTS'] = "Komentarz";
$LANG['FAX_FILETYPES'] = "Możesz dołączyć tylko pliki: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Musisz wybrać pliki do przefaksowania";
$LANG['FAX_DEST_MISSING'] = "Musisz wprowadzić docelowy numer faksu";
$LANG['FAX_SUBMITTED'] = "Twój faks został poprawnie dodany do kolejki. Otrzymasz e-mail potwierdzający wysłanie tego faksu.";
$LANG['FAX_FILESIZE'] = "Rozmiar pliku przekracza dopuszczalny limit.";
$LANG['FAX_MAXSIZE'] = "Maksymalny rozmiar pliku to $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Twoja nazwa";
$LANG['UPDATE'] = "Aktualizuj";
$LANG['USER_DETAILS_SAVED'] = "Ustawienia użytkownika zostały poprawnie zapisane.";

$LANG['LANGUAGE'] = "Język";
$LANG['EMAIL_SIG'] = "Podpis w e-mail";

$LANG['NEXT_FAX'] = "Następny faks";
$LANG['PREV_FAX'] = "Poprzedni faks";

$LANG['LOGIN_TEXT'] = "Wprowadź nazwę użytkownika i hasło, aby uzyskać dostęp do serwera faksów.";
$LANG['LOGIN_DISABLED'] = "Twoje konto zostało deaktywowane.  Proszę skontaktować się z administratorem.";
$LANG['LOGIN_INCORRECT'] = "Błędna nazwa użytkownika lub hasło.  Proszę spróbować ponownie.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Brak dostępu"; // <----- NEW

$LANG['USERNAME'] = "Nazwa użytkownika";
$LANG['PASSWORD'] = "Hasło";
$LANG['USER'] = "Użytkownik";
$LANG['BUTTON_LOGIN'] = "Zaloguj";
$LANG['BUTTON_LOGOUT'] = "Wyloguj";
$LANG['BUTTON_SETTINGS'] = "Ustawienia";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Odebrane";
$LANG['MENU_OUTBOX'] = "Wychodzące";
$LANG['MENU_SENDFAX'] = "Wyślij faks";
$LANG['MENU_ARCHIVE'] = "Archiwum";
$LANG['MENU_CONTACTS'] = "Kontakty";

$LANG['SELECT_ALL_FAXES'] = "Zaznacz wszystkie faksy";
$LANG['FAXES_PER_PAGE']  = "faxów na stronie";
$LANG['INBOX_SHOW'] = "Katalog ODEBRANE - wyświetl";
$LANG['ARCHIVE_SHOW'] = "ARCHIWUM - wyświetl";

$LANG['CONTACT_HEADER_EMAIL'] = "E-mail";
$LANG['CONTACT_HEADER_FAX'] = "Faks";
$LANG['CONTACT_HEADER_COMPANY'] = "Firma";
$LANG['CONTACT_HEADER_NEWFAX'] = "Nowy numer faksu";
$LANG['CONTACT_HEADER_FAXNUM'] = "Numer faksu";
$LANG['NEW_ENTRY'] = "Nowy wpis";
$LANG['UPLOAD_CONTACTS'] = "Wgraj kontakty ".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = "Pomyślnie wgrano %d kontakt(y)(ów)";
$LANG['UPLOAD_BUTTON'] = "Wgraj";

$LANG['SEND_EMAIL_HEADER'] = "Przekaż faks poprzez e-mail";
$LANG['EMAIL_RECIPIENTS'] = "Odbiorcy e-mail";
$LANG['EMAIL_CCRECIPIENTS'] = "Kopia do";
$LANG['EMAIL_BCCRECIPIENTS'] = "Ukryta kopia do";
$LANG['MESSAGE_PROMPT'] = "Wiadomość e-mail";
$LANG['BUTTON_SEND'] = "Wyślij";
$LANG['SUBJECT'] = "Temat";
$LANG['PDF_FILENAME'] = "Nazwa pliku PDF";

$LANG['EMAIL_SUCCESS'] = "E-mail został poprawnie wysłany.";
$LANG['EMAIL_FAILURE'] = "Błąd podczas wysyłania wiadomości e-mail.";

$LANG['PN_PAGE'] = "Strona";
$LANG['PN_PAGE_UP'] = "Strona w górę";
$LANG['PN_PAGE_DN'] = "Strona w dół";
$LANG['PN_PAGES'] = "Strony";
$LANG['PN_OF'] = "z";

$LANG['NUM_DIALS'] = "Wybrano";
$LANG['KILL_JOB'] = "Zakończ zadanie";
$LANG['PROMPT_CLOSEWINDOW'] = "Zamknij okno";

$LANG['LAST_UPDATED'] = "Ostatnia aktualizacja";
$LANG['BACK'] = "[ Cofnij ]";
$LANG['EDIT'] = "Edytuj";
$LANG['ADD'] = "Dodaj";
$LANG['WARNCAT'] = "Proszę wybrać kategorię";
$LANG['TITLE'] = "Tytuł";
$LANG['CATEGORY'] = "Kategoria";
$LANG['CATEGORY_NAME'] = "Nazwa kategorii";

$LANG['LAST_MOD'] = "Ostatnio zmodyfikowane przez";

$LANG['MONTHS'][] = array("");
$LANG['MONTHS'][] = "Styczeń";
$LANG['MONTHS'][] = "Luty";
$LANG['MONTHS'][] = "Marzec";
$LANG['MONTHS'][] = "Kwiecień";
$LANG['MONTHS'][] = "Maj";
$LANG['MONTHS'][] = "Czerwiec";
$LANG['MONTHS'][] = "Lipiec";
$LANG['MONTHS'][] = "Sierpień";
$LANG['MONTHS'][] = "Wrzesień";
$LANG['MONTHS'][] = "Październik";
$LANG['MONTHS'][] = "Listopad";
$LANG['MONTHS'][] = "Grudzień";

$LANG['ERROR_PASS'] = "Przepraszam, odpowiedni użytkownik nie został znaleziony.";
$LANG['NEWPASS_MSG'] = "Użytkownik %s z adresu %s wysłał prośbę o podanie nowego hasła.

Twoje nowe hasło to: %s

Zaloguj się do systemu podając swoją nazwę użytkownika i nowe hasło. Po zalogowaniu zmień hasło.";

$LANG['ADMIN_NEWPASS_MSG'] = "Hasło konta administratora zostało zmienione na :\n\t%s\n przez użytkownika z %s";

$LANG['REGWARN_MAIL'] = "Proszę wprowadzić poprawny adres e-mail.";

$LANG['REGWARN_PASS'] = "Proszę wprowadzić poprawne hasło.  Żadnych spacji, więcej niż ".MIN_PASSWD_SIZE." znaków. Musi zawierać znaki 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Hasło nie jest poprawne, proszę spróbować ponownie.";
$LANG['REGWARN_USERNAME_INUSE'] = "Podana nazwa użytkownika istnieje. Proszę wprowadzić inną.";

$LANG['USER_UPDATE_ERROR'] = "Błąd podczas aktualizacji konta";
$LANG['PASS_TOO_LONG'] = "Hasło za długie";
$LANG['PASS_TOO_SHORT'] = "Hasło za krótkie";
$LANG['PASS_ALREADY_USED'] = "Wprowadzone hasło jest już używane.  Proszę wprowadzić inne.";
$LANG['PASS_ERROR_CHANGING'] = "Błąd podczas zmiany hasła dla";
$LANG['PASS_ERROR_RESETTING'] = "Błąd podczas resetowania hasła dla";
$LANG['ERROR_SENDING_EMAIL'] = "Błąd podczas wysyłania wiadomości e-mail";
$LANG['REGWARN_USERNAME'] = "Znaki inne niż alfanumeryczne nie mogą być używane w nazwie użytkownika.";
$LANG['REGWARN_NOUSERNAME'] = "Musisz wprowadzić nazwę użytkownika";
$LANG['REGWARN_MAIL_EXISTS'] = "Adres e-mail jest już używany.";

$LANG['LOST_PASSWORD'] = "Zapomniałeś swojego hasła?";

$LANG['PROMPT_UNAME'] = "Nazwa użytkownika";
$LANG['PROMPT_PASSWORD'] = "Hasło";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Użytkownik może używać starych haseł";
$LANG['REPLY_TO_FAX'] = "Odpowiedz na faks";
$LANG['REPLY_TO_FAX_TIP'] = "Oryginalny faks będzie pierwszym dokumentem po stronie przewodniej";
$LANG['TITLE_DISTROLIST'] = "Listy dystrybucyjne";
$LANG['DISTROLIST_NAME'] = "Nazwa listy";
$LANG['DISTROLIST_DELETE'] = "Usuń listę";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Usunąć tę listę dystrybucyjną?";
$LANG['DISTROLIST_SAVENAME'] = "Zapisz nazwę listy";

$LANG['CHANGES_SAVED'] = "Zmiany zapisane";
$LANG['DISTROLIST_DELETED'] = "Lista usunięta";
$LANG['DISTROLIST_NOT_CREATED'] = "Lista nie została utworzona";
$LANG['DISTROLIST_EXISTS'] = "List już istnieje";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Wprowadź nazwę listy";
$LANG['DISTROLIST_ADD'] = "Dodaj wpisy";
$LANG['DISTROLIST_REMOVE'] = "Usuń wpisy";
$LANG['DISTROLIST_REFRESH_LIST'] = "Odśwież listę";

$LANG['PROMPT_EMAIL'] = "Adres e-mail";
$LANG['BUTTON_SEND_PASS'] = "Wyślij hasło";
$LANG['REGISTER_VPASS'] = "Weryfikuj hasło";
$LANG['FIELDS_REQUIRED'] = "Pola zaznaczone znakiem (*) są wymagane.";

$LANG['NEW_PASS_DESC'] = "Proszę wprowadź swój adres e-mail, a następnie kliknij przycisk Wyślij.<br /><br />Otrzymasz nowe hasło.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Proszę wprowadź swoją nazwę użytkownika i hasło, a następnie kliknij przycisk Wyślij hasło.<br /><br />Otrzymasz nowe hasło.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Twoje hasło będzie wysłane na podany adres e-mail.<br /><br />Po otrzymaniu wiadomości będziesz mógł się zalogować na swoje konto.<br /><br />";

$LANG['SEARCH_TITLE'] = "Wyszukaj";
$LANG['KEYWORDS'] = "Słowa kluczowe";
$LANG['COMPANY_SEARCH'] = "Szukaj firm ";
$LANG['COMPANY_LIST'] = "Lista firm";
$LANG['SENT_RECVD'] = "Wysłane / Odebrane";
$LANG['BOTH_SENT_RECVD'] = "Wysłane i odebrane faksy";
$LANG['ONLY_MY_SENT'] = "Tylko wysłane faksy";
$LANG['ONLY_RECVD'] = "Tylko odebrane faksy";
$LANG['CONCLUSION'] = "Znaleziono %d.";
$LANG['NOKEYWORD'] = "Nic nie znaleziono";

$LANG['SEARCH_WHITEPAGES'] = "Wyszukaj puste strony";

$LANG['PWD_NEEDS_RESET'] = "Twoje hasło musi być zmienione zanim rozpoczniesz pracę.";
$LANG['PWD_REQUIREMENTS'] = "Hasło musi zawierać co najmniej ".MIN_PASSWD_SIZE." znaków.";
$LANG['OPASS'] = "Stare hasło";
$LANG['NPASS'] = "Nowe hasło";
$LANG['VPASS'] = "Weryfikuj hasło";
$LANG['OPASS_WRONG'] = "Stare hasło jest nieprawidłowe.";
$LANG['NAME_MISSING'] = "Musisz podać nazwę.";

$LANG['MODIFY_FAXNUMS'] = "Modyfikuj bazę numerów faksowych";
$LANG['MODIFY_EMAILS'] = "Modyfikuj bazę adresów e-mail";
$LANG['TITLE_FAXNUMS'] = "Numery faksowe";
$LANG['TITLE_EMAILS'] = "Adresy e-mail";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Nowe dane użytkownika";
$LANG['NEW_USER_MESSAGE'] = "Witaj %s,

Ten e-mail zawiera Twoją nazwę użytkownika i hasło potrzebne do zalogowania się do serwera faksów AvantFAX (http://%s)

Użytkownik - %s
Hasło - %s

Proszę nie odpowiadaj na tą wiadomość, ponieważ została ona automatycznie wygenerowana jedynie w celach informacyjnych";

$LANG['DIDROUTE_EXISTS'] = "Przekierowanie już istnieje";
$LANG['DIDROUTE_NOT_CREATED'] = "Przekierowanie nie zostało utworzone";
$LANG['DIDROUTE_NO_ROUTES'] = "Brak skonfigurowanych przekierowań DID/DTMF";
$LANG['DIDROUTE_DOESNT_EXIST'] = "Przekierowanie %s nie istnieje";

$LANG['ADMIN_DIDROUTE_CREATED'] = "Przekierowanie zostało utworzone";
$LANG['ADMIN_DIDROUTE_DELETED'] = "Przekierowanie zostało usunięte";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "Przekierowanie zostało zaktualizowane";
$LANG['ADMIN_DIDROUTES'] = "Grupy przekierowań DID/DTMF";
$LANG['DIDROUTE_ROUTECODE'] = "Cyfry DID/DTMF";
$LANG['DIDROUTE_CATCHALL'] = "Przejmij wszystkie";
$LANG['ADMIN_CONFDIDROUTING'] = "Konfiguruj DID/DTMF";
$LANG['GROUP'] = "Group"; // <------ NEW

$LANG['USER_ANYMODEM'] = "Może wysyłać faksy ze wszystkich modemów";

$LANG['BARCODEROUTE_BARCODE'] = "Barcode"; // <----- NEW
$LANG['MISSING_BARCODE'] = "Missing barcode"; // <----- NEW
$LANG['ADMIN_BARCODEROUTE_DELETED'] = "Barcode route deleted"; // <----- NEW
$LANG['ADMIN_BARCODEROUTE_UPDATED'] = "Barcode route updated"; // <----- NEW
$LANG['ADMIN_BARCODEROUTE_CREATED'] = "Barcode route created"; // <----- NEW
$LANG['BARCODEROUTE_NOT_CREATED'] = "Barcode route not created"; // <----- NEW
$LANG['BARCODEROUTE_EXISTS'] = "Barcode route exists"; // <----- NEW
$LANG['BARCODEROUTE_NO_ROUTES'] = "No barcode routes"; // <----- NEW
$LANG['BARCODEROUTE_DOESNT_EXIST'] = "Barcode route %s doesn't exist"; // <----- NEW

$LANG['FAXCAT_NOT_CREATED'] = "Kategoria faksu '%s' nie została utworzona";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Kategoria faksu '%s' istnieje";

$LANG['FAX_FAILED'] = "Problem podczas wysyłania faksu.";
$LANG['FAX_WHY']["done"] = "Zakończono";
$LANG['FAX_WHY']["format_failed"] = "Zły format";
$LANG['FAX_WHY']["no_formatter"] = "brak formatera";
$LANG['FAX_WHY']["poll_no_document"] = "Lista nie zawiera dokumentów";
$LANG['FAX_WHY']["killed"] = "Zabity";
$LANG['FAX_WHY']["rejected"] = "Odrzucony";
$LANG['FAX_WHY']["blocked"] = "Zablokowany";
$LANG['FAX_WHY']["removed"] = "Usunięty";
$LANG['FAX_WHY']["timedout"] = "Czas przekroczony";
$LANG['FAX_WHY']["poll_rejected"] = "Lista odrzucona";
$LANG['FAX_WHY']["poll_failed"] = "Zła lista";
$LANG['FAX_WHY']["requeued"] = "Ponownie zakolejkowany";

$LANG['COMPANY_EXISTS'] = "Nazwa firmy istnieje";
$LANG['FAXNUMID_NOT_CREATED'] = "Nie mogę utworzyć FAXNUMID";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Brak firmy dla tego numeru faksu";
$LANG['CANT_CHANGE_FAXNUM'] = "Nie można zmienić przydzielonego numeru faksu";

$LANG['MODEM_EXISTS'] = "Interfejs faksowy istnieje";
$LANG['MODEM_NOT_CREATED'] = "Interfejs faksowy nie został utworzony";
$LANG['NO_MODEMS_CONFIGURED'] = "Brak skonfigurowanych interfejsów faksowych";
$LANG['MODEM_DOESNT_EXIST'] = "Interfejs faksowy %s nie istnieje";
$LANG['ADMIN_PRINTER'] = "Drukarka";
$LANG['PRINT'] = "Drukuj";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "Kategoria została usunięta";
$LANG['ADMIN_FAXCAT_CREATED'] = "Kategoria została utworzona";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Kategoria została zaktualizowana";

$LANG['ADMIN_MODEM_CREATED'] = "Interfejs faksowy został utworzony";
$LANG['ADMIN_MODEM_DELETED'] = "Interfejs faksowy został usunięty";
$LANG['ADMIN_MODEM_UPDATED'] = "Interfejs faksowy został zaktualizowany";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Bezczynny";
$LANG['FAXSEND'] = "Wysyłam faks";
$LANG['FAXRECV'] = "Odbieram faks";
$LANG['FAXRECVFROM'] = "Odbieram faks od";

$LANG['MODEM_DEVICE'] = "Interfejs";
$LANG['MODEM_CONTACT'] = "Kontakt";
$LANG['MODEM_ALIAS'] = "Alias";

$LANG['COVER_FILE'] = "File name"; // <--- NEW
$LANG['COVER_TITLE'] = "Coverpage Title"; // <--- NEW
$LANG['SELECT_COVERPAGE'] = "Strona tytułowa"; // <--- NEW

$LANG['MISSING_CATEGORY_NAME'] = "Musisz podać nazwę kategorii";
$LANG['MISSING_DEVICE_NAME'] = "Musisz podać nazwę urządzenia";
$LANG['MISSING_ALIAS_NAME'] = "Musisz podać alias";
$LANG['MISSING_CONTACT_NAME'] = "Musisz podać dane kontaktowe";
$LANG['MISSING_ROUTE'] = "Musisz podać cyfry DID/DTMF";

$LANG['MISSING_FILE_NAME'] = "You must enter a file name"; // <----- NEW
$LANG['MISSING_TITLE_NAME'] = "You must enter a title"; // <----- NEW

$LANG['ADMIN_CONFIGURE'] = "Konfiguruj...";
$LANG['ADMIN_USERS'] = "Użytkownicy";
$LANG['ADMIN_NEW_USER'] = "Nowy użytkownik";
$LANG['ADMIN_EDIT_USER'] = "Modyfikuj użytkownika";
$LANG['ADMIN_DEL_USER'] = "Usuń użytkownika";
$LANG['ADMIN_LAST_LOGIN'] = "Ostatnie logowanie";
$LANG['ADMIN_LAST_IP'] = "Ostatni IP";
$LANG['ADMIN_USER_LIST'] = "Lista użytkowników";
$LANG['ADMIN_FAXCATS'] = "Kategoria faksów";
$LANG['ADMIN_CONFMODEMS'] = "Konfiguruj modem";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Rozdysponowanie faksów na podstawie...";
$LANG['ADMIN_ROUTEBY_SENDER'] = "Rozdysponowanie na podstawie nadawcy";
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Nadawcy";
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode";
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Rozdysponowanie na podstawie słowa kluczowego";
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Słowa kluczowego";

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Statystyki";
$LANG['ADMIN_SYSLOGS'] = "Logi systemowe";
$LANG['ADMIN_SYSFUNC'] = "Funkcje systemowe";
$LANG['ADMIN_NOUSERS'] = "Żaden użytkownik nie został utworzony";
$LANG['ADMIN_ACC_ENABLED'] = "Konto aktywne";
$LANG['ADMIN_PWDCYCLE'][] = "Cykl wygasania hasła";
$LANG['ADMIN_PWDCYCLE'][] = "Nigdy";
$LANG['ADMIN_PWDCYCLE'][] = "Każde 3 miesiące";
$LANG['ADMIN_PWDCYCLE'][] = "Każde 6 miesięcy";
$LANG['ADMIN_PWDEXP'] = "Data wygaśnięcia hasła";
$LANG['SUPERUSER'] = "Super użytkownik";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "Użytkownik może usuwać faksy";
$LANG['ADMIN_FAXLINES'] = "Możliwy podgląd linii faksowych";
$LANG['ADMIN_CATEGORIES'] = "Możliwy podgląd kategorii faksów";
$LANG['REBOOT'] = "Restart serwer";
$LANG['SHUTDOWN'] = "Wyłącz serwer";
$LANG['DOWNLOADARCHIVE'] = "Ściągnij Archiwum";
$LANG['DOWNLOADDB'] = "Ściągnij Bazę Danych";
$LANG['PLSWAIT'] = "Proszę czekaj";
$LANG['LOGTEXT'] = "Informacja logowania";
$LANG['QUESTION_DELUSER'] = "Czy jesteś pewien, że chcesz usunąć";
$LANG['MAX_DIAL'] = "Maksymalna ilość powtórzeń";

$LANG['TSI_ID'] = "TSI ID";
$LANG['PRIORITY'] = "Priorytet";
$LANG['BLACKLIST'] = "Czarna lista";
$LANG['MODIFY_FAXJOB'] = "Modyfikuj zadanie";
$LANG['NEW_DESTINATION'] = "Nowy odbiorca";
$LANG['SCHEDULE_FAX'] = "Odłóż dostarczenie";
$LANG['FAX_NUMTRIES'] = "Liczba prób";
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
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">Najpierw stwórz kategorię</a>"; // <----- NEW

$LANG['EXPLAIN_CATEGORIES'] = "Categories are useful for organizing faxes in the AvantFAX Archive.  Normal users are limited to viewing the categories assigned to them."; // <----- NEW
$LANG['EXPLAIN_DYNCONF'] = "HylaFAX's DynamicConfig and RejectCall features are used to reject fax transmissions from known offenders.  Enter the Caller ID of the sender you would like to block.  Optionally, you may select a device if you only want to block this sender on that device."; // <----- NEW
$LANG['EXPLAIN_DIDROUTE'] = "DID/DTMF routing is used to route faxes sent to a hunt group.  HylaFAX must be properly configured for this to work.  A separate entry must be created for each hunt group you intend to use with AvantFAX.  The DID/DTMF digits field is for hunt group information as received by HylaFAX -- typically the last 3 or 4 digits or even 10 digits of the fax number. The Alias field is used to describe the location or purpose for the hunt group.  For example, Sales or Support for a fax line dedicated for those departments.  The Contact field is for an email address, and every fax that arrives for this group will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Normal users can only view faxes from the hunt groups assigned to them."; // <----- NEW
$LANG['EXPLAIN_MODEMS'] = "A Modem entry must be created for each modem device you intend to use with AvantFAX.  The Device field is for the name of the device as it is configured in HylaFAX (ie: ttyS0, ttyds01 or boston00). The Alias field is used to describe the location or purpose for the modem.  For example, Sales or Support for a fax line dedicated for those departments.  The Contact field is for an email address, and every fax that arrives on this modem will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Normal users can only view faxes from the modems assigned to them."; // <----- NEW
$LANG['EXPLAIN_COVERS'] = "A Cover Page entry must be created for each cover page you intend to use with AvantFAX.  The File field is for the name of the template file found in the images/ folder (ie: cover.ps, custom.ps, or mycover.html). The Title field is used to describe the cover page.  For example: Generic, Sales Dept, Accounting Dept.  Anyone can choose any of the cover pages defined here.";
$LANG['EXPLAIN_FAX2EMAIL'] = "Fax2Email is for routing individual fax numbers to a specific email address.  If you want the faxes sent from 18002125555 to be emailed to sales@yourcompany.com, you must select the company in the list on the left and enter the email address into the Email field.  The Company field allows you to modify the company name as displayed in the Address Book.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Also, you may select a category to automatically categorizing the fax."; // <----- NEW
$LANG['EXPLAIN_BARCODEROUTE'] = "Barcode based routing is used to route faxes based on the barcode contained in the fax.  Enter the barcode that you want matched to this rule in the Barcode field.  The Alias field is used to describe the purpose for this rule.  For example for a specific service or product.  The Contact field is for an email address, and every fax that arrives for this group will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Also, you may select a category to automatically categorizing the fax."; // <----- NEW
