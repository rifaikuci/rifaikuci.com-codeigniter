<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $lgnRfid = $_POST['lgnRfid'];
    $lgnRfid2 = $_POST['lgnRfid2'];

    require_once 'connect.php';

    $sqly = "SELECT * FROM yoneticiler WHERE yRfid='$lgnRfid' ";
    $sqla = "SELECT * FROM arkeologlar WHERE aRfid='$lgnRfid' ";

    $responsey = mysqli_query($conn, $sqly);
    $responsea = mysqli_query($conn, $sqla);

    $result = array();
    $result['login'] = array();
    
    if ( mysqli_num_rows($responsey) === 1 ) {
        
        $row = mysqli_fetch_assoc($responsey);

        if ( $lgnRfid == $row['yRfid'] ) {
            
            $index['yName'] = $row['yName'];
            $index['yEmail'] = $row['yEmail'];
            $index['yId'] = $row['yId'];

            array_push($result['login'], $index);

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
    elseif(mysqli_num_rows($responsea) === 1) {

        $row = mysqli_fetch_assoc($responsea);

        if ($lgnRfid == $row['aRfid'] ) {
            
            $index['name'] = $row['aName'];
            $index['email'] = $row['aEmail'];
            $index['id'] = $row['aId'];

            array_push($result['login'], $index);

            $result['success'] = "2";
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

}

?>