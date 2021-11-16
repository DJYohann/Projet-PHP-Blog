<!DOCTYPE HTML>
<html>
<head>
    <title>Erreur</title>
</head>
<body>
<h1>Erreur : </h1>
<?php
if(isset($TMessage)) {
    foreach ($TMessage as $value) {
        print "<p> $value </p>";
    }
}
?>
</body>
</html>