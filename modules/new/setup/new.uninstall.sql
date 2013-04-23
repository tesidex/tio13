/**
 * Completely removes new data
 */

DROP TABLE IF EXISTS `cot_news`;

DELETE FROM `cot_structure` WHERE structure_area = 'new';