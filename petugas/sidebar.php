<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/dist/img/img-petugas.webp" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="index.php" class="nav-link">
            <i class="fas fa-home"></i>
              <p>
                beranda
              </p>
            </a>
          </li>  
        <li class="nav-item">
            <a href="transaksi.php" class="nav-link">
            <i class="fas fa-wallet"></i>
              <p>
                Transaksi Pembayaran
              </p>
            </a>
          </li>
          
         
        </ul>
      </nav>