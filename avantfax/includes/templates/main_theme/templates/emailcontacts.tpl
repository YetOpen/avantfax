{include file="minheader.tpl"}
<br />
{include file="div_top.tpl" div_size=50}
<br />
<form name="myform">
<p><label for="regexp">{$LANG.SEARCH_TITLE}:</label> <input type="text" onkeyup="myfilter.query()" name="regexp" id="regexp" style="width: 60%" /></p>
<br />
<p><select name="abookemail_id" id="abookemail_id" size="7" style="width: 35em; font-size:0.9em" multiple="multiple"></select></p>
<br />
<div align="center">
	<input type="button" class="inputsubmit" name="add" value="{$LANG.ADD}" style="width:15em" onclick="addEmail('{$EMAILDEST_ID}')" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" onclick="window.close()" value="{$LANG.PROMPT_CLOSEWINDOW}" />
</div>
</form>

<script language="javascript" type="text/javascript">
// <![CDATA[
	$('regexp').focus();
	var myfilter = new EmailList ('abookemail_id', 'regexp');
	myfilter.query();
// ]]>
</script>
{include file="div_bottom.tpl"}
{include file="footer.tpl"}
