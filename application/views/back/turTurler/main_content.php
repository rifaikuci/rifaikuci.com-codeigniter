<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('durum'); ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Türler Listesi</h3>
                </div>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="text-align:center">Sıra</th>
                            <th style="text-align:center">Tür</th>
                            <th style="text-align:center">Tür adı</th>
                            <th style="text-align:center">Tür Detayı</th>
                            <th style=" text-align:center;">İşlemler</th>
                        </tr>
                        </thead>

                        <?php $sayi = 1;
                        foreach ($bilgi as $bilgi) { ?>
                            <tr>
                                <td style="font-weight:bold;text-align: center">
                                    <?php echo $sayi++; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo $bilgi['tur']; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo $bilgi['turAd']; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo word_limiter($bilgi['turDetay'], 5); ?>
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo base_url('yonetim/turgoruntule/' . $bilgi['id'] . ''); ?>">
                                        <button type="button" name='button' class="btn btn-info">Görüntüle</button>
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
