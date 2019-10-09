<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM color WHERE id=:num');

$pdoStat->bindValue(':num', $_GET['numcolor'], PDO::PARAM_INT);
$executeItOk = $pdoStat->execute();
$color = $pdoStat->fetchAll();

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
    <?php foreach ($color as $color): ?>
      <p> Are you sure you want to delete  <?= $color['name'] ?> ? </p>
      <a class="supp" href="suppColor.php?numcolor=<?= $color['id']?>"> Supprimer</a>
    <?php endforeach; ?>
  </div>
  </body>
</html>
