<?php


namespace App\Models;


use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_barang', 'harga', 'gambar', 'deskripsi', 'slug', 'kategori_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getBarangandKategori()
    {
        $query = $this->db->table('barang')
            ->join('kategori', 'barang.kategori_id = kategori.id')
            ->join('stok', 'barang.id = stok.barang_id')
            ->select(['barang.nama_barang', 'stok.stok',  'barang.id', 'barang.harga', 'barang.deskripsi', 'barang.slug as bslug', 'kategori.slug as kslug', 'barang.gambar', 'kategori.nama_kategori'])
            ->get();

        return $query;
    }
}
