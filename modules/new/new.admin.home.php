<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=admin.home.sidepanel
[END_COT_EXT]
==================== */

/**
 * News manager & Queue of news
 *
 * @package Cotonti
 * @version 0.9.4
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */
defined('COT_CODE') or die('Wrong URL');

$tt = new XTemplate(cot_tplfile('new.admin.home', 'module', true));

require_once cot_incfile('new', 'module');

	$newsqueued = $db->query("SELECT COUNT(*) FROM $db_news WHERE new_state='1'");
	$newsqueued = $newsqueued->fetchColumn();
	$tt->assign(array(
		'ADMIN_HOME_URL' => cot_url('admin', 'm=new'),
		'ADMIN_HOME_NEWSQUEUED' => $newsqueued
	));

$tt->parse('MAIN');

$line = $tt->text('MAIN');
