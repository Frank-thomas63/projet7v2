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
$pdoStatStock = $bdd->prepare('DELETE stock FROM stock where size_id = '.$size['id']. ' and product_id ='.$product['id']);
$executeItOk = $pdoStatStock->execute();
$stock = $pdoStatStock-> fetch();


if($executeIsOk){
  $message = 'The stock '.$product['name'].' Size : '.$size['name'].' was removed'; // > la marque a etait supprimer
}else{
  $message = 'Failure to delete'; // > echec de la suppression de ..
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <title>Brand delect</title>
  </head>
  <body>
    <div class="ensemble">
      <?php require_once 'menu.php' ?>
      <div class="blocMenu">
        <p><?php echo $message ?></p>
      </div>
    </div>
  </body>
</html>
