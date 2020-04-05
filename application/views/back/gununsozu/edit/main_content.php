<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Günün Sözü Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/gununsozuguncelle'); ?>" enctype="multipart/form-data"
                  method="post" class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ad Soyad </label>
                        <div class="col-sm-10">
                            <input required type="text" name="adsoyad" class="form-control"
                                   value="<?php echo $bilgi['adsoyad']; ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>">
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

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ad Soyad </label>
                            <div class="col-sm-10">
                                <input required type="text" name="gununsozu" class="form-control"
                                       value="<?php echo $bilgi['gununsozu']; ?>">
                            </div>
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
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/gununsozu') ?>">
                        Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>

            </form>
        </div>
    </div>
</section>
