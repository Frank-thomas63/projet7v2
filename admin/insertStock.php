<?php
var_dump($_POST);
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM product WHERE id=:num');
$pdoStat->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$executeItOk = $pdoStat-> execute();
$product = $pdoStat-> fetch();
VAR_DUMP($product['id']);
//select size
$pdoStatsize = $bdd->prepare('SELECT * FROM size');
$executeItOk = $pdoStatsize-> execute();

$pdoStat = $bdd->prepare('INSER INTO stock VALUES (product_id ='.$product['id'].', size_id = '.$_POST['size'].', stock='.$_POST['stock'].'');
$issertIsOk = $pdoStat->execute();
if($issertIsOk){
  $message = $_POST['stock'].' the stock '.$product['name'].' has been registered'; // > la marque a été enregistrée
}else{
  $message = 'You have to register a mark'; // > vous devez inscrire un marque
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
    <?php require_once 'menu.php' ?>
    <div class="bloc2">


    <p><?php echo $message ?></p>

  </body>
</html>
