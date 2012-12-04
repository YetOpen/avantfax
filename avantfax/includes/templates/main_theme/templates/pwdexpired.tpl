<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$LANG.DIRECTION}">
<head>
<title>- AvantFAX - Login</title>
<meta http-equiv="Content-Type" content="text/html; {$LANG.ISO}" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="imagetoolbar" content="false" />
<meta name="copyright" content="AvantFAX&reg;" />
<meta name="keywords" content="AvantFAX {$AVANTFAX_VERSION}, HylaFAX, faxcover, fax software, faxing software, fax server, network fax" />
<meta name="description" content="Web 2.0 HylaFAX management" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="css/login.css" type="text/css" />
<link rel="stylesheet" href="css/forms.css" type="text/css" />
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css" /><![endif]-->
<link rel="stylesheet" href="css/custom/custom.css" type="text/css" />
<script language="javascript" type="text/javascript" src="js/scriptaculous-js/lib/prototype.js"></script>
<script language="javascript" type="text/javascript" src="js/scriptaculous-js/src/scriptaculous.js"></script>
</head>
<body>

<div id="main">
	<div id="top"></div>
	
	<div id="header">
		<div style="position: relative; float: left">:: AvantFAX ::</div>
		
		<div style="position: relative; float: left; text-align: center; width: 40em; margin-left: auto; margin-right: auto">&nbsp;</div>
		
		<div style="position: relative; float: right; clear: right"><a href="http://www.avantfax.com" target="_blank">{html_image file="images/avantfax-big.png"}</a></div>
	</div>
	
	<div id="content">
		<div style="float:left; position:relative; width: 18em; margin-top: 10em">
			<p>{$LANG.PWD_NEEDS_RESET}<br />{$LANG.PWD_REQUIREMENTS}</p>
			{if $error}<div class="error">{$error}</div>{/if}
		</div>
		
		<div style="height: 35em; background-image: url(images/line.gif); background-repeat:no-repeat; width:4em; position: relative; float: left; margin-left: auto; margin-right:auto; margin-bottom: 1em;"></div>
		
		<div style="width: 18em; position: relative; float: left; margin-top: 10em">
			<form action="{$smarty.server.SCRIPT_NAME}" method="post">
				<p><label for="oldpwd">{$LANG.OPASS}:</label><br /><br /><input type="password" name="oldpwd" id="oldpwd" maxlength="{$MAX_PASSWD_SIZE}" style="width: 10em" /></p>
				<br />
				<p><label for="newpwd">{$LANG.NPASS}:</label><br /><br /><input type="password" name="newpwd" id="newpwd" maxlength="{$MAX_PASSWD_SIZE}" style="width: 10em" /></p>
				<br />
				<p><label for="conpwd">{$LANG.VPASS}:</label><br /><br /><input type="password" name="conpwd" id="conpwd" maxlength="{$MAX_PASSWD_SIZE}" style="width: 10em" /></p>
				<br />
				<input type="submit" class="inputsubmit" value="{$LANG.UPDATE}" style="padding-top: 0.4em" />
				<input type="hidden" name="_submit_check" value="1" />
			</form>
		</div>
	</div>
	
	<div id="bottom"></div>
</div>

<script language="javascript" type="text/javascript">
	// <![CDATA[
	$('oldpwd').focus();
	// ]]>
</script>
</body>
</html>