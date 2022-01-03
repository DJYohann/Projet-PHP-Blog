-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 03 jan. 2022 à 14:13
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tadmin`
--

INSERT INTO `tadmin` (`id`, `login`, `mdp`) VALUES
(1, 'ugvignon', '$2y$10$HgzllNIYqrp8Jwm7LXctW.Rm1Ub.bQNE57EjaqEr3qc5Q.dAPWABm'),
(2, 'yobreuil', '$2y$10$1o6aRR9Fxj5MPN0pmuv3ZebEThTkdEs7vU7Q.xF4DMnBZgpTHJLZi'),
(3, 'sesalva', '$2y$10$49egE/El6PUsvnBWK7qiyu8zpyptow5wpcH8OFCFMUp6tNl3uzoyO');

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
(1, '2021-12-16', 'Les joies de la programmation', 'ugvignon', '<br><br>\r\n<h5>Joies ou enfer de la programmation</h5>\r\n<p>Si vous êtes ici, je ne penses pas vous surprendre en disant que le code, c’est top. Par moment, on se sent créatif, manipulant des outils puissants qui nous facilite la vie. On est heureux. Mais des fois, tout ne se passe pas comme prévu. A défaut de pleurer, autant s’en amuser. Petit retour sarcastique sur la découverte du code par un débutant arrivant dans la vie professionnelle, et du bonheur que ça lui procure (ou pas). Voici donc notre article intitulé sobrement les joies du code.</p><br>\r\n<h5>Le bonheur, jusqu’à la gestion de projet</h5>\r\n<p>Des projets fun, on en a tous déjà fait. Que ce soit pour l’école, nous même ou le travail. Les technos, vous les appréciez. Le sujet du projet aussi. Bref, le bonheur est présent. Mais il arrive que vous soyez propulsé sur le projet que tout le monde redoute, le projet. Oui, vous savez, ce projet qui utilise une sombre techno uniquement car ça couterait trop cher de tout refaire. Ce projet avec une codebase de plusieurs décennies, avec des sources qui montre tout le désespoir des générations de dev qui ont eu a travailler dessus.</p><p>Alors oui, on peut le prendre avec humour, se dire que c’est une sorte de jeu d’orientation pour réussir a s’orienter dans un code spaghetti de 30 ans avec 4 normes de codage différentes. Se voir comme un archéologue numérique qui reconnait ces différences de styles pour suivre l’évolution du logiciel. Ou encore qui a le bonheur de trouver des commentaires du style « svp ne pas toucher » sur un bout de code qu’on pensait inutile. Mais personne n’est assez fou pour faire ce genre de projet sur son temps libre, et votre patron, vos pulsions archéologiques il s’en fiche un peu. Alors bonne chance pour réussir a survivre a cette terrible épreuve, vous en aurez besoin.</p><br>\r\n'),
(2, '2021-12-16', 'L’avenir de l’informatique', 'ugvignon', '<h5>Quelles évolutions pour l’avenir de l’informatique?</h5>\r\n<p>Notre secteur est en constante mutation, et tenter d’anticiper les changements à venir peut être très intéressant pour nous autres développeurs. Vous me remercierez peut-être dans 10 ans quand une nouvelle techno s’imposera et que vous vous y étiez déjà formé, allez savoir.</p>\r\n<p>Entre deux aller-retour au restaurant (nan j’rigole vous êtes confinés donc vous pouvez pas) vous retrouverez ici toutes les technologies et les domaines qui méritent un investissement, pour l’avenir, mais aussi le présent selon moi.</p>\r\n<h5>Web, cloud et data</h5>\r\n<p>Si vous êtes dev web ou si vous regardez un peu les offres d’emploi, ça ne vous surprendra pas que je parle de toutes les technologies qui tournent autour du principe de conteneur. Oui oui, tous les buzzword sur LinkedIn du type « Docker + Kubernetes + Jenkins ». Profitez en pour regarder tout ce qui est technologie cloud, type AWS ou Azure par exemple. Avec ça, vous êtes tranquilles pour aujourd’hui, comme pour les prochaines années vu la propension du secteur a vouloir caser du « cloud » absolument partout. Pour être complet sur tout ce qui tourne autour de, vulgairement, « le web », les API REST sont bien implantées mais certains sous-estiment encore beaucoup GraphQL, ne faites pas cette erreur.</p>\r\n<p>Je ne vous apprends rien en vous disant qu’on manipule de plus en plus de données sur internet, et bien ces données, il va falloir les traiter. C’est déjà un problème aujourd’hui, alors imaginez dans quelques années… heureusement, les technologies de big data existent déjà. Si ce domaine vous intéresse, Spark et l’écosystème Hadoop sont à creuser. Pour les plus universitaires, lire quelques papiers sur MapReduce peut aussi être très intéressant (ou un futur article, parce que ça en mérite vraiment un). La JVM est la principale concernée ici, donc si vous maitrisez déjà Java c’est un vrai plus, mais là ou Spark est le plus efficace, c’est en Scala. Double point positif, pour beaucoup la programmation fonctionnelle reste quelque chose de très lointain, et c’est pourtant très intéressant avec de multiples domaines d’application (dont le big data). Pour les flemmards voulant juste essayer, on peut utiliser Spark en Python.</p>');

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
