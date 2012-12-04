{include file="header.tpl"}
<h1 align="center">{$LANG.ADMIN_DASHBOARD}</h1>
<div id="main-content">
    <table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<th align="left">{$LANG.NAME}</th>
			<th>{html_image file='../images/su.gif'}</th>
			<th align="left">{$LANG.USERNAME}</th>
			<th>{$LANG.ADMIN_LAST_LOGIN}</th>
			<th>{$LANG.ADMIN_LAST_IP}</th>
			<th>{$LANG.CONTACT_HEADER_EMAIL}</th>
		</tr>
{if is_array($users)}
	{section name=r loop=$users}
		<tr class="highlight">
			<td><a href="users.php?uid={$users[r].uid}">{$users[r].name}</a></td>
			<td>{if ($users[r].superuser)}{html_image file='../images/su.gif'}{/if}</td>
			<td>{$users[r].username}</td>
			<td align="center"><small>{$users[r].last_login}</small></td>
			<td align="center"><small>{$users[r].last_ip}</small></td>
			<td align="center"><a href="mailto:{$users[r].email}">{$users[r].email}</a></td>
		</tr>
	{sectionelse}
		<p align="center"><input type="button" onclick="location.href='users.php'" value="{$LANG.ADMIN_NEW_USER}" class="inputsubmit" /></p>
	{/section}
	</table>
	<div align="center"><br /><small>{$users|@count} {$LANG.ADMIN_USERS}</small></div>
{else}
	<div align="center">{$LANG.ADMIN_NOUSERS}&nbsp;<a href="user_new.php">{$LANG.ADMIN_NEW_USER}</a></div>
{/if}
    <br />
    <p>HylaFAX&trade; version: <strong>{$hylafax}</strong></p>
	<div id="modem-status-div">
{section name=r loop=$modems}
		<p class="modem-alias">{$modems[r].alias}</span> [<span class="{$modems[r].status.class}" id="{$modemlist[r].device}">{$modems[r].status.status}</span>]</p>
{/section}
	</div>
</div>
{include file="footer.tpl"}