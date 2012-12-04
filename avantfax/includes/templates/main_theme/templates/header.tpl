<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$LANG.DIRECTION}">
<head>
<title>- AvantFAX -</title>
<meta http-equiv="Content-Type" content="text/html; {$LANG.ISO}" />
<meta http-equiv="imagetoolbar" content="false" />
<meta name="copyright" content="AvantFAX&reg;" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="description" content="AvantFAX {$AVANTFAX_VERSION}" />
<link rel="alternate" type="application/rss+xml" href="http://www.avantfax.com/rss.php" title="The latest AvantFAX news" />
<link rel="search" type="application/opensearchdescription+xml" href="search.php" title="Archive search" />
<link rel="stylesheet" href="interface.css" type="text/css" />
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css" /><![endif]-->
<link rel="stylesheet" href="css/custom/custom.css" type="text/css" />
<script language="javascript" type="text/javascript" src="js/scriptaculous-js/lib/prototype.js"></script>
<script language="javascript" type="text/javascript" src="js/scriptaculous-js/src/scriptaculous.js"></script>
<script language="javascript" type="text/javascript" src="js/avantfax.js"></script>
<script language="javascript" type="text/javascript" src="js/xhrobject.js"></script>
<script language="javascript" type="text/javascript" src="js/dialog.js"></script>
{$INC_LIST}
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" />
</head>
<body dir="{$LANG.DIRECTION}">
{*include file="dialog.tpl"*}
<div id="nav-top">
	<div id="menu-area">
		<div id="avantfax-logo">
			<a href="index.php" accesskey="a"><img src="images/avantfax-big.png" align="bottom" alt="{$LANG.MENU_INBOX}" title="AvantFAX {$AVANTFAX_VERSION}" /></a>
		</div>
		
		<div id="main-menu">
			<div class="main-menu-item" align="center">
				<a href="inbox.php" accesskey="i" title="{$LANG.MENU_INBOX}" class="main-menu-item"><img src="images/inbox.png" alt="{$LANG.MENU_INBOX}" /><br />
				{$LANG.MENU_INBOX} {if $numfaxesinbox}({$numfaxesinbox}){/if}</a>
			</div>
			<div class="main-menu-item" align="center">
				<a href="sendfax.php" accesskey="s" title="{$LANG.MENU_SENDFAX}" class="main-menu-item"><img src="images/sendfax.png" alt="{$LANG.MENU_SENDFAX}" /><br />
				{$LANG.MENU_SENDFAX}</a>
			</div>
			<div class="main-menu-item" align="center">
				<a href="archive.php" accesskey="a" title="{$LANG.MENU_ARCHIVE}" class="main-menu-item"><img src="images/archive.png" alt="{$LANG.MENU_ARCHIVE}" /><br />
				{$LANG.MENU_ARCHIVE}</a>
			</div>
			<div class="main-menu-item" align="center">
				<a href="outbox.php" accesskey="o" title="{$LANG.MENU_OUTBOX}" class="main-menu-item"><img src="images/outbox.png" alt="{$LANG.MENU_OUTBOX}" /><br />
				{$LANG.MENU_OUTBOX}</a>
			</div>
			<div class="main-menu-item" align="center">
				<a href="addressbook.php" accesskey="c" title="{$LANG.MENU_CONTACTS}" class="main-menu-item"><img src="images/contacts.png" alt="{$LANG.MENU_CONTACTS}" /><br />
				{$LANG.MENU_CONTACTS}</a>
			</div>
		</div>
		
		<div id="menu-right">
			<p><span class="strorange">{$LANG.USER}:</span>&nbsp;{$USER_FULLNAME}</p>
			<p align="center"><a href="settings.php" accesskey="p">{$LANG.BUTTON_SETTINGS}</a> | <a href="logout.php" accesskey="l">{$LANG.BUTTON_LOGOUT}</a></p>
{if $SHOWSERVER_DETAILS}
			<p align="center" class="servername">{$AVANTFAX_SERVERNAME}</p>
{/if}
			<p align="center">{if $SUPERUSER}{html_image file='images/su.gif'}{/if} {if $IS_ADMIN}<a href="admin/">{html_image file='images/config.png'}</a>{/if}</p>
		</div>
	</div>
</div>

<div id="scrollingcontent">
<div id="innerbox">
