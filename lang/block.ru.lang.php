<?php
/**
 * Russian Language File for Block Plugin
 *
 * @package block
 * @version 0.9.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

/**
 * Plugin Info
 */

$L['info_desc'] = 'Вывод страниц указанной категории на главной странице в виде новостной ленты';

/**
 * Plugin Config
 */

$L['cfg_category'] = 'Категории новостной ленты';
$L['cfg_category_hint'] = 'Коды категорий новостной ленты необходимо разделять запятыми.<br />Для вывода на главной странице главной (первая в списке) категории новостей используйте тэг {INDEX_BLOCK} в файле index.tpl.<br />Вывод дополнительных (следующих за первой) категорий новостей осуществляется при помощи тэга <strong>{INDEX_BLOCK_КОДКАТЕГОРИИ}</strong> в файле index.tpl. При помощи шаблона <strong>block.кодкатегории.tpl</strong> можно настроить отображение новостной ленты для каждой из категорий.';
$L['cfg_maxpages'] = 'Количество отображаемых страниц';
$L['cfg_syncpagination'] = 'Синхронное переключение страниц';
$L['cfg_cache_ttl'] = 'Время жизни кеша в секундах';
$L['cfg_cache_ttl_hint'] = '0 - кеш отключен';

$L['Maincat']='Основная категория новостей';
$L['Addcat']='Дополнительные категории новостей';
$L['BlockCount']='Количество новостей';
$L['Template']='Шаблон';
$L['Template_help']='Если отсутствует шаблон дополнительных новостых категорий в папке {ВАШ_СКИН}/plugins, то будет использован шаблон основной новостной категории';
$L['Blockcat_exists']='Данная категория уже выбрана. Выберите другую категорию';
$L['Unsetadd']= 'Не использовать дополнительную категорию, если она соответствует основной категории.';
$L['Blockautocut']='Ограничение символов';
$L['Blockautocutdesc']='На странице новостей будут выведены только первые N символов, указанные в настройках, с учетом абзацев. По умолчанию обрезка новостей не производится.';

$L['block_help'] = '';