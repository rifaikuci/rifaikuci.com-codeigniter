<?php foreach (anaayar() as  $anaayar) { ?>
<div id="anasayfa" class="intro route bg-image" style="background-image: url(<?php echo $anaayar['resim']; ?>)">
    <?php } ?>

    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <h1 class="intro-title mb-4">
                    Hello, Welcome to the Software World
                </h1>

                <p class="intro-subtitle">
              <span class="text-slider-items">

                  printf("Welcome C of World")|pyList = ("numpy", "Pandas", "Opencv", "Tensorflow","Keras","ML") |
                  <?php echo 'foreach($language as $pyList){ echo $language} ' ?> |
                  var app = new Vue({  el: '#app',data: {    message: 'Hello Vue!'} }) |
                  [   { "JSON" : "Restful Servisleri" } ] |

            </span>
                    <strong class="text-slider"></strong>
                </p>

                <p class="pt-3">
                    <a class="btn btn-primary btn js-scroll px-4" target="_blank"
                       href="<?php echo base_url('cv.pdf'); ?>" role="button">Özgeçmiş
                    </a>
                </p>

                <p class="pt-3">
                    <a class="btn btn-primary btn js-scroll px-4"
                       href="<?php echo base_url('anasayfa/fereli'); ?>" role="button">Burdur Fereli Sinan Efendi KYK
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>