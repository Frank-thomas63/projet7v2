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
      <div class="Bloc">
        <form class="connection" action="??" method="post">
            <p>Email :</p>
            <p><input type="text" name="mail"></p>
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
