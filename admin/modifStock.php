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

// recuperation du stock par rapport a size
$pdoStatStock = $bdd->prepare('SELECT stock.* FROM stock where size_id = '.$size['id']. ' and product_id ='.$product['id']);
$executeItOk = $pdoStatStock-> execute();
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
    <?php require_once 'menu.php' ?>
    <form action="modifyStock.php?numstock=<?= $product['id']?>" method="post">
      <p>
        <input type="hidden" name="num" value="<?=$stock['id'];?>">
          Product : <?= $product['name'] ?><br><hr>
        <label for="name"> Size : <?= $size['name'] ?><br> </label>
        <input id="name" type="text" name="num" value="<?= $stock['stock'];?>">
      </p>
      <p>
        <input type="submit" value=" Modify stock">
      </p>
    </form>
  </body>
</html>
