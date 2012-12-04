{include file="header.tpl"}
<h1 align="center">{$LANG.ADMIN_SYSFUNC}</h1>

<div id="main-content" align="center">
{html_image file="../images/system-halt.png"}
{if $reboot}
<p>{$LANG.REBOOT}... {$LANG.PLSWAIT}</p>
{elseif $shutdown}
<p>{$LANG.SHUTDOWN}... {$LANG.PLSWAIT}</p>
{else}
<br /><br /><br />
<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<input type="submit" class="inputsubmit" name="reboot" value="{$LANG.REBOOT}" />&nbsp;
<input type="submit" class="inputsubmit" name="shutdown" value="{$LANG.SHUTDOWN}" />

<br /><br /><br />
{html_image file="../images/system-download.png"}
<br /><br />
<input type="submit" class="inputsubmit" name="download_ar" value="{$LANG.DOWNLOADARCHIVE}" />&nbsp;
<input type="submit" class="inputsubmit" name="download_db" value="{$LANG.DOWNLOADDB}" />

<input type="hidden" name="_submit_check" value="1" />
</form>
{/if}
</div>

{include file="footer.tpl"}