<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM size WHERE id=:num');

$pdoStat->bindValue(':num', $_GET['numsize'], PDO::PARAM_STR);

$executeIsOk = $pdoStat->execute();

$size = $pdoStat->fetch();
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
    <?php require_once 'menu.php' ?>
    <form action="modifySize.php" method="post">
      <p>
        <input type="hidden" name="numsize" value="<?=$size['id'];?>">
        <label for="name"> Name brand </label>
        <input id="name" type="text" name="name" value="<?= $size['name'];?>">
      </p>
      <p>
        <input type="submit" value=" Modify size">
      </p>
    </form>
  </body>
</html>
