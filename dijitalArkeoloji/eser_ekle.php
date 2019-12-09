<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $photo = $_POST['photo'];
    $title = $_POST['title'];
    $rfid = $_POST['rfid'];
    $envanter = $_POST['envanter'];
    $bilgi = $_POST['bilgi'];
    $konum = $_POST['konum'];
    $durum = $_POST['durum'];
    $kontrol = true;

    $yeniad = substr(uniqid(md5(rand())),0,35);

    require_once 'connect.php';

    if (1<strlen($photo)) {


      $path = "images/eserler/$yeniad.jpeg";
      $finalPath = "https://rifaikuci.com/dijitalArkeoloji/".$path;

     
      $kontrol = true;
      $query = "INSERT INTO eserler (eRfid, eEnvanter, eBaslik, eFoto, eBilgi, eKonum, eDurum) VALUES ('$rfid', '$envanter', '$title', '$finalPath', '$bilgi', '$konum', '$durum')";

    }
    else {

      $kontrol = false;
      $query = "INSERT INTO eserler (eRfid, eEnvanter, eBaslik, eBilgi, eKonum, eDurum) VALUES ('$rfid', '$envanter', '$title', '$bilgi', '$konum', '$durum')";

    }

    if ( mysqli_query($conn, $query) ) {

        if ($kontrol==true) {

            if ( file_put_contents( $path, base64_decode($photo) ) ) {

              $response["success"] = true;
              $response["message"] = "successfully";

            }
            else {

              $response["success"] = false;
              $response["message"] = "Failure!";

            }

        }

        $response["success"] = "true";
        $response["message"] = "Successfully";

    }else {

        $response["success"] = "false";
        $response["message"] = "Failure";

    }
} else {

    $response["success"] = "false";
    $response["message"] = "Error!";

}

echo json_encode($response);

?>
