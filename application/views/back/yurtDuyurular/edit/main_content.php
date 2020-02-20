
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Duyuru Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/duyurularguncelle'); ?>" enctype="multipart/form-data"  method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Duyuru </label>
                    <div class="col-sm-10">
                    <input required type="text" name="duyuruBaslik" class="form-control"  value="<?php echo $bilgi['duyuruBaslik']; ?>">
                    <input  type="hidden" name="id" class="form-control"  value="<?php echo $bilgi['id']; ?>">
                  </div>
                </div>

                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Açıklama </label>
                      <div class="col-sm-10">
                        <textarea name="duyuruDetay"  rows="8" cols="80"><?php echo $bilgi['duyuruDetay']; ?></textarea>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label"> Mevcud Resim</label>
                    <div class="col-sm-4">
                    <img style="width:160px; height:160px; margin-left:50px;" src="<?php echo $bilgi['duyuruResim']; ?>" alt="Duyuru Resmi" name="duyuruResim">
                  </div>
                  <div class="" style="margin-top: 50px ;">
                  <label  class="col-sm-2 control-label"> Yeni Resim</label>
                    <div class="col-sm-4">
                    <input type="file" name="duyuruResim" >
                    <p class="text-blue" style="font-weight:bold; margin-left: -100px; padding-top:25px;">
                      Yeni Resim Seçmeyecekseniz Resim Seçmeyin  Lütfen !!!</p>
                  </div>
                  </div>
                </div>

                  <div class="form-group" >
                      <label class="col-sm-2 control-label">Tür </label>
                      <div class="col-sm-4">


                          <select  class="form-control" required name="durum">
                              <?php if(( $bilgi['durum'])==1){ ?>
                                  <option selected  value="1">Aktif  </option>
                                  <option  value="2">Pasif</option>
                              <?php }else {?>
                                  <<option   value="1">Aktif  </option>
                                  <option selected  value="2">Pasif</option>
                              <?php    } ?>
                          </select>
                      </div>

                      <label class="col-sm-2 control-label">Tarih </label>

                      <div class="col-sm-4">
                          <?php $tarih =$bilgi['duyuruTarih'];
                          $tarih = explode(" ", $tarih);
                          $tarihDuyuru= tarih($tarih[0]);
                          ?>
                          <input disabled type="text" class="form-control"  value="<?php echo $tarihDuyuru; ?>">
                      </div>
                  </div>
              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/duyurular') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
