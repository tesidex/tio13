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
$objform = new XTemplate(cot_tplfile('objects.search', 'plug'));

$region_id = cot_import('selregions','P','INT');
$district_id = cot_import('seldistricts','P','INT');
$location_id = cot_import('sellocations','P','INT');

$region_array = getObjects('region');
$district_array = getObjects('district', $region_id);

if (empty($district_id) && !empty($region_id)) {
     $location_array = getLocationsForRegion($region_id);
} else {
     $location_array = getObjects('location', $district_id);
}

$object_type_array = explode(',',$cot_extrafields['bel_pages']['object_type']['field_variants']);

$objform->assign(array(
    'SEARCH_REGION_SELECT' => cot_selectbox_objects('', 'selregions', empty($region_array) ? '' : $region_array['ids'], empty($region_array) ? '' : $region_array['titles'],true,'','',false,$region_array['url']),
    'SEARCH_DISTRICT_SELECT' => cot_selectbox_objects('', 'seldistricts', empty($district_array) ? '' : $district_array['ids'],empty($district_array) ? '' : $district_array['titles'],true,'','',false,$district_array['url']),
    'SEARCH_LOCATION_SELECT' => cot_selectbox_objects($location_id, 'sellocations', empty($location_array) ? '' : $location_array['ids'], empty($location_array) ? '' : $location_array['titles'],true,'','',false,$location_array['url']),
    'SEARCH_OBJECTTYPE_SELECT' => cot_selectbox('', 'selobjecttypes', array_values($object_type_array)),
));


$objform->parse('OBJECTSSEARCH');
$objform_html = $objform->text('OBJECTSSEARCH');

$t->assign('PAGE_OBJECTSSEARCH', $objform_html);
