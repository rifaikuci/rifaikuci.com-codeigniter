<?php




if($_SERVER['REQUEST_METHOD'] ==  'POST'){
    require_once("connect.php");
    $adSoyad      =  $_POST['adSoyad'];
    $odaNumara   =  $_POST['odaNumara'];
    $mail  =  $_POST['mail'];
    $tur        =  $_POST['tur'];
    $istek   =  $_POST['istek']; //Resmin yolu post işlemi ile alındı

    if($tur =="Dilek"){$turDurum =1; }
    else{ $turDurum =0;}




    $query = "INSERT INTO tblistekler (adSoyad,odaNumara,mail,tur,istek) VALUES ('$adSoyad','$odaNumara','$mail','$turDurum','$istek')";


    if (mysqli_query($conn, $query)){


        $response['success']  = true;
        $response['message']  = "Successfully";

    }else{
        $response['success']  = false;
        $response['message']  = "Failure";
    }
}else{
    $response['success']  = false;
    $response['message']  = "Error!";
}
echo json_encode($response);
?>