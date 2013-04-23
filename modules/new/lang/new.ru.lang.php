<?php
/**
 * Russian Language File for the New Module (new.ru.lang.php)
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

$L['cfg_autovalidate'] = 'Автоматическое утверждение страниц';
$L['cfg_autovalidate_hint'] = 'Автоматически утверждать публикацию страниц, созданных пользователем с правом администрирования раздела';
$L['cfg_count_admin'] = 'Считать посещения администраторов';
$L['cfg_count_admin_hint'] = 'Включить посещения администраторов в статистику посещаемости сайта';
$L['cfg_maxlistspernew'] = 'Макс. количество категорий на странице';
$L['cfg_maxlistspernew_hint'] = ' ';
$L['cfg_maxrowspernew'] = 'Количество статей на странице';
$L['cfg_order'] = 'Поле сортировки';
$L['cfg_title_new'] = 'Формат заголовка страницы';
$L['cfg_title_new_hint'] = 'Опции: {TITLE}, {CATEGORY}';
$L['cfg_way'] = 'Направление сортировки';
$L['cfg_truncatetext'] = 'Ограничить размер текста в списках страниц';
$L['cfg_truncatetext_hint'] = '0 для отключения';
$L['cfg_allowemptytext'] = 'Разрешить пустой текст страницы';
$L['cfg_keywords'] = 'Ключевые слова';

$L['info_desc'] = 'Управление контентом: страницы и категории страниц';

/**
 * Structure Confing
 */

$L['cfg_order_params'] = array(); // Redefined in cot_new_config_order()
$L['cfg_way_params'] = array($L['Ascending'], $L['Descending']);

/**
 * Admin New Section
 */

$L['adm_queue_deleted'] = 'Страница удалена в корзину';
$L['adm_valqueue'] = 'В очереди на утверждение';
$L['adm_validated'] = 'Утвержденные';
$L['adm_expired'] = 'C истекшим сроком';
$L['adm_structure'] = 'Структура страниц (категории)';
$L['adm_sort'] = 'Сортировать';
$L['adm_sortingorder'] = 'Порядок сортировки по умолчанию в категории';
$L['adm_showall'] = 'Показать все';
$L['adm_help_new'] = 'Страницы категории &laquo;system&raquo; не отображаются в списках страниц и являются отдельными, самостоятельными страницами';
$L['adm_fileyesno'] = 'Файл (да/нет)';
$L['adm_fileurl'] = 'URL файла';
$L['adm_filecount'] = 'Количество загрузок';
$L['adm_filesize'] = 'Размер файла';

/**
 * New add and edit
 */

$L['new_addtitle'] = 'Создать страницу';
$L['new_addsubtitle'] = 'Заполните необходимые поля и нажмите "Отправить" для продолжения';
$L['new_edittitle'] = 'Свойства страницы';
$L['new_editsubtitle'] = 'Измените необходимые поля и нажмите "Отправить" для продолжения';

$L['new_aliascharacters'] = 'Недопустимо использование символов \'+\', \'/\', \'?\', \'%\', \'#\', \'&\' в алиасах';
$L['new_catmissing'] = 'Код категории отсутствует';
$L['new_clone'] = 'Клонировать страницу';
$L['new_confirm_delete'] = 'Вы действительно хотите удалить эту страницу?';
$L['new_confirm_validate'] = 'Хотите утвердить эту страницу?';
$L['new_confirm_unvalidate'] = 'Вы действительно хотите отправить эту страницу в очередь на утверждение?';
$L['new_drafts'] = 'Черновики';
$L['new_drafts_desc'] = 'Страницы, сохраненные в ваших черновиках';
$L['new_notavailable'] = 'Страница будет опубликована через';
$L['new_textmissing'] = 'Текст страницы не должен быть пустым';
$L['new_titletooshort'] = 'Заголовок слишком короткий либо отсутствует';
$L['new_validation'] = 'Ожидают утверждения';
$L['new_validation_desc'] = 'Ваши страницы, которые еще не утверждены администратором';

$L['new_file'] = 'Прикрепить файл';
$L['new_filehint'] = '(при включении модуля загрузок заполните два поля ниже)';
$L['new_urlhint'] = '(если прикреплен файл)';
$L['new_filesize'] = 'Размер файла, Кб';
$L['new_filesizehint'] = '(если прикреплен файл)';
$L['new_filehitcount'] = 'Загрузок';
$L['new_filehitcounthint'] = '(если прикреплен файл)';
$L['new_metakeywords'] = 'Ключевые слова';
$L['new_metatitle'] = 'Meta-заголовок';
$L['new_metadesc'] = 'Meta-описание';

$L['new_formhint'] = 'После заполнения формы страница будет помещена в очередь на утверждение и будет скрыта до тех пор, пока модератор или администратор не утвердят ее публикацию в соответствующем разделе. Внимательно проверьте правильность заполнения полей формы. Если вам понадобится изменить содержание страницы, то вы сможете сделать это позже, но страница вновь будет отправлена на утверждение.';

$L['new_newid'] = 'ID страницы';
$L['new_deletenew'] = 'Удалить страницу';

$L['new_savedasdraft'] = 'Страница сохранена в черновиках';

/**
 * New statuses
 */

$L['new_status_draft'] = 'Черновик';
$L['new_status_pending'] = 'На рассмотрении';
$L['new_status_approved'] = 'Утверждена';
$L['new_status_published'] = 'Опубликована';
$L['new_status_expired'] = 'Устарела';

/**
 * Moved from theme.lang
 */

$L['new_linespernew'] = 'Записей на страницу';
$L['new_linesinthissection'] = 'Записей в разделе';

$Ls['news'] = "страница,страницы,страниц";
$Ls['unvalidated_news'] = "неутвержденная страница,неутвержденные страницы,неутвержденных страниц";
$Ls['news_in_drafts'] = "страница в черновиках,страницы в черновиках,страниц в черновиках";
