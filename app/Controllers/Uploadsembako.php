<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Uploadsembako extends BaseController
{
    public $bako = '';
    public function __construct()
    {
        $this->bako = new sampahmodel();
    }



    public function index()
    {
        $mba = $this->bako;

        $data = [
            'sko'  => $mba->getWhere('sembako', '*', ['kode_sembako'])->getResult()
        ];

        return view('storage/uploadsembako', $data);
    }

    public function save($metode)
    {
        $send = [
            'nama_sembako'  => $this->request->getPost('namaSembako'),
            'satuan'  => $this->request->getPost('satuan1'),
            'harga'  => $this->request->getPost('harga'),

        ];
        if ($metode == 'add') {
            $simpan = $this->bako->insData('sembako', $send);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data Sembako berhasil Disimpan']);
            } else {
                echo json_encode(['status' => false, 'pesan' => 'Data Sembako gagal Disimpan']);
            }
        } else {
            $up = $this->bako->upData('sembako', $send, ['kode_sembako' => $this->request->getPost('kode_sembako')]);
            if ($up) {
                echo json_encode(['status' => true, 'pesan' => 'Data Sembako berhasil Diupdate']);
            } else {
                echo json_encode(['status' => false, 'pesan' => 'Data Sembako gagal Diupdate']);
            }
        }
    }


    function edit($kode_sembako)
    {
        $data = $this->bako->getWhere('sembako', '*', ['kode_sembako' => $kode_sembako])->getRow();
        echo json_encode($data);
    }

    function delete($kode_sembako)
    {
        $delete = $this->bako->delData('sembako', ['kode_sembako' => $kode_sembako]);
        if ($delete) {
            echo json_encode(['status' => true, 'pesan' => 'Data Sembako Berhasil Dihapus']);
        } else {
            echo json_encode(['status' => false, 'pesan' => 'Data Sembako Gagal Dihapus']);
        }
    }
}
