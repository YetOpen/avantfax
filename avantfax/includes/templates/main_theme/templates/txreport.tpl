{include file="minheader.tpl"}

<div class="print-hide" style="clear:both; float:right; position:relative">
	<input type="button" onclick="printPage()" value="{$LANG.PRINT}" class="inputsubmit" />
</div>

<br />

<div class="miniTableForm" align="left" style="width:60em">
<p><label>{$LANG.CONTACT_HEADER_COMPANY}:</label> {$data.sender}</p>
<p><label>{$LANG.CONTACT_HEADER_FAXNUM}:</label> {$data.faxnum}</p>
<p><label>{$LANG.DATE}:</label> {$data.date}</p>
<p><label>{$LANG.PN_PAGES}:</label> {$data.pages}</</p>
</div>

<br />

<p align="center"><img src="file.php?file={$data.image}" width="{$data.imgw}" height="{$data.imgh}" /></p>

<script type="text/javascript" language="javascript">
// <![CDATA[
	function printPage () {literal}{{/literal}
		window.print();
	}
	
//	addLoadEvent (printPage);
// ]]>
</script>
{include file="footer.tpl"}
