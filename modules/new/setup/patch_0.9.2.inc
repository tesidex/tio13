<?php
/**
 * 0.9.2: add and fill new_markup field
 */

defined('COT_CODE') && defined('COT_UPDATE') or die('Wrong URL');

require_once cot_incfile('new', 'module');

global $db_news, $db_config;

$db->query("ALTER TABLE $db_news ADD COLUMN `new_parser` VARCHAR(64) NOT NULL DEFAULT ''");

if (defined('COT_UPGRADE'))
{
	// Upgrading from Genoa
	$db->update($db_news, array('new_parser' => 'html'), 'new_type = 1');
	$db->update($db_news, array('new_parser' => 'bbcode'), 'new_type = 0');
	// Drop HTML cache and new_type
	$db->query("ALTER TABLE $db_news DROP COLUMN new_type");
	// Set default parsing to bbcode and editor to markitup
	$db->update($db_config, array('config_value' => 'bbcode'), "config_owner = 'module' AND config_cat = 'new' AND config_name = 'parser'");
}
else
{
	// Early Siena patch
	if (cot_extension_installed('bbcode'))
	{
		$db->update($db_config, array('config_value' => 'bbcode'), "config_owner = 'module' AND config_cat = 'new' AND config_name = 'parser'");
		$db->update($db_news, array('new_parser' => 'bbcode'));
	}
	else
	{
		$db->update($db_config, array('config_value' => 'html'), "config_owner = 'module' AND config_cat = 'new' AND config_name = 'parser'");
		$db->update($db_news, array('new_parser' => 'html'));
	}
}

?>
