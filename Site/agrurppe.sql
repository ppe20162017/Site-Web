-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
<<<<<<< HEAD
-- Généré le :  Jeu 16 Mars 2017 à 09:12
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12
=======
-- Généré le :  Mer 05 Avril 2017 à 12:34
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25
>>>>>>> origin/master

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agrurppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `dateAdhesion` date NOT NULL,
  `idProducteur` int(11) NOT NULL
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

CREATE TABLE `avoir` (
  `dateObtention` date NOT NULL,
  `idProducteur` int(11) NOT NULL,
  `idCertificat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `certificat`
--

CREATE TABLE `certificat` (
  `idCertificat` int(11) NOT NULL,
  `libelleCertificat` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `nomClient` varchar(25) DEFAULT NULL,
  `adresseClient` varchar(255) DEFAULT NULL,
  `nomRespAchat` varchar(25) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `adresseClient`, `nomRespAchat`, `idUser`) VALUES
(8, 'jules', '12 avenue d ypres', 'marc', 30);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `numeroCommande` int(11) NOT NULL,
  `dateCommande` date DEFAULT NULL,
  `numLots` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`numeroCommande`, `dateCommande`, `numLots`, `idClient`) VALUES
(4, '2017-03-06', 7, 8),
(5, '2017-03-06', 7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `commandejava`
--

CREATE TABLE `commandejava` (
  `idCommandeJava` int(11) NOT NULL,
  `conditionnementJava` varchar(25) DEFAULT NULL,
  `quantiteJava` int(11) DEFAULT NULL,
  `dateConditionnement` date DEFAULT NULL,
  `dateEnvoi` date DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idProduitJava` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commandejava`
--

INSERT INTO `commandejava` (`idCommandeJava`, `conditionnementJava`, `quantiteJava`, `dateConditionnement`, `dateEnvoi`, `idUser`, `idProduitJava`) VALUES
(2, 'carton', 23, '0117-03-02', '0117-04-21', 45, 1),
(3, 'sachet', 23, '0117-01-02', '0117-03-06', 46, 2),
(4, 'sachet', 23, '0117-01-02', '0117-03-06', 45, 3);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `idCom` int(11) NOT NULL,
  `nomCom` varchar(25) DEFAULT NULL,
  `aoc_o_n_` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commune`
--

INSERT INTO `commune` (`idCom`, `nomCom`, `aoc_o_n_`) VALUES
(65, 'arles', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `comporter`
--

CREATE TABLE `comporter` (
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

CREATE TABLE `conditionnement` (
  `idCond` int(11) NOT NULL,
  `libelleCond` varchar(25) DEFAULT NULL,
  `poidsCond` float DEFAULT NULL,
  `dateCond` date DEFAULT NULL,
  `numeroCommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `conditionnement`
--

INSERT INTO `conditionnement` (`idCond`, `libelleCond`, `poidsCond`, `dateCond`, `numeroCommande`) VALUES
(1, 'type1', NULL, NULL, 1),
(2, 'type1', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `idLivraison` int(11) NOT NULL,
  `dateLiv` date DEFAULT NULL,
  `typeProduitLiv` varchar(25) DEFAULT NULL,
  `quantiteLiv` int(11) DEFAULT NULL,
  `idVergers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`idLivraison`, `dateLiv`, `typeProduitLiv`, `quantiteLiv`, `idVergers`) VALUES
(8, '2017-03-06', 'entiere seche', 456, 107);

-- --------------------------------------------------------

--
-- Structure de la table `lots`
--

CREATE TABLE `lots` (
  `numLots` int(11) NOT NULL,
  `calibreLot` float DEFAULT NULL,
  `idLivraison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lots`
--

INSERT INTO `lots` (`numLots`, `calibreLot`, `idLivraison`) VALUES
(7, 22, 8);

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

CREATE TABLE `producteur` (
  `idProducteur` int(11) NOT NULL,
  `nomProd` varchar(25) DEFAULT NULL,
  `prenomProd` varchar(25) DEFAULT NULL,
  `nomSociete` varchar(25) DEFAULT NULL,
  `adresseSociete` varchar(255) DEFAULT NULL,
  `nomRespProd` varchar(25) DEFAULT NULL,
  `prenomRespProd` varchar(25) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `producteur`
--

INSERT INTO `producteur` (`idProducteur`, `nomProd`, `prenomProd`, `nomSociete`, `adresseSociete`, `nomRespProd`, `prenomRespProd`, `idUser`) VALUES
(9, 'Dupont', 'Jean', 'LaVoixDesNoix', '12', 'Lepras', 'Eric', 29);

-- --------------------------------------------------------

--
-- Structure de la table `produitjava`
--

CREATE TABLE `produitjava` (
  `idProduitJava` int(11) NOT NULL,
  `varieteJava` varchar(25) DEFAULT NULL,
  `typeJava` varchar(25) DEFAULT NULL,
  `calibreJava` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produitjava`
--

INSERT INTO `produitjava` (`idProduitJava`, `varieteJava`, `typeJava`, `calibreJava`) VALUES
(1, 'mayette', 'type1', 45),
(2, 'fayette', 'type2', 23),
(3, 'mayette', 'type3', 79);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `mdp`, `profil`) VALUES
(13, 'Tanguy', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'administrateur'),
(28, 'Benoit', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'administrateur'),
(29, 'jean ', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'producteur'),
(30, 'jules', '$2a$11$202cb962ac59075b964b0uP8Z0HFNzrua481kU2zRChVrxfjr9tAS', 'client'),
(31, 'bd', '123', 'administrateur'),
(45, 'dist1', '123', 'distributeur'),
(46, 'dist2', '123', 'distributeur');

--
-- Déclencheurs `user`
--
DELIMITER $$
CREATE TRIGGER `verification` BEFORE INSERT ON `user` FOR EACH ROW IF exists(SELECT login FROM USER WHERE login =  NEW.login) 
THEN	
	signal sqlstate '45000' set message_text = "Tentative d'insertion d'un nom qui existe";
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

CREATE TABLE `variete` (
  `idVar` int(11) NOT NULL,
  `libelleVar` varchar(25) DEFAULT NULL,
  `aoc_o_n_` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `variete`
--

INSERT INTO `variete` (`idVar`, `libelleVar`, `aoc_o_n_`) VALUES
(1, 'franquette', 'o'),
(2, 'mayette', 'o'),
(3, 'parisienne', 'o'),
(4, 'variété1', NULL),
(5, 'variété1', NULL),
(6, 'variété1', NULL),
(7, 'variété1', NULL),
(8, 'variété1', NULL),
(9, 'variété1', NULL),
(10, 'variété1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vergers`
--

CREATE TABLE `vergers` (
  `idVergers` int(11) NOT NULL,
  `nomVerger` varchar(25) DEFAULT NULL,
  `superficie` varchar(25) DEFAULT NULL,
  `hectare` int(11) DEFAULT NULL,
  `idVar` int(11) NOT NULL,
  `idCom` int(11) NOT NULL,
  `IdProducteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vergers`
--

INSERT INTO `vergers` (`idVergers`, `nomVerger`, `superficie`, `hectare`, `idVar`, `idCom`, `IdProducteur`) VALUES
(107, 'Kiribati', '1250', 6, 2, 65, 9);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`dateAdhesion`),
  ADD UNIQUE KEY `idProducteur` (`idProducteur`);

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD UNIQUE KEY `idProducteur` (`idProducteur`),
  ADD UNIQUE KEY `idCertificat` (`idCertificat`),
  ADD UNIQUE KEY `idCertificat_2` (`idCertificat`);

--
-- Index pour la table `certificat`
--
ALTER TABLE `certificat`
  ADD PRIMARY KEY (`idCertificat`),
  ADD UNIQUE KEY `idCertificat` (`idCertificat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `idUser` (`idUser`),
  ADD UNIQUE KEY `idClient` (`idClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`numeroCommande`);

--
-- Index pour la table `commandejava`
--
ALTER TABLE `commandejava`
  ADD PRIMARY KEY (`idCommandeJava`),
  ADD KEY `FK_commandeJava_idUser` (`idUser`),
  ADD KEY `FK_commandeJava_idProduitJava` (`idProduitJava`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`idCom`),
  ADD UNIQUE KEY `idCom` (`idCom`);

--
-- Index pour la table `conditionnement`
--
ALTER TABLE `conditionnement`
  ADD PRIMARY KEY (`idCond`),
  ADD UNIQUE KEY `idCond` (`idCond`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`idLivraison`),
  ADD UNIQUE KEY `idLivraison` (`idLivraison`);

--
-- Index pour la table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`numLots`),
  ADD UNIQUE KEY `numLots` (`numLots`),
  ADD UNIQUE KEY `idLivraison` (`idLivraison`);

--
-- Index pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD PRIMARY KEY (`idProducteur`),
  ADD UNIQUE KEY `idProducteur` (`idProducteur`),
  ADD UNIQUE KEY `iUser` (`idUser`);

--
-- Index pour la table `produitjava`
--
ALTER TABLE `produitjava`
  ADD PRIMARY KEY (`idProduitJava`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `idUser` (`idUser`);

--
-- Index pour la table `variete`
--
ALTER TABLE `variete`
  ADD PRIMARY KEY (`idVar`),
  ADD UNIQUE KEY `idVar` (`idVar`);

--
-- Index pour la table `vergers`
--
ALTER TABLE `vergers`
  ADD PRIMARY KEY (`idVergers`),
  ADD UNIQUE KEY `idVergers` (`idVergers`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `certificat`
--
ALTER TABLE `certificat`
  MODIFY `idCertificat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `numeroCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commandejava`
--
ALTER TABLE `commandejava`
  MODIFY `idCommandeJava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `conditionnement`
--
ALTER TABLE `conditionnement`
  MODIFY `idCond` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `idLivraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `lots`
--
ALTER TABLE `lots`
  MODIFY `numLots` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `producteur`
--
ALTER TABLE `producteur`
  MODIFY `idProducteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `produitjava`
--
ALTER TABLE `produitjava`
  MODIFY `idProduitJava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `variete`
--
ALTER TABLE `variete`
  MODIFY `idVar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `vergers`
--
ALTER TABLE `vergers`
  MODIFY `idVergers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commandejava`
--
ALTER TABLE `commandejava`
  ADD CONSTRAINT `FK_commandeJava_idProduitJava` FOREIGN KEY (`idProduitJava`) REFERENCES `produitjava` (`idProduitJava`),
  ADD CONSTRAINT `FK_commandeJava_idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
