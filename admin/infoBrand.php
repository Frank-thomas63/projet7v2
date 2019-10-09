<?php
// connection a la bdd
require_once "connect.php";

$pdoStat = $bdd->prepare('SELECT * FROM brand');
$executeItOk = $pdoStat-> execute();
$brand = $pdoStat-> fetchAll();
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

      <h1> Brand </h1>
    </div>
      <div class="blocMenu">
        <form action="insertBrand.php" method="post">
          <p>Brand addition
            <input id="name" type="text" name="name">
          </p>
          <p>
            <input type="submit" value=" Add Brand">
          </p>
        </form>
      </div>
        <div class="bloc">
        <ul>
        <?php foreach ($brand as $brand): ?>
            <table>
              <td>
               <tr><?= $brand['name'] ?><?= $brand['logo'] ?></tr>
             </td>
             <td>
             <tr><a class="supp" href="verifSuppBrand.php?numbrand=<?= $brand['id']?>"> Supprimer</a></tr>
           </td>
           <td>
             <tr><a class="modify" href="modifBrand.php?numbrand=<?= $brand['id']?>"> Modify</a></tr>
             </td>
          </table>
        <?php endforeach; ?>
      </ul>

      </div>

  </body>
</html>
