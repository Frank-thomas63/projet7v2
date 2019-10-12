<?php
var_dump($_POST);
// connection a la bdd
require_once "connect.php";
// recuperation de iD product
$pdoStat = $bdd->prepare('SELECT * FROM product WHERE id=:num');
$pdoStat->bindValue(':num', $_GET['numstock'], PDO::PARAM_STR);
$executeIsOk = $pdoStat->execute ();
$product = $pdoStat-> fetch();

// recuperation de size
$pdoStatSize = $bdd->prepare('SELECT size.* FROM size INNER JOIN stock on size.id = stock.size_id WHERE product_id ='.$product['id']);
$executeItOk = $pdoStatSize-> execute();
$size = $pdoStatSize-> fetch();

// integration du stock par rapport a size
$pdoStatStock = $bdd->prepare('UPDATE stock SET stock=:num where size_id = '.$size['id']. ' and product_id ='.$product['id']);
$pdoStatStock->bindValue(':num', $_POST['num'], PDO::PARAM_INT);
$executeItOk = $pdoStatStock-> execute();


if($executeItOk){
  $message = 'the stock has been modified'; // > la marque a été modifié
}else{
  $message = 'failure to change'; // > echec de la modification de ..
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
    <?php require_once 'menu.php' ?>

  <div class="bloc2">
    <p><?php echo $message ?></p>
  </div>
  </body>
</html>
