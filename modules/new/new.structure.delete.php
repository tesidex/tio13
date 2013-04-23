<?php defined('COT_CODE') or die('Wrong URL');
/* ====================
[BEGIN_COT_EXT]
Hooks=structure.delete
[END_COT_EXT]
==================== */

/**
 * Page module
 *
 * @package new
 * @version 0.9.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

if ($extension == 'new') {
	  $auth_tables = $db->query("SHOW TABLES LIKE '%auth'")->fetchAll(PDO::FETCH_COLUMN, 0);
	  $structure_tables = $db->query("SHOW TABLES LIKE '%structure'")->fetchAll(PDO::FETCH_COLUMN, 0);
	  $len = count($structure_tables);
	  $i = 0; // counter
	  foreach ($structure_tables as $structure_table) {
	       $db->delete($structure_table, "structure_area=? AND structure_code=?", array($extension, $code));

	       $i++;
	       
		    $db->delete($db_config, "config_cat=? AND config_subcat=? AND config_owner='module'", array($extension, $code));
		    $is_module && cot_auth_remove_item_custom($extension, $code, $auth_tables[$i-1]); //?
			
		    if ($i == $len) { //last iteration
		    $area_deletecat = 'cot_' . $extension . '_deletecat';
		    (function_exists($area_deletecat)) ? $area_deletecat($code) : FALSE;
		    unset($structure[$extension][$code]);
		    if ($cache) {
			 $cache->clear();
		    }

		    
	       }
	  }
	  return true;
}

