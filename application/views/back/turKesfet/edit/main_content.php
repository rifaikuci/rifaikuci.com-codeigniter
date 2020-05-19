<section class="content">
    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Kesfet Güncelleme Formu</h3>
            </div>

            <form action="<?php echo base_url('yonetim/turKesfetguncelle'); ?>" method="post"
                  enctype="multipart/form-data"
                  class="form-horizontal">

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür Adı</label>
                        <div class="col-sm-5">
                            <input required type="text" name="turAd" class="form-control"
                                   value="<?php echo $bilgi['turAd']; ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $bilgi['id']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tür Detay</label>
                        <div class="col-sm-4">
                            <textarea name="turDetay" cols="80" rows="3"><?php echo $bilgi['turDetay']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Paylaşan Kullanıcı</label>
                        <div class="col-sm-4">
                            <input name="paylasanKullanici" type="text" value="<?php echo $bilgi['paylasanKullanici']; ?>"
                                   class="form-control">
                        </div>

                        <label class="col-sm-2 control-label">Tarih </label>
                        <div class="col-sm-4">
                            <input disabled type="text" value="<?php echo tarih($bilgi['turKayitTarih']); ?>"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Enlem</label>
                        <div class="col-sm-4">
                            <input name="turEnlem" type="text" value="<?php echo $bilgi['turEnlem']; ?>"
                                   class="form-control">
                        </div>

                        <label class="col-sm-2 control-label">Boylam </label>
                        <div class="col-sm-4">
                            <input name="turBoylam" type="text" value="<?php echo $bilgi['turBoylam']; ?>"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Durum </label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="durum">
                                <?php if (($bilgi['durum']) == 1) { ?>
                                    <option selected value="1">Aktif</option>
                                    <option value="2">Pasif</option>
                                <?php } else { ?>
                                    <option value="1">Aktif</option>
                                    <option selected value="2">Pasif</option>
                                <?php } ?>
                            </select>
                        </div>

                        <label class="col-sm-2 control-label">Tür </label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="tur">
                                <?php if (($bilgi['tur']) == "Bitki") { ?>
                                    <option selected value="1">Bitki</option>
                                    <option value="0">Kuş</option>
                                <?php } else { ?>
                                    <option value="1">Bitki</option>
                                    <option selected value="0">Kuş</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Mevcud Resim</label>
                        <div class="col-sm-4">
                            <img style="width:160px; height:160px; margin-left:50px;"
                                 src="<?php echo $bilgi['turResim']; ?>" alt="Keşfet resmi" name="turResim">
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


                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/turKesfet') ?>">
                        Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>
            </form>

        </div>
    </div>

</section>
