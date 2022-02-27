<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\StokModel;

class Stok extends BaseController
{
    public function __construct()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/auth'));
        }
        $this->stok = new StokModel();
    }

    public function index()
    {
        $data = [
            'stok' => $this->stok->getBarangandstok()->getResult()
        ];
        return view('admin/stok/index', $data);
    }

    public function add()
    {
        $barang = new BarangModel();
        $data['barang'] = $barang->findAll();
        return view('admin/stok/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'barang_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori harus diisi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Stok harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $stok = new StokModel();
        $stok->save([
            'barang_id' => $this->request->getVar('barang_id'),
            'stok' => $this->request->getVar('stok'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/stok');
    }

    public function edit($id)
    {
        $stok = new StokModel();
        $data['stok'] = $stok->find($id);
        return view('admin/stok/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Stok harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $stok = new StokModel();
        $stok->update($id, [
            'stok' => $this->request->getVar('stok'),
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/admin/stok');
    }


    public function delete($id)
    {
        $stok = new StokModel();
        $stok->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/admin/stok');
    }
}
