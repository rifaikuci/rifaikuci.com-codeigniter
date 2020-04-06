<section style="margin-top:50px" id="cok-okunan" class="services-mf route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">

                    <h4 class="title-a">Çok Okunan</h4>


                    <p class="subtitle-a">
                        En çok okunan Yazılar & Projeler
                    </p>

                    <div class="line-mf"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach (anayaziprojelerhit() as $union) { ?>

                <div class="col-md-4">
                    <div class="service-box">

                        <div class="service-ico">
                            <?php if ($union['type'] == "proje"){ ?>

                                <a href="<?php echo base_url('anasayfa/projedetay/');
                                echo $union['seobaslik']; ?>">
                                    <img class="ico-circle" src="<?php echo $union['resim']; ?>"
                                         alt="<?php echo $union['baslik']; ?>">
                                </a>

                            <?php }else { ?>

                            <a href="<?php echo base_url('anasayfa/yazidetay/');
                            echo $union['seobaslik']; ?>">
                                <img class="ico-circle" src="<?php echo $union['resim']; ?>"
                                     alt="<?php echo $union['baslik']; ?>">
                                <?php } ?>
                        </div>

                        <div class="service-content">
                            <?php
                            if ($union['type'] == "proje") { ?>

                                <a href="<?php echo base_url('anasayfa/projedetay/');
                                echo $union['seobaslik']; ?>">
                                    <h4 style="text-align:center"><?php echo word_limiter($union['baslik'], 3); ?></h4>
                                </a>

                            <?php } else { ?>
                                <a href="<?php echo base_url('anasayfa/yazidetay/');
                                echo $union['seobaslik']; ?>">
                                    <h4 style="text-align:center"><?php echo word_limiter($union['baslik'], 3); ?></h4>
                                </a>
                            <?php } ?>

                            <p class="s-description text-center">
                                <?php echo word_limiter($union['icerik'], 20); ?>
                            </p>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
