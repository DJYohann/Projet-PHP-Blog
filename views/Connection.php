<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" media="screen">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/>
</head>


<body>
<?php include('header.php');?>

<h1 class="text-center">Connexion</h1><br><br>
<form action="#" method="post" class="d-flex flex-column align-items-center">
    <div class="form-group w-25">
        <div>
            <label for="login">Login :</label>
            <input class="form-control" type="text" id="login" name="user_login" required>
        </div>

        <div>
            <label for="mdp">Mot de passe :</label>
            <input class="form-control" type="text" id="mdp" name="user_mdp" required>
        </div>
        <div>
            <input class="btn btn-primary btn-sm" type="submit" value="Connexion" name="valid"/>
        </div>
    </div>
</form>
</body>
</html>