<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->role_id == 1) {
            return view('backend.home');
        }
        if (auth()->user()->role_id == 2) {
            return view('pharmacist.home');
        }
        return redirect()->route('login');
    }
}
