<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('durum'); ?>
            <div class="box">

                <div class="box-header">
                    <h3 class="box-title">Duyurular Listesi</h3>

                    <a href="<?php echo base_url('yonetim/duyurularekle'); ?>" class="btn btn-primary pull-right"><i
                                class="fa fa-plus"> Ekle</i></a>
                </div>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="text-align: center">Sıra</th>
                            <th style="text-align: center">Duyuru</th>
                            <th style="text-align: center">Detay</th>
                            <th style="text-align: center">Tarih</th>
                            <th style="text-align: center">Durum</th>
                            <th style="text-align: center">İşlemler</th>
                        </tr>
                        </thead>

                        <?php $sayi = 1;
                        foreach ($bilgi as $bilgi) { ?>
                            <tr>
                                <td style="font-weight:bold;text-align: center">
                                    <?php echo $sayi++; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo word_limiter($bilgi['duyuruBaslik'], 2); ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo word_limiter($bilgi['duyuruDetay'], 2); ?>

                                </td>

                                <td style="text-align: center">
                                    <?php echo tarih($bilgi['duyuruTarih']); ?>

                                <td style="text-align: center">
                                    <input
                                            class="toggle_check"
                                            data-on="Aktif"
                                            data-onstyle="success"
                                            data-off="Pasif"
                                            data-offstyle="danger"
                                            type="checkbox"
                                            dataID="<?php echo $bilgi['id']; ?>"
                                            dataURL="<?php echo base_url('yonetim/duyurularset'); ?>"
                                        <?php echo ($bilgi['durum'] == "1") ? "checked" : ""; ?>>
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo base_url('yonetim/duyurularduzenle/' . $bilgi['id'] . ''); ?>">
                                        <button type="button" name='button' class="btn btn-info">Düzenle</button>
                                    </a>

                                    <a href="<?php echo base_url('yonetim/duyurularsil/' . $bilgi['id'] . '/id/tblduyurular'); ?>">
                                        <button type="button" name='button' class="btn btn-danger ">Sil</button>
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
