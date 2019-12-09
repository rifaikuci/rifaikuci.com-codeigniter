
<!DOCTYPE html>
<html lang="en">
<?php


$bak=sayfahitcek();





 ?>



  <?php $this->load->view('front/include/headpage.php'); ?>
  <body id="page-top">
    <title>Rifai Kuçi | Hakkımda</title>
      <?php date_default_timezone_set( "Europe/Istanbul" ) ?>
  <?php $this->load->view('front/include/headerpage.php'); ?>

  <?php $this->load->view('front/hakkimda/breadcrumb.php'); ?>

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">

        <?php $this->load->view('front/hakkimda/detay.php'); ?>


        <div class="col-md-4">

          <?php $this->load->view('front/include/search.php'); ?>
          <?php $this->load->view('front/include/cokokunansidebar.php'); ?>
          <?php $this->load->view('front/include/sonyazilarsidebar.php'); ?>
    
          <?php $this->load->view('front/hakkimda/keywords.php'); ?>
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
