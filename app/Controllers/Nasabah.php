<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Nasabah extends BaseController
{
    public $nasa = '';
    public function __construct()
    {
        $this->nasa = new sampahmodel();
    }



    public function index()
    {
        $nasah = $this->nasa;

        $data = [
            'userna'  => $nasah->getWhere('user', '*', ['hak_akses' =>  'user'])->getResult()
        ];

        return view('master/nasabah', $data);
    }

    public function save($metode)
    {
        $send = [
            'nama'  => $this->request->getPost('namaLengkap'),
            'alamat'  => $this->request->getPost('alamat'),
            'no_hp'  => $this->request->getPost('noHp'),
            'jns_kelamin'  => $this->request->getPost('jenisKelamin'),
            'hak_akses'  => 'user',
            'saldo'  => 0,

        ];



        if ($metode == 'add') {
            $send['username'] = $this->request->getPost('username');
            $send['password'] = md5($this->request->getPost('password'));
            $simpan = $this->nasa->insData('user', $send);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data User berhasil Disimpan']);
            } else {
                echo json_encode(['status' => false, 'pesan' => 'Data User gagal Disimpan']);
            }
        } else {

            $simpan = $this->nasa->upData('user', $send, ['id_user' => $this->request->getPost('id_user')]);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data User Berhasil Diedit']);
            } else {
                echo json_encode(['status' => true, 'pesan' => 'Data User Gagal Diedit']);
            }
        }
    }

    function edit($id_user)
    {
        $data = $this->nasa->getWhere('user', '*', ['id_user' => $id_user])->getRow();
        echo json_encode($data);
    }

    function delete($id_user)
    {
        $delete = $this->nasa->delData('user', ['id_user' => $id_user]);
        if ($delete) {
            echo json_encode(['status' => true, 'pesan' => 'Data User Berhasil Dihapus']);
        } else {
            echo json_encode(['status' => false, 'pesan' => 'Data User Gagal Dihapus']);
        }
    }
}
