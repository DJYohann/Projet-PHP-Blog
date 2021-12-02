<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Erreur</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" media="screen">
    <link href="css/erreur.css" type="text/css" rel="stylesheet" media="screen"/>
</head>


<body>
<main class="mt-5">
    <h1 class="title">Erreur</h1>
    <div class="div-error mt-5 w-100 d-flex flex-column align-items-center">
        <?php
        if(isset($dVueEreur)) {
            foreach ($dVueEreur as $value) {
                print "<p> $value </p>";
            }
        }
        ?>
    </div>
<main>
</body>
</html>