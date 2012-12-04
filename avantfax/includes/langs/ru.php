<?php
/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 * PHP 5 only
 *
 * @author		David D. Mimms, Jr. <david@avantfax.com>
 * @copyright		2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright		2007 iFAX Solutions, Inc.
 * @license 		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

$LANGUAGE = "ru";
$LANGUAGE_NAME = "Russian";

$LANG = array();

$LANG['ISO'] = "charset=UTF-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Да";
$LANG['NO'] = "Нет";

$LANG['DATE'] = "Дата";
$LANG['FROM'] = "С номера";
$LANG['TO'] = "Контактное лицо";

$LANG['DATE_START'] = "с";
$LANG['DATE_END'] = "по";

$LANG['TO_PERSON'] = "Контактное лицо";
$LANG['TO_COMPANY'] = "Организация";
$LANG['TO_LOCATION'] = "Адрес организации";
$LANG['TO_VOICENUMBER'] = "Контактный тел.";

$LANG['MY_COMPANY'] = "Организация";
$LANG['MY_LOCATION'] = "Адрес";
$LANG['MY_VOICENUMBER'] = "Контактный тел.";
$LANG['MY_FAXNUMBER'] = "Номер факса";

$LANG['VIEW_FAX'] = "Посмотреть факс";
$LANG['ROTATE_FAX'] = "Повернуть";
$LANG['DOWNLOAD_PDF'] = "Загрузить в формате PDF";
$LANG['DOWNLOAD_TIFF'] = "Загрузить в формате TIFF";
$LANG['EMAIL_PDF'] = "Отправить по почте с вложенным PDF";
$LANG['ADD_NOTE_FAX'] = "Добавить примечание";
$LANG['ARCHIVE_FAX'] = "Переместить в архив";
$LANG['DELETE_FAX'] = "Удалить";

$LANG['DELETE_CONFIRM'] = "Удалить данный факс?";

$LANG['ASSIGN_CNAME'] = "Назначить имя компании";
$LANG['ASSIGN_MISSING'] = "Необходимо ввести имя компании";
$LANG['ASSIGN_NOTE'] = "Редактировать описание/примечание для этого факса";
$LANG['ASSIGN_NOTE_SAVED'] = "Примечание/описание сохранено.";
$LANG['ASSIGN_OK'] = "Имя компании назначено успешно";
$LANG['FAXES'] = "факсов в списке";

$LANG['NAME'] = "ФИО";
$LANG['DESCRIPTION'] = "Описание";
$LANG['SAVE'] = "Сохранить";
$LANG['DELETE'] = "Удалить";
$LANG['CANCEL'] = "Отмена";
$LANG['CREATE'] = "Создать";
$LANG['EMAIL'] = "Эл. почта";
$LANG['SELECT'] = "Выбрать";
$LANG['CONTACT_SAVED'] = "Контакт сохранен";
$LANG['CONTACT_DELETED'] = "Контакт удален";
$LANG['RUBRICA_SAVED'] = "Детали о компаниии сохранены";
$LANG['RUBRICA_DELETED'] = "Удалено";

$LANG['FAX_FILES'] = "Прикрепить файл";
$LANG['FAX_DEST'] = "Номер(а) получателя(ей)";
$LANG['FAX_CPAGE'] = "Титульная страница";
$LANG['FAX_REGARDING'] = "Тема";
$LANG['FAX_COMMENTS'] = "Комментарий";
$LANG['FAX_FILETYPES'] = "Используйте файлы типов: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Необходимо выбрать фаил для факса";
$LANG['FAX_DEST_MISSING'] = "Нобходимо ввести номер(а) получателя(ей)факса";
$LANG['FAX_SUBMITTED'] = "Факс был успешно поставлен в очередь на отправку.<br />Результат будет отправлен Вам по эл. почте.";
$LANG['FAX_FILESIZE'] = "Размер файла больше установленного ограничения.";
$LANG['FAX_MAXSIZE'] = "Макс. размер файла $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "Нет загруженных файлов";
$LANG['FUPLOAD_NOT_ALLOWED'] = "Несоответствующий тип файла";
$LANG['FUPLOAD_OVER_LIMIT'] = "Размер файла больше ограничения";
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "Размер файла больше ограничения (INI)";
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "Размер файла больше ограничения (FORM)";
$LANG['FUPLOAD_NOT_COMPLETE'] = "Фаил загружен не полностью";
$LANG['FUPLOAD_NO_TEMPDIR'] = "Отсутствует директория для временных файлов";
$LANG['FUPLOAD_CANT_WRITE'] = "Не вожможно записать загруженный фаил";

$LANG['YOUR_NAME'] = "Ваше имя";
$LANG['UPDATE'] = "Обновить";
$LANG['USER_DETAILS_SAVED'] = "Настройки пользователя сохранены.";

$LANG['LANGUAGE'] = "Язык";
$LANG['EMAIL_SIG'] = "Подпись";

$LANG['NEXT_FAX'] = "Следующий факс";
$LANG['PREV_FAX'] = "Предыдущий факс";

$LANG['LOGIN_TEXT'] = "Введите ваши регистрационные данные для доступа к интерфейсу факсов.";
$LANG['LOGIN_DISABLED'] = "Ваша учетная запись заблокирована. Обратитесь к администратору.";
$LANG['LOGIN_INCORRECT'] = "Неправильное имя пользователя или пароль.<br />Повторите попытку.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Доступ запрещён";

$LANG['USERNAME'] = "Имя для входа";
$LANG['PASSWORD'] = "Пароль";
$LANG['USER'] = "Пользователь";
$LANG['BUTTON_LOGIN'] = "Вход";
$LANG['BUTTON_LOGOUT'] = "Выход";
$LANG['BUTTON_SETTINGS'] = "Настройки";

$LANG['MENU_MENU'] = "Меню";
$LANG['MENU_INBOX'] = "Входящие";
$LANG['MENU_OUTBOX'] = "Исходящие";
$LANG['MENU_SENDFAX'] = "Отправить";
$LANG['MENU_ARCHIVE'] = "Архив";
$LANG['MENU_CONTACTS'] = "Контакты";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "Адрес эл. почты";
$LANG['CONTACT_HEADER_FAX'] = "Факс";
$LANG['CONTACT_HEADER_COMPANY'] = "Организация";
$LANG['CONTACT_HEADER_NEWFAX'] = "Новый факс";
$LANG['CONTACT_HEADER_FAXNUM'] = "Номер факса";
$LANG['NEW_ENTRY'] = "Новая запись";
$LANG['UPLOAD_CONTACTS'] = "Импорт контактов из файла ".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = "Успешно импортировано %d контактов";
$LANG['UPLOAD_BUTTON'] = "Загрузить";

$LANG['SEND_EMAIL_HEADER'] = "Переслать факс по электронной почте";
$LANG['EMAIL_RECIPIENTS'] = "Получатели";
$LANG['MESSAGE_PROMPT'] = "Текст письма";
$LANG['BUTTON_SEND'] = "Отправить";
$LANG['SUBJECT'] = "Тема";
$LANG['PDF_FILENAME'] = "Имя файла PDF";

$LANG['EMAIL_SUCCESS'] = "Сообщение успешно отправлено.";
$LANG['EMAIL_FAILURE'] = "Ошибка при отправке почты.";

$LANG['PN_PAGE'] = "Страница";
$LANG['PN_PAGE_UP'] = "Страница вверх";
$LANG['PN_PAGE_DN'] = "Страница вниз";
$LANG['PN_PAGES'] = "Страниц";
$LANG['PN_OF'] = "из";
$LANG['NUM_DIALS'] = "Попытки";
$LANG['KILL_JOB'] = "Удалить задание №";

$LANG['PROMPT_CLOSEWINDOW'] = "Закрыть окно";

$LANG['LAST_UPDATED'] = "Последнее обновление";
$LANG['BACK'] = "Назад";
$LANG['EDIT'] = "Изменить";
$LANG['ADD'] = "Добавить";
$LANG['WARNCAT'] = "Пожалуйста, выберите категорию";
$LANG['TITLE'] = "Заголовок";
$LANG['CATEGORY'] = "Категория";
$LANG['CATEGORY_NAME'] = "Имя категории";

$LANG['LAST_MOD'] = "Последние изменения сделаны";

$LANG['MONTHS'] = array("");
$LANG['MONTHS'][] = "Январь";
$LANG['MONTHS'][] = "Февраль";
$LANG['MONTHS'][] = "Март";
$LANG['MONTHS'][] = "Апрель";
$LANG['MONTHS'][] = "Май";
$LANG['MONTHS'][] = "Июнь";
$LANG['MONTHS'][] = "Июль";
$LANG['MONTHS'][] = "Август";
$LANG['MONTHS'][] = "Сентябрь";
$LANG['MONTHS'][] = "Октябрь";
$LANG['MONTHS'][] = "Ноябрь";
$LANG['MONTHS'][] = "Декабрь";

$LANG['ERROR_PASS'] = "Извините, но соответствующий пользователь не найден.";
$LANG['NEWPASS_MSG'] = "Регистрационные данные %s были отправлены на указанный адрес. Пользователь с адреса %s запросил выслать новый пароль.

Ваш новый пароль: %s

Если это ошибочно, зарегистрируйтесь с помощью нового пароля и измените его на тот, который желаете.";

$LANG['ADMIN_NEWPASS_MSG'] = "Пароль учетной записи администратора был сброшен:\n\t%s\n пользователем %s";

$LANG['REGWARN_MAIL'] = "Пожалуйста, введите правильный адрес эл. почты.";
$LANG['REGWARN_PASS'] = "Пожалуйста, введите верный пароль, без пробелов, не более ".MIN_PASSWD_SIZE." символов и содержащий 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "Пароли не совпадают, попытайтесь еще раз.";
$LANG['REGWARN_USERNAME_INUSE'] = "Это имя уже используется. Используйте другое.";

$LANG['USER_UPDATE_ERROR'] = "Ошибка при обновлении учетной записи";
$LANG['PASS_TOO_LONG'] = "Пароль чрезмерно длинный";
$LANG['PASS_TOO_SHORT'] = "Пароль слишком короткий";
$LANG['PASS_ALREADY_USED'] = "Этот пароль уже используется. Создайте новый.";
$LANG['PASS_ERROR_CHANGING'] = "Ошибка смены пароля для";
$LANG['PASS_ERROR_RESETTING'] = "Ошибка сброса пароля для";
$LANG['ERROR_SENDING_EMAIL'] = "Ошибка отправки почты";
$LANG['REGWARN_USERNAME'] = "Использование непечатных символов в имени запрещено.";
$LANG['REGWARN_NOUSERNAME'] = "Необходимо ввести имя пользователя";
$LANG['REGWARN_MAIL_EXISTS'] = "Почтовый адрес уже используется.";

$LANG['LOST_PASSWORD'] = "Забыли пароль?";

$LANG['PROMPT_UNAME'] = "Имя для входа";
$LANG['PROMPT_PASSWORD'] = "Пароль";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Повторное использование старых паролей";
$LANG['REPLY_TO_FAX'] = "Ответить на факс";
$LANG['REPLY_TO_FAX_TIP'] = "Оригинал факса будет отправлен вслед за титульной страницей";
$LANG['PROMPT_EMAIL'] = "Адрес эл. почты";
$LANG['BUTTON_SEND_PASS'] = "Выслать пароль";
$LANG['REGISTER_VPASS'] = "Проверить пароль";
$LANG['FIELDS_REQUIRED'] = "Поля, обозначенные звездочкой (*) обязательны к заполнению.";

$LANG['NEW_PASS_DESC'] = "Пожалуйста введите Ваш почтовый адрес и нажмите кнопку <i>Выслать пароль</i><br /><br />Новый пароль будет выслан немедленно.<br /></br > Используйте его для доступа.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Пожалуйста введите Ваш почтовый адрес и нажмите кнопку <b>Выслать пароль</b><br /><br />Новый пароль будет выслан немедленно.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Пароль был выслан на указанный Вами адрес<br /><br />После получения нового пароля Вы сможете его изменить.<br /><br />";

$LANG['SEARCH_TITLE'] = "Поиск";
$LANG['KEYWORDS'] = "Критерий поиска";
$LANG['COMPANY_SEARCH'] = "Поиск компании";
$LANG['COMPANY_LIST'] = "Список компаний";
$LANG['SENT_RECVD'] = "Условие";
$LANG['BOTH_SENT_RECVD'] = "Отправленные и принятые";
$LANG['ONLY_MY_SENT'] = "Только мною посланные";
$LANG['ONLY_RECVD'] = "Только принятые";
$LANG['CONCLUSION'] = "Всего %d результатов найдено.";
$LANG['NOKEYWORD'] = "Ничего не найдено";

$LANG['SEARCH_WHITEPAGES'] = "Поиск в Белых страницах";

$LANG['PWD_NEEDS_RESET'] = "Перед тем как продолжить Ваш пароль должен быть изменен.";
$LANG['PWD_REQUIREMENTS'] = "Пароль должен быть не менее ".MIN_PASSWD_SIZE."-ми символов.";
$LANG['OPASS'] = "Старый пароль";
$LANG['NPASS'] = "Новый пароль";
$LANG['VPASS'] = "Подтверждение";
$LANG['OPASS_WRONG'] = "Старый пароль не верен.";
$LANG['NAME_MISSING'] = "Необходимо ввести имя.";

$LANG['MODIFY_FAXNUMS'] = "Изменить номер факса компании";
$LANG['MODIFY_EMAILS'] = "Изменить Ваш адрес эл. почты в адресной книге";
$LANG['TITLE_FAXNUMS'] = "Номера факсов";
$LANG['TITLE_EMAILS'] = "Адреса эл. почты";

$LANG['TITLE_DISTROLIST'] = "Списки рассылки";
$LANG['DISTROLIST_NAME'] = "Название списка";
$LANG['DISTROLIST_DELETE'] = "Удалить список";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Удалить этот список рассылки?";
$LANG['DISTROLIST_SAVENAME'] = "Сохранить имя списка";

$LANG['CHANGES_SAVED'] = "Изменения сохранены";
$LANG['DISTROLIST_DELETED'] = "Список удален";
$LANG['DISTROLIST_NOT_CREATED'] = "Список не создан";
$LANG['DISTROLIST_EXISTS'] = "Список уже существует";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Назначьте имя для списка";
$LANG['DISTROLIST_ADD'] = "Добавить запись";
$LANG['DISTROLIST_REMOVE'] = "Удалить запись";
$LANG['DISTROLIST_REFRESH_LIST'] = "Обновить список";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Регистрационные данные AvantFAX";
$LANG['NEW_USER_MESSAGE'] = "Здравствуйте, %s

Это письмо содержит регистрационные данные для входа на <a href=\"http://%s/index.php\">AvantFAX</a>

Имя для входа - %s
Пароль - %s

Пожалуйста, не отвечайте на это письмо, так как оно составлено автоматически и исключительно с информативной целью.";

$LANG['DIDROUTE_EXISTS'] = "Маршрут уже существует";
$LANG['DIDROUTE_NOT_CREATED'] = "Маршрут не был создан";
$LANG['DIDROUTE_NO_ROUTES'] = "Нет DID/DTMF настроенных маршрутов";
$LANG['DIDROUTE_DOESNT_EXIST'] = "Маршрут %s не сушществует";
$LANG['ADMIN_PRINTER'] = "Принтер";
$LANG['PRINT'] = "Печать";

$LANG['ADMIN_DIDROUTE_CREATED'] = "Маршрут создан";
$LANG['ADMIN_DIDROUTE_DELETED'] = "Маршрут удален";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "Маршрут обновлен";
$LANG['ADMIN_DIDROUTES'] = "DID/DTMF группы маршрутов";
$LANG['DIDROUTE_ROUTECODE'] = "Значения DID/DTMF";
$LANG['DIDROUTE_CATCHALL'] = "Перехватить все";
$LANG['ADMIN_CONFDIDROUTING'] = "Конфигурация DID/DTMF";
$LANG['GROUP'] = "Группа";

$LANG['USER_ANYMODEM'] = "Разрешено принимать факс с любого модема";

$LANG['BARCODEROUTE_BARCODE'] = "Штрих-код";
$LANG['MISSING_BARCODE'] = "Не верный штрих-код";
$LANG['ADMIN_BARCODEROUTE_DELETED'] = "Маршрут по штрих-коду удален";
$LANG['ADMIN_BARCODEROUTE_UPDATED'] = "Маршрут по штрих-коду обновлен";
$LANG['ADMIN_BARCODEROUTE_CREATED'] = "Маршрут по штрих-коду создан";
$LANG['BARCODEROUTE_NOT_CREATED'] = "Маршрут по штрих-коду не создан";
$LANG['BARCODEROUTE_EXISTS'] = "Маршрут по штрих-коду существует";
$LANG['BARCODEROUTE_NO_ROUTES'] = "Маршруты по штрих-коду отсутствуют";
$LANG['BARCODEROUTE_DOESNT_EXIST'] = "Маршрут %s по штрих-коду не существует";

$LANG['FAXCAT_NOT_CREATED'] = "Категория факса '%s' не создана";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Категория факса '%s' уже существует";

$LANG['FAX_FAILED'] = "Отправка факса неудачна.";
$LANG['FAX_WHY']["done"] = "Выполнено";
$LANG['FAX_WHY']["format_failed"] = "не верный формат";
$LANG['FAX_WHY']["no_formatter"] = "нет разметки";
$LANG['FAX_WHY']["poll_no_document"] = "документ не запрошен";
$LANG['FAX_WHY']["killed"] = "удалено";
$LANG['FAX_WHY']["rejected"] = "отвергнуто";
$LANG['FAX_WHY']["blocked"] = "заблокировано";
$LANG['FAX_WHY']["removed"] = "перемещено";
$LANG['FAX_WHY']["timedout"] = "превышено время ожидания";
$LANG['FAX_WHY']["poll_rejected"] = "запрос отвергнут";
$LANG['FAX_WHY']["poll_failed"] = "запрос неудачен";
$LANG['FAX_WHY']["requeued"] = "повторно поставлен в очередь";

$LANG['COMPANY_EXISTS'] = "Имя компании уже существует";
$LANG['FAXNUMID_NOT_CREATED'] = "Не возможно создать уникальный идентификатор факса";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Компании с этим номером факса не существует";
$LANG['CANT_CHANGE_FAXNUM'] = "Вы не можете изменить установленный номер факса";

$LANG['MODEM_EXISTS'] = "Такой модем уже существует";
$LANG['MODEM_NOT_CREATED'] = "Модем не создан";
$LANG['NO_MODEMS_CONFIGURED'] = "Нет сконфигурированных модемов";
$LANG['MODEM_DOESNT_EXIST'] = "Модем %s не существует";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "Категория удалена";
$LANG['ADMIN_FAXCAT_CREATED'] = "Категория создана";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Категория обновлена";

$LANG['ADMIN_MODEM_CREATED'] = "Модем  создан";
$LANG['ADMIN_MODEM_DELETED'] = "Модем  удален";
$LANG['ADMIN_MODEM_UPDATED'] = "Модем  обновлен";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Ожидание";
$LANG['FAXSEND'] = "Отправка факса";
$LANG['FAXRECV'] = "Принятие факса";
$LANG['FAXRECVFROM'] = "Принимается факс от";

$LANG['MODEM_DEVICE'] = "Устройство";
$LANG['MODEM_CONTACT'] = "Контакт";
$LANG['MODEM_ALIAS'] = "Псевдоним";

$LANG['COVER_FILE'] = "File name"; // <--- NEW
$LANG['COVER_TITLE'] = "Coverpage Title"; // <--- NEW
$LANG['SELECT_COVERPAGE'] = "Select cover page"; // <--- NEW

$LANG['MISSING_CATEGORY_NAME'] = "Необходимо указать имя категории";
$LANG['MISSING_DEVICE_NAME'] = "Необходимо указать имя устройства";
$LANG['MISSING_ALIAS_NAME'] = "Необходимо указать псевдоним";
$LANG['MISSING_CONTACT_NAME'] = "Необходимо указать имя контакта";
$LANG['MISSING_ROUTE'] = "Необходимо указать значения DID/DTMF";

$LANG['MISSING_FILE_NAME'] = "You must enter a file name"; // <----- NEW
$LANG['MISSING_TITLE_NAME'] = "You must enter a title"; // <----- NEW

$LANG['ADMIN_CONFIGURE'] = "Настроить...";
$LANG['ADMIN_USERS'] = "Участники";
$LANG['ADMIN_NEW_USER'] = "Новый пользователь";
$LANG['ADMIN_EDIT_USER'] = "Редактирование пользователя";
$LANG['ADMIN_DEL_USER'] = "Удаление пользователя";
$LANG['ADMIN_LAST_LOGIN'] = "Последняя регистрация";
$LANG['ADMIN_LAST_IP'] = "Последний IP";
$LANG['ADMIN_USER_LIST'] = "Список пользователей";
$LANG['ADMIN_FAXCATS'] = "Категории факсов";
$LANG['ADMIN_CONFMODEMS'] = "Параметры модемов";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Маршрутизация по...";
$LANG['ADMIN_ROUTEBY_SENDER'] = "Маршрутизация по отправителю";
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Отправителю";
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Маршрутизация по штрих-коду";
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Штрих-коду";
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Маршрутизация по ключевому слову";
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Ключевому слову";

$LANG['ADMIN_DASHBOARD'] = "Информационный щит";
$LANG['ADMIN_STATS'] = "Статистика";
$LANG['ADMIN_SYSLOGS'] = "Журнал событий";
$LANG['ADMIN_SYSFUNC'] = "Системные функции";
$LANG['ADMIN_NOUSERS'] = "Нет пользователей";
$LANG['ADMIN_ACC_ENABLED'] = "Учетная запись активна";
$LANG['ADMIN_PWDCYCLE'][] = "Пароль должен быть изменен";
$LANG['ADMIN_PWDCYCLE'][] = "никогда";
$LANG['ADMIN_PWDCYCLE'][] = "каждые 3 месяца";
$LANG['ADMIN_PWDCYCLE'][] = "каждые 6 месяцев";
$LANG['ADMIN_PWDEXP'] = "Дата окончания действия пароля";
$LANG['SUPERUSER'] = "Привелигированный пользователь";
$LANG['IS_ADMIN'] = "Администратор";
$LANG['USER_CANDEL'] = "Разрешено удалять факсы";
$LANG['ADMIN_FAXLINES'] = "Телефонная линия факсов";
$LANG['ADMIN_CATEGORIES'] = "Просматриваемая категория факсов";
$LANG['REBOOT'] = "Перезагрузить сервер";
$LANG['SHUTDOWN'] = "Выключить сервер";
$LANG['DOWNLOADARCHIVE'] = "Выгрузить архив";
$LANG['DOWNLOADDB'] = "Выгрузить базу данных";
$LANG['PLSWAIT'] = "Пожалуйста подождите";
$LANG['LOGTEXT'] = "Системный журнал";
$LANG['QUESTION_DELUSER'] = "Подтверждение удаления контакта. Продолжить";

$LANG['TSI_ID'] = "Персональный ID абонента";
$LANG['PRIORITY'] = "Важность";
$LANG['BLACKLIST'] = "Черный список";
$LANG['MODIFY_FAXJOB'] = "Редактирование задания";
$LANG['NEW_DESTINATION'] = "Получатель";
$LANG['SCHEDULE_FAX'] = "Задержка отправки";
$LANG['FAX_NUMTRIES'] = "Кол-во попыток";
$LANG['FAX_KILLTIME'] = "Отмена задания через";
$LANG['NOW'] = "текущее время";
$LANG['MINUTES'] = "минут";
$LANG['HOURS'] = "часов";
$LANG['DAYS'] = "дней";

$LANG['ADMIN_CONFDYNCONF'] = "Параметры DynamicConfig";
$LANG['DYNCONF_MISSING_CALLID'] = "Поле Caller ID нужно заполнить";
$LANG['DYNCONF_NOT_CREATED'] = "Правило не создано";
$LANG['DYNCONF_EXISTS'] = "Правило уже сущществует";
$LANG['DYNCONF_CALLID'] = "Caller ID";
$LANG['DYNCONF_CREATED'] = "Правило создано";
$LANG['DYNCONF_DELETED'] = "Правило удалено";
$LANG['DYNCONF_UPDATED'] = "Правило обновлено";
$LANG['OPTIONS'] = "Дополнительно";

$LANG['MUST_CREATE_ROUTES'] = "<a href=\"conf_didroute.php\">Сначала необходимо создать DID/DTMF группу</a>";
$LANG['MUST_CREATE_MODEMS'] = "<a href=\"conf_modems.php\">Сначала необходимо создать модем</a>";
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">Сначала необходимо создать категорию</a>";

$LANG['EXPLAIN_CATEGORIES'] = "Категории помогут Вам упорядочить факсы в Архиве AvantFAX. Обычным пользователям ограничивают просмотр факсов назначением им соответствующих категорий.";
$LANG['EXPLAIN_DYNCONF'] = "Опции DynamicConfig и RejectCall сервера HylaFAX используються для того, чтобы заблокировать периём факсов от определённых отправителей. Для этого необходимо ввести значение Caller ID блокируемого в одноименное поле.  Дополнительно Вы можите указать устройство на котором желаете применять это правило.";
$LANG['EXPLAIN_DIDROUTE'] = "DID/DTMF используется для маршрутизации факсов в группу портов.  При использовании данной функции необходимо, чтобы сервер HylaFAX был корректно настроен. Для разных групп, которые Вы планируете использовать с AvantFAX,  должны быть созданы собственные записи. Поле DID/DTMF содержит значения для группы портов принимаеой от HylaFAX и обычно состоит из 3-4 цифр или даже 10-и цифр номера факса. Поле \"Псевдоним\" используется чтобы охарактеризовать местоположение или цель для группы портов. Например, факс Отдела продаж или Техподдержка для соответствующих подразделений. В поле \"Контакт\" заносятся адреса электронной почты, и, каждый факс который принимается этим модемом для группы, отправится по электронной почте к указанному Контакту. Поле \"Принтер\" определяет на какой принтер CUPS/lpr печатать факс. Обычные пользователи могут просматривать факсы только с тех групп портов, которые им определены.";
$LANG['EXPLAIN_MODEMS'] = "Модемный вход должен быть создан для каждого устройства, которое Вы намереваетесь использовать с AvantFAX. Поле \"Устройство\" определяет такое имя устройства, каким оно задано в HylaFAX (то есть: ttyS0, ttyds01 или boston00). Поле \"Псевдоним\" используется, чтобы описать местоположение или цель для модема. Например, факс Отдела продаж или Техподдержка. В поле \"Контакт\" используются адреса электронной почты, и каждый факс, который принимаеться этим модемом, отправится по электронной почте к указанному Контакту. Поле \"Принтер\" определяет на какой принтер CUPS/lpr печатать факс. Обычные пользователи могут проссматривать факсы только с тех линий модемов, которые им определены.";
$LANG['EXPLAIN_COVERS'] = "A Cover Page entry must be created for each cover page you intend to use with AvantFAX.  The File field is for the name of the template file found in the images/ folder (ie: cover.ps, custom.ps, or mycover.html). The Title field is used to describe the cover page.  For example: Generic, Sales Dept, Accounting Dept.  Anyone can choose any of the cover pages defined here."; // <--- NEW
$LANG['EXPLAIN_FAX2EMAIL'] = "Маршрутизация по отправителю предназначена для того, чтобы направить факс с индивидуального номера на определенный адрес электронной почты. Если Вы хотите, чтобы факсы, посланные от 18002125555 посылались по электронной почте на sales@yourcompany.com, Вы должны выбрать компанию в списке слева и ввести адрес электронной почты в соответствующем поле справа. Поле \"Организация\" позволяет Вам изменять название компании так, как оно будет отображено в Контактах. Кроме этого Вы можете указать категорию для автоматического назначения её принимаемым факсам.";
$LANG['EXPLAIN_BARCODEROUTE'] = "Данная маршрутизация предназначена для управления маршрутом факса согласно штрих-коду содержащегося в факсе.  Введите значение штрих-кода удовлетворяющий Вашему правилу в соответствующее поде. Поле \"Псевдоним\" используется для описания исключительно этого правила. Например, специфичный сервис, товар или продукт. В поле \"Контакт\" используются адреса электронной почты, и каждый факс, который принимаеться этим модемом, отправится по электронной почте к указанному Контакту. Поле \"Принтер\" определяет на какой принтер CUPS/lpr печатать факс. Кроме этого Вы можете указать категорию для автоматического назначения её принимаемым факсам.";
