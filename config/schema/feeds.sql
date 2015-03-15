PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE `feeds` (
    `id` INTEGER NULL PRIMARY KEY AUTOINCREMENT,
    `title` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `url` VARCHAR(255) NULL,
    `website` VARCHAR(255) NULL,
    `lang` VARCHAR(255) NULL,
    `logo` VARCHAR(255) NULL,
    `icon` VARCHAR(255) NULL,
    `is_active` BOOLEAN NULL,
    `etag` VARCHAR(255) NULL,
    `checked` DATETIME NULL,
    `created` DATETIME NULL,
    `modified` DATETIME NULL
);
COMMIT;
