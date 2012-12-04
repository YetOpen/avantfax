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

$LANGUAGE = "es";
$LANGUAGE_NAME = "Espa&ntilde;ol";

$LANG = array();

$LANG['ISO'] = "charset=UTF-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Sí";
$LANG['NO'] = "No";

$LANG['DATE'] = "Fecha";
$LANG['FROM'] = "De";
$LANG['TO'] = "Para";

$LANG['DATE_START'] = "Fecha de inicio";
$LANG['DATE_END'] = "Fecha de fin";

$LANG['TO_PERSON'] = "Persona destino";
$LANG['TO_COMPANY'] = "Compañía destino";
$LANG['TO_LOCATION'] = "Ubicación destino";
$LANG['TO_VOICENUMBER'] = "Número de voz destino";

$LANG['MY_COMPANY'] = "Compañía";
$LANG['MY_LOCATION'] = "Ubicación";
$LANG['MY_VOICENUMBER'] = "Número de voz";
$LANG['MY_FAXNUMBER'] = "Número de fax";

$LANG['VIEW_FAX'] = "Ver Fax";
$LANG['ROTATE_FAX'] = "Rotar Fax";
$LANG['DOWNLOAD_PDF'] = "Descargar PDF";
$LANG['DOWNLOAD_TIFF'] = "Descargar TIFF";
$LANG['EMAIL_PDF'] = "Reenviar por Email en PDF";
$LANG['ADD_NOTE_FAX'] = "Añadir una nota";
$LANG['ARCHIVE_FAX'] = "Mover al Archivo";
$LANG['DELETE_FAX'] = "Eliminar permanentemente";

$LANG['DELETE_CONFIRM'] = "Por favor, confirme que desea borrar este fax.";

$LANG['ASSIGN_CNAME'] = "Asignar un nombre de compañía";
$LANG['ASSIGN_MISSING'] = "Debe introducir un nombre de compañía";
$LANG['ASSIGN_NOTE'] = "Modificar la nota/ descripción de este fax";
$LANG['ASSIGN_NOTE_SAVED'] = "Nota / descripción guardada.";
$LANG['ASSIGN_OK'] = "El nombre de compañía fue asignado con éxito.";
$LANG['FAXES'] = "faxes";

$LANG['NAME'] = "Nombre";
$LANG['DESCRIPTION'] = "Descripción";
$LANG['SAVE'] = "Guardar";
$LANG['DELETE'] = "Borrar";
$LANG['CANCEL'] = "Cancelar";
$LANG['CREATE'] = "Crear";
$LANG['EMAIL'] = "Correo electrónico";
$LANG['SELECT'] = "Seleccionar";
$LANG['CONTACT_SAVED'] = "Detalles del contacto guardados";
$LANG['CONTACT_DELETED'] = "Contacto borrado";
$LANG['RUBRICA_SAVED'] = "Detalles de la compañía guardados";
$LANG['RUBRICA_DELETED'] = "Compañía borrada";

$LANG['FAX_FILES'] = "Seleccione los archivos para enviar por FAX";
$LANG['FAX_DEST'] = "Números de fax de destino";
$LANG['FAX_CPAGE'] = "Usar página de portada";
$LANG['FAX_REGARDING'] = "Concerniente a";
$LANG['FAX_COMMENTS'] = "Comentarios";
$LANG['FAX_FILETYPES'] = "Sólo puede adjuntar archivos: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Debe seleccionar un archivo para enviar por fax";
$LANG['FAX_DEST_MISSING'] = "Debe introducir los números de fax de destino";
$LANG['FAX_SUBMITTED'] = "Su fax ha sido puesto a la cola de envíos con éxito.<br />Recibirá un correo electrónico de confirmación una vez que el fax haya sido enviado.";
$LANG['FAX_FILESIZE'] = "El tamaño del archivo supera el límite.";
$LANG['FAX_MAXSIZE'] = "El límite de tamaño para el archivo es de $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Su nombre";
$LANG['UPDATE'] = "Actualizar";
$LANG['USER_DETAILS_SAVED'] = "Las preferencias de usuario han sido guardadas.";

$LANG['LANGUAGE'] = "Idioma";
$LANG['EMAIL_SIG'] = "Firma del correo electrónico";

$LANG['NEXT_FAX'] = "Siguiente Fax";
$LANG['PREV_FAX'] = "Anterior Fax";

$LANG['LOGIN_TEXT'] = "Introduzca su nombre de usuario y contraseña para acceder a la interfaz de fax.";
$LANG['LOGIN_DISABLED'] = "Su cuenta ha sido desactivada.  Por favor, contacte con el administrador.";
$LANG['LOGIN_INCORRECT'] = "Nombre de usuario o contraseña no válidos.  Por favor, vuelva a intentarlo.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "nombre de usuario";
$LANG['PASSWORD'] = "contraseña";
$LANG['USER'] = "Usuario";
$LANG['BUTTON_LOGIN'] = "Entrar";
$LANG['BUTTON_LOGOUT'] = "Salir";
$LANG['BUTTON_SETTINGS'] = "Configuración";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Entrada";
$LANG['MENU_OUTBOX'] = "Salida";
$LANG['MENU_SENDFAX'] = "Enviar Fax";
$LANG['MENU_ARCHIVE'] = "Archivo";
$LANG['MENU_CONTACTS'] = "Contactos";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "Correo electrónico";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Compañía";
$LANG['CONTACT_HEADER_NEWFAX'] = "Nuevo número de fax";
$LANG['CONTACT_HEADER_FAXNUM'] = "Número de fax";
$LANG['NEW_ENTRY'] = "Nueva entrada";
$LANG['UPLOAD_CONTACTS'] = "Subir fichero de contactos".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = "%d contactos subidos satisfactoriamente";
$LANG['UPLOAD_BUTTON'] = "Subir";

$LANG['SEND_EMAIL_HEADER'] = "Reenviar fax vía correo electrónico";
$LANG['EMAIL_RECIPIENTS'] = "Destinatarios de los correos electrónicos";
$LANG['MESSAGE_PROMPT'] = "Mensaje";
$LANG['BUTTON_SEND'] = "Enviar";
$LANG['SUBJECT'] = "Asunto";
$LANG['PDF_FILENAME'] = "Nombre de fichero PDF";

$LANG['EMAIL_SUCCESS'] = "El correo electrónico ha sido enviado con éxito.";
$LANG['EMAIL_FAILURE'] = "Ha sucedido un fallo enviando el correo electrónico.";

$LANG['PN_PAGE'] = "Página";
$LANG['PN_PAGE_UP'] = "Página Arriba";
$LANG['PN_PAGE_DN'] = "Página Abajo";
$LANG['PN_PAGES'] = "Páginas";
$LANG['PN_OF'] = "de";

$LANG['NUM_DIALS'] = "Llamadas";
$LANG['KILL_JOB'] = "Cancelar trabajo";

$LANG['PROMPT_CLOSEWINDOW'] = "Cerrar Ventana";

$LANG['LAST_UPDATED'] = "Última vez actualizado";
$LANG['BACK'] = "[ Atrás ]";
$LANG['EDIT'] = "Editar";
$LANG['ADD'] = "Añadir";
$LANG['WARNCAT'] = "Por favor, seleccione una categoría";
$LANG['TITLE'] = "Título";
$LANG['CATEGORY'] = "Categoría";
$LANG['CATEGORY_NAME'] = "Nombre de categoría";

$LANG['LAST_MOD'] = "Última vez modificado por";

$LANG['MONTHS'][] = array ("");
$LANG['MONTHS'][] = "Enero";
$LANG['MONTHS'][] = "Febrero";
$LANG['MONTHS'][] = "Marzo";
$LANG['MONTHS'][] = "Abril";
$LANG['MONTHS'][] = "Mayo";
$LANG['MONTHS'][] = "Junio";
$LANG['MONTHS'][] = "Julio";
$LANG['MONTHS'][] = "Agosto";
$LANG['MONTHS'][] = "Septiembre";
$LANG['MONTHS'][] = "Octubre";
$LANG['MONTHS'][] = "Noviembre";
$LANG['MONTHS'][] = "Diciembre";

$LANG['ERROR_PASS'] = "Lo siento, no se ha encontrado un usuario que coincida.";
$LANG['NEWPASS_MSG'] = "La cuenta de usuario %s tiene este correo electrónico asociado con ella.  Un usuario web acaba de solicitar desde %s que le sea enviada una nueva contraseña.

Su nueva contraseña es: %s

Si esto ha sido un error, simplemente acceda con su nueva contraseña y luego cambie su contraseña a la que desee.";

$LANG['ADMIN_NEWPASS_MSG'] = "La contraseña de la cuenta de administración ha sido restaurada a:\n\t%s\n por un usuario desde %s";

$LANG['REGWARN_MAIL'] = "Por favor, introduzca una dirección de correo válida.";

$LANG['REGWARN_PASS'] = "Por favor, introduzca una contraseña válida. No se admiten espacios, debe tener más de ".MIN_PASSWD_SIZE." caracteres y debe consistir en números y letras.";
$LANG['REGWARN_VPASS2'] = "La contraseña y la verificación no coinciden, por favor inténtelo de nuevo.";
$LANG['REGWARN_USERNAME_INUSE'] = "Este nombre de usuario ya esta siendo usado. Por favor, elija otro.";

$LANG['USER_UPDATE_ERROR'] = "Error actualizando la cuenta";
$LANG['PASS_TOO_LONG'] = "Contraseña demasiado larga";
$LANG['PASS_TOO_SHORT'] = "Contraseña demasiado corta";
$LANG['PASS_ALREADY_USED'] = "Esta contraseña ya ha sido usada. Por favor, cree una nueva.";
$LANG['PASS_ERROR_CHANGING'] = "Error cambiando la contraseña para";
$LANG['PASS_ERROR_RESETTING'] = "Error restaurando la contraseña para";
$LANG['ERROR_SENDING_EMAIL'] = "El envío del correo electrónico ha fallado";
$LANG['REGWARN_USERNAME'] = "No se admiten caracteres no alfanuméricos en el nombre de usuario.";
$LANG['REGWARN_NOUSERNAME'] = "Debes introducir un nombre de usuario";
$LANG['REGWARN_MAIL_EXISTS'] = "La dirección de correo electrónico ya está siendo usada.";
$LANG['LOST_PASSWORD'] = "¿Perdió su contraseña?";

$LANG['PROMPT_UNAME'] = "Nombre de usuario";
$LANG['PROMPT_PASSWORD'] = "Contraseña";
$LANG['PROMPT_CAN_REUSE_PWD'] = "El usuario puede volver a usar contraseñas antiguas";
$LANG['REPLY_TO_FAX'] = "Responder al fax";
$LANG['REPLY_TO_FAX_TIP'] = "El fax original será el primer documento enviado tras la portada";
$LANG['TITLE_DISTROLIST'] = "Listas de distribución";
$LANG['DISTROLIST_NAME'] = "Nombre de la lista";
$LANG['DISTROLIST_DELETE'] = "Borrar lista";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "¿Borrar esta lista de distribución?";
$LANG['DISTROLIST_SAVENAME'] = "Guardar nombre de la lista";

$LANG['CHANGES_SAVED'] = "Cambios guardados";
$LANG['DISTROLIST_DELETED'] = "La lista ha sido borrada";
$LANG['DISTROLIST_NOT_CREATED'] = "La lista no ha sido creada";
$LANG['DISTROLIST_EXISTS'] = "La lista ya existe";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Introduzca un nombre para la lista";
$LANG['DISTROLIST_ADD'] = "Añadir entradas";
$LANG['DISTROLIST_REMOVE'] = "Eliminar entradas";
$LANG['DISTROLIST_REFRESH_LIST'] = "Actualizar lista";

$LANG['PROMPT_EMAIL'] = "Dirección de correo electrónico";
$LANG['BUTTON_SEND_PASS'] = "Enviar Contraseña";
$LANG['REGISTER_VPASS'] = "Verificar Contraseña";
$LANG['FIELDS_REQUIRED'] = "Los campos marcados con un asterisco (*) son obligatorios.";

$LANG['NEW_PASS_DESC'] = "Por favor, introduzca su dirección de correo electrónico y luego pulse en el botón Enviar Contraseña.<br /><br />Recibirá una nueva contraseña en breve.  Use esta nueva contraseña para acceder al sitio.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Introduzca su nombre de usuario y dirección de correo electrónico y luego pulse en el botón Enviar Contraseña.<br /><br />Recibirá una nueva contraseña en breve.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "Su contraseña se enviará a la dirección de correo electrónico indicada.<br /><br />Una vez haya recibido su nueva contraseña, puede acceder y cambiarla.<br /><br />";

$LANG['SEARCH_TITLE'] = "Buscar";
$LANG['KEYWORDS'] = "Palabras clave";
$LANG['COMPANY_SEARCH'] = "Buscar compañía";
$LANG['COMPANY_LIST'] = "Listado de compañías";
$LANG['SENT_RECVD'] = "Enviados / Recibidos";
$LANG['BOTH_SENT_RECVD'] = "Faxes enviados y recibidos";
$LANG['ONLY_MY_SENT'] = "Sólo los faxes que he enviado";
$LANG['ONLY_RECVD'] = "Sólo los faxes recibidos";
$LANG['CONCLUSION'] = "Se han encontrado un total de %d resultados.";
$LANG['NOKEYWORD'] = "No se ha encontrado ningún resultado";

$LANG['SEARCH_WHITEPAGES'] = "Buscar en las Páginas Blancas";

$LANG['PWD_NEEDS_RESET'] = "Su contraseña debe ser modificada antes de que pueda continuar.";
$LANG['PWD_REQUIREMENTS'] = "La contraseña debe ser de al menos ".MIN_PASSWD_SIZE." caracteres.";
$LANG['OPASS'] = "Contraseña Antigua";
$LANG['NPASS'] = "Contraseña Nueva";
$LANG['VPASS'] = "Verificar Contraseña";
$LANG['OPASS_WRONG'] = "La contraseña antigua es incorrecta.";
$LANG['NAME_MISSING'] = "Debe introducir un nombre.";

$LANG['MODIFY_FAXNUMS'] = "Modificar los números de fax de la compañía";
$LANG['MODIFY_EMAILS'] = "Modificar su libreta de direcciones de correos electrónicos";
$LANG['TITLE_FAXNUMS'] = "Números de fax";
$LANG['TITLE_EMAILS'] = "Direcciones de Correo Electrónico";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Detalles de Nuevo Usuario";
$LANG['NEW_USER_MESSAGE'] = "Hola %s,

Este correo electrónico contiene su nombre de usuario y contraseña para acceder a AvantFAX (http://%s)

Nombre de usuario - %s
Contraseña        - %s

Por favor, no responda a este mensaje, pues está generado automáticamente y sólo es de carácter informativo";

$LANG['DIDROUTE_EXISTS'] = "Ruta ya existente";
$LANG['DIDROUTE_NOT_CREATED'] = "La ruta no fue creada";
$LANG['DIDROUTE_NO_ROUTES'] = "No hay rutas DID/DTMF configuradas";
$LANG['DIDROUTE_DOESNT_EXIST'] = "La ruta %s no existe";
$LANG['ADMIN_PRINTER'] = "Impresora";
$LANG['PRINT'] = "Imprimir";

$LANG['ADMIN_DIDROUTE_CREATED'] = "La ruta fue creada";
$LANG['ADMIN_DIDROUTE_DELETED'] = "La ruta fue borrada";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "La ruta fue actualizada";
$LANG['ADMIN_DIDROUTES'] = "DID/DTMF Enrutar grupos";
$LANG['DIDROUTE_ROUTECODE'] = "Dígitos DID/DTMF";
$LANG['DIDROUTE_CATCHALL'] = "Cogerlo todo";
$LANG['ADMIN_CONFDIDROUTING'] = "Configurar DID/DTMF";
$LANG['GROUP'] = "Grupo";

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

$LANG['FAXCAT_NOT_CREATED'] = "La categoría de fax '%s' no ha sido creada";
$LANG['FAXCAT_ALREADY_EXISTS'] = "La categoría de fax '%s' ya existe";

$LANG['FAX_FAILED'] = "Problemas enviando el fax.";
$LANG['FAX_WHY']["done"] = "Hecho";
$LANG['FAX_WHY']["format_failed"] = "formateo fallido";
$LANG['FAX_WHY']["no_formatter"] = "sin formateo";
$LANG['FAX_WHY']["poll_no_document"] = "el envío no es un documento";
$LANG['FAX_WHY']["killed"] = "muerto";
$LANG['FAX_WHY']["rejected"] = "rechazado";
$LANG['FAX_WHY']["blocked"] = "bloqueado";
$LANG['FAX_WHY']["removed"] = "eliminado";
$LANG['FAX_WHY']["timedout"] = "tiempo agotado";
$LANG['FAX_WHY']["poll_rejected"] = "envío rechazado";
$LANG['FAX_WHY']["poll_failed"] = "envío fallido";
$LANG['FAX_WHY']["requeued"] = "reencolado";

$LANG['COMPANY_EXISTS'] = "El nombre de la compañía ya existe";
$LANG['FAXNUMID_NOT_CREATED'] = "No se pudo crear faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "No hay ninguna compañía para este número de fax";
$LANG['CANT_CHANGE_FAXNUM'] = "No puede cambiar un número de fax ya establecido";

$LANG['MODEM_EXISTS'] = "El dispositivo de módem ya existe";
$LANG['MODEM_NOT_CREATED'] = "El dispositivo de módem no ha sido creado";
$LANG['NO_MODEMS_CONFIGURED'] = "No hay ningún módem configurado";
$LANG['MODEM_DOESNT_EXIST'] = "El módem %s no existe";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "La categoría ha sido borrada";
$LANG['ADMIN_FAXCAT_CREATED'] = "La categoría ha sido creada";
$LANG['ADMIN_FAXCAT_UPDATED'] = "La categoría ha sido actualizada";

$LANG['ADMIN_MODEM_CREATED'] = "El módem ha sido creado";
$LANG['ADMIN_MODEM_DELETED'] = "El módem ha sido borrado";
$LANG['ADMIN_MODEM_UPDATED'] = "El módem ha sido actualizado";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Disponible";
$LANG['FAXSEND'] = "Enviando un fax";
$LANG['FAXRECV'] = "Recibiendo un fax";
$LANG['FAXRECVFROM'] = "Recibiendo un fax desde";

$LANG['MODEM_DEVICE'] = "Dispositivo";
$LANG['MODEM_CONTACT'] = "Contacto";
$LANG['MODEM_ALIAS'] = "Alias";

$LANG['COVER_FILE'] = "File name"; // <--- NEW
$LANG['COVER_TITLE'] = "Coverpage Title"; // <--- NEW
$LANG['SELECT_COVERPAGE'] = "Select cover page"; // <--- NEW

$LANG['MISSING_CATEGORY_NAME'] = "Debes introducir un nombre de categoría";
$LANG['MISSING_DEVICE_NAME'] = "Debes introducir un nombre de dispositivo";
$LANG['MISSING_ALIAS_NAME'] = "Debes introducir un alias";
$LANG['MISSING_CONTACT_NAME'] = "Debes introducir un nombre de contacto";
$LANG['MISSING_ROUTE'] = "Debes introducir los dígitos DID/DTMF";

$LANG['MISSING_FILE_NAME'] = "You must enter a file name"; // <----- NEW
$LANG['MISSING_TITLE_NAME'] = "You must enter a title"; // <----- NEW

$LANG['ADMIN_CONFIGURE'] = "Configure..."; // <----- NEW
$LANG['ADMIN_USERS'] = "Usuarios";
$LANG['ADMIN_NEW_USER'] = "Nuevo Usuario";
$LANG['ADMIN_EDIT_USER'] = "Modificar Usuario";
$LANG['ADMIN_DEL_USER'] = "Borrar Usuario";
$LANG['ADMIN_LAST_LOGIN'] = "Último acceso";
$LANG['ADMIN_LAST_IP'] = "Última IP";
$LANG['ADMIN_USER_LIST'] = "Listado de Usuarios";
$LANG['ADMIN_FAXCATS'] = "Categorías de Faxes";
$LANG['ADMIN_CONFMODEMS'] = "Configurar Módems";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Estadísticas";
$LANG['ADMIN_SYSLOGS'] = "Registros del Sistema";
$LANG['ADMIN_SYSFUNC'] = "Funciones del Sistema";
$LANG['ADMIN_NOUSERS'] = "No hay ningún usuario";
$LANG['ADMIN_ACC_ENABLED'] = "Cuenta activa";
$LANG['ADMIN_PWDCYCLE'][] = "Ciclo de caducidad de contraseñas";
$LANG['ADMIN_PWDCYCLE'][] = "Nunca";
$LANG['ADMIN_PWDCYCLE'][] = "Cada 3 Meses";
$LANG['ADMIN_PWDCYCLE'][] = "Cada 6 Meses";
$LANG['ADMIN_PWDEXP'] = "Fecha de caducidad de la contraseña";
$LANG['SUPERUSER'] = "Super usuario";
$LANG['IS_ADMIN'] = "Administrador";
$LANG['USER_CANDEL'] = "El usuario puede borrar faxes";
$LANG['ADMIN_FAXLINES'] = "Líneas de fax visibles";
$LANG['ADMIN_CATEGORIES'] = "Categorías de fax visibles";
$LANG['REBOOT'] = "Reiniciar servidor";
$LANG['SHUTDOWN'] = "Apagar servidor";
$LANG['DOWNLOADARCHIVE'] = "Descargar Archivo";
$LANG['DOWNLOADDB'] = "Descargar Base de datos";
$LANG['PLSWAIT'] = "Por favor, espere";
$LANG['LOGTEXT'] = "Información de acceso";
$LANG['QUESTION_DELUSER'] = "Esta seguro de que desea borrar";

$LANG['TSI_ID'] = "TSI ID";
$LANG['PRIORITY'] = "Prioridad";
$LANG['BLACKLIST'] = "Lista Negra";
$LANG['MODIFY_FAXJOB'] = "Modificar Trabajo";
$LANG['NEW_DESTINATION'] = "Nueva Destinación";
$LANG['SCHEDULE_FAX'] = "Programar entrega";
$LANG['FAX_NUMTRIES'] = "Número de intentos";
$LANG['FAX_KILLTIME'] = "Tiempo máximo de envio";
$LANG['NOW'] = "Ahora";
$LANG['MINUTES'] = "Minutos";
$LANG['HOURS'] = "Horas";
$LANG['DAYS'] = "Días";

$LANG['ADMIN_CONFDYNCONF'] = "Configurar DynamicConfig";
$LANG['DYNCONF_MISSING_CALLID'] = "Debes introducir el CallID";
$LANG['DYNCONF_NOT_CREATED'] = "Regla no creada";
$LANG['DYNCONF_EXISTS'] = "La regla existe";
$LANG['DYNCONF_CALLID'] = "Caller ID";
$LANG['DYNCONF_CREATED'] = "Regla creada";
$LANG['DYNCONF_DELETED'] = "Regla borrada";
$LANG['DYNCONF_UPDATED'] = "Regla actualizada";
$LANG['OPTIONS'] = "Opciones";

$LANG['MUST_CREATE_ROUTES'] = "<a href=\"conf_didroute.php\">Debes crear primero un grupo DID/DTMF</a>";
$LANG['MUST_CREATE_MODEMS'] = "<a href=\"conf_modems.php\">Debes crear primero un  módem</a>";
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">Debes crear primero una categoría</a>";

$LANG['EXPLAIN_CATEGORIES'] = "Las categorías son útiles para organizar los faxes en el AvantFAX Archive. Los usuarios normales solo pueden ver las categorías que se les han sido asignadas.";
$LANG['EXPLAIN_DYNCONF'] = "Las funcionalidades HylaFAX's DynamicConfig y RejectCall son utilizadas para rechazar transmisiones de fax de los que se dedican al SPAM por FAX. Permite introducir el Caller ID del remitente que te gustaría bloquear. Opcionalmente, se puede seleccionar un dispositivo si tu solo quieres bloquear el remitente en ese dispositivo.";
$LANG['EXPLAIN_DIDROUTE'] = "El enrutado DID/DTMF es utilizado para enrutar faxes enviados al hunt group.  HylaFAX debe estar específicamente configurado para esto. Una entrada separada debe ser creada para cada hunt group que tengas la intención de utilizar con AvantFax. El campo de dígitos DID/DTMF es para información del hunt group tal y como ha sido recibida por Hylafax -- típicamente los últimos 3 o 4 dígitos o incluso 10 dígitos del número de Fax. El campo alias es utilizado para describir la localización o propósito del hunt group.  Por ejemplo, Ventas o Soporte para una linea dedicada de fax para esos departamentos.  El campo contacto es para una dirección de email, y cada fax que llega para dicho grupo sera enviado por correo electrónico al Contacto.  El campo Impresora especifica que impresora CUPS/lpr imprimirá el fax.  Los usuarios normales solo puede ver faxes de los hunt groups a los que están asignados.";
$LANG['EXPLAIN_MODEMS'] = "Una entrada de módem debe ser creada para cada dispositivo de modem que tenga intención de utilizar con AvantFAX.  El campo dispositivo es para el nombre del dispositivo tal y como se configura en HylaFax (ttyS0, ttyds01 o boston00). El campo  alias es utilizado para describir la localización o el propósito para el módem.  Por ejemplo, Ventas o Soporte para una linea de fax  dedicada para esos departamentos.  El campo contacto es para una dirección de correo, y cada fax que llega a dicho módem será enviado por correo electrónico al Contacto.  El campo impresora especifica que impresora CUPS/lpr imprimirá el fax.  Los usuarios normales solo pueden fer faxes de los módems a los que están asignados.";
$LANG['EXPLAIN_COVERS'] = "A Cover Page entry must be created for each cover page you intend to use with AvantFAX.  The File field is for the name of the template file found in the images/ folder (ie: cover.ps, custom.ps, or mycover.html). The Title field is used to describe the cover page.  For example: Generic, Sales Dept, Accounting Dept.  Anyone can choose any of the cover pages defined here."; // <--- NEW
$LANG['EXPLAIN_FAX2EMAIL'] = "Fax2Email es para enrutar números de fax individual a una dirección de correo electrónico.  Si tu quieres que los faxes enviados de 18002125555 sean enviados por correo electrónico a sales@yourcompany.com,  debes seleccionar  la compañía en la lista de la izquierda  e introducir la dirección de correo en el campo Email.  El campo Compañía te permite modificar como se mostrara el nombre de la compañía en la libreta de direcciones.  El campo impresora especifica que impresora CUPS/lpr imprimirá el fax.  También, puedes seleccionar una categoría para que se asigne dicha categoría automáticamente al fax.";
$LANG['EXPLAIN_BARCODEROUTE'] = "Barcode based routing is used to route faxes based on the barcode contained in the fax.  Enter the barcode that you want matched to this rule in the Barcode field.  The Alias field is used to describe the purpose for this rule.  For example for a specific service or product.  The Contact field is for an email address, and every fax that arrives for this group will be emailed to the Contact.  The Printer field specifies which CUPS/lpr printer to print the fax on.  Also, you may select a category to automatically categorizing the fax."; // <----- NEW
