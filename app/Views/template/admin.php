<?php if(!isset($page)) $page = null; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Include Libraries -->
    <?= $this->include('template/_libh') ;?>
    <link rel="stylesheet" href="<?= base_url('adminlte/css/adminlte.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>" />
    <?= $this->renderSection('head') ;?>
    <title><?= isset($title)?$title . ' - The Programmer':'The Programmer'; ?></title>
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url(); ?>" class="nav-link">Home</a>
          </li>
          <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li> -->
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-auto">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Pencarian ketik disini bang" aria-label="Search" />
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-3">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-bell"></i>
              <span class="badge badge-warning navbar-badge">3</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-gear"></i>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Fanstore logo" width="160px" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
          <span class="brand-text font-weight-light">The Programmer</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="<?= base_url('assets/img/poster-sonic.jpg'); ?>" width="160px" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
              <?php if(session()->has('nik')): ?>
              <a href="<?= base_url('profile'); ?>" class="d-block"><?= session()->get('name'); ?></a>
              <?php else: ?>
              <a href="<?= base_url('login'); ?>" class="d-block">Belum Login</a>
              <?php endif; ?>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="<?= base_url(); ?>" class="nav-link <?= $page==='dashboard'?'active':''; ?>">
                  <i class="nav-icon fa fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              
              <li class="nav-header">KEANGGOTAAN</li>
              <li class="nav-item">
                <a href="<?= base_url('users'); ?>" class="nav-link <?= $page==='users'?'active':''; ?>">
                  <i class="nav-icon fa fa-users"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <?php if(session()->get('posisi') === 'Admin'): ?>
              <li class="nav-item">
                <a href="<?= base_url('login-manajemen'); ?>" class="nav-link <?= $page==='login-manajemen'?'active':''; ?>">
                  <i class="nav-icon fa fa-list-check "></i>
                  <p>Manajemen Login</p>
                </a>
              </li>
              <?php endif; ?>
              
              <li class="nav-header">AKUN SAYA</li>
              <li class="nav-item">
                <a href="<?= base_url('profile'); ?>" class="nav-link <?= $page==='myprofile'?'active':''; ?>">
                  <i class="nav-icon fa fa-user-alt"></i>
                  <p>Profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('portofolio'); ?>" class="nav-link <?= $page==='myportofolio'?'active':''; ?>">
                  <i class="nav-icon fa fa-file-signature "></i>
                  <p>Portofolio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('edit-profile'); ?>" class="nav-link <?= $page==='edit-profile'?'active':''; ?>">
                  <i class="nav-icon fa fa-edit"></i>
                  <p>Edit Profil</p>
                </a>
              </li>
              <?php if(session()->get('nik')): ?>
              <li class="nav-item">
                <a href="javascript: if(confirm('Apakah anda yakin akan keluar?')) window.location = '<?= base_url('logout'); ?>'" class="nav-link">
                  <i class="nav-icon fa fa-power-off "></i>
                  <p>Keluar Akun</p>
                </a>
              </li>
              <?php else: ?>
              <li class="nav-item">
                <a href="<?= base_url('edit-profile'); ?>" class="nav-link <?= $page==='edit-profile'?'active':''; ?>">
                  <i class="nav-icon fa fa-sign-in-alt"></i>
                  <p>Masuk Akun</p>
                </a>
              </li>
              <?php endif; ?>
          
            </ul>
          </nav>
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
                <h1 class="m-0 text-dark"><?= isset($title)?$title:''; ?></h1>
              </div>
             
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content"><?= $this->renderSection('content') ;?></div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">Hidup adalah kompetisi</div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2022 <a href="https://github.com/fandevid" target="blank">FanDev</a>.</strong>
      </footer>
    </div>
    <!-- ./wrapper -->
    
    <!-- Scripts -->
    <?= $this->include('template/_libf') ;?>
    <script src="<?= base_url('adminlte/js/adminlte.min.js'); ?>"></script>
    <script src="<?= base_url('js/app.js'); ?>"></script>
    <?= $this->renderSection('script') ;?>
  </body>
</html>
