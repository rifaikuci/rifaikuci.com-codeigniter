<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];
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

    $path = "images/eserler/$id.jpeg";
    $finalPath = "https://rifaikuci.com/dijitalArkeoloji/".$path;
      $kontrol = true;
      $sql = "UPDATE eserler SET eRfid='$rfid', eEnvanter='$envanter', eBaslik='$title', eFoto='$finalPath', eBilgi='$bilgi', eKonum='$konum', eDurum='$durum' WHERE eId='$id' ";

    }
    else {

      $kontrol = false;
      $sql = "UPDATE eserler SET eRfid='$rfid', eEnvanter='$envanter', eBaslik='$title', eBilgi='$bilgi', eKonum='$konum', eDurum='$durum' WHERE eId='$id' ";

    }

    if(mysqli_query($conn, $sql)) {

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

          $response["success"] = true;
          $response["message"] = "successfully";

    }
    else{

       $response["success"] = false;
       $response["message"] = "Failure!";

    }
}
else{

   $response["success"] = false;
   $response["message"] = "Error!";

}

echo json_encode($response);

?>
