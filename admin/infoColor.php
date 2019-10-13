<?php
// connection a la bdd
require_once "connect.php";

$pdoStat = $bdd->prepare('SELECT * FROM color');
$executeItOk = $pdoStat-> execute();
$color = $pdoStat-> fetchAll();
//var_dump($brand);
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
      <h1> Color </h1>
      <div class="blocMenu">
        <form action="insertColor.php" method="post">
          <p>Color addition</p>
          <p><input id="name" type="text" name="name"></p>
          <p><input type="submit" value=" Add Color"></p>
        </form>
      </div>
      <div class="bloc">
        <?php foreach ($color as $color): ?>
          <hr><p><?= $color['name'] ?></p>
          <p><a class="supp" href="verifSuppColor.php?numcolor=<?= $color['id']?>"> Supprimer</a>
          <a class="modify" href="modifColor.php?numcolor=<?= $color['id']?>"> Modify</a></p>
        <?php endforeach; ?>
      </div>
    </div>
  </body>
</html>
