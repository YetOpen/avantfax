<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$LANG.DIRECTION}">
<head>
<title>AvantFAX - Admin Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; {$LANG.ISO}" />
<meta http-equiv="imagetoolbar" content="false" />
<meta name="copyright" content="AvantFAX&reg;" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="description" content="AvantFAX {$AVANTFAX_VERSION}" />
<link rel="alternate" type="application/rss+xml" href="http://www.avantfax.com/rss.php" title="The latest AvantFAX news" />
<script language="javascript" type="text/javascript" src="../js/scriptaculous-js/lib/prototype.js"></script>
<script language="javascript" type="text/javascript" src="../js/scriptaculous-js/src/scriptaculous.js"></script>
<script language="javascript" type="text/javascript" src="admin.js"></script>
<link rel="stylesheet" href="admin.css" type="text/css" />
<link rel="stylesheet" href="../css/common.css" type="text/css" />
<link rel="stylesheet" href="../css/forms.css" type="text/css" />
<link rel="stylesheet" href="../css/custom/custom.css" type="text/css" />
{$INC_LIST}
</head>
<body dir="{$LANG.DIRECTION}">

<div id="menu">
	<div class="admin-menu">
		<a href="admin.php">{html_image file='../images/avantfax-sm.png'}</a>
		<p class="servername">{$AVANTFAX_SERVERNAME}</p>
	</div>
	
	<div class="admin-selectmenu">
 	   <select onchange="if ($('menuObj').value) location.href=$('menuObj').value" id="menuObj">
    	<option value"">-- {$LANG.MENU_MENU} --</option>
        <option value="admin.php">{$LANG.ADMIN_DASHBOARD}</option>
        <optgroup label="{$LANG.ADMIN_USERS}">
        <option value="users_list.php">{$LANG.ADMIN_USER_LIST}</option>
        <option value="users.php">{$LANG.ADMIN_NEW_USER}</option>
		</optgroup>
		<optgroup label="{$LANG.ADMIN_CONFIGURE}">
{if $ENABLE_DID_ROUTING}<option value="conf_didroute.php">{$LANG.ADMIN_CONFDIDROUTING}</option>{/if}
        <option value="fax_categories.php">{$LANG.ADMIN_FAXCATS}</option>
        <option value="conf_modems.php">{$LANG.ADMIN_CONFMODEMS}</option>
        <option value="conf_covers.php">{$LANG.ADMIN_CONFCOVERS}</option>
		</optgroup>
     	
        <optgroup label="{$LANG.ADMIN_ROUTING_BY}">
        {if $ENABLE_BARDECODE_SUPPORT}<option value="conf_barcoderoute.php">{$LANG.ADMIN_ROUTEBY_BARCODE_SHORT}</option>{/if}
        
        <option value="fax2email.php">{$LANG.ADMIN_ROUTEBY_SENDER_SHORT}</option>
        </optgroup>
        <option value="">--</option>
        <option value="../inbox.php">{$LANG.MENU_INBOX}</option>
        <option value="../outbox.php">{$LANG.MENU_OUTBOX}</option>
        <option value="">--</option>
        <option value="conf_dynconf.php">{$LANG.ADMIN_CONFDYNCONF}</option>
		<option value="system_func.php">{$LANG.ADMIN_SYSFUNC}</option>
		<option value="system_logs.php">{$LANG.ADMIN_SYSLOGS}</option>
        
       </select>
	</div>
    
    <div class="admin-username">{$LANG.USER}:&nbsp;<strong>{$USER_FULLNAME}</strong>&nbsp;|&nbsp;<a href="logout.php">{$LANG.BUTTON_LOGOUT}</a></div>
</div>

<div id="content">
