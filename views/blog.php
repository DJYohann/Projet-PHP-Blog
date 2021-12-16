<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Blog</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" media="screen">
	<link href="views/css/style.css" type="text/css" rel="stylesheet" media="screen"/>
    <link href="views/css/blog.css" type="text/css" rel="stylesheet" media="screen"/>
</head>


<body>
<?php include('header.php');?>

<main>
    <?php
    if(!(isset($nbMaxNews ) && $nbMaxNews > 0)){
        $nbMaxNews = 1;
    }
    if(!(isset($page) && $page > 0)){
        $page = 1;
    }
    ?>
    <div class="d-flex flex-wrap test mt-5 justify-content-between">
    <?php
        if(isset($TNews)){
            foreach ($TNews as $News){
                echo '<div class="news">
                        <h6>'.$News->getDate().' : </h6><br>
                        <a href="index.php?action=contentNews&id='.$News->getId().'">'.$News->getTitle().' 
                        </a>
                      </div>';
            }
        }
    ?>
    </div>
    <?php
    $pageMax = ceil($nbNews/$nbMaxNews);
    if ($page > $pageMax) {
        $page = $pageMax;
    }

    $pageDecremente = ($page == 1) ? 1 : $page - 1;
    $pageIncremente = ($page == $pageMax) ? $pageMax : $page + 1;
    ?>

    <div class="pages d-flex justify-content-center mt-5">
        <?php

       echo "<div> <a href=\"index.php?page=".$pageDecremente."\">&lt;</a> $page <a href=\"index.php?page=".$pageIncremente."\">&gt;</a> </div>";

       ?>

    </div>

</main>
<?php include('footer.php');?>
</body>
</html>

