
<?php
session_start();
$erreur  = isset($_SESSION['error']) ? $_SESSION['error'] : null;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
<script>

function get_action(form) 
{
    var v = grecaptcha.getResponse();
    if(v.length == 0)
    {
        document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
        return false;
    }
    else
    {
         document.getElementById('captcha').innerHTML="Captcha completed";
        return true; 
    }
}

</script>



    <style>
        .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}

    </style>
    <title>Inscription</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<img src="RADEEL.png" alt="" width="100%">
<div class="container register">
<!--  -->
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="index.jpg" alt=""/>
                        <h3>Bienvenue</h3>
                        <p>inscrivez-vous gratuitement pour consulter vos factures et consommation</p>
                        
                    </div>
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading" style=" margin-top: 100px; font-weight: bold; color: blue; ">Inscription</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    <form action="register.php" method="post">
                                        <div class="form-group">
                                        CIN<input type="text" class="form-control" placeholder="CIN *" value=""  name="cin" required/>
                                        </div>
                                        <div class="form-group">
                                        Nom<input type="text" class="form-control" placeholder="Nom *" value="" name="nom" required/>
                                        </div>
                                        <div class="form-group">
                                        Prenom<input type="text" class="form-control" placeholder="Prenom *" value="" name="prenom" required/>
                                        </div>
                                        <div class="form-group">
                                        Mot de passe<input type="password" class="form-control" placeholder="Mot de passe *" value="" name="password" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirmer le mot de passe *" value="" name="repeatpassword" required/>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        Email<input type="email" class="form-control" placeholder="Votre Email *" value="" name="email" required/>
                                        </div>
                                        <div class="form-group">
                                        Adresse<input type="text"  name="adresse" class="form-control" placeholder="Votre adresse *" value="" name="adresse" required/>
                                        </div>
                                        <div class="form-group">
                                        Gérance<input type="text"  name="gerance" class="form-control" placeholder="gérance (eau ou bt) *" value="" name="gerance" required/> 
                                    <!-- Gérance <select name="gerance" id=""> 
                                        <option value="">eau</option>
                                        <option value="">BT</option>
                                    </select>     -->
                                    </div>
                                        
                        <input type="submit" name="btn" class="btnRegister"  value="s'inscrire"/>
                        </form>
                            </div> 
                        </div>
                    </div>
                </div>
                
            </div>
            <br><br>
            <footer class="text-center text-white ">
  
  <div class="container p-4"></div>

  <div class="text-center p-3" >
    © 2021 R.A.D.E.E.L :
    <a href="https://www.linkedin.com/in/farah-al-harrak-522869197/"  class="foot"> FARAH AL HARRAK</a>   |  <a href="accueil.php">accueil</a> 
  </div>
</footer>

</body>
</html>




