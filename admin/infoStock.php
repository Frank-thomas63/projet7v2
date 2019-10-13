<?php
// connection a la bdd
require_once "connect.php";

$pdoStat = $bdd->prepare('SELECT * FROM product');
$executeItOk = $pdoStat-> execute();
$prod = $pdoStat-> fetchAll();

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
      <h1> Stock </h1>
      <form action="insertStock.php" method="post">
          <input type="submit" value=" Add Stock">
      </form>
      <div class="bloc">
        <?php foreach ($prod as $prod): ?>
          <input type="hidden" name="numstock" value="<?=$prod['id'];?>">
          <p><?= $prod['name'] ?></p>
          <p><a class="stock" href="VisuStock.php?numstock=<?= $prod['id']?>"> Stock </a></p>
        <?php endforeach; ?>
      </div>
    </div>
  </body>
</html>
