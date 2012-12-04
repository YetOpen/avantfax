{include file="minheader.tpl"}
{if $message}
<div class="success">
	<p align="center">{$message}</p>
	<br />
	<div align="center">
		<input type="button" value="{$LANG.BACK}" class="inputsubmit" onclick="parent.location.href='emailbook.php{if $fvalues.abookemail_id}?abookemail_id={$fvalues.abookemail_id}{/if}'" />
	</div>
</div>	
{else}
{if $create}
<form action="upload_contacts.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="{$SF_FILESIZE}" />
<div align="center">
	<p>{$LANG.UPLOAD_CONTACTS}</p><br />
	<input type="file" name="vcf" />
	<input type="submit" name="upload" class="inputsubmit" value="{$LANG.UPLOAD_BUTTON}" />
	<input type="hidden" name="_submit_check" value="1" />
</div>
</form>
<br /><hr style="width: 80%; margin-left:auto; margin-right:auto" /><br />
{/if}

{if $create}<div align="center">{$LANG.NEW_ENTRY}</div>{/if}
{if $error}<div class="error">{$error}</div>{/if}

<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<div class="miniTableForm">
	<p><label for="contact_name">{$LANG.NAME}:</label> <input type="text" name="contact_name" id="contact_name" value="{$fvalues.contact_name}" /></p>
	<p><label for="contact_email">{$LANG.EMAIL}:</label> <input type="text" name="contact_email" id="contact_email" value="{$fvalues.contact_email}" /></p>
</div>

<br />

<div align="center">
{if $create}
	<input type="submit" name="create" class="inputsubmit" value="{$LANG.CREATE}" />
{else}
	<input type="submit" name="save" class="inputsubmit" value="{$LANG.SAVE}" />
{if $SUPERUSER}
	&nbsp;<input type="submit" name="delete" class="inputsubmit inputcancel" value="{$LANG.DELETE}" onclick="return confirm('{$LANG.QUESTION_DELUSER} {$fvalues.contact_name}?')" />
{/if}
{/if}
	&nbsp;<input type="button" value="{$LANG.CANCEL}" class="inputsubmit inputcancel" onclick="location.href='{$smarty.server.SCRIPT_NAME}'" />
</div>
<input type="hidden" name="abookemail_id" value="{$fvalues.abookemail_id}" />
<input type="hidden" name="_submit_check" value="1" />
</form>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('contact_name').focus();
// ]]>
</script>
{/if}
{include file="minfooter.tpl"}