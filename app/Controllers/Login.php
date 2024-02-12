<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('vw_login');
    }
    public function process()
    {
        $tb_user = new \App\Models\UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $dataUser = $tb_user->where([
            'username' => $username,
        ])->first();

        if($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'nama' => $dataUser->nama,
                    'logged_in' => true
                ]); //halaman 157 (modul)
                return redirect()->to(base_url('kasir'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
            } else {
                session()->setFlashdata('error','Username & Password salah');
                return redirect()->back();
            }
        }
    }

    //username septiafd
    //password wulan26