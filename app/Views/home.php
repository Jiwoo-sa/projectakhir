<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php
$this->db = db_connect();
?>

<!-- Admin -->
<h5 class="card-title mb-3">Selamat datang, <?= session()->get('nama')  ?></h5>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Nasabah</div>
                        <p class="h5 mb-0 font-weight-bold text-gray-800"><?= $oke->getWhere('user', '*', ['hak_akses' => 'user'])->resultID->num_rows; ?> Nasabah</p>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pemasukan</div>
                        <p class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $datane = $this->db->query("SELECT SUM(total_trans) AS tot FROM transaksi WHERE MONTH(tgl)='" . date('m') . "' AND YEAR(tgl)='" . date('Y') . "'")->getRow();
                            echo rupiah($datane->tot);
                            ?>
                        </p>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-wallet fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Penarikan
                        </div>
                        <p class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $datane = $this->db->query("SELECT SUM(jmlh_tarik) AS tot FROM penarikan WHERE MONTH(tgl_tarik)='" . date('m') . "' AND YEAR(tgl_tarik)='" . date('Y') . "'")->getRow();
                            echo rupiah($datane->tot);
                            ?>
                        </p>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Penukaran</div>
                        <p class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $datane = $this->db->query("SELECT SUM(total_penukaran) AS tot FROM transaksi_penukaran WHERE MONTH(tgl)='" . date('m') . "' AND YEAR(tgl)='" . date('Y') . "'")->getRow();
                            echo rupiah($datane->tot);
                            ?>
                        </p>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-scroll fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>