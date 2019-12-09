<head>
  <meta charset="utf-8">

  <?php $icon=icon();?>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); echo $icon; ?>">
  <?php
  $sitedurum=sitedurum();
  if($sitedurum==0)
  {?>

  <img style="max-width: 100%;"  src="<?php echo base_url('assets/front/img/build.jpg'); ?>" alt="Sayfamız Teknik nedenlerden dolayı bakımdadır">
  <?php exit; ?>
  <?php }?>


  <?php $anaayar=anaayar(); ?>
  <?php

  foreach ($anaayar as  $anaayar) {
  ?>
  <title><?php echo $anaayar['title']; ?></title>
<?php } ?>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Rifai Kuçi, Bilgisayar Mühendisliği" name="keywords">
  <meta content="Yazılım Tutkusu Bilgisayar Mühendisi Rifai Kuçi. Hakkımda daha fazla bilgiyi web sayfamda bulabilirsiniz." name="description">
  <?php $this->load->view('front/include/style.php'); ?>
  <meta name="google-site-verification" content="aEb-JuD7eH7RyvF6M2xoUCtpliT3chNREOWCWYJNoik" />

</head>
