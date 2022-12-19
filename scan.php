<?php

departement = '$departement', 
commune = '$commune', 
arrondissement = '$arrondissement', 
village = '$village', 
nom = '$nom', 
prenom = '$prenom', 

dateNaissance = '$dateNaissance', 
    lieuNaissance = '$lieuNaissance', 
    sexe = '$sexe', 
    tel = '$tel', 
    idcard = '$idcard', 
    numeroPiece = '$numeroPiece', 
    dateExp = '$dateExp', 
    qrcodepath = '$qrimage', 
    idPicsPath = '$idPicsPath', 
    cardNumber = '$cardNumber'

$msg = "";

if(isset($_POST['submit'])) {
    //echo '<pre>';
    //var_dump($_FILES);
    //die;

   $fileName = $_FILES['picture']['name'];
   $fileType = $_FILES['picture']['type'];
   $fileTmp = $_FILES['picture']['tmp_name'];
   $fileSize = $_FILES['picture']['size'];

   $fileType = explode("/", $fileType);

   if($fileType[0] !== "image") {
        $msg = "Le type de fichier est invalide: " . $fileType[1];
   }elseif($fileSize > 5242880) {
        $msg = "Le fichier ne doit pas dépasser 5 MB";
   }else{
        $newfilename = md5(rand() . time()) . $fileName;
        move_uploaded_file($fileTmp, "scannedqr/" . $newfilename);
   }

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="container mt-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-xl-4">
                    <a class="" href="index.html">Revenir au formulaire</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card rounded">
                  <div class="card-body">
                    <h5 class="card-title">
                        <div class="container text-center mt-4">
                            <h2>Uploader un code QR pour <br>le scanner:</h2>
                        </div>
                    </h5>
                    <p class="card-text">
                    <div class="container">
                        <div class="text-danger">
                            <?= $msg; ?>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data" >
                            <div class="mb-3">
                                <label for="picture" class="form-label">Choisissez un fichier </label>
                                <input type="file" name="picture" accept="image/*" class="form-control" id="">
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Scanner le code QR</button>
                        </form>
                    </div>
                    </p>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>