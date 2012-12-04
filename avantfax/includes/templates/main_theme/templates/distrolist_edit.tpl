{include file="minheader.tpl"}
{if $message}
<div class="success">
	<p align="center">{$message}</p>
	<br />
	<div align="center">
		<input type="button" value="{$LANG.BACK}" class="inputsubmit" onclick="parent.location.href='distrolist.php'" />
	</div>
</div>	
{else}

{if $create}<div align="center">{$LANG.NEW_ENTRY}</div>{/if}

<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<div align="center">

{if !$fvalues.dl_id}
	<br />
	<p><label for="dlname">{$LANG.DISTROLIST_NAME}:</label> <input type="text" name="dlname" id="dlname" value="{$fvalues.dlname}" size="25" maxlength="100" /></p>
	<br />
	<input type="submit" name="create" value="{$LANG.CREATE}" />
{else}

	<p><label for="dlname">{$LANG.DISTROLIST_NAME}:</label> <input type="text" name="dlname" id="dlname" value="{$fvalues.dlname}" size="25" maxlength="100" />
	&nbsp;<input type="submit" name="savename" class="inputsubmit" value="{$LANG.DISTROLIST_SAVENAME}" /></p>
	<br />
	<p align="center">{html_options name=dl_list[] options=$contact_list size="13" style="width: 30em" multiple="multiple"}</p>
	<br />
	<div align="center">
		<input type="button" value="{$LANG.DISTROLIST_ADD}" class="inputsubmit" onclick="mkwin('distrolist_helper.php?dl_id={$fvalues.dl_id}')" />&nbsp;
		<input type="submit" name="refresh" class="inputsubmit" value="{$LANG.DISTROLIST_REFRESH_LIST} ({$contact_list|@count})" /><br />
		<input type="submit" name="remove" class="inputsubmit inputcancel" value="{$LANG.DISTROLIST_REMOVE}" />&nbsp;
		<input type="submit" name="delete" class="inputsubmit inputcancel" value="{$LANG.DISTROLIST_DELETE}" onclick="return confirm('{$LANG.DISTROLIST_CONFIRM_DELETE}')" />&nbsp;
	</div>
{/if}
</div>

<input type="hidden" name="dl_id" value="{$fvalues.dl_id}" />
<input type="hidden" name="_submit_check" value="1" />
</form>

<script language="javascript" type="text/javascript">
// <![CDATA[
	$('dlname').focus();
// ]]>
</script>
{/if}
{include file="minfooter.tpl"}