<?php
//set locale
setlocale(LC_TIME, "fr_FR"); 
require_once('databaseconnect.php');
$query = $DB->query("SELECT * FROM datas INNER JOIN arrondissements ON datas.arrondissement = arrondissements.idArrondissements INNER JOIN communes ON datas.commune = communes.idCommunes INNER JOIN departements ON datas.departement = departements.idDepartements INNER JOIN udopers ON datas.udoper = udopers.idUdopers");
$datas = $query->fetchall();

//var_dump($datas);
//exit;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des données</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-xl-4">
                <a class="" href="index.php">Revenir au formulaire</a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h3>Liste des données</h3><br>
        <h6>Exportation des données</h6>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Date Adhésion</th>
                <th>Date Enregistrement</th>
                <th>Arrondissement</th>
                <th>Village</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Telephone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($datas as $data) { ?>
            <tr>
                <td><?= strftime("%d/%m/%Y à %Hh %M ", strtotime( $data[1] )) ; ?></td>
                <td><?= strftime("%d/%m/%Y à %Hh %M ", strtotime( $data[2] )) ; ?></td>
                <td><?= $data[32] ; ?></td>
                <td><?= $data[26] ; ?></td>
                <td><?= $data[7] ; ?></td>
                <td><?= $data[8] ; ?></td>
                
                <td><?= $data[13] ; ?></td>
               
                <td><a class="btn btn-success" href="success.php?cardid=<?= $data[20] ; ?>">Voir carte</a></td>
                <td><a class="btn btn-info" href="details.php?cardid=<?= $data[20] ; ?>">Voir détails</a></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Date Adhésion</th>
                <th>Date Enregistrement</th>
                <th>Arrondissement</th>
                <th>Village</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Telephone</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

    </div>
 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</body>
</html>