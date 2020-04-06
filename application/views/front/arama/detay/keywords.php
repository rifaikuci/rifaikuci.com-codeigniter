<div class="widget-sidebar widget-tags">
    <h2 class="sidebar-title">Etiketler</h2>
    <div class="sidebar-content">

        <ul>
            <?php $etiketler = $bilgi['keywords']; ?>
            <?php $etiket = explode(',', $etiketler);

            foreach ($etiket as $etiket) { ?>

                <li>
                    <a href="<?php echo base_url('anasayfa/aramadetay/');
                    echo $bilgi['seobaslik']; ?>"><?php echo $etiket; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
