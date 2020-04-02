 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-text">CV. Anton Natuna</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider mt-3 my-0">

<!-- Nav Item - Dashboard -->

<?php if($user['jabatan_id'] == 7) : ?>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('admin/profile') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Profile</span></a>
</li>

<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
  Pelanggan
</div>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('pelanggan') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Pelanggan</span></a>
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('transaksi') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Transaksi</span></a>
</li>


<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
  Laporan
</div>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('laporankasharian') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Laporan Kas Harian</span></a>
</li>


<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('worksheet') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Worksheet</span></a>
</li>


<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('piutang') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Piutang</span></a>
</li>

<?php elseif($user['jabatan_id'] == 9) : ?>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('dashboard') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('admin/profile') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Profile</span></a>
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('CabangKantor') ?>">
    <i class="fas fa-fw fa-office"></i>
    <span>Kantor</span></a>
</li>

<hr class="sidebar-divider mt-3">

<!-- Heading -->
<div class="sidebar-heading">
  User
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('admin') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Admin</span></a>
</li>

<!-- Nav Item - Tables -->

<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
  Laporan Kas Harian
</div>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('laporankasharian') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Laporan Kas Harian</span></a>
</li>


<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('worksheet') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Worksheet</span></a>
</li>


<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('piutang') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Piutang</span></a>
</li>

<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
  Laporan Bank
</div>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('LaporanBankHarian') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Laporan Bank Harian</span></a>
</li>

<?php elseif ($user['jabatan_id'] == 10) : ?>


  <li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('dashboard') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('admin/profile') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Profile</span></a>
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('CabangKantor') ?>">
    <i class="fas fa-fw fa-office"></i>
    <span>Kantor</span></a>
</li>

<hr class="sidebar-divider mt-3">

<!-- Heading -->
<div class="sidebar-heading">
  User
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('admin') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Admin</span></a>
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('JabatanAdmin') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Jabatan</span></a>
</li>

<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
  Pelanggan
</div>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('pelanggan') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Pelanggan</span></a>
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('transaksi') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Transaksi</span></a>
</li>


<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
  Laporan Kas Harian
</div>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('laporankasharian') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Laporan Kas Harian</span></a>
</li>


<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('worksheet') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Worksheet</span></a>
</li>


<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('piutang') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Piutang</span></a>
</li>

<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
  Logistik
</div>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('stock') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Supplier</span></a> 
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('stock') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Stock</span></a>
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('inventaris') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Inventaris</span></a>
</li>

<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
  Laporan Bank
</div>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('LaporanBankHarian') ?>">
    <i class="fas fa-fw fa-doc"></i>
    <span>Laporan Bank Harian</span></a>
</li>


<?php elseif ($user['jabatan_id'] == 6) : ?>


<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('dashboard') ?>">
  <i class="fas fa-fw fa-tachometer-alt"></i>
  <span>Dashboard</span></a>
</li>

<hr class="sidebar-divider mt-3">


<div class="sidebar-heading">
Pelanggan
</div>

<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('pelanggan') ?>">
  <i class="fas fa-fw fa-user"></i>
  <span>Pelanggan</span></a>
</li>

<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('transaksi') ?>">
  <i class="fas fa-fw fa-user"></i>
  <span>Transaksi</span></a>
</li>


<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
Laporan Kas Harian
</div>

<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('laporankasharian') ?>">
  <i class="fas fa-fw fa-doc"></i>
  <span>Laporan Kas Harian</span></a>
</li>


<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('worksheet') ?>">
  <i class="fas fa-fw fa-doc"></i>
  <span>Worksheet</span></a>
</li>


<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('piutang') ?>">
  <i class="fas fa-fw fa-doc"></i>
  <span>Piutang</span></a>
</li>

<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
Logistik
</div>

<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('stock') ?>">
  <i class="fas fa-fw fa-doc"></i>
  <span>Supplier</span></a> 
</li>

<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('stock') ?>">
  <i class="fas fa-fw fa-doc"></i>
  <span>Stock</span></a>
</li>

<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('inventaris') ?>">
  <i class="fas fa-fw fa-doc"></i>
  <span>Inventaris</span></a>
</li>

<hr class="sidebar-divider mt-3">

<div class="sidebar-heading">
Laporan Bank
</div>

<li class="nav-item">
<a class="nav-link pb-0" href="<?= base_url('LaporanBankHarian') ?>">
  <i class="fas fa-fw fa-doc"></i>
  <span>Laporan Bank Harian</span></a>
</li>


<?php endif; ?>




<!-- Nav Item - Tables -->







<!-- Divider -->
<hr class="sidebar-divider mt-3 d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->