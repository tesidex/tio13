/* 0.9.11 Migrate from Kibibytes to Bytes and Kilobytes */
ALTER TABLE `cot_news` MODIFY COLUMN `new_size` INT(11) UNSIGNED NULL DEFAULT NULL;
UPDATE `cot_news` SET `new_size` = `new_size` * 1024 WHERE `new_size` > 0;