<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM product WHERE id=:num');
$pdoStat->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$executeItOk = $pdoStat-> execute();
$product = $pdoStat-> fetch();

//select size
$pdoStatsize = $bdd->prepare('SELECT * FROM size');
$executeItOk = $pdoStatsize-> execute();

$pdoStatStock = $bdd->prepare('INSERT INTO stock VALUES ('.$product['id'].', '.$_POST['size'].', '.$_POST['stock'].')');
$issertIsOk = $pdoStatStock->execute();
if($issertIsOk){
  $message = ' The stock '.$_POST['stock'].' of '.$product['name'].' has been registered'; // > le stock a été enregistrée
}else{
  $message = 'You have to register a stock'; // > vous devez inscrire de stock
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="ensemble">
    <?php require_once 'menu.php' ?>
    <div class="blocProduct">
        <p><?php echo $message ?></p>
    </div>
  </body>
</html>
