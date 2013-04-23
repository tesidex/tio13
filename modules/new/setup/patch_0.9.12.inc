<?php defined('COT_CODE') or die('Wrong URL');
/**
 * 0.9.12: Fields for meta title and description
 */

require_once cot_incfile('new', 'module');

global $db_news;

if (!$db->fieldExists($db_news, 'new_metatitle'))
{
	$db->query("ALTER TABLE `$db_news` ADD COLUMN `new_metatitle` varchar(255) collate utf8_unicode_ci default NULL");
}

if (!$db->fieldExists($db_news, 'new_metadesc'))
{
	$db->query("ALTER TABLE `$db_news` ADD COLUMN `new_metadesc` varchar(255) collate utf8_unicode_ci default NULL");
}
