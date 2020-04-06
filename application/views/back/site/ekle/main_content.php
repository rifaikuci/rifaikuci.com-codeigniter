<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Site Ayar Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/siteekleme'); ?>" enctype="multipart/form-data" method="post"
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
                        <label class="col-sm-2 control-label">Başlık </label>
                        <div class="col-sm-10">
                            <input required type="text" name="baslik" class="form-control"
                                   placeholder="Başlık Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Özellik </label>
                        <div class="col-sm-10">
                            <input required type="text" name="ozellik" class="form-control"
                                   placeholder="Özellik Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Resim</label>
                        <div class="col-sm-10">
                            <input type="file" name="resim" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mail </label>
                        <div class="col-sm-10">
                            <input required type="mail" name="mail" class="form-control" placeholder="Mail Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telefon </label>
                        <div class="col-sm-10">
                            <input required type="text" name="telefon" class="form-control"
                                   placeholder="Telefon Giriniz... ">
                        </div>
                    </div>


                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Hakkımda </label>
                            <div class="col-sm-10">
                                <textarea name="hakkimda" id="editor1" rows="8" cols="80"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Adres </label>
                        <div class="col-sm-10">
                            <input required type="text" name="adres" class="form-control"
                                   placeholder="Adres Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Footer Ad </label>
                        <div class="col-sm-10">
                            <input required type="text" name="footerAd" class="form-control"
                                   placeholder="Footer Adı  Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Footer Link </label>
                        <div class="col-sm-10">
                            <input required type="text" name="footerLink" class="form-control"
                                   placeholder="Footer Linki Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Durum </label>
                        <div class="col-sm-10">
                            <select class="form-control" required name="durum">
                                <option value="1">Aktif</option>
                                <option value="2">Pasif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/site') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                </div>

            </form>
        </div>
    </div>

</section>
