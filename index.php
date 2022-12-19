<?php

require_once('databaseconnect.php');

$departements = $DB->query("SELECT * FROM departements");
$departements = $departements->fetchAll();

$udopers = $DB->query("SELECT * FROM udopers");
$udopers = $udopers->fetchAll();

$communes = $DB->query("SELECT * FROM communes");
$communes = $communes->fetchAll();

$arrondissements = $DB->query("SELECT * FROM arrondissements");
$arrondissements = $arrondissements->fetchAll();

$villages = $DB->query("SELECT * FROM villages");
$villages = $villages->fetchAll();

$udoper = $DB->query("SELECT * FROM udopers");
$udoper = $udoper->fetchAll();

// echo "<pre>";
// var_dump($communes);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générer une carte membre de l'ANOPER </title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   
</head>
<body>
    <div class="container">

        <div class="container mt-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-xl-3">
                    <a class="btn btn-primary d-block mb-2" href="datas.php">Voir la liste des données</a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-xl-3">
                    <a class="btn btn-primary d-block mb-2" href="./addarrondissement.php">Ajouter Arrondissement</a>
                </div>
               
            </div>
        </div>

       <div id="form" class="">

            <div class="container text-center mt-4">
                <h2>Remplissez le formulaire pour générer une <br> nouvelle carte membre de l'ANOPER :</h2>
            </div>

            <div class="container">
                <form method="post" action="qrcode.php" enctype="multipart/form-data">

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="dateAdhesion">Date d'adhésion</label>
                            <input type="date" name="dateAdhesion" id="dateAdhesion" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-12 mb-3">
                            <label for="departement">Département</label>
                            <select class="form-select" name="departement" required>
                                <option value="" selected="selected">Sélectionner le département</option>
                                <?php foreach($departements as $departement): ?>
                                    <option value="<?= $departement['idDepartements'] ?>"><?= $departement['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="commune">Commune</label>
                            <select class="form-select" name="commune" id="" required>
                                <option value="" selected="selected">Sélectionner la commune</option>
                                <?php foreach($communes as $commune): ?>
                                    <option value="<?= $commune['idCommunes'] ?>"><?= $commune['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <div class="row mb-3">

                        <div class="col-12 mb-3">
                            <label for="arrondissement">Arrondissement</label>
                            <select class="form-select" name="arrondissement" id="" required>
                                <option value="" selected="selected">Sélectionner l'arrondissement</option>
                                <?php foreach($arrondissements as $arrondissement): ?>
                                    <option value="<?= $arrondissement['idArrondissements'] ?>"><?= $arrondissement['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div id="arrondissementHelp" class="form-text">Si l'arrondissement ne figure pas dans la liste vous pouvez le rajouter avec le boutton ajouter arrondissement ci dessus.</div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="village">Village</label>
                            <input type="text" name="village" id="village" class="form-control">
                        </div>

                        <div class="col-12">
                            <label for="udoper">UDOPER</label>
                            <select class="form-select" name="udoper" id="" required>
                                <option value="" selected="selected">Sélectionner l'UDOPER</option>
                                <?php foreach($udoper as $udoper): ?>
                                    <option value="<?= $udoper['idUdopers'] ?>"><?= $udoper['name'] ?></option>
                                <?php endforeach; ?>    
                            </select>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-6 mb-3">
                            <label for="nom" class="form-label">Nom </label>
                            <input type="text" class="form-control" id="nom" aria-describedby="nomHelp" name="nom" required>
                        </div>
                        <div class="col-6">
                            <label for="prenom" class="form-label">Prénom </label>
                            <input type="text" class="form-control" id="prenom" aria-describedby="prenomHelp" name="prenom" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6 mb-3">
                            <label for="dateNaissance" class="form-label">Date de Naissance </label>
                            <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" required>
                        </div>
                        <div class="col-6">
                            <label for="lieuNaissance" class="form-label">Lieu de Naissance </label>
                            <input type="text" class="form-control" id="lieuNaissance" name="lieuNaissance" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6 mb-3">
                            <label for="sexe" class="form-label">Sexe </label>
                            <select class="form-select" name="sexe" id="sexe">
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="tel" class="form-label">Téléphone </label>
                            <input type="tel" class="form-control" id="tel" aria-describedby="telHelp" name="tel" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 mb-3">
                            <label for="ovins" class="form-label">Nb Ovins </label>
                            <input class="form-control" type="number" name="ovins" id="ovins">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="bovins" class="form-label">Nb Bovins </label>
                            <input class="form-control" type="number" name="bovins" id="ovins">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="caprins" class="form-label">Nb Caprins </label>
                            <input class="form-control" type="number" name="caprins" id="caprins">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6 mb-3">
                            <label for="idcard" class="form-label">Type de pièce d'identité </label>
                            <select class="form-select" name="idcard" id="idcard">
                                <option value="CNI">CNI</option>
                                <option value="LEPI">Carte LEPI</option>
                                <option value="CIP">CIP</option>
                                <option value="Passport">Passport</option>
                                <option value="PermisDeConduire">Permis de conduire</option>
                                <option value="Autre">Autre </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="numeroPiece" class="form-label">Numéro de pièce d'identité </label>
                            <input type="text" class="form-control" id="numeroPiece" name="numeroPiece" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 mb-3">
                            <label for="dateExp" class="form-label">Date d'expiration</label>
                            <input type="date" class="form-control" id="dateExp" name="dateExp" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="photo" class="form-label">Photo d'identité </label>
                            <input type="file" name="photo" accept="image/*" class="form-control file" id="photoId" onchange="loadImage(event)" capture="camera" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="signature" class="form-label">Scan de la signature </label>
                            <input type="file" name="signature" accept="image/*" class="form-control file" id="photoId" onchange="loadImage(event)" capture="camera" required>
                        </div>
                    </div>
                    <div class="col-12 mb-3 d-grid gap-2">
                        <button type="submit" id="preview" class="btn btn-primary" name="submit">Soumettre</button>
                    </div>
                
                    
                </form>
            </div>
       </div>

        <br>
        <br>
       

        <div class="row d-none" id="idcard">
            <div class="col-lg-6">
                <div class="card member d-flex">
                    <div class="container">
                        <div class="row">
                            <div class="mx-auto col-2 mt-3">
                                <img class="img-fluid float-start" src="logo.png" alt="logo" style="width: 80px;">
                            </div>
                            <div class="mx-auto text-center col-8 mt-3">
                                <h6><b>CARTE DE MEMBRE <br> DE L'ANOPER</b></h6>
                            </div>
                            <div class="mx-auto col-2 mt-3" >
                                <img class="img-fluid float-end" src="flag.png" alt="flag" style="width: 80px;">
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-8">
                                <p>
                                <small>
                                    Nom: <b id="outName">KIKI</b> <br>
                                    Prénoms: <b id="outFirstName">Nicky</b> <br>
                                    Date/lieu de naissance: <b id="outBirthDate">01/01/2000 à N'dali</b> <br>
                                    Lieu de résidence: <b id="outAdress">Parakou</b> <br>
                                    Arrondissement: <b id="outArr">Parakou</b> <br>
                                    Commune: <b id="outComm" >Parakou</b> <br>
                                    Département: <b id="outDepart">Parakou</b> <br>
                                </small>
                                </p>
                            </div>
                            <div class="col-4">
                                <p><img src="profile.jpeg" style="width: 80%;" class="img-fluid img-thumbnail" alt="..."></p>
                            </div>
                            <div class="col-6">
                                <small>
                                        UDOPER: <b>BORGOU ALIBORI</b> <br>
                                        Tel: <b>90909090</b> <br>
                                </small>
                            </div>
                            <div class="col-6">
                                <small>
                                    Date d'adhésion: <b>01/01/2000</b> <br>
                                    Date d'enregistrement: <b>01/01/2000</b> <br>
                                </small>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-2 ">
                            <div class="col-8">
                                <small>Immatriculation n° 00000/ <span class="text-danger" >ANO</span></small>
                            </div>
                            <div class="col-4">
                                <img src="qrcode.png" alt="" srcset="" class="img-fluid img-thumbnail float-end" style="width: 30%;" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <br>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
