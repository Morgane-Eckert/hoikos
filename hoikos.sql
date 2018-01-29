-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 29 jan. 2018 à 15:41
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hoikos`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces_utilisateur_secondaire`
--

DROP TABLE IF EXISTS `acces_utilisateur_secondaire`;
CREATE TABLE IF NOT EXISTS `acces_utilisateur_secondaire` (
  `ID_acces_utilisateur_secondaire` int(11) NOT NULL AUTO_INCREMENT,
  `ID_utilisateur` int(11) NOT NULL,
  `ID_salle` int(11) NOT NULL,
  PRIMARY KEY (`ID_acces_utilisateur_secondaire`),
  KEY `cle_etrangere_utilisateur_acces` (`ID_utilisateur`),
  KEY `cle_etrangere_salle_acces` (`ID_salle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `actionneur`
--

DROP TABLE IF EXISTS `actionneur`;
CREATE TABLE IF NOT EXISTS `actionneur` (
  `ID_actionneur` int(11) NOT NULL AUTO_INCREMENT,
  `ID_cemac` int(11) NOT NULL,
  `ID_type_actionneur` int(11) NOT NULL,
  `nom_actionneur` varchar(20) NOT NULL,
  `date_d_ajout_actionneur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_actionneur`),
  KEY `cle_etrangere_cemac_actionneur` (`ID_cemac`),
  KEY `cle_etrangere_type_actionneur_actionneur` (`ID_type_actionneur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `ID_administration` int(11) NOT NULL AUTO_INCREMENT,
  `conditions_generales` text,
  `mentions_legales` text,
  `slogan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_administration`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`ID_administration`, `conditions_generales`, `mentions_legales`, `slogan`) VALUES
(2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu dui vivamus arcu felis bibendum ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. Ligula ullamcorper malesuada proin libero nunc consequat interdum. Pellentesque elit eget gravida cum sociis natoque. Vel pharetra vel turpis nunc eget lorem dolor. Amet mattis vulputate enim nulla aliquet. Purus viverra accumsan in nisl nisi scelerisque eu ultrices. Praesent elementum facilisis leo vel fringilla est. Vestibulum lorem sed risus ultricies tristique. Auctor augue mauris augue neque gravida in fermentum et. Pretium quam vulputate dignissim suspendisse in est ante in.\r\nEgestas purus viverra accumsan in. Curabitur vitae nunc sed velit dignissim sodales. Malesuada fames ac turpis egestas maecenas pharetra convallis. Enim eu turpis egestas pretium aenean pharetra. Quam quisque id diam vel quam elementum. Urna et pharetra pharetra massa massa ultricies mi quis. Interdum velit laoreet id donec ultrices tincidunt arcu non. Nullam ac tortor vitae purus faucibus ornare suspendisse sed. Vestibulum lorem sed risus ultricies tristique nulla aliquet enim. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. Justo laoreet sit amet cursus sit amet dictum. Vulputate dignissim suspendisse in est ante in. Arcu ac tortor dignissim convallis aenean et tortor at. Porttitor leo a diam sollicitudin tempor id.<p>\r\n<p>Commodo elit at imperdiet dui accumsan sit. Nulla facilisi nullam vehicula ipsum a arcu cursus. Odio ut enim blandit volutpat. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Libero enim sed faucibus turpis in. Purus in mollis nunc sed id semper. Rhoncus mattis rhoncus urna neque viverra justo. In cursus turpis massa tincidunt dui ut ornare lectus sit. Amet volutpat consequat mauris nunc. Bibendum arcu vitae elementum curabitur. Amet cursus sit amet dictum sit amet. Rutrum tellus pellentesque eu tincidunt tortor aliquam. Sed vulputate odio ut enim. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Sit amet est placerat in egestas erat imperdiet sed euismod. Nibh ipsum consequat nisl vel pretium lectus quam. Eu volutpat odio facilisis mauris sit. Odio aenean sed adipiscing diam donec adipiscing tristique risus nec. Ut placerat orci nulla pellentesque dignissim enim. Ut tellus elementum sagittis vitae et leo duis ut.<p>\r\n<p>Quis varius quam quisque id diam vel. Bibendum est ultricies integer quis auctor elit sed. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Pellentesque dignissim enim sit amet venenatis urna cursus. Porttitor lacus luctus accumsan tortor posuere. Sit amet consectetur adipiscing elit. In mollis nunc sed id semper. Orci eu lobortis elementum nibh tellus molestie. Sed sed risus pretium quam vulputate dignissim suspendisse in. Faucibus scelerisque eleifend donec pretium vulputate sapien. Nam aliquam sem et tortor consequat. Tempor orci dapibus ultrices in iaculis nunc sed augue lacus.<p>\r\n<p>Nulla at volutpat diam ut venenatis. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus a. Est placerat in egestas erat imperdiet sed euismod nisi. Aliquet lectus proin nibh nisl condimentum id venenatis a condimentum. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Id semper risus in hendrerit gravida rutrum quisque non. Vestibulum morbi blandit cursus risus at ultrices mi tempus. Vitae ultricies leo integer malesuada nunc vel risus commodo. Quis imperdiet massa tincidunt nunc pulvinar sapien et. A cras semper auctor neque vitae tempus. Senectus et netus et malesuada fames ac turpis egestas integer. Donec enim diam vulputate ut pharetra sit amet. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl. Nibh praesent tristique magna sit amet. Arcu non odio euismod lacinia at quis risus sed. Velit aliquet sagittis id consectetur. Montes nascetur ridiculus mus mauris vitae ultricies. Nibh venenatis cras sed felis eget velit aliquet sagittis.<p>', '<div>\r\n<strong>Nom de la société : </strong>Hoikos<br/><br/>\r\n\r\n<strong>Adresse : </strong>10, rue de Vanves 92170 Issy-les-Moulineaux<br/><br/>\r\n\r\n<strong>Au Capital de :</strong> 0 €<br/><br/>\r\n\r\n<strong>Adresse de courrier électronique : </strong>hoikos@gmail.com<br/><br/>\r\n<strong>Le Créateur du site est : </strong>Groupe 4C<br/><br/>\r\n<strong>Le Responsable de la publication est :</strong> Groupe 4C<br/><br/>\r\n<strong>Le Webmaster est  : </strong>Groupe 4C<br/><br/>\r\n\r\n<strong>Contactez le Webmaster : </strong>hoikos@gmail.com<br/><br/>\r\n<strong>L’hébergeur du site est : </strong>ISEP - 75006 PARIS</div>', 'Pour que la maison idéale soit votre maison de demain !');

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `ID_capteur` int(11) NOT NULL AUTO_INCREMENT,
  `ID_logement` int(11) DEFAULT NULL,
  `ID_cemac` int(11) DEFAULT NULL,
  `ID_type_de_capteur` int(11) DEFAULT NULL,
  `nom_salle` varchar(300) NOT NULL,
  `nom_capteur` varchar(20) NOT NULL,
  `date_d_ajout_capteur` date DEFAULT NULL,
  `etat_capteur` tinyint(4) DEFAULT '1',
  `donnee_envoyee_capteur` varchar(50) DEFAULT NULL,
  `donnee_recue_capteur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_capteur`),
  KEY `cle_etrangere_cemac_capteur` (`ID_cemac`),
  KEY `cle_etrangere_type_capteur_capteur` (`ID_type_de_capteur`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`ID_capteur`, `ID_logement`, `ID_cemac`, `ID_type_de_capteur`, `nom_salle`, `nom_capteur`, `date_d_ajout_capteur`, `etat_capteur`, `donnee_envoyee_capteur`, `donnee_recue_capteur`) VALUES
(1, NULL, NULL, NULL, '', 'température', '2018-01-05', NULL, NULL, NULL),
(2, NULL, NULL, NULL, '', 'climatisation', '2018-01-05', NULL, NULL, NULL),
(3, 63, NULL, NULL, '', 'humidité', '2018-01-05', NULL, NULL, NULL),
(4, 63, NULL, NULL, '', 'climatisation', '2018-01-05', NULL, NULL, NULL),
(5, 66, NULL, NULL, '', 'climatisation', '2018-01-05', NULL, NULL, NULL),
(6, 63, NULL, NULL, '', 'mvc', '2018-01-05', NULL, NULL, NULL),
(7, 63, NULL, NULL, '', 'climatisation', '2018-01-05', NULL, NULL, NULL),
(8, 63, NULL, NULL, '', 'humidité', '2018-01-08', NULL, NULL, NULL),
(9, 63, NULL, NULL, '', 'humidité', '2018-01-08', NULL, NULL, NULL),
(10, 63, NULL, NULL, '', 'climatisation', '2018-01-08', NULL, NULL, NULL),
(11, 63, NULL, NULL, 'Salon', 'volets', '2018-01-10', NULL, NULL, NULL),
(12, 63, NULL, NULL, 'CUISINE', 'volets', '2018-01-10', NULL, NULL, NULL),
(13, 63, NULL, NULL, 'home', 'climatisation', '2018-01-10', NULL, NULL, NULL),
(14, 70, NULL, NULL, 'home', 'Température', '2018-01-10', NULL, NULL, NULL),
(15, 70, NULL, NULL, 'home', 'volets', '2018-01-10', NULL, NULL, NULL),
(16, 70, NULL, NULL, 'Chambre d\'Ilan', 'Climatisation', '2018-01-10', NULL, NULL, NULL),
(17, 72, NULL, NULL, 'chambre', 'Température', '2018-01-10', NULL, NULL, NULL),
(18, 72, NULL, 1, 'chambre', 'volets', '2018-01-10', NULL, NULL, NULL),
(19, 72, NULL, 6, 'chambre', 'volets', '2018-01-10', NULL, NULL, NULL),
(20, 72, NULL, 6, 'chambre', 'volets', '2018-01-10', NULL, NULL, NULL),
(21, 72, NULL, 1, 'Chambre d\'Ilan', 'Distance', '2018-01-10', NULL, NULL, NULL),
(22, 72, NULL, 1, 'Chambre d\'Ilan', 'Distance', '2018-01-10', NULL, NULL, NULL),
(23, 67, NULL, 1, 'Cuisine', 'Distance', '2018-01-10', NULL, NULL, NULL),
(24, 74, NULL, 1, 'Chambre d\'Ilan', 'Distance', '2018-01-10', NULL, NULL, NULL),
(25, 74, NULL, 2, 'Chambre d\'Ilan', 'Température', '2018-01-10', NULL, '22', NULL),
(26, 74, NULL, 3, 'Chambre d\'Ilan', 'Humidité', '2018-01-10', NULL, NULL, NULL),
(27, 74, NULL, 4, 'Chambre d\'Ilan', 'Lumière', '2018-01-10', NULL, NULL, NULL),
(28, 74, NULL, 6, 'Chambre de Marie', 'Volets', '2018-01-10', NULL, NULL, NULL),
(29, 74, NULL, 6, 'Salon', 'Volets', '2018-01-10', NULL, NULL, NULL),
(30, 74, NULL, 3, 'Chambre de Marie', 'Humidité', '2018-01-10', NULL, NULL, NULL),
(31, 74, NULL, 6, 'Chambre d\'Ilan', 'Volets', '2018-01-11', NULL, NULL, NULL),
(32, 74, NULL, 6, 'Chambre d\'Ilan', 'Volets', '2018-01-11', NULL, NULL, NULL),
(33, 76, NULL, 1, 'Chambre des jumeaux', 'Distance', '2018-01-12', NULL, NULL, NULL),
(34, 76, NULL, 3, 'Suite Parentale', 'Humidité', '2018-01-12', NULL, NULL, NULL),
(35, 76, NULL, 6, 'Suite Parentale', 'Volets', '2018-01-12', NULL, NULL, NULL),
(36, 76, NULL, 6, 'Chambre des jumeaux', 'Volets', '2018-01-12', NULL, NULL, NULL),
(37, 76, NULL, 3, 'Hamam', 'Humidité', '2018-01-12', NULL, NULL, NULL),
(38, 76, NULL, 4, 'Chambre des jumeaux', 'Lumière', '2018-01-12', NULL, NULL, NULL),
(39, 76, NULL, 4, 'Chambre des jumeaux', 'Lumière', '2018-01-12', NULL, NULL, NULL),
(40, 76, NULL, 2, 'Hamam', 'Température', '2018-01-12', NULL, NULL, NULL),
(41, 63, NULL, 2, 'Salon', 'Température', '2018-01-15', NULL, '27', NULL),
(42, 63, NULL, 1, 'Salon', 'Distance', '2018-01-15', NULL, NULL, NULL),
(43, 63, NULL, 2, 'Salon', 'Température', '2018-01-15', NULL, '27', NULL),
(44, 63, NULL, 2, 'Salon', 'Température', '2018-01-15', NULL, '27', NULL),
(45, 78, NULL, 2, 'Chambre', 'Température', '2018-01-15', NULL, '26', NULL),
(46, 78, NULL, 2, 'Chambre', 'Température', '2018-01-15', NULL, '26', NULL),
(47, 81, NULL, 1, 'Chambre', 'Distance', '2018-01-15', NULL, NULL, NULL),
(48, 81, 1, 2, 'Chambre', 'Température', '2018-01-15', NULL, NULL, NULL),
(49, 81, 1, 3, 'Salon', 'Humidité', '2018-01-15', NULL, NULL, NULL),
(50, 81, 1, 4, 'Salon', 'Lumière', '2018-01-15', NULL, NULL, NULL),
(51, 81, 1, 1, 'Cuisine', 'Distance', '2018-01-15', NULL, NULL, NULL),
(52, 81, 1, 2, 'Cuisine', 'Température', '2018-01-15', NULL, NULL, NULL),
(53, 82, 2, 1, 'Chambre', 'Distance', '2018-01-16', NULL, NULL, NULL),
(54, 83, 3, 2, 'Salon', 'Température', '2018-01-16', NULL, NULL, NULL),
(55, 83, 3, 3, 'Salon', 'Humidité', '2018-01-16', NULL, NULL, NULL),
(137, 87, 10, 3, 'Salle de bain', 'Humidité', '2018-01-19', NULL, '50', NULL),
(138, 87, 10, 3, 'Salle de bain', 'Humidité', '2018-01-19', NULL, NULL, NULL),
(139, 87, 10, 1, 'Salle de bain', 'Fumée', '2018-01-19', NULL, NULL, NULL),
(140, 87, 10, 1, 'Salle à manger', 'Fumée', '2018-01-19', NULL, NULL, NULL),
(198, 90, 9, 11, 'Chambre de Nico', 'Electricité', '2018-01-23', 2, NULL, ''),
(199, 90, 9, 3, 'Chambre de Nico', 'Humidité', '2018-01-23', 1, '22', '22'),
(200, 90, 9, 1, 'Salle de torture', 'Présence', '2018-01-23', 1, 'OFF', 'ON'),
(207, 84, 4, 3, 'Cuisine', 'Humidité', '2018-01-24', 1, '20', '21'),
(208, 84, 4, 3, 'Salon', 'Humidité', '2018-01-24', 1, '20', '23'),
(216, 84, 4, 4, 'Chambre de Tristan', 'Température', '2018-01-24', 1, '26', '22'),
(217, 84, 4, 1, 'Chambre de Damien', 'Présence', '2018-01-24', 2, NULL, 'ON'),
(218, 84, 4, 5, 'Cuisine', 'Lumière', '2018-01-24', 1, NULL, 'Allumé'),
(219, 84, 4, 1, 'Salon', 'Présence', '2018-01-24', 1, NULL, 'ON'),
(221, 84, 4, 4, 'Salon', 'Température', '2018-01-24', 1, '26', '21'),
(222, 84, 4, 8, 'Salon', 'Caméra', '2018-01-24', 1, NULL, 'ON'),
(223, 84, 4, 7, 'Salon', 'Mouvement', '2018-01-24', 1, NULL, 'ON'),
(224, 84, 4, 11, 'Salon', 'Electricité', '2018-01-24', 1, NULL, '327'),
(225, 84, 4, 5, 'Salon', 'Lumière', '2018-01-24', 1, NULL, 'Allumé'),
(226, 84, 4, 7, 'Chambre de Tristan', 'Mouvement', '2018-01-24', 1, NULL, 'OFF'),
(227, 84, 4, 8, 'Cuisine', 'Caméra', '2018-01-24', 1, NULL, 'OFF'),
(228, 84, 4, 13, 'Chambre de Tristan', 'Climatisation', '2018-01-24', 1, NULL, 'OFF'),
(237, 96, 20, 4, 'Salon', 'Température', '2018-01-25', 1, '28', '25'),
(238, 96, 20, 4, 'Salon', 'Température', '2018-01-25', 1, '28', '24'),
(241, 96, 20, 5, 'Salle de bain', 'Lumière', '2018-01-25', 1, NULL, 'Allumé'),
(242, 96, 20, 7, 'Salle de bain', 'Mouvement', '2018-01-25', 1, NULL, 'ON'),
(243, 96, 20, 3, 'Salon', 'Humidité', '2018-01-25', 1, NULL, '30'),
(244, 96, 20, 5, 'Salon', 'Lumière', '2018-01-25', 1, NULL, 'Eteint'),
(245, 96, 20, 11, 'Chambre d\'Estelle', 'Electricité', '2018-01-25', 1, NULL, NULL),
(246, 96, 20, 12, 'Chambre d\'Estelle', 'Eau', '2018-01-25', 1, NULL, NULL),
(247, 97, 22, 1, 'Chambre', 'Présence', '2018-01-26', 1, NULL, NULL),
(248, 86, 8, 5, 'Chambre', 'Lumière', '2018-01-26', 1, NULL, 'Eteint'),
(249, 106, 33, 4, 'Salon', 'Température', '2018-01-26', 1, '26', NULL),
(250, 106, 33, 3, 'Salon', 'Humidité', '2018-01-26', 1, '62', NULL),
(251, 106, 33, 8, 'Salon', 'Caméra', '2018-01-26', 1, 'OFF', NULL),
(257, 109, 24, 11, 'Chambre', 'Electricité', '2018-01-27', 1, 'OFF', NULL),
(258, 109, 24, 8, 'Chambre', 'Caméra', '2018-01-27', 1, 'ON', NULL),
(259, 109, 24, 9, 'Chambre', 'Fumée', '2018-01-27', 1, 'ON', NULL),
(272, 114, 37, 1, 'Chambre', 'Présence', '2018-01-28', 1, NULL, NULL),
(279, 107, 34, 3, 'Salon', 'Humidité', '2018-01-29', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

DROP TABLE IF EXISTS `cemac`;
CREATE TABLE IF NOT EXISTS `cemac` (
  `ID_cemac` int(11) NOT NULL AUTO_INCREMENT,
  `ID_salle` int(11) DEFAULT NULL,
  `ID_logement` int(11) DEFAULT NULL,
  `etat_cemac` int(1) DEFAULT '2',
  `numero_de_cemac` varchar(5) NOT NULL,
  PRIMARY KEY (`ID_cemac`),
  KEY `cle_etrangere_nom_salle_cemac` (`ID_salle`),
  KEY `cle_etrangere_logement_cemac` (`ID_logement`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cemac`
--

INSERT INTO `cemac` (`ID_cemac`, `ID_salle`, `ID_logement`, `etat_cemac`, `numero_de_cemac`) VALUES
(1, NULL, 81, NULL, 'E3939'),
(2, NULL, 82, 0, 'E4949'),
(3, NULL, 83, 0, 'E5959'),
(4, NULL, 84, 0, 'E7979'),
(5, NULL, 94, NULL, 'E9999'),
(6, NULL, 85, NULL, 'E0000'),
(7, NULL, 84, NULL, 'E0001'),
(8, NULL, 86, NULL, 'E0002'),
(9, NULL, 90, NULL, 'E0003'),
(10, NULL, 87, NULL, 'E2929'),
(11, NULL, 89, NULL, '3'),
(12, NULL, 90, NULL, 'E0010'),
(13, NULL, 91, NULL, 'E0011'),
(14, NULL, 92, NULL, 'E3333'),
(15, NULL, 93, NULL, 'E4455'),
(16, NULL, 93, NULL, 'E1111'),
(17, NULL, 94, NULL, 'E9999'),
(18, NULL, 84, NULL, 'E4A6B'),
(19, NULL, 95, 1, 'AAAAA'),
(20, NULL, 96, NULL, 'A5R47'),
(21, NULL, 98, 1, 'A0001'),
(22, NULL, 97, NULL, 'A0002'),
(23, NULL, 108, NULL, 'E3300'),
(24, NULL, 109, NULL, 'R4455'),
(25, NULL, 108, NULL, 'E4440'),
(26, NULL, 101, 2, 'EA224'),
(27, NULL, 104, 1, 'E444R'),
(28, NULL, 103, 1, 'E4RRR'),
(29, NULL, 102, 2, 'IIIII'),
(30, NULL, 112, 2, 'ZZZZZ'),
(31, NULL, 113, 2, 'ZZZZ1'),
(32, NULL, 105, 1, '12345'),
(33, NULL, 106, 1, '13579'),
(34, NULL, 107, 2, 'AZERT'),
(35, NULL, 113, 2, 'AERTY'),
(36, NULL, 111, 2, 'FFFFF'),
(37, NULL, 114, 2, 'WXCVB'),
(38, NULL, 114, 1, 'WXCVN'),
(39, NULL, 107, 1, 'ASZDR');

-- --------------------------------------------------------

--
-- Structure de la table `conditions_generales_d_utilisation`
--

DROP TABLE IF EXISTS `conditions_generales_d_utilisation`;
CREATE TABLE IF NOT EXISTS `conditions_generales_d_utilisation` (
  `ID_conditions` int(11) NOT NULL AUTO_INCREMENT,
  `conditions_generales` text NOT NULL,
  `mentions_legales` int(11) NOT NULL,
  PRIMARY KEY (`ID_conditions`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_capteur`
--

DROP TABLE IF EXISTS `donnees_capteur`;
CREATE TABLE IF NOT EXISTS `donnees_capteur` (
  `ID_donnee` int(11) NOT NULL AUTO_INCREMENT,
  `ID_capteur` int(11) NOT NULL,
  `donnee_envoyee_donnees` varchar(50) NOT NULL,
  `donnee_recue_donnees` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_donnee`),
  KEY `cle_etrangere_capteur_donnees` (`ID_capteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `ID_faq` int(11) NOT NULL AUTO_INCREMENT,
  `question_faq` text NOT NULL,
  `reponse_faq` text NOT NULL,
  PRIMARY KEY (`ID_faq`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`ID_faq`, `question_faq`, `reponse_faq`) VALUES
(2, 'Comment ajouter une fonction ?', 'Allez dans la pièce désirée, cliquez sur le bouton « Ajouter une fonction ».'),
(4, 'Comment ajouter une pièce?', 'Cliquez sur le bouton \"+\"'),
(22, 'Comment modifier mes données personnelles ?', 'Allez dans profil ');

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `ID_logement` int(11) NOT NULL AUTO_INCREMENT,
  `type_logement` int(11) DEFAULT NULL,
  `telephone_logement` varchar(10) DEFAULT NULL,
  `superficie_totale_logement` int(11) DEFAULT NULL,
  `numero_rue_logement` int(11) DEFAULT NULL,
  `nom_rue_logement` varchar(30) DEFAULT NULL,
  `code_postale_logement` int(11) DEFAULT NULL,
  `ville_logement` varchar(20) DEFAULT NULL,
  `pays_logement` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_logement`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`ID_logement`, `type_logement`, `telephone_logement`, `superficie_totale_logement`, `numero_rue_logement`, `nom_rue_logement`, `code_postale_logement`, `ville_logement`, `pays_logement`) VALUES
(40, 2, '123456789', 150, 30, 'Tatooine', 75001, 'Paris', 'France'),
(41, 2, '123456789', 150, 30, 'Tatooine', 75001, 'Paris', 'France'),
(42, 2, '123456789', 150, 30, 'Tatooine', 75001, 'Paris', 'France'),
(43, 2, '123456789', 150, 30, 'Tatooine', 75001, 'Paris', 'France'),
(44, 2, '123456789', 150, 30, 'Tatooine', 75001, 'Paris', 'France'),
(45, 2, '123456789', 150, 30, 'Tatooine', 75001, 'Paris', 'France'),
(46, 1, '171221157', 17, 14, 'Boulevard Gallieni', 92130, 'Paris', 'France'),
(47, 1, '2', 120, 30, 'boissière', 75116, 'Paris', 'France'),
(48, 2, '1', 150, 1, 's', 1, 'Paris', 'France'),
(49, 1, '2', 120, 2, 'd', 3, 'Marseille', 'France'),
(50, 1, '102030405', 150, 3, 'Tatooine', 75001, 'Paris', 'France'),
(51, 1, '102030405', 150, 3, 'Tatooine', 75001, 'Paris', 'France'),
(52, 1, '102030405', 150, 3, 'Tatooine', 75001, 'Paris', 'France'),
(53, 1, '102030405', 150, 3, 'Tatooine', 75001, 'Paris', 'France'),
(54, 2, '2', 150, 2, 'zf', 2, 'Paris', 'France'),
(55, 2, '1', 150, 14, 'zsz', 1, 'Paris', 'France'),
(56, 2, '1', 150, 2, 'zf', 2, 'Paris', 'France'),
(57, 2, '1', 150, 1, 'Tatooine', 1, 'Paris', 'France'),
(58, 1, '1', 120, 14, 'zsz', 1, 'Paris', 'France'),
(59, 2, '2', 150, 2, 'd', 1, 'Paris', 'France'),
(60, 2, '1', 150, 14, 'Tatooine', 1, 'Paris', 'France'),
(61, 1, '2', 150, 1, 'Tatooine', 1, 'Paris', 'France'),
(62, 2, '1', 150, 2, 'Tatooine', 75001, 'Paris', 'France'),
(63, 1, '102030405', 150, NULL, NULL, NULL, NULL, 'France'),
(64, 1, '102030405', 150, 3, 'Tatooine', 75001, 'Paris', 'France'),
(65, 2, '102030405', 150, 3, 'Tatooine', 75001, 'Paris', 'France'),
(66, 1, '102030405', 150, 3, 'Tatooine', 75001, 'Paris', 'France'),
(67, 1, '102030405', 150, 3, 'Tatooine', 75001, 'Paris', 'France'),
(68, 1, '123456789', 43, 189, 'Rue de la Convention', 75015, 'Paris', 'France'),
(69, 1, '123456789', 2, 1, 'zf', 2, 'Paris', 'France'),
(70, 1, '171221157', 17, 14, 'Boulevard Gallieni', 92130, 'Paris', 'France'),
(71, 2, '147937821', 300, 12, 'waldeck rousseau', 92600, 'Paris', 'France'),
(72, 1, '123456789', 150, 12, 'Tatooine', 75001, 'Paris', 'France'),
(73, 1, '123456789', 150, 2, 'Tatooine', 2, 'Paris', 'France'),
(74, 1, '123456789', 2, 30, 'zf', 2, 'Bordeaux', 'France'),
(75, 1, '123456789', 150, 30, 'zf', 2, 'Paris', 'France'),
(76, 2, '123456789', 23456, 40, 'Jean michaut', 92330, 'Paris', 'France'),
(77, 1, '2', 150, 2, 'Tatooine', 2, 'Paris', 'France'),
(78, 1, '0123456786', 150, 30, 'Tatooine', 75001, 'Paris', 'France'),
(79, 2, '123456789', 150, 30, 'Rue Boissière', 75116, 'Paris', 'France'),
(80, 1, '1', 150, 12, 'Rue Waldeck Rousseau', 92600, 'Asnières-sur-Seine', 'France'),
(81, 2, '123456789', 2, 30, 'Rue Boissière', 75116, 'Paris', 'France'),
(82, 2, '123456789', 150, 40, 'Rue Jean Michaut', 92330, 'Sceaux', 'France'),
(83, 1, '155555555', 200, 26, 'Rue de Saint-Quentin', 75010, 'Paris', 'France'),
(84, 1, '0123456789', 2, 55, 'Rue du Faubourg Saint-Honoré', 75008, 'Paris', 'France'),
(85, 1, '0123456789', NULL, 7, 'Gran Vía', 28013, 'Madrid', 'Spain'),
(86, 1, '0123456789', NULL, 30, 'Rue de Rivoli', 75004, 'Paris', 'Australia'),
(87, 1, '0144179336', NULL, 29, 'Rue Davioud', 75016, 'Paris', 'France'),
(88, 1, '0123456789', NULL, 30, 'Rue Boissière', 75116, 'Paris', 'France'),
(89, 2, '0123456789', NULL, 9005, 'Princes Highway', 3305, 'Bolwarra', 'Australia'),
(90, 1, '0123456789', NULL, 3058, 'Massachusetts Avenue', 2421, 'Lexington', 'United States'),
(91, 2, '0123456789', NULL, 6981, 'Princes Highway', 3304, 'Mumbannar', 'Australia'),
(92, 1, '0123456789', NULL, 6, 'U.S. Highway 1', 6851, 'Norwalk', 'United States'),
(93, 2, '0123456789', NULL, 30, 'Rue Boissière', 75116, 'Paris', 'France'),
(94, 1, '0123456789', NULL, 40, 'Boylston Street', 2116, 'Boston', 'United States'),
(95, 1, '0123456789', NULL, 6, 'Gran Vía', 28013, 'Madrid', 'Spain'),
(96, 1, '0123456789', NULL, 55, 'Rue du Faubourg Saint-Honoré', 75008, 'Paris', 'France'),
(97, 1, '0123456789', NULL, 30, 'Rue de Rivoli', 75004, 'Paris', 'France'),
(98, 2, '0123456789', NULL, 30, 'boissière', 75004, 'Paris', 'France'),
(99, 1, '0145454545', NULL, 30, 'Boissière', 75116, 'Paris', 'France'),
(100, 1, '0145454545', NULL, 30, 'Boissière', 75116, 'Paris', 'France'),
(101, 1, '0145454545', NULL, 30, 'Boissière', 75116, 'Paris', 'France'),
(102, 2, '0145454545', NULL, 30, 'Boissière', 75116, 'Paris', 'France'),
(103, 1, '0145454545', NULL, 30, 'Boissière', 75116, 'Paris', 'France'),
(104, 2, '0145454545', NULL, 30, 'boissiere', 75116, 'Paris', 'France'),
(105, 2, '0123456789', NULL, 30346, 'Princes Highway', 5280, 'Millicent', 'Australia'),
(106, 2, '0123456789', NULL, 44, 'Rue du Chevalier de la Barre', 75018, 'Paris', 'France'),
(107, 1, '0123456789', NULL, 463, 'U.S. Highway 1', 6477, 'Orange', 'United States'),
(108, 1, '0123456789', NULL, 30, 'Rue Boissière', 75116, 'Paris', 'France'),
(109, 1, '0923456786', NULL, 69, 'Boulevard Haussmann', 75008, 'Paris', 'France'),
(110, 1, '0123456789', NULL, 5, 'Avenue Anatole France', 75007, 'Paris', 'France'),
(111, 2, '0123456789', NULL, 487, 'Princes Highway', 3305, 'Bolwarra', 'Australia'),
(112, 2, '0123456789', NULL, 9, 'Avenue Anatole France', 75007, 'Paris', 'France'),
(113, 2, '0123456789', NULL, 9, 'Avenue Anatole France', 75007, 'Paris', 'France'),
(114, 1, '0123456789', NULL, 51, 'Princes Highway', 3305, 'Bolwarra', 'Australia');

-- --------------------------------------------------------

--
-- Structure de la table `ordonne_ordre_actionneur`
--

DROP TABLE IF EXISTS `ordonne_ordre_actionneur`;
CREATE TABLE IF NOT EXISTS `ordonne_ordre_actionneur` (
  `ID_ordre` int(11) NOT NULL,
  `ID_actionneur` int(11) NOT NULL,
  PRIMARY KEY (`ID_ordre`,`ID_actionneur`),
  KEY `cle_etrangere_actionneur_ordone_ordre_actionneur` (`ID_actionneur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ordonne_routine_actionneur`
--

DROP TABLE IF EXISTS `ordonne_routine_actionneur`;
CREATE TABLE IF NOT EXISTS `ordonne_routine_actionneur` (
  `ID_routine` int(11) NOT NULL,
  `ID_actionneur` int(11) NOT NULL,
  PRIMARY KEY (`ID_routine`,`ID_actionneur`),
  KEY `cle_etrangere_actionneur_ordonne_routine_actionneur` (`ID_actionneur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ordre`
--

DROP TABLE IF EXISTS `ordre`;
CREATE TABLE IF NOT EXISTS `ordre` (
  `ID_ordre` int(11) NOT NULL AUTO_INCREMENT,
  `ID_utilisateur` int(11) DEFAULT NULL,
  `ID_logement` int(11) DEFAULT NULL,
  `ID_type_de_capteur` int(11) DEFAULT NULL,
  `nom_salle` varchar(60) NOT NULL,
  `valeur_ordre` varchar(11) NOT NULL,
  `etat_ordre` tinyint(1) DEFAULT NULL,
  `date_d_ajout_ordre` date DEFAULT NULL,
  PRIMARY KEY (`ID_ordre`),
  KEY `cle_etrangere_utilisateur_ordre` (`ID_utilisateur`),
  KEY `cle_etrangere_logement_ordre` (`ID_logement`) USING BTREE,
  KEY `cle_etrangere_type_capteur_ordre` (`ID_type_de_capteur`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=324 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ordre`
--

INSERT INTO `ordre` (`ID_ordre`, `ID_utilisateur`, `ID_logement`, `ID_type_de_capteur`, `nom_salle`, `valeur_ordre`, `etat_ordre`, `date_d_ajout_ordre`) VALUES
(73, 202, 84, 5, 'Chambre de philippe', '23', 1, '2018-01-18'),
(74, 202, 84, 5, 'Chambre de philippe', '28', 1, '2018-01-18'),
(75, 202, 84, 5, 'Chambre de philippe', '15', 1, '2018-01-18'),
(76, 202, 84, 5, 'Chambre de philippe', '30', 1, '2018-01-18'),
(77, 202, 84, 5, 'Chambre de philippe', '27', 1, '2018-01-18'),
(78, 202, 84, 8, 'chambre de Marie', '27', 1, '2018-01-18'),
(79, 202, 84, 7, 'chambre de Marie', '30', 1, '2018-01-18'),
(80, 202, 84, 6, 'Chambre de philippe', '29', 1, '2018-01-18'),
(81, 202, 84, 5, 'Chambre de philippe', '16', 1, '2018-01-18'),
(82, 202, 84, 2, 'Chambre d\'Aymeric', '26', 1, '2018-01-18'),
(83, 202, 84, 1, 'Chambre d\'Aymeric', 'on', 1, '2018-01-18'),
(84, 202, 84, 1, 'Chambre d\'Aymeric', 'off', 1, '2018-01-18'),
(85, 202, 84, 1, 'Chambre d\'Aymeric', 'off', 1, '2018-01-18'),
(86, 202, 84, 5, 'Chambre d\'Aymeric', 'allumer', 1, '2018-01-18'),
(87, 202, 84, 5, 'Chambre d\'Aymeric', 'eteint', 1, '2018-01-18'),
(88, 202, 84, 8, 'Chambre d\'Aymeric', 'off', 1, '2018-01-18'),
(89, 202, 84, 8, 'Chambre d\'ilan', 'on', 1, '2018-01-18'),
(90, 202, 84, 5, 'Chambre d\'ilan', 'allumer', 1, '2018-01-18'),
(91, 202, 84, 2, 'Chambre d\'ilan', '30', 1, '2018-01-18'),
(92, 202, 84, 2, 'Chambre d\'ilan', '18', 1, '2018-01-18'),
(93, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(94, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(95, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(96, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(97, 202, 84, 8, 'Chambre d\'ilan', 'on', 1, '2018-01-18'),
(98, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(99, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(100, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(101, 202, 84, 5, 'Chambre d\'ilan', 'allumer', 1, '2018-01-18'),
(102, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(103, 202, 84, 8, 'Chambre d\'ilan', 'off', 1, '2018-01-18'),
(104, 202, 84, 8, 'Chambre d\'ilan', 'on', 1, '2018-01-18'),
(105, 202, 84, 8, 'Chambre d\'ilan', 'off', 1, '2018-01-18'),
(106, 202, 84, 2, 'Chambre d\'ilan', '27', 1, '2018-01-18'),
(107, 202, 84, 8, 'chambre de Marie', 'off', 1, '2018-01-18'),
(108, 202, 84, 5, 'Chambre d\'ilan', 'allumer', 1, '2018-01-18'),
(109, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(110, 202, 84, 5, 'Chambre d\'ilan', 'eteint', 1, '2018-01-18'),
(111, 202, 84, 5, 'Chambre d\'ilan', 'allumer', 1, '2018-01-18'),
(112, 202, 84, 5, 'Chambre d\'ilan', 'allumer', 1, '2018-01-18'),
(113, 202, 84, 1, 'Chambre d\'ilan', 'off', 1, '2018-01-18'),
(114, 202, 84, 3, 'Chambre de philippe', '44', 1, '2018-01-18'),
(115, 202, 84, 2, 'Chambre de philippe', '27', 1, '2018-01-18'),
(116, 202, 84, 5, 'Chambre de philippe', 'eteint', 1, '2018-01-18'),
(117, 202, 84, 5, 'Chambre de philippe', 'eteint', 1, '2018-01-18'),
(118, 202, 84, 5, 'Chambre de philippe', 'eteint', 1, '2018-01-18'),
(119, 202, 84, 5, 'Chambre de philippe', 'allumer', 1, '2018-01-18'),
(120, 202, 84, 5, 'Chambre de philippe', 'eteint', 1, '2018-01-18'),
(121, 202, 84, 5, 'Chambre de philippe', 'allumer', 1, '2018-01-18'),
(122, 202, 84, 5, 'Chambre de philippe', 'eteint', 1, '2018-01-18'),
(123, 202, 84, 5, 'Chambre de philippe', 'allumer', 1, '2018-01-18'),
(124, 202, 84, 5, 'Chambre de philippe', 'eteint', 1, '2018-01-18'),
(125, 202, 84, 5, 'Chambre de philippe', 'allumer', 1, '2018-01-18'),
(126, 202, 84, 5, 'Chambre de philippe', 'éteindre', 1, '2018-01-18'),
(127, 202, 84, 3, 'Chambre de philippe', '100', 1, '2018-01-18'),
(128, 202, 84, 1, 'Chambre de philippe', 'ON', 1, '2018-01-18'),
(129, 202, 84, 2, 'Chambre de philippe', '23', 1, '2018-01-18'),
(130, 202, 84, 3, 'Chambre2', '69', 1, '2018-01-18'),
(131, 202, 84, 2, 'Chambre2', '23', 1, '2018-01-18'),
(132, 202, 84, 2, 'Chambre2', '27', 1, '2018-01-18'),
(133, 202, 84, 3, 'Chambre2', '81', 1, '2018-01-18'),
(134, 202, 84, 1, 'Chambre2', 'OFF', 1, '2018-01-18'),
(135, 202, 84, 1, 'Chambre2', 'ON', 1, '2018-01-18'),
(136, 202, 84, 1, 'Chambre2', 'OFF', 1, '2018-01-18'),
(137, 202, 84, 2, 'Chambre2', '25', 1, '2018-01-18'),
(138, 202, 84, 1, 'Chambre2', 'ON', 1, '2018-01-18'),
(139, 202, 84, 1, 'Chambre2', 'OFF', 1, '2018-01-18'),
(140, 202, 84, 2, 'Chambre2', '23', 1, '2018-01-18'),
(141, 202, 84, 5, 'Chambre', 'Eteindre', 1, '2018-01-18'),
(142, 202, 84, 5, 'Chambre', 'Allumer', 1, '2018-01-18'),
(143, 202, 84, 1, 'Chambre', 'OFF', 1, '2018-01-18'),
(144, 202, 84, 2, 'Chambre2', '17', 1, '2018-01-18'),
(145, 202, 84, 3, 'Chambre2', '70', 1, '2018-01-18'),
(146, 202, 84, 2, 'Chambre2', '23', 1, '2018-01-18'),
(147, 202, 84, 2, 'Chambre2', '28', 1, '2018-01-18'),
(148, 202, 84, 2, 'Chambre2', '23', 1, '2018-01-18'),
(149, 202, 84, 5, 'Chambre d\'aymeric', 'Allumer', 1, '2018-01-18'),
(150, 202, 84, 8, 'Chambre d\'aymeric', 'OFF', 1, '2018-01-18'),
(151, 202, 84, 2, 'Chambre d\'aymeric', '29', 1, '2018-01-18'),
(152, 202, 84, 1, 'home', '23', 1, '2018-01-18'),
(153, 202, 84, 1, 'home', '23', 1, '2018-01-18'),
(154, 202, 84, 3, 'home', '69', 1, '2018-01-18'),
(155, 202, 84, 1, 'home', 'ON', 1, '2018-01-18'),
(156, 202, 84, 3, 'home', '60', 1, '2018-01-18'),
(157, 202, 84, 3, 'home', '67', 1, '2018-01-18'),
(158, 202, 84, 3, 'home', '74', 1, '2018-01-18'),
(159, 202, 84, 5, 'home', 'Eteindre', 1, '2018-01-18'),
(160, 202, 84, 2, 'home', '27', 1, '2018-01-18'),
(161, 202, 84, 3, 'Chambre2', '86', 1, '2018-01-18'),
(162, 202, 84, 3, 'Chambre2', '50', 1, '2018-01-18'),
(163, 202, 84, 3, 'Chambre2', '72', 1, '2018-01-18'),
(164, 202, 84, 2, 'home', '27', 1, '2018-01-18'),
(165, 202, 84, 1, 'home', 'ON', 1, '2018-01-18'),
(166, 202, 84, 2, 'home', '30', 1, '2018-01-18'),
(167, 202, 84, 5, 'Chambre d\'aymeric', 'Allumer', 1, '2018-01-18'),
(168, 202, 84, 5, 'Chambre', 'Eteindre', 1, '2018-01-18'),
(169, 202, 84, 5, 'Chambre de philippe', 'Eteindre', 1, '2018-01-18'),
(170, 202, 84, 5, 'Chambre de philippe', 'Allumer', 1, '2018-01-18'),
(171, 202, 84, 5, 'Chambre de philippe', 'Eteindre', 1, '2018-01-18'),
(172, 202, 84, 5, 'home', 'Eteindre', 1, '2018-01-18'),
(173, 202, 84, 5, 'home', 'Allumer', 1, '2018-01-18'),
(174, 202, 84, 5, 'home', 'Allumer', 1, '2018-01-18'),
(175, 202, 84, 5, 'Chambre de philippe', 'Allumer', 1, '2018-01-18'),
(176, 202, 84, 5, 'home', 'Allumer', 1, '2018-01-18'),
(177, 202, 84, 5, 'home', 'Eteindre', 1, '2018-01-18'),
(178, 202, 84, 8, 'Chambre d\'ilan', 'ON', 1, '2018-01-18'),
(179, 202, 84, 2, 'Chambre2', '21', 1, '2018-01-18'),
(180, 202, 84, 3, 'Chambre2', '78', 1, '2018-01-18'),
(181, 202, 84, 2, 'home', '27', 1, '2018-01-18'),
(182, 202, 84, 2, 'Chambre d\'aymeric', '25', 1, '2018-01-18'),
(183, 202, 84, 8, 'home', 'ON', 1, '2018-01-18'),
(184, 202, 84, 2, 'Salle à manger', '25', 1, '2018-01-19'),
(185, 202, 84, 1, 'home', 'ON', 1, '2018-01-19'),
(186, 202, 84, 5, 'Chambre d\'ilan', 'Allumer', 1, '2018-01-19'),
(187, 202, 84, 2, 'home', '29', 1, '2018-01-19'),
(188, 202, 84, 2, 'Salle à manger', '27', 1, '2018-01-19'),
(189, 202, 84, 3, 'home', '78', 1, '2018-01-19'),
(190, 202, 84, 3, 'Chambre de philippe', '87', 1, '2018-01-19'),
(191, 202, 84, 2, 'Chambre de philippe', '30', 1, '2018-01-19'),
(192, 202, 84, 5, 'Chambre de philippe', 'Eteindre', 1, '2018-01-19'),
(193, 202, 84, 2, 'Salle à manger', '28', 1, '2018-01-19'),
(194, 202, 84, 8, 'home', 'OFF', 1, '2018-01-19'),
(195, 202, 84, 3, 'Chambre2', '64', 1, '2018-01-19'),
(196, 202, 84, 5, 'Chambre2', 'Eteindre', 1, '2018-01-19'),
(197, 202, 84, 2, 'Chambre d\'aymeric', '27', 1, '2018-01-19'),
(198, 202, 84, 8, 'Chambre d\'aymeric', 'OFF', 1, '2018-01-19'),
(199, 202, 84, 8, 'Chambre d\'aymeric', 'ON', 1, '2018-01-19'),
(200, 202, 84, 2, 'Chambre2', '23', 1, '2018-01-19'),
(201, 202, 84, 2, 'Chambre2', '24', 1, '2018-01-19'),
(202, 202, 84, 1, 'Chambre2', 'OFF', 1, '2018-01-19'),
(203, 202, 84, 1, 'Chambre2', 'ON', 1, '2018-01-19'),
(204, 202, 84, 1, 'Chambre2', 'OFF', 1, '2018-01-19'),
(205, 202, 84, 1, 'Chambre2', 'ON', 1, '2018-01-19'),
(206, 202, 84, 1, 'Chambre2', 'OFF', 1, '2018-01-19'),
(207, 202, 84, 3, 'Chambre2', '44', 1, '2018-01-19'),
(208, 202, 84, 3, 'Chambre2', '75', 1, '2018-01-19'),
(209, 202, 84, 3, 'Chambre2', '44', 1, '2018-01-19'),
(210, 202, 84, 1, 'home', 'OFF', 1, '2018-01-19'),
(211, 202, 84, 5, 'home', 'Eteindre', 1, '2018-01-19'),
(212, 202, 84, 2, 'Chambre de philippe', '25', 1, '2018-01-19'),
(213, 202, 84, 2, 'home', '27', 1, '2018-01-19'),
(214, 202, 84, 5, 'home', 'Eteindre', 1, '2018-01-19'),
(215, 202, 84, 5, 'home', 'Allumer', 1, '2018-01-19'),
(216, 202, 84, 1, 'home', 'ON', 1, '2018-01-19'),
(217, 202, 84, 2, 'home', '26', 1, '2018-01-19'),
(218, 202, 84, 2, 'home', '16', 1, '2018-01-19'),
(219, 202, 84, 2, 'home', '30', 1, '2018-01-19'),
(220, 202, 84, 2, 'Chambre1', '27', 1, '2018-01-19'),
(221, 206, 86, 1, 'home', 'ON', 1, '2018-01-19'),
(222, 206, 86, 3, 'home', '91', 1, '2018-01-19'),
(223, 206, 86, 2, 'Cuisine', '27', 1, '2018-01-19'),
(224, 206, 86, 5, 'Cuisine', 'Allumer', 1, '2018-01-19'),
(225, 206, 86, 5, 'home', 'Allumer', 1, '2018-01-19'),
(226, 206, 86, 2, 'home', '24', 1, '2018-01-19'),
(227, 206, 86, 2, 'Cuisine', '27', 1, '2018-01-19'),
(228, 206, 86, 7, 'Cuisine', 'OFF', 1, '2018-01-19'),
(229, 206, 86, 7, 'Cuisine', 'ON', 1, '2018-01-19'),
(230, 206, 86, 3, 'Cuisine', '55', 1, '2018-01-19'),
(231, 206, 86, 2, 'Chambre', '29', 1, '2018-01-19'),
(232, 206, 86, 7, 'Cuisine', 'OFF', 1, '2018-01-19'),
(233, 206, 86, 2, 'Cuisine', '17', 1, '2018-01-19'),
(234, 206, 86, 2, 'home', '19', 1, '2018-01-19'),
(235, 164, 63, 2, 'home', '27', 1, '2018-01-19'),
(236, 202, 84, 2, 'home', '26', 1, '2018-01-19'),
(237, 202, 84, 4, 'home', 'OFF', 1, '2018-01-19'),
(238, 202, 84, 2, 'home', '16', 1, '2018-01-19'),
(239, 202, 84, 3, 'Chambre2', '11', 1, '2018-01-19'),
(240, 202, 84, 3, 'Chambre2', '44', 1, '2018-01-19'),
(241, 202, 84, 2, 'Salle à manger', '27', 1, '2018-01-19'),
(243, 202, 84, 7, 'home', 'ON', 1, '2018-01-20'),
(244, 202, 84, 6, 'home', 'Fermer', 1, '2018-01-20'),
(245, 202, 84, 3, 'home', '67', 1, '2018-01-20'),
(246, 202, 84, 1, 'home', 'OFF', 1, '2018-01-20'),
(247, 202, 84, 3, 'home', '62', 1, '2018-01-20'),
(248, 202, 84, 2, 'home', '23', 1, '2018-01-20'),
(249, 202, 84, 2, 'Chambre de philippe', '28', 1, '2018-01-20'),
(250, 202, 84, 2, 'Chambre de philippe', '27', 1, '2018-01-20'),
(251, 202, 84, 3, 'Chambre de Marie', '72', 1, '2018-01-20'),
(252, 202, 84, 3, 'Chambre de Marie', '30', 1, '2018-01-20'),
(253, 202, 84, 7, 'Chambre de Marie', 'ON', 1, '2018-01-20'),
(254, 202, 84, 3, 'Chambre de Marie', '68', 1, '2018-01-20'),
(255, 202, 84, 2, 'Chambre de Marie', '23', 1, '2018-01-20'),
(256, 206, 86, 1, 'home', 'OFF', 1, '2018-01-20'),
(257, 206, 86, 5, 'Cuisine', 'Eteindre', 1, '2018-01-20'),
(258, 202, 84, 1, 'Chambre de Marie', 'ON', 1, '2018-01-20'),
(259, 202, 84, 6, 'Chambre de Marie', 'Fermer', 1, '2018-01-20'),
(260, 202, 84, 2, 'home', '28', 1, '2018-01-20'),
(261, 202, 84, 2, 'Chambre de Marie', '30', 1, '2018-01-20'),
(262, 202, 84, 2, 'home', '15', 1, '2018-01-20'),
(263, 206, 86, 3, 'Salle à manger', '72', 1, '2018-01-20'),
(264, 206, 86, 3, 'Salle à manger', '56', 1, '2018-01-20'),
(265, 206, 86, 1, 'home', 'OFF', 1, '2018-01-20'),
(266, 202, 84, 2, 'Salle à manger', '26', 1, '2018-01-20'),
(267, 202, 84, 2, 'Chambre de philippe', '28', 1, '2018-01-20'),
(268, 206, 86, 3, 'home', '96', 1, '2018-01-21'),
(269, 202, 84, 2, 'home', '27', 1, '2018-01-22'),
(270, 202, 84, 1, 'home', 'ON', 1, '2018-01-22'),
(271, 216, 90, 2, 'Chambre de Marie', 'Fermer', 1, '2018-01-23'),
(272, 216, 90, 2, 'Chambre de Marie', 'Ouvrir', 1, '2018-01-23'),
(273, 216, 90, 1, 'Chambre de Marie', 'ON', 1, '2018-01-23'),
(274, 216, 90, 12, 'Chambre de Marie', 'ON', 1, '2018-01-23'),
(275, 216, 90, 1, 'Chambre de Tristan', 'ON', 1, '2018-01-23'),
(276, 216, 90, 2, 'Chambre', 'Ouvrir', 1, '2018-01-23'),
(277, 216, 90, 4, 'Chambre', '30', 1, '2018-01-23'),
(278, 216, 90, 3, 'Chambre', '73', 1, '2018-01-23'),
(279, 216, 90, 11, 'home', 'ON', 1, '2018-01-23'),
(280, 216, 90, 3, 'Chambre de Nico', '59', 1, '2018-01-23'),
(281, 216, 90, 1, 'home', 'OFF', 1, '2018-01-23'),
(282, 216, 90, 3, 'Chambre de Nico', '72', 1, '2018-01-23'),
(283, 216, 90, 3, 'Chambre de Nico', '35', 1, '2018-01-23'),
(284, 216, 90, 3, 'Chambre de Nico', '22', 1, '2018-01-23'),
(285, 202, 84, 5, 'home', 'Eteindre', 1, '2018-01-24'),
(286, 202, 84, 4, 'home', '19', 1, '2018-01-24'),
(287, 202, 84, 3, 'home', '69', 1, '2018-01-24'),
(288, 202, 84, 3, 'home', '20', 1, '2018-01-24'),
(289, 202, 84, 2, 'home', 'Fermer', 1, '2018-01-24'),
(290, 202, 84, 2, 'Chambre de Tristan', 'Fermer', 1, '2018-01-24'),
(291, 202, 84, 4, 'Salon', '27', 1, '2018-01-24'),
(292, 202, 84, 4, 'Chambre de Tristan', '26', 1, '2018-01-24'),
(293, 202, 84, 1, 'home', 'OFF', 1, '2018-01-24'),
(294, 206, 86, 3, 'Salle à manger', '32', 1, '2018-01-25'),
(295, 227, 96, 4, 'Salon', '28', 1, '2018-01-25'),
(296, 202, 84, 4, 'Salon', '26', 1, '2018-01-26'),
(306, 193, 78, 4, 'home', '26', 1, '2018-01-26'),
(310, 241, 107, 10, 'home', 'ON', 1, '2018-01-26'),
(311, 241, 107, 8, 'home', 'OFF', 1, '2018-01-26'),
(319, 252, 109, 11, 'home', 'ON', 1, '2018-01-27'),
(320, 252, 109, 8, 'home', 'ON', 1, '2018-01-27'),
(321, 252, 109, 9, 'home', 'ON', 1, '2018-01-27'),
(322, 252, 109, 3, 'home', '50', 1, '2018-01-27'),
(323, 252, 109, 11, 'home', 'OFF', 1, '2018-01-27');

-- --------------------------------------------------------

--
-- Structure de la table `routine`
--

DROP TABLE IF EXISTS `routine`;
CREATE TABLE IF NOT EXISTS `routine` (
  `ID_routine` int(11) NOT NULL AUTO_INCREMENT,
  `ID_utilisateur` int(11) NOT NULL,
  `ID_logement` int(11) DEFAULT NULL,
  `etat_routine` tinyint(4) DEFAULT NULL,
  `type_routine` int(11) DEFAULT NULL,
  `date_d_ajout_routine` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom_routine` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_routine`),
  KEY `cle_etrangere_logement_routine` (`ID_logement`),
  KEY `cle_etrangere_utilisateur_routine` (`ID_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `routine_capteur`
--

DROP TABLE IF EXISTS `routine_capteur`;
CREATE TABLE IF NOT EXISTS `routine_capteur` (
  `ID_routine_capteur` int(11) NOT NULL AUTO_INCREMENT,
  `ID_routine` int(11) NOT NULL,
  `ID_capteur` int(11) NOT NULL,
  `ordre` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID_routine_capteur`),
  KEY `cle_etrangere_routine_routine_capteur` (`ID_routine`),
  KEY `cle_etrangere_capteur_routine_capteur` (`ID_capteur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `routine_jour`
--

DROP TABLE IF EXISTS `routine_jour`;
CREATE TABLE IF NOT EXISTS `routine_jour` (
  `ID_routine_jour` int(11) NOT NULL AUTO_INCREMENT,
  `ID_routine` int(11) DEFAULT NULL,
  `jour_routine` varchar(50) NOT NULL,
  `heure_debut_routine` time NOT NULL,
  `heure_fin_routine` time NOT NULL,
  PRIMARY KEY (`ID_routine_jour`),
  KEY `cle_etrangere_routine_routine_jour` (`ID_routine`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `routine_salle`
--

DROP TABLE IF EXISTS `routine_salle`;
CREATE TABLE IF NOT EXISTS `routine_salle` (
  `ID_routine_salle` int(11) NOT NULL AUTO_INCREMENT,
  `ID_routine` int(11) NOT NULL,
  `ID_salle` int(11) NOT NULL,
  PRIMARY KEY (`ID_routine_salle`),
  KEY `cle_etrangere_routine_routine_salle` (`ID_routine`),
  KEY `cle_etrangere_salle_routine_salle` (`ID_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `ID_salle` int(11) NOT NULL AUTO_INCREMENT,
  `ID_logement` int(11) DEFAULT NULL,
  `ID_cemac` int(11) DEFAULT NULL,
  `ID_type_salle` int(11) DEFAULT NULL,
  `nom_salle` varchar(20) NOT NULL,
  `superficie_salle` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_salle`),
  KEY `cle_etrangere_logement_salle` (`ID_logement`),
  KEY `cle_etrangere_cemac_salle` (`ID_cemac`),
  KEY `cle_etrangere_type_salle_salle` (`ID_type_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`ID_salle`, `ID_logement`, `ID_cemac`, `ID_type_salle`, `nom_salle`, `superficie_salle`) VALUES
(10, NULL, NULL, NULL, 'chambree', 20),
(11, NULL, NULL, NULL, 'chambree', 20),
(15, NULL, NULL, NULL, 'chambree', 20),
(17, 63, NULL, NULL, 'Salon', 20),
(18, 63, NULL, NULL, 'Cuisine', 20),
(19, 64, NULL, NULL, 'Cuisine', 20),
(20, 66, NULL, NULL, 'chambre', 20),
(21, 63, NULL, NULL, 'Cuisine', 20),
(22, 67, NULL, NULL, 'Cuisine', 15),
(23, 68, NULL, NULL, 'CUISINE', 20),
(34, 63, NULL, 3, 'CUISINE', 20),
(35, 70, NULL, 1, 'Chambre d\'Ilan', 20),
(36, 70, NULL, 1, 'Cuisine', 20),
(37, 71, NULL, 1, 'lit', 10),
(38, 72, NULL, 1, 'chambre', 20),
(39, 72, NULL, 1, 'chambre', 20),
(40, 72, NULL, 1, 'Chambre d\'Ilan', 20),
(41, 74, NULL, 1, 'Salon', 20),
(42, 74, NULL, 1, 'Chambre de Marie', 20),
(43, 74, NULL, 1, 'Chambre d\'Ilan', 20),
(44, 74, NULL, NULL, 'undefined', 20),
(45, 74, NULL, NULL, 'Salon', 20),
(46, 74, NULL, NULL, 'Salle', 20),
(47, 74, NULL, NULL, 'Salle à manger', 20),
(48, 74, NULL, NULL, 'Salon', 10),
(49, 74, NULL, 2, 'Salon', 10),
(50, 74, NULL, 4, 'Salle à khu', 10),
(51, 74, NULL, 4, 'Salle àgutfuotfrèol', 10),
(52, 74, NULL, 4, 'Salle à manger', NULL),
(53, 63, NULL, 1, 'Chambreee', NULL),
(54, 70, NULL, 1, 'Chambre', NULL),
(55, 70, NULL, 4, 'Salle à manger', NULL),
(56, 70, NULL, 2, 'Salon', NULL),
(57, 70, NULL, 5, 'Salle de bain', NULL),
(58, 70, NULL, 1, 'Chambree', NULL),
(59, 70, NULL, 1, 'Chambreee', NULL),
(60, 70, NULL, 1, 'Chambreeee', NULL),
(61, 70, NULL, 1, 'Chambreeeeeee', NULL),
(62, 76, NULL, 1, 'Suite Parentale', NULL),
(63, 76, NULL, 5, 'Hamam', NULL),
(64, 76, NULL, 1, 'Chambre des jumeaux', NULL),
(65, 78, NULL, 1, 'Chambre', NULL),
(66, 81, NULL, 1, 'Chambre', NULL),
(67, 81, NULL, 2, 'Salon', NULL),
(68, 81, NULL, 4, 'Salle à manger', NULL),
(69, 81, NULL, 3, 'Cuisine', NULL),
(70, 78, NULL, NULL, 'a', NULL),
(71, 82, NULL, 1, 'Chambre', NULL),
(72, 83, NULL, 2, 'Salon', NULL),
(73, 83, NULL, 4, 'Salle à manger', NULL),
(74, 83, NULL, 2, 'Salon 2', NULL),
(103, 87, NULL, 5, 'Salle de bain', NULL),
(104, 87, NULL, 4, 'Salle à manger', NULL),
(116, 90, NULL, 1, 'Chambre de Nico', NULL),
(117, 90, NULL, 34, 'Salle de torture', NULL),
(120, 84, NULL, 2, 'Salon', NULL),
(121, 84, NULL, 3, 'Cuisine', NULL),
(122, 84, NULL, 1, 'Chambre de Tristan', NULL),
(123, 84, NULL, 1, 'Chambre de Damien', NULL),
(124, 84, NULL, 5, 'Salle de bain', NULL),
(125, 84, NULL, 13, 'Bureau', NULL),
(126, 84, NULL, 12, 'Bibliothèque', NULL),
(127, 86, NULL, 1, 'Chambre', NULL),
(129, 96, NULL, 2, 'Salon', NULL),
(130, 96, NULL, 3, 'Cuisine', NULL),
(131, 96, NULL, 4, 'Salle à manger', NULL),
(132, 96, NULL, 5, 'Salle de bain', NULL),
(133, 96, NULL, 1, 'Chambre d\'Estelle', NULL),
(134, 96, NULL, 1, 'Chambre de Camille', NULL),
(136, 97, NULL, 1, 'Chambre', NULL),
(137, 96, NULL, 11, 'Toilettes', NULL),
(138, 106, NULL, 2, 'Salon', NULL),
(142, 109, NULL, 1, 'Chambre', NULL),
(145, 114, NULL, 1, 'Chambre', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tutoriel`
--

DROP TABLE IF EXISTS `tutoriel`;
CREATE TABLE IF NOT EXISTS `tutoriel` (
  `ID_tutoriel` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_tutoriel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_de_capteur`
--

DROP TABLE IF EXISTS `type_de_capteur`;
CREATE TABLE IF NOT EXISTS `type_de_capteur` (
  `ID_type_de_capteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type_de_capteur` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_type_de_capteur`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_de_capteur`
--

INSERT INTO `type_de_capteur` (`ID_type_de_capteur`, `nom_type_de_capteur`) VALUES
(1, 'Présence'),
(2, 'Volets'),
(3, 'Humidité'),
(4, 'Température'),
(5, 'Lumière'),
(6, 'VMC'),
(7, 'Mouvement'),
(8, 'Caméra'),
(9, 'Fumée'),
(10, 'CO2'),
(11, 'Electricité'),
(12, 'Eau'),
(13, 'Climatisation');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_salle`
--

DROP TABLE IF EXISTS `type_de_salle`;
CREATE TABLE IF NOT EXISTS `type_de_salle` (
  `ID_type_de_salle` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type_de_salle` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_type_de_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_de_salle`
--

INSERT INTO `type_de_salle` (`ID_type_de_salle`, `nom_type_de_salle`) VALUES
(1, 'Chambre'),
(2, 'Salon'),
(3, 'Cuisine'),
(4, 'Salle à manger'),
(5, 'Salle de bain'),
(11, 'Toilettes'),
(12, 'Bibliothèque'),
(13, 'Bureau'),
(14, 'Garage'),
(15, 'Séjour'),
(34, 'Vestibule');

-- --------------------------------------------------------

--
-- Structure de la table `type_d_actionneur`
--

DROP TABLE IF EXISTS `type_d_actionneur`;
CREATE TABLE IF NOT EXISTS `type_d_actionneur` (
  `ID_type_d_actionneur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type_d_actionneur` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_type_d_actionneur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `ID_logement` int(11) DEFAULT NULL,
  `type_utilisateur` varchar(11) DEFAULT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `prenom_utilisateur` varchar(20) NOT NULL,
  `telephone_1_utilisateur` varchar(10) NOT NULL,
  `telephone_2_utilisateur` varchar(10) DEFAULT NULL,
  `date_de_naissance_utilisateur` date DEFAULT NULL,
  `adresse_mail_utilisateur` varchar(90) NOT NULL,
  `mot_de_passe_utilisateur` varchar(300) NOT NULL,
  `date_d_ajout_utilisateur` date DEFAULT NULL,
  `token_mdp` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`ID_utilisateur`),
  KEY `cle_etrangere_logement_utilisateur` (`ID_logement`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `ID_logement`, `type_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `telephone_1_utilisateur`, `telephone_2_utilisateur`, `date_de_naissance_utilisateur`, `adresse_mail_utilisateur`, `mot_de_passe_utilisateur`, `date_d_ajout_utilisateur`, `token_mdp`) VALUES
(96, 47, '1', 'isambert', 'charlotte', '9', NULL, '2017-12-12', 'charlotte.isambert@gmail.com', 'Charlotte30+', '2017-12-22', '5c97affc30a6e99811c73c31719c80a1'),
(98, NULL, '1', 'dez', 'ef', '1', NULL, '2017-12-19', 'daz@hotmail.fr', '*8B1F657800F87E02617CD07126FDCF7B9F13E955', '2017-12-22', NULL),
(99, NULL, '1', 'Dupont', 'Leïa', '0102030405', NULL, '2017-12-23', 'azd@hotmail.fr', '*84869AED8A7235127BFD0AD4A55E335B29ADE3AD', '2017-12-23', NULL),
(100, 48, '1', 'rgferg', 'r', '1', NULL, '2017-12-11', 'r@hotmail.fr', '*7B844B41A3799185EBF33B603FA8C632E65CA3EF', '2017-12-23', NULL),
(101, 49, '1', 'rgferg', 'ra', '1234567890', NULL, '2017-12-18', 'a@hotmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-23', NULL),
(102, 50, '1', 'Dupont', 'Leïa', '0102030405', NULL, '2017-12-24', 'd@hotmail.fr', '*667F407DE7C6AD07358FA38DAED7828A72014B4E', '2017-12-24', NULL),
(103, 51, '1', 'Dupont', 'Leïa', '0102030405', NULL, '2017-12-24', 'fr@hotmail.fr', '*16863C23B2E91537AEAEDDE9D1B40DA2A975C5DC', '2017-12-24', NULL),
(104, NULL, '2', 'Dupont', 'Leïa', '0102030405', NULL, '2017-12-24', 'ddd@hotmail.frr', '*16863C23B2E91537AEAEDDE9D1B40DA2A975C5DC', '2017-12-24', NULL),
(105, 52, '1', 'Dupont', 'Leïa', '0102030405', NULL, '2017-12-24', 'rf@hotmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-24', NULL),
(106, NULL, '2', 'Dupont', 'Leïa', '0102030405', NULL, '2017-12-24', 'd@hotmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-24', NULL),
(107, NULL, '2', 'Dupont', 'Leia', '0102030405', NULL, '2017-12-28', 'f@otmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-24', NULL),
(108, 52, '2', 'Dupont', 'Leia', '0102030405', NULL, '2017-12-24', 'f@hotmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-24', NULL),
(109, 53, '1', 'Dupont', 'Leia', '0102030405', NULL, '2017-12-25', 'f@hotmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-24', NULL),
(110, 53, '2', 'Dupont', 'Leiaa', '0102030405', NULL, '2017-12-24', 'd@hotmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-24', NULL),
(111, 53, '2', 'c', 'Leia', '0102030405', NULL, '2017-12-24', 'f@hotmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-24', NULL),
(112, 54, '1', 'isambert', 'charlotte', '2', NULL, '2017-12-25', 'luke.skywalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2017-12-30', NULL),
(113, 55, '1', 'isambert', 'charlotte', '1', NULL, '2017-12-18', 'charlotte.isambert@gmail.com', '*18D0115BFF2A5D467821F7B17568841841E2AAC7', '2017-12-30', '5c97affc30a6e99811c73c31719c80a1'),
(114, 56, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-04', 'luke.skywalker@gmail.com', '*BDE3DA6E77A1A4391DEBEAFC09A5E5E2E4B54DE1', '2017-12-30', NULL),
(115, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-11', 'a@hotmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-30', NULL),
(116, 57, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-11', 'a@hotmail.fr', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-30', NULL),
(117, 58, '1', 'azdazd', 'z', '1234567890', NULL, '2017-12-25', 'z@hotmail.fr', '*667F407DE7C6AD07358FA38DAED7828A72014B4E', '2017-12-30', NULL),
(118, 59, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-18', 'charlotte.isambert@gmail.com', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(119, 60, '1', 'isambert', 'charlotte', '1', NULL, '2017-12-17', 'charlotte.isambert@gmail.com', '*FDD369C6B7C3C64C7C07EDE4DC5C01BF8970B24D', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(120, 60, '2', 'isambert', 'marie', '1234567890', NULL, '2017-12-11', 'marie.willis@gmail.com', '*FDD369C6B7C3C64C7C07EDE4DC5C01BF8970B24D', '2017-12-31', NULL),
(121, 61, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-11-28', 'charlotte.isambert@gmail.com', '*FDD369C6B7C3C64C7C07EDE4DC5C01BF8970B24D', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(122, 61, '2', 'isambert', 'marie', '1234567890', NULL, '2017-12-25', 'marie.willis@gmail.com', '*241E241B694B4F0B740CF5B9775AFD9A511E1CEC', '2017-12-31', NULL),
(123, 61, '2', 'isambert', 'marie', '1234567890', NULL, '2017-12-03', 'marie.willis@gmail.com', '*E8BEE713F0CBBB9F9B09623007E2826138710274', '2017-12-31', NULL),
(124, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-19', 'charlotte.isambert@gmail.com', '*B4C2258EF3D19E3251C2D12AE862E16B948F1DA4', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(125, NULL, '1', 'isambert', 'charlotte', '1', NULL, '2017-12-05', 'charlotte.isambert@gmail.com', '*3A60A541180084B4E8762ECDD327378A37A7FD64', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(126, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-17', 'charlotte.isambert@gmail.com', '*C09B3872E2358DFE1260F40005A7EB880E4788BC', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(127, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-11-27', 'charlotte.isambert@gmail.com', '*FDD369C6B7C3C64C7C07EDE4DC5C01BF8970B24D', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(128, NULL, '1', 'isambert', 'charlotte', '1', NULL, '2018-01-01', 'charlotte.isambert@gmail.com', '*1B7F811F471DAD88B552CF2BCBBD69392A6A3C4A', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(129, NULL, '1', 'isambert', 'charlotte', '1', NULL, '2018-01-02', 'charlotte.isambert@gmail.com', '*1548965B4EBB7ED2EB185A2E22D12D7327B17912', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(130, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-25', 'charlotte.isambert@gmail.com', '*C00FF886829A441E3E60B8FE723CD841E282E73F', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(131, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-12', 'charlotte.isambert@gmail.com', '*21CB390EF5DF554DE5C461EA89783290764FD11B', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(132, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2016-11-29', 'charlotte.isambert@gmail.com', '*1E721DF6357025B483FA3EEA459FD729013C56EF', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(133, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-12', 'charlotte.isambert@gmail.com', '*22DD93048443BE12FAC6E05B4EC661248BF41927', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(134, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-18', 'charlotte.isambert@gmail.com', '*C0B7D1E0B6E4D75DA83AE91BD8097C5F19EEAAFA', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(135, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-11-28', 'charlotte.isambert@gmail.com', '*99B957DF57C919F88DE14C1CB7DD9FF845CB79B8', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(136, NULL, '1', 'isambert', 'charlotte', '1', NULL, '2017-12-05', 'charlotte.isambert@gmail.com', '*E2A10CE2A4CAAC5210E3DA7016E096DFB4E3FD0C', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(137, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-11', 'charlotte.isambert@gmail.com', '*F41B47BF0194F5DB482E39AD75382F45B92EF400', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(138, NULL, '1', 'isambert', 'Luke', '1234567890', NULL, '2017-11-28', 'luke.skywalker@gmail.com', '*7B54F3FB7A0566312B46A56CE4215B51F9BC3D43', '2017-12-31', NULL),
(139, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-04', 'luke.skywalker@gmail.com', '*C39630FC07216EAAA58D1E5039408162B86F7C6E', '2017-12-31', NULL),
(140, NULL, '1', 'isambert', 'charlotte', '0612345678', NULL, '2017-12-25', 'fdezf@otmail.fr', '*FBC50DC479D700259732BC7B63E6AF8930A4AE5F', '2017-12-31', NULL),
(141, NULL, '1', 'isambert', 'charlotte', '0612345678', NULL, '2017-12-11', 'charlotte.isambert@gmail.com', '*D5CBD35C6C21CF0C9BAA4FB9477B709B8A36A3A6', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(142, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-11-06', 'luke.skywalker@gmail.com', '*76799DBBC5E8E38F1F786774241B770DC1F5AE19', '2017-12-31', NULL),
(143, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-11-27', 'charlotte.isambert@gmail.com', '*8C00D976B53D2D91A56F61080C4ED4BF25D47100', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(144, NULL, '1', 'isambert', 'Luke', '0612345678', NULL, '2017-12-05', 'luke.skywalker@gmail.com', '*D37F1B4DE82802EEFF062385281F51923CE63A1D', '2017-12-31', NULL),
(145, NULL, '1', 'isambert', 'Luke', '0612345678', NULL, '2017-12-19', 'a@hotmail.fr', '*B974161FB844913B25A6986610BF9F14C18EBCF2', '2017-12-31', NULL),
(146, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-12-18', 'luke.skywalker@gmail.com', '*38D6751812B202E6C04B54C58E9B8744D933187F', '2017-12-31', NULL),
(147, NULL, '1', 'isambert', 'charlotte', '1234567890', NULL, '2017-11-27', 'luke.skywalker@gmail.com', '*6C589F482079BC075CD533A6DF5A33FD87138871', '2017-12-31', NULL),
(148, NULL, '1', 'isambert', 'Luke', '0612345678', NULL, '2017-11-27', 'luke.skywalker@gmail.com', '*D988558A50DE1FB96BAC096BBA77FFCDBFD55914', '2017-12-31', NULL),
(149, NULL, '1', 'Skywalker', 'Luke', '1234567890', NULL, '2017-12-19', 'a@hotmail.fr', '*58272D56D259DB1654DC58073246B212A802F187', '2017-12-31', NULL),
(150, 62, '1', 'Skywalker', 'marie', '1234567890', NULL, '2017-12-18', 'leia.skywalker@gmail.com', '*055CFBF80A999A40537103258C4678A1B08F7AAF', '2017-12-31', NULL),
(151, 62, '2', 'isambert', 'azdazd', '0612345678', NULL, '2017-12-14', 'luke.skywalker@gmail.com', '*42FDA8788637CCE8EB0FBF5947427ECE5D292465', '2017-12-31', NULL),
(152, 62, '2', 'Skywalker', 'Leïa', '0612345678', NULL, '2017-12-07', 'charlotte.isambert@gmail.com', '*5891172284C53017339844FD9C41D76B4DE6E395', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(153, NULL, '1', 'isambert', 'Luke', '99', NULL, '2017-12-04', 'a@hotmail.fr', '*055CFBF80A999A40537103258C4678A1B08F7AAF', '2017-12-31', NULL),
(154, NULL, '1', 'isambert', 'charlotte', '061234', NULL, '2017-11-28', 'luke.skywalker@gmail.com', '*055CFBF80A999A40537103258C4678A1B08F7AAF', '2017-12-31', NULL),
(155, NULL, '1', 'Skywalker', 'Luke', '1234567890', NULL, '2017-12-10', 'a@hotmail.fr', '*055CFBF80A999A40537103258C4678A1B08F7AAF', '2017-12-31', NULL),
(156, NULL, '1', 'isambert', 'charlotte', '0612345678', NULL, '2017-10-30', 'charlotte.isambert@gmail.com', '*1A256E4E2FE95B8BF7349C168991EA8035D1359B', '2017-12-31', '5c97affc30a6e99811c73c31719c80a1'),
(157, NULL, '1', 'isambert', 'charlotte', '0612345', NULL, '2017-12-05', 'marie.willis@gmail.com', '*055CFBF80A999A40537103258C4678A1B08F7AAF', '2017-12-31', NULL),
(158, NULL, '1', 'Skywalker', 'charlotte', '1', NULL, '2017-11-27', 'luke.skywalker@gmail.com', '*106317C687A95D8C2703D21A14A09F03C7F25F4B', '2017-12-31', NULL),
(159, NULL, '1', 'Skywalker', 'Luke', '1234567890', NULL, '2017-11-28', 'a@hotmail.fr', '*106317C687A95D8C2703D21A14A09F03C7F25F4B', '2017-12-31', NULL),
(160, NULL, '1', 'Skywalker', 'marie', '2', NULL, '2017-12-20', 'a@hotmail.fr', '*CB79A6814789720143FACC8A1FBD2347193BCBF4', '2017-12-31', NULL),
(161, NULL, '1', 'Skywalker', 'Luke', '123456', NULL, '2017-12-05', 'a@hotmail.fr', '*814D8D7EF9C4355D7AC826B0EB672CAB7A06D689', '2017-12-31', NULL),
(162, NULL, '1', 'Skywalker', 'marie', '0612345623', NULL, '2017-11-28', 'luke.skywalker@gmail.com', '*CB79A6814789720143FACC8A1FBD2347193BCBF4', '2017-12-31', NULL),
(163, NULL, '1', 'rgferg', 'Luke', '0612345688', NULL, '2017-12-26', 'a@hotmail.fr', '*CB79A6814789720143FACC8A1FBD2347193BCBF4', '2017-12-31', NULL),
(164, 63, '1', 'isambert', 'charlotte', '0102030405', NULL, '2018-02-03', 'charlotte.isambert@hotmail.fr', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-03', 'e4dd42dd8a46a8c887a0f87af56b8e0a'),
(165, 64, '1', 'Skywalker', 'Leia', '0102030405', NULL, '2018-11-04', 'leia.skywalker@gmail.com', '*9DC7EDAEDBC7B366599BD536467CBF687C3B9C6D', '2018-01-05', NULL),
(166, 64, '2', 'c', 'charlotte', '0102030405', NULL, '2018-01-04', 'zezf@hotmail.fr', '*94AADD2C91D0FD28CC39825D137CBAE8470191A0', '2018-01-05', NULL),
(167, 65, '1', 'c', 'charlotte', '0102030405', NULL, '2018-01-04', 'rgeg@trgr', '*071BBA17FF94A87D83A35FD80BAB26AACB586D80', '2018-01-05', NULL),
(168, 66, '1', 'c', 'charlotte', '0102030405', NULL, '2018-01-04', 'c@hotmail.fr', '*106317C687A95D8C2703D21A14A09F03C7F25F4B', '2018-01-05', NULL),
(169, 67, '1', 'isambert', 'charlotte', '0102030405', NULL, '2018-01-08', 'charlotte.isambert@wanadoo.fr', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-08', NULL),
(170, 68, '1', 'Gasganias9', 'Ilan', '0612345678', NULL, '1996-08-19', 'idza@fjie.fr', '*2A3C5BF20EF87DC464ABC673506BED731892F34E', '2018-01-08', NULL),
(171, 69, '1', 'isambert', 'charlotte', '0612345678', NULL, '2018-01-23', 'ab@hotmail.fr', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-08', NULL),
(172, 70, '1', 'MAUDIRE', 'Ilan', '0640180408', NULL, '1997-05-10', 'ilan.maudire@gmail.com', '*6B4F89A54E2D27ECD7E8DA05B4AB8FD9D1D8B119', '2018-01-09', NULL),
(174, 72, '1', 'isambert', 'charlotte', '0612345678', NULL, '2018-01-16', 'marie.willis@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-10', NULL),
(176, 74, '1', 'hoikos', 'charlotte', '0612345678', NULL, '2018-01-16', 'charlotte.hoikos@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-10', NULL),
(177, 74, '2', 'hoikos', 'marie', '1234567890', NULL, '2018-01-01', 'marie.hoikos@gmail.com', '*6BF291330706B7C28754A57E0E70A1BECC33F05B', '2018-01-10', NULL),
(178, 74, '2', 'hoikos', 'philippe', '0612345678', NULL, '2018-01-01', 'philippe.hoikos@gmail.com', '*1CB58426D2F31EF567470EB552A941F20E718D9F', '2018-01-10', NULL),
(179, 74, '2', 'hoikos', 'ilan', '0612345678', NULL, '2018-01-29', 'ilan.hoikos@gmail.com', '*1CC711488B648A72A828A03479A787C675A34FC9', '2018-01-10', NULL),
(180, 75, '1', 'isambert', 'charlotte', '0612345678', NULL, '2018-01-16', 'a@hotmail.fr', '*F33AE6DD04EF4C7C1D3105568E7FB7C1EE16C937', '2018-01-11', NULL),
(181, 76, '1', 'willis', 'bruce', '0123456789', NULL, '1965-05-18', 'bruce.willis@gmail.com', '*3D3D77FB6137134D32E2002D3F5B1CCB27A7601C', '2018-01-12', NULL),
(182, 76, '2', 'Willis', 'Marie', '0123456789', NULL, '2018-01-30', 'mariewillis@gmail.com', '*765FEB38FF2584FFA0376BFB516D6B45F839D7D7', '2018-01-12', NULL),
(183, 76, '1', 'Florant', 'Aymeric', '0123456789', NULL, '2018-01-16', 'aymeric.florant@gmail.com', '*FE4DA3F1188289378E656DFC9576FF4584E80570', '2018-01-12', NULL),
(184, 77, '1', 'isambert', 'charlotte', '0612345678', NULL, '2018-01-22', 'luke.skysqxqwalker@gmail.com', '*CB79A6814789720143FACC8A1FBD2347193BCBF4', '2018-01-12', NULL),
(185, 77, '1', 'Skywalker', 'Luke', '0612345678', NULL, '2018-01-01', 'luke.skywwcxalker@gmail.com', '*CB79A6814789720143FACC8A1FBD2347193BCBF4', '2018-01-12', NULL),
(186, NULL, '1', 'isambert', 'charlotte', '0612345678', NULL, '2018-01-08', 'charlotte.isambert@gmail.com', '*882A23BFB19768E55D14628898FCE79082047ABA', '2018-01-12', '5c97affc30a6e99811c73c31719c80a1'),
(188, NULL, '1', 'Isambert', 'Luke', '0612345678', NULL, '2018-01-08', 'charxlotte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-13', NULL),
(189, NULL, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-30', 'luke.skywdalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-14', NULL),
(190, NULL, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-09', 'luke.skdywalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-14', NULL),
(191, NULL, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-09', 'charlotte.isamberfet@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-15', NULL),
(192, NULL, '1', 'Florant', 'Aymeric', '0612345678', NULL, '2018-01-16', 'aymeric.florant@hotmail.fr', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-15', NULL),
(193, 78, '1', 'Lebec', 'Maxence', '0612345678', NULL, '2018-01-17', 'maxence.lebec@gmail.com', '*121A47AE7406D04D4664276AB7A66F4A6E418816', '2018-01-15', NULL),
(194, 78, '2', 'Lebec', 'Guillaume', '0612345678', NULL, '2018-01-24', 'guillaume.lebec@gmail.com', '*4642DBF045401737B061F507C3405CEA033242AB', '2018-01-15', NULL),
(195, 78, '2', 'Lebec', 'Alexandra', '0612345678', NULL, '2018-01-09', 'alexandra.lebec@gmail.com', '*291BF88EA10EC2D6A735D313D58C749BF7DD9764', '2018-01-15', NULL),
(196, 79, '1', 'Isambert', 'Charlotte', '0234567890', NULL, '2018-01-22', 'charlottce.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-15', NULL),
(197, 80, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-16', 'luke.skywaddlker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-15', NULL),
(198, 81, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-16', 'chharlotte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-15', NULL),
(199, NULL, '1', 'Isambert', 'Luke', '0234567890', NULL, '2018-01-16', 'charlxotte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-15', NULL),
(200, 82, '1', 'Isambert', 'Charlotte', '0234567890', NULL, '2018-01-16', 'lukee.skywalker@gmail.com', '*B1AEE1C8CEDAD3004650AD859DF5F5557433EB8A', '2018-01-16', NULL),
(201, 83, '1', 'Chereau', 'Gael', '0698765432', NULL, '1997-03-16', 'gaelchereau@gmail.com', '*2AB7F50879E6F5499AFFA159C21E6C8511D7423A', '2018-01-16', NULL),
(202, 84, '1', 'Debart', 'Estelle', '0612345678', NULL, '1972-01-20', 'estelle.debart@gmail.com', '*9251C9A39F683F69F88FBDAB0978B377EE6CC7F0', '2018-01-16', NULL),
(203, NULL, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-15', 'charlotte.isammbert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-18', NULL),
(204, NULL, '1', 'Skywalker', 'Luke', '0234567890', NULL, '2018-01-22', 'charloctte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-18', NULL),
(206, 86, '1', 'Coussin', 'Clement', '0612345678', NULL, '2018-01-10', 'clement.coussin@gmail.com', '*88B42108BD087AE67E68F6BD70E55CAC01C36C55', '2018-01-19', NULL),
(207, 86, '2', 'Coussin', 'Marie', '0234567890', NULL, '2018-01-23', 'marie.coussin@gmail.com', '*6BF291330706B7C28754A57E0E70A1BECC33F05B', '2018-01-19', NULL),
(208, 86, '2', 'Charlotte', 'Coussin', '0612345678', NULL, '2018-01-24', 'charlotte.coussin@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-19', NULL),
(209, NULL, '3', 'Maudire_louicellier', 'Ilan', '0123456789', NULL, '1997-05-10', 'ilan.maudire@hotmail.fr', '*1CC711488B648A72A828A03479A787C675A34FC9', '2018-01-19', NULL),
(210, 87, '1', 'Kovarsky', 'Salome', '0682319375', NULL, '1997-11-26', 'salomekovarsky@hotmail.fr', '*0BD48D1B0BB21A2BAE558F57EE586D5CEC2BEDD7', '2018-01-19', NULL),
(211, 88, '1', 'Florant', 'Aymeric', '0612345678', NULL, '2017-12-31', 'aymeric.florant@isep.fr', '*ED9FA3C28D5DBCF466E82CDCB82BBB2763BE7AD7', '2018-01-20', NULL),
(212, NULL, '1', 'Skywalker', 'Charlotte', '0712345644', NULL, '2018-01-23', 'luke.sckywalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-21', NULL),
(213, NULL, '1', 'Isambert', 'Luke', '0612345678', NULL, '2018-01-11', 'charlotte.isallmbert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-21', NULL),
(214, 89, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-18', 'charlotte@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-21', NULL),
(215, 90, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-15', 'charlotte.isxambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-21', NULL),
(216, 90, '1', 'Vajente', 'Tristan', '0612345678', NULL, '2018-01-08', 'tristan.vajente@gmail.com', '*EFFA789CB4ABD6F561D7D6147C6BF36C38387DCA', '2018-01-23', NULL),
(217, 90, '2', 'Vajente', 'Marie', '0612345678', NULL, '2018-01-09', 'marie.vajente@gmail.com', '*6BF291330706B7C28754A57E0E70A1BECC33F05B', '2018-01-23', NULL),
(218, NULL, '4', 'pastre', 'Guillaume', '0656565656', NULL, '2018-01-02', 'guillaume.pastre@gmail.com', '*4642DBF045401737B061F507C3405CEA033242AB', NULL, NULL),
(220, 84, '2', 'Debart', 'Camille', '0612345679', NULL, '2018-01-16', 'camille.debart@gmail.com', '*B88A0710D4E3463863C0BD8E9B18F2CA7E24B465', '2018-01-24', NULL),
(221, 91, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-15', 'charflotte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-24', NULL),
(222, NULL, '1', 'Coussin', 'Charlotte', '0634567890', NULL, '2018-01-09', 'charlochtte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-24', NULL),
(223, NULL, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-02', 'charloctyyte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-24', NULL),
(224, NULL, '1', 'Isambert', 'Luke', '0612345678', NULL, '2018-01-09', 'isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-24', NULL),
(225, 94, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-22', 'charlote.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-24', NULL),
(226, 95, '1', 'Skywalker', 'Charlotte', '0234567890', NULL, '2018-01-08', 'skywalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-24', NULL),
(227, 96, '1', 'Debart', 'Estelle', '0612345678', NULL, '2018-01-17', 'estelle.debart@hotmail.fr', '*669E59CE332956523D9DD39506BD75E853AAABE4', '2018-01-25', NULL),
(228, 96, '2', 'Debart', 'Camille', '0612345676', NULL, '2018-01-22', 'camille.debart@hotmail.fr', '*B88A0710D4E3463863C0BD8E9B18F2CA7E24B465', '2018-01-25', NULL),
(229, 96, '2', 'Debart', 'Henrie', '0612345677', NULL, '2018-01-22', 'henri.debar@hotmail.fr', '*D5BD33E11968C4B2875324A2B06DDDE0D40A638C', '2018-01-25', NULL),
(230, 97, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-16', 'camillle.debart@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-26', NULL),
(231, 97, '2', 'isambert', 'charlotte', '0612345678', NULL, '2018-01-17', 'charloctte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-26', NULL),
(232, 98, '1', 'Lebec', 'Maxence', '0612345678', NULL, '2018-01-18', 'maxence.lebec@hotmail.fr', '*121A47AE7406D04D4664276AB7A66F4A6E418816', '2018-01-26', NULL),
(233, 99, '1', 'Isambert', 'Constance', '0167564554', NULL, '2018-01-02', 'constance.isambert@gmail.com', '*936F88CBF62CBCA21433EA2E45BF84178812D167', '2018-01-26', NULL),
(234, 100, '1', 'Charlotte', 'Constance', '0167564554', NULL, '2018-01-11', 'charlotte.iisambert@hotmail.fr', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-26', NULL),
(235, 101, '1', 'Isambert', 'Ilan', '0167564554', NULL, '2018-01-11', 'afef@hotmail.frff', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-26', NULL),
(236, NULL, '1', 'Isambert', 'Ilan', '0167564554', NULL, '2018-01-04', 'afef@hotmail.frgggg', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-26', NULL),
(237, NULL, '1', 'Charlotte', 'Ilan', '0167564554', NULL, '2018-02-02', 'azefssef@hotmail.fr', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-26', NULL),
(238, NULL, '1', 'Isambert', 'Ilan', '0167564554', NULL, '2018-01-04', 'afef@hotmail.fr', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-26', NULL),
(239, 105, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-10', 'luke.skkkywalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-26', NULL),
(240, 106, '1', 'Isambert', 'Toto', '0612345678', NULL, '2018-01-22', 'maxence.titi@gmail.com', '*A08EFEC2301DF944CBD88487BECAEBA2661E6572', '2018-01-26', NULL),
(241, 107, '1', 'Kovarsky', 'Salome', '0612345678', NULL, '2018-01-15', 'salome.kovarsky@gmail.com', '*644DCA97D25E972652F8DEE6B78BDD2602F7D698', '2018-01-26', NULL),
(246, 108, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-23', 'charlottooe.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-27', NULL),
(250, 108, '1', 'Skywalker', 'Charlotte', '0712345678', NULL, '2018-01-17', 'charlottcce.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-27', NULL),
(252, 109, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-24', 'charlotte.charlotte@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-27', NULL),
(253, 109, '2', 'Charlotte', 'constance', '0712345678', NULL, '2018-01-19', 'constance.charlotte@gmail.com', '*ADAAE744BF648AA0AD8CF1CC63A7619C2CFF2DF6', '2018-01-27', NULL),
(254, 110, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-17', 'charloczdaztte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(255, 110, '2', 'isambert', 'charlotte', '061345678', NULL, '2018-01-17', 'luke.skywalker@gmail.com', '*38D27C1DBAA82359AA5E958BC10296FD1A0E8783', '2018-01-28', NULL),
(256, 111, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-15', 'luke.skqscywalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(257, 111, '2', 'isambert', 'charlotte', '0612345678', NULL, '2018-01-18', 'luke.skywalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(258, 111, '2', 'isambert', 'charlotte', '0612345678', NULL, '2018-01-02', 'luke.skywalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(259, 112, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-16', 'luke.skyqsdwalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(260, 112, '2', 'isambert', 'charlotte', '0612345678', NULL, '2018-01-23', 'luke.skywalker@gmail.com', '*D37F94F1AFAAA33E7644EEEFDF5C2398C42872E7', '2018-01-28', NULL),
(261, 113, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-16', 'luke.skcccywalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(263, 113, '1', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-18', 'luke.skywwwwwalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(264, 113, '2', 'Isambert', 'Charlotte', '0612345678', NULL, '2018-01-02', 'luke.skywzzzalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(266, 113, '2', 'Isambert', 'Fff', '0612345678', NULL, '2018-01-08', 'charcclotte.isambert@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(267, 114, '1', 'B', 'A', '0612345678', NULL, '2018-01-10', 'luke.sckywcalker@gmail.com', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-28', NULL),
(269, NULL, '1', 'Ilan', 'Ilan', '0192842948', NULL, '2929-09-29', 'cnjqsn@gjzi.fr', '*6565D226BD84EDC99FF8832929D9F56DF85D10D4', '2018-01-29', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acces_utilisateur_secondaire`
--
ALTER TABLE `acces_utilisateur_secondaire`
  ADD CONSTRAINT `cle_etrangere_salle_acces` FOREIGN KEY (`ID_salle`) REFERENCES `salle` (`ID_salle`),
  ADD CONSTRAINT `cle_etrangere_utilisateur_acces` FOREIGN KEY (`ID_utilisateur`) REFERENCES `utilisateur` (`ID_utilisateur`);

--
-- Contraintes pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD CONSTRAINT `cle_etrangere_cemac_actionneur` FOREIGN KEY (`ID_cemac`) REFERENCES `cemac` (`ID_cemac`),
  ADD CONSTRAINT `cle_etrangere_type_actionneur_actionneur` FOREIGN KEY (`ID_type_actionneur`) REFERENCES `type_d_actionneur` (`ID_type_d_actionneur`);

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `cle_etrangere_cemac_capteur` FOREIGN KEY (`ID_cemac`) REFERENCES `cemac` (`ID_cemac`),
  ADD CONSTRAINT `cle_etrangere_type_capteur_capteur` FOREIGN KEY (`ID_type_de_capteur`) REFERENCES `type_de_capteur` (`ID_type_de_capteur`);

--
-- Contraintes pour la table `cemac`
--
ALTER TABLE `cemac`
  ADD CONSTRAINT `cle_etrangere_logement_cemac` FOREIGN KEY (`ID_logement`) REFERENCES `logement` (`ID_logement`),
  ADD CONSTRAINT `cle_etrangere_nom_salle_cemac` FOREIGN KEY (`ID_salle`) REFERENCES `salle` (`ID_salle`);

--
-- Contraintes pour la table `donnees_capteur`
--
ALTER TABLE `donnees_capteur`
  ADD CONSTRAINT `cle_etrangere_capteur_donnees` FOREIGN KEY (`ID_capteur`) REFERENCES `capteur` (`ID_capteur`);

--
-- Contraintes pour la table `ordonne_ordre_actionneur`
--
ALTER TABLE `ordonne_ordre_actionneur`
  ADD CONSTRAINT `cle_etrangere_actionneur_ordone_ordre_actionneur` FOREIGN KEY (`ID_actionneur`) REFERENCES `actionneur` (`ID_actionneur`),
  ADD CONSTRAINT `cle_etrangere_ordre_ordonne_ordre_actionneur` FOREIGN KEY (`ID_ordre`) REFERENCES `ordre` (`ID_ordre`);

--
-- Contraintes pour la table `ordonne_routine_actionneur`
--
ALTER TABLE `ordonne_routine_actionneur`
  ADD CONSTRAINT `cle_etrangere_actionneur_ordonne_routine_actionneur` FOREIGN KEY (`ID_actionneur`) REFERENCES `actionneur` (`ID_actionneur`),
  ADD CONSTRAINT `cle_etrangere_routine_ordonne_routine_actionneur` FOREIGN KEY (`ID_routine`) REFERENCES `routine` (`ID_routine`);

--
-- Contraintes pour la table `ordre`
--
ALTER TABLE `ordre`
  ADD CONSTRAINT `cle_etrangere_logement_ordre` FOREIGN KEY (`ID_logement`) REFERENCES `logement` (`ID_logement`),
  ADD CONSTRAINT `cle_etrangere_type_capteur_ordre` FOREIGN KEY (`ID_type_de_capteur`) REFERENCES `type_de_capteur` (`ID_type_de_capteur`),
  ADD CONSTRAINT `cle_etrangere_utilisateur_ordre` FOREIGN KEY (`ID_utilisateur`) REFERENCES `utilisateur` (`ID_utilisateur`);

--
-- Contraintes pour la table `routine`
--
ALTER TABLE `routine`
  ADD CONSTRAINT `cle_etrangere_logement_routine` FOREIGN KEY (`ID_logement`) REFERENCES `logement` (`ID_logement`),
  ADD CONSTRAINT `cle_etrangere_utilisateur_routine` FOREIGN KEY (`ID_utilisateur`) REFERENCES `utilisateur` (`ID_utilisateur`);

--
-- Contraintes pour la table `routine_capteur`
--
ALTER TABLE `routine_capteur`
  ADD CONSTRAINT `cle_etrangere_capteur_routine_capteur` FOREIGN KEY (`ID_capteur`) REFERENCES `capteur` (`ID_capteur`),
  ADD CONSTRAINT `cle_etrangere_routine_routine_capteur` FOREIGN KEY (`ID_routine`) REFERENCES `routine` (`ID_routine`);

--
-- Contraintes pour la table `routine_jour`
--
ALTER TABLE `routine_jour`
  ADD CONSTRAINT `cle_etrangere_routine_routine_jour` FOREIGN KEY (`ID_routine`) REFERENCES `routine` (`ID_routine`);

--
-- Contraintes pour la table `routine_salle`
--
ALTER TABLE `routine_salle`
  ADD CONSTRAINT `cle_etrangere_routine_routine_salle` FOREIGN KEY (`ID_routine`) REFERENCES `routine` (`ID_routine`),
  ADD CONSTRAINT `cle_etrangere_salle_routine_salle` FOREIGN KEY (`ID_salle`) REFERENCES `salle` (`ID_salle`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `cle_etrangere_cemac_salle` FOREIGN KEY (`ID_cemac`) REFERENCES `cemac` (`ID_cemac`),
  ADD CONSTRAINT `cle_etrangere_logement_salle` FOREIGN KEY (`ID_logement`) REFERENCES `logement` (`ID_logement`),
  ADD CONSTRAINT `cle_etrangere_type_salle_salle` FOREIGN KEY (`ID_type_salle`) REFERENCES `type_de_salle` (`ID_type_de_salle`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `cle_etrangere_logement_utilisateur` FOREIGN KEY (`ID_logement`) REFERENCES `logement` (`ID_logement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
