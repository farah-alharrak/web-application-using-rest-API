
<?php require_once "auth.inc.php" ?>

<?php
require_once("./index.php");

$informations = json_decode(file_get_contents("http://localhost:8080/laradeel/consommation/".$_GET['idb']));
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consommation d'électricité</title>
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
    <h2 style="color: white; font-weight: bold;">Votre consommation d'électricité</h2><br><br>
    <a href="logout.php" class="btn btn-danger pull-right" style="margin-left: 697px">Se deconnecter</a>
    </nav><br><br><br>
    <img src="index.jpg" alt=""><br><br>
    <br><br><br>
    <div class="container">
<table class="table table-striped">
    <tr>
    <thead>
        <th>Identifiant</th>
        <th>Gérance</th>
        <th>Date</th>
        <th>Quantité consommée</th>
       
    </tr>
    </thead>
    <?php if(count($informations) <= 0){ echo '<div class="alert alert-danger">' . 'votre dossier est en cours de traitement pour consulter votre consommation veuillez vous reconnecter ultérieurement ' . '</div>' ;}  ?>

    <?php foreach ($informations as $information): ?>

        <tr>
            <td><?= $information->abonne_id ?></td>
            <td><?= $information->gerance ?></td>
            <td><?= $information->date ?></td>
            <td><?= $information->valeur_consommee ?></td>
            
        </tr>
        <?php endforeach; ?>
</table>
</div>
</body>
</html>

