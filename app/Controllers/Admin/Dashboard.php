<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/auth'));
        }
        $this->barang = new BarangModel();
        $this->user = new UserModel();
        $this->transaksi = new TransaksiModel();
    }

    public function index()
    {
        $data = [
            'barang' => $this->barang->countAll(),
            'user' => $this->user->countAll(),
            'transaksi' => $this->transaksi->countAll(),
        ];

        return view('admin/dashboard', $data);
    }
}
