
<!DOCTYPE html>
<html lang="en">

<?php


$bak=sayfahitcek();




 ?>
  <?php $this->load->view('front/include/headpagedetay.php'); ?>
  <body id="page-top">
      <?php date_default_timezone_set( "Europe/Istanbul" ) ?>

      <title><?php echo $bilgi['baslik']; ?></title>
  <?php $this->load->view('front/include/headerpage.php'); ?>

  <?php $this->load->view('front/yazilar/detay/breadcrumb.php'); ?>

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">

        <?php $this->load->view('front/yazilar/detay/icerik.php'); ?>


        <div class="col-md-4">

          <?php $this->load->view('front/include/search.php'); ?>
          <?php $this->load->view('front/include/cokokunansidebar.php'); ?>
          <?php $this->load->view('front/include/sonyazilarsidebar.php'); ?>
          <?php $this->load->view('front/yazilar/detay/keywords.php'); ?>
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
