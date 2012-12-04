<form method="post" onsubmit="return false" id="faxalter">
<h3>{$LANG.MODIFY_FAXJOB}</h3>

<div class="miniTableForm" align="left">
	<p><label for="dest">{$LANG.NEW_DESTINATION}:</label> <input type="text" name="destination" id="dest" value="{$fvalues.destination}" /> <a href="javascript:mkwin('faxcontacts.php?list_type=s')">[{$LANG.MENU_CONTACTS}]</a></p>
	
	<p><label for="priority">{$LANG.PRIORITY}:</label>{html_options name="priority" id="priority" selected=$fvalues.priority options=$priority_list}</p>
	
	{if (count ($modem_list) > 1)}
	<p><label for="modem">{$LANG.MODEM_DEVICE}:</label>{html_options name="modem" id="modem" selected=$fvalues.modem options=$modem_list}</p>
	{/if}
	
	<p><label for="numtries">{$LANG.FAX_NUMTRIES}:</label> <input type="text" name="numtries" id="numtries" value="{$fvalues.numtries}" style="width:2em" /></p>
	
	<p><label for="killtime">{$LANG.FAX_KILLTIME}:</label>
		<div style="float:left">{$LANG.NOW} + <input type="text" name="killtime" id="killtime" value="{$fvalues.killtime}" style="width: 2em" /> {html_options name="killtime_unit" id="killtime_unit" selected=$fvalues.killtime_unit options=$units}
		</div>
	</p>
	<br />
	<p><label for="sendtime">{$LANG.SCHEDULE_FAX}:</label>
		<div style="float:left">
			{$LANG.NOW}  <input type="checkbox" name="sendnow" value="1" style="width: 1em" /><br />
			<span style="float: left; width: 20em"><input type="checkbox" name="sendtime" id="sendtime" value="1" />  {html_options name="sendtimeHour" id="sendtimeHour" selected=$fvalues.sendtimeHour options=$unitHours} : {html_options name="sendtimeMin" id="sendtimeMin" selected=$fvalues.sendtimeMin options=$unitMins}</span>
		</div>
	</p>
</div>

<div align="center" style="clear:both; padding-top: 2em;">
	<input type="submit" class="inputsubmit" id="mainbtn" value="{$LANG.SAVE}" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="closeDialog()" />
<br />
</div>
<input type="hidden" name="jid" value="{$fvalues.jid}" />
<input type="hidden" name="resubmit" value="{$fvalues.resubmit}" />
<input type="hidden" name="owner" value="{$fvalues.owner}" />
<input type="hidden" name="_submit_check" value="1" />
</form>
