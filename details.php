<?php
//set locale
setlocale(LC_TIME, "fr_FR"); 
require_once('databaseconnect.php');

$query = $DB->query("SELECT * FROM datas INNER JOIN arrondissements ON datas.arrondissement = arrondissements.idArrondissements INNER JOIN communes ON datas.commune = communes.idCommunes INNER JOIN departements ON datas.departement = departements.idDepartements INNER JOIN udopers ON datas.udoper = udopers.idUdopers WHERE cardNumber = ?", array($_GET['cardid']));
$datas = $query->fetch();

//var_dump($datas);
//exit;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-xl-4">
                <a class="" href="datas.php">Revenir à la liste des données</a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h3>Informations sur <?= $datas[8]; ?> <?= $datas[9]; ?> </h3><br>
       <div class="row">
            <div class="col-6">
                <p>Date d'adhésion : <?= strftime("%d/%m/%Y", strtotime( $datas[1] )) ; ?></p>
                <p>Date d'enrégistrement : <?= strftime("%d/%m/%Y", strtotime( $datas[2] )) ; ?></p>
                <p>Département : <?= $datas[32] ; ?> </p>
                <p>Udoper : <?= $datas[34] ; ?> </p>
                <p>Commune : <?= $datas[29] ; ?> </p>
                <p>Arrondissement : <?= $datas[26] ; ?> </p>
                <p>Village : <?= $datas[7] ; ?> </p>
                <p>Nom : <?= $datas[8] ; ?> </p>
                <p>Prénoms : <?= $datas[9] ; ?> </p>
                <p>Date de Naissance : <?= strftime("%d/%m/%Y", strtotime( $datas[10] )); ?> </p>
                <p>Lieu de Naissance : <?= $datas[11] ; ?> </p>
                <p>Sexe : <?= $datas[12] ; ?> </p>
                <p>Tel : <?= $datas[13] ; ?> </p>
                <p>Type Piece : <?= $datas[14] ; ?> </p>
                <p>Numéro de la Piece : <?= $datas[15] ; ?> </p>
                <p>Expire le : <?= strftime("%d/%m/%Y", strtotime( $datas[16] )) ; ?> </p>
                <p>Numéro de carte membre : <?= $datas[20]; ?> </p>
                <p>Nb ovins : <?= $datas[21]; ?> </p>
                <p>Nb bovins : <?= $datas[22]; ?> </p>
                <p>Nb caprins : <?= $datas[23]; ?> </p>
            </div>
            <div class="col-6">
                <img class="img-fluid" src="<?= $datas[19] ; ?> " alt="" srcset=""><br><hr>
                <h6>Signature / Empreinte digitale</h6> <br>
                <img style="width: 100px;" class="img-fluid" src="<?= $datas[24] ; ?> " alt="" srcset="">
            </div>
       </div><br><br>

    </div>
 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>