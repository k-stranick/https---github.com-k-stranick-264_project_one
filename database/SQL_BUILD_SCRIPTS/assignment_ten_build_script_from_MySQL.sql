-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema assignment_nine
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `assignment_nine` ;

-- -----------------------------------------------------
-- Schema assignment_nine
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `assignment_nine` DEFAULT CHARACTER SET utf8mb4 ;
USE `assignment_nine` ;

-- -----------------------------------------------------
-- Table `assignment_nine`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assignment_nine`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `item_name` TEXT NOT NULL,
  `price` DOUBLE NOT NULL,
  `city` TEXT NOT NULL,
  `state` CHAR(2) NOT NULL,
  `condition` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  `image_path` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
