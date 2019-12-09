
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Resim Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/resimlerguncelle'); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">



                <div class="form-group">


                  <label class="col-sm-2 control-label"> Mevcud Resim</label>
                    <div class="col-sm-4">
                    <img style="width:384px; height:211px; margin-left:50px;" src="<?php echo base_url().$bilgi['resim']; ?>" alt="Arka Plan Resim" name="resim">
                  </div>
                </div>
                  <div class="" style="margin-top: 50px ; margin-left: 40px;">

                    <div class="col-sm-4">
                    <input type="file" name="resim" >
                    <input  type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>" >
                    <p class="text-blue" style="font-weight:bold; padding-top:25px;">
                      Yeni Resim Seçmeyecekseniz Resim Seçmeyin  Lütfen !!!</p>
                  </div>
                  </div>
                </div>




              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/icon') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
