<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134147666-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-134147666-1');
</script>




<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <div class="copyright-box">
          <?php $sitefooter=siteayar();
          foreach ($sitefooter as $sitefooter) {


           ?>
          <p class="copyright">&copy; Copyright <strong><?php echo $sitefooter['baslik'] ?> -  <?php echo date("Y"); ?></strong>. All Rights Reserved</p>
          <div class="credits">
            Designed by <a target="_blank" href="<?php echo $sitefooter['footerLink']; ?>"><?php echo  $sitefooter['footerAd']  ?></a>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</footer>
