<?php
$this->db = db_connect();
$bulane = array('', 'Janurari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Cetak Tabungan</title>
</head>

<body>
	<table width="100%">
		<tr style="margin-top: 8px; margin-bottom: 5px;">
			<td>

				<center>
					<p style="font-size: 20px;  padding-left: 100px; margin-top:0px; margin-bottom: 0px;">CETAK BUKU TABUNGAN</p>
				</center>
				<center>
					<p style="font-size: 20px;  padding-left: 100px; margin-top:0px; margin-bottom: 0px;"></p>
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

	<table width="50%" border="0">
		<tr>
			<td width="100%">
				<!-- Customer Information Table -->
				<table border="0" cellpadding="4" cellspacing="0" width="100%">
					<!-- <tr>
						<th colspan="2">Informasi Nasabah</th>
					</tr> -->
					<tr>
						<td>Nama Nasabah</td>
						<td> : <?= $user->nama ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td> : <?= $user->alamat ?></td>
					</tr>

					<!-- Add more customer information fields as needed -->
				</table>
			</td>
		</tr>
	</table>

	<table width="100%" border="1" cellpadding="4" cellspacing="0">

		<tr>
			<th>No</th>
			<!-- <th>No Transaksi</th> -->
			<th>Tanggal Transaksi</th>
			<th>Jenis Transaksi</th>
			<th>Nominal Transaksi</th>
			<th>Saldo</th>
		</tr>

		<?php
		$no = 1;
		$saldo = 0;
		$isine_masuk = $this->db->query("SELECT 'Pemasukan' as jenis ,tr.kode_trans as kode, tr.tgl, tr.id_user, tr.total_trans FROM transaksi tr WHERE tr.id_user='" . $user->id_user . "'")->getResult();

		$isine_tarik = $this->db->query("SELECT 'Penarikan' as jenis, tr.id_tarik as kode, tr.tgl_tarik as tgl, tr.id_nasabah, tr.jmlh_tarik as total_trans FROM penarikan tr WHERE tr.id_nasabah='" . $user->id_user . "'")->getResult();

		$isine_penukaran = $this->db->query("SELECT 'Penukaran' as jenis,  tr.kode_penukaran as kode, tr.tgl, tr.id_nasabah, tr.total_penukaran as total_trans FROM transaksi_penukaran tr WHERE tr.id_nasabah='" . $user->id_user . "'")->getResult();

		// Merge the results from three queries
		$isine = array_merge($isine_masuk, $isine_tarik, $isine_penukaran);

		// Sort the merged results by 'tgl' (date)
		usort($isine, function ($a, $b) {
			return strtotime($a->tgl) - strtotime($b->tgl);
		});
		foreach ($isine as $is) :
			if ($is->jenis == 'Pemasukan') {
				$saldo += $is->total_trans;
			} else {
				$saldo -= $is->total_trans;
			}
		?>
			<tr>
				<td>
					<center><?= $no++ ?></center>
				</td>
				<!-- <td><?= $is->kode ?></td> -->
				<td>
					<center><?= tgl_indo($is->tgl) ?></center>
				</td>
				<td>
					<center><?= $is->jenis ?></center>
				</td>
				<td>
					<center><?= rupiah($is->total_trans) ?></center>
				</td>
				<td>
					<center><?= rupiah($saldo) ?></center>
				</td>
			</tr>

		<?php endforeach; ?>



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