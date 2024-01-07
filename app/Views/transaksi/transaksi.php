<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $this->db = db_connect(); ?>

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Data Transaksi Nasabah Bank Sampah Harum Melati</h1> -->

<!-- DataTales Example -->
<!-- Collapsable Card Example -->

<?php
if (session()->get('hak_akses') == 'admin') :
?>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Input Transaksi</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="collapseCardExample">
            <div class="card-body">
                <form method="POST" id="formtransaksi" action="<?= base_url('Transaksi/simpan_transaksi') ?>">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Kode Nota</label>
                                <input type="text" class="form-control" id="no_nota" name="no_nota" readonly value="TR - <?= date("Hismyd") ?>" placeholder="Harga Sampah">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Nasabah</label>
                                <select name="nasabah" id="nasabah" class="form-control" required="">
                                    <option value="">Pilih Nasabah</option>
                                    <?php
                                    foreach ($nasabah as $n) :
                                    ?>
                                        <option value="<?= $n->id_user ?>"><?= $n->nama ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Sampah</label>
                                <select name="nama_sampah" id="nama_sampah" class="form-control" required="">
                                    <option value="">Pilih Sampah</option>
                                    <?php
                                    foreach ($sampah as $s) :
                                    ?>
                                        <option value="<?= $s->id_sampah ?>"><?= $s->nama_sampah ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Harga Sampah</label>
                                <input type="text" class="form-control" id="harga" placeholder="Harga Sampah" readonly="" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Jumlah Sampah</label>
                                <input type="text" class="form-control" id="jumlahsampah" placeholder="Jumlah Sampah" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Sub Total</label>
                                <input type="text" class="form-control" id="subtotal" placeholder="Sub Total" readonly="" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="" class="form-control" required></textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-primary" type="button" id="tambah_sampah" name="tambah_sampah">
                                    Tambah Sampah
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Nota Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sampah</th>
                                            <th>Harga</th>
                                            <th>Jumlah Sampah</th>
                                            <th>Sub Total</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sampah</th>
                                            <th>Harga</th>
                                            <th>Jumlah Sampah</th>
                                            <th>Sub Total</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                    <tbody id="isisampah"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Simpan Transaksi</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php endif; ?>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Transaksi Bank Sampah Harum Melati</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>No Transaksi</th>
                        <th>Nama Nasabah</th>
                        <th>Keterangan</th>
                        <th>Total</th>

                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>No Transaksi</th>
                        <th>Nama Nasabah</th>
                        <th>Keterangan</th>
                        <th>Total</th>

                    </tr>
                </tfoot> -->
                <tbody>
                    <?php $no = 1;
                    foreach ($transk as $tr) :

                        $nmnasabah = $this->db->query("SELECT * FROM user WHERE id_user='" . $tr->id_user . "'")->getRow();
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= tgl_indo($tr->tgl); ?></td>
                            <td><?= $tr->kode_trans; ?></td>
                            <td><?= $nmnasabah->nama; ?></td>
                            <td><?= $tr->keterangan; ?></td>
                            <td><?= rupiah($tr->total_trans); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php
    $status_kirim = session()->get('status');
    if ($status_kirim != "" || $status_kirim != null) {
    ?>
        $(document).ready(function() {
            Swal.fire(
                'Transaksi',
                `<?= session()->get('pesan') ?>`,
                'success'
            )
        })
    <?php
        $array_items = ['status', 'pesan'];
        session()->remove($array_items);
    }
    ?>
</script>

<script>
    //button batal pada tabel nota
    function batal(kode_detail, kodeheader) {
        $.ajax({
            url: "<?= base_url('Transaksi/batal2') ?>/" + kode_detail,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                if (data.status == true) {
                    Swal.fire(
                        'Berhasil!',
                        `${data.pesan}`,
                        'success')
                    getTempSamp(kodeheader);
                } else {
                    Swal.fire(
                        'GAGAL!',
                        `${a.pesan}`,
                        'error')
                }
            },
            error: function(sm) {
                Swal.fire(
                    'GAGAL!',
                    `Gagal Menghapus Data`,
                    'error')
            }
        })
    }

    // isi tabel nota
    function getTempSamp(kodeheader) {
        $.ajax({
            url: "<?= base_url('Transaksi/getTempSamp') ?>/" + kodeheader,
            type: "Get",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                $("#isisampah").html(data)
            },
            error: function(sm) {
                Swal.fire(
                    'GAGAL!',
                    'Gagal Menyimpan Data',
                    'error')
            }
        })
    }

    //button tambah ke dalam tabel nota
    $("#tambah_sampah").on('click', function() {
        var user = $("#nasabah").val();
        var kodeheader = $("#no_nota").val();
        var nama_smph = $('#nama_sampah').val();
        var hrga = $('#harga').val();
        var jmlh_sampah = $('#jumlahsampah').val();
        var stotal = $('#subtotal').val();


        $.ajax({
            url: "<?= base_url('Transaksi/simpan_detail/') ?>",
            type: "POST",
            data: {
                user: user,
                kodeheader: kodeheader,
                nama_smph: nama_smph,
                hrga: hrga,
                jmlh_sampah: jmlh_sampah,
                stotal: stotal
            },
            dataType: "JSON",
            success: function(data) {
                if (data.status == true) {
                    Swal.fire(
                        'Berhasil!',
                        `${data.pesan}`,
                        'success'
                    )
                    getTempSamp(kodeheader);
                    // getDataTempAbk(kode_pengajuan);
                } else {
                    Swal.fire(
                        'GAGAL!',
                        `${a.pesan}`,
                        'error'
                    )
                }
            },
            error: function(er) {
                Swal.fire(
                    'GAGAL!',
                    `Api gagal`,
                    'error'
                )
            }
        })
    })

    // perhitungan subtotal
    $("#jumlahsampah").on('change', function() {
        var jmlh_sampah = parseInt($(this).val());
        var harga = parseInt($('#harga').val());
        var total = jmlh_sampah * harga;
        $("#subtotal").val(total)
    })

    $("#nama_sampah").on('change', function() {
        $("#harga").val("")
        $.ajax({
            url: "<?= base_url('Transaksi/cek_rego/') ?>/" + $(this).val(),
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                $("#harga").val(data.harga)
            },
            error: function(jqXHR, textStatus, errorThrow) {

            }
        })
    })
</script>
<?= $this->endSection(); ?>