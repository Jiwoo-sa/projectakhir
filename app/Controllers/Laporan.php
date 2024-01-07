<?php

namespace App\Controllers;

use App\Models\sampahmodel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    public $db = '';
    public $lap = '';
    public function __construct()
    {
        $this->lap = new sampahmodel();
        $this->db = db_connect();
    }



    public function index()
    {

        return view('transaksi/laporan');
    }


    public function cetak_laporan()
    {
        $filename = date('y-m-d-H-i-s') . 'Laporan Bank Sampah';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        if ($this->request->getPost('jenis_laporan') == 'pemasukan') {
            $title = "PEMASUKAN";
            $datane = $this->db->query("SELECT * FROM transaksi WHERE tgl BETWEEN '" . $this->request->getPost('tgl_awal') . "' AND '" . $this->request->getPost('tgl_akhir') . "'");
        } else if ($this->request->getPost('jenis_laporan') == 'penarikan') {
            $title = "PENARIKAN";
            $datane = $this->db->query("SELECT * FROM penarikan WHERE tgl_tarik BETWEEN '" . $this->request->getPost('tgl_awal') . "' AND '" . $this->request->getPost('tgl_akhir') . "'");
        } else if ($this->request->getPost('jenis_laporan') == 'penukaran') {
            $title = "PENUKARAN";
            $datane = $this->db->query("SELECT * FROM transaksi_penukaran WHERE tgl BETWEEN '" . $this->request->getPost('tgl_awal') . "' AND '" . $this->request->getPost('tgl_akhir') . "'");
        }

        $data = [
            'tgl_awal' => $this->request->getPost('tgl_awal'),
            'tgl_akhir' => $this->request->getPost('tgl_akhir'),
            'title'     => $title,
            'isine'     => $datane
        ];
        $dompdf->loadHtml(view('laporan/cetak_laporan', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }
}
