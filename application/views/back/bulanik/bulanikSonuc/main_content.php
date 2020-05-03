<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <?php if (($h = fopen(base_url("/") . "application/controllers/bulanik/tablo4.csv", "r")) !== FALSE) {

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

                <?php if (($h = fopen(base_url("/") . "application/controllers/bulanik/tablo5.csv", "r")) !== FALSE) {

                    while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {
                        $the_big_array2[] = $data;
                    }
                    fclose($h);

                    $secenek2 = count($the_big_array2);
                    $count2 = 0;

                    foreach ($the_big_array2 as $type) {
                        $count2 += count($type);
                    }
                    $kriter2 = $count2 / count($the_big_array2);

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
                    <h1 style="text-align: center">Gri İlişkisel Analiz Sonuçları</h1>

                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <th style="width: 50px;text-align: center">#</th>

                        <?php for ($i = 1; $i < $kriter; $i++) { ?>
                            <th style="width: 50px;text-align: center">
                                <?php echo "K" . $i; ?>
                            </th>
                        <?php } ?>

                        <th style="text-align: center">GİD</th>
                        </thead>

                        <tr>
                            <td style="text-align: center;"><b>#W</b></td>
                            <?php for ($i = 1; $i < $kriter; $i++) { ?>
                                <td style="width: 50px;text-align: center">
                                    <?php
                                    echo $the_big_array2[1][$i];
                                    ?>
                                </td>
                            <?php } ?>
                        </tr>

                        <?php $i = 1;
                        $gid = array();
                        while ($i < $secenek) {
                            $sum = 0; ?>
                            <tr>
                                <td style="text-align: center">
                                    <?php echo "S" . $i; ?>
                                </td>

                                <?php for ($c = 1; $c < $kriter; $c++) { ?>
                                    <td style="text-align: center">
                                        <?php echo $the_big_array[$i][$c]; ?>
                                    </td>
                                    <?php

                                    $sum = $sum + ($the_big_array2[1][$c] * $the_big_array[$i][$c]);
                                }

                                array_push($gid, $sum);
                                $i++; ?>
                                <td style="text-align: center">
                                    <b><?php echo number_format($sum, 4); ?></b>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                    <br>

                    <div style="text-align: center"><h3><b><?php
                                $index = array_search(max($gid), $gid);
                                echo "En iyi Seçim : " . $the_big_array[$index + 1][0] . ", Değer = " . max($gid);
                                ?></b></h3></div>
                </div>
            </div>
        </div>
    </div>
    <?php $data = "[";
    $label = "[";
    $backColor = "[";
    for ($i = 0; $i < count($gid); $i++) {
        $a = $i + 1;
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];
        if ($i == count($gid) - 1) {
            $data = $data . $gid[$i];
            $label = $label . "'S" . $a . "'";
            $backColor = $backColor . "'" . $color . "'";
        } else {
            $label = $label . "'S" . $a . "',";
            $data = $data . $gid[$i] . ",";
            $backColor = $backColor . "'" . $color . "',";

        }
    }
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

    $data = $data . "]";
    $label = $label . "]";
    $backColor = $backColor . "]";
    ?>
    //Grafikler
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">

                    <div style="text-align:center">
                        <h1 class="box-title">Sütun Grafik</h1>
                    </div>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        <div class="box-body">
                            <canvas id="myChart"></canvas>
                        </div>

                        <?php echo "
                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'bar',
                    
                                    data: {
                                        labels:" . $label . " ,
                                        datasets: [{
                                            label: 'Seçenekler',
                                            backgroundColor: " . $backColor . ",
                                            data:" . $data . "
                                        }]
                                    } });

                            </script>" ?>
                </div>

                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase"></a>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="box box-primary">
                <div class="box-header with-border">

                    <div style="text-align:center">
                        <h1 class="box-title">Doughnut Grafik</h1>
                    </div>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        <div class="box-body">
                            <canvas id="myChart2"></canvas>
                        </div>
                        <?php echo "
                            <script>
                                var ctx = document.getElementById('myChart2').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'radar',

                                    data: {
                                        labels:" . $label . " ,
                                        datasets: [{
                                            label: 'Seçenekler',
                                               data:" . $data . ",
                                            backgroundColor: 'rgba(0, 255, 255,0.1)',
                                            borderColor: " . $backColor . ",
                                            borderWidth:1
                                        }]
                                    }
                                });
                            </script>" ?>
                </div>

                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase"></a>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="box box-primary">
                <div class="box-header with-border">

                    <div style="text-align:center">
                        <h1 class="box-title">Çizgi Grafiği</h1>
                    </div>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>

                </div>

                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        <div class="box-body">
                            <canvas id="myChart3"></canvas>
                        </div>

                        <?php echo "
                            <script>
                                var ctx = document.getElementById('myChart3').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels:" . $label . " ,
                                        datasets: [{
                                            label: 'Seçenekler',
                                            backgroundColor: 'rgba(103, 136, 166,0.1)',
                                            borderColor: " . $backColor . ",
                                            borderWidth :2,
                                            data:" . $data . "
                                        }]
                                    }
                                });
                            </script>" ?>
                </div>

                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase"></a>
                </div>

            </div>
        </div>

        <div class="col-md-6">

            <div class="box box-primary">
                <div class="box-header with-border">

                    <div style="text-align:center">
                        <h1 class="box-title">Son Yazılar</h1>
                    </div>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        <div class="box-body">
                            <canvas id="myChart4"></canvas>
                        </div>
                        <?php echo "
                            <script>
                                var ctx = document.getElementById('myChart4').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'polarArea',
                                    data: {
                                        labels:" . $label . " ,
                                        datasets: [{
                                            label: 'Seçenekler',
                                            backgroundColor: " . $backColor . ",
                                            borderColor: 'rgb(255, 99, 132)',
                                           
                                            data:" . $data . "
                                        }]
                                    }
                                });
                    
                            </script>" ?>
                </div>

                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase"></a>
                </div>
            </div>
        </div>
    </div>


</section>
