<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Rifai Kuçi | Giriş Yap</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet"
          href="<?php echo base_url('assets/back/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo base_url('assets/back/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/back/'); ?>bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/back/'); ?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/back/'); ?>plugins/iCheck/square/blue.css">
    <link href="<?php echo base_url('assets/back/'); ?>dist/img/user-key.png" rel="icon">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <b>Rifai</b>KUÇİ
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Yönetici Giriş Paneli</p>

        <?php echo $this->session->flashdata('durum'); ?>

        <form action="<?php echo base_url('yonetim/girisyap'); ?>" method="post">

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Emailinizi Giriniz..">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="sifre" class="form-control" placeholder="Şifrenizi Giriniz...">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
                </div>
            </div>

        </form>
    </div>
</div>


</body>
</html>
