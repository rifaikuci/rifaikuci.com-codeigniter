<div class="widget-sidebar widget-tags">
    <h2 class="sidebar-title">Etiketler</h2>
    <div class="sidebar-content">

        <ul>
            <?php foreach (hakkimdakeywords() as $etiketler) {
                $etiket = explode(',', $etiketler['keywords']);

                foreach ($etiket as $etiket) { ?>

                    <li>
                        <?php if ($etiketler['type'] == "proje") { ?>
                            <a href="<?php echo base_url('anasayfa/projedetay/');
                            echo $etiketler['seobaslik']; ?>"><?php echo $etiket; ?></a>

                        <?php } else { ?>
                            <a href="<?php echo base_url('anasayfa/yazidetay/');
                            echo $etiketler['seobaslik']; ?>"><?php echo $etiket; ?></a>

                        <?php } ?>
                    </li>

                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>
