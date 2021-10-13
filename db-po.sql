-- -----------------------------------------------------
-- Table `portalove`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portalove`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(150) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portalove`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portalove`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cat_name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cat_name_UNIQUE` (`cat_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portalove`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portalove`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(155) NOT NULL,
  `perex` VARCHAR(255) NULL,
  `content` TEXT NULL,
  `created_at` DATETIME NULL,
  `image` VARCHAR(150) NULL,
  `users_id` INT NOT NULL,
  `categories_id` INT NOT NULL,
  PRIMARY KEY (`id`, `users_id`, `categories_id`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  INDEX `fk_posts_users_idx` (`users_id` ASC),
  INDEX `fk_posts_categories1_idx` (`categories_id` ASC),
  CONSTRAINT `fk_posts_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `portalove`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `portalove`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portalove`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portalove`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(255) NOT NULL,
  `posts_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`, `posts_id`, `users_id`),
  INDEX `fk_comments_posts1_idx` (`posts_id` ASC),
  INDEX `fk_comments_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_comments_posts1`
    FOREIGN KEY (`posts_id`)
    REFERENCES `portalove`.`posts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `portalove`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
