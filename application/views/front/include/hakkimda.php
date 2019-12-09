<section id="hakkimda" class="about-mf sect-pt4 route">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="box-shadow-full">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-sm-6 col-md-5">
                  <div class="about-img">

                    <?php $siteayar=siteayar(); ?>
                    <?php

                    foreach ($siteayar as  $siteayar) {
                    ?>
                    <img width="150" height="150" alt="<?php echo $siteayar['adsoyad'];?>"  src="<?php echo $siteayar['resim'];?>" class="img-fluid rounded b-shadow-a" alt="">
                  </div>
                </div>
                <div class="col-sm-6 col-md-7">
                  <div class="about-info">
                    <p><span class="title-s">Ad Soyad: </span> <span><?php echo $siteayar['adsoyad'];?></span></p>
                    <p><span class="title-s">Bölüm: </span> <span><?php echo $siteayar['ozellik'];?></span></p>
                  <p><span class="title-s">Email: </span>  <a href="mailto:rfai0747@gmail.com?Subject=rifaikuci.com%20Adresinden" target="_top"> <span><?php echo $siteayar['mail'];?></span></a></p>
                    
                  </div>
                </div>
              </div>
            <?php $this->load->view('front/include/ozellik.php'); ?>
            </div>
            <div class="col-md-6">
              <div class="about-me pt-4 pt-md-0">
                <div class="title-box-2">
                  <h1 class="title-left">
                      <a href="<?php echo base_url('anasayfa/hakkimda'); ?>">
                    Hakkımda
                    </a>
                  </h1>
                </div>
                <p class="lead">

          <?php echo $siteayar['hakkimda']; ?>

                </p>
                <?php } ?>


              </div>
                <div class="" style="float:right">
                  <a href="<?php echo base_url('anasayfa/hakkimda'); ?>">
                <button type="submit" class="button button-a button-medium button-rouded" > &nbsp;&nbsp;Devamı&nbsp;&nbsp;</button>
                    </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
