<!DOCTYPE html>
<html lang="en">

<?php $bak = sayfahitcek();
sayfahitarttir($bak);

?>

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png"
          href="<?php echo base_url();
          echo icon(); ?>">

    <?php if (sitedurum() == 0) { ?>
        <img style="max-width: 100%;" src="<?php echo base_url('assets/front/img/build.jpg'); ?>" alt="">
        <?php exit; ?>
    <?php } ?>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="<?php echo $bilgi['keywords']; ?>" name="keywords">
    <meta content="<?php echo $bilgi['aciklama']; ?>" name="description">

    <?php $this->load->view('front/include/style.php'); ?>
</head>

<body id="page-top">

<?php date_default_timezone_set("Europe/Istanbul") ?>

<title><?php echo $bilgi['baslik']; ?></title>

<?php $this->load->view('front/include/headerpage.php'); ?>
<?php $this->load->view('front/yazilar/detay/breadcrumb.php'); ?>

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


<?php $this->load->view('front/include/contact-footer.php') ?>


<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>
<?php $this->load->view('front/include/script.php') ?>

</body>
</html>
