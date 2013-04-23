<?php

/* ====================
  [BEGIN_COT_EXT]
  Hooks=page.add.tags
  Tags=page.add.tpl:{PAGEADD_ARCHITECTURE_SELECT},{PAGEADD_LOCATION_SELECT},{PAGEADD_DISTRICT_SELECT},{PAGEADD_REGION_SELECT}
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
	  } elseif(($value['page_cat'] == 'architecture')) {
	       $architecture_values[] = $value['page_id'];
	       $architecture_titles[] = $value['page_title'];
	  }
	  
     }
$object_type_array = explode(',',$cfg['plugin']['objects']['object_types']);

$t->assign(array(
    'PAGEFORM_ARCHITECTURE_SELECT' => cot_selectbox('', 'rpagearchitecture_id', $architecture_values, $architecture_titles,false),
    'PAGEFORM_LOCATION_SELECT' => cot_selectbox('', 'rpagelocation_id', $location_values, $location_titles,false),
    'PAGEFORM_DISTRICT_SELECT' => cot_selectbox('', 'rpagedistrict_id', $district_values, $district_titles,false),
    'PAGEFORM_REGION_SELECT' => cot_selectbox('', 'rpageregion_id', $region_values, $region_titles,false),
//    'PAGEFORM_OBJECTTYPE_SELECT' => cot_selectbox($objecttype_chosen, 'rpageobject_type_id', $object_type_array, $object_type_array,false),
));


