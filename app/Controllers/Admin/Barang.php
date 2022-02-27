<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\KategoriModel;

class Barang extends BaseController
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
            'barang' => $this->barang->getBarangandKategori()->getResult()
        ];
        helper('number');
        return view('admin/barang/index', $data);
    }

    public function Add()
    {
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();
        return view('admin/barang/add', $data);
    }

    public function Store()
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $barang = new BarangModel();
        $dataBarang = $this->request->getFile('gambar');
        $namaFile = $dataBarang->getRandomName();
        $barang->insert([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'harga' => str_replace('.', '', $this->request->getPost('harga')),
            'gambar' => $namaFile,
            'deskripsi' => $this->request->getPost('deskripsi'),
            'slug' => url_title($this->request->getPost('nama_barang'), '-', true),
            'kategori_id' => $this->request->getPost('kategori_id')
        ]);
        $dataBarang->move('./admin/assets/img/barang/', $namaFile);
        session()->setFlashdata('success', 'Barang Berhasil di simpan');
        return redirect()->to(base_url('/admin/barang'));
    }


    public function edit($id)
    {
        $barang = new BarangModel();
        $data['barang'] = $barang->find($id);
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();
        return view('Admin/Barang/Edit', $data);
    }

    //   build a function to update data
    public function update($id)
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        // and update the data
        $barang = new BarangModel();
        $dataBarang = $this->request->getFile('gambar');
        $namaFile = $dataBarang->getRandomName();
        $barang->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'harga' => $this->request->getPost('harga'),
            'gambar' => $namaFile,
            'deskripsi' => $this->request->getPost('deskripsi'),
            'slug' => url_title($this->request->getPost('nama_barang'), '-', true),
            'kategori_id' => $this->request->getPost('kategori_id')
        ]);
        $dataBarang->move('./admin/assets/img/barang/', $namaFile);
        session()->setFlashdata('success', 'Barang Berhasil di simpan');
        return redirect()->to(base_url('/admin/barang'));
    }


    public function delete($id)
    {
        $barang = new BarangModel();
        $barang->delete($id);
        session()->setFlashdata('success', 'Barang Berhasil di Hapus');
        return redirect()->to(base_url('/admin/barang'));
    }
}
