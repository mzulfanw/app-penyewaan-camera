<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['barang_id', 'user_id', 'jumlah', 'total_harga', 'tanggal', 'status', 'payment_method', 'potoktp', 'pototf', 'tanggal_keluar'];

    public function getTransaksi()
    {
        $query = $this->db->table('transaksi')
            ->join('barang', 'transaksi.barang_id = barang.id')
            ->join('users', 'transaksi.user_id = users.id')
            ->select(['barang.nama_barang', '.users.name', 'transaksi.id', 'transaksi.jumlah', 'transaksi.total_harga', 'transaksi.tanggal', 'transaksi.status', 'transaksi.payment_method', 'transaksi.potoktp', 'transaksi.pototf', 'transaksi.tanggal_keluar'])
            ->get();

        return $query;
    }

    public function getTransaksiById($id)
    {
        $query = $this->db->table('transaksi')
            ->join('barang', 'transaksi.barang_id = barang.id')
            ->join('users', 'transaksi.user_id = users.id')
            ->select(['barang.nama_barang', '.users.name', 'transaksi.jumlah', 'transaksi.total_harga', 'transaksi.tanggal', 'transaksi.status', 'transaksi.payment_method', 'transaksi.potoktp', 'transaksi.pototf', 'transaksi.tanggal_keluar', 'transaksi.id'])
            ->where('transaksi.id', $id)
            ->get();

        return $query;
    }

    // take all transaksi by user_id
    public function getTransaksiByUserId($id)
    {
        $query = $this->db->table('transaksi')
            ->join('barang', 'transaksi.barang_id = barang.id')
            ->join('users', 'transaksi.user_id = users.id')
            ->select(['barang.nama_barang', '.users.name', 'transaksi.jumlah', 'transaksi.total_harga', 'transaksi.tanggal', 'transaksi.status', 'transaksi.payment_method', 'transaksi.potoktp', 'transaksi.pototf', 'transaksi.tanggal_keluar', 'transaksi.id'])
            ->where('transaksi.user_id', $id)
            ->get();

        return $query;
    }
}
