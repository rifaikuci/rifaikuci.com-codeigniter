<div id="cok-okunan" class="widget-sidebar">

    <h5 class="sidebar-title">Son Duyurular</h5>

    <div class="sidebar-content">

        <ul class="list-sidebar">

            <?php $pro = sonDuyurular();

            if (count($pro) == 0) {
                echo " <p style=\"color:#ff9494\" > <b> Duyuru Eklenmemiştir !!!</b></p>";
            }

            foreach ($pro as $pro) { ?>

                <li>
                    <a href="<?php echo base_url('anasayfa/ferelidetay/');
                    echo $pro['seobaslik']; ?>"><?php echo word_limiter($pro['duyuruBaslik'], 4); ?></a>
                </li>

            <?php } ?>

        </ul>
    </div>
</div>
