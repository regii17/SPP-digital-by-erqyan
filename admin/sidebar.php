<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../assets/dist/img/fp.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">
        <?php echo $_SESSION['username']; ?>
      </a>
    </div>
  </div>

  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item has-treeview">
        <a href="index.php" class="nav-link" >
        <i class="fas fa-home"></i>
          <p style="margin-left: 6px;">Beranda</p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="#" class="nav-link" >
          <i class="fas fa-database"></i>
          <p style="margin-left: 6px;">
            Data Master
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="siswa.php" class="nav-link">
              <i class="fas fa-user"></i>
              <p style="margin-left: 6px;">Siswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kelas.php" class="nav-link">
              <i class="fas fa-users"></i>
              <p style="margin-left: 6px;">Kelas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="spp.php" class="nav-link">
              <i class="far fa-credit-card"></i>
              <p style="margin-left: 6px;">Spp</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="petugas.php" class="nav-link">
              <i class="fas fa-user-cog"></i>
              <p style="margin-left: 6px;">Petugas</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="pembayaran.php" class="nav-link">
          <i class="fas fa-wallet"></i>
          <p style="margin-left: 6px;">Transaksi Pembayaran</p>
        </a>
      </li>
      <li style="margin-left:-5px;" class="nav-item has-treeview">
        <a href="laporan.php" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>Laporan</p>
        </a>
      </li>

    </ul>
  </nav>