<?php

require_once(__DIR__.'/../controller/Connection.php');

$rep = __DIR__.'/../';

// BDD
$dsn = "mysql:host=localhost;dbname=blog";
$login = "blog";
$mdp = "azertyuiop";

$con = new Connection($dsn, $login, $mdp);

// Views
$vues['erreur'] = 'views/erreur.php';
$vues['blog'] = 'views/blog.php';
$vues['comment'] = 'views/commentaires.php';
$vues['connect'] = 'views/connection.php';
$vues['content-news'] = 'views/contentNews.php';

?>