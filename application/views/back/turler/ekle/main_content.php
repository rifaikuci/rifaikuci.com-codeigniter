
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Türler Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/turlerekleme'); ?>" enctype="multipart/form-data"  method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tür Adı </label>
                    <div class="col-sm-10">
                    <input required type="text" name="turAd" class="form-control"  placeholder="Tür Adı ... ">
                  </div>
                </div>


                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Açıklama </label>
                      <div class="col-sm-10">
                        <textarea name="turDetay" rows="8" cols="80"></textarea>
                    </div>
                  </div>
                </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Resim</label>
                      <div class="col-sm-10">
                          <input  type="file" name="turResim" class="form-control"  >
                      </div>
                  </div>

                  <div class="form-group" >
                      <label class="col-sm-2 control-label">Enlem </label>
                      <div class="col-sm-4">
                          <input required type="text" name="turEnlem" class="form-control"  placeholder="Enlem Bilgisi Giriniz..." ">

                      </div>

                      <label class="col-sm-2 control-label">Boylam </label>
                      <div class="col-sm-4">
                          <input required type="text" name="turBoylam" class="form-control"  placeholder="Boylam Bilgisi Giriniz..." ">
                      </div>
                  </div>



                  <div class="form-group" >
                      <label class="col-sm-2 control-label">Tür </label>
                      <div class="col-sm-4">
                          <select  class="form-control" required name="tur">
                              <option  value="Kuş">Kuş  </option>
                              <option  value="Bitki">Bitki</option>
                          </select>
                      </div>

                  <label class="col-sm-2 control-label">Durum </label>
                    <div class="col-sm-4">
                      <select  class="form-control" required name="turDurum">


                        <option  value="Aktif">Aktif  </option>
                        <option  value="Pasif">Pasif</option>

                      </select>
                  </div>

                </div>
              </div>
              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/turler') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
