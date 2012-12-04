{include file="header.tpl"}
{include file="div_top.tpl" div_size=60}

<h1 align="center">{$LANG.MENU_SENDFAX}</h1>

{if $message}
<p align="center">{$message}</p>

{if is_array($results)}
<p align="center">Job ID:{$results.jobid} Group ID:{$results.groupid}</p>

<script type="text/javascript" language="javascript">
// <![CDATA[
	setTimeout ('gotoInbox ()', 5000);
// ]]>
</script>

{/if}

{else}

{if $error}<div class="error">{$error}</div>{/if}

<form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="{$SF_FILESIZE}" />

<div class="tableForm">
	<p><label for="dest">
		{$LANG.FAX_DEST}: &nbsp;<br />
		<a href="javascript:mkwin('distrocontacts.php')">[{$LANG.TITLE_DISTROLIST}]</a>&nbsp;<br />
		<a href="javascript:mkwin('faxcontacts.php')">[{$LANG.MENU_CONTACTS}]</a>&nbsp;</label>
		<textarea name="destinations" id="dest" rows="3" cols="40" style="width:35em; height: 3em">{$fvalues.destinations}</textarea>
	</p>
	
	<div style="clear: both"></div>
	<p><label>{$LANG.FAX_FILES}: &nbsp;<br />{html_image file="images/clip.gif"}&nbsp;<br />{$LANG.FAX_MAXSIZE}&nbsp;</label>
		<div class="tableFormRight" style="background-color:#fbfbfb">
			<input type="file" id="files" />
			<div id="files_list"></div>
		</div>
	</p>
</div>
	
<br />

<div align="center" style="clear: both">{$LANG.FAX_FILETYPES}</div>

<br />
<div onclick="Effect.toggle('schedulingDIV', 'slide')" id="sendfaxOptions">{$LANG.OPTIONS}</div>

<div id="schedulingDIV" style="display:none;">
	<div class="tableForm">
		<p><label for="notify_requeue">{$LANG.NOTIFY_REQUEUE}:</label> <input type="checkbox" name="notify_requeue" id="notify_requeue" value="1" {if $SENDFAX_REQUEUE_EMAIL}checked="checked"{/if} /></p>
		<p><label for="sendtime">{$LANG.SCHEDULE_FAX}:</label> <div class="tableFormRight"><input type="checkbox" name="sendtime" id="sendtime" value="1" />  {html_options name="sendtimeHour" id="sendtimeHour" selected=$fvalues.sendtimeHour options=$unitHours} : {html_options name="sendtimeMin" id="sendtimeMin" selected=$fvalues.sendtimeMin options=$unitMins}</div>
		</p>
		<p><label for="killtime">{$LANG.FAX_KILLTIME}:</label> <div class="tableFormRight">{$LANG.NOW} + <input type="text" name="killtime" id="killtime" value="{$fvalues.killtime}" style="width: 2em" /> {html_options name="killtime_unit" id="killtime_unit" selected=$fvalues.killtime_unit options=$units}</div>
		</p>
		<p><label for="numtries">{$LANG.FAX_NUMTRIES}:</label> <input type="text" name="numtries" id="numtries" value="{$fvalues.numtries}" style="width:2em" maxlength="3" /></p>
	
	{if $SUPERUSER}
		<p><label for="user_tsi">{$LANG.TSI_ID}:</label> <input type="text" name="user_tsi" id="user_tsi" value="{$fvalues.user_tsi}" style="width:20em" /></p>
		<p><label for="priority">{$LANG.PRIORITY}:</label> <div class="tableFormRight">{html_options name="priority" id="priority" selected=$fvalues.priority options=$priority_list}</div></p>
	{/if}
	
	{if (count ($modem_list) > 1)}
		<p><label for="modem">{$LANG.MODEM_DEVICE}:</label>
			<div class="tableFormRight" style="float:left; position:relative">
				{html_options name="modem" id="modem" selected=$fvalues.modem options=$modem_list}
			</div>
		</p>
	{else}
		<input type="hidden" name="modem" value="{$fvalues.modem}" />
	{/if}
	</div>
	<br />
</div>

<div class="tableForm">
	<p><label for="cp_switch">{$LANG.FAX_CPAGE}:</label> <input type="checkbox" name="coverpage" id="cp_switch" value="1" onchange="chgtx();" /></p>
</div>

<div id="coverpagediv" class="tableForm">
	<p><label for="whichcover">{$LANG.SELECT_COVERPAGE}:</label>
		<div class="tableFormRight" style="float:left; position:relative">
			{html_options name="whichcover" id="whichcover" selected=$fvalues.whichcover options=$cover_list}
		</div>
	</p>
	<p><label for="to_person">{$LANG.TO_PERSON}:</label> <input type="text" name="to_person" id="to_person" value="{$fvalues.to_person}" style="width: 15em" /></p>
	<p><label for="to_company">{$LANG.TO_COMPANY}:</label> <input type="text" name="to_company" id="to_company" value="{$fvalues.to_company}" style="width: 15em" /></p>
	<p><label for="to_location">{$LANG.TO_LOCATION}:</label> <input type="text" name="to_location" id="to_location" value="{$fvalues.to_location}" style="width: 15em" /></p>
	<p><label for="to_voicenumber">{$LANG.TO_VOICENUMBER}:</label> <input type="text" name="to_voicenumber" id="to_voicenumber" value="{$fvalues.to_voicenumber}" style="width: 15em" /></p>
	<p><label for="regarding">{$LANG.FAX_REGARDING}:</label> <input type="text" name="regarding" id="regarding" value="{$fvalues.regarding}" style="width: 20em" /></p>
	<p>
		<label for="comments">{$LANG.FAX_COMMENTS}:</label>
		<div class="tableFormRight">
			<textarea name="comments" id="comments" rows="10" cols="30" style="width: 35em">{$fvalues.comments}</textarea>
		</div>
	</p>
</div>

<div style="clear: both"></div>

<div align="center">
	<input type="submit" class="inputsubmit" value="{$LANG.BUTTON_SEND}" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="location.href='inbox.php'" />
</div>

<input type="hidden" name="_submit_check" value="1" />
</form>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('dest').focus();
	init_box ({$SENDFAX_USE_COVERPAGE});
	
	var multi_selector = new MultiSelector ($('files_list'), '{$LANG.DELETE}');
	multi_selector.addElement ($('files'));
// ]]>
</script>
{/if}
{include file="div_bottom.tpl"}
{include file="footer.tpl"}