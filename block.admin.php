<?php

/* ====================
[BEGIN_COT_EXT]
Hooks=admin.config.edit.loop
[END_COT_EXT]
==================== */

/**
 * block admin usability modification
 *
 * @package block
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */
defined('COT_CODE') or die('Wrong URL');

//require_once cot_incfile('page', 'module');
//
//if ($p == 'block' && $config_name == 'category' && $cfg['jquery'])
//{
//	$sskin = cot_tplfile('block.admin', 'plug', true);
//	$tt = new XTemplate($sskin);
//
//	$categories = explode(',', $config_value);
//	$jj = 0;
//	foreach ($categories as $k => $v)
//	{
//		$v = explode('|', trim($v));
//		if (isset($structure['page'][$v[0]]))
//		{
//			$jj++;
//			$tt->assign(array(
//				'ADDNUM' => $jj,
//				'ADDCATEGORY' => $v[0],
//				'ADDCOUNT' => ((int)$v[1] > 0) ? $v[1] : $cfg['plugin']['block']['maxpages'],
//				'ADDCUT' => ((int)$v[2] > 0) ? $v[2] : ''
//			));
//			$tt->parse('MAIN.ADDITIONAL');
//		}
//	}
//
//	$jj++;
//	$tt->assign(array(
//		'MAINCATEGORY' => cot_selectbox_structure('page', $index, 'blockmaincat'),
//		'CATNUM' => $jj
//	));
//	$tt->parse('MAIN');
//
//	$t->assign('ADMIN_CONFIG_EDIT_CUSTOM', $tt->text('MAIN'));
//}
