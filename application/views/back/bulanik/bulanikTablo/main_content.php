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
                    <h1 style="text-align: center">Veri Tablosu</h1>
                    <table id="example2" class="table table-bordered table-striped">

                        <thead>
                        <th style="width: 50px;text-align: center">#</th>

                        <?php for ($i = 1; $i < $kriter; $i++) { ?>
                            <th style="width: 50px;text-align: center">
                                <?php echo "K" . $i; ?>
                            </th>
                        <?php } ?>
                        </thead>

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

                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 style="text-align: center">Referans Serisi</h1>
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
                            <td style="text-align: center">
                                <?php echo "RS" ?>
                            </td>

                            <?php $referansSerisi = array();
                            for ($i = 1; $i < $kriter; $i++) {
                                if (strpos($the_big_array[0][$i], "Max")) {

                                    $sonuc = $the_big_array[1][$i];
                                    for ($k = 1; $k < $secenek; $k++) {
                                        if ($sonuc < $the_big_array[$k][$i]) {
                                            $sonuc = $the_big_array[$k][$i];
                                        }
                                    }
                                } else {

                                    $sonuc = $the_big_array[1][$i];
                                    for ($k = 1; $k < $secenek; $k++) {
                                        if ($sonuc > $the_big_array[$k][$i]) {
                                            $sonuc = $the_big_array[$k][$i];
                                        }
                                    }

                                }

                                $a = $i - 1;
                                $referansSerisi[$a] = $sonuc;
                            }
                            for ($i = 0; $i < count($referansSerisi); $i++) { ?>

                                <td style="text-align: center">
                                    <?php echo $referansSerisi[$i]; ?>
                                </td>

                            <?php } ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 style="text-align: center">Normalize edilmiş veriler (Normalized data)</h1>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <th style="width: 50px;text-align: center">#</th>

                        <?php for ($i = 1; $i < $kriter; $i++) { ?>
                            <th style="width: 50px;text-align: center">
                                <?php echo "K" . $i; ?>
                            </th>
                        <?php } ?>
                        </thead>

                        <?php
                        function minKriter($the_big_array, $secenek, $kriter)
                        {
                            $mins = array();

                            for ($i = 1; $i < $kriter; $i++) {

                                $minm = $the_big_array[1][$i];

                                for ($j = 1; $j < $secenek; $j++) {
                                    if ($the_big_array[$j][$i] < $minm)
                                        $minm = $the_big_array[$j][$i];
                                }

                                array_push($mins, $minm);
                            }
                            return $mins;
                        }

                        function maxKriter($the_big_array, $secenek, $kriter)
                        {
                            $maxs = array();
                            for ($i = 1; $i < $kriter; $i++) {
                                $maxm = $the_big_array[1][$i];

                                for ($j = 1; $j < $secenek; $j++) {

                                    if ($the_big_array[$j][$i] > $maxm)
                                        $maxm = $the_big_array[$j][$i];
                                }

                                array_push($maxs, $maxm);
                            }
                            return $maxs;
                        }

                        $maxKriter = maxKriter($the_big_array, $secenek, $kriter);

                        $minKriter = minKriter($the_big_array, $secenek, $kriter); ?>

                        <tr>
                            <td style="text-align: center;">
                                <?php echo "<strong>RS</strong>" ?>
                            </td>

                            <?php for ($i = 1; $i < $kriter; $i++) { ?>
                                <td style="text-align: center">
                                    <strong>1</strong>
                                </td>
                            <?php } ?>
                        </tr>

                        <?php for ($j = 1; $j < $secenek; $j++) {
                            $a = 0; ?>

                            <tr>
                                <td style="text-align: center">
                                    <?php echo "S" . $j; ?>
                                </td>

                                <?php for ($i = 1; $i < $kriter; $i++) {

                                    $maxs = $maxKriter[$i - 1];
                                    $mins = $minKriter[$i - 1];

                                    if (strpos($the_big_array[0][$i], "Min")) {
                                        $a = 1;
                                        $k = $a - 1;

                                        while ($a < $secenek) {

                                            if ($a == $j) {
                                                $islem = ($maxs - $the_big_array[$a][$i]) / ($maxs - $mins);
                                            }

                                            $a++;
                                        } ?>

                                        <td style="text-align: center">
                                            <?php echo number_format($islem, 2); ?>
                                        </td>

                                    <?php } else {

                                        $a = 1;
                                        $k = $a - 1;

                                        while ($a < $secenek) {

                                            if ($a == $j) {
                                                $islem = ($the_big_array[$a][$i] - $mins) / ($maxs - $mins);
                                            }

                                            $a++;
                                        }
                                        ?>

                                        <td style="text-align: center">
                                            <?php echo number_format($islem, 2); ?>
                                        </td>

                                    <?php } ?>
                                    <?php $a++;

                                    $the_big_array[$j][$i] = number_format($islem, 2);
                                } ?>
                            </tr>

                        <?php } ?>
                    </table>


                    <?php
                    $ac = fopen(__DIR__ . "/../../../../controllers/bulanik/tablo3.csv", "w+");

                    $aktarilacak = "";

                    for ($i = 0; $i < $secenek; $i++) {

                        for ($j = 0; $j < $kriter; $j++) {

                            if ($j == $kriter - 1) {
                                $aktarilacak = $aktarilacak . $the_big_array[$i][$j];
                            } else {
                                $aktarilacak = $aktarilacak . $the_big_array[$i][$j] . ",";
                            }
                        }
                        $aktarilacak = $aktarilacak . "\n";
                    }

                    fwrite($ac, $aktarilacak);
                    fclose($ac); ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 style="text-align: center">Mutlak değer tablosu (Absolute value table)</h1>
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
                            <td style="text-align: center;">
                                <?php echo "<strong>RS</strong>" ?>
                            </td>

                            <?php for ($i = 1; $i < $kriter; $i++) { ?>
                                <td style="text-align: center">
                                    <strong>1</strong>
                                </td>
                            <?php } ?>
                        </tr>

                        <?php for ($i = 1; $i < $secenek; $i++) { ?>
                            <tr>
                                <td style="text-align: center"><?php echo "S" . $i; ?></td>

                                <?php for ($j = 1; $j < $kriter; $j++) { ?>

                                    <td style="text-align: center">
                                        <?php echo $the_big_array[$i][$j] = abs(number_format(1 - (float)$the_big_array[$i][$j], 2)); ?>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </table>


                    <?php
                    $ac = fopen(__DIR__ . "/../../../../controllers/bulanik/tablo3.csv", "w+");

                    $aktarilacak = "";

                    for ($i = 0; $i < $secenek; $i++) {

                        for ($j = 0; $j < $kriter; $j++) {

                            if ($j == $kriter - 1) {
                                $aktarilacak = $aktarilacak . $the_big_array[$i][$j];
                            } else {
                                $aktarilacak = $aktarilacak . $the_big_array[$i][$j] . ",";
                            }
                        }
                        $aktarilacak = $aktarilacak . "\n";
                    }

                    fwrite($ac, $aktarilacak);
                    fclose($ac); ?>

                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 style="text-align: center">Gri ilişkisel katsayı matrisi (Grey relational coefficient
                        matrix)</h1>
                    <table id="example2" class="table table-bordered table-striped">

                        <thead>
                        <th style="width: 50px;text-align: center">#</th>

                        <?php for ($i = 1; $i < $kriter; $i++) { ?>
                            <th style="width: 50px;text-align: center">
                                <?php echo "K" . $i; ?>
                            </th>
                        <?php } ?>
                        </thead>

                        <?php

                        function minFark($the_big_array, $secenek, $kriter)
                        {
                            $mins = array();

                            for ($i = 1; $i < $kriter; $i++) {
                                $diff = PHP_INT_MAX;

                                for ($j = 1; $j < $secenek - 1; $j++) {

                                    for ($k = $j + 1; $k < $secenek; $k++) {
                                        if (abs($the_big_array[$j][$i] - $the_big_array[$k][$i]) < $diff) {
                                            $diff = abs($the_big_array[$j][$i] - $the_big_array[$k][$i]);
                                        }
                                    }
                                }
                                array_push($mins, $diff);
                            }
                            return $mins;
                        }

                        function maxFark($the_big_array, $secenek, $kriter)
                        {

                            $maxs = array();

                            for ($i = 1; $i < $kriter; $i++) {
                                $diff = PHP_INT_MIN;

                                for ($j = 1; $j < $secenek - 1; $j++) {
                                    for ($k = $j + 1; $k < $secenek; $k++) {
                                        if (abs($the_big_array[$j][$i] - $the_big_array[$k][$i]) > $diff) {
                                            $diff = abs($the_big_array[$j][$i] - $the_big_array[$k][$i]);
                                        }
                                    }
                                }

                                $diff = number_format($diff * 0.5, 2);
                                array_push($maxs, $diff);
                            }
                            return $maxs;
                        }

                        $maxFark = maxFark($the_big_array, $secenek, $kriter);

                        $minFark = minFark($the_big_array, $secenek, $kriter); ?>


                        <?php for ($j = 1; $j < $secenek; $j++) {
                            $a = 0; ?>

                            <tr>
                                <td style="text-align: center"><?php echo "S" . $j; ?></td>

                                <?php for ($i = 1; $i < $kriter; $i++) {

                                    $maxs = $maxFark[$i - 1];
                                    $mins = $minFark[$i - 1];

                                    $a = 1;
                                    $k = $a - 1;

                                    while ($a < $secenek) {

                                        if ($a == $j) {
                                            $islem = ($mins + $maxs) / ($the_big_array[$a][$i] + $maxs);
                                        }

                                        $a++;
                                    } ?>

                                    <td style="text-align: center">
                                        <?php echo number_format($islem, 2); ?>
                                    </td>

                                    <?php $the_big_array[$j][$i] = number_format($islem, 2);
                                } ?>
                            </tr>
                        <?php } ?>
                    </table>

                    <?php

                    $ac = fopen(__DIR__ . "/../../../../controllers/bulanik/tablo4.csv", "w+");

                    $aktarilacak = "";

                    for ($i = 0; $i < $secenek; $i++) {

                        for ($j = 0; $j < $kriter; $j++) {

                            if ($j == $kriter - 1) {
                                $aktarilacak = $aktarilacak . $the_big_array[$i][$j];
                            } else {
                                $aktarilacak = $aktarilacak . $the_big_array[$i][$j] . ",";
                            }

                        }
                        $aktarilacak = $aktarilacak . "\n";
                    }

                    fwrite($ac, $aktarilacak);
                    fclose($ac); ?>

                </div>
            </div>

            <br>
            <div class="box-footer">
                <a class="btn btn-warning fa fa-close" href="<?php echo base_url('yonetim/bulanik') ?>"> Vazgeç</a>
                <a href="<?php echo base_url('yonetim/bulanikAgirlik') ?>"
                   class="btn btn-primary pull-right fa fa-send"> İlerle</a>
            </div>
        </div>


</section>
