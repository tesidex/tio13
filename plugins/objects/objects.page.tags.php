<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=pagetags.main
 * Order=11
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

require_once cot_langfile('objects', 'plug');
require_once cot_incfile('objects', 'plug');
require_once cot_incfile('objects', 'plug', 'resources');

//cot_print(!defined('COT_LIST'));
//if (defined('COT_PAGES') && !defined('COT_LIST') && ($page_data['page_cat'] == 'location'))   {

if (empty($page_data['page_alias'])) return;

if ($page_data['page_cat'] == 'architecture') {

    $page_data['page_pageurl'] = cot_url('page',
	    'c=' . $page_data['page_cat'] .
	    '&al=' . $page_data['page_alias'] .
	    '&rgn=' . $page_data['page_region_alias'] .
	    '&dst=' . $page_data['page_district_alias'] .
	    '&loc=' . $page_data['page_location_alias']
    );

    $temp_array['URL'] = $page_data['page_pageurl'];
} elseif ($page_data['page_cat'] == 'location') {

    $page_data['page_pageurl'] = cot_url('page',
	    'c=' . $page_data['page_cat'] .
	    '&al=' . $page_data['page_alias'] .
	    '&rgn=' . $page_data['page_region_alias'] .
	    '&dst=' . $page_data['page_district_alias']
    );

    $temp_array['URL'] = $page_data['page_pageurl'];
} elseif ($page_data['page_cat'] == 'district') {

    $page_data['page_pageurl'] = cot_url('page',
	    'c=' . $page_data['page_cat'] .
	    '&al=' . $page_data['page_alias'] .
	    '&rgn=' . $page_data['page_region_alias']
    );

    $temp_array['URL'] = $page_data['page_pageurl'];
}

//if (($page_data['page_alias'] == 'Korelichskij-rajon'))
//	cot_watch($page_data['page_cat'], $page_data['page_alias'],
//	    $page_data['page_district_alias'], $page_data['page_region_alias'],
//	    $temp_array['URL']);