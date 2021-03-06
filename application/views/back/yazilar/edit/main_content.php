<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Yazı Güncelleme Formu</h3>
            </div>


            <form action="<?php echo base_url('yonetim/yazilarguncelle'); ?>" enctype="multipart/form-data"
                  method="post" class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Başlık </label>
                        <div class="col-sm-10">
                            <input required type="text" name="baslik" class="form-control"
                                   value="<?php echo $bilgi['baslik']; ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>">
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">İçerik </label>
                            <div class="col-sm-10">
                        <textarea name="icerik" id="editor1" rows="8" cols="80">
                      <?php echo $bilgi['icerik']; ?>
                        </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Video Linki </label>
                        <div class="col-sm-10">
                            <input type="text" name="video" class="form-control" value="<?php echo $bilgi['video']; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Mevcud Resim</label>
                        <div class="col-sm-4">
                            <img style="width:160px; height:160px; margin-left:50px;"
                                 src="<?php echo base_url() . $bilgi['resim']; ?>" alt="Yazarın Resmi" name="resim">
                        </div>
                        <div class="" style="margin-top: 50px ;">
                            <label class="col-sm-2 control-label"> Yeni Resim</label>
                            <div class="col-sm-4">
                                <input type="file" name="resim">
                                <p class="text-blue" style="font-weight:bold; margin-left: -100px; padding-top:25px;">
                                    Yeni Resim Seçmeyecekseniz Resim Seçmeyin Lütfen !!!</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür </label>
                        <div class="col-sm-10">
                            <input required type="text" name="tur" class="form-control"
                                   value="<?php echo $bilgi['tur']; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Anahtar Kelimeler </label>
                        <div class="col-sm-10">
                            <input required type="text" name="keywords" class="form-control"
                                   value="<?php echo $bilgi['keywords']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Açıklama </label>
                        <div class="col-sm-10">
                            <textarea type="text" rows="3" name="aciklama" class="form-control"
                                      placeholder="Sitenin dinamik olması için açıklama giriniz. "><?php echo $bilgi['aciklama']; ?></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Durum </label>
                        <div class="col-sm-10">
                            <select class="form-control" required name="durum">
                                <?php if (($bilgi['durum']) == 1) { ?>
                                    <option selected value="1">Aktif</option>
                                    <option value="2">Pasif</option>
                                <?php } else { ?>
                                    <option value="1">Aktif</option>
                                    <option selected value="2">Pasif</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/yazilar') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>

            </form>
        </div>
    </div>

</section>
