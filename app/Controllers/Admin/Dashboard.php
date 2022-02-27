<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/auth'));
        }
        $this->barang = new BarangModel();
    }

    public function index()
    {
        $data = [
            'barang' => $this->barang->countAll()
        ];

        return view('admin/dashboard', $data);
    }
}
