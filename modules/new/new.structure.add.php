<?php defined('COT_CODE') or die('Wrong URL');
/* ====================
[BEGIN_COT_EXT]
Hooks=structure.add
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
     
     if (!empty($data['structure_title']) && !empty($data['structure_code']) && !empty($data['structure_path']) && $data['structure_code'] != 'all') {
	  $auth_tables = $db->query("SHOW TABLES LIKE '%auth'")->fetchAll(PDO::FETCH_COLUMN, 0);
	  $structure_tables = $db->query("SHOW TABLES LIKE '%structure'")->fetchAll(PDO::FETCH_COLUMN, 0);
	  $len = count($structure_tables); //num of iterations
	  $i = 0; // counter
	  
	  $auth_permit = array(COT_GROUP_DEFAULT => 'RW', COT_GROUP_GUESTS => 'R', COT_GROUP_MEMBERS => 'RW');
	  $auth_lock = array(COT_GROUP_DEFAULT => '0', COT_GROUP_GUESTS => 'A', COT_GROUP_MEMBERS => '0');
	  foreach ($structure_tables as $structure_table) {
	       $sql = $db->query("SELECT COUNT(*) FROM $structure_table WHERE structure_area=? AND structure_code=?", array($extension, $data['structure_code']));
	       if ($sql->fetchColumn() == 0) {
		    $sql = $db->insert($structure_table, $data);

		    $i++;
		    $is_module && cot_auth_add_item_custom($extension, $data['structure_code'], $auth_permit, $auth_lock, $auth_tables[$i-1]);
		    if ($i == $len) { //last iteration
			 $area_addcat = 'cot_' . $extension . '_addcat';
			 (function_exists($area_addcat)) ? $area_addcat($data['structure_code']) : FALSE;
			 $cache && $cache->clear();
			 return true;
		    }
		    } else {
//			 cot_print($sql->fetchColumn());
			 return array('adm_cat_exists', 'rstructurecode');
		    }
	       }
	  return true;
     } else {
	  return false;
     }
}

