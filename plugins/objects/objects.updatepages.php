<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=page.edit.update.done
 * Order=12
 * [END_COT_EXT]
 */
/**
 * plugin Generate objects for Cotonti Siena
 *
 * @package objects
 * @version 0.9.13
 * @author ElNinjo
 * @copyright tesidex.com
 * @license BSD
 *  */
defined('COT_CODE') or die('Wrong URL.');

//cot_print($rpage);

global $db;
if ($rpage['page_cat'] == 'location') {

    $updres = $db->update('bel_pages',
	    array(
	'page_location_title' => $rpage['page_title'],
	'page_location_alias' => $rpage['page_alias']
	    ), 'page_location_id = ' . $rpage['page_id']);
} elseif ($rpage['page_cat'] == 'district') {

    $updres = $db->update('bel_pages',
	    array(
	'page_district_title' => $rpage['page_title'],
	'page_district_alias' => $rpage['page_alias']
	    ), 'page_district_id = ' . $rpage['page_id']);
} elseif ($rpage['page_cat'] == 'region') {

    $updres = $db->update('bel_pages',
	    array(
	'page_region_title' => $rpage['page_title'],
	'page_region_alias' => $rpage['page_alias']
	    ), 'page_region_id = ' . $rpage['page_id']);
}
if ($updres) cot_watch($updres);


//select page_title, alias where page_id = $rpage['page_id']
switch ($rpage['page_cat']) {
     
     case 'architecture':
	  $selected_location = $db->query("SELECT page_title, page_alias
				  FROM bel_pages 
				  WHERE page_id = {$rpage['page_location_id']}")->fetch();
				  
				  		  
	  $upd = $db->update('bel_pages',
		  array('page_location_title'=>$selected_location['page_title'],
		        'page_location_alias' => $selected_location['page_alias']
		      ),'page_id = '. $rpage['page_id']); 
	  
	  $selected_district = $db->query("SELECT page_title, page_alias
				  FROM bel_pages 
				  WHERE page_id = {$rpage['page_district_id']}")->fetch();
				  
				  		  
	  $upd = $db->update('bel_pages',
		  array('page_district_title'=>$selected_district['page_title'],
		        'page_district_alias' => $selected_district['page_alias']
		      ),'page_id = '. $rpage['page_id']); 
	  
	  $selected_region = $db->query("SELECT page_title, page_alias
				  FROM bel_pages 
				  WHERE page_id = {$rpage['page_region_id']}")->fetch();
				  
				  		  
	  $upd = $db->update('bel_pages',
		  array('page_region_title'=>$selected_region['page_title'],
		        'page_region_alias' => $selected_region['page_alias']
		      ),'page_id = '. $rpage['page_id']); 
	  break;
     
     case 'location':
	  
	  $selected_district = $db->query("SELECT page_title, page_alias
				  FROM bel_pages 
				  WHERE page_id = {$rpage['page_district_id']}")->fetch();
				  
				  		  
	  $upd = $db->update('bel_pages',
		  array('page_district_title'=>$selected_district['page_title'],
		        'page_district_alias' => $selected_district['page_alias']
		      ),'page_id = '. $rpage['page_id']); 
	  
	  $selected_region = $db->query("SELECT page_title, page_alias
				  FROM bel_pages 
				  WHERE page_id = {$rpage['page_region_id']}")->fetch();
				  
				  		  
	  $upd = $db->update('bel_pages',
		  array('page_region_title'=>$selected_region['page_title'],
		        'page_region_alias' => $selected_region['page_alias']
		      ),'page_id = '. $rpage['page_id']); 
	  break;
     
     case 'district':
	  
	   $selected_region = $db->query("SELECT page_title, page_alias
				  FROM bel_pages 
				  WHERE page_id = {$rpage['page_region_id']}")->fetch();
				  
				  		  
	  $upd = $db->update('bel_pages',
		  array('page_region_title'=>$selected_region['page_title'],
		        'page_region_alias' => $selected_region['page_alias']
		      ),'page_id = '. $rpage['page_id']); 
	  
}
