-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 jan. 2021 à 14:30
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
-- Base de données : `mybocuse`
--

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `recipeid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `recipe_name` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `fk_userid` tinyint(4) NOT NULL,
  PRIMARY KEY (`recipeid`),
  KEY `fk_userid` (`fk_userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`recipeid`, `recipe_name`, `date`, `fk_userid`) VALUES
(1, 'Tarte tatin', '2021-01-19', 2),
(2, 'Cookies', '2021-01-17', 1),
(3, 'Gateau au chocolat', '2021-01-19', 5),
(4, 'Poisson pané', '2021-01-24', 4),
(5, 'Muffin', '2021-01-18', 14);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `account_type` enum('chef','student') COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userid`, `email`, `firstname`, `lastname`, `password`, `account_type`) VALUES
(1, 'audrey-g@beaucuz.be', 'Audrey', 'Gilmant', 'audreygilmant', 'chef'),
(2, 'marie-f@beaucuz.be', 'Marie', 'Fourriere', 'mariefourriere', 'chef'),
(3, 'dena-b@beaucuz.be', 'Dena', 'Babaie', 'denababaie', 'chef'),
(4, 'richard-i@beaucuz.be', 'Richard', 'Ibambasi', 'richardibambasi', 'chef'),
(5, 'dwayne-j@beaucuz.be', 'Dwayne', 'Johnson', 'dwaynejohnson', 'student'),
(6, 'jason-s@beaucuz.be', 'Jason', 'Statham', 'jasonstatham', 'student'),
(7, 'vin-d@beaucuz.be', 'Vin', 'Diesel', 'vindiesel', 'student'),
(8, 'paul-w@beaucuz.be', 'Paul', 'Walker', 'paulwalker', 'student'),
(9, 'michelle-r@beaucuz.be', 'Michelle', 'Rodriguez', 'michellerodriguez', 'student'),
(10, 'jordana-b@beaucuz.be', 'Jordana', 'Brewster', 'jordanabrewster', 'student'),
(11, 'luke-e@beaucuz.be', 'Luke', 'Evans', 'lukeevans', 'student'),
(12, 'charlize-t@beaucuz.be', 'Charlize', 'Theron', 'charlizetheron', 'student'),
(13, 'vanessa-k@beaucuz.be', 'Vanessa', 'Kirby', 'vanessakirby', 'student'),
(14, 'john-c@beaucuz.be', 'John', 'Cena', 'johncena', 'student');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`fk_userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
