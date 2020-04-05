<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('durum'); ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Eserler Listesi</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="text-align: center">Sıra</th>
                            <th style="text-align: center">Rfid </th>
                            <th style="text-align: center">Başlık</th>
                            <th style="text-align: center">Resim</th>
                            <th style="width:105px;text-align: center">İşlemler</th>
                        </tr>
                        </thead>

                        <?php $sayi = 1;
                        foreach ($bilgi as $bilgi) { ?>

                            <tr>
                                <td style="font-weight:bold;text-align: center">
                                    <?php echo $sayi++; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo word_limiter($bilgi['eRfid'], 15); ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo word_limiter($bilgi['eBaslik'], 15); ?>
                                </td>

                                <td style="text-align: center">
                                    <img style="text-align: center" src="<?php echo $bilgi['eFoto']; ?>"
                                         alt="<?php echo $bilgi['eBaslik']; ?>" height="100" width="120">
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo base_url('yonetim/dijitalEserduzenle/' . $bilgi['eId'] . ''); ?>">
                                        <button type="button" name='button' class="btn btn-info">Düzenle</button>
                                    </a>
                                    <a href="<?php echo base_url('yonetim/dijitalEsersil/' . $bilgi['eId'] . '/eId/eserler'); ?>">
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
