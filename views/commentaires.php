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
                <h1>Commentaire</h1><br><br>
                <form action="index.php?action=ajout-comment" method="post" class="d-flex flex-column form">
                    <div class="form-group">
                        <div class="w-100">
                            <label for="pseudo">Pseudo :</label>
                            <input class="form-control" type="text" id="pseudo" name="user_pseudo" required>
                            <label for="comment">Commentaire :</label>
                            <textarea class="form-control" type="text" id="comment" name="user_comment" required></textarea>
                        </div>
                        <input class="btn btn-primary btn-sm mt-3" type="submit" value="Ajouter" name="valid"/>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include('footer.php');?>
    </body>
</html>