<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Création news </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" media="screen">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/>
    <link href="css/styleConnection.css" type="text/css" rel="stylesheet" media="screen"/>
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
                            <a href="../index.php" class="nav-link active">accueil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="d-flex align-items-center">
        <div class="w-100 d-flex flex-column align-items-center">
            <div class="conteneur w-50 d-flex flex-column align-items-center">
                <h1> Création d'une news</h1><br><br>
                <form action="../index.php?action=add-news" method="post" class="d-flex flex-column form">
                    <div class="form-group">
                        <div class="w-100">
                            <label for="title">Titre :</label>
                            <input class="form-control" type="text" id="title" name="news_title" required>
                            <label for="date">Date :</label>
                            <input class="form-control" type="date" id="date" name="news_date" required>
                            <label for="content">Contenu : </label>
                            <textarea class="form-control" name="news_content"></textarea>
                        </div>
                        <input class="btn btn-primary btn-sm mt-3" type="submit" value="Créer" name="valid"/>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include('footer.php');?>
</body>
</html>
