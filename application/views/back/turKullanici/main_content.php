<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('durum'); ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Kullanıcılar Listesi</h3>

                    <a href="<?php echo base_url('yonetim/turKullaniciekle'); ?>" class="btn btn-primary pull-right"><i
                                class="fa fa-plus"> Ekle</i></a>
                </div>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="text-align: center">Sıra</th>
                            <th style="text-align: center">Ad Soyad</th>
                            <th style="text-align: center">Mail</th>
                            <th style="text-align: center">Kayıt Tarihi</th>
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
                                    <?php echo $bilgi['adSoyad']; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo $bilgi['mail']; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo tarih($bilgi['kayitTarih']); ?>
                                </td>

                                <td style="text-align: center">
                                    <input
                                            class="toggle_check"
                                            data-on="Aktif"
                                            data-onstyle="success"
                                            data-off="Pasif"
                                            data-offstyle="danger"
                                            type="checkbox"
                                            dataID="<?php echo $bilgi['id']; ?>"
                                            dataURL="<?php echo base_url('yonetim/turKullaniciset'); ?>"
                                        <?php echo ($bilgi['durum'] == 1) ? "checked" : ""; ?>>
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo base_url('yonetim/turKullaniciduzenle/' . $bilgi['id'] . ''); ?>">
                                        <button type="button" name='button' class="btn btn-info">Düzenle</button>
                                    </a>

                                    <a href="<?php echo base_url('yonetim/turKullanicisil/' . $bilgi['id'] . '/id/turKullanici'); ?>">
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
