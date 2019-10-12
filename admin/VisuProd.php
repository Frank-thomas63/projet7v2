<?php
// connection a la bdd
require_once "connect.php";
$pdoStat = $bdd->prepare('SELECT * FROM product WHERE id=:num');
$pdoStat->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$executeItOk = $pdoStat-> execute();
$product = $pdoStat-> fetch();
// select Category
$pdoStatCategory = $bdd->prepare('SELECT category.name FROM category inner join product on category.id = product.category_id WHERE product.id ='.$product['id']);
$executeItOk = $pdoStatCategory-> execute();
$category = $pdoStatCategory-> fetch();
// select brand
$pdoStatBrand = $bdd->prepare('SELECT brand.name FROM brand inner join product on brand.id = product.brand_id WHERE product.id ='.$product['id']);
$executeItOk = $pdoStatBrand-> execute();
$brand = $pdoStatBrand-> fetch();
// select color
$pdoStatColor = $bdd->prepare('SELECT color.name FROM color inner join product on color.id = product.color_id WHERE product.id ='.$product['id']);
$executeItOk = $pdoStatColor-> execute();
$color = $pdoStatColor-> fetch();

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
    <h1> Product </h1>
    </div>
      <div class="blocMenu">

      </div>
      <div class="bloc">
          Product : <?= $product['name'] ?><br>
          Category : <?= $category['name'] ?><br>
          Brand : <?= $brand['name'] ?><br>
          Color : <?= $color['name'] ?><br>
          Image : <?= $product['image'] ?><br>
          Price : <?= $product['price'] ?><br>
          Gender :<?= $product['gender'] ?><br>

      </div>
      <div class="bloc">
        <a class="modify" href="modifProd.php?numprod=<?= $product['id']?>"> Modify</a>
         <a class="supp" href="verifSuppProd.php?numprod=<?= $product['id']?>"> Supprimer</a>

      </div>
  </body>
</html>
