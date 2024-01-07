<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Cetak Laporan</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            <form method="POST" id="formtransaksi" action="<?= base_url('Laporan/cetak_laporan') ?>" target="_blank">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Jenis Laporan</label>
                            <select name="jenis_laporan" id="jenis_laporan" class="form-control" required="">
                                <option value="">Pilih Laporan</option>

                                <option value="pemasukan">Transaksi Pemasukan</option>
                                <option value="penarikan">Transaksi Penarikan</option>
                                <option value="penukaran">Transaksi Penukaran</option>


                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" placeholder="Tanggal Awal" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" placeholder="Tanggal Akhir" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" id="tambah_sampah" name="tambah_sampah">
                            Cetak
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>




    <?= $this->endSection(); ?>