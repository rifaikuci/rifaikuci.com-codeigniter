
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Özellik Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/ozelliklerekleme'); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Özellik Adı</label>
                    <div class="col-sm-6">
                    <input required type="text" name="ozellik" class="form-control"  placeholder="Özellik Adı ... ">
                  </div>
                </div>

                <div class="form-group">
                  <label style="margin-top:10px; " class="col-sm-2 control-label">Puan </label>
                    <div  class="col-sm-6">

                        <input value="0" type="range" min="0" max="100" name="puan" style="width:100%">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Resim</label>
                    <div class="col-sm-6">
                    <input  type="file" name="resim" class="form-control"  >


                  </div>
                </div>

              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/ozellikler') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
