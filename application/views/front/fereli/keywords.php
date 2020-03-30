<div class="widget-sidebar widget-tags">
  <h5 class="sidebar-title">Etiketler</h5>
  <div class="sidebar-content">
    <ul>
      <?php $etiketler=etiketproje(); ?>
      <?php foreach ($etiketler as $etiketler){

        $etiket=explode(',',$etiketler['keywords']);

           foreach ($etiket as $etiket){ ?>



      <li>
        <a href="<?php echo base_url('anasayfa/projedetay/'); echo $etiketler['seobaslik']; ?>"><?php echo $etiket; ?></a>

      </li>
      <?php } ?>
    <?php } ?>
    </ul>
  </div>
</div>
