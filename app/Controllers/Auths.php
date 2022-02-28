<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auths extends BaseController
{
    public function index()
    {
        $data = [
            'cart' => \Config\Services::cart()
        ];
        return view('Auths/register', $data);
    }

    public function register()
    {
        $users = new UserModel();
        $users->insert([
            'name' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nomer_handphone' => $this->request->getVar('nomer_handphone')
        ]);
    }

    public function login()
    {
        $data = [
            'cart' => \Config\Services::cart()
        ];
        return view('Auths/login', $data);
    }

    public function login_action()
    {
        $users = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'id' => $dataUser['id'],
                    'username' => $dataUser['username'],
                    'name' => $dataUser['name'],
                    'logged_in' => TRUE,
                    'pengguna' => TRUE
                ]);
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    public function logout_user()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
