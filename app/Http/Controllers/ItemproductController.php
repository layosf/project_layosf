<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Itemproduct;
use App\Species;
use App\Grade;
use App\Category;
use App\Dimention;

class ItemproductController extends Controller
{
    public function index(){

        $kodeproduk = DB::table('itemproduct')
                    ->leftJoin('rawmaterial', 'itemproduct.id', '=', 'rawmaterial.itemproduct_id')
                    ->leftJoin('species', 'rawmaterial.species_id', '=', 'species.id')
                    ->leftJoin('category', 'rawmaterial.category_id', '=', 'category.id')
                    ->leftJoin('grade', 'rawmaterial.grade_id', '=', 'grade.id')
                    ->leftJoin('dimention as idim', 'rawmaterial.invoice_dimention_id', '=', 'idim.id')
                    ->leftJoin('dimention as fdim', 'rawmaterial.phisic_dimention_id', '=', 'fdim.id')
                    ->select('itemproduct.id as idproduk','itemproduct.productcode','species.name as namaspecies','category.name as namacat','grade.name as namagrade',DB::raw("CONCAT(idim.thick,'x',idim.width,'x',idim.length) as invdimensi"),DB::raw("CONCAT(fdim.thick,'x',fdim.width,'x',fdim.length) as fisikdimensi"))
                    ->groupBy('itemproduct.id','itemproduct.productcode','species.name','category.name','grade.name','idim.thick','idim.width','idim.length','fdim.thick','fdim.width','fdim.length' )
                    ->get();


        return view('itemproduct.list')->with(['itemproduct'=>Itemproduct::all(),'listitems'=>$kodeproduk]);
    }
<<<<<<< HEAD
    
=======
>>>>>>> 9b093b8a53b49b0594bb62dc323cf9e5042d23d2
    public function list(){
        return view('itemproduct.list')->with(['itemproduct'=>Itemproduct::all(),'speciess'=>Species::all(),'grades'=>Grade::all(),'category'=>Category::all()]);
    }

    
}
