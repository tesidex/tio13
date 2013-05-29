<?php defined('COT_CODE') or die('Wrong URL');

/* ====================
[BEGIN_COT_EXT]
Hooks=index.tags
Tags=index.tpl:{GALLERY_PICS}
[END_COT_EXT]
==================== */

/**
 * block GALLERY usability modification
 *
 * @package block
 * @version 0.9.13
 * @author tesidex Team
 * @copyright Copyright (c) tesidex 2012-2013
 * @license BSD
 */

global $db;
$image1 = $db->query("SELECT page_avatar FROM cot_pages
		      WHERE page_avatar IS NOT NULL AND page_cat = 'gallery' AND page_state = 0")->fetchColumn();

if(empty($image1)) cot_error ('Image1 not found','block.gallery');

$image2 = $db->query("SELECT page_avatar FROM cot_pages
		      WHERE page_avatar IS NOT NULL AND page_cat = 'gallery' AND page_state = 0")->fetchColumn();

if(empty($image2)) cot_error ('Image2 not found','block.gallery');


if(!cot_error_found())
{
$gallery = new XTemplate(cot_tplfile("block.gallery",'plug'));
$gallery->assign(array(
    'GALLERY_IMAGE1'=> $image1,
    'GALLERY_IMAGE2'=> $image2,
));
$gallery->parse('GALLERY');
$gallery_html = $gallery->text('GALLERY');


$t->assign('INDEX_BLOCK_GALLERY', $gallery_html);
}