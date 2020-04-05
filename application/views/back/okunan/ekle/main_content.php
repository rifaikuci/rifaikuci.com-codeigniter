<?php date_default_timezone_set('Europe/Istanbul'); ?>
<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Kitap Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/okunanekleme'); ?>" enctype="multipart/form-data" method="post"
                  class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kitap Adı </label>
                        <div class="col-sm-10">
                            <input required type="text" name="kitapadi" class="form-control"
                                   placeholder="Kitap Adı Giriniz.. ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Yazar Adı </label>
                        <div class="col-sm-10">
                            <input required type="text" name="yazaradi" class="form-control"
                                   placeholder="Yazar Adı Giriniz.. ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Yayınevi </label>
                        <div class="col-sm-10">
                            <input required type="text" name="yayinevi" class="form-control"
                                   placeholder="Yayınevi Adı Giriniz.. ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Sayfa Sayısı </label>
                        <div class="col-sm-4">
                            <input required type="number" name="sayfa" class="form-control"
                                   placeholder="Sayfa Sayısı Giriniz.. ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Başlama Tarihi</label>
                        <div class="col-sm-4">
                            <input type="date" value="<?php echo date('Y-m-d') ?>" name="baslatarihi"
                                   class="form-control">
                        </div>

                        <label class="col-sm-2 control-label">Bitiş Tarihi </label>
                        <div class="col-sm-4">
                            <input type="date" value="<?php echo date('Y-m-d') ?>" name="bitistarihi"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Resim</label>
                        <div class="col-sm-10">
                            <input type="file" name="resim" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/okunan') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                </div>
            </form>

        </div>
    </div>
</section>
