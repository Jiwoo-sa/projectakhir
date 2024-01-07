<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Transaksi extends BaseController
{
    public $trans = '';
    public function __construct()
    {
        $this->trans = new sampahmodel();
    }



    public function index()
    {
        $trs = $this->trans;

        $data = [
            'oke'   => $this->trans
        ];

        if (session()->get('hak_akses') == 'admin') {
            $data = [
                'transk'  => $trs->getAll('transaksi')->getResult(),
                'sampah'    => $trs->getAll('data_sampah')->getResult(),
                'nasabah'   => $trs->getWhere('user', '*', ['hak_akses' => 'user'])->getResult(),
            ];
        } else {
            $data = [
                'transk'  => $trs->getWhere('transaksi', '*', ['id_user' => session()->get('id_user')])->getResult(),
                'sampah'    => $trs->getAll('data_sampah')->getResult(),
                'nasabah'   => $trs->getWhere('user', '*', ['hak_akses' => 'user'])->getResult(),
            ];
        }
        return view('transaksi/transaksi', $data);
    }

    // public function save($metode)
    // {
    //     $send = [
    //         'tgl'  => $this->request->getPost('tanggal'),
    //         'id_user'  => $this->request->getPost('iduser'),
    //         'keterangan'  => $this->request->getPost('keterangan'),
    //         'total_trans'  => $this->request->getPost('total'),
    //     ];
    //     if ($metode == 'add') {
    //         $simpan = $this->trans->insData('transaksi', $send);
    //         if ($simpan) {
    //             echo json_encode(['status' => true, 'pesan' => 'Data Transaksi berhasil Disimpan']);
    //         } else {
    //             echo json_encode(['status' => false, 'pesan' => 'Data Transaksi gagal Disimpan']);
    //         }
    //     } else {
    //         return view('/Transaksi');
    //     }
    // }

    public function cek_rego($kode_sampah)
    {
        $data = $this->trans->getWhere('data_sampah', '*', ['id_sampah' => $kode_sampah])->getRow();
        echo json_encode($data);
    }

    // simpan input ke tabel nota
    public function simpan_detail()
    {
        $kirim  = [
            'kodeheader' => $this->request->getPost('kodeheader'),
            'tgl' => date("Y-m-d"),
            'id_sampah' => $this->request->getPost('nama_smph'),
            'harga' => $this->request->getPost('hrga'),
            'jmlh_sampah' => $this->request->getPost('jmlh_sampah'),
            'user' => $this->request->getPost('user')
        ];

        $insrt = $this->trans->insData('transaksi_temp', $kirim);
        if ($insrt) {
            echo json_encode(['status' => true, 'pesan' => 'Data Transaksi berhasil Disimpan']);
        } else {
            echo json_encode(['status' => false, 'pesan' => 'Data Transaksi gagal Disimpan1']);
        }
    }

    public function getTempSamp($kodeheader)
    {
        $data = $this->trans->getwhere('transaksi_temp', '*', ['kodeheader' => rawurldecode($kodeheader)])->getResult();
        $output = '';
        $no = 1;
        foreach ($data as $d) :
            $smp = $this->trans->getWhere('data_sampah', '*', ['id_sampah' => $d->id_sampah])->getRow();

            $output .= ' 
            <tr>
            <td>' . $no++ . '</td>
            <td>' . $smp->nama_sampah . '</td>
            <td>' . $d->harga . '</td>
            <td>' . $d->jmlh_sampah . '</td>
            <td>' . $d->harga * $d->jmlh_sampah . '</td>
            <td>  <button class="btn btn-danger bd-0" type="button" onclick="batal(`' . $d->id_detail . '`,`' . $d->kodeheader . '`)">Batal</button></td>
            </tr>
            ';
        endforeach;
        echo json_encode($output);
    }

    //button batal pada tabel nota
    public function batal2($kode_detail)
    {
        $hps = $this->trans->delData('transaksi_temp', ['id_detail' => rawurldecode($kode_detail)]);
        if ($hps) {
            echo json_encode(['status' => true, 'pesan' => 'Data Transaksi berhasil Dihapus']);
        } else {
            echo json_encode(['status' => false, 'pesan' => 'Data Transaksi gagal Dihapus']);
        }
    }

    public function simpan_transaksi()
    {

        $cek_total = $this->trans->getWhere('transaksi_temp', '*', ['kodeheader' => $this->request->getPost('no_nota')])->getResult();
        $total_trans = 0;
        foreach ($cek_total as $ct) :
            $total_trans += $ct->harga * $ct->jmlh_sampah;
        endforeach;
        $kirimheader = [
            'kode_trans'        => $this->request->getPost('no_nota'),
            'tgl'               => date("Y-m-d"),
            'id_user'           => $this->request->getPost('nasabah'),
            'keterangan'        => $this->request->getPost('keterangan'),
            'total_trans'       => $total_trans
        ];

        $simpan = $this->trans->insData('transaksi', $kirimheader);

        $user = $this->trans->getWhere('user', '*', ['id_user' => $this->request->getPost('nasabah')])->getRow();
        $up = [
            'saldo' => $user->saldo + $total_trans
        ];

        $updt = $this->trans->upData('user', $up, ['id_user' => $this->request->getPost('nasabah')]);

        if ($simpan) {
            foreach ($cek_total as $ct) :
                $kirimdetail  = [
                    'kode_trans' => $ct->kodeheader,
                    'id_sampah' => $ct->id_sampah,
                    'harga' => $ct->harga,
                    'jmlh_sampah' => $ct->jmlh_sampah
                ];
                $this->trans->insData('transaksi_tabel', $kirimdetail);
                $this->trans->delData('transaksi_temp', ['id_detail' => $ct->id_detail]);
            endforeach;
        }

        $pop = [
            'pesan' => 'berhasil Simpan',
            'status' => true
        ];
        session()->set($pop);
        return redirect()->to('/Transaksi');
    }
}
