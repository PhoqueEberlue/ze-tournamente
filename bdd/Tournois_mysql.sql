CREATE DATABASE IF NOT EXISTS `TOURNOIS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `TOURNOIS`;

CREATE TABLE `MATCH` (
  `id_match` INTEGER AUTO_INCREMENT,
  `equipe1_match` INTEGER,
  `equipe2_match` INTEGER,
  `kicekigagne_match` SMALLINT,
  `parent_match` INTEGER,
  `type_match` VARCHAR(20),
  `score_match` VARCHAR(20),
  `id_tournoi` INTEGER,
  PRIMARY KEY (`id_match`)
)DEFAULT CHARSET=utf8;

CREATE TABLE `TOURNOI` (
  `id_tournoi` INTEGER AUTO_INCREMENT,
  `nom_tournoi` VARCHAR(42),
  `regle_tournoi` VARCHAR(1500),
  PRIMARY KEY (`id_tournoi`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE `EQUIPE` (
  `id_equipe` INTEGER AUTO_INCREMENT,
  `nom_equipe` VARCHAR(42),
  `id_activite` INTEGER,
  PRIMARY KEY (`id_equipe`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE `PARTICIPER` (
  `id_equipe` INTEGER,
  `id_tournoi`INTEGER,
  PRIMARY KEY (`id_equipe`, `id_tournoi`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE `ACTIVITE` (
  `id_activite` INTEGER AUTO_INCREMENT,
  `nom_activite` VARCHAR(42),
  PRIMARY KEY (`id_activite`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE `EST_MEMBRE` (
  `id_participant` INTEGER,
  `id_equipe` INTEGER,
  PRIMARY KEY (`id_participant`, `id_equipe`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `PARTICIPANT` (
  `id_participant` INTEGER AUTO_INCREMENT,
  `pseudo_participant` VARCHAR(42),
  `nom_participant` VARCHAR(42),
  `prenom_participant` VARCHAR(42),
  PRIMARY KEY (`id_participant`)
) DEFAULT CHARSET=utf8;

ALTER TABLE `MATCH` ADD FOREIGN KEY (`id_tournoi`) REFERENCES `TOURNOI` (`id_tournoi`);
ALTER TABLE `EQUIPE` ADD FOREIGN KEY (`id_activite`) REFERENCES `ACTIVITE` (`id_activite`);
ALTER TABLE `PARTICIPER` ADD FOREIGN KEY (`id_tournoi`) REFERENCES `TOURNOI` (`id_tournoi`);
ALTER TABLE `PARTICIPER` ADD FOREIGN KEY (`id_equipe`) REFERENCES `EQUIPE` (`id_equipe`);
ALTER TABLE `EST_MEMBRE` ADD FOREIGN KEY (`id_equipe`) REFERENCES `EQUIPE` (`id_equipe`);
ALTER TABLE `EST_MEMBRE` ADD FOREIGN KEY (`id_participant`) REFERENCES `PARTICIPANT` (`id_participant`);