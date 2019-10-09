<?php
// connection a la bdd
require_once "connect.php";

// insertion dans la table Brand
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('INSERT INTO category VALUES (NULL, :name)');
// on lie chaque marqueur à une valeur
$pdoStat->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
// execution de la requête préparé
$issertIsOk = $pdoStat->execute();
if($issertIsOk){
  $message = 'the category '.$_POST['name'].' has been registered'; // > la marque a été enregistrée
}else{
  $message = 'You have to register a category'; // > vous devez inscrire un marque
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
    <?php require_once 'menu.php' ?>
    <div class="bloc2">


    <p><?php echo $message ?></p>

  </body>
</html>
