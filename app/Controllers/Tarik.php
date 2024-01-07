<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Tarik extends BaseController
{
    public $tar = '';
    public function __construct()
    {
        $this->tar = new sampahmodel();
    }



    public function index()
    {
        $trk = $this->tar;

        $data = [
            'oke'   => $this->tar
        ];

        if (session()->get('hak_akses') == 'admin') {
            $data = [
                'tark'  => $trk->getAll('penarikan')->getResult(),
                'us' => $trk->getAll('user')->getResult(),
                'nasabah'   => $trk->getWhere('user', '*', ['hak_akses' => 'user'])->getResult(),
            ];
        } else {
            $data = [
                'tark'  => $trk->getWhere('penarikan', '*', ['id_nasabah' => session()->get('id_user')])->getResult(),
                'us' => $trk->getAll('user')->getResult(),
                'nasabah'   => $trk->getWhere('user', '*', ['hak_akses' => 'user'])->getResult(),
            ];
        }



        return view('transaksi/tarik', $data);
    }

    public function save($metode)
    {

        $cek = $this->tar->getWhere('user', '*', ['id_user' => $this->request->getPost('nama_nasabah')])->getRow();
        $up = [
            'saldo' => $cek->saldo - $this->request->getPost('jumlahtarik')
        ];
        $this->tar->upData('user', $up, ['id_user' => $this->request->getPost('nama_nasabah')]);
        $send = [
            'id_nasabah'  => $this->request->getPost('nama_nasabah'),
            'tgl_tarik'  => date('Y-m-d'),
            'jmlh_tarik'  => $this->request->getPost('jumlahtarik'),
            'sisa_saldo'  => $up['saldo'],
            'id_admin'  => session()->get('id_user'),
        ];
        if ($metode == 'add') {
            $simpan = $this->tar->insData('penarikan', $send);
            if ($simpan) {
                $pop = [
                    'pesan' => 'Berhasil Simpan',
                    'status' => true
                ];
                session()->set($pop);
                return redirect()->to('/Tarik');
            } else {
                $pop = [
                    'pesan' => 'Gagal Simpan',
                    'status' => false
                ];
                session()->set($pop);
                return redirect()->to('/Tarik');
            }
        } else {
            return view('/Tarik');
        }
    }

    public function cek_saldo($id_user)
    {
        $data = $this->tar->getWhere('user', '*', ['id_user' => $id_user])->getRow();
        echo json_encode($data);
    }
}
