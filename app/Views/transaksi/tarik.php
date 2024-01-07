<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $this->db = db_connect(); ?>

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Data Penarikan Nasabah Bank Sampah Harum Melati</h1> -->

<?php
if (session()->get('hak_akses') == 'admin') :
?>
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Input Penarikan</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="collapseCardExample">
            <div class="card-body">
                <form method="POST" id="formtarik" action="<?= base_url('Tarik/save/add') ?>">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Kode Penarikan</label>
                                <input type="text" class="form-control" id="no_tarik" name="no_tarik" readonly value="TR - <?= date("Hismyd") ?>" placeholder="Harga Sampah">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Nasabah</label>
                                <select name="nama_nasabah" id="nama_nasabah" class="form-control" required="">
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
                                <label for="nama">Saldo</label>
                                <input type="text" class="form-control" id="saldo" required placeholder="Saldo" readonly="">


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Jumlah Penarikan</label>
                                <input type="text" class="form-control" name="jumlahtarik" id="jumlahtarik" placeholder="Jumlah Penarikan" required>
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



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penarikan Bank Sampah Harum Melati</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Penarikan</th>
                        <th>Nama Nasabah</th>
                        <th>Jumlah Penarikan</th>
                        <th>Sisa Saldo</th>

                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Penarikan</th>
                        <th>Nama Nasabah</th>
                        <th>Jumlah Penarikan</th>
                        <th>Sisa Saldo</th>

                    </tr>
                </tfoot> -->
                <tbody>
                    <?php $no = 1;
                    foreach ($tark as $tr) :
                        $nmnasabah = $this->db->query("SELECT * FROM user WHERE id_user='" . $tr->id_nasabah . "'")->getRow();
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= tgl_indo($tr->tgl_tarik); ?></td>
                            <td><?= $nmnasabah->nama; ?></td>
                            <td><?= rupiah($tr->jmlh_tarik); ?></td>
                            <td><?= rupiah($tr->sisa_saldo); ?></td>
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
    $("#nama_nasabah").on('change', function() {
        $("#saldo").val("")
        $.ajax({
            url: "<?= base_url('Tarik/cek_saldo/') ?>/" + $(this).val(),
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                $("#saldo").val(data.saldo)
            },
            error: function(jqXHR, textStatus, errorThrow) {

            }
        })
    })

    // perhitungan subtotal
    $("#jumlahtarik").on('keyup', function() {
        var jmlh_tarik = parseInt($(this).val());
        var saldo = parseInt($('#saldo').val());
        if (jmlh_tarik > saldo) {
            Swal.fire(
                'Informasi!',
                `Jumlah Penarikan Melebihi Jumalah Saldo`,
                'Warning'
            )
            $('#jumlahtarik').val('')
        }
    })
</script>

<?= $this->endSection(); ?>