<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Yönetici Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/adminekleme'); ?>" enctype="multipart/form-data" method="post"
                  class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ad Soyad </label>
                        <div class="col-sm-10">
                            <input required type="text" name="adsoyad" class="form-control"
                                   placeholder="Ad Soyad Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Özellik </label>
                        <div class="col-sm-10">
                            <input required type="text" name="ozellik" class="form-control"
                                   placeholder="Özellik Giriniz...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Site URL </label>
                        <div class="col-sm-10">
                            <input required type="text" name="site_url" class="form-control"
                                   placeholder="Site URL Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Site Adı </label>
                        <div class="col-sm-10">
                            <input required type="text" name="site_adi" class="form-control"
                                   placeholder="Site Adı Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Version </label>
                        <div class="col-sm-10">
                            <input required type="text" name="version" class="form-control" placeholder="Version... ">
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
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/admin') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                </div>

            </form>
        </div>
    </div>

</section>
