<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors", 1);

	header("Content-type:application/json");

	require_once('connect.php');

	$query = mysqli_query($conn, "SELECT * FROM kazilar ORDER BY kId DESC");

	$response = array();

	while ($row = mysqli_fetch_assoc($query)) {
		
		array_push($response,
			array(
				'id'	=>$row['kId'],
				'title'	=>$row['kAdi'],
				'adres'	=>$row['kAdres'],
				'dateStart'	=>tarih($row['kBasTarih']),
				'dateEnd'	=>tarih($row['kBitTarih']),
				'color'	=>$row['kColor'],
				'durum'	=>$row['kDurum'])
		);

	}

	function tarih($tarih){
        $trh=substr($tarih,0,10);
        $tr=explode("-", $trh);
        $tarih=$tr[2]."-".$tr[1]."-".$tr[0];

        return $tarih;
    }

	echo json_encode($response);

?>