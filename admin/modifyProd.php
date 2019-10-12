<?php
var_dump($_POST);
// connection a la bdd
require_once "connect.php";
// préparation de la requête de modification
$pdoStat = $bdd->prepare('UPDATE product SET name=:name, category_id=:category_id, brand_id=:brand_id, color_id=:color_id, image=:image, price=:price, gender=:gender  WHERE id=:num LIMIT 1');
$pdoStat->bindValue(':num', $_POST['numprod'], PDO::PARAM_INT);
$pdoStat->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$pdoStat->bindValue(':category_id', $_POST['category_id'], PDO::PARAM_INT);
$pdoStat->bindValue(':brand_id', $_POST['brand_id'], PDO::PARAM_INT);
$pdoStat->bindValue(':color_id', $_POST['color_id'], PDO::PARAM_INT);
$pdoStat->bindValue(':image', $_POST['image'], PDO::PARAM_STR);
$pdoStat->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
$pdoStat->bindValue(':gender', $_POST['gender'], PDO::PARAM_STR);

$executeItOk = $pdoStat->execute();

if($executeItOk){
  $message = 'the product has been modified'; // > la marque a été modifié
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
