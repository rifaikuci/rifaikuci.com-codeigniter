<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">GRA Veri Girişi</h3>
                    <div class="box-body">

                        <form action="<?php echo base_url('yonetim/bulanikVeriGirisi/'.count($secenek).'/'.count($kriter)) ?>" method="post"
                              class="form-horizontal">

                            <div class="form-group">
                                <div class="col-sm-6">

                                    <br><br>

                                    <u><strong>Seçenekler</strong></u>

                                    <ul>
                                        <br>

                                        <?php for ($i = 0; $i < count($secenek); $i++) { ?>
                                            <li style="margin: 5px">
                                                <?php $a = $i + 1;
                                                echo "S" . $a . " => " . $secenek[$i]; ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>


                                <div class="col-sm-6">

                                    <br><br>

                                    <u><strong>Kriterler</strong></u>

                                    <ul>
                                        <br>
                                        <?php for ($i = 0; $i < count($kriter); $i++) { ?>
                                            <li style="margin: 5px">
                                                <?php $a = $i + 1;
                                                echo "K" . $a . " => " . $kriter[$i]; ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                            </div>

                            <br><br><br>

                            <table id="example2" class="table table-bordered table-striped">

                                <thead>
                                <tr>
                                    <th style="width: 50px;text-align: center">Seçenekler</th>

                                    <?php for ($i = 0; $i < count($kriter); $i++) { ?>
                                        <th style="text-align: center">
                                            <?php $a = $i + 1;
                                            echo "K" . $a; ?>
                                        </th>
                                    <?php } ?>
                                </tr>
                                </thead>


                                <?php $i = 0;
                                while ($i < count($secenek)) { ?>
                                    <tr>
                                        <td style="text-align: center">
                                            <?php $a = $i + 1;
                                            echo "S" . $a; ?>
                                        </td>

                                        <?php for ($c = 0; $c < count($kriter); $c++) { ?>
                                            <td style="text-align: center">
                                                <input name="<?php echo $i . "-" . $c; ?>" step="0.0001" type="number"
                                                       style="width: 70px">
                                            </td>
                                        <?php }
                                        $i++; ?>
                                    </tr>
                                <?php } ?>
                            </table>
                    </div>

                </div>

                <br>
                <div class="box-footer">
                    <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/bulanikVeriGirisi/'.count($kriter).'/'.count($secenek)) ?>"> Vazgeç</a>
                    <button type="submit" class="btn btn-primary pull-right fa fa-plus"> Ekle</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>
</section>
