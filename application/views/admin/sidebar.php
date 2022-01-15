<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-text mx-2">Perpus Gundar</div>
 </a>

<hr class="sidebar-divider my-0">
<li class="nav-item active">
    <a class="nav-link" href="<?=base_url('admin');?>"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
</li>
<hr class="sidebar-divider">
<div class="sidebar-heading">Master Data</div>

<li class="nav-item">
        <a class="nav-link" href="<?=base_url('buku/kategori');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Kategori Buku</span></a>
</li>

<li class="nav-item">
        <a class="nav-link" href="<?=base_url('buku');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Buku</span></a>
</li>

<li class="nav-item">
        <a class="nav-link" href="<?=base_url('Peminjam/peminjam/index');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Peminjam</span></a>
</li>
<li class="nav-item">
        <a class="nav-link" href="<?=base_url('user/anggota');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Anggota</span></a>
</li>

<hr class="sidebar-divider mt-3">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End  of Sidebar -- >
