<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Site bootstrap</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" media="screen">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/>
    <link href="css/mainBlog.css.css" type="text/css" rel="stylesheet" media="screen"/>
</head>


<body>
<?php include('header.php');?>

<?php
    echo '<h3>'.$News->getTitle().'</h3><br><br>
          <div>'.$News->getContent().'</div>';
?>

</body>
</html>
