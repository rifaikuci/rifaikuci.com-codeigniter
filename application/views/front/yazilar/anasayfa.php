
<!DOCTYPE html>
<html lang="en">
<?php


$bak=sayfahitcek();




 ?>
<?php $this->load->view('front/include/headpagelisteleme.php'); ?>
<body id="page-top">
    <?php date_default_timezone_set( "Europe/Istanbul" ) ?>
<?php $this->load->view('front/include/headerpage.php'); ?>


<title>Rifai Kuçi | Yazılarım</title>


<body>

  <!--/ Intro Skew Star /-->
  <?php $this->load->view('front/yazilar/breadcrumb.php'); ?>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <?php   $sayi= count($bilgi);
        if($sayi==0)
        {
        ?>
          <?php $this->load->view('front/yazilar/yazibulunamadi.php'); ?>
        <?php }else {
            $this->load->view('front/yazilar/yazilarimliste.php');
        } ?>






        <div class="col-md-4">
          <?php $this->load->view('front/include/search.php'); ?>
          <?php $this->load->view('front/include/cokokunansidebar.php'); ?>
          <?php $this->load->view('front/include/sonyazilarsidebar.php'); ?>
          <?php   $sayi= count($bilgi);
          if($sayi==0)
          {
          ?>
            <?php $this->load->view('front/hakkimda/keywords.php'); ?>
          <?php }else {
              $this->load->view('front/yazilar/keywords.php');
          } ?>



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
