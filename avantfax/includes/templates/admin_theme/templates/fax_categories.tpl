{include file="header.tpl"}
<h1 align="center">{$LANG.ADMIN_FAXCATS}</h1>

<div id="main-content">
	<div id="main-content-left">
		<form action="fax_cat_edit.php" method="get" target="edit">
			{html_options options=$categories name="catid" size="10" style="width:15em" onchange="submit()"}
		</form>
	</div>
	<div id="main-content-right">
		<iframe src="fax_cat_edit.php" width="330" height="200" frameborder="0" scrolling="no" name="edit"></iframe>
	</div>
	<div id="explain-me">
		<p>{$LANG.EXPLAIN_CATEGORIES}</p>
	</div>
</div>
{include file="footer.tpl"}