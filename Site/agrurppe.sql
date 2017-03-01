-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 01 Mars 2017 à 11:10
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
('2016-12-11', 7),
('2016-12-07', 8);

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

--
-- Contenu de la table `avoir`
--

INSERT INTO `avoir` (`dateObtention`, `idProducteur`, `idCertificat`) VALUES
('2016-12-12', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `certificat`
--

CREATE TABLE IF NOT EXISTS `certificat` (
  `idCertificat` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCertificat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idCertificat`),
  UNIQUE KEY `idCertificat` (`idCertificat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `certificat`
--

INSERT INTO `certificat` (`idCertificat`, `libelleCertificat`) VALUES
(1, 'certifications bio');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(25) DEFAULT NULL,
  `adresseClient` varchar(25) DEFAULT NULL,
  `nomRespAchat` varchar(25) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `idUser` (`idUser`),
  UNIQUE KEY `idClient` (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `adresseClient`, `nomRespAchat`, `idUser`) VALUES
(4, 'Margaux', '3 impasse de pres ', 'Gilles', 11),
(5, 'Lucie', '146 rue de ballon', 'Christophe', 12);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`numeroCommande`, `dateCommande`, `numLots`, `idClient`) VALUES
(3, '2017-01-11', 5, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `commune`
--

INSERT INTO `commune` (`idCom`, `nomCom`, `aoc_o_n_`) VALUES
(63, 'TOUFFLERS', 'oui'),
(64, 'hb', 'non');

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
(33500, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`idLivraison`, `dateLiv`, `typeProduitLiv`, `quantiteLiv`, `idVergers`) VALUES
(6, '2016-12-12', 'entiere seche', 45, 105),
(7, '2016-12-13', 'entiere fraiche', 47, 106);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `lots`
--

INSERT INTO `lots` (`numLots`, `calibreLot`, `idLivraison`) VALUES
(3, 2, 6),
(5, 5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

CREATE TABLE IF NOT EXISTS `producteur` (
  `idProducteur` int(11) NOT NULL AUTO_INCREMENT,
  `nomProd` varchar(25) DEFAULT NULL,
  `prenomProd` varchar(25) DEFAULT NULL,
  `nomSociete` varchar(25) DEFAULT NULL,
  `adresseSociete` varchar(25) DEFAULT NULL,
  `nomRespProd` varchar(25) DEFAULT NULL,
  `prenomRespProd` varchar(25) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idProducteur`),
  UNIQUE KEY `idProducteur` (`idProducteur`),
  UNIQUE KEY `iUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `producteur`
--

INSERT INTO `producteur` (`idProducteur`, `nomProd`, `prenomProd`, `nomSociete`, `adresseSociete`, `nomRespProd`, `prenomRespProd`, `idUser`) VALUES
(7, 'Vandevyver', 'Thomas', 'Noixis', '1 rue des peupliers', 'Vandevyver', 'Thierry', 14),
(8, 'Equinet', 'Laurent', 'VoiNoix', '137 bis rue  de nechin', 'Equinet', 'Claude', 15);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `mdp`, `profil`) VALUES
(11, 'Margaux', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'client'),
(12, 'Lucie', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'client'),
(13, 'Tanguy', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'administrateur'),
(14, 'thomas', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'producteur'),
(15, 'laurent', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'producteur'),
(16, 'hb', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'client');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Contenu de la table `vergers`
--

INSERT INTO `vergers` (`idVergers`, `nomVerger`, `superficie`, `hectare`, `idVar`, `idCom`, `IdProducteur`) VALUES
(105, 'pepiniere', '1200', 6, 2, 63, 8),
(106, 'jhb', 'hj', 45, 2, 64, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
