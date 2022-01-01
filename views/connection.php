<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion</title>
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
                <h1>Connexion</h1>
                <br><br>
                <img width="100px" height="100px" src="images/login.png">
                <form action="../index.php?action=connect" method="post" class="d-flex flex-column form">
                    <div class="form-group">
                        <div class="w-100">
                            <label for="login">Login :</label>
                            <input class="form-control" type="text" id="login" name="user_login" required>
                            <label for="mdp">Mot de passe :</label>
                            <input class="form-control" type="password" id="mdp" name="user_mdp" required>
                        </div>
                        <input class="btn btn-primary btn-sm mt-3" type="submit" value="Connexion" name="valid"/>
                    </div>
                </form>
            </div>
            <?php
                if (isset($dVueEreur) && count($dVueEreur)>0)
                {
                    echo "<h2> ERREUR !</h2>";
                    foreach ($dVueEreur as $value)
                    {
                        echo $value;
                    }
                }
            ?>
        </div>
    </main>
    <?php include('footer.php');?>
</body>
</html>