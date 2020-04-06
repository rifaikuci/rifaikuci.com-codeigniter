<div class="col-md-8">
    <?php $sayi = count($bilgi);

    if ($sayi == 0) { ?>
        <div class="col-md-12">
            <div class="box-shadow-full">
                <p style="color:#ff9494">
                    <b>
                        Daha Henüz Yazı Eklenmemiştir :(
                    </b>
                </p>
            </div>
        </div>
    <?php }


    foreach ($bilgi as $bilgi) { ?>
        <div class="col-md-12">
            <div class="box-shadow-full">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="about-img">
                                    <img src="<?php echo base_url('/') . $bilgi['resim']; ?>" width="220" height="150"
                                         alt="<?php $bilgi['baslik'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="post-meta">
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
                                        <?php echo $bilgi['tur']; ?>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-me pt-4 pt-md-0">
                            <div class="title-box-2">

                                <a href="<?php echo base_url('anasayfa/yazidetay/');
                                echo $bilgi['seobaslik']; ?>">
                                    <h2 style="color:#0078ff">
                                        <?php echo word_limiter($bilgi['baslik'], 5); ?>
                                    </h2>
                                </a>
                            </div>

                            <?php echo word_limiter($bilgi['icerik'], 30); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    <?php echo $linkler; ?>
</div>