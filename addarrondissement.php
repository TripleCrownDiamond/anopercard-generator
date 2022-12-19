<?php
session_start();
require_once('databaseconnect.php');

$departements = $DB->query("SELECT * FROM departements");
$departements = $departements->fetchAll();

$communes = $DB->query("SELECT * FROM communes");
$communes = $communes->fetchAll();

$arrondissements = $DB->query("SELECT * FROM arrondissements");
$arrondissements = $arrondissements->fetchAll();
//var_dump($arrondissements);
//exit;

if(isset($_POST['send'])) {
    $idCommuneNew = htmlentities($_POST['commune']);
    $arrondissement = htmlentities($_POST['arrondissement']);

    $arrondissementCheick = $DB->query("SELECT * FROM arrondissements WHERE name = ?", array($arrondissement));
    $arrondissementCheick = $arrondissementCheick->rowCount();

    if($arrondissementCheick === 1) {

        $_SESSION['flash']['danger'] = "Cet arrondissement existe déjà dans la base de données.";
        header("Location: addarrondissement.php");
        exit;

    } else {
        $query = $DB->insert("INSERT INTO arrondissements (name, FkCommunes) VALUES (?, ?)", array($arrondissement, $idCommuneNew));
    
        if($query) {
            $_SESSION['flash']['success'] = "Arrondissement ajouté avec succès.";
            header("Location: addarrondissement.php");
            exit;
        }else{
            $_SESSION['flash']['danger'] = "Oups une erreur s'est produite.";
            header("Location: addarrondissement.php");
            exit;
        }
    }  
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter arrondissement</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="mt-5">
                <h1 class="text-center">Ajouter arrondissement</h1>
                <form action="" method="post">
                     
                    <?php include_once('./notif.php') ; ?>
                    <div class="mb-3">
                        <label for="form-label">Sélectionnez la commune</label>
                        <select class="form-select" name="commune" id="commune" required>
                            <option value="">Sélectionnez la commune</option>
                            <?php foreach($communes as $commune): ?>
                                <option value="<?= $commune['idCommunes'] ?>"><?= $commune['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Entrez le nom de l'arrondissement</label>
                        <input type="text" class="form-control" name="arrondissement" id="arrondissement" placeholder="Nom de l'arrondissement" required>
                    </div>
                    <div class="col-12 mb-3 d-grid gap-2">
                        <button type="submit" id="send" class="btn btn-primary" name="send">Soumettre</button>
                    </div>
                    <div class="col-12 mb-3 d-grid gap-2">
                        <a href="index.php" class="btn btn-info">Retour sur le  formulaire</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>