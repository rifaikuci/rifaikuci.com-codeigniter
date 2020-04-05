<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Genel Ayar Ekleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/genelayarekleme'); ?>" enctype="multipart/form-data"
                  method="post" class="form-horizontal">
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title </label>
                        <div class="col-sm-10">
                            <input required type="text" name="title" class="form-control"
                                   placeholder="Title Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Logo Title </label>
                        <div class="col-sm-10">
                            <input required type="text" name="logotitle" class="form-control"
                                   placeholder="Logo Title Giriniz...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Resim</label>
                        <div class="col-sm-10">
                            <input type="file" name="resim" class="form-control">
                        </div>
                    </div>

                    <div class="box-footer">
                        <a class="btn btn-warning fa fa-close"
                           href="<?php echo base_url('yonetim/genelayar') ?>">Vazgeç</a>
                        <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</section>
