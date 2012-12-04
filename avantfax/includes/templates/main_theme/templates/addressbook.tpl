{include file="header.tpl"}
{include file="div_top.tpl" div_size=40}
	<div align="center"><a href="emailbook.php">{$LANG.MENU_CONTACTS}</a> | <a href="addressbook.php">{$LANG.TITLE_FAXNUMS}</a> | <a href="distrolist.php">{$LANG.TITLE_DISTROLIST}</a></div>
{include file="div_bottom.tpl"}

<h1 align="center">{$LANG.TITLE_FAXNUMS}</h1>

<br />

{include file="div_top.tpl" div_size=60}
<table width="100%">
	<tr>
		<td valign="top">
		<form method="post" action="addressbook_edit.php" target="edit">
			<p><label for="regexp">{$LANG.SEARCH_TITLE}:</label> <input type="text" onkeyup="myfilter.query()" name="regexp" id="regexp" style="width: 17em" /></p>
			<br />
			<select name="abook_id" id="abook_id" size="17" style="width: 100%; font-size:0.9em" onchange="submit()"></select>
		</form>
		</td>
		<td width="400">
			<iframe src="addressbook_edit.php{if $abook_id}?abook_id={$abook_id}{/if}" width="400" height="400" frameborder="0" scrolling="auto" name="edit"></iframe>
		</td>
	</tr>
</table>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('regexp').focus();
	var myfilter = new CompanyList ('abook_id', 'regexp');
	myfilter.allcontacts ({$SHOW_ALL_CONTACTS});
	myfilter.query();
// ]]>
</script>

{include file="div_bottom.tpl"}
{include file="footer.tpl"}