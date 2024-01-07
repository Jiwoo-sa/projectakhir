<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Cetak Buku Tabungan</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            <form method="POST" id="formtransaksi" action="<?= base_url('Tabungan/cetak_tabungan') ?>" target="_blank">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Nama Nasabah</label>
                            <!-- <input type="input" class="form-control" id="id_user" name="id_user" placeholder="Id Nasabah" required> -->
                            <select name="id_user" id="id_user" class="form-control" required="">
                                <option value="">Pilih Nasabah</option>
                                <?php
                                foreach ($nasabah as $n) :
                                    ?>
                                    <option value="<?= $n->id_user ?>"><?= $n->nama ?> - <?=$n->id_user?></option>

                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>

                   <!--  <div class="col-md-6">
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
                    </div> -->
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