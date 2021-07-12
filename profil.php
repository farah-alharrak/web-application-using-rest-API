

<?php


require 'util.php';

// //init_php_session();
// $e = $_POST['email'];
// print_r($_POST);
// exit;

if(isset($_POST['btn']))
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
        {
          

$email = $_POST['email'];  
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=laradeel", "root", "");

$sql = "SELECT * FROM dossier_abonne WHERE email= '$email' ";

$stmt = $pdo->prepare($sql); 

$stmt->execute();



//$user = $stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0)
{
  $data = $stmt->fetchAll();
  if( $password == $data[0]["password"] ) // pour le hashage utiliser password_verify au lieu de == 
  {
    //echo '<br>';
    echo '<a href="connexion.php" class="btn btn-success pull-right" style="margin-left: ; margin-top:0px;">Se deconnecter</a>' . '<br>' ;
    echo '  <img src="index.jpg" alt=""> ';
    $nom = $data[0]["nom"];
    $prenom = $data[0]["prenom"];
//     echo '<button type="button" class="btn btn-primary btn-lg active" style="background-color: red;">
// Revenir à la page précédante </button><br><br> ' ;
    echo '<h2>' . 'Bonjour ' . '<b>' . $nom  . ' ' . $prenom . '</b>' . ' !' . '</h2>'  ;
    echo '<h3>' . 'Bienvenue dans votre compte chez la RADEEL <br><br><br><br>' . '</h3>' ;
        /// recuperer l'id concernant les contrats d'eau d'un tel client connecté  ///

    $ideau = "SELECT abonne_id FROM dossier_abonne where email = '$email' and gerance = 'eau'";

    $stmt = $pdo->prepare($ideau); 
    $stmt->execute();
    if($stmt->rowCount() > 0){
    $datae = $stmt->fetchAll();
     
    $ide = $datae[0]["abonne_id"];
    echo '<a  class="btn btn-info pull-right" style="margin-left: 100px" href="http://localhost:8080/laradeel/facture.php?ide='.$ide.' ">Consulter vos factures d\'eau</a> <br><br>' ; 
    echo '<a class="btn btn-info pull-right" style="margin-left: 100px" class="btn" href="http://localhost:8080/laradeel/consommation.php?ide='.$ide.'">Consulter votre consommation d\'eau</a> <br> <br>  '; 


    }else{echo '<div class="alert alert-danger">' . 'Vous n\'avez pas de contrat d\'abonnement pour l\'eau' . '</div>';}

       /// recuperer l'id concernant les contrats d'electricité d'un tel client connecté  ///

    $idbt = "SELECT abonne_id FROM dossier_abonne where email = '$email' and gerance = 'bt'";

    $stm = $pdo->prepare($idbt); 
    $stm->execute();
    if($stm->rowCount() > 0){
    $datab = $stm->fetchAll();
    $idb = $datab[0]["abonne_id"];
    echo '<br>';
    echo '<a class="btn btn-danger pull-right" style="margin-left: 100px" href="http://localhost:8080/laradeel/factureBT.php?idb='.$idb.'">Consulter vos factures d\'électricité </a> <br><br><br>';

    echo '<a class="btn btn-danger pull-right" style="margin-left: 100px" href="http://localhost:8080/laradeel/consommationBT.php?idb='.$idb.'">Consulter votre consommation d\'électricité</a> <br> <br> '; 
  
    }else{echo 'Vous n\'avez pas de contrat d\'abonnement pour l\'électricité';}
    
    }
  else{
    echo '
    
   
    <div class="alert alert-danger">  Email ou mot de passe incorrect </div> 
    <a href="connexion.php">Revenir à la page de connexion</a> <br> <br> 
    
     ';
     }   
}
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
  
img {
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
    margin-left: 500px;
  }
  
  h3{
    margin-left: 400px;
  }
  </style>
</head>
<body>

</body>
</html>

