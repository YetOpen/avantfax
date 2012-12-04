<form method="post" onSubmit="return false" id="delete_fax">
<br />

<p align="center">{$LANG.DELETE_CONFIRM} (FaxID: {$fvalues.fid})</p>

<br />

<div align="center">
	<input type="submit" class="inputsubmit" id="mainbtn" value="{$LANG.DELETE_FAX}" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="closeDialog()" />
</div>

<br />
<input type="hidden" name="fid" value="{$fvalues.fid}" />
<input type="hidden" name="nextfid" value="{$fvalues.nextfid}" />
<input type="hidden" name="_submit_check" value="1" />
</form>
