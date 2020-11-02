<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Species;
use App\Supplier;
use App\Category;

class RMcontroller extends Controller
{
    public function index(){
        return view('rawmaterial.index')->with(['species'=>Species::all(), 'suppliers'=>Supplier::all(), 'category'=>Category::all() ]);
    }
}
