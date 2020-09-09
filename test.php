<?php
$p1 = rand(0, 1);
$p2 = rand(0, 1);
$p3 = rand(0, 1);
$p4 = rand(0, 1);


$dosya = fopen("values.txt", "w");
$value = $p1 . "," . $p2 . "," . $p3 . "," . $p4;
fwrite($dosya, $value);
fclose($dosya);

?>
