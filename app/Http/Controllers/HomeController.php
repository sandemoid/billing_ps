<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->shareUserData();
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
