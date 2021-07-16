<?php require_once "auth.inc.php" ?>

<?php
require_once("./index.php");

$informations = json_decode(file_get_contents("http://localhost:8080/laradeel/facture/".$_GET['idb']));
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturation d'électricité</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
img {
    margin-left: 533px;
    margin-right: auto;
}
</style>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary mb-5">
    <h2 style="color: white; font-weight: bold;">Vos factures d'électricité</h2>
    <a href="logout.php" class="btn btn-danger pull-right" style="margin-left: 844px">Se deconnecter</a>
    </nav><br><br><br>
    <img src="index.jpg" alt=""><br><br>
    <br><br>
    <div class="container">
<table class="table table-striped">
    <tr>
    <thead>
        <th>Numéro de la facture</th>
        <th>Gérance</th>
        <th>Date</th>
        <th>Montant</th>
        <th>Identifiant</th>
        <th>Réglement</th>
        <th>Date de paiement</th>
        <th></th>
      <th></th>
    </tr>
    </thead>
    <?php if(count($informations) <= 0){ echo '<div class="alert alert-danger">' . 'votre dossier est en cours de traitement pour consulter vos factures veuillez vous reconnecter ultérieurement ' . '</div>' ;}  ?>
    <?php foreach ($informations as $information): ?>

        <tr>
            <td><?= $information->facture_id ?></td>
            <td><?= $information->gerance ?></td>
            <td><?= $information->date ?></td>
            <td><?= $information->montant ?></td>
            <td><?= $information->abonnee_id ?></td>
            <td><?= $information->reglement ?></td>
            <td><?= $information->date_paiment ?></td>
            
        </tr>
        <?php endforeach; ?>
</table>
</div>
</body>
</html>

