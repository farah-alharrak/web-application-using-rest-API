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
            }else{echo '<div class="alert alert-danger">'.'Le mot de passe n\'est pas bien confirmé' . '</div>';
                  echo ' <a href="inscription.php" class="btn btn-success pull-right" >Ressayez' ;}


        }
    }






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
</body>
</html>
