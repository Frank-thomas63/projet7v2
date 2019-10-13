<?php
// connection a la bdd
require_once "connect.php";
// recuperation de iD product
$pdoStat = $bdd->prepare('SELECT * FROM product WHERE id=:num');
$pdoStat->bindValue(':num', $_GET['numstock'], PDO::PARAM_STR);
$executeIsOk = $pdoStat->execute();
$product = $pdoStat-> fetch();

// recuperation de size
$pdoStatSize = $bdd->prepare('SELECT size.* FROM size INNER JOIN stock on size.id = stock.size_id WHERE product_id ='.$product['id']);
$executeItOk = $pdoStatSize-> execute();
$size = $pdoStatSize-> fetch();

// préparation de la requête d'insertion
$pdoStatStock = $bdd->prepare('SELECT stock.* FROM stock where size_id = '.$size['id']. ' and product_id ='.$product['id']);
$pdoStatStock->bindValue(':num', $_GET['numstock'], PDO::PARAM_INT);
$executeItOk = $pdoStatStock->execute();
$stock = $pdoStatStock-> fetch();



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
      <div class="blocMenu">
        <p> Are you sure you want to delete stock of
          <?= $product['name'] ?></p><hr>
        <p>  Size :  <?= $size['name'] ?></p>
        <p>  Stock :  <?= $stock['stock'] ?> ? </p>
        <a class="supp" href="suppStock.php?numstock=<?= $product['id']?>"> Supprimer</a>
      </div>
    </div>
  </body>
</html>
