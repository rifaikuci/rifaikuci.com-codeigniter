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