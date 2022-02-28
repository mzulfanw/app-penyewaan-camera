<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;


class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->transaksi = new TransaksiModel();
        $this->session = session();
        $this->barang = new BarangModel();
        helper('number');
    }

    public function index()
    {
        $data = [
            'cart' => \Config\Services::cart(),
            'transaksi' => $this->transaksi->getTransaksiByUserId($this->session->get('id'))->getResult(),
            'barang' => $this->barang->cekStok()->getResult()
        ];
        return view('dashboard', $data);
    }
}
