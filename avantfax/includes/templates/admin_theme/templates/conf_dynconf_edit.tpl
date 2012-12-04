{include file="minheader.tpl"}
{if $message}
<div class="success" align="center">
	<br />{$message}<br /><br />
	<input type="button" class="inputsubmit" value="{$LANG.BACK}" onclick="parent.location.href='conf_dynconf.php'" />
	<br /><br />
</div>
{else}

{if $error}<div class="error">{$error}</div>{/if}

<form method="post" action="{$smarty.server.SCRIPT_NAME}">
<div class="miniTableForm">
	<p><label for="callid">{$LANG.DYNCONF_CALLID}{required}:</label> <input type="text" name="callid" id="callid" value="{$fvalues.callid}" /></p>
	<p><label for="device">{$LANG.MODEM_DEVICE}:</label> {html_options name="device" id="device" selected=$fvalues.device options=$modems}</p>
</div>

<br />

<div align="center">
{if $create}
	<input type="submit" class="inputsubmit" name="create" value="{$LANG.CREATE}" />
{else}
	<input type="hidden" name="dynconf_id" value="{$fvalues.dynconf_id}" />
	<input type="submit" class="inputsubmit" name="save" value="{$LANG.SAVE}" />&nbsp;
	<input type="submit" class="inputsubmit inputcancel" name="delete" value="{$LANG.DELETE}" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="location.href='{$smarty.server.SCRIPT_NAME}'" />
{/if}
</div>
<input type="hidden" name="_submit_check" value="1" />
</form>
<script type="text/javascript" language="javascript">
// <![CDATA[
	$('callid').focus ();
// ]]>
</script>
{/if}
</body>
</html>