<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/auth'));
        }
    }

    public function index()
    {
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();
        return view('admin/kategori/index', $data);
    }

    public function add()
    {
        return view('Admin/Kategori/Add');
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $kategori = new KategoriModel();
        $kategori->save([
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'slug' => url_title($this->request->getPost('nama_kategori'), '-', true),
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/kategori');
    }



    public function edit($id)
    {
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->find($id);
        return view('Admin/Kategori/Edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $kategori = new KategoriModel();
        $kategori->update($id, [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'slug' => url_title($this->request->getPost('nama_kategori'), '-', true),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/admin/kategori');
    }

    public function delete($id)
    {
        $kategori = new KategoriModel();
        $kategori->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/admin/kategori');
    }
}
