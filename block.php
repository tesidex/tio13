<?php

defined('COT_CODE') or die('Wrong URL');

/* ====================
  [BEGIN_COT_EXT]
  Hooks=index.tags
  Tags=index.tpl:{INDEX_BLOCK}
  [END_COT_EXT]
  ==================== */

/**
 * Pick up pages from a category and display the newest in the home page
 *
 * @package block
 * @version 0.9.13
 * @author tesidex Team
 * @copyright Copyright (c) tesidex 2008-2013
 * @license BSD
 */
require_once cot_incfile('page', 'module');
require_once cot_incfile('new', 'module');
require_once cot_langfile('block', 'plug');

list($pg, $d, $durl) = cot_import_pagenav('d',
	$cfg['plugin']['block']['maxpages']);
$c = cot_import('c', 'G', 'TXT');
$c = (!isset($structure['page'][$c])) ? '' : $c;

$cfg['plugin']['block']['category'] = 'blogs|4|150,newspaper|4|150';
$categories = explode(',', $cfg['plugin']['block']['category']);
$jj = 0;
$cats = array();


foreach ($categories as $v) {
    $v = explode('|', trim($v));
    if (isset($structure['page'][$v[0]])) {
	$c = (empty($c)) ? $v[0] : $c;
	$indexcat = ($jj == 0) ? $v[0] : $indexcat;

	$v[2] = ((int) $v[2] > 0) ? $v[2] : (int) $cfg['page']['cat_' . $v[0]]['truncatetext'];
	$v[1] = ((int) $v[1] > 0) ? $v[1] : (int) $cfg['plugin']['block']['maxpages'];

	$_GET[$v[0] . 'd'] = (empty($c) || ($jj == 0) || $cfg['plugin']['block']['syncpagination'])
		    ? $_GET['d'] : $_GET[$v[0] . 'd'];
	list($v[3]['pg'], $v[3]['d'], $v[3]['durl']) = cot_import_pagenav($v[0] . 'd',
		$v[1]);

	$cats[$v[0]] = $v;
	$jj++;
    }
}
//cot_print($cats);

/* === Hook - Part1 : Set === FIRST === */
$block_first_extp = cot_getextplugins('block.first');
/* === Hook - Part1 : Set === LOOP === */
$block_extp = cot_getextplugins('block.loop');
/* === Hook - Part1 : Set === TAGS === */
$block_tags_extp = cot_getextplugins('block.tags');
/* ===== */
$catn = 1;

foreach ($cats as $k => $v) {
    $cat = ($catn == 0) ? $c : $v[0];
//				cot_print($cat);

    $tagname = str_replace(array(' ', ',', '.', '-'), '_', strtoupper($v[0]));

    // Cache for guests
    if ($usr['id'] == 0 && $cache && (int) $cfg['plugin']['block']['cache_ttl'] > 0) {
	$block_cache_id = "$theme.$lang.$cat." . $v[3]['d']; // Includes theme, lang, category and current page
	$block_html = $cache->disk->get($block_cache_id, 'block',
		(int) $cfg['plugin']['block']['cache_ttl']);
	if (!is_null($block_html)) {
	    $t->assign(($catn == 0) ? 'INDEX_BLOCK' : 'INDEX_BLOCK_' . $tagname,
		    $block_html);
	    continue;
	}
    }

    $catsub = cot_structure_children('page', $cat);
    $where = "page_state = 0 AND page_cat <> 'system' AND page_begin <= {$sys['now']} AND (page_expire = 0 OR page_expire > {$sys['now']}) AND page_cat IN ('" . implode("','",
		    $catsub) . "')";

    $block_link_params = ($c != $indexcat) ? "c=" . $c : '';
    $block_join_columns = '';
    $block_join_tables = '';
    /* === Hook - Part2 : Include === FIRST === */
    foreach ($block_first_extp as $pl) {
	include $pl;
    }
    /* ===== */

    $sql = $db->query("SELECT p.*, u.* $block_join_columns
			FROM $db_pages AS p LEFT JOIN $db_users AS u ON u.user_id=p.page_ownerid $block_join_tables
			WHERE $where ORDER BY page_date DESC LIMIT " . $v[3]['d'] . ", " . $v[1]);
    $totalblock = $db->query("SELECT COUNT(*)
			FROM $db_pages AS p $block_join_tables WHERE " . $where)->fetchColumn();

    if ($v[3]['d'] < 0 || $totalblock > 0 && $v[3]['d'] > $totalblock) {
	cot_die_message(404);
    }

    if (!$cfg['plugin']['block']['syncpagination']) {
	$block_link_params .= ($catn != 0 && $d != 0) ? '&d=' . $durl : '';
	$xx = 0;
	foreach ($cats as $key => $var) {
	    $block_link_params .= (($key != $cat) && $var[3] != 0 && $xx != 0) ? "&" . $key . "d=" . $var[3]['durl']
			: '';
	    $xx++;
	}
    }

    $block_link = cot_url('index', $block_link_params);
    $catd = ($catn != 0 && !$cfg['plugin']['block']['syncpagination']) ? $cat . "d"
		: "d";
    $pagenav = cot_pagenav('index', $block_link_params, $v[3]['d'], $totalblock,
	    $v[1], $catd);
    $filename = str_replace(array(' ', ',', '.', '-'), '_', $v[0]);
    $block = new XTemplate(cot_tplfile(($catn == 0) ? "block" : "block." . $filename,
			    'plug'));
    $sql_rowset = $sql->fetchAll();

    $jj = 0;
    foreach ($sql_rowset as $pag) {
	$jj++;
	$url = cot_url('index', 'c=' . $pag['page_cat']);
	$block->assign(cot_generate_pagetags($pag, 'PAGE_ROW_', $v[2]));
	$block->assign(array(
	    'PAGE_ROW_BLOCKPATH' => cot_rc_link($url,
		    htmlspecialchars($structure['page'][$row['page_cat']]['title'])),
	    'PAGE_ROW_BLOCKPATH_URL' => $url,
	    'PAGE_ROW_CATDESC' => htmlspecialchars($structure['page'][$pag['page_cat']]['desc']),
	    'PAGE_ROW_OWNER' => cot_build_user($pag['page_ownerid'],
		    htmlspecialchars($pag['user_name'])),
	    'PAGE_ROW_ODDEVEN' => cot_build_oddeven($jj),
	    'PAGE_ROW_NUM' => $jj
	));
	$block->assign(cot_generate_usertags($pag, 'PAGE_ROW_OWNER_'));

	/* === Hook - Part2 : Include === LOOP === */
	foreach ($block_extp as $pl) {
	    include $pl;
	}
	/* ===== */

	$block->parse('BLOCK.PAGE_ROW');
    }

    $url_newpage = cot_url('page', 'm=add&c=' . $cat);
    $block->assign(array(
	'PAGE_PAGENAV' => $pagenav['main'],
	'PAGE_PAGEPREV' => $pagenav['prev'],
	'PAGE_PAGENEXT' => $pagenav['next'],
	'PAGE_PAGELAST' => $pagenav['last'],
	'PAGE_PAGENUM' => $pagenav['current'],
	'PAGE_PAGECOUNT' => $pagenav['total'],
	'PAGE_ENTRIES_ONPAGE' => $pagenav['onpage'],
	'PAGE_ENTRIES_TOTAL' => $pagenav['entries'],
	'PAGE_SUBMITNEWPOST' => (cot_auth('page', $cat, 'W')) ? cot_rc_link($url_newpage,
			$L['Submitnew']) : '',
	'PAGE_SUBMITNEWPOST_URL' => (cot_auth('page', $cat, 'W')) ? $url_newpage : '',
	'PAGE_CATTITLE' => $structure['page'][$cat]['title'],
	'PAGE_CATPATH' => cot_breadcrumbs(cot_structure_buildpath('page', $cat), false),
	'PAGE_CAT' => $cat
    ));

    /* === Hook - Part2 : Include === TAGS === */
    foreach ($block_tags_extp as $pl) {
	include $pl;
    }
    /* ===== */

    $block->parse('BLOCK');
    $block_html = $block->text('BLOCK');
    // Cache for guests
    if ($usr['id'] == 0 && $cache && (int) $cfg['plugin']['block']['cache_ttl'] > 0) {
	$cache->disk->store($block_cache_id, $block_html, 'block');
    }
    $t->assign(($catn == 0) ? 'INDEX_BLOCK' : 'INDEX_BLOCK_' . $tagname,
	    $block_html);
    $catn++;
}

// ==========================================================



$cfg['plugin']['block']['category'] = 'otzyvy|4|150,vitrina-turov|4|150,novosti|4|150,turbiznes|4|150,obyavleniya|4|150';
$categories = explode(',', $cfg['plugin']['block']['category']);
$catn = 1; // 0 для самых главных новостей сверху
$jj = 0;
$cats = array();
unset($c);

foreach ($categories as $v) {
    $v = explode('|', trim($v));
    if (isset($structure['new'][$v[0]])) {
	$c = (empty($c)) ? $v[0] : $c;
	$indexcat = ($jj == 0) ? $v[0] : $indexcat;

	$v[2] = ((int) $v[2] > 0) ? $v[2] : (int) $cfg['new']['cat_' . $v[0]]['truncatetext'];
	$v[1] = ((int) $v[1] > 0) ? $v[1] : (int) $cfg['plugin']['block']['maxpages'];

	$_GET[$v[0] . 'd'] = (empty($c) || ($jj == 0) || $cfg['plugin']['block']['syncpagination'])
		    ? $_GET['d'] : $_GET[$v[0] . 'd'];
	list($v[3]['pg'], $v[3]['d'], $v[3]['durl']) = cot_import_pagenav($v[0] . 'd',
		$v[1]);

	$cats[$v[0]] = $v;
	$jj++;
    }
}
//cot_print($cats);
foreach ($cats as $k => $v) {
    $cat = ($catn == 0) ? $c : $v[0];
    $tagname = str_replace(array(' ', ',', '.', '-'), '_', strtoupper($v[0]));
    // Cache for guests
    if ($usr['id'] == 0 && $cache && (int) $cfg['plugin']['block']['cache_ttl'] > 0) {
	$block_cache_id = "$theme.$lang.$cat." . $v[3]['d']; // Includes theme, lang, category and current page
	$block_html = $cache->disk->get($block_cache_id, 'block',
		(int) $cfg['plugin']['block']['cache_ttl']);
	if (!is_null($block_html)) {
	    $t->assign(($catn == 0) ? 'INDEX_BLOCK' : 'INDEX_BLOCK_' . $tagname,
		    $block_html);
	    continue;
	}
    }

    $catsub = cot_structure_children('new', $cat);
    $where = "new_state = 0 AND new_cat <> 'system' AND new_begin <= {$sys['now']} AND (new_expire = 0 OR new_expire > {$sys['now']}) AND new_cat IN ('" . implode("','",
		    $catsub) . "')";

    $block_link_params = ($c != $indexcat) ? "c=" . $c : '';
    $block_join_columns = '';
    $block_join_tables = '';
    /* === Hook - Part2 : Include === FIRST === */
    foreach ($block_first_extp as $pl) {
	include $pl;
    }
    /* ===== */

    $sql = $db->query("SELECT p.*, u.* $block_join_columns
			FROM $db_news AS p LEFT JOIN $db_users AS u ON u.user_id=p.new_ownerid $block_join_tables
			WHERE $where ORDER BY new_date DESC LIMIT " . $v[3]['d'] . ", " . $v[1]);
    $totalblock = $db->query("SELECT COUNT(*)
			FROM $db_news AS p $block_join_tables WHERE " . $where)->fetchColumn();

    if ($v[3]['d'] < 0 || $totalblock > 0 && $v[3]['d'] > $totalblock) {
	cot_die_message(404);
    }

    if (!$cfg['plugin']['block']['syncpagination']) {
	$block_link_params .= ($catn != 0 && $d != 0) ? '&d=' . $durl : '';
	$xx = 0;
	foreach ($cats as $key => $var) {
	    $block_link_params .= (($key != $cat) && $var[3] != 0 && $xx != 0) ? "&" . $key . "d=" . $var[3]['durl']
			: '';
	    $xx++;
	}
    }

    $block_link = cot_url('index', $block_link_params);
    $catd = ($catn != 0 && !$cfg['plugin']['block']['syncpagination']) ? $cat . "d"
		: "d";
    $pagenav = cot_pagenav('index', $block_link_params, $v[3]['d'], $totalblock,
	    $v[1], $catd);
    $filename = str_replace(array(' ', ',', '.', '-'), '_', $v[0]);
    $block = new XTemplate(cot_tplfile(($catn == 0) ? "block" : "block." . $filename,
			    'plug'));
    $sql_rowset = $sql->fetchAll();
    $jj = 0;

    foreach ($sql_rowset as $pag) {
	$jj++;
	$url = cot_url('index', 'c=' . $pag['new_cat']);
	$block->assign(cot_generate_newtags($pag, 'PAGE_ROW_', $v[2]));
	$block->assign(array(
	    'PAGE_ROW_BLOCKPATH' => cot_rc_link($url,
		    htmlspecialchars($structure['new'][$row['new_cat']]['title'])),
	    'PAGE_ROW_BLOCKPATH_URL' => $url,
	    'PAGE_ROW_CATDESC' => htmlspecialchars($structure['new'][$pag['new_cat']]['desc']),
	    'PAGE_ROW_OWNER' => cot_build_user($pag['new_ownerid'],
		    htmlspecialchars($pag['user_name'])),
	    'PAGE_ROW_ODDEVEN' => cot_build_oddeven($jj),
	    'PAGE_ROW_NUM' => $jj
	));
	$block->assign(cot_generate_usertags($pag, 'PAGE_ROW_OWNER_'));

	/* === Hook - Part2 : Include === LOOP === */
	foreach ($block_extp as $pl) {
	    include $pl;
	}
	/* ===== */

	$block->parse('BLOCK.PAGE_ROW');
    }

    $url_newpage = cot_url('new', 'm=add&c=' . $cat);
    $block->assign(array(
	'NEW_PAGENAV' => $pagenav['main'],
	'NEW_PAGEPREV' => $pagenav['prev'],
	'NEW_PAGENEXT' => $pagenav['next'],
	'NEW_PAGELAST' => $pagenav['last'],
	'NEW_PAGENUM' => $pagenav['current'],
	'NEW_PAGECOUNT' => $pagenav['total'],
	'NEW_ENTRIES_ONPAGE' => $pagenav['onpage'],
	'NEW_ENTRIES_TOTAL' => $pagenav['entries'],
	'NEW_SUBMITNEWPOST' => (cot_auth('page', $cat, 'W')) ? cot_rc_link($url_newpage,
			$L['Submitnew']) : '',
	'NEW_SUBMITNEWPOST_URL' => (cot_auth('page', $cat, 'W')) ? $url_newpage : '',
	'NEW_CATTITLE' => $structure['page'][$cat]['title'],
	'NEW_CATPATH' => cot_breadcrumbs(cot_structure_buildpath('page', $cat), false),
	'NEW_CAT' => $cat
    ));

    /* === Hook - Part2 : Include === TAGS === */
    foreach ($block_tags_extp as $pl) {
	include $pl;
    }
    /* ===== */

    $block->parse('BLOCK');
    $block_html = $block->text('BLOCK');
    // Cache for guests
    if ($usr['id'] == 0 && $cache && (int) $cfg['plugin']['block']['cache_ttl'] > 0) {
	$cache->disk->store($block_cache_id, $block_html, 'block');
    }
    $t->assign(($catn == 0) ? 'INDEX_BLOCK' : 'INDEX_BLOCK_' . $tagname,
	    $block_html);
    $catn++;
}


// ==========================================================


$catn = 1; // 0 для самых главных новостей сверху
$jj = 0;
$cats = array(
    'novosti' =>
    array(
	0 => 'novosti',
	1 => '4',
	2 => '150',
	3 => array(
	    'durl' => null,
	    'd' => (int) 0,
	    'pg' => (int) 1)
    )
);
unset($c);

//cot_print($cats);
foreach ($cats as $k => $v) {
    $cat = $v[0];
//    cot_print($v[0]);

    $tagname = 'TABS';
    // Cache for guests
    if ($usr['id'] == 0 && $cache && (int) $cfg['plugin']['block']['cache_ttl'] > 0) {
	$block_cache_id = "$theme.$lang.$cat." . $v[3]['d']; // Includes theme, lang, category and current page
	$block_html = $cache->disk->get($block_cache_id, 'block',
		(int) $cfg['plugin']['block']['cache_ttl']);
	if (!is_null($block_html)) {
	    $t->assign('INDEX_BLOCK_' . $tagname, $block_html);
	    continue;
	}
    }

    $catsub = cot_structure_children('new', $cat);
    $where = "new_state = 0 AND new_cat <> 'system' AND new_begin <= {$sys['now']} AND (new_expire = 0 OR new_expire > {$sys['now']}) AND new_cat IN ('" . implode("','",
		    $catsub) . "')";
    //TODO добавить в where "is_main" для $catn=0

    $block_link_params = ($c != $indexcat) ? "c=" . $c : '';
    $block_join_columns = '';
    $block_join_tables = '';

    $sql = $db->query("SELECT p.*, u.* $block_join_columns
			FROM $db_news AS p LEFT JOIN $db_users AS u ON u.user_id=p.new_ownerid $block_join_tables
			WHERE $where ORDER BY new_date DESC LIMIT " . $v[3]['d'] . ", " . $v[1]);
    $totalblock = $db->query("SELECT COUNT(*)
			FROM $db_news AS p $block_join_tables WHERE " . $where)->fetchColumn();

    if ($v[3]['d'] < 0 || $totalblock > 0 && $v[3]['d'] > $totalblock) {
	cot_die_message(404);
    }

    if (!$cfg['plugin']['block']['syncpagination']) {
	$block_link_params .= ($catn != 0 && $d != 0) ? '&d=' . $durl : '';
	$xx = 0;
	foreach ($cats as $key => $var) {
	    $block_link_params .= (($key != $cat) && $var[3] != 0 && $xx != 0) ? "&" . $key . "d=" . $var[3]['durl']
			: '';
	    $xx++;
	}
    }

    $block_link = cot_url('index', $block_link_params);
    $catd = ($catn != 0 && !$cfg['plugin']['block']['syncpagination']) ? $cat . "d"
		: "d";
    $pagenav = cot_pagenav('index', $block_link_params, $v[3]['d'], $totalblock,
	    $v[1], $catd);
    $filename = str_replace(array(' ', ',', '.', '-'), '_', $v[0]);
    $block = new XTemplate(cot_tplfile("block.tabs",'plug'));
    $sql_rowset = $sql->fetchAll();
    $jj = 0;

    foreach ($sql_rowset as $pag) {
	$jj++;
	$url = cot_url('index', 'c=' . $pag['new_cat']);
	$block->assign(cot_generate_newtags($pag, 'PAGE_ROW_', $v[2]));
	$block->assign(array(
	    'PAGE_ROW_BLOCKPATH' => cot_rc_link($url,
		    htmlspecialchars($structure['new'][$row['new_cat']]['title'])),
	    'PAGE_ROW_BLOCKPATH_URL' => $url,
	    'PAGE_ROW_CATDESC' => htmlspecialchars($structure['new'][$pag['new_cat']]['desc']),
	    'PAGE_ROW_OWNER' => cot_build_user($pag['new_ownerid'],
		    htmlspecialchars($pag['user_name'])),
	    'PAGE_ROW_ODDEVEN' => cot_build_oddeven($jj),
	    'PAGE_ROW_NUM' => $jj
	));
	$block->assign(cot_generate_usertags($pag, 'PAGE_ROW_OWNER_'));

	$block->parse('BLOCK.PAGE_ROW');


	$block->assign(cot_generate_newtags($pag, 'TABS_ROW_', $v[2]));
	$block->parse('BLOCK.TABS_ROW');
    }

//    cot_print($block);

    $block->parse('BLOCK');
    $block_html = $block->text('BLOCK');
    // Cache for guests
    if ($usr['id'] == 0 && $cache && (int) $cfg['plugin']['block']['cache_ttl'] > 0) {
	$cache->disk->store($block_cache_id, $block_html, 'block');
    }
    $t->assign(($catn == 0) ? 'INDEX_BLOCK' : 'INDEX_BLOCK_' . $tagname,
	    $block_html);
    $catn++;
}