<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard'
        ];
        return view('pages/home', $data);
    }
}
