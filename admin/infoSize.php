<?php
// connection a la bdd
require_once "connect.php";

$pdoStat = $bdd->prepare('SELECT * FROM size');
$executeItOk = $pdoStat-> execute();
$size = $pdoStat-> fetchAll();
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
      <h1> Size </h1>
      <form action="insertSize.php" method="post">
        <p>Size addition </p>
        <p><input id="name" type="text" name="name"></p>
        <p><input type="submit" value=" Add Size"></p>
      </form>
      <div class="bloc">
        <?php foreach ($size as $size): ?>
          <hr><?= $size['name'] ?>
          <p><a class="supp" href="verifSuppSize.php?numsize=<?= $size['id']?>"> Supprimer</a>
          <a class="modify" href="modifSize.php?numsize=<?= $size['id']?>"> Modify</a></p>
        <?php endforeach; ?>
      </div>
    </div>
  </body>
</html>
