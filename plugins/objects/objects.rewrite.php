<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=urleditor.rewrite.first
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

if (isset($_GET['m'])) return;

$region_array = array(
    'Brestskaya-oblast' => 'Brestskaya-oblast',
    'Vitebskaya-oblast' => 'Vitebskaya-oblast',
    'Gomelskaya-oblast' => 'Gomelskaya-oblast',
    'Grodnenskaya-oblast' => 'Grodnenskaya-oblast',
    'Minskaya-oblast' => 'Minskaya-oblast',
    'Mogilyovskaya-oblast' => 'Mogilyovskaya-oblast'
);
$temp = ($path[0] == 'region') ? $path[1] : $path[0];
//			cot_print($path,isset($region_array[$temp])				);

if (isset($region_array[$temp])) {

    if (true) {
	$_GET['al'] = $path[$count-1]; // временно, пока нет усадеб и кафе
	$_GET['e'] = 'page';
	$_GET['c'] = 'architecture';
	$rwr_continue = false;
//    cot_watch($path, $_GET);
	return;
    }
}
if ((($path[0] == 'users') || ($path[0] == 'company')) && $count == 1) {
    // company list
    $_GET['e'] = 'users';
    $rwr_continue = false;
//    cot_watch($path, $_GET);
    return;
}

if ((($path[0] == 'users') || ($path[0] == 'company')) && $count == 2) {
    // company profiles
    $_GET['e'] = 'users';
    $_GET['m'] = 'details';
    $_GET['u'] = $path[1];
    $rwr_continue = false;
    return;
}
