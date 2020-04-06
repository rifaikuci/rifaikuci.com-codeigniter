<section id="yazilar" class="portfolio-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">

                    <h3 class="title-a">
                        <a href="<?php echo base_url('anasayfa/yazilar'); ?>">
                            Yazılar
                        </a>
                    </h3>

                    <div class="line-mf"></div>
                </div>
            </div>
        </div>

        <div class="row">

            <?php foreach (anayazilar() as $anayazilar) { ?>
                <div class="col-md-4">
                    <div class="work-box">

                        <a href="<?php echo $anayazilar['resim'] ?>" data-lightbox="gallery-mf">
                            <div class="work-img">
                                <img src="<?php echo $anayazilar['resim'] ?>"
                                     alt="<?php echo $anayazilar['baslik'] ?>" class="img-fluid">
                            </div>
                        </a>

                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <a href="<?php echo base_url('anasayfa/yazidetay/');
                                    echo $anayazilar['seobaslik']; ?>">

                                        <h3 class="w-title">
                                            <?php echo word_limiter($anayazilar['baslik'], 3) ?>
                                        </h3>
                                    </a>

                                    <div class="w-more">
                                        <span class="w-ctegory">
                                            <?php echo $anayazilar['tur'] ?>
                                        </span>
                                        /
                                        <span>
                                            <?php echo tarih($anayazilar['tarih']); ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="w-like">
                                        <a href="<?php echo base_url('anasayfa/yazidetay/');
                                        echo $anayazilar['seobaslik']; ?>">
                                            <span class="ion-more"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>

        </div>


        <?php if (yazicek() > 3) { ?>
            <div class="" style="float:right;">
                <a href="<?php echo base_url('anasayfa/yazilar'); ?>">
                    <button style="margin-top:5px" class="button button-a button-medium button-rouded">
                        &nbsp;&nbsp;Daha Fazlası İçin&nbsp;&nbsp;
                    </button>
                </a>
            </div>
        <?php } ?>
        <br>>
    </div>
    </div>
</section>
