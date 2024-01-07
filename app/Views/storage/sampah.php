<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Data Sampah </h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Sampah Bank Sampah Harum Melati</h6>
    </div>
    <div class="card-body">
        <button href="#" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#myModal"">
            <span class=" icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data Sampah</span>
        </button>
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sampah</th>
                        <th>Jenis Sampah</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Sampah</th>
                        <th>Jenis Sampah</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php $no = 1;
                    foreach ($sam as $sm) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $sm->nama_sampah; ?></td>
                            <td><?= $sm->jns_sampah; ?></td>
                            <td><?= rupiah($sm->harga); ?></td>
                            <td>
                                <button href="#" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#myModal" onclick="edit(`<?= $sm->id_sampah ?>`)">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </button>&nbsp;
                                <button type="button" class="btn btn-danger btn-sm btn-icon-split" onclick="hapus(`<?= $sm->id_sampah ?>`)">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Delete</span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formsampah">
                <div class="modal-body">
                    <input type="hidden" name="id_sampah" id="id_sampah">
                    <div class="form-group">
                        <label for="namaSampah">Nama Sampah</label>
                        <input type="text" class="form-control" name="namaSampah" id="namaSampah" placeholder="Nama Sampah" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Sampah</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenissampah" id="anorganik" value="anorganik">
                            <label class="form-check-label" for="anorganik">Anorganik</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenissampah" id="organik" value="organik">
                            <label class="form-check-label" for="anorganik">Organik</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Sampah</label>
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var metode = "add";

    function tambah() {
        metode = "add";
        $("#formsampah")[0].reset();
        $("#submit").text("Tambah Data");
    }

    function edit(id_sampah) {
        $("#formsampah")[0].reset();
        $("#submit").text("Edit Data");
        metode = "edit";
        $.ajax({
            url: "<?= base_url('Sampah/edit/') ?>/" + id_sampah,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $("#namaSampah").val(data.nama_sampah)
                if (data.jns_sampah == 'anorganik') {
                    $("#anorganik").attr('checked', 'cheked');
                } else {
                    $("#organik").attr('checked', 'cheked');
                }
                $('#id_sampah').val(id_sampah);
                $("#harga").val(data.harga)
            },
            error: function(jqXHR, textStatus, errorThrow) {
                alert("Data Gagal Disimpan");
            }
        })
    }

    $('#formsampah').on('submit', function(ed) {

        ed.preventDefault();
        $.ajax({
            url: "<?= base_url('Sampah/save/') ?>/" + metode,
            type: "POST",
            data: $("#formsampah").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status == true) {
                    alert("Data Berhasil Disimpan");
                    location.reload();
                } else {
                    alert("Data Gagal Disimpan");
                }
            },
            error: function(er) {
                alert("Data Gagal Disimpan");
            }
        })
    })


    function hapus(id_sampah) {
        Swal.fire({
            title: 'Apakah Data Ingin Dihapus?',
            text: "Data Akan Terhapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('Sampah/delete'); ?>/" + id_sampah,
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    success: function(hp) {
                        if (hp.status == true) {
                            Swal.fire(
                                'Deleted!',
                                `${hp.pesan}`,
                                'success'
                            )
                            setTimeout(function() {
                                location.reload()
                            }, 1000)
                        } else {
                            Swal.fire(
                                'GAGAL!',
                                `${hp.pesan}`,
                                `error`
                            )
                        }
                    }
                })
            }
        })
    }
</script>

<?= $this->endSection(); ?>