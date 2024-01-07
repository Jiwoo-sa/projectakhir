<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Data Anggota Nasabah Bank Sampah Harum Melati</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Nasabah Bank Sampah Harum Melati</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telfon</th>
                        <th>Jenis Kelamin</th>
                        <th>Saldo</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telfon</th>
                        <th>Jenis Kelamin</th>
                        <th>Saldo</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php $no = 1;
                    foreach ($userna as $h) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $h->nama; ?></td>
                            <td><?= $h->alamat; ?></td>
                            <td><?= $h->no_hp; ?></td>
                            <td><?= $h->jns_kelamin; ?></td>
                            <td><?= rupiah($h->saldo); ?></td>
                            <td><?= $h->username; ?></td>
                            <td>
                                <button href="#" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#myModal" onclick="edit(`<?= $h->id_user ?>`)">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </button>&nbsp;
                                <button type="button" class="btn btn-danger btn-sm btn-icon-split" onclick="hapus(`<?= $h->id_user ?>`)">
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


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Nasabah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formnasabah">
                <div class="modal-body">
                    <input type="hidden" name="id_user" id="id_user">
                    <div class="form-group">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="namaLengkap" id="namaLengkap" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="4" placeholder="Alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="noHP">Nomor HP</label>
                        <input type="text" class="form-control" name="noHp" id="noHp" placeholder="Nomor HP" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" id="lakiLaki" value="laki-laki">
                            <label class="form-check-label" for="lakiLaki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" id="perempuan" value="perempuan">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
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

    $('#formnasabah').on('submit', function(ed) {

        ed.preventDefault();
        $.ajax({
            url: "<?= base_url('Nasabah/save/') ?>/" + metode,
            type: "POST",
            data: $("#formnasabah").serialize(),
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

    function edit(id_user) {
        $("#formnasabah")[0].reset();
        $("#submit").text("Edit Data");
        metode = "edit";
        $.ajax({
            url: "<?= base_url('Nasabah/edit/') ?>/" + id_user,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#id_user').val(id_user);
                $('#namaLengkap').val(`${data.nama}`);
                $('#alamat').text(`${data.alamat}`);
                $('#noHp').val(`${data.no_hp}`);
                if (data.jns_kelamin == 'laki-laki') {
                    $('#lakiLaki').attr('checked', 'checked');
                } else {
                    $('#perempuan').attr('checked', 'checked');
                }

            },
            error: function(jqXHR, textStatus, errorThrow) {
                alert("Data Gagal Disimpan");
            }
        })
    }


    function hapus(id_user) {
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
                    url: "<?= base_url('Nasabah/delete'); ?>/" + id_user,
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
</script>



<?= $this->endSection(); ?>