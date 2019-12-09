<div id="cok-okunan" class="widget-sidebar" >
  <h5 class="sidebar-title">Çok Okunan</h5>
  <div class="sidebar-content">
    <ul class="list-sidebar">
    <?php $pro=genelyazilarokunan();

      foreach ($pro as $pro) {?>


              <li>
                <?php if($pro['type']=="yazi")
                { ?>
                    <a href="<?php echo base_url('anasayfa/yazidetay/'); echo $pro['seobaslik']; ?>"><?php echo word_limiter($pro['baslik'],4);?>

              <?php }else{ ?>

              <a href="<?php echo base_url('anasayfa/projedetay/'); echo $pro['seobaslik']; ?>"><?php echo word_limiter($pro['baslik'],4);?>
            <?php } ?>
              </li>
              </a>
<?php } ?>

    </ul>
  </div>
</div>
