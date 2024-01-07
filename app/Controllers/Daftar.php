<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Daftar extends BaseController
{
    public $daf = '';
    public function __construct()
    {
        $this->daf = new sampahmodel();
    }



    public function index()
    {
        $nasah = $this->daf;

        $data = [
            'usernam'  => $nasah->getWhere('user', '*', ['hak_akses' =>  'user'])->getResult()
        ];

        return view('master/daftar', $data);
    }

    public function save($metode)
    {
        $send = [
            'nama'  => $this->request->getPost('nama1'),
            'alamat'  => $this->request->getPost('alamat1'),
            'no_hp'  => $this->request->getPost('noHp1'),
            'jns_kelamin'  => $this->request->getPost('jeniskelamin1'),
            'username'  => $this->request->getPost('username1'),

            'hak_akses'  => 'user',
            'saldo'  => 0,

        ];


        if ($metode == 'add') {

            $send['password'] = md5($this->request->getPost('password1'));
            $simpan = $this->daf->insData('user', $send);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data User berhasil Disimpan']);
            } else {
                echo json_encode(['status' => false, 'pesan' => 'Data User gagal Disimpan']);
            }
        } else {
            $cek = $this->daf->getWhere('user', '*', ['id_user' => $this->request->getPost('id_user')])->getRow();
            if ($this->request->getPost('password1') != $cek->password) {
                $send['password'] = md5($this->request->getPost('password1'));
            }
            $simpan = $this->daf->upData('user', $send, ['id_user' => $this->request->getPost('id_user')]);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data User Berhasil Diedit']);
            } else {
                echo json_encode(['status' => true, 'pesan' => 'Data User Gagal Diedit']);
            }
        }
    }
}
