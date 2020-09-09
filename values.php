<?php
header("Content-type:application/json");

$dosya = fopen("values.txt", "r");

$icerik = fread($dosya, filesize('values.txt'));

$value = explode(",", $icerik);


fclose($dosya);

$response = array();


array_push($response,
    array(
        'p1' => intval($value[0]),
        'p2' => intval($value[1]),
        'p3' => intval($value[2]),
        'p4' => intval($value[3])
    )
);


echo json_encode($response);

?>