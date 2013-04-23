<?php

/* ====================
  [BEGIN_COT_EXT]
  Hooks=page.edit.tags
  Tags=page.edit.tpl:{PAGEEDIT_ARCHITECTURE_SELECT},{PAGEEDIT_LOCATION_SELECT},{PAGEEDIT_DISTRICT_SELECT},{PAGEEDIT_REGION_SELECT}
  [END_COT_EXT]
  ==================== */
 
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

require_once cot_incfile('objects', 'plug');



$sql = getObjectsSql();

     foreach ($sql as $key => $value)
     {
	  if($value['page_cat'] == 'region') {
	       $region_values[] = $value['page_id'];
	       $region_titles[] = $value['page_title'];
	  } elseif(($value['page_cat'] == 'location')) {
	       $location_values[] = $value['page_id'];
	       $location_titles[] = $value['page_title'];
	  } elseif(($value['page_cat'] == 'district')) {
	       $district_values[] = $value['page_id'];
	       $district_titles[] = $value['page_title'];
	  }	  
     }
     
     $object_type_array = explode(',',$cfg['plugin']['objects']['object_types']);

switch ($pag['page_cat']) {
     case 'architecture':
	  $location_chosen = $pag['page_location_id'];
	  $district_chosen = $pag['page_district_id'];
	  $region_chosen = $pag['page_region_id'];
	  $objecttype_chosen = $pag['page_object_type'];
	  

	  $pageedit_arr = array(	    
	      'PAGEFORM_LOCATION_SELECT' => cot_selectbox($location_chosen, 'rpagelocation_id', $location_values, $location_titles,false),
	      'PAGEFORM_DISTRICT_SELECT' => cot_selectbox($district_chosen, 'rpagedistrict_id', $district_values, $district_titles,false),
	      'PAGEFORM_REGION_SELECT' => cot_selectbox($region_chosen, 'rpageregion_id', $region_values, $region_titles,false),
//	      'PAGEFORM_OBJECTTYPE_SELECT' => cot_selectbox($objecttype_chosen, 'rpageobject_type_id', $object_type_array, $object_type_array,false),
	  );
	  break;

     case 'location':
	  $location_chosen = $pag['page_id'];
	  $district_chosen = $pag['page_district_id'];
	  $region_chosen = $pag['page_region_id'];

	  $pageedit_arr = array(	     
	      'PAGEFORM_DISTRICT_SELECT' => cot_selectbox($district_chosen, 'rpagedistrict_id', $district_values, $district_titles,false),
	      'PAGEFORM_REGION_SELECT' => cot_selectbox($region_chosen, 'rpageregion_id', $region_values, $region_titles,false),
	  );
	  break;

     case 'district':
	  $district_chosen = $pag['page_id'];
	  $region_chosen = $pag['page_region_id'];

	  $pageedit_arr = array(
	      'PAGEFORM_REGION_SELECT' => cot_selectbox($region_chosen, 'rpagedistrict_id', $region_values, $region_titles,false),
	  );
	  break;
}

$t->assign($pageedit_arr);
$t->parse('MAIN.TAGS');