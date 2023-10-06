<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  session_start();
  include '../database.php';
  $db = new database();
  if (!isset($_SESSION['status'])) {
    header("location:../index.php?pesan=belumlogin");
  }
  $sql = 'SELECT * 
		FROM petugas';

  $query = mysqli_query($koneksi, $sql);

  if (!$query) {
    die('SQL Error: ' . mysqli_error($conn));
  }
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPP NEXAS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
  <style>
    table {
      width: 63rem;
      margin-left: 15px;
      margin-top: -10px;
    }

    tr {
      border: 1px solid black;
    }

    th {
      border: 1px solid black;
      background-color: rgba(59, 59, 59, 0.562);
      height: 15px;
    }

    td {
      border: 1px solid black;
    }
    .btn-success{
      width: 10rem;
    }
    .btn-primary{
      width: 10rem;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../assets/dist/img/logo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- logout -->


        <a class="nav-link" href="../logout.php" role="button">
          <i style="font-size: 30px; margin-top:-0.7rem;" class="fas fa-sign-out-alt"></i>
        </a>

    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="../assets/dist/img/logo.png" alt="Nekas Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">SPP NEXAS</span>
      </a>

      <!-- Sidebar -->
      <!-- Sidebar Menu -->
      <?php include 'sidebar.php'; ?>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DATA LAPORAN SPP</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="laporan.php"></a>Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- popup -->


    <!-- Main content -->
    <?php
    if (isset($_GET['id'])) {
      include "edit.php";
    } else {

      ?>


      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-edit"></i>
          Laporan SPP Sekolah Digital
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive">

        <div class="row no-print">
          <div style="margin-left:8px;" class="col-12">
            <button onclick="cetak()" class="btn btn-success float-left" style="margin-left: 5px;"><i
                class="fas fa-print"></i> Cetak Laporan
            </button>
            <button type="button" class="btn btn-primary float-left" style="margin-left: 5px;">
              <i class="fas fa-download"></i> PDF
            </button>
          </div>
        </div>
        <br>
        <table>
          <tr>
           <th style="width:3rem; text-align:center;">NO</th>
            <th>ID SPP</th>
            <th>Tahun</th>
            <th>Nominal</th>
          </tr>
          <?php
          $no = 1;
          foreach ($db->tampil_data("spp", "id_spp") as $x) {
            ?>
            <tr>
            <td style="text-align:center;">
                <?php echo $no++; ?>
              </td>
              <td><a href="?hal=laporanmasy&id=<?php echo $x['id_spp']; ?>">SPP-<?php echo $x['id_spp']; ?></a></td>
              <td>
                <?php echo $x['tahun']; ?>
              </td>
              <td>Rp
                <?php echo number_format($x['nominal'], 2, ',', '.'); ?>
              </td>

            </tr>

          <?php
          }
          ?>
        </table>

      </div>
      <!-- /.card-body -->
    </div>
    <?php
    }
    ?>

  <script type="text/javascript">
    function cetak() {
      window.addEventListener("load", window.print());
    }
  </script>
  <!-- ./col -->

  <!-- /.row -->

  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="#">Erqyan</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../assets/plugins/moment/moment.min.js"></script>
  <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../assets/dist/js/pages/dashboard.js"></script>
</body>

</html>