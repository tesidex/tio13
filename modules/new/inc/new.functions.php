<?php
/**
 * New API
 *
 * @package new
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

// Requirements
require_once cot_langfile('new', 'module');
require_once cot_incfile('new', 'module', 'resources');
require_once cot_incfile('forms');
require_once cot_incfile('extrafields');

// Global variables
global $cot_extrafields, $db_news, $db_x;
//$db_news = (isset($db_news)) ? $db_news : $db_x . 'news';
$db_news = 'cot_news';

$cot_extrafields[$db_news] = (!empty($cot_extrafields[$db_news]))	? $cot_extrafields[$db_news] : array();

$structure['new'] = (is_array($structure['new'])) ? $structure['new'] : array();


//TODO
//
//
//if (!function_exists(cot_cut_more)) {
//
//     /**
//      * Cuts the new after 'more' tag or after the first new (if multinew)
//      *
//      * @param string $html New body
//      * @return string
//      */
//     function cot_cut_more($html) {
//	  $mpos = mb_strpos($html, '<!--more-->');
//	  if ($mpos === false) {
//	       $mpos = mb_strpos($html, '[more]');
//	  }
//	  if ($mpos === false) {
//	       $mpos = mb_strpos($html, '<hr class="more" />');
//	  }
//	  if ($mpos !== false) {
//	       $html = mb_substr($html, 0, $mpos);
//	  }
//	  $mpos = mb_strpos($html, '[newnew]');
//	  if ($mpos !== false) {
//	       $html = mb_substr($html, 0, $mpos);
//	  }
//	  if (mb_strpos($html, '[title]')) {
//	       $html = preg_replace('#\[title\](.*?)\[/title\][\s\r\n]*(<br />)?#i', '', $html);
//	  }
//	  return $html;
//     }
//
//}



//if (!function_exists(cot_readraw)) {
///**
// * Reads raw data from file
// *
// * @param string $file File path
// * @return string
// */
//function cot_readraw($file)
//{
//	return (mb_strpos($file, '..') === false && file_exists($file)) ? file_get_contents($file) : 'File not found : '.$file; // TODO need translate
//}
//}

/**
 * Returns all new tags for coTemplate
 *
 * @param mixed $new_data New Info Array or ID
 * @param string $tag_prefix Prefix for tags
 * @param int $textlength Text truncate
 * @param bool $admin_rights New Admin Rights
 * @param bool $newpath_home Add home link for new path
 * @param string $emptytitle New title text if new does not exist
 * @return array
 * @global CotDB $db
 */
function cot_generate_newtags($new_data, $tag_prefix = '', $textlength = 0, $admin_rights = null, $newpath_home = false, $emptytitle = '')
{
	global $db, $cot_extrafields, $cfg, $L, $Ls, $R, $db_news, $usr, $sys, $cot_yesno, $structure, $db_structure;

	static $extp_first = null, $extp_main = null;
	static $nws_auth = array();

	if (is_null($extp_first))
	{
		$extp_first = cot_getextplugins('newtags.first');
		$extp_main = cot_getextplugins('newtags.main');
	}

	/* === Hook === */
	foreach ($extp_first as $pl)
	{
		include $pl;
	}
	/* ===== */

	if (!is_array($new_data))
	{
		$sql = $db->query("SELECT * FROM $db_news WHERE new_id = '" . (int) $new_data . "' LIMIT 1");
		$new_data = $sql->fetch();
	}

	if ($new_data['new_id'] > 0 && !empty($new_data['new_title']))
	{
		if (is_null($admin_rights))
		{
			if (!isset($nws_auth[$new_data['new_cat']]))
			{
				$nws_auth[$new_data['new_cat']] = cot_auth('new', $new_data['new_cat'], 'RWA1');
			}
			$admin_rights = (bool) $nws_auth[$new_data['new_cat']][2];
		}
		$newpath = cot_structure_buildpath('new', $new_data['new_cat']);
		$catpath = cot_breadcrumbs($newpath, $newpath_home);
		$new_data['new_newurl'] = (empty($new_data['new_alias'])) ? cot_url('new', 'c='.$new_data['new_cat'].'&id='.$new_data['new_id']) : cot_url('new', 'c='.$new_data['new_cat'].'&al='.$new_data['new_alias']);
		$new_link[] = array($new_data['new_newurl'], $new_data['new_title']);
		$new_data['new_fulltitle'] = cot_breadcrumbs(array_merge($newpath, $new_link), $newpath_home);
		if (!empty($new_data['new_url']) && $new_data['new_file'])
		{
			$dotpos = mb_strrpos($new_data['new_url'], ".") + 1;
			$type = mb_strtolower(mb_substr($new_data['new_url'], $dotpos, 5));
			$new_data['new_fileicon'] = cot_rc('new_icon_file_path', array('type' => $type));
			if (!file_exists($new_data['new_fileicon']))
			{
				$new_data['new_fileicon'] = cot_rc('new_icon_file_default');
			}
			$new_data['new_fileicon'] = cot_rc('new_icon_file', array('icon' => $new_data['new_fileicon']));
		}
		else
		{
			$new_data['new_fileicon'] = '';
		}

		$date_format = 'datetime_medium';

		$text = cot_parse($new_data['new_text'], $cfg['new']['markup'], $new_data['new_parser']);
		$text_cut = ((int)$textlength > 0) ? cot_string_truncate($text, $textlength) : cot_cut_more($text);
		$cutted = (mb_strlen($text) > mb_strlen($text_cut)) ? true : false;

		$cat_url = cot_url('new', 'c=' . $new_data['new_cat']);
		$validate_url = cot_url('admin', "m=new&a=validate&id={$new_data['new_id']}&x={$sys['xk']}");
		$unvalidate_url = cot_url('admin', "m=new&a=unvalidate&id={$new_data['new_id']}&x={$sys['xk']}");
		$edit_url = cot_url('new', "m=edit&id={$new_data['new_id']}");
		$delete_url = cot_url('new', "m=edit&a=update&delete=1&id={$new_data['new_id']}&x={$sys['xk']}");

		$new_data['new_status'] = cot_new_status(
			$new_data['new_state'],
			$new_data['new_begin'],
			$new_data['new_expire']
		);

		$temp_array = array(
			'URL' => $new_data['new_newurl'],
			'ID' => $new_data['new_id'],
			'TITLE' => $new_data['new_fulltitle'],
			'ALIAS' => $new_data['new_alias'],
			'STATE' => $new_data['new_state'],
			'STATUS' => $new_data['new_status'],
			'LOCALSTATUS' => $L['new_status_'.$new_data['new_status']],
			'SHORTTITLE' => htmlspecialchars($new_data['new_title'], ENT_COMPAT, 'UTF-8', false),
			'CAT' => $new_data['new_cat'],
			'CATURL' => $cat_url,
			'CATTITLE' => htmlspecialchars($structure['new'][$new_data['new_cat']]['title']),
			'CATPATH' => $catpath,
			'CATPATH_SHORT' => cot_rc_link($cat_url, htmlspecialchars($structure['new'][$new_data['new_cat']]['title'])),
			'CATDESC' => htmlspecialchars($structure['new'][$new_data['new_cat']]['desc']),
			'CATICON' => $structure['new'][$new_data['new_cat']]['icon'],
			'KEYWORDS' => htmlspecialchars($new_data['new_keywords']),
			'DESC' => htmlspecialchars($new_data['new_desc']),
			'TEXT' => $text,
			'TEXT_CUT' => $text_cut,
			'TEXT_IS_CUT' => $cutted,
			'DESC_OR_TEXT' => (!empty($new_data['new_desc'])) ? htmlspecialchars($new_data['new_desc']) : $text,
			'MORE' => ($cutted) ? cot_rc('list_more', array('new_url' => $new_data['new_newurl'])) : '',
			'AUTHOR' => htmlspecialchars($new_data['new_author']),
			'OWNERID' => $new_data['new_ownerid'],
			'OWNERNAME' => htmlspecialchars($new_data['user_name']),
			'DATE' => cot_date($date_format, $new_data['new_date']),
			'BEGIN' => cot_date($date_format, $new_data['new_begin']),
			'EXPIRE' => cot_date($date_format, $new_data['new_expire']),
			'UPDATED' => cot_date($date_format, $new_data['new_updated']),
			'DATE_STAMP' => $new_data['new_date'],
			'BEGIN_STAMP' => $new_data['new_begin'],
			'EXPIRE_STAMP' => $new_data['new_expire'],
			'UPDATED_STAMP' => $new_data['new_updated'],
			'FILE' => $cot_yesno[$new_data['new_file']],
			'FILE_URL' => empty($new_data['new_url']) ? '' : cot_url('new', 'c='.$new_data['new_cat'].'&id='.$new_data['new_id'].'&a=dl'),
			'FILE_SIZE' => $new_data['new_size'] / 1024, // in KiB; deprecated but kept for compatibility
			'FILE_SIZE_BYTES' => $new_data['new_size'],
			'FILE_SIZE_READABLE' => cot_build_filesize($new_data['new_size'], 1),
			'FILE_ICON' => $new_data['new_fileicon'],
			'FILE_COUNT' => $new_data['new_filecount'],
			'FILE_COUNTTIMES' => cot_declension($new_data['new_filecount'], $Ls['Times']),
			'FILE_NAME' => basename($new_data['new_url']),
			'COUNT' => $new_data['new_count'],
			'ADMIN' => $admin_rights ? cot_rc('list_row_admin', array('unvalidate_url' => $unvalidate_url, 'edit_url' => $edit_url)) : '',
			'NOTAVAILABLE' => ($new_data['new_begin'] > $sys['now']) ? $L['new_notavailable'].cot_build_timegap($sys['now'], $nws['new_begin']) : ''
		);

		// Admin tags
		if ($admin_rights)
		{
			$validate_confirm_url = cot_confirm_url($validate_url, 'new', 'new_confirm_validate');
			$unvalidate_confirm_url = cot_confirm_url($unvalidate_url, 'new', 'new_confirm_unvalidate');
			$delete_confirm_url = cot_confirm_url($delete_url, 'new', 'new_confirm_delete');
			$temp_array['ADMIN_EDIT'] = cot_rc_link($edit_url, $L['Edit']);
			$temp_array['ADMIN_EDIT_URL'] = $edit_url;
			$temp_array['ADMIN_UNVALIDATE'] = $new_data['new_state'] == 1 ?
				cot_rc_link($validate_confirm_url, $L['Validate'], 'class="confirmLink"') :
				cot_rc_link($unvalidate_confirm_url, $L['Putinvalidationqueue'], 'class="confirmLink"');
			$temp_array['ADMIN_UNVALIDATE_URL'] = $new_data['new_state'] == 1 ?
				$validate_confirm_url : $unvalidate_confirm_url;
			$temp_array['ADMIN_DELETE'] = cot_rc_link($delete_confirm_url, $L['Delete'], 'class="confirmLink"');
			$temp_array['ADMIN_DELETE_URL'] = $delete_confirm_url;
		}
		else if ($usr['id'] == $new_data['new_ownerid'])
		{
			$temp_array['ADMIN_EDIT'] = cot_rc_link($edit_url, $L['Edit']);
			$temp_array['ADMIN_EDIT_URL'] = $edit_url;
		}

		if (cot_auth('new', 'any', 'W'))
		{
			$clone_url = cot_url('new', "m=add&c={$new_data['new_cat']}&clone={$new_data['new_id']}");
			$temp_array['ADMIN_CLONE'] = cot_rc_link($clone_url, $L['new_clone']);
			$temp_array['ADMIN_CLONE_URL'] = $clone_url;
		}

		// Extrafields
		if (isset($cot_extrafields[$db_news]))
		{
			foreach ($cot_extrafields[$db_news] as $exfld)
			{
				$tag = mb_strtoupper($exfld['field_name']);
				$temp_array[$tag.'_TITLE'] = isset($L['new_'.$exfld['field_name'].'_title']) ?  $L['new_'.$exfld['field_name'].'_title'] : $exfld['field_description'];
				$temp_array[$tag] = cot_build_extrafields_data('new', $exfld, $new_data['new_'.$exfld['field_name']], $new_data['new_parser']);
				$temp_array[$tag.'_VALUE'] = $new_data['new_'.$exfld['field_name']];
			}
		}

		// Extra fields for structure
		if (isset($cot_extrafields[$db_structure]))
		{
			foreach ($cot_extrafields[$db_structure] as $exfld)
			{
				$tag = mb_strtoupper($exfld['field_name']);
				$temp_array['CAT_'.$tag.'_TITLE'] = isset($L['structure_'.$exfld['field_name'].'_title']) ?  $L['structure_'.$exfld['field_name'].'_title'] : $exfld['field_description'];
				$temp_array['CAT_'.$tag] = cot_build_extrafields_data('structure', $exfld, $structure['new'][$new_data['new_cat']][$exfld['field_name']]);
				$temp_array['CAT_'.$tag.'_VALUE'] = $structure['new'][$new_data['new_cat']][$exfld['field_name']];
			}
		}

		/* === Hook === */
		foreach ($extp_main as $pl)
		{
			include $pl;
		}
		/* ===== */

	}
	else
	{
		$temp_array = array(
			'TITLE' => (!empty($emptytitle)) ? $emptytitle : $L['Deleted'],
			'SHORTTITLE' => (!empty($emptytitle)) ? $emptytitle : $L['Deleted'],
		);
	}

	$return_array = array();
	foreach ($temp_array as $key => $val)
	{
		$return_array[$tag_prefix . $key] = $val;
	}

	return $return_array;
}

/**
 * Returns possible values for category sorting order
 */
function cot_new_config_order()
{
	global $cot_extrafields, $L, $db_news;

	$options_sort = array(
		'id' => $L['Id'],
		'type' => $L['Type'],
		'key' => $L['Key'],
		'title' => $L['Title'],
		'desc' => $L['Description'],
		'text' => $L['Body'],
		'author' => $L['Author'],
		'ownerid' => $L['Owner'],
		'date' => $L['Date'],
		'begin' => $L['Begin'],
		'expire' => $L['Expire'],
		'file' => $L['adm_fileyesno'],
		'url' => $L['adm_fileurl'],
		'size' => $L['adm_filesize'],
		'filecount' => $L['adm_filecount']
	);

	foreach($cot_extrafields[$db_news] as $exfld)
	{
		$options_sort[$exfld['field_name']] = isset($L['new_'.$exfld['field_name'].'_title']) ? $L['new_'.$exfld['field_name'].'_title'] : $exfld['field_description'];
	}

	$L['cfg_order_params'] = array_values($options_sort);
	return array_keys($options_sort);
}

/**
 * Determines new status
 *
 * @param int $new_state
 * @param int $new_begin
 * @param int $new_expire
 * @return string 'draft', 'pending', 'approved', 'published' or 'expired'
 */
function cot_new_status($new_state, $new_begin, $new_expire)
{
	global $sys;

	if ($new_state == 0)
	{
		if ($new_expire > 0 && $new_expire <= $sys['now'])
		{
			return 'expired';
		}
		elseif ($new_begin > $sys['now'])
		{
			return 'approved';
		}
		return 'published';
	}
	elseif ($new_state == 2)
	{
		return 'draft';
	}
	return 'pending';
}

/**
 * Recalculates new category counters
 *
 * @param string $cat Cat code
 * @return int
 * @global CotDB $db
 */
function cot_new_sync($cat)
{
	global $db, $db_structure, $db_news;
	$sql = $db->query("SELECT COUNT(*) FROM $db_news
		WHERE new_cat='".$db->prep($cat)."' AND (new_state = 0 OR new_state=2)");
	return (int) $sql->fetchColumn();
}

/**
 * Update new category code
 *
 * @param string $oldcat Old Cat code
 * @param string $newcat New Cat code
 * @return bool
 * @global CotDB $db
 */
function cot_new_updatecat($oldcat, $newcat)
{
	global $db, $db_structure, $db_news;
	return (bool) $db->update($db_news, array("new_cat" => $newcat), "new_cat='".$db->prep($oldcat)."'");
}

/**
 * Returns permissions for a new category.
 * @param  string $cat Category code
 * @return array       Permissions array with keys: 'auth_read', 'auth_write', 'isadmin', 'auth_download'
 */
function cot_new_auth($cat = null)
{
	if (empty($cat))
	{
		$cat = 'any';
	}
	$auth = array();
	list($auth['auth_read'], $auth['auth_write'], $auth['isadmin'], $auth['auth_download']) = cot_auth('new', $cat, 'RWA1');
	return $auth;
}

/**
 * Imports new data from request parameters.
 * @param  string $source Source request method for parameters
 * @param  array  $rnew  Existing new data from database
 * @param  array  $auth   Permissions array
 * @return array          New data
 */
function cot_new_import($source = 'POST', $rnew = array(), $auth = array())
{
	global $cfg, $db_news, $cot_extrafields, $usr, $sys;

	if (count($auth) == 0)
	{
		$auth = cot_new_auth($rnew['new_cat']);
	}

	if ($source == 'D' || $source == 'DIRECT')
	{
		// A trick so we don't have to affect every line below
		global $_PATCH;
		$_PATCH = $rnew;
		$source = 'PATCH';
	}

	$rnew['new_cat']      = cot_import('rnewcat', $source, 'TXT');
	$rnew['new_keywords'] = cot_import('rnewkeywords', $source, 'TXT');
	$rnew['new_alias']    = cot_import('rnewalias', $source, 'TXT');
	$rnew['new_title']    = cot_import('rnewtitle', $source, 'TXT');
	$rnew['new_desc']     = cot_import('rnewdesc', $source, 'TXT');
	$rnew['new_text']     = cot_import('rnewtext', $source, 'HTM');
	$rnew['new_parser']   = cot_import('rnewparser', $source, 'ALP');
	$rnew['new_author']   = cot_import('rnewauthor', $source, 'TXT');
	$rnew['new_file']     = intval(cot_import('rnewfile', $source, 'INT'));
	$rnew['new_url']      = cot_import('rnewurl', $source, 'TXT');
	$rnew['new_size']     = cot_import('rnewsize', $source, 'TXT');
	$rnew['new_file']     = ($rnew['new_file'] == 0 && !empty($rnew['new_url'])) ? 1 : $rnew['new_file'];

	$rnewdatenow           = cot_import('rnewdatenow', $source, 'BOL');
	$rnew['new_date']     = cot_import_date('rnewdate', true, false, $source);
	$rnew['new_date']     = ($rnewdatenow || is_null($rnew['new_date'])) ? $sys['now'] : (int)$rnew['new_date'];
	$rnew['new_begin']    = (int)cot_import_date('rnewbegin');
	$rnew['new_expire']   = (int)cot_import_date('rnewexpire');
	$rnew['new_expire']   = ($rnew['new_expire'] <= $rnew['new_begin']) ? 0 : $rnew['new_expire'];
	$rnew['new_updated']  = $sys['now'];

	$rnew['new_keywords'] = cot_import('rnewkeywords', $source, 'TXT');
	$rnew['new_metatitle'] = cot_import('rnewmetatitle', $source, 'TXT');
	$rnew['new_metadesc'] = cot_import('rnewmetadesc', $source, 'TXT');

	$rpublish               = cot_import('rpublish', $source, 'ALP'); // For backwards compatibility
	$rnew['new_state']    = ($rpublish == 'OK') ? 0 : cot_import('rnewstate', $source, 'INT');

	if ($auth['isadmin'] && isset($rnew['new_ownerid']))
	{
		$rnew['new_count']     = cot_import('rnewcount', $source, 'INT');
		$rnew['new_ownerid']   = cot_import('rnewownerid', $source, 'INT');
		$rnew['new_filecount'] = cot_import('rnewfilecount', $source, 'INT');
	}
	else
	{
		$rnew['new_ownerid'] = $usr['id'];
	}

	$parser_list = cot_get_parsers();

	if (empty($rnew['new_parser']) || !in_array($rnew['new_parser'], $parser_list) || $rnew['new_parser'] != 'none' && !cot_auth('plug', $rnew['new_parser'], 'W'))
	{
		$rnew['new_parser'] = isset($sys['parser']) ? $sys['parser'] : $cfg['new']['parser'];
	}

	// Extra fields
	foreach ($cot_extrafields[$db_news] as $exfld)
	{
		$rnew['new_'.$exfld['field_name']] = cot_import_extrafields('rnew'.$exfld['field_name'], $exfld, $source, $rnew['new_'.$exfld['field_name']]);
	}

	return $rnew;
}

/**
 * Validates new data.
 * @param  array   $rnew Imported new data
 * @return boolean        TRUE if validation is passed or FALSE if errors were found
 */
function cot_new_validate($rnew)
{
	global $cfg, $structure;
	cot_check(empty($rnew['new_cat']), 'new_catmissing', 'rnewcat');
	if ($structure['new'][$rnew['new_cat']]['locked'])
	{
		global $L;
		require_once cot_langfile('message', 'core');
		cot_error('msg602_body', 'rnewcat');
	}
	cot_check(mb_strlen($rnew['new_title']) < 2, 'new_titletooshort', 'rnewtitle');

	cot_check(!empty($rnew['new_alias']) && preg_match('`[+/?%#&]`', $rnew['new_alias']), 'new_aliascharacters', 'rnewalias');

	$allowemptytext = isset($cfg['new']['cat_' . $rnew['new_cat']]['allowemptytext']) ?
							$cfg['new']['cat_' . $rnew['new_cat']]['allowemptytext'] : $cfg['new']['cat___default']['allowemptytext'];
	cot_check(!$allowemptytext && empty($rnew['new_text']), 'new_textmissing', 'rnewtext');

	return !cot_error_found();
}

/**
 * Adds a new new to the CMS.
 * @param  array   $rnew New data
 * @param  array   $auth  Permissions array
 * @return integer        New new ID or FALSE on error
 */
function cot_new_add(&$rnew, $auth = array())
{
	global $cache, $cfg, $db, $db_news, $db_structure, $structure, $L;
	if (cot_error_found())
	{
		return false;
	}

	if (count($auth) == 0)
	{
		$auth = cot_new_auth($rnew['new_cat']);
	}

	if (!empty($rnew['new_alias']))
	{
		$new_count = $db->query("SELECT COUNT(*) FROM $db_news WHERE new_alias = ?", $rnew['new_alias'])->fetchColumn();
		if ($new_count > 0)
		{
			$rnew['new_alias'] = $rnew['new_alias'].rand(1000, 9999);
		}
	}

	if ($rnew['new_state'] == 0)
	{
		if ($auth['isadmin'] && $cfg['new']['autovalidate'])
		{
			$db->query("UPDATE $db_structure SET structure_count=structure_count+1 WHERE structure_area='new' AND structure_code = ?", $rnew['new_cat']);
			$cache && $cache->db->remove('structure', 'system');
		}
		else
		{
			$rnew['new_state'] = 1;
		}
	}

	/* === Hook === */
	foreach (cot_getextplugins('new.add.add.query') as $pl)
	{
		include $pl;
	}
	/* ===== */

	if ($db->insert($db_news, $rnew))
	{
		$id = $db->lastInsertId();

		cot_extrafield_movefiles();
	}
	else
	{
		$id = false;
	}

	/* === Hook === */
	foreach (cot_getextplugins('new.add.add.done') as $pl)
	{
		include $pl;
	}
	/* ===== */

	if ($rnew['new_state'] == 0 && $cache)
	{
		if ($cfg['cache_new'])
		{
			$cache->new->clear('new/' . str_replace('.', '/', $structure['new'][$rnew['new_cat']]['path']));
		}
		if ($cfg['cache_index'])
		{
			$cache->new->clear('index');
		}
	}
	cot_shield_update(30, "r new");
	cot_log("Add new #".$id, 'adm');

	return $id;
}

/**
 * Removes a new from the CMS.
 * @param  int     $id    New ID
 * @param  array   $rnew New data
 * @return boolean        TRUE on success, FALSE on error
 */
function cot_new_delete($id, $rnew = array())
{
	global $db, $db_news, $db_structure, $cache, $cfg, $cot_extrafields, $structure, $L;
	if (!is_numeric($id) || $id <= 0)
	{
		return false;
	}
	$id = (int)$id;
	if (count($rnew) == 0)
	{
		$rnew = $db->query("SELECT * FROM $db_news WHERE new_id = ?", $id)->fetch();
		if (!$rnew)
		{
			return false;
		}
	}

	if ($rnew['new_state'] == 0)
	{
		$db->query("UPDATE $db_structure SET structure_count=structure_count-1 WHERE  structure_area='new' AND structure_code = ?", $rnew['new_cat']);
	}

	foreach ($cot_extrafields[$db_news] as $exfld)
	{
		cot_extrafield_unlinkfiles($rnew['new_' . $exfld['field_name']], $exfld);
	}

	$db->delete($db_news, "new_id = ?", $id);
	cot_log("Deleted new #" . $id, 'adm');

	/* === Hook === */
	foreach (cot_getextplugins('new.edit.delete.done') as $pl)
	{
		include $pl;
	}
	/* ===== */

	if ($cache)
	{
		if ($cfg['cache_new'])
		{
			$cache->new->clear('new/' . str_replace('.', '/', $structure['new'][$rnew['new_cat']]['path']));
		}
		if ($cfg['cache_index'])
		{
			$cache->new->clear('index');
		}
	}

	return true;
}

/**
 * Updates a new in the CMS.
 * @param  integer $id    New ID
 * @param  array   $rnew New data
 * @param  array   $auth  Permissions array
 * @return boolean        TRUE on success, FALSE on error
 */
function cot_new_update($id, &$rnew, $auth = array())
{
	global $cache, $cfg, $db, $db_news, $db_structure, $structure, $L;
	if (cot_error_found())
	{
		return false;
	}

	if (count($auth) == 0)
	{
		$auth = cot_new_auth($rnew['new_cat']);
	}

	if (!empty($rnew['new_alias']))
	{
		$new_count = $db->query("SELECT COUNT(*) FROM $db_news WHERE new_alias = ? AND new_id != ?", array($rnew['new_alias'], $id))->fetchColumn();
		if ($new_count > 0)
		{
			$rnew['new_alias'] = $rnew['new_alias'].rand(1000, 9999);
		}
	}

	$row_new = $db->query("SELECT * FROM $db_news WHERE new_id = ?", $id)->fetch();

	if ($row_new['new_cat'] != $rnew['new_cat'] && $row_new['new_state'] == 0)
	{
		$db->query("UPDATE $db_structure SET structure_count=structure_count-1 WHERE structure_code = ? AND structure_area = 'new'", $row_new['new_cat']);
	}

	//$usr['isadmin'] = cot_auth('new', $rnew['new_cat'], 'A');
	if ($rnew['new_state'] == 0)
	{
		if ($auth['isadmin'] && $cfg['new']['autovalidate'])
		{
			if ($row_new['new_state'] != 0 || $row_new['new_cat'] != $rnew['new_cat'])
			{
				$db->query("UPDATE $db_structure SET structure_count=structure_count+1 WHERE structure_code = ? AND structure_area = 'new'", $rnew['new_cat']);
			}
		}
		else
		{
			$rnew['new_state'] = 1;
		}
	}

	if ($rnew['new_state'] != 0 && $row_new['new_state'] == 0)
	{
		$db->query("UPDATE $db_structure SET structure_count=structure_count-1 WHERE structure_code = ?", $rnew['new_cat']);
	}
	$cache && $cache->db->remove('structure', 'system');

	if (!$db->update($db_news, $rnew, 'new_id = ?', $id))
	{
		return false;
	}

	cot_extrafield_movefiles();

	/* === Hook === */
	foreach (cot_getextplugins('new.edit.update.done') as $pl)
	{
		include $pl;
	}
	/* ===== */

	if (($rnew['new_state'] == 0  || $rnew['new_cat'] != $row_new['new_cat']) && $cache)
	{
		if ($cfg['cache_new'])
		{
			$cache->new->clear('new/' . str_replace('.', '/', $structure['new'][$rnew['new_cat']]['path']));
			if ($rnew['new_cat'] != $row_new['new_cat'])
			{
				$cache->new->clear('new/' . str_replace('.', '/', $structure['new'][$row_new['new_cat']]['path']));
			}
		}
		if ($cfg['cache_index'])
		{
			$cache->new->clear('index');
		}
	}

	return true;
}

/**
 * Imports pagination indexes
 *
 * @param string $var_name URL parameter name, e.g. 'pg' or 'd'
 * @param int $max_items Max items per new
 * @return array Array containing 3 items: new number, database offset and argument for URLs
 */
function cot_import_newnav($var_name, $max_items = 0)
{
	global $cfg;

	if($max_items <= 0)
	{
		$max_items = $cfg['new']['maxrowspernew'];
	}

	if($max_items <= 0)
	{
		throw new Exception('Invalid $max_items ('.$max_items.') for pagination.');
	}

	if ($cfg['easypagenav'])
	{
		$new = (int) cot_import($var_name, 'G', 'INT');
		if ($new < 0)
		{
			cot_die_message(404);
		}
		elseif ($new == 0)
		{
			$new = 1;
		}
		$offset = ($new - 1) * $max_items;
		$urlnum = $new <= 1 ? null : $new;
	}
	else
	{
		$offset = (int) cot_import($var_name, 'G', 'INT');
		if ($offset < 0)
		{
			cot_die_message(404);
		}
		if ($offset % $max_items != 0)
		{
			$offset -= $offset % $max_items;
		}
		$new = floor($offset / $max_items) + 1;
		$urlnum = $offset;
		$urlnum = ($urlnum > 0) ? $urlnum : null;
	}

	return array($new, $offset, $urlnum);
}


function cot_auth_add_item_custom($module_name, $item_id, $auth_permit = array(), $auth_lock = array(), $db_auth)
{
	global $db, $cot_groups, $usr, $cot_auth_default_permit, $cot_auth_default_lock;
	$auth_permit = $auth_permit + $cot_auth_default_permit;
	$auth_lock = $auth_lock + $cot_auth_default_lock;
	$ins_array = array();
	foreach ($cot_groups as $k => $v)
	{
		if (!$v['skiprights'])
		{
			$base_grp = $k > COT_GROUP_SUPERADMINS ? COT_GROUP_DEFAULT : $k;
			$ins_array[] = array(
				'auth_groupid' => $k,
				'auth_code' => $module_name,
				'auth_option' => $item_id,
				'auth_rights' => cot_auth_getvalue($auth_permit[$base_grp]),
				'auth_rights_lock' => cot_auth_getvalue($auth_lock[$base_grp]),
				'auth_setbyuserid' => $usr['id']
			);
		}
	}
	$res = $db->insert($db_auth, $ins_array);
	cot_auth_reorder();
	cot_auth_clear('all');
	return $res;
}

function cot_auth_remove_item_custom($module_name, $item_id = null, $db_auth)
{
	global $db;

	$opt = is_null($item_id) ? '' : 'AND auth_option=' . $db->quote($item_id);
	$db->delete($db_auth, "auth_code='$module_name' $opt");
	return $db->affectedRows;
}
