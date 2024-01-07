<?php
$this->db = db_connect();
$bulane = array('', 'Janurari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Cetak Laporan</title>
</head>

<body>
	<table width="100%">
		<tr style="margin-top: 8px; margin-bottom: 5px;">
			<td>

				<center>
					<p style="font-size: 20px;  padding-left: 100px; margin-top:0px; margin-bottom: 0px;">LAPORAN <?= $title ?></p>
				</center>
				<center>
					<p style="font-size: 20px;  padding-left: 100px; margin-top:0px; margin-bottom: 0px;">Periode : <?= tgl_indo($tgl_awal) . " - " . tgl_indo($tgl_akhir) ?></p>
				</center>
				<!--  -->
				<center>
					<p style="font-size: 25px;  padding-left: 100px;font-weight: 600; margin-top:10px; margin-bottom: 0px;">"BANK SAMPAH HARUM MELATI"</p>
				</center>
				<center>
					<p style="margin-left: 100px; font-size: 15px; padding-right: 15px; margin-bottom: 0px; vertical-align: middle;">KELURAHAN PANJANG WETAN KOTA PEKALONGAN</p>
				</center>
				<center>
					<p style="margin-left: 100px; font-size: 15px; padding-right: 15px; margin-bottom: 0px; vertical-align: middle;">Jl. W.R Supratman Pisang Sari Gg Cucut RT 003/RW 011 <br> Kelurahan Panjang Wetan,Kecamatan Pekalongan Utara, Kota Pekalongan, Jawa Tengah</p>
				</center>

			</td>

		</tr>


	</table>
	<br>
	<table width="100%" border="1" cellpadding="4" cellspacing="0">
		<?php
		if ($title == "PEMASUKAN") {
		?>

			<tr>
				<th>No</th>
				<th>No Transaksi</th>
				<th>Tanggal Transaksi</th>
				<th>Nama Nasabah</th>
				<th>Keterangan</th>
				<th>Total</th>
			</tr>
			<?php $no = 1;
			foreach ($isine->getResult() as $tr) :

				$nmnasabah = $this->db->query("SELECT * FROM user WHERE id_user='" . $tr->id_user . "'")->getRow();

			?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $tr->kode_trans; ?></td>
					<td>
						<center><?= tgl_indo($tr->tgl); ?></center>
					</td>
					<td><?= @$nmnasabah->nama; ?></td>
					<td><?= $tr->keterangan; ?></td>
					<td>
						<center><?= rupiah($tr->total_trans); ?></center>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php

		} else if ($title == "PENARIKAN") {
		?>
			<tr>
				<th>No</th>
				<th>Tanggal Penarikan</th>
				<th>Nama Nasabah</th>
				<th>Jumlah Penarikan</th>
				<th>Sisa Saldo</th>

			</tr>
			<?php $no = 1;
			foreach ($isine->getResult() as $t) :
				$nmnasabah = $this->db->query("SELECT * FROM user WHERE id_user='" . $t->id_nasabah . "'")->getRow();
			?>
				<tr>
					<td><?= $no++; ?></td>
					<td>
						<center><?= tgl_indo($t->tgl_tarik); ?></center>
					</td>
					<td><?= @$nmnasabah->nama; ?></td>
					<td>
						<center><?= rupiah($t->jmlh_tarik); ?></center>
					</td>
					<td>
						<center><?= rupiah($t->sisa_saldo); ?></center>
					</td>
				</tr>
			<?php endforeach; ?>

		<?php
		} else if ($title == "PENUKARAN") {
		?>
			<tr>
				<th>No</th>
				<th>No Transaksi</th>
				<th>Tanggal Penukaran</th>
				<th>Nama Nasabah</th>
				<th>Nama Petugas</th>
				<th>Total</th>
			</tr>
			<?php $no = 1;
			foreach ($isine->getResult() as $s) :
				$nmnasabah = $this->db->query("SELECT * FROM user WHERE id_user='" . $s->Id_nasabah . "'")->getRow();

				$nmpetugas = $this->db->query("SELECT * FROM user WHERE id_user='" . $s->id_petugas . "'")->getRow();
			?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $s->kode_penukaran; ?></td>
					<td>
						<center><?= tgl_indo($s->tgl); ?></center>
					</td>
					<td><?= @$nmnasabah->nama; ?></td>
					<td><?= $nmpetugas->nama; ?></td>
					<td>
						<center><?= rupiah($s->total_penukaran); ?></center>
					</td>

				</tr>

			<?php endforeach; ?>
		<?php
		}

		?>

	</table>

	<table width="100%">
		<tr>
			<td>
				<br>
				<br>
				<p style="margin-left: 50px;">Ketua Bank Sampah Harum Melati</p>
				<p style="margin-left: 75px; text-align: justify;">Kelurahan Panjang Wetan</p>
				<br>
				<br>
				<p style="margin-left: 100px; text-align: justify;">Suharyono, KM</p>
			</td>
			<td>
				<br>
				<p style="margin-left: 415px; margin-top: 0px">Pekalongan, <?php echo tgl_indo(date('Y-m-d')) ?></p>
				<p style="margin-left: 415px; text-align: justify;">Pegawai Bank Sampah Harum Melati</p>
				<p style="margin-left: 455px; text-align: justify;">Kelurahan Panjang Wetan</p>
				<br>
				<br>
				<p style="margin-left: 500px; text-align: justify;"><?= session()->get('nama')  ?></p>
			</td>
		</tr>
	</table>


</body>

</html>