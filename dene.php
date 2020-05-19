<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $turAd = $_POST['turAd'];
    $turDetay = $_POST['turDetay'];
    $turEnlem = $_POST['turEnlem'];
    $turBoylam = $_POST['turBoylam'];
    $paylasanKullanici = $_POST['paylasanKullanici'];
    $tur = $_POST['tur'];
    $durum = $_POST['durum'];
    $idKullanici = $_POST['idKullanici'];
    $turResim = $_POST['turResim']; //Resmin yolu post işlemi ile alındı

    require_once("connect.php");

    $query = "SELECT turResim FROM turler where id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $silResimDizi = explode("/", $row['turResim']);
    $silResim = $silResimDizi[count($silResimDizi) - 3] . "/" .
        $silResimDizi[count($silResimDizi) - 2] . "/" .
        $silResimDizi[count($silResimDizi) - 1];

    if ($durum == "Aktif") {
        $turDurum = 1;
        if ($turResim != "") {

            $idPhoto = md5(uniqid());
            $kaydet = "https://rifaikuci.com/lisans/images/kesfet/$idPhoto.jpg";
            $upload_paths_kesfet = "images/kesfet/$idPhoto.jpg";

            file_put_contents($upload_paths_kesfet, base64_decode($turResim));

        } else {

            file_put_contents('images/kesfet/' . $silResimDizi[count($silResimDizi) - 1], file_get_contents($row['turResim']));
            $kaydet = "https://rifaikuci.com/lisans/images/kesfet/" . $silResimDizi[count($silResimDizi) - 1];
        }

        $query_kesfet = "INSERT INTO kesfet (turAd,turDetay,turResim,turEnlem,turBoylam,tur,durum,paylasanKullanici) VALUES ('$turAd','$turDetay','$kaydet','$turEnlem','$turBoylam','$tur','0','$paylasanKullanici')";

        if (mysqli_query($conn, $query_kesfet)) {

            $response['success'] = true;
            $response['message'] = "Successfully";

        } else {
            $response['success'] = false;
            $response['message'] = "Error!";
        }
    } else {
        $turDurum = 0;
    }

    if ($turResim != "") {

        $idPhoto = md5(uniqid());
        $upload_paths = "https://rifaikuci.com/lisans/images/turler/$idPhoto.jpg";
        $upload_path = "images/turler/$idPhoto.jpg";
        $query = "UPDATE turler  SET  turAd='$turAd',turDetay='$turDetay', tur='$tur',durum='$turDurum',turResim='$upload_paths'  WHERE id='$id' ";

    } else {
        $query = "UPDATE turler  SET  turAd='$turAd',turDetay='$turDetay', tur='$tur',durum='$turDurum'  WHERE id='$id' ";
    }

    if (mysqli_query($conn, $query)) {

        if ($turResim != "") {

            unlink($silResim);
            if (file_put_contents($upload_path, base64_decode($turResim))) {

                $response['success'] = true;
                $response['message'] = "Successfully";
            }
        }
        $response['success'] = true;
        $response['message'] = "Successfully";

    } else {
        $response['success'] = false;
        $response['message'] = "Failure";
    }
} else {
    $response['success'] = false;
    $response['message'] = "Error!";
}
echo json_encode($response);
?>