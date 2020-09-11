<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('back/include/head.php'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <title>Rifai Kuçi | Türler</title>
    <?php $this->load->view('back/include/header.php'); ?>
    <?php $this->load->view('back/include/sidebar.php'); ?>

    <div class="content-wrapper">
        <?php $this->load->view('back/turTurler/breadcrumb.php'); ?>
        <?php $this->load->view('back/turTurler/main_content.php'); ?>
    </div>

    <?php $this->load->view('back/include/footer.php'); ?>
    <?php $this->load->view('back/include/sidebarRight.php'); ?>

    <div class="control-sidebar-bg"></div>

</div>

<?php $this->load->view('back/include/script.php'); ?>

</body>
</html>