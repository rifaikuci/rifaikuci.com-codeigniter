<!DOCTYPE html>
<html lang="en">
<?php

//gelen verinin sayısı
$sayi = count($bilgi);


$bak = sayfahitcek();

if (@$_COOKIE['deneme']) {
    @$_COOKIE['deneme'];
} else {
    set_cookie('deneme', 'deneme', time());
    sayfahitarttir($bak);
} ?>


<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png"
          href="<?php echo base_url();
          echo icon(); ?>">

    <?php if (sitedurum() == 0) { ?>

        <img style="max-width: 100%;" src="<?php echo base_url('assets/front/img/build.jpg'); ?>"
             alt="Sayfamız Teknik sebeplerden dolayı bakımdadır.">
        <?php exit; ?>
    <?php } ?>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php if ($sayi == 0) { ?>
        <meta conten="Rifai kuçi , Bilgisayar Mühendisliği" name="keywords">
        <meta content="Yazılım Tutkusu Bilgisayar Mühendisi Rifai Kuçi. Hakkımda daha fazla bilgiyi web sayfamda bulabilirsiniz."
              name="description">

    <?php } else {
        // description ve keywords yazdırma seo ayaları
        $aciklama = "";
        $keywords = "";

        foreach ($bilgi as $bilgi) {
            $aciklama = $aciklama . " " . $bilgi['aciklama'];
            $keywords = $keywords . " " . $bilgi['keywords'];
        } ?>

        <meta conten="<?php echo $keywords ?>" name="keywords">
        <meta content="<?php echo $aciklama ?>" name="description">
    <?php } ?>
    <?php $this->load->view('front/include/style.php'); ?>
</head>

<body id="page-top">
<?php date_default_timezone_set("Europe/Istanbul") ?>
<?php $this->load->view('front/include/headerpage.php'); ?>

<title>Rifai Kuçi | Projelerim</title>

<body>

<?php $this->load->view('front/projeler/breadcrumb.php'); ?>
<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
        <div class="row">

            <?php $this->load->view('front/projeler/projelerimliste.php'); ?>

            <div class="col-md-4">
                <?php $this->load->view('front/include/search.php'); ?>
                <?php $this->load->view('front/include/cokokunansidebar.php'); ?>
                <?php $this->load->view('front/include/sonyazilarsidebar.php'); ?>
                <?php $sayi = count($bilgi);

                if ($sayi == 0) {
                    ?>
                    <?php $this->load->view('front/hakkimda/keywords.php'); ?>
                <?php } else {
                    $this->load->view('front/projeler/keywords.php');
                } ?>

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
