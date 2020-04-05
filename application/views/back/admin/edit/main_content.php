<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Yönetici Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/adminguncelle'); ?>" enctype="multipart/form-data" method="post"
                  class="form-horizontal">

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
                        <label class="col-sm-2 control-label">Özellik </label>
                        <div class="col-sm-10">
                            <input required type="text" name="ozellik" class="form-control"
                                   value="<?php echo $bilgi['ozellik']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Site URL </label>
                        <div class="col-sm-10">
                            <input required type="text" name="site_url" class="form-control"
                                   value="<?php echo $bilgi['site_url']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Site Adı </label>
                        <div class="col-sm-10">
                            <input required type="text" name="site_adi" class="form-control"
                                   value="<?php echo $bilgi['site_adi']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Version </label>
                        <div class="col-sm-10">
                            <input required type="text" name="version" class="form-control"
                                   value="<?php echo $bilgi['version']; ?>">
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

                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/admin') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>
            </form>
        </div>
    </div>

</section>
