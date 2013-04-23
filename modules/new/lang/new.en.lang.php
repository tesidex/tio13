<?php
/**
 * English Language File for the New Module (new.en.lang.php)
 *
 * @package new
 * @version 0.9.6
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

/**
 * Module Config
 */

$L['cfg_autovalidate'] = 'Autovalidate new';
$L['cfg_autovalidate_hint'] = 'Autovalidate new if poster has admin rights for new category';
$L['cfg_count_admin'] = 'Count Administrators\' hits';
$L['cfg_count_admin_hint'] = '';
$L['cfg_maxlistspernew'] = 'Max. lists per new';
$L['cfg_maxlistspernew_hint'] = ' ';
$L['cfg_order'] = 'Sorting column';
$L['cfg_title_new'] = 'New title tag format';
$L['cfg_title_new_hint'] = 'Options: {TITLE}, {CATEGORY}';
$L['cfg_way'] = 'Sorting direction';
$L['cfg_truncatetext'] = 'Set truncated new text length in list';
$L['cfg_truncatetext_hint'] = 'Zero to disable this feature';
$L['cfg_allowemptytext'] = 'Allow empty new text';
$L['cfg_keywords'] = 'Keywords';

$L['info_desc'] = 'Enables website content through news and new categories';

/**
 * Structure Confing
 */

$L['cfg_order_params'] = array(); // Redefined in cot_new_config_order()
$L['cfg_way_params'] = array($L['Ascending'], $L['Descending']);

/**
 * Admin New Section
 */

$L['adm_queue_deleted'] = 'New was deleted in to the trash can';
$L['adm_valqueue'] = 'Waiting for validation';
$L['adm_validated'] = 'Already validated';
$L['adm_expired'] = 'Expired';
$L['adm_structure'] = 'Structure of the news (categories)';
$L['adm_sort'] = 'Sort';
$L['adm_sortingorder'] = 'Set a default sorting order for the categories';
$L['adm_showall'] = 'Show all';
$L['adm_help_new'] = 'The news that belong to the category &quot;system&quot; are not displayed in the public listings, it\'s to make standalone news.';
$L['adm_fileyesno'] = 'File (yes/no)';
$L['adm_fileurl'] = 'File URL';
$L['adm_filecount'] = 'File hit count';
$L['adm_filesize'] = 'File size';

/**
 * New add and edit
 */

$L['new_addtitle'] = 'Submit new new';
$L['new_addsubtitle'] = 'Fill out all required fields and hit "Sumbit" to continue';
$L['new_edittitle'] = 'New properties';
$L['new_editsubtitle'] = 'Edit all required fields and hit "Sumbit" to continue';

$L['new_aliascharacters'] = 'Characters \'+\', \'/\', \'?\', \'%\', \'#\', \'&\' are not allowed in aliases';
$L['new_catmissing'] = 'The category code is missing';
$L['new_clone'] = 'Clone new';
$L['new_confirm_delete'] = 'Do you really want to delete this new?';
$L['new_confirm_validate'] = 'Do you want to validate this new?';
$L['new_confirm_unvalidate'] = 'Do you really want to put this new back to the validation queue?';
$L['new_drafts'] = 'Drafts';
$L['new_drafts_desc'] = 'News saved in your drafts';
$L['new_notavailable'] = 'This new will be published in ';
$L['new_textmissing'] = 'New text must not be empty';
$L['new_titletooshort'] = 'The title is too short or missing';
$L['new_validation'] = 'Awaiting validation';
$L['new_validation_desc'] = 'Your news which have not been validated by administrator yet';

$L['new_file'] = 'File download';
$L['new_filehint'] = '(Set &quot;Yes&quot; to enable the download module at bottom of the new, and fill up the two fields below)';
$L['new_urlhint'] = '(If File download enabled)';
$L['new_filesize'] = 'Filesize, kB';
$L['new_filesizehint'] = '(If File download enabled)';
$L['new_filehitcount'] = 'File hit count';
$L['new_filehitcounthint'] = '(If File download enabled)';
$L['new_metakeywords'] = 'Meta keywords';
$L['new_metatitle'] = 'Meta title';
$L['new_metadesc'] = 'Meta description';

$L['new_formhint'] = 'Once your submission is done, the new will be placed in the validation queue and will be hidden, awaiting confirmation from a site administrator or global moderator before being displayed in the right section. Check all fields carefully. If you need to change something, you will be able to do that later. But submitting changes puts a new into validation queue again.';

$L['new_newid'] = 'New ID';
$L['new_deletenew'] = 'Delete this new';

$L['new_savedasdraft'] = 'New saved as draft.';

/**
 * New statuses
 */

$L['new_status_draft'] = 'Draft';
$L['new_status_pending'] = 'Pending';
$L['new_status_approved'] = 'Approved';
$L['new_status_published'] = 'Published';
$L['new_status_expired'] = 'Expired';

/**
 * Moved from theme.lang
 */

$L['new_linespernew'] = 'Lines per new';
$L['new_linesinthissection'] = 'Lines in this section';

$Ls['news'] = "news,new";
$Ls['unvalidated_news'] = "unvalidated news,unvalidated new";
$Ls['news_in_drafts'] = "news in drafts,new in drafts";
