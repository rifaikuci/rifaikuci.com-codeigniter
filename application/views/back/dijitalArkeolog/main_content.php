<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <?php echo $this->session->flashdata('durum'); ?>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Arkeologlar Listesi</h3>
                </div>
                <div class="box-body">

                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th style="text-align: center">Sıra</th>
                                <th style="text-align: center">Ad Soyad</th>
                                <th style="text-align: center">Mail</th>
                                <th style="width:160px;text-align: center">Resim</th>
                                <th style="width:105px;text-align: center">İşlemler</th>
                            </tr>
                        </thead>

                        <?php $sayi = 1;
                        foreach ($bilgi as $bilgi) { ?>
                            <tr>
                                <td style="font-weight:bold; text-align: center">
                                    <?php echo $sayi++; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo word_limiter($bilgi['aName'], 15); ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo word_limiter($bilgi['aEmail'], 15); ?>
                                </td>

                                <td style="padding-left:40px;text-align: center">
                                    <img src="<?php echo base_url("/") . $bilgi['aPhoto']; ?>"
                                         alt="<?php echo $bilgi['aName']; ?>" height="100" width="100">
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo base_url('yonetim/dijitalArkeologduzenle/' . $bilgi['aId'] . ''); ?>">
                                        <button type="button" name='button' class="btn btn-info">Düzenle</button>
                                    </a>

                                    <a href="<?php echo base_url('yonetim/dijitalArkeologsil/' . $bilgi['aId'] . '/aId/arkeologlar'); ?>">
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
