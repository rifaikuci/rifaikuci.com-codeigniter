<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Özellik Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/ozelliklerguncelle'); ?>" enctype="multipart/form-data"
                  method="post" class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Özellik Adı</label>
                        <div class="col-sm-6">
                            <input required type="text" name="ozellik" class="form-control"
                                   value="<?php echo $bilgi['ozellik']; ?>" placeholder="Özellik Adı">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Mevcud Resim</label>
                        <div class="col-sm-4">
                            <img style="width:160px; height:160px; margin-left:50px;" src="<?php echo base_url() . $bilgi['resim']; ?>"
                                 alt="<?php echo $bilgi['ozellik']; ?>" name="resim">
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
                        <label style="margin-top:10px; " class="col-sm-2 control-label">Puan </label>
                        <div class="col-sm-6">
                            <input value="<?php echo $bilgi['puan']; ?>" type="range" min="0" max="100" name="puan" style="width:100%" />
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/ozellikler') ?>">Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</section>
