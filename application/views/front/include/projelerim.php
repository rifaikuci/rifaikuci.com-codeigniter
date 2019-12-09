
  <!--/ Section Blog Star /-->

  <section id="projelerim" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h2 class="title-a">
              <a href="<?php echo base_url('anasayfa/projeler'); ?>">   Projelerim</a>
            </h2>

            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">


          <?php $anaproje=anaproje();
          foreach ($anaproje as $anaproje) {
           ?>
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="<?php echo base_url('anasayfa/projedetay/'); echo $anaproje['seobaslik']; ?>">
                <img src="<?php echo $anaproje['resim']?>" alt="<?php echo $anaproje['baslik']?>" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">

                  <?php $kategorilerliste=kategoriliste();
                  foreach ($kategorilerliste as $kategorilerliste) {
                    $yazdir="";
                    if($kategorilerliste['id']==$anaproje['idkategori'])
                    {
                      $yazdir=$kategorilerliste['ad'];
                      ?>



                  <h2 class="category"><?php echo $yazdir; ?></h2>
                <?php } ?>
                <?php } ?>
                </div>
              </div>
              <a href="<?php echo base_url('anasayfa/projedetay/'); echo $anaproje['seobaslik']; ?>">
              <h2 class="card-title"><?php echo word_limiter($anaproje['baslik'],3)?></h2></a>
              <p class="card-description">
                <?php echo word_limiter($anaproje['icerik'],13)?>
              </p>
            </div>
            <div class="card-footer">

              <div class="post-date">
                <span class="ion-ios-clock-outline"></span> <?php $tarih =$anaproje['tarih'];
                $tarih = explode(" ", $tarih);


                echo tarih($tarih[0]);

                 ?>


              </div>
            </div>

          </div>
        </div>
      <?php } ?>

      <?php $projelerim=projecek();  ?>




      </div>

      <?php if($projelerim>3)
      { ?>
      <div  class="" style="float:right;">
        <a href="<?php echo base_url('anasayfa/projeler'); ?>">
      <button style="margin-top:5px" class="button button-a button-medium button-rouded" > &nbsp;&nbsp;Daha Fazlası İçin&nbsp;&nbsp;</button>
</a>
    </div>
  <?php } ?>
    </div>
  </section>
  <!--/ Section Blog End /-->
