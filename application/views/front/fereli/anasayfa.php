
<!DOCTYPE html>
<html lang="en">


<?php   $sayi= count($bilgi);
        if($sayi==0) {?>
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

        <?php }

        else {?>
            <head>
                <meta charset="utf-8">
                <?php $icon=icon();?>
                <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); echo $icon; ?>">
                <?php
                $sitedurum=sitedurum();
                if($sitedurum==0)
                {?>

                    <img style="max-width: 100%;"  src="<?php echo base_url('assets/front/img/build.jpg'); ?>" alt="">
                    <?php exit; ?>
                <?php }?>
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <meta content="
        <?php $etiketler=etiketproje(); ?>
      <?php foreach ($etiketler as $etiketler){



                    echo $etiketler['keywords'];
                    echo ",";


                } ?>
  " name="keywords">
                <meta content="Yazılım Tutkusu Bilgisayar Mühendisi Rifai Kuçi. Hakkımda daha fazla bilgiyi web sayfamda bulabilirsiniz." name="description">
                <?php $this->load->view('front/include/style.php'); ?>

            </head>

              <?php } ?>

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
