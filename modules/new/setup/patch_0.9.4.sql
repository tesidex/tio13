/* 0.9.4 reset page_expire to 0 to avoid expiration of existing pages */
UPDATE `cot_news` SET page_expire = 0;