CREATE TABLE `tpm`.`passwords` (
  `pwd_id` INT NOT NULL AUTO_INCREMENT,
  `pwd_title` VARCHAR(45) NOT NULL,
  `pwd_username` VARCHAR(45) NULL,
  `pwd_email` VARCHAR(45) NULL,
  `pwd_password` VARCHAR(45) NOT NULL,
  `pwd_url` VARCHAR(100) NOT NULL,
  `pwd_totp` VARCHAR(45) NULL,
  `pwd_notes` VARCHAR(512) NULL,
  PRIMARY KEY (`pwd_id`),
  UNIQUE INDEX `pwd_id_UNIQUE` (`pwd_id` ASC) VISIBLE);

CREATE TABLE `tpm`.`security_questions` (
  `sec_id` INT NOT NULL AUTO_INCREMENT,
  `sec_pwd_id` INT NOT NULL,
  `sec_title` VARCHAR(45) NOT NULL,
  `sec_answer` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`sec_id`),
  UNIQUE INDEX `sec_id_UNIQUE` (`sec_id` ASC) VISIBLE);