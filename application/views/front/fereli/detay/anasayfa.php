
<!DOCTYPE html>
<html lang="en">


  <?php $this->load->view('front/include/headpagedetay.php'); ?>
  <body id="page-top">

      <title><?php  echo $bilgi['duyuruBaslik']; ?></title>
      <?php date_default_timezone_set( "Europe/Istanbul" ) ?>
  <?php $this->load->view('front/include/headerpage.php'); ?>

  <?php $this->load->view('front/fereli/detay/breadcrumb.php'); ?>

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">

        <?php $this->load->view('front/fereli/detay/icerik.php'); ?>


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
