<!-- Sidebar -->
<?php
$hak_akses = session()->get('hak_akses');
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-trash"></i>
        </div>

        <div class="sidebar-brand-text mx-3">Bank Sampah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php
    if ($hak_akses == 'admin') :
    ?>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="Home">
                <i class="fas fa-fw fa-home"></i>
                <span>Menu Admin</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            User
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#one" aria-expanded="true" aria-controls="one">
                <i class="fas fa-fu fa-user"></i>
                <span>Data User</span>
            </a>
            <div id="one" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola :</h6>
                    <a class="collapse-item" href="/Admin">Data Pegawai</a>
                    <a class="collapse-item" href="/Nasabah">Data Nasabah</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Informasi
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/Informasi">
                <i class="fas fa-fw fa-pen-nib"></i>
                <span>Informasi</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Storage
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/Sampah">
                <i class="fas fa-fw fa-warehouse"></i>
                <span>Data Sampah</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/Uploadsembako">
                <i class="fas fa-fw fa-warehouse"></i>
                <span>Data Sembako</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Transaksi
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#four" aria-expanded="true" aria-controls="four">
                <i class="fas fa-fw fa-wallet"></i>
                <span>Transaksi</span>
            </a>
            <div id="four" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola :</h6>
                    <a class="collapse-item" href="/Transaksi">Transaksi Pemasukan</a>
                    <a class="collapse-item" href="/Tarik">Transaksi Penarikan</a>
                    <a class="collapse-item" href="/Sembako">Penukaran Sembako</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/Laporan">
                <i class="fas fa-fw fa-print"></i>
                <span>Cetak Laporan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/Tabungan">
                <i class="fas fa-fw fa-print"></i>
                <span>Cetak Buku Tabungan</span></a>
        </li>

    <?php
    endif;
    ?>

    <!-- Heading -->
    <?php
    if ($hak_akses == 'user') :
    ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="/Dashboard">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Informasi
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/Informasi">
                <i class="fas fa-fw fa-bell"></i>
                <span>Informasi</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Transaksi
        </div>


        <li class="nav-item">
            <a class="nav-link" href="/Transaksi">
                <i class="fas fa-fw fa-wallet"></i>
                <span>Transaksi Pemasukan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Tarik">
                <i class="fas fa-fw fa-credit-card"></i>
                <span>Transaksi Penarikan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Sembako">
                <i class="fas fa-fw fa-scroll"></i>
                <span>Transaksi Penukaran</span></a>
        </li>

    <?php
    endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>