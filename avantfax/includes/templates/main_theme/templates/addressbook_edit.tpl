{include file="minheader.tpl"}
{if $message}
<div class="success">
	<p align="center">{$message}</p>
	<br />
	<div align="center">
		<input type="button" value="{$LANG.BACK}" class="inputsubmit" onclick="parent.location.href='addressbook.php{if $fvalues.abook_id}?abook_id={$fvalues.abook_id}{/if}'" />
	</div>
</div>	
{else}

{if $create}
<form action="upload_faxcontacts.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="{$SF_FILESIZE}" />
<div class="miniTableForm" align="center">
	<p>{$LANG.UPLOAD_CONTACTS}</p><br />
	<input type="file" name="vcf" />
	<br />
	<p><label for="catid">{$LANG.CATEGORY}:</label> {html_options name="catid" id="catid" options=$faxcategories}</p>
	<input type="submit" name="upload" class="inputsubmit" value="{$LANG.UPLOAD_BUTTON}" />
	<input type="hidden" name="_submit_check" value="1" />
</div>
</form>
<br /><hr style="width: 80%; margin-left:auto; margin-right:auto" /><br />
{/if}

<form action="{$smarty.server.SCRIPT_NAME}" method="post">

{if $create}<div align="center">{$LANG.NEW_ENTRY}</div>{/if}

{if $error}<div class="error">{$error}</div>{/if}

<div class="miniTableForm">

<p><label for="company">{$LANG.CONTACT_HEADER_COMPANY}:</label> <input type="text" name="company" id="company" value="{$fvalues.company}" size="30" maxlength="100" /></p>

<div style="overflow: auto; overflow-x: none; width: 39em; height: {if $create}16{else}32{/if}em">
{section name=r loop=$faxnumbers}
{assign var="index" value=$smarty.section.r.index}
<p><label for="faxnumber{$index}">{$LANG.CONTACT_HEADER_FAXNUM}:</label> <input type="text" name="faxnumber[{$index}]" id="faxnumber{$index}" value="{$faxnumbers[r].faxnumber}" maxlength="20" /></p>
<p><label for="to_person{$index}">{$LANG.TO_PERSON}:</label> <input type="text" name="to_person[{$index}]" id="to_person{$index}" value="{$faxnumbers[r].to_person}" size="25" maxlength="30" /></p>
<p><label for="to_location{$index}">{$LANG.TO_LOCATION}:</label> <input type="text" name="to_location[{$index}]" id="to_location{$index}" value="{$faxnumbers[r].to_location}" size="25" maxlength="30" /></p>
<p><label for="to_voicenumber{$index}">{$LANG.TO_VOICENUMBER}:</label> <input type="text" name="to_voicenumber[{$index}]" id="to_voicenumber{$index}" value="{$faxnumbers[r].to_voicenumber}" size="25" maxlength="30" /></p>

{if $SUPERUSER}
<p><label for="faxcatid{$index}">{$LANG.CATEGORY}:</label> {html_options name=faxcatid[$index] id=faxcatid$index options=$faxcategories selected=$faxnumbers[r].faxcatid}</p>
{/if}
<p><label for="description{$index}">{$LANG.DESCRIPTION}:</label> <input type="text" name="description[{$index}]" id="description{$index}" value="{$faxnumbers[r].description}" size="25" maxlength="30" /></p>

<input type="hidden" name="abookfax_id[{$index}]" value="{$faxnumbers[r].abookfax_id}" />
{/section}
{if (count ($faxnumbers)>0)}
<hr style="width: 20em; margin-left:auto; margin-right:auto" />
{/if}
<p><label for="new_faxnum">{$LANG.CONTACT_HEADER_NEWFAX}:</label> <input type="text" name="new_faxnum" id="new_faxnum" value="{$fvalues.new_faxnum}" maxlength="20" style="background: #FFFFCC;" /></p>
<p><label for="new_to_person">{$LANG.TO}:</label> <input type="text" name="new_to_person" id="new_to_person" value="{$fvalues.new_to_person}" size="25" maxlength="30" style="background: #FFFFCC;" /></p>
<p><label for="new_to_location">{$LANG.TO_LOCATION}:</label> <input type="text" name="new_to_location" id="new_to_location" value="{$fvalues.new_to_location}" size="25" maxlength="30" style="background: #FFFFCC;" /></p>
<p><label for="new_to_voicenumber">{$LANG.TO_VOICENUMBER}:</label> <input type="text" name="new_to_voicenumber" id="new_to_voicenumber" value="{$fvalues.new_to_voicenumber}" size="25" maxlength="30" style="background: #FFFFCC;" /></p>

{if $SUPERUSER}
<p><label for="newfaxcatid">{$LANG.CATEGORY}:</label> {html_options name="newfaxcatid" id="newfaxcatid" options=$faxcategories}</p>
{/if}

<p><label for="new_desc">{$LANG.DESCRIPTION}:</label> <input type="text" name="new_desc" id="new_desc" value="{$fvalues.new_desc}" size="25" maxlength="30" style="background: #FFFFCC;" /></p>

</div>
</div>

<br />

<div align="center">
{if $create}
	<input type="submit" name="create" class="inputsubmit" value="{$LANG.CREATE}" />
{else}
	<input type="submit" name="save" class="inputsubmit" value="{$LANG.SAVE}" />
{if $SUPERUSER}
	&nbsp;<input type="submit" name="delete" value="{$LANG.DELETE}" class="inputsubmit inputcancel" onclick="return confirm('{$LANG.QUESTION_DELUSER}?')" />
{/if}
{/if}
	&nbsp;<input type="button" value="{$LANG.CANCEL}" class="inputsubmit inputcancel" onclick="location.href='{$smarty.server.SCRIPT_NAME}'" />
</div>
<input type="hidden" name="abook_id" value="{$fvalues.abook_id}" />
<input type="hidden" name="_submit_check" value="1" />
</form>

<script type="text/javascript" language="javascript">
// <![CDATA[
	$('company').focus();
// ]]>
</script>
{/if}
{include file="minfooter.tpl"}