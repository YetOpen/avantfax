{include file="header.tpl"}
<h1 align='center'>{$LANG.ADMIN_DEL_USER}</h1>

<div id="main-content">
	<p align="center">{$LANG.QUESTION_DELUSER} {$username}?</p>
	<br />
	<form action="{$smarty.server.SCRIPT_NAME}" method="post">
	<p align="center">
		<input type="submit" class="inputsubmit" id="deluser" value="{$LANG.ADMIN_DEL_USER}" />&nbsp;
		<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="location.href='users.php?uid={$fvalues.uid}'" />
	</p>
	<input type="hidden" name="uid" value="{$fvalues.uid}" />
	<input type="hidden" name="_submit_check" value="1" />
	</form>
</div>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('deluser').focus ();
// ]]>
</script>
{include file="footer.tpl"}