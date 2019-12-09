
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Genel Ayar Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/genelayarguncelle'); ?>" enctype="multipart/form-data"  method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                    <input required type="text" name="title" class="form-control"  value="<?php echo $bilgi['title']; ?>">
                    <input  type="hidden" name="id" class="form-control"  value="<?php echo $bilgi['id']; ?>">
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-2 control-label">Logo Title </label>
                    <div class="col-sm-10">
                    <input required type="text" name="logotitle" class="form-control"  value="<?php echo $bilgi['logotitle']; ?>">
                  </div>
                </div>









                <div class="form-group">
                  <label class="col-sm-2 control-label"> Mevcud Resim</label>
                    <div class="col-sm-4">
                    <img  style="width:600px; height:400px; " src="<?php echo base_url().$bilgi['resim']; ?>" alt="Arka Plan Resmi Resmi" name="resim">
                  </div>
                </div>

                    <div class="form-group">
                  <label  class="col-sm-2 control-label"> Yeni Resim</label>
                    <div class="col-sm-4">
                    <input type="file" name="resim" >
                    <p class="text-blue" style="font-weight:bold;">
                      Yeni Resim Seçmeyecekseniz Resim Seçmeyin  Lütfen !!!</p>
                  </div>
                  </div>
                </div>





              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/genelayar') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
