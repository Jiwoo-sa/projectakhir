<?php

namespace App\Controllers;

use App\Models\sampahmodel;


class Home extends BaseController
{
    public $hm = '';
    public function __construct()
    {
        $this->hm = new sampahmodel();
    }

    public function index()
    {
        $data = [
            'oke'    => $this->hm
        ];
        return view('home', $data);
    }
}
