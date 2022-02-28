<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Users extends BaseController
{
    public function index()
    {
        $admin = new AdminModel();
        // get all data from user
        $data['admin'] = $admin->findAll();
        return view('Admin/Users/Index', $data);
    }

    public function add()
    {
        return view('Admin/Users/Add');
    }

    public function store()
    {

        $user = new AdminModel();
        $user->save([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('nama'),
            'roles' => 'admin',

        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/users');
    }


    public function edit($id)
    {
        $admin = new AdminModel();
        $data['admin'] = $admin->find($id);
        return view('Admin/Users/Edit', $data);
    }

    public function update($id)
    {
        $user = new AdminModel();
        $user->update($id, [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('nama'),
            'roles' => 'admin',
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/admin/users');
    }

    public function delete($id)
    {
        $admin = new AdminModel();
        $admin->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/admin/users');
    }
}
