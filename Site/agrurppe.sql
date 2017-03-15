-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Mars 2017 à 15:18
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `agrurppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE IF NOT EXISTS `adherent` (
  `dateAdhesion` date NOT NULL,
  `idProducteur` int(11) NOT NULL,
  PRIMARY KEY (`dateAdhesion`),
  UNIQUE KEY `idProducteur` (`idProducteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`dateAdhesion`, `idProducteur`) VALUES
('2017-03-06', 9);

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE IF NOT EXISTS `avoir` (
  `dateObtention` date NOT NULL,
  `idProducteur` int(11) NOT NULL,
  `idCertificat` int(11) NOT NULL,
  UNIQUE KEY `idProducteur` (`idProducteur`),
  UNIQUE KEY `idCertificat` (`idCertificat`),
  UNIQUE KEY `idCertificat_2` (`idCertificat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `certificat`
--

CREATE TABLE IF NOT EXISTS `certificat` (
  `idCertificat` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCertificat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idCertificat`),
  UNIQUE KEY `idCertificat` (`idCertificat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(25) DEFAULT NULL,
  `adresseClient` varchar(255) DEFAULT NULL,
  `nomRespAchat` varchar(25) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `idUser` (`idUser`),
  UNIQUE KEY `idClient` (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `adresseClient`, `nomRespAchat`, `idUser`) VALUES
(8, 'jules', '12 avenue d ypres', 'marc', 30);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `numeroCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date DEFAULT NULL,
  `numLots` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`numeroCommande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`numeroCommande`, `dateCommande`, `numLots`, `idClient`) VALUES
(4, '2017-03-06', 7, 8),
(5, '2017-03-06', 7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `idCom` int(11) NOT NULL AUTO_INCREMENT,
  `nomCom` varchar(25) DEFAULT NULL,
  `aoc_o_n_` char(25) DEFAULT NULL,
  PRIMARY KEY (`idCom`),
  UNIQUE KEY `idCom` (`idCom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Contenu de la table `commune`
--

INSERT INTO `commune` (`idCom`, `nomCom`, `aoc_o_n_`) VALUES
(65, 'arles', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `comporter`
--

CREATE TABLE IF NOT EXISTS `comporter` (
  `quantite` int(11) NOT NULL,
  `numeroCommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comporter`
--

INSERT INTO `comporter` (`quantite`, `numeroCommande`) VALUES
(1750, 0),
(31500, 0),
(33500, 3),
(45000, 4),
(45000, 4);

-- --------------------------------------------------------

--
-- Structure de la table `conditionnement`
--

CREATE TABLE IF NOT EXISTS `conditionnement` (
  `idCond` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCond` varchar(25) DEFAULT NULL,
  `poidsCond` float DEFAULT NULL,
  `dateCond` date DEFAULT NULL,
  `numeroCommande` int(11) NOT NULL,
  PRIMARY KEY (`idCond`),
  UNIQUE KEY `idCond` (`idCond`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE IF NOT EXISTS `livraison` (
  `idLivraison` int(11) NOT NULL AUTO_INCREMENT,
  `dateLiv` date DEFAULT NULL,
  `typeProduitLiv` varchar(25) DEFAULT NULL,
  `quantiteLiv` int(11) DEFAULT NULL,
  `idVergers` int(11) NOT NULL,
  PRIMARY KEY (`idLivraison`),
  UNIQUE KEY `idLivraison` (`idLivraison`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`idLivraison`, `dateLiv`, `typeProduitLiv`, `quantiteLiv`, `idVergers`) VALUES
(8, '2017-03-06', 'entiere seche', 456, 107);

-- --------------------------------------------------------

--
-- Structure de la table `lots`
--

CREATE TABLE IF NOT EXISTS `lots` (
  `numLots` int(11) NOT NULL AUTO_INCREMENT,
  `calibreLot` float DEFAULT NULL,
  `idLivraison` int(11) NOT NULL,
  PRIMARY KEY (`numLots`),
  UNIQUE KEY `numLots` (`numLots`),
  UNIQUE KEY `idLivraison` (`idLivraison`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `lots`
--

INSERT INTO `lots` (`numLots`, `calibreLot`, `idLivraison`) VALUES
(7, 22, 8);

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

CREATE TABLE IF NOT EXISTS `producteur` (
  `idProducteur` int(11) NOT NULL AUTO_INCREMENT,
  `nomProd` varchar(25) DEFAULT NULL,
  `prenomProd` varchar(25) DEFAULT NULL,
  `nomSociete` varchar(25) DEFAULT NULL,
  `adresseSociete` varchar(255) DEFAULT NULL,
  `nomRespProd` varchar(25) DEFAULT NULL,
  `prenomRespProd` varchar(25) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idProducteur`),
  UNIQUE KEY `idProducteur` (`idProducteur`),
  UNIQUE KEY `iUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `producteur`
--

INSERT INTO `producteur` (`idProducteur`, `nomProd`, `prenomProd`, `nomSociete`, `adresseSociete`, `nomRespProd`, `prenomRespProd`, `idUser`) VALUES
(9, 'Dupont', 'Jean', 'LaVoixDesNoix', '12', 'Lepras', 'Eric', 29);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `profil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `mdp`, `profil`) VALUES
(13, 'Tanguy', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'administrateur'),
(28, 'Benoit', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'administrateur'),
(29, 'jean ', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'producteur'),
(30, 'jules', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'client');

--
-- Déclencheurs `user`
--
DROP TRIGGER IF EXISTS `verification`;
DELIMITER //
CREATE TRIGGER `verification` BEFORE INSERT ON `user`
 FOR EACH ROW IF exists(SELECT login FROM USER WHERE login =  NEW.login) 
THEN	
	signal sqlstate '45000' set message_text = 'Tentative d'insertion d'un nom qui existe';
END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

CREATE TABLE IF NOT EXISTS `variete` (
  `idVar` int(11) NOT NULL AUTO_INCREMENT,
  `libelleVar` varchar(25) DEFAULT NULL,
  `aoc_o_n_` char(25) DEFAULT NULL,
  PRIMARY KEY (`idVar`),
  UNIQUE KEY `idVar` (`idVar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `variete`
--

INSERT INTO `variete` (`idVar`, `libelleVar`, `aoc_o_n_`) VALUES
(1, 'franquette', 'o'),
(2, 'mayette', 'o'),
(3, 'parisienne', 'o');

-- --------------------------------------------------------

--
-- Structure de la table `vergers`
--

CREATE TABLE IF NOT EXISTS `vergers` (
  `idVergers` int(11) NOT NULL AUTO_INCREMENT,
  `nomVerger` varchar(25) DEFAULT NULL,
  `superficie` varchar(25) DEFAULT NULL,
  `hectare` int(11) DEFAULT NULL,
  `idVar` int(11) NOT NULL,
  `idCom` int(11) NOT NULL,
  `IdProducteur` int(11) NOT NULL,
  PRIMARY KEY (`idVergers`),
  UNIQUE KEY `idVergers` (`idVergers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Contenu de la table `vergers`
--

INSERT INTO `vergers` (`idVergers`, `nomVerger`, `superficie`, `hectare`, `idVar`, `idCom`, `IdProducteur`) VALUES
(107, 'Kiribati', '1250', 6, 2, 65, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
