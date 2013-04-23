<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=trashcan.api
[END_COT_EXT]
==================== */

/**
 * Trash can support for news
 *
 * @package new
 * @version 0.9.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('new', 'module');

// Register restoration table
$trash_types['new'] = $db_news;

/**
 * Sync new action
 *
 * @param array $data trashcan item data
 * @return bool
 * @global Cache $cache
 */
function cot_trash_new_sync($data)
{
	global $cache, $cfg, $db_structure;

	cot_new_sync($data['new_cat']);
	($cache && $cfg['cache_new']) && $cache->new->clear('new');
	return true;
}
