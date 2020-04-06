<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Türler Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/turlerguncelle'); ?>" enctype="multipart/form-data" method="post"
                  class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür Adı </label>
                        <div class="col-sm-10">
                            <input required type="text" name="turAd" class="form-control"
                                   value="<?php echo $bilgi['turAd']; ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>">
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Açıklama </label>
                            <div class="col-sm-10">
                                <textarea name="turDetay" rows="8"
                                          cols="80"><?php echo $bilgi['turDetay']; ?></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Mevcud Resim</label>
                        <div class="col-sm-4">
                            <img style="width:160px; height:160px; margin-left:50px;"
                                 src="<?php echo $bilgi['turResim']; ?>" alt="Türün Resmi" name="turResim">
                        </div>
                        <div class="" style="margin-top: 50px ;">
                            <label class="col-sm-2 control-label"> Yeni Resim</label>
                            <div class="col-sm-4">
                                <input type="file" name="turResim">
                                <p class="text-blue" style="font-weight:bold; margin-left: -100px; padding-top:25px;">
                                    Yeni Resim Seçmeyecekseniz Resim Seçmeyin Lütfen !!!</p>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Enlem </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $bilgi['turEnlem']; ?>" name="turEnlem"
                                   class="form-control">

                        </div>

                        <label class="col-sm-2 control-label">Boylam </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $bilgi['turBoylam']; ?>" name="turBoylam"
                                   class="form-control" ">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür </label>
                        <div class="col-sm-4">


                            <select class="form-control" required name="tur">
                                <?php if (($bilgi['tur']) == "Kuş") { ?>
                                    <option selected value="Kuş">Kuş</option>
                                    <option value="Bitki">Bitki</option>
                                <?php } else { ?>
                                    <option value="Kuş">Kuş</option>
                                    <option selected value="Bitki">Bitki</option>
                                <?php } ?>
                            </select>
                        </div>

                        <label class="col-sm-2 control-label">Durum </label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="durum">
                                <?php if (($bilgi['durum']) == 1) { ?>
                                    <option selected value="Aktif">Aktif</option>
                                    <option value="Pasif">Pasif</option>
                                <?php } else { ?>
                                    <option value="Aktif">Aktif</option>
                                    <option selected value="Pasif">Pasif</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/turler') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>
            </form>
        </div>
    </div>

</section>
