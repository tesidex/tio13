<?php
/**
 * Add new.
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

if (!empty($c) && !isset($structure['new'][$c]))
{
	$c = '';
}

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('new', 'any');

/* === Hook === */
foreach (cot_getextplugins('new.add.first') as $pl)
{
	include $pl;
}
/* ===== */
cot_block($usr['auth_write']);

if ($structure['new'][$c]['locked'])
{
	cot_die_message(602, TRUE);
}

$sys['parser'] = $cfg['new']['parser'];
$parser_list = cot_get_parsers();

if ($a == 'add')
{
	cot_shield_protect();

	/* === Hook === */
	foreach (cot_getextplugins('new.add.add.first') as $pl)
	{
		include $pl;
	}
	/* ===== */

	$rnew = cot_new_import('POST', array(), $usr);

	list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('new', $rnew['new_cat']);
	cot_block($usr['auth_write']);

	/* === Hook === */
	foreach (cot_getextplugins('new.add.add.import') as $pl)
	{
		include $pl;
	}
	/* ===== */

	cot_new_validate($rnew);

	/* === Hook === */
	foreach (cot_getextplugins('new.add.add.error') as $pl)
	{
		include $pl;
	}
	/* ===== */

	if (!cot_error_found())
	{
		$id = cot_new_add($rnew, $usr);

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
				cot_message('new_savedasdraft');
				$r_url = cot_url('new', 'm=edit&id='.$id, '', true);
				break;
		}
		cot_redirect($r_url);
	}
	else
	{
		$c = ($c != $rnew['new_cat']) ? $rnew['new_cat'] : $c;
		cot_redirect(cot_url('new', 'm=add&c='.$c, '', true));
	}
}

// New cloning support
$clone = cot_import('clone', 'G', 'INT');
if ($clone > 0)
{
	$rnew = $db->query("SELECT * FROM $db_news WHERE new_id = ?", $clone)->fetch();
}

if (empty($rnew['new_cat']) && !empty($c))
{
	$rnew['new_cat'] = $c;
	$usr['isadmin'] = cot_auth('new', $rnew['new_cat'], 'A');
}

$out['subtitle'] = $L['new_addsubtitle'];
$out['head'] .= $R['code_noindex'];
$sys['sublocation'] = $structure['new'][$c]['title'];

$mskin = cot_tplfile(array('new', 'add', $structure['new'][$rnew['new_cat']]['tpl']));

/* === Hook === */
foreach (cot_getextplugins('new.add.main') as $pl)
{
	include $pl;
}
/* ===== */

require_once $cfg['system_dir'].'/header.php';
$t = new XTemplate($mskin);

$newadd_array = array(
	'NEWADD_NEWTITLE' => $L['new_addtitle'],
	'NEWADD_SUBTITLE' => $L['new_addsubtitle'],
	'NEWADD_ADMINEMAIL' => "mailto:".$cfg['adminemail'],
	'NEWADD_FORM_SEND' => cot_url('new', 'm=add&a=add&c='.$c),
	'NEWADD_FORM_CAT' => cot_selectbox_structure('new', $rnew['new_cat'], 'rnewcat'),
	'NEWADD_FORM_CAT_SHORT' => cot_selectbox_structure('new', $rnew['new_cat'], 'rnewcat', $c),
	'NEWADD_FORM_KEYWORDS' => cot_inputbox('text', 'rnewkeywords', $rnew['new_keywords'], array('size' => '32', 'maxlength' => '255')),
	'NEWADD_FORM_METATITLE' => cot_inputbox('text', 'rnewmetatitle', $rnew['new_metatitle'], array('size' => '64', 'maxlength' => '255')),
	'NEWADD_FORM_METADESC' => cot_textarea('rnewmetadesc', $rnew['new_metadesc'], 2, 64, array('maxlength' => '255')),
	'NEWADD_FORM_ALIAS' => cot_inputbox('text', 'rnewalias', $rnew['new_alias'], array('size' => '32', 'maxlength' => '255')),
	'NEWADD_FORM_TITLE' => cot_inputbox('text', 'rnewtitle', $rnew['new_title'], array('size' => '64', 'maxlength' => '255')),
	'NEWADD_FORM_DESC' => cot_textarea('rnewdesc', $rnew['new_desc'], 2, 64, array('maxlength' => '255')),
	'NEWADD_FORM_AUTHOR' => cot_inputbox('text', 'rnewauthor', $rnew['new_author'], array('size' => '24', 'maxlength' => '100')),
	'NEWADD_FORM_OWNER' => cot_build_user($usr['id'], htmlspecialchars($usr['name'])),
	'NEWADD_FORM_OWNERID' => $usr['id'],
	'NEWADD_FORM_BEGIN' => cot_selectbox_date($sys['now'], 'long', 'rnewbegin'),
	'NEWADD_FORM_EXPIRE' => cot_selectbox_date(0, 'long', 'rnewexpire'),
	'NEWADD_FORM_FILE' => cot_selectbox($rnew['new_file'], 'rnewfile', range(0, 2), array($L['No'], $L['Yes'], $L['Members_only']), false),
	'NEWADD_FORM_URL' => cot_inputbox('text', 'rnewurl', $rnew['new_url'], array('size' => '56', 'maxlength' => '255')),
	'NEWADD_FORM_SIZE' => cot_inputbox('text', 'rnewsize', $rnew['new_size'], array('size' => '56', 'maxlength' => '255')),
	'NEWADD_FORM_TEXT' => cot_textarea('rnewtext', $rnew['new_text'], 24, 120, '', 'input_textarea_editor'),
	'NEWADD_FORM_PARSER' => cot_selectbox($cfg['new']['parser'], 'rnewparser', $parser_list, $parser_list, false)
);

$t->assign($newadd_array);

// Extra fields
foreach($cot_extrafields[$db_news] as $exfld)
{
	$uname = strtoupper($exfld['field_name']);
	$exfld_val = cot_build_extrafields('rnew'.$exfld['field_name'], $exfld, $rnew[$exfld['field_name']]);
	$exfld_title = isset($L['new_'.$exfld['field_name'].'_title']) ?  $L['new_'.$exfld['field_name'].'_title'] : $exfld['field_description'];
	$t->assign(array(
		'NEWADD_FORM_'.$uname => $exfld_val,
		'NEWADD_FORM_'.$uname.'_TITLE' => $exfld_title,
		'NEWADD_FORM_EXTRAFLD' => $exfld_val,
		'NEWADD_FORM_EXTRAFLD_TITLE' => $exfld_title
		));
	$t->parse('MAIN.EXTRAFLD');
}

// Error and message handling
cot_display_messages($t);

/* === Hook === */
foreach (cot_getextplugins('new.add.tags') as $pl)
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
