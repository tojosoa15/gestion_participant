-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 30 avr. 2021 à 11:39
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_participant`
--

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id_participant` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `societe_id` varchar(255) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_participant`)
) ENGINE=MyISAM AUTO_INCREMENT=184 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`id_participant`, `name`, `societe_id`, `activated`, `created_at`, `updated_at`, `email`) VALUES
(183, 'rené', '1,2', 0, '2021-04-30 08:56:22', '2021-04-30 08:56:22', 'raharisontj@gmail.com'),
(180, 'RAHARISON', '1,40', 0, '2021-04-30 08:41:55', '2021-04-30 08:50:51', 'soa@gmail.com'),
(168, 'Participants 2', '2,37', 0, '2021-04-29 12:40:24', '2021-04-30 06:51:47', 'tst@gmail.com'),
(169, 'Participant 3', '1,40', 0, '2021-04-29 13:50:18', '2021-04-30 08:41:36', 'rasoa@gmail.com'),
(181, 'Tojosoa', '2,40', 1, '2021-04-30 08:51:14', '2021-04-30 09:31:17', 'raharisontojosoa@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `societes`
--

DROP TABLE IF EXISTS `societes`;
CREATE TABLE IF NOT EXISTS `societes` (
  `id_societe` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_societe`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `societes`
--

INSERT INTO `societes` (`id_societe`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Société 1', '2021-04-28 19:16:53', '2021-04-29 06:41:29'),
(2, 'Société 2', '2021-04-28 19:18:09', '2021-04-28 19:18:09'),
(40, 'Société 8', '2021-04-29 12:30:28', '2021-04-30 06:50:22'),
(37, 'Société 5', '2021-04-29 11:57:04', '2021-04-29 11:57:04'),
(32, 'Société 6', '2021-04-29 11:30:40', '2021-04-29 12:39:23'),
(23, 'Société 3', '2021-04-28 20:15:32', '2021-04-28 20:15:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
