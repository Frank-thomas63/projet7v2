<?php

// connection a la bdd
require_once "admin/connect.php";
$pdoStat = $bdd->prepare('SELECT p.`id`, p.`name`, b.`name`, c.`name`, p.`price`
                          FROM `product` p
                          INNER JOIN `brand` b
                          ON p.`brand_id` = b.`id`
                          INNER JOIN `category` c
                          ON  p.`category_id` = c.`id`
                          ');
$executeItOk = $pdoStat-> execute();
$product = $pdoStat-> fetchAll();


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
      <h1> All products </h1>

        <?php  foreach( $product as $prod ){?>
              <input type="hidden" name="numprod" value="<?=$prod['id'];?>">
              <a class="display" href="product.php?numprod=<?= $prod['id']?>" class="bloc">
              <div class="BlocProd">
              <?php
        			echo 'Product : '.$prod[1].'<br /> Brand : '.$prod[2].'<br />  category : '.$prod[3].'<br /> price : '.$prod[4].'<br /><hr>' ;
              ?>
            </div>
          </a>
        <?php	};?>
    </div>
  </body>
</html>
