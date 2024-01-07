<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Data Sembako Bank Sampah Harum Melati </h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Sembako Bank Sampah Harum Melati</h6>
    </div>
    <div class="card-body">
        <button href="#" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#myModal"">
            <span class=" icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data Sembako</span>
        </button>
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sembako</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Sembako</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php $no = 1;
                    foreach ($sko as $sm) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $sm->nama_sembako; ?></td>
                            <td><?= $sm->satuan; ?></td>
                            <td><?= $sm->harga; ?></td>
                            <td>
                                <button href="#" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#myModal" onclick="edit(`<?= $sm->kode_sembako ?>`)">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </button>&nbsp;
                                <button type="button" class="btn btn-danger btn-sm btn-icon-split" onclick="hapus(`<?= $sm->kode_sembako ?>`)">
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
                <h5 class="modal-title" id="myModalLabel">Form Sembako</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formsembako">
                <div class="modal-body">
                    <input type="hidden" name="kode_sembako" id="kode_sembako">
                    <div class="form-group">
                        <label for="namaSembako">Nama Sembako</label>
                        <input type="text" class="form-control" name="namaSembako" id="namaSembako" placeholder="Nama Sembako" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan1">Satuan</label>
                        <input type="text" class="form-control" name="satuan1" id="satuan1" placeholder="Satuan" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Sembako</label>
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
        $("#formsembako")[0].reset();
        $("#submit").text("Tambah Data");
    }

    function edit(kode_sembako) {
        $("#formsembako")[0].reset();
        $("#submit").text("Edit Data");
        metode = "edit";
        $.ajax({
            url: "<?= base_url('Uploadsembako/edit/') ?>/" + kode_sembako,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $("#namaSembako").val(data.nama_sembako)
                $('#kode_sembako').val(kode_sembako);
                $("#harga").val(data.harga)
            },
            error: function(jqXHR, textStatus, errorThrow) {
                alert("Data Gagal Disimpan");
            }
        })
    }

    $('#formsembako').on('submit', function(ed) {

        ed.preventDefault();
        $.ajax({
            url: "<?= base_url('Uploadsembako/save/') ?>/" + metode,
            type: "POST",
            data: $("#formsembako").serialize(),
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


    function hapus(kode_sembako) {
        Swal.fire({
            title: 'Apakah Data Ingin Dihapus?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('Uploadsembako/delete'); ?>/" + kode_sembako,
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