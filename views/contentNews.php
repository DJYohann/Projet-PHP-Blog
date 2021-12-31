<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?php $news->getTitle() ?> </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" media="screen">
    <link href="views/css/style.css" type="text/css" rel="stylesheet" media="screen"/>
</head>


<body>
<?php include('header.php');?>
<main class="d-flex flex-column align-items-center justify-content-center">
    <br><br>
        <div class="conteneur-news mx-5">
            <?php
                echo '<div class="d-flex justify-content-center"><h3>'.$news->getTitle().'</h3></div><br><br>
                      <div>'.$news->getContent().'</div>';
            ?>
        </div>
    <br><br>
    <h3> Commentaires </h3>
    <?php
        foreach ($comments as $comment) {
            echo '<p>'.$comment->getContent().'<p>';
        }
    ?>
    <br><br>
    <h3>Ajouter commentaire</h3><br><br>
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
</main>
<?php include('footer.php');?>
</body>
</html>
