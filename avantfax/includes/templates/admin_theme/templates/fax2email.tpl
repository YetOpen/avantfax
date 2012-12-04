{include file="header.tpl"}
<h1 align="center">{$LANG.ADMIN_ROUTEBY_SENDER}</h1>

<div id="main-content">
	<div id="main-content-left" style="width:20em; position: relative; float: left">
		<form action="fax2email_edit.php" method="post" target="edit">
		<div align="center">
			{html_options name="abook_id" size="17" style="width: 20em" onchange="submit()" options=$list}
		</div>
		<p align="center">({$list|@count})</p>
		</form>
	</div>
	<div id="main-content-right" style="width: 40em; float: right; position:relative">
		<iframe src="fax2email_edit.php{if $selected_cid}?abook_id={$selected_cid}{/if}" width="350" height="300"
		 frameborder="0" scrolling="auto" name="edit" style="width:35em"></iframe>
	</div>
	<div id="explain-me">
		<p>{$LANG.EXPLAIN_FAX2EMAIL}</p>
	</div>
</div>
{include file="footer.tpl"}