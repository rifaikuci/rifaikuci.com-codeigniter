<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Sosyal Medya Hesap Güncelleme Formu</h3>
            </div>


            <form action="<?php echo base_url('yonetim/smedyaguncelle'); ?>" method="post" class="form-horizontal">
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Hesap Adı</label>
                        <div class="col-sm-6">
                            <input required type="text" name="ad" class="form-control"
                                   value="<?php echo $bilgi['ad']; ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>">

                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Url </label>
                        <div class="col-sm-6">
                            <input required type="text" name="url" class="form-control"
                                   value="<?php echo $bilgi['url']; ?>">
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/smedya') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>

            </form>
        </div>
    </div>

</section>
