<?php
// connection a la bdd
require_once "connect.php";
// préparation de la requête d'insertion
$pdoStat = $bdd->prepare('UPDATE color SET name=:name WHERE id=:num LIMIT 1');

$pdoStat->bindValue(':num', $_POST['numcolor'], PDO::PARAM_INT);
$pdoStat->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$executeItOk = $pdoStat->execute();
// verification
if($executeItOk){
  $message = 'the Color has been modified'; // > la marque a été modifié
}else{
  $message = 'failure to change'; // > echec de la modification de ..
}

$color = $pdoStat->fetch();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <title>Brand delect</title>
  </head>
  <body>
    <?php require_once 'menu.php' ?>

  <div class="bloc2">
    <p><?php echo $message ?></p>
  </div>
  </body>
</html>
