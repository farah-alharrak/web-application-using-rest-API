

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
    echo '  <img src="index.jpg" alt=""> ';
    $nom = $data[0]["nom"];
    $prenom = $data[0]["prenom"];
//     echo '<button type="button" class="btn btn-primary btn-lg active" style="background-color: red;">
// Revenir à la page précédante </button><br><br> ' ;
    echo '<h2>' . 'Bonjour ' . $nom . ' ' . $prenom . ' !' . '</h2>'  ;
    echo '<h3>' . 'Bienvenue dans votre compte chez LARADEEL <br><br>' . '</h3>' ;
        /// recuperer l'id concernant les contrats d'eau d'un tel client connecté  ///

    $ideau = "SELECT abonne_id FROM dossier_abonne where email = '$email' and gerance = 'eau'";

    $stmt = $pdo->prepare($ideau); 
    $stmt->execute();
    $datae = $stmt->fetchAll();
    $ide = $datae[0]["abonne_id"];

       /// recuperer l'id concernant les contrats d'electricité d'un tel client connecté  ///

    $idbt = "SELECT abonne_id FROM dossier_abonne where email = '$email' and gerance = 'bt'";

    $stm = $pdo->prepare($idbt); 
    $stm->execute();
    $datab = $stm->fetchAll();
    $idb = $datab[0]["abonne_id"];

    echo '<a class="btn" href="http://localhost:8080/laradeel/facture.php?ide='.$ide.' ">Consulter vos factures d\'eau</a> <br><br>' ; 
    echo '<a class="btn" href="http://localhost:8080/laradeel/factureBT.php?idb='.$idb.'">Consulter vos factures d\'électricité </a> <br><br><br><br> <br>';

    
    echo '<a class="btn" class="btn" href="http://localhost:8080/laradeel/consommation.php?ide='.$ide.'">Consulter votre consommation d\'eau</a> <br> <br>  '; 
    echo '<a class="btn" href="http://localhost:8080/laradeel/consommationBT.php?idb='.$idb.'">Consulter votre consommation d\'électricité</a> <br> <br> '; 
  }
  else{
    echo '
    <html>
    <head>
    </head>
    <body>
    <div class="alert alert-danger">  Email ou mot de passe incorrect </div> 
    <a href="connexion.php">Revenir à la page de connexion</a> <br> <br> 
    </body>
    </html>'; 
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
  <title></title>
  <style>
  
  .btn:visited{
    color: black;
  }
  .btn:hover{
    color: red;
    font-weight: 700;
  }
  h2, h3{
    margin-left: 200px;
  }
  
  </style>
</head>
<body>

</body>
</html>

