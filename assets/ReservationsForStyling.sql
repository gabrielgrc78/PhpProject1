/*
 * Author:  gabriel
 * Created: Jan 11, 2020
 */
DROP DATABASE IF EXISTS IngridHairSalon;
CREATE DATABASE IngridHairSalon;

DROP TABLE IF EXISTS IngridHairSalon.clients;
CREATE TABLE IngridHairSalon.clients (
    `clientId` TINYINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `birthdate` DATE NOT NULL,
    `lastknownip` VARCHAR(20) NOT NULL,
    `joined on`TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `last login` TIMESTAMP NULL DEFAULT NULL,
    `admin`    BOOLEAN NOT NULL

) ENGINE=INNODB AUTO_INCREMENT=1;
