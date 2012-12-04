{include file="header.tpl"}
{include file="div_top.tpl" div_size=80}
<h1 align="center">{$LANG.MENU_OUTBOX}</h1>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<th width='40'>JID</th>
		<th>{$LANG.PRIORITY}</th>
		<th>{$LANG.USER}</th>
		<th>{$LANG.CONTACT_HEADER_COMPANY}</th>
		<th>{$LANG.PN_PAGES}</th>
		<th>{$LANG.NUM_DIALS}</th>
		<th>TTS</th>
		<th>Status</th>
		<th>&nbsp;</th>
	</tr>
{section name=r loop=$queue}
	<tr align="center" class="highlight">
		<td>{$queue[r].jid}</td>
		<td>{$queue[r].pri}</td>
		<td>{$queue[r].user}</td>
		<td>{$queue[r].company}</td>
		<td>{$queue[r].pages}</td>
		<td>{$queue[r].dials}</td>
		<td>{$queue[r].tts}</td>
		<td>{$queue[r].status}</td>
		<td>
			<span title="{$LANG.MODIFY_FAXJOB}"><input type="button" value="&radic;" class="inputsubmit" id="fabtn_{$queue[r].jid}" onclick="dialogFaxAlter({$queue[r].jid},0,'{$queue[r].owner}')" /></span>
			<span title="{$LANG.KILL_JOB}"><input type="button" value="X" class="inputsubmit" onclick="if (confirm ('{$LANG.KILL_JOB} {$queue[r].jid}')) {literal}{{/literal}this.disabled = true; location.href='outbox.php?kill={$queue[r].jid}'{literal}}{/literal}" /></span>
		</td>
	</tr>
{/section}

{section name=r loop=$failed_queue}
	<tr align="center" class="highlight">
		<td>{$failed_queue[r].jid}</td>
		<td>{$failed_queue[r].pri}</td>
		<td>{$failed_queue[r].user}</td>
		<td>{$failed_queue[r].company}</td>
		<td>{$failed_queue[r].pages}</td>
		<td>{$failed_queue[r].dials}</td>
		<td>{$failed_queue[r].tts}</td>
		<td>{$failed_queue[r].status}</td>
		<td>
			<span title="{$LANG.MODIFY_FAXJOB}"><input type="button" value="&crarr;" class="inputsubmit" id="fabtn_{$failed_queue[r].jid}" onclick="dialogFaxAlter({$failed_queue[r].jid},1,'{$failed_queue[r].owner}')" /></span>
			<span title="{$LANG.KILL_JOB}"><input type="button" value="X" class="inputsubmit" onclick="if (confirm ('{$LANG.KILL_JOB} {$failed_queue[r].jid}')) {literal}{{/literal}this.disabled = true; location.href='outbox.php?kill={$failed_queue[r].jid}'{literal}}{/literal}" /></span>
		</td>
	</tr>
{/section}

</table>
<div align="center">{$queue_count} {$LANG.FAXES}</div>
{include file="div_bottom.tpl"}
{include file="footer.tpl"}