<?php
/**
 * News list
 *
 * @package new
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

// Environment setup
define('COT_LIST', TRUE);
$env['location'] = 'list';

$s = cot_import('s', 'G', 'ALP'); // order field name without 'new_'
$w = cot_import('w', 'G', 'ALP', 4); // order way (asc, desc)
$c = cot_import('c', 'G', 'TXT'); // cat code
$o = cot_import('ord', 'G', 'ARR'); // filter field names without 'new_'
$p = cot_import('p', 'G', 'ARR'); // filter values
$maxrowspernew = ($cfg['new']['cat_' . $c]['maxrowspernew']) ? $cfg['new']['cat_' . $c]['maxrowspernew'] : $cfg['new']['cat___default']['maxrowspernew'];
list($pg, $d, $durl) = cot_import_newnav('d', $maxrowspernew); //new number for news list
list($pgc, $dc, $dcurl) = cot_import_newnav('dc', $cfg['new']['maxlistspernew']);// new number for cats list
//cot_print($pg,$d,$maxrowspernew);
if ($c == 'all' || $c == 'system')
{
	list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('admin', 'a');
	cot_block($usr['isadmin']);
}
elseif ($c == 'unvalidated' || $c == 'saved_drafts')
{
	list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('new', 'any');
	cot_block($usr['auth_write']);
}
elseif (!isset($structure['new'][$c]))
{
	cot_die_message(404, TRUE);
}
else
{
	list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('new', $c);
	cot_block($usr['auth_read']);
}

/* === Hook === */
foreach (cot_getextplugins('new.list.first') as $pl)
{
	include $pl;
}
/* ===== */

$cat = &$structure['new'][$c];

if (empty($s))
{
	$s = $cfg['new']['cat_' . $c]['order'];
}
elseif (!$db->fieldExists($db_news, "new_$s"))
{
	$s = 'title';
}
$w = empty($w) ? $cfg['new']['cat_' . $c]['way'] : $w;

$s = empty($s) ? $cfg['new']['cat___default']['order'] : $s;
$w = (empty($w) || !in_array($w, array('asc', 'desc'))) ? $cfg['new']['cat___default']['way'] : $w;


$sys['sublocation'] = $cat['title'];

$cfg['new']['maxrowspernew'] = ($c == 'all' || $c == 'system' || $c == 'unvalidated' || $c == 'saved_drafts') ?
	$cfg['new']['cat___default']['maxrowspernew'] :
	$cfg['new']['cat_' . $c]['maxrowspernew'];
$cfg['new']['maxrowspernew'] = $cfg['new']['maxrowspernew'] > 0 ? $cfg['new']['maxrowspernew'] : 1;

$cfg['new']['truncatetext'] = ($c == 'all' || $c == 'system' || $c == 'unvalidated' || $c == 'saved_drafts') ?
	$cfg['new']['cat___default']['truncatetext'] :
	$cfg['new']['cat_' . $c]['truncatetext'];

$where = array();
$params = array();

$where_state = $usr['isadmin'] ? '1' : "new_ownerid = {$usr['id']}";
$where['state'] = "(new_state=0 AND $where_state)";
if ($c == 'unvalidated')
{
	$cat['tpl'] = 'unvalidated';
	$where['state'] = 'new_state = 1';
	$where['ownerid'] = $usr['isadmin'] ? '1' : 'new_ownerid = ' . $usr['id'];
	$cat['title'] = $L['new_validation'];
	$cat['desc'] = $L['new_validation_desc'];
	$s = 'date';
	$w = 'desc';
}
elseif ($c == 'saved_drafts')
{
	$cat['tpl'] = 'unvalidated';
	$where['state'] = 'new_state = 2';
	$where['ownerid'] = $usr['isadmin'] ? '1' : 'new_ownerid = ' . $usr['id'];
	$cat['title'] = $L['new_drafts'];
	$cat['desc'] = $L['new_drafts_desc'];
	$s = 'date';
	$w = 'desc';
}
elseif ($c != 'all')
{
	$where['cat'] = 'new_cat=' . $db->quote($c);
	$where['state'] = "new_state=0";
}

////////////////////////////////////////////////////////
if ($cfg['mainurl'] == "http://belarus.tio" OR $cfg['mainurl'] == "http://belarus.tio.by") {

	$where['country'] = "new_country= 'Беларусь'";

}
////////////////////////////////////////////////////////

$c = (empty($cat['title'])) ? 'all' : $c;
cot_die((empty($cat['title'])) && !$usr['isadmin']);

if ($o && $p)
{
	if (!is_array($o)) $o = array($o);
	if (!is_array($p)) $p = array($p);
	$filters = array_combine($o, $p);
	foreach ($filters as $key => $val)
	{
		$key = cot_import($key, 'D', 'ALP', 16);
		$val = cot_import($val, 'D', 'TXT', 16);
		if ($key && $val && $db->fieldExists($db_news, "new_$key"))
		{
			$params[$key] = $val;
			$where['filter'][] = "new_$key = :$key";
		}
	}
	empty($where['filter']) || $where['filter'] = implode(' AND ', $where['filter']);
}
if (!$usr['isadmin'] && $c != 'unvalidated' && $c !== 'saved_drafts')
{
	$where['date'] = "new_begin <= {$sys['now']} AND (new_expire = 0 OR new_expire > {$sys['now']})";
}

$orderby = "new_$s $w";

$list_url_path = array('c' =>$c, 'ord' => $o, 'p' => $p);
if ($s != $cfg['new']['cat_' . $c]['order'])
{
	$list_url_path['s'] = $s;
}
if ($w != $cfg['new']['cat_' . $c]['way'])
{
	$list_url_path['w'] = $w;
}
$list_url = cot_url('new', $list_url_path);

// Building the canonical URL
$newurl_params = array('c' => $c, 'ord' => $o, 'p' => $p);
if ($durl > 1)
{
	$newurl_params['d'] = $durl;
}
if ($dcurl > 1)
{
	$newurl_params['dc'] = $dcurl;
}

$catpatharray = cot_structure_buildpath('new', $c);
$catpath = ($c == 'all' || $c == 'system' || $c == 'unvalidated' || $c == 'saved_drafts') ? $cat['title'] : cot_breadcrumbs($catpatharray, $cfg['homebreadcrumb'], true);

$shortpath = $catpatharray;
array_pop($shortpath);
$catpath_short = ($c == 'all' || $c == 'system' || $c == 'unvalidated' || $c == 'saved_drafts') ? '' : cot_breadcrumbs($shortpath, $cfg['homebreadcrumb']);

/* === Hook === */
foreach (cot_getextplugins('new.list.query') as $pl)
{
	include $pl;
}
/* ===== */

if(empty($sql_new_string))
{
	$where = array_filter($where);
	$where = ($where) ? 'WHERE ' . implode(' AND ', $where) : '';
	$sql_new_count = "SELECT COUNT(*) FROM $db_news as p $join_condition $where";
	$sql_new_string = "SELECT p.*, u.* $join_columns
		FROM $db_news as p $join_condition
		LEFT JOIN $db_users AS u ON u.user_id=p.new_ownerid
		$where
		ORDER BY $orderby LIMIT $d, ".$cfg['new']['maxrowspernew'];
}
$totallines = $db->query($sql_new_count, $params)->fetchColumn();
$sqllist = $db->query($sql_new_string, $params);

if ((!$cfg['easypagenav'] && $durl > 0 && $cfg['new']['maxrowspernew'] > 0 && $durl % $cfg['new']['maxrowspernew'] > 0)
	|| ($d > 0 && $d >= $totallines))
{
	cot_redirect(cot_url('new', $list_url_path + array('dc' => $dcurl)));
}

$newnav = cot_pagenav('new', $list_url_path + array('dc' => $dcurl), $d, $totallines, $cfg['new']['maxrowspernew']);

$out['desc'] = htmlspecialchars(strip_tags($cat['desc']));
$out['subtitle'] = $cat['title'];
if (!empty($cfg['new']['cat_' . $c]['keywords']))
{
	$out['keywords'] = $cfg['new']['cat_' . $c]['keywords'];
}
// Building the canonical URL
$out['canonical_uri'] = cot_url('new', $newurl_params);

$_SESSION['cat'] = $c;

$mskin = cot_tplfile(array('new', 'list', $cat['tpl']));

/* === Hook === */
foreach (cot_getextplugins('new.list.main') as $pl)
{
	include $pl;
}
/* ===== */

require_once $cfg['system_dir'] . '/header.php';
$t = new XTemplate($mskin);

$t->assign(array(
	'LIST_NEWTITLE' => $catpath,
	'LIST_CATEGORY' => htmlspecialchars($cat['title']),
	'LIST_CAT' => $c,
	'LIST_CAT_RSS' => cot_url('rss', "id=$c"),
	'LIST_CATTITLE' => $cat['title'],
	'LIST_CATPATH' => $catpath,
	'LIST_CATSHORTPATH' => $catpath_short,
	'LIST_CATURL' => cot_url('new', $list_url_path),
	'LIST_CATDESC' => $cat['desc'],
	'LIST_CATICON' => empty($cat['icon']) ? '' : cot_rc('img_structure_cat', array(
			'icon' => $cat['icon'],
			'title' => htmlspecialchars($cat['title']),
			'desc' => htmlspecialchars($cat['desc'])
		)),
	'LIST_EXTRATEXT' => $extratext,
	'LIST_TOP_PAGINATION' => $newnav['main'],
	'LIST_TOP_NEWPREV' => $newnav['prev'],
	'LIST_TOP_NEWNEXT' => $newnav['next'],
	'LIST_TOP_CURRENTNEW' => $newnav['current'],
	'LIST_TOP_TOTALLINES' => $totallines,
	'LIST_TOP_MAXPERNEW' => $cfg['new']['maxrowspernew'],
	'LIST_TOP_TOTALNEWS' => $newnav['total']
));

if ($usr['auth_write'] && $c != 'all' && $c != 'unvalidated' && $c != 'saved_drafts')
{
	$t->assign(array(
		'LIST_SUBMITNEWNEW' => cot_rc('new_submitnewnew', array('sub_url' => cot_url('new', 'm=add&c='.$c))),
		'LIST_SUBMITNEWNEW_URL' => cot_url('new', 'm=add&c='.$c)
	));
}

// Extra fields for structure
foreach ($cot_extrafields[$db_structure] as $exfld)
{
	$uname = strtoupper($exfld['field_name']);
	$t->assign(array(
		'LIST_CAT_'.$uname.'_TITLE' => isset($L['structure_'.$exfld['field_name'].'_title']) ?
			$L['structure_'.$exfld['field_name'].'_title'] : $exfld['field_description'],
		'LIST_CAT_'.$uname => cot_build_extrafields_data('structure', $exfld, $cat[$exfld['field_name']]),
		'LIST_CAT_'.$uname.'_VALUE' => $cat[$exfld['field_name']],
	));
}

$arrows = array();
foreach ($cot_extrafields[$db_news] + array('title' => 'title', 'key' => 'key', 'date' => 'date', 'author' => 'author', 'owner' => 'owner', 'count' => 'count', 'filecount' => 'filecount') as $row_k => $row_p)
{
	$uname = strtoupper($row_k);
	$url_asc = cot_url('new',  array('s' => $row_k, 'w' => 'asc') + $list_url_path);
	$url_desc = cot_url('new', array('s' => $row_k, 'w' => 'desc') + $list_url_path);
	$arrows[$row_k]['asc']  = $R['icon_down'];
	$arrows[$row_k]['desc'] = $R['icon_up'];
	if ($s == $val)
	{
		$arrows[$s][$w] = $R['icon_vert_active'][$w];
	}
	if(in_array($row_k, array('title', 'key', 'date', 'author', 'owner', 'count', 'filecount')))
	{
		$t->assign(array(
		'LIST_TOP_'.$uname => cot_rc("list_link_$row_k", array(
			'cot_img_down' => $arrows[$col]['asc'], 'cot_img_up' => $arrows[$col]['desc'],
			'list_link_url_down' => $url_asc, 'list_link_url_up' => $url_desc
		))));
	}
	else
	{
		$extratitle = isset($L['new_'.$row_k.'_title']) ?	$L['new_'.$row_k.'_title'] : $row_p['field_description'];
		$t->assign(array(
			'LIST_TOP_'.$uname => cot_rc('list_link_field_name', array(
				'cot_img_down' => $arrows[$row_k]['asc'],
				'cot_img_up' => $arrows[$row_k]['desc'],
				'list_link_url_down' => $url_asc,
				'list_link_url_up' => $url_desc
		))));
	}
	$t->assign(array(
		'LIST_TOP_'.$uname.'_URL_ASC' => $url_asc,
		'LIST_TOP_'.$uname.'_URL_DESC' => $url_desc
	));
}

$kk = 0;
$allsub = cot_structure_children('new', $c, false, false, true, false);
$subcat = array_slice($allsub, $dc, $cfg['new']['maxlistspernew']);

/* === Hook - Part1 : Set === */
$extp = cot_getextplugins('new.list.rowcat.loop');
/* ===== */
foreach ($subcat as $x)
{
	$kk++;
	$cat_childs = cot_structure_children('new', $x);
	$sub_count = 0;
	foreach ($cat_childs as $cat_child)
	{
		$sub_count += (int)$structure['new'][$cat_child]['count'];
	}

	$sub_url_path = $list_url_path;
	$sub_url_path['c'] = $x;
	$t->assign(array(
		'LIST_ROWCAT_URL' => cot_url('new', $sub_url_path),
		'LIST_ROWCAT_TITLE' => $structure['new'][$x]['title'],
		'LIST_ROWCAT_DESC' => $structure['new'][$x]['desc'],
		'LIST_ROWCAT_ICON' => $structure['new'][$x]['icon'],
		'LIST_ROWCAT_COUNT' => $sub_count,
		'LIST_ROWCAT_ODDEVEN' => cot_build_oddeven($kk),
		'LIST_ROWCAT_NUM' => $kk
	));

	// Extra fields for structure
	foreach ($cot_extrafields[$db_structure] as $exfld)
	{
		$uname = strtoupper($exfld['field_name']);
		$t->assign(array(
			'LIST_ROWCAT_'.$uname.'_TITLE' => isset($L['structure_'.$exfld['field_name'].'_title']) ?  $L['structure_'.$exfld['field_name'].'_title'] : $exfld['field_description'],
			'LIST_ROWCAT_'.$uname => cot_build_extrafields_data('structure', $exfld, $structure['new'][$x][$exfld['field_name']]),
			'LIST_ROWCAT_'.$uname.'_VALUE' => $structure['new'][$x][$exfld['field_name']],
		));
	}

	/* === Hook - Part2 : Include === */
	foreach ($extp as $pl)
	{
		include $pl;
	}
	/* ===== */

	$t->parse('MAIN.LIST_ROWCAT');
}

$newnav_cat = cot_pagenav('new', $list_url_path + array('d' => $durl), $dc, count($allsub), $cfg['new']['maxlistspernew'], 'dc');

$t->assign(array(
	'LISTCAT_NEWPREV' => $newnav_cat['prev'],
	'LISTCAT_NEWNEXT' => $newnav_cat['next'],
	'LISTCAT_PAGNAV' => $newnav_cat['main']
));

$jj = 0;
/* === Hook - Part1 : Set === */
$extp = cot_getextplugins('new.list.loop');
/* ===== */
$sqllist_rowset = $sqllist->fetchAll();

$sqllist_rowset_other = false;
/* === Hook === */
foreach (cot_getextplugins('new.list.before_loop') as $pl)
{
	include $pl;
}
/* ===== */

if(!$sqllist_rowset_other)
{
	foreach ($sqllist_rowset as $nws)
	{
		$jj++;
		$t->assign(cot_generate_newtags($nws, 'LIST_ROW_', $cfg['new']['truncatetext'], $usr['isadmin']));
		$t->assign(array(
			'LIST_ROW_OWNER' => cot_build_user($nws['new_ownerid'], htmlspecialchars($nws['user_name'])),
			'LIST_ROW_ODDEVEN' => cot_build_oddeven($jj),
			'LIST_ROW_NUM' => $jj
		));
		$t->assign(cot_generate_usertags($nws, 'LIST_ROW_OWNER_'));

		/* === Hook - Part2 : Include === */
		foreach ($extp as $pl)
		{
			include $pl;
		}
		/* ===== */
		$t->parse('MAIN.LIST_ROW');
	}
}

/* === Hook === */
foreach (cot_getextplugins('new.list.tags') as $pl)
{
	include $pl;
}
/* ===== */

$t->parse('MAIN');
$t->out('MAIN');

require_once $cfg['system_dir'] . '/footer.php';

if ($cache && $usr['id'] === 0 && $cfg['cache_new'])
{
	$cache->new->write();
}
