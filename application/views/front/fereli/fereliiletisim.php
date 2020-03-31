<div>

  <?php echo $this->session->flashdata('durum'); ?>
    <div id="appfereli">
    <form action="<?php echo base_url('anasayfa/istekgonder'); ?>" method="post" >
    <div id="sendmessage">Mesaj Gönderdiğiniz İçin Teşekkürler :)</div>

    <div id="errormessage"></div>

        <div class="row">
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <input type="text" name="adsoyad" class="form-control" required id="adsoyad" placeholder="Ad Soyadınız... " data-rule="minlen:5" data-msg="Lütfen en az 5 karakter giriniz..!" />
          <div class="validation"></div>
        </div>
      </div>

      <div class="col-md-12 mb-3">
        <div class="form-group">
          <input type="email" required class="form-control" name="mail" id="mail" placeholder="Mail Adresiniz.." data-rule="email" data-msg="Mail adresinizi doğru girdiğinizden emin olunuz..." />
          <div class="validation"></div>
        </div>
      </div>

      <div class="col-md-12 mb-3">
        <div class="form-group">
            <input type="number" max="600" min="100" required class="form-control" name="odaNumara" id="odaNumara" placeholder="Oda Numaranızı Giriniz" data-msg="Oda Numaranızı Giriniz" />
             <div class="validation"></div>
        </div>
      </div>

      <div class="col-md-12 mb-3" style="text-align: center">
          <div class="custom-control custom-radio custom-control-inline">
              <input required type="radio" id="dilek" name="tur" value="1" class="custom-control-input">
              <label class="custom-control-label" for="dilek">Dilek</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline">
              <input required type="radio" id="sikayet" name="tur" value="2" class="custom-control-input">
              <label class="custom-control-label" for="sikayet">Şikayet</label>
          </div>
      </div>

      <div class="col-md-12 mb-3">
        <div class="form-group">
          <textarea class="form-control"   name="mesaj" rows="5" data-rule="required" data-msg="Talep ve önerilerinizi giriniz" placeholder="Talep ve önerilerinizi giriniz.."></textarea>
          <div class="validation"></div>
        </div>
      </div>
            <div class="col-md-12 mb-3 inline">

                <div class="form-group-sm input-group-text ">
                    <input style="text-align: center" type="number"  required class="form-control" v-model.number="fsayi1"   disabled    />
                    <label style="font-size: xx-large">+</label>
                    <input style="text-align: center" type="number"  required class="form-control" v-model.number="fsayi2" disabled />
                    <label style="font-size: xx-large"> = </label>
                    <input style="text-align: center" type="number"  required class="form-control" v-model="fsonuc"     />

                </div>

            </div>
            <div class="col-md-12">
                <button    type="submit" id="button" class="button button-a button-big button-rouded" v-if="fgame_is_on" > Gönder </button>
                <button    type="submit" id="button" class="button-big button-rouded" disabled v-else > Gönder </button>
            </div>



    </div>
  </form>
</div>
</div>
