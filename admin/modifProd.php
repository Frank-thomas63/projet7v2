<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM product WHERE id=:num');
$pdoStat->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$executeIsOk = $pdoStat->execute();
$prod = $pdoStat->fetch();

$pdoStat = $bdd->prepare('SELECT name FROM product ');
$pdoStat->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$pdoStat-> execute();
//menu déroulant category
$pdoStatCategory = $bdd->prepare('SELECT * FROM category');
$pdoStatCategory->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$pdoStatCategory-> execute();
//menu déroulant brand
$pdoStatBrand = $bdd->prepare('SELECT * FROM brand ');
$pdoStatBrand->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$pdoStatBrand-> execute();
//menu déroulant color
$pdoStatColor = $bdd->prepare('SELECT * FROM color ');
$pdoStatColor->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$pdoStatColor-> execute();
//menu déroulant image
$pdoStatImage = $bdd->prepare('SELECT image FROM product ');
$pdoStatImage->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$pdoStatImage-> execute();
//menu déroulant Price
$pdoStatPrice = $bdd->prepare('SELECT DISTINCT price FROM product');
$pdoStatPrice->bindValue(':num', $_GET['numprod'], PDO::PARAM_STR);
$pdoStatPrice-> execute();
//menu déroulant gender
$pdoStatGender = $bdd->prepare('SELECT DISTINCT gender FROM product ');

$pdoStatGender-> execute();
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
    <div class="blocMenu">
    <form action="modifyProd.php" method="post">
        <input type="hidden" name="numprod" value="<?=$prod['id'];?>">
        <p>Product
          <input id="name" type="text" name="name" value="<?= $prod['name'];?>">
        </p>
        <p>Category
          <select  name="category_id" >
            <?php while($prodCategory = $pdoStatCategory->fetch()){ ?>
              <option value="<?php echo $prodCategory['id']; ?>"><?php echo $prodCategory['name']; ?></option>
            <?php } ?>
          </select>
        </p>
        <p>Brand
          <select  name="brand_id" >
            <?php while($prodBrand = $pdoStatBrand->fetch()){ ?>
              <option value="<?php echo $prodBrand['id']; ?>"><?php echo $prodBrand['name']; ?></option>
            <?php } ?>
          </select>
        </p>
        <p>Color
          <select name="color_id" >
            <?php while($prodColor = $pdoStatColor->fetch()){ ?>
              <option value="<?php echo $prodColor['id']; ?>"><?php echo $prodColor['name']; ?></option>
            <?php } ?>
          </select>
        </p>
        <p>Image
          <select  name="image" >
            <?php while($prodImage = $pdoStatImage->fetch()){ ?>
              <option value="<?php echo $prodImage['image']; ?>"><?php echo $prodImage['image']; ?></option>
            <?php } ?>
          </select>
        </p>
        <p>Price
          <select  name="price" >
            <?php while($prodPrice = $pdoStatPrice->fetch()){ ?>
              <option value="<?php echo $prodPrice['price']; ?>"><?php echo $prodPrice['price']; ?></option>
            <?php } ?>
          </select>
        </p>
        <p>Gender
          <select  name="gender" >
            <?php while($prodGender = $pdoStatGender->fetch()){ ?>
              <option value="<?php echo $prodGender['gender']; ?>"><?php echo $prodGender['gender']; ?></option>
            <?php } ?>
          </select>
        </p>

        <p>
          <input type="submit" value="Modify" name="validInsertProd">
        </p>
      </form>
    </div>
  </body>
</html>
