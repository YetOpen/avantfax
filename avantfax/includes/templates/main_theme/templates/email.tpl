{include file="header.tpl"}
{include file="div_top.tpl" div_size=60}
<h1 align="center">{$LANG.SEND_EMAIL_HEADER}</h1>

{if $message}
	<div class="success">
	<p align="center">{$message}</p>
	<br />
	<div align="center">
		<input type="button" value="{$LANG.BACK}" class="inputsubmit" onclick="parent.location.href='{$fvalues.url}'" />
	</div>
</div>	
{else}

{if $error}<div class="error">{$error}</div>{/if}

<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<div class="tableForm">
	<p>
		<label>{$LANG.FROM}:</label>
		<div style="text-align:left; position:relative">{$fullemail}</div>
	</p>
	<p>
		<label for="emails">{$LANG.EMAIL_RECIPIENTS}:<br /><a href="javascript:mkwin('emailcontacts.php?emaildest_id=emails')">[{$LANG.MENU_CONTACTS}]</a></label>
		<div class="tableFormRight">
			<textarea name="emails" id="emails" rows="5" cols="40" style="width:35em">{$fvalues.emails}</textarea>
		</div>
	</p>
	<p>
		<label for="cc_emails">{$LANG.EMAIL_CCRECIPIENTS}:<br /><a href="javascript:mkwin('emailcontacts.php?emaildest_id=cc_emails')">[{$LANG.MENU_CONTACTS}]</a></label>
		<div class="tableFormRight">
			<textarea name="cc_emails" id="cc_emails" rows="2" cols="40" style="width:35em">{$fvalues.cc_emails}</textarea>
		</div>
	</p>
	<p>
		<label for="bcc_emails">{$LANG.EMAIL_BCCRECIPIENTS}:<br /><a href="javascript:mkwin('emailcontacts.php?emaildest_id=bcc_emails')">[{$LANG.MENU_CONTACTS}]</a></label>
		<div class="tableFormRight">
			<textarea name="bcc_emails" id="bcc_emails" rows="2" cols="40" style="width:35em">{$fvalues.bcc_emails}</textarea>
		</div>
	</p>
	<p><label for="subject">{$LANG.SUBJECT}:</label> <input type="text" name="subject" id="subject" value="{$fvalues.subject}" style="width:20em" maxlength="45" /></p>
	<p><label for="filename">{$LANG.PDF_FILENAME}:</label> <input type="text" name="filename" id="filename" value="{$fvalues.filename}" style="width:15em" /></p> 
	<p>
		<label for="msg">{$LANG.MESSAGE_PROMPT}:</label>
		<div class="tableFormRight">
			<textarea name="msg" id="msg" rows="15" cols="50" style="width:35em">{$fvalues.msg}</textarea>
		</div>
	</p>
{if $IN_INBOX}
	<p>
		<label for="category">{$LANG.CATEGORY}:</label>
		<div class="tableFormRight">
			{html_options options=$categories name="category" id="category" selected=$fvalues.category}
		</div>
	</p>
	<p><label for="archive">{$LANG.ARCHIVE_FAX}</label> <input name="archive" id="archive" type="checkbox" value="1" checked="checked" /></p>
{/if}
</div>

<div align="center" style="clear:both">
	<input type="submit" class="inputsubmit" value="{$LANG.BUTTON_SEND}" />
	<input type="button" class="inputsubmit inputcancel" name="cancel" value="{$LANG.CANCEL}" onclick="history.go(-1)" />
</div>
<input type="hidden" name="fid" value="{$fvalues.fid}" />
<input type="hidden" name="url" value="{$fvalues.url}" />
<input type="hidden" name="_submit_check" value="1" />
</form>
{/if}

{include file="div_bottom.tpl"}
{include file="footer.tpl"}
