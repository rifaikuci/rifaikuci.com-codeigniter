
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Eserler Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/dijitalEserguncelle'); ?>"   method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ad Soyad</label>
                    <div class="col-sm-10">
                    <input required type="text" name="eBaslik" class="form-control"  value="<?php echo $bilgi['eBaslik']; ?>">
                    <input  type="hidden" name="eId" class="form-control"  value="<?php echo $bilgi['eId']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">QR No</label>
                    <div class="col-sm-10">
                    <input required type="text" name="eRfid" disabled class="form-control"  value="<?php echo $bilgi['eRfid']; ?>">
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-2 control-label">Envanter </label>
                    <div class="col-sm-10">
                    <input required type="text" name="eEnvanter" class="form-control"   value="<?php echo $bilgi['eEnvanter']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label"> Konum Bilgileri</label>
                  <div class="col-sm-10">
                  <input required type="text" name="eKonum" class="form-control" disabled   value="<?php echo $bilgi['eKonum']; ?>">
                </div>

                  </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Durum </label>
                    <div class="col-sm-4">
                      <select  class="form-control" required name="eDurum">
                        <?php if(( $bilgi['eDurum'])==1){ ?>
                        <option selected  value="1">Aktif  </option>
                        <option  value="2">Pasif</option>
                      <?php }else {?>
                        <option   value="1">Aktif  </option>
                        <option selected value="2">Pasif</option>
                    <?php    } ?>
                      </select>
                  </div>
                  <label class="col-sm-2 control-label">Kayıt Tarihi </label>
                    <div class="col-sm-4">
                    <input required type="text" disabled name="eKayitTarih" class="form-control"
                    value=" <?php $tarih =$bilgi['eKayitTarih'];
                    $tarih = explode(" ", $tarih);


                    echo tarih($tarih[0]);

                     ?>">

                </div>
                </div>

             <div class="form-group">
                  <label class="col-sm-2 control-label"> Eser Detay</label>
                  <div class="col-sm-10">
                  <textarea required type="text" name="eBilgi" class="form-control"    value=""><?php echo $bilgi['eBilgi']; ?>
                      </textarea>
                </div>

                  </div>










                <div class="form-group">
                  <label style="margin-top:50px;" class="col-sm-2 control-label"> Mevcud Resim</label>
                    <div class="col-sm-4">
                    <img style="width:160px; height:160px; margin-left:50px;" src="<?php echo base_url("/"). $bilgi['eFoto']; ?>" alt="Eserler Resmi" name="eFoto">
                  </div>
                  <div class="" >
                  <label  style="margin-top:50px;" class="col-sm-2 control-label"> QR Kod  </label>
                    <div class="col-sm-4">
                      <?php if($bilgi['eQR']==null){?>
                        <a  href="<?php echo base_url('yonetim/dijitalQrKod/'.$bilgi['eId'].'/'.$bilgi['eRfid'].''); ?>">
                        <button  style="margin-top:50px;" type="button" name='button' class="btn btn-info">Qr Kodu Oluşturunuz</button></a>

            <?php } else {?>

              <img style="width:160px; height:160px; margin-left:50px;" src="<?php echo base_url('/').$bilgi['eQR']; ?>" alt="Qr Kod  Resmi" name="eQR">

            <?php } ?>

                  </div>
                  </div>
                </div>
                </div>
              </div>





              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/dijitalEser') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
