<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Okunacak Kitap Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/okunacakguncelle'); ?>" enctype="multipart/form-data"
                  method="post" class="form-horizontal">
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kitap Adı </label>
                        <div class="col-sm-10">
                            <input required type="text" name="kitapadi" class="form-control"
                                   value="<?php echo $bilgi['kitapadi']; ?>">
                            <input required type="hidden" name="id" class="form-control"
                                   value="<?php echo $bilgi['id']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Yazar Adı </label>
                        <div class="col-sm-10">
                            <input required type="text" name="yazaradi" class="form-control"
                                   value="<?php echo $bilgi['yazaradi']; ?>">
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/okunacak') ?>">
                        Vazgeç
                    </a>

                    <button type="submit" class="btn btn-primary pull-right fa fa-edit">
                        Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
