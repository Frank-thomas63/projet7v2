<?php
session_start();
// connection a la bdd
require_once "admin/connect.php";
$pdoStat = $bdd->prepare('SELECT email, password FROM user');
$executeItOk = $pdoStat-> execute();
$connect = $pdoStat-> fetchAll();

var_dump($connect);
//message de connection
$message= '';
if(!empty($_POST)){
    $password =  sha1($_POST['password']);
      if($_POST['email'] == $connect["email"]){
          if($password == $connect["password"]){
              $message .=' Welcome Simplon chaustores' .$connect['lastname']. ' ' .$connect['firstname'].'.';
              //header('Location:index.php');
            }else
          $message .='You made a password error '. $connect["email"]." " .$connect["password"];
        }else
      $message .='You made a mail error '. $connect["email"]." " .$connect["password"];
}
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <link rel="stylesheet" href="admin/style.css" media="screen" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="ensemble">
      <?php require_once 'menu2.php' ?>
      <h1> Connection </h1>
      <p><?php echo $message ?></p>
      <div class="Bloc">
        <form class="connection" action="connection.php"  method="post">
            <p>Email :</p>
            <p><input type="text" name="email"></p>
            <p>Password :</p>
            <p><input type="password" name="password"></p>
            <p><input class="connection" type="submit" value="Connection"></p>
        </form>

        <form class="connection" action="registration.php" method="post">
          <input  type="submit" value=" No account">
        </form>
      </div>
    </div>
  </body>
</html>
