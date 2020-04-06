<!DOCTYPE html>
<html lang="en">

<?php $sayi = count($bilgi); ?>

<head>
    <meta charset="utf-8">

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();
    echo icon(); ?>">


    <?php if (sitedurum() == 0) { ?>

        <img style="max-width: 100%;" src="<?php echo base_url('assets/front/img/build.jpg'); ?>" alt="">
        <?php exit; ?>
    <?php } ?>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Korona,Burdur, KYK, Fereli Sinan Efendi, Karantina
       <?php $etiketler = etiketproje(); ?>

      <?php foreach ($etiketler as $etiketler) {

        echo $etiketler['keywords'] . ",";
    } ?>"

          name="keywords">

    <meta content="Yazılım Tutkusu Bilgisayar Mühendisi Rifai Kuçi. Hakkımda daha fazla bilgiyi web sayfamda bulabilirsiniz.
                    Fereli sinan efendi yurdu kyk Burdur COVID-19 KORONAi Türkiye" name="description">

    <?php $this->load->view('front/include/style.php'); ?>

</head>

<body id="page-top">
<?php date_default_timezone_set("Europe/Istanbul") ?>

<title>Rifai Kuçi | Fereli Sinan Efendi KYK</title>

<?php $this->load->view('front/include/headerpage.php'); ?>
<?php $this->load->view('front/fereli/breadcrumb.php'); ?>

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
