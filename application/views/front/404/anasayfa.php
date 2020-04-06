<!DOCTYPE html>
<html lang="en">

<?php if (@$_COOKIE['deneme']) {

    @$_COOKIE['deneme'];

} else {
    set_cookie('deneme', 'deneme', time()+3600);
    sayfahitarttir(sayfahitcek());
}


?>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="
    <?php echo base_url();
    echo icon(); ?>">
    <?php

    if (sitedurum() == 0) { ?>

        <img style="max-width: 100%;" src="<?php echo base_url('assets/front/img/build.jpg'); ?>"
             alt="Sayfamız Teknik sebeplerden dolayı bakımdadır.">
        <?php exit; ?>
    <?php } ?>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta conten="Rifai kuçi, Bilgisayar Mühendisliği, 400, Not foun, sayfa bulunamadı" name="keywords">

    <meta content="1997 Mardin doğumluyum 5 yaşından beri Fatih İstanbul'da yaşıyorum.
    2016 yılında Mehmet Akif Ersoy Üniversitesinde (MAKÜ) 
    Bilgisayar mühendisliği bölümüne başlayarak yeni bir serüvene başlamış oldum.
    Bu yeni serüvenle beraber artık gelişen teknolojilere ilgim arttı,
    okuduğum bölüm gereği de popüler olan uygulamalar ve araçları sadece kullanmak yerine acaba
    bunlar nasıl yapılıyor merakı başladı." name="description">

    <?php $this->load->view('front/include/style.php'); ?>

</head>

<body id="page-top">

<?php date_default_timezone_set("Europe/Istanbul") ?>

<title>Rifai Kuçi | 404 Not Found</title>

<?php $this->load->view('front/include/headerpage.php'); ?>

<body>

<?php $this->load->view('front/404/breadcrumb.php'); ?>

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

<?php $this->load->view('front/include/contact-footer.php') ?>


<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<?php $this->load->view('front/include/script.php') ?>

</body>
</html>
