-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 jan. 2022 à 23:17
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE USER IF NOT EXISTS 'blog'@'localhost' IDENTIFIED BY 'azertyuiop';
GRANT ALL ON `blog`.* TO 'blog'@'localhost' IDENTIFIED BY 'azertyuiop';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `tadmin`
--

DROP TABLE IF EXISTS `tadmin`;
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
(3, 'sesalva', '$2y$10$49egE/El6PUsvnBWK7qiyu8zpyptow5wpcH8OFCFMUp6tNl3uzoyO'),
(4, 'admin', '$2y$10$mBDJWPxy1fbVveHTy8RQROTyHlfgb2Gvfc/kVusmzkYAT.jNNxsvO');

-- --------------------------------------------------------

--
-- Structure de la table `tcomments`
--

DROP TABLE IF EXISTS `tcomments`;
CREATE TABLE IF NOT EXISTS `tcomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_news` (`id_news`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tcomments`
--

INSERT INTO `tcomments` (`id`, `id_news`, `pseudo`, `content`) VALUES
(1, 1, 'Titouan', 'g r1 compris'),
(2, 1, 'Bryan', 'I\'m in the kitchen'),
(3, 1, 'Marine', 'Incroyable !'),
(4, 1, 'test', 'jj\r\n'),
(5, 1, 'test', 'jea'),
(6, 1, 'test', 'jea'),
(7, 1, 'test', 'jea'),
(8, 1, 'test', 'jea'),
(9, 1, 'test', 'jea'),
(10, 1, 'test', 'jea');

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

DROP TABLE IF EXISTS `tnews`;
CREATE TABLE IF NOT EXISTS `tnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_creation` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tnews`
--

INSERT INTO `tnews` (`id`, `date_creation`, `title`, `author`, `content`) VALUES
(1, '2021-12-16', 'Les joies de la programmation', 'ugvignon', '<br><br>\r\n<h5>Joies ou enfer de la programmation</h5>\r\n<p>Si vous êtes ici, je ne penses pas vous surprendre en disant que le code, c’est top. Par moment, on se sent créatif, manipulant des outils puissants qui nous facilite la vie. On est heureux. Mais des fois, tout ne se passe pas comme prévu. A défaut de pleurer, autant s’en amuser. Petit retour sarcastique sur la découverte du code par un débutant arrivant dans la vie professionnelle, et du bonheur que ça lui procure (ou pas). Voici donc notre article intitulé sobrement les joies du code.</p><br>\r\n<h5>Le bonheur, jusqu’à la gestion de projet</h5>\r\n<p>Des projets fun, on en a tous déjà fait. Que ce soit pour l’école, nous même ou le travail. Les technos, vous les appréciez. Le sujet du projet aussi. Bref, le bonheur est présent. Mais il arrive que vous soyez propulsé sur le projet que tout le monde redoute, le projet. Oui, vous savez, ce projet qui utilise une sombre techno uniquement car ça couterait trop cher de tout refaire. Ce projet avec une codebase de plusieurs décennies, avec des sources qui montre tout le désespoir des générations de dev qui ont eu a travailler dessus.</p><p>Alors oui, on peut le prendre avec humour, se dire que c’est une sorte de jeu d’orientation pour réussir a s’orienter dans un code spaghetti de 30 ans avec 4 normes de codage différentes. Se voir comme un archéologue numérique qui reconnait ces différences de styles pour suivre l’évolution du logiciel. Ou encore qui a le bonheur de trouver des commentaires du style « svp ne pas toucher » sur un bout de code qu’on pensait inutile. Mais personne n’est assez fou pour faire ce genre de projet sur son temps libre, et votre patron, vos pulsions archéologiques il s’en fiche un peu. Alors bonne chance pour réussir a survivre a cette terrible épreuve, vous en aurez besoin.</p><br>\r\n'),
(2, '2021-12-16', 'L’avenir de l’informatique', 'ugvignon', '<h5>Quelles évolutions pour l’avenir de l’informatique?</h5>\r\n<p>Notre secteur est en constante mutation, et tenter d’anticiper les changements à venir peut être très intéressant pour nous autres développeurs. Vous me remercierez peut-être dans 10 ans quand une nouvelle techno s’imposera et que vous vous y étiez déjà formé, allez savoir.</p>\r\n<p>Entre deux aller-retour au restaurant (nan j’rigole vous êtes confinés donc vous pouvez pas) vous retrouverez ici toutes les technologies et les domaines qui méritent un investissement, pour l’avenir, mais aussi le présent selon moi.</p>\r\n<h5>Web, cloud et data</h5>\r\n<p>Si vous êtes dev web ou si vous regardez un peu les offres d’emploi, ça ne vous surprendra pas que je parle de toutes les technologies qui tournent autour du principe de conteneur. Oui oui, tous les buzzword sur LinkedIn du type « Docker + Kubernetes + Jenkins ». Profitez en pour regarder tout ce qui est technologie cloud, type AWS ou Azure par exemple. Avec ça, vous êtes tranquilles pour aujourd’hui, comme pour les prochaines années vu la propension du secteur a vouloir caser du « cloud » absolument partout. Pour être complet sur tout ce qui tourne autour de, vulgairement, « le web », les API REST sont bien implantées mais certains sous-estiment encore beaucoup GraphQL, ne faites pas cette erreur.</p>\r\n<p>Je ne vous apprends rien en vous disant qu’on manipule de plus en plus de données sur internet, et bien ces données, il va falloir les traiter. C’est déjà un problème aujourd’hui, alors imaginez dans quelques années… heureusement, les technologies de big data existent déjà. Si ce domaine vous intéresse, Spark et l’écosystème Hadoop sont à creuser. Pour les plus universitaires, lire quelques papiers sur MapReduce peut aussi être très intéressant (ou un futur article, parce que ça en mérite vraiment un). La JVM est la principale concernée ici, donc si vous maitrisez déjà Java c’est un vrai plus, mais là ou Spark est le plus efficace, c’est en Scala. Double point positif, pour beaucoup la programmation fonctionnelle reste quelque chose de très lointain, et c’est pourtant très intéressant avec de multiples domaines d’application (dont le big data). Pour les flemmards voulant juste essayer, on peut utiliser Spark en Python.</p>'),
(3, '2022-01-04', 'PHP et son avenir', 'ugvignon', '<p> Au vu de l’actualité de notre secteur, notamment en ce qui concerne le développement web, on pourrait croire que PHP a complètement disparu. En effet, nous sommes constamment abreuvés d’une pelleté de nouveaux framework frontend JavaScript, et d’article sur NodeJS. Et évidemment des news sur Python, parce que comme on l’a déjà vu, Python c’est vraiment cool. Mais il ne faut pour autant oublier que PHP est encore là. Certes moins fringuant qu’auparavant, mais on va tout de même voir qu’il a un certain nombre d’arguments à faire valoir. Disclaimer! Pour les lecteurs avides de technique, je vous le dis tout de suite, cet article est très général et n’aborde pas de détail technique. Si vous en êtes friand laissez un commentaire, on verra se qu’on peut faire pour un prochain sujet ? Et si vous êtes déçu (eh bien déjà désolé), on vous met un lien vers un petit meme qui vous rendra le sourire: <a href=\"https://foutucode.fr/la-religion-php-mysql\">https://foutucode.fr/la-religion-php-mysql</a>\r\n<h3>D’où vient PHP ?</h3>\r\n<p>Alors, commençons. PHP, c’est un langage de script des années 90. Au départ, c’est juste une suite d’outils programmés par un type, tout seul, pour éviter de pisser du code. De l’aveux même de Lerdorf, le créateur, il n’aime pas vraiment programmer. Surtout, il n’a aucune idée de comment développer un langage. On se retrouve donc avec un langage qui nous permet de faire des projet qui tournent vraiment vite, ce qui est fort pratique. Cependant, en contrepartie, le niveau organisation laisse à désirer. C’est efficace, mais ce n’est pas efficient. Heureusement, entre 1994 et 2020, on a toute une flopée de frameworks qui obligent à faire du code ayant un minimum de cohérence. Il ne faut cependant pas oublier qu’en théorie on peut faire son projet en disséminant des petits bouts de code par ci par là. Le fameux code spaghetti que tout prof d’informatique ou formateur redoute.</p>\r\n<h3>Un passif qui aide</h3>\r\n<p>La base de codes en PHP est juste immense. Pour une entreprise, effectuer une transition peut coûter très cher si le projet est vraiment important. On se retrouve donc aujourd’hui avec un grand nombre d’entreprises possédant des sites tournant sous PHP. Et elles ne risquent pas de faire de transition vers d’autres technologies. En effet, plus elles attendent et moins la transition est intéressante financièrement parlant. Il faut dire que PHP, même si c’est pas sexy, même si c’est pas toujours la techno la plus adapté, et bien ça fait le job.\r\nAutre point: si un projet tourne depuis 10 ans, ce n’est pas vraiment la priorité d’une boite de tout refaire de zéro parce que les mecs de la technique gueulent sur le langage. Mais plus important encore, c’est que ce passif a permis à tout un tas d’âmes très compétentes -et charitables- de produire une quantité pharaonique de ressources. Dans le tas on retrouve inévitablement des documents de très grande qualité.\r\n\r\nA titre d’exemple, la recherche « tutorial PHP » renvoi 550 millions de résultats sur Google. C’est 6 fois plus que pour Node et presque 45 fois plus que pour Django. Certes ce résultat est à moduler par rapport aux qualités des documentations, mais cela a le mérite de donner un certain nombre d’indications vis-à-vis de l’accessibilité permise par l’ancienneté de la technologie. Parce que oui, comme en Javascript d’ailleurs, le fait que beaucoup de débutants pratiquent fait que l’on trouve à boire et à manger sur internet niveau documentation.\r\nNiveau doc, la doc officielle est une des meilleures disponibles, c’est un vrai bonheur. Des articles et vidéos sont disponibles pour tous les niveaux. Tous vos problèmes ont été probablement rencontrés et résolus. Tout ça fait que pour un débutant, cela libère beaucoup de temps pour apprendre les bases de la programmation et de ne pas se bloquer sur un détail particulier au langage qu’il n’arrivera pas a résoudre.</p>'),
(4, '2022-01-04', 'Quel langage pour débuter en programmation?', 'ugvignon', '<h3>Les meilleurs langages pour débuter, selon VOS besoins!</h3>\r\n<p>Voici une question qui revient souvent sur les forums, « quel langage qu’il est le plus fort ? ». Evidemment, on vous répond qu’il n’y a aucun langage fondamentalement meilleur que les autres, et c’est vrai. Pourtant, on retrouve bon nombre de classements de langages sur internet, avec au choix en première position Python on Javascript. Cet article est différent, il n’a pas pour ambition de fixer un classement arrêté. Je vais plutôt tenter de vous aiguiller, selon votre profil, selon ce que vous souhaitez faire, que ce soit en projet de développement ou en étude par exemple, vers un ou plusieurs langages. Et oui, je parle de projet d’études car d’après moi, dans certains cas, tous les critères de choix ne concernent pas exclusivement le langage en lui-même.</p>\r\n<h3>Quand on est un jeune lycéen</h3>\r\n<p>Plein de fougue, vous aimez l’informatique. Vous n’avez pas forcement encore conscience de l’immensité de l’océan qu’est ce domaine, mais vous aimez ça. Les algorithmes, les implémenter, réfléchir à leur efficacité, tout ça c’est votre dada. Je ne saurais vous proposer autre chose que le Python. En effet, il est relativement facile d’accès, mais il vous permettra d’aller très loin dans sa maîtrise, avec le temps. De plus, selon ce qui vous plaira plus tard, il y a fort à parier qu’il vous soit utile. Ce peut être le cas en analyse de données, en web ou pour de petites applications par exemple.\r\n\r\nPour ceux aimant plutôt comprendre comment fonctionne la logique des ordinateurs, vous voulez tout contrôler, le C est recommandable. Dans ces deux langages, tout ce que vous apprendrez sera assez général pour vous servir tout au long de votre vie dans l’informatique. Par ailleurs, on peut aussi accélérer du Python en le « mixant » avec du C. De plus, Python est le langage utilisé dans l’enseignement jusqu’au Bac, parfois même plus tard, donc c’est tout bénef.</p>'),
(5, '2022-01-04', 'Intelligence artificielle et société', 'ugvignon', '<h3>L’Intelligence Artificielle et notre société: la place qu’elle prend et ce qu’elle dit de nous</h3>\r\n<p>Si vous avez l’habitude de nous lire, cet article pourrait vous surprendre. En effet, il tranche avec les autres par son caractère moins scientifique et par une approche plus basée sur une réflexion ouverte. Il se trouve que l’on dit régulièrement que l’on vit avec l’Intelligence Artificielle, avec un sous-entendu soit fataliste, véhément soit complètement fanatisé fan-boy. Cependant il serait temps de s’arrêter sur les implications sociétales de tels bouleversement techniques. Comment sont-ils utilisés et que permettent-ils de dire de notre société. A la vu du sujet, vous comprendrez donc que cet article partage en grande partie un réflexion personnelle. Il est donc largement sujet aux discussions et débats. Le but serait même de provoquer ces débats.</p>\r\n<h3>Un alignement des planètes</h3>\r\n<p>On croit, souvent à tort a mon avis, que l’usage d’intelligence artificielle a depuis son adoption radicalement modifié notre société. Bien que ce changement existe, il me semble que l’impact soit plus de l’ordre esthétique que fondamental. L’émergence de ces technologies, théorisées d’un point de vue scientifique depuis des décennies, n’a été possible que par la préexistence de ce que l’on considère aujourd’hui comme les conséquence de ces techniques. Plus exactement, je parle ici de la volonté d’efficacité appliquée à tout bout de champs. Ajoutez à cela un stock de données monstrueux permettant l’entraînements des systèmes et vous avez le terreau fertile pour l’IA .\r\n\r\nOn peut aussi remarquer que l’Intelligence Artificielle n’a pas, d’elle-même, provoqué ce que l’on appelle « la surveillance de masse ». Ces technologies l’ont certes perfectionnée et amenée a un niveau encore jamais vu dans l’histoire de l’humanité, mais c’est cette surveillance et la collecte de données, préexistante a ces systèmes modernes, qui a justement permis leurs émergence. Nous pourrions même remonter plus loin! Quel dictateur, empereur, roi n’avait pas son réseau d’espion et de sentinelles pour garder le contrôle du pouvoir? Nous n’avons fait que remplacer ce réseau par un système technologique bien plus performant.\r\n\r\nLorsque l’on regarde l’évolution des techniques en IA, on voit une recherche de toujours plus d’efficacité, sans que ces évolutions ne soit par personnes, c’est l’IA qui a, d’une certaine manière, une autonomie complète dans son processus d’évolution. On ne peut que décréter l’autonomie de l’évolution de ces techniques en voyant nombre d’articles, suivant une « innovation », se demandant « Maintenant, où pouvons-nous bien utiliser ça ». Ce n’est non plus la nécessité d’amélioration du « bonheur humain », de manière un peu caricaturale, qui guide l’évolution. Désormais, c’est l’amélioration du système devient un but en soi. Et puis, après tout, on trouvera bien une utilité plus tard. A travers l’Intelligence Artificielle, c’est tout le modèle moderne de l’évolution technologique qui est à penser. Cependant, ce n’est pas ici le sujet de l’article, nous allons donc nous attarder sur d’autres points me tenant à cœur.</p><h3>L’IA, un choix de société à faire?</h3>\r\n<p>Sans remettre en cause le système complet, certain problèmes, d’ordre sociétaux ou éthiques, apparaissent vis-à-vis des techniques d’intelligences artificielles. Ces problèmes sont plus simple a traiter, bien que moins profond, car ils découlent de considérations techniques. Les techniques modernes d’intelligence artificielles sont, dans tous les domaines « maîtrisés », nettement meilleurs que les humains. Que ce soit pour lire une radiographie ou déduire les sentiments d’une personne, les systèmes informatiques sont meilleurs que nous. Aucune critique visant leur efficacité n’est donc, à mon sens, acceptable.  Par contre, la critique arrive justement a propos de cette efficacité : quel est le prix d’un système si efficace? Par exemple, ces systèmes sont structurellement incapable d’expliquer leur « raisonnement ». Les guillemets sont volontaires, puisque, agissant comme une boite noire, nous ne pouvons pas mettre de mots sur ce « mécanisme d’apprentissage ».\r\n\r\nNous avons donc des systèmes qui donnent de bon résultats, mais non vérifiables. Ce qui revient à abandonner sa capacité d’action, remettant en quelque sorte les clés au Dieu IA. Non pas qu’il ne le veuille pas, mais car il ne le peut pas. Le problème fondamental étant que le choix de cet abandon de capacité d’action et de réflexion caractérisant l’esprit humain, n’est pas laissé aux utilisateurs ou consommateurs (appelez-les comme vous voulez). Quelqu’un, un jour, a probablement dit « Ça marche mieux, donc on va faire ça comme ça ».\r\n\r\nVous ne pouvez pas échapper a ce choix de société pour lequel vous n’avez jamais été consulté. Que ce soit pour avoir un prêt a la banque, retrouver des anciens amis sur internet ou même savoir quel restaurant essayer, vous êtes constamment soumis à un système global qui ne peut expliquer les réponses qu’il va donner a vos question. Vous devez simplement lui faire une confiance aveugle et absolue. Ça ce joue a la confiance en quelque sorte. Sauf que vous n’avez pas le choix de faire confiance ou non.</p>');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tcomments`
--
ALTER TABLE `tcomments`
  ADD CONSTRAINT `commentFK` FOREIGN KEY (`id_news`) REFERENCES `tnews` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
