<?php
// connection a la bdd
require_once "connect.php";

$pdoStat = $bdd->prepare('SELECT * FROM category');
$executeItOk = $pdoStat-> execute();
$cat = $pdoStat-> fetchAll();
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
      <h1> Category </h1>
      <div class="blocMenu">
        <form action="insertCat.php" method="post">
          <p> Category addition </p>
          <p><input id="name" type="text" name="name"></p>
          <p><input type="submit" value=" Add Category"></p>
        </form>
      </div>
      <div class="bloc">
        <?php foreach ($cat as $cat): ?>
          <hr><p><?= $cat['name'] ?></p>
          <p><a class="supp" href="verifSuppCat.php?numcat=<?= $cat['id']?>"> Supprimer</a>
          <a class="modify" href="modifCat.php?numcat=<?= $cat['id']?>"> Modify</a></p>
        <?php endforeach; ?>
      </div>
    </div>
  </body>
</html>
