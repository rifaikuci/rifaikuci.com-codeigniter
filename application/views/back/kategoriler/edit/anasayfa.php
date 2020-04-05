<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('back/include/head.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<title>Kategori Güncelleme</title>

<div class="wrapper">
    <?php $this->load->view('back/include/header.php'); ?>
    <?php $this->load->view('back/include/sidebar.php'); ?>

    <div class="content-wrapper">
        <?php $this->load->view('back/kategoriler/edit/breadcrumb.php'); ?>
        <?php $this->load->view('back/kategoriler/edit/main_content.php'); ?>
    </div>

    <?php $this->load->view('back/include/footer.php'); ?>
    <?php $this->load->view('back/include/sidebarRight.php'); ?>

    <div class="control-sidebar-bg"></div>

</div>

<?php $this->load->view('back/include/script.php'); ?>
</body>
</html>
