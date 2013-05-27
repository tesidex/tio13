<?php defined('COT_CODE') or die('Wrong URL');

/* ====================
[BEGIN_COT_EXT]
Hooks=global
[END_COT_EXT]
==================== */

/**
 * block admin usability modification
 *
 * @package block
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

function blockrecent($mode, $pagesnum = 5)
{
//	global $db, $structure, $db_pages, $db_users, $sys, $cfg, $L, $cot_extrafields, $usr;
//
//	if ($mode == 'popular')
//	{
//	     //page_begin <= {$sys['now']} AND page_begin >= {$sys['now'] - week}
//		$where = "WHERE page_state=0 AND page_begin <= {$sys['now']} AND (page_expire = 0 OR page_expire > {$sys['now']}) AND page_cat <> 'system' " . $incat;
//		$totalrecent['pages'] = $cfg['plugin']['recentitems']['maxpages'];
//	}
//	elseif ($mode == 'discuss')
//	{
//		$where = "WHERE page_date >= $mode AND page_begin <= {$sys['now']} AND (page_expire = 0 OR page_expire > {$sys['now']}) AND page_state=0 AND page_cat <> 'system' " . $incat;
//		$totalrecent['pages'] = $db->query("SELECT COUNT(*) FROM $db_pages " . $where)->fetchColumn();
//	}
//
//
//	$sql = $db->query("SELECT p.*, u.* $join_columns
//		FROM $db_pages AS p
//			LEFT JOIN $db_users AS u ON u.user_id=p.page_ownerid
//		$join_tables
//		$where ORDER by page_date desc LIMIT $d, $maxperpage");

	$string = 'aaaaaaaaaaaaaaaaaaaaaaaaaa';
	return $string;
}