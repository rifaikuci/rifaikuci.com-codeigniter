<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('durum'); ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Dil Liste Formu</h3>

                    <a href="<?php echo base_url('yonetim/dilekle'); ?>" class="btn btn-primary pull-right"><i
                                class="fa fa-plus"> Ekle</i></a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>

                        <tr>
                            <th style="text-align:center">Sıra</th>
                            <th style="text-align:center">Dil Adı</th>
                            <th style="text-align:center">Dil Seo Adı</th>
                            <th style=" text-align:center; width:105px">İşlemler</th>
                        </tr>

                        </thead>

                        <?php $sayi = 1;
                        foreach ($bilgi as $bilgi) { ?>
                            <tr>

                                <td style="font-weight:bold;text-align: center">
                                    <?php echo $sayi++; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo $bilgi['ad']; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo $bilgi['seoAd']; ?>
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo base_url('yonetim/dilduzenle/' . $bilgi['id'] . ''); ?>">
                                        <button type="button" name='button' class="btn btn-info">Düzenle</button>
                                    </a>

                                    <a href="<?php echo base_url('yonetim/dilsil/' . $bilgi['id'] . '/id/tbldil'); ?>">
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
