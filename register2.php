<?php

$cin = $_GET['cin'];

if(isset($_POST['btn'])){
    if(isset($_POST['contrat']) && isset($_POST['gerance']))
        {   $contrat = $_POST['contrat'];
            
            $gerance = $_POST['gerance'];

        }
    

        $pdo = new PDO("mysql:host=localhost;dbname=laradeel", "root", ""); // se connecter à la base de données

        $sql = "SELECT num_contrat FROM dossier_contrat where num_contrat='$contrat'";
        $stmt = $pdo->prepare($sql); 

        $stmt->execute();
        if($stmt->rowCount() > 0){ // si num de contrat saisi existe 
            


        $sql = "SELECT abonne_id FROM dossier_abonne where cin='$cin' and gerance='$gerance'";
        $stmt = $pdo->prepare($sql); 

        $stmt->execute();
        $row = $stmt->fetchAll();  
        $id_recuperé = $row[0]["abonne_id"];


        /// update le abonne_id du utilisateur et le mettre en place le cin

        $sql = " UPDATE dossier_contrat set id_user='$id_recuperé' where num_contrat='$contrat' and gerance='$gerance'";
        $stmt = $pdo->prepare($sql); 

        $stmt->execute();

        $sql = " UPDATE dossier_contrat set cin='$cin' where num_contrat='$contrat' and gerance='$gerance'";
        $stmt = $pdo->prepare($sql); 

        $stmt->execute();
        


        /// 
        $sql = " UPDATE facture set abonnee_id='$id_recuperé'  where num_contrat='$contrat' and gerance='$gerance'";
        $stmt = $pdo->prepare($sql); 

        $stmt->execute();

        ///
        $sql = " UPDATE consommation set abonne_id='$id_recuperé'  where num_contrat='$contrat' and gerance='$gerance'";
        $stmt = $pdo->prepare($sql); 

        $stmt->execute();
        
        echo '<div class="alert alert-info">'.'inscription effectuée ' . '<a href="connexion.php">connectez-vous</a>'. '</div>' ;

        }else{
            $sql = "SELECT abonne_id FROM dossier_abonne where cin='$cin' and gerance='$gerance'";
            $stmt = $pdo->prepare($sql); 
            $stmt->execute();
            $row = $stmt->fetchAll();  
            $id_recuperé = $row[0]["abonne_id"];

            /// supprimer ce qu'on a ajouté tout à l'heure lors d el'inscription
            $sql= "DELETE FROM dossier_abonne where abonne_id='$id_recuperé' and gerance='$gerance'";
            $stmt = $pdo->prepare($sql); 
            $stmt->execute();
            echo '<div class="alert alert-danger">'.'le numéro que vous avez saisi ne correspond à aucun contrat d\'abonnment chez la RADEEL'.'</div>';}
    
    
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
