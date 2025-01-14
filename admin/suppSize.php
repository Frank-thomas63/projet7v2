<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('DELETE FROM size WHERE id=:num LIMIT 1');
// on cible la ou l'on cherche les donnés
$pdoStat->bindValue(':num', $_GET['numsize'], PDO::PARAM_INT);
//execution


$executeIsOk = $pdoStat->execute();

// verification

if($executeIsOk){
  $message = 'the size was removed'; // > la marque a etait supprimer
}else{
  $message = 'failure to delete'; // > echec de la suppression de ..
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="ensemble">
      <?php require_once 'menu.php' ?>
      <div class="bloc2">
        <p><?php echo $message ?></p>
      </div>
    </div>
  </body>
</html>
