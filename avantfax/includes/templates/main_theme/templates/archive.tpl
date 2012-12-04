{include file="header.tpl"}
{include file="div_top.tpl" div_size=80}

<h1 align="center">{$LANG.MENU_ARCHIVE}</h1>

<form action="{$smarty.server.SCRIPT_NAME}" method="get">
<div class="archiveForm">
	<div class="archiveFormLeft">
		<p><label for="regexp">{$LANG.COMPANY_SEARCH}:</label> <input type="text" onkeyup="myfilter.query()" name="regexp" id="regexp" value="{$fvalues.regexp}" style="width: 25em; font-size: 0.9em" /></p>
		<p><label for="companyid">{$LANG.COMPANY_LIST}:</label> <select name="companyid" id="companyid" size="5" style="width: 25em; font-size: 0.9em"><option value=""></option></select></p>
		<p><label for="faxid">FaxID:</label> <input type="text" id="faxid" name="faxid" style="width:5em" value="{$fvalues.faxid}" /></p>
	</div>
	<div class="archiveFormRight">
		<p><label for="kw">{$LANG.KEYWORDS}:</label> <input type="text" name="kw" id="kw" style="width: 15em" value="{$fvalues.kw}" /></p>
		<p><label for="category2">{$LANG.CATEGORY}:</label> {html_options options=$category_list name="category" id="category2" selected=$fvalues.category}</p>		
{if $SUPERUSER}
		<p><label for="userid">{$LANG.USER}:</label> {html_options name="userid" id="userid" options=$user_list selected=$fvalues.userid}</p>
{/if}
		<p><label for="start_day">{$LANG.DATE_START}:</label> {html_options name="start_day" id="start_day" options=$day_list selected=$fvalues.start_day}&nbsp;{html_options name="start_month" options=$month_list selected=$fvalues.start_month}&nbsp;{html_options name="start_year" options=$year_list selected=$fvalues.start_year}</p>
		<p><label for="end_day">{$LANG.DATE_END}:</label> {html_options name="end_day" id="end_day" options=$day_list selected=$fvalues.end_day}&nbsp;{html_options name="end_month" options=$month_list selected=$fvalues.end_month}&nbsp;{html_options name="end_year" options=$year_list selected=$fvalues.end_year}</p>
		<p><label for="sentrecvd">{$LANG.SENT_RECVD}:</label> {html_options name="sentrecvd" id="sentrecvd" options=$sentrecvd_list selected=$fvalues.sentrecvd}</p>
	</div>
</div>

<div style="clear:both" align="center">
	<br />
	<input type="submit" class="inputsubmit" value="{$LANG.SEARCH_TITLE}" style="width: 15em" />&nbsp;<input type="reset" class="inputsubmit inputcancel" onclick="location.href='archive.php'" />
</div>

</form>

<br />

<div style="clear:both; margin-left:auto; margin-right:auto">
	<table border="0" width="{$WIDE_TABLE}%" align="right" cellpadding="0" cellspacing="0">
		<tr><td colspan="9" align="left">{$results_string}</td></tr>
		<tr>
			<th width="3%">#</th>
			<th width="14%"></th>
			<th align="left" width="20%">{$LANG.CONTACT_HEADER_COMPANY}</th>
			<th align="left" width="20%">{$LANG.DESCRIPTION}</th>
			<th>{$LANG.PN_PAGES}</th>
			<th>{$LANG.CATEGORY}</th>
			<th>{$LANG.DATE}</th>		
{if $SUPERUSER}
			<th>{$LANG.USER}</th>
{/if}
		</tr>
{section name=r loop=$archive}
		<tr class="previewimg" name="{$archive[r].thumbnail}" id="faxid_{$archive[r].faxid}">
			<td align="center" class="archive-results">{if $currentindex>0}{$smarty.section.r.index+$currentindex}{else}{$smarty.section.r.iteration}{/if}</td>
			<td align="left"><a href="javascript:mkpdfwin('pdf.php?fid={$archive[r].faxid}');"><img src="images/pdf-sm.png" border=0 title="{$LANG.DOWNLOAD_PDF}" /></a>
{if ($ENABLE_DL_TIFF && !$archive[r].userid)}
			<a href="file.php?file={$archive[r].tiffpath}" target="_blank"><img src="images/tiff-sm.png" border=0 title="{$LANG.DOWNLOAD_TIFF}" /></a>
{/if}
			<a href="refax.php?fid={$archive[r].faxid}"><img src="images/refax-sm.png" border=0 title="{$LANG.REPLY_TO_FAX}" /></a>
			<a href="email.php?fid={$archive[r].faxid}"><img src="images/email-sm.png" border=0 title="{$LANG.EMAIL_PDF}" /></a>
			<a href="javascript:dialogNote({$archive[r].faxid});"><img src="images/note-sm.png" border=0 title="{$LANG.ADD_NOTE_FAX}" /></a>
{if $SESSION_CAN_DEL}
			<a href="javascript:dialogDeleteFax({$archive[r].faxid},0);"><img src="images/remove-sm.png" alt="" title="{$LANG.DELETE_FAX}" /></a>
{/if}
			</td>
			<td align="left" class="archive-company">

{if ($archive[r].faxnum_loadby == "faxnumid")}
	{if ($archive[r].assign_type == "x" || !$archive.faxnum_cid)}
			<a href="javascript:mkwin('assignx.php?fid={$archive[r].faxid}');" title="{$LANG.ASSIGN_CNAME}">{$archive[r].company_name} <img src="images/contacts-sm.png" alt="" /></a>
	{elseif ($archive[r].assign_type == "c")}
			<a href="javascript:mkwin('assign.php?cid={$archive[r].faxnum_cid}');" title="{$LANG.ASSIGN_CNAME}">{$archive[r].company_name} {html_image file="images/contacts-sm.png"}</a>
	{else}
			<a href="addressbook.php?abook_id={$archive[r].faxnum_cid}">{$archive[r].company_name}</a>
	{/if}
{else}
	{if (is_array ($archive[r].mult_nums))}
			<form action="setcompany.php" method="post">
			{html_options name=faxnumid options=$archive[r].mult_nums}&nbsp;<input type="submit" class="inputsubmit" value="{$LANG.SELECT}" />
			<input type="hidden" name="fid" value="{$archive[r].faxid}" />
			</form>
	{elseif ($archive[r].assign_type == "c")}
			<a href="javascript:mkwin('assign.php?cid={$archive[r].faxnum_cid}');" title="{$LANG.ASSIGN_CNAME}">{$archive[r].company_name} {html_image file="images/contacts-sm.png"}</a>
	{else}
			<a href="addressbook.php?abook_id={$archive[r].faxnum_cid}">{$archive[r].company_name}</a>
	{/if}
{/if}
			</td>
			<td align="left" class="archive-description">{$archive[r].description}</td>
			<td align="center" class="archive-results">{$archive[r].pages}</td>
			<td align="center" class="archive-results">{$archive[r].faxcategory}</td>
			<td align="center" class="archive-results"><small>{$archive[r].archstamp}</small></td>
			
{if $SUPERUSER}
			<td align="center" class="archive-results">{$archive[r].archiveuser}</td>
{/if}
			<td align="center"><a href="javascript:mkpdfwin('txreport.php?fid={$archive[r].faxid}')">{if $archive[r].modemdev}<img src="images/rcvdfax.png" border=0 title="FaxID: {$archive[r].faxid} [{$archive[r].modemdev}]" />{else}<img src="images/sentfax.png" border=0 title="FaxID: {$archive[r].faxid}" />{/if}</a></td>
		</tr>
{sectionelse}
		<tr><td align="center" colspan="9"><br />{$LANG.NOKEYWORD}<br /><br /></td></tr>
{/section}
	</table>
    <div style="clear:both"></div>
</div>

<div id="faxpreview"></div>

<script language="javascript" type="text/javascript">
// <![CDATA[
	$('regexp').focus();
	var myfilter = new CompanyList ('companyid', 'regexp');
	myfilter.setSelected ({$fvalues.companyid});
	myfilter.allcontacts ({$SHOW_ALL_CONTACTS});
	myfilter.query();
// ]]>
</script>
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
			<a href="{$uri|replace:'XXPAGEINDEXXX':$prev}"><img src="images/stock_left.png" title="" align="absmiddle" /></a>
		{/if}
	{/if}
	
	{if $currentpage == $smarty.section.p.index}
		{$smarty.section.p.iteration}
	{else}
		<a href="{$uri|replace:'XXPAGEINDEXXX':$smarty.section.p.index}">{$smarty.section.p.iteration}</a>
	{/if}

	{if !$smarty.section.p.last}|{/if}

	{if $smarty.section.p.last}
		{if $currentpage == $smarty.section.p.index}
			<img src="images/stock_right.png" title="" align="absmiddle" />
		{else}
			{assign var=next value="`$currentpage+1`"}
			<a href="{$uri|replace:'XXPAGEINDEXXX':$next}"><img src="images/stock_right.png" title="" align="absmiddle" /></a>
		{/if}
	{/if}
{/section}
</div>
{/if}

{include file="footer.tpl"}