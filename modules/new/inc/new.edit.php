<?php
/**
 * Edit new.
 *
 * @package new
 * @version 0.9.6
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD License
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('forms');

$id = cot_import('id', 'G', 'INT');
$c = cot_import('c', 'G', 'TXT');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('new', 'any');

/* === Hook === */
foreach (cot_getextplugins('new.edit.first') as $pl)
{
	include $pl;
}
/* ===== */

cot_block($usr['auth_read']);

if (!$id || $id < 0)
{
	cot_die_message(404);
}
$sql_new = $db->query("SELECT * FROM $db_news WHERE new_id=$id LIMIT 1");
if($sql_new->rowCount() == 0)
{
	cot_die_message(404);
}
$row_new = $sql_new->fetch();

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('new', $row_new['new_cat']);

$parser_list = cot_get_parsers();
$sys['parser'] = $row_new['new_parser'];

if ($a == 'update')
{
	/* === Hook === */
	foreach (cot_getextplugins('new.edit.update.first') as $pl)
	{
		include $pl;
	}
	/* ===== */

	cot_block($usr['isadmin'] || $usr['auth_write'] && $usr['id'] == $row_new['new_ownerid']);

	$rnew = cot_new_import('POST', $row_new, $usr);

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$rnewdelete = cot_import('rnewdelete', 'P', 'BOL');
	}
	else
	{
		$rnewdelete = cot_import('delete', 'G', 'BOL');
		cot_check_xg();
	}

	if ($rnewdelete)
	{
		cot_new_delete($id, $row_new);
		cot_redirect(cot_url('new', "c=" . $row_new['new_cat'], '', true));
	}

	/* === Hook === */
	foreach (cot_getextplugins('new.edit.update.import') as $pl)
	{
		include $pl;
	}
	/* ===== */

	cot_new_validate($rnew);

	/* === Hook === */
	foreach (cot_getextplugins('new.edit.update.error') as $pl)
	{
		include $pl;
	}
	/* ===== */

	if (!cot_error_found())
	{
		cot_new_update($id, $rnew);

		switch ($rnew['new_state'])
		{
			case 0:
				$urlparams = empty($rnew['new_alias']) ?
					array('c' => $rnew['new_cat'], 'id' => $id) :
					array('c' => $rnew['new_cat'], 'al' => $rnew['new_alias']);
				$r_url = cot_url('new', $urlparams, '', true);
				break;
			case 1:
				$r_url = cot_url('message', 'msg=300', '', true);
				break;
			case 2:
				cot_message($L['new_savedasdraft']);
				$r_url = cot_url('new', 'm=edit&id=' . $id, '', true);
				break;
		}
		cot_redirect($r_url);
	}
	else
	{
		cot_redirect(cot_url('new', "m=edit&id=$id", '', true));
	}
}

$nws = $row_new;

$nws['new_status'] = cot_new_status($nws['new_state'], $nws['new_begin'],$nws['new_expire']);

cot_block($usr['isadmin'] || $usr['auth_write'] && $usr['id'] == $nws['new_ownerid']);

$out['subtitle'] = $L['new_edittitle'];
$out['head'] .= $R['code_noindex'];
$sys['sublocation'] = $structure['new'][$nws['new_cat']]['title'];

$mskin = cot_tplfile(array('new', 'edit', $structure['new'][$nws['new_cat']]['tpl']));

/* === Hook === */
foreach (cot_getextplugins('new.edit.main') as $pl)
{
	include $pl;
}
/* ===== */

require_once $cfg['system_dir'].'/header.php';
$t = new XTemplate($mskin);

$newedit_array = array(
	'NEWEDIT_NEWTITLE' => $L['new_edittitle'],
	'NEWEDIT_SUBTITLE' => $L['new_editsubtitle'],
	'NEWEDIT_FORM_SEND' => cot_url('new', "m=edit&a=update&id=".$nws['new_id']),
	'NEWEDIT_FORM_ID' => $nws['new_id'],
	'NEWEDIT_FORM_STATE' => $nws['new_state'],
	'NEWEDIT_FORM_STATUS' => $nws['new_status'],
	'NEWEDIT_FORM_LOCALSTATUS' => $L['new_status_'.$nws['new_status']],
	'NEWEDIT_FORM_CAT' => cot_selectbox_structure('new', $nws['new_cat'], 'rnewcat'),
	'NEWEDIT_FORM_CAT_SHORT' => cot_selectbox_structure('new', $nws['new_cat'], 'rnewcat', $c),
	'NEWEDIT_FORM_KEYWORDS' => cot_inputbox('text', 'rnewkeywords', $nws['new_keywords'], array('size' => '32', 'maxlength' => '255')),
	'NEWEDIT_FORM_METATITLE' => cot_inputbox('text', 'rnewmetatitle', $nws['new_metatitle'], array('size' => '64', 'maxlength' => '255')),
	'NEWEDIT_FORM_METADESC' => cot_textarea('rnewmetadesc', $nws['new_metadesc'], 2, 64, array('maxlength' => '255')),
	'NEWEDIT_FORM_ALIAS' => cot_inputbox('text', 'rnewalias', $nws['new_alias'], array('size' => '32', 'maxlength' => '255')),
	'NEWEDIT_FORM_TITLE' => cot_inputbox('text', 'rnewtitle', $nws['new_title'], array('size' => '64', 'maxlength' => '255')),
	'NEWEDIT_FORM_DESC' => cot_textarea('rnewdesc', $nws['new_desc'], 2, 64, array('maxlength' => '255')),
	'NEWEDIT_FORM_AUTHOR' => cot_inputbox('text', 'rnewauthor', $nws['new_author'], array('size' => '24', 'maxlength' => '100')),
	'NEWEDIT_FORM_DATE' => cot_selectbox_date($nws['new_date'], 'long', 'rnewdate').' '.$usr['timetext'],
	'NEWEDIT_FORM_DATENOW' => cot_checkbox(0, 'rnewdatenow'),
	'NEWEDIT_FORM_BEGIN' => cot_selectbox_date($nws['new_begin'], 'long', 'rnewbegin').' '.$usr['timetext'],
	'NEWEDIT_FORM_EXPIRE' => cot_selectbox_date($nws['new_expire'], 'long', 'rnewexpire').' '.$usr['timetext'],
	'NEWEDIT_FORM_UPDATED' => cot_date('datetime_full', $nws['new_updated']).' '.$usr['timetext'],
	'NEWEDIT_FORM_FILE' => cot_selectbox($nws['new_file'], 'rnewfile', range(0, 2), array($L['No'], $L['Yes'], $L['Members_only']), false),
	'NEWEDIT_FORM_URL' => cot_inputbox('text', 'rnewurl', $nws['new_url'], array('size' => '56', 'maxlength' => '255')),
	'NEWEDIT_FORM_SIZE' => cot_inputbox('text', 'rnewsize', $nws['new_size'], array('size' => '56', 'maxlength' => '255')),
	'NEWEDIT_FORM_TEXT' => cot_textarea('rpagetext', $nws['new_text'], 24, 120, '', 'input_textarea_editor'),
	'NEWEDIT_FORM_DELETE' => cot_radiobox(0, 'rnewdelete', array(1, 0), array($L['Yes'], $L['No'])),
	'NEWEDIT_FORM_PARSER' => cot_selectbox($nws['new_parser'], 'rnewparser', cot_get_parsers(), cot_get_parsers(), false)
);
if ($usr['isadmin'])
{
	$newedit_array += array(
		'NEWEDIT_FORM_OWNERID' => cot_inputbox('text', 'rnewownerid', $nws['new_ownerid'], array('size' => '24', 'maxlength' => '24')),
		'NEWEDIT_FORM_NEWCOUNT' => cot_inputbox('text', 'rnewcount', $nws['new_count'], array('size' => '8', 'maxlength' => '8')),
		'NEWEDIT_FORM_FILECOUNT' => cot_inputbox('text', 'rnewfilecount', $nws['new_filecount'], array('size' => '8', 'maxlength' => '8'))
	);
}

$t->assign($newedit_array);

// Extra fields
foreach($cot_extrafields[$db_news] as $exfld)
{
	$uname = strtoupper($exfld['field_name']);
	$exfld_val = cot_build_extrafields('rnew'.$exfld['field_name'], $exfld, $nws['new_'.$exfld['field_name']]);
	$exfld_title = isset($L['new_'.$exfld['field_name'].'_title']) ?  $L['new_'.$exfld['field_name'].'_title'] : $exfld['field_description'];

	$t->assign(array(
		'NEWEDIT_FORM_'.$uname => $exfld_val,
		'NEWEDIT_FORM_'.$uname.'_TITLE' => $exfld_title,
		'NEWEDIT_FORM_EXTRAFLD' => $exfld_val,
		'NEWEDIT_FORM_EXTRAFLD_TITLE' => $exfld_title
	));
	$t->parse('MAIN.EXTRAFLD');
}

// Error and message handling
cot_display_messages($t);

/* === Hook === */
foreach (cot_getextplugins('new.edit.tags') as $pl)
{
	include $pl;
}
/* ===== */

if ($usr['isadmin'])
{
	if ($cfg['new']['autovalidate']) $usr_can_publish = TRUE;
	$t->parse('MAIN.ADMIN');
}

$t->parse('MAIN');
$t->out('MAIN');

require_once $cfg['system_dir'].'/footer.php';
