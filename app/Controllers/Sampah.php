<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Sampah extends BaseController
{
    public $smph = '';
    public function __construct()
    {
        $this->smph = new sampahmodel();
    }



    public function index()
    {
        $smp = $this->smph;

        $data = [
            'oke'   => $this->smph
        ];

        $data = [
            'sam'  => $smp->getWhere('data_sampah', '*', ['id_sampah'])->getResult()
        ];

        return view('storage/sampah', $data);
    }

    public function save($metode)
    {
        $send = [
            'nama_sampah'  => $this->request->getPost('namaSampah'),
            'jns_sampah'  => $this->request->getPost('jenissampah'),
            'harga'  => $this->request->getPost('harga'),

        ];
        if ($metode == 'add') {
            $simpan = $this->smph->insData('data_sampah', $send);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data Sampah berhasil Disimpan']);
            } else {
                echo json_encode(['status' => false, 'pesan' => 'Data Sampah gagal Disimpan']);
            }
        } else {
            $up = $this->smph->upData('data_sampah', $send, ['id_sampah' => $this->request->getPost('id_sampah')]);
            if ($up) {
                echo json_encode(['status' => true, 'pesan' => 'Data Sampah berhasil Diupdate']);
            } else {
                echo json_encode(['status' => false, 'pesan' => 'Data Sampah gagal Diupdate']);
            }
        }
    }


    function edit($id_sampah)
    {
        $data = $this->smph->getWhere('data_sampah', '*', ['id_sampah' => $id_sampah])->getRow();
        echo json_encode($data);
    }

    function delete($id_sampah)
    {
        $delete = $this->smph->delData('data_sampah', ['id_sampah' => $id_sampah]);
        if ($delete) {
            echo json_encode(['status' => true, 'pesan' => 'Data Sampah Berhasil Dihapus']);
        } else {
            echo json_encode(['status' => false, 'pesan' => 'Data Sampah Gagal Dihapus']);
        }
    }
}
