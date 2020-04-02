
<!DOCTYPE html>
<html lang="en">
<?php


$bak=sayfahitcek();



if(@$_COOKIE[ 'deneme'])
{
 @$_COOKIE[ 'deneme'];
}
else {
set_cookie( 'deneme','deneme',time(15));
sayfahitarttir($bak);

}


 ?>
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
    <?php date_default_timezone_set( "Europe/Istanbul" ) ?>

  <title>Rifai Kuçi | 404 Not Found</title>


<?php $this->load->view('front/include/headerpage.php'); ?>

<body>

  <!--/ Intro Skew Star /-->
  <?php $this->load->view('front/404/breadcrumb.php'); ?>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">

          <?php $this->load->view('front/404/notfound.php'); ?>







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


z


    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>
  <?php $this->load->view('front/include/script.php') ?>

</body>
</html>
