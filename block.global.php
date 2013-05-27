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
     
	global $db, $structure, $db_news, $db_users, $sys, $cfg, $L, $cot_extrafields, $usr, $cache;
	

	if ($usr['id'] == 0 && $cache && (int) $cfg['plugin']['block']['cache_ttl'] > 0)
		{
			$ri_cache_id = "$theme.$lang.news";
			$string = $cache->disk->get($ri_cache_id, 'block', (int) $cfg['plugin']['block']['cache_ttl']);
		}
	if(empty($string))	
	{
	$where = "WHERE new_state=0 
			  AND new_begin <= {$sys['now']} 
			  AND (new_expire = 0 OR new_expire > {$sys['now']}) 
			  AND new_cat <> 'system' 
			  AND new_begin >= {$sys['now']} - 11604800";
			  
	if ($mode == 'popular')
	{
//		$where = "WHERE page_state=0 AND page_begin <= {$sys['now']} AND (page_expire = 0 OR page_expire > {$sys['now']}) AND page_cat <> 'system' AND page_begin >= {$sys['now']} - 604800";
//		$orderby = "ORDER BY page_count";

		$orderby = "ORDER BY new_count";
		
		$sql = $db->query("SELECT * FROM $db_news
		$where $orderby LIMIT $pagesnum");
	
	}
	elseif ($mode == 'discuss')
	{
		$sql = $db->query("SELECT
			      p.new_id,
			      p.new_cat,
			      p.new_title,
			      c.postcount
			      FROM cot_news as p
			      INNER JOIN (
					SELECT
					com_code,
					count(*) AS postcount
			      FROM cot_com
			      GROUP BY com_code
					     ) as c
			      on p.new_id = c.com_code
			      $where
			      Order by c.postcount desc
			      LIMIT $pagesnum");
	}


	$string = '';
	foreach ($sql->fetchAll() as $row) {
	     $string.='<li><h3><a href='.cot_url('new', 'c='.$row['new_cat'].'&id='.$row['new_id']).'>'.$row['new_title'].'</h3></li>';
	}
	if ($usr['id'] == 0 && $cache && (int) $cfg['plugin']['block']['cache_ttl'] > 0)
			{
				$cache->disk->store($ri_cache_id, $string, 'block');
			}
	}
	return $string;
}