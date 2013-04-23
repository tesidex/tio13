<?php
/**
 * 0.9.0.1 new_keywords field
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('new', 'module');

global $db_news;

if (!$db->fieldExists($db_news, 'new_keywords'))
{
	$db->query("ALTER TABLE `$db_news` ADD COLUMN `new_keywords` varchar(255) collate utf8_unicode_ci");
}
?>
