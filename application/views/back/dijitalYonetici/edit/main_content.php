
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Yönetici Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/dijitalYoneticiguncelle'); ?>" enctype="multipart/form-data"  method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ad Soyad</label>
                    <div class="col-sm-10">
                    <input required type="text" name="yName" class="form-control"  value="<?php echo $bilgi['yName']; ?>">
                    <input  type="hidden" name="yId" class="form-control"  value="<?php echo $bilgi['yId']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                    <input required type="text" name="yEmail" class="form-control"  value="<?php echo $bilgi['yEmail']; ?>">
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-2 control-label">Rfid Numarası</label>
                    <div class="col-sm-10">
                    <input required type="text" name="yRfid" class="form-control" disabled  value="<?php echo $bilgi['yRfid']; ?>">
                  </div>
                </div>









                <div class="form-group">
                  <label class="col-sm-2 control-label"> Mevcud Resim</label>
                    <div class="col-sm-4">
                    <img style="width:160px; height:160px; margin-left:50px;" src="<?php echo $bilgi['yFoto']; ?>" alt="Yönetici Resmi" name="yFoto">
                  </div>
                  <div class="" style="margin-top: 50px ;">
                  <label  class="col-sm-2 control-label"> Yeni Resim</label>
                    <div class="col-sm-4">
                    <input type="file" name="yFoto" >
                    <p class="text-blue" style="font-weight:bold; margin-left: -100px; padding-top:25px;">
                      Yeni Resim Seçmeyecekseniz Resim Seçmeyin  Lütfen !!!</p>
                  </div>
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
