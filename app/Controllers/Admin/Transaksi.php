<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;




class Transaksi extends BaseController
{
    protected $transaksi;
    public function __construct()
    {
        $this->transaksi = new TransaksiModel();
    }
    public function index()
    {
        $data =  [
            'transaksi' => $this->transaksi->getTransaksi()->getResult()
        ];

        return view('Admin/Transaksi/Index', $data);
    }

    public function cetak()
    {
        $dompdf = new \Dompdf\Dompdf();
        $data =  $this->transaksi->getTransaksi()->getResult();
        $dompdf->loadHtml(view('Admin/pdf/Invoice', ['transaksi' => $data]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporan');
    }

    public function view($id)
    {
        $data =  [
            'transaksi' => $this->transaksi->getTransaksiById($id)->getRow()
        ];
        return view('Admin/Transaksi/View', [
            'transaksi' => $data['transaksi']
        ]);
    }

    public function update($id)
    {
        $data = $this->transaksi;

        $data->update($id, [
            'status' => $this->request->getPost('status'),
            'tanggal_keluar' => $this->request->getPost('tanggal')
        ]);

        session()->setFlashdata('success', 'Berhasil mengubah status transaksi');
        return redirect()->to(base_url('/admin/transaksi'));
    }
}
