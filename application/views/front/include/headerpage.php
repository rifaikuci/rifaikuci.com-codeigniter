<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">

        <?php foreach (anaayar() as $anaayar) { ?>
            <a class="navbar-brand js-scroll" style="font-family: 'Annie Use Your Telescope', cursive;"
               href="<?php echo base_url(); ?>"><?php echo $anaayar['logotitle']; ?></a>
        <?php } ?>

        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link js-scroll"
                       href="<?php echo base_url(); ?>">Anasayfa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll"
                       href="<?php echo base_url() . 'anasayfa/hakkimda'; ?>">Hakkımda
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link js-scroll"
                       href="<?php echo base_url() . 'anasayfa/projeler'; ?>">Projelerim
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll"
                       href="<?php echo base_url() . 'anasayfa/yazilar'; ?>">Yazılar
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll"
                       href="#cok-okunan">Çok Okunan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#iletisim">
                        İletişim
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll"
                       href="<?php echo base_url() . 'anasayfa/fereli'; ?>">Fereli Sinan Efendi KYK
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
