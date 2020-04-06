<div class="widget-sidebar widget-tags">
    <h5 class="sidebar-title">Etiketler</h5>
    <div class="sidebar-content">
        <ul>
            <?php foreach (etiketyazilar() as $yazilar) {

                $etiket = explode(',', $yazilar['keywords']);
                foreach ($etiket as $etiket) { ?>
                    <li>
                        <a href="<?php echo base_url('anasayfa/yazidetay/');
                        echo $yazilar['seobaslik']; ?>">
                            <?php echo $etiket; ?>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>
