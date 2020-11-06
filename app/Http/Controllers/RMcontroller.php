<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Species;
use App\Supplier;
use App\Category;
use App\Grade;
use App\RM;
use App\User;
use App\Itemproduct;
use App\Dimention;

class RMcontroller extends Controller
{
    public function index(){
        return view('rawmaterial.index')->with(['species'=>Species::all(), 'suppliers'=>Supplier::all(), 'category'=>Category::all(), 'grade'=>Grade::all(), 'users'=>User::all(), 'rawmaterials'=>RM::orderBy('created_at')->get(), 'dimentions'=>Dimention::all() ]);
    }

    public function list(){
        return view('rawmaterial.list')->with(['rawmaterials'=>RM::orderBy('created_at')->get()]);
    }

    public function store(Request $request){
        try{
            $rm = new RM();
            $rm->arrival_date = $request->get('arrival_date');
            $rm->partai = $request->get('partai');
            $rm->species_id = $request->get('species_id');
            $rm->category_id = $request->get('spec');
            $rm->supplier_id = $request->get('supplier_id');
            $rm->pcs = $request->get('pcs');
            $rm->m2 = $request->get('m2');
            $rm->m3 = $request->get('m3');
            $rm->grade_id = $request->get('grade_id');

            $rm->invoice_dimention_id = $request->get('invoice_dimention');
            $rm->phisic_dimention_id = $request->get('phisic_dimention');
            
            $rm->status = '3';
            $rm->approval_to = $request->get('approval_to');
            $rm->save();

            return redirect()->route('rm.index')->with('success', 'Data has been saved.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function edit($id){
        return view('rawmaterial.edit')->with(['rme'=>RM::find($id), 'species'=>Species::all(), 'suppliers'=>Supplier::all(), 'category'=>Category::all(), 'grade'=>Grade::all(), 'users'=>User::all(), 'dimentions'=>Dimention::all()]);
    }

    public function update($id, Request $request){
        try{
            $rm = RM::find($id);
            $rm->arrival_date = $request->get('arrival_date');
            $rm->partai = $request->get('partai');
            $rm->species_id = $request->get('species_id');
            $rm->category_id = $request->get('spec');
            $rm->supplier_id = $request->get('supplier_id');
            $rm->pcs = $request->get('pcs');
            $rm->m2 = $request->get('m2');
            $rm->m3 = $request->get('m3');
            $rm->grade_id = $request->get('grade_id');
            
            $rm->invoice_dimention_id = $request->get('invoice_dimention');
            $rm->phisic_dimention_id = $request->get('phisic_dimention');

            $rm->status = '3';
            $rm->approval_to = $request->get('approval_to');
            $rm->save();

            return redirect()->route('rm.index')->with('success', 'Data has been update.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function delete($id){
        try{
            $rm = RM::find($id);
            $rm->delete();
            return redirect()->route('rm.index')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('rm.index')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

    public function sendapproval($id){
        $rm = RM::find($id);
        $rm->status = '0';
        $rm->save();
        return redirect()->route('rm.index')->with('success', 'Data has been send for approval.');
    }

    public function approve($id){
        $rm = RM::find($id);
        $rm->status = '1';
        $rm->save();

        //generate itemcode/productcode
        $productcode = $rm->species_id."-".$rm->grade_id."-".$rm->size;
        dd($productcode);
        // $sp = Species::where('id',$rm->species_id)->pluck('');

        //cek dulu
        $ip = Itemproduct::all();

        return redirect()->route('rm.index')->with('success', 'Data has been approve.');
    }

    public function reject($id){
        $rm = RM::find($id);
        $rm->status = '2';
        $rm->save();
        return redirect()->route('rm.index')->with('success', 'Data has been send reject.');
    }
}
