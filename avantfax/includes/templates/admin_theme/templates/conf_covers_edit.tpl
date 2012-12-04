{include file="minheader.tpl"}
{if $message}
<div class="success" align="center">
	<br />{$message}<br /><br />
	<input type="button" class="inputsubmit" value="{$LANG.BACK}" onclick="parent.location.href='conf_covers.php'" />
	<br /><br />
</div>
{else}

{if $error}<div class="error" align="center">{$error}</div>{/if}

<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<div class="miniTableForm">
	<p><label for="title">{$LANG.COVER_TITLE}{required}:</label> <input type="text" name="title" id="title" value="{$fvalues.title}" /></p>
	<p><label for="file">{$LANG.COVER_FILE}{required}:</label> <input type="text" name="file" id="file" value="{$fvalues.file}" /></p>
</div>

<br />

<div align="center">
{if $create}
	<input type="submit" class="inputsubmit" name="create" value="{$LANG.CREATE}" />
{else}
	<input type="hidden" name="cover_id" value="{$fvalues.cover_id}" />
	<input type="submit" class="inputsubmit" name="save" value="{$LANG.SAVE}" />&nbsp;
	<input type="submit" class="inputsubmit inputcancel" name="delete" value="{$LANG.DELETE}" />
	<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="location.href='{$smarty.server.SCRIPT_NAME}'" />
{/if}
</div>
<input type="hidden" name="_submit_check" value="1" />
</form>
<script type="text/javascript" language="javascript">
// <![CDATA[
	$('device').focus();
// ]]>
</script>
{/if}
</body>
</html>
