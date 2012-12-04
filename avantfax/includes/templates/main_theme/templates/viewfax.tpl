{include file="header.tpl"}
<div id="sidemenu">
	{if $inbox.prev_fid}<a href="viewfax.php?fid={$inbox.prev_fid}"><img src="images/stock_left.png" title="{$LANG.PREV_FAX}" /></a>{/if}
	{if $inbox.next_fid}<a href="viewfax.php?fid={$inbox.next_fid}"><img src="images/stock_right.png" title="{$LANG.NEXT_FAX}" /></a>{/if}
	<a href="rotate.php?fid={$inbox.fid}&vf=1"><img src="images/rotate.png" title="{$LANG.ROTATE_FAX}" /></a>
	<a href="javascript:mkpdfwin('pdf.php?fid={$inbox.fid}');"><img src="images/pdf.png" title="{$LANG.DOWNLOAD_PDF}" /></a>
{if $ENABLE_DL_TIFF}
	<a href="file.php?file={$inbox.tiffpath}" target="_blank"><img src="images/tiff.png" title="{$LANG.DOWNLOAD_TIFF}" /></a>
{/if}	
	<a href="refax.php?fid={$inbox.fid}"><img src="images/refax.png" title="{$LANG.REPLY_TO_FAX}" /></a>
	<a href="email.php?fid={$inbox.fid}"><img src="images/email.png" title="{$LANG.EMAIL_PDF}" /></a>
	<a href="javascript:dialogNote({$inbox.fid});"><img src="images/note.png" title="{$LANG.ADD_NOTE_FAX}" /></a>	
	<a href="javascript:archiveFax({$inbox.fid},{if ($inbox.next_fid)}{$inbox.next_fid}{/if}{if (!$inbox.next_fid && $inbox.prev_fid)}{$inbox.prev_fid}{/if}{if (!$inbox.next_fid && !$inbox.prev_fid)}-1{/if})"><img src="images/folder.png" title="{$LANG.ARCHIVE_FAX}" class="imgRoll images/folder-accept.png" /></a>
{if $SESSION_CAN_DEL}
	<a href="javascript:dialogDeleteFax({$inbox.fid},{if ($inbox.next_fid)}{$inbox.next_fid}{/if}{if (!$inbox.next_fid && $inbox.prev_fid)}{$inbox.prev_fid}{/if}{if (!$inbox.next_fid && !$inbox.prev_fid)}-1{/if});"><img src="images/remove.png" alt="" title="{$LANG.DELETE_FAX}" class="imgRoll images/remove-full.png" /></a>
{/if}
	</table>
</div>

<div id="faxesmenu" align="center">
{section name=r loop=$inbox.pages}
<div id="thumb_{$smarty.section.r.iteration}">
{$smarty.section.r.iteration}<br />
<img src="file.php?file={$inbox.images[$smarty.section.r.index]}" style="border: 1px #FFCC99 dashed" title="{$LANG.PN_PAGE} {$smarty.section.r.iteration}" width="50" height="75" onclick="changeDisplayedFax('file.php?file={$inbox.images[$smarty.section.r.index]}', {$smarty.section.r.iteration})" />
</div>
{/section}
</div>

<!--show company name for fax-->
<div align="center">
	<a name="top">
		<h1>
{if ($inbox.faxnum_loadby == "faxnumid")}
	{if ($inbox.assign_type == "x" || !$inbox.faxnum_cid)}
		<a href="javascript:mkwin('assignx.php?fid={$inbox.fid}');" title="{$LANG.ASSIGN_CNAME}">{$LANG.FROM}: {$inbox.company_name} <img src="images/contacts-sm.png" alt="" /></a>
	{elseif ($inbox.assign_type == "c")}
		<a href="javascript:mkwin('assign.php?cid={$inbox.faxnum_cid}');" title="{$LANG.ASSIGN_CNAME}">{$LANG.FROM}: {$inbox.company_name} <img src="images/contacts-sm.png" alt="" /></a>
	{else}
		<a href="addressbook.php?abook_id={$inbox.faxnum_cid}">{$LANG.FROM}</a>: {$inbox.company_name}
	{/if}
{else}
	{if is_array ($inbox.mult_nums)}
		<form action="setcompany.php" method="post">
		{html_options name=faxnumid options=$inbox.mult_nums}&nbsp;<input type="submit" class="inputsubmit" value="{$LANG.SELECT}" />
		<input type="hidden" name="fid" value="{$inbox.fid}" />
		<input type="hidden" name="_submit_check" value="1" />
		</form>
	{elseif ($inbox.assign_type == "c")}
		<a href="javascript:mkwin('assign.php?cid={$inbox.faxnum_cid}');" title="{$LANG.ASSIGN_CNAME}">{$LANG.FROM}: {$inbox.company_name} <img src="images/contacts-sm.png" alt="" /></a>
	{else}
		<a href="addressbook.php?abook_id={$inbox.faxnum_cid}">{$LANG.FROM}</a>: {$inbox.company_name}
	{/if}
{/if}
		</h1>
	</a>
	{$LANG.DATE}: <strong>{$inbox.archstamp}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$LANG.PN_PAGES}: <strong>{$inbox.pages}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FaxID: <strong>{$inbox.fid}</strong>
</div>

<br />
{include file="div_top.tpl" div_size=65}
<div id="viewfaximage">
	<div id="viewimagediv1" style="display:none;" class="viewmainimageDiv">
		<img src="file.php?file={$inbox.images[0]}" title="{$LANG.PN_PAGE} 1" id="viewimage1" class="viewmainimage" onclick="showNextImage()" />
	</div>
	<div id="viewimagediv2" style="display:none;" class="viewmainimageDiv">
		<img src="" id="viewimage2" class="viewmainimage" onclick="showNextImage()" />
	</div>
</div>
{include file="div_bottom.tpl"}

<script type="text/javascript" language="javascript">
// <![CDATA[
	var imagesArr = Array({section name=r loop=$inbox.pages}{if ($smarty.section.r.index != 0 && $smarty.section.r.index != $inbox.pages)},{/if}
'file.php?file={$inbox.images[$smarty.section.r.index]}'
{/section});

	function startview () {literal}{{/literal}
		showDisplayedFax ('viewimagediv1', '{$LANG.PN_PAGE}', imagesArr);
	}

	addLoadEvent (startview);
// ]]>
</script>
{include file="footer.tpl"}