<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=admin
[END_COT_EXT]
==================== */

/**
 * News manager & Queue of news
 *
 * @package Cotonti
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

(defined('COT_CODE') && defined('COT_ADMIN')) or die('Wrong URL.');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('new', 'any');
cot_block($usr['isadmin']);

$t = new XTemplate(cot_tplfile('new.admin', 'module', true));
//cot_print($cfg);
require_once cot_incfile('new', 'module');

$adminpath[] = array(cot_url('admin', 'm=extensions'), $L['Extensions']);
$adminpath[] = array(cot_url('admin', 'm=extensions&a=details&mod='.$m), $cot_modules[$m]['title']);
$adminpath[] = array(cot_url('admin', 'm='.$m), $L['Administration']);
$adminhelp = $L['adm_help_new'];

$id = cot_import('id', 'G', 'INT');
//cot_watch($cfg);
list($pg, $d, $durl) = cot_import_newnav('d', $cfg['new']['maxrowspernew']);

$sorttype = cot_import('sorttype', 'R', 'ALP');
$sorttype = empty($sorttype) ? 'id' : $sorttype;
$sort_type = array(
	'id' => $L['Id'],
	'type' => $L['Type'],
	'key' => $L['Key'],
	'title' => $L['Title'],
	'desc' => $L['Description'],
	'text' => $L['Body'],
	'author' => $L['Author'],
	'ownerid' => $L['Owner'],
	'date' => $L['Date'],
	'begin' => $L['Begin'],
	'expire' => $L['Expire'],
	'rating' => $L['Rating'],
	'count' => $L['Hits'],
	'file' => $L['adm_fileyesno'],
	'url' => $L['adm_fileurl'],
	'size' => $L['adm_filesize'],
	'filecount' => $L['adm_filecount']
);
$sqlsorttype = 'new_'.$sorttype;

$sortway = cot_import('sortway', 'R', 'ALP');
$sortway = empty($sortway) ? 'desc' : $sortway;
$sort_way = array(
	'asc' => $L['Ascending'],
	'desc' => $L['Descending']
);
$sqlsortway = $sortway;

$filter = cot_import('filter', 'R', 'ALP');
$filter = empty($filter) ? 'valqueue' : $filter;
$filter_type = array(
	'all' => $L['All'],
	'valqueue' => $L['adm_valqueue'],
	'validated' => $L['adm_validated'],
	'expired' => $L['adm_expired'],
);
if ($filter == 'all')
{
	$sqlwhere = "1 ";
}
elseif ($filter == 'valqueue')
{
	$sqlwhere = "new_state=1 ";
}
elseif ($filter == 'validated')
{
	$sqlwhere = "new_state=1";
}
elseif ($filter == 'expired')
{
	$sqlwhere = "new_begin > {$sys['now']} OR (new_expire <> 0 AND new_expire < {$sys['now']})";
}

$catsub = cot_structure_children('new', '');
if (count($catsub) < count($structure['new']))
{
	$sqlwhere .= " AND new_cat IN ('" . join("','", $catsub) . "')";
}

/* === Hook  === */
foreach (cot_getextplugins('new.admin.first') as $pl)
{
	include $pl;
}
/* ===== */

if ($a == 'validate')
{
	cot_check_xg();

	/* === Hook  === */
	foreach (cot_getextplugins('new.admin.validate') as $pl)
	{
		include $pl;
	}
	/* ===== */

	$sql_new = $db->query("SELECT new_cat, new_begin FROM $db_news WHERE new_id = $id AND new_state != 0");
	if ($row = $sql_new->fetch())
	{
		$usr['isadmin_local'] = cot_auth('new', $row['new_cat'], 'A');
		cot_block($usr['isadmin_local']);
		if ($row['new_begin'] < $sys['now'])
		{
			$sql_new = $db->update($db_news, array('new_begin' => $sys['now']), "new_id = $id");
		}
		$sql_new = $db->update($db_news, array('new_state' => 0), "new_id = $id");
		$sql_new = $db->query("UPDATE $db_structure SET structure_count=structure_count+1 WHERE structure_code=".$db->quote($row['new_cat']));

		cot_log($L['Page'].' #'.$id.' - '.$L['adm_queue_validated'], 'adm');

		if ($cache)
		{
			if ($cfg['cache_new'])
			{
				$cache->new->clear('new/' . str_replace('.', '/', $structure['new'][$row['new_cat']]['path']));
			}
			if ($cfg['cache_index'])
			{
				$cache->new->clear('index');
			}
		}

		cot_message('#'.$id.' - '.$L['adm_queue_validated']);
	}
	else
	{
		cot_die();
	}
}
elseif ($a == 'unvalidate')
{
	cot_check_xg();

	/* === Hook  === */
	foreach (cot_getextplugins('new.admin.unvalidate') as $pl)
	{
		include $pl;
	}
	/* ===== */

	$sql_new = $db->query("SELECT new_cat FROM $db_news WHERE new_id=$id");
	if ($row = $sql_new->fetch())
	{
		$usr['isadmin_local'] = cot_auth('new', $row['new_cat'], 'A');
		cot_block($usr['isadmin_local']);

		$sql_new = $db->update($db_news, array('new_state' => 1), "new_id=$id");
		$sql_new = $db->query("UPDATE $db_structure SET structure_count=structure_count-1 WHERE structure_code=".$db->quote($row['new_cat']));

		cot_log($L['Page'].' #'.$id.' - '.$L['adm_queue_unvalidated'], 'adm');

		if ($cache)
		{
			if ($cfg['cache_new'])
			{
				$cache->new->clear('new/' . str_replace('.', '/', $structure['new'][$row['new_cat']]['path']));
			}
			if ($cfg['cache_index'])
			{
				$cache->new->clear('index');
			}
		}

		cot_message('#'.$id.' - '.$L['adm_queue_unvalidated']);
	}
	else
	{
		cot_die();
	}
}
elseif ($a == 'delete')
{
	cot_check_xg();

	/* === Hook  === */
	foreach (cot_getextplugins('new.admin.delete') as $pl)
	{
		include $pl;
	}
	/* ===== */

	$sql_new = $db->query("SELECT * FROM $db_news WHERE new_id=$id LIMIT 1");
	if ($row = $sql_new->fetch())
	{
		if ($row['new_state'] == 0)
		{
			$sql_new = $db->query("UPDATE $db_structure SET structure_count=structure_count-1 WHERE structure_code=".$db->quote($row['new_cat']));
		}

		foreach($cot_extrafields[$db_news] as $exfld)
		{
			cot_extrafield_unlinkfiles($row['new_'.$exfld['field_name']], $exfld);
		}

		$sql_new = $db->delete($db_news, "new_id=$id");

		cot_log($L['Page'].' #'.$id.' - '.$L['Deleted'], 'adm');

		/* === Hook === */
		foreach (cot_getextplugins('new.admin.delete.done') as $pl)
		{
			include $pl;
		}
		/* ===== */

		if ($cache)
		{
			if ($cfg['cache_new'])
			{
				$cache->new->clear('new/' . str_replace('.', '/', $structure['new'][$row['new_cat']]['path']));
			}
			if ($cfg['cache_index'])
			{
				$cache->new->clear('index');
			}
		}

		cot_message('#'.$id.' - '.$L['adm_queue_deleted']);
	}
	else
	{
		cot_die();
	}
}
elseif ($a == 'update_checked')
{
	$paction = cot_import('paction', 'P', 'TXT');

	if ($paction == $L['Validate'] && is_array($_POST['s']))
	{
		cot_check_xp();
		$s = cot_import('s', 'P', 'ARR');

		$perelik = '';
		$notfoundet = '';
		foreach ($s as $i => $k)
		{
			if ($s[$i] == '1' || $s[$i] == 'on')
			{
				/* === Hook  === */
				foreach (cot_getextplugins('new.admin.checked_validate') as $pl)
				{
					include $pl;
				}
				/* ===== */

				$sql_new = $db->query("SELECT * FROM $db_news WHERE new_id=".(int)$i);
				if ($row = $sql_new->fetch())
				{
					$id = $row['new_id'];
					$usr['isadmin_local'] = cot_auth('new', $row['new_cat'], 'A');
					cot_block($usr['isadmin_local']);

					$sql_new = $db->update($db_news, array('new_state' => 0), "new_id=$id");
					$sql_new = $db->query("UPDATE $db_structure SET structure_count=structure_count+1 WHERE structure_code=".$db->quote($row['new_cat']));

					cot_log($L['Page'].' #'.$id.' - '.$L['adm_queue_validated'], 'adm');

					if ($cache && $cfg['cache_new'])
					{
						$cache->new->clear('new/' . str_replace('.', '/', $structure['new'][$row['new_cat']]['path']));
					}

					$perelik .= '#'.$id.', ';
				}
				else
				{
					$notfoundet .= '#'.$id.' - '.$L['Error'].'<br  />';
				}
			}
		}

		if ($cache && $cfg['cache_index'])
		{
			$cache->new->clear('index');
		}

		if (!empty($perelik))
		{
			cot_message($notfoundet.$perelik.' - '.$L['adm_queue_validated']);
		}
	}
	elseif ($paction == $L['Delete'] && is_array($_POST['s']))
	{
		cot_check_xp();
		$s = cot_import('s', 'P', 'ARR');

		$perelik = '';
		$notfoundet = '';
		foreach ($s as $i => $k)
		{
			if ($s[$i] == '1' || $s[$i] == 'on')
			{
				/* === Hook  === */
				foreach (cot_getextplugins('new.admin.checked_delete') as $pl)
				{
					include $pl;
				}
				/* ===== */

				$sql_new = $db->query("SELECT * FROM $db_news WHERE new_id=".(int)$i." LIMIT 1");
				if ($row = $sql_new->fetch())
				{
					$id = $row['new_id'];
					if ($row['new_state'] == 0)
					{
						$sql_new = $db->query("UPDATE $db_structure SET structure_count=structure_count-1 WHERE structure_code=".$db->quote($row['new_cat']));
					}

					$sql_new = $db->delete($db_news, "new_id=$id");

					cot_log($L['Page'].' #'.$id.' - '.$L['Deleted'],'adm');

					if ($cache && $cfg['cache_new'])
					{
						$cache->new->clear('new/' . str_replace('.', '/', $structure['new'][$row['new_cat']]['path']));
					}

					/* === Hook === */
					foreach (cot_getextplugins('new.admin.delete.done') as $pl)
					{
						include $pl;
					}
					/* ===== */
					$perelik .= '#'.$id.', ';
				}
				else
				{
					$notfoundet .= '#'.$id.' - '.$L['Error'].'<br  />';
				}
			}
		}

		if ($cache && $cfg['cache_index'])
		{
			$cache->new->clear('index');
		}

		if (!empty($perelik))
		{
			cot_message($notfoundet.$perelik.' - '.$L['adm_queue_deleted']);
		}
	}
}

$totalitems = $db->query("SELECT COUNT(*) FROM $db_news WHERE ".$sqlwhere)->fetchColumn();
$newnav = cot_pagenav('admin', 'm=new&sorttype='.$sorttype.'&sortway='.$sortway.'&filter='.$filter, $d, $totalitems, $cfg['maxrowspernew'], 'd', '', $cfg['jquery'] && $cfg['turnajax']);

$sql_new = $db->query("SELECT p.*, u.user_name
	FROM $db_news as p
	LEFT JOIN $db_users AS u ON u.user_id=p.new_ownerid
	WHERE $sqlwhere
		ORDER BY $sqlsorttype $sqlsortway
		LIMIT $d, ".$cfg['maxrowsperpage']);

$ii = 0;
/* === Hook - Part1 : Set === */
$extp = cot_getextplugins('new.admin.loop');
/* ===== */
foreach ($sql_new->fetchAll() as $row)
{
	$sql_new_subcount = $db->query("SELECT SUM(structure_count) FROM $db_structure WHERE structure_path LIKE '".$db->prep($structure['new'][$row["new_cat"]]['rpath'])."%' ");
	$sub_count = $sql_new_subcount->fetchColumn();
	$row['new_file'] = intval($row['new_file']);
	$t->assign(cot_generate_newtags($row, 'ADMIN_NEW_', 200));
	$t->assign(array(
		'ADMIN_NEW_ID_URL' => cot_url('new', 'c='.$row['new_cat'].'&id='.$row['new_id']),
		'ADMIN_NEW_OWNER' => cot_build_user($row['new_ownerid'], htmlspecialchars($row['user_name'])),
		'ADMIN_NEW_FILE_BOOL' => $row['new_file'],
		'ADMIN_NEW_URL_FOR_VALIDATED' => cot_confirm_url(cot_url('admin', 'm=new&a=validate&id='.$row['new_id'].'&d='.$durl.'&'.cot_xg()), 'new', 'new_confirm_validate'),
		'ADMIN_NEW_URL_FOR_UNVALIDATE' => cot_confirm_url(cot_url('admin', 'm=new&a=unvalidate&id='.$row['new_id'].'&d='.$durl.'&'.cot_xg()), 'new', 'new_confirm_unvalidate'),
		'ADMIN_NEW_URL_FOR_DELETED' => cot_confirm_url(cot_url('admin', 'm=new&a=delete&id='.$row['new_id'].'&d='.$durl.'&'.cot_xg()), 'new', 'new_confirm_delete'),
		'ADMIN_NEW_URL_FOR_EDIT' => cot_url('new', 'm=edit&id='.$row['new_id']),
		'ADMIN_NEW_ODDEVEN' => cot_build_oddeven($ii),
		'ADMIN_NEW_CAT_COUNT' => $sub_count
	));
	$t->assign(cot_generate_usertags($row['new_ownerid'], 'ADMIN_NEW_OWNER_'), htmlspecialchars($row['user_name']));

	/* === Hook - Part2 : Include === */
	foreach ($extp as $pl)
	{
		include $pl;
	}
	/* ===== */

	$t->parse('MAIN.NEW_ROW');
	$ii++;
}

$is_row_empty = ($sql_new->rowCount() == 0) ? true : false ;

$totaldbnews = $db->countRows($db_news);
$sql_new_queued = $db->query("SELECT COUNT(*) FROM $db_news WHERE new_state=1");
$sys['newsqueued'] = $sql_new_queued->fetchColumn();

$t->assign(array(
	'ADMIN_NEW_URL_CONFIG' => cot_url('admin', 'm=config&n=edit&o=module&p=new'),
	'ADMIN_NEW_URL_ADD' => cot_url('new', 'm=add'),
	'ADMIN_NEW_URL_EXTRAFIELDS' => cot_url('admin', 'm=extrafields&n='.$db_news),
	'ADMIN_NEW_URL_STRUCTURE' => cot_url('admin', 'm=structure&n=new'),
	'ADMIN_NEW_FORM_URL' => cot_url('admin', 'm=new&a=update_checked&sorttype='.$sorttype.'&sortway='.$sortway.'&filter='.$filter.'&d='.$durl),
	'ADMIN_NEW_ORDER' => cot_selectbox($sorttype, 'sorttype', array_keys($sort_type), array_values($sort_type), false),
	'ADMIN_NEW_WAY' => cot_selectbox($sortway, 'sortway', array_keys($sort_way), array_values($sort_way), false),
	'ADMIN_NEW_FILTER' => cot_selectbox($filter, 'filter', array_keys($filter_type), array_values($filter_type), false),
	'ADMIN_NEW_TOTALDBNEWS' => $totaldbnews,
	'ADMIN_NEW_PAGINATION_PREV' => $newnav['prev'],
	'ADMIN_NEW_PAGNAV' => $newnav['main'],
	'ADMIN_NEW_PAGINATION_NEXT' => $newnav['next'],
	'ADMIN_NEW_TOTALITEMS' => $totalitems,
	'ADMIN_NEW_ON_NEW' => $ii
));

cot_display_messages($t);

/* === Hook  === */
foreach (cot_getextplugins('new.admin.tags') as $pl)
{
	include $pl;
}
/* ===== */

$t->parse('MAIN');
$adminmain = $t->text('MAIN');
