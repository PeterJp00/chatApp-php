-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 25 août 2021 à 19:54
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ajax_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_exp` int(11) NOT NULL,
  `id_user_dest` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `date_conversation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id`, `id_user_exp`, `id_user_dest`, `message`, `date_conversation`) VALUES
(37, 21, 25, 'neg la oui', '2021-08-20 12:50:33'),
(36, 25, 21, 'neg pose oui', '2021-08-20 12:50:22'),
(35, 21, 25, 'yow sak pac?', '2021-08-20 12:50:03'),
(34, 21, 24, 'Rire e pa vre bro!', '2021-08-20 11:49:53'),
(33, 24, 21, 'Sak Pac man Wap fe manji oui?', '2021-08-20 11:49:37'),
(32, 23, 21, 'sak Pac?', '2021-08-20 11:42:18'),
(31, 21, 23, 'yow', '2021-08-20 11:42:04'),
(30, 21, 22, 'nap gade man', '2021-08-19 21:13:01'),
(29, 22, 21, 'sak pac?', '2021-08-19 21:06:13'),
(28, 21, 22, 'ye man', '2021-08-19 21:05:56'),
(27, 22, 21, 'yow', '2021-08-19 21:00:21'),
(26, 22, 21, 'neg la baz', '2021-08-19 16:00:59'),
(25, 22, 21, 'neg poze oui', '2021-08-19 16:00:41'),
(24, 21, 22, 'Sak Pac man?', '2021-08-19 16:00:30'),
(38, 21, 25, '', '2021-08-20 12:50:35'),
(39, 21, 26, 'yow sak pac?', '2021-08-20 14:13:28'),
(40, 26, 21, 'neg la oui man e u?', '2021-08-20 14:13:48'),
(41, 21, 26, 'neg la man', '2021-08-20 14:13:58'),
(42, 26, 27, 'sak pac man?', '2021-08-20 14:16:32'),
(43, 27, 26, 'neg la oui man', '2021-08-20 14:16:51'),
(44, 24, 21, 'yow', '2021-08-20 14:54:06'),
(45, 24, 21, 'sak pac?', '2021-08-20 14:54:10'),
(46, 21, 24, 'neg la oui', '2021-08-20 14:54:29'),
(47, 38, 21, 'Yow\r\n', '2021-08-23 17:50:23'),
(48, 21, 38, 'sak pac?', '2021-08-23 17:50:35'),
(49, 25, 26, 'yow\r\n', '2021-08-25 11:57:38'),
(50, 26, 25, 'sak pac?', '2021-08-25 11:57:56'),
(51, 25, 26, 'neg poze', '2021-08-25 11:58:07');

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

DROP TABLE IF EXISTS `online`;
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `statut_connection` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `date_time_connection` datetime NOT NULL,
  `date_time_deconnection` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id`, `id_user`, `statut_connection`, `date_time_connection`, `date_time_deconnection`) VALUES
(73, 21, '0', '2021-08-20 12:49:53', '2021-08-20 12:50:57'),
(72, 25, '0', '2021-08-20 12:49:40', '2021-08-20 12:51:10'),
(71, 24, '0', '2021-08-20 11:49:16', '2021-08-20 11:55:30'),
(70, 21, '0', '2021-08-20 11:46:46', '2021-08-20 11:57:38'),
(69, 21, '0', '2021-08-20 11:41:51', '2021-08-20 11:42:58'),
(68, 23, '0', '2021-08-20 11:41:36', '2021-08-20 11:43:05'),
(67, 22, '0', '2021-08-19 21:50:37', '2021-08-20 11:40:50'),
(66, 21, '0', '2021-08-19 21:47:50', '2021-08-19 22:01:05'),
(65, 21, '0', '2021-08-19 20:59:47', '2021-08-19 21:41:55'),
(64, 22, '0', '2021-08-19 20:59:34', '2021-08-19 21:46:46'),
(63, 22, '0', '2021-08-19 16:00:17', '2021-08-19 16:01:45'),
(62, 21, '0', '2021-08-19 16:00:06', '2021-08-19 16:01:50'),
(74, 26, '0', '2021-08-20 14:12:51', '2021-08-20 14:14:10'),
(75, 21, '0', '2021-08-20 14:13:18', '2021-08-20 14:15:41'),
(76, 26, '0', '2021-08-20 14:14:16', '2021-08-20 14:14:23'),
(77, 27, '0', '2021-08-20 14:16:05', '2021-08-20 14:17:13'),
(78, 26, '0', '2021-08-20 14:16:21', '2021-08-20 14:17:08'),
(79, 21, '0', '2021-08-20 14:52:41', '2021-08-20 14:56:22'),
(80, 24, '0', '2021-08-20 14:53:27', '2021-08-20 14:56:28'),
(81, 21, '0', '2021-08-23 14:55:25', '2021-08-23 15:24:49'),
(82, 21, '0', '2021-08-23 17:49:30', '2021-08-23 17:51:32'),
(83, 38, '0', '2021-08-23 17:50:16', '2021-08-23 17:51:35'),
(84, 21, '0', '2021-08-23 20:48:02', '2021-08-23 20:53:04'),
(85, 38, '1', '2021-08-23 20:48:11', NULL),
(86, 26, '0', '2021-08-23 20:53:09', '2021-08-25 11:56:48'),
(87, 26, '0', '2021-08-25 11:57:14', '2021-08-25 11:58:16'),
(88, 25, '0', '2021-08-25 11:57:29', '2021-08-25 11:58:24'),
(89, 21, '0', '2021-08-25 15:53:54', '2021-08-25 15:54:02');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`) VALUES
(24, 'Auguste', 'august@gmail.com', '1234'),
(26, 'Marcial', 'marcial@gmail.com', '1234'),
(25, 'Jeffrey', 'jeffrey@gmail.com', '1234'),
(22, 'valery', 'valery@gmail.com', '1234'),
(21, 'Peterson', 'peter@gmail.com', '1234'),
(27, 'Badam', 'badam@gmail.com', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
