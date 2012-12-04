{include file="header.tpl"}
{include file="div_top.tpl"}
	<h1 align="center">{$LANG.BUTTON_SETTINGS}</h1>
	
	{if $error}
		<div align="center" colspan="2" class="error">{$error}</div>
	{/if}
	<form action="{$smarty.server.SCRIPT_NAME}" method="post">
	<div class="tableForm">
		<p><label for="name">{$LANG.YOUR_NAME}{required}:</label> <input type="text" name="name" id="name" value="{$fvalues.name}" maxlength="40" style="width: 20em" /></p>
		<p><label for="from_company">{$LANG.MY_COMPANY}:</label> <input type="text" name="from_company" id="from_company" value="{$fvalues.from_company}" style="width: 25em" /></p>
		<p><label for="from_location">{$LANG.MY_LOCATION}:</label> <input type="text" name="from_location" id="from_location" value="{$fvalues.from_location}" style="width: 15em" /></p>
		<p><label for="from_voicenumber">{$LANG.MY_VOICENUMBER}:</label> <input type="text" name="from_voicenumber" id="from_voicenumber" value="{$fvalues.from_voicenumber}" style="width: 15em" /></p>
		<p><label for="from_faxnumber">{$LANG.MY_FAXNUMBER}:</label> <input type="text" name="from_faxnumber" id="from_faxnumber" value="{$fvalues.from_faxnumber}" style="width: 15em" /></p>
		{if $SUPERUSER}<p><label for="user_tsi">{$LANG.TSI_ID}:</label> <input type="text" name="user_tsi" id="user_tsi" value="{$fvalues.user_tsi}" style="width: 15em" /></p>{/if}
		<br />
		<p><label for="opass">{$LANG.OPASS}:</label> <input type="password" name="opass" id="opass" size="{$MAX_PASSWD_SIZE}" maxlength="{$MAX_PASSWD_SIZE}" /></p>
		<p><label for="npass">{$LANG.NPASS}:</label> <input type="password" name="npass" id="npass" size="{$MAX_PASSWD_SIZE}" maxlength="{$MAX_PASSWD_SIZE}" /> <span class="small">{$LANG.PWD_REQUIREMENTS}</span></p>
		<p><label for="vpass">{$LANG.VPASS}:</label> <input type="password" name="vpass" id="vpass" size="{$MAX_PASSWD_SIZE}" maxlength="{$MAX_PASSWD_SIZE}" /></p>
		<br />
		<p><label for="email">{$LANG.EMAIL}{required}:</label> <input type="text" name="email" id="email" value="{$fvalues.email}" maxlength="{$MAX_EMAIL_SIZE}" style="width: 20em" /></p>
		<p>
			<label for="email_sig">{$LANG.EMAIL_SIG}:</label>
			<div class="tableFormRight">
				<textarea name="email_sig" id="email_sig" rows="10" cols="40" style="width:35em;">{$fvalues.email_sig}</textarea>
			</div>
		</p>
		<p><label for="language">{$LANG.LANGUAGE}:</label>
			<div class="tableFormRight">
				{html_options name=language options=$languages selected=$fvalues.language}
			</div>
		</p>
		<p><label for="coverpage_id">{$LANG.SELECT_COVERPAGE}:</label>
			<div class="tableFormRight" style="float:left; position:relative">
				{html_options name="coverpage_id" id="coverpage_id" selected=$fvalues.coverpage_id options=$cover_list}
			</div>
		</p>

		<p><label for="faxperpageinbox" style="padding-top:5px">{$LANG.INBOX_SHOW}</label>
			<div class="tableFormRight" style="float:left; position:relative">
				{html_options name="faxperpageinbox" id="faxperpageinbox" selected=$fvalues.faxperpageinbox options=$faxesperpagelist} {$LANG.FAXES_PER_PAGE}
			</div>
		</p>
		<p><label for="faxperpagearchive" style="padding-top:5px">{$LANG.ARCHIVE_SHOW}</label>
			<div class="tableFormRight" style="float:left; position:relative;">
				{html_options name="faxperpagearchive" id="faxperpagearchive" selected=$fvalues.faxperpagearchive options=$faxesperpagelist} {$LANG.FAXES_PER_PAGE}
			</div>
		</p>
		
	</div>
	<br /><br />
<div align="center" style="clear:both">
	<input type="submit" name="update" class="inputsubmit" value="{$LANG.UPDATE}" />
	<input type="submit" name="cancel" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" />
</div>
<input type="hidden" name="url" value="{$fvalues.url}" />
<input type="hidden" name="_submit_check" value="1" />
</form>
<script type="text/javascript" language="javascript">
// <![CDATA[
	$('name').focus();
// ]]>
</script>

{include file="div_bottom.tpl"}
{include file="footer.tpl"}