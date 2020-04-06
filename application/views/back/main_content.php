<section class="content">

    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                    <span>Kitap Sayısı</span>
                    <span class="info-box-number"><?php echo okunankitapcek(); ?><small>&nbsp;Adet</small></span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>
                <div class="info-box-content">
                    <span>Proje Sayısı</span>
                    <span class="info-box-number"><?php echo projecek(); ?><small>&nbsp;Adet</small></span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>
                <div class="info-box-content">
                    <span>Yazı Sayısı</span>
                    <span class="info-box-number"><?php echo yazicek(); ?><small>&nbsp;Adet</small></span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-twitter"></i></span>
                <div class="info-box-content">
                    <span>Sosyal Medya Hesapları</span>
                    <span class="info-box-number"><?php echo smedyacek(); ?><small>&nbsp;Adet</small></span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>
                <div class="info-box-content">
                    <span>Mesajlar </span>
                    <span class="info-box-number"><?php echo mesajlar(); ?><small>&nbsp;Adet</small></span>
                </div>
            </div>
        </div>


        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-pagelines"></i></span>
                <div class="info-box-content">
                    <span>Sertifikalar </span>
                    <span class="info-box-number"><?php echo sertifikacek(); ?><small>&nbsp;Adet</small></span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-send"></i></span>
                <div class="info-box-content">
                    <span>Toplam Görüntülenme </span>
                    <span class="info-box-number"><?php echo sayfahitcek(); ?><small>&nbsp;Adet</small></span>
                </div>
            </div>
        </div>


        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-pie-chart"></i></span>
                <div class="info-box-content">
                    <span>Toplam Özellikler </span>
                    <span class="info-box-number"><?php echo ozellikcek(); ?><small>&nbsp;Adet</small></span>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <div style="text-align:center">
                        <h1 class="box-title">Çok Okunanlar</h1>
                    </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        <?php
                        foreach (adminhit() as $adminhit):

                            if ($adminhit['type'] == "proje") {
                                ?>

                                <a href="<?php echo base_url('yonetim/projelerduzenle/' . $adminhit['id'] . ''); ?>"/>
                            <?php } else { ?>

                                <a href="<?php echo base_url('yonetim/yazilarduzenle/' . $adminhit['id'] . ''); ?>"/>
                            <?php } ?>

                            <li class="item">
                                <div class="product-img">
                                    <img src="<?php echo base_url();
                                    echo $adminhit['resim']; ?>" alt="Product Image">
                                </div>

                                <div class="product-info">
                                    <?php
                                    if ($adminhit['type'] == "proje"){
                                    ?>
                                    <a href="<?php echo base_url('yonetim/projelerduzenle/' . $adminhit['id'] . ''); ?>"
                                       class="product-title"><?php echo $adminhit['baslik']; ?>
                                        <?php }else { ?>
                                        <a href="<?php echo base_url('yonetim/yazilarduzenle/' . $adminhit['id'] . ''); ?>"
                                           class="product-title"><?php echo $adminhit['baslik']; ?>
                                            <?php } ?>
                                            <span class="label label-warning pull-right"><?php echo $adminhit['hit']; ?></span>
                                        </a>

                                        <span class="product-description"></span>
                                </div>
                            </li>

                        <?php endforeach; ?>
                </div>

                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase"></a>
                </div>

            </div>
        </div>


        <div class="col-md-4">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <div style="text-align:center">

                        <h1 class="box-title">Son Yazılar</h1>
                    </div>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        <?php
                        foreach (anayazilar() as $anayazilar): ?>

                            <a href="<?php echo base_url('yonetim/yazilarduzenle/' . $anayazilar['id'] . ''); ?>">
                                <li class="item">
                                    <div class="product-img">
                                        <img src="<?php echo base_url();
                                        echo $anayazilar['resim']; ?>" alt="Product Image">
                                    </div>

                                    <div class="product-info">
                                        <a href="<?php echo base_url('yonetim/yazilarduzenle/' . $anayazilar['id'] . ''); ?>"
                                           class="product-title"><?php echo $anayazilar['baslik']; ?>
                                            <span class="label label-warning pull-right"><?php echo $anayazilar['hit']; ?></span></a>
                                        <span class="product-description"></span>
                                    </div>
                                </li>
                            </a>
                        <?php endforeach; ?>
                </div>

                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase"></a>
                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div style="text-align:center">
                        <h1 class="box-title">Son Projeler</h1>
                    </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        <?php
                        foreach (anaproje() as $proje): ?>

                            <a href="<?php echo base_url('yonetim/projelerduzenle/' . $proje['id'] . ''); ?>">
                                <li class="item">

                                    <div class="product-img">
                                        <img src="<?php echo base_url();
                                        echo $proje['resim']; ?>" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="<?php echo base_url('yonetim/projelerduzenle/' . $proje['id'] . ''); ?>"
                                           class="product-title"><?php echo $proje['baslik']; ?>
                                            <span class="label label-warning pull-right"><?php echo $proje['hit']; ?></span></a>
                                        <span class="product-description"></span>
                                    </div>
                                </li>
                            </a>
                        <?php endforeach; ?>
                </div>

                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase"></a>
                </div>

            </div>

        </div>
    </div>
</section>
