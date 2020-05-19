<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Keşfet Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/turKesfetekleme'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür adı</label>
                        <div class="col-sm-6">
                            <input required type="text" name="turAd" class="form-control"
                                   placeholder="Tür adı giriniz  ... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür Detay</label>
                        <div class="col-sm-4">
                            <textarea name="turDetay" cols="50" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Paylaşan Kullanıcı</label>
                        <div class="col-sm-6">
                            <input required type="text" name="paylasanKullanici" class="form-control"
                                   placeholder="Paylaşan Kullanıcı  ... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Enlem</label>
                        <div class="col-sm-4">
                            <input name="turEnlem" type="text" placeholder="Enlem bilgisi giriniz"
                                   class="form-control">
                        </div>

                        <label class="col-sm-2 control-label">Boylam </label>
                        <div class="col-sm-4">
                            <input name="turBoylam" type="text" placeholder="Boylam bilgisi giriniz"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Durum </label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="durum">
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>

                        <label class="col-sm-2 control-label">Tür </label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="tur">
                                <option value="1">Bitki</option>
                                <option value="0">Kuş</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Resim</label>
                        <div class="col-sm-6">
                            <input type="file" name="turResim" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/turKesfet') ?>">
                        Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                </div>
            </form>
        </div>
    </div>
</section>
