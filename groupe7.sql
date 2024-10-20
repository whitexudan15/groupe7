-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 19 oct. 2024 à 00:48
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

-- --------------------------------------------------------


SET sql_mode = 'STRICT_ALL_TABLES';
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `groupe7`
--
CREATE DATABASE IF NOT EXISTS `groupe7`;
USE `groupe7`;

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

DROP TABLE IF EXISTS `professeurs`;
CREATE TABLE IF NOT EXISTS `professeurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `professeurs`
--

INSERT INTO `professeurs` (`id`, `nom`, `prenom`) VALUES
(1, 'PINDRA', 'Komlan'),
(2, 'TIEBEKABE', 'Pagdame'),
(3, 'BASSAGOU', 'Dotse'),
(4, 'MORTEY', 'Kossi novissi'),
(5, 'N\'DANATCHE', 'Kokou'),
(6, 'KPATCHA', 'Luc'),
(7, 'ADALESSOSSI', 'Komlan Egoto'),
(8, 'YELE', 'Kibalou'),
(9, 'KOLANI', 'Melkishdek'),
(10, 'DUPON', 'Eduardo');


-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` varchar(8) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `credits` int NOT NULL,
  `professeur` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_professeur` (`professeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `nom`, `credits`, `professeur`) VALUES
('INF13255', 'Programmation web côté serveur', 3, 9),
('INF13254', 'Algorithme avancée', 4, 3),
('INF13251', 'Concepts et fondamentaux de la sécurité', 3, 10),
('INF13250', 'Principes des systèmes d\'exploitation', 4, 7),
('INF13252', 'Services réseaux Informatique et ToIP', 4, 6),
('INF13257', 'Base de données avancées', 3, 5),
('INF14255', 'Infographie et multimédia', 3, 1),
('INF14254', 'Developpement d\'applications mobiles', 4, 8),
('INF14250', 'Administration système et réseau', 3, 4),
('MTH11251', 'Algèbre Linéaire', 3, 2);


-- --------------------------------------------------------

--
-- Structure de la table `programmation`
--

DROP TABLE IF EXISTS `programmation`;
CREATE TABLE IF NOT EXISTS `programmation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cours` varchar(120) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `type` varchar(1) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`cours`),
  KEY `fk_cours` (`cours`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `programmation`
--

INSERT INTO `programmation` (`cours`, `date`, `heure`, `type`, `description`) VALUES
('INF13252', '2024-10-15', '07:00:00', 'P', 'Le cours de Services Réseaux'),
('INF13254', '2024-10-23', '13:00:00', 'P', 'Description du cours ici');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` text NOT NULL,
  `role` varchar(5) NOT NULL,
  `profil` text NOT NULL,
  `mdp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `role`, `profil`, `mdp`) VALUES
('admin', 'admin', 'admin@gmail.com', 'admin', 'admin_profil.png', '$2y$10$4iHhgBsxFaBw1maVI90ha.q.cisx.gpDDLDvQ5wUFIZyx37g713mK');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
