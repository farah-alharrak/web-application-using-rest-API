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
<style>
  .login-container{
    
    margin-left: auto;
    margin-right: auto;
    background-color: #EAEAEA;
    padding: 4rem;
}
body {
  background-color: #17a2b8;
}
.btnSubmit{
  font-weight: 600;
    width: 30%;
    color: #FFF;
    background-color: blue;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}
.dropdown-item{
  padding: 1rem;
  margin: 1rem
}
.btnw{
  text-align: left;
  padding: 0.5rem;
}
.last{
  margin-left: 454px;
  margin-right: auto;
    
    }
    .dropdown-item :hover{
      background-color:aqua;
    }

</style>
</head>
<body>
<img src="RADEEL.png" alt="" width="1347">
<form action="accueil.php">
        <input type="submit" class="btnw btn-primary btn-lg active" style="background-color: red" value="Revenir à la page d'accueil">
    </form>
<div class="container">

<br><br>
<h1 style="text-align: center; font-weight: bold;">Inscription</h1><hr width="400"><br>
<?php if($erreur) : ?>
<!--div class="alert alert-danger">
  <?= $erreur ?>
</div-->
<?php endif ?>


<div class="col-md-6 login-form-1 login-container">
<form action="register.php" method="post" > 
CIN<input type="text" class="form-control" placeholder="CIN *" value=""  name="cin" required/>
                                        
                                        Nom<input type="text" class="form-control" placeholder="Nom *" value="" name="nom" required/>
                                       
                                        Prenom<input type="text" class="form-control" placeholder="Prenom *" value="" name="prenom" required/>
                                      
                                        Mot de passe<input type="password" class="form-control" placeholder="Mot de passe *" value="" name="password" required/>
                                       
                                            <input type="password" class="form-control"  placeholder="Confirmer le mot de passe *" value="" name="repeatpassword" required/>
                                       
                                        Email<input type="email" class="form-control" placeholder="Votre Email *" value="" name="email" required/>
                                        
                                        Adresse<input type="text"  name="adresse" class="form-control" placeholder="Votre adresse *" value="" name="adresse" required/>
                                        
                                        Gérance<input type="text"  name="gerance" class="form-control" placeholder="gérance (eau ou bt) *" value="" name="gerance" required/> 
                                         

<div class="mb-3">
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="dropdownCheck">
        <label class="form-check-label" for="dropdownCheck">
          Se souvenir de moi
        </label>
      </div>
    </div>
<!-- <input type="submit" name="btn" class="btnSubmit btn-primary" value="Connexion"> -->
<input type="submit" name="btn" class="btnRegister"  value="s'inscrire"/>

</form>
</div >
<hr width="600">


</div>

</div>

<br><br><br><br><br><br>
<footer class="text-center text-white " style="background-color: #21081a;">
  <!-- Grid container -->
  <div class="container p-4"></div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); ">
    © 2021 R.A.D.E.E.L :
    <a href="https://www.linkedin.com/in/farah-al-harrak-522869197/" > FARAH AL HARRAK</a>
  </div>
  <!-- Copyright -->
</footer>


</body>
</html>