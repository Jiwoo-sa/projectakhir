<?php

namespace App\Controllers;

use App\Models\sampahmodel;
use Dompdf\Dompdf;

class Tabungan extends BaseController
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
                $trs = $this->lap;
        $data = [
               'nasabah'   => $trs->getWhere('user', '*', ['hak_akses' => 'user'])->getResult(),
        ];
        return view('transaksi/tabungan',$data);
    }


    public function cetak_tabungan()
    {
        $filename = date('y-m-d-H-i-s') . 'Cetak Tabungan Bank Sampah';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $id = $this->lap->getWhere('user', '*', ['id_user' => $this->request->getPost('id_user')])->getRow();
      //  $this->request->getPost('id_user' == 'id_user');
        $title = "id_user";
        // $datane = $this->db->query("SELECT * FROM transaksi WHERE tgl BETWEEN '" . $this->request->getPost('tgl_awal') . "' AND '" . $this->request->getPost('tgl_akhir') . "' AND id");
        // // if ($this->request->getPost('id_user') == 'id_user') {
        //     $title = "PEMASUKAN";
        //     $datane = $this->db->query("SELECT * FROM transaksi WHERE tgl BETWEEN '" . $this->request->getPost('tgl_awal') . "' AND '" . $this->request->getPost('tgl_akhir') . "'");
        // } else if ($this->request->getPost('id_user') == 'id_user') {
        //     $title = "PENARIKAN";
        //     $datane = $this->db->query("SELECT * FROM penarikan WHERE tgl_tarik BETWEEN '" . $this->request->getPost('tgl_awal') . "' AND '" . $this->request->getPost('tgl_akhir') . "'");
        // } else if ($this->request->getPost('id_user') == 'id_user') {
        //     $title = "PENUKARAN";
        //     $datane = $this->db->query("SELECT * FROM transaksi_penukaran WHERE tgl BETWEEN '" . $this->request->getPost('tgl_awal') . "' AND '" . $this->request->getPost('tgl_akhir') . "'");
        // }

        $data = [
            'tgl_awal' => $this->request->getPost('tgl_awal'),
            'tgl_akhir' => $this->request->getPost('tgl_akhir'),
            'user'      => $id
        ];
        $dompdf->loadHtml(view('laporan/cetak_tabungan', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }
}
