<?php

// connection a la bdd
require_once "admin/connect.php";
$pdoStat = $bdd->prepare('SELECT  p.`name`, c.`name`, p.`price` FROM `product` p INNER JOIN `category` c ON  p.`category_id` = c.`id`');
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
      <div class="bloc">
        <?php  foreach( $product as $prod )
        		{
        			echo 'Product : '.$prod[0].'<br />  category : '.$prod[1].'<br /> price : '.$prod[2].'<hr>' ;
        		};?>
      </div>
    </div>
  </body>
</html>
