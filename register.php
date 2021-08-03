<?php



if(isset($_POST['btn'])){
    if(isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['password']) && isset($_POST['repeatpassword']) && isset($_POST['prenom']) && isset($_POST['cin']) && isset($_POST['adresse']) )
        {   $cin = $_POST['cin'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repeatpassword = $_POST['repeatpassword'];
            $adresse = $_POST['adresse'];



            if($password==$repeatpassword){
                $pdo = new PDO("mysql:host=localhost;dbname=laradeel", "root", "");

    $sql = "INSERT INTO dossier_abonne values('','$cin', '$nom', '$prenom', '$email', '$password','','$adresse', 'eau','en depot') ";

    $stmt = $pdo->prepare($sql); 

    $stmt->execute();

    $sql = "INSERT INTO dossier_abonne values('','$cin', '$nom', '$prenom', '$email', '$password','','$adresse', 'bt','en depot') ";

    $stmt = $pdo->prepare($sql); 

    $stmt->execute();
    /// tester si le cin et la gerance correspondante dans le formulaire (càd le contrat) existent dans notre BD puis faire le update du abonne_dossier
    $sql = "SELECT cin FROM dossier_contrat where cin='$cin' and gerance='eau'";
    $stmt = $pdo->prepare($sql); 

    $stmt->execute();
    if($stmt->rowCount() > 0){// cad cin existe
         
        // recuperer l'id d'utilisateur d'eau ayant le cin concerné
        $sql = "SELECT abonne_id FROM dossier_abonne WHERE cin='$cin' and gerance='eau' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();

        $row = $stmt->fetchAll();  
        $id_recuperé = $row[0]["abonne_id"];
 
        // recuperer le numero de contrat 
        $sql2 = "SELECT num_contrat FROM dossier_contrat WHERE cin='$cin' and gerance='eau' ";

        $stmt2 = $pdo->prepare($sql2); 

        $stmt2->execute();

        $row2 = $stmt2->fetchAll();  
        $numContrat = $row2[0]["num_contrat"];

        // faire la mise à jour
        $sql = "UPDATE dossier_contrat SET id_user = $id_recuperé WHERE num_contrat='$numContrat' and gerance='eau' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();



        $sql = "UPDATE facture SET abonnee_id = $id_recuperé WHERE num_contrat='$numContrat' and gerance='eau' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();



        $sql = "UPDATE consommation SET abonne_id = $id_recuperé WHERE num_contrat='$numContrat' and gerance='eau' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();
        


        /////// il faut repeter la meme chose pour l'autre gerance

    

    
    $sql = "SELECT cin FROM dossier_contrat where cin='$cin' and gerance='bt'";
    $stmt = $pdo->prepare($sql); 

    $stmt->execute();

    if($stmt->rowCount() > 0){
         
        // recuperer l'id d'utilisateur ayant le cin et la gerance concernés
        $sql = "SELECT abonne_id FROM dossier_abonne WHERE cin='$cin' and gerance='bt' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();

        $row = $stmt->fetchAll();  
        $id_recuperé = $row[0]["abonne_id"];
 
        // recuperer le numero de contrat 
        $sql2 = "SELECT num_contrat FROM dossier_contrat WHERE cin='$cin' and gerance='bt' ";

        $stmt2 = $pdo->prepare($sql2); 

        $stmt2->execute();

        $row2 = $stmt2->fetchAll();  
        $numContrat = $row2[0]["num_contrat"];

        // faire la mise à jour
        $sql = "UPDATE dossier_contrat SET id_user = $id_recuperé WHERE num_contrat='$numContrat' and gerance='bt' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();



        $sql = "UPDATE facture SET abonnee_id = $id_recuperé WHERE num_contrat='$numContrat' and gerance='bt' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();



        $sql = "UPDATE consommation SET abonne_id = $id_recuperé WHERE num_contrat='$numContrat' and gerance='bt' ";

        $stmt = $pdo->prepare($sql); 

        $stmt->execute();
        
    }else{}




        /////////////////////////////////////////////////////////////////////////////////

        echo '<div class="alert alert-info">'.'inscription effectuée ' . '<a href="connexion.php">connectez-vous</a>'. '</div>' ;

    }else{echo '<div class="alert alert-danger">'.'votre cin ne correspond à aucun contrat d\'abonnment chez la RADEEL. vérifiez le ou essayez de continuer l\'inscription avec vos identifiants de cotrats ' . '</div>' ;

           echo ' <div class="container register">
           <!--  -->
                           <div class="row">
                               
                               <div class="col-md-9 register-right">
                                   
                                   <div class="tab-content" id="myTabContent">
                                       <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                           <div class="row register-form">
                                               <div class="col-md-6">
                                               <form action="register2.php?cin='.$cin.'" method="post" onsubmit="return myFunction()">
                                                   <div class="form-group">
                                                   Numéro du contrat d\'eau<input type="text" class="form-control" placeholder="identifiant du contrat d\'eau *" value=""  name="contratEau" required/>
                                                   Numéro du contrat d\'électricité<input type="text" class="form-control" placeholder="identifiant du contrat d\'électricité *" value=""  name="contratBt" required/>

                                                   </div>
                                                    
                                                   
                                               </div>
                                               <div class="col-md-6">
                                                   
                                                   
                                                   
                                               <br>
                                   <input type="submit" name="btn" class="btnRegister"  value="valider" style="color: blue" />
                                   </form>
                                       </div> 
                                   </div>
                               </div>
                           </div>
                           
                       </div>';
    
    }


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
