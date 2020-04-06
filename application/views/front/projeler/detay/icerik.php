<div class="col-md-8">
    <div class="post-box">

        <div class="post-thumb">
            <img src="<?php echo base_url('');
            echo $bilgi['resim']; ?>" class="img-fluid" alt="">
        </div>

        <?php $cookie = $bilgi['seobaslik'];

        if (@$_COOKIE[$cookie]) {
            @$_COOKIE[$cookie];

        } else {
            projehitarttir($bilgi['id'], $bilgi['hit']);
        } ?>

        <div class="post-meta">
            <h2 class="article-title">
                <?php echo $bilgi['baslik']; ?>
            </h2>

            <ul>
                <li>
                    <span class="ion-ios-clock"></span>
                    <a>
                        <?php echo tarih($bilgi['tarih']); ?>
                    </a>
                </li>

                <li>
                    <span class="ion-folder"></span>
                    <a>
                        <?php foreach (kategoriliste() as $kategorilerliste) {

                            $yazdir = "";
                            if ($kategorilerliste['id'] == $bilgi['idkategori']) {
                                echo $yazdir = $kategorilerliste['ad'];
                            }
                        }
                        ?>
                    </a>
                </li>
            </ul>

        </div>

        <div class="article-content">
            <?php echo $bilgi['icerik']; ?>
        </div>


        <?php if ($bilgi['video'] != "") {
            $videoLinki = "https://www.youtube.com/embed/" . $bilgi['video']; ?>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php echo $videoLinki; ?>"></iframe>
            </div>
        <?php } ?>

    </div>
</div>
