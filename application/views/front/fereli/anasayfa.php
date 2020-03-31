
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('front/include/headpagelisteleme.php'); ?>

<?php   $sayi= count($bilgi);
        if($sayi==0) {?>

        <?php $this->load->view('front/include/headpage.php'); }

        else {$this->load->view('front/include/headpagelisteleme.php');} ?>

<body id="page-top">
    <?php date_default_timezone_set( "Europe/Istanbul" ) ?>

  <title>Rifai Kuçi | Fereli Sinan Efendi KYK</title>


<?php $this->load->view('front/include/headerpage.php'); ?>


  <!--/ Intro Skew Star /-->
  <?php $this->load->view('front/fereli/breadcrumb.php'); ?>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">

        <?php $this->load->view('front/fereli/ferelimliste.php'); ?>

        <div class="col-md-4">

          <?php $this->load->view('front/fereli/sonduyurular.php'); ?>

        </div>
      </div>
    </div>
  </section>

  <?php $this->load->view('front/fereli/fereli-contact-footer.php') ?>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

  <?php $this->load->view('front/include/script.php') ?>

</body>
</html>
