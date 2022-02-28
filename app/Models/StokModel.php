<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table = 'stok';
    protected $primaryKey = 'id';
    protected $allowedFields = ['barang_id', 'stok'];

    // getBarangandstok
    public function getBarangandstok()
    {
        $query = $this->db->table('stok')
            ->join('barang', 'stok.barang_id = barang.id')
            ->select(['barang.nama_barang', 'stok.stok', 'stok.id'])
            ->get();

        return $query;
    }

    public function getStok($id_barang)
    {
        $query = $this->db->table('stok')
            ->join('barang', 'stok.barang_id = barang.id')
            ->select(['barang.nama_barang', 'stok.stok', 'stok.id'])
            ->where('stok.barang_id', $id_barang)
            ->get();

        return $query;
    }


    // update stok barang by id barang
    public function updateStok($id_barang, $stok)
    {
        $query = $this->db->table('stok')
            ->set('stok', $stok)
            ->where('barang_id', $id_barang)
            ->update();

        return $query;
    }
}
