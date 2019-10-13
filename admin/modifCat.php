<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM category WHERE id=:num');
$pdoStat->bindValue(':num', $_GET['numcat'], PDO::PARAM_STR);
$executeIsOk = $pdoStat->execute();
$cat = $pdoStat->fetch();
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
      <form action="modifyCat.php" method="post">
        <p><input type="hidden" name="numcat" value="<?=$cat['id'];?>"></p>
        <p><label for="name"> Name category </label></p>
        <p><input id="name" type="text" name="name" value="<?= $cat['name'];?>"></p>
        <p><input type="submit" value=" Modify Category"></p>
      </form>
    </div>
  </body>
</html>
