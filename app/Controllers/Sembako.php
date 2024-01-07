<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Sembako extends BaseController
{
    public $sem = '';
    public function __construct()
    {
        $this->sem = new sampahmodel();
    }



    public function index()
    {
        $sembak = $this->sem;

        $data = [
            'oke'   => $this->sem
        ];

        if (session()->get('hak_akses') == 'admin') {
            $data = [
                'semba'  => $sembak->getAll('sembako')->getResult(),
                'trans' => $sembak->getAll('transaksi_penukaran')->getResult(),
                'semb'  => $sembak->getAll('sembako')->getResult(),
                'nasabah'   => $sembak->getWhere('user', '*', ['hak_akses' => 'user'])->getResult(),

            ];
        } else {

            $data = [

                'semba'  => $sembak->getAll('sembako')->getResult(),
                'trans' => $sembak->getWhere('transaksi_penukaran', '*', ['Id_nasabah' => session()->get('id_user')])->getResult(),
                'semb'  => $sembak->getAll('sembako')->getResult(),
                'nasabah'   => $sembak->getWhere('user', '*', ['hak_akses' => 'user'])->getResult(),
            ];
        }



        return view('transaksi/sembako', $data);
    }

    public function simpan_detail()
    {
        $kirim  = [
            'kode_penukaran' => $this->request->getPost('kode_penukaran'),
            'kode_sembako' => $this->request->getPost('kode_sembako'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        $insrt = $this->sem->insData('detail_penukaran_temp', $kirim);
        if ($insrt) {
            echo json_encode(['status' => true, 'pesan' => 'Data Sembako berhasil Disimpan']);
        } else {
            echo json_encode(['status' => false, 'pesan' => 'Data Sembako gagal Disimpan']);
        }
    }


    public function cek_hargaa($kode_sembako)
    {
        $data = $this->sem->getWhere('sembako', '*', ['kode_sembako' => $kode_sembako])->getRow();
        echo json_encode($data);
    }

    public function getTempSem($kode_penukaran)
    {
        $data = $this->sem->getwhere('detail_penukaran_temp', '*', ['kode_penukaran' => rawurldecode($kode_penukaran)])->getResult();
        $output = '';
        $no = 1;
        foreach ($data as $d) :
            $smp = $this->sem->getWhere('sembako', '*', ['kode_sembako' => $d->kode_sembako])->getRow();

            $output .= ' 
            <tr>
            <td>' . $no++ . '</td>
            <td>' . $smp->nama_sembako . '</td>
            <td>' . $d->harga . '</td>
            <td>' . $d->jumlah . '</td>
            <td>' . $d->harga * $d->jumlah . '</td>
            <td>  <button class="btn btn-danger bd-0" type="button" onclick="batal(`' . $d->kode_detail . '`,`' . $d->kode_penukaran . '`)">Batal</button></td>
            </tr>
            ';
        endforeach;
        echo json_encode($output);
    }

    //button batal pada tabel nota
    public function batal2($kode_detail)
    {
        $hps = $this->sem->delData('detail_penukaran_temp', ['kode_detail' => rawurldecode($kode_detail)]);
        if ($hps) {
            echo json_encode(['status' => true, 'pesan' => 'Data Penukaran berhasil Dihapus']);
        } else {
            echo json_encode(['status' => false, 'pesan' => 'Data Penukaran gagal Dihapus']);
        }
    }

    public function simpan_transaksi()
    {

        $cek_total = $this->sem->getWhere('detail_penukaran_temp', '*', ['kode_penukaran' => $this->request->getPost('kode_penukaran')])->getResult();
        $total_trans = 0;
        foreach ($cek_total as $ct) :
            $total_trans += $ct->harga * $ct->jumlah;
        endforeach;
        $kirimheader = [
            'kode_penukaran'        => $this->request->getPost('kode_penukaran'),
            'tgl'               => date("Y-m-d"),
            'Id_nasabah'           => $this->request->getPost('nasabah'),
            'total_penukaran'       => $total_trans,
            'id_petugas'        => session()->get('id_user')
        ];

        $simpan = $this->sem->insData('transaksi_penukaran', $kirimheader);

        $user = $this->sem->getWhere('user', '*', ['id_user' => $this->request->getPost('nasabah')])->getRow();
        $up = [
            'saldo' => $user->saldo - $total_trans
        ];

        $updt = $this->sem->upData('user', $up, ['id_user' => $this->request->getPost('nasabah')]);

        if ($simpan) {
            foreach ($cek_total as $ct) :
                $kirimdetail  = [
                    'kode_penukaran' => $ct->kode_penukaran,
                    'kode_sembako' => $ct->kode_sembako,
                    'harga' => $ct->harga,
                    'jumlah' => $ct->jumlah
                ];
                $this->sem->insData('detail_penukaran', $kirimdetail);
                $this->sem->delData('detail_penukaran_temp', ['kode_detail' => $ct->kode_penukaran]);
            endforeach;
        }

        $pop = [
            'pesan' => 'berhasil Simpan',
            'status' => true
        ];
        session()->set($pop);
        return redirect()->to('/Sembako');
    }
}
