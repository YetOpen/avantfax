<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={$LANG.ISO}" />
<title>AvantFAX - Admin Login</title>
<link rel="stylesheet" href="admin.css" type="text/css" />
<link rel="stylesheet" href="../css/forms.css" type="text/css" />
<link rel="stylesheet" href="../css/custom/custom.css" type="text/css" />
<script language="javascript" type="text/javascript" src="../js/scriptaculous-js/lib/prototype.js"></script>
<script language="javascript" type="text/javascript" src="../js/scriptaculous-js/src/scriptaculous.js"></script>
</head>

<body>

<div class="tableForm" style="width:40em; padding-top: 15em">
	<form action="{$smarty.server.SCRIPT_NAME}" method="post">
	
	<div style="width: 24.5em; margin-left: auto; margin-right:auto">
		<a href="../">{html_image file="../images/avantfax-big.png"}</a>
		<p align="center"><strong>Admin Login</strong> | {$AVANTFAX_VERSION}</p>
		<p align="center" class="servername">{$AVANTFAX_SERVERNAME}</p>
	</div>
	<br />
	{if $error}<div class="error" align="center">{$error}</div>{/if}
	<p><label for="username">{$LANG.USERNAME}:</label> <input type="text" name="username" id="username" size="20" maxlength="{$MAX_PASSWD_SIZE}" /></p>
	<p><label for="password">{$LANG.PASSWORD}:</label><input type="password" name="password" id="password" size="15" maxlength="{$MAX_PASSWD_SIZE}" /></p>
	<p align="center"><a href="../forgot.php" class="forgot">{$LANG.LOST_PASSWORD}</a></p>
	<br>
	<p align="center"><input type="submit" class="inputsubmit" value="{$LANG.BUTTON_LOGIN}" /></p>
	<input type="hidden" name="_submit_check" value="1" />
	</form>
</div>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('username').focus ();
// ]]>
</script>
</body>
</html>
