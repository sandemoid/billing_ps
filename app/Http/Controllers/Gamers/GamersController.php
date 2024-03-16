<?php

namespace App\Http\Controllers\Gamers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GamersController extends Controller
{
    public function __construct()
    {
        $this->shareUserData();
    }

    public function index()
    {
        return view('gamers.dashboard');
    }
}
