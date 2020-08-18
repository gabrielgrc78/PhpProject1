/*
 * Author:  gabriel
 * Created: Jan 11, 2020
 * Version: 4.0
 */
DROP DATABASE IF EXISTS IngridHairSalon;
CREATE DATABASE IngridHairSalon;

DROP TABLE IF EXISTS IngridHairSalon.clients;
CREATE TABLE IngridHairSalon.clients (
    `clientID`      TINYINT     AUTO_INCREMENT  PRIMARY KEY  NOT NULL,
    `Fname`         VARCHAR(50)                              NOT NULL,
    `Lname`         VARCHAR(50)                              NOT NULL,
    `username`      VARCHAR(50)                              NOT NULL,
    `password`      LONGTEXT                                 NOT NULL,
    `birthdate`     DATE                                     NOT NULL,
    `email`         VARCHAR(80)                              NOT NULL,
    `phone`         VARCHAR(12)                              NOT NULL,
    `lastknownip`   VARCHAR(20)                              NOT NULL,
    `joined on`     TIMESTAMP                                NOT NULL    DEFAULT     CURRENT_TIMESTAMP,
    `last login`    TIMESTAMP                                NULL        DEFAULT     NULL,
    `admin`         BOOLEAN                                  NOT NULL,
    `firsttime`     BOOLEAN                                  NOT NULL,
    INDEX (`username`, `phone`, `email`)
) ENGINE=INNODB AUTO_INCREMENT=1;

DROP TABLE IF EXISTS IngridHairSalon.reserved;
CREATE TABLE IngridHairSalon.reserved (
  `reservationID`   INT         AUTO_INCREMENT  PRIMARY KEY NOT NULL,
  `username`        VARCHAR(50),
  `Rdate`           DATE                                    NOT NULL,
  `Rtime`           TIME                                    NOT NULL,
  `phone`           VARCHAR(12),
  `email`           VARCHAR(80),
  `created_on`      TIMESTAMP                               NOT NULL    DEFAULT     CURRENT_TIMESTAMP,
  CONSTRAINT reserved_ibfk_1 FOREIGN KEY (`username`, `phone` , `email`) REFERENCES IngridHairSalon.clients(`username`, `phone`, `email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB AUTO_INCREMENT=1;

DROP TABLE IF EXISTS IngridHairSalon.exreserved;
CREATE TABLE IngridHairSalon.exreserved (
  `exreservedID`    INT        AUTO_INCREMENT  PRIMARY KEY NOT NULL,
  `first`           VARCHAR(50)                            NOT NULL,
  `last`            VARCHAR(50)                            NOT NULL,
  `email`           LONGTEXT                               NOT NULL,
  `phone`           VARCHAR(10)                            NOT NULL,
  `created_on`      TIMESTAMP                              NOT NULL     DEFAULT    CURRENT_TIMESTAMP
  )ENGINE=INNODB AUTO_INCREMENT=1;
