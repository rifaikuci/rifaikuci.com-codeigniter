
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <?php $icon=icon();?>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); echo $icon; ?>">
    <?php
    $sitedurum=sitedurum();
    if($sitedurum==0)
    {?>

        <img style="max-width: 100%;"  src="<?php echo base_url('assets/front/img/build.jpg'); ?>" alt="Sayfamız Teknik sebeplerden dolayı bakımdadır.">
        <?php exit; ?>
    <?php }?>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta conten="Rifai kuçi , Bilgisayar Mühendisliği" name="keywords">
    <meta content="Yazılım Tutkusu Bilgisayar Mühendisi Rifai Kuçi. Hakkımda daha fazla bilgiyi web sayfamda bulabilirsiniz." name="description">
    <?php $this->load->view('front/include/style.php'); ?>

</head>

<body id="page-top">

    <title><?php echo $bilgi['baslik']; ?></title>
      <?php date_default_timezone_set( "Europe/Istanbul" ) ?>
  <?php $this->load->view('front/include/headerpage.php'); ?>

  <?php $this->load->view('front/arama/detay/breadcrumb.php'); ?>

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">

        <?php $this->load->view('front/arama/detay/icerik.php'); ?>


        <div class="col-md-4">

          <?php $this->load->view('front/include/search.php'); ?>
          <?php $this->load->view('front/include/cokokunansidebar.php'); ?>
          <?php $this->load->view('front/include/sonyazilarsidebar.php'); ?>
          <?php $this->load->view('front/arama/detay/keywords.php'); ?>
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
