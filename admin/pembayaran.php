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
      width: 65rem;
      margin-left: 15px;
      margin-top: 3rem;
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
    .col-12 .btn{
      width: 9rem;
    }
    .btn-danger{
      height:30px;
      width: 80px;
    }
    .btn-info{
      height:30px;
      width: 80px;
    }
    .action{
      width:168px
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
            <h1 class="m-0">DATA TRANSAKSI</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="transaksi.php"></a>Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- popup -->

    <?php

if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == "berhasilhapus") {
    echo '<div class="alert alert-warning alert-dismissible">
    <a href="pembayaran.php"><button type="button" class="close">×</button></a>
      <h5><i class="far fa-check-circle"></i> BEHASIL</h5>
      Data Berhasil Dihapus
    </div>';
  } elseif ($_GET['pesan'] == "berhasil") {
    echo '<div class="alert alert-warning alert-dismissible">
      <a href="pembayaran.php"><button type="button" class="close">×</button></a>
        <h5><i class="far fa-check-circle"></i> BEHASIL</h5>
        Data Berhasil Ditambahkan
      </div>';
  } elseif ($_GET['pesan'] == "updateberhasil") {
    echo '<div class="alert alert-warning alert-dismissible">
        <a href="pembayaran.php"><button type="button" class="close">×</button></a>
          <h5><i class="far fa-check-circle"></i> BEHASIL</h5>
          Data Berhasil Di-Update
        </div>';
  }
}

?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row no-print">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
            <?php
              if (isset($_GET['hal']) && isset($_GET['act'])) {
                $op = $_GET['act'];
                include $op . ".php";
              } else {
                ?>
          <div style="margin-left:8px;" class="col-12">
            <a href="?hal=pembayaran&act=input" class="btn btn-warning float-left">Tambah Data</a>
          </div>
              
                <table>
                  <tr>
                    <th style="width:3rem; text-align:center;">NO</th>
                    <th>ID Pembayaran</th>
                    <th>Petugas (ID) </th>
                    <th>NISN</th>
                    <th>NAMA</th>
                    <th>Tgl Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th class="action">Opsi</th>
                  </tr>
                  <?php
                  $no = 1;
                  foreach ($db->tampil_data("pembayaran", "id_pembayaran") as $x) {
                    ?>
                    <tr>
                    <td style="text-align:center;">
                        <?php echo $no++; ?>
                      </td>
                      <td>
                        <?php echo $x['id_pembayaran']; ?>
                      </td>
                      <td>
                        <?php
                        foreach ($db->detail_data($x['id_petugas'], "petugas", "id_petugas") as $d) {
                          echo $d['nama_petugas'] . "(" . $d['id_petugas'] . ")";
                        }
                        ?>
                      </td>
                      <td>
                        <?php echo $x['nisn']; ?>
                      </td>
                      <td>
                      <?php
                        foreach ($db->detail_data($x['nisn'], "siswa", "nisn") as $d) {
                          echo $d['nama'] ;
                        }
                        ?>
                      </td>
                      <td>
                        <?php echo $x['tgl_bayar']; ?>
                      </td>
                      <td>
                        <?php echo $x['jumlah_bayar']; ?>
                      </td>
                      <td>
                      <a class="btn btn-info btn-sm" href="?hal=pembayaran&id=<?php echo $x['id_pembayaran']; ?>&act=edit">
                          <i class="fas fa-pencil-alt"></i>Edit</a>
                        <a class="btn btn-danger btn-sm"
                          href="proses.php?id=<?php echo $x['id_pembayaran']; ?>&aksi=hapus&table=pembayaran&kolom=id_pembayaran">
                          <i class="fas fa-trash"></i>Delete</a>
                      </td>
                    </tr>
                  <?php
                  }
              ?>
              </table>

              <?php
              }
              ?>



            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            </div>
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