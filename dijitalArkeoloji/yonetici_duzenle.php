<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    require_once 'connect.php';

    if (1<strlen($password)) {

      $password = password_hash($password, PASSWORD_DEFAULT);
      
      $sql = "UPDATE yoneticiler SET yName='$name', yEmail='$email', yPassword='$password' WHERE yId='$id' ";

    }
    else {

      $sql = "UPDATE yoneticiler SET yName='$name', yEmail='$email' WHERE yId='$id' ";
      
    }

    if(mysqli_query($conn, $sql)) {

          $result["success"] = "1";
          $result["message"] = "success";

          echo json_encode($result);
          mysqli_close($conn);
      }
  }

else{

   $result["success"] = "0";
   $result["message"] = "error!";
   echo json_encode($result);

   mysqli_close($conn);
}

?>


