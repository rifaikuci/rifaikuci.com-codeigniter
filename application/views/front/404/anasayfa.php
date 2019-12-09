
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
<?php $this->load->view('front/include/headpage.php'); ?>
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
