
<!DOCTYPE html>
<html lang="en">
<?php


$bak=sayfahitcek();




 ?>
<?php $this->load->view('front/include/headpagelisteleme.php'); ?>

<?php   $sayi= count($bilgi);
        if($sayi==0)
        {
        ?>
          <?php $this->load->view('front/include/headpage.php'); ?>
        <?php }else {
            $this->load->view('front/include/headpagelisteleme.php');
        } ?>
<body id="page-top">
    <?php date_default_timezone_set( "Europe/Istanbul" ) ?>

  <title>Rifai Kuçi | Fereli Sinan Efendi KYK</title>


<?php $this->load->view('front/include/headerpage.php'); ?>

<body>

  <!--/ Intro Skew Star /-->
  <?php $this->load->view('front/fereli/breadcrumb.php'); ?>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <?php   $sayi= count($bilgi);
        if($sayi==0)
        {
        ?>
          <?php $this->load->view('front/fereli/ferelibulunamadi.php'); ?>
        <?php }else {
            $this->load->view('front/fereli/ferelimliste.php');
        } ?>






        <div class="col-md-4">
          <?php $this->load->view('front/fereli/sonduyurular.php'); ?>

        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->

  <?php $this->load->view('front/include/contact-footer.php') ?>





    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>
  <?php $this->load->view('front/include/script.php') ?>

</body>
</html>
