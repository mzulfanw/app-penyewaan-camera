<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Home extends BaseController
{
    protected $barang;

    public function __construct()
    {
        $this->barang = new BarangModel();
        helper(['form', 'number']);
    }
    public function index()
    {
        $data = [
            'cart' => \Config\Services::cart(),
        ];
        return view('welcome_message', $data);
    }
}
