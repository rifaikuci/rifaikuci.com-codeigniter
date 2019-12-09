<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $title = $_POST['title'];
    $adres = $_POST['adres'];
    $dateStart = tarih($_POST['dateStart']);
    $dateEnd = tarih($_POST['dateEnd']);
    $durum = $_POST['durum'];

    require_once 'connect.php';

    $query = "INSERT INTO kazilar (kAdi, kAdres, kBasTarih, kBitTarih, kDurum) VALUES ('$title', '$adres', '$dateStart', '$dateEnd', '$durum')";

    if ( mysqli_query($conn, $query) ) {

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

function tarih($tarih){
    $trh=substr($tarih,0,10);
    $tr=explode("-", $trh);
    $tarih=$tr[2]."-".$tr[1]."-".$tr[0];

    return $tarih;
}

echo json_encode($response);

?>