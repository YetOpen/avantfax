{include file="header.tpl"}

<div id="modem-status-div" align="center">
{assign var='len' value=$modemlist|@count}
{counter assign='cnt' print=false start=0}
{section name=r loop=$modemlist}
	<span class="modem-alias">{$modemlist[r].alias}</span> <span class="modem-status" id="{$modemlist[r].device}">[<span class="{$modemlist[r].status.class}">{$modemlist[r].status.status}</span>]</span>
	{counter}
	{if $cnt % 4 == 0}{counter start=0}<br />{/if}
{/section}
</div>

{assign var=mselectdim value="24"}
{if $numfaxesinbox}
<div align="center"><input type="checkbox" onClick="selectAllFaxes();" id="selectAll" /> <label for="selectAll">{$LANG.SELECT_ALL_FAXES}</label>&nbsp;&nbsp;&nbsp;<a href="javascript:archiveSelectedFaxes();"><img src="images/folder.png" align="absmiddle" width="{$mselectdim}" height="{$mselectdim}" alt="" title="{$LANG.ARCHIVE_FAX}" /></a>{if $SESSION_CAN_DEL}&nbsp;&nbsp;&nbsp;<a href="javascript:dialogDeleteSelectedFaxes();"><img src="images/remove.png" align="absmiddle" width="{$mselectdim}" height="{$mselectdim}" alt="" title="{$LANG.DELETE_FAX}" /></a>{/if}</div>
<br />
{/if}

{assign var=old_alias value=""}
{section name=r loop=$inbox}
{if $INBOX_LIST_MODEM}
	{if $inbox[r].modem_alias != $old_alias}
		{assign var=old_alias value=$inbox[r].modem_alias}
		{if $smarty.section.r.index}
			{include file="div_bottom.tpl"}
			<br />
		{/if}
		{include file="div_top.tpl" div_size=60}
	{/if}
{else}
	{if $smarty.section.r.index == 0}
		{include file="div_top.tpl" div_size=60}
	{/if}
{/if}

<div class="inbox_div" id="faxid_{$inbox[r].faxid}">
	<div class="inbox_thumbnail">
		<div class="inbox_thumbnail_container">
			<a href="viewfax.php?fid={$inbox[r].faxid}"><img src="{if $inbox[r].thumbnail}file.php?file={$inbox[r].thumbnail}{else}{$NOTHUMB}{/if}" style="border: 1px #FFCC99 dashed" title="{$LANG.PN_PAGE} 1 {$LANG.PN_OF} {$inbox[r].pages}" alt="" /></a>
		</div>
		<div class="inbox_checkbox"><input type="checkbox" name="removefax[]" value="{$inbox[r].faxid}" /></div>
	</div>
	<div class="inbox_content_div">
		<div class="inbox_data_div">
			<div class="inbox_from_date">
				{if ($inbox[r].faxnum_loadby == "faxnumid")}
					{if ($inbox[r].assign_type == "x" || !$inbox[r].faxnum_cid)}
						<a href="javascript:mkwin('assignx.php?fid={$inbox[r].faxid}');" title="{$LANG.ASSIGN_CNAME}">{$LANG.FROM}: {$inbox[r].company_name} <img src="images/contacts-sm.png" alt="" /></a>
					{elseif ($inbox[r].assign_type == "c")}
						<a href="javascript:mkwin('assign.php?cid={$inbox[r].faxnum_cid}');" title="{$LANG.ASSIGN_CNAME}">{$LANG.FROM}: {$inbox[r].company_name} {html_image file="images/contacts-sm.png"}</a>
					{else}
						<a href="addressbook.php?abook_id={$inbox[r].faxnum_cid}">{$LANG.FROM}</a>: {$inbox[r].company_name}
					{/if}
				{else}
					{if is_array ($inbox[r].mult_nums)}
						<form action="setcompany.php" method="post">
						{html_options name=faxnumid options=$inbox[r].mult_nums}&nbsp;<input type="submit" class="inputsubmit" value="{$LANG.SELECT}" />
						<input type="hidden" name="fid" value="{$inbox[r].faxid}" />
						<input type="hidden" name="_submit_check" value="1" />
						</form>
					{elseif ($inbox[r].assign_type == "c")}
						<a href="javascript:mkwin('assign.php?cid={$inbox[r].faxnum_cid}');" title="{$LANG.ASSIGN_CNAME}">{$LANG.FROM}: {$inbox[r].company_name} {html_image file="images/contacts-sm.png"}</a>
					{else}
						<a href="addressbook.php?abook_id={$inbox[r].faxnum_cid}">{$LANG.FROM}</a>: {$inbox[r].company_name}
					{/if}
				{/if}
				
				{if $inbox[r].description}&nbsp;- {$inbox[r].description}{/if}
				<br />{$LANG.DATE}: {$inbox[r].archstamp}
			</div>
			<div class="inbox_modem_pages">
			{if $ENABLE_DID_ROUTING}
				{$LANG.GROUP}: {$inbox[r].did_group|default:$LANG.DIDROUTE_CATCHALL}
			{else}
				{$LANG.MODEM_DEVICE}: {$inbox[r].modem_alias}
			{/if}
				<br />{$LANG.PN_PAGES}: {$inbox[r].pages}
			</div>
		</div>
		<div class="inbox_menu_div">
			<span class="inbox_item"><a href="viewfax.php?fid={$inbox[r].faxid}"><img src="images/viewfax.png" alt="" title="{$LANG.VIEW_FAX}" /></a></span>
			<span class="inbox_item"><a href="rotate.php?fid={$inbox[r].faxid}"><img src="images/rotate.png" alt="" title="{$LANG.ROTATE_FAX}" /></a></span>
			<span class="inbox_item"><a href="javascript:mkpdfwin('pdf.php?fid={$inbox[r].faxid}');"><img src="images/pdf.png" alt="" title="{$LANG.DOWNLOAD_PDF}" /></a></span>
{if $ENABLE_DL_TIFF}
			<span class="inbox_item"><a href="file.php?file={$inbox[r].tiffpath}" target="_blank"><img src="images/tiff.png" alt="" title="{$LANG.DOWNLOAD_TIFF}" /></a></span>
{/if}
			<span class="inbox_item"><a href="refax.php?fid={$inbox[r].faxid}"><img src="images/refax.png" alt="" title="{$LANG.REPLY_TO_FAX}" /></a></span>
			<span class="inbox_item"><a href="email.php?fid={$inbox[r].faxid}"><img src="images/email.png" alt="" title="{$LANG.EMAIL_PDF}" /></a></span>
			<span class="inbox_item"><a href="javascript:dialogNote({$inbox[r].faxid});"><img src="images/note.png" alt="" title="{$LANG.ADD_NOTE_FAX}" /></a></span>
			<span class="inbox_item"><a href="javascript:archiveFax({$inbox[r].faxid},0);"><img src="images/folder.png" alt="" title="{$LANG.ARCHIVE_FAX}" class="imgRoll images/folder-accept.png" /></a></span>
{if $SESSION_CAN_DEL}
			<span class="inbox_item"><a href="javascript:dialogDeleteFax({$inbox[r].faxid},0);"><img src="images/remove.png" alt="" title="{$LANG.DELETE_FAX}" class="imgRoll images/remove-full.png" /></a></span>
{/if}
		</div>
	</div>
	<div class="inbox_clear_div"></div>
</div>

{sectionelse}
	{include file="div_top.tpl" div_size=60}
{/section}

<div align="center">{if $numpages}{$currentindex} - {$currentmax} {/if}(<span id="inboxcount">{$numfaxesinbox}</span> {$LANG.FAXES})</div>
{include file="div_bottom.tpl"}

<br />

{if $numpages}
<div align="center">
{section name=p loop=$numpages}
	{if $smarty.section.p.first}
		{if $currentpage == 0}
			<img src="images/stock_left.png" title="" align="absmiddle" />
		{else}
			{assign var=prev value="`$currentpage-1`"}
			<a href="inbox.php?pageindex={$prev}"><img src="images/stock_left.png" title="" align="absmiddle" /></a>
		{/if}
	{/if}
	{if $currentpage == $smarty.section.p.index}
		{$smarty.section.p.iteration}
	{else}
		<a href="inbox.php?pageindex={$smarty.section.p.index}">{$smarty.section.p.iteration}</a>
	{/if}

	{if !$smarty.section.p.last}|{/if}

	{if $smarty.section.p.last}
		{if $currentpage == $smarty.section.p.index}
			<img src="images/stock_right.png" title="" align="absmiddle" />
		{else}
			{assign var=next value="`$currentpage+1`"}
			<a href="inbox.php?pageindex={$next}"><img src="images/stock_right.png" title="" align="absmiddle" /></a>
		{/if}
	{/if}
{/section}
</div>
{/if}

<script type="text/javascript" language="javascript">
// <![CDATA[
	function initInbox () {literal}{{/literal}
		checkInbox ({$numfaxesinbox});
	}
	
	addLoadEvent (initInbox);
	
{if $FOCUS_ON_NEW_FAX}
	InboxTakeFocus = true;
{/if}
{if $FOCUS_ON_NEW_FAX_POPUP}
	InboxDoPopupNewFax = true;
{/if}
// ]]>
</script>
{include file="footer.tpl"}