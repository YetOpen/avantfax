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

$LANGUAGE = "el";
$LANGUAGE_NAME = "Greek";

$LANG = array();

$LANG['ISO'] = "charset=utf-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Ναι";
$LANG['NO'] = "Όχι";

$LANG['DATE'] = "Ημερομηνία";
$LANG['FROM'] = "Από";
$LANG['TO'] = "Προς";

$LANG['DATE_START'] = "Από ημερομηνία";
$LANG['DATE_END'] = "Εώς ημερομηνία";

$LANG['TO_PERSON'] = "Υπόψιν";
$LANG['TO_COMPANY'] = "Εταιρία";
$LANG['TO_LOCATION'] = "Τοποθεσία";
$LANG['TO_VOICENUMBER'] = "Αριθμός τηλεφώνου";

$LANG['MY_COMPANY'] = "Εταιρία";
$LANG['MY_LOCATION'] = "Τοποθεσία";
$LANG['MY_VOICENUMBER'] = "Αριθμός τηλεφώνου";
$LANG['MY_FAXNUMBER'] = "Αριθμός φαξ";

$LANG['VIEW_FAX'] = "Προβολή φαξ";
$LANG['ROTATE_FAX'] = "Περιστροφή φαξ";
$LANG['DOWNLOAD_PDF'] = "Λήψη PDF";
$LANG['DOWNLOAD_TIFF'] = "Λήψη TIFF";
$LANG['EMAIL_PDF'] = "Αποστολή PDF με e-mail";
$LANG['ADD_NOTE_FAX'] = "Προσθήκη σημείωσης";
$LANG['ARCHIVE_FAX'] = "Μεταφορά στο αρχείο";
$LANG['DELETE_FAX'] = "Μόνιμη διαγραφή";

$LANG['DELETE_CONFIRM'] = "Παρακαλώ επιβεβαίωστε ότι θέλετε να διαγραφεί μόνιμα αυτό το φαξ.";

$LANG['ASSIGN_CNAME'] = "Ορισμός ονομασίας εταιρίας";
$LANG['ASSIGN_MISSING'] = "Πρέπει να εισάγετε την ονομασία της εταιρίας";
$LANG['ASSIGN_NOTE'] = "Μεταβολή της περιγραφής ή της σημείωσης αυτού του φαξ";
$LANG['ASSIGN_NOTE_SAVED'] = "Note / description saved.";
$LANG['ASSIGN_OK'] = "Η ονομασία της εταιρίας ορίστηκε επιτυχώς.";
$LANG['FAXES'] = "φαξ";

$LANG['NAME'] = "Όνομα";
$LANG['DESCRIPTION'] = "Περιγραφή";
$LANG['SAVE'] = "Αποθήκευση";
$LANG['DELETE'] = "Διαγραφή";
$LANG['CANCEL'] = "Ακύρωση";
$LANG['CREATE'] = "Δημιουργία";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "Επιλογή";
$LANG['CONTACT_SAVED'] = "Τα στοιχεία επαφής αποθηκεύτηκαν";
$LANG['CONTACT_DELETED'] = "Τα στοιχεία επαφής διαγράφηκαν";
$LANG['RUBRICA_SAVED'] = "Τα στοιχεία της εταιρίας αποθηκεύτηκαν";
$LANG['RUBRICA_DELETED'] = "Τα στοιχεία της εταιρίας διαγράφηκαν";

$LANG['FAX_FILES'] = "Αρχεία που θα σταλούν";
$LANG['FAX_DEST'] = "Αριθμοί φαξ των παραληπτών";
$LANG['FAX_CPAGE'] = "Αποστολή εξωφύλλου";
$LANG['FAX_REGARDING'] = "Σχετ.";
$LANG['FAX_COMMENTS'] = "Σχόλια";
$LANG['FAX_FILETYPES'] = "Μπορείτε να επισυνάψετε μόνο αρχεία: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Πρέπει να επιλέξετε τουλάχιστον ένα αρχείο για να το απόστείλετε με φαξ";
$LANG['FAX_DEST_MISSING'] = "Πρέπει να εισάγετε τουλάχιστον έναν αριθμό φαξ παραλήπτη";
$LANG['FAX_SUBMITTED'] = "Το φαξ σας μπήκε επιτυχώς στην ουρά αποστολής φαξ.<br />Θα λάβετε ένα e-mail για την επιβεβαίωση της αποστολής μόλις το φαξ αποσταλλεί.";
$LANG['FAX_FILESIZE'] = "Το μέγεθος του αρχείο είναι εκτός ορίου.";
$LANG['FAX_MAXSIZE'] = "Το μέγιστο όριο μεγέθους είναι $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notify on requeue"; // <----- NEW

$LANG['FUPLOAD_NO_FILE'] = "No file uploaded"; // <----- NEW
$LANG['FUPLOAD_NOT_ALLOWED'] = "File type is unauthorized"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT'] = "File size is over the limit"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "File size is over the limit (INI)"; // <----- NEW
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "File size is over the limit (FORM)"; // <----- NEW
$LANG['FUPLOAD_NOT_COMPLETE'] = "File not completely uploaded"; // <----- NEW
$LANG['FUPLOAD_NO_TEMPDIR'] = "No temporary directory"; // <----- NEW
$LANG['FUPLOAD_CANT_WRITE'] = "Can't write uploaded file"; // <----- NEW

$LANG['YOUR_NAME'] = "Το όνομα σας";
$LANG['UPDATE'] = "Ανανέωση";
$LANG['USER_DETAILS_SAVED'] = "Οι επιλογές του χρήστη αποθηκεύτηκαν.";

$LANG['LANGUAGE'] = "Γλώσσα";
$LANG['EMAIL_SIG'] = "Υπογραφή e-mail";

$LANG['NEXT_FAX'] = "Επόμενο φαξ";
$LANG['PREV_FAX'] = "Προηγούμενο φαξ";

$LANG['LOGIN_TEXT'] = "Εισάγετε το ονόμα χρήστη και το συνθηματικό για να εισέλθετε.";
$LANG['LOGIN_DISABLED'] = "Ο λογαριασμός σας έχει απενεργοποιηθεί. Παρακαλώ επικοινωνήστε με τον διαχειριστή του συστήματος.";
$LANG['LOGIN_INCORRECT'] = "Λανθασμένο όνομα χρήστη ή συνθηματικό. Παρακαλώ δοκιμάστε ξανά.";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "Access denied"; // <----- NEW

$LANG['USERNAME'] = "όνομα χρήστη";
$LANG['PASSWORD'] = "συνθηματικό";
$LANG['USER'] = "Χρήστης";
$LANG['BUTTON_LOGIN'] = "Είσοδος";
$LANG['BUTTON_LOGOUT'] = "Έξοδος";
$LANG['BUTTON_SETTINGS'] = "Ρυθμίσεις";

$LANG['MENU_MENU'] = "Menu"; // <----- NEW
$LANG['MENU_INBOX'] = "Εισερχόμενα";
$LANG['MENU_OUTBOX'] = "Outbox"; // <--- NEW
$LANG['MENU_SENDFAX'] = "Νέο φαξ";
$LANG['MENU_ARCHIVE'] = "Αρχείο";
$LANG['MENU_CONTACTS'] = "Επαφές";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "e-mail";
$LANG['CONTACT_HEADER_FAX'] = "Φαξ";
$LANG['CONTACT_HEADER_COMPANY'] = "Εταιρία";
$LANG['CONTACT_HEADER_NEWFAX'] = "Νέος αριθμός φαξ";
$LANG['CONTACT_HEADER_FAXNUM'] = "Αριθμός φαξ";
$LANG['NEW_ENTRY'] = "Νέα καταχώρηση";
$LANG['UPLOAD_CONTACTS'] = "Upload contacts file ".CONTACTFILETYPES; // <----- NEW
$LANG['CONTACTS_UPLOADED'] = "Successfully uploaded %d contacts"; // <----- NEW
$LANG['UPLOAD_BUTTON'] = "Upload"; // <----- NEW

$LANG['SEND_EMAIL_HEADER'] = "Προώθηση φαξ μέσω e-mail";
$LANG['EMAIL_RECIPIENTS'] = "e-mail παραληπτών";
$LANG['MESSAGE_PROMPT'] = "Μήνυμα e-mail";
$LANG['BUTTON_SEND'] = "Αποστολή";
$LANG['SUBJECT'] = "Θέμα";
$LANG['PDF_FILENAME'] = "Όνομα αρχείου PDF";

$LANG['EMAIL_SUCCESS'] = "Το e-mail στάλθηκε επιτυχώς.";
$LANG['EMAIL_FAILURE'] = "Η αποστολή email απέτυχε.";

$LANG['PN_PAGE'] = "Σελίδα";
$LANG['PN_PAGE_UP'] = "Προηγούμενη σελίδα";
$LANG['PN_PAGE_DN'] = "Επόμενη σελίδα";
$LANG['PN_PAGES'] = "Σελίδες";
$LANG['PN_OF'] = "από";

$LANG['NUM_DIALS'] = "Dials"; // <--- NEW
$LANG['KILL_JOB'] = "Kill job"; // <--- NEW
$LANG['PROMPT_CLOSEWINDOW'] = "Κλείσιμο παραθύρου";

$LANG['LAST_UPDATED'] = "Τελευταία ανανέωση";
$LANG['BACK'] = "[ Πίσω ]";
$LANG['EDIT'] = "Επεξεργασία";
$LANG['ADD'] = "Προσθήκη";
$LANG['WARNCAT'] = "Παρακαλώ επιλέξτε μια κατηγορία";
$LANG['TITLE'] = "Τίτλος";
$LANG['CATEGORY'] = "Κατηγορία";
$LANG['CATEGORY_NAME'] = "Ονομασία κατηγορίας";

$LANG['LAST_MOD'] = "Τελευταία τροποποίηση από";

$LANG['MONTHS'][] = array ("");
$LANG['MONTHS'][] = "Ιανουάριος";
$LANG['MONTHS'][] = "Φεβρουάριος";
$LANG['MONTHS'][] = "Μάρτιος";
$LANG['MONTHS'][] = "Απρίλιος";
$LANG['MONTHS'][] = "Μάιος";
$LANG['MONTHS'][] = "Ιούνιος";
$LANG['MONTHS'][] = "Ιούλιος";
$LANG['MONTHS'][] = "Αύγουστος";
$LANG['MONTHS'][] = "Σεπτέμβριος";
$LANG['MONTHS'][] = "Οκτώβριος";
$LANG['MONTHS'][] = "Νοέμβριος";
$LANG['MONTHS'][] = "Δεκέμβριος";

$LANG['ERROR_PASS'] = "Δεν βρέθηκε αυτός ο χρήστης.";
$LANG['NEWPASS_MSG'] = "Ο λογαριασμός %s έχει αυτό το email συνδεμένο με ατόν. Ένας χρήστης web από %s ζήτησε την αποστολή νέου συνθηματικού.

Το νέο σας συνθηματικό είναι: %s

Αν η συγκεκριμένη ενέργεια προήλθε από λάθος, εισέλθετε με το νέο σας συνθηματικό και αλλάξτε το σε αυτό που θα θέλατε να έχετε.";

$LANG['ADMIN_NEWPASS_MSG'] = "Το συνθηματικό του διαχειριστή άλλαξε σε:\n\t%s\n από έναν χρήστη από %s";

$LANG['REGWARN_MAIL'] = "Παρακαλώ εισάγετε ένα έγκυρο e-mail.";

$LANG['REGWARN_PASS'] = "Παρακαλώ εισάγετε ένα έγκυρο συνθηματικό. Το συνθηματικό δεν πρέπει να περιέχει κενά, πρέπει να είναι από ".MIN_PASSWD_SIZE." χαρακτήρες και πάνω ενώ πρέπει να περιέχει τουλάχιστον ένα εκ των 0-9, a-z, A-Z..";
$LANG['REGWARN_VPASS2'] = "Το συνθηματικό και η επιβεβαίωση του δεν ταιριάζουν, παρακαλώ δοκιμάστε αργότερα.";
$LANG['REGWARN_USERNAME_INUSE'] = "Αυτό το όνομα χρήστη υπάρχει ήδη. Παρακαλώ δοκιμάστε κάποιο άλλο.";

$LANG['USER_UPDATE_ERROR'] = "Αδυναμία ανανέωσης λογαριασμού";
$LANG['PASS_TOO_LONG'] = "Το συνθηματικό είναι πολύ μακροσκελές";
$LANG['PASS_TOO_SHORT'] = "Το συνθηματικό είναι πολύ σύντομο";
$LANG['PASS_ALREADY_USED'] = "Αυτό το συνθηματικό έχει ξαναχρησιμοποιηθεί. Παρακαλώ δημιουργήστε ένα καινούργιο.";
$LANG['PASS_ERROR_CHANGING'] = "Σφάλμα κατά την αλλαγή κωδικού για τον χρήστη";
$LANG['PASS_ERROR_RESETTING'] = "Σφάλμα κατά την επαναφορά κωδικού για τον χρήστη";

$LANG['ERROR_SENDING_EMAIL'] = "Αποτυχία αποστολής e-mail.";

$LANG['REGWARN_USERNAME'] = "Απαγορεύεται η χρήση μη αλφαριθμητικών χαρακτήρων στο όνομα χρήστη.";
$LANG['REGWARN_NOUSERNAME'] = "You must enter a username";
$LANG['REGWARN_MAIL_EXISTS'] = "Αυτή η διεύθυνση e-mail χρησιμοποείται από άλλον χρήστη.";

$LANG['LOST_PASSWORD'] = "Απώλεια συνθηματικού";

$LANG['PROMPT_UNAME'] = "Όνομα χρήστη";
$LANG['PROMPT_PASSWORD'] = "Συνθηματικό";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Ο χρήστης μπορεί να επαναχρησιμοποιήσει συνθηματικά";
$LANG['REPLY_TO_FAX'] = "Απάντηση φαξ";
$LANG['REPLY_TO_FAX_TIP'] = "Το πρωτότυπο φαξ θα είναι το πρώτο έγγραφο που θα αποσταλλεί μετά το εξώφυλλο";
$LANG['PROMPT_EMAIL'] = "Διεύθυνση e-mail";
$LANG['BUTTON_SEND_PASS'] = "Αποστολή συνθηματικού";
$LANG['REGISTER_VPASS'] = "Επιβεβαίωση συνθηματικού";
$LANG['FIELDS_REQUIRED'] = "Τα σημειωμένα με αστερίσκο (*) πεδία είναι υποχρεωτικά.";

$LANG['NEW_PASS_DESC'] = "Παρακαλώ εισάγετε την διεύθυνση e-mail σας και πατήστε στο κουμπί Αποστολή συνθηματικού.<br /><br />Θα λάβετε ένα νέο συνθηματικό σύντομα το οποίο μπορείτε να χρησιμοποίησετε για την είσοδο σας σε αυτό το περιβάλλον<br /><br />.";
$LANG['NEW_ADMIN_PASS_DESC'] = "Παρακαλώ εισάγετε το όνομα χρήστη και την διεύθυνση e-mail σας και πατήστε στο κουμπί Αποστολή συνθηματικού.<br /><br />Θα λάβετε ένα νέο συνθηματικό σύντομα.<br /><br />.";
$LANG['RESETTING_PASSWORD'] = "Το συνθηματικό σας θα αποστάλλεί στην διεύθυνση e-mail που έχετε εισάγει.<br /><br />Μόλις παραλάβετε το νέο συνθηματικό μπορείτε να εισέλθετε και να το αλλάξετε.<br /><br />";

$LANG['SEARCH_TITLE'] = "Αναζήτηση";
$LANG['KEYWORDS'] = "Λέξεις-κλειδιά";
$LANG['COMPANY_SEARCH'] = "Αναζήτηση εταιρίας";
$LANG['COMPANY_LIST'] = "Λίστα εταιριών";
$LANG['SENT_RECVD'] = "Απεσταλμένα / Ληφθέντα";
$LANG['BOTH_SENT_RECVD'] = "Απεσταλμένα και ληφθέντα φαξ";
$LANG['ONLY_MY_SENT'] = "Μόνο απεσταλμένα φαξ";
$LANG['ONLY_RECVD'] = "Μόνο ληφθέντα φαξ";
$LANG['CONCLUSION'] = "Βρέθηκαν %d αποτελέσματα";
$LANG['NOKEYWORD'] = "Δεν βρέθηκαν αποτελέσματα";

$LANG['SEARCH_WHITEPAGES'] = "Αναζήτηση στους ονομαστικούς καταλόγους";

$LANG['PWD_NEEDS_RESET'] = "Το συνθηματικό σας πρέπει να αλλαχθεί πριν συνεχίσετε.";
$LANG['PWD_REQUIREMENTS'] = "Το συνθηματικό πρέπει να είναι τουλάχιστον ".MIN_PASSWD_SIZE." χαρακτήρες.";
$LANG['OPASS'] = "Παλαιό συνθηματικό";
$LANG['NPASS'] = "Νέο συνθηματικό";
$LANG['VPASS'] = "Επιβεβαίωση συνθηματικού";
$LANG['OPASS_WRONG'] = "Το παλαιό συνθηματικό είναι λανθασμένο.";
$LANG['NAME_MISSING'] = "Πρέπει να εισάγετε ένα όνομα.";

$LANG['MODIFY_FAXNUMS'] = "Επεξεργασία αριθμών φαξ εταιρίας";
$LANG['MODIFY_EMAILS'] = "Επεξεργασία του καταλόγου e-mail";
$LANG['TITLE_FAXNUMS'] = "Αριθμοί Φαξ";
$LANG['TITLE_EMAILS'] = "Διευθύνσεις e-mail";

$LANG['TITLE_DISTROLIST'] = "Λίστες διανομής";
$LANG['DISTROLIST_NAME'] = "Ονομασία λίστας";
$LANG['DISTROLIST_DELETE'] = "Διαγραφή λίστας";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Είστε σίγουρος ότι θέλετε να διαγραφεί αυτή η λίστα;";
$LANG['DISTROLIST_SAVENAME'] = "Αποθήκευση ονομασίας λίστας";

$LANG['CHANGES_SAVED'] = "Οι αλλαγές αποθηκεύτηκαν";
$LANG['DISTROLIST_DELETED'] = "Η λίστα διαγράφηκε";
$LANG['DISTROLIST_NOT_CREATED'] = "Η λίστα δεν δημιουργήθηκε";
$LANG['DISTROLIST_EXISTS'] = "Η λίστα υπάρχει ήδη";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Δώστε ένα όνομα για αυτή τη λίστα";
$LANG['DISTROLIST_ADD'] = "Προσθήκη στοιχείων";
$LANG['DISTROLIST_REMOVE'] = "Διαγραφή στοιχείων";
$LANG['DISTROLIST_REFRESH_LIST'] = "Ανανέωση λίστας";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Στοιχεία νέου χρήστη";
$LANG['NEW_USER_MESSAGE'] = "κ./κα. %s,

Παρακάτω θα βρείτε το όνομα χρήστη και το συνθηματικό σας για την είσοδο στο
περιβάλλον διαχείρισης φαξ AvantFAX (http://%s)

Όνομα χρήστη: %s
Συνθηματικό:  %s

Παρακαλώ μην απαντήσετε σε αυτό το μήνυμα καθώς έχει δημιουργηθεί αυτόματα για ενημερωτικό σκοπό.";

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

$LANG['FAXCAT_NOT_CREATED'] = "Η κατηγορία φαξ '%s' δεν δημιουργήθηκε";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Η κατηγορία φαξ '%s' υπάρχει ήδη";

$LANG['FAX_FAILED'] = "Υπήρξε ένα σφάλμα κατά την αποστολή του φαξ.";
$LANG['FAX_WHY']["done"] = "Έτοιμο";
$LANG['FAX_WHY']["format_failed"] = "η διαμόρφωση απέτυχε";
$LANG['FAX_WHY']["no_formatter"] = "δεν υπάρχει διαμορφωτής";
$LANG['FAX_WHY']["poll_no_document"] = "poll no document";
$LANG['FAX_WHY']["killed"] = "killed";
$LANG['FAX_WHY']["rejected"] = "απορρίφθηκε";
$LANG['FAX_WHY']["blocked"] = "blocked";
$LANG['FAX_WHY']["removed"] = "removed";
$LANG['FAX_WHY']["timedout"] = "το χρονικό όριο εξαντλήθηκε";
$LANG['FAX_WHY']["poll_rejected"] = "poll rejected";
$LANG['FAX_WHY']["poll_failed"] = "poll failed";
$LANG['FAX_WHY']["requeued"] = "requeued";

$LANG['COMPANY_EXISTS'] = "Η ονομασία της εταιρίας υπάρχιε ήδη";
$LANG['FAXNUMID_NOT_CREATED'] = "Αδυναμία δημιουργίας faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Δεν υπάρχει εταιρία για αυτόν τον αριθμό φαξ";
$LANG['CANT_CHANGE_FAXNUM'] = "Δεν μπορείτε να τροποποιήσετε έναν υπάρχοντα αριθμό φαξ";

$LANG['MODEM_EXISTS'] = "Αυτή η συσκευή φαξ modem υπάρχει ήδη";
$LANG['MODEM_NOT_CREATED'] = "Η συσκευή φαξ modem δεν δημιουργήθηκε";
$LANG['NO_MODEMS_CONFIGURED'] = "Δεν έχουν ρυθμιστεί φαξ modems";
$LANG['MODEM_DOESNT_EXIST'] = "Η συσκευή φαξ modem %s δεν υπάρχει";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_CREATED'] = "Η κατηγορία δημιουργήθηκε";
$LANG['ADMIN_FAXCAT_DELETED'] = "Η κατηγορία διαγράφηκε";
$LANG['ADMIN_FAXCAT_UPDATED'] = "Η κατηγορία ανανεώθηκε";

$LANG['ADMIN_MODEM_CREATED'] = "Το φαξ modem δημιουργήθηκε";
$LANG['ADMIN_MODEM_DELETED'] = "Το φαξ modem διαγράφηκε";
$LANG['ADMIN_MODEM_UPDATED'] = "Το φαξ modem ανανεώθηκε";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "Idle";
$LANG['FAXSEND'] = "Αποστολλή φαξ";
$LANG['FAXRECV'] = "Λήψη φαξ";
$LANG['FAXRECVFROM'] = "Λήψη φαξ από";

$LANG['MODEM_DEVICE'] = "Συσκευή";
$LANG['MODEM_CONTACT'] = "Επικοινωνία με";
$LANG['MODEM_ALIAS'] = "Ονομασία";

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
$LANG['ADMIN_USERS'] = "Χρήστες";
$LANG['ADMIN_NEW_USER'] = "Νέος χρήστης";
$LANG['ADMIN_EDIT_USER'] = "Μεταβολή χρήστη";
$LANG['ADMIN_DEL_USER'] = "Διαγραφή χρήστη";
$LANG['ADMIN_LAST_LOGIN'] = "Τελευταία είσοδος";
$LANG['ADMIN_LAST_IP'] = "Τελευταία είσοδος από IP";
$LANG['ADMIN_USER_LIST'] = "Λίστα χρηστών";
$LANG['ADMIN_FAXCATS'] = "Κατηγορίες Φαξ";
$LANG['ADMIN_CONFMODEMS'] = "Ρύθμιση φαξ modems";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "Configure routing by..."; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER'] = "Routing by Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Sender"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Routing by Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Barcode"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Routing by Keyword"; // <----- NEW
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Keyword"; // <----- NEW

$LANG['ADMIN_DASHBOARD'] = "Dashboard"; // <----- NEW
$LANG['ADMIN_STATS'] = "Στατιστικά";
$LANG['ADMIN_SYSLOGS'] = "Αρχεία καταγραφής συστήματος";
$LANG['ADMIN_SYSFUNC'] = "Λειτουργίες συστήματος";
$LANG['ADMIN_NOUSERS'] = "Δεν δημιουργήθηκαν χρήστες";
$LANG['ADMIN_ACC_ENABLED'] = "Ενεργοποιημένος λογαριασμός";
$LANG['ADMIN_PWDCYCLE'][] = "Περίοδος λήξεως συνθηματικού";
$LANG['ADMIN_PWDCYCLE'][] = "Ποτέ";
$LANG['ADMIN_PWDCYCLE'][] = "Κάθε 3 μήνες";
$LANG['ADMIN_PWDCYCLE'][] = "Κάθε 6 μήνες";
$LANG['ADMIN_PWDEXP'] = "Ημερομηνία λήξεως συνθηματικού";
$LANG['SUPERUSER'] = "Υπερχρήστης";
$LANG['IS_ADMIN'] = "Administrator"; // <----- NEW
$LANG['USER_CANDEL'] = "Δικαιώμα διαγραφής φαξ";
$LANG['ADMIN_FAXLINES'] = "Προβολή γραμμών φαξ";
$LANG['ADMIN_CATEGORIES'] = "Προβολή κατηγοριών φαξ";
$LANG['REBOOT'] = "Επανεκκίνηση διακομιστή";
$LANG['SHUTDOWN'] = "Τερματισμός διακομιστή";
$LANG['DOWNLOADARCHIVE'] = "Download Archive";
$LANG['DOWNLOADDB'] = "Download Database";
$LANG['PLSWAIT'] = "Παρακαλώ περιμένετε";
$LANG['LOGTEXT'] = "Πληροφορίες καταγραφής";
$LANG['QUESTION_DELUSER'] = "Είστε σίγουρος ότι θέλετε να διαγράψετε τον χρήστη";

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
