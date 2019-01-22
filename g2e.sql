-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 22 jan. 2019 à 22:36
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `g2e`
--
CREATE DATABASE IF NOT EXISTS `g2e` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `g2e`;

-- --------------------------------------------------------

--
-- Structure de la table `arroseur`
--

DROP TABLE IF EXISTS `arroseur`;
CREATE TABLE IF NOT EXISTS `arroseur`
(
  `id_arr`                  int(11)      NOT NULL AUTO_INCREMENT,
  `nom_arr`                 varchar(255) NOT NULL,
  `numero_serie_arr`        varchar(255) NOT NULL,
  `etat_arr`                int(1)       NOT NULL,
  `etat_fonctionnement_arr` int(1)       NOT NULL,
  `date_ajout_arr`          datetime     NOT NULL,
  `id_zone`                 int(11)      NOT NULL,
  `id_plante`               int(11)      NOT NULL,
  `id_type_arroseur`        int(11)      NOT NULL,
  PRIMARY KEY (`id_arr`),
  KEY `id_zone` (`id_zone`),
  KEY `arroseur_plante_id_plante_fk` (`id_plante`),
  KEY `arroseur_type_arroseur_id_type_arroseur_fk` (`id_type_arroseur`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 32
  DEFAULT CHARSET = utf8 COMMENT ='Arroseurs';

-- --------------------------------------------------------

--
-- Structure de la table `arroseur_mode`
--

DROP TABLE IF EXISTS `arroseur_mode`;
CREATE TABLE IF NOT EXISTS `arroseur_mode` (
  `id_arr` int(11) NOT NULL,
  `id_mode` int(11) NOT NULL,
  KEY `id_arr` (`id_arr`),
  KEY `id_mode` (`id_mode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur`
(
  `id_capt` int(11) NOT NULL AUTO_INCREMENT,
  `type_capt` int(11) NOT NULL,
  `id_arr` int(11) NOT NULL,
  PRIMARY KEY (`id_capt`),
  KEY `id_arr` (`id_arr`),
  KEY `type_capt` (`type_capt`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 37
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donnee`
--

DROP TABLE IF EXISTS `donnee`;
CREATE TABLE IF NOT EXISTS `donnee` (
  `id_donnee` int(11) NOT NULL AUTO_INCREMENT,
  `type_trame_donn` varchar(255) NOT NULL,
  `numero_obj_donn` varchar(255) NOT NULL,
  `requete_donn` varchar(255) NOT NULL,
  `numero_capt_donn` varchar(255) NOT NULL,
  `valeur_donn` int(11) NOT NULL,
  `horodatage_donn` timestamp NOT NULL,
  `id_capt` int(11) NOT NULL,
  PRIMARY KEY (`id_donnee`),
  KEY `id_capt` (`id_capt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `habitation`
--

DROP TABLE IF EXISTS `habitation`;
CREATE TABLE IF NOT EXISTS `habitation`
(
  `id_habit` int(11) NOT NULL AUTO_INCREMENT,
  `order_habit` tinyint(1) NOT NULL,
  `nom_habit` varchar(255) NOT NULL,
  `numero_habit` int(25) NOT NULL,
  `rue_habit` varchar(255) NOT NULL,
  `ville_habit` varchar(255) NOT NULL,
  `code_postal_habit` varchar(255) NOT NULL,
  `pays_habit` varchar(255) NOT NULL,
  `date_ajout_habit` datetime NOT NULL,
  PRIMARY KEY (`id_habit`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 14
  DEFAULT CHARSET = utf8 COMMENT ='Liste des habitations';

-- --------------------------------------------------------

--
-- Structure de la table `habitation_utilisateur`
--

DROP TABLE IF EXISTS `habitation_utilisateur`;
CREATE TABLE IF NOT EXISTS `habitation_utilisateur` (
  `id_util` int(11) NOT NULL,
  `id_habit` int(11) NOT NULL,
  KEY `id_util` (`id_util`),
  KEY `id_habit` (`id_habit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mode`
--

DROP TABLE IF EXISTS `mode`;
CREATE TABLE IF NOT EXISTS `mode` (
  `id_mode` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mode` varchar(255) NOT NULL,
  `date_debut_mode` datetime NOT NULL,
  `date_fin_mode` datetime NOT NULL,
  PRIMARY KEY (`id_mode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Différents modes';

-- --------------------------------------------------------

--
-- Structure de la table `mode_programme`
--

DROP TABLE IF EXISTS `mode_programme`;
CREATE TABLE IF NOT EXISTS `mode_programme` (
  `id_mode` int(11) NOT NULL,
  `id_prog` int(11) NOT NULL,
  KEY `id_mode` (`id_mode`),
  KEY `id_prog` (`id_prog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `plante`
--

DROP TABLE IF EXISTS `plante`;
CREATE TABLE IF NOT EXISTS `plante` (
  `id_plante` int(11) NOT NULL AUTO_INCREMENT,
  `nom_plante` varchar(100) NOT NULL,
  `frequence_plante` varchar(100) NOT NULL,
  `saison_plante` varchar(100) NOT NULL,
  `temps_arrosage_plante` varchar(100) NOT NULL,
  PRIMARY KEY (`id_plante`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `id_prog` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prog` varchar(255) NOT NULL,
  `date_debut_prog` datetime NOT NULL,
  `date_fin_prog` datetime NOT NULL,
  `intensite_prog` int(3) NOT NULL,
  `iteration_prog` int(3) NOT NULL,
  PRIMARY KEY (`id_prog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='programmes utilisateur';

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
                                           `id_pub`         int(11)      NOT NULL AUTO_INCREMENT,
                                           `titre_pub`      varchar(255) NOT NULL,
                                           `contenu_pub`    text         NOT NULL,
                                           `fichier_pub`    varchar(255) DEFAULT NULL,
                                           `date_envoi_pub` datetime     NOT NULL,
                                           `id_util`        int(11)      NOT NULL,
                                           PRIMARY KEY (`id_pub`),
                                           KEY `publication_utilisateur_id_util_fk` (`id_util`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
                                      `id_ticket`      int(11)      NOT NULL AUTO_INCREMENT,
                                      `titre_ticket`   varchar(255) NOT NULL,
                                      `status_ticket`  int(11)      NOT NULL,
                                      `contenu_ticket` text         NOT NULL,
                                      `fichier_ticket` varchar(255) NOT NULL,
                                      `date_ticket`    datetime     NOT NULL,
                                      `id_util`        int(11)      NOT NULL,
                                      PRIMARY KEY (`id_ticket`),
                                      KEY `id_util` (`id_util`),
                                      KEY `status_ticket` (`status_ticket`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = utf8 COMMENT ='Gestion des tickets pour les problèmes';

-- --------------------------------------------------------

--
-- Structure de la table `type_arroseur`
--

DROP TABLE IF EXISTS `type_arroseur`;
CREATE TABLE IF NOT EXISTS `type_arroseur`
(
  `id_type_arroseur`  int(11)      NOT NULL AUTO_INCREMENT,
  `nom_type_arroseur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_type_arroseur`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_capteur`
--

DROP TABLE IF EXISTS `type_capteur`;
CREATE TABLE IF NOT EXISTS `type_capteur`
(
  `id_type_capteur`  int(11)      NOT NULL,
  `nom_type_capteur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_capteur`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_ticket`
--

DROP TABLE IF EXISTS `type_ticket`;
CREATE TABLE IF NOT EXISTS `type_ticket`
(
  `id_type_ticket`  int(11)     NOT NULL AUTO_INCREMENT,
  `nom_type_ticket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_type_ticket`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = utf8 COMMENT ='Les types de tickets clients';

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

DROP TABLE IF EXISTS `type_utilisateur`;
CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `id_type_util` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_util` varchar(100) NOT NULL,
  PRIMARY KEY (`id_type_util`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur`
(
  `id_util` int(11) NOT NULL AUTO_INCREMENT,
  `nom_util` varchar(255) NOT NULL,
  `prenom_util` varchar(255) NOT NULL,
  `email_util` varchar(255) NOT NULL,
  `mdp_util` varchar(255) NOT NULL,
  `tel_util` varchar(255) NOT NULL,
  `type_util` int(11) DEFAULT NULL,
  `creee_a_util` datetime NOT NULL,
  PRIMARY KEY (`id_util`),
  KEY `type_util` (`type_util`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

DROP TABLE IF EXISTS `zone`;
CREATE TABLE IF NOT EXISTS `zone`
(
  `id_zone` int(11) NOT NULL AUTO_INCREMENT,
  `nom_zone` varchar(50) NOT NULL,
  `id_habit` int(11) NOT NULL,
  PRIMARY KEY (`id_zone`),
  KEY `id_habit` (`id_habit`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8 COMMENT ='Zone à pour arroseur';

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `arroseur`
--
ALTER TABLE `arroseur`
  ADD CONSTRAINT `arroseur_plante_id_plante_fk` FOREIGN KEY (`id_plante`) REFERENCES `plante` (`id_plante`),
  ADD CONSTRAINT `arroseur_type_arroseur_id_type_arroseur_fk` FOREIGN KEY (`id_type_arroseur`) REFERENCES `type_arroseur` (`id_type_arroseur`),
  ADD CONSTRAINT `arroseur_zone_id_zone_fk` FOREIGN KEY (`id_zone`) REFERENCES `zone` (`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `arroseur_mode`
--
ALTER TABLE `arroseur_mode`
  ADD CONSTRAINT `arroseur_mode_ibfk_1` FOREIGN KEY (`id_arr`) REFERENCES `arroseur` (`id_arr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `arroseur_mode_ibfk_2` FOREIGN KEY (`id_mode`) REFERENCES `mode` (`id_mode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `id_arr` FOREIGN KEY (`id_arr`) REFERENCES `arroseur` (`id_arr`),
  ADD CONSTRAINT `type_capt` FOREIGN KEY (`type_capt`) REFERENCES `type_capteur` (`id_type_capteur`);

--
-- Contraintes pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD CONSTRAINT `id_capt` FOREIGN KEY (`id_capt`) REFERENCES `capteur` (`id_capt`);

--
-- Contraintes pour la table `habitation_utilisateur`
--
ALTER TABLE `habitation_utilisateur`
  ADD CONSTRAINT `habitation_utilisateur_habitation_id_habit_fk` FOREIGN KEY (`id_habit`) REFERENCES `habitation` (`id_habit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `habitation_utilisateur_utilisateur_id_util_fk` FOREIGN KEY (`id_util`) REFERENCES `utilisateur` (`id_util`);

--
-- Contraintes pour la table `mode`
--
ALTER TABLE `mode`
  ADD CONSTRAINT `mode_ibfk_1` FOREIGN KEY (`id_mode`) REFERENCES `mode_programme` (`id_mode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mode_programme`
--
ALTER TABLE `mode_programme`
  ADD CONSTRAINT `mode_programme_ibfk_1` FOREIGN KEY (`id_prog`) REFERENCES `programme` (`id_prog`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_utilisateur_id_util_fk` FOREIGN KEY (`id_util`) REFERENCES `utilisateur` (`id_util`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_util`) REFERENCES `utilisateur` (`id_util`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`status_ticket`) REFERENCES `type_ticket` (`id_type_ticket`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_type_utilisateur_id_type_util_fk` FOREIGN KEY (`type_util`) REFERENCES `type_utilisateur` (`id_type_util`);

--
-- Contraintes pour la table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `zone_habitation_id_habit_fk` FOREIGN KEY (`id_habit`) REFERENCES `habitation` (`id_habit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
