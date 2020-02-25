 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('dashboard') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  User
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Admin</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('jabatanadmin/index') ?>">
    <i class="fas fa-fw fa-user-tie"></i>
    <span>Jabatan</span></a>
</li>

<!-- Nav Item - Tables -->

<hr class="sidebar-divider">

<div class="sidebar-heading">
  Pelanggan
</div>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('pelanggan') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Pelanggan</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('transaksi') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Transaksi</span></a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
  Laporan
</div>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('laporankasharian') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Laporan Kas Harian</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->