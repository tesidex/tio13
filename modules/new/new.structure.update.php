<?php defined('COT_CODE') or die('Wrong URL');
/* ====================
[BEGIN_COT_EXT]
Hooks=structure.update
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

//if ($extension == 'new') {
//     $structure_tables = $db->query("SHOW TABLES LIKE '%structure'")->fetchAll(PDO::FETCH_COLUMN, 0);
//     $config_tables = $db->query("SHOW TABLES LIKE '%config'")->fetchAll(PDO::FETCH_COLUMN, 0);
//     $auth_tables = $db->query("SHOW TABLES LIKE '%auth'")->fetchAll(PDO::FETCH_COLUMN, 0);
//     $structure_num = count($structure_tables); //num of iterations
//     $i = 0; // counter
////cot_print($old_data['structure_code'],$new_data['structure_code']);
//     if ($old_data['structure_code'] != $new_data['structure_code']) {
//	       foreach ($structure_tables as $structure_table) {
//	       $i++;
//	       if ($db->query("SELECT COUNT(*) FROM $structure_table WHERE structure_area=? AND structure_code=?", array($extension, $new_data['structure_code']))->fetchColumn() == 0) {
//		   
//	       $is_module && $db->update($auth_tables[$i-1], array('auth_option' => $new_data['structure_code']), 
//		       "auth_code=? AND auth_option=?", array($extension, $old_data['structure_code']));
//	       $db->update($config_tables[$i-1], array('config_subcat' => $new_data['structure_code']), 
//		       "config_cat=? AND config_subcat=? AND config_owner='module'", array($extension, $old_data['structure_code']));
//		    
//		    if ($structure_num == $i) {
//		    $area_updatecat = 'cot_' . $extension . '_updatecat';
//		    cot_new_updatecat($old_data['structure_code'], $new_data['structure_code']);
//		    (function_exists($area_updatecat)) ? $area_updatecat($old_data['structure_code'], $new_data['structure_code']) : FALSE;
//		    cot_auth_reorder();
//		    }
//		    
//	       } else {
//		    unset($new_data['structure_code']);
//		    return array('adm_cat_exists', 'default');
//	       }
//	  }
//     }
//
//     $area_sync = 'cot_' . $extension . '_sync';
//     $new_data['structure_count'] = (function_exists($area_sync)) ? $area_sync($new_data['structure_code']) : 0;
//
//
//     foreach ($structure_tables as $structure_table) {
//	  $sql1 = $db->update($structure_table, $new_data, 'structure_id=' . (int) $id);
//     }
//     
//     return true;
//}