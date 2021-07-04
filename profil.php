

<?php


require 'util.php';

// //init_php_session();
// $e = $_POST['email'];
// print_r($_POST);
// exit;

if(isset($_POST['btn']))
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
        {
            /*echo '<pre>' ;
            print_r($_POST);
            echo '</pre>';*/

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
  if( $password == $data[0]["password"] ) // pour le hashage utuliser password_verify au lieu de == 
  {
    echo 'Bonjour ' . $email . ' !' . '<br>' ;
    echo 'Bienvenue dans votre compte chez LARADEEL <br><br>' ;
        /// recuperer l'id concernant les contrats d'eau d'un tel client connecté

    $ideau = "SELECT abonne_id FROM dossier_abonne where email = '$email' and gerance = 'eau'";

    $stmt = $pdo->prepare($ideau); 
    $stmt->execute();
    $datae = $stmt->fetchAll();
    $ide = $datae[0]["abonne_id"];

       /// recuperer l'id concernant les contrats d'electricité d'un tel client connecté
    $idbt = "SELECT abonne_id FROM dossier_abonne where email = '$email' and gerance = 'bt'";

    $stm = $pdo->prepare($idbt); 
    $stm->execute();
    $datab = $stm->fetchAll();
    $idb = $datab[0]["abonne_id"];


    echo '<a href="http://localhost:8080/laradeel/consommation/'.$ide.'">Consulter votre consommation d\'eau</a> <br> <br> '; 
    echo '<a href="http://localhost:8080/laradeel/consommation/'.$idb.'">Consulter votre consommation d\'électricité</a> <br> <br> '; 

    echo '<a href="http://localhost:8080/laradeel/facture/'.$ide.' ">Consulter vos factures d\'eau</a> <br><br>' ; 
    echo '<a href="http://localhost:8080/laradeel/facture/'.$idb.'">Consulter vos factures d\'électricité </a> <br>';
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



