<?php

namespace App\Controllers;

use App\Models\sampahmodel;


class L_pass extends BaseController
{
    public $pass = '';
    public function __construct()
    {
        $this->pass = new sampahmodel();
    }

    public function index()
    {
        $pw = $this->pass;

        $data = [
            'passw'  => $pw->getWhere('user', '*', ['hak_akses' =>  'user'])->getResult()
        ];

        return view('master/l_pass', $data);
    }

    public function edit()
    {
        $pw = $this->pass;
        $cek = $pw->getWhere('user', '*', ['username' => $this->request->getPost('username'), 'no_hp' => $this->request->getPost('no_hp')])->getRow();

        if ($cek) {
            $send['password'] = md5($this->request->getPost('password'));
            $simpan = $pw->upData('user', $send, ['id_user' => $cek->id_user]);
            if ($simpan) {
                return redirect()->to('/Login');
            } else {
                $pop = [
                    'pesan' => 'Data Pengguna Tidak Ditemukan',
                    'status' => 'gagal'
                ];
                session()->set($pop);
                return redirect()->to('/l_pass');
            }
        } else {
            $pop = [
                'pesan' => 'Data Pengguna Tidak Ditemukan',
                'status' => 'gagal'
            ];
            session()->set($pop);
            return redirect()->to('/l_pass');
        }
    }

    function update($id_user)
    {
        $data = $this->pw->getWhere('user', '*', ['id_user' => $id_user])->getRow();
        echo json_encode($data);
    }
}
