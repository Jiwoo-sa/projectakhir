<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Informasi extends BaseController
{
    public $info = '';
    public $sim = '';
    public function __construct()
    {
        $this->info = new sampahmodel();
        $this->sim = new sampahmodel();
    }



    public function index()
    {
        $inf = $this->info;

        $data = [

            'inf'    => $inf->getAll('informasi')->getRow(),
        ];

        return view('storage/informasi', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/Informasi')->withInput();
        }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto');
        //apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            //pindah kan fle ke img
            $fileFoto->move('img');
            //ambil nama filefoto
            $namaFoto = $fileFoto->getName();
        }

        $send = [
            'judul_informasi'  => $this->request->getPost('judul'),
            'isi_informasi'  => $this->request->getPost('isi'),
            'foto' => $namaFoto
        ];


        if ($this->request->getPost('id_informasi') == '' || $this->request->getPost('id_informasi') == NULL) {
            $simpan = $this->sim->insData('informasi', $send);
            if ($simpan) {
                $pop = [
                    'pesan' => 'Berhasil Di Update',
                    'status' => true
                ];
                session()->set($pop);
                return redirect()->to('/Informasi');
            } else {
                $pop = [
                    'pesan' => 'Gagal Di Update',
                    'status' => false
                ];
                session()->set($pop);
                return redirect()->to('/Informasi');
            }
        } else {
            $simpan = $this->sim->upData('informasi', $send, ['kode_informasi' => $this->request->getPost('id_informasi')]);
            if ($simpan) {
                $pop = [
                    'pesan' => 'Berhasil Di Update',
                    'status' => true
                ];
                session()->set($pop);
                return redirect()->to('/Informasi');
            } else {
                $pop = [
                    'pesan' => 'Gagal Di Update',
                    'status' => false
                ];
                session()->set($pop);
                return redirect()->to('/Informasi');
            }
        }
    }
}
