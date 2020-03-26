<div class="socials">
  <ul>
    <?php $smedya=smedyaion();
    foreach ($smedya as $smedya) {
     ?>
    <li  style="margin-top:20px">
    <a target="_blank" href="<?php echo $smedya ['url']; ?>">
      <span class="ico-circle"><i class="ion-social-<?php echo $smedya['seoAd']; ?>"></i></span></a></li>
  <?php } ?>

  <li  style="margin-top:20px">
  <a target="_blank" href="mailto:rifaikuci@gmail.com?Subject=rifaikuci.com%20Adresinden">
    <span class="ico-circle"><i class="ion-email"></i></span></a></li>
  </ul>
</div>
