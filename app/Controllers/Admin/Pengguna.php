<?php


// namespace Admin Controller
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Pengguna extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        // get all data from user
        $data['user'] = $user->findAll();

        return view('Admin/Pengguna/Index', $data);
    }



    // delete method
    public function delete($id)
    {
        $user = new UserModel();
        $user->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/admin/pengguna');
    }
}
