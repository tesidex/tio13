<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=tools
[END_COT_EXT]
==================== */

/**
 * BBcode management interface
 *
 * @package bbcode
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2012
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('bbcode', 'plug');

$bb_t = new XTemplate(cot_tplfile('bbcode.admin', 'plug', true));

$out['subtitle'] = $L['adm_bbcodes'];
$adminhelp = $L['adm_help_bbcodes'];

$a = cot_import('a', 'G', 'ALP');
$id = (int) cot_import('id', 'G', 'INT');
list($pg, $d, $durl) = cot_import_pagenav('d', $cfg['maxrowsperpage']);

/* === Hook === */
foreach (cot_getextplugins('bbcode.admin.first') as $pl)
{
	include $pl;
}
/* ===== */

if ($a == 'add')
{
	$bbc['name'] = cot_import('bbc_name', 'P', 'ALP');
	$bbc['mode'] = cot_import('bbc_mode', 'P', 'ALP');
	$bbc['pattern'] = cot_import('bbc_pattern', 'P', 'HTM');
	$bbc['priority'] = cot_import('bbc_priority', 'P', 'INT');
	$bbc['container'] = cot_import('bbc_container', 'P', 'BOL');
	$bbc['replacement'] = cot_import('bbc_replacement', 'P', 'HTM');
	$bbc['postrender'] = cot_import('bbc_postrender', 'P', 'BOL');
	if (!empty($bbc['name']) && !empty($bbc['pattern']) && !empty($bbc['replacement']))
	{
		cot_bbcode_clearcache();
		cot_bbcode_add($bbc['name'], $bbc['mode'], $bbc['pattern'], $bbc['replacement'], $bbc['container'], $bbc['priority'], '', $bbc['postrender'])
				? cot_message('adm_bbcodes_added') : cot_message('Error');
	}
	else
	{
		cot_message('Error');
	}
}
elseif ($a == 'upd' && $id > 0)
{
	$bbc['name'] = cot_import('bbc_name', 'P', 'ALP');
	$bbc['mode'] = cot_import('bbc_mode', 'P', 'ALP');
	$bbc['pattern'] = cot_import('bbc_pattern', 'P', 'HTM');
	$bbc['priority'] = cot_import('bbc_priority', 'P', 'INT');
	$bbc['container'] = cot_import('bbc_container', 'P', 'BOL');
	$bbc['replacement'] = cot_import('bbc_replacement', 'P', 'HTM');
	$bbc['postrender'] = cot_import('bbc_postrender', 'P', 'BOL');
	$bbc['enabled'] = cot_import('bbc_enabled', 'P', 'BOL');
	if(!empty($bbc['name']) && !empty($bbc['pattern']) && !empty($bbc['replacement']))
	{
		cot_bbcode_clearcache();
		cot_bbcode_update($id, $bbc['enabled'], $bbc['name'], $bbc['mode'], $bbc['pattern'], $bbc['replacement'], $bbc['container'], $bbc['priority'], $bbc['postrender'])
			? cot_message('adm_bbcodes_updated') : cot_message('Error');
	}
	else
	{
		cot_message('Error');
	}
}
elseif ($a == 'del' && $id > 0)
{
	cot_bbcode_clearcache();
	cot_bbcode_remove($id) ? cot_message('adm_bbcodes_removed') : cot_message('Error');
}
elseif ($a == 'clearcache')
{
	cot_bbcode_clearcache();
	cot_message('adm_bbcodes_clearcache_done');
}
elseif ($a == 'convert')
{
	// Convert from BBcode to HTML
	if ($b == 'page')
	{
		require_once cot_incfile('page', 'module');
		// Attempt to override from HTML cache
		if ($db->fieldExists($db_pages, 'page_html'))
		{
			$db->query("UPDATE $db_pages SET page_text = page_html, page_parser = 'html' WHERE page_html != '' AND page_parser = 'bbcode'");
			$db->query("ALTER TABLE $db_pages DROP COLUMN page_html");
		}
		// Update manually
		$res = $db->query("SELECT page_text, page_id FROM $db_pages WHERE page_parser = 'bbcode'");
		while ($row = $res->fetch())
		{
			$html = cot_parse_bbcode($row['page_text']);
			$db->update($db_pages, array('page_text' => $html, 'page_parser' => 'html'), 'page_id = ' . $row['page_id']);
		}
		$res->closeCursor();
		cot_message('adm_bbcodes_convert_complete');
	}
	elseif ($b == 'forums')
	{
		require_once cot_incfile('forums', 'module');
		// Attempt to override from HTML cache
		if ($db->fieldExists($db_forum_posts, 'fp_html'))
		{
			$db->query("UPDATE $db_forum_posts SET fp_text = fp_html WHERE fp_html != ''");
			$res = $db->query("SELECT fp_text, fp_id FROM $db_forum_posts WHERE fp_html = ''");
			$has_html = true;
		}
		else
		{
			// Update manually
			// This may fail if there are too many posts in the database
			$res = $db->query("SELECT fp_text, fp_id FROM $db_forum_posts");
			$has_html = false;
		}
		while ($row = $res->fetch())
		{
			$html = cot_parse_bbcode($row['fp_text']);
			$db->update($db_forum_posts, array('fp_text' => $html), 'fp_id = ' . $row['fp_id']);
		}
		$res->closeCursor();
		if ($has_html)
		{
			// Drop HTML cache
			$db->query("ALTER TABLE $db_forum_posts DROP COLUMN fp_html");
		}
		cot_message('adm_bbcodes_convert_complete');
	}
	elseif ($b == 'comments')
	{
		require_once cot_incfile('comments', 'plug');
		// Attempt to override from HTML cache
		if ($db->fieldExists($db_com, 'com_html'))
		{
			$db->query("UPDATE $db_com SET com_text = com_html WHERE com_html != ''");
			$res = $db->query("SELECT com_text, com_id FROM $db_com WHERE com_html = ''");
			$has_html = true;
		}
		else
		{
			// Update manually
			$res = $db->query("SELECT com_text, com_id FROM $db_com");
			$has_html = false;
		}
		while ($row = $res->fetch())
		{
			$html = cot_parse_bbcode($row['com_text']);
			$db->update($db_pm, array('com_text' => $html), 'com_id = ' . $row['com_id']);
		}
		$res->closeCursor();
		if ($has_html)
		{
			// Drop HTML cache
			$db->query("ALTER TABLE $db_com DROP COLUMN com_html");
		}
		cot_message('adm_bbcodes_convert_complete');
	}
	elseif ($b == 'pm')
	{
		require_once cot_incfile('pm', 'module');
		// Attempt to override from HTML cache
		if ($db->fieldExists($db_pm, 'pm_html'))
		{
			$db->query("UPDATE $db_pm SET pm_text = pm_html WHERE pm_html != ''");
			$res = $db->query("SELECT pm_text, pm_id FROM $db_pm WHERE pm_html = ''");
			$has_html = true;
		}
		else
		{
			// Update manually
			$res = $db->query("SELECT pm_text, pm_id FROM $db_pm");
			$has_html = false;
		}
		while ($row = $res->fetch())
		{
			$html = cot_parse_bbcode($row['pm_text']);
			$db->update($db_pm, array('pm_text' => $html), 'pm_id = ' . $row['pm_id']);
		}
		$res->closeCursor();
		if ($has_html)
		{
			// Drop HTML cache
			$db->query("ALTER TABLE $db_pm DROP COLUMN pm_html");
		}
		cot_message('adm_bbcodes_convert_complete');
	}
	elseif ($b == 'users')
	{
		$res = $db->query("SELECT user_text, user_id FROM $db_users");
		while ($row = $res->fetch())
		{
			$html = cot_parse_bbcode($row['user_text']);
			$db->update($db_users, array('user_text' => $html), 'user_id = ' . $row['user_id']);
		}
		$res->closeCursor();
		cot_message('adm_bbcodes_convert_complete');
	}
}

$totalitems = $db->countRows($db_bbcode);

// FIXME AJAX-based pagination doesn't work because of some strange PHP bug
// Xtpl_block->text() returns 'str' instead of a long string which it has in $text
//$pagenav = cot_pagenav('admin', 'm=other&p=bbcode', $d, $totalitems, $cfg['maxrowsperpage'], 'd', '', $cfg['jquery'] && $cfg['turnajax']);
$pagenav = cot_pagenav('admin', 'm=other&p=bbcode', $d, $totalitems, $cfg['maxrowsperpage'], 'd');

$bbc_modes = array('str', 'pcre', 'callback');
$res = $db->query("SELECT * FROM $db_bbcode ORDER BY bbc_priority LIMIT $d, ".$cfg['maxrowsperpage']);



$ii = 0;
/* === Hook - Part1 : Set === */
$extp = cot_getextplugins('bbcode.admin.loop');
/* ===== */
foreach ($res->fetchAll() as $row)
{

	$bb_t->assign(array(
		'ADMIN_BBCODE_ROW_NAME' => cot_inputbox('text', 'bbc_name', $row['bbc_name']),
		'ADMIN_BBCODE_ROW_ENABLED' => cot_checkbox($row['bbc_enabled'], 'bbc_enabled'),
		'ADMIN_BBCODE_ROW_CONTAINER' => cot_checkbox($row['bbc_container'], 'bbc_container'),
		'ADMIN_BBCODE_ROW_PATTERN' => cot_textarea('bbc_pattern', $row['bbc_pattern'], 2, 20),
		'ADMIN_BBCODE_ROW_REPLACEMENT' => cot_textarea('bbc_replacement', $row['bbc_replacement'], 2, 20),
		'ADMIN_BBCODE_ROW_PLUG' => $row['bbc_plug'],
		'ADMIN_BBCODE_ROW_MODE' => cot_selectbox($row['bbc_mode'], 'bbc_mode', $bbc_modes, $bbc_modes, false),
		'ADMIN_BBCODE_ROW_PRIO' => cot_selectbox($row['bbc_priority'], 'bbc_priority', range(1, 256), range(1, 256), false),
		'ADMIN_BBCODE_ROW_POSTRENDER' => cot_checkbox($row['bbc_postrender'], 'bbc_postrender'),
		'ADMIN_BBCODE_ROW_UPDATE_URL' => cot_url('admin', 'm=other&p=bbcode&a=upd&id='.$row['bbc_id'].'&d='.$durl),
		'ADMIN_BBCODE_ROW_DELETE_URL' => cot_url('admin', 'm=other&p=bbcode&a=del&id='.$row['bbc_id']),
		'ADMIN_BBCODE_ROW_ODDEVEN' => cot_build_oddeven($ii)
	));

	/* === Hook - Part2 : Include === */
	foreach ($extp as $pl)
	{
		include $pl;
	}
	/* ===== */

	$bb_t->parse('MAIN.ADMIN_BBCODE_ROW');
	$ii++;
}
$res->closeCursor();

$bb_t->assign(array(
	'ADMIN_BBCODE_PAGINATION_PREV' => $pagenav['prev'],
	'ADMIN_BBCODE_PAGNAV' => $pagenav['main'],
	'ADMIN_BBCODE_PAGINATION_NEXT' => $pagenav['next'],
	'ADMIN_BBCODE_TOTALITEMS' => $totalitems,
	'ADMIN_BBCODE_COUNTER_ROW' => $ii,
	'ADMIN_BBCODE_FORM_ACTION' => cot_url('admin', 'm=other&p=bbcode&a=add'),
	'ADMIN_BBCODE_NAME' => cot_inputbox('text', 'bbc_name', ''),
	'ADMIN_BBCODE_ENABLED' => cot_checkbox('', 'bbc_enabled'),
	'ADMIN_BBCODE_CONTAINER' => cot_checkbox(1, 'bbc_container'),
	'ADMIN_BBCODE_PATTERN' => cot_textarea('bbc_pattern', '', 2, 20),
	'ADMIN_BBCODE_REPLACEMENT' => cot_textarea('bbc_replacement', '', 2, 20),
	'ADMIN_BBCODE_MODE' => cot_selectbox('pcre', 'bbc_mode', $bbc_modes, $bbc_modes, false),
	'ADMIN_BBCODE_PRIO' => cot_selectbox('128', 'bbc_priority', range(1, 256), range(1, 256), false),
	'ADMIN_BBCODE_POSTRENDER' => cot_checkbox('0', 'bbc_postrender'),
	'ADMIN_BBCODE_URL_CLEAR_CACHE' => cot_url('admin', 'm=other&p=bbcode&a=clearcache&d='.$durl)
));

// HTML conversion links
if (cot_module_active('page'))
{
	$bb_t->assign(array(
		'ADMIN_BBCODE_CONVERT_URL' => cot_url('admin', 'm=other&p=bbcode&a=convert&b=page'),
		'ADMIN_BBCODE_CONVERT_TITLE' => $L['adm_bbcodes_convert_page']
	));
	$bb_t->parse('MAIN.ADMIN_BBCODE_CONVERT');
}
if (cot_module_active('forums'))
{
	$bb_t->assign(array(
		'ADMIN_BBCODE_CONVERT_URL' => cot_url('admin', 'm=other&p=bbcode&a=convert&b=forums'),
		'ADMIN_BBCODE_CONVERT_TITLE' => $L['adm_bbcodes_convert_forums']
	));
	$bb_t->parse('MAIN.ADMIN_BBCODE_CONVERT');
}
if (cot_plugin_active('comments'))
{
	$bb_t->assign(array(
		'ADMIN_BBCODE_CONVERT_URL' => cot_url('admin', 'm=other&p=bbcode&a=convert&b=comments'),
		'ADMIN_BBCODE_CONVERT_TITLE' => $L['adm_bbcodes_convert_comments']
	));
	$bb_t->parse('MAIN.ADMIN_BBCODE_CONVERT');
}
if (cot_module_active('pm'))
{
	$bb_t->assign(array(
		'ADMIN_BBCODE_CONVERT_URL' => cot_url('admin', 'm=other&p=bbcode&a=convert&b=pm'),
		'ADMIN_BBCODE_CONVERT_TITLE' => $L['adm_bbcodes_convert_pm']
	));
	$bb_t->parse('MAIN.ADMIN_BBCODE_CONVERT');
}
//if (cot_module_active('users'))
//{
$bb_t->assign(array(
	'ADMIN_BBCODE_CONVERT_URL' => cot_url('admin', 'm=other&p=bbcode&a=convert&b=users'),
	'ADMIN_BBCODE_CONVERT_TITLE' => $L['adm_bbcodes_convert_users']
));
$bb_t->parse('MAIN.ADMIN_BBCODE_CONVERT');
//}

cot_display_messages($bb_t);

/* === Hook  === */
foreach (cot_getextplugins('bbcode.admin.tags') as $pl)
{
	include $pl;
}
/* ===== */
$bb_t->parse('MAIN');
$plugin_body = $bb_t->text('MAIN');

?>
