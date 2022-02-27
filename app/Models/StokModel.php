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
}
