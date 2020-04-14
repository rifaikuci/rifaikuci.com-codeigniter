<section class="content">
    <div class="col-md-12">
        <?php echo $this->session->flashdata('durum'); ?>

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Bulanık Mantık GRA  </h3>
            </div>


            <form action="<?php echo base_url('yonetim/bulanik'); ?>" method="post" class="form-horizontal">
                <div class="box-body">
                    Bulanık Mantık GRA

                </div>

                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/anasayfa') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Güncelle</button>
                </div>
            </form>
        </div>
    </div>

</section>
