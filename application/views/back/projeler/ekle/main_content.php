
    <section class="content">
      <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Proje Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/projelerekleme'); ?>" enctype="multipart/form-data"  method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlık </label>
                    <div class="col-sm-10">
                    <input required type="text" name="baslik" class="form-control"  placeholder="Başlık ">
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-2 control-label">Resim</label>
                    <div class="col-sm-10">
                    <input  type="file" name="resim" class="form-control"  >


                  </div>
                </div>

                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">İçerik </label>
                      <div class="col-sm-10">
                        <textarea name="icerik" id="editor1" rows="8" cols="80"></textarea>
                    </div>
                  </div>
                </div>


                <?php
                $sonuc =$this->dtbs->listele('tblkategoriler');
                  $data['bilgi'] = $sonuc;
                 ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kategoriler </label>
                    <div class="col-sm-10">
                      <select  class="form-control" required name="idkategori">
                        <?php $bilgi= kategoriliste(); foreach ($bilgi as $bilgi) { ?>
                        <option value="<?php  echo $bilgi['id']; ?>"><?php  echo $bilgi['ad']; ?></option>
                      <?php   } ?>

                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Anahtar Kelimeler </label>
                    <div class="col-sm-10">
                    <input required type="text" name="keywords" class="form-control"  placeholder="Anahtar Kelimeler arasında virgül olacak şekilde yazınız. ">
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-2 control-label">Durum </label>
                    <div class="col-sm-10">
                      <select  class="form-control" required name="durum">


                        <option  value="1">Aktif  </option>
                        <option  value="2">Pasif</option>

                      </select>
                  </div>
                </div>
              </div>


              <!-- /.box-body -->
              <div class="box-footer">
                <a class= "btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/projeler') ?>"> Vazgeç</a>
                <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>