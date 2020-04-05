<section class="content">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Dil Ekleme Formu</h3>
            </div>
            <form action="<?php echo base_url('yonetim/dilekleme'); ?>" method="post" class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Dil Adı</label>
                        <div class="col-sm-6">
                            <input required type="text" name="ad" class="form-control" placeholder="Eğitim  Adı ... ">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/dil') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                </div>
            </form>

        </div>
    </div>

</section>
