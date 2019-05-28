-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 28 mai 2019 à 13:31
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

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
  AUTO_INCREMENT = 39
  DEFAULT CHARSET = utf8 COMMENT ='Arroseurs';

--
-- Déchargement des données de la table `arroseur`
--

INSERT INTO `arroseur` (`id_arr`, `nom_arr`, `numero_serie_arr`, `etat_arr`, `etat_fonctionnement_arr`,
                        `date_ajout_arr`, `id_zone`, `id_plante`, `id_type_arroseur`)
VALUES (17, 'Acacia', 'DOM19630', 0, 0, '2018-11-27 15:13:00', 3, 1, 2),
       (18, 'Tomates', 'DOM15236', 1, 0, '2018-12-25 22:45:49', 1, 4, 3),
       (20, 'Plante grasse', 'DOM15278', 0, 0, '2018-12-26 18:46:57', 6, 3, 5),
       (31, 'Pin', 'DOM95738', 0, 0, '2019-01-17 19:50:57', 3, 3, 3),
       (33, 'Salade', 'DOM13579', 1, 0, '2019-01-25 09:32:27', 1, 4, 1),
       (35, 'Carottes', 'DOM24681', 0, 0, '2019-01-25 09:35:25', 1, 4, 3),
       (36, 'Aubergines', 'DOM12459', 0, 0, '2019-01-25 09:39:21', 1, 4, 1),
       (38, 'Geranium', 'DOM98765', 0, 0, '2019-01-25 09:42:08', 6, 3, 3);

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
    `id_capt`     int(11) NOT NULL AUTO_INCREMENT,
    `type_capt`   int(11) NOT NULL,
    `id_arr`      int(11) NOT NULL,
    `name_capt`   varchar(30) DEFAULT NULL,
    `number_capt` int(11)     DEFAULT '1',
    PRIMARY KEY (`id_capt`),
    KEY `type_capt` (`type_capt`),
    KEY `id_arr` (`id_arr`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 71
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`id_capt`, `type_capt`, `id_arr`, `name_capt`, `number_capt`)
VALUES (21, 4, 20, NULL, 1),
       (26, 3, 18, NULL, 1),
       (30, 7, 17, NULL, 1),
       (41, 4, 33, NULL, 1),
       (43, 7, 35, NULL, 1),
       (44, 7, 38, NULL, 1),
       (45, 4, 38, NULL, 1),
       (46, 3, 20, NULL, 1),
       (47, 7, 20, NULL, 1),
       (48, 3, 31, NULL, 1),
       (49, 4, 31, NULL, 1),
       (50, 7, 31, NULL, 1),
       (52, 4, 18, NULL, 1),
       (61, 3, 33, 'Température', 1),
       (62, 7, 33, 'Présence', 1),
       (65, 7, 33, 'Présence', 2),
       (66, 7, 33, 'Présence', 3),
       (68, 3, 33, 'Température', 2),
       (69, 7, 18, 'Présence', 1),
       (70, 7, 18, 'Présence', 2);

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

--
-- Déchargement des données de la table `habitation`
--

INSERT INTO `habitation` (`id_habit`, `order_habit`, `nom_habit`, `numero_habit`, `rue_habit`, `ville_habit`,
                          `code_postal_habit`, `pays_habit`, `date_ajout_habit`)
VALUES (1, 1, 'Maison principale', 13, 'Route de la Loire', 'Mazé', '49630', 'France', '2018-09-12 10:30:00'),
       (2, 0, 'Maison secondaire', 55, 'Boulevard Foch', 'Angers', '49100', 'France', '2017-05-25 08:09:31'),
       (3, 0, 'Maison principale ', 40, 'Rue Saint Aubin', 'Angers', '49100', 'France', '2018-02-05 15:39:10'),
       (5, 0, 'Maison de vacances', 13, 'Rue des albatros', 'Pornic', '44210', 'France', '2018-11-24 11:33:00'),
       (7, 0, 'Maison 2', 6, 'Rue de paradis', 'Paris', '75010', 'France', '2018-11-24 17:02:42'),
       (8, 0, 'Maison 5', 9, 'Rue des vents', 'Paris', '75016', 'France', '2018-08-02 21:54:42'),
       (9, 0, 'Maison vacances', 55, 'Rue perdu', 'Pornic', '44250', 'France', '2018-11-24 16:21:34'),
       (10, 0, 'Maison deux', 154, 'Rue de test', 'Ville Test', '49630', 'France', '2018-11-25 04:50:43'),
       (12, 0, 'Maison test user', 96, 'rue travolta', 'Le Havre', '56000', 'France', '2018-12-04 09:43:34'),
       (13, 1, 'Maisons Paris', 25, 'Rue du moulin', 'Issy', '92130', 'France', '2019-01-07 12:23:49');

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

--
-- Déchargement des données de la table `habitation_utilisateur`
--

INSERT INTO `habitation_utilisateur` (`id_util`, `id_habit`)
VALUES (1, 5),
       (1, 1),
       (2, 7),
       (2, 9),
       (6, 13);

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

--
-- Déchargement des données de la table `plante`
--

INSERT INTO `plante` (`id_plante`, `nom_plante`, `frequence_plante`, `saison_plante`, `temps_arrosage_plante`)
VALUES (1, 'Arbres et Arbustes', '1 fois par semaine', 'Été, Printemps, Automne', '1 min'),
       (2, 'Pelouse', '1 fois par jour', 'Toutes les saisons', '25 min'),
       (3, 'Massif de fleurs', '1 fois par jour', 'Été ', '45 sec'),
       (4, 'Légume', '1 à 2 fois par semaine', 'Été, Printemps', '30 sec');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
                                           `id_prog`         int(11)      NOT NULL AUTO_INCREMENT,
                                           `nom_prog`        varchar(255) NOT NULL,
                                           `date_debut_prog` datetime     NOT NULL,
                                           `date_fin_prog`   datetime     NOT NULL,
                                           `intensite_prog`  int(3)       NOT NULL,
                                           `iteration_prog`  int(3)       NOT NULL,
                                           `id_arr`          int(11) DEFAULT NULL,
                                           PRIMARY KEY (`id_prog`),
                                           KEY `programme_arroseur_id_arr_fk` (`id_arr`)
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
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_pub`, `titre_pub`, `contenu_pub`, `fichier_pub`, `date_envoi_pub`, `id_util`)
VALUES (2, 'Averses Météo',
        '<p>Ceci est un message pour vous prévenir que la semaine prochaine, il va beaucoup pleuvoir donc modifier vos programmes pour les arroser uniquement si nécessaire</p>',
        NULL, '2019-01-18 19:41:53', 1),
       (3, 'Avis de tempête',
        '<p>Ceci est un <b>avis de tempête</b> faîtes attention à vos arroseurs extérieurs, vous pourriez avoir besoin de les ranger pour éviter de les casser</p>',
        NULL, '2019-01-18 20:09:23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
                                        `id_ticket`      int(11)      NOT NULL AUTO_INCREMENT,
                                        `titre_ticket`   varchar(255) NOT NULL,
                                        `status_ticket`  int(11)      NOT NULL DEFAULT '1',
                                        `contenu_ticket` text         NOT NULL,
                                        `fichier_ticket` varchar(255) NOT NULL,
                                        `date_ticket`    datetime     NOT NULL,
                                        `id_util`        int(11)      NOT NULL,
                                        PRIMARY KEY (`id_ticket`),
                                        KEY `id_util` (`id_util`),
                                        KEY `status_ticket` (`status_ticket`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8 COMMENT ='Gestion des tickets pour les problèmes';

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `titre_ticket`, `status_ticket`, `contenu_ticket`, `fichier_ticket`, `date_ticket`,
                      `id_util`)
VALUES (3, 'Problème arrosage potager', 1,
        'Bonjour, mon arroseur marche plus après mon retour de vacances, auriez-vous une solution pour me dépanner ? Cordialement ',
        '  ', '2019-01-04 00:53:31', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type`
(
    `id_type`  int(11)      NOT NULL,
    `nom_type` varchar(255) NOT NULL,
    PRIMARY KEY (`id_type`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `nom_type`)
VALUES (3, 'Temperature'),
       (4, 'Humidite'),
       (7, 'Presence');

-- --------------------------------------------------------

--
-- Structure de la table `type_arroseur`
--

DROP TABLE IF EXISTS `type_arroseur`;
CREATE TABLE IF NOT EXISTS `type_arroseur`
(
    `id_type_arroseur` int(11)     NOT NULL AUTO_INCREMENT,
  `nom_type_arroseur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_type_arroseur`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `type_arroseur`
--

INSERT INTO `type_arroseur` (`id_type_arroseur`, `nom_type_arroseur`)
VALUES (1, 'Arroseur multi-surface'),
       (2, 'Arroseur grande surface'),
       (3, 'Aspergeur classique'),
       (4, 'Arroseur compte goutte d\'extérieur'),
       (5, 'Arroseur compte goutte d\'intérieur');

-- --------------------------------------------------------

--
-- Structure de la table `type_capteur`
--

DROP TABLE IF EXISTS `type_capteur`;
CREATE TABLE IF NOT EXISTS `type_capteur`
(
    `id_type_capteur` int(11)     NOT NULL,
  `nom_type_capteur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_capteur`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `type_capteur`
--

INSERT INTO `type_capteur` (`id_type_capteur`, `nom_type_capteur`)
VALUES (3, 'température'),
       (4, 'humidité'),
       (7, 'présence');

-- --------------------------------------------------------

--
-- Structure de la table `type_ticket`
--

DROP TABLE IF EXISTS `type_ticket`;
CREATE TABLE IF NOT EXISTS `type_ticket`
(
    `id_type_ticket` int(11)    NOT NULL AUTO_INCREMENT,
  `nom_type_ticket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_type_ticket`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = utf8 COMMENT ='Les types de tickets clients';

--
-- Déchargement des données de la table `type_ticket`
--

INSERT INTO `type_ticket` (`id_type_ticket`, `nom_type_ticket`)
VALUES (1, 'Initialisé'),
       (2, 'Validé'),
       (3, 'En cours'),
       (4, 'Finalisé');

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

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`id_type_util`, `user_type_util`)
VALUES (1, 'Utilisateur'),
       (2, 'Technicien'),
       (3, 'Commercial'),
       (4, 'Mairie');

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
  AUTO_INCREMENT = 13
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_util`, `nom_util`, `prenom_util`, `email_util`, `mdp_util`, `tel_util`, `type_util`,
                           `creee_a_util`)
VALUES (1, 'Grignon', 'Bastien', 'bastien@isep.fr', '$2y$10$u16FmRJH1pdLSxte9SOsZOEw69/xsAnK3nR6ZhSDx4IfUP8fjQC..',
        '0751247989', 1, '2018-12-03 11:38:08'),
       (2, 'Dupond', 'Jean', 'jean.dupond@gmail.com', '$2y$10$BdTk5xkQqnrJ7Mh8RgMeueAouJ88zg6Wi2LPSwOmE8vpz.pDIl4q6',
        '0123456789', 1, '2018-12-03 16:54:34'),
       (3, 'Jean ', 'Dupont', 'jeandupont@gmail.com', '$2y$10$V/3QdHQrJ7lAKTHeEFr02O6fLJbnV91VbtSX9QRQ.PFAm7XlONwoy',
        '0123456789', 3, '2018-12-10 01:44:48'),
       (4, 'Smith', 'Martin', 'martinsmith@gmail.com', '$2y$10$QLyt2CHmWDBICNAaHp4LJeJOgLc1JaGKQumuxk9rjn.SHzVYKoqg2',
        '0123456789', 2, '2018-12-10 01:54:33'),
       (5, 'Dupond', 'Bastien', 'bastien.dupond@gmail.com',
        '$2y$10$Rgi.0HzxU8SO2rsFLIzVKeaVP0fiORHyXzDBegTJdyfubc2HTQKt.', '0123456987', 1, '2019-01-04 22:43:24'),
       (6, 'grignon', 'bastien', 'b@gmail.com', '$2y$10$awbNV0ehTIZLLsJutTr4qufl04YUg7dv4mxFHkaUiyCEtaL6L914W',
        '0278965423', 1, '2019-01-07 11:44:31'),
       (7, 'ballat', 'jean-michel', 'ballat@gmail.com', '$2y$10$MYVvBWhPiWMzmvKsh95SB.rfmvyJ/QuY2jIDRv9Ac4LK/SWQLDXzy',
        '0241808182', 1, '2019-01-23 21:07:09'),
       (8, 'Commercial', 'Jean', 'commercial@gmail.com', '$2y$10$meI8RFiwnvXjRxVjMDybauGhs2AdqpfRdE1MyxE/RxzjNjQq3FVPu',
        '0241424344', 3, '2019-01-25 09:03:53'),
       (9, 'Mairie', 'Jean', 'mairie@gmail.com', '$2y$10$m620oLtbz8mxQ3cm8GgMtOHhGzOkolXj7KzG6HoO2YfHlCT2kH0oK',
        '0241434547', 4, '2019-01-25 09:04:56'),
       (10, 'Technicien', 'Jean', 'technicien@gmail.com',
        '$2y$10$gXg3exaJFgVT36a5TlXahOf61/BJXFm7py9Qon4KCo3Ni9MmcnZae', '0242444648', 2, '2019-01-25 09:09:04'),
       (11, 'coucou', 'coin', 'coucou@gmail.com', '$2y$10$fEYbRwQ7iOLytlLaJRZXCOGu0Na6hzR5ttVArO/2vF3z.lJQXEw6u',
        '0123654789', 1, '2019-01-25 14:32:38'),
       (12, 'Jb', 'Legay', 'jb@legay.fr', '$2y$10$xJuFHH3kvsORyVAioNBs3eKVj7Mkf6kXTgcNRWPRZbv2jxfHk.mfC', '0174839137',
        1, '2019-02-05 19:20:44');

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
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`id_zone`, `nom_zone`, `id_habit`)
VALUES (1, 'Potager', 1),
       (3, 'Jardin', 5),
       (6, 'Massif ', 1);

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
    ADD CONSTRAINT `id_arr` FOREIGN KEY (`id_arr`) REFERENCES `arroseur` (`id_arr`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Contraintes pour la table `programme`
--
ALTER TABLE `programme`
    ADD CONSTRAINT `programme_arroseur_id_arr_fk` FOREIGN KEY (`id_arr`) REFERENCES `arroseur` (`id_arr`) ON DELETE CASCADE ON UPDATE CASCADE;

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
