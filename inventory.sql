-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 12 Mars 2017 à 18:49
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `inventory`
--

-- --------------------------------------------------------

--
-- Structure de la table `cheese_inventory`
--

CREATE TABLE `cheese_inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('goat','sheep','cow','donkey') NOT NULL,
  `price` float NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cheese_inventory`
--

INSERT INTO `cheese_inventory` (`id`, `name`, `type`, `price`, `quantity`) VALUES
(64, 'Pule', 'donkey', 1000, 6.7),
(65, 'Ossau iraty', 'sheep', 12.3, 2),
(66, 'Raclette', 'cow', 32.4, 24),
(67, 'Mont d''or', 'cow', 12.3, 9),
(68, 'ComtÃ©', 'cow', 23.4, 9.8),
(69, 'Munster', 'cow', 13.5, 12),
(70, 'Roblochon', 'cow', 16.8, 23.9),
(71, 'Morbier', 'cow', 17.9, 23),
(72, 'Pont l''Ã©veque', 'sheep', 11.1, 11),
(73, 'Livarot', 'goat', 12.78, 23);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cheese_inventory`
--
ALTER TABLE `cheese_inventory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cheese_inventory`
--
ALTER TABLE `cheese_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
