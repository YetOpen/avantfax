<?php
/**
 * AvantFAX - HylaFAX Web 2.0 interface
 *
 * PHP 5
 *
 * @author		David Mimms <david@avantfax.com>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

$LANGUAGE = "bg";
$LANGUAGE_NAME = "Български";

$LANG = array();

$LANG['ISO'] = "charset=utf-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Да";
$LANG['NO'] = "Не";

$LANG['DATE'] = "Дата";
$LANG['FROM'] = "От";
$LANG['TO'] = "До";

$LANG['DATE_START'] = "От Дата";
$LANG['DATE_END'] = "До Дата";

$LANG['TO_PERSON'] = "До служител";
$LANG['TO_COMPANY'] = "До фирма";
$LANG['TO_LOCATION'] = "До адрес";
$LANG['TO_VOICENUMBER'] = "До тел. номер";

$LANG['MY_COMPANY'] = "Фирма";
$LANG['MY_LOCATION'] = "Адрес";
$LANG['MY_VOICENUMBER'] = "Тел. номер";
$LANG['MY_FAXNUMBER'] = "Факс номер";

$LANG['VIEW_FAX'] = "Преглед на Факса";
$LANG['ROTATE_FAX'] = "Завърти Факса";
$LANG['DOWNLOAD_PDF'] = "Изтегли като PDF";
$LANG['DOWNLOAD_TIFF'] = "Изтегли като TIFF";
$LANG['EMAIL_PDF'] = "Email PDF";
$LANG['ADD_NOTE_FAX'] = "Добави бележки";
$LANG['ARCHIVE_FAX'] = "Премести в Архива";
$LANG['DELETE_FAX'] = "Изтрий";

$LANG['DELETE_CONFIRM'] = "Потвърдете изтриването на факса.";

$LANG['ASSIGN_CNAME'] = "Задайте име на фирма";
$LANG['ASSIGN_MISSING'] = "Трябва да въведете име на фирма";
$LANG['ASSIGN_NOTE'] = "Редактирай данните";
$LANG['ASSIGN_NOTE_SAVED'] = "Данните са запазени.";
$LANG['ASSIGN_OK'] = "Успешно задаване на името на фирмата.";
$LANG['FAXES'] = "факса";

$LANG['NAME'] = "Име";
$LANG['DESCRIPTION'] = "Описание";
$LANG['SAVE'] = "Запази";
$LANG['DELETE'] = "Изтрий";
$LANG['CANCEL'] = "Отказ";
$LANG['CREATE'] = "Създай";
$LANG['EMAIL'] = "Email";
$LANG['SELECT'] = "Избери";
$LANG['CONTACT_SAVED'] = "Данните за контакта са запазени";
$LANG['CONTACT_DELETED'] = "Контактът е изтрит";
$LANG['RUBRICA_SAVED'] = "Данните за фирмата са запазени";
$LANG['RUBRICA_DELETED'] = "Фирмата е изтрита";

$LANG['FAX_FILES'] = "Добавяне на файлове";
$LANG['FAX_DEST'] = "Изпращане до номера";
$LANG['FAX_CPAGE'] = "Със заглавна страница";
$LANG['FAX_REGARDING'] = "Относно";
$LANG['FAX_COMMENTS'] = "Коментар";
$LANG['FAX_FILETYPES'] = "Можете да добавяте само ".SENDFAXFILETYPES." файлове.";
$LANG['FAX_FILE_MISSING'] = "Трябва да изберете файл за факс.";
$LANG['FAX_DEST_MISSING'] = "Трябва да въведете номер(ата) на получател(ите)!";
$LANG['FAX_SUBMITTED'] = "Факсът успешно е заявен за изпращане.<br />Когато бъде изпратен, ще получите email.";
$LANG['FAX_FILESIZE'] = "Размерът на файла е над ограничението.";
$LANG['FAX_MAXSIZE'] = "Макс. размер на файла е $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Известяване при поискване";

$LANG['FUPLOAD_NO_FILE'] = "Няма добавен файл";
$LANG['FUPLOAD_NOT_ALLOWED'] = "Типът на файла не е позволен";
$LANG['FUPLOAD_OVER_LIMIT'] = "Големината на файла е над лимита";
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "Големината на файла е над лимита (INI)";
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "Големината на файла е над лимита (FORM)";
$LANG['FUPLOAD_NOT_COMPLETE'] = "Файлът не е добавен напълно";
$LANG['FUPLOAD_NO_TEMPDIR'] = "Няма временна директория";
$LANG['FUPLOAD_CANT_WRITE'] = "Не мога да запиша добавения файл";

$LANG['YOUR_NAME'] = "Вашето име";
$LANG['UPDATE'] = "Обнови";
$LANG['USER_DETAILS_SAVED'] = "Промените са запазени.";

$LANG['LANGUAGE'] = "Език";
$LANG['EMAIL_SIG'] = "Email сигнатура";

$LANG['NEXT_FAX'] = "Следващ Факс";
$LANG['PREV_FAX'] = "Предишен Факс";

$LANG['LOGIN_TEXT'] = "Въведете потребителското си име и парола за да получите достъп до факс интерфейса.";
$LANG['LOGIN_DISABLED'] = "Ващият акаунт е изключен. Моля свържете се с администратора.";
$LANG['LOGIN_INCORRECT'] = "Грешна парола или потребителско име. Моля опитайте пак.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Достъпът е забранен";

$LANG['USERNAME'] = "Потребителско Име";
$LANG['PASSWORD'] = "Парола";
$LANG['USER'] = "Потребител";
$LANG['BUTTON_LOGIN'] = "Вход";
$LANG['BUTTON_LOGOUT'] = "Изход";
$LANG['BUTTON_SETTINGS'] = "Настройки";

$LANG['MENU_MENU'] = "Меню";
$LANG['MENU_INBOX'] = "Входящи";
$LANG['MENU_OUTBOX'] = "Изходящи";
$LANG['MENU_SENDFAX'] = "Изпрати";
$LANG['MENU_ARCHIVE'] = "Архив";
$LANG['MENU_CONTACTS'] = "Контакти";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "Email";
$LANG['CONTACT_HEADER_FAX'] = "Факс";
$LANG['CONTACT_HEADER_COMPANY'] = "Фирма";
$LANG['CONTACT_HEADER_NEWFAX'] = "Номер";
$LANG['CONTACT_HEADER_FAXNUM'] = "Номер";
$LANG['NEW_ENTRY'] = "Нов запис";
$LANG['UPLOAD_CONTACTS'] = "Добави файл с контакти ".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = "Успешно добавени %d контакта";
$LANG['UPLOAD_BUTTON'] = "Добави";

$LANG['SEND_EMAIL_HEADER'] = "Препрати факса като email";
$LANG['EMAIL_RECIPIENTS'] = "Email получател(и)";
$LANG['MESSAGE_PROMPT'] = "Email съобщение";
$LANG['BUTTON_SEND'] = "Изпрати";
$LANG['SUBJECT'] = "Тема";
$LANG['PDF_FILENAME'] = "Име на PDF файл";

$LANG['EMAIL_SUCCESS'] = "Успешно изпращане на email.";
$LANG['EMAIL_FAILURE'] = "Неуспешно изпращане на email.";

$LANG['PN_PAGE'] = "Страница";
$LANG['PN_PAGE_UP'] = "Страница Нагоре";
$LANG['PN_PAGE_DN'] = "Страница Надолу";
$LANG['PN_PAGES'] = "Страници";
$LANG['PN_OF'] = "от";
$LANG['NUM_DIALS'] = "Избран №";
$LANG['KILL_JOB'] = "Прекъсни изпълнението";

$LANG['PROMPT_CLOSEWINDOW'] = "Затвори";

$LANG['LAST_UPDATED'] = "Последно Обновяване";
$LANG['BACK'] = "Обратно";
$LANG['EDIT'] = "Редактирай";
$LANG['ADD'] = "Добави";
$LANG['WARNCAT'] = "Моля изберете категория";
$LANG['TITLE'] = "Заглавие";
$LANG['CATEGORY'] = "Категория";
$LANG['CATEGORY_NAME'] = "Име на категория";

$LANG['LAST_MOD'] = "Последно редактиран от";

$LANG['MONTHS'][] = array ("");
$LANG['MONTHS'][] = "Януари";
$LANG['MONTHS'][] = "Февруари";
$LANG['MONTHS'][] = "Март";
$LANG['MONTHS'][] = "Април";
$LANG['MONTHS'][] = "Май";
$LANG['MONTHS'][] = "Юни";
$LANG['MONTHS'][] = "Юли";
$LANG['MONTHS'][] = "Август";
$LANG['MONTHS'][] = "Септември";
$LANG['MONTHS'][] = "Октомври";
$LANG['MONTHS'][] = "Ноември";
$LANG['MONTHS'][] = "Декември";

$LANG['ERROR_PASS'] = "Съжалявам, не е открит такъв потребител.";
$LANG['NEWPASS_MSG'] = "Потребителският акаунт %s има въведен този email като адрес за контакти.
Уеб потребител от IP адрес %s поиска изпращане на нова парола.

Вашата нова парола е: %s

Ако това е било грешка просто влезте с вашата нова парола и я променете според желанието си.";

$LANG['ADMIN_NEWPASS_MSG'] = "Паролата на admin акаунта беше сменена на:\n\t%s\n от потребител %s";
$LANG['REGWARN_MAIL'] = "Моля въведете валиден email !!!";
$LANG['REGWARN_PASS'] = "Моля въведете валидна парола.  Без интервали, повече от ".MIN_PASSWD_SIZE." знака и да съдържа 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Паролата и потвърждението не са едни и същи, моля опитайте отново.";
$LANG['REGWARN_USERNAME_INUSE'] = "Това потребителско име вече съществува. Моля изберете друго.";

$LANG['USER_UPDATE_ERROR'] = "Възникна грешка при обновяване на акаунта";
$LANG['PASS_TOO_LONG'] = "Паролата е твърде дълга";
$LANG['PASS_TOO_SHORT'] = "Паролата е твърде кратка";
$LANG['PASS_ALREADY_USED'] = "Тази парола вече е използвана. Моля задайте нова.";
$LANG['PASS_ERROR_CHANGING'] = "Грешка при смяна на паролата за";
$LANG['PASS_ERROR_RESETTING'] = "Грешка при изчистване на паролата за";
$LANG['ERROR_SENDING_EMAIL'] = "Изпращането на еmail не бе осъществено";
$LANG['REGWARN_USERNAME'] = "Не се допускат специални символи в потребителското име";
$LANG['REGWARN_NOUSERNAME'] = "Трябва да въведете потребителско име";
$LANG['REGWARN_MAIL_EXISTS'] = "Този email адрес вече се използва";

$LANG['LOST_PASSWORD'] = "Забравили сте паролата си?";

$LANG['PROMPT_UNAME'] = "Потребителско Име";
$LANG['PROMPT_PASSWORD'] = "Парола";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Потребителят има право да използва старите си пароли";
$LANG['REPLY_TO_FAX'] = "Отговори на Факса";
$LANG['REPLY_TO_FAX_TIP'] = "Оригиналният факс ще бъде първият изпратен документ след заглавната страница";
$LANG['PROMPT_EMAIL'] = "Email Адрес";
$LANG['BUTTON_SEND_PASS'] = "Изпрати Паролата";
$LANG['REGISTER_VPASS'] = "Потвърди Паролата";
$LANG['FIELDS_REQUIRED'] = "Полетата, маркирани с (*) са задължителни.";

$LANG['NEW_PASS_DESC'] = "Въведете email адрес и кликнете върху бутона Изпрати Паролата.<br /><br />Вие ще получите новата си парола в най-кратък срок.<br /><br />Използвайте новата парола, за достъп до сайта.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Въведете потребителско име и email адрес и кликнете Send Password.<br /><br />Ще получите нова парола.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Новата парола ще бъде изпратена на въведения от вас email адрес.<br /><br />След като получите новата си парола, може да влезете в акаунта си и да я промените.<br /><br />";

$LANG['SEARCH_TITLE'] = "Търси";
$LANG['KEYWORDS'] = "Ключови думи";
$LANG['COMPANY_SEARCH'] = "Търсене по Фирма";
$LANG['COMPANY_LIST'] = "Списък от Фирми";
$LANG['SENT_RECVD'] = "Изпратени / Приети";
$LANG['BOTH_SENT_RECVD'] = "Всички";
$LANG['ONLY_MY_SENT'] = "Само изпратените";
$LANG['ONLY_RECVD'] = "Само приетите";
$LANG['CONCLUSION'] = "Открити са %d записа.";
$LANG['NOKEYWORD'] = "Не са открити резултати";

$LANG['SEARCH_WHITEPAGES'] = "Търси Празни Страници";

$LANG['PWD_NEEDS_RESET'] = "Вашата парола трябва да бъде променена преди да продължите към сайта.";
$LANG['PWD_REQUIREMENTS'] = "Паролата трябва да бъде най-малко ".MIN_PASSWD_SIZE." знака.";
$LANG['OPASS'] = "Стара Парола";
$LANG['NPASS'] = "Нова Парола";
$LANG['VPASS'] = "Потвърди Паролата";
$LANG['OPASS_WRONG'] = "Старата парола е неправилна.";
$LANG['NAME_MISSING'] = "Трябва да въведете име.";

$LANG['MODIFY_FAXNUMS'] = "Редактирай факс-номерата на фирмата";
$LANG['MODIFY_EMAILS'] = "Редактирай email адресната книга";
$LANG['TITLE_FAXNUMS'] = "Факс Номера";
$LANG['TITLE_EMAILS'] = "Email Адреси";

$LANG['TITLE_DISTROLIST'] = "Списъци с Получатели";
$LANG['DISTROLIST_NAME'] = "Име на списъка";
$LANG['DISTROLIST_DELETE'] = "Изтрий списъка";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Изтриване на списъка?";
$LANG['DISTROLIST_SAVENAME'] = "Запази името на списъка";

$LANG['CHANGES_SAVED'] = "Промените са запазени";
$LANG['DISTROLIST_DELETED'] = "Списъкът е изтрит";
$LANG['DISTROLIST_NOT_CREATED'] = "Списъкът не е създаден";
$LANG['DISTROLIST_EXISTS'] = "Списъкът вече съществува";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Въведете име на списъка";
$LANG['DISTROLIST_ADD'] = "Добавяне";
$LANG['DISTROLIST_REMOVE'] = "Изтриване";
$LANG['DISTROLIST_REFRESH_LIST'] = "Обнови Списъка";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Данни за Нов Потребител";
$LANG['NEW_USER_MESSAGE'] = "Здравей %s,

Този email съдържа потребителското ви име и парола за вход в AvantFAX (http://%s)

Потребителско Име - %s
Парола - %s

Моля не отговаряйте на това съобщение, тъй като е автоматично генерирано и е само за ваша информация";

$LANG['DIDROUTE_EXISTS'] = "Направлението вече съществува";
$LANG['DIDROUTE_NOT_CREATED'] = "Направлението не е създадено";
$LANG['DIDROUTE_NO_ROUTES'] = "Не са конфигурирани DID/DTMF направления";
$LANG['DIDROUTE_DOESNT_EXIST'] = "Направление %s не съществува";
$LANG['ADMIN_PRINTER'] = "Принтер";
$LANG['PRINT'] = "Печат";

$LANG['ADMIN_DIDROUTE_CREATED'] = "Направлението е съдадено";
$LANG['ADMIN_DIDROUTE_DELETED'] = "Направлението е изтрито";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "Направлението е обновено";
$LANG['ADMIN_DIDROUTES'] = "DID/DTMF Групи с направления";
$LANG['DIDROUTE_ROUTECODE'] = "DID/DTMF цифри";
$LANG['DIDROUTE_CATCHALL'] = "Хвани Всички";
$LANG['ADMIN_CONFDIDROUTING'] = "DID/DTMF Групи";
$LANG['GROUP'] = "Група";

$LANG['USER_ANYMODEM'] = "Потребителят има право да използва всичките модеми";

$LANG['BARCODEROUTE_BARCODE'] = "Баркод";
$LANG['MISSING_BARCODE'] = "Липсващ баркод";
$LANG['ADMIN_BARCODEROUTE_DELETED'] = "Баркод направлението е изтрито";
$LANG['ADMIN_BARCODEROUTE_UPDATED'] = "Баркод направлението е обновено";
$LANG['ADMIN_BARCODEROUTE_CREATED'] = "Баркод направлението е създадено";
$LANG['BARCODEROUTE_NOT_CREATED'] = "Баркод направлението не е създадено";
$LANG['BARCODEROUTE_EXISTS'] = "Баркод направлението съществува";
$LANG['BARCODEROUTE_NO_ROUTES'] = "Няма баркод направления";
$LANG['BARCODEROUTE_DOESNT_EXIST'] = "Баркод направлението %s не съществува";

$LANG['FAXCAT_NOT_CREATED'] = "Факс категорията '%s' не е създадена";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Факс категорията '%s' вече съществува";

$LANG['FAX_FAILED'] = "Проблем с изпращането на факса.";
$LANG['FAX_WHY']["done"] = "Изпълнено";
$LANG['FAX_WHY']["format_failed"] = "повреден формат";
$LANG['FAX_WHY']["no_formatter"] = "не е форматиран";
$LANG['FAX_WHY']["poll_no_document"] = "няма документи в списъка";
$LANG['FAX_WHY']["killed"] = "прекратен";
$LANG['FAX_WHY']["rejected"] = "отхвърлен";
$LANG['FAX_WHY']["blocked"] = "блокиран";
$LANG['FAX_WHY']["removed"] = "премахнат";
$LANG['FAX_WHY']["timedout"] = "закъснял";
$LANG['FAX_WHY']["poll_rejected"] = "списъка е отхвърлен";
$LANG['FAX_WHY']["poll_failed"] = "списъка е повреден";
$LANG['FAX_WHY']["requeued"] = "презаявен";

$LANG['COMPANY_EXISTS'] = "Името на компанията вече съществува";
$LANG['FAXNUMID_NOT_CREATED'] = "Не мога да създам faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Няма компания с такъв факс-номер";
$LANG['CANT_CHANGE_FAXNUM'] = "Не може да променяте установен факс-номер";

$LANG['MODEM_EXISTS'] = "Модемът вече съществува";
$LANG['MODEM_NOT_CREATED'] = "Модемът не е добавен";
$LANG['NO_MODEMS_CONFIGURED'] = "Няма конфигурирани модеми";
$LANG['MODEM_DOESNT_EXIST'] = "Модема %s не съществува";

$LANG['ADMIN_FAXCAT_DELETED'] = "Кагеторията е изтрита";
$LANG['ADMIN_FAXCAT_CREATED'] = "Кагеторията е създадена";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Кагеторията е обновена";

$LANG['ADMIN_MODEM_CREATED'] = "Модемът е добавен";
$LANG['ADMIN_MODEM_DELETED'] = "Модемът е изтрит";
$LANG['ADMIN_MODEM_UPDATED'] = "Модемът е обновен";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "В готовност";
$LANG['FAXSEND'] = "Изпращане на факс";
$LANG['FAXRECV'] = "Приемане на факс";
$LANG['FAXRECVFROM'] = "Приемане на факс от";

$LANG['MODEM_DEVICE'] = "Устройство";
$LANG['MODEM_CONTACT'] = "Контакт";
$LANG['MODEM_ALIAS'] = "Псевдоним";

$LANG['MISSING_CATEGORY_NAME'] = "Трябва да въведете име на категория";
$LANG['MISSING_DEVICE_NAME'] = "Трябва да въведете име на устройството";
$LANG['MISSING_ALIAS_NAME'] = "Трябва да въведете псевдоним";
$LANG['MISSING_CONTACT_NAME'] = "Трябва да въведете име на контакта";
$LANG['MISSING_ROUTE'] = "Трябва да въведете DID/DTMF цифри";

$LANG['MISSING_FILE_NAME'] = "You must enter a file name"; // <----- NEW
$LANG['MISSING_TITLE_NAME'] = "You must enter a title"; // <----- NEW

$LANG['ADMIN_CONFIGURE'] = "Конфигуриране...";
$LANG['ADMIN_USERS'] = "Потребители";
$LANG['ADMIN_NEW_USER'] = "Нов Потребител";
$LANG['ADMIN_EDIT_USER'] = "Редактирай Потребител";
$LANG['ADMIN_DEL_USER'] = "Изтрий Потребител";
$LANG['ADMIN_LAST_LOGIN'] = "Последно Влизане";
$LANG['ADMIN_LAST_IP'] = "Последен IP Адрес";
$LANG['ADMIN_USER_LIST'] = "Списък Потребители";
$LANG['ADMIN_FAXCATS'] = "Факс Категории";
$LANG['ADMIN_CONFMODEMS'] = "Модеми";

$LANG['ADMIN_ROUTING_BY'] = "Направление по...";
$LANG['ADMIN_ROUTEBY_SENDER'] = "Направление по Изпращач";
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Изпращач";
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Направление по Баркод";
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Баркод";
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Направление по Ключова дума";
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Ключова дума";

$LANG['ADMIN_DASHBOARD'] = "Информация";
$LANG['ADMIN_STATS'] = "Статистика";
$LANG['ADMIN_SYSLOGS'] = "Системни Логове";
$LANG['ADMIN_SYSFUNC'] = "Системни Функции";
$LANG['ADMIN_NOUSERS'] = "Няма създадени потребители";
$LANG['ADMIN_ACC_ENABLED'] = "Акаунта е активен";
$LANG['ADMIN_PWDCYCLE'][] = "Деактивиране на паролата";
$LANG['ADMIN_PWDCYCLE'][] = "Никога";
$LANG['ADMIN_PWDCYCLE'][] = "На 3 Месеца";
$LANG['ADMIN_PWDCYCLE'][] = "На 6 Месеца";
$LANG['ADMIN_PWDEXP'] = "Дата на деактивиране на паролата";
$LANG['SUPERUSER'] = "Супер потребител";
$LANG['IS_ADMIN'] = "Администратор";
$LANG['USER_CANDEL'] = "Потребителят има право да изтрива факсове от архива";
$LANG['ADMIN_FAXLINES'] = "Достъп до факс-линии";
$LANG['ADMIN_CATEGORIES'] = "Достъп до факс-категории";
$LANG['REBOOT'] = "Рестартирай Сървъра";
$LANG['SHUTDOWN'] = "Изключи Сървъра";
$LANG['DOWNLOADARCHIVE'] = "Изтегли Архива";
$LANG['DOWNLOADDB'] = "Изтегли Базата Данни";
$LANG['PLSWAIT'] = "Моля изчакайте";
$LANG['LOGTEXT'] = "Съдържание на лога";
$LANG['QUESTION_DELUSER'] = "Сигурни ли сте, че искате да изтриете";

$LANG['TSI_ID'] = "TSI ID";
$LANG['PRIORITY'] = "Приоритет";
$LANG['BLACKLIST'] = "Черен Списък";
$LANG['MODIFY_FAXJOB'] = "Редактирай Задачата";
$LANG['NEW_DESTINATION'] = "Ново Направление";
$LANG['SCHEDULE_FAX'] = "Планирано изпращане";
$LANG['FAX_NUMTRIES'] = "Брой опита";
$LANG['FAX_KILLTIME'] = "Прекрати изпращане";
$LANG['NOW'] = "Сега";
$LANG['MINUTES'] = "Минути";
$LANG['HOURS'] = "Часа";
$LANG['DAYS'] = "Дни";

$LANG['ADMIN_CONFDYNCONF'] = "Черен Списък";
$LANG['DYNCONF_MISSING_CALLID'] = "Трябва да въведете CallerID";
$LANG['DYNCONF_NOT_CREATED'] = "Филтърът не е създаден";
$LANG['DYNCONF_EXISTS'] = "Филтърът съществува";
$LANG['DYNCONF_CALLID'] = "Caller ID";
$LANG['DYNCONF_CREATED'] = "Филтърът е създаден";
$LANG['DYNCONF_DELETED'] = "Филтърът е изтрит";
$LANG['DYNCONF_UPDATED'] = "Филтърът е обновен";
$LANG['OPTIONS'] = "Опции";

$LANG['MUST_CREATE_ROUTES'] = "<a href=\"conf_didroute.php\">Първо трябва да създадете DID/DTMF група</a>";
$LANG['MUST_CREATE_MODEMS'] = "<a href=\"conf_modems.php\">Първо трябва да добавите модем</a>";
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">Първо трябва да създадете категория</a>";

$LANG['EXPLAIN_CATEGORIES'] = "Категориите са полезни за организиране на факсовете в AvantFAX архива.  Обикновените потребители са ограничени да разглеждат само определените им категории.";
$LANG['EXPLAIN_DYNCONF'] = "HylaFAX Черен Списък се използва за отхвърляне на факсове от нежелани номера. Въведете Caller ID на изпращача който искате да блокирате.  Също така можете да изберете устройство ако искате да блокирате изпращач от определена линия.";
$LANG['EXPLAIN_DIDROUTE'] = "DID/DTMF рутирането се използва за рутиране на факсове изпратени към hunt група.  HylaFAX трябва да е конфигурирана правилно за да работи това рутиране. Трябва да се направи отделно въвеждане за всяка hunt група, която възнамерявате да използвате с AvantFAX. Полето DID/DTMF цифри е за информация за hunt групата както е получена от HylaFAX -- обикновено последните 3 или 4 цифри или дори 10 цифри от факс номера. Полето Псевдоним се използва за описание на местоположението или предназначението на hunt групата. Например, Продажби или Поддръжка за факс линия предназначена за тези отдели. Полето Контакт е за email адрес, и всеки един факс който пристига за тази група ще бъде изпращан на този Контакт. Полето Принтер определя кой CUPS/lpr принтер да разпечатва факса.  Обикновените потребители са ограничени да разглеждат факсове само от определената им hunt група.";
$LANG['EXPLAIN_MODEMS'] = "Въвеждането на Модем трябва да бъде направено за всеки един модем, който възнамерявате да използвате с AvantFAX. Полето Устройство е за името на устройството, както е конфигурирано в HylaFAX (например: ttyIAX1, ttyS0, ttyds01 или boston00).  Полето Псевдоним се използва за описание на местоположението или предназначението на модема.  Например, Продажби или Поддръжка за факс линия предназначена за тези отдели. Полето Контакт е за email адрес, и всеки един факс който пристига по този модем ще бъде изпращан на този Контакт. Полето Принтер определя кой CUPS/lpr принтер да разпечатва факса. Обикновените потребители са ограничени да разглеждат факсове само от определения им модем.";
$LANG['EXPLAIN_COVERS'] = "A Cover Page entry must be created for each cover page you intend to use with AvantFAX.  The File field is for the name of the template file found in the images/ folder (ie: cover.ps, custom.ps, or mycover.html). The Title field is used to describe the cover page.  For example: Generic, Sales Dept, Accounting Dept.  Anyone can choose any of the cover pages defined here.";
$LANG['EXPLAIN_FAX2EMAIL'] = "Fax2Email се използва за рутиране на индивидуални номера към определен email адрес. Ако желаете всички факсове изпратени от номер 18002125555 да се изпрашат на sales@yourcompany.com, трябва да изберете фирма от списъка в ляво и да въведете email адрес в полето Email. Полето Фирма ви позволява да редактирате името на фирмата, което се показва в Контакти.  Полето принтер определя кой CUPS/lpr принтер да разпечатва факса. Също така, Вие имате възможността да определите категория за автоматично категоризиране на факса.";
$LANG['EXPLAIN_BARCODEROUTE'] = "Баркод базираното рутиране се използва за рутиране на факсове определено от баркода който се съдържа във факса. Въведете баркод който да отговаря на това рутиране в полето Баркод. Полето Псевдоним се използва за описание на това рутиране. Например за специфична услуга или продукт. Полето Контакт е за email address, и всеки един факс който пристига за тази група ще бъде изпращан на този Контакт. Полето Принтер определя кой CUPS/lpr принтер да разпечатва факса. Съшо така, Вие имате възможността да определите категория за автоматично категоризиране на факса.";
