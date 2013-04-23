<?php

/** 
 * [BEGIN_COT_EXT]
 * Hooks=pagetags.main
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
//cot_print(!defined('COT_LIST'));
if (defined('COT_PAGES') && !defined('COT_LIST') && ($page_data['page_cat'] == 'location'))   {
    $tmp[] = array("brestskaya",'Брестская область');
    $tmp[] = array("kobrinskiy",'Кобринский район');
    $merge1 = array_merge($tmp, $pagepath);
    $merge2 = array_merge($merge1, $page_link);
//    cot_print($merge1,	    $merge2,$page_data['page_pageurl'],$pagepath);
    $page_data['page_fulltitle'] = cot_breadcrumbs($merge2, $pagepath_home, '','','breadcrumbs_elem_custom');

    $temp_array['TITLE'] = $page_data['page_fulltitle'];
    
}

