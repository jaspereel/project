<?php
require_once('sql.php');
if (empty($_SESSION['email'])) plo("index.php");
$area = (!empty($_GET['go'])) ? $_GET['go'] : "member_profile";

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>會員系統 - J's Hotel 台北傑斯旅店</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawsome/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet" />
  <!-- Icon -->
  <link rel="shortcut icon" href="images/icon/logo_icon.ico" />
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a href="index.php">
            <img src="images/icon/logo_black.png" width="100px">
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="member_backend.php" class="brand-link elevation-4">
        <img src="images/icon/logo_circle.png" alt="logo_circle_white" class="brand-image  " style="opacity: .8;">
        <span class="brand-text font-weight-light">會員個人系統</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="?go=member_profile" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  個人資料
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../widgets.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  訂單管理
                </p>
              </a>
            </li>
            <li class="nav-item text-white">
              <hr class="bg-bluewhite">
            </li>
            <li class="nav-item">
              <a href="api.php?go=logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  登出系統
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php
      include_once($area . '.php');
      ?>
      <footer class="main-footer">
       J's Hotel 台北傑斯旅店
      </footer>
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="js/bootstrap.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="js/adminlte/demo.js"></script>
</body>

</html>