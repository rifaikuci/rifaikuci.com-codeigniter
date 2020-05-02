<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <?php if (($h = fopen(base_url("/") . "application/controllers/bulanik/tablo2.csv", "r")) !== FALSE) {

                    while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {
                        $the_big_array[] = $data;
                    }
                    fclose($h);

                    $secenek = count($the_big_array);
                    $count = 0;

                    foreach ($the_big_array as $type) {
                        $count += count($type);
                    }
                    $kriter = $count / count($the_big_array);

                } ?>

                <div class="col-sm-6"><br><br>

                    <u><strong>Seçenekler</strong></u>

                    <ul>
                        <br>
                        <?php for ($i = 0; $i < $secenek - 1; $i++) { ?>

                            <li style="margin: 5px">
                                <?php $a = $i + 1;
                                echo "S" . $a . " => " . $the_big_array[$a][0]; ?>
                            </li>

                        <?php } ?>
                    </ul>
                </div>

                <div class="col-sm-6"><br><br>
                    <u><strong>Kriterler</strong></u>
                    <ul><br>

                        <?php for ($i = 0; $i < $kriter - 1; $i++) { ?>
                            <li style="margin: 5px">
                                <?php $a = $i + 1;
                                echo "K" . $a . " => " . $the_big_array[0][$a]; ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <br><br><br>
        </div>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 style="text-align: center">Bulanik Ağırlık Girişleri</h1>
                    <form action="<?php echo base_url('yonetim/bulanikAgirlikVeri' . '/' . $kriter); ?>" method="post"
                          class="form-horizontal">

                        <table id="example2" class="table table-bordered table-striped">

                            <thead>
                            <th style="width: 50px;text-align: center">#</th>

                            <?php for ($i = 1; $i < $kriter; $i++) { ?>
                                <th style="width: 50px;text-align: center">
                                    <?php echo "K" . $i; ?>
                                </th>
                            <?php } ?>
                            </thead>

                            <tr>
                                <td style="text-align: center;"><b>#W</b></td>
                                <?php for ($i = 1; $i < $kriter; $i++) { ?>
                                    <td style="width: 50px;text-align: center">
                                        <input name="0" value="#w" type="hidden">
                                        <input name="<?php echo $i; ?>"  step="0.001"
                                               type="number"
                                               style="width: 70px;text-align: center">
                                    </td>
                                <?php } ?>
                            </tr>

                            <?php $i = 1;
                            while ($i < $secenek) { ?>
                                <tr>
                                    <td style="text-align: center">
                                        <?php echo "S" . $i; ?>
                                    </td>

                                    <?php for ($c = 1; $c < $kriter; $c++) { ?>
                                        <td style="text-align: center">
                                            <?php echo $the_big_array[$i][$c]; ?>
                                        </td>
                                    <?php }
                                    $i++; ?>
                                </tr>
                            <?php } ?>
                        </table>
                        <div class="box-footer">
                            <a class="btn btn-warning fa fa-close" href="#"> Vazgeç</a>
                            <button type="submit" class="btn btn-primary pull-right fa fa-edit"> Analizi Çözümle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
