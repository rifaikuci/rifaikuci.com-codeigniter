

<div class="col-md-8">
<?php







  foreach ($bilgi as $bilgi)
  { ?>

  <div class="col-md-12">
  <div class="box-shadow-full">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-sm-6 ">
            <div class="about-img">
              <img src="<?php echo base_url('') .$bilgi['resim']; ?>" width="220" height="150" alt="<?php echo $bilgi['seobaslik']; ?>">

            </div>

          </div>

        </div>

        <div  class="post-meta">
          <ul >
    <li>
      <span class="ion-ios-clock"></span>
      <a >
        <?php $tarih =$bilgi['tarih'];
        $tarih = explode(" ", $tarih);


        echo tarih($tarih[0]);

         ?>
      </a>
    </li>
    <li>
      <span class="ion-folder"></span>
      <a >


        <?php
        if($bilgi['type']=="proje")
        {


         $kategorilerliste=kategoriliste();
        foreach ($kategorilerliste as $kategorilerliste) {
          $yazdir="";

          if($kategorilerliste['id']==$bilgi['idkategori'])
          {
              echo $yazdir=$kategorilerliste['ad'];


          }
        }
      }
      else {
        echo $bilgi['idkategori'];
      }
?>

       </a>
    </li>

  </ul>
        </div>

      </div>
      <div class="col-md-6">
        <div class="about-me pt-4 pt-md-0">

          <div class="title-box-2">
            <h2 style="color:#0078ff" >

                <a href="<?php echo base_url('anasayfa/aramadetay/'); echo $bilgi['seobaslik']; ?>">


            <?php echo word_limiter($bilgi['baslik'],5); ?>
          </a>
            </h2>
          </div>
        <?php echo word_limiter($bilgi['icerik'],30); ?>
        </div>
      </div>
    </div>
  </div>


</div>
<?php }

 ?>



</div> <!-- col md-8 sonu -->
