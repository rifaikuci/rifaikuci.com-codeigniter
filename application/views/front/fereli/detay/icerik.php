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
              <a> <?php echo tarih($bilgi['duyuruTarih']); ?></a>
            </li>

            <li>
              <span class="ion-folder"></span>
              <a> Duyurular </a>
            </li>
      </ul>
    </div>

    <div class="article-content">
      <?php echo  $bilgi['duyuruDetay']; ?>
    </div>

      <?php if($bilgi['duyuruVideo']!=""){
               $videoLinki ="https://www.youtube.com/embed/".$bilgi['duyuruVideo']; ?>

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?php echo $videoLinki; ?>"></iframe>
                </div>
      <?php } ?>

  </div>
</div>
