<?php
var_dump($_POST);
// connection a la bdd
require_once "connect.php";

// insertion dans la table Brand
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('INSERT INTO product VALUES (:name, :category_id, :brand_id, :color_id, :image, :price, :gender)');
// on lie chaque marqueur à une valeur
$pdoStat->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$pdoStat->bindValue(':category_id', $_POST['category_id'], PDO::PARAM_STR);
$pdoStat->bindValue(':brand_id', $_POST['brand_id'], PDO::PARAM_STR);
$pdoStat->bindValue(':color_id', $_POST['color_id'], PDO::PARAM_STR);
$pdoStat->bindValue(':image', $_POST['image'], PDO::PARAM_STR);
$pdoStat->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
$pdoStat->bindValue(':gender', $_POST['gender'], PDO::PARAM_STR);
// execution de la requête préparé
$issertIsOk = $pdoStat->execute();
if($issertIsOk){
  $message = 'the product '.$_POST['name'].' has been registered'; // > la marque a été enregistrée
}else{
  $message = 'You have to register a product'; // > vous devez inscrire un marque
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
