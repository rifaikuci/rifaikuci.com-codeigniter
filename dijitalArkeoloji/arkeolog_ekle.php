<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $durum = $_POST['durum'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    require_once 'connect.php';

    $query = "INSERT INTO arkeologlar (aName, aPhone, aEmail, aPassword, aStatus) VALUES ('$name', '$phone', '$email', '$password', '$durum')";

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

echo json_encode($response);

?>