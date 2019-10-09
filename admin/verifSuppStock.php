<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('SELECT * FROM size WHERE id=:num');

$pdoStat->bindValue(':num', $_GET['numsize'], PDO::PARAM_INT);
$executeItOk = $pdoStat->execute();
$brand = $pdoStat->fetchAll();

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
    <?php foreach ($size as $size): ?>
      <p> Are you sure you want to delete  <?= $size['name'] ?> ? </p>
      <a class="supp" href="suppSize.php?numbrand=<?= $size['id']?>"> Supprimer</a>
    <?php endforeach; ?>
  </div>
  </body>
</html>
