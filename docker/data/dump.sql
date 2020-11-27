CREATE TABLE IF NOT EXISTS `entries` (
    `id` INT UNSIGNED NOT NULL auto_increment,
    `name` VARCHAR(191) NOT NULL,
    `dob` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);
