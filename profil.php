
<?php



// On démarre la session
session_start();
$_SESSION['loginOK'] = false; 


if(isset($_POST['btn']))
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
        {
          

$email = $_POST['email'];  
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=laradeel", "root", "");   //se connecter à la base de données

$sql = "SELECT * FROM dossier_abonne WHERE email= '$email' ";

$stmt = $pdo->prepare($sql); 

$stmt->execute();


//$user = $stmt->fetch(PDO::FETCH_ASSOC);


if($stmt->rowCount() > 0) // on vérifie que l'utilisateur existe bien
{
  $data = $stmt->fetchAll();  // stocker les lignes résultats dans la variable data
  if( $password == $data[0]["password"] ) /* pour le hashage utiliser password_verify au lieu de == */
  {
    $_SESSION['loginOK'] = true;

  }
  if($_SESSION['loginOK']){
    echo '<a href="logout.php" class="btn btn-success pull-right" style="margin-left: ; margin-top:0px;">Se deconnecter</a>' . '<br>' ;
    echo ' <img src="index.jpg" alt="" > ';
    $nom = $data[0]["nom"];
    $prenom = $data[0]["prenom"];

    echo '<div class="container2"> ' ;
    echo ' <div class="x"> ' . '<h2>' . 'Bonjour ' . '<b>' . $nom  . ' ' . $prenom . '</b>' . ' !' . '</h2>'  ;
    echo '<h3>' . 'Bienvenue dans votre compte chez la RADEEL <br><br><br><br>' . '</h3>' ;
        // recuperer l'id_user concernant les contrats d'eau d'un tel client connecté  ///

// pour cela on doit recuperer cin et gerance de dossier abonne pour savoir le numContrat de dossier_contrat

$cin_user = "SELECT cin FROM dossier_abonne where email = '$email' and gerance = 'eau'";
$stmt = $pdo->prepare($cin_user); 
$stmt->execute();

if($stmt->rowCount() > 0){ // càd il y'a dans la base de données le cin associé à l'utilisateur connecté 

$data = $stmt->fetchAll();
$cin = $data[0]["cin"];

     $ideau = "SELECT abonne_id FROM dossier_abonne where cin = '$cin' and gerance = 'eau'";

    $stmt = $pdo->prepare($ideau); 
    $stmt->execute();
    if($stmt->rowCount() > 0){
    $datae = $stmt->fetchAll();
     
    $ide = $datae[0]["abonne_id"];

    
    echo '<a  class="btn btn-info pull-right" style="margin-left: 100px" href="http://localhost:8080/laradeel/facture.php?ide='.$ide.' ">Consulter vos factures d\'eau</a> <br><br>' ; 
    echo '<a class="btn btn-info pull-right" style="margin-left: 100px" class="btn" href="http://localhost:8080/laradeel/consommation.php?ide='.$ide.'">Consulter votre consommation d\'eau</a> <br> <br>  '; 


    }else{/*echo '<div class="alert alert-danger">' . 'Vous n\'avez pas de contrat d\'abonnement pour l\'eau. ' . '</div>';*/}

  
  
  }else{ // y'a pas dans la base de données le cin associé à l'utilisateur connecté et donc on recupère l'id par mail au lieu du cin
  $ideau = "SELECT abonne_id FROM dossier_abonne where email = '$email' and gerance = 'eau'";

  $stmt = $pdo->prepare($ideau); 
  $stmt->execute();
  if($stmt->rowCount() > 0){
  $datae = $stmt->fetchAll();
   
  $ide = $datae[0]["abonne_id"];

  
  echo '<a  class="btn btn-info pull-right" style="margin-left: 100px" href="http://localhost:8080/laradeel/facture.php?ide='.$ide.' ">Consulter vos factures d\'eau</a> <br><br>' ; 
  echo '<a class="btn btn-info pull-right" style="margin-left: 100px" class="btn" href="http://localhost:8080/laradeel/consommation.php?ide='.$ide.'">Consulter votre consommation d\'eau</a> <br> <br>  '; 


  }else{/*echo '<div class="alert alert-danger">' . 'Vous n\'avez pas de contrat d\'abonnement pour l\'eau. Abonnez vous chez RADEEL pour bénéficier de nos services! ' . '</div>';*/}
}


       /// recuperer l'id concernant les contrats d'electricité d'un tel client connecté  ///

$cin_user = "SELECT cin FROM dossier_abonne where email = '$email' and gerance = 'bt'";
$stmt = $pdo->prepare($cin_user); 
$stmt->execute();

if($stmt->rowCount() > 0){ // càd il y'a dans la base de données le cin associé à l'utilisateur connecté 
$data = $stmt->fetchAll();
$cin = $data[0]["cin"];

    $idbt = "SELECT abonne_id FROM dossier_abonne where cin = '$cin' and gerance = 'bt'";

    $stm = $pdo->prepare($idbt); 
    $stm->execute();
    if($stm->rowCount() > 0){
    $datab = $stm->fetchAll();
    $idb = $datab[0]["abonne_id"];

    

    echo '<br>';
    echo '<a class="btn btn-danger pull-right" style="margin-left: 100px" href="http://localhost:8080/laradeel/factureBT.php?idb='.$idb.'">Consulter vos factures d\'électricité </a> <br><br>';

    echo '<a class="btn btn-danger pull-right" style="margin-left: 100px" href="http://localhost:8080/laradeel/consommationBT.php?idb='.$idb.'">Consulter votre consommation d\'électricité</a> <br> <br> ' . '</div>' . '</div>' ; 
  
    }else{/*echo '<div class="alert alert-danger">' . 'Vous n\'avez pas de contrat d\'abonnement pour l\'électricité. Abonnez vous chez RADEEL pour bénéficier de nos services!' . '</div>';*/}
    
   }else{ // y'a pas dans la base de données le cin associé à l'utilisateur connecté 
    $idbt = "SELECT abonne_id FROM dossier_abonne where email = '$email' and gerance = 'bt'";

    $stm = $pdo->prepare($idbt); 
    $stm->execute();
    if($stm->rowCount() > 0){
    $datab = $stm->fetchAll();
    $idb = $datab[0]["abonne_id"];

    

    echo '<br>';
    echo '<a class="btn btn-danger pull-right" style="margin-left: 100px" href="http://localhost:8080/laradeel/factureBT.php?idb='.$idb.'">Consulter vos factures d\'électricité </a> <br><br>';

    echo '<a class="btn btn-danger pull-right" style="margin-left: 100px" href="http://localhost:8080/laradeel/consommationBT.php?idb='.$idb.'">Consulter votre consommation d\'électricité</a> <br> <br> ' . '</div>' . '</div>' ; 
  
    }else{/*echo '<div class="alert alert-danger">' . 'Vous n\'avez pas de contrat d\'abonnement pour l\'électricité. Abonnez vous chez RADEEL pour bénéficier de nos services!' . '</div>';*/}
    
   
   }
  
  
  
  }
  else{
    echo '
    
   
    <div class="alert alert-danger">  Email ou mot de passe incorrect </div> 
    <a href="connexion.php">Revenir à la page de connexion</a> <br> <br> 
    
     ';
     }   
}else{echo '<div class="alert alert-danger"> Email incorrect! si vous êtes nouveaux <a href="inscription.php">inscrivez-vous</a> <br>  </div> ';}
}
  
          
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title></title>
  <style>
  
  .container2{ /**conteneur du tout --- background */
            background-color: #f0f8ff; 
            /* #6495ed; */
            display:flex;
            align-content: center;
            justify-content: center;
            

        }
        .x {  /** conteneur du contenu */
            /* margin-left: 40%;  */
            height: auto;
            background-color:#afeeee; 
            width: 955px;
             
        }
img {
  /* width:333px; */
    margin-left: 500px;
    margin-right: auto;
}

.btn:hover{
  font-weight: 700;  


}
  /* .btn:visited{
    color: black;
  }
  .btn:hover{
    color: red;
    font-weight: 700;
  } */
  h2{
    margin-left: 270px;
  }
  
  h3{
    margin-left: 170px;
  }
  </style>
</head>
<body>

<footer class="text-center text-white " style="background-color: #f0f8ff;">
  <!-- Grid container -->
  <div class="container p-4"></div>
  <!-- Grid container -->

  <!-- Copyright -->
  
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.06); ">
  <a href="accueil.php" > accueil</a>
   <span style="color:black;">|  © 2021 R.A.D.E.E.L :</span>
    <a href="https://www.linkedin.com/in/farah-al-harrak-522869197/" > FARAH AL HARRAK</a>
  </div>
  <!-- Copyright -->
</footer>

</body>
</html>

