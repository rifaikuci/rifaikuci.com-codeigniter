<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta charset="UTF-8"/>
<?php $icon=icon();?>
<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); echo $icon; ?>">
 <meta content="Developer, Rifai Kuçi, Rifai,Kuçi,Mardin,RifaiKuçi,rifai47
  ,Mobil geliştiricisi,Web Geliştiricisi,bilgisayar mühendisliği, mehmet akif ersoy üniversitesi ,makü , burdur , istanbul,fatih, istanbul anadolu imam hatip lisesi, iskenderpaşa ,
  ardunio,pic programlama , javascript, Mobile Application, Web Developlement, Development, Computer, Engineering,
  <?php $key=keywords(); ?>
  <?php foreach ($key as $key ): ?>
    <?php echo $key['baslik']; echo ","; ?>
  <?php endforeach; ?> " name="keywords">
  <meta content="Yazılım Tutkusu Bilgisayar Mühendisi Rifai Kuçi. Hakkımda daha fazla bilgiyi web sayfamda bulabilirsiniz." name="description">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php $this->load->view('back/include/style'); ?>
