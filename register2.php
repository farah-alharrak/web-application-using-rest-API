<?php



if(isset($_POST['btn'])){
    if(isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['password']) && isset($_POST['repeatpassword']) && isset($_POST['prenom']) && isset($_POST['contrat']) && isset($_POST['adresse']) && isset($_POST['gerance']))
        {   $contrat = $_POST['contrat'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repeatpassword = $_POST['repeatpassword'];
            $adresse = $_POST['adresse'];
            $gerance = $_POST['gerance'];



            if($password==$repeatpassword){
                $pdo = new PDO("mysql:host=localhost;dbname=laradeel", "root", "");

    $sql = "INSERT INTO dossier_abonne values('','', '$nom', '$prenom', '$email', '$password','','$adresse', '$gerance','en depot') ";

    $stmt = $pdo->prepare($sql); 

    $stmt->execute();
    /// tester si le id du contrat existe dans notre BD faire le update du abonne_dossier
    $sql = "SELECT num_contrat FROM dossier_contrat where num_contrat='$contrat' and gerance='$gerance'";
    $stmt = $pdo->prepare($sql); 

    $stmt->execute();
    if($stmt->rowCount() > 0){// cad l'id contrat existe
         
        // recuperer l'id d'utilisateur inscrit tout à l'heure 
        $sql = "SELECT abonne_id FROM dossier_abonne WHERE email='$email' and gerance='$gerance' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();

        $row = $stmt->fetchAll();  
        $id_recuperé = $row[0]["abonne_id"];
 
        

        // faire la mise à jour
        $sql = "UPDATE dossier_contrat SET id_user = $id_recuperé WHERE num_contrat='$contrat' and gerance='$gerance' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();



        $sql = "UPDATE facture SET abonnee_id = $id_recuperé WHERE num_contrat='$contrat' and gerance='$gerance' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();



        $sql = "UPDATE consommation SET abonne_id = $id_recuperé WHERE num_contrat='$contrat' and gerance='$gerance' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();


        echo '<div class="alert alert-info">'.'inscription effectuée ' . '<a href="connexion.php">connectez-vous</a>'. '</div>' ;

    }else{echo '<div class="alert alert-danger">'.'l\'identifiant que vous avez saisi ne correspond à aucun contrat d\'abonnment chez la RADEEL. vérifiez le' . '</div>' ;}


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
