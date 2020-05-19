<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Kullanıcı Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/turKullaniciguncelle'); ?>" method="post"
                  enctype="multipart/form-data"
                  class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Adı Soyadı</label>
                        <div class="col-sm-6">
                            <input required type="text" name="adSoyad" class="form-control"
                                   value="<?php echo $bilgi['adSoyad']; ?>" placeholder="Ad soyad giriniz...">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mail Adresiniz</label>
                        <div class="col-sm-6">
                            <input required type="email" name="mail" class="form-control"
                                   value="<?php echo $bilgi['mail']; ?>" placeholder="Mail  giriniz...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Şifre</label>
                        <div class="col-sm-6">
                            <input required type="password" name="sifre" class="form-control"
                                   value="<?php echo $bilgi['sifre']; ?>" placeholder="Şifre  giriniz...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Mevcud Resim</label>
                        <div class="col-sm-4">
                            <img style="width:160px; height:160px; margin-left:50px;"
                                 src="<?php echo $bilgi['resim']; ?>" alt="Kullanıcı Resmi" name="resim">
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
                        <label class="col-sm-2 control-label">Durum </label>
                        <div class="col-sm-6">
                            <select class="form-control" required name="durum">
                                <?php if (($bilgi['durum']) == 1) { ?>
                                    <option selected value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                <?php } else { ?>
                                    <option value="1">Aktif</option>
                                    <option selected value="0">Pasif</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/turKullanici') ?>">
                        Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>
            </form>

        </div>
    </div>

</section>
