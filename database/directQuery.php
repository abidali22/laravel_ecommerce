--- add two colums in category table ('created_by,  modified_by')
ALTER TABLE `categories` ADD `created_by` INT(10) NOT NULL DEFAULT '1' AFTER `slug`, ADD `modified_by` INT(10) NOT NULL DEFAULT '1' AFTER `created_by`;


---- add deleted_at in category
ALTER TABLE `categories` ADD `deleted_at` TIMESTAMP NULL DEFAULT NULL AFTER `modified_by`;

ALTER TABLE `products` ADD `deleted_at` TIMESTAMP NULL DEFAULT NULL AFTER `category_id`;