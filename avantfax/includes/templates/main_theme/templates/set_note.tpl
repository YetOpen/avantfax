{if $processed}
<br />
<div align="center">{$LANG.ASSIGN_NOTE_SAVED}
<br /><br />
<input type="button" class="inputsubmit" id="mainbtn" value="{$LANG.PROMPT_CLOSEWINDOW}" onclick="closeDialog()" />
</div>
<br />
{else}
<br />
<form method="post" onSubmit="return false" id="set_note">
<p><label for="note">{$LANG.ASSIGN_NOTE}:</label></p>
	<textarea name="description" id="description" cols="40" rows="4">{$fvalues.description}</textarea>
<br />
<p><label for="category">{$LANG.CATEGORY}:</label> {html_options name="category" id="category" options=$categories selected=$fvalues.category}</p>
<br />
<div align="center">
	<input type="submit" class="inputsubmit" id="mainbtn" value="{$LANG.SAVE}" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="closeDialog()" />
<br />

{if $modusername}
<br />
{$LANG.LAST_MOD} {$modusername} [{$modlastmod}]
{/if}
</div>
<input type="hidden" name="fid" id="fid" value="{$fvalues.fid}" />
<input type="hidden" name="_submit_check" value="1" />
</form>

{/if}
