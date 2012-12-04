<form method="post" onSubmit="return false" id="deleteselectedfaxes">
<br />

<p align="center">{$LANG.DELETE_CONFIRM}</p>

<br />

<div align="center">
	<input type="submit" class="inputsubmit" id="mainbtn" value="{$LANG.DELETE_FAX}" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="closeDialog()" />
</div>

<br />
<input type="hidden" name="fids" value="{$fvalues.fids}" />
<input type="hidden" name="_submit_check" value="1" />
</form>
