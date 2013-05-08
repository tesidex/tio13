<?php
/**
 * English Language File for Block Plugin
 *
 * @package block
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

/**
 * Plugin Info
 */

$L['info_desc'] = 'Outputs blockfeed at homepage from selected category pages';

/**
 * Plugin Config
 */

$L['cfg_category'] = 'Block categories';
$L['cfg_category_hint'] = 'Separate block category codes with commas.<br />Use {INDEX_BLOCK} in index.tpl to output main (first) block category at the home page.<br />Additional block categories can be displayed at the home page using <strong>{INDEX_BLOCK_CATEGORYCODE}</strong> tag in index.tpl.<br />Use <strong>block.categorycode.tpl</strong> template(s) to customize appearance of each block category.';
$L['cfg_maxpages'] = 'Number of recent pages displayed';
$L['cfg_syncpagination'] = 'Sync pagination';
$L['cfg_cache_ttl'] = 'Cache TTL';
$L['cfg_cache_ttl_hint'] = '0 - cache off';

$L['Maincat']='Main block category';
$L['Addcat']='Additional block categories';
$L['BlockCount']='Block per page';
$L['Template']='Template';
$L['Template_help']='If additional block category template does not exits in {YOUR_SKIN}/plugins folder, system will use main block template';
$L['Blockcat_exists']='This block category has already been chosen. Please choose another one or delete this category';
$L['Unsetadd']= 'Do not use additional category if it is same as main category';
$L['Blockautocut']='Post length limit';
$L['Blockautocutdesc']='This will display only specified number characters with paragraphs from the beginning of block posts. By default the cutting option is disabled.';

$L['block_help'] = '';
