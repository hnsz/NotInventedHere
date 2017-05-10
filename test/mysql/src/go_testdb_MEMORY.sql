
SET default_storage_engine='MEMORY';

use go_testdb_memory;

drop table if exists `pepper`;
drop table if exists `accessrule`;
drop table if exists `gomember`;
drop table if exists `resource`;
drop table if exists `gouser`;

create table `pepper` (
	`pepperstring` varchar(100)
);

insert into `pepper` value("FKrDfv0w3B");
-- -----------------------------------------------------
-- Table `gouser`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gouser` (
  `id` INT NOT NULL ,
  `email` VARCHAR(100) NULL,
  `salt` CHAR(20) NULL,
  `hash` VARCHAR(512) NULL,
  `usertype` VARCHAR(45) NULL,
  `nick` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC));

-- -----------------------------------------------------
-- Table `resource`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resource` (
  `id` INT NOT NULL,
  `uri` VARCHAR(700) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uri_UNIQUE` (`uri` ASC));


-- -----------------------------------------------------
-- Table `accessrule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `accessrule` (
  `id` INT NOT NULL,
  `gouser_id` INT NULL,
  `resource_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_accessrule_1_idx` (`gouser_id` ASC),
  INDEX `fk_accessrule_2_idx` (`resource_id` ASC),
  CONSTRAINT `fk_accessrule_1`
    FOREIGN KEY (`gouser_id`)
    REFERENCES `gouser` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_accessrule_2`
    FOREIGN KEY (`resource_id`)
    REFERENCES `resource` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Placeholder table for view `gomember`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gomember` (`id` INT, `email` INT, `salt` INT, `hash` INT, `usertype` INT, `nick` INT);

-- -----------------------------------------------------
-- View `gomember`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gomember`;
USE `go_testdb_memory`;
CREATE  OR REPLACE VIEW `gomember` AS 
select *
from gouser
where usertype = 'M';

