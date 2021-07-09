<?php
require_once("./api.php");

// le routage des chemins pour accéder à leurs factures et consommation par mois ..

// localhost:8080/facture/:id
// localhost:8080/consommation/:id


try{
    if(!empty($_GET['demande'])){
        $url = explode("/", filter_var($_GET['demande'],FILTER_SANITIZE_URL)); // decomposer mon url
        
        
        switch($url[0]){
            case "facture" : 
                if(!empty($url[1])){
                    //$json = 
                    getFactureById($url[1]);
                    //ob_start();
                    //echo $json;
                    
                    
                    //$informations = (json_decode($json));
                    //table($informations); /// avec table() la fct qui affiche le tableau voulu
                    //print $informations[0]->gerance;
                    //echo $informations->{'gerance'};//->gerance ;//->{'gerance'};
                    //echo $informations;
                    // foreach ($informations as $info) {
                    //     echo $info;// . " : " . $info->gerance . "<br/>";
                    
                    
                     
                } else {
                    throw new Exception ("Vous devez vous authentifiez d'abord !");  // l'identifiant n'est pas encore connue
                }
            break;
            case "consommation" : 
                if(!empty($url[1])){
                    getConsommationById($url[1]);
                } else {
                    throw new Exception ("Vous devez vous authentifiez d'abord !");
                }
            break;
            default : throw new Exception ("La demande n'est pas valide, vérifiez l'url");
        }
    } else {
        //throw new Exception ("Problème de récupération de données.");
    }
} catch(Exception $e){
    $erreur =[
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}
?>

