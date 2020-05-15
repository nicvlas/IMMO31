-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 09 Mai 2019 à 15:22
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd_immo31`
--

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

CREATE TABLE IF NOT EXISTS `bien` (
  `codedossier` int(11) NOT NULL AUTO_INCREMENT,
  `prixvente` int(11) DEFAULT NULL,
  `adresse` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `codepostal` int(11) DEFAULT NULL,
  `ville` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `surface` int(11) DEFAULT NULL,
  `descriptif` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `codetype` int(11) DEFAULT NULL,
  PRIMARY KEY (`codedossier`),
  KEY `fk_bien` (`codetype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Contenu de la table `bien`
--

INSERT INTO `bien` (`codedossier`, `prixvente`, `adresse`, `codepostal`, `ville`, `surface`, `descriptif`, `photo`, `codetype`) VALUES
(1, 73000, '11 rue des merles', 31700, 'BLAGNAC', 16, 'Studette', 'image1', 1),
(2, 100000, '12 rue des oiseaux', 31520, 'RAMONVILLE', 65, 'T3 avec balcon', 'image2', 1),
(3, 450000, '15 rue des pies', 31700, 'BLAGNAC', 160, 'maison de ville avec jardinet', 'image3', 2),
(4, 45000, '18 rue des merles', 31140, 'AUCAMVILLE', 10, 'parking en sous-sol', 'image4', 4),
(5, 250000, '25 rue des pinsons', 31700, 'BLAGNAC', 90, 'superbe appartement', 'image5', 1),
(6, 520000, '48 rue des moineaux', 31270, 'CUGNAUX', 200, '2 étages de bureaux', 'image6', 3),
(7, 410000, '30 rue des sansonnets', 31770, 'COLOMIERS', 70, 'cheminée et plafonds moulurés', 'image7', 2),
(8, 120000, '71 rue des mésanges', 31100, 'TOULOUSE', 40, 'charmant T2 en très bon état', 'image8', 1);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `pseudo`, `mdp`) VALUES
(2, 'root', 'btssio');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jjmmaa` date DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` varchar(7) DEFAULT NULL,
  `ville` varchar(40) DEFAULT NULL,
  `mail` varchar(70) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `message` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `jjmmaa`, `nom`, `adresse`, `cp`, `ville`, `mail`, `telephone`, `message`) VALUES
(1, '2019-05-02', 'vite', 'nico', '3154', 'st orens', 'vite@hotmail.fr', '650501562', 'je veux une maison.');

-- --------------------------------------------------------

--
-- Structure de la table `recherches`
--

CREATE TABLE IF NOT EXISTS `recherches` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `recherche` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `recherches`
--

INSERT INTO `recherches` (`id`, `recherche`) VALUES
(1, 'appartement de 1 â‚¬ maximum dans le 31270,'),
(2, 'appartement de 100000 â‚¬ maximum dans le 31100, 31140, 31270, 31520, 31700, 31770,'),
(3, 'parking de 50 â‚¬ maximum dans le 31100, 31140, 31270, 31520, 31700, 31770,'),
(4, 'local professionnel de 150000 â‚¬ maximum dans le 31520,'),
(5, 'appartement de 554645 â‚¬ maximum dans le 31140,');

-- --------------------------------------------------------

--
-- Structure de la table `typelogement`
--

CREATE TABLE IF NOT EXISTS `typelogement` (
  `codetype` int(11) NOT NULL,
  `libelletype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codetype`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typelogement`
--

INSERT INTO `typelogement` (`codetype`, `libelletype`) VALUES
(1, 'Appartement'),
(2, 'Maison'),
(3, 'Local Professionnel'),
(4, 'Parking');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
