<?php
// connection a la bdd
require_once "connect.php";
$pdoStat = $bdd->prepare('SELECT * FROM product');
$executeItOk = $pdoStat-> execute();
$prod = $pdoStat-> fetchAll();
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
    <div class="ensemble">
        <?php require_once 'menu.php' ?>
        <h1> Product </h1>
        <form action="insertProd.php" method="post">
            <input type="submit" value=" Add Product">
        </form>
        <div class="bloc">
          <?php foreach ($prod as $prod): ?>
            <input type="hidden" name="numprod" value="<?=$prod['id'];?>">
                <p><?= $prod['name'] ?></p>
                <p><a class="display" href="VisuProd.php?numprod=<?= $prod['id']?>"> display </a></p>
              <hr>
            </table>
          <?php endforeach; ?>
      </div>
    </div>
  </body>
</html>
