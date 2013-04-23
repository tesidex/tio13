<?php

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

// Search custom option for SELECT
$R['input_option_selregions'] = '<option data-object="{$data}" value="{$value}"{$selected}>{$title}</option>';
$R['input_option_seldistricts'] = '<option data-object="{$data}" value="{$value}"{$selected}>{$title}</option>';
$R['input_option_sellocations'] = '<option data-object="{$data}" value="{$value}"{$selected}>{$title}</option>';

// Breadcrumbs
$R['breadcrumbs_container'] = '<ul>{$crumbs}</ul>';
$R['breadcrumbs_separator'] = ' / ';
$R['breadcrumbs_link'] = '<a href="{$url}" class=" dropdown-toggle" data-toggle="dropdown" title="{$title}">{$title}</a>';
$R['breadcrumbs_plain'] = '{$title}';
$R['breadcrumbs_elem_custom'] = '<li class="dropdown">{$elem}'.
	'<ul class="dropdown-menu">
	    <li>sub1</li>
	    <li>sub2</li>
	    </ul>
	    </li>';
$R['breadcrumbs_first'] = '{$crumb}первый';
$R['breadcrumbs_last'] = '{$crumb}';