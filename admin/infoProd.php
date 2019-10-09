<?php
// connection a la bdd
require_once "connect.php";

$pdoStat = $bdd->prepare('SELECT * FROM product');
$executeItOk = $pdoStat-> execute();
$prod = $pdoStat-> fetchAll();

//var_dump($brand);
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
        <form action="insertProd.php" method="post">
            <input type="submit" value=" Add Product">
        </form>
      </div>
        <div class="bloc">
        <ul>
        <?php foreach ($prod as $prod): ?>
            <table>
              <td>
               <tr><?= $prod['name'] ?></tr>
             </td>
             <td>
             <tr><a class="supp" href="verifSuppProd.php?numprod=<?= $prod['id']?>"> Supprimer</a></tr>
           </td>
           <td>
             <tr><a class="modify" href="modifProd.php?numprod=<?= $prod['id']?>"> Modify</a></tr>
             </td>
          </table>
        <?php endforeach; ?>
      </ul>

      </div>

  </body>
</html>
