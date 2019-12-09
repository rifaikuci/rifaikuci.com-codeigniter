
<!DOCTYPE html>
<html lang="en">

<?php



$bak=sayfahitcek();






 ?>



<?php $this->load->view('front/include/head.php'); ?>
<body id="page-top">
    <?php date_default_timezone_set( "Europe/Istanbul" ) ?>
<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/intro.php'); ?>
<?php $this->load->view('front/include/hakkimda.php'); ?>
<?php $projesayi=projecek();

  if($projesayi==0)
{
?>

<?php $this->load->view('front/include/projelerim0.php') ?>
<?php }else {?>
  <?php $this->load->view('front/include/projelerim.php')?>
<?php } ?>

  <?php $yazisayi=yazicek();

    if($yazisayi==0)
  {
  ?>

  <?php $this->load->view('front/include/yazilar0.php') ?>
  <?php }else {?>
    <?php $this->load->view('front/include/yazilar.php') ?>

  <?php } ?>
<?php $this->load->view('front/include/gununsozu.php') ?>

<?php if($yazisayi!=0 || $projesayi!=0)
{
?>
<?php $this->load->view('front/include/sonyazilar.php') ?>
<?php } ?>
<?php $this->load->view('front/include/contact-footer.php') ?>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
<?php $this->load->view('front/include/script.php') ?>

</body>
</html>
