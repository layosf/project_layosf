<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Language;

class LanguageController extends Controller
{
    

    public function index(Request $request, $id){
       
        // if($request->ajax())
        // {
            // $name = $request->get('lang');
            Language::truncate();
            Language::updateOrCreate([
                'language' => $id,
            ]);

            // return response()->json(['success'=>'done']);
            return response()->json([
                'success'=>$id
            ]);
        // }

    }
}
