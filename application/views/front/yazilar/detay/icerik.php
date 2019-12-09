<?php

 ?>
<div class="col-md-8">
  <div class="post-box">
    <div class="post-thumb">
      <img src="<?php echo base_url('');echo $bilgi['resim']; ?>" class="img-fluid" alt="">
    </div>
    <div class="post-meta">
      <h1 class="article-title"><?php echo $bilgi['baslik']; ?></h1>
      <ul>
        <li>
          <span class="ion-ios-clock"></span>
          <a>

            <?php $tarih =$bilgi['tarih'];
            $tarih = explode(" ", $tarih);


            echo tarih($tarih[0]);

             ?>
          </a>
        </li>
        <li>
          <span class="ion-folder"></span>
          <a >

                    <?php echo $bilgi['tur']; ?>




          </a>
        </li>

      </ul>
    </div>
    <div class="article-content">
      <?php echo $bilgi['icerik'] ?>



    </div>
  </div>
</div>
