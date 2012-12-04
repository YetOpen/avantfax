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
 * for AvantFAX 3.3.1
 * translated from en.php, at 14 July 2010
 */

$LANGUAGE = "pt-PT";
$LANGUAGE_NAME = "Português";

$LANG = array ();

$LANG['ISO'] = "charset=UTF-8";

$LANG['DIRECTION'] = "ltr";

$LANG['YES'] = "Sim";
$LANG['NO'] = "Não";

$LANG['DATE'] = "Data";
$LANG['FROM'] = "De";
$LANG['TO'] = "Para";

$LANG['DATE_START'] = "Data de Início";
$LANG['DATE_END'] = "Data de Fim";

$LANG['TO_PERSON'] = "Para pessoa";
$LANG['TO_COMPANY'] = "Para empresa";
$LANG['TO_LOCATION'] = "Para localização";
$LANG['TO_VOICENUMBER'] = "Para telefone";

$LANG['MY_COMPANY'] = "Empresa";
$LANG['MY_LOCATION'] = "Localização";
$LANG['MY_VOICENUMBER'] = "Telefone";
$LANG['MY_FAXNUMBER'] = "Número de Fax";

$LANG['VIEW_FAX'] = "Ver Fax";
$LANG['ROTATE_FAX'] = "Rodar Fax";
$LANG['DOWNLOAD_PDF'] = "Descarregar PDF";
$LANG['DOWNLOAD_TIFF'] = "Descarregar TIFF";
$LANG['EMAIL_PDF'] = "e-mail PDF";
$LANG['ADD_NOTE_FAX'] = "Adicionar uma nota";
$LANG['ARCHIVE_FAX'] = "Mover para o Arquivo";
$LANG['DELETE_FAX'] = "Apagar Permanentemente";

$LANG['DELETE_CONFIRM'] = "Por favor confirme a remoção desse fax.";

$LANG['ASSIGN_CNAME'] = "Associar um nome de empresa";
$LANG['ASSIGN_MISSING'] = "Deve colocar o nome da empresa";
$LANG['ASSIGN_NOTE'] = "Modificar a nota / descrição desse fax";
$LANG['ASSIGN_NOTE_SAVED'] = "Nota / descrição armazenada.";
$LANG['ASSIGN_OK'] = "Nome da empresa foi associado com sucesso.";
$LANG['FAXES'] = "faxes";

$LANG['NAME'] = "Nome";
$LANG['DESCRIPTION'] = "Descrição";
$LANG['SAVE'] = "Armazenar";
$LANG['DELETE'] = "Remover";
$LANG['CANCEL'] = "Cancelar";
$LANG['CREATE'] = "Criar";
$LANG['EMAIL'] = "E-mail";
$LANG['SELECT'] = "Seleccionar";
$LANG['CONTACT_SAVED'] = "Detalhes do Contacto armazenados";
$LANG['CONTACT_DELETED'] = "Contacto removido";
$LANG['RUBRICA_SAVED'] = "Detalhes da empresa armazenados";
$LANG['RUBRICA_DELETED'] = "empresa removida";

$LANG['FAX_FILES'] = "Seleccione os arquivos para o FAX";
$LANG['FAX_DEST'] = "Números de fax de destino";
$LANG['FAX_CPAGE'] = "Usar página de capa";
$LANG['FAX_REGARDING'] = "Considerações";
$LANG['FAX_COMMENTS'] = "Comentários";
$LANG['FAX_FILETYPES'] = "Apenas pode anexar arquivos do tipo: ".SENDFAXFILETYPES;
$LANG['FAX_FILE_MISSING'] = "Deve escolher um arquivo para o fax";
$LANG['FAX_DEST_MISSING'] = "Deve fornecer os números de destino do fax";
$LANG['FAX_SUBMITTED'] = "O seu fax foi enviado para a fila de envio com sucesso.<br />Receberá um e-mail de confirmação assim que o fax for enviado.";
$LANG['FAX_FILESIZE'] = "O tamanho do arquivo ultrapassa o limite.";
$LANG['FAX_MAXSIZE'] = "Tamanho máximo do arquivo é $SF_MAXSIZE";
$LANG['NOTIFY_REQUEUE'] = "Notificar a recolocação em fila";

$LANG['FUPLOAD_NO_FILE'] = "Nenhum ficheiro carregado";
$LANG['FUPLOAD_NOT_ALLOWED'] = "Este tipo de ficheiro não é suportado";
$LANG['FUPLOAD_OVER_LIMIT'] = "O tamanho do ficheiro excede o limite";
$LANG['FUPLOAD_OVER_LIMIT_INI'] = "O tamanho do ficheiro excede o limite (INI)";
$LANG['FUPLOAD_OVER_LIMIT_FORM'] = "O tamanho do ficheiro excede o limite (FORM)";
$LANG['FUPLOAD_NOT_COMPLETE'] = "O ficheiro não foi carregado totalmente";
$LANG['FUPLOAD_NO_TEMPDIR'] = "Não existe o directório temporário";
$LANG['FUPLOAD_CANT_WRITE'] = "O ficheiro carregado não pode ser escrito";

$LANG['YOUR_NAME'] = "Seu nome";
$LANG['UPDATE'] = "Actualizado";
$LANG['USER_DETAILS_SAVED'] = "As configurações do utilizador foram armazenadas.";

$LANG['LANGUAGE'] = "Idioma";
$LANG['EMAIL_SIG'] = "Assinatura do E-mail";

$LANG['NEXT_FAX'] = "Próximo Fax";
$LANG['PREV_FAX'] = "Fax Anterior";

$LANG['LOGIN_TEXT'] = "Insira o nome de utilizador para aceder à interface de fax.";
$LANG['LOGIN_DISABLED'] = "A sua conta foi desabilitada. Por favor contacte o Administrador.";
$LANG['LOGIN_INCORRECT'] = "Nome de utilizador ou senha incorrectas.  Por favor tente novamente.";
$LANG['LOGIN_ALT_FAILED'] = "A entrada falhou para %s. Contacte o Administrador para confirmar se esta conta existe no AvantFAX.";
$LANG['ACCESS_DENIED'] = "Acesso negado";

$LANG['USERNAME'] = "nome de utilizador";
$LANG['PASSWORD'] = "senha";
$LANG['USER'] = "Utilizador";
$LANG['BUTTON_LOGIN'] = "Entrar";
$LANG['BUTTON_LOGOUT'] = "Sair";
$LANG['BUTTON_SETTINGS'] = "Configurações";

$LANG['MENU_MENU'] = "Menú";
$LANG['MENU_INBOX'] = "Caixa de Entrada";
$LANG['MENU_OUTBOX'] = "Caixa de Saída";
$LANG['MENU_SENDFAX'] = "Enviar Fax";
$LANG['MENU_ARCHIVE'] = "Arquivo";
$LANG['MENU_CONTACTS'] = "Contactos";

$LANG['SELECT_ALL_FAXES'] = "Seleccione todos os Faxes";
$LANG['FAXES_PER_PAGE']  = "faxes por página";
$LANG['INBOX_SHOW'] = "Inbox - mostrar";
$LANG['ARCHIVE_SHOW'] = "Arquivo - mostrar";

$LANG['CONTACT_HEADER_EMAIL'] = "e-mail";
$LANG['CONTACT_HEADER_FAX'] = "Fax";
$LANG['CONTACT_HEADER_COMPANY'] = "Empresa";
$LANG['CONTACT_HEADER_NEWFAX'] = "Novo número do fax";
$LANG['CONTACT_HEADER_FAXNUM'] = "Número do fax";
$LANG['NEW_ENTRY'] = "Nova entrada";
$LANG['UPLOAD_CONTACTS'] = "Carregar o ficheiro de contactos".CONTACTFILETYPES;
$LANG['CONTACTS_UPLOADED'] = "%d contactos carregados com sucesso";
$LANG['UPLOAD_BUTTON'] = "Carregar ficheiros";

$LANG['SEND_EMAIL_HEADER'] = "Encaminhar fax via e-mail";
$LANG['EMAIL_RECIPIENTS'] = "Receptores de e-mail";
$LANG['EMAIL_CCRECIPIENTS'] = "Receptores de e-mail (CC)";
$LANG['EMAIL_BCCRECIPIENTS'] = "Receptores de e-mail (BCC)";
$LANG['MESSAGE_PROMPT'] = "Mensagem de e-mail";
$LANG['BUTTON_SEND'] = "Enviar";
$LANG['SUBJECT'] = "Assunto";
$LANG['PDF_FILENAME'] = "nome do arquivo PDF";

$LANG['EMAIL_SUCCESS'] = "O e-mail foi enviado com sucesso.";
$LANG['EMAIL_FAILURE'] = "O e-mail falhou ao enviar.";

$LANG['PN_PAGE'] = "Página";
$LANG['PN_PAGE_UP'] = "Página Acima";
$LANG['PN_PAGE_DN'] = "Página Abaixo";
$LANG['PN_PAGES'] = "Páginas";
$LANG['PN_OF'] = "de";
$LANG['NUM_DIALS'] = "Número de chamadas";
$LANG['KILL_JOB'] = "Terminar tarefa";

$LANG['PROMPT_CLOSEWINDOW'] = "Fechar Janela";

$LANG['LAST_UPDATED'] = "Última actualização";
$LANG['BACK'] = "Voltar";
$LANG['EDIT'] = "Editar";
$LANG['ADD'] = "Adicionar";
$LANG['WARNCAT'] = "Por favor seleccione uma categoria";
$LANG['TITLE'] = "Título";
$LANG['CATEGORY'] = "Categoria";
$LANG['CATEGORY_NAME'] = "Nome da categoria";

$LANG['LAST_MOD'] = "Última modificação por";

$LANG['MONTHS'] = array ("");
$LANG['MONTHS'][] = "Janeiro";
$LANG['MONTHS'][] = "Fevereiro";
$LANG['MONTHS'][] = "Março";
$LANG['MONTHS'][] = "Abril";
$LANG['MONTHS'][] = "Maio";
$LANG['MONTHS'][] = "Junho";
$LANG['MONTHS'][] = "Julho";
$LANG['MONTHS'][] = "Agosto";
$LANG['MONTHS'][] = "Setembro";
$LANG['MONTHS'][] = "Outubro";
$LANG['MONTHS'][] = "Novembro";
$LANG['MONTHS'][] = "Dezembro";

$LANG['ERROR_PASS'] = "Nenhum utilizador foi encontrado.";
$LANG['NEWPASS_MSG'] = "Este e-mail está associado á conta de utilizador %s. Do endereço %s acabou de ser solicitada uma nova senha.

A sua nova senha é : %s

Se foi um engano, insira a senha que acaba de receber e altere para a senha que preferir.";

$LANG['ADMIN_NEWPASS_MSG'] = "A senha desta conta administrativa foi mudada para:\n\t%s\n por um utilizador de %s";

$LANG['REGWARN_MAIL'] = "Por favor entre um e-mail válido.";
$LANG['REGWARN_PASS'] = "Por favor entre uma senha válida.  Sem espaços, com mais que  ".MIN_PASSWD_SIZE.", contidos em 0-9, a-z, A-Z.";
$LANG['REGWARN_VPASS2'] = "A verificação de senha não corresponde, por favor tente novamente.";
$LANG['REGWARN_USERNAME_INUSE'] = "Este nome de utilizador já está em uso. Por favor tente outro.";

$LANG['USER_UPDATE_ERROR'] = "Erro actualizando a conta";
$LANG['PASS_TOO_LONG'] = "Senha muito longa";
$LANG['PASS_TOO_SHORT'] = "Senha muito curta";
$LANG['PASS_ALREADY_USED'] = "Essa senha já foi usada. Por favor crie uma nova.";
$LANG['PASS_ERROR_CHANGING'] = "Erro mudando a senha de";
$LANG['PASS_ERROR_RESETTING'] = "Erro reiniciando a senha de";
$LANG['ERROR_SENDING_EMAIL'] = "Email falhou ao enviar";
$LANG['REGWARN_USERNAME'] = "Caracteres não alfa-numéricos não são permitidos nesse nome de utilizador.";
$LANG['REGWARN_NOUSERNAME'] = "Deve fornecer um nome de utilizador";
$LANG['REGWARN_MAIL_EXISTS'] = "Esse endereço de e-mail já está em uso.";

$LANG['LOST_PASSWORD'] = "Esqueceu a sua senha?";

$LANG['PROMPT_UNAME'] = "Nome de utilizador";
$LANG['PROMPT_PASSWORD'] = "Senha";
$LANG['PROMPT_CAN_REUSE_PWD'] = "Utilizador pode reutilizar senhas";
$LANG['REPLY_TO_FAX'] = "Responder ao FAX";
$LANG['REPLY_TO_FAX_TIP'] = "O fax original será o primeiro documento enviado após a página de capa";
$LANG['PROMPT_EMAIL'] = "Endereço de e-mail";
$LANG['BUTTON_SEND_PASS'] = "Enviar senha";
$LANG['REGISTER_VPASS'] = "Verificar senha";
$LANG['FIELDS_REQUIRED'] = "Campos marcados com um asterisco (*) são obrigatórios.";

$LANG['NEW_PASS_DESC'] = "Por favor coloque o seu endereço de e-mail e então clique no botão de Enviar Senha.<br /><br />Irá receber uma nova senha.  Use essa nova senha para aceder o site.<br /><br />";
$LANG['NEW_ADMIN_PASS_DESC'] = "Coloque o seu nome de utilizador e endereço de e-mail e então clique no botão de Enviar Senha.<br /><br />Irá receber uma nova senha.<br /><br />";
$LANG['RESETTING_PASSWORD'] = "A sua senha será enviada para o endereço de e-mail seleccionado.<br /><br />Assim que receba a nova senha, deverá entrar no sistema e alterá-la.<br /><br />";

$LANG['SEARCH_TITLE'] = "Pesquisar";
$LANG['KEYWORDS'] = "Palavras-Chave";
$LANG['COMPANY_SEARCH'] = "Pesquisar empresa";
$LANG['COMPANY_LIST'] = "Lista de empresas";
$LANG['SENT_RECVD'] = "Enviados / Recebidos";
$LANG['BOTH_SENT_RECVD'] = "Ambos os faxes foram enviados e recebidos";
$LANG['ONLY_MY_SENT'] = "Somente os faxes enviados";
$LANG['ONLY_RECVD'] = "Somente os faxes recebidos";
$LANG['CONCLUSION'] = "Resultado total %d encontrado.";
$LANG['NOKEYWORD'] = "Nenhum resultado foi encontrado";

$LANG['SEARCH_WHITEPAGES'] = "Pesquisar as Páginas Brancas";

$LANG['PWD_NEEDS_RESET'] = "Sua senha deve ser alterada antes que possa continuar.";
$LANG['PWD_REQUIREMENTS'] = "A senha deve ter pelo menos ".MIN_PASSWD_SIZE." caracteres.";
$LANG['OPASS'] = "Senha Antiga";
$LANG['NPASS'] = "Nova Senha";
$LANG['VPASS'] = "Verificar Senha";
$LANG['OPASS_WRONG'] = "Senha antiga está incorrecta.";
$LANG['NAME_MISSING'] = "Deve colocar um nome.";

$LANG['MODIFY_FAXNUMS'] = "Modificar números de fax da empresa";
$LANG['MODIFY_EMAILS'] = "Modificar o seu livro de endereços de e-mail";
$LANG['TITLE_FAXNUMS'] = "Números de Fax";
$LANG['TITLE_EMAILS'] = "Endereços de e-mail";

$LANG['TITLE_DISTROLIST'] = "Listas de Distribuição";
$LANG['DISTROLIST_NAME'] = "Nome da lista";
$LANG['DISTROLIST_DELETE'] = "Remover lista";
$LANG['DISTROLIST_CONFIRM_DELETE'] = "Deseja remover esta lista de distribuição?";
$LANG['DISTROLIST_SAVENAME'] = "Armazenar nome da lista";

$LANG['CHANGES_SAVED'] = "Mudanças armazenadas";
$LANG['DISTROLIST_DELETED'] = "Lista removida";
$LANG['DISTROLIST_NOT_CREATED'] = "Lista não foi criada";
$LANG['DISTROLIST_EXISTS'] = "Lista já existe";
$LANG['DISTROLIST_ENTER_LISTNAME'] = "Coloque um nome para a lista";
$LANG['DISTROLIST_ADD'] = "Adicionar entradas";
$LANG['DISTROLIST_REMOVE'] = "Remover entradas";
$LANG['DISTROLIST_REFRESH_LIST'] = "Actualizar a Lista";

$LANG['NEW_USER_MESSAGE_SUBJECT'] = "Detalhes do Novo Utilizador";
$LANG['NEW_USER_MESSAGE'] = "Olá %s,

Este e-mail contêm o seu nome de utilizador e a sua senha para entrar no AvantFAX (http://%s)

Nome de utilizador - %s
Senha - %s

Por favor não responda a esta mensagem pois ela é gerada automaticamente e apenas para propósitos de informação";

$LANG['DIDROUTE_EXISTS'] = "O caminho já existe";
$LANG['DIDROUTE_NOT_CREATED'] = "O caminho não foi criado";
$LANG['DIDROUTE_NO_ROUTES'] = "O caminho DID/DTMF não foi configurado";
$LANG['DIDROUTE_DOESNT_EXIST'] = "O caminho %s não existe";
$LANG['ADMIN_PRINTER'] = "Impressora";
$LANG['PRINT'] = "Imprimir";

$LANG['ADMIN_DIDROUTE_CREATED'] = "O caminho foi criado";
$LANG['ADMIN_DIDROUTE_DELETED'] = "O caminho foi apagado";
$LANG['ADMIN_DIDROUTE_UPDATED'] = "O caminho foi actualizado";
$LANG['ADMIN_DIDROUTES'] = "Grupo de caminhos DID/DTMF";
$LANG['DIDROUTE_ROUTECODE'] = "Dígitos DID/DTMF";
$LANG['DIDROUTE_CATCHALL'] = "Obter todos";
$LANG['ADMIN_CONFDIDROUTING'] = "Configurar DID/DTMF";
$LANG['GROUP'] = "Grupo";

$LANG['USER_ANYMODEM'] = "O utilizador pode enviar faxes de qualquer modem";

$LANG['BARCODEROUTE_BARCODE'] = "Código de barras";
$LANG['MISSING_BARCODE'] = "Código de barras em falta";
$LANG['ADMIN_BARCODEROUTE_DELETED'] = "O caminho do código de barras foi apagado";
$LANG['ADMIN_BARCODEROUTE_UPDATED'] = "O caminho do código de barras foi corrigido";
$LANG['ADMIN_BARCODEROUTE_CREATED'] = "O caminho do código de barras foi criado";
$LANG['BARCODEROUTE_NOT_CREATED'] = "O caminho do código de barras não foi criado";
$LANG['BARCODEROUTE_EXISTS'] = "O caminho do código de barras já existe";
$LANG['BARCODEROUTE_NO_ROUTES'] = "Não há caminhos para os códigos de barras";
$LANG['BARCODEROUTE_DOESNT_EXIST'] = "O caminho para o código de barras '%s' não existe";

$LANG['FAXCAT_NOT_CREATED'] = "Categoria de fax '%s' não foi criada";
$LANG['FAXCAT_ALREADY_EXISTS'] = "Categoria de fax '%s' já existe";

$LANG['FAX_FAILED'] = "Houve um problema com o envio do fax.";
$LANG['FAX_WHY']["done"] = "Terminado";
$LANG['FAX_WHY']["format_failed"] = "formato falhou";
$LANG['FAX_WHY']["no_formatter"] = "sem formador";
$LANG['FAX_WHY']["poll_no_document"] = "a fila não têm documentos";
$LANG['FAX_WHY']["killed"] = "terminado";
$LANG['FAX_WHY']["rejected"] = "rejeitado";
$LANG['FAX_WHY']["blocked"] = "bloqueado";
$LANG['FAX_WHY']["removed"] = "removido";
$LANG['FAX_WHY']["timedout"] = "tempo esgotado";
$LANG['FAX_WHY']["poll_rejected"] = "rejeitado pela fila";
$LANG['FAX_WHY']["poll_failed"] = "fila falhou";
$LANG['FAX_WHY']["requeued"] = "reagendado";

$LANG['COMPANY_EXISTS'] = "Nome da empresa já existe";
$LANG['FAXNUMID_NOT_CREATED'] = "Não foi possível criar o fax faxnumid";
$LANG['NO_COMPANY_FOR_FAXNUM'] = "Não existe a empresa para esse número de fax";
$LANG['CANT_CHANGE_FAXNUM'] = "Não pode mudar um número de fax estabelecido";

$LANG['MODEM_EXISTS'] = "O dispositivo de modem já existe";
$LANG['MODEM_NOT_CREATED'] = "O dispositivo de modem não foi criado";
$LANG['NO_MODEMS_CONFIGURED'] = "Nenhum modem configurado";
$LANG['MODEM_DOESNT_EXIST'] = "Modem %s não existe";

$LANG['COVER_EXISTS'] = "A página-capa já existe";
$LANG['COVER_NOT_CREATED'] = "A página-capa não foi criada";
$LANG['NO_COVERS_CONFIGURED'] = "Não existem páginas-capa configuradas";
$LANG['COVER_DOESNT_EXIST'] = "A página-capa %s não existe";

$LANG['ADMIN_FAXCAT_DELETED'] = "A categoria foi removida";
$LANG['ADMIN_FAXCAT_CREATED'] = "A categoria foi criada";
$LANG['ADMIN_FAXCAT_UPDATED'] = "A categoria foi actualizada";

$LANG['ADMIN_MODEM_CREATED'] = "O modem foi criado";
$LANG['ADMIN_MODEM_DELETED'] = "O modem foi removido";
$LANG['ADMIN_MODEM_UPDATED'] = "O modem foi actualizado";

$LANG['ADMIN_COVER_CREATED'] = "A página-capa foi criada";
$LANG['ADMIN_COVER_DELETED'] = "A página-capa foi apagada";
$LANG['ADMIN_COVER_UPDATED'] = "A página-capa foi actualizada";

$LANG['FAXFREE'] = "Ocioso";
$LANG['FAXSEND'] = "Enviando um fax";
$LANG['FAXRECV'] = "Recebendo um fax";
$LANG['FAXRECVFROM'] = "Recebendo um fax de";

$LANG['MODEM_DEVICE'] = "Dispositivo";
$LANG['MODEM_CONTACT'] = "Contacto";
$LANG['MODEM_ALIAS'] = "Alcunha";

$LANG['COVER_FILE'] = "Nome do ficheiro";
$LANG['COVER_TITLE'] = "Título da página-capa";
$LANG['SELECT_COVERPAGE'] = "Seleccione a página-capa";

$LANG['MISSING_CATEGORY_NAME'] = "Falta o nome da categoria";
$LANG['MISSING_DEVICE_NAME'] = "Deve fornecer um nome para o dispositivo";
$LANG['MISSING_ALIAS_NAME'] = "Deve fornecer um alcunha";
$LANG['MISSING_CONTACT_NAME'] = "Deve fornecer o nome de um contacto";
$LANG['MISSING_ROUTE'] = "Deve fornecer os dígitos DID/DTMF";

$LANG['MISSING_FILE_NAME'] = "Deve fornecer um nome de ficheiro";
$LANG['MISSING_TITLE_NAME'] = "Deve fornecer um título";

$LANG['ADMIN_CONFIGURE'] = "Configurar...";
$LANG['ADMIN_USERS'] = "Utilizadores";
$LANG['ADMIN_NEW_USER'] = "Novo Utilizador";
$LANG['ADMIN_EDIT_USER'] = "Modificar Utilizador";
$LANG['ADMIN_DEL_USER'] = "Remover Utilizador";
$LANG['ADMIN_LAST_LOGIN'] = "Último Acesso";
$LANG['ADMIN_LAST_IP'] = "Último IP";
$LANG['ADMIN_USER_LIST'] = "Lista de Utilizadores";
$LANG['ADMIN_FAXCATS'] = "Categoria de Faxes";
$LANG['ADMIN_CONFMODEMS'] = "Configurar Modems";
$LANG['ADMIN_CONFCOVERS'] = "Páginas-capa";

$LANG['ADMIN_ROUTING_BY'] = "Configurar o caminho por...";
$LANG['ADMIN_ROUTEBY_SENDER'] = "Encaminhando pelo Remetente";
$LANG['ADMIN_ROUTEBY_SENDER_SHORT'] = "Remetente";
$LANG['ADMIN_ROUTEBY_BARCODE'] = "Encaminhando pelo código de barras";
$LANG['ADMIN_ROUTEBY_BARCODE_SHORT'] = "Código de Barras";
$LANG['ADMIN_ROUTEBY_KEYWORD'] = "Encaminhando por palavra-chave";
$LANG['ADMIN_ROUTEBY_KEYWORD_SHORT'] = "Palavra-chave";

$LANG['ADMIN_DASHBOARD'] = "Écran inicial";
$LANG['ADMIN_STATS'] = "Estatísticas";
$LANG['ADMIN_SYSLOGS'] = "Logs do Sistema";
$LANG['ADMIN_SYSFUNC'] = "Funções do Sistema";
$LANG['ADMIN_NOUSERS'] = "Nenhum utilizador criado";
$LANG['ADMIN_ACC_ENABLED'] = "Conta Activa";
$LANG['ADMIN_PWDCYCLE'][] = "Ciclo de expiração da senha";
$LANG['ADMIN_PWDCYCLE'][] = "Nunca";
$LANG['ADMIN_PWDCYCLE'][] = "A cada 3 Meses";
$LANG['ADMIN_PWDCYCLE'][] = "A cada 6 Meses";
$LANG['ADMIN_PWDEXP'] = "Data de expiração da senha";
$LANG['SUPERUSER'] = "Super Utilizador";
$LANG['IS_ADMIN'] = "Administrador";
$LANG['USER_CANDEL'] = "Utilizador pode remover faxes";
$LANG['ADMIN_FAXLINES'] = "Linhas de fax visíveis";
$LANG['ADMIN_CATEGORIES'] = "Categorias de fax visíveis";
$LANG['REBOOT'] = "Reiniciar o servidor";
$LANG['SHUTDOWN'] = "Desligar o servidor";
$LANG['DOWNLOADARCHIVE'] = "Descarregar o arquivo";
$LANG['DOWNLOADDB'] = "Descarregar a base de dados";
$LANG['PLSWAIT'] = "Por favor aguarde";
$LANG['LOGTEXT'] = "Mensagens do Log";
$LANG['QUESTION_DELUSER'] = "Tem certeza que deseja apagar?";

$LANG['TSI_ID'] = "TSI ID";
$LANG['PRIORITY'] = "Prioridade";
$LANG['BLACKLIST'] = "Lista de excluídos";
$LANG['MODIFY_FAXJOB'] = "Modificar a tarefa";
$LANG['NEW_DESTINATION'] = "Novo destino";
$LANG['SCHEDULE_FAX'] = "Entrega agendada";
$LANG['FAX_NUMTRIES'] = "Número de tentativas";
$LANG['FAX_KILLTIME'] = "Tempo para expirar";
$LANG['NOW'] = "Agora";
$LANG['MINUTES'] = "Minutos";
$LANG['HOURS'] = "Horas";
$LANG['DAYS'] = "Dias";

$LANG['ADMIN_CONFDYNCONF'] = "Configure DynamicConfig";
$LANG['DYNCONF_MISSING_CALLID'] = "Deve fornecer o Call_ID";
$LANG['DYNCONF_NOT_CREATED'] = "Regra não foi criada";
$LANG['DYNCONF_EXISTS'] = "Regra já existe";
$LANG['DYNCONF_CALLID'] = "ID do chamador";
$LANG['DYNCONF_CREATED'] = "Regra criada";
$LANG['DYNCONF_DELETED'] = "Regra criada";
$LANG['DYNCONF_UPDATED'] = "Regra actualizada";
$LANG['OPTIONS'] = "Opções";

$LANG['MUST_CREATE_ROUTES'] = "<a href=\"conf_didroute.php\">Primeiro deve criar um grupo DID/DTMF </a>";
$LANG['MUST_CREATE_MODEMS'] = "<a href=\"conf_modems.php\">Primeiro deve criar um modem</a>";
$LANG['MUST_CREATE_CATEGORIES'] = "<a href=\"fax_categories.php\">Primeiro deve criar uma categoria</a>";

$LANG['EXPLAIN_CATEGORIES'] = "Categorias são úteis para organizar faxes no Arquivo AvantFAX.  Utilizadores normais estão limitados a ver as categorias que lhe estão atribuídas.";
$LANG['EXPLAIN_DYNCONF'] = "HylaFAX's DynamicConfig e RejectCal são propriedades usadas para rejeitar transmissão de faxes de conhecidos perturbadores.  Forneça o Caller ID do remetente que quiser bloquear.  Opcionalmente, pode seleccionar um dispositivo se só quiser bloquear este remetente naquele dispositivo.";
$LANG['EXPLAIN_DIDROUTE'] = "O encaminhamento DID/DTMF é usado para encaminhar faxes enviados para um grupo dedicado.  HylaFAX deve ser devidamente configurado para isto funcionar.  Uma entrada separada deve ser criada para cada grupo dedicado que quiser usar com o AvantFAX.  Os campos de dígitos DID/DTMF  servem para definir a informação do grupo como recebido pelo HylaFAX -- tipicamente os últimos 3 ou 4 dígitos ou mesmo 10 dígitos do número de fax. O campo Alias  é usado para descrever a localização ou propósito do grupo.  Por exemplo, Sales ou Support para uma linha de fax dedicada para aqueles departamentos.  O campo Contact é para um endereço de  e-mail, e cada fax que chegar neste modem será enviado para aquele Contact.  O campo Printer específica qual a impressora CUPS/lpr que irá imprimir o fax.  Utilizadores normais só poderão ver os faxes do grupo dedicado que lhe foi atribuído.";
$LANG['EXPLAIN_MODEMS'] = "Um Modem deve ser criado para cada dispositivo de modem que se quiser usar com o AvantFAX.  O campo Device é usado para o nome do dispositivo como foi configurado no HylaFAX (ex: ttyS0, ttyds01 ou boston00). O campo Alias é usado para descrever a localização ou finalidade do modem, por exemplo, Sales ou Support para uma linha de fax dedicada para aqueles departamentos. O campo Contact é  usado para um endereço de e-mail, e cada fax que chegar naquele modem será enviado para o Contact.  O campo Printer específica qual a impressora CUPS/lpr que irá imprimir o fax. Utilizadores normais só poderão ver os faxes dos modems que lhe foram atribuídos.";
$LANG['EXPLAIN_COVERS'] = "Uma página-capa deve ser criada para cada página-capa que pretenda usar com o AvantFAX. O campo "ficheiro" conterá o nome do ficheiro template encontrado no directório imagens/ (ex.: cover.ps, custom.ps, ou mycover.html). O campo "título" é usado para descrever a página-capa (ex.: Genérico, Dept. de Vendas, Dept. de Contabilidade). Qualquer utilizador pode usar as páginas aqui definidas.";
$LANG['EXPLAIN_FAX2EMAIL'] = "Routing by Sender (outrora Fax2Email) é usado para encaminhar números de fax individuais para endereços de e-mail específicos.  Se quiser que os faxes enviados de 18002125555 sejam enviados para sales@yourcompany.com, deve seleccionar a empresa na lista da esquerda e dar o endereço de mail no campo Email.  O campo Company permite que modifique o nome da empresa que é mostrado no livro de endereços.  O campo Printer específica qual a impressora CUPS/lpr que irá imprimir o fax. Também pode seleccionar uma categoria para classificar automaticamente o fax.";
$LANG['EXPLAIN_BARCODEROUTE'] = "O encaminhamento baseado em código de barras é usado para encaminhar os faxes conforme o código de barras que eles contém.  Indique o código de barras que quiser que defina a regra de pesquisa, no campo Barcode.  O campo Alias é usado para descrever a finalidade desta regra.  Por exemplo,para um produto ou serviço específico.  O campo Contact é usado para um endereço de e-mail, e cada fax que chegar para este grupo será enviado para Contact.  O campo Printer específica qual a impressora CUPS/lpr que irá imprimir o fax.  Também pode seleccionar uma categoria para classificar automaticamente o fax.";
