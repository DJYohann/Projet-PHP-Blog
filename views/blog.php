<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Site bootstrap</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" media="screen">
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/>
</head>


<body>
<?php include('header.php');?>

<main>
    <div class="d-flex flex-wrap">
    <?php
        if(isset($TNews)){
            foreach ($TNews as $News){
                echo '<div>
                        <p>'.$News->getDate().' : </p>
                        <a href="index.php?action=contentNews & id='.$News->getId().'" </a>
                      </div>';
            }
        }
    ?>
    </div>
</main>
<?php include('footer.php');?>
</body>
</html>

