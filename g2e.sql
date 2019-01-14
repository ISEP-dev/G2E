-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 14 jan. 2019 à 10:10
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

-- --------------------------------------------------------

--
-- Structure de la table `arroseur`
--

DROP TABLE IF EXISTS `arroseur`;
CREATE TABLE IF NOT EXISTS `arroseur`(
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
                                       KEY `id_zone` (`id_zone`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 13
  DEFAULT CHARSET = utf8 COMMENT ='Arroseurs';

--
-- Déchargement des données de la table `arroseur`
--

INSERT INTO `arroseur` (`id_arr`, `nom_arr`, `numero_serie_arr`, `etat_arr`, `etat_fonctionnement_arr`,
                        `date_ajout_arr`, `id_zone`, `id_plante`, `id_type_arroseur`)
VALUES (1, 'Poirier', 'DOM14250', 1, 0, '2018-11-25 17:05:00', 1, 1, 4),
       (3, 'Noyer', 'DOM15240', 1, 0, '2018-11-21 08:44:00', 0, 1, 1),
       (4, 'Cerisier', 'DOM15245', 1, 1, '2018-11-15 13:17:10', 1, 1, 1),
       (5, 'Acacia', 'DOM19630', 0, 0, '2018-11-27 15:13:00', 3, 1, 2),
       (6, 'Cocotier', 'DOM14258', 0, 2, '2018-11-27 11:10:00', 2, 1, 1),
       (7, 'Serre', 'DOM15295', 1, 2, '2018-09-25 08:35:08', 0, 2, 2),
       (8, 'Tomates', 'DOM15236', 1, 0, '2018-12-25 22:45:49', 1, 4, 3),
       (9, 'Aubergines', 'DOM15237', 0, 0, '2018-12-25 22:46:29', 2, 4, 3),
       (10, 'Plante grasse', 'DOM15278', 0, 0, '2018-12-26 18:46:57', 4, 3, 5),
       (11, 'tomates', 'DOM12555', 1, 0, '2019-01-06 13:27:24', 4, 4, 4),
       (12, 'Potarroseur', 'DOM11111', 0, 0, '2019-01-11 11:02:13', 1, 3, 4);

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
CREATE TABLE IF NOT EXISTS `capteur` (
  `id_capt` int(11) NOT NULL AUTO_INCREMENT,
  `numero_serie_capt` varchar(255) NOT NULL,
  `nom_capt` varchar(255) NOT NULL,
  `type_capt` int(11) NOT NULL,
  `valeur_capt` int(5) NOT NULL,
  `id_arr` int(11) NOT NULL,
  PRIMARY KEY (`id_capt`),
  KEY `id_arr` (`id_arr`),
  KEY `type_capt` (`type_capt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
CREATE TABLE IF NOT EXISTS `habitation`(
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

INSERT INTO `habitation` (`id_habit`, `order_habit`, `nom_habit`, `numero_habit`, `rue_habit`, `ville_habit`, `code_postal_habit`, `pays_habit`, `date_ajout_habit`) VALUES
(1, 1, 'Maison principale', 25, 'Rue de vanves', 'Paris', '75000', 'France', '2018-09-12 10:30:00'),
(2, 0, 'Maison secondaire', 55, 'Boulevard Foch', 'Angers', '49100', 'France', '2017-05-25 08:09:31'),
(3, 0, 'Maison principale ', 40, 'Rue Saint Aubin', 'Angers', '49100', 'France', '2018-02-05 15:39:10'),
(5, 0, 'Maison de vacances', 13, 'Boulevard Raspail', 'Paris', '75000', 'France', '2018-11-24 11:33:00'),
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

INSERT INTO `habitation_utilisateur` (`id_util`, `id_habit`) VALUES
                                                               (1, 5),
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

INSERT INTO `plante` (`id_plante`, `nom_plante`, `frequence_plante`, `saison_plante`, `temps_arrosage_plante`) VALUES
(1, 'Arbres et Arbustes', '1 fois par semaine', 'Été, Printemps, Automne', '1 min'),
(2, 'Pelouse', '1 fois par jour', 'Toutes les saisons', '25 min'),
(3, 'Massif de fleurs', '1 fois par jour', 'Été ', '45 sec'),
(4, 'Légume', '1 à 2 fois par semaine', 'Été, Printemps', '30 sec');

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
  `id_pub` int(11) NOT NULL AUTO_INCREMENT,
  `titre_pub` varchar(255) NOT NULL,
  `contenu_pub` text NOT NULL,
  `fichier_pub` varchar(255) NOT NULL,
  `date_envoi_pub` datetime NOT NULL,
  `id_util` int(11) NOT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `id_util` (`id_util`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `numero_ticket` varchar(10) NOT NULL,
  `titre_ticket` varchar(255) NOT NULL,
  `contenu_ticket` text NOT NULL,
  `fichier_ticket` varchar(255) NOT NULL,
  `date_ticket` datetime NOT NULL,
  `id_util` int(11) NOT NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `id_util` (`id_util`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Gestion des tickets pour les problèmes';

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `numero_ticket`, `titre_ticket`, `contenu_ticket`, `fichier_ticket`, `date_ticket`, `id_util`) VALUES
(1, '1', 'Problème arrosage plante salon', 'Bonjour, blablabla mon arroseur marche pas c\'est pas super ... et puis voilà [...] tout vas bien', '/chemin/fichier', '2019-01-04 00:53:31', 1),
(2, '2', 'Seere en panne 5 arroseurs', 'Tous mes arroseurs dans ma serre sont en pannes', '/chemin/fichier/joint', '2019-01-04 20:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL,
  `nom_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `nom_type`) VALUES
(3, 'Temperature'),
(4, 'Humidite'),
(7, 'Presence');

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

--
-- Déchargement des données de la table `type_arroseur`
--

INSERT INTO `type_arroseur` (`id_type_arroseur`, `nom_type_arroseur`)
VALUES (1, 'Arroseur multi-surface'),
       (2, 'Arroseur grande surface'),
       (3, 'Aspregeur classique'),
       (4, 'Arroseur compte goutte d\'extérieur'),
       (5, 'Arroseur compte goutte d\'intérieur');

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

INSERT INTO `type_utilisateur` (`id_type_util`, `user_type_util`) VALUES
(1, 'Utilisateur'),
(2, 'Technicien'),
(3, 'Commercial'),
(4, 'Mairie');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur`(
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

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_util`, `nom_util`, `prenom_util`, `email_util`, `mdp_util`, `tel_util`, `type_util`, `creee_a_util`) VALUES
(1, 'Grignon', 'Bastien', 'bastien@isep.fr', '$2y$10$u16FmRJH1pdLSxte9SOsZOEw69/xsAnK3nR6ZhSDx4IfUP8fjQC..', '0751247989', 1, '2018-12-03 11:38:08'),
(2, 'Dupond', 'Jean', 'jean.dupond@gmail.com', '$2y$10$BdTk5xkQqnrJ7Mh8RgMeueAouJ88zg6Wi2LPSwOmE8vpz.pDIl4q6', '0123456789', 1, '2018-12-03 16:54:34'),
(3, 'Jean ', 'Dupont', 'jeandupont@gmail.com', '$2y$10$V/3QdHQrJ7lAKTHeEFr02O6fLJbnV91VbtSX9QRQ.PFAm7XlONwoy', '0123456789', 3, '2018-12-10 01:44:48'),
(4, 'Smith', 'Martin', 'martinsmith@gmail.com', '$2y$10$QLyt2CHmWDBICNAaHp4LJeJOgLc1JaGKQumuxk9rjn.SHzVYKoqg2', '0123456789', 2, '2018-12-10 01:54:33'),
(5, 'Dupond', 'Bastien', 'bastien.dupond@gmail.com', '$2y$10$Rgi.0HzxU8SO2rsFLIzVKeaVP0fiORHyXzDBegTJdyfubc2HTQKt.',
 '0123456987', 1, '2019-01-04 22:43:24'),
(6, 'grignon', 'bastien', 'b@gmail.com', '$2y$10$awbNV0ehTIZLLsJutTr4qufl04YUg7dv4mxFHkaUiyCEtaL6L914W', '0278965423',
 1, '2019-01-07 11:44:31');

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

DROP TABLE IF EXISTS `zone`;
CREATE TABLE IF NOT EXISTS `zone` (
  `id_zone` int(11) NOT NULL AUTO_INCREMENT,
  `nom_zone` varchar(50) NOT NULL,
  `id_habit` int(11) NOT NULL,
  PRIMARY KEY (`id_zone`),
  KEY `id_habit` (`id_habit`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Zone à pour arroseur';

--
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`id_zone`, `nom_zone`, `id_habit`) VALUES
(1, 'Potager', 1),
(2, 'Serre', 1),
(3, 'Salon', 5),
(4, 'Salon', 1),
(5, 'Jardin', 5);

--
-- Contraintes pour les tables déchargées
--

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
  ADD CONSTRAINT `type_capt` FOREIGN KEY (`type_capt`) REFERENCES `type` (`id_type`);

--
-- Contraintes pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD CONSTRAINT `id_capt` FOREIGN KEY (`id_capt`) REFERENCES `capteur` (`id_capt`);

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
  ADD CONSTRAINT `id_util` FOREIGN KEY (`id_util`) REFERENCES `utilisateur` (`id_util`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_util`) REFERENCES `utilisateur` (`id_util`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`type_util`) REFERENCES `type_utilisateur` (`id_type_util`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `zone_ibfk_1` FOREIGN KEY (`id_habit`) REFERENCES `habitation` (`id_habit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
