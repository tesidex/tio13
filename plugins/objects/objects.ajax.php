<?php

/** 
 * [BEGIN_COT_EXT]
 * Hooks=ajax
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
require_once cot_incfile('objects', 'plug');
//require_once cot_incfile('objects', 'plug', 'resources');

//cot_watch($_GET); // на вход ajax
cot_check_xg();
$mode = cot_import('mode', 'G', 'TXT');
$regVal = cot_import('regVal', 'G', 'INT');
$dstVal = cot_import('dstVal', 'G', 'INT');

if ($mode == 'regions') {
     $district_array = getObjects('district', $regVal);
     $str_distr = cot_selectbox('', 'seldistricts', empty($district_array) ? '' : array_keys($district_array), empty($district_array) ? '' : array_values($district_array));
     echo($str_distr);
} elseif ($mode == 'regions2') {
     $location_array = getLocationsForRegion($regVal);
     $str_loc = cot_selectbox('', 'sellocations', empty($location_array) ? '' : array_keys($location_array), empty($location_array) ? '' : array_values($location_array));
     echo($str_loc);
} elseif ($mode == 'districts') {
     $location_array = getObjects('location', $dstVal);
     $str_loc = cot_selectbox('', 'sellocations', empty($location_array) ? '' : array_keys($location_array), empty($location_array) ? '' : array_values($location_array));
     echo($str_loc);
}
