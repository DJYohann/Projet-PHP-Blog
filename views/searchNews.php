<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" media="screen">
    <link href="views/css/style.css" type="text/css" rel="stylesheet" media="screen"/>
    <link href="views/css/blog.css" type="text/css" rel="stylesheet" media="screen"/>
</head>


<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container mr-1">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">accueil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="d-flex flex-wrap conteneur-news mt-5 justify-content-between">
        <?php
        if(isset($TNews))
        {
            foreach ($TNews as $News)
            {
                echo '<div class="news">
                        <h6>'.$News->getDate().' : </h6><br>
                        <a href="index.php?action=contentNews&id='.$News->getId().'">'.$News->getTitle().' 
                        </a>
                      </div>';
            }
        }
        ?>
    </div>
</main>
<?php include('footer.php');?>
</body>
</html>
