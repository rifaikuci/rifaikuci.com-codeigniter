<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <?php echo $this->session->flashdata('durum'); ?>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Kazılar Listesi</h3>
                </div>

                <div class="box-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="text-align: center">Sıra</th>
                            <th style="text-align: center">Kazı Adı</th>
                            <th style="text-align: center">Kazı Yeri</th>
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
                                    <?php echo $bilgi['kAdi']; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo $bilgi['kAdres']; ?>
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo base_url('yonetim/dijitalKaziduzenle/' . $bilgi['kId'] . ''); ?>">
                                        <button type="button" name='button' class="btn btn-info">Düzenle</button>
                                    </a>

                                    <a href="<?php echo base_url('yonetim/dijitalKazisil/' . $bilgi['kId'] . '/kId/kazilar'); ?>">
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
