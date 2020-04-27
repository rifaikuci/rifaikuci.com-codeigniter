
<?php


$conn = mysqli_connect("localhost", "root", "mardin47", "rifaikuc_rifaikuci");
$conn->set_charset("utf8");

echo   '<?xml version="1.0" encoding="UTF-8" ?>'  ;

echo   '
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';

 echo '
<url>
  <loc>https://rifaikuci.com/</loc>
  <lastmod>'.date("Y")."-".date("m")."-".date("d")."T".date("H:i:s").'+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>https://rifaikuci.com/anasayfa/hakkimda</loc>
  <lastmod>'.date("Y")."-".date("m")."-".date("d")."T".date("H:i:s").'+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://rifaikuci.com/anasayfa/projeler</loc>
  <lastmod>'.date("Y")."-".date("m")."-".date("d")."T".date("H:i:s").'+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://rifaikuci.com/anasayfa/yazilar</loc>
  <lastmod>'.date("Y")."-".date("m")."-".date("d")."T".date("H:i:s").'+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://rifaikuci.com/anasayfa/fereli</loc>
  <lastmod>'.date("Y")."-".date("m")."-".date("d")."T".date("H:i:s").'+00:00</lastmod>
  <priority>0.80</priority>
</url> 
<url>
  <loc>https://rifaikuci.com/anasayfa</loc>
  <lastmod>'.date("Y")."-".date("m")."-".date("d")."T".date("H:i:s").'+00:00</lastmod>
  <priority>0.64</priority>
</url>';  ?>

<?php

$sql = 'SELECT seobaslik,durum FROM tblprojeler where durum=1';
$result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
echo '<url>
    <loc>https://rifaikuci.com/anasayfa/projedetay/'.$row['seobaslik'].'</loc>
    <lastmod>'.date("Y")."-".date("m")."-".date("d")."T".date("H:i:s").'+00:00</lastmod>
    <priority>0.5000</priority>
</url>'; }


$sql1 = 'SELECT seobaslik,durum FROM tblyazilar where durum=1';
$result = mysqli_query($conn, $sql1);

while($row = mysqli_fetch_assoc($result)) {
    echo '
<url>
    <loc>https://rifaikuci.com/anasayfa/yazidetay/'.$row['seobaslik'].'</loc>
    <lastmod>'.date("Y")."-".date("m")."-".date("d")."T".date("H:i:s").'+00:00</lastmod>
    <priority>0.5000</priority>
</url>';}


$sql3 = 'SELECT seobaslik,durum FROM tblduyurular where durum=1';
$result = mysqli_query($conn, $sql3);

while($row = mysqli_fetch_assoc($result)) {

    echo '
<url>
     <loc>https://rifaikuci.com/anasayfa/ferelidetay/'.$row['seobaslik'].'</loc>
     <lastmod>'.date("Y")."-".date("m")."-".date("d")."T".date("H:i:s").'+00:00</lastmod>
     <priority>0.5000</priority>
</url>';
}
 ?>
    <?php
echo '

</urlset>
'
?>



