<?php

/**
 * Converter Plugin API
 *
 * @package converter
 * @version 0.9.12
 * @author Cotonti Team
 * @copyright (c) 2008-2012 Cotonti Team
 * @license BSD
 */
defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('structure');

/**
 * Copies blogs to target cotonti table
 *
 * @param array $source_table_arr An array fetched blogs table
 * @param string $target_table Cotonti table where to insert
 */
function convertBlogs($source_table_arr, $target_table) {
     global $db;
     cot_extrafield_add($target_table, 'is_comment', 'radio', '', '0, 1', '', '', '', '', '');
     cot_extrafield_add($target_table, 'subject', 'input', '', '', '', '', '', '', '');

     foreach ($source_table_arr as $value) {

	  $blogs['page_subject'] = $value['subject'];
	  $blogs['page_is_comment'] = $value['is_comment'];
	  $blogs['page_ownerid'] = $value['user_id'];
	  $blogs['page_title'] = $value['title'];
	  $blogs['page_desc'] = $value['description'];
	  $blogs['page_text'] = $value['body'];
	  $blogs['page_id'] = $value['id'];
	  $blogs['page_date'] = strtotime($value['created_at']);
	  $blogs['page_begin'] = strtotime($value['created_at']); //page
	  $blogs['page_updated'] = strtotime($value['updated_at']);
	  $blogs['page_cat'] = 'blogs';
	  $res = $db->insert($target_table, $blogs);
	  
     }
     

     //updates structure with blogs if not updated


     $structure_path = $db->query("SELECT max( structure_path ) 
				   FROM `cot_structure`")->fetchColumn();
     $blogs_cat = array('structure_area'   => 'page',
			'structure_code'   => 'blogs',
			'structure_title'  =>  'Blogs',
			'structure_path'   =>   ++$structure_path
	 );
     $res = cot_structure_add('page', $blogs_cat,TRUE);
     return $res;
}

/**
 * Copies users to target cotonti table
 *
 * @param array $source_table_arr An array fetched users table
 * @param string $target_table Cotonti table where to insert
 *
 * @global CotDB $db
 */
function convertUsers($source_table_arr, $target_table) {
     global $db, $db_groups, $cot_groups;
     
     unset($cot_groups);
//     cot_watch($cot_groups);
if (!$cot_groups )
{
	$sql = $db->query("SELECT * FROM $db_groups WHERE grp_disabled=0 ORDER BY grp_id ASC");

	if ($sql->rowCount() > 0)
	{
		while ($row = $sql->fetch())
		{
			$cot_groups[$row['grp_id']] = array(
				'id' => $row['grp_id'],
				'alias' => $row['grp_alias'],
				'level' => $row['grp_level'],
   				'disabled' => $row['grp_disabled'],
   				'hidden' => $row['grp_hidden'],
				'state' => $row['grp_state'],
				'name' => htmlspecialchars($row['grp_name']),
				'title' => htmlspecialchars($row['grp_title']),
				'desc' => htmlspecialchars($row['grp_desc']),
				'icon' => $row['grp_icon'],
				'pfs_maxfile' => $row['grp_pfs_maxfile'],
				'pfs_maxtotal' => $row['grp_pfs_maxtotal'],
				'ownerid' => $row['grp_ownerid'],
				'skiprights' => $row['grp_skiprights']
			);
		}
		$sql->closeCursor();
	}
	else
	{
		cot_diefatal('No groups found.');
	}
//     cot_watch($cot_groups);

	$cache && $cache->db->store('cot_groups', $cot_groups, 'system');
}

     
     cot_extrafield_add($target_table, 'city', 'input', '', '', '', '', '', '', '');
     cot_extrafield_add($target_table, 'firstname', 'input', '', '', '', '', '', '', '');
     cot_extrafield_add($target_table, 'surname', 'input', '', '', '', '', '', '', '');
     cot_extrafield_add($target_table, 'business_scope', 'input', '', '', '', '', '', '', '');
     cot_extrafield_add($target_table, 'forum_user_id', 'input', '', '', '', '', '', '', '');
     
     $groups_arr = array('1'  => '5',
			 '2'  => '4',
			 '3'  => '7',
			 '4'  => '9',
			 '5'  => '8',
			 '6'  => '10',
			 '7'  => '6',
			 '8'  => '11'
	 );

     foreach ($source_table_arr as $value) {
	  
	  $users['user_maingrp'] =  $groups_arr[$value['group_id']];
	  $users['user_id'] = $value['id'];
	  $users['user_forum_user_id'] = $value['forum_user_id'];
	  $users['user_name'] = $value['login'];
	  $users['user_firstname'] = $value['name'];
	  $users['user_surname'] = $value['surname'];
	  $users['user_business_scope'] = $value['business_scope'];
	  $users['user_regdate'] = strtotime($value['created_at']);
	  $users['user_password'] = $value['password'];
	  $users['user_birthdate'] = $value['birthday'];
	  $users['user_email'] = $value['email'];
	  $users['user_country'] = $value['country'];
	  $users['user_city'] = $value['city'];
	  $users['user_lastip'] = $value['ip'];
	  $users['user_passfunc'] = 'md5';
	  $res = $db->insert($target_table, $users);

	  $db -> insert('cot_groups_users',array(
	      'gru_userid' => $users['user_id'],
	      'gru_groupid' => $users['user_maingrp']
	  ));
     }
     return $res;
     
}

/**
 * Deletes blogs from target cotonti table
 *
 * @param string $target_table Cotonti table where to insert
 * @return bool
 *
 * @global CotDB $db
 */
function deleteBlogs($target_table) {
     global $db;

     cot_extrafield_remove($target_table, 'is_comment');
     cot_extrafield_remove($target_table, 'subject');
     
     
     $prepared = $db->prepare("TRUNCATE TABLE $target_table");
     $res = $prepared->execute();
     
     $res = cot_structure_delete('page', 'blogs');
     return $res;
     
}

/**
 * Deletes users from target cotonti table
 *
 * @param string $target_table Cotonti table where to delete
 * @return bool
 * 
 * @global CotDB $db
 */
function deleteUsers($target_table) {
     global $db;

     cot_extrafield_remove($target_table, 'city');
     cot_extrafield_remove($target_table, 'firstname');
     cot_extrafield_remove($target_table, 'surname');
     cot_extrafield_remove($target_table, 'business_scope');
     cot_extrafield_remove($target_table, 'forum_user_id');

     //TODO TRUNCATE cot_groups_users

     $prepare_groups_users = $db->prepare("TRUNCATE TABLE `cot_groups_users` ");
     $res = $prepare_groups_users->execute();
     	  $db -> insert('cot_groups_users',array(
	      'gru_userid' => 1,
	      'gru_groupid' => 5
	  ));
     
     $prepared = $db->prepare("DELETE FROM $target_table
			WHERE user_id!=1");
     $res = $prepared->execute();


     return $res;
}

// `description_small` text,
//  `description` text,
//  `image` varchar(255) DEFAULT NULL,
//  `is_image_show` tinyint(1) DEFAULT '1',
//  `region_id` int(11) DEFAULT NULL,
//  `type_id` int(11) DEFAULT NULL,
//  `location_id` int(11) DEFAULT NULL,
//  `address` varchar(255) NOT NULL,
//  `map_latitude` float(10,6) DEFAULT NULL,
//  `map_longitude` float(10,6) DEFAULT NULL,
function convertArchitecture($source_table_arr, $target_table) {
     global $db;
     
     cot_extrafield_add($target_table, 'is_image_show', 'input', $R['input_text'],
	     '', '', '', '', 
	     'SHOW IMAGE', '','', "tinyint(1) DEFAULT '1'");
     cot_extrafield_add($target_table, 'region_id', 'input', $R['input_text'],
	     '', '', '', '', 
	     'REGION ID', '','', "int(11) DEFAULT NULL");
     cot_extrafield_add($target_table, 'district_id', 'input', $R['input_text'],
	     '', '', '', '', 
	     'DISTRICT ID', '','', "int(11) DEFAULT NULL");
     cot_extrafield_add($target_table, 'type_id', 'input', $R['input_text'],
	     '', '', '', '', 
	     'TYPE ID', '','', "int(11) DEFAULT NULL");
     cot_extrafield_add($target_table, 'location_id', 'input', $R['input_text'],
	     '', '', '', '', 
	     'LOCATION ID', '','', "int(11) DEFAULT NULL");
     cot_extrafield_add($target_table, 'map_longitude', 'input', $R['input_text'],
	     '', '', '', '', 
	     'LONGITUDE', '','', "float(10,6) DEFAULT NULL");
     cot_extrafield_add($target_table, 'map_latitude', 'input', $R['input_text'],
	     '', '', '', '', 
	     'LATITUDE', '','', "float(10,6) DEFAULT NULL");
     cot_extrafield_add($target_table, 'address', 'input', $R['input_text'],
	     '', '', '', '', 
	     'ADDRESS', '','', "varchar(255) NOT NULL");

     foreach ($architecture_table_arr as $value) {

	  $architecture['page_id'] = $value['id'];
	  $architecture['page_title'] = $value['name'];
	  $architecture['page_body'] = $value['description'];
	  $architecture['page_desc'] = $value['small_description'];
	  $architecture['page_avatar'] = $value['image'];
	  $architecture['page_is_image_show'] = $value['region_id'];
	  $architecture['page_region_id'] = 1;
	  $architecture['page_district_id'] = $value['id'];
	  $architecture['page_type_id'] = $value['type_id'];
	  $architecture['page_location_id'] = $value['location_id'];
	  $architecture['page_address'] = $value['address'];
	  $architecture['page_map_latitude'] = $value['map_latitude'];
	  $architecture['page_map_longitude'] = $value['map_longitude'];
	  $architecture['page_alias'] = $value['slug'];
	  $architecture['page_metadesc'] = $value['seo_description'];
	  $architecture['page_keywords'] = $value['seo_keywords'];
	  $architecture['page_date'] = strtotime($value['created_at']);
	  $architecture['page_begin'] = strtotime($value['created_at']); //page
	  $architecture['page_updated'] = strtotime($value['updated_at']);
	  $architecture['page_cat'] = 'architecture';
	  $architecture['page_ownerid'] = 59;
	  $res = $db->insert($target_table, $architecture);
	  
     }
     
      foreach ($locations_table_arr as $value) {

	  $locations['page_id'] = $value['id'];
	  $locations['page_title'] = $value['name'];
	  $locations['page_region_id'] = $value['id'];
	  $locations['page_desc'] = $value['description'];
	  $locations['page_small_desc'] = $value['small_description'];
	  $locations['page_avatar'] = $value['image'];
	  $locations['page_is_image_show'] = $value['region_id'];	  
	  $locations['page_type_id'] = $value['type_id'];
	  $locations['page_location_id'] = $value['location_id'];
	  $locations['page_address'] = $value['address'];
	  $locations['page_map_latitude'] = $value['map_latitude'];
	  $locations['page_map_longitude'] = $value['map_longitude'];
	  $locations['page_slug'] = $value['slug'];
	  $locations['page_metadesc'] = $value['seo_description'];
	  $locations['page_keywords'] = $value['seo_keywords'];
	  $locations['page_date'] = strtotime($value['created_at']);
	  $locations['page_begin'] = strtotime($value['created_at']); //page
	  $locations['page_updated'] = strtotime($value['updated_at']);
	  $locations['page_cat'] = 'architecture';
	  $res = $db->insert($target_table, $architecture);
	  
     }
     

     //updates structure with architecture if not updated


     $structure_path = $db->query("SELECT max( structure_path ) 
				   FROM `cot_structure`")->fetchColumn();
     $architecture_cat = array('structure_area'   => 'page',
			'structure_code'   => 'architecture',
			'structure_title'  =>  'Architecture',
			'structure_path'   =>   ++$structure_path
	 );
     $res = cot_structure_add('page', $architecture_cat,TRUE);
     return $res;
}

function deleteArchitecture($target_table) {
     global $db;

     cot_extrafield_remove($target_table, 'is_image_show');
     cot_extrafield_remove($target_table, 'region_id');
     cot_extrafield_remove($target_table, 'district_id');
     cot_extrafield_remove($target_table, 'type_id');
     cot_extrafield_remove($target_table, 'location_id');
     cot_extrafield_remove($target_table, 'map_longitude');
     cot_extrafield_remove($target_table, 'map_latitude');
     cot_extrafield_remove($target_table, 'address');
     
     
     $prepared = $db->prepare("TRUNCATE TABLE $target_table");
     $res = $prepared->execute();
     
     $res = cot_structure_delete('page', 'architecture');
     return $res;
     
}

/**
 * Creates object for database connection
 *
 * @param string $host Database host name
 * @param string $port Database port if exists
 * @param string $name Database name 
 * @param string $name Database user name
 * @param string $name Database user password  
 */
function extraDB($host, $port, $name, $user, $password) {
     $dbc_port = empty($port) ? '' : ';port=' . $port;
     return new CotDB('mysql:host=' . $host . $dbc_port . ';dbname=' . $name, $user, $password);
}

?>