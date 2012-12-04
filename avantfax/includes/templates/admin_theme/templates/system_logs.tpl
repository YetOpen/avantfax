{include file="header.tpl"}
<h1 align="center">{$LANG.ADMIN_SYSLOGS}</h1>
<br />
<div align="center">
<form action="{$smarty.server.SCRIPT_NAME}" method="get">
<p><label for="kw">{$LANG.KEYWORDS}:</label> <input type="text" name="kw" id="kw" style="width: 30em" value="{$fvalues.kw}" /> <label for="day">{$LANG.DATE}:</label> {html_options name=day options=$days selected=$fvalues.day id="day"}&nbsp;{html_options name=month options=$months selected=$fvalues.month}&nbsp;{html_options name=year options=$years selected=$fvalues.year}&nbsp;<input type="submit" class="inputsubmit" value="{$LANG.SEARCH_TITLE}" /></p>
<input type="hidden" name="_submit_check" value="1" />
</form>
</div>

<table border="0" cellpadding="0" cellspacing="0">
<tr>
	<th width="110" align="left">{$LANG.DATE}</th>
	<th align="left">{$LANG.LOGTEXT}</th>
</tr>
{if is_array ($syslog)}
{section name=r loop=$syslog}
	<tr class="highlight"><td valign="top" class="logdate">{$syslog[r].logdate}</td><td class="logtext">{$syslog[r].logtext}</td></tr>
{/section}
{else}
	<tr><td colspan="2" align="center"><br /><br /><br />{$LANG.NOKEYWORD}</td></tr>
{/if}
</table>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('kw').focus ();
// ]]>
</script>
{include file="footer.tpl"}