<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM category WHERE id=:num');

$pdoStat->bindValue(':num', $_GET['numcat'], PDO::PARAM_INT);
$executeItOk = $pdoStat->execute();
$cat = $pdoStat->fetchAll();

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
    <div class="bloc2">
    <?php foreach ($cat as $cat ): ?>
      <p> Are you sure you want to delete  <?= $cat['name'] ?> ? </p>
      <a class="supp" href="suppCat.php?numcat=<?= $cat['id']?>"> Supprimer</a>
    <?php endforeach; ?>
  </div>
  </body>
</html>
