
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Arkaplan Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/arkaplanekleme'); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Resim</label>
                    <div class="col-sm-6">
                    <input  type="file" name="resim" class="form-control"  >
                  </div>
                </div>

              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/arkaplan') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
