<section class="content">
    <div class="col-md-12">


        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Arkeolog Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/dijitalArkeologguncelle'); ?>" enctype="multipart/form-data"
                  method="post" class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ad Soyad </label>
                        <div class="col-sm-10">
                            <input required type="text" name="aName" class="form-control"
                                   value="<?php echo $bilgi['aName']; ?>">
                            <input type="hidden" name="aId" class="form-control" value="<?php echo $bilgi['aId']; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Mevcud Resim</label>
                        <div class="col-sm-4">
                            <img style="width:160px; height:160px; margin-left:50px;"
                                 src="<?php echo base_url("/") . $bilgi['aPhoto']; ?>" alt="Arkeolog Resmi"
                                 name="aPhoto"/>
                        </div>

                        <div class="" style="margin-top: 50px ;">
                            <label class="col-sm-2 control-label"> Yeni Resim</label>
                            <div class="col-sm-4">
                                <input type="file" name="aPhoto"/>
                                <p class="text-blue" style="font-weight:bold; margin-left: -100px; padding-top:25px;">
                                    Yeni Resim Seçmeyecekseniz Resim Seçmeyin Lütfen !!!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mail </label>
                            <div class="col-sm-4">
                                <input required type="text" name="aEmail" class="form-control"
                                       value="<?php echo $bilgi['aEmail']; ?>">
                            </div>

                            <label class="col-sm-2 control-label">Telefon </label>
                            <div class="col-sm-4">
                                <input required type="text" name="aPhone" class="form-control"
                                       value="<?php echo $bilgi['aPhone']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Durum </label>
                            <div class="col-sm-4">
                                <select class="form-control" required name="aStatus">
                                    <?php if (($bilgi['aStatus']) == 1) { ?>
                                        <option selected value="1">Aktif</option>
                                        <option value="2">Pasif</option>

                                    <?php } else { ?>
                                        <option value="1">Aktif</option>
                                        <option selected value="2">Pasif</option>
                                    <?php } ?>

                                </select>
                            </div>

                            <label class="col-sm-2 control-label">Kayıt Tarihi </label>
                            <div class="col-sm-4">
                                <input required type="text" disabled name="aDateSave" class="form-control"
                                       value=" <?php echo tarih($bilgi['aDateSave']); ?>">
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="box-footer">
            <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/dijitalArkeolog') ?>"> Vazgeç</a>
            <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
        </div>
        </form>

    </div>
    </div>
</section>
