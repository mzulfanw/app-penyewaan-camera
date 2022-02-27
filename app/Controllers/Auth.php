<?php

namespace App\Controllers;

use App\Models\AdminModel;


class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $users = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username, 'roles' => 'admin'
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username' => $dataUser['username'],
                    'name' => $dataUser['name'],
                    'logged_in' => TRUE,
                    'status' => 'admin'
                ]);
                return redirect()->to(base_url('/admin/dashboard'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/auth'));
    }
}
