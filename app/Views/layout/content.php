<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Transaksi Pemasukan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($transk as $tr) :

                        $nmnasabah = $this->db->query("SELECT * FROM user WHERE id_user='" . $tr->id_user . "'")->getRow();

                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $tr->tgl; ?></td>
                            <td><?= $tr->kode_trans; ?></td>
                            <td><?= $nmnasabah->nama; ?></td>
                            <td><?= $tr->keterangan; ?></td>
                            <td><?= $tr->total_trans; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Transaksi Penarikan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Penarikan</th>
                        <th>Jumlah Penarikan</th>
                        <!-- <th>Sisa Saldo</th> -->

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Penarikan</th>
                        <th>Jumlah Penarikan</th>
                        <!-- <th>Sisa Saldo</th> -->

                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($tark as $tr) :
                        $nmnasabah = $this->db->query("SELECT * FROM user WHERE id_user='" . $tr->id_nasabah . "'")->getRow();
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $tr->tgl_tarik; ?></td>
                            <td><?= $nmnasabah->nama; ?></td>
                            <td><?= $tr->jmlh_tarik; ?></td>
                            <td><?= $tr->sisa_saldo; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Transaksi Penukaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Penukaran</th>
                        <th>Jumlah</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Penukaran</th>
                        <th>Jumlah</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($trans as $s) : 
                        $nmnasabah = $this->db->query("SELECT * FROM user WHERE id_user='" . $s->Id_nasabah . "'")->getRow();

                        $nmpetugas = $this->db->query("SELECT * FROM user WHERE id_user='" . $s->id_petugas . "'")->getRow();
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $s->tgl; ?></td>
                            <td><?= $s->kode_penukaran; ?></td>
                            <td><?= $nmnasabah->nama; ?></td>
                            <td><?= $nmpetugas->nama; ?></td>
                            <td><?= $s->total_penukaran; ?></td>

                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>