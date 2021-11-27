<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" media="screen">
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/>
        <link href="css/styleConnection.css" type="text/css" rel="stylesheet" media="screen"/>
    </head>

    <body>
    <?php include('header.php');?>
    <main class="d-flex align-items-center">
        <div class="w-100 d-flex flex-column align-items-center">
            <div class="conteneur w-50 d-flex flex-column align-items-center">
                <h1>Connexion</h1><br><br>
                <form action="index.php?action=seconnecter" method="post" class="d-flex flex-column form">
                    <div class="form-group">
                        <div class="w-100">
                            <label for="login">Login :</label>
                            <input class="form-control" type="text" id="login" name="user_login" required>
                            <label for="mdp">Mot de passe :</label>
                            <input class="form-control" type="text" id="mdp" name="user_mdp" required>
                        </div>
                        <input class="btn btn-primary btn-sm mt-3" type="submit" value="Connexion" name="valid"/>
                    </div>
                </form>
            </div>
        </div>
    </main>
    </body>
</html>