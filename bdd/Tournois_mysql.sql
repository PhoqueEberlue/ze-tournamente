CREATE DATABASE IF NOT EXISTS `TOURNOIS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `TOURNOIS`;

CREATE TABLE `MATCH` (
  `id_match` VARCHAR(42),
  `equipe1_match` VARCHAR(42),
  `equipe2_match` VARCHAR(42),
  `kicekigagne_match` VARCHAR(42),
  `parent_match` VARCHAR(42),
  `type_match` VARCHAR(42),
  `score_match` VARCHAR(42),
  `id_tournoi` VARCHAR(42),
  PRIMARY KEY (`id_match`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `TOURNOI` (
  `id_tournoi` VARCHAR(42),
  `nom_tournoi` VARCHAR(42),
  `regle_tournoi` VARCHAR(42),
  PRIMARY KEY (`id_tournoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `EQUIPE` (
  `id_equipe` VARCHAR(42),
  `nom_equipe` VARCHAR(42),
  `id_activite` VARCHAR(42),
  PRIMARY KEY (`id_equipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PARTICIPER` (
  `id_equipe` VARCHAR(42),
  `id_tournoi` VARCHAR(42),
  PRIMARY KEY (`id_equipe`, `id_tournoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ACTIVITE` (
  `id_activite` VARCHAR(42),
  `nom_activite` VARCHAR(42),
  PRIMARY KEY (`id_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `EST_MEMBRE` (
  `id_participant` VARCHAR(42),
  `id_equipe` VARCHAR(42),
  PRIMARY KEY (`id_participant`, `id_equipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PARTICIPANT` (
  `id_participant` VARCHAR(42),
  `pseudo_participant` VARCHAR(42),
  `nom_participant` VARCHAR(42),
  `prenom_participant` VARCHAR(42),
  PRIMARY KEY (`id_participant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `MATCH` ADD FOREIGN KEY (`id_tournoi`) REFERENCES `TOURNOI` (`id_tournoi`);
ALTER TABLE `EQUIPE` ADD FOREIGN KEY (`id_activite`) REFERENCES `ACTIVITE` (`id_activite`);
ALTER TABLE `PARTICIPER` ADD FOREIGN KEY (`id_tournoi`) REFERENCES `TOURNOI` (`id_tournoi`);
ALTER TABLE `PARTICIPER` ADD FOREIGN KEY (`id_equipe`) REFERENCES `EQUIPE` (`id_equipe`);
ALTER TABLE `EST_MEMBRE` ADD FOREIGN KEY (`id_equipe`) REFERENCES `EQUIPE` (`id_equipe`);
ALTER TABLE `EST_MEMBRE` ADD FOREIGN KEY (`id_participant`) REFERENCES `PARTICIPANT` (`id_participant`);