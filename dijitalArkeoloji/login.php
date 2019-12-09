<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'connect.php';

    $sqly = "SELECT * FROM yoneticiler WHERE yEmail='$email' ";
    $sqla = "SELECT * FROM arkeologlar WHERE aEmail='$email' AND aStatus=1 ";

    $responsey = mysqli_query($conn, $sqly);
    $responsea = mysqli_query($conn, $sqla);

    $result = array();
    $result['login'] = array();
    
    if ( mysqli_num_rows($responsey) === 1 ) {
        
        $row = mysqli_fetch_assoc($responsey);

        if ( password_verify($password, $row['yPassword']) ) {
            
            $index['name'] = $row['yName'];
            $index['email'] = $row['yEmail'];
            $index['id'] = $row['yId'];

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
    elseif ( mysqli_num_rows($responsea) === 1 ) {
        
        $row = mysqli_fetch_assoc($responsea);

        if ( password_verify($password, $row['aPassword']) ) {
            
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