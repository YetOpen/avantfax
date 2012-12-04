{include file="minheader.tpl"}
{if $message}
<div class="success" align="center">
	<br />{$message}<br /><br />
	<input type="button" class="inputsubmit" value="{$LANG.BACK}" onclick="parent.location.href='fax_categories.php'" />
	<br /><br />
</div>
{else}

{if $error}<div align="center" class="error">{$error}</div>{/if}
<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<div class="miniTableForm">
<p><label for="name">{$LANG.CATEGORY_NAME}{required}:</label> <input type="text" name="name" id="name" value="{$fvalues.name}" /></p>
</div>
<br />
<div align="center">
{if $create}
	<input type="submit" class="inputsubmit" name="create" value="{$LANG.CREATE}" />
{else}
	<input type="submit" class="inputsubmit" name="save" value="{$LANG.SAVE}" />&nbsp;
	<input type="submit" class="inputsubmit inputcancel" name="delete" value="{$LANG.DELETE}" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="location.href='{$smarty.server.SCRIPT_NAME}'" />
	<input type="hidden" name="catid" value="{$fvalues.catid}" />
{/if}
</div>
<input type="hidden" name="_submit_check" value="1" />
</form>
<script type="text/javascript" language="javascript">
// <![CDATA[
	$('name').focus ();
// ]]>
</script>
{/if}
</body>
</html>
