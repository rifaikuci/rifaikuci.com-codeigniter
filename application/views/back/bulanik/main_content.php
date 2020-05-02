<section class="content">
    <div class="col-md-12">
        <?php echo $this->session->flashdata('durum'); ?>

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Bulanık Mantık GRA </h3>
            </div>


            <form action="<?php echo base_url('yonetim/bulanikVeri'); ?>" method="post" class="form-horizontal">
                <div class="box-body" id="app">

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Seçenekler</label>

                        <div class="col-sm-4">
                            <input type="text" v-model="veriSecenek" placeholder="Seçenek giriniz..."
                                   class="form-control">
                            <input type="hidden" name="secenek" :value="secenek" class="form-control">
                            <input type="hidden" name="kriter" :value="kriter" class="form-control">
                            <br>

                            <div class="alert alert-danger alert-dismissible" v-show="veriSecenek_is_hata">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <h4><i class="icon fa fa-close"></i>Hata!!! </h4> <span>Seçenek boş geçilemez</span>
                            </div>

                            <div style="text-align: center">
                                <button v-on:click="secenekEkle" class="btn btn-primary fa fa-plus">
                                    Seçenek Ekle
                                </button>
                            </div>

                            <br><br><br>

                            <u><strong>Seçenekler</strong></u>
                            <br><br>


                            <ul>
                                <li v-for="(s,index) in secenek">
                                    {{ s }}

                                    <a v-on:click="secenekSil(index)" class="btn  btn-danger pull-right">X</a>

                                    <br><br>
                                </li>
                            </ul>
                        </div>


                        <label class="col-sm-2 control-label">Kriter </label>
                        <div class="col-sm-4">
                            <input v-on:keyup.enter="kriterEkle" type="text" v-model="veriKriter"
                                   placeholder="Kriter giriniz..."
                                   class="form-control">
                            <br>

                            <div style="text-align: center">
                                <input checked type="radio" id="max" name="tur" v-model="tur" value="1">
                                <label style="margin-right: 50px" for="1"> Maksimun</label>

                                <input required type="radio" id="max" v-model="tur" name="tur" value="0">
                                <label for="0">Minimum</label>
                            </div>
                            <br>

                            <div class="alert alert-danger alert-dismissible" v-show="veriKriter_is_hata">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <h4><i class="icon fa fa-close"></i>Hata!!! </h4> <span>Kriter boş geçilemez</span>
                            </div>


                            <div style="text-align: center">
                                <button v-on:click="kriterEkle" class="btn btn-primary fa fa-plus">
                                    Kriter Ekle
                                </button>
                            </div>
                            <br>

                            <u><strong>Kriterler</strong></u>

                            <br><br>

                            <ul>
                                <li v-for="(k,index) in kriter">
                                    {{ k }}
                                    <a v-on:click="kriterSil(index)" class="btn  btn-danger pull-right">X</a>
                                    <br><br>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/anasayfa') ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-send">
                        &nbsp;&nbsp;&nbsp;&nbsp; İlerle&nbsp;&nbsp;&nbsp;
                    </button>
                </div>
            </form>
        </div>
    </div>

</section>
