{include file="minheader.tpl"}
<br />
{include file="div_top.tpl" div_size=50}
<br />
{if $processed}
<div class="success">{$message}</div>
<br />
<a href="javascript:window.close()">{$LANG.PROMPT_CLOSEWINDOW}</a>

<script type="text/javascript" language="javascript">
// <![CDATA[
	addLoadEvent (close_window);
// ]]>
</script>
{else}
<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<div align="center">
	<p><label for="regexp">{$LANG.ASSIGN_CNAME}:</label> <input type="text" onkeyup="myfilter.query()" name="regexp" id="regexp" style="width: 25em" />
{if $lookup_whitepages}
	&nbsp;<a href="{$WHITEPAGES}{$lookup_whitepages}" target="_blank">{html_image file="images/pb.gif" title=$LANG.SEARCH_WHITEPAGES}</a>
{/if}
	</p>
	<br />
	<select name="myselect" id="myselect" size="7" style="width: 40em"></select>
</div>
<br />
<div align="center">
	<input type="submit" class="inputsubmit" style="width:15em" value="{$LANG.SAVE}" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" onclick="window.close()" value="{$LANG.PROMPT_CLOSEWINDOW}" />
</div>

<input type="hidden" name="abook_id" value="{$fvalues.abook_id}" />
<input type="hidden" name="_submit_check" value="1" />
</form>

<script language="javascript" type="text/javascript">
// <![CDATA[
	$('regexp').focus();
	var myfilter = new CompanyList ('myselect', 'regexp');
	myfilter.allcontacts ({$SHOW_ALL_CONTACTS});
	myfilter.query();
// ]]>
</script>
{/if}
{include file="div_bottom.tpl"}
{include file="footer.tpl"}