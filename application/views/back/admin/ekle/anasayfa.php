<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('back/include/head.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <title>Yönetici Ekleme</title>

    <?php $this->load->view('back/include/header.php'); ?>
    <?php $this->load->view('back/include/sidebar.php'); ?>

    <div class="content-wrapper">
        <?php $this->load->view('back/admin/ekle/breadcrumb.php'); ?>
        <?php $this->load->view('back/admin/ekle/main_content.php'); ?>
    </div>

    <?php $this->load->view('back/include/footer.php'); ?>
    <?php $this->load->view('back/include/sidebarRight.php'); ?>

    <div class="control-sidebar-bg"></div>
</div>

<?php $this->load->view('back/include/script.php'); ?>

</body>
</html>
