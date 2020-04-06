<div class="widget-sidebar">
    <h5 class="sidebar-title">Son Yazılar</h5>
    <div class="sidebar-content">
        <ul class="list-sidebar">

            <?php foreach (genelyazilartarih() as $pro) { ?>

                <li>
                    <?php if ($pro['type'] == "yazi") { ?>
                        <a href="
                    <?php echo base_url('anasayfa/yazidetay/');
                        echo $pro['seobaslik']; ?>"/>
                        <?php echo word_limiter($pro['baslik'], 4); ?>

                    <?php } else { ?>
                        <a href="<?php echo base_url('anasayfa/projedetay/');
                        echo $pro['seobaslik']; ?>"/>
                        <?php echo word_limiter($pro['baslik'], 4); ?>
                    <?php } ?>
                </li>
            <?php } ?>

        </ul>
    </div>
</div>
