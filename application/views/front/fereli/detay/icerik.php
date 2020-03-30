<div class="col-md-8">
  <div class="post-box">
    <div class="post-thumb">
      <img src="<?php echo $bilgi['duyuruResim']; ?>" class="img-fluid" alt="<?php echo $bilgi['duyuruBaslik']; ?>">
    </div>


    <div class="post-meta">
      <h2 class="article-title"><?php echo $bilgi['duyuruBaslik']; ?></h2>
      <ul>
        <li>
          <span class="ion-ios-clock"></span>
          <a >

            <?php $tarih =$bilgi['duyuruTarih'];
            $tarih = explode(" ", $tarih);


            echo tarih($tarih[0]);

             ?>
          </a>
        </li>
        <li>
          <span class="ion-folder"></span>
          <a>

                 Duyurular


          </a>
        </li>

      </ul>
    </div>
    <div class="article-content">
      <?php echo  $bilgi['duyuruDetay']; ?>



    </div>
  </div>
</div>
