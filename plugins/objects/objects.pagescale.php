<?php

/** 
 * [BEGIN_COT_EXT]
 * Hooks=page.tags
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

//require_once cot_langfile('objects', 'plug');
//require_once cot_incfile('objects', 'plug');
require_once cot_incfile('objects', 'plug', 'resources');
//cot_print($pag['page_cat']);
global $db;

//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
////////////////////РЕДИРЕКТ ДЛЯ СЕЛЕКТОВ/////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

$region_id = cot_import('selregions', 'P', 'TXT');
$district_id = cot_import('seldistricts', 'P', 'TXT');
$location = cot_import('sellocations', 'P', 'TXT');


if($location) {
    $location = $db->query("SELECT page_cat, page_district_alias, page_region_alias, page_alias
	                    FROM $db_pages
			    WHERE page_id=?",$location)->fetch();
    cot_redirect(cot_url('page',
	    'c=' . $location['page_cat'] .
	    '&al=' . $location['page_alias'] .
	    '&rgn=' . $location['page_region_alias'] .
	    '&dst=' . $location['page_district_alias']
    ));  

    
} elseif ($district_id) {
   $district = $db->query("SELECT page_cat, page_region_alias, page_alias
			   FROM $db_pages
			   WHERE page_id=?",$district_id)->fetch();

    cot_redirect(cot_url('page',
	    'c=' . $district['page_cat'] .
	    '&al=' . $district['page_alias'] .
	    '&rgn=' . $district['page_region_alias'])); 

    
} elseif ($region_id) {
     $region = $db->query("SELECT page_alias, page_cat
			   FROM $db_pages
			   WHERE page_id=?",$region_id)->fetch();
     cot_redirect(cot_url('page',
	     'c=' . $region['page_cat'] .
	     '&al=' . $region['page_alias']));
}






//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
////////////////////ФОРМИРОВАНИЕ ТЕГОВ ДЛЯ СПИСКОВ ОБЪЕКТОВ///////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

$type = cot_import('selobjecttypes', 'P', 'TXT');
$type = $db->prep($type);
if ( $pag['page_cat'] == 'architecture' )   {
    if ($type) {
    $architectures = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'architecture'
				AND page_object_type = '$type'
				AND page_location_id = ?",$pag['page_location_id'])
		-> fetchAll();
    } else {
    $architectures = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'architecture' AND
				page_location_id = ?",$pag['page_location_id'])
		-> fetchAll();
    }
    if (empty($architectures))  cot_print('$architectures пуста: ',$architectures);
    else    {
	$kk = 0;
	foreach ($architectures as $loc)
	{
		$kk++;
		$t->assign(cot_generate_pagetags($loc, 'ARCHITECTURES_ROW_', 0, $usr['isadmin']));
		$t->parse('MAIN.ARCHITECTURES_ROW');
	}
    }
}


if ( $pag['page_cat'] == 'location' )   {
//&& ()
    if ($type) {
    $architectures = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'architecture'
				AND page_object_type = '$type'
				AND page_district_id = ?",$pag['page_district_id'])
		-> fetchAll();
    } else {
        $architectures = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'architecture' AND
				page_district_id = ?",$pag['page_district_id'])
		-> fetchAll();

    }
	$kk2 = 0;
	foreach ($architectures as $loc)
	{
		$kk2++;
		$t->assign(cot_generate_pagetags($loc, 'ARCHITECTURES_ROW_', 0, $usr['isadmin']));
		$t->parse('MAIN.ARCHITECTURES_ROW');
	}
	
}

if ( $pag['page_cat'] == 'district' )   {

     
    $locations = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'location' AND
				page_district_id = ?",$pag['page_id'])
		-> fetchAll();
         
    if ($type) {
    $architectures = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'architecture'
				AND page_object_type = '$type'
				AND page_district_id = ?",$pag['page_id'])
		-> fetchAll();
    
    } else {
    
    $architectures = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'architecture' AND
				page_district_id = ?",$pag['page_id'])
		-> fetchAll();
    }
	$kk1 = 0;
	foreach ($locations as $loc)
	{
		$kk1++;
		$t->assign(cot_generate_pagetags($loc, 'LOCATIONS_ROW_', 0, $usr['isadmin']));
		$t->parse('MAIN.LOCATIONS_ROW');
	}

	$kk2 = 0;
	foreach ($architectures as $loc)
	{
		$kk2++;
		$t->assign(cot_generate_pagetags($loc, 'ARCHITECTURES_ROW_', 0, $usr['isadmin']));
		$t->parse('MAIN.ARCHITECTURES_ROW');
	}
	

}

if ( $pag['page_cat'] == 'region' )   {
    $districts = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'district' AND
				page_region_id = ?",$pag['page_id'])
		-> fetchAll();

    if (empty($districts))  cot_print('$districts пуста: ',$districts);
    else    {
	$kk = 0;
	foreach ($districts as $loc)
	{
		$kk++;
		$t->assign(cot_generate_pagetags($loc, 'DISTRICTS_ROW_', 0, $usr['isadmin']));
		$t->parse('MAIN.DISTRICTS_ROW');
	}
    }
    if ($type) {
    $architectures = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'architecture'
				AND page_object_type = '$type'
				AND page_region_id = ?",$pag['page_id'])
		-> fetchAll();
    } else {
    $architectures = $db -> query("SELECT *
				FROM $db_pages
				WHERE page_cat = 'architecture' AND
				page_region_id = ?",$pag['page_id'])
		-> fetchAll();
    }

    if (empty($architectures))  cot_print('$architectures пуста: ',$architectures);
    else    {
	$kk = 0;
	foreach ($architectures as $loc)
	{
		$kk++;
		$t->assign(cot_generate_pagetags($loc, 'ARCHITECTURES_ROW_', 0, $usr['isadmin']));
		$t->parse('MAIN.ARCHITECTURES_ROW');
	}
    }
}