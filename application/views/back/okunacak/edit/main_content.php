
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Okunacak Kitap Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/okunacakguncelle'); ?>" enctype="multipart/form-data"  method="post" class="form-horizontal">
              <div class="box-body">


                <div class="form-group">
                  <label class="col-sm-2 control-label">Kitap Adı </label>
                    <div class="col-sm-10">
                    <input required type="text" name="kitapadi" class="form-control"  value="<?php echo $bilgi['kitapadi']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Yazar Adı </label>
                    <div class="col-sm-10">
                    <input required type="text" name="yazaradi" class="form-control"  value="<?php echo $bilgi['yazaradi']; ?>">
                  </div>
                </div>







                <div style="margin-top:50px" class="form-group">
                  <label style="margin-top:100px" class="col-sm-2 control-label">Mevcud  Resim</label>
                    <div class="col-sm-4">
                    <img height="281" width="179" src="<?php echo base_url(); echo $bilgi['resim']; ?>" alt="<?php echo $bilgi['kitapadi']; ?>">


                  </div>

                  <div style="margin:100px 50px">


                  <label  class="col-sm-2 control-label">Yeni Resim</label>
                    <div class="col-sm-4">
                    <input  type="file" name="resim" class="form-control"  >
                    <input  type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>" >
                    <p class="text-blue" style="font-weight:bold; padding-top:25px;">
                      Yeni Resim Seçmeyecekseniz Resim Seçmeyin  Lütfen !!!</p>
                  </div>
</div>

                </div>






              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/okunacak') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
