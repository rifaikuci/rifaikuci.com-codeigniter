<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tür Görüntüleme Formu</h3>
            </div>

            <form action="" method="post" class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür Adı</label>
                        <div class="col-sm-5">
                            <input required type="text" name="turAd" class="form-control"
                                   value="<?php echo $bilgi['turAd']; ?>" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür Detay</label>
                        <div class="col-sm-4">
                            <textarea disabled cols="50" rows="3"><?php echo $bilgi['turDetay']; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Enlem</label>
                        <div class="col-sm-4">
                            <input disabled type="text" value="<?php echo $bilgi['turEnlem']; ?>"
                                   class="form-control">
                        </div>

                        <label class="col-sm-2 control-label">Boylam </label>
                        <div class="col-sm-4">
                            <input disabled type="text" value="<?php echo $bilgi['turBoylam']; ?>"
                                   class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür</label>
                        <div class="col-sm-4">
                            <input disabled type="text" value="<?php echo $bilgi['tur']; ?>"
                                   class="form-control">
                        </div>

                        <label class="col-sm-2 control-label">Kayıt Tarihi </label>
                        <div class="col-sm-4">
                            <input disabled type="text" value="<?php echo tarih($bilgi['turKayitTarih']); ?>"
                                   class="form-control">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür Resmi</label>
                        <div class="col-sm-6">
                            <img style="width:500px; height:320px; " src="<?php echo $bilgi['turResim']; ?>"
                                 alt="Tür resmi" name="resim">
                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="<?php echo base_url('yonetim/turTurler'); ?>" type="submit"
                           class="btn btn-primary pull-right fa fa-edit"> Tür listesine geri dön </a>
                    </div>
            </form>
        </div>
    </div>
</section>
