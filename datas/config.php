<?php
/**
 * Configuration
 *
 * @package Cotonti
 * @version 0.9.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

// ========================
// MySQL database parameters. Change to fit your host.
// ========================

$cfg['mysqlhost'] = 'localhost';	// Database host URL
$cfg['mysqlport'] = '';				// Database port, if non-default
$cfg['mysqluser'] = 'root';			// Database user
$cfg['mysqlpassword'] = '2826351';			// Database password
$cfg['mysqldb'] = 'tio';		// Database name
// MySQL database charset and collate. Very useful when MySQL server uses different charset rather than site
// See the list of valid values here: http://dev.mysql.com/doc/refman/5.1/en/charset-charsets.html
$cfg['mysqlcharset'] = 'utf8';
$cfg['mysqlcollate'] = 'utf8_unicode_ci';

// ========================
// Main site URL without trailing slash.
// ========================

$cfg['mainurl'] = 'http://belarus.tio';
$cfg['site_id'] = 'd46104f8db811335f4afa0bdcc7790e8';
$cfg['secret_key'] = '10428de622baffa1a701d60538bdd278';
$cfg['multihost'] = FALSE;			// Allow multiple host names for this site

// ========================
// Default theme, color scheme and default language
// ========================

$cfg['defaulttheme'] = 'nemesis';	// Default theme code. Be SURE it's pointing to a valid folder in ./themes/... !!
$cfg['defaultscheme'] = 'default';	// Default color scheme, only name, not like themename.css. Be SURE it's pointing to a valid folder in ./themes/defaulttheme/... !!
$cfg['defaulticons'] = 'default';	// Default icon pack
$cfg['defaultlang'] = 'ru';			// Default language code
$cfg['enablecustomhf'] = FALSE;		// To enable header.$location.tpl and footer.$location.tpl
$cfg['admintheme'] = '';			// Put custom administration theme name here

// ========================
// Performance-related settings
// ========================

$cfg['cache'] = FALSE;			// Enable data caching
$cfg['cache_drv'] = '';			// Cache driver name to use on your server (if available)
								// Possible values: APC, eAccelerator, Memcache, Xcache
$cfg['xtpl_cache'] = FALSE;		// Enable XTemplate structure disk cache. Should be TRUE on production sites
$cfg['html_cleanup'] = FALSE;	// Wipe extra spaces and breaks from HTML to get smaller footprint

$cfg['cache_index'] = FALSE;    // Static page cache for guests on index
$cfg['cache_page'] = FALSE;     // Static page cache for guests on pages and categories
$cfg['cache_forums'] = FALSE;   // Static page cache for guests on forums

// ========================
// More settings
// Should work fine in most of cases.
// If you don't know, don't change.
// TRUE = enabled / FALSE = disabled
// ========================

$cfg['check_updates'] = FALSE;		// Automatically check for updates, set it TRUE to enable

$cfg['display_errors'] = TRUE;		// Display error messages. Switch it FALSE on production sites

$cfg['redirmode'] = FALSE;			// 0 or 1, Set to '1' if you cannot sucessfully log in (IIS servers)
$cfg['xmlclient'] = FALSE;  		// For testing-purposes only, else keep it off.
$cfg['ipcheck'] = FALSE;  			// Will kill the logged-in session if the IP has changed
$cfg['authcache'] = FALSE;			// Auth cache in SQL tables. Set it FALSE if your huge database
									// goes down because of that
$cfg['customfuncs'] = FALSE;		// Includes file named functions.custom.php
$cfg['new_install'] = false;			// This setting denotes a new install step and redirects you to the install page
									// If you already have Cotonti installed then set it to FALSE or remove it
$cfg['useremailduplicate'] = FALSE;     // Allow users to register new accounts with duplicate email. DO NOT ENABLE this setting unless you know for sure that you need it or it may make your database inconsistent.

// ========================
// Directory paths
// Set it to custom if you want to share
// folders among different hosts.
// ========================

$cfg['avatars_dir'] = 'datas/avatars';
$cfg['cache_dir'] = 'datas/cache';
$cfg['lang_dir'] = 'lang';
$cfg['modules_dir'] = 'modules';
$cfg['pfs_dir'] = 'datas/users';
$cfg['photos_dir'] = 'datas/photos';
$cfg['plugins_dir'] = 'plugins';
$cfg['system_dir'] = 'system';
$cfg['thumbs_dir'] = 'datas/thumbs';
$cfg['themes_dir'] = 'themes';
$cfg['extrafield_files_dir'] = 'datas/exflds';
$cfg['icons_dir'] = 'images/icons';

// ========================
// Directory and file permissions for uploaded files
// and files created with scripts.
// You can set it to values which deliver highest
// security and comfort on your host.
// ========================

$cfg['dir_perms'] = 0777;
$cfg['file_perms'] = 0664;

// ========================
// Important constant switches
// ========================

/**
 * Defines whether to display debugging information on critical errors.
 * Set it TRUE when you experiment with something new.
 * Set it FALSE on production sites.
 */
$cfg['debug_mode'] = TRUE;

/**
 * Path to debug log files used by functions which dump debug data into it.
 * This file MUST NOT be available to strangers (e.g. via HTTP) or it can
 * compromise your website security. Protect it with .htaccess or use some
 * path accessible to you only via FTP.
 */
$cfg['debug_logpath'] = 'tmp';

/**
 * The shield is disabled for administrators by default. But if you are testing
 * it with your admin account, you can enable it by setting this TRUE.
 */
$cfg['shield_force'] = FALSE;

// ========================
// Names for MySQL tables
// Only change if you'd like to
// make 2 separated installs in the same database.
// or you'd like to share some tables between 2 sites.
// Else do not change.
// ========================

$db_x				= 'bel_'; // Default: cot_, prefix for extra fields' table(s)

$db_auth			= $db_x.'auth';
$db_cache 			= $db_x.'cache';
$db_cache_bindings	= $db_x.'cache_bindings';
$db_core			= $db_x.'core';
$db_config 			= $db_x.'config';
$db_groups 			= 'cot_groups';
$db_groups_users 	= 'cot_groups_users';
$db_logger 			= $db_x.'logger';
$db_online 			= $db_x.'online';
$db_extra_fields	= $db_x.'extra_fields';
$db_plugins 		= $db_x.'plugins';
$db_structure 		= $db_x.'structure';
$db_updates			= $db_x.'updates';
$db_users 			= 'cot_users';

?>