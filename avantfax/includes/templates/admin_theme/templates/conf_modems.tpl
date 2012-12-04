{include file="header.tpl"}
<h1 align="center">{$LANG.ADMIN_CONFMODEMS}</h1>

<div id="main-content">
	<div id="main-content-left">
		<form action="conf_modems_edit.php" method="get" target="edit">
			{html_options name="device" size="10" style="width:15em" onchange="submit()" options=$devices}
		</form>
	</div>
	<div id="main-content-right">
		<iframe src="conf_modems_edit.php" width="330" height="200" frameborder="0" scrolling="no" name="edit"></iframe>
	</div>
	<div id="explain-me">
		<p>{$LANG.EXPLAIN_MODEMS}</p>
	</div>
</div>
{include file="footer.tpl"}