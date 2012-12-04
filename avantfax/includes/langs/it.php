<?php
/**
 * AvantFAX - "Web 2.0" HylaFAX management
 *
 * PHP 5 only
 *
 * @author		David Mimms <david@avantfax.com>
 * @author translation  Diego Pierotto <ita.translations@tiscali.it>
 * @copyright	2005 - 2007 MENTALBARCODE Software, LLC
 * @copyright	2007 - 2008 iFAX Solutions, Inc.
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

$LANGUAGE = "it";
$LANGUAGE_NAME = "Italiano";

$LANG = array();

$LANG['ISO'] = "charset=UTF-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Sì";
$LANG['NO'] = "No";

$LANG['DATE'] = "Data";
$LANG['FROM'] = "Da";
$LANG['TO'] = "A";

$LANG['DATE_START'] = "Data inizio";
$LANG['DATE_END'] = "Data fine";

$LANG['TO_PERSON'] = "Attn.";
$LANG['TO_COMPANY'] = "Attn. Azienda";
$LANG['TO_LOCATION'] = "Per Ufficio";
$LANG['TO_VOICENUMBER'] = "Attn. n° tel";

$LANG['MY_COMPANY'] = "Nome Azienda";
$LANG['MY_LOCATION'] = "Nome Ufficio";
$LANG['MY_VOICENUMBER'] = "N° telefono";
$LANG['MY_FAXNUMBER'] = "N° fax";

$LANG['VIEW_FAX'] = "Mostra Fax";
$LANG['ROTATE_FAX'] = "Ruota Fax";
$LANG['DOWNLOAD_PDF'] = "Scarica PDF";
$LANG['DOWNLOAD_TIFF'] = "Scarica TIFF";
$LANG['EMAIL_PDF'] = "Email PDF";
$LANG['ADD_NOTE_FAX'] = "Aggiungi una descrizione";
$LANG['ARCHIVE_FAX'] = "Sposta in Archivio";
$LANG['DELETE_FAX'] = "Elimina definitivamente";

$LANG['DELETE_CONFIRM'] = "Conferma eliminazione di questo fax.";

$LANG['ASSIGN_CNAME'] = "Associa un nome azienda";
$LANG['ASSIGN_MISSING'] = "Devi inserire un nome azienda";
$LANG['ASSIGN_NOTE'] = "Modifica la descrizione di questo fax";
$LANG['ASSIGN_NOTE_SAVED'] = "La descrizione è stata salvata.";
$LANG['ASSIGN_OK'] = "Il nome azienda è stato registrato.";
$LANG['FAXES'] = "fax";

$LANG['NAME'] = "Nome";
$LANG['DESCRIPTION'] = "Descrizione";
$LANG['SAVE'] = "Salva";
$LANG['DELETE'] = "Elimina";
$LANG['CANCEL'] = "Annulla";
$LANG['CREATE'] = "Crea";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "Scegli";
$LANG['CONTACT_SAVED'] = "L'indirizzo email è stato salvato";
$LANG['CONTACT_DELETED'] = "L'indirizzo email è stato eliminato";
$LANG['RUBRICA_SAVED'] = "Dettagli dell'azienda salvati";
$LANG['RUBRICA_DELETED'] = "Azienda eliminata";

$LANG['FAX_FILES'] = "Scegli il file per il FAX";
$LANG['FAX_DEST'] = "Numeri di fax dei destinatari";
$LANG['FAX_CPAGE'] = "Usa la pagina di copertina";
$LANG['FAX_REGARDING'] = "Oggetto";
$LANG['FAX_COMMENTS'] = "Commenti";
$LANG['FAX_FILETYPES'] = "Puoi allegare soltanto i seguenti tipi di file: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Devi scegliere un file per inviare il FAX";
$LANG['FAX_DEST_MISSING'] = "Devi inserire i numeri di FAX dei destinatari.";
$LANG['FAX_SUBMITTED'] = "Il tuo fax è stato messo nella coda di invio dei fax.<br />Riceverai una email di conferma una volta inviato il fax.";
$LANG['FAX_FILESIZE'] = "Il file è troppo grande.";
$LANG['FAX_MAXSIZE'] = "La dimensione massima è $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notifica il riaccodamento";

$LANG['FUPLOAD_NO_FILE'] = "Nessun file";
$LANG['FUPLOAD_NOT_ALLOWED'] = "Tipo di file non autorizzato";
$LANG['FUPLOAD_OVER_LIMIT'] = "Dimensione del file troppo grande";
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "Dimensione del file troppo grande (INI)";
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "Dimensione del file troppo grande (FORM)";
$LANG['FUPLOAD_NOT_COMPLETE'] = "File non completamente caricato";
$LANG['FUPLOAD_NO_TEMPDIR'] = "Nessuna directory temporanea";
$LANG['FUPLOAD_CANT_WRITE'] = "Impossibile scrivere";

$LANG['YOUR_NAME'] = "Nome";
$LANG['UPDATE'] = "Aggiorna";
$LANG['USER_DETAILS_SAVED'] = "I tuoi dati sono state salvati.";

$LANG['LANGUAGE'] = "Lingua";
$LANG['EMAIL_SIG'] = "Firma automatica";

$LANG['NEXT_FAX'] = "Fax successivo";
$LANG['PREV_FAX'] = "Fax precedente";

$LANG['LOGIN_TEXT'] = "Inserisci nome utente e password per accedere all'interfaccia fax.";
$LANG['LOGIN_DISABLED'] = "Il tuo account è stato disabilitato. Contatta l'amministratore.";
$LANG['LOGIN_INCORRECT'] = "Nome utente o password errati.<br />Prova ancora.";
$LANG['LOGIN_ALT_FAILED'] = "Login non riuscito per %s.  Chiedere all'amministratore di verificare se l'account esiste in AvantFAX.";
$LANG['ACCESS_DENIED'] = "Accesso negato";

$LANG['USERNAME'] = "Nome utente";
$LANG['PASSWORD'] = "Password";
$LANG['USER'] = "Utente";
$LANG['BUTTON_LOGIN'] = "Entra";
$LANG['BUTTON_LOGOUT'] = "Esci";
$LANG['BUTTON_SETTINGS'] = "Opzioni";

$LANG['MENU_MENU'] = "Menu";
$LANG['MENU_INBOX'] = "Ingresso";
$LANG['MENU_OUTBOX'] = "Uscita";
$LANG['MENU_SENDFAX'] = "Invia Fax";
$LANG['MENU_ARCHIVE'] = "Archivio";
$LANG['MENU_CONTACTS'] = "Contatti";

$LANG['SELECT_ALL_FAXES'] = "Seleziona tutti i Fax";
$LANG['FAXES_PER_PAGE']  = "Fax per pagina";
$LANG['INBOX_SHOW'] = "Inbox - mostra";
$LANG['ARCHIVE_SHOW'] = "Archivio - mostra";

$LANG['CONTACT_HEADER_EMAIL'] = "Email";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Azienda";
$LANG['CONTACT_HEADER_NEWFAX'] = "Nuovo numero di fax";
$LANG['CONTACT_HEADER_FAXNUM'] = "Numero di fax";
$LANG['NEW_ENTRY'] = "Nuovo record";
$LANG['UPLOAD_CONTACTS'] = "Scegli il file dei contatti ".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = "Caricati %d nuovi contatti con successo";
$LANG['UPLOAD_BUTTON'] = "Carica";

$LANG['SEND_EMAIL_HEADER'] = "Inoltra fax per email";
$LANG['EMAIL_RECIPIENTS'] = "Email dei destinatari";
$LANG['EMAIL_CCRECIPIENTS'] = "Email dei destinatari (CC)";
$LANG['EMAIL_BCCRECIPIENTS'] = "Email dei destinatari (BCC)";
$LANG['MESSAGE_PROMPT'] = "Messaggio";
$LANG['BUTTON_SEND'] = "Spedisci";
$LANG['SUBJECT'] = "Oggetto";
$LANG['PDF_FILENAME'] = "Nome del file PDF";

$LANG['EMAIL_SUCCESS'] = "L'email è stata inviata.";
$LANG['EMAIL_FAILURE'] = "L'email NON è stata inviata.";

$LANG['PN_PAGE'] = "Pagina";
$LANG['PN_PAGE_UP'] = "Pagina Su";
$LANG['PN_PAGE_DN'] = "Pagina Giù";
$LANG['PN_PAGES'] = "Pagine (Num/Tot)";
$LANG['PN_OF'] = "di";
$LANG['NUM_DIALS'] = "Tentativi (Num/Tot)";
$LANG['KILL_JOB'] = "Annulla fax";

$LANG['PROMPT_CLOSEWINDOW'] = "Chiudi finestra";

$LANG['LAST_UPDATED'] = "Ultima modifica";
$LANG['BACK'] = "[ Indietro ]";
$LANG['EDIT'] = "Modifica";
$LANG['ADD'] = "Aggiungi";
$LANG['WARNCAT'] = "Scegli una categoria";
$LANG['TITLE'] = "Titolo";
$LANG['CATEGORY'] = "Categoria";
$LANG['CATEGORY_NAME'] = "Nome della categoria";

$LANG['LAST_MOD'] = "Ultima modifica da";

$LANG['MONTHS'][] = array ("");
$LANG['MONTHS'][] = "Gennaio";
$LANG['MONTHS'][] = "Febbraio";
$LANG['MONTHS'][] = "Marzo";
$LANG['MONTHS'][] = "Aprile";
$LANG['MONTHS'][] = "Maggio";
$LANG['MONTHS'][] = "Giugno";
$LANG['MONTHS'][] = "Luglio";
$LANG['MONTHS'][] = "Agosto";
$LANG['MONTHS'][] = "Settembre";
$LANG['MONTHS'][] = "Ottobre";
$LANG['MONTHS'][] = "Novembre";
$LANG['MONTHS'][] = "Dicembre";

$LANG['ERROR_PASS'] = "Nessun utente trovato.";
$LANG['NEWPASS_MSG'] = "Questo account %s è associato a questo indirizzo email.  Qualcuno da %s ha appena richiesto una nuova password per questo account.

La nuova password è: %s

Se questa email è stata inviata per sbaglio, accedere al sito e cambiare la password.";

$LANG['ADMIN_NEWPASS_MSG'] = "La nuova password dell'utente admin è:\n\t%s\ned è stata richiesta da %s";	

$LANG['REGWARN_MAIL'] = "Devi inserire un indirizzo email valido.";
$LANG['REGWARN_PASS'] = "Devi inserire una password valida.  (Nessuno spazio, più di ".MIN_PASSWD_SIZE." caratteri, e solo 0-9, a-z, A-Z)";
$LANG['REGWARN_VPASS2'] = "La password e la password di verifica non sono uguali.";
$LANG['REGWARN_USERNAME_INUSE'] = "L'utente esiste già. Prova un altro nome.";

$LANG['USER_UPDATE_ERROR'] = "Errore salvando l'account";
$LANG['PASS_TOO_LONG'] = "La password è troppo lunga";
$LANG['PASS_TOO_SHORT'] = "La password è troppo corta";
$LANG['PASS_ALREADY_USED'] = "Questa password è già stata usata. Devi crearne una nuova.";
$LANG['PASS_ERROR_CHANGING'] = "Errore cambiando la password per";
$LANG['PASS_ERROR_RESETTING'] = "Errore reimpostando la password per";
$LANG['ERROR_SENDING_EMAIL'] = "Impossibile spedire l'email";
$LANG['REGWARN_USERNAME'] = "Non sono permessi caratteri non-alfanumerici nel nome utente.";
$LANG['REGWARN_NOUSERNAME'] = "Devi inserire un nome utente";
$LANG['REGWARN_MAIL_EXISTS'] = "Questo indirizzo email è già esistente.";

$LANG['LOST_PASSWORD'] = "Hai dimenticato la password?";

$LANG['PROMPT_UNAME'] = "Nome utente";
$LANG['PROMPT_PASSWORD'] = "Password";
$LANG['PROMPT_CAN_REUSE_PWD'] = "L'utente può riutilizzare vecchie password";
$LANG['REPLY_TO_FAX'] = "Inoltra il FAX";
$LANG['REPLY_TO_FAX_TIP'] = "Il fax originale sarà allegato subito dopo la copertina";
$LANG['TITLE_DISTROLIST'] = "Liste di distribuzione";
$LANG['DISTROLIST_NAME'] = "Nome della lista";
$LANG['DISTROLIST_DELETE'] = "Elimina lista";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Eliminare questa lista?";
$LANG['DISTROLIST_SAVENAME'] = "Salva nome lista";

$LANG['CHANGES_SAVED'] = "Cambiamenti salvati";
$LANG['DISTROLIST_DELETED'] = "Lista eliminata";
$LANG['DISTROLIST_NOT_CREATED'] = "La lista non è stata creata";
$LANG['DISTROLIST_EXISTS'] = "Lista già esistente";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Inserisci un nome per la lista";
$LANG['DISTROLIST_ADD'] = "Aggiungi n° fax";
$LANG['DISTROLIST_REMOVE'] = "Elimina n° fax";
$LANG['DISTROLIST_REFRESH_LIST'] = "Aggiorna lista";
$LANG['PROMPT_EMAIL'] = "Indirizzo E-mail";
$LANG['BUTTON_SEND_PASS'] = "Invia Password";
$LANG['REGISTER_VPASS'] = "Verifica Password";
$LANG['FIELDS_REQUIRED'] = "I campi contrasegnati con (*) sono obbligatori.";

$LANG['NEW_PASS_DESC'] = "Inserisci il tuo indirizzo email e clicca su Invia Password.<br /><br />Riceverai una nuova password. Utilizzala per accedere al sito.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Inserisci il tuo nome utente, l'indirizzo email e clicca su Invia Password.<br /><br />Riceverai una nuova password.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "La password è stata inviata all'indirizzo da te fornito.<br /><br />Una volta ricevuta, entra con questa password e cambiala.<br /><br />";

$LANG['SEARCH_TITLE'] = "Cerca";
$LANG['KEYWORDS'] = "Parole chiave";
$LANG['COMPANY_SEARCH'] = "Cerca azienda";
$LANG['COMPANY_LIST'] = "Elenco delle aziende";
$LANG['SENT_RECVD'] = "Spediti / Ricevuti";
$LANG['BOTH_SENT_RECVD'] = "Spediti e ricevuti";
$LANG['ONLY_MY_SENT'] = "Solo i miei fax spediti";
$LANG['ONLY_RECVD'] = "Solo i fax ricevuti";
$LANG['CONCLUSION'] = "Trovati %d resultati.";
$LANG['NOKEYWORD'] = "Nessun resultato trovato";

$LANG['SEARCH_WHITEPAGES'] = "Cerca in Pagine Bianche";

$LANG['PWD_NEEDS_RESET'] = "La password deve essere cambiata prima di continuare.";
$LANG['PWD_REQUIREMENTS'] = "La password deve essere almeno di ".MIN_PASSWD_SIZE." caratteri.";
$LANG['OPASS'] = "Vecchia password";
$LANG['NPASS'] = "Nuova password";
$LANG['VPASS'] = "Verifica password";
$LANG['OPASS_WRONG'] = "La password vecchia è sbagliata.";
$LANG['NAME_MISSING'] = "Devi inserire un nome.";

$LANG['MODIFY_FAXNUMS'] = "Modifica la Rubrica dell'Azienda";
$LANG['MODIFY_EMAILS'] = "Modifica la Rubrica degli Email";
$LANG['TITLE_FAXNUMS'] = "Numeri di Fax";
$LANG['TITLE_EMAILS'] = "Indirizzi Email";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Nuovo utente";
$LANG['NEW_USER_MESSAGE'] = "Salve %s,

Questa email contiene il tuo nome utente e password per accedere ad AvantFAX (http://%s)

Nome utente - %s
Password    - %s

Non rispondere a questa email.  È stata inviata automaticamente ed è solo a scopo informativo.";

$LANG['DIDROUTE_EXISTS'] = "Regola già esistente";
$LANG['DIDROUTE_NOT_CREATED'] = "La regola non è stata creata";
$LANG['DIDROUTE_NO_ROUTES'] = "Nessuna regola creata per DID/DTMF";
$LANG['DIDROUTE_DOESNT_EXIST'] = "La regola %s non esiste";

$LANG['ADMIN_PRINTER'] = "Stampante";
$LANG['PRINT'] = "Stampa";

$LANG['ADMIN_DIDROUTE_CREATED'] = "La regola è stata creata";
$LANG['ADMIN_DIDROUTE_DELETED'] = "La regola è stata eliminata";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "La regola è stata aggiornata";
$LANG['ADMIN_DIDROUTES'] = "Gruppi per DID/DTMF";
$LANG['DIDROUTE_ROUTECODE'] = "Cifre DID/DTMF";
$LANG['DIDROUTE_CATCHALL'] = "Seleziona tutti";
$LANG['ADMIN_CONFDIDROUTING'] = "Configura DID/DTMF";
$LANG['GROUP'] = "Gruppo";

$LANG['USER_ANYMODEM'] = "L'utente può inviare fax da qualsiasi modem";

$LANG['BARCODEROUTE_BARCODE'] = "Codice a barre";
$LANG['MISSING_BARCODE'] = "Il codice a barre non esiste";
$LANG['ADMIN_BARCODEROUTE_DELETED'] = "Il codice a barre è stato eliminato";
$LANG['ADMIN_BARCODEROUTE_UPDATED'] = "La regola del codice a barre è stata aggiornata";
$LANG['ADMIN_BARCODEROUTE_CREATED'] = "La regola del codice a barre è stata creata";
$LANG['BARCODEROUTE_NOT_CREATED'] = "La regola del codice a barre non è stata creata";
$LANG['BARCODEROUTE_EXISTS'] = "La regola del codice a barre è già esistente";
$LANG['BARCODEROUTE_NO_ROUTES'] = "Nessuna regola del codice a barre";
$LANG['BARCODEROUTE_DOESNT_EXIST'] = "La regola del codice a barre %s non esiste";

$LANG['FAXCAT_NOT_CREATED'] = "La categoria di Fax '%s' non è stata creata";
$LANG['FAXCAT_ALREADY_EXISTS'] = "La categoria di Fax '%s' è già esistente";

$LANG['FAX_FAILED'] = "Errore in spedizione del fax.";
$LANG['FAX_WHY']["done"] = "Spedito";
$LANG['FAX_WHY']["format_failed"] = "formato del fax fallito";
$LANG['FAX_WHY']["no_formatter"] = "nessun formattatore";
$LANG['FAX_WHY']["poll_no_document"] = "nessun documento in polling";
$LANG['FAX_WHY']["killed"] = "terminato";
$LANG['FAX_WHY']["rejected"] = "rifiutato";
$LANG['FAX_WHY']["blocked"] = "bloccato";
$LANG['FAX_WHY']["removed"] = "rimosso";
$LANG['FAX_WHY']["timedout"] = "fuori tempo";
$LANG['FAX_WHY']["poll_rejected"] = "polling rifiutato";
$LANG['FAX_WHY']["poll_failed"] = "polling fallito";
$LANG['FAX_WHY']["requeued"] = "rimesso in coda";

$LANG['COMPANY_EXISTS'] = "Azienda già esistente";
$LANG['FAXNUMID_NOT_CREATED'] = "Non posso creare un faxnumId";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Nessuna azienda per questo numero di fax";
$LANG['CANT_CHANGE_FAXNUM'] = "Non puoi cambiare un numero di fax già stabilito";

$LANG['MODEM_EXISTS'] = "Modem già esistente";
$LANG['MODEM_NOT_CREATED'] = "Il modem non è stato creato";
$LANG['NO_MODEMS_CONFIGURED'] = "Nessun modem configurato";
$LANG['MODEM_DOESNT_EXIST'] = "Il modem %s non esiste";

$LANG['COVER_EXISTS'] = "Cover già esistente";
$LANG['COVER_NOT_CREATED'] = "La cover non è stata creata";
$LANG['NO_COVERS_CONFIGURED'] = "Nessuna cover configurata";
$LANG['COVER_DOESNT_EXIST'] = "La Cover %s non esiste";

$LANG['ADMIN_FAXCAT_DELETED'] = "La categoria è stata eliminata";
$LANG['ADMIN_FAXCAT_CREATED'] = "La categoria è stata creata";
$LANG['ADMIN_FAXCAT_UPDATED'] = "La categoria è stata aggiornata";

$LANG['ADMIN_MODEM_CREATED'] = "Il modem è stato creato";
$LANG['ADMIN_MODEM_DELETED'] = "Il modem è stato eliminato";
$LANG['ADMIN_MODEM_UPDATED'] = "Il modem è stato aggiornato";

$LANG['ADMIN_COVER_CREATED'] = "La cover è stata creata";
$LANG['ADMIN_COVER_DELETED'] = "La cover è stata cancellata";
$LANG['ADMIN_COVER_UPDATED'] = "La cover è stata aggiornata";

$LANG['FAXFREE'] = "Libero";
$LANG['FAXSEND'] = "Fax in spedizione";
$LANG['FAXRECV'] = "Fax in ricezione";
$LANG['FAXRECVFROM'] = "Fax in ricezione da";

$LANG['MODEM_DEVICE'] = "Dispositivo";
$LANG['MODEM_CONTACT'] = "Contatto (email)";
$LANG['MODEM_ALIAS'] = "Nome";

$LANG['COVER_FILE'] = "Nome file";
$LANG['COVER_TITLE'] = "Nome Cover";
$LANG['SELECT_COVERPAGE'] = "Seleziona una cover";

$LANG['MISSING_CATEGORY_NAME'] = "Devi inserire un nome categoria";
$LANG['MISSING_DEVICE_NAME'] = "Devi inserire un nome dispositivo";
$LANG['MISSING_ALIAS_NAME'] = "Devi inserire un'alias";
$LANG['MISSING_CONTACT_NAME'] = "Devi inserire un contatto";
$LANG['MISSING_ROUTE'] = "Devi inserire le cifre DID/DTMF";

$LANG['MISSING_FILE_NAME'] = "Immettere un nome di file";
$LANG['MISSING_TITLE_NAME'] = "Immettere un nome";

$LANG['ADMIN_CONFIGURE'] = "Configura...";
$LANG['ADMIN_USERS'] = "Utenti";
$LANG['ADMIN_NEW_USER'] = "Nuovo Utente";
$LANG['ADMIN_EDIT_USER'] = "Modifica Utente";
$LANG['ADMIN_DEL_USER'] = "Elimina Utente";
$LANG['ADMIN_LAST_LOGIN'] = "Ultimo Login";
$LANG['ADMIN_LAST_IP'] = "Ultimo IP";
$LANG['ADMIN_USER_LIST'] = "Elenco Utenti";
$LANG['ADMIN_FAXCATS'] = "Categorie Fax";
$LANG['ADMIN_CONFMODEMS'] = "Configura Modem";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configura regola per...";
$LANG['ADMIN_ROUTEBY_SENDER'] = "Regola per il Mittente";
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Mittente";
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Regola per il codice a barre";
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Codice a barre";
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Regola per parola chiave";
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Paola chiave";

$LANG['ADMIN_DASHBOARD'] = "Bacheca";
$LANG['ADMIN_STATS'] = "Statistiche";
$LANG['ADMIN_SYSLOGS'] = "Eventi di sistema";
$LANG['ADMIN_SYSFUNC'] = "Funzioni di sistema";
$LANG['ADMIN_NOUSERS'] = "Nessun utente creato";
$LANG['ADMIN_ACC_ENABLED'] = "Account attivo";
$LANG['ADMIN_PWDCYCLE'][] = "Ciclo di scadenza della password";
$LANG['ADMIN_PWDCYCLE'][] = "Mai";
$LANG['ADMIN_PWDCYCLE'][] = "Ogni 3 mesi";
$LANG['ADMIN_PWDCYCLE'][] = "Ogni 6 mesi";
$LANG['ADMIN_PWDEXP'] = "Data di scadenza della password";
$LANG['SUPERUSER'] = "Super utente";
$LANG['IS_ADMIN'] = "Amministratore";
$LANG['USER_CANDEL'] = "L'utente può eliminare fax";
$LANG['ADMIN_FAXLINES'] = "Linee di fax visibili";
$LANG['ADMIN_CATEGORIES'] = "Categorie di fax visibili";
$LANG['REBOOT'] = "Riavvia server";
$LANG['SHUTDOWN'] = "Arresta server";
$LANG['DOWNLOADARCHIVE'] = "Scarica Archivio";
$LANG['DOWNLOADDB'] = "Scarica Database";
$LANG['PLSWAIT'] = "Attendere prego";
$LANG['LOGTEXT'] = "Informazione degli eventi";
$LANG['QUESTION_DELUSER'] = "Sei sicuro di eliminare?";

$LANG['TSI_ID'] = "TSI ID";
$LANG['PRIORITY'] = "Priorità";
$LANG['BLACKLIST'] = "Lista Nera";
$LANG['MODIFY_FAXJOB'] = "Modifica Fax";
$LANG['NEW_DESTINATION'] = "Nuova Destinazione";
$LANG['SCHEDULE_FAX'] = "Pianifica consegna";
$LANG['FAX_NUMTRIES'] = "Numero di prove";
$LANG['FAX_KILLTIME'] = "Tempo massimo";
$LANG['NOW'] = "Adesso";
$LANG['MINUTES'] = "Minuti";
$LANG['HOURS'] = "Ore";
$LANG['DAYS'] = "Giorni";

$LANG['ADMIN_CONFDYNCONF'] = "Configura DynamicConfig";
$LANG['DYNCONF_MISSING_CALLID'] = "Devi inserire il CallID";
$LANG['DYNCONF_NOT_CREATED'] = "La regola non è stata creata";
$LANG['DYNCONF_EXISTS'] = "La regola esiste già";
$LANG['DYNCONF_CALLID'] = "Caller ID";
$LANG['DYNCONF_CREATED'] = "La regola è stata creata";
$LANG['DYNCONF_DELETED'] = "La regola è stata eliminata";
$LANG['DYNCONF_UPDATED'] = "La regola è stata aggiornata";
$LANG['OPTIONS'] = "Opzioni";

$LANG['MUST_CREATE_ROUTES'] = "<a href=\"conf_didroute.php\">Devi creare un gruppo per DID/DTMF</a>";
$LANG['MUST_CREATE_MODEMS'] = "<a href=\"conf_modems.php\">Devi configurare un modem</a>";
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">Devi creare una categoria</a>";

$LANG['EXPLAIN_CATEGORIES'] = "Le Categorie sono utili per organizzare i fax all'interno dell'Archivio di AvantFAX.  Agli utenti normali è limitata la visione delle categorie a loro associati.";
$LANG['EXPLAIN_DYNCONF'] = "Le funzioni DynamicConfig e RejectCall di HylaFAX vengono usate per rifiutare la trasmissione di fax da certe persone che offendono.  Inserisci il Caller ID del mittente che vorresti bloccare.  Altrimenti, puoi selezionare un dispositivo solo se vuoi bloccare quella persona su quel determinato dispositivo.";
$LANG['EXPLAIN_DIDROUTE'] = "Il routing DID/DTMF viene usato per instradare i fax inviati a certi gruppi.  HylaFAX deve essere configurato correttamente per farlo funzionare.  Deve essere creato un valore separato per ciascun gruppo che intendi usare con AvantFAX.  Il campo cifre di DID/DTMF viene usato per le informazioni del gruppo così come ricevuto da HylaFAX -- tipicamente le ultime 3 o 4 cifre o anche le 10 cifre del numero del fax. Il campo Alias viene usato per descrivere la posizione oppure lo scopo di un certo gruppo.  Per esempio, Vendite oppure Assistenza per una linea fax dedicata a tali uffici.  Il campo Contatto viene usato per l'indirizzo di posta, e ogni fax che arriva a questo gruppo sarà inoltrato tramite email al Contatto.  Il campo Stampante specifica quale stampante CUPS/lpr usare per stampare il fax.  Gli utenti normali possono solo vedere i fax di certi gruppi a loro associati.";
$LANG['EXPLAIN_MODEMS'] = "Un valore Modem deve essere creato per ciascun dispositivo modem che intendi usare con AvantFAX.  Il campo Dispositivo viene usato per il nome del dispositivo così come configurato in HylaFAX (esempio: ttyS0, ttyds01 oppure boston00). Il campo Alias viene usato per descrivere la posizione oppure lo scopo del modem.  Per esempio, Vendite oppure Assistenza per una linea fax dedicata a tali uffici.  Il campo Contatto viene usato per l'indirizzo di posta, e ogni fax che arriva a questo modem sarà inoltrato tramite email al Contatto.  Il campo Stampante specifica quale stampante CUPS/lpr usare per stampare il fax.  Gli utenti normali possono solo vedere i fax dai modem a loro associati.";
$LANG['EXPLAIN_COVERS'] = "Un nuovo elemento Cover Page deve essere creato per ogni copertina fax che si intende utilizzare con AvantFAX.  Il campo File indica il nome del file di base contenuto nella cartella images/ (ad esempio: cover.ps, custom.ps, o miacopertina.html). Il campo Nome è usato per descrivere la cover.  Ad esempio: Generica, Reparto Vendite, Reparto Contabile. Ciascuno può scegliere ognuna delle cover definite qui.";
$LANG['EXPLAIN_FAX2EMAIL'] = "Fax2Email viene usato per instradare numeri di fax individuali ad uno specifico indirizzo di posta elettronica.  Se vuoi che i fax inviati da 02-123456789 siano inoltrati via email a vendite@nomeazienda.com, devi selezionare l'azienda nell'elenco di sinistra ed inserire l'indirizzo di posta nel campo Email.  Il campo Azienda ti permette di modificare il nome dell'azienda mostrato nella Rubrica.  Il campo Stampante specifica quale stampante CUPS/lpr usare per stampare il fax.  Inoltre, puoi selezionare una categoria per categorizzare automaticamente il fax.";
$LANG['EXPLAIN_BARCODEROUTE'] = "Il codice a barre basato sulle regole viene usato per inoltrare fax basati sui codici a barre contenenti nel fax.  Inserisci il codice a barre che vuoi corrisponda alla regola del campo Codice a barre.  Il campo Alias viene usato per descrivere lo scopo di questa regola.  Per esempio per uno specifico servizio o prodotto.  Il campo Contatto viene usato per l'indirizzo email, e ogni fax che arriva a questo gruppo verrà inoltrato via email al Contatto.  Il campo Stampante specifica quale stampante CUPS/lpr usare per stampare il fax.  Inoltre, puoi selezionare una categoria per categorizzare automaticamente il fax.";
