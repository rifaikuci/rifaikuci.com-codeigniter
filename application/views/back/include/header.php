<header class="main-header">

    <a href="<?php echo base_url('yonetim/anasayfa'); ?>" class="logo">
        <?php date_default_timezone_set("Europe/Istanbul") ?>
        <span class="logo-mini"><b>R</b>.<b>K</b>.</span>
        <span class="logo-lg"><b>Rifai </b> KUÇİ</span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php $okunmayan = okunmayancek(); ?>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>

                        <span class="label label-success"><?php
                            if ($okunmayan != 0) {
                                echo $okunmayan;
                            } else {
                            } ?>
                        </span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header"><?php
                            if ($okunmayan == 0)
                            {
                                echo "Yeni Mesajınız Yok";
                            }
                            else {
                            echo $okunmayan; ?> Yeni Mesajınız Var
                        </li>
                        <?php } ?>

                        <li>
                            <?php $admin = admincek(); ?>

                            <ul class="menu">
                                <?php $headiletisim = headiletisim();
                                foreach ($headiletisim as $headiletisim) { ?>

                                    <li>
                                        <a href="<?php echo base_url('yonetim/iletisimoku/' . $headiletisim['id'] . ''); ?>"/>

                                        <h4>
                                            <?php echo $headiletisim['adsoyad']; ?>
                                            <small><i class="fa fa-clock-o"></i>
                                                <?php echo tarih($headiletisim['tarih']); ?>
                                            </small>
                                        </h4>

                                        <p>
                                            <?php echo word_limiter($headiletisim['konu'], 3); ?>
                                        </p>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>

                        </li>

                        <li class="footer">
                            <a href="<?php echo base_url('yonetim/iletisim'); ?>">Tüm Mesajları Gör</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url();
                        echo $admin->resim; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo admincek()->adsoyad; ?></span>
                    </a>

                    <ul class="dropdown-menu">

                        <li class="user-header">
                            <img src="<?php echo base_url();
                            echo $admin->resim; ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo admincek()->adsoyad; ?>&nbsp;&nbsp;
                                -&nbsp;&nbsp; <?php echo admincek()->ozellik; ?>
                                <small> 21 OCAK 2019</small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?php echo base_url('yonetim/cikis'); ?>" class="btn btn-danger "> Çıkış
                                    Yap</a>
                            </div>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>

            </ul>
        </div>
    </nav>
</header>
