<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Awal extends BaseController
{
    public $awl = '';
    public function __construct()
    {
        $this->awl = new sampahmodel();
    }



    public function index()
    {

        $data = [
            'oke'   => $this->awl
        ];

        return view('storage/awal', $data);
    }
}
