<?php

/* ====================
  [BEGIN_COT_EXT]
  Hooks=tools
  [END_COT_EXT]
  ==================== */

/**
 * Creates aliases in existing pages with empty alias
 *
 * @package converter
 * @version 0.9.12
 * @author Kiryl
 * @copyright (c) Tesidex
 * @license BSD
 */
(defined('COT_CODE') && defined('COT_ADMIN')) or die('Wrong URL.');
$t = new XTemplate(cot_tplfile('converter.admin', 'plug', true));
require_once cot_incfile('page', 'module');
require_once cot_incfile('converter', 'plug');

$a = cot_import('button', 'P', 'TXT');
$convert_option = cot_import('convert_options_list', 'P', 'TXT');
$delete_option = cot_import('delete_options_list', 'P', 'TXT');
switch ($convert_option) {
     case 'blogs':
	  $source_table = 'blogs_posts';
	  $target_table = $db_pages;
	  break;
     case 'users':
	  
	  $source_table = 'users';
	  $target_table = $db_users;
	  break;
     case 'belarus':
	  $architecture_table = 'sf_architecture';
	  $locations_table = 'sf_locations';
	  $target_table = $db_pages;
}

switch ($delete_option) {
     case 'blogs':
	  $target_table = $db_pages;
	  break;
     case 'users':
	  $target_table = $db_users;
	  break;
}

//source_db_list
$values_array = array('blogs','users','architecture');
$convert_titles_array = array('Blogs Posts To Cot_Pages','Users to Cot_Users','Architecture');
$delete_titles_array = array('Pages','Users');

$t->assign(array(
    'CONVERT_VARIANTS_LIST' => cot_radiobox($values_array[0], 'convert_options_list', $values_array, $convert_titles_array,'','<br>'),
    'DELETE_VARIANTS_LIST' => cot_radiobox($values_array[0], 'delete_options_list', $values_array, $delete_titles_array,'','<br>'),
));



if ($a == 'begin') {

     $source_table_arr = $db->query("SELECT * FROM $source_table 
				     ORDER BY id")->fetchAll();

     switch ($convert_option) {
	  case 'blogs':
	       $res = convertBlogs($source_table_arr, $target_table);
	       cot_check($res == false,'Something went wrong when converting blogs');
	       break;
	  case 'users':
	       $res = convertUsers($source_table_arr, $target_table);
	       cot_check($res == false,'Something went wrong when converting users');
	       break;
	  case 'architecture':
	       $res = convertArchitecture($architecture_table,$locations_table,$target_table);
	       cot_check($res == false,'Something went wrong when converting users');
	       break;
     }
     
     if (!cot_error_found()) {
	  cot_message($target_table.' converted');
     }
     
} elseif ($a == 'delete') {

     switch ($delete_option) {
	  case 'blogs': case 'architecture':
	       $res = deleteBlogs($target_table);
	       cot_check($res == false,'Something went wrong when deleting blogs');
	       break;
	  case 'users':
	       $res = deleteUsers($target_table);
	       cot_check($res == false,'Something went wrong when deleting users');
	       break;
     }
     if (!cot_error_found()) {
	  cot_message($target_table.' deleted');
     }
}



//$db2 = extraDB('localhost', $port, 'shop', 'root', ''); //connects one more database

cot_display_messages($t);
$t->parse('MAIN');
if (COT_AJAX) {
     $t->out('MAIN');
} else {
     $adminmain = $t->text('MAIN');
}
?>