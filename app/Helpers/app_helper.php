<?php 

function formatTanggalJamIndonesia($dateTimeString) {
    // Membuat objek DateTime dari string yang diberikan
    $dateTime = new DateTime($dateTimeString, new DateTimeZone('UTC'));

    // Mengatur timezone ke Asia/Jakarta
    $dateTime->setTimezone(new DateTimeZone('Asia/Jakarta'));

    // Format tanggal dan jam sesuai keinginan (contoh: 08 November 2023 12:03:01)
    $formattedDateTime = $dateTime->format('d F Y H:i:s');

    return $formattedDateTime;
}

if (!function_exists('generate_qrcode')) {
    /**
     * Generate a QR code for the given data and return the QR code image URL.
     *
     * @param string $data Data to be encoded in the QR code.
     * @param string $size Size of the QR code (e.g., "100x100").
     * @return string QR code image URL.
     */
    function generate_qrcode($data, $size = '100x100')
    {
        // Load the QRCode library
        helper('filesystem');
        $path = WRITEPATH . 'qrcodes/';
        $filename = 'qrcode_' . md5($data) . '.png';
        $filepath = $path . $filename;

        if (!file_exists($filepath)) {
            // Create the QR code
            $qrCode = new Endroid\QrCode\QrCode($data);
            $qrCode->setSize(explode('x', $size)[0]);
            $qrCode->setMargin(10);

            // Save the QR code image
            write_file($filepath, $qrCode->writeString());
        }

        return base_url('writable/qrcodes/' . $filename);
    }
}

function tgl_indo($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function rupiah($d)
{
	return 'Rp.' . number_format($d, 0, ',', '.');
}

function format_indo($tgl)
{
	$pecahka = explode('-', $tgl);
	return $pecahka[2] . ' ' . $pecahka[1] . ' ' . $pecahka[0];
}

 function bulane($bulan){
   	$data_bulan = array(
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'Mei',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Agu',
            '09' => 'Sep',
            '10' => 'Okt',
            '11' => 'Nov',
            '12' => 'Des',
    );
    return $data_bulan[$bulan];
   }

   function random_color_part(){
  return str_pad(dechex(mt_rand(0,255)), 2, '0',STR_PAD_LEFT);
}

function random_color(){
 return random_color_part().random_color_part().random_color_part();
}
