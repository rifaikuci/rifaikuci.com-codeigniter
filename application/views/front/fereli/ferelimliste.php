<div class="col-md-8">

    <?php if (count($bilgi) == 0) { ?>

        <div class="col-md-12">
            <div class="box-shadow-full">
                <div class="row">

                    <p style="color:#ff9494">
                        <b>Daha Henüz Duyuru Eklenmemiştir !!!</b>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>


    <?php foreach ($bilgi as $bilgi) { ?>

        <div class="col-md-12">
            <div class="box-shadow-full">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="about-img">
                                    <img src="<?php echo $bilgi['duyuruResim']; ?>" width="220" height="150"
                                         alt="<?php $bilgi['duyuruBaslik'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="post-meta">
                            <ul>
                                <li>
                                    <span class="ion-ios-clock"></span>
                                    <a><?php echo tarih($bilgi['duyuruTarih']); ?></a>
                                </li>

                                <li>
                                    <span class="ion-folder"></span>
                                    <a>Duyurular</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="about-me pt-4 pt-md-0">

                            <div class="title-box-2">
                                <a href="<?php echo base_url('anasayfa/ferelidetay/');
                                echo $bilgi['seobaslik']; ?>">
                                    <h2 style="color:#0078ff"><?php echo word_limiter($bilgi['duyuruBaslik'], 5); ?></h2>
                                </a>
                            </div>

                            <?php echo word_limiter($bilgi['duyuruDetay'], 30); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php }
    echo $linkler; ?>
</div>
