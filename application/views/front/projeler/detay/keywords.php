<div class="widget-sidebar widget-tags">
    <h5 class="sidebar-title">Etiketler</h5>
    <div class="sidebar-content">

        <ul>
            <?php $etiketler = $bilgi['keywords']; ?>

            <?php $etiket = explode(',', $etiketler);

            foreach ($etiket as $etiket) { ?>
                <li>
                    <a href=""><?php echo $etiket; ?></a>

                </li>
            <?php } ?>
        </ul>
    </div>
</div>
