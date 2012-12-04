{include file="minheader.tpl"}
{include file="div_top.tpl" div_size=50}
<form action="{$smarty.server.SCRIPT_NAME}" method="post">

{if $added}<div class="success">{$LANG.CHANGES_SAVED}</div>{/if}

<p><label for="regexp">{$LANG.SEARCH_TITLE}:</label> <input type="text" onkeyup="myfilter.query()" name="regexp" id="regexp" style="width: 25em" /></p>
<div align="center">
	<select name="myselect[]" id="myselect" size="7" style="width: 35em" multiple="multiple"></select>
<br />
	<input type="submit" class="inputsubmit" name="add" value="{$LANG.ADD}" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" onclick="window.close()" value="{$LANG.PROMPT_CLOSEWINDOW}" />
</div>
<input type="hidden" name="dl_id" value="{$fvalues.dl_id}" />
<input type="hidden" name="_submit_check" value="1" />
</form>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('regexp').focus();
	var myfilter = new CompanyList ('myselect', 'regexp', 'mix');
	myfilter.allcontacts ({$SHOW_ALL_CONTACTS});
	myfilter.query();
// ]]>
</script>
{include file="div_bottom.tpl"}
{include file="footer.tpl"}