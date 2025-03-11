-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u6
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 14 Janvier 2020 à 21:45
-- Version du serveur :  5.5.62-0+deb8u1
-- Version de PHP :  5.6.40-0+deb8u5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gpst`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
`idAdministrateur` int(11) NOT NULL,
  `emailAdministrateur` varchar(100) NOT NULL,
  `passAdministrateur` varchar(200) NOT NULL,
  `nomAdministrateur` varchar(50) NOT NULL,
  `prenomAdministrateur` varchar(50) NOT NULL,
  `profilAdministrateur` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdministrateur`, `emailAdministrateur`, `passAdministrateur`, `nomAdministrateur`, `prenomAdministrateur`, `profilAdministrateur`) VALUES
(1, 'reperret@hotmail.com', '4b6ae65148391ea16b3cd7bdc57f8e35', 'PERRET', 'Rémy', 0),
(2, 'contact@richard-gay.com', 'f71dbe52628a3f83a77ab494817525c6', 'PERRET', 'Fabrice', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
`idCommande` int(11) NOT NULL,
  `nomCommande` varchar(100) NOT NULL DEFAULT 'NOM PAR DEFAUT',
  `prenomCommande` varchar(100) DEFAULT NULL,
  `telephoneCommande` varchar(20) DEFAULT NULL,
  `emailCommande` varchar(100) DEFAULT NULL,
  `adresseCommande` varchar(200) DEFAULT NULL,
  `cpCommande` varchar(10) DEFAULT NULL,
  `villeCommande` varchar(30) DEFAULT NULL,
  `dateCreationCommande` datetime DEFAULT NULL,
  `dateFacturationCommande` datetime DEFAULT NULL,
  `liquideCommande` float NOT NULL DEFAULT '0',
  `virementCommande` float NOT NULL DEFAULT '0',
  `chequeCommande` float NOT NULL DEFAULT '0',
  `cbCommande` float NOT NULL DEFAULT '0',
  `dateDerniereModificationCommande` datetime DEFAULT NULL,
  `dateEncaissementCommande` datetime DEFAULT NULL,
  `numeroCommande` bigint(20) DEFAULT NULL,
  `etatCommande` int(11) DEFAULT NULL,
  `remiseCommande` float DEFAULT NULL,
  `commentaireCommande` text,
  `commentaireFactureCommande` text
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `nomCommande`, `prenomCommande`, `telephoneCommande`, `emailCommande`, `adresseCommande`, `cpCommande`, `villeCommande`, `dateCreationCommande`, `dateFacturationCommande`, `liquideCommande`, `virementCommande`, `chequeCommande`, `cbCommande`, `dateDerniereModificationCommande`, `dateEncaissementCommande`, `numeroCommande`, `etatCommande`, `remiseCommande`, `commentaireCommande`, `commentaireFactureCommande`) VALUES
(7, 'FERRIERE', 'Michael', NULL, '', '', '', '', '2020-01-13 10:21:44', '2020-01-13 10:31:50', 0, 0, 0, 225.5, '2020-01-13 10:35:08', '2020-01-13 10:32:30', 2020011300001, 1, NULL, '', ''),
(8, 'AL OTHMAN', 'Ahmed', NULL, '', '', '', '', '2020-01-13 11:33:46', NULL, 0, 0, 0, 0, '2020-01-14 15:50:08', NULL, NULL, 0, NULL, '', ''),
(9, 'BAKER', 'Michael', NULL, '', '', '', '', '2020-01-13 11:47:54', NULL, 0, 0, 0, 0, '2020-01-13 13:05:29', NULL, NULL, 0, NULL, '', ''),
(10, 'MITROVIC', 'Daniel', NULL, '', '', '', '', '2020-01-13 11:49:01', NULL, 0, 0, 0, 0, '2020-01-13 12:52:13', NULL, NULL, 0, NULL, '', ''),
(11, 'BENHAMOU', 'Jonathan', NULL, '', '', '', '', '2020-01-13 16:00:05', NULL, 0, 0, 0, 0, '2020-01-14 08:49:32', NULL, NULL, 0, NULL, '', ''),
(12, 'RADIC', '', NULL, '', '', '', '', '2020-01-13 16:51:01', '2020-01-13 17:11:45', 0, 0, 0, 1064.98, '2020-01-13 17:14:18', '2020-01-13 17:13:35', 2020011300002, 1, NULL, '', ''),
(13, 'KAHN', 'benjamin', NULL, '', '', '', '', '2020-01-13 17:34:35', '2020-01-14 16:20:10', 0, 0, 0, 1635, '2020-01-14 16:21:37', '2020-01-14 16:19:32', 2020011300011, 1, NULL, '', ''),
(14, 'EKEBERG', '', NULL, '', '', '', '', '2020-01-13 17:50:10', '2020-01-13 18:06:49', 0, 0, 0, 1347, '2020-01-14 09:54:48', '2020-01-13 18:07:27', 2020011300004, 1, NULL, '', ''),
(15, 'TADEO', 'JON', NULL, '', '', '', '', '2020-01-13 18:03:18', '2020-01-13 18:03:57', 0, 0, 0, 288, '2020-01-13 18:05:29', '2020-01-13 18:04:24', 2020011300003, 1, NULL, '', ''),
(16, 'BERNON', '', NULL, '', '', '', '', '2020-01-14 08:46:26', '2020-01-14 08:47:07', 0, 0, 0, 282, '2020-01-14 08:47:41', '2020-01-14 08:47:19', 2020011300005, 1, NULL, '', ''),
(17, 'BOS EQUIPEMENT', '', NULL, 'pdidier@bos-equipement.com', '', '73600', 'MOUTIER', '2020-01-14 08:54:07', '2020-01-14 08:54:26', 0, 0, 0, 100.5, '2020-01-14 09:02:03', '2020-01-14 09:01:51', 2020011300006, 1, NULL, '', ''),
(18, 'MARTON', '', NULL, '', '', '', '', '2020-01-14 11:12:59', NULL, 0, 0, 0, 0, '2020-01-14 11:45:27', NULL, NULL, 0, NULL, '', ''),
(19, 'MARTON', '', NULL, '', '', '', '', '2020-01-14 11:41:17', '2020-01-14 11:45:58', 0, 0, 0, 282, '2020-01-14 11:46:17', '2020-01-14 11:43:44', 2020011300007, 1, NULL, '', ''),
(20, 'BARAUD/FERRIERE', '', NULL, '', '', '', '', '2020-01-14 11:47:16', '2020-01-14 11:48:54', 0, 0, 0, 46.5, '2020-01-14 11:51:47', '2020-01-14 11:48:30', 2020011300008, 1, NULL, '', ''),
(21, 'ALSHAHWANI', '', NULL, '', '', '', '', '2020-01-14 11:57:35', NULL, 0, 0, 0, 0, '2020-01-14 15:39:24', NULL, NULL, 0, NULL, '', ''),
(23, 'BERNON', '', NULL, '', '', '', '', '2020-01-14 15:28:17', NULL, 0, 0, 0, 0, '2020-01-14 15:32:10', NULL, NULL, 0, NULL, '', ''),
(24, 'ANTAKI ', '', NULL, '', '', '', '', '2020-01-14 15:28:34', '2020-01-14 15:28:55', 0, 0, 0, 0, '2020-01-14 15:41:08', NULL, 2020011300009, 0, NULL, '', ''),
(25, 'BAUDIN', '', NULL, '', '', '', '', '2020-01-14 15:41:38', '2020-01-14 15:42:58', 0, 0, 0, 0, '2020-01-14 15:43:09', NULL, 2020011300010, 0, NULL, '', ''),
(26, 'LELEU', 'Sebastien', NULL, '', '', '', '', '2020-01-14 15:51:25', NULL, 0, 0, 0, 0, '2020-01-14 16:00:06', NULL, NULL, 0, NULL, '', 'PAYE FIN JANVIER PENDANT L''ASQ AUDI LEAN'),
(27, 'EKEBERG', '', NULL, '', '', '', '', '2020-01-14 16:32:14', NULL, 0, 0, 0, 0, '2020-01-14 16:48:14', NULL, NULL, 0, NULL, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
`idEntreprise` int(11) NOT NULL,
  `libelleEntreprise` varchar(50) DEFAULT NULL,
  `rcsEntreprise` varchar(50) DEFAULT NULL,
  `emailEntreprise` varchar(50) DEFAULT NULL,
  `telephoneEntreprise` varchar(20) DEFAULT NULL,
  `siegeEntreprise` varchar(100) DEFAULT NULL,
  `tvaIntraEntreprise` varchar(50) DEFAULT NULL,
  `nomBanqueEntreprise` varchar(100) DEFAULT NULL,
  `ibanBanqueEntreprise` varchar(50) DEFAULT NULL,
  `bicBanqueEntreprise` varchar(20) DEFAULT NULL,
  `logoEntreprise` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `libelleEntreprise`, `rcsEntreprise`, `emailEntreprise`, `telephoneEntreprise`, `siegeEntreprise`, `tvaIntraEntreprise`, `nomBanqueEntreprise`, `ibanBanqueEntreprise`, `bicBanqueEntreprise`, `logoEntreprise`) VALUES
(1, 'GPTransports', 'RCS d''Annecy : 822 982 930', 'contact@megevecab.com', '+33 6 46 23 71 52', '620 Route de Megeve 74120 PRAZ SUR ARLY', 'FR42822982930', 'Banque populaire Auvergne Rhône Alpes', 'FR76 1680 7000 7236 1152 7721 254', 'CCBPFRPPGRE', 'megevecab.jpg'),
(2, 'GPSports', 'RCS d''Annecy : 822 982 930', 'contact@richard-gay.com', '+33 6 27 76 05 60', '620 Route de Megeve 74120 PRAZ SUR ARLY', 'FR42822982930', 'Banque populaire Auvergne Rhône Alpes', 'FR76 1680 7000 7236 1152 7721 254', 'CCBPFRPPGRE', 'richardgaynoir.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`idItem` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `libelleItem` varchar(200) DEFAULT NULL,
  `commentaireItem` varchar(100) DEFAULT NULL,
  `quantiteItem` int(11) NOT NULL,
  `tvaItem` float NOT NULL,
  `prixItem` float NOT NULL,
  `remiseItem` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`idItem`, `idCommande`, `idProduit`, `libelleItem`, `commentaireItem`, `quantiteItem`, `tvaItem`, `prixItem`, `remiseItem`) VALUES
(21, 7, 410, 'FORFAIT EVASION 5J', NULL, 1, 0, 225.5, 0),
(22, 8, 120, 'Junior | Skis + chaussures | 4J', NULL, 2, 20, 90, 0),
(24, 8, 10, 'Adulte | Intermédiaire | Skis + chaussures | 4J', NULL, 1, 20, 158, 0),
(25, 8, 411, 'SKI PASSES', NULL, 1, 0, 660, 0),
(26, 9, 10, 'Adulte | Intermédiaire | Skis + chaussures | 4J', NULL, 2, 20, 158, 0),
(27, 10, 10, 'Adulte | Intermédiaire | Skis + chaussures | 4J', NULL, 1, 20, 158, 0),
(28, 10, 412, 'SKI PASS 4J Assurance', NULL, 1, 0, 190.5, 0),
(29, 9, 413, 'SKI PASS 4J Assurance', NULL, 2, 0, 190.5, 0),
(30, 11, 28, 'Adulte | Expert | Skis + chaussures | 2J', NULL, 2, 20, 110, 0),
(31, 11, 189, 'Caravelle | Jusqu  à 3 pax | Megève - Genève', NULL, 2, 10, 200, 0),
(32, 12, 416, 'SKI PASS 5J + Assurance', NULL, 2, 0, 240.5, 0),
(33, 12, 13, 'Adulte | Intermédiaire | Skis + chaussures | 5J', NULL, 2, 20, 192, 0),
(34, 12, 273, 'Dorsale Cairn ', NULL, 2, 20, 99.99, 0),
(35, 13, 44, 'Adulte | Expert | Skis | 7J', NULL, 1, 20, 266, 0),
(36, 13, 19, 'Adulte | Intermédiaire | Skis + chaussures | 7J', NULL, 1, 20, 266, 0),
(37, 13, 135, 'Junior | Skis + chaussures | 7J', NULL, 1, 20, 145, 0),
(38, 13, 245, 'LHOTSE Google', NULL, 1, 20, 45, 0),
(39, 13, 289, 'Chaussette XSOCKS JR ', NULL, 1, 20, 22, 0),
(40, 13, 250, 'Gant Zwar kid ', NULL, 1, 20, 24, 0),
(41, 13, 418, 'SKI PASS 7J + Assurance', NULL, 2, 0, 308, 0),
(42, 13, 442, 'SKI PASS 5-14 ANS 7J + Assurance', NULL, 1, 0, 251, 0),
(45, 14, 125, 'Junior | Skis + chaussures | 5J', NULL, 2, 20, 109, 0),
(46, 14, 14, 'Adulte | Intermédiaire | Skis | 5J', NULL, 1, 20, 124, 0),
(47, 14, 13, 'Adulte | Intermédiaire | Skis + chaussures | 5J', NULL, 1, 20, 192, 0),
(48, 14, 145, 'Casque | 1J', NULL, 10, 20, 4, 0),
(49, 14, 289, 'Chaussette XSOCKS JR ', NULL, 1, 20, 22, 0),
(50, 14, 290, 'Chaussette XSOCKS -2 ', NULL, 1, 20, 19, 0),
(51, 14, 443, 'SKI PASSE FAMILLE 5 J ', NULL, 1, 0, 732, 0),
(52, 15, 422, 'SKI PASS 2J', NULL, 3, 0, 96, 0),
(53, 16, 423, 'SKI PASS 3J', NULL, 2, 0, 141, 0),
(54, 11, 422, 'SKI PASS 2J', NULL, 2, 0, 96, 0),
(55, 17, 412, 'SKI PASS 1J + Assurance', NULL, 1, 0, 54.5, 0),
(56, 17, 1, 'Adulte I Intermédiaire | Skis + chaussures | 1J', NULL, 1, 20, 42, 0),
(57, 17, 145, 'Casque | 1J', NULL, 1, 20, 4, 0),
(59, 18, 4, 'Adulte | Intermédiaire | Skis + chaussures | 2J', NULL, 1, 20, 82, 0),
(60, 18, 31, 'Adulte | Expert | Skis + chaussures | 3J', NULL, 1, 20, 163, 0),
(63, 19, 423, 'SKI PASS 3J', NULL, 2, 0, 141, 0),
(64, 20, 472, 'SKI PASS ', NULL, 1, 0, 46.5, 0),
(65, 21, 1, 'Adulte I Intermédiaire | Skis + chaussures | 1J', NULL, 3, 20, 42, 0),
(67, 21, 473, 'SKI PASS', NULL, 1, 0, 106.5, 0),
(68, 8, 81, 'Adulte | Snowboard | Snowboard + Boots | 1J', NULL, 1, 20, 42, 0),
(72, 23, 6, 'Adulte | Intermédiaire | Chaussures | 2J', NULL, 1, 20, 29, 0),
(73, 21, 474, 'COURS ESF 1H 3 à 5 pers', NULL, 1, 0, 64, 0),
(74, 24, 475, 'COURS 1H 1 à 3 pers', NULL, 4, 0, 48, 0),
(75, 25, 476, 'Cours Collectif PM 6J', NULL, 1, 0, 162, 0),
(76, 8, 475, 'COURS 1H 1 à 3 pers', NULL, 6, 0, 48, 0),
(77, 26, 38, 'Adulte | Expert | Skis | 5J', NULL, 1, 20, 192, 0),
(78, 26, 31, 'Adulte | Expert | Skis + chaussures | 3J', NULL, 1, 20, 163, 0),
(79, 26, 477, 'SKI PASS', NULL, 1, 0, 625, 0),
(80, 27, 475, 'COURS 1H 1 à 3 pers', NULL, 2, 0, 48, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
`idProduit` int(11) NOT NULL,
  `idTypeProduit` int(11) NOT NULL DEFAULT '1',
  `libelleProduit` varchar(200) NOT NULL,
  `raccourciProduit` varchar(100) DEFAULT NULL,
  `prixProduit` float NOT NULL DEFAULT '0',
  `tvaProduit` float NOT NULL DEFAULT '20',
  `archiveProduit` int(1) NOT NULL DEFAULT '0',
  `associationsProduit` varchar(20) DEFAULT NULL,
  `nbJoursProduit` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=478 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `idTypeProduit`, `libelleProduit`, `raccourciProduit`, `prixProduit`, `tvaProduit`, `archiveProduit`, `associationsProduit`, `nbJoursProduit`) VALUES
(1, 1, 'Adulte I Intermédiaire | Skis + chaussures | 1J', 'INT1', 42, 20, 0, NULL, 1),
(2, 1, 'Adulte I Intermédiaire | Skis | 1J', 'INT1', 27, 20, 0, NULL, 1),
(3, 1, 'Adulte I Intermédiaire | Chaussures | 1J', 'INT1', 15, 20, 0, NULL, 1),
(4, 1, 'Adulte | Intermédiaire | Skis + chaussures | 2J', 'INT2', 82, 20, 0, NULL, 2),
(5, 1, 'Adulte | Intermédiaire | Skis | 2J', 'INT2', 53, 20, 0, NULL, 2),
(6, 1, 'Adulte | Intermédiaire | Chaussures | 2J', 'INT2', 29, 20, 0, NULL, 2),
(7, 1, 'Adulte | Intermédiaire | Skis + chaussures | 3J', 'INT3', 121, 20, 0, NULL, 3),
(8, 1, 'Adulte | Intermédiaire | Skis | 3J', 'INT3', 78, 20, 0, NULL, 3),
(9, 1, 'Adulte | Intermédiaire | Chaussures | 3J', 'INT3', 42, 20, 0, NULL, 3),
(10, 1, 'Adulte | Intermédiaire | Skis + chaussures | 4J', 'INT4', 158, 20, 0, NULL, 4),
(11, 1, 'Adulte | Intermédiaire | Skis | 4J', 'INT4', 102, 20, 0, NULL, 4),
(12, 1, 'Adulte | Intermédiaire | Chaussures | 4J', 'INT4', 55, 20, 0, NULL, 4),
(13, 1, 'Adulte | Intermédiaire | Skis + chaussures | 5J', 'INT5', 192, 20, 0, NULL, 5),
(14, 1, 'Adulte | Intermédiaire | Skis | 5J', 'INT5', 124, 20, 0, NULL, 5),
(15, 1, 'Adulte | Intermédiaire | Chaussures | 5J', 'INT5', 67, 20, 0, NULL, 5),
(16, 1, 'Adulte | Intermédiaire | Skis + chaussures | 6J', 'INT6', 229, 20, 0, NULL, 6),
(17, 1, 'Adulte | Intermédiaire | Skis | 6J', 'INT6', 148, 20, 0, NULL, 6),
(18, 1, 'Adulte | Intermédiaire | Chaussures | 6J', 'INT6', 80, 20, 0, NULL, 6),
(19, 1, 'Adulte | Intermédiaire | Skis + chaussures | 7J', 'INT7', 266, 20, 0, NULL, 7),
(20, 1, 'Adulte | Intermédiaire | Skis | 7J', 'INT7', 172, 20, 0, NULL, 7),
(21, 1, 'Adulte | Intermédiaire | Chaussures | 7J', 'INT7', 93, 20, 0, NULL, 7),
(22, 1, 'Adulte | Intermédiaire | Skis + chaussures | 13J', 'INT13', 458, 20, 0, NULL, 13),
(23, 1, 'Adulte | Intermédiaire | Skis | 13J', 'INT13', 296, 20, 0, NULL, 13),
(24, 1, 'Adulte | Intermédiaire | Chaussures | 13J', 'INT13', 160, 20, 0, NULL, 13),
(25, 1, 'Adulte | Expert | Skis + chaussures | 1J', 'EXP1', 56, 20, 0, NULL, 1),
(26, 1, 'Adulte | Expert | Skis | 1J', 'EXP1', 42, 20, 0, NULL, 1),
(27, 1, 'Adulte | Expert | Chaussures | 1J', 'EXP1', 15, 20, 0, NULL, 1),
(28, 1, 'Adulte | Expert | Skis + chaussures | 2J', 'EXP2', 110, 20, 0, NULL, 2),
(29, 1, 'Adulte | Expert | Skis | 2J', 'EXP2', 82, 20, 0, NULL, 2),
(30, 1, 'Adulte | Expert | Chaussures | 2J', 'EXP2', 29, 20, 0, NULL, 2),
(31, 1, 'Adulte | Expert | Skis + chaussures | 3J', 'EXP3', 163, 20, 0, NULL, 3),
(32, 1, 'Adulte | Expert | Skis | 3J', 'EXP3', 121, 20, 0, NULL, 3),
(33, 1, 'Adulte | Expert | Chaussures | 3J', 'EXP3', 42, 20, 0, NULL, 3),
(34, 1, 'Adulte | Expert | Skis + chaussures | 4J', 'EXP4', 213, 20, 0, NULL, 4),
(35, 1, 'Adulte | Expert | Skis | 4J', 'EXP4', 158, 20, 0, NULL, 4),
(36, 1, 'Adulte | Expert | Chaussures | 4J', 'EXP4', 55, 20, 0, NULL, 4),
(37, 1, 'Adulte | Expert | Skis + chaussures | 5J', 'EXP5', 260, 20, 0, NULL, 5),
(38, 1, 'Adulte | Expert | Skis | 5J', 'EXP5', 192, 20, 0, NULL, 5),
(39, 1, 'Adulte | Expert | Chaussures | 5J', 'EXP5', 67, 20, 0, NULL, 5),
(40, 1, 'Adulte | Expert | Skis + chaussures | 6J', 'EXP6', 309, 20, 0, NULL, 6),
(41, 1, 'Adulte | Expert | Skis | 6J', 'EXP6', 229, 20, 0, NULL, 6),
(42, 1, 'Adulte | Expert | Chaussures | 6J', 'EXP6', 80, 20, 0, NULL, 6),
(43, 1, 'Adulte | Expert | Skis + chaussures | 7J', 'EXP7', 359, 20, 0, NULL, 7),
(44, 1, 'Adulte | Expert | Skis | 7J', 'EXP7', 266, 20, 0, NULL, 7),
(45, 1, 'Adulte | Expert | Chaussures | 7J', 'EXP7', 93, 20, 0, NULL, 7),
(46, 1, 'Adulte | Expert | Skis + chaussures | 13J', 'EXP13', 618, 20, 0, NULL, 13),
(47, 1, 'Adulte | Expert | Skis | 13J', 'EXP13', 458, 20, 0, NULL, 13),
(48, 1, 'Adulte | Expert | Chaussures | 13J', 'EXP13', 160, 20, 0, NULL, 13),
(49, 1, 'Adulte | Prestige | Skis + chaussures | 1J', 'PRE1', 66, 20, 0, NULL, 1),
(50, 1, 'Adulte | Prestige | Skis | 1J', 'PRE1', 54, 20, 0, NULL, 1),
(51, 1, 'Adulte | Prestige | Chaussures | 1J', 'PRE1', 15, 20, 0, NULL, 1),
(52, 1, 'Adulte | Prestige | Skis + chaussures | 2J', 'PRE2', 120, 20, 0, NULL, 2),
(53, 1, 'Adulte | Prestige | Skis | 2J', 'PRE2', 94, 20, 0, NULL, 2),
(54, 1, 'Adulte | Prestige | Chaussures | 2J', 'PRE2', 29, 20, 0, NULL, 2),
(55, 1, 'Adulte | Prestige | Skis + chaussures | 3J', 'PRE3', 173, 20, 0, NULL, 3),
(56, 1, 'Adulte | Prestige | Skis | 3J', 'PRE3', 133, 20, 0, NULL, 3),
(57, 1, 'Adulte | Prestige | Chaussures | 3J', 'PRE3', 42, 20, 0, NULL, 3),
(58, 1, 'Adulte | Prestige | Skis + chaussures | 4J', 'PRE4', 223, 20, 0, NULL, 4),
(59, 1, 'Adulte | Prestige | Skis | 4J', 'PRE4', 170, 20, 0, NULL, 4),
(60, 1, 'Adulte | Prestige | Chaussures | 4J', 'PRE4', 55, 20, 0, NULL, 4),
(61, 1, 'Adulte | Prestige | Skis + chaussures | 5J', 'PRE5', 270, 20, 0, NULL, 5),
(62, 1, 'Adulte | Prestige | Skis | 5J', 'PRE5', 204, 20, 0, NULL, 5),
(63, 1, 'Adulte | Prestige | Chaussures | 5J', 'PRE5', 67, 20, 0, NULL, 5),
(64, 1, 'Adulte | Prestige | Skis + chaussures | 6J', 'PRE6', 319, 20, 0, NULL, 6),
(65, 1, 'Adulte | Prestige | Skis | 6J', 'PRE6', 241, 20, 0, NULL, 6),
(66, 1, 'Adulte | Prestige | Chaussures | 6J', 'PRE6', 80, 20, 0, NULL, 6),
(67, 1, 'Adulte | Prestige | Skis + chaussures | 7J', 'PRE7', 369, 20, 0, NULL, 7),
(68, 1, 'Adulte | Prestige | Skis | 7J', 'PRE7', 278, 20, 0, NULL, 7),
(69, 1, 'Adulte | Prestige | Chaussures | 7J', 'PRE7', 93, 20, 0, NULL, 7),
(70, 1, 'Adulte | Prestige | Skis + chaussures | 13J', 'PRE13', 628, 20, 0, NULL, 13),
(71, 1, 'Adulte | Prestige | Skis | 13J', 'PRE13', 470, 20, 0, NULL, 13),
(72, 1, 'Adulte | Prestige | Chaussures | 13J', 'PRE13', 160, 20, 0, NULL, 13),
(73, 1, 'Adulte | Ski de luxe | SKI ZAI | 1J', 'LUX1', 120, 20, 0, NULL, 1),
(74, 1, 'Adulte | Ski de luxe | SKI ZAI | 2J', 'LUX2', 240, 20, 0, NULL, 2),
(75, 1, 'Adulte | Ski de luxe | SKI ZAI | 3J', 'LUX3', 350, 20, 0, NULL, 3),
(76, 1, 'Adulte | Ski de luxe | SKI ZAI | 4J', 'LU4', 450, 20, 0, NULL, 4),
(77, 1, 'Adulte | Ski de luxe | SKI ZAI | 5J', 'LU5', 550, 20, 0, NULL, 5),
(78, 1, 'Adulte | Ski de luxe | SKI ZAI | 6J', 'LUX6', 650, 20, 0, NULL, 6),
(79, 1, 'Adulte | Ski de luxe | SKI ZAI | 7J', 'LUX7', 750, 20, 0, NULL, 7),
(80, 1, 'Adulte | Ski de luxe | SKI ZAI | 13J', 'LUX13', 1100, 20, 0, NULL, 13),
(81, 1, 'Adulte | Snowboard | Snowboard + Boots | 1J', 'SNO1', 42, 20, 0, NULL, 1),
(82, 1, 'Adulte | Snowboard | Snowboard | 1J', 'SNO1', 27, 20, 0, NULL, 1),
(83, 1, 'Adulte | Snowboard | Boots | 1J', 'SNO1', 15, 20, 0, NULL, 1),
(84, 1, 'Adulte | Snowboard | Snowboard + Boots | 2J', 'SNO2', 82, 20, 0, NULL, 2),
(85, 1, 'Adulte | Snowboard | Snowboard | 2J', 'SNO2', 53, 20, 0, NULL, 2),
(86, 1, 'Adulte | Snowboard | Boots | 2J', 'SNO2', 29, 20, 0, NULL, 2),
(87, 1, 'Adulte | Snowboard | Snowboard + Boots | 3J', 'SNO3', 121, 20, 0, NULL, 3),
(88, 1, 'Adulte | Snowboard | Snowboard | 3J', 'SNO3', 78, 20, 0, NULL, 3),
(89, 1, 'Adulte | Snowboard | Boots | 3J', 'SNO3', 43, 20, 0, NULL, 3),
(90, 1, 'Adulte | Snowboard | Snowboard + Boots | 4J', 'SNO4', 158, 20, 0, NULL, 4),
(91, 1, 'Adulte | Snowboard | Snowboard | 4J', 'SNO4', 102, 20, 0, NULL, 4),
(92, 1, 'Adulte | Snowboard | Boots | 4J', 'SNO4', 56, 20, 0, NULL, 4),
(93, 1, 'Adulte | Snowboard | Snowboard + Boots | 5J', 'SNO5', 192, 20, 0, NULL, 5),
(94, 1, 'Adulte | Snowboard | Snowboard | 5J', 'SNO5', 124, 20, 0, NULL, 5),
(95, 1, 'Adulte | Snowboard | Boots | 5J', 'SNO5', 68, 20, 0, NULL, 5),
(96, 1, 'Adulte | Snowboard | Snowboard + Boots | 6J', 'SNO6', 229, 20, 0, NULL, 6),
(97, 1, 'Adulte | Snowboard | Snowboard | 6J', 'SNO6', 148, 20, 0, NULL, 6),
(98, 1, 'Adulte | Snowboard | Boots | 6J', 'SNO6', 81, 20, 0, NULL, 6),
(99, 1, 'Adulte | Snowboard | Snowboard + Boots | 7J', 'SNO7', 266, 20, 0, NULL, 7),
(100, 1, 'Adulte | Snowboard | Snowboard | 7J', 'SNO7', 172, 20, 0, NULL, 7),
(101, 1, 'Adulte | Snowboard | Boots | 7J', 'SNO7', 94, 20, 0, NULL, 7),
(102, 1, 'Adulte | Snowboard | Snowboard + Boots | 13J', 'SNO13', 458, 20, 0, NULL, 13),
(103, 1, 'Adulte | Snowboard | Snowboard | 13J', 'SNO13', 296, 20, 0, NULL, 13),
(104, 1, 'Adulte | Snowboard | Boots | 13J', 'SNO13', 162, 20, 0, NULL, 13),
(105, 1, 'Junior | Skis + chaussures | 1J', 'JUN1', 24, 20, 0, NULL, 1),
(106, 1, 'Junior | Skis | 1J', 'JUN1', 16, 20, 0, NULL, 1),
(107, 1, 'Junior | Chaussures | 1J', 'JUN1', 7, 20, 0, NULL, 1),
(108, 1, 'Junior | Snowboard + Boots | 1J', 'SNO1', 26, 20, 0, NULL, 1),
(109, 1, 'Junior | Snowboard | 1J', 'SNO1', 19, 20, 0, NULL, 1),
(110, 1, 'Junior | Skis + chaussures | 2J', 'JUN2', 46, 20, 0, NULL, 2),
(111, 1, 'Junior | Skis | 2J', 'JUN2', 33, 20, 0, NULL, 2),
(112, 1, 'Junior | Chaussures | 2J', 'JUN2', 13, 20, 0, NULL, 2),
(113, 1, 'Junior | Snowboard + Boots | 2J', 'SNO2', 51, 20, 0, NULL, 2),
(114, 1, 'Junior | Snowboard | 2J', 'SNO2', 38, 20, 0, NULL, 2),
(115, 1, 'Junior | Skis + chaussures | 3J', 'JUN3', 68, 20, 0, NULL, 3),
(116, 1, 'Junior | Skis | 3J', 'JUN3', 49, 20, 0, NULL, 3),
(117, 1, 'Junior | Chaussures | 3J', 'JUN3', 19, 20, 0, NULL, 3),
(118, 1, 'Junior | Snowboard + Boots | 3J', 'SNO3', 75, 20, 0, NULL, 3),
(119, 1, 'Junior | Snowboard | 3J', 'SNO3', 55, 20, 0, NULL, 3),
(120, 1, 'Junior | Skis + chaussures | 4J', 'JUN4', 90, 20, 0, NULL, 4),
(121, 1, 'Junior | Skis | 4J', 'JUN4', 65, 20, 0, NULL, 4),
(122, 1, 'Junior | Chaussures | 4J', 'JUN4', 25, 20, 0, NULL, 4),
(123, 1, 'Junior | Snowboard + Boots | 4J', 'SNO4', 98, 20, 0, NULL, 4),
(124, 1, 'Junior | Snowboard | 4J', 'SNO4', 72, 20, 0, NULL, 4),
(125, 1, 'Junior | Skis + chaussures | 5J', 'JUN5', 109, 20, 0, NULL, 5),
(126, 1, 'Junior | Skis | 5J', 'JUN5', 79, 20, 0, NULL, 5),
(127, 1, 'Junior | Chaussures | 5J', 'JUN5', 30, 20, 0, NULL, 5),
(128, 1, 'Junior | Snowboard + Boots | 5J', 'SNO5', 119, 20, 0, NULL, 5),
(129, 1, 'Junior | Snowboard | 5J', 'SNO5', 88, 20, 0, NULL, 5),
(130, 1, 'Junior | Skis + chaussures | 6J', 'SNO6', 122, 20, 0, NULL, 6),
(131, 1, 'Junior | Skis | 6J', 'JUN6', 90, 20, 0, NULL, 6),
(132, 1, 'Junior | Chaussures | 6J', 'JUN6', 35, 20, 0, NULL, 6),
(133, 1, 'Junior | Snowboard + Boots | 6J', 'SNO6', 142, 20, 0, NULL, 6),
(134, 1, 'Junior | Snowboard | 6J', 'SNO6', 105, 20, 0, NULL, 6),
(135, 1, 'Junior | Skis + chaussures | 7J', 'JUN7', 145, 20, 0, NULL, 7),
(136, 1, 'Junior | Skis | 7J', 'JUN7', 105, 20, 0, NULL, 7),
(137, 1, 'Junior | Chaussures | 7J', 'JUN7', 40, 20, 0, NULL, 7),
(138, 1, 'Junior | Snowboard + Boots | 7J', 'SNO7', 165, 20, 0, NULL, 7),
(139, 1, 'Junior | Snowboard | 7J', 'SNO7', 122, 20, 0, NULL, 7),
(140, 1, 'Junior | Skis + chaussures | 13J', 'JUN13', 244, 20, 0, NULL, 13),
(141, 1, 'Junior | Skis | 13J', 'JUN13', 180, 20, 0, NULL, 13),
(142, 1, 'Junior | Chaussures | 13J', 'JUN13', 64, 20, 0, NULL, 13),
(143, 1, 'Junior | Snowboard + Boots | 13J', 'SNO13', 284, 20, 0, NULL, 13),
(144, 1, 'Junior | Snowboard | 13J', 'SNO13', 140, 20, 0, NULL, 13),
(145, 1, 'Casque | 1J', 'CAS', 4, 20, 0, NULL, 1),
(146, 1, 'Assurance Adulte | 1J', 'ASS', 4, 20, 0, NULL, 1),
(147, 1, 'Assurance Junior | 1J', 'ASS', 2, 20, 0, NULL, 1),
(148, 2, 'PRESTIGE | 1 pax | Megève - Alberville', 'PA1', 110, 10, 0, NULL, NULL),
(149, 2, 'PRESTIGE | 1 pax | Megève - Genève', 'PG1', 210, 10, 0, NULL, NULL),
(150, 2, 'Prestige | 1 pax | Megève - Bellegarde', 'PB1', 220, 10, 0, NULL, NULL),
(151, 2, 'PRESTIGE  | 1 pax | Megève - Annecy', 'PA1', 210, 10, 0, NULL, NULL),
(152, 2, 'PRESTIGE | 1 pax | Megève - Chambéry', 'PC1', 220, 10, 0, NULL, NULL),
(153, 2, 'PRESTIGE | 1 pax | Megève - Chamonix', 'PC1', 110, 10, 0, NULL, NULL),
(154, 2, 'PRESTIGE | 1 pax | Megève - Sallanches', 'PS1', 60, 10, 0, NULL, NULL),
(155, 2, 'PRESTIGE | 1 pax | Megève - St Gervais', 'PS1', 50, 10, 0, NULL, NULL),
(156, 2, 'PRESTIGE | 1 pax | Megève - Praz sur Arly', 'PP1', 30, 10, 0, NULL, NULL),
(157, 2, 'PRESTIGE | 1 pax | Megève - Grenoble', 'PG1', 220, 10, 0, NULL, NULL),
(158, 2, 'PRESTIGE | Jusqu  à 3 pax | Megève - Alberville', 'PA3', 130, 10, 0, NULL, NULL),
(159, 2, 'PRESTIGE | Jusqu  à 3 pax | Megève - Genève', 'PG3', 230, 10, 0, NULL, NULL),
(160, 2, 'PRESTIGE | Jusqu  à 3 pax | Megève - Bellegarde', 'PB3', 240, 10, 0, NULL, NULL),
(161, 2, 'PRESTIGE | Jusqu  à 3 pax | Megève - Annecy', 'PA3', 230, 10, 0, NULL, NULL),
(162, 2, 'PRESTIGE | Jusqu  à 3 pax | Megève - Chambéry', 'PC3', 240, 10, 0, NULL, NULL),
(163, 2, 'PRESTIGE | Jusqu  à 3 pax | Megève - Chamonix', 'PC3', 110, 10, 0, NULL, NULL),
(164, 2, 'PRESTIGE  | Jusqu  à 3 pax | Megève - Sallanches', 'PS3', 70, 10, 0, NULL, NULL),
(165, 2, 'PRESTIGE  | Jusqu  à 3 pax | Megève - St Gervais', 'PS3', 60, 10, 0, NULL, NULL),
(166, 2, 'PRESTIGE  | Jusqu  à 3 pax | Megève - Praz sur Arly', 'PP3', 30, 10, 0, NULL, NULL),
(167, 2, 'PRESTIGE | Jusqu  à 3 pax | Megève - Grenoble', 'PG3', 240, 10, 0, NULL, NULL),
(168, 2, 'PRESTIGE  | 4 à 6 pax | Megève - Alberville', 'PA6', 160, 10, 0, NULL, NULL),
(169, 2, 'PRESTIGE  | 4 à 6 pax | Megève - Genève', 'PG6', 260, 10, 0, NULL, NULL),
(170, 2, 'PRESTIGE  | 4 à 6 pax | Megève - Bellegarde', 'PB6', 280, 10, 0, NULL, NULL),
(171, 2, 'PRESTIGE  | 4 à 6 pax | Megève - Annecy', 'PA6', 260, 10, 0, NULL, NULL),
(172, 2, 'PRESTIGE  | 4 à 6 pax | Megève - Chambéry', 'PC6', 280, 10, 0, NULL, NULL),
(173, 2, 'PRESTIGE  | 4 à 6 pax | Megève - Chamonix', 'PC6', 140, 10, 0, NULL, NULL),
(174, 2, 'PRESTIGE  | 4 à 6 pax | Megève - Sallanches', 'PS6', 80, 10, 0, NULL, NULL),
(175, 2, 'PRESTIGE  | 4 à 6 pax | Megève - St Gervais', 'PS6', 70, 10, 0, NULL, NULL),
(176, 2, 'PRESTIGE  | 4 à 6 pax | Megève - Praz sur Arly', 'PP6', 40, 10, 0, NULL, NULL),
(177, 2, 'PRESTIGE  | 4 à 6 pax | Megève - Grenoble', 'PG6', 280, 10, 0, NULL, NULL),
(178, 2, 'Caravelle | 1 pax | Megève - Alberville', 'CA1', 90, 10, 0, NULL, NULL),
(179, 2, 'Caravelle | 1 pax | Megève - Genève', 'CG1', 180, 10, 0, NULL, NULL),
(180, 2, 'Caravelle | 1 pax | Megève - Bellegarde', 'CB1', 190, 10, 0, NULL, NULL),
(181, 2, 'Caravelle | 1 pax | Megève - Annecy', 'CA1', 180, 10, 0, NULL, NULL),
(182, 2, 'Caravelle | 1 pax | Megève - Chambéry', 'CC1', 190, 10, 0, NULL, NULL),
(183, 2, 'Caravelle | 1 pax | Megève - Chamonix', 'CC1', 90, 10, 0, NULL, NULL),
(184, 2, 'Caravelle | 1 pax | Megève - Sallanches', 'CS1', 50, 10, 0, NULL, NULL),
(185, 2, 'Caravelle | 1 pax | Megève - St Gervais', 'CS1', 40, 10, 0, NULL, NULL),
(186, 2, 'Caravelle | 1 pax | Megève - Praz sur Arly', 'CP1', 25, 10, 0, NULL, NULL),
(187, 2, 'Caravelle | 1 pax | Megève - Grenoble', 'CG1', 190, 10, 0, NULL, NULL),
(188, 2, 'Caravelle | Jusqu  à 3 pax | Megève - Alberville', 'CA3', 100, 10, 0, NULL, NULL),
(189, 2, 'Caravelle | Jusqu  à 3 pax | Megève - Genève', 'CG3', 200, 10, 0, NULL, NULL),
(190, 2, 'Caravelle | Jusqu  à 3 pax | Megève - Bellegarde', 'CB3', 210, 10, 0, NULL, NULL),
(191, 2, 'Caravelle | Jusqu  à 3 pax | Megève - Annecy', 'CA3', 200, 10, 0, NULL, NULL),
(192, 2, 'Caravelle | Jusqu  à 3 pax | Megève - Chambéry', 'CC3', 210, 10, 0, NULL, NULL),
(193, 2, 'Caravelle | Jusqu  à 3 pax | Megève - Chamonix', 'CC3', 90, 10, 0, NULL, NULL),
(194, 2, 'Caravelle | Jusqu  à 3 pax | Megève - Sallanches', 'CS3', 55, 10, 0, NULL, NULL),
(195, 2, 'Caravelle | Jusqu  à 3 pax | Megève - St Gervais', 'CS3', 45, 10, 0, NULL, NULL),
(196, 2, 'Caravelle | Jusqu  à 3 pax | Megève - Praz sur Arly', 'CP3', 25, 10, 0, NULL, NULL),
(197, 2, 'Caravelle | Jusqu  à 3 pax | Megève - Grenoble', 'CG3', 210, 10, 0, NULL, NULL),
(198, 2, 'Caravelle | 4 à 6 pax | Megève - Alberville', 'CA6', 120, 10, 0, NULL, NULL),
(199, 2, 'Caravelle | 4 à 6 pax | Megève - Genève', 'CG6', 230, 10, 0, NULL, NULL),
(200, 2, 'Caravelle | 4 à 6 pax | Megève - Bellegarde', 'CB6', 240, 10, 0, NULL, NULL),
(201, 2, 'Caravelle | 4 à 6 pax | Megève - Annecy', 'CA6', 230, 10, 0, NULL, NULL),
(202, 2, 'Caravelle | 4 à 6 pax | Megève - Chambéry', 'CC6', 240, 10, 0, NULL, NULL),
(203, 2, 'Caravelle | 4 à 6 pax | Megève - Chamonix', 'CC6', 120, 10, 0, NULL, NULL),
(204, 2, 'Caravelle | 4 à 6 pax | Megève - Sallanches', 'CS6', 60, 10, 0, NULL, NULL),
(205, 2, 'Caravelle | 4 à 6 pax | Megève - St Gervais', 'CS6', 50, 10, 0, NULL, NULL),
(206, 2, 'Caravelle | 4 à 6 pax | Megève - Praz sur Arly', 'CP6', 30, 10, 0, NULL, NULL),
(207, 2, 'Caravelle | 4 à 6 pax | Megève - Grenoble', 'CG6', 240, 10, 0, NULL, NULL),
(208, 2, 'Caravelle | 7 à 8 pax | Megève - Alberville', 'CA8', 160, 10, 0, NULL, NULL),
(209, 2, 'Caravelle | 7 à 8 pax | Megève - Genève', 'CG8', 270, 10, 0, NULL, NULL),
(210, 2, 'Caravelle | 7 à 8 pax | Megève - Bellegarde', 'CB8', 290, 10, 0, NULL, NULL),
(211, 2, 'Caravelle | 7 à 8 pax | Megève - Annecy', 'CA8', 270, 10, 0, NULL, NULL),
(212, 2, 'Caravelle | 7 à 8 pax | Megève - Chambéry', 'CC8', 290, 10, 0, NULL, NULL),
(213, 2, 'Caravelle | 7 à 8 pax | Megève - Chamonix', 'CC8', 150, 10, 0, NULL, NULL),
(214, 2, 'Caravelle | 7 à 8 pax | Megève - Sallanches', 'CS8', 80, 10, 0, NULL, NULL),
(215, 2, 'Caravelle | 7 à 8 pax | Megève - St Gervais', 'CS8', 80, 10, 0, NULL, NULL),
(216, 2, 'Caravelle | 7 à 8 pax | Megève - Praz sur Arly', 'CP8', 40, 10, 0, NULL, NULL),
(217, 2, 'Caravelle | 7 à 8 pax | Megève - Grenoble', 'CG8', 290, 10, 0, NULL, NULL),
(218, 2, 'Caravalle | Jusqu  à 3 pax | Sauvageonne/FDS Jour', 'CS3', 30, 10, 0, NULL, NULL),
(219, 2, 'Caravelle | 4 à 6 pax | Sauvageonne/FDS I Nuit', 'CS6', 50, 10, 0, NULL, NULL),
(220, 2, 'Caravelle | 7 à 8 pax | Sauvageonne/FDS I Jour', 'CS8', 45, 10, 0, NULL, NULL),
(221, 2, 'PRESTIGE | 4 à 6 pax | Sauvageonne/FDS I Jour', 'PS6', 35, 10, 0, NULL, NULL),
(222, 2, 'PRESTIGE | Jusqu  à 3 pax | Sauvageonne/FDS I  Nuit', 'PS3', 40, 10, 0, NULL, NULL),
(223, 2, 'PRESTIGE | 7 à 8 pax | Sauvageonne/FDS I Nuit', 'PS8', 55, 10, 0, NULL, NULL),
(224, 2, 'Caravelle | Megève - Megève village | Jour', 'MM', 15, 10, 0, NULL, NULL),
(225, 2, 'Caravelle | Megève - Mont d  Arbois | Jour', 'MMT', 20, 10, 0, NULL, NULL),
(226, 2, 'Caravelle | Megève - Côte 2000 | Jour', 'MCJ', 35, 10, 0, NULL, NULL),
(227, 2, 'Caravelle | Megève - Megève village | Nuit', 'MMN', 20, 10, 0, NULL, NULL),
(228, 2, 'Caravelle | Megève - Mont d  Arbois | Nuit', 'MMT', 30, 10, 0, NULL, NULL),
(229, 2, 'Caravelle | Megève - Côte 2000 | Nuit', 'MCN', 50, 10, 0, NULL, NULL),
(230, 3, 'OAKLEY O2 XS ', 'O2XS', 47, 20, 0, NULL, NULL),
(231, 3, 'OAKLEY O2 XM ', 'O2XM ', 88, 20, 0, NULL, NULL),
(232, 3, 'OAKLEY Line Miner Youth ', 'LMY', 99, 20, 0, NULL, NULL),
(233, 3, 'OAKLEY Line Miner Youth ', 'LMY', 139, 20, 0, NULL, NULL),
(234, 3, 'OAKLEY Line Miner Youth ', 'LMY', 169, 20, 0, NULL, NULL),
(235, 3, 'OAKLEY Line Miner', 'LM', 159, 20, 0, NULL, NULL),
(236, 3, 'OAKLEY Line Miner Harmony', 'LMH', 169, 20, 0, NULL, NULL),
(237, 3, 'OAKLEY Fall line ', 'FL', 200, 20, 0, NULL, NULL),
(238, 3, 'OAKLEY Flight Deck ', 'FD', 210, 20, 0, NULL, NULL),
(239, 3, 'OAKLEY Flight Deck ', 'FD', 220, 20, 0, NULL, NULL),
(240, 3, 'OAKLEY Air Brake ', 'AB', 261, 20, 0, NULL, NULL),
(241, 3, 'OAKLEY Air Brake 1 ', 'AB', 249, 20, 0, NULL, NULL),
(242, 3, 'OAKLEY AF 2.0', 'AF', 130, 20, 0, NULL, NULL),
(243, 3, 'OAKLEY AF 2.0', 'AF', 169, 20, 0, NULL, NULL),
(244, 3, 'SHRED Google', 'SH', 60, 20, 0, NULL, NULL),
(245, 3, 'LHOTSE Google', 'LH', 45, 20, 0, NULL, NULL),
(246, 3, 'Cairn Booster ', 'Boost', 29.99, 20, 0, NULL, NULL),
(247, 3, 'Cairn Booster photochromic', 'Boost', 39.99, 20, 0, NULL, NULL),
(248, 3, 'Cairn Rush ', 'Rush', 29.99, 20, 0, NULL, NULL),
(249, 3, 'Moufle Dong enfant', 'Dong', 20, 20, 0, NULL, NULL),
(250, 3, 'Gant Zwar kid ', 'ZWAR', 24, 20, 0, NULL, NULL),
(251, 3, 'Gant Orgue kid ', 'ORGUE', 24, 20, 0, NULL, NULL),
(252, 3, 'Moufle Guitare enfant', 'GUIT', 23, 20, 0, NULL, NULL),
(253, 3, 'Gant Cheng', 'GHENG ', 39, 20, 0, NULL, NULL),
(254, 3, 'Sous Gant ', 'SG', 14, 20, 0, NULL, NULL),
(255, 3, 'Gant Kalke', 'KLAC', 47, 20, 0, NULL, NULL),
(256, 3, 'Gant Fanna', 'Fanna', 47, 20, 0, NULL, NULL),
(257, 3, 'Gant BIOKO', 'BIOKO', 40, 20, 0, NULL, NULL),
(258, 3, 'Gant Denver', 'DENV', 49, 20, 0, NULL, NULL),
(259, 3, 'Gant Oakley Park ', 'Park ', 43, 20, 0, NULL, NULL),
(260, 3, 'Gant Oakley factory', 'Fact', 77, 20, 0, NULL, NULL),
(261, 3, 'Gant Oakley Silverado ', 'Silv', 125, 20, 0, NULL, NULL),
(262, 3, 'Gant Oakley Round House', 'Round', 59, 20, 0, NULL, NULL),
(263, 3, 'Moufle Chaufrette', 'Warm', 60, 20, 0, NULL, NULL),
(264, 3, 'Chaufrettes ', 'Chau', 4, 20, 0, NULL, NULL),
(265, 3, 'Gant Thermic Chauffant ', 'Therm', 250, 20, 0, NULL, NULL),
(266, 3, 'Cache cou Oakley ', 'CC', 29, 20, 0, NULL, NULL),
(267, 3, 'Cache cou Multi polaire ', 'Multi', 15, 20, 0, NULL, NULL),
(268, 3, 'Bandeau PIXIS ', 'Band', 19, 20, 0, NULL, NULL),
(269, 3, 'Bonnet LHOTSE', 'Bonn', 12, 20, 0, NULL, NULL),
(270, 3, 'Bonnet OAKLEY ', 'Bonn', 18, 20, 0, NULL, NULL),
(271, 3, 'Bonnet OAKLEY ', 'Bonn', 21, 20, 0, NULL, NULL),
(272, 3, 'Gagoule', 'Car', 31, 20, 0, NULL, NULL),
(273, 3, 'Dorsale Cairn ', 'Dors', 99.99, 20, 0, NULL, NULL),
(274, 3, 'Dorsale Cairn JR', 'Dors', 69.99, 20, 0, NULL, NULL),
(275, 3, 'Ceinture OAKLEY', 'Ceint', 25, 20, 0, NULL, NULL),
(276, 3, 'Protege Tibia', 'Tib', 38, 20, 0, NULL, NULL),
(277, 3, 'Protege Cheville', 'Ankle', 19, 20, 0, NULL, NULL),
(278, 3, 'Poncho ', 'Donc', 29, 20, 0, NULL, NULL),
(279, 3, 'Chauffage Semelle ', 'Themic', 220, 20, 0, NULL, NULL),
(280, 3, 'Semelle 3D ', 'Semelle', 31, 20, 0, NULL, NULL),
(281, 3, 'Icebreaker 260 LEG', 'IB260', 90, 20, 0, NULL, NULL),
(282, 3, 'Icebreaker 260 TOP ', 'IB260', 110, 20, 0, NULL, NULL),
(283, 3, 'Icebreaker 200 LEG ', 'IB200', 76, 20, 0, NULL, NULL),
(284, 3, 'Icebreaker 200 TOP ', 'IB201', 86, 20, 0, NULL, NULL),
(285, 3, 'Stick a levre ', 'LIP', 7, 20, 0, NULL, NULL),
(286, 3, 'Creme Solaire ', 'Crem', 13, 20, 0, NULL, NULL),
(287, 3, 'Creme Bronzage intense ', 'Bron', 12, 20, 0, NULL, NULL),
(288, 3, 'Chaussette Therlmic', 'Them', 31, 20, 0, NULL, NULL),
(289, 3, 'Chaussette XSOCKS JR ', 'Sock', 22, 20, 0, NULL, NULL),
(290, 3, 'Chaussette XSOCKS -2 ', 'Sock', 19, 20, 0, NULL, NULL),
(291, 3, 'Casque freestyle', 'Free', 57, 20, 0, NULL, NULL),
(292, 3, 'Casque Junior Rose ', 'Jun', 73, 20, 0, NULL, NULL),
(293, 3, 'Casque connect e', 'Connect', 110, 20, 0, NULL, NULL),
(294, 3, 'Casque Junior Blanc ', 'Jun', 57, 20, 0, NULL, NULL),
(295, 3, 'Casque Pegasus', 'Peg', 100, 20, 0, NULL, NULL),
(296, 3, 'Casque Equinox', 'Equi', 150, 20, 0, NULL, NULL),
(297, 3, 'Casque Electron U ', 'Elles', 55, 20, 0, NULL, NULL),
(298, 3, 'Casque Shred ', 'Shred', 90, 20, 0, NULL, NULL),
(299, 3, 'Casque Oakley MOD 5 ', 'MOD5 ', 180, 20, 0, NULL, NULL),
(300, 3, 'Casque Oakley MOD 3', 'MOD3', 120, 20, 0, NULL, NULL),
(301, 3, 'Moufle Round House ', 'ROUND', 31, 20, 0, NULL, NULL),
(302, 3, 'Gant Egmont ', 'EGM', 30, 20, 0, NULL, NULL),
(303, 3, 'Casque Cratoni ', 'Crat', 39, 20, 0, NULL, NULL),
(304, 3, 'Casque Crosmax', 'Cros', 110, 20, 0, NULL, NULL),
(305, 3, 'Casque Cratoni  splash', 'Crat', 30, 20, 0, NULL, NULL),
(306, 4, 'COURS ESF AJAkzhjkdzhbljkzabd', '', 111111, 0, 0, NULL, NULL),
(307, 4, 'EVOLUTION 2 ', 'EVO2', 2000, 0, 0, NULL, NULL),
(308, 1, 'RAQUETTE', 'RAQ', 10, 20, 0, NULL, 2),
(309, 1, 'Enfant /KID  | Skis + chaussures | 1J', 'ENF1', 19, 20, 0, NULL, 1),
(310, 1, 'Enfant /KID  | Skis + chaussures | 2J', 'ENF2', 38, 20, 0, NULL, 2),
(311, 1, 'Enfant /KID  | Skis + chaussures | 3J', 'ENF3', 56, 20, 0, NULL, 3),
(312, 1, 'Enfant /KID  | Skis + chaussures | 4J', 'ENF4', 73, 20, 0, NULL, 4),
(313, 1, 'Enfant /KID  | Skis + chaussures | 5J', 'ENF5', 90, 20, 0, NULL, 5),
(314, 1, 'Enfant /KID  | Skis + chaussures | 6J', 'ENF6', 108, 20, 0, NULL, 6),
(315, 1, 'Enfant /KID  | Skis  1J', 'ENF1', 10, 20, 0, NULL, 1),
(316, 1, 'Enfant /KID  | chaussures | 1J', 'ENF1', 9, 20, 0, NULL, 1),
(317, 1, 'Enfant /KID  | Skis  | 2J', 'ENF2', 25, 20, 0, NULL, 2),
(318, 1, 'Enfant /KID  |  chaussures | 0,5J', 'ENF0,5', 4, 20, 0, NULL, 0.5),
(319, 1, 'Enfant /KID  | Skis + chaussures | 0,5J', 'ENF0,5', 10, 20, 0, NULL, 0.5),
(320, 1, 'Enfant /KID | Skis  | 0,5J', 'ENF0,5', 6, 20, 0, NULL, 0.5),
(321, 1, 'Enfant /KID  | Skis + chaussures | 1,5J', 'ENF1,5', 29, 20, 0, NULL, 1.5),
(322, 1, 'Enfant /KID  | Skis | 1,5J', 'ENF1,5', 16, 20, 0, NULL, 1.5),
(323, 1, 'Enfant /KID  | chaussures | 1,5J', 'ENF1,5', 13, 20, 0, NULL, 1.5),
(324, 1, 'Enfant /KID  |  chaussures | 2J', 'ENF2', 13, 20, 0, NULL, 2),
(325, 1, 'Enfant /KID  | Skis + chaussures | 2.5J', 'ENF2.5', 48, 20, 0, NULL, 2.5),
(326, 1, 'Enfant /KID  | Skis | 2.5J', 'ENF2.5', 31, 20, 0, NULL, 2.5),
(327, 1, 'Enfant /KID  | chaussures | 2.5J', 'ENF2.5', 17, 20, 0, NULL, 2.5),
(328, 1, 'Enfant /KID  | Skis + chaussures | 3.5J', 'ENF3.5', 66, 20, 0, NULL, 3.5),
(329, 1, 'Enfant /KID  | Skis | 3J', 'ENF3', 40, 20, 0, NULL, 3),
(330, 1, 'Enfant /KID  | chaussures | 3J', 'ENF3', 16, 20, 0, NULL, 3),
(331, 1, 'Enfant /KID  | Skis  | 3.5J', 'ENF3.5', 46, 20, 0, NULL, 3.5),
(332, 1, 'Enfant /KID  |  chaussures | 3.5J', 'ENF3.5', 20, 20, 0, NULL, 3.5),
(333, 1, 'Enfant /KID  | Skis  | 4J', 'ENF4', 55, 20, 0, NULL, 4),
(334, 1, 'Enfant /KID  | Chaussures | 4J', 'ENF4', 18, 20, 0, NULL, 4),
(335, 1, 'Enfant /KID  | Skis  | 5J', 'ENF5', 70, 20, 0, NULL, 5),
(336, 1, 'Enfant /KID  | Chaussures | 5J', 'ENF5', 20, 20, 0, NULL, 5),
(337, 1, 'Enfant /KID  | Skis  | 6J', 'ENF6', 85, 20, 0, NULL, 6),
(338, 1, 'Enfant /KID  | Chaussures | 6J', 'ENF6', 25, 20, 0, NULL, 6),
(339, 1, 'Enfant /KID  | Skis + chaussures | 7J', 'ENF7', 124, 20, 0, NULL, 7),
(340, 1, 'Enfant /KID  | Skis  | 7J', 'ENF7', 99, 20, 0, NULL, 7),
(341, 1, 'Enfant /KID  | Chaussures | 7J', 'ENF7', 25, 20, 0, NULL, 7),
(342, 1, 'Enfant /KID  | Skis + chaussures | 8J', 'ENF8', 140, 20, 0, NULL, 8),
(343, 1, 'Enfant /KID  | Skis  | 8J', 'ENF8', 111, 20, 0, NULL, 8),
(344, 1, 'Enfant /KID  | Skis + chaussures | 9J', 'ENF9', 156, 20, 0, NULL, 9),
(345, 1, 'Enfant /KID  | Skis  | 9J', 'ENF9', 122, 20, 0, NULL, 9),
(346, 1, 'Enfant /KID  | Chaussures | 9J', 'ENF9', 34, 20, 0, NULL, 9),
(347, 1, 'Enfant /KID  | Skis + chaussures | 10J', 'ENF10', 172, 20, 0, NULL, 10),
(348, 1, 'Enfant /KID  | Skis | 10J', 'ENF10', 135, 20, 0, NULL, 10),
(349, 1, 'Enfant /KID  | Chaussures | 10J', 'ENF10', 37, 20, 0, NULL, 10),
(350, 1, 'Enfant /KID  | Skis + chaussures | 11J', 'ENF11', 188, 20, 0, NULL, 11),
(351, 1, 'Enfant /KID  | Skis  | 11J', 'ENF11', 145, 20, 0, NULL, 11),
(352, 1, 'Enfant /KID  | Chaussures | 11J', 'ENF11', 43, 20, 0, NULL, 11),
(353, 1, 'Enfant /KID  | Skis + chaussures | 12J', 'ENF12', 204, 20, 0, NULL, 12),
(354, 1, 'Enfant /KID  | Skis | 12J', 'ENF12', 157, 20, 0, NULL, 12),
(355, 1, 'Enfant /KID  | chaussures | 12J', 'ENF12', 47, 20, 0, NULL, 12),
(356, 1, 'Enfant /KID  | Skis + chaussures | 13J', 'ENF13', 210, 20, 0, NULL, 13),
(357, 1, 'Enfant /KID  | Skis  | 13J', 'ENF13', 160, 20, 0, NULL, 13),
(358, 1, 'Enfant /KID  | Chaussures | 1J3', 'ENF13', 50, 20, 0, NULL, 13),
(359, 1, 'Enfant /KID  | Chaussures | 8J', 'ENF8', 29, 20, 0, NULL, 8),
(360, 1, 'Junior | Snowboard + Boots | 0.5J', 'SNO0.5', 15, 20, 0, NULL, 0.5),
(361, 1, 'Junior | Snowboard  | 0.5J', 'SNO0.5', 10, 20, 0, NULL, 0.5),
(362, 1, 'Junior | Snowboard + Boots | 1.5J', 'SNO1.5', 41, 20, 0, NULL, 1.5),
(363, 1, 'Junior | Snowboard  | 1.5J', 'SNO1.5', 29, 20, 0, NULL, 1.5),
(364, 1, 'Junior | Snowboard + Boots | 2.5J', 'SNO2.5', 66, 20, 0, NULL, 2.5),
(365, 1, 'Junior | Snowboard  | 2.5J', 'SNO2.5', 48, 20, 0, NULL, 2.5),
(366, 1, 'Junior | Snowboard + Boots | 3.5J', 'SNO3.5', 90, 20, 0, NULL, 3.5),
(367, 1, 'Junior | Snowboard  | 3.5J', 'SNO3.5', 65, 20, 0, NULL, 3.5),
(368, 1, 'Junior | Skis + chaussures | 0.5J', 'JUN0.5', 14, 20, 0, NULL, 0.5),
(369, 1, 'Junior | Skis | 0.5J', 'JUN0.5', 10, 20, 0, NULL, 0.5),
(370, 1, 'Junior | Chaussures | 0.5J', 'JUN0.5', 4, 20, 0, NULL, 0.5),
(371, 1, 'Junior | Skis + chaussures | 1.5J', 'JUN1.5', 38, 20, 0, NULL, 1.5),
(372, 1, 'Junior | Skis  | 1.5J', 'JUN1.5', 27, 20, 0, NULL, 1.5),
(373, 1, 'Junior | Chaussures | 1.5J', 'JUN1.5', 11, 20, 0, NULL, 1.5),
(374, 1, 'Junior | Skis + chaussures | 2.5J', 'JUN2.5', 60, 20, 0, NULL, 2.5),
(375, 1, 'Junior | Skis  | 2.5J', 'JUN2.5', 43, 20, 0, NULL, 2.5),
(376, 1, 'Junior |  Chaussures | 2.5J', 'JUN2.5', 17, 20, 0, NULL, 2.5),
(377, 1, 'Junior | Skis + chaussures | 3.5J', 'JUN3.5', 82, 20, 0, NULL, 3.5),
(378, 1, 'Junior | Skis  | 3.5J', 'JUN3.5', 59, 20, 0, NULL, 3.5),
(379, 1, 'Junior | chaussures | 3.5J', 'JUN3.5', 23, 20, 0, NULL, 3.5),
(380, 1, 'Junior | Skis + chaussures | 6J', 'JUN6', 125, 20, 0, NULL, 6),
(381, 1, 'Casque | 0,5J', 'CAS0.5', 4, 20, 0, NULL, 0.5),
(382, 1, 'Casque | 1,5J', 'CAS1.5', 8, 20, 0, NULL, 1.5),
(383, 1, 'Casque | 2,5J', 'CAS2.5', 12, 20, 0, NULL, 2.5),
(384, 1, 'Casque | 3,5J', 'CAS3.5', 16, 20, 0, NULL, 3.5),
(385, 1, 'Adulte I Intermédiaire | Skis + chaussures | 0,5J', 'INT0.5', 26, 20, 0, NULL, 0.5),
(386, 1, 'Adulte I Intermédiaire | Skis | 0.5J', 'INT0.5', 17, 20, 0, NULL, 0.5),
(387, 1, 'Adulte I Intermédiaire | Chaussures | 0.5J', 'INT0.5', 9, 20, 0, NULL, 0.5),
(388, 1, 'Adulte I Intermédiaire | Skis + chaussures | 1.5J', 'INT1.5', 68, 20, 0, NULL, 1.5),
(389, 1, 'Adulte I Intermédiaire | Skis  | 1.5J', 'INT1.5', 44, 20, 0, NULL, 1.5),
(390, 1, 'Adulte I Intermédiaire | Chaussures | 1.5J', 'INT1.5', 24, 20, 0, NULL, 1.5),
(391, 1, 'Adulte I Intermédiaire | Skis + chaussures | 2.5J', 'INT2.5', 108, 20, 0, NULL, 2.5),
(392, 1, 'Adulte I Intermédiaire | Skis | 2.5J', 'INT2.5', 70, 20, 0, NULL, 2.5),
(393, 1, 'Adulte I Intermédiaire |Chaussures | 2.5J', 'INT2.5', 38, 20, 0, NULL, 2.5),
(394, 1, 'Adulte I Intermédiaire | Skis + chaussures | 3.5J', 'INT3.5', 147, 20, 0, NULL, 3.5),
(395, 1, 'Adulte I Intermédiaire | Skis | 3.5J', 'INT3.5', 95, 20, 0, NULL, 3.5),
(396, 1, 'Adulte I Intermédiaire | Chaussures | 3.5J', 'INT3.5', 51, 20, 0, NULL, 3.5),
(397, 1, 'Adulte | Expert | Skis  | 0.5J', 'EXP0.5', 21, 20, 0, NULL, 0.5),
(398, 1, 'Adulte | Expert | Chaussures | 1J', 'EXP0.5', 9, 20, 0, NULL, 0.5),
(399, 1, 'Adulte | Expert | Skis + chaussures | 1.5J', 'EXP1.5', 86, 20, 0, NULL, 1.5),
(400, 1, 'Adulte | Expert | Skis  | 1.5J', 'EXP1.5', 63, 20, 0, NULL, 1.5),
(401, 1, 'Adulte | Expert | Chaussures | 1.5J', 'EXP1.5', 24, 20, 0, NULL, 1.5),
(402, 1, 'Adulte | Expert | Skis + chaussures | 2.5J', 'EXP2.5', 140, 20, 0, NULL, 2.5),
(403, 1, 'Adulte | Expert | Skis  | 2.5J', 'EXP2.5', 103, 20, 0, NULL, 2.5),
(404, 1, 'Adulte | Expert | Chaussures | 2.5J', 'EXP2.5', 38, 20, 0, NULL, 2.5),
(405, 1, 'Adulte | Expert | Skis + chaussures | 3.5J', 'EXP3.5', 193, 20, 0, NULL, 3.5),
(406, 1, 'Adulte | Expert | Skis  | 3.5J', 'EXP3.5', 142, 20, 0, NULL, 3.5),
(407, 1, 'Adulte | Expert | Chaussures | 3.5J', 'EXP3.5', 51, 20, 0, NULL, 3.5),
(408, 4, 'COURS ESF ', '', 192, 0, 0, NULL, NULL),
(409, 2, 'NOUVEAU PRODUIT', '', 0, 0, 1, NULL, NULL),
(410, 5, 'SKI PASS 5J', 'SP5', 225.5, 0, 0, NULL, NULL),
(411, 5, 'SKI PASSES', '', 660, 0, 0, NULL, NULL),
(412, 5, 'SKI PASS 1J + Assurance', 'SP1A', 54.5, 0, 0, NULL, NULL),
(413, 5, 'SKI PASS 4J + Assurance', 'SP4A', 190.5, 0, 0, NULL, NULL),
(414, 5, 'SKI PASS 2J + Assurance', 'SP2A', 102, 0, 0, NULL, NULL),
(415, 5, 'SKI PASS 3J + Assurance', 'SP3A', 150, 0, 0, NULL, NULL),
(416, 5, 'SKI PASS 5J + Assurance', 'SP5A', 240.5, 0, 0, NULL, NULL),
(417, 5, 'SKI PASS 6J + Assurance', 'SP6A', 270, 0, 0, NULL, NULL),
(418, 5, 'SKI PASS 7J + Assurance', 'SP7A', 308, 0, 0, NULL, NULL),
(419, 5, 'SKI PASS 4H', 'SP4H', 46.5, 0, 0, NULL, NULL),
(420, 5, 'SKI PASS 4H + Assurance', 'SP4HA', 49.5, 0, 0, NULL, NULL),
(421, 5, 'SKI PASS 1J', 'SP1', 51.5, 0, 0, NULL, NULL),
(422, 5, 'SKI PASS 2J', 'SP2', 96, 0, 0, NULL, NULL),
(423, 5, 'SKI PASS 3J', 'SP3', 141, 0, 0, NULL, NULL),
(424, 5, 'SKI PASS 4J', 'SP4', 178.5, 0, 0, NULL, NULL),
(425, 5, 'SKI PASS 6J', 'SP6', 252, 0, 0, NULL, NULL),
(426, 5, 'SKI PASS 7J', 'SP7', 287, 0, 0, NULL, NULL),
(427, 5, 'SKI PASS 5-14 ANS 4H', 'SPE4H', 37.5, 0, 0, NULL, NULL),
(428, 5, 'SKI PASS 5-14 ANS 1J', 'SPE1', 41.5, 0, 0, NULL, NULL),
(429, 5, 'SKI PASS 5-14 ANS 2J', 'SPE2', 77, 0, 0, NULL, NULL),
(430, 5, 'SKI PASS 5-14 ANS 3J', 'SPE3', 113, 0, 0, NULL, NULL),
(431, 5, 'SKI PASS 5-14 ANS 4J', 'SPE4', 143, 0, 0, NULL, NULL),
(432, 5, 'SKI PASS 5-14 ANS 5J', 'SPE5', 181, 0, 0, NULL, NULL),
(433, 5, 'SKI PASS 5-14 ANS 6J', 'SPE6', 202, 0, 0, NULL, NULL),
(434, 5, 'SKI PASS 5-14 ANS 7J', 'SPE7', 230, 0, 0, NULL, NULL),
(435, 5, 'SKI PASS 5-14 ANS 4H + Assurance', 'SPE4HA', 40.5, 0, 0, NULL, NULL),
(436, 5, 'SKI PASS 5-14 ANS 1J + Assurance', 'SPE1A', 44.5, 0, 0, NULL, NULL),
(437, 5, 'SKI PASS 5-14 ANS 2J + Assurance', 'SPE2A', 83, 0, 0, NULL, NULL),
(438, 5, 'SKI PASS 5-14 ANS 3J + Assurance', 'SPE3A', 122, 0, 0, NULL, NULL),
(439, 5, 'SKI PASS 5-14 ANS 4J + Assurance', 'SPE4A', 155, 0, 0, NULL, NULL),
(440, 5, 'SKI PASS 5-14 ANS 5J + Assurance', 'SPE5A', 196, 0, 0, NULL, NULL),
(441, 5, 'SKI PASS 5-14 ANS 6J + Assurance', 'SPE6A', 220, 0, 0, NULL, NULL),
(442, 5, 'SKI PASS 5-14 ANS 7J + Assurance', 'SPE7A', 251, 0, 0, NULL, NULL),
(443, 4, 'SKI PASSE FAMILLE 5 J ', 'SPF5', 732, 0, 0, NULL, NULL),
(444, 5, 'SKI PASS FAMILLE 1J', 'SPF1', 46.5, 0, 0, NULL, NULL),
(445, 5, 'SKI PASS FAMILLE 2J', 'SPF2', 86.5, 0, 0, NULL, NULL),
(446, 5, 'SKI PASS FAMILLE 3J', 'SPF3', 127, 0, 0, NULL, NULL),
(447, 5, 'SKI PASS FAMILLE 4J', 'SPF4', 161, 0, 0, NULL, NULL),
(448, 5, 'SKI PASS FAMILLE 5J', 'SPF5', 203, 0, 0, NULL, NULL),
(449, 5, 'SKI PASS FAMILLE 6J', 'SPF6', 227, 0, 0, NULL, NULL),
(450, 5, 'SKI PASS FAMILLE 7', 'SPF7', 258.5, 0, 0, NULL, NULL),
(451, 5, 'SKI PASS FAMILLE 1J  + Assurance', 'SPF1A', 49.5, 0, 0, NULL, NULL),
(452, 5, 'SKI PASS FAMILLE 2J + Assurance', 'SPF2A', 92.5, 0, 0, NULL, NULL),
(453, 5, 'SKI PASS FAMILLE 3J + Assurance', 'SPF3A', 136, 0, 0, NULL, NULL),
(454, 5, 'SKI PASS FAMILLE 4J + Assurance', 'SPF4A', 173, 0, 0, NULL, NULL),
(455, 5, 'SKI PASS FAMILLE 5J + Assurance', 'SPF5A', 218, 0, 0, NULL, NULL),
(456, 5, 'SKI PASS FAMILLE 6J', 'SPF6A', 245, 0, 0, NULL, NULL),
(457, 5, 'SKI PASS FAMILLE 7J + Assurance', 'SPF7A', 279.5, 0, 0, NULL, NULL),
(458, 5, 'SKI PASS FAMILLE 5-14 ANS 1J', 'SPFE1', 37.5, 0, 0, NULL, NULL),
(459, 5, 'SKI PASS FAMILLE 5-14 ANS 2J', 'SPFE2', 69.5, 0, 0, NULL, NULL),
(460, 5, 'SKI PASS FAMILLE 5-14 ANS 3J', 'SPFE3', 102, 0, 0, NULL, NULL),
(461, 5, 'SKI PASS FAMILLE 5-14 ANS 4J', 'SPFE4', 129, 0, 0, NULL, NULL),
(462, 5, 'SKI PASS FAMILLE 5-14 ANS 5J', 'SPFE5', 163, 0, 0, NULL, NULL),
(463, 5, 'SKI PASS FAMILLE 5-14 ANS 6J', 'SPFE6', 182, 0, 0, NULL, NULL),
(464, 5, 'SKI PASS FAMILLE 5-14 ANS 7J', 'SPFE7', 207, 0, 0, NULL, NULL),
(465, 1, 'SKI PASS FAMILLE 5-14 ANS 1J + Assurance', 'SPFE1A', 40.5, 0, 0, NULL, NULL),
(466, 1, 'SKI PASS FAMILLE 5-14 ANS 2J + Assurance', 'SPFE2A', 75.5, 0, 0, NULL, NULL),
(467, 5, 'SKI PASS FAMILLE 5-14 ANS 3J + Assurance', 'SPFE3A', 111, 0, 0, NULL, NULL),
(468, 1, 'SKI PASS FAMILLE 5-14 ANS 4J + Assurance', 'SPFE4A', 141, 0, 0, NULL, NULL),
(469, 5, 'SKI PASS FAMILLE 5-14 ANS 5J + Assurance', 'SPFE5A', 178, 0, 0, NULL, NULL),
(470, 5, 'SKI PASS FAMILLE 5-14 ANS 6J + Assurance', 'SPFE6A', 200, 0, 0, NULL, NULL),
(471, 5, 'SKI PASS FAMILLE 5-14 ANS 7J + Assurance', 'SPFE7A', 228, 0, 0, NULL, NULL),
(472, 5, 'SKI PASS ', '', 46.5, 0, 0, NULL, NULL),
(473, 5, 'SKI PASS', '106.5', 106.5, 0, 0, NULL, NULL),
(474, 4, 'COURS ESF 1H 3 à 5 pers', 'LP3à5', 64, 0, 0, NULL, NULL),
(475, 4, 'COURS 1H 1 à 3 pers', 'LP1à3', 48, 0, 0, NULL, NULL),
(476, 4, 'Cours Collectif PM 6J', 'CC6', 162, 0, 0, NULL, NULL),
(477, 1, 'SKI PASS', '625', 625, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typeProduit`
--

CREATE TABLE IF NOT EXISTS `typeProduit` (
`idTypeProduit` int(11) NOT NULL,
  `libelleTypeProduit` varchar(50) NOT NULL,
  `entrepriseTypeProduit` int(11) NOT NULL DEFAULT '0',
  `couleurTypeProduit` varchar(6) DEFAULT '000000'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typeProduit`
--

INSERT INTO `typeProduit` (`idTypeProduit`, `libelleTypeProduit`, `entrepriseTypeProduit`, `couleurTypeProduit`) VALUES
(1, 'LOCATION', 2, '79c337'),
(2, 'TRAJET', 1, '0263c4'),
(3, 'ACCESSOIRE', 2, 'e81533'),
(4, 'COURS', 2, '7718c0'),
(5, 'FORFAIT', 2, '4a474c');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
 ADD PRIMARY KEY (`idAdministrateur`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
 ADD PRIMARY KEY (`idEntreprise`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`idItem`), ADD KEY `idProduit` (`idProduit`), ADD KEY `idCommande` (`idCommande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
 ADD PRIMARY KEY (`idProduit`), ADD KEY `idTypeProduit` (`idTypeProduit`);

--
-- Index pour la table `typeProduit`
--
ALTER TABLE `typeProduit`
 ADD PRIMARY KEY (`idTypeProduit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
MODIFY `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=478;
--
-- AUTO_INCREMENT pour la table `typeProduit`
--
ALTER TABLE `typeProduit`
MODIFY `idTypeProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idTypeProduit`) REFERENCES `typeProduit` (`idTypeProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
