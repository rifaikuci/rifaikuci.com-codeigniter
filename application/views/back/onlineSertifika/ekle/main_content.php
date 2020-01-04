
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Online  Oluşturma Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/onlineSertifikaekleme'); ?>" enctype="multipart/form-data"  method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Adı Soyadı </label>
                    <div class="col-sm-10">
                    <input required type="text" name="adSoyad" class="form-control"  placeholder="Ad Soyad Giriniz. ">
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-2 control-label">Eğitmen Adı Soyadı </label>
                    <div class="col-sm-10">
                    <input required type="text" name="eAdiSoyadi" class="form-control"  placeholder="Eğitmen Adı Soyadı Giriniz. ">
                  </div>
                </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kurs Adı  </label>
                      <div class="col-sm-10">
                          <input required type="text" name="kursAdi" class="form-control"  placeholder="Kurs Adı Soyadı Giriniz. ">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Sertifika Alış Tarihi</label>
                      <div class="col-sm-4">
                          <input  type="date" value="<?php echo date('d-m-Y') ?>" name="tarih" class="form-control"  >
                      </div>

                  </div>





              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/onlineSertifika') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Oluştur </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
