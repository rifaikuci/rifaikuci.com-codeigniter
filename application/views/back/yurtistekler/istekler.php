<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


    <style>
        * {
            font-family: "DeJaVu Sans Mono", monospace;
            font-size: 11px;
        }
    </style>
    <link href="<?php echo base_url('assets/front/'); ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title style="font-family: 'DeJaVu Sans Mono', monospace">Talep ve Şikayetler</title>
</head>

<body>

<?php $sonuc = $this->dtbs->listele('tblistekler'); ?>

<div style="float: right">Tarih: <?php echo tarihSaat(date('Y-m-d H:i:s')); ?></div>

<br><br>

<div style="text-align: center;font-size: 22px">
    Talep ve Şikayetler
</div>

<br>

<table class="table table-striped">
    <thead>

    <tr>
        <th width="30" style="text-align: center;font-weight: bold">
            #
        </th>

        <th width="30" style="text-align: center">
            Oda
        </th>

        <th width="120" style="text-align: center">
            Ad Soyad
        </th>

        <th style="text-align: center">
            Mesaj
        </th>

        <th width="120" style="text-align: center">
            Zaman
        </th>
    </tr>

    </thead>

    <tbody>
    <?php $sayi = 1;
    foreach ($sonuc as $sonuc) { ?>

        <tr>
            <td style="text-align: center;font-weight: bold">
                <?php echo $sayi++ ?>
            </td>

            <td style="text-align: center">
                <?php echo $sonuc['odaNumara']; ?>
            </td>

            <td style="text-align: center">
                <?php echo $sonuc['adSoyad']; ?>
            </td>

            <td style="text-align: center">
                <?php echo $sonuc['istek']; ?>
            </td>

            <td style="text-align: center">
                <?php echo tarihSaat($sonuc['istekTarih']); ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>