-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 25 juin 2023 à 22:11
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moto`
--

-- --------------------------------------------------------

--
-- Structure de la table `moto`
--

DROP TABLE IF EXISTS `moto`;
CREATE TABLE IF NOT EXISTS `moto` (
  `moto_id` int NOT NULL AUTO_INCREMENT,
  `moto_brand` varchar(250) NOT NULL,
  `moto_model` varchar(250) NOT NULL,
  `id_moto_type` int NOT NULL,
  `moto_picture` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`moto_id`),
  KEY `id_moto_type` (`id_moto_type`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moto`
--

INSERT INTO `moto` (`moto_id`, `moto_brand`, `moto_model`, `id_moto_type`, `moto_picture`) VALUES
(2, 'Ducati', 'Panigale V2', 3, 'pv2.png'),
(3, 'Yamaha', 'R1 1000', 3, 'yr1.jpg'),
(4, 'Ducati', 'XDiavel S', 2, 'ducat.webp'),
(5, 'Harley Davidson', 'Street Bob', 2, 'hd.webp'),
(6, 'Indian Scout', 'Bobber', 2, 'indian.webp'),
(7, 'Beta', '300 RR 2T', 1, 'beta.webp'),
(8, 'Suzuki', 'DR-Z 400 S 2000', 1, 'z400.webp'),
(9, 'Husqvarna ', 'TE 300l', 1, 'te300.png'),
(10, 'Ducati', 'Streetfighter V4 S', 4, 'v4.webp'),
(11, 'Triumph', 'Street triple 765 RS', 4, 'triu.webp'),
(12, 'KTM', '1290 Superduke R EVO', 4, 'ktm.webp');

-- --------------------------------------------------------

--
-- Structure de la table `moto_type`
--

DROP TABLE IF EXISTS `moto_type`;
CREATE TABLE IF NOT EXISTS `moto_type` (
  `moto_type_id` int NOT NULL AUTO_INCREMENT,
  `moto_type_name` varchar(250) NOT NULL,
  PRIMARY KEY (`moto_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moto_type`
--

INSERT INTO `moto_type` (`moto_type_id`, `moto_type_name`) VALUES
(1, 'Enduro'),
(2, 'Custom'),
(3, 'Sportive'),
(4, 'Roadster\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'admin', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `moto`
--
ALTER TABLE `moto`
  ADD CONSTRAINT `moto_ibfk_1` FOREIGN KEY (`id_moto_type`) REFERENCES `moto_type` (`moto_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
