
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <?php $anaayar=anaayar(); ?>
      <?php

      foreach ($anaayar as  $anaayar) {
      ?>
      <a class="navbar-brand js-scroll"  style="font-family: 'Annie Use Your Telescope', cursive;"  href="<?php echo base_url(); ?>"><?php echo $anaayar['logotitle']; ?></a>
<?php } ?>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <?php
          $menu=menucek();
           foreach ($menu as $menu){ ?>
         <li class="nav-item">
            <a class="nav-link js-scroll" href="#<?php echo $menu['headSeoAd']; ?>"><?php echo $menu['headAdi']; ?></a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->
