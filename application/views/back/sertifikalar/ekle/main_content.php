<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Sertifikalar Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/sertifikalarekleme'); ?>" enctype="multipart/form-data"
                  method="post" class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Sertifika Adı</label>
                        <div class="col-sm-6">
                            <input required type="text" name="sertifika" class="form-control"
                                   placeholder="Sertifika Adı ... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Resim</label>
                        <div class="col-sm-6">
                            <input type="file" name="resim" class="form-control">
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/sertifikalar') ?>">Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                </div>

            </form>
        </div>
    </div>
</section>
