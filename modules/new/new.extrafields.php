<?php

/* ====================
  [BEGIN_COT_EXT]
  Hooks=admin.extrafields.first
  [END_COT_EXT]
  ==================== */

/**
 * Page module
 *
 * @package new
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */
defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('new', 'module');
$extra_whitelist[$db_news] = array(
	'name' => $db_news,
	'caption' => $L['Module'].' News',
	'type' => 'module',
	'code' => 'new',
	'tags' => array(
		'new.list.tpl' => '{LIST_ROW_XXXXX}, {LIST_TOP_XXXXX}',
		'new.tpl' => '{NEW_XXXXX}, {NEW_XXXXX_TITLE}',
		'new.add.tpl' => '{NEWADD_FORM_XXXXX}, {NEWADD_FORM_XXXXX_TITLE}',
		'new.edit.tpl' => '{NEWEDIT_FORM_XXXXX}, {NEWEDIT_FORM_XXXXX_TITLE}',
		'news.tpl' => '{NEW_ROW_XXXXX}',
		'recentitems.news.tpl' => '{NEW_ROW_XXXXX}',
	)
);
