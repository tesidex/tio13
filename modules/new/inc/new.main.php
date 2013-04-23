<?php
/**
 * News display.
 *
 * @package new
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD License
 */

defined('COT_CODE') or die('Wrong URL');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('new', 'any');
cot_block($usr['auth_read']);

$id = cot_import('id', 'G', 'INT');
$al = $db->prep(cot_import('al', 'G', 'TXT'));
$c = cot_import('c', 'G', 'TXT');
$pg = cot_import('pg', 'G', 'INT');

/* === Hook === */
foreach (cot_getextplugins('new.first') as $pl)
{
	include $pl;
}
/* ===== */

if ($id > 0 || !empty($al))
{
	$where = (!empty($al)) ? "new_alias='".$al."'" : 'new_id='.$id;
	$sql_new = $db->query("SELECT p.*, u.* $join_columns
		FROM $db_news AS p $join_condition
		LEFT JOIN $db_users AS u ON u.user_id=p.new_ownerid
		WHERE $where LIMIT 1");
}

if(!$id && empty($al) || !$sql_new || $sql_new->rowCount() == 0)
{
	cot_die_message(404, TRUE);
}
$nws = $sql_new->fetch();

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin'], $usr['auth_download']) = cot_auth('new', $nws['new_cat'], 'RWA1');
cot_block($usr['auth_read']);

$al = empty($nws['new_alias']) ? '' : $nws['new_alias'];
$id = (int) $nws['new_id'];
$cat = $structure['new'][$nws['new_cat']];

$sys['sublocation'] = $nws['new_title'];

$nws['new_begin_noformat'] = $nws['new_begin'];
$nws['new_tab'] = empty($pg) ? 0 : $pg;
$nws['new_newurl'] = empty($al) ? cot_url('new', array('c' => $nws['new_cat'], 'id' => $id)) : cot_url('new', array('c' => $nws['new_cat'], 'al' => $al));

if (($nws['new_state'] == 1
		|| ($nws['new_state'] == 2)
		|| ($nws['new_begin'] > $sys['now'])
		|| ($nws['new_expire'] > 0 && $sys['now'] > $nws['new_expire']))
	&& (!$usr['isadmin'] && $usr['id'] != $nws['new_ownerid']))
{
	cot_log("Attempt to directly access an un-validated or future/expired new", 'sec');
	cot_die_message(403, TRUE);
}
if (mb_substr($nws['new_text'], 0, 6) == 'redir:')
{
	$env['status'] = '303 See Other';
	$redir = trim(str_replace('redir:', '', $nws['new_text']));
	$sql_new_update = $db->query("UPDATE $db_news SET new_filecount=new_filecount+1 WHERE new_id=$id");
	header('Location: ' . (preg_match('#^(http|ftp)s?://#', $redir) ? '' : COT_ABSOLUTE_URL) . $redir);
	exit;
}
elseif (mb_substr($nws['new_text'], 0, 8) == 'include:')
{
	$nws['new_text'] = cot_readraw('datas/html/'.trim(mb_substr($nws['new_text'], 8, 255)));
}
if ($nws['new_file'] && $a == 'dl' && (($nws['new_file'] == 2 && $usr['auth_download']) || $nws['new_file'] == 1))
{
	/* === Hook === */
	foreach (cot_getextplugins('new.download.first') as $pl)
	{
		include $pl;
	}
	/* ===== */

	// Hotlinking protection
	if ($_SESSION['dl'] != $id
		&& $_SESSION['cat'] != $nws['new_cat'])
	{
		cot_redirect($nws['new_newurl']);
	}

	unset($_SESSION['dl']);

	$file_size = @filesize($row['new_url']);
	if (!$usr['isadmin'] || $cfg['new']['count_admin'])
	{
		$nws['new_filecount']++;
		$sql_new_update = $db->query("UPDATE $db_news SET new_filecount=new_filecount+1 WHERE new_id=".$id);
	}
	$redir = (preg_match('#^(http|ftp)s?://#', $nws['new_url']) ? '' : COT_ABSOLUTE_URL) . $nws['new_url'];
	header('Location: ' . $redir);
	echo cot_rc('new_code_redir');
	exit;
}
if (!$usr['isadmin'] || $cfg['new']['count_admin'])
{
	$nws['new_count']++;
	$sql_new_update =  $db->query("UPDATE $db_news SET new_count='".$nws['new_count']."' WHERE new_id=$id");
}

if ($nws['new_cat'] == 'system')
{
	$out['subtitle'] = empty($nws['new_metatitle']) ? $nws['new_title'] : $nws['new_metatitle'];
}
else
{
	$title_params = array(
		'TITLE' => empty($nws['new_metatitle']) ? $nws['new_title'] : $nws['new_metatitle'],
		'CATEGORY' => $cat['title']
	);
	$out['subtitle'] = cot_title($cfg['new']['title_new'], $title_params);
}
$out['desc'] = empty($nws['new_metadesc']) ? strip_tags($nws['new_desc']) : strip_tags($nws['new_metadesc']);
$out['keywords'] = strip_tags($nws['new_keywords']);

// Building the canonical URL
$newurl_params = array('c' => $nws['new_cat']);
empty($al) ? $newurl_params['id'] = $id : $newurl_params['al'] = $al;
if ($pg > 0)
{
	$newurl_params['pg'] = $pg;
}
$out['canonical_uri'] = cot_url('new', $newurl_params);

$mskin = cot_tplfile(array('new', $cat['tpl']));

/* === Hook === */
foreach (cot_getextplugins('new.main') as $pl)
{
	include $pl;
}
/* ===== */

if ($nws['new_file'])
{
	unset($_SESSION['dl']);
	$_SESSION['dl'] = $id;
}

require_once $cfg['system_dir'] . '/header.php';
require_once cot_incfile('users', 'module');
$t = new XTemplate($mskin);

$t->assign(cot_generate_newtags($nws, 'NEW_', 0, $usr['isadmin'], $cfg['homebreadcrumb']));
$t->assign('NEW_OWNER', cot_build_user($nws['new_ownerid'], htmlspecialchars($nws['user_name'])));
$t->assign(cot_generate_usertags($nws, 'NEW_OWNER_'));

$nws['new_file'] = intval($nws['new_file']);
if ($nws['new_file'] > 0)
{
	if ($sys['now'] > $nws['new_begin'])
	{
		if (!empty($nws['new_url']))
		{
			$dotpos = mb_strrpos($nws['new_url'], ".") + 1;
			$type = mb_strtolower(mb_substr($nws['new_url'], $dotpos, 5));
			$nws['new_fileicon'] = cot_rc('new_icon_file_path');
			if (!file_exists($nws['new_fileicon']))
			{
				$nws['new_fileicon'] = cot_rc('new_icon_file_default');
			}
			$nws['new_fileicon'] = cot_rc('new_icon_file', array('icon' => $nws['new_fileicon']));
		}
		else
		{
			$nws['new_fileicon'] = '';
		}

		$t->assign(array(
			'NEW_FILE_SIZE' => $nws['new_size'] / 1024, // in KiB; deprecated but kept for compatibility
			'NEW_FILE_SIZE_BYTES' => $nws['new_size'],
			'NEW_FILE_SIZE_READABLE' => cot_build_filesize($nws['new_size'], 1),
			'NEW_FILE_COUNT' => $nws['new_filecount'],
			'NEW_FILE_ICON' => $nws['new_fileicon'],
			'NEW_FILE_NAME' => basename($nws['new_url']),
			'NEW_FILE_COUNTTIMES' => cot_declension($nws['new_filecount'], $Ls['Times'])
		));

		if (($nws['new_file'] === 2 && $usr['id'] == 0) || ($nws['new_file'] === 2 && !$usr['auth_download']))
		{
			$t->assign(array(
				'NEW_FILETITLE' => $L['Members_download'],
				'NEW_FILE_URL' => cot_url('users', 'm=register')
			));
		}
		else
		{
			$t->assign(array(
				'NEW_FILETITLE' => $nws['new_title'],
				'NEW_FILE_URL' => cot_url('new', array('c' => $nws['new_cat'], 'id' => $id, 'a' => 'dl'))
			));
		}
	}
}

// Multi tabs
$nws['new_tabs'] = explode('[newnew]', $t->vars['NEW_TEXT'], 99);
$nws['new_totaltabs'] = count($nws['new_tabs']);

if ($nws['new_totaltabs'] > 1)
{
	if (empty($nws['new_tabs'][0]))
	{
		$remove = array_shift($nws['new_tabs']);
		$nws['new_totaltabs']--;
	}
	$max_tab = $nws['new_totaltabs'] - 1;
	$nws['new_tab'] = ($nws['new_tab'] > $max_tab) ? 0 : $nws['new_tab'];
	$nws['new_tabtitles'] = array();

	for ($i = 0; $i < $nws['new_totaltabs']; $i++)
	{
		if (mb_strpos($nws['new_tabs'][$i], '<br />') === 0)
		{
			$nws['new_tabs'][$i] = mb_substr($nws['new_tabs'][$i], 6);
		}

		$p1 = mb_strpos($nws['new_tabs'][$i], '[title]');
		$p2 = mb_strpos($nws['new_tabs'][$i], '[/title]');

		if ($p2 > $p1 && $p1 < 4)
		{
			$nws['new_tabtitle'][$i] = mb_substr($nws['new_tabs'][$i], $p1 + 7, ($p2 - $p1) - 7);
			if ($i == $nws['new_tab'])
			{
				$nws['new_tabs'][$i] = trim(str_replace('[title]'.$nws['new_tabtitle'][$i].'[/title]', '', $nws['new_tabs'][$i]));
			}
		}
		else
		{
			$nws['new_tabtitle'][$i] = $i == 0 ? $nws['new_title'] : $L['News'] . ' ' . ($i + 1);
		}
		$tab_url = empty($al) ? cot_url('new', 'c='.$nws['new_cat'].'&id='.$id.'&pg='.$i) : cot_url('new', 'c='.$nws['new_cat'].'&al='.$al.'&pg='.$i);
		$nws['new_tabtitles'][] .= cot_rc_link($tab_url, ($i+1).'. '.$nws['new_tabtitle'][$i],
			array('class' => 'new_tabtitle'));
		$nws['new_tabs'][$i] = str_replace('[newnew]', '', $nws['new_tabs'][$i]);
		$nws['new_tabs'][$i] = preg_replace('#^(<br />)+#', '', $nws['new_tabs'][$i]);
		$nws['new_tabs'][$i] = trim($nws['new_tabs'][$i]);
	}

	$nws['new_tabtitles'] = implode('<br />', $nws['new_tabtitles']);
	$nws['new_text'] = $nws['new_tabs'][$nws['new_tab']];

	// Temporarily disable easynewnav to allow 0-based numbers
	$tmp = $cfg['easypagenav'];
	$cfg['easypagenav'] = false;
	$pn = cot_pagenav('new', (empty($al) ? 'id='.$id : 'al='.$al), $nws['new_tab'], $nws['new_totaltabs'], 1, 'pg');
	$nws['new_tabnav'] = $pn['main'];
	$cfg['easypagenav'] = $tmp;

	$t->assign(array(
		'NEW_MULTI_TABNAV' => $nws['new_tabnav'],
		'NEW_MULTI_TABTITLES' => $nws['new_tabtitles'],
		'NEW_MULTI_CURTAB' => $nws['new_tab'] + 1,
		'NEW_MULTI_MAXTAB' => $nws['new_totaltabs'],
		'NEW_TEXT' => $nws['new_text']
	));
	$t->parse('MAIN.NEW_MULTI');
}

/* === Hook === */
foreach (cot_getextplugins('new.tags') as $pl)
{
	include $pl;
}
/* ===== */
if ($usr['isadmin'] || $usr['id'] == $nws['new_ownerid'])
{
	$t->parse('MAIN.NEW_ADMIN');
}
if (($nws['new_file'] === 2 && $usr['id'] == 0) || ($nws['new_file'] === 2 && !$usr['auth_download']))
{
	$t->parse('MAIN.NEW_FILE.MEMBERSONLY');
}
else
{
	$t->parse('MAIN.NEW_FILE.DOWNLOAD');
}
if (!empty($nws['new_url']))
{
	$t->parse('MAIN.NEW_FILE');
}
$t->parse('MAIN');
$t->out('MAIN');

require_once $cfg['system_dir'] . '/footer.php';

if ($cache && $usr['id'] === 0 && $cfg['cache_new']
	&& (!isset($cfg['cache_new_blacklist']) || !in_array($nws['new_cat'], $cfg['cache_new_blacklist'])))
{
	$cache->new->write();
}
