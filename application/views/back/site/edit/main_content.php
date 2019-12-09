
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Site Ayarları Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/siteguncelle'); ?>" enctype="multipart/form-data"  method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ad Soyad </label>
                    <div class="col-sm-10">
                    <input required type="text" name="adsoyad" class="form-control"  value="<?php echo $bilgi['adsoyad']; ?>">
                    <input  type="hidden" name="id" class="form-control"  value="<?php echo $bilgi['id']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlık </label>
                    <div class="col-sm-10">
                    <input required type="text" name="baslik" class="form-control"  value="<?php echo $bilgi['baslik']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Özellik </label>
                    <div class="col-sm-10">
                    <input required type="text" name="ozellik" class="form-control"  value="<?php echo $bilgi['ozellik']; ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label"> Mevcud Resim</label>
                    <div class="col-sm-4">
                    <img style="width:160px; height:160px; margin-left:50px;" src="<?php echo base_url().$bilgi['resim']; ?>" alt="Site Ön Panel Resmi" name="resim">
                  </div>
                  <div class="" style="margin-top: 50px ;">
                  <label  class="col-sm-2 control-label"> Yeni Resim</label>
                    <div class="col-sm-4">
                    <input type="file" name="resim" >
                    <p class="text-blue" style="font-weight:bold; margin-left: -100px; padding-top:25px;">
                      Yeni Resim Seçmeyecekseniz Resim Seçmeyin  Lütfen !!!</p>
                  </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Mail </label>
                    <div class="col-sm-10">
                    <input required type="mail" name="mail" class="form-control"  value="<?php echo $bilgi['mail']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefon </label>
                    <div class="col-sm-10">
                    <input required type="text" name="telefon" class="form-control"  value="<?php echo $bilgi['telefon']; ?>">
                  </div>
                </div>


                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Hakkımda</label>
                      <div class="col-sm-10">
                        <textarea name="hakkimda" id="editor1" rows="8" cols="80">
                      <?php echo $bilgi['hakkimda']; ?>
                        </textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Adres </label>
                    <div class="col-sm-10">
                    <input required type="text" name="adres" class="form-control"  value="<?php echo $bilgi['adres']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Footer Ad </label>
                    <div class="col-sm-10">
                    <input required type="text" name="footerAd" class="form-control"  value="<?php echo $bilgi['footerAd']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Footer Link </label>
                    <div class="col-sm-10">
                    <input required type="text" name="footerLink" class="form-control"  value="<?php echo $bilgi['footerLink']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Durum </label>
                    <div class="col-sm-10">
                      <select  class="form-control" required name="durum">
                        <?php if(( $bilgi['durum'])==1){ ?>
                        <option selected  value="1">Aktif  </option>
                        <option  value="2">Pasif</option>
                      <?php }else {?>
                        <option   value="1">Aktif  </option>
                        <option selected value="2">Pasif</option>
                    <?php    } ?>
                      </select>
                  </div>
                </div>
              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/site') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
