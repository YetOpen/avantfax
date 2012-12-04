{include file="header.tpl"}
<h1 align="center">{if $fvalues.uid}{$LANG.ADMIN_EDIT_USER}{else}{$LANG.ADMIN_NEW_USER}{/if}</h1>
{if $saved}
	<div class="success">{$message}</div>
{/if}
{if $error}
	<div class="error">{$error}</div>
{/if}
<div id="main-content">
	<div class="tableForm">
	<form action="{$smarty.server.SCRIPT_NAME}" method="post">
{if $fvalues.uid}
	<p><label for="acc_enabled">{$LANG.ADMIN_ACC_ENABLED}:</label> <input type="checkbox" name="acc_enabled" id="acc_enabled" value="1" {if $fvalues.acc_enabled}checked="checked"{/if} /></p>
{else}
	<input type="hidden" name="acc_enabled" value="1" />
{/if}
	<p><label for="name">{$LANG.NAME}{required}:</label> <input type="text" name="name" id="name" value="{$fvalues.name}" maxlength="40" style="width: 15em" /></p>
	<p><label for="username">{$LANG.PROMPT_UNAME}{required}:</label> <input type="text" name="username" id="username" value="{$fvalues.username}"  style="width: 13em" maxlength="{$MAX_USERNAME_SIZE}" /></p>
	<p><label for="password">{$LANG.PROMPT_PASSWORD}:</label> <input type="password" name="password" id="password" value="{$fvalues.password}" maxlength="{$MAX_PASSWD_SIZE}" style="width: 10em" /></p>
	<p><label for="pwdcycle">{$LANG.ADMIN_PWDCYCLE[0]}:</label> {html_options name="pwdcycle" id="pwdcycle" options=$cycles selected=$fvalues.pwdcycle}</p>
	<p><label for="pwd_reuse">{$LANG.PROMPT_CAN_REUSE_PWD}:</label> <input type="checkbox" name="pwd_reuse" id="pwd_reuse" value="1" {if $fvalues.pwd_reuse}checked="checked"{/if} /></p>
	<br />
	<p><label for="email">{$LANG.PROMPT_EMAIL}{required}:</label> <input type="text" name="email" id="email" value="{$fvalues.email}" maxlength="{$MAX_EMAIL_SIZE}" style="width: 20em" /></p>
	<p><label for="language">{$LANG.LANGUAGE}:</label> {html_options name="language" id="language" options=$languages selected=$fvalues.language}</p>
	<br />
	<p><label for="from_company">{$LANG.MY_COMPANY}:</label> <input type="text" name="from_company" id="from_company" value="{$fvalues.from_company}" style="width: 20em" /></p>
	<p><label for="from_location">{$LANG.MY_LOCATION}:</label> <input type="text" name="from_location" id="from_location" value="{$fvalues.from_location}" style="width: 15em" /></p>
	<p><label for="from_voicenumber">{$LANG.MY_VOICENUMBER}:</label> <input type="text" name="from_voicenumber" id="from_voicenumber" value="{$fvalues.from_voicenumber}" style="width: 15em" /></p>
	<p><label for="from_faxnumber">{$LANG.MY_FAXNUMBER}:</label> <input type="text" name="from_faxnumber" id="from_faxnumber" value="{$fvalues.from_faxnumber}" style="width: 15em" /></p>
	<p><label for="user_tsi">{$LANG.TSI_ID}:</label> <input type="text" name="user_tsi" id="user_tsi" value="{$fvalues.user_tsi}" style="width: 17em" /></p>
	<br />
	<p><label for="coverpage_id">{$LANG.SELECT_COVERPAGE}:</label>
		<div class="tableFormRight" style="float:left; position:relative">
			{html_options name="coverpage_id" id="coverpage_id" selected=$fvalues.coverpage_id options=$cover_list}
		</div>
	</p>
	<br /><br />
	<p><label for="faxperpageinbox" style="padding-top:5px">{$LANG.INBOX_SHOW}</label>
		<div class="tableFormRight" style="float:left; position:relative">
			{html_options name="faxperpageinbox" id="faxperpageinbox" selected=$fvalues.faxperpageinbox options=$faxesperpagelist} {$LANG.FAXES_PER_PAGE}
		</div>
	</p>
	<br /><br />
	<p><label for="faxperpagearchive" style="padding-top:5px">{$LANG.ARCHIVE_SHOW}</label>
		<div class="tableFormRight" style="float:left; position:relative">
			{html_options name="faxperpagearchive" id="faxperpagearchive" selected=$fvalues.faxperpagearchive options=$faxesperpagelist} {$LANG.FAXES_PER_PAGE}
		</div>
	</p>
	<br /><br />
	<p><label for="is_admin">{$LANG.IS_ADMIN}:</label> <input type="checkbox" name="is_admin" id="is_admin" value="1" {if $fvalues.is_admin}checked="checked"{/if} /></p><br />
	<p><label for="superuser">{html_image file='../images/su.gif'}&nbsp;{$LANG.SUPERUSER}:</label> <input type="checkbox" name="superuser" id="superuser" value="1" {if $fvalues.superuser}checked="checked"{/if} /></p><br />
	<p><label for="can_del">{$LANG.USER_CANDEL}:</label> <input type="checkbox" name="can_del" id="can_del" value="1" {if $fvalues.can_del}checked="checked"{/if} /></p><br />
    <p><label for="any_modem">{$LANG.USER_ANYMODEM}:</label> <input type="checkbox" name="any_modem" id="any_modem" value="1" {if $fvalues.any_modem}checked="checked"{/if} /></p>
	<br /><br />
{if $ENABLE_DID_ROUTING}
		<fieldset>
			<legend>{$LANG.ADMIN_DIDROUTES}</legend>
			<div class="tableForm">
			{if count ($didroutes)}
				{html_checkboxlist name="didrouting" values=$didroutes output=$routes checked=$fvalues.didrouting}
			{else}
				<p>{$LANG.MUST_CREATE_ROUTES}</p>
			{/if}
			</div>
		</fieldset>
	<br />
{/if}
	<fieldset>
		<legend>{$LANG.ADMIN_FAXLINES}</legend>
		<div class="tableForm">
		{if count ($modemdevs)}
			{html_checkboxlist name="modemdevs" values=$modemdevs output=$modems checked=$fvalues.modemdevs}
		{else}
			<p>{$LANG.MUST_CREATE_MODEMS}</p>
		{/if}
		</div>
	</fieldset>
	<br />
	<fieldset>
		<legend>{$LANG.ADMIN_CATEGORIES}</legend>
		<div class="tableForm">
		{if count ($faxcategories)}
			{html_checkboxlist name="faxcats" values=$faxcategories output=$categories checked=$fvalues.faxcats}
		{else}
			<p>{$LANG.MUST_CREATE_CATEGORIES}</p>
		{/if}
		</div>
	</fieldset>
	<br />
{if $fvalues.uid}
	<p style="margin-left:auto; margin-right:auto; width: 30em">
		<input type="submit" class="inputsubmit" value="{$LANG.SAVE}" />&nbsp;
		<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="location.href='admin.php'" />&nbsp;
		<input type="submit" class="inputsubmit inputcancel" name="delete" value="{$LANG.ADMIN_DEL_USER}" />
	</p>
	<input type="hidden" name="uid" value="{$fvalues.uid}" />
{else}
	<p style="margin-left:auto; margin-right:auto; width: 30em">
		<input type="submit" class="inputsubmit" value="{$LANG.SAVE}" />&nbsp;
		<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="location.href='admin.php'" />
	</p>
{/if}
	<input type="hidden" name="_submit_check" value="1" />
	<input type="hidden" name="email_sig" value="{$fvalues.email_sig}" />
	</form>
	</div>
</div>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('name').focus ();
// ]]>
</script>
{include file="footer.tpl"}