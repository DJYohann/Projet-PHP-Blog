<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Site bootstrap</title>
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
</main>
<?php include('footer.php');?>
</body>
</html>
