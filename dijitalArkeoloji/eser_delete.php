<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];

    require_once 'connect.php';

    $sql = "DELETE FROM eserler WHERE eId='$id' ";

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


