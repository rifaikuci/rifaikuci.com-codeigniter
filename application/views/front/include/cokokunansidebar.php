<div id="cok-okunan" class="widget-sidebar">
    <h5 class="sidebar-title">Çok Okunan</h5>
    <div class="sidebar-content">

        <ul class="list-sidebar">

            <?php foreach (genelyazilarokunan() as $pro) { ?>

                <li>
                    <?php if ($pro['type'] == "yazi")
                    { ?>
                    <a href="<?php echo base_url('anasayfa/yazidetay/');
                    echo $pro['seobaslik']; ?>"><?php echo substr($pro['baslik'], 0, 30); ?>

                        <?php }else{ ?>
                        <a href="<?php echo base_url('anasayfa/projedetay/');
                        echo $pro['seobaslik']; ?>"><?php echo substr($pro['baslik'], 0, 30); ?>
                            <?php } ?>
                </li>
                </a>
            <?php } ?>

        </ul>

    </div>
</div>
