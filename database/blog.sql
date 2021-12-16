-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 16 déc. 2021 à 14:36
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `tadmin`
--

CREATE TABLE IF NOT EXISTS `tadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tadmin`
--

INSERT INTO `tadmin` (`id`, `login`, `mdp`) VALUES
(1, 'ugvignon', '$2y$10$HgzllNIYqrp8Jwm7LXctW.Rm1Ub.bQNE57EjaqEr3qc5Q.dAPWABm'),
(2, 'yobreuil', '$2y$10$1o6aRR9Fxj5MPN0pmuv3ZebEThTkdEs7vU7Q.xF4DMnBZgpTHJLZi');

-- --------------------------------------------------------

--
-- Structure de la table `tcomments`
--

CREATE TABLE IF NOT EXISTS `tcomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_news` (`id_news`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

CREATE TABLE IF NOT EXISTS `tnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_creation` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tnews`
--

INSERT INTO `tnews` (`id`, `date_creation`, `title`, `author`, `content`) VALUES
(1, '2021-09-22', 'jean', 'moi', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn'),
(2, '2021-10-05', 'j\'aime la tartiflette mais j\'en mange pas bcp', 'moi', 'gj fftkhb');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tcomments`
--
ALTER TABLE `tcomments`
  ADD CONSTRAINT `tcomments_ibfk_1` FOREIGN KEY (`id_news`) REFERENCES `tcomments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
