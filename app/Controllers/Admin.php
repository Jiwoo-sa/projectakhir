<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Admin extends BaseController
{
    public $adm = '';
    public function __construct()
    {
        $this->adm = new sampahmodel();
    }



    public function index()
    {
        $smp = $this->adm;

        $data = [
            'usern'  => $smp->getWhere('user', '*', ['hak_akses' =>  'admin'])->getResult()
        ];

        return view('master/admin', $data);
    }

    public function save($metode)
    {
        $send = [
            'nama'  => $this->request->getPost('namaLengkap'),
            'alamat'  => $this->request->getPost('alamat'),
            'no_hp'  => $this->request->getPost('noHp'),
            'jns_kelamin'  => $this->request->getPost('jenisKelamin'),
            'username'  => $this->request->getPost('username'),
            'hak_akses'  => 'admin',
            'saldo'  => 0,

        ];

        if ($metode == 'add') {

            $send['password'] = md5($this->request->getPost('password'));
            $simpan = $this->adm->insData('user', $send);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data User berhasil Disimpan']);
            } else {
                echo json_encode(['status' => false, 'pesan' => 'Data User gagal Disimpan']);
            }
        } else {
            $cek = $this->adm->getWhere('user', '*', ['id_user' => $this->request->getPost('id_user')])->getRow();
            if ($this->request->getPost('password') != $cek->password) {
                $send['password'] = md5($this->request->getPost('password'));
            }
            $simpan = $this->adm->upData('user', $send, ['id_user' => $this->request->getPost('id_user')]);
            if ($simpan) {
                echo json_encode(['status' => true, 'pesan' => 'Data User Berhasil Diedit']);
            } else {
                echo json_encode(['status' => true, 'pesan' => 'Data User Gagal Diedit']);
            }
        }
    }

    function edit($id_user)
    {
        $data = $this->adm->getWhere('user', '*', ['id_user' => $id_user])->getRow();
        echo json_encode($data);
    }

    function delete($id_user)
    {
        $hapus = $this->adm->delData('user', ['id_user' => $id_user]);
        if ($hapus) {
            echo json_encode(['status' => true, 'pesan' => 'Data User Berhasil Dihapus']);
        } else {
            echo json_encode(['status' => false, 'pesan' => 'Data User Gagal Dihapus']);
        }
    }
}
