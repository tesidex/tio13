<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=module
[END_COT_EXT]
==================== */

/**
 * Page module main
 *
 * @package new
 * @version 0.9.3
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

// Environment setup
define('COT_NEWS', TRUE);
$env['location'] = 'news';

// Additional API requirements
require_once cot_incfile('extrafields');

// Self requirements
require_once cot_incfile('new', 'module');

// Mode choice
if (!in_array($m, array('add', 'edit')))
{
	if (isset($_GET['id']) || isset($_GET['al']))
	{
		$m = 'main';
	}
	else
	{
		$m = 'list';
	}
}

require_once cot_incfile('new', 'module', $m);
