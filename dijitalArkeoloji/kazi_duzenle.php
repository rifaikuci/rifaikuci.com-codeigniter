<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];
    $title = $_POST['title'];
    $adres = $_POST['adres'];
    $dateStart = tarih($_POST['dateStart']);
    $dateEnd = tarih($_POST['dateEnd']);
    $durum = $_POST['durum'];

    require_once 'connect.php';

    $sql = "UPDATE kazilar SET kAdi='$title', kAdres='$adres', kBasTarih='$dateStart', kBitTarih='$dateEnd', kDurum='$durum' WHERE kId='$id' ";

    if(mysqli_query($conn, $sql)) {

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

function tarih($tarih){
    $trh=substr($tarih,0,10);
    $tr=explode("-", $trh);
    $tarih=$tr[2]."-".$tr[1]."-".$tr[0];

    return $tarih;
}

echo json_encode($response);

?>


