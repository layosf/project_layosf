<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agreement;
use App\Species;
use App\Category;
use App\Supplier;
use App\Company;
use App\IndProv;
use App\IndCity;
use Illuminate\Support\Facades\DB;

class AgreementController extends Controller
{
    public function index(){
        return view('agreement-supplier.index')->with(['speciess'=>Species::all(), 'category'=>Category::all(), 'suppliers'=>Supplier::all(), 'companies'=>Company::where('code','LYSF')->get()[0], 'province'=>IndProv::all(), 'cities'=>IndCity::all() ]);
    }

    public function store(Request $request){

    }

    public function get_infosupplier($id){
        
        $get = DB::table('supplier as s')
                ->leftJoin('bank_account as b', 'b.id', '=', 's.bankaccount_id')
                ->leftJoin('bank', 'bank.id', '=', 'b.bank_id')
                ->leftJoin('indonesia_cities as c', 'c.id', '=', 's.city_id')
                ->leftJoin('indonesia_provinces as p', 'p.id', '=','s.province_id')
                ->select('s.name','s.address', 'c.name as cityname', 'p.name as provname', 'bank.namebank', 'b.accountname', 'b.accountno')
                ->where('s.id', $id)
                ->get();
        foreach($get as $g)
        {
            return json_encode(array($g->name, $g->address, $g->cityname, $g->namebank, $g->accountno, $g->accountname));
        }
    }
}
