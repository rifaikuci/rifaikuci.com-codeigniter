
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('back/include/head.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
<title>Tür Ekleme</title>
<?php $this->load->view('back/include/header.php'); ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
<?php $this->load->view('back/include/sidebar.php'); ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<?php $this->load->view('back/turler/ekle/breadcrumb.php'); ?>

    <!-- Main content -->
<?php $this->load->view('back/turler/ekle/main_content.php'); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('back/include/footer.php'); ?>

  <!-- Control Sidebar -->
  <?php $this->load->view('back/include/sidebarRight.php'); ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('back/include/script.php'); ?>

</body>
</html>
