<?php
/** ce fichier sera utile pour la connexion  */
session_start();
$erreur  = isset($_SESSION['error']) ? $_SESSION['error'] : null;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>se connecter</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
<h1>Authentification</h1>
<?php if($erreur) : ?>
<!--div class="alert alert-danger">
  <?= $erreur ?>
</div-->
<?php endif ?>

<form action="profil.php" method="post" >  
<input type="email" name="email" placeholder="Email"  class="form-control" required> <br>
<input type="password" name="password" placeholder="Password" class="form-control" required>
<a href="">Mot de passe oublié?</a> <br> <br>
<input type="submit" name="btn" class="btn-primary" value="Connexion">

</form>

<hr>


</div>
  
</body>
</html>