<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('layoutapp.mainmenu');
    }

    public function dashboard(){
        return view('layoutapp.dashboard');
    }
}
