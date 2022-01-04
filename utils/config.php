<?php

// Inclusion connexion BDD
require_once(__DIR__ . '/../utils/Connection.php');

// Répertoire du projet
$rep = __DIR__.'/../';

// BDD
$dsn = "mysql:host=localhost;dbname=blog";
$login = "blog";
$mdp = "azertyuiop";

$con = new Connection($dsn, $login, $mdp);

// News
$nbMaxNews = 2;
$nbComments = 0;

// Views
$vues['erreur'] = 'views/erreur.php';
$vues['blog'] = 'views/blog.php';
$vues['search'] = 'views/searchNews.php';
$vues['connect'] = 'views/connection.php';
$vues['content-news'] = 'views/contentNews.php';
?>