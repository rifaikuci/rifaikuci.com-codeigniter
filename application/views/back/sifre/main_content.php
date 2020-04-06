<?php

$idg = "";

$id = adminid();

foreach ($id as $id):
    $idg = $id['id'];
    ?>

<?php endforeach; ?>

<section class="content">
    <div class="col-md-12">
        <?php echo $this->session->flashdata('durum'); ?>

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Şifre Güncelleme Formu </h3>
            </div>


            <form action="<?php echo base_url('yonetim/sifreguncelle'); ?>" method="post" class="form-horizontal">
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mail Adresinizi Giriniz</label>
                        <div class="col-sm-6">
                            <input required type="mail" name="email" class="form-control"
                                   placeholder="mail Adresinizi Giriniz ... ">
                            <input required type="hidden" name="id" class="form-control" value="<?php echo $idg; ?>"
                                   placeholder="mail Adresinizi Giriniz ... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Eski Şifrenizi Giriniz</label>
                        <div class="col-sm-6">
                            <input required type="password" name="sifre" class="form-control" value=""
                                   placeholder="Eski Şifrenizi Giriniz ... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Yeni Şifrenizi Giriniz</label>
                        <div class="col-sm-6">
                            <input required type="password" name="sifre1" class="form-control" value=""
                                   placeholder="Yeni Şifrenizi Giriniz... ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Yeni Şifrenizi Tekrar Giriniz</label>
                        <div class="col-sm-6">
                            <input required type="password" name="sifre2" class="form-control" value=""
                                   placeholder="Yeni Şifrenizi Tekrar Giriniz.">
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/anasayfa') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>
            </form>
        </div>
    </div>

</section>
