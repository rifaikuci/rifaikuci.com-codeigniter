
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Mesaj Okuma Formu</h3>
            </div>

            <form action="" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ad Soyad</label>
                    <div class="col-sm-6">
                    <input required type="text" name="adsoyad" class="form-control" value="<?php echo $bilgi['adsoyad']; ?>" disabled>
                    <input  type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>" >
                    <?php mesajdurum( $bilgi['id']); ?>
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
                  <label class="col-sm-2 control-label">Konu</label>
                    <div class="col-sm-6">
                    <input required type="text" name="konu" class="form-control" value="<?php echo $bilgi['konu']; ?>" disabled>
                  </div>
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mesaj</label>
                    <div class="col-sm-6">
                  <textarea name="gununsozu"  rows="8" cols="60" disabled><?php echo $bilgi['mesaj']; ?></textarea>
                  </div>
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">IP Adresi</label>
                    <div class="col-sm-6">
                    <input required type="text" name="ip" class="form-control" value="<?php echo $bilgi['ip']; ?>" disabled>
                  </div>
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Gönderim Tarihi</label>
                    <div class="col-sm-6">
                    <input required type="text" name="tarih" class="form-control" value="<?php echo tarih($bilgi['tarih']);

                    $saat=explode(" ",$bilgi['tarih']);
                    ?>&nbsp;&nbsp; <?php echo $saat[1]; ?>" disabled>

                  </div>
                </div>
              </div>


              <!-- /.box-body -->
              <div class="box-footer">
              <a href="<?php echo base_url('yonetim/iletisim'); ?>" type="submit" class="btn btn-primary pull-right fa fa-edit"> Mesajlara Geri Dön </a>

              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
