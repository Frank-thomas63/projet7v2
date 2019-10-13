<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM color WHERE id=:num');

$pdoStat->bindValue(':num', $_GET['numcolor'], PDO::PARAM_STR);

$executeIsOk = $pdoStat->execute();

$color = $pdoStat->fetch();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="ensemble">
      <?php require_once 'menu.php' ?>
      <form action="modifyColor.php" method="post">
        <p><input type="hidden" name="numcolor" value="<?=$color['id'];?>"></p>
        <p><label for="name"> Name color </label></p>
        <p><input id="name" type="text" name="name" value="<?= $color['name'];?>"></p>
        <p><input type="submit" value=" Modify Color"></p>
      </form>
    </div>
  </body>
</html>
