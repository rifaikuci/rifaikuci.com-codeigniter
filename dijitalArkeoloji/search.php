<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $qrCode = $_POST['qrCode'];

    require_once 'connect.php';

    $sql = "SELECT * FROM eserler WHERE eRfid='$qrCode' and eDurum=1 ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['bilgi'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response);

        if ( $qrCode == $row['eRfid'] ) {
            
            $index['baslik'] = $row['eBaslik'];
            $index['foto'] = $row['eFoto'];
            $index['bilgi'] = $row['eBilgi'];

            array_push($result['bilgi'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($conn);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

            mysqli_close($conn);

        }

    }
    else {

        $result['success'] = "0";
        $result['message'] = "error";
        echo json_encode($result);

        mysqli_close($conn);

    }

}

?>