
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Dilek ve Şikayet Okuma Formu</h3>
            </div>

            <form action="" method="post" class="form-horizontal">

              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ad Soyad</label>
                    <div class="col-sm-6">
                    <input required type="text" name="adsoyad" class="form-control" value="<?php echo $bilgi['adSoyad']; ?>" disabled>
                    <input  type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>" >
                    <?php istekdurum( $bilgi['id']); ?>
                  </div>
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mail</label>
                    <div class="col-sm-6">
                    <input required type="text" name="mail" class="form-control" value="<?php echo $bilgi['mail']; ?>" disabled>
                  </div>
                </div>
              </div>

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Oda Numara</label>
                        <div class="col-sm-6">
                            <input required type="number" name="odaNumara" class="form-control" value="<?php echo $bilgi['odaNumara']; ?>" disabled>
                        </div>
                    </div>
                </div>



              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">İstek & Şikayet</label>
                    <div class="col-sm-6">
                  <textarea name="istek"  rows="8" cols="60" disabled><?php echo $bilgi['istek']; ?></textarea>
                  </div>
                </div>
              </div>


              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">İstek & Şikayet Tarihi</label>
                    <div class="col-sm-6">
                    <input required type="text" name="istekTarih" class="form-control" value="<?php echo tarihSaat($bilgi['istekTarih']);

                    ?>" disabled>

                  </div>
                </div>
              </div>


              <!-- /.box-body -->

              <!-- /.box-footer -->
            </form>

          </div>

        </div>
        <div class="box-footer">
            <a href="<?php echo base_url('yonetim/istekler'); ?>" type="submit" class="btn btn-primary pull-left fa fa-edit"> Dilek ve Şikayete Geri Dön </a>

        </div>
    </section>
