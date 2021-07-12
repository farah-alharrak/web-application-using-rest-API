<?php



if(isset($_POST['btn'])){
    if(isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['password']) && isset($_POST['repeatpassword']) && isset($_POST['prenom']) && isset($_POST['cin']) && isset($_POST['adresse']) && isset($_POST['gerance']))
        {   $cin = $_POST['cin'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repeatpassword = $_POST['repeatpassword'];
            $adresse = $_POST['adresse'];
            $gerance = $_POST['gerance'];



            if($password==$repeatpassword){
                $pdo = new PDO("mysql:host=localhost;dbname=laradeel", "root", "");

    $sql = "INSERT INTO dossier_abonne values('','$cin', '$nom', '$prenom', '$email', '$password','','$adresse', '$gerance','en depot') ";

    $stmt = $pdo->prepare($sql); 

    $stmt->execute();
    echo 'inscription effectuée ' . '<a href="connexion.php">connectez-vous</a>' ;
            }else{echo 'Le mot de passe n\'est pas bien confirmé';
                  echo ' <a href="inscription.php" class="btn btn-success pull-right" >Ressayez' ;}


        }
    }






?>

