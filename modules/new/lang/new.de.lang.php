<?php
/**
 * German Language File for the New Module (new.de.lang.php)
 *
 * @package new
 * @version 0.9.6
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2012
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

/**
 * Module Config
 */

$L['cfg_autovalidate'] = array('Automatische Freischaltung', 'Automatische Freischaltung der Seite, wenn der Benutzer Adminrechte in der Kategorie hat');
$L['cfg_count_admin'] = array('Zugriffe des Administrators zählen', '');
$L['cfg_maxlistspernew'] = array('Max. Auflistungen pro Seite', ' ');
$L['cfg_order'] = array('Sortierungsspalte');
$L['cfg_title_new'] = array('Format für Seitentitel-Tag', 'Optionen: {TITLE}, {CATEGORY}');
$L['cfg_way'] = array('Sortierrichtung');
$L['cfg_truncatetext'] = array('Länge des abgeschnittenen Textes in Liste', '0 zum Ausschalten der Funktion');
$L['cfg_allowemptytext'] = array('Leeren Seitentext erlauben');
$L['cfg_keywords'] = array('Schlüsselwörter');

$L['info_desc'] = 'Erweiterbare Content-Management-Funktionalität: Seiten und Seitenkategorien.';

/**
 * Structure Confing
 */

$L['cfg_order_params'] = array(); // Redefined in cot_new_config_order()
$L['cfg_way_params'] = array($L['Ascending'], $L['Descending']);

/**
 * Admin New Section
 */

$L['adm_queue_deleted'] = 'Seite wurde in den Papierkorb verschoben';
$L['adm_valqueue'] = 'Wartet auf Freischaltung';
$L['adm_validated'] = 'Bereits freigeschaltet';
$L['adm_expired'] = 'Abgelaufen';
$L['adm_structure'] = 'Seitenstruktur (Kategorien)';
$L['adm_sort'] = 'Sortieren';
$L['adm_sortingorder'] = 'Legen Sie eine Standardsortierung für die Kategorien fest';
$L['adm_showall'] = 'Alle anzeigen';
$L['adm_help_new'] = 'Die zur Kategorie &quot;system&quot; gehörenden Seiten erscheinen nicht in öffentlichen Listen, da sie als Standalone-Seiten vorgesehen sind.';
$L['adm_fileyesno'] = 'Datei (ja/nein)';
$L['adm_fileurl'] = 'Datei-URL';
$L['adm_filecount'] = 'Dateiaufrufe';
$L['adm_filesize'] = 'Dateigröße';

/**
 * New add and edit
 */

$L['new_addtitle'] = 'Neues Produkt hinzufügen';
$L['new_addsubtitle'] = 'Füllen Sie alle notwendigen Felder aus und klicken auf "Absenden" um fortzufahren';
$L['new_edittitle'] = 'Seiteneigenschaften';
$L['new_editsubtitle'] = 'Bearbeiten Sie alle notwendigen Felder und klicken auf "Absenden" um fortzufahren';

$L['new_aliascharacters'] = 'Die Zeichen \'+\', \'/\', \'?\', \'%\', \'#\', \'&\' dürfen in Aliasen nicht verwendet werden';
$L['new_catmissing'] = 'Der Kategoriecode fehlt';
$L['new_confirm_delete'] = 'Möchten Sie diese Seite wirklich löschen?';
$L['new_confirm_validate'] = 'Möchten Sie diese Seite freischalten?';
$L['new_confirm_unvalidate'] = 'Möchten Sie diese Seite wirklich zurück in die Freischaltungswarteschlange verschieben?';
$L['new_notavailable'] = 'Diese Seite wird veröffentlicht in ';
$L['new_textmissing'] = 'Seitentext darf nicht leer sein';
$L['new_titletooshort'] = 'Der Titel ist zu kurz oder fehlt';
$L['new_validation'] = 'Wartet auf Freischaltung';
$L['new_validation_desc'] = 'Ihre Seiten, die noch nicht von einem Administrator freigeschaltet wurden';

$L['new_file'] = 'Dateidownload';
$L['new_filehint'] = '(Wählen Sie &quot;Ja&quot;, um das Download-Modul am Ende der Seite zu aktivieren und füllen unten die beiden Felder aus)';
$L['new_urlhint'] = '(falls Dateidownload eingeschaltet)';
$L['new_filesize'] = 'Dateigröße, KB';
$L['new_filesizehint'] = '(falls Dateidownload eingeschaltet)';
$L['new_filehitcount'] = 'Dateiaufrufe';
$L['new_filehitcounthint'] = '(falls Dateidownload eingeschaltet)';
$L['new_metakeywords'] = 'Meta-Schlüsselwörter';
$L['new_metatitle'] = 'Meta-Titel';
$L['new_metadesc'] = 'Meta-Beschreibung';

$L['new_formhint'] = 'Sobald Ihre Einsendung abgeschlossen ist, wird sie in die Freischaltungswarteschlange eingereiht und muss von einem Administrator geprüft werden, bevor sie in der richtigen Sektion sichtbar wird. Bitte prüfen Sie alle Felder sorgfältig. Sie können später jederzeit Änderungen vornehmen, doch dadurch wird die Seite erneut in die Warteschlange eingereiht.';

$L['new_newid'] = 'Seiten-ID';
$L['new_deletenew'] = 'Diese Seite löschen';

$L['new_savedasdraft'] = 'Seite als Entwurf gespeichert.';

/**
 * New statuses
 */

$L['new_status_draft'] = 'Entwurf';
$L['new_status_pending'] = 'In Vorbereitung';
$L['new_status_approved'] = 'Genehmigt';
$L['new_status_published'] = 'Veröffentlicht';
$L['new_status_expired'] = 'Verfallen';

/**
 * Moved from theme.lang
 */

$L['new_linespernew'] = 'Zeilen pro Seite';
$L['new_linesinthissection'] = 'Zeilen in dieser Sektion';
$Ls['news'] = array('Seiten', 'Seite');
$Ls['unvalidated_news'] = array('ungeprüfte Seiten', 'ungeprüfte Seite');

?>