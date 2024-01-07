<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<?php
$hak_akses = session()->get('hak_akses');
?>
<?php
if ($hak_akses == 'admin') :
    ?>
    <!--  <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Update Informasi Bank Sampah Harum Melati</h1> -->
    <?php
endif;
?>
<?php
if ($hak_akses == 'user') :
    ?>
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Informasi Bank Sampah Harum Melati</h1> -->
    <?php
endif;
?>

<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <?php
        if ($hak_akses == 'admin') :
            ?>
            <h6 class="m-0 font-weight-bold text-primary">Update Informasi</h6>
            <?php
        endif; ?>
        <?php
        if ($hak_akses == 'user') :
            ?>
            <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
            <?php
        endif; ?>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="card-body">
            <?php
            if ($hak_akses == 'admin') :
                ?>
                <form method="POST" action="<?= base_url('Informasi/simpan') ?>" id="form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_informasi" value="<?= @$inf->kode_informasi ?>" id="id_informasi" required>
                        <div class="form-group">
                            <label for="judul">Judul Informasi</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Informasi" value="<?= @$inf->judul_informasi ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="isi">Isi Informasi</label>
                            <textarea type="text" class="form-control" name="isi" id="isi" placeholder="Isi Informasi" required><?= @$inf->isi_informasi ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="foto">Upload Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" placeholder="Upload Foto" value="<?= @$inf->judul_informasi ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update Informasi</button>
                    </div>
                </form>

            </div>
        </div>
        <?php
    endif; ?>

    <?php
    if ($hak_akses == 'user') :
        ?>

        <table width="100%">
            <tr style="margin-top: 8px; margin-bottom: 5px;">
                <td>

                    <center>
                        <p style="font-size: 20px;  padding-left: 100px; margin-top:0px; margin-bottom: 0px;">Ketentuan Bank Sampah Harum Melati RW 11</p>
                    </center>
                    <center>
                        <p style="margin-left: 100px; font-size: 15px; padding-right: 15px; margin-bottom: 0px; vertical-align: middle;">KELURAHAN PANJANG WETAN KOTA PEKALONGAN</p>
                    </center>
                    <br>
                    <br>

                        <ul>
                            <li>Jadwal penyetoran sampah</li>
                            <li>Penyetoran sampah mulai jam</li>
                            <li>Harga sampah bisa berubah sesuai dengan kesepakatan harga dari pengepul</li>
                            <li>Nasabah memilah sampah yang akan ditabung</li>
                            <li>Penarikan bisa dilakukan sesuai dengan kebutuhan nasabah</li>
                            <li>Saldo bisa ditukarkan dengan sembako sesuai harga sembako di bank sampah</li>
                        </ul>
                        <br>
                        <br>
                </td>
            </tr>
        </table>
        <?php
    endif; ?>
</div>

<script type="text/javascript">
    <?php
    $status_kirim = session()->get('status');
    if ($status_kirim != "" || $status_kirim != null) {
        ?>
        $(document).ready(function() {
            Swal.fire(
                'Informasi',
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
<?= $this->endSection(); ?>