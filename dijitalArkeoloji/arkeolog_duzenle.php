<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $durum = $_POST['durum'];

    if (1<strlen($password)) {

      $password = password_hash($password, PASSWORD_DEFAULT);
      
      $sql = "UPDATE arkeologlar SET aName='$name', aPhone='$phone', aEmail='$email', aPassword='$password', aStatus='$durum' WHERE aId='$id' ";

    }
    else {

      $sql = "UPDATE arkeologlar SET aName='$name', aPhone='$phone', aEmail='$email', aStatus='$durum' WHERE aId='$id' ";
      
    }

    require_once 'connect.php';

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

echo json_encode($response);

?>


