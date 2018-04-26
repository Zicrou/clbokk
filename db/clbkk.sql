-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 17 avr. 2018 à 16:32
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
-- Base de données :  `clbkk`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `rights` varchar(45) DEFAULT NULL,
  `date_connect` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `nom`, `prenom`, `pseudo`, `mdp`, `adresse`, `email`, `telephone`, `rights`, `date_connect`) VALUES
(2, 'asd', 'asd', 'AdminZ', '$2y$10$.40t6ogR7oOP4RuGw4tSUeAKDruT.bRZqOJXoB56M.pG1/M14gtMi', 'asd', 'asd@asd.asd', '789456120', NULL, '2017-10-04 21:18:58');

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

DROP TABLE IF EXISTS `candidats`;
CREATE TABLE IF NOT EXISTS `candidats` (
  `id_Cpersos` int(11) NOT NULL AUTO_INCREMENT,
  `payed` varchar(3) DEFAULT NULL,
  `domaine` varchar(255) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `nationalite` varchar(45) DEFAULT NULL,
  `pays` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `departement` varchar(45) DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `disponibilite` varchar(45) DEFAULT NULL,
  `metier1` varchar(45) DEFAULT NULL,
  `metier2` varchar(45) DEFAULT NULL,
  `metier3` varchar(45) DEFAULT NULL,
  `annees_experience` int(11) DEFAULT NULL,
  `entreprise_frequente` varchar(255) DEFAULT NULL,
  `telephone1` varchar(45) DEFAULT NULL,
  `telephone2` varchar(45) DEFAULT NULL,
  `description` text,
  `preuve_telephone` varchar(45) DEFAULT NULL,
  `preuve_telephone2` varchar(45) DEFAULT NULL,
  `preuve_image` text,
  `certificat_travail` text,
  `DIPLOME` text,
  `insertedBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_Cpersos`),
  KEY `region` (`region`),
  KEY `region_2` (`region`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id_Cpersos`, `payed`, `domaine`, `nom`, `prenom`, `type`, `nationalite`, `pays`, `region`, `departement`, `date_inscription`, `disponibilite`, `metier1`, `metier2`, `metier3`, `annees_experience`, `entreprise_frequente`, `telephone1`, `telephone2`, `description`, `preuve_telephone`, `preuve_telephone2`, `preuve_image`, `certificat_travail`, `DIPLOME`, `insertedBy`) VALUES
(1, 'Yes', 'construction', 'SECK', 'Elhadji Abdou Aziz', NULL, NULL, 'senegal', 'thies', 'tivaouane', '2017-10-14 08:05:42', 'FREE', 'maçon', 'mecanicien', 'menuisier', 8, 'sk8z', '781026837', '770376245', 'employee', '776769266', '775686481', 'that_me', 'tchill', 'mindup', ''),
(2, 'Yes', 'construction', 'seck', 'abdou Aziz', NULL, NULL, 'senegal', 'thies', 'mbour', '2017-10-14 08:09:41', 'FREE', 'maçon', 'electricien', 'plombier', 35, 'none', '770376245', '781026837', 'chef d\'atelier a diamniadio', '774542582', '779523698', 'whrite_now', 'rien', 'bien', ''),
(3, 'Yes', 'Automobile', 'NGOM', 'Aboul Bachir', NULL, NULL, 'senegal', 'kedougou', 'salemata', '2018-01-09 18:45:19', 'FREE', 'conducteurMonteCarge', '', '', 10, 'sk8z', '778526459', '78963254', 'chef d\'equipe', '7742568932', '', '', 'Attestation de reussite', 'weeelll done', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `creer_inserter`
--

DROP TABLE IF EXISTS `creer_inserter`;
CREATE TABLE IF NOT EXISTS `creer_inserter` (
  `id_creation` int(11) NOT NULL,
  `manifest` varchar(45) DEFAULT NULL,
  `date_manifest` timestamp NULL DEFAULT NULL,
  `admins_id_admin` int(11) NOT NULL,
  `inserters_id_inserters` int(11) NOT NULL,
  PRIMARY KEY (`id_creation`,`admins_id_admin`,`inserters_id_inserters`),
  KEY `fk_creer_inserter_admins1_idx` (`admins_id_admin`),
  KEY `fk_creer_inserter_inserters1_idx` (`inserters_id_inserters`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id_departement` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_departement`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `region_id`, `name`) VALUES
(1, 1, 'DAKAR'),
(2, 1, 'PIKINE'),
(3, 1, 'GUEDIAWAYE'),
(4, 1, 'RUFISQUE'),
(5, 2, 'MBOUR'),
(6, 2, 'THIES'),
(7, 2, 'TIVAOUANE'),
(8, 3, 'BAKEL'),
(9, 3, 'KOUMPENTOUM'),
(10, 3, 'TAMBACOUNDA'),
(11, 3, 'GOUDIRY'),
(12, 4, 'KOLDA'),
(13, 4, 'VELINGARA'),
(14, 4, 'MEDINA YORO FOULAH'),
(15, 5, 'KAOLACK'),
(16, 5, 'GUINGUINEO'),
(17, 5, 'NIORO DU RIP'),
(18, 6, 'KANEL'),
(19, 6, 'MATAM'),
(20, 6, 'RANEROU'),
(21, 7, 'BOGNONA'),
(22, 7, 'OUSSOUYE'),
(23, 7, 'ZIGUINCHOR'),
(24, 8, 'KEDOUGOU'),
(25, 8, 'SALAMATA'),
(26, 8, 'SARAYA'),
(27, 9, 'BIRKILANE'),
(28, 9, 'KAFFRINE'),
(29, 9, 'MALEM-HODAR'),
(30, 9, 'KOUNGHEUL'),
(31, 10, 'BOUNKILING'),
(32, 10, 'GOUDOMP'),
(33, 10, 'SEDHIOU'),
(34, 11, 'DAGANA'),
(35, 11, 'PODOR'),
(36, 11, 'SAINT-LOUIS'),
(37, 12, 'BAMBEY'),
(38, 12, 'DIOURBEL'),
(39, 12, 'MBACKE'),
(40, 13, 'FATICK'),
(41, 13, 'FOUNDIOUNE'),
(42, 13, 'GOSSAS'),
(43, 14, 'KEBEMER'),
(44, 15, 'LINGUERE'),
(45, 15, 'LOUGA');

-- --------------------------------------------------------

--
-- Structure de la table `inserters`
--

DROP TABLE IF EXISTS `inserters`;
CREATE TABLE IF NOT EXISTS `inserters` (
  `id_inserters` int(11) NOT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `mdp` varchar(45) DEFAULT NULL,
  `rights` varchar(45) DEFAULT NULL,
  `dacte_connect` timestamp NULL DEFAULT NULL,
  `date_manifest` timestamp NULL DEFAULT NULL,
  `type_manifest` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_inserters`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `insertions`
--

DROP TABLE IF EXISTS `insertions`;
CREATE TABLE IF NOT EXISTS `insertions` (
  `id_insertions` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `inserters_id_inserters` int(11) NOT NULL,
  `candidats_id_Cpersos` int(11) NOT NULL,
  PRIMARY KEY (`id_insertions`,`inserters_id_inserters`,`candidats_id_Cpersos`),
  KEY `fk_insertions_inserters1_idx` (`inserters_id_inserters`),
  KEY `fk_insertions_candidats1_idx` (`candidats_id_Cpersos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `name`) VALUES
(1, 'Senegal'),
(2, 'Gambie');

-- --------------------------------------------------------

--
-- Structure de la table `recrutements`
--

DROP TABLE IF EXISTS `recrutements`;
CREATE TABLE IF NOT EXISTS `recrutements` (
  `id_recrutements` int(11) NOT NULL,
  `date_reccrutement` timestamp NULL DEFAULT NULL,
  `date_debut` timestamp NULL DEFAULT NULL,
  `date_fin` timestamp NULL DEFAULT NULL,
  `users_id_users` int(11) NOT NULL,
  `candidats_id_Cpersos` int(11) NOT NULL,
  PRIMARY KEY (`id_recrutements`,`users_id_users`,`candidats_id_Cpersos`),
  KEY `fk_recrutements_users1_idx` (`users_id_users`),
  KEY `fk_recrutements_candidats1_idx` (`candidats_id_Cpersos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id_region`, `name`) VALUES
(1, 'DAKAR'),
(2, 'THIES'),
(3, 'TAMBACOUNDA'),
(4, 'KOLDA'),
(5, 'KAOLACK'),
(6, 'MATAM'),
(7, 'ZIGUINCHOR'),
(8, 'KEDOUGOU'),
(9, 'KAFFRINE'),
(10, 'SEDHIOU'),
(11, 'SAINT-LOUIS'),
(12, 'DIOURBEL'),
(13, 'FATICK'),
(14, 'LOUGA');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `telephone` (`telephone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `pseudo`, `email`, `password`, `nom`, `prenom`, `adresse`, `telephone`, `date_creation`, `confirmation_token`, `confirmed_at`, `etat`, `photo`) VALUES
(11, 'zicrou', 'zicrou@gmail.com', '$2y$10$waK/v5UhFXhWoS4subI8PeDRMeg7gxjoLW.byDCFmhgB90k/vPmom', 'seck', 'zicrou', 'zac', '781026837', '2017-10-09 00:00:00', '2JFdNxpgtHPHxhBDN0TnyRIGZoX1etDZI8xP7S02M0YGjErLCkDcCw0asLCQ', NULL, 1, ''),
(20, NULL, 'seck@gmail.com', 'asd', 'Seck', 'Zicrou', NULL, '2217845612325', '2018-02-22 09:42:08', 'Hpwco8RI5PSNXmXjt3G7KjENTLluSI1iYUyBTmcTQvumo6vschhxYuCZ4x0D', NULL, 1, '20.jpg'),
(21, NULL, 'zicrou@outlook.fr', 'asd', 'SECK', 'Abdou Aziz', NULL, 'askbjflvbeflbve', '2018-02-22 13:09:34', 'FnSlnPfKMwan8jY9EfkzDtkm0WCyT8DeAzCsfTLzEwOsWbFNHirHVddBIk3q', NULL, 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
