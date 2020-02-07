CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `userID` INT(4) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `hash` VARCHAR(40) VIRTUAL COMMENT 'need to hash a password sent into the system into sha-1 format, then check that value to this value. If a password is updated, the hash must be stored. Should salt with a secret key',
  `f_name` VARCHAR(32) NULL,
  `l_name` VARCHAR(32) NULL,
  `isActive` TINYINT NOT NULL DEFAULT 0,
  `isAdmin` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`userID`),
  UNIQUE INDEX `userID_UNIQUE` (`userID` ASC) VISIBLE)
