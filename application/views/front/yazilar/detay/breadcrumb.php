<?php $arkaplan=arkaplan(); ?>
<div class="intro intro-single route bg-image" style="background-image: url(<?php echo base_url('');echo $arkaplan; ?>)">
  <div class="overlay-mf"></div>
  <div class="intro-content display-table">
    <div class="table-cell">
      <div class="container">
        <h2 class="intro-title mb-4">Yazılarım</h2>
        <ol class="breadcrumb d-flex justify-content-center">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url('anasayfa'); ?>">Anasayfa</a>
              </li>
              <li class="breadcrumb-item">
                <a href="<?php echo base_url('anasayfa/yazilar'); ?>">Yazılarım</a>
              </li>
              <li class="breadcrumb-item active"><?php echo $bilgi['baslik']; ?></li>
            </ol>
      </div>
    </div>
  </div>
</div>
