<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Login extends BaseController
{
    public $log = '';
    public function __construct()
    {
        $this->log = new sampahmodel();
    }

    public function index()
    {
        $log = $this->log;

        $data = [];
        return view('master/login', $data);
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        //  $password = md5($this->request->getPost('password'));
        $password = md5($this->request->getPost('password'));

        $cek = $this->log->getWhere('user', '*', ['username' => $username, 'password' => $password])->getRow();
        if (!$cek) {
            $pop = [
                'pesan' => 'Username Atau Password Salah',
                'status' => 'gagal'
            ];
            session()->set($pop);
            return redirect()->to('/Login');
        } else {
            $pop = [
                'id_user'   => $cek->id_user,
                'nama'      => $cek->nama,
                'saldo'     => $cek->saldo,
                'username'  => $cek->username,
                'hak_akses' => $cek->hak_akses
            ];
            session()->set($pop);
            if ($cek->hak_akses == 'admin') {
                return redirect()->to('/Home');
            } else {
                return redirect()->to('/Dashboard');
            }
        }
    }


    public function logout()
    {
        $array_items = ['id_user', 'nama', 'username', 'hak_akses'];
        session()->remove($array_items);
        return redirect()->to('/Login');
    }
}
