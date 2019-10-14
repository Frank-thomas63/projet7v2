<?php
// connection a la bdd
require_once "admin/connect.php";
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
//select size
$pdoStatsize = $bdd->prepare('SELECT * FROM size');
$executeItOk = $pdoStatsize-> execute();


?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <link rel="stylesheet" href="admin/style.css" media="screen" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="ensemble">
      <?php require_once 'menu2.php' ?>
      <h1> Product </h1>
      <div class="bloc">
            Product : <?= $product['name'] ?><br><hr>
            Category : <?= $category['name'] ?><br>
            Brand : <?= $brand['name'] ?><br>
            Color : <?= $color['name'] ?><br>
            Image : <?= $product['image'] ?><br>
            Price : <?= $product['price'] ?><br>
            Gender :<?= $product['gender'] ?><br>
        </div>

        <div class="bloc">
          <?php
            $pdoStatSize = $bdd->prepare('SELECT * FROM size INNER JOIN stock on size.id = stock.size_id  WHERE product_id ='.$product['id'].'');
            $executeItOk = $pdoStatSize-> execute();
            while($size = $pdoStatSize-> fetch()){?>
              <hr>Size : <?= $size['name'] ?><br>
              <?php
                $pdoStatStock = $bdd->prepare('SELECT stock.* FROM stock where size_id = '.$size['id']. ' and product_id ='.$product['id']);
                $executeItOk = $pdoStatStock-> execute();
                while($stock = $pdoStatStock-> fetch()){?>
                Stock : <?= $stock['stock'] ?><br>
                <?php
                $message = '';

                if($stock['stock']>= 10){
                  $lien = "<a class='modify' > Commander</a>";
                }
                if($stock['stock']<= 10){
                  $message = 'Bientôt épuisé ! <br> ';
                  $lien = "<a class='modify'> Commander</a>";
                }
                if($stock['stock']<= 0){
                  $message = 'Epuisé !';
                }
                ?><p><?php echo $message ?></p>
                  <p><?php echo $lien ?></p>
          <?php }}?>
      </div>
    </div>
  </body>
</html>
