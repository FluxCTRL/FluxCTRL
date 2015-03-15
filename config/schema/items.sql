PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE `items` (
    `id` INTEGER NULL PRIMARY KEY AUTOINCREMENT,
    `feed_id` INTEGER NULL,
    `title` VARCHAR(255) NULL,
    `author` VARCHAR(255) NULL,
    `url` VARCHAR(255) NULL,
    `content` TEXT NULL,
    `enclosure_url` VARCHAR(255) NULL,
    `enclosure_type` VARCHAR(255) NULL,
    `lang` VARCHAR(255) NULL,
    `is_read` BOOLEAN NOT NULL DEFAULT 0,
    `published` DATETIME NULL,
    `aggregated` DATETIME NULL
);
COMMIT;
