<?php

namespace App\Controllers;

use App\Models\sampahmodel;

class Dashboard extends BaseController
{
    public $daf = '';
    public function __construct()
    {
        $this->daf = new sampahmodel();
    }



    public function index()
    {
        // $nasah = $this->daf;

        // $data = [];

        return view('dashboard');
    }
}
