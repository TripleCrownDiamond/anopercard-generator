<?php

    require_once('databaseconnect.php');
    $cardNumber = $_GET['cardid'];

    $datas = $DB->query("SELECT * FROM datas WHERE cardNumber = ?",  array($cardNumber));
    $datas = $datas->fetch();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générer carte de membre de données</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="./html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>
    
</head>
<body>
    <div class="container">
       
        <div class="container text-center mt-4">
            <h2 class="text-success">Carte de membre généré avec succès.</h2>
        </div>
        <div class="container">
            <div class="row" style="font-size: 12px" >
                <div class="col-lg-6 mx-auto" >
                    <div class="card member d-flex" id="idcard">
                        <div class="container">
                            <div class="row" >
                                <div class="mx-auto col-2 mt-1">
                                    <img class="img-fluid float-start" src="logo.png" alt="logo" style="width: 80px;">
                                </div>
                                <div class="mx-auto text-center col-8 mt-1">
                                    <p><b>CARTE DE MEMBRE DE L'ANOPER<br> (Association Nationale des Organisations Professionnelles d’Eleveurs de Ruminants)</b></p>
                                </div>
                                <div class="mx-auto col-2 mt-1" >
                                    <img class="img-fluid float-end" src="flag.png" alt="flag" style="width: 80px;">
                                </div>
                            </div>
                            <hr style="margin-top: -8px">
                            <div class="row mt-1" style="margin-top: -15px">
                                <div class="col-8">
                                    <p>
                                    <small>
                                        Nom: <b id="outName"> <?= $datas['nom'] ; ?> </b> <br>
                                        Prénoms: <b id="outFirstName"><?= $datas['prenom'] ; ?></b> <br>
                                        Date/lieu de naissance: <b id="outBirthDate"><?= date("d/m/Y", strtotime($datas['dateNaissance'])) ; ?> à <?= $datas['lieuNaissance'] ; ?></b> <br>
                                        Lieu de résidence: <b id="outAdress"><?= $datas['village'] ; ?></b> <br>
                                        Arrondissement: <b id="outArr"><?= $datas['arrondissement'] ; ?></b> <br>
                                        Commune: <b id="outComm" ><?= $datas['commune'] ; ?></b> <br>
                                        Département: <b id="outDepart"><?= $datas['departement'] ; ?></b> <br>
                                    </small>
                                    </p>
                                </div>
                                <div class="col-4">
                                    <p ><img src="<?= $datas['idPicsPath'] ; ?>" style="width: 80%;" class="img-fluid float-end img-thumbnail" alt="..."></p>
                                </div>
                                <div class="col-6" style="margin-top: -15px">
                                    <small>
                                            UDOPER: <b><?= $datas['udoper'] ; ?></b> <br>
                                            
                                            Date d'adhésion: <b><?= strftime("%d/%m/%Y", strtotime( $datas['dateAdhesion'] )) ; ?></b> <br>
                                            Date d'enregistrement: <b><?= strftime("%d/%m/%Y", strtotime ($datas['dateEnregistrement'])) ; ?></b> <br>
                                    
                                    </small>
                                </div>
                                <div class="col-6" style="margin-top: -15px">
                                    <small class="float-end">
                                        <div class="float-end">
                                            Tel: <b><?= $datas['tel'] ; ?></b><br>
                                            Signature / Empreinte digitale : <br>
                                        </div>
                                        <div class="float-end">
                                            <img src="<?= $datas['signaturePath'] ; ?>" style="width: 20%;" class="float-end img-thumbnail" alt="...">
                                        </div>
                                    </small>
                                </div>
                            </div>
                            <hr> 
                            <div class="row mb-2" style="margin-top: -6px">
                                <div class="col-8">
                                    <small>Immatriculation n° <?= $datas['cardNumber'] ; ?>/ <span class="text-danger" >ANO</span></small>
                                </div>
                                <div class="col-4">
                                    <img src="<?= $datas['qrcodepath'] ; ?>" alt="" srcset="" class="img-fluid img-thumbnail float-end" style="width: 30%;" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="text-center">
                <a class="btn btn-success" id="download" onclick="Submit();">Télécharger</a> <br>
                <span>Pour générer une nouvelle carte </span><a href="index.php">Retour au formulaire</a>
            </div>
            <br>
            
        </div>
    </div>
   
    <script>
        download = document.querySelector("#download");

        download.addEventListener("click", function(){
            html2canvas(document.querySelector("#idcard")).then(canvas =>{
                const url = canvas.toDataURL('image/png');
                const a = document.createElement('a');
                a.setAttribute('download', 'imageName.png');
                a.setAttribute('href', url);
                a.click();
            } );
        });
    </script>
    
   
</body>
</html>