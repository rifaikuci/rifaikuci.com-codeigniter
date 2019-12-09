
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Kazılar Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/dijitalKaziguncelle'); ?>"  method="post" class="form-horizontal">
              <div class="box-body">


                <div class="form-group">
                  <label class="col-sm-2 control-label">Kazı Adı </label>
                    <div class="col-sm-10">
                    <input required type="text" name="kAdi" class="form-control"  value="<?php echo $bilgi['kAdi']; ?>">
                    <input required type="hidden" name="kId" class="form-control"  value="<?php echo $bilgi['kId']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kazı Adresi </label>
                    <div class="col-sm-10">
                    <input required type="text" name="kAdres" class="form-control"  value="<?php echo $bilgi['kAdres']; ?>">
                  </div>
                </div>




                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlama Tarihi</label>
                    <div class="col-sm-4">
                    <input  type="date" name="kBasTarih" class="form-control" value="<?php echo date('Y-m-d',strtotime($bilgi['kBasTarih'])) ?>">

                  </div>





                  <label style="margin-left:-40px" class="col-sm-2 control-label">Bitiş Tarihi </label>
                    <div class="col-sm-4">
                    <input  type="date" name="kBitTarih" value="<?php echo date('Y-m-d',strtotime($bilgi['kBitTarih'])) ?>"  class="form-control"  >
                  </div>
                </div>




                <div class="form-group">
                  <label class="col-sm-2 control-label">Durum </label>
                    <div class="col-sm-6">
                      <select  class="form-control" required name="kDurum">
                        <?php if(( $bilgi['kDurum'])==1){ ?>
                        <option selected  value="1">Aktif  </option>
                        <option  value="2">Pasif</option>
                      <?php }else {?>
                        <option   value="1">Aktif  </option>
                        <option selected value="2">Pasif</option>
                    <?php    } ?>
                      </select>
                  </div>
                </div>

              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/dijitalKazi') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>
