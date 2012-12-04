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

$LANGUAGE = "ja";
$LANGUAGE_NAME = "日本語";

$LANG = array();

$LANG['ISO'] = "charset=UTF-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "はい";
$LANG['NO'] = "いいえ";

$LANG['DATE'] = "日付";
$LANG['FROM'] = "発信元";
$LANG['TO'] = "宛先";

$LANG['DATE_START'] = "開始日時";
$LANG['DATE_END'] = "終了日時";

$LANG['TO_PERSON'] = "氏名";
$LANG['TO_COMPANY'] = "会社名";
$LANG['TO_LOCATION'] = "部署名";
$LANG['TO_VOICENUMBER'] = "電話番号";

$LANG['MY_COMPANY'] = "会社名";
$LANG['MY_LOCATION'] = "部署名";
$LANG['MY_VOICENUMBER'] = "電話番号";
$LANG['MY_FAXNUMBER'] = "FAX番号";

$LANG['VIEW_FAX'] = "FAXの閲覧";
$LANG['ROTATE_FAX'] = "FAXの回転";
$LANG['DOWNLOAD_PDF'] = "PDFをダウンロード";
$LANG['DOWNLOAD_TIFF'] = "TIFFをダウンロード";
$LANG['EMAIL_PDF'] = "PDFを電子メールで送信";
$LANG['ADD_NOTE_FAX'] = "コメントの追加";
$LANG['ARCHIVE_FAX'] = "アーカイブに移動";
$LANG['DELETE_FAX'] = "FAXの削除";

$LANG['DELETE_CONFIRM'] = "このファックスを削除してもいいですか？";

$LANG['ASSIGN_CNAME'] = "会社名の設定";
$LANG['ASSIGN_MISSING'] = "会社名を入力してください";
$LANG['ASSIGN_NOTE'] = "このFAXのコメントを更新 / 詳細";
$LANG['ASSIGN_NOTE_SAVED'] = "コメント / 詳細 を保存しました。";
$LANG['ASSIGN_OK'] = "会社名を設定しました。";
$LANG['FAXES'] = "FAX";

$LANG['NAME'] = "名前";
$LANG['DESCRIPTION'] = "詳細";
$LANG['SAVE'] = "保存";
$LANG['DELETE'] = "削除";
$LANG['CANCEL'] = "キャンセル";
$LANG['CREATE'] = "新規作成";
$LANG['EMAIL'] = "電子メール";
$LANG['SELECT'] = "タイトル";
$LANG['CONTACT_SAVED'] = "コンタクトの詳細を保存しました。";
$LANG['CONTACT_DELETED'] = "コンタクトは削除されました。";
$LANG['RUBRICA_SAVED'] = "会社情報は保存されました。";
$LANG['RUBRICA_DELETED'] = "会社の削除";

$LANG['FAX_FILES'] = "FAXデータの選択";
$LANG['FAX_DEST'] = "宛先 FAX 番号";
$LANG['FAX_CPAGE'] = "送信状を使う";
$LANG['FAX_REGARDING'] = "タイトル";
$LANG['FAX_COMMENTS'] = "コメント";
$LANG['FAX_FILETYPES'] = "添付できるファイルは次のファイルタイプです: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "FAXするファイルを選択してください。";
$LANG['FAX_DEST_MISSING'] = "宛先FAX番号を入力してください。";
$LANG['FAX_SUBMITTED'] = "ファックスを送信するために、キューに入れました。<br /> ファックスを送信すると、確認メールを送信します。";
$LANG['FAX_FILESIZE'] = "ファイルサイズがオーバーしました。";
$LANG['FAX_MAXSIZE'] = "ファイルサイズの最大は $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "再びキューに入れる";

$LANG['FUPLOAD_NO_FILE'] = "ファイルがアップロードできません。";
$LANG['FUPLOAD_NOT_ALLOWED'] = "ファイルタイプが見つかりません。";
$LANG['FUPLOAD_OVER_LIMIT'] = "ファイルサイズがオーバーしました。";
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "ファイルサイズが制限を越えました。 (INI)";
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "ファイルサイズが制限を越えました。 (FORM)";
$LANG['FUPLOAD_NOT_COMPLETE'] = "アップロードは完了しませんでした。";
$LANG['FUPLOAD_NO_TEMPDIR'] = "テンポラリディレクトリがありません。";
$LANG['FUPLOAD_CANT_WRITE'] = "アップロードファイルが書き込みできません。";

$LANG['YOUR_NAME'] = "名前";
$LANG['UPDATE'] = "更新";
$LANG['USER_DETAILS_SAVED'] = "ユーザー設定は更新されました。";

$LANG['LANGUAGE'] = "言語";
$LANG['EMAIL_SIG'] = "署名";

$LANG['NEXT_FAX'] = "次の FAX";
$LANG['PREV_FAX'] = "前の FAX";

$LANG['LOGIN_TEXT'] = "ユーザー名とパスワードを入力すると、FAX インターフェイスにアクセスできます。";
$LANG['LOGIN_DISABLED'] = "あなたのアカウントは無効です。  管理者に連絡してください。";
$LANG['LOGIN_INCORRECT'] = "ユーザー名かパスワードは拒否されました。<br />もう一度、入力してください。";
$LANG['LOGIN_ALT_FAILED'] = "Login failed for %s.  Ask your admin to verify that the account exists in AvantFAX."; // <--- NEW
$LANG['ACCESS_DENIED'] = "アクセスは拒否されました。";

$LANG['USERNAME'] = "ユーザー名";
$LANG['PASSWORD'] = "パスワード";
$LANG['USER'] = "ユーザー";
$LANG['BUTTON_LOGIN'] = "ログイン";
$LANG['BUTTON_LOGOUT'] = "ログアウト";
$LANG['BUTTON_SETTINGS'] = "設定";

$LANG['MENU_MENU'] = "メニュー";
$LANG['MENU_INBOX'] = "受信";
$LANG['MENU_OUTBOX'] = "送信";
$LANG['MENU_SENDFAX'] = "FAXの送信";
$LANG['MENU_ARCHIVE'] = "送信履歴";
$LANG['MENU_CONTACTS'] = "アドレス帳";

$LANG['SELECT_ALL_FAXES'] = "Select All Faxes"; // <--- NEW
$LANG['FAXES_PER_PAGE']  = "faxes per page"; // <--- NEW
$LANG['INBOX_SHOW'] = "Inbox - show"; // <--- NEW
$LANG['ARCHIVE_SHOW'] = "Archive - show"; // <--- NEW

$LANG['CONTACT_HEADER_EMAIL'] = "電子メール";
$LANG['CONTACT_HEADER_FAX'] = "FAX";
$LANG['CONTACT_HEADER_COMPANY'] = "会社名";
$LANG['CONTACT_HEADER_NEWFAX'] = "新しい FAX 番号";
$LANG['CONTACT_HEADER_FAXNUM'] = "FAX 番号";
$LANG['NEW_ENTRY'] = "新規入力";
$LANG['UPLOAD_CONTACTS'] = "コンタクトファイルをアップロードする:".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = " %d 件アップロードしました。";
$LANG['UPLOAD_BUTTON'] = "アップロード";

$LANG['SEND_EMAIL_HEADER'] = "FAXを電子メールで転送";
$LANG['EMAIL_RECIPIENTS'] = "電子メール 宛先";
$LANG['MESSAGE_PROMPT'] = "電子メール メッセージ";
$LANG['BUTTON_SEND'] = "送信";
$LANG['SUBJECT'] = "タイトル";
$LANG['PDF_FILENAME'] = "PDF ファイル名";

$LANG['EMAIL_SUCCESS'] = "電子メールを送信しました。";
$LANG['EMAIL_FAILURE'] = "電子メールの送信は失敗しました。";

$LANG['PN_PAGE'] = "ページ";
$LANG['PN_PAGE_UP'] = "ページアップ";
$LANG['PN_PAGE_DN'] = "ページダウン";
$LANG['PN_PAGES'] = "ページ";
$LANG['PN_OF'] = "/";
$LANG['NUM_DIALS'] = "番号";
$LANG['KILL_JOB'] = "削除ジョブ番号：";

$LANG['PROMPT_CLOSEWINDOW'] = "このウインドウを閉じる";

$LANG['LAST_UPDATED'] = "最終更新";
$LANG['BACK'] = "戻る";
$LANG['EDIT'] = "編集";
$LANG['ADD'] = "追加";
$LANG['WARNCAT'] = "カテゴリを選択してください";
$LANG['TITLE'] = "タイトル";
$LANG['CATEGORY'] = "カテゴリ";
$LANG['CATEGORY_NAME'] = "カテゴリ名";

$LANG['LAST_MOD'] = "最終更新：:";

$LANG['MONTHS'] = array("");
$LANG['MONTHS'][] = "１月";
$LANG['MONTHS'][] = "２月";
$LANG['MONTHS'][] = "３月";
$LANG['MONTHS'][] = "４月";
$LANG['MONTHS'][] = "５月";
$LANG['MONTHS'][] = "６月";
$LANG['MONTHS'][] = "７月";
$LANG['MONTHS'][] = "８月";
$LANG['MONTHS'][] = "９月";
$LANG['MONTHS'][] = "１０月";
$LANG['MONTHS'][] = "１１月";
$LANG['MONTHS'][] = "１２月";

$LANG['ERROR_PASS'] = "ユーザを見つけられませんでした。";
$LANG['NEWPASS_MSG'] = "ユーザアカウント:%s にはこのメールアドレスが登録されています。 ユーザー:%s は、新しいパスワードを要求しました。

あなたの新しいパスワード: %s

これが間違いであったならば、新しいパスワードでログインしてください。そして、次にパスワードを以前のものに変更してください。";

$LANG['ADMIN_NEWPASS_MSG'] = "管理者(admin)のパスワードは、 \n\t%s\n にユーザー:%s によってリセットされました。";

$LANG['REGWARN_MAIL'] = "有効な電子メールアドレスを入力してください。";
$LANG['REGWARN_PASS'] = "有効なパスワードを入力してください。スペースは使用できません。".MIN_PASSWD_SIZE." 文字以上で英数字で入力してください。";
$LANG['REGWARN_VPASS2'] = "パスワードが違っています。もう一度入力してください。";
$LANG['REGWARN_USERNAME_INUSE'] = "このユーザー名はすでに使用されています。他のユーザー名にしてください。";

$LANG['USER_UPDATE_ERROR'] = "アカウントの更新はエラーになりました。";
$LANG['PASS_TOO_LONG'] = "パスワードが長いです。";
$LANG['PASS_TOO_SHORT'] = "パスワードが短いです。";
$LANG['PASS_ALREADY_USED'] = "このパスワードはすでに使用されています。 もう一度、新しいもので作成してください。";
$LANG['PASS_ERROR_CHANGING'] = "パスワードの更新はエラーになりました。";
$LANG['PASS_ERROR_RESETTING'] = "パスワードのリセットはエラーになりました。";
$LANG['ERROR_SENDING_EMAIL'] = "電子メールの送信は失敗しました。";
$LANG['REGWARN_USERNAME'] = "ユーザー名には、英数字以外の文字は許可されません。";
$LANG['REGWARN_NOUSERNAME'] = "ユーザー名を入力してください。";
$LANG['REGWARN_MAIL_EXISTS'] = "電子メールアドレスはすでに使用されています。";

$LANG['LOST_PASSWORD'] = "パスワードをお忘れですか?";

$LANG['PROMPT_UNAME'] = "ユーザー名";
$LANG['PROMPT_PASSWORD'] = "パスワード";
$LANG['PROMPT_CAN_REUSE_PWD'] = "現在のパスワードを使用する";
$LANG['REPLY_TO_FAX'] = "FAXの返信";
$LANG['REPLY_TO_FAX_TIP'] = "オリジナルのファックスは、カバーページの後で送信されます。";
$LANG['PROMPT_EMAIL'] = "電子メールアドレス";
$LANG['BUTTON_SEND_PASS'] = "パスワードの送信";
$LANG['REGISTER_VPASS'] = "パスワードの確認";
$LANG['FIELDS_REQUIRED'] = "アスタリスク(*)が付与されている箇所は、必須です。";

$LANG['NEW_PASS_DESC'] = "電子メールアドレスを入力して、パスワードの送信 ボタンをクリックしてください。<br /><br />入力の電子メールアドレスに、新しいパスワードが送信されます。<br /><br />そして、新しいパスワードでログインしてください。<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "ユーザー名と電子メールアドレスを入力して、「パスワードの送信」 ボタンをクリックしてください。<br /><br />新しいパスワードが送信されます。<br /><br />";
$LANG['RESETTING_PASSWORD'] = "パスワードを登録されている電子メールアドレスに送信しました。<br /><br />新しいパスワードを受信したら、ログインしてパスワードの変更をしてください。<br /><br />";

$LANG['SEARCH_TITLE'] = "検索";
$LANG['KEYWORDS'] = "キーワード";
$LANG['COMPANY_SEARCH'] = "会社検索";
$LANG['COMPANY_LIST'] = "会社リスト";
$LANG['SENT_RECVD'] = "送信 / 受信";
$LANG['BOTH_SENT_RECVD'] = "送信と受信の両方";
$LANG['ONLY_MY_SENT'] = "送信のみ";
$LANG['ONLY_RECVD'] = "受信のみ";
$LANG['CONCLUSION'] = "合計 %d 件見つかりました。";
$LANG['NOKEYWORD'] = "見つかりませんでした。";

$LANG['SEARCH_WHITEPAGES'] = "電話帳検索";

$LANG['PWD_NEEDS_RESET'] = "続けるためには、あなたのパスワードを更新しなければなりません。";
$LANG['PWD_REQUIREMENTS'] = "パスワードは、".MIN_PASSWD_SIZE." 文字以上にしてください。";
$LANG['OPASS'] = "今までのパスワード";
$LANG['NPASS'] = "新しいパスワード";
$LANG['VPASS'] = "もう一度 パスワード";
$LANG['OPASS_WRONG'] = "今までのパスワードが間違っています。";
$LANG['NAME_MISSING'] = "名前が入力されていません。";

$LANG['MODIFY_FAXNUMS'] = "FAX番号の更新";
$LANG['MODIFY_EMAILS'] = "電子メールアドレスの更新";
$LANG['TITLE_FAXNUMS'] = "FAX 番号";
$LANG['TITLE_EMAILS'] = "電子メールアドレス";

$LANG['TITLE_DISTROLIST'] = "宛先リスト";
$LANG['DISTROLIST_NAME'] = "リスト名";
$LANG['DISTROLIST_DELETE'] = "削除リスト";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "この宛先リストを削除しますか?";
$LANG['DISTROLIST_SAVENAME'] = "リスト名の保存";

$LANG['CHANGES_SAVED'] = "更新しました。";
$LANG['DISTROLIST_DELETED'] = "リストを削除しました。";
$LANG['DISTROLIST_NOT_CREATED'] = "リストは作成されませんでした。";
$LANG['DISTROLIST_EXISTS'] = "リストはすでに存在しています。";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "リスト名を入力してください。";
$LANG['DISTROLIST_ADD'] = "リストの追加";
$LANG['DISTROLIST_REMOVE'] = "リストの削除";
$LANG['DISTROLIST_REFRESH_LIST'] = "リストの更新";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "新規ユーザーの詳細";
$LANG['NEW_USER_MESSAGE'] = "こんにちは %s　さん,

このメールは、AvantFAX (http://%s) にログインするためのユーザー名 と パスワード を送信します。

ユーザー名 - %s
パスワード - %s

自動的に作成して、情報通知のためだけですので、このメッセージに返信しないでください。";

$LANG['DIDROUTE_EXISTS'] = "DID/DTMF ルートはすでに設定されています。";
$LANG['DIDROUTE_NOT_CREATED'] = "DID/DTMF ルートは作成されませんでした。";
$LANG['DIDROUTE_NO_ROUTES'] = "DID/DTMF ルート設定は存在しません。";
$LANG['DIDROUTE_DOESNT_EXIST'] = "DID/DTMF ルート：%s は存在しません。";
$LANG['ADMIN_PRINTER'] = "プリンター";
$LANG['PRINT'] = "印刷";

$LANG['ADMIN_DIDROUTE_CREATED'] = "DID/DTMF ルートは作成されませんでした。";
$LANG['ADMIN_DIDROUTE_DELETED'] = "DID/DTMF ルートは削除されませんでした。";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "DID/DTMF ルートは更新されませんでした。";
$LANG['ADMIN_DIDROUTES'] = "DID/DTMF ルートグループ";
$LANG['DIDROUTE_ROUTECODE'] = "DID/DTMF ルート番号";
$LANG['DIDROUTE_CATCHALL'] = "DID/DTMF ルートキャッチオール";
$LANG['ADMIN_CONFDIDROUTING'] = "DID/DTMF グループ";
$LANG['GROUP'] = "グループ";

$LANG['USER_ANYMODEM'] = "ユーザーはすべてのモデムでFAXを送ることができる";

$LANG['BARCODEROUTE_BARCODE'] = "バーコード";
$LANG['MISSING_BARCODE'] = "バーコードはありません。";
$LANG['ADMIN_BARCODEROUTE_DELETED'] = "バーコードルートは削除しました。";
$LANG['ADMIN_BARCODEROUTE_UPDATED'] = "バーコードルートは更新しました。";
$LANG['ADMIN_BARCODEROUTE_CREATED'] = "バーコードルートは作成されました。";
$LANG['BARCODEROUTE_NOT_CREATED'] = "バーコードルートは作成されませんでした。";
$LANG['BARCODEROUTE_EXISTS'] = "バーコードルートは存在しません。";
$LANG['BARCODEROUTE_NO_ROUTES'] = "バーコードルートはありません。";
$LANG['BARCODEROUTE_DOESNT_EXIST'] = "バーコードルート：%s 存在していません。";

$LANG['FAXCAT_NOT_CREATED'] = "FAX カテゴリ '%s' は、作成されませんでした。";
$LANG['FAXCAT_ALREADY_EXISTS'] = "FAX カテゴリ '%s' は、すでに存在しています。";

$LANG['FAX_FAILED'] = "FAX送信で問題が発生しました。";
$LANG['FAX_WHY']["done"] = "完了";
$LANG['FAX_WHY']["format_failed"] = "フォーマットで失敗しました。";
$LANG['FAX_WHY']["no_formatter"] = "フォーマットが無効です";
$LANG['FAX_WHY']["poll_no_document"] = "送信文章がありません";
$LANG['FAX_WHY']["killed"] = "終了しました";
$LANG['FAX_WHY']["rejected"] = "拒否しました";
$LANG['FAX_WHY']["blocked"] = "ブロックしました";
$LANG['FAX_WHY']["removed"] = "移動しました";
$LANG['FAX_WHY']["timedout"] = "タイムアウト";
$LANG['FAX_WHY']["poll_rejected"] = "送信は拒否されました";
$LANG['FAX_WHY']["poll_failed"] = "送信は失敗しました";
$LANG['FAX_WHY']["requeued"] = "必須";

$LANG['COMPANY_EXISTS'] = "会社名はすでに作成されています。";
$LANG['FAXNUMID_NOT_CREATED'] = "FAX番号を作成できませんでした。";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "このFAX番号の会社がありません。";
$LANG['CANT_CHANGE_FAXNUM'] = "ファックス番号を変えることができません。";

$LANG['MODEM_EXISTS'] = "モデムデバイスは既に存在しています。";
$LANG['MODEM_NOT_CREATED'] = "モデムデバイスは作成されませんでした。";
$LANG['NO_MODEMS_CONFIGURED'] = "モデムは設定されていません。";
$LANG['MODEM_DOESNT_EXIST'] = "モデム：%s は見つかりません。";

$LANG['COVER_EXISTS'] = "Cover page already exists"; // <--- NEW
$LANG['COVER_NOT_CREATED'] = "Cover page was not created"; // <--- NEW
$LANG['NO_COVERS_CONFIGURED'] = "No cover pages configured"; // <--- NEW
$LANG['COVER_DOESNT_EXIST'] = "Cover page %s does not exist"; // <--- NEW

$LANG['ADMIN_FAXCAT_DELETED'] = "カテゴリは削除されました。";
$LANG['ADMIN_FAXCAT_CREATED'] = "カテゴリは作成されました。";
$LANG['ADMIN_FAXCAT_UPDATED'] = "カテゴリは更新されました。";

$LANG['ADMIN_MODEM_CREATED'] = "モデムは作成されませんでした。";
$LANG['ADMIN_MODEM_DELETED'] = "モデムは削除できませんでした。";
$LANG['ADMIN_MODEM_UPDATED'] = "モデムは更新されました。";

$LANG['ADMIN_COVER_CREATED'] = "The cover page was created"; // <--- NEW
$LANG['ADMIN_COVER_DELETED'] = "The cover page was deleted"; // <--- NEW
$LANG['ADMIN_COVER_UPDATED'] = "The cover page was updated"; // <--- NEW

$LANG['FAXFREE'] = "アイドル";
$LANG['FAXSEND'] = "FAX送信中";
$LANG['FAXRECV'] = "FAX受信中";
$LANG['FAXRECVFROM'] = "受信中 FAX の発信元";

$LANG['MODEM_DEVICE'] = "デバイス";
$LANG['MODEM_CONTACT'] = "コンタクト";
$LANG['MODEM_ALIAS'] = "エリアス";

$LANG['COVER_FILE'] = "File name"; // <--- NEW
$LANG['COVER_TITLE'] = "Coverpage Title"; // <--- NEW
$LANG['SELECT_COVERPAGE'] = "Select cover page"; // <--- NEW

$LANG['MISSING_CATEGORY_NAME'] = "カテゴリ名を入力してください。";
$LANG['MISSING_DEVICE_NAME'] = "デバイス名を入力してください。";
$LANG['MISSING_ALIAS_NAME'] = "エリアスを入力してください。";
$LANG['MISSING_CONTACT_NAME'] = "コンタクト名を入力してください。";
$LANG['MISSING_ROUTE'] = "DID/DTMF 番号を入力してください。";

$LANG['MISSING_FILE_NAME'] = "You must enter a file name"; // <----- NEW
$LANG['MISSING_TITLE_NAME'] = "You must enter a title"; // <----- NEW

$LANG['ADMIN_CONFIGURE'] = "設定...";
$LANG['ADMIN_USERS'] = "ユーザー";
$LANG['ADMIN_NEW_USER'] = "新しいユーザー";
$LANG['ADMIN_EDIT_USER'] = "ユーザーの更新";
$LANG['ADMIN_DEL_USER'] = "ユーザーの削除";
$LANG['ADMIN_LAST_LOGIN'] = "最終ログイン";
$LANG['ADMIN_LAST_IP'] = "最終IPアドレス";
$LANG['ADMIN_USER_LIST'] = "ユーザーリスト";
$LANG['ADMIN_FAXCATS'] = "FAX カテゴリ";
$LANG['ADMIN_CONFMODEMS'] = "モデム";
$LANG['ADMIN_CONFCOVERS'] = "Cover Pages"; // <--- NEW

$LANG['ADMIN_ROUTING_BY'] = "送信先設定";
$LANG['ADMIN_ROUTEBY_SENDER'] = "ルートを送信先で並び替え";
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "送信先";
$LANG['ADMIN_ROUTEBY_BARCODE'] = "ルートをバーコードで並び替え";
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "バーコード";
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "ルートをキーワードで並び替え";
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "キーワード";

$LANG['ADMIN_DASHBOARD'] = "ダッシュボード";
$LANG['ADMIN_STATS'] = "統計";
$LANG['ADMIN_SYSLOGS'] = "システムログ";
$LANG['ADMIN_SYSFUNC'] = "システム機能";
$LANG['ADMIN_NOUSERS'] = "ユーザーは作成されませんでした。";
$LANG['ADMIN_ACC_ENABLED'] = "アカウントの有効";
$LANG['ADMIN_PWDCYCLE'][] = "パスワード更新周期";
$LANG['ADMIN_PWDCYCLE'][] = "無期限";
$LANG['ADMIN_PWDCYCLE'][] = "3 ヶ月ごと";
$LANG['ADMIN_PWDCYCLE'][] = "6 ヶ月ごと";
$LANG['ADMIN_PWDEXP'] = "パスワードの有効期限";
$LANG['SUPERUSER'] = "スーパーユーザー";
$LANG['IS_ADMIN'] = "管理者";
$LANG['USER_CANDEL'] = "ユーザーはFAXを削除できる";
$LANG['ADMIN_FAXLINES'] = "FAX回線を閲覧";
$LANG['ADMIN_CATEGORIES'] = "FAXカテゴリを閲覧";
$LANG['REBOOT'] = "サーバーを再起動";
$LANG['SHUTDOWN'] = "サーバーを停止";
$LANG['DOWNLOADARCHIVE'] = "アーカーブのダウンロード";
$LANG['DOWNLOADDB'] = "データベースのダウンロード";
$LANG['PLSWAIT'] = "少々お待ちください";
$LANG['LOGTEXT'] = "ログ情報";
$LANG['QUESTION_DELUSER'] = "本当に削除してよろしいですか？";

$LANG['TSI_ID'] = "発信元情報(TSI信号)";
$LANG['PRIORITY'] = "優先度";
$LANG['BLACKLIST'] = "ブラックリスト";
$LANG['MODIFY_FAXJOB'] = "ジョブの更新";
$LANG['NEW_DESTINATION'] = "新しい宛先";
$LANG['SCHEDULE_FAX'] = "スケジュール送信";
$LANG['FAX_NUMTRIES'] = "リトライ回数";
$LANG['FAX_KILLTIME'] = "終了時間";
$LANG['NOW'] = "現在";
$LANG['MINUTES'] = "分";
$LANG['HOURS'] = "時";
$LANG['DAYS'] = "日";

$LANG['ADMIN_CONFDYNCONF'] = "ブラックリスト";
$LANG['DYNCONF_MISSING_CALLID'] = "発信者番号の入力してください。";
$LANG['DYNCONF_NOT_CREATED'] = "ルールは作成されませんでした。";
$LANG['DYNCONF_EXISTS'] = "ルールはありません。";
$LANG['DYNCONF_CALLID'] = "発信者番号";
$LANG['DYNCONF_CREATED'] = "ルールを作成しました。";
$LANG['DYNCONF_DELETED'] = "ルールを削除しました。";
$LANG['DYNCONF_UPDATED'] = "ルールを更新しました。";
$LANG['OPTIONS'] = "オプション";

$LANG['MUST_CREATE_ROUTES'] = "<a href=\"conf_didroute.php\">最初に DID/DTMF グループを作成してください</a>";
$LANG['MUST_CREATE_MODEMS'] = "<a href=\"conf_modems.php\">最初にモデムを作成してください</a>";
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">最初にカテゴリを作成してください</a>";

$LANG['EXPLAIN_CATEGORIES'] = "カテゴリはAvantFAXアーカイブでファックスを分類することができます。割り当てられたカテゴリで閲覧できるユーザを制限できます。";
$LANG['EXPLAIN_DYNCONF'] = "HylaFAXのDynamicConfigとRejectCallの特徴は、特定の発信者番号からファックスを拒否するのに使用されます。 ブラックリストにエントリーを加えるには、あなたが拒否したい送付者の発信者番号表示を入力してください。 任意のデバイスで拒否したいならば、デバイスを指定できます。";
$LANG['EXPLAIN_DIDROUTE'] = "ハントグループに送られたファックスで、DID/DTMFルーティングを使用できます。適切にHylaFAXを構成する必要があります。AvantFAXで使用するそれぞれのハントグループを作成しなければなりません。 DID/DTMF番号は、HylaFAXによって受信するハントグループ情報です。ハントグループ情報は、通常ファックス番号の通常最後の3ケタか4ケタ、または10ケタを使用します。<br />エリアスは、ハントグループのために場所か目的について説明するのに使用されます。 例えば、部署に割り当てされたファックス回線で、営業部または技術部というように分けるために使用されます。<br />コンタクトは、このモデムの上に届いたファックスを、ここに入力された電子メールアドレスに通知>します。<br />プリンターは、どのCUPS/lprプリンタにファックスを印刷するかを指定します。 ユーザは、割り当てられたハントグループのファックスを見ることができます。";
$LANG['EXPLAIN_MODEMS'] = "AvantFAXで使用するそれぞれのモデムのためにModemエントリーを作成しなければなりません。<br /> デバイスは、HylaFAX(例: ttyS0、ttyds01またはboston00)で構成される、デバイス名称です。<br />エリアスは、モデムの場所か目的についての説明に使用されます。 例えば、部署に割り当てされたファックス回線で、営業部または技術部というように分けるために使用されます。 <br />コンタクトは、このモデムの上に届いたファックスを、ここに入力された電子メールアドレスに通知します。 <br />プリンターは、どのCUPS/lprプリンタにファックスを印刷するかを指定します。 ユーザは割り当てられたモデムからだけファックスを見ることができます。";
$LANG['EXPLAIN_COVERS'] = "A Cover Page entry must be created for each cover page you intend to use with AvantFAX.  The File field is for the name of the template file found in the images/ folder (ie: cover.ps, custom.ps, or mycover.html). The Title field is used to describe the cover page.  For example: Generic, Sales Dept, Accounting Dept.  Anyone can choose any of the cover pages defined here."; // <--- NEW
$LANG['EXPLAIN_FAX2EMAIL'] = "送信先(以前のFax2Email)による設定は、個々のファックス番号を特定のEメールアドレスに送るものです。 sales@yourcompany.com にメールするために0312345678からファックスを送って欲しいなら、あなたは、左のリストで会社を選択して、電子メールフィールドの中に電子メールアドレスを入力しなければなりません。 <br />会社名は、アドレス帳に表示するように、会社名を変更できます。 <br />プリンターは、どのCUPS/lprプリンタにファックスを印刷するかを指定します。 また、あなたは自動的にファックスを分類するのにカテゴリを選択できます。";
$LANG['EXPLAIN_BARCODEROUTE'] = "バーコードベースのルーティングは、ファックスに含まれたバーコードに従いファックスを送信します。<br />あなたがバーコードで、この規則に合わせて欲しいバーコードを入れてください。<br />エリアスは、このルールの目的について説明するのに使用されます。 例えば、特定のサービスか製品等。<br />コンタクトは、このグループ上に届いたファックスを、ここに入力された電子メールアドレスに通知します。<br />プリンターは、どのCUPS/lprプリンタにファックスを印刷するかを指定します。また、あなたは自動的にファックスを分類するのにカテゴリを選択できます。";
