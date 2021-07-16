
<?php
// if (!$_SESSION['loginOK']) {
// header('Location: /laradeel/connexion.php');
// }
?> 


<?php
require_once("./api.php");

// le routage des chemins pour accéder à leurs factures et consommation par mois .. //

    // localhost:8080/facture/:id   
    // localhost:8080/consommation/:id
        // => cette route donne les données sous format json


try{
    if(!empty($_GET['demande'])){
        $url = explode("/", filter_var($_GET['demande'],FILTER_SANITIZE_URL)); // decomposer mon url
        
        switch($url[0]){
            case "facture" : 
                if(!empty($url[1])){    /* si url est écrit sous forme .../facture/:id on fait l'appel de la fonction 
                                            qui recupère les données(factures) par identifiant   */
                                            
                    getFactureById($url[1]);
                } else {
                    throw new Exception ("Vous devez vous authentifiez d'abord !");  // l'identifiant n'est pas encore connue
                }
            break;
            case "consommation" : 
                if(!empty($url[1])){  /* si url est écrit sous forme .../facture/:id on fait l'appel de la fonction 
                                         qui recupère les données(consommation) par identifiant   */
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

