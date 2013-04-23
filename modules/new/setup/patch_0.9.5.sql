/* 0.9.5 separate field for last page update */
ALTER TABLE `cot_news` ADD COLUMN `new_updated` int(11) NOT NULL default '0';