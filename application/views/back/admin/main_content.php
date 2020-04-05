<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('durum'); ?>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Yöneticiler Listesi</h3>
                    <a href="<?php echo base_url('yonetim/adminekle'); ?>" class="btn btn-primary pull-right"><i
                                class="fa fa-plus"> Ekle</i></a>
                </div>

                <div class="box-body">

                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th width="10px">Sıra</th>
                                <th style="text-align: center">Ad Soyad</th>
                                <th style="text-align: center">Resim</th>
                                <th style="text-align: center">İşlemler</th>
                            </tr>
                        </thead>

                        <?php $sayi = 1;

                        foreach ($bilgi as $bilgi) { ?>

                            <tr>
                                <td style="font-weight:bold; text-align: center">
                                    <?php echo $sayi++; ?>
                                </td>

                                <td style="text-align: center">
                                    <?php echo $bilgi['adsoyad']; ?>
                                </td>

                                <td style="text-align: center">
                                    <img style="margin-left:30px" src="<?php echo base_url('/') . $bilgi['resim']; ?>"
                                         alt="<?php echo $bilgi['adsoyad']; ?>" height="100" width="120">
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo base_url('yonetim/adminduzenle/' . $bilgi['id'] . ''); ?>">
                                        <button type="button" name='button' class="btn btn-info">Düzenle</button>
                                    </a>

                                    <a href="<?php echo base_url('yonetim/adminsil/' . $bilgi['id'] . '/id/tbladmin'); ?>">
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
