-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 31 jan. 2018 à 21:49
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`ID_capteur`, `ID_logement`, `ID_cemac`, `ID_type_de_capteur`, `nom_salle`, `nom_capteur`, `date_d_ajout_capteur`, `etat_capteur`, `donnee_envoyee_capteur`, `donnee_recue_capteur`) VALUES
(1, 1, 1, 1, 'Salon', 'Présence', '2018-01-30', 1, NULL, 'ON'),
(2, 1, 1, 3, 'Salon', 'Humidité', '2018-01-30', 1, '73', '59'),
(3, 1, 1, 4, 'Salon', 'Température', '2018-01-30', 1, '15', '19'),
(4, 1, 1, 5, 'Salon', 'Lumière', '2018-01-30', 1, 'Eteindre', 'Allumé'),
(5, 1, 1, 4, 'Cuisine', 'Température', '2018-01-30', 1, '15', '20'),
(6, 1, 1, 5, 'Cuisine', 'Lumière', '2018-01-30', 1, NULL, 'Eteint'),
(7, 1, 1, 4, 'Chambre de Victoria', 'Température', '2018-01-30', 1, '15', '21'),
(8, 1, 1, 5, 'Chambre de Victoria', 'Lumière', '2018-01-30', 1, 'Eteindre', 'Allumé'),
(9, 1, 1, 2, 'Chambre de Victoria', 'Volets', '2018-01-30', 2, NULL, NULL),
(10, 1, 1, 7, 'Chambre de Victoria', 'Mouvement', '2018-01-30', 1, NULL, 'ON'),
(14, 1, 1, 11, 'Cuisine', 'Electricité', '2018-01-30', 1, 'ON', '1765'),
(16, 1, 1, 12, 'Cuisine', 'Eau', '2018-01-31', 1, NULL, '339');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cemac`
--

INSERT INTO `cemac` (`ID_cemac`, `ID_salle`, `ID_logement`, `etat_cemac`, `numero_de_cemac`) VALUES
(1, NULL, 1, 2, 'ADRC4'),
(2, NULL, 1, 1, 'RDH7T'),
(3, NULL, 2, 2, 'ROBGU'),
(4, NULL, 2, 1, '57T4D'),
(5, NULL, NULL, 2, '8HOD5'),
(6, NULL, NULL, 2, '7HJ9G');

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
  `date_d_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`ID_faq`, `question_faq`, `reponse_faq`) VALUES
(1, 'Comment ajouter un utilisateur secondaire ?', 'Allez dans l\'onglet Profil puis dans la section \"Utilisateur secondaire\". Cliquez sur le bouton \"Editer\" puis sur \"Ajouter un utilisateur secondaire\".'),
(2, 'Comment ajouter un CeMac ?', 'Allez dans la page Profil puis dans la section \"Mon logement\", cliquez sur \"Editer\". Vous verrez un champs \"Numéro de série de votre CeMac\" où vous pourrez entrer le numéro de série qui se situe sur la boîte de votre CeMac.'),
(3, 'Je ne me souviens plus de mon mot de passe. Que faire ?', 'Retournez sur la page de connexion. Cliquez sur \"Mot de passe oublié\". Entrez votre adresse mail. Un mail vous sera envoyé à cette adresse contenant un mot de passe provisoire que vous pourrez changer, une fois connecté, dans l\'onglet profil.'),
(4, 'Comment changer mon mot de passe ?', 'Allez dans l\'onglet Profil puis dans la section \"Mon profil\". Cliquez sur le bouton \"Editer\". Vous verrez un champ d\'édition du mot de passe apparaître. ');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`ID_logement`, `type_logement`, `telephone_logement`, `superficie_totale_logement`, `numero_rue_logement`, `nom_rue_logement`, `code_postale_logement`, `ville_logement`, `pays_logement`) VALUES
(1, NULL, '0123456789', NULL, 55, 'Rue du Faubourg Saint-Honoré', 75008, 'Paris', 'France'),
(2, NULL, '0923456789', NULL, 60, 'Rue de Sèvres', 75007, 'Paris', 'France');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ordre`
--

INSERT INTO `ordre` (`ID_ordre`, `ID_utilisateur`, `ID_logement`, `ID_type_de_capteur`, `nom_salle`, `valeur_ordre`, `etat_ordre`, `date_d_ajout_ordre`) VALUES
(4, 3, 1, 12, 'home', 'ON', 1, '2018-01-30'),
(5, 3, 1, 11, 'home', 'ON', 1, '2018-01-30'),
(6, 5, 1, 3, 'Salon', '68', 1, '2018-01-30'),
(7, 5, 1, 3, 'Salon', '71', 1, '2018-01-30'),
(8, 5, 1, 4, 'home', '15', 1, '2018-01-30'),
(9, 5, 1, 3, 'Salon', '98', 1, '2018-01-30'),
(10, 5, 1, 3, 'Salon', '34', 1, '2018-01-30'),
(11, 5, 1, 3, 'Salon', '1', 1, '2018-01-30'),
(12, 5, 1, 5, 'Chambre de Victoria', 'Eteindre', 1, '2018-01-30'),
(13, 3, 1, 3, 'home', '87', 1, '2018-01-31'),
(14, 5, 1, 3, 'home', '73', 1, '2018-01-31');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `routine`
--

INSERT INTO `routine` (`ID_routine`, `ID_utilisateur`, `ID_logement`, `etat_routine`, `type_routine`, `date_d_ajout_routine`, `nom_routine`) VALUES
(1, 3, 1, NULL, NULL, '2018-01-30 20:46:43', 'Allumer les lumières'),
(2, 3, 1, NULL, NULL, '2018-01-30 20:47:42', 'Routine du soir'),
(3, 3, 1, NULL, NULL, '2018-01-30 20:48:32', 'Routine de Victoria');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `routine_capteur`
--

INSERT INTO `routine_capteur` (`ID_routine_capteur`, `ID_routine`, `ID_capteur`, `ordre`) VALUES
(1, 1, 4, 'Allumer'),
(2, 2, 3, '23'),
(3, 2, 5, '23'),
(4, 2, 7, '23'),
(5, 2, 4, 'Eteindre'),
(6, 2, 6, 'Eteindre'),
(7, 2, 8, 'Eteindre'),
(8, 2, 9, 'Fermer'),
(9, 3, 8, 'Allumer'),
(10, 3, 9, 'Ouvrir');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `routine_jour`
--

INSERT INTO `routine_jour` (`ID_routine_jour`, `ID_routine`, `jour_routine`, `heure_debut_routine`, `heure_fin_routine`) VALUES
(1, 1, 'Lundi', '08:00:00', '20:00:00'),
(2, 1, 'Mardi', '08:00:00', '20:00:00'),
(3, 1, 'Mercredi', '08:00:00', '20:00:00'),
(4, 1, 'Jeudi', '08:00:00', '20:00:00'),
(5, 1, 'Vendredi', '08:00:00', '20:00:00'),
(6, 1, 'Samedi', '08:00:00', '20:00:00'),
(7, 1, 'Dimanche', '08:00:00', '20:00:00'),
(8, 2, 'Lundi', '22:00:00', '06:00:00'),
(9, 2, 'Mardi', '22:00:00', '06:00:00'),
(10, 2, 'Mercredi', '22:00:00', '06:00:00'),
(11, 2, 'Jeudi', '22:00:00', '06:00:00'),
(12, 2, 'Vendredi', '22:00:00', '06:00:00'),
(13, 2, 'Samedi', '22:00:00', '06:00:00'),
(14, 2, 'Dimanche', '22:00:00', '06:00:00'),
(15, 3, 'Mardi', '09:00:00', '22:00:00'),
(16, 3, 'Vendredi', '09:00:00', '22:00:00'),
(17, 3, 'Samedi', '09:00:00', '22:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `routine_salle`
--

INSERT INTO `routine_salle` (`ID_routine_salle`, `ID_routine`, `ID_salle`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 2, 3),
(5, 3, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`ID_salle`, `ID_logement`, `ID_cemac`, `ID_type_salle`, `nom_salle`, `superficie_salle`) VALUES
(1, 1, NULL, 2, 'Salon', NULL),
(2, 1, NULL, 3, 'Cuisine', NULL),
(3, 1, NULL, 1, 'Chambre de Victoria', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_de_salle`
--

INSERT INTO `type_de_salle` (`ID_type_de_salle`, `nom_type_de_salle`) VALUES
(1, 'Chambre'),
(2, 'Salon'),
(3, 'Cuisine'),
(4, 'Salle à manger'),
(5, 'Salle de bain'),
(6, 'Toilettes'),
(7, 'Jardin'),
(8, 'Cave'),
(9, 'Bureau'),
(10, 'Salle de jeux'),
(11, 'Vestibule');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `ID_logement`, `type_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `telephone_1_utilisateur`, `telephone_2_utilisateur`, `date_de_naissance_utilisateur`, `adresse_mail_utilisateur`, `mot_de_passe_utilisateur`, `date_d_ajout_utilisateur`, `token_mdp`) VALUES
(1, NULL, '3', 'Hoikos', 'Administrateur', '0123456789', NULL, '1977-01-01', 'administrateur.hoikos@gmail.com', '*1D05FF88D0E82988A8D0DD0200529ECAA0BA78F7', '2018-01-30', NULL),
(2, NULL, '4', 'Hoikos', 'Commercial', '0123456789', NULL, '1988-01-09', 'commercial.hoikos@gmail.com', '*3290312B4F35C4C56523CAC5E1453AC3783D1EBB', '2018-01-30', NULL),
(3, 1, '1', 'Kovarsky', 'Delphine', '0612345678', NULL, '1970-01-13', 'delphine.kovarsky@gmail.com', '*93B6B6309BA1BCC10C4D8840EEA681822DDE5BEB', '2018-01-30', NULL),
(4, 1, '2', 'Kovarsky', 'Damien', '0612345678', NULL, '1968-01-17', 'damien.kovarsky@gmail.com', '*56BF4968404FCE3B5B4DF473FAF3E6FD9E314603', '2018-01-30', NULL),
(5, 1, '2', 'Kovarsky', 'Victoria', '0612345678', NULL, '2001-01-09', 'victoria.kovarsky@gmail.com', '*6F2FE8456F5B75CD1AA645013FE6DD381BE313D3', '2018-01-30', NULL);

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
