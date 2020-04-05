<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Kitap Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/okunacakekleme'); ?>" enctype="multipart/form-data" method="post"
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
                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/okunacak') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                </div>

            </form>
        </div>
    </div>
</section>
