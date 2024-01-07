<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $this->db = db_connect(); ?>

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Data Sembako Bank Sampah Harum Melati</h1> -->

<?php
if (session()->get('hak_akses') == 'admin') :
?>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Input Penukaran Sembako</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="collapseCardExample">
            <div class="card-body">
                <form method="POST" id="formtransaksi" action="<?= base_url('Sembako/simpan_transaksi') ?>">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Kode Nota</label>
                                <input type="text" class="form-control" id="kode_penukaran" name="kode_penukaran" readonly value="TR - <?= date("Hismyd") ?>" placeholder="Harga Sampah">
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
                                <label for="nama">Nama Sembako</label>
                                <select name="nama_sembako" id="nama_sembako" class="form-control" required="">
                                    <option value="">Pilih Sembako</option>
                                    <?php
                                    foreach ($semba as $sb) :
                                    ?>
                                        <option value="<?= $sb->kode_sembako ?>"><?= $sb->nama_sembako ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Harga Sembako</label>
                                <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Sembako" readonly="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Jumlah Satuan Sembako</label>
                                <input type="text" class="form-control" id="jumlahsembako" name="jumlahsembako" placeholder="Jumlah Satuan" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Sub Total</label>
                                <input type="text" class="form-control" name="subtotal" id="subtotal" placeholder="Sub Total" readonly="">
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
                                <button class="btn btn-primary" type="button" id="tambah_sembako" name="tambah_sembako">
                                    Tukar Sembako
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
                                            <th>Nama Sembako</th>
                                            <th>Harga</th>
                                            <th>Jumlah Sembako</th>
                                            <th>Sub Total</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sembako</th>
                                            <th>Harga</th>
                                            <th>Jumlah Sembako</th>
                                            <th>Sub Total</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                    <tbody id="isisembako"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Simpan Sembako</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php endif; ?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Sembako</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Penukaran</th>
                        <th>No Transaksi</th>
                        <th>Nama Nasabah</th>
                        <th>Nama Petugas</th>
                        <th>Total</th>

                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Penukaran</th>
                        <th>No Transaksi</th>
                        <th>Nama Nasabah</th>
                        <th>Nama Petugas</th>
                        <th>Total</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php $no = 1;
                    foreach ($trans as $s) :
                        $nmnasabah = $this->db->query("SELECT * FROM user WHERE id_user='" . $s->Id_nasabah . "'")->getRow();

                        $nmpetugas = $this->db->query("SELECT * FROM user WHERE id_user='" . $s->id_petugas . "'")->getRow();
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= tgl_indo($s->tgl); ?></td>
                            <td><?= $s->kode_penukaran; ?></td>
                            <td><?= @$nmnasabah->nama; ?></td>
                            <td><?= $nmpetugas->nama; ?></td>
                            <td><?= rupiah($s->total_penukaran); ?></td>

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
    function batal(kode_detail, kode_penukaran) {
        $.ajax({
            url: "<?= base_url('Sembako/batal2') ?>/" + kode_detail,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                if (data.status == true) {
                    Swal.fire(
                        'Berhasil!',
                        `${data.pesan}`,
                        'success')
                    getTempSem(kode_penukaran);
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

    $("#nama_sembako").on('change', function() {
        $("#harga").val("")
        $.ajax({
            url: "<?= base_url('Sembako/cek_hargaa/') ?>/" + $(this).val(),
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

    // perhitungan subtotal
    $("#jumlahsembako").on('change', function() {
        var jmlh_sembako = parseInt($(this).val());
        var harga = parseInt($('#harga').val());
        var total = jmlh_sembako * harga;
        $("#subtotal").val(total)
    })

    $("#tambah_sembako").on('click', function() {


        var user = $("#nasabah").val();
        var kode_penukaran = $("#kode_penukaran").val();
        var kode_sembako = $("#nama_sembako").val();
        var hrga = $('#harga').val();
        var jmlh_sembako = $('#jumlahsembako').val();
        var stotal = $('#subtotal').val();

        $.ajax({
            url: "<?= base_url('Sembako/simpan_detail/') ?>",
            type: "POST",
            data: {
                user: user,
                kode_penukaran: kode_penukaran,
                kode_sembako: kode_sembako,
                harga: hrga,
                jumlah: jmlh_sembako,
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
                    getTempSem(kode_penukaran);
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

    // isi tabel nota
    function getTempSem(kode_penukaran) {
        $.ajax({
            url: "<?= base_url('Sembako/getTempSem') ?>/" + kode_penukaran,
            type: "Get",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                $("#isisembako").html(data)
            },
            error: function(sm) {
                Swal.fire(
                    'GAGAL!',
                    'Gagal Mengambil Data',
                    'error')
            }
        })
    }
</script>

<?= $this->endSection(); ?>