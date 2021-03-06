<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Duyuru Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/duyurularekleme'); ?>" enctype="multipart/form-data"
                  method="post" class="form-horizontal">

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Duyuru </label>
                        <div class="col-sm-10">
                            <input required type="text" name="duyuruBaslik" class="form-control"
                                   placeholder="Duyuru giriniz... ">
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Detay </label>
                            <div class="col-sm-10">
                                <textarea name="duyuruDetay" rows="8" style="width: 100%" id="editor1"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Resim</label>
                        <div class="col-sm-10">
                            <input type="file" name="duyuruResim" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Durum</label>
                        <div class="col-sm-10">
                            <select class="form-control" required name="durum">
                                <option value="1">Aktif</option>
                                <option value="2">Pasif</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Duyuru Video Linki </label>
                        <div class="col-sm-10">
                            <input type="text" name="duyuruVideo" class="form-control"
                                   placeholder="Duyuru Video kodu giriniz... ">
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/duyurular') ?>">
                        Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                </div>

            </form>
        </div>
    </div>
</section>
