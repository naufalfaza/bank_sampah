  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('assets/images/logo-adiwiyata.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Bank Sampah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Admin/data_pengguna') ?>" class="nav-link">
                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/data_siswa') ?>" class="nav-link">
                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="<?= base_url('Admin/data_penukaran_sampah') ?>" class="nav-link">
              <i class="fas fa-hand-holding-usd"></i>&nbsp;
              <p>
                Penukaran Sampah
              </p>
            </a>
          </li>
          <li class="nav-header">KONFIGURASI</li>
          <li class="nav-item">
            <a href="<?= base_url('Admin/jenis_sampah') ?>" class="nav-link">
              <i class="fas fa-recycle"></i>&nbsp;
              <p>
                Jenis Sampah
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>