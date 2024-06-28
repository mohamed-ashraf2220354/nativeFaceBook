CREATE SCHEMA IF NOT EXISTS `facebook` ;
USE `facebook` ;

CREATE TABLE IF NOT EXISTS `facebook`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL UNIQUE,
  `password` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `role` ENUM("admin", "subscriber") NULL DEFAULT 'subscriber',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

CREATE TABLE IF NOT EXISTS `facebook`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` TEXT NULL,
  `content` TEXT NULL,
  `image` VARCHAR(255) DEFAULT NULL,
  `user_id` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `user_id`),
  CONSTRAINT `fk_posts_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `facebook`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS `facebook`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comment` TEXT NULL,
  `post_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `post_id`, `user_id`),
  CONSTRAINT `fk_comments_posts`
    FOREIGN KEY (`post_id`)
    REFERENCES `facebook`.`posts` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comments_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `facebook`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS `facebook`.`likes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `post_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `post_id`, `user_id`),
  CONSTRAINT `fk_likes_posts`
    FOREIGN KEY (`post_id`)
    REFERENCES `facebook`.`posts` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_likes_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `facebook`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
