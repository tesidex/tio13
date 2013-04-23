<?php
/**
 * Removes all implanted configs
 *
 * @package comments
 * @version 0.9.0.2
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2012
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

global $db, $db_config;
$db->delete($db_config, "config_donor = 'comments'");

?>
