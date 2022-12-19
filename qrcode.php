<?php
require_once('databaseconnect.php');
require_once('phpqrcode/qrlib.php');
$path = 'images/';
$qrcode = $path.time(). ".png";
$qrimage = time(). ".png";

if(isset($_POST['submit'])) {

    $dateAdhesion = htmlentities($_POST['dateAdhesion']);
    $dateEnregistrement = date("Y-m-d H:i:s");
    $departement = htmlentities($_POST['departement']);
    $commune = htmlentities($_POST['commune']);
    $arrondissement = htmlentities($_POST['arrondissement']);
    $village = htmlentities($_POST['village']);
    $udoper = htmlentities($_POST['udoper']);
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $tel = htmlentities($_POST['tel']);
    $dateNaissance = htmlentities($_POST['dateNaissance']);
    $lieuNaissance = htmlentities($_POST['lieuNaissance']);
    $sexe = htmlentities($_POST['sexe']);
   // $tel = htmlentities($_POST['tel']);
    $idcard = htmlentities($_POST['idcard']);
    $numeroPiece = htmlentities($_POST['numeroPiece']);
    $dateExp = htmlentities($_POST['dateExp']);
    $ovins = htmlentities($_POST['ovins']);
    $bovins = htmlentities($_POST['bovins']);
    $caprins = htmlentities($_POST['caprins']);
    

    if(!empty($_FILES)) {
        $fileName = $_FILES['photo']['name'];
        $fileType = $_FILES['photo']['type'];
        $fileExtension = strrchr($fileName, ".");
        $fileDest = 'identitypics/' . date('Y-m-d H:i:s') . $fileName;
        $extensionAutorisées = array('.png', '.PNG', '.jpg', '.JPG', '.jpeg', 'JPEG');
        if(in_array($fileExtension, $extensionAutorisées)) {
            move_uploaded_file($_FILES['photo']['tmp_name'], $fileDest);
        }else{
            ?>

                <script>
                    alert("Seule les images sont autorisées.");
                </script>

            <?php
            header("Location: index.html"); 
        }
    }

    if(!empty($_FILES)) {
        $file2Name = $_FILES['signature']['name'];
        $file2Type = $_FILES['signature']['type'];
        $file2Extension = strrchr($file2Name, ".");
        $file2Dest = 'images/' . date('Y-m-d H:i:s') . $file2Name;
        $extensionAutorisées2 = array('.png', '.PNG', '.jpg', '.JPG', '.jpeg', 'JPEG');
        if(in_array($file2Extension, $extensionAutorisées2)) {
            move_uploaded_file($_FILES['signature']['tmp_name'], $file2Dest);
        }else{
            ?>

                <script>
                    alert("Seule les images sont autorisées.");
                </script>

            <?php
            header("Location: index.html"); 
        }
    }

    //$idPicsPath = "fn";
    $cardNumber = rand(00000000, 99999999);

    $cheickIfCardNumberIsUnique = $DB->query("SELECT * FROM datas WHERE cardNumber = ?",  array($cardNumber));
    $cheickIfCardNumberIsUnique = $cheickIfCardNumberIsUnique->rowCount();

    if($cheickIfCardNumberIsUnique === 1) {
        $cardNumber = rand(00000000, 99999999);
    }
    

   
    $datas = array(
        "dateAdhesion" => $dateAdhesion,
        "dateEnregistrement" => $dateEnregistrement,
        "departement" => $departement,
        "commune" => $commune,
        "arrondissement" => $arrondissement,
        "village" => $village,
        "udoper" => $udoper,
        "nom" => $nom,
        "prennom" => $prenom,
        "tel" => $tel,
        "dateNaissance" => $dateNaissance,
        "lieuNaissance" => $lieuNaissance,
        "sexe" => $sexe,
        "idcard" => $idcard,
        "numeroPiece" => $numeroPiece,
        "dateExp" => $dateExp,
        "idPicsPath" => $fileDest,
        "signaturePath" => $file2Dest,
        "cardNumber" => $cardNumber,
        //"photo" => $fileDest,
        "ovins" => $ovins,
        "bovins" => $bovins,
        "caprins" => $caprins,
    );

    $query = $DB->insert("INSERT INTO datas (dateAdhesion, departement, udoper, commune, arrondissement, village, nom, prenom, dateNaissance, lieuNaissance, sexe, tel, idcard, numeroPiece, dateExp, qrcodepath, idPicsPath, cardNumber, ovins, bovins, caprins, signaturePath) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
    array($dateAdhesion, $departement, $udoper, $commune, $arrondissement, $village, $nom, $prenom, $dateNaissance, $lieuNaissance, $sexe, $tel, $idcard, $numeroPiece, $dateExp, $qrcode, $fileDest, $cardNumber, $ovins, $bovins, $caprins, $file2Dest));
    

    if($query) {
        ?>

            <script>
                alert("Succès.");
            </script>

        <?php

        $comma_separated = implode(",", $datas);

        QRcode :: png($comma_separated, $qrcode, 'H', 4, 4);

        header("Location: success.php?cardid=$cardNumber");  

        //echo"<img src='" . $qrcode .  "'>";
    }else{
        ?>

            <script>
                alert("Erreur.");
            </script>

        <?php

    }
    //var_dump($datas);
}



