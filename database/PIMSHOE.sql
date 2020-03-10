SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema PIMSHOE
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema PIMSHOE
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PIMSHOE` DEFAULT CHARACTER SET latin1 ;
USE `PIMSHOE` ;

-- -----------------------------------------------------
-- Table `PIMSHOE`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PIMSHOE`.`Product` (
  `upc` BIGINT(12) NOT NULL,
  `productName` VARCHAR(255) NOT NULL,
  `productBrand` VARCHAR(255) NOT NULL,
  `productSize` VARCHAR(3) NOT NULL,
  `productGender` CHAR(1) NOT NULL,
  `productColor` VARCHAR(255) NOT NULL,
  `productPrice` DECIMAL(5,2) NOT NULL DEFAULT '0.00',
  `productIsActive` TINYINT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upc`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `PIMSHOE`.`Store`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PIMSHOE`.`Store` (
  `storeID` INT(2) NOT NULL,
  `storeName` VARCHAR(45) NOT NULL,
  `telephone` INT(11) NOT NULL,
  `streetAddress` VARCHAR(255) NOT NULL,
  `city` VARCHAR(15) NOT NULL,
  `state` CHAR(2) NOT NULL,
  `zip` INT(5) NOT NULL,
  PRIMARY KEY (`storeID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `PIMSHOE`.`Discount`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PIMSHOE`.`Discount` (
  `storeID` INT(2) NOT NULL,
  `upc` BIGINT(12) NOT NULL,
  `discountIsActive` TINYINT(4) NOT NULL DEFAULT '0',
  `discountPrice` DECIMAL(5,2) NULL DEFAULT NULL,
  PRIMARY KEY (`storeID`, `upc`),
  INDEX `UPCdisc_idx` (`upc` ASC) VISIBLE,
  CONSTRAINT `UPCdisc`
    FOREIGN KEY (`upc`)
    REFERENCES `PIMSHOE`.`Product` (`upc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `storeIDdisc`
    FOREIGN KEY (`storeID`)
    REFERENCES `PIMSHOE`.`Store` (`storeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `PIMSHOE`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PIMSHOE`.`User` (
  `userID` INT(4) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `passhash` VARCHAR(64) NOT NULL DEFAULT 'BA01338BA5FA0C1584A6D41F93FE550B1D715A8DE2DA10D6C673131A85658394',
  `f_name` VARCHAR(32) NOT NULL,
  `l_name` VARCHAR(32) NOT NULL,
  `isActive` TINYINT(4) NOT NULL,
  `isAdmin` TINYINT(4) NOT NULL DEFAULT '0',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `PIMSHOE`.`quantityAvailable`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PIMSHOE`.`quantityAvailable` (
  `storeID` INT(2) NOT NULL,
  `upc` BIGINT(12) NOT NULL,
  `qty` INT(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`storeID`, `upc`),
  INDEX `UPCquant_idx` (`upc` ASC) VISIBLE,
  CONSTRAINT `UPCquant`
    FOREIGN KEY (`upc`)
    REFERENCES `PIMSHOE`.`Product` (`upc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `storeIDquant`
    FOREIGN KEY (`storeID`)
    REFERENCES `PIMSHOE`.`Store` (`storeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
