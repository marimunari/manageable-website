-- -----------------------------------------------
-- Table `pages`
-- -----------------------------------------------
CREATE TABLE `pages` (
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(250) NOT NULL,
    `url` VARCHAR(100),
    `body` TEXT,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

-- -----------------------------------------------
-- Table `users`
-- -----------------------------------------------
CREATE TABLE `users` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(250) NOT NULL,
    `email` VARCHAR(250) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);