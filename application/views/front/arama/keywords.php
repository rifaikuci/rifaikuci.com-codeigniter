<div class="widget-sidebar widget-tags">
  <h2 class="">Etiketler</h2>
  <div class="sidebar-content">
    <ul>

      <?php foreach ($bilgi as $bilgi){

        $etiket=explode(',',$bilgi['keywords']);

           foreach ($etiket as $etiket){ ?>



      <li>
        <?php if($bilgi['type']=="proje")
        { ?>
        <a href="<?php echo base_url('anasayfa/projedetay/'); echo $bilgi['seobaslik']; ?>"><?php echo $etiket; ?></a>
      <?php }else {?>
        <a href="<?php echo base_url('anasayfa/yazidetay/'); echo $bilgi['seobaslik']; ?>"><?php echo $etiket; ?></a>
      <?php } ?>
      </li>
      <?php } ?>
    <?php } ?>
    </ul>
  </div>
</div>
