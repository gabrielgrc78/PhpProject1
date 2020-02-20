/**
 * Author:  gabri
 * Created: Jan 11, 2020
 */
DROP DATABASE IF EXISTS IngridHairSalon;
CREATE DATABASE IngridHairSalon;

DROP TABLE IF EXISTS IngridHairSalon.clients;
CREATE TABLE IngridHairSalon.clients (
    `clientId` INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `birthdate` DATE NOT NULL,
    `admin`    BOOLEAN NOT NULL,
    `joined on`TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`username`)
) ENGINE=INNODB AUTO_INCREMENT=1;

DROP TABLE IF EXISTS IngridHairSalon.security;
CREATE TABLE IngridHairSalon.security (
    `loginID` INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `last login` TIMESTAMP NULL DEFAULT NULL,
    `lastknownip` VARCHAR(20) NOT NULL,
    CONSTRAINT `security_ibfk_1` FOREIGN KEY (`username`)
        REFERENCES `clients` (`username`)
        ON DELETE CASCADE
)  ENGINE=INNODB AUTO_INCREMENT=1;