<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('durum'); ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Kullanıcılar Listesi</h3>

                    <a href="<?php echo base_url('yonetim/turKullaniciekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Ekle</i></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="30px" >Sıra No </th>
                            <th>Ad Soyad</th>
                            <th>Mail Adresi</th>
                            <th>Kayıt Tarihi</th>
                            <th>Durum</th>
                            <th style="width:105px">İşlemler</th>
                        </tr>
                        </thead>

                        <?php $sayi=1; foreach ($bilgi as $bilgi) {?>
                            <tr>

                                <td  style="font-weight:bold"><?php echo  $sayi++; ?></td>
                                <td>  <?php echo $bilgi['adSoyad']; ?></td>
                                <td>  <?php echo $bilgi['mail']; ?></td>
                                <td>  <?php $tarih =$bilgi['kayitTarih'];
                                    $tarih = explode(" ", $tarih);


                                    echo tarih($tarih[0]);

                                    ?></td>
                                <td>
                                    <input
                                            class="toggle_check"
                                            data-on="Aktif"
                                            data-onstyle="success"
                                            data-off="Pasif"
                                            data-offstyle="danger"
                                            type="checkbox"
                                            dataID="<?php echo $bilgi['id']; ?>"
                                            dataURL="<?php echo base_url('yonetim/turKullaniciset'); ?>"
                                        <?php echo ($bilgi['durum']==1) ? "checked" : ""; ?>

                                    >
                                </td>
                                <td>
                                    <a href="<?php echo base_url('yonetim/turKullaniciduzenle/'.$bilgi['id'].''); ?>">
                                        <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                                    <a href="<?php echo base_url('yonetim/turKullanicisil/'.$bilgi['id'].'/id/turKullanici'); ?>">
                                        <button  type="button" name='button' class="btn btn-danger ">Sil</button></a>


                                </td>

                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
