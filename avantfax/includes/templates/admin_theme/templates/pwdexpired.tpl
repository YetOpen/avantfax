<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$LANG.DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={$LANG.ISO}" />
<title>AvantFAX - Admin Login</title>
<link rel="stylesheet" href="admin.css" type="text/css" />
<link rel="stylesheet" href="../css/common.css" type="text/css" />
<link rel="stylesheet" href="../css/forms.css" type="text/css" />
<link rel="stylesheet" href="../css/custom/custom.css" type="text/css" />
<script language="javascript" type="text/javascript" src="../js/scriptaculous-js/lib/prototype.js"></script>
<script language="javascript" type="text/javascript" src="../js/scriptaculous-js/src/scriptaculous.js"></script>
</head>

<body>

<div class="tableForm" style="width:40em; padding-top: 15em">
	<div style="width: 24.5em; margin-left: auto; margin-right:auto">
		{html_image file="../images/avantfax-big.png"}
		<p align="center" class="servername">{$AVANTFAX_SERVERNAME}</p>
	</div>
	<p align="center" style="color:#0000FF">{$LANG.PWD_NEEDS_RESET}</p>
	<br />
	<p align="center">{$LANG.PWD_REQUIREMENTS}</p>
	
	{if $error}<div class="error">{$error}</div>{/if}
	
	<div style="width: 40em; position: relative; float: left; margin-top: 2em">
		<form action="{$smarty.server.SCRIPT_NAME}" method="post">
			<p><label for="oldpwd">{$LANG.OPASS}:</label> <input type="password" name="oldpwd" id="oldpwd" maxlength="{$MAX_PASSWD_SIZE}" style="width: 10em" /></p>
			<br />
			<p><label for="newpwd">{$LANG.NPASS}:</label> <input type="password" name="newpwd" id="newpwd" maxlength="{$MAX_PASSWD_SIZE}" style="width: 10em" /></p>
			<br />
			<p><label for="conpwd">{$LANG.VPASS}:</label> <input type="password" name="conpwd" id="conpwd" maxlength="{$MAX_PASSWD_SIZE}" style="width: 10em" /></p>
			<br />
			<div align="center">
				<input type="submit" value="{$LANG.UPDATE}" class="inputsubmit" style="padding-top: 0.4em" />
				<input type="button" value="{$LANG.CANCEL}" class="inputsubmit inputcancel" style="padding-top: 0.4em" onclick="location.href='admin.php'" />
			</div>
			<input type="hidden" name="_submit_check" value="1" />
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('oldpwd').focus ();
// ]]>
</script>
</body>
</html>