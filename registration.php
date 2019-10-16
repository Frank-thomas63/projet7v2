<?php

$message = '';
if (!empty($_POST)){
   /* on test si les champ sont bien remplis */

    if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['postalcode']) && !empty($_POST['password']) && !empty($_POST['repeatpassword']))
    {
        /* on test si le mdp contient bien au moins 6 caractère */
        if (strlen($_POST['password'])>=6)
        {
            /* on test si les deux mdp sont bien identique */
            if ($_POST['password']==$_POST['repeatpassword'])
            {
                // On crypte le mot de passe
                $_POST['password'] = sha1($_POST['password']);
                // on se connecte à MySQL et on sélectionne la base
                require_once 'admin/connect.php';

                //On créé la requête
                $pdoStat = $bdd->prepare('INSERT INTO user ( lastname, firstname, email, address, city, postalcode, password)
                                          VALUES ("'.$_POST['lastname'].'", "'.$_POST['firstname'].'", "'.$_POST['email'].'", "'.$_POST['address'].'", "'.$_POST['city'].'", "'.$_POST['postalcode'].'", "'.$_POST['password'].'")');
                $issertIsOk = $pdoStat->execute();
                /* execute et affiche l'erreur mysql si elle se produit */
                if($issertIsOk){
                  $message = 'You are well registered';
                }else{
                  $message = 'There was a problem during the recording';
                }
            }
            else $message = 'Les mots de passe ne sont pas identiques';
        }
        else $message ='Le mot de passe est trop court !';
    }
    else $message = 'Veuillez saisir tous les champs !';
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
      <h1> Recording </h1>
      <p><?php echo $message ?></p>
      <div class="bloc4">
        <form class="connection" action="registration.php" method="post">
            <label>Last Name *:<br><input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])){echo $_POST['lastname'];}?> "></label><br>
            <label>First Name *:<br><input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];}?> "></label><br>
            <label>Email *:<br><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?> "></label><br>
            <label>Address *:<br><input type="text" name="address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];}?> "></label><br>
            <label>City *:<br><input type="text" name="city" value="<?php if(isset($_POST['city'])){echo $_POST['city'];}?> "></label><br>
            <label>Postal code *:<br><input type="text" name="postalcode" value="<?php if(isset($_POST['postalcode'])){echo $_POST['postalcode'];}?> "></label><br>
            <label>Password (Min 6 character)*:<br> <input type="password" name="password"></label><br>
            <label>Verification Password *:<br><input type="password" name="repeatpassword"></label><br>
            <p> * Fields are required </p>
            <p><input class="Recording" type="submit" value="Recording"></p>
        </form>
      </div>
    </div>
  </body>
</html>