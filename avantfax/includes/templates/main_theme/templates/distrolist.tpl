{include file="header.tpl"}
{include file="div_top.tpl" div_size=40}
	<div align="center"><a href="emailbook.php">{$LANG.MENU_CONTACTS}</a> | <a href="addressbook.php">{$LANG.TITLE_FAXNUMS}</a> | <a href="distrolist.php">{$LANG.TITLE_DISTROLIST}</a></div>
{include file="div_bottom.tpl"}

<h1 align="center">{$LANG.TITLE_DISTROLIST}</h1>

<br />

{include file="div_top.tpl" div_size=60}
<table width="100%">
	<tr>
		<td valign="top">
		<p><label for="dl_id">{$LANG.SEARCH_TITLE}:</label></p>
		<form action="distrolist_edit.php" method="get" target="edit">
			{html_options options=$distrolists name="dl_id" id="dl_id" size="17" style="width: 100%" onchange="submit()"}
		</form>
		</td>
		<td width="400" valign="top">
			<iframe src="distrolist_edit.php" width="400" height="300" frameborder="0" scrolling="auto" name="edit"></iframe>
		</td>
	</tr>
</table>
{include file="div_bottom.tpl"}
{include file="footer.tpl"}