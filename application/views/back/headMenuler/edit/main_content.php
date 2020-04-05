<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Head Menü Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/headguncelle'); ?>" method="post" class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Head Adı</label>
                        <div class="col-sm-6">
                            <input required type="text" name="headAdi" class="form-control"
                                   value="<?php echo $bilgi['headAdi']; ?>" placeholder="Haber Başlık">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>">
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Header Menü Durum </label>
                        <div class="col-sm-6">

                            <select class="form-control" name="durum">
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
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/headMenu') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>
            </form>
        </div>
    </div>

</section>
