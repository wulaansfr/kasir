<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function admin(): string
    {
        return view('layout/admin');
    }

    public function kasir(): string
    {
        return view('layout/kasir');
    }
}
