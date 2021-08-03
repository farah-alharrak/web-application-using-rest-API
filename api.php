<?php

/// les fonctions de recuperation de données de la base de données



function getFactureById($id){
    $pdo = getConnexion(); 
    $req = "SELECT * from facture where num_contrat = '$id' ORDER BY date ASC"; 



    $stmt = $pdo->prepare($req);
    //$stmt->bindValue(":abonne_id",$id,PDO::PARAM_INT);    // pour faire l association entre :id et le paramete $id  
    $stmt->execute();
    $facture = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    
    sendJSON($facture);  // envoyer les données recupérées de la base de données en format json
}

function getConsommationById($id){
    $pdo = getConnexion(); 
    $req = "SELECT * from consommation where num_contrat = '$id' ORDER BY date ASC"; 
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $consommation = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $stmt->closeCursor();
    sendJSON($consommation);
    

}

// se connecter à la base de données 

function getConnexion(){
    return new PDO("mysql:host=localhost;dbname=laradeel;charset=utf8","root","");
}

function sendJSON($infos){
    header("Access-Control-Allow-Origin: *");  // * donne l'acces à tout le monde 
    header("Content-Type: application/json");
    echo json_encode($infos,JSON_UNESCAPED_UNICODE); // le 2eme parametre pour eviter les probs d'accent et d'orthographe ...
    
    
}



?>
