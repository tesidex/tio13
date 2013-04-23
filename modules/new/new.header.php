<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=header.main
[END_COT_EXT]
==================== */

/**
 * Header notices for new news
 *
 * @package Cotonti
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

if ($usr['id'] > 0 && cot_auth('new', 'any', 'A'))
{
	require_once cot_incfile('new', 'module');
	$sql_new_queued = $db->query("SELECT COUNT(*) FROM $db_news WHERE new_state=1");
	$sys['newsqueued'] = $sql_new_queued->fetchColumn();

	if ($sys['newsqueued'] > 0)
	{
		$out['notices_array'][] = array(cot_url('admin', 'm=new'), cot_declension($sys['newsqueued'], $Ls['unvalidated_news']));
	}
}
elseif ($usr['id'] > 0 && cot_auth('new', 'any', 'W'))
{
	require_once cot_incfile('new', 'module');
	$sys['newsqueued'] = (int) $db->query("SELECT COUNT(*) FROM $db_news WHERE new_state=1 AND new_ownerid = " . $usr['id'])->fetchColumn();

	if ($sys['newsqueued'] > 0)
	{
		$out['notices_array'][] = array(cot_url('new', 'c=unvalidated'), cot_declension($sys['newsqueued'], $Ls['unvalidated_news']));
	}
}

if ($usr['id'] > 0 && cot_auth('new', 'any', 'W'))
{
	require_once cot_incfile('new', 'module');

	$sys['newsindrafts'] = (int) $db->query("SELECT COUNT(*) FROM $db_news WHERE new_state=2 AND new_ownerid = " . $usr['id'])->fetchColumn();

	if ($sys['newsindrafts'] > 0)
	{
		$out['notices_array'][] = array(cot_url('new', 'c=saved_drafts'), cot_declension($sys['newsindrafts'], $Ls['news_in_drafts']));
	}
}
