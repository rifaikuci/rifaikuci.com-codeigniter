
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Kullanıcı Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/turKullaniciekleme'); ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Adı Soyadı</label>
                    <div class="col-sm-6">
                    <input required type="text" name="adSoyad" class="form-control"  placeholder="Adı Soyadı giriniz  ... ">


                  </div>
                </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Mail Adresi</label>
                      <div class="col-sm-6">
                          <input required type="email" name="mail" class="form-control"  placeholder="Mail adresinizi giriniz  ... ">


                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Şifre</label>
                      <div class="col-sm-6">
                          <input required type="password" name="sifre" class="form-control"  placeholder="Şifrenizi giriniz  ... ">


                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Durum </label>
                      <div class="col-sm-6">
                          <select  class="form-control" required name="durum">


                              <option  value="1">Aktif  </option>
                              <option  value="2">Pasif</option>

                          </select>
                      </div>
                  </div>

              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/turKullanici') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
