<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $photo = $_POST['photo'];

   $path = "images/arkeologlar/$id.jpeg";
    $finalPath = "https://rifaikuci.com/dijitalArkeoloji/".$path;

    require_once 'connect.php';

    $sql = "UPDATE yoneticiler SET yFoto='$finalPath' WHERE yId='$id' ";

    if (mysqli_query($conn, $sql)) {

        if ( file_put_contents( $path, base64_decode($photo) ) ) {

            $result['success'] = "1";
            $result['message'] = "success";

            echo json_encode($result);
            mysqli_close($conn);

        }

    }

}

?>
