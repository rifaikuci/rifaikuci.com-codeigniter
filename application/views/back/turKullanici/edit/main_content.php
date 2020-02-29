
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Kullanıcı Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/turKullaniciguncelle'); ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Adı Soyadı</label>
                    <div class="col-sm-6">
                    <input required type="text" name="adSoyad" class="form-control" value="<?php echo $bilgi['adSoyad']; ?>" placeholder="Ad soyad giriniz...">
                    <input  type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>" >

                  </div>
                </div>


                  <div class="form-group">
                      <label class="col-sm-2 control-label">Mail Adresiniz</label>
                      <div class="col-sm-6">
                          <input required type="email" name="mail" class="form-control" value="<?php echo $bilgi['mail']; ?>" placeholder= "Mail  giriniz...">

                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Şifre</label>
                      <div class="col-sm-6">
                          <input required type="password" name="sifre" class="form-control" value="<?php echo $bilgi['sifre']; ?>" placeholder= "Şifre  giriniz...">

                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Durum </label>
                      <div class="col-sm-6">
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
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/turKullanici') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle </button>
              </div>
              <!-- /.box-footer -->
            </form>

          </div>
        </div>

    </section>