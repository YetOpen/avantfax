{include file="minheader.tpl"}
{if $success}
<div class="success" align="center">
	<br />{$success}<br /><br />
	<input type="button" class="inputsubmit" value="{$LANG.BACK}" onclick="parent.location.href='fax2email.php?abook_id={$fvalues.abook_id}'" />
	<br /><br />
</div>
{else}
<form action="{$smarty.server.SCRIPT_NAME}" method="post">

<div class="miniTableForm">
	<p><label for="company">{$LANG.CONTACT_HEADER_COMPANY}:</label> <input type="text" name="company" id="company" value="{$fvalues.company}" style="width:15em" maxlength="100" /></p>
	
{section name=r loop=$faxnums}
{assign var="index" value=$smarty.section.r.index}
	<p><label for="company{$index}">{$LANG.CONTACT_HEADER_FAXNUM}:</label> <input type="text" disabled="disabled" value="{$faxnums[r].faxnumber}" style="width:15em" size="30" /></p>
	<p><label for="email{$index}">{$LANG.EMAIL}:</label> <input type="text" name="email[{$index}]" id="email{$index}" value="{$faxnums[r].email}" style="width:15em" size="30" /></p>
    <p><label for="printer{$index}">{$LANG.ADMIN_PRINTER}:</label> <input type="text" name="printer[{$index}]" id="printer{$index}" value="{$faxnums[r].printer}" style="width:15em" size="30" /></p>
	<p><label for="category{$index}">{$LANG.CATEGORY}:</label> {html_options name="faxcatid[$index]" id="category$index" options=$categories selected=$faxnums[r].faxcatid}</p>
	<input type="hidden" name="abookfax_id[{$index}]" value="{$faxnums[r].abookfax_id}" />
{/section}
</div>

<br />

<div align="center">
	<input type="submit" class="inputsubmit" name="save" value="{$LANG.SAVE}" />&nbsp;
	<input type="submit" class="inputsubmit inputcancel" name="delete" value="{$LANG.DELETE}" onclick="return confirm('{$LANG.QUESTION_DELUSER}?')" />&nbsp;
	<input type="button" class="inputsubmit inputcancel" value="{$LANG.CANCEL}" onclick="location.href='{$smarty.server.SCRIPT_NAME}'" />
</div>

<input type="hidden" name="_submit_check" value="1" />
<input type="hidden" name="abook_id" value="{$fvalues.abook_id}" />
</form>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$("company").focus();
// ]]>
</script>
{/if}
</body>
</html>
