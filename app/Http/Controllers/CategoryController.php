<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('category.create');
    }

    public function list(){
        return view('category.index');
    }
}
