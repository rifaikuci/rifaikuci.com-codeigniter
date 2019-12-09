
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Günün Sözü Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/gununsozuekleme'); ?>" enctype="multipart/form-data"  method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ad Soyad </label>
                    <div class="col-sm-10">
                    <input required type="text" name="adsoyad" class="form-control"  placeholder="Ad Soyad Giriniz... ">


                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Resim</label>
                    <div class="col-sm-10">
                    <input  type="file" name="resim" class="form-control"  >


                  </div>
                </div>

                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Günün Sözü </label>
                      <div class="col-sm-10">
                        <input required type="text" name="gununsozu" class="form-control"  placeholder="Sözü Ekleyiniz">
                    </div>
                  </div>
                </div>




                <div class="form-group">
                  <label class="col-sm-2 control-label">Durum </label>
                    <div class="col-sm-10">
                      <select  class="form-control" required name="durum">


                        <option  value="1">Aktif  </option>
                        <option  value="2">Pasif</option>

                      </select>
                  </div>
                </div>
              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/gununsozu') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
