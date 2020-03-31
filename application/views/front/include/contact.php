<div id="#contact">
  <?php echo $this->session->flashdata('durum'); ?>
    <div id="app">
    <form action="<?php echo base_url('anasayfa/iletisim'); ?>" method="post"  >
    <div id="sendmessage">Mesaj Gönderdiğiniz İçin Teşekkürler :)

    </div>
    <div id="errormessage"></div>

    <div class="row" >


            <div class="col-md-12 mb-3">
        <div class="form-group">
          <input type="text" name="adsoyad" class="form-control" required id="name" placeholder="Ad Soyadın... " data-rule="minlen:4" data-msg="Lütfen en az 4 karakter giriniz..!" />
          <div class="validation"></div>
        </div>
      </div>
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <input type="email" required class="form-control" name="mail" id="email" placeholder="Mail Adresiniz.." data-rule="email" data-msg="Mail adresinizi doğru girdiğinizden emin olunuz..." />
          <input type="hidden" value="<?php echo GetIP(); ?>"  name="ip"  />
          <div class="validation"></div>
        </div>
      </div>
      <div class="col-md-12 mb-3">
          <div class="form-group">
            <input type="text"  required class="form-control" name="konu" id="subject" placeholder="Konu .. " data-rule="minlen:8" data-msg="Lütfen konu en az 8 karakter giriniz.." />
            <div class="validation"></div>
          </div>
      </div>
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <textarea class="form-control"    name="mesaj" rows="5" data-rule="required" data-msg="Lütfen mesaj içeriğini anlayabileceğimiz şekilde doldurun :)" placeholder="Mesajınız.."></textarea>
          <div class="validation"></div>
        </div>
      </div>

        <div class="col-md-12 mb-3 inline">
            <div class="form-group-sm input-group-text ">
                <input style="text-align: center" type="number"  required class="form-control" v-model.number="sayi1"   disabled    />
                <label style="font-size: xx-large">+</label>
                <input style="text-align: center" type="number"  required class="form-control" v-model.number="sayi2" disabled />
                <label style="font-size: xx-large"> = </label>
                <input style="text-align: center" type="number"  required class="form-control" v-model="sonuc"     />
            </div>
        </div>

      <div class="col-md-12">
        <button    type="submit" id="button" class="button button-a button-big button-rouded" v-if="game_is_on" >Mesajı Gönder </button>
        <button    type="submit" id="button" class="button-big button-rouded" disabled v-else >Mesajı Gönder </button>
      </div>
    </div>
  </form>
</div>
</div>
