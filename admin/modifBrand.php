<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM brand WHERE id=:num');
$pdoStat->bindValue(':num', $_GET['numbrand'], PDO::PARAM_STR);
$executeIsOk = $pdoStat->execute();
$brand = $pdoStat->fetch();
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
      <form action="modifyBrand.php" method="post">
        <p><input type="hidden" name="numbrand" value="<?=$brand['id'];?>"></p>
        <p><label for="name"> Name brand </label></p>
        <p><input id="name" type="text" name="name" value="<?= $brand['name'];?>"></p>
        <p><input type="submit" value=" Modify Brand"></p>
      </form>
    </div>
  </body>
</html>
