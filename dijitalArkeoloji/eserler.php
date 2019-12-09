<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors", 1);

	header("Content-type:application/json");

	require_once('connect.php');

	$query = mysqli_query($conn, "SELECT * FROM eserler ORDER BY eId DESC");

	$response = array();

	while ($row = mysqli_fetch_assoc($query)) {
		
		array_push($response,
			array(
				'id'	=>$row['eId'],
				'photo'	=>$row['eFoto'],
				'title'	=>$row['eBaslik'],
				'rfid'	=>$row['eRfid'],
				'envanter'	=>$row['eEnvanter'],
				'bilgi'	=>$row['eBilgi'],
				'konum'	=>$row['eKonum'],
				'date'	=>tarih($row['eKayitTarih']),
				'color'	=>$row['eColor'],
				'durum'	=>$row['eDurum'])
		);

	}

	function tarih($tarih){
        $trh=substr($tarih,0,10);
        $tr=explode("-", $trh);
        $tarih1=$tr[2]."/".$tr[1]."/".$tr[0];

        $saat=substr($tarih,11,5);

        $tarih2=$tarih1." ".$saat;

        return $tarih2;
    }

	echo json_encode($response);

?>