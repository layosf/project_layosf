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
use App\WarehouseRM;
use App\WarehouseLocation;

class RMcontroller extends Controller
{
    public function index(){
        return view('rawmaterial.index')->with(['species'=>Species::all(), 'suppliers'=>Supplier::all(), 'category'=>Category::all(), 'grade'=>Grade::all(), 'users'=>User::all(), 'rawmaterials'=>RM::orderBy('created_at','desc')->get(), 'dimentions'=>Dimention::all(), 'locations'=>WarehouseLocation::all() ]);
    }

    public function list(){
        return view('rawmaterial.list')->with(['rawmaterials'=>RM::orderBy('created_at','desc')->get()]);
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
            $rm->to_warehouse = $request->get('to_warehouse');
            $rm->save();

            return redirect()->route('rm.index')->with('success', 'Data has been saved.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function edit($id){
        return view('rawmaterial.edit')->with(['rme'=>RM::find($id), 'species'=>Species::all(), 'suppliers'=>Supplier::all(), 'category'=>Category::all(), 'grade'=>Grade::all(), 'users'=>User::all(), 'dimentions'=>Dimention::all(), 'locations'=>WarehouseLocation::all() ]);
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
            $rm->itemproduct_id = null;
            $rm->approval_to = $request->get('approval_to');
            $rm->to_warehouse = $request->get('to_warehouse');
            $rm->save();

            return redirect()->route('rm.index')->with('success', 'Data has been update.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function warehouserm()
    {
        // dd(RM::where('status','1')->get());
        return view('rawmaterial.listwarehouserm')->with(['warehouserm'=>RM::where('status','1')->get()]);
    }

    public function delete($id){
        try{
            $rm = RM::find($id);
            // $wrm = WarehouseRM::findOrFail($rm->warehouse_rm_id);
            // $wrm->delete();
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
        $rm->reason_reject = null;
        $rm->save();

        //generate itemcode
        //format = SPECIES-CATEGORY-DIMENSI(TxWxL)-GRADE
        $species = Species::find($rm->species_id);
        $code_species = $species->autocode;

        $category = Category::find($rm->category_id);
        $code_category = $category->code;

        $inv_dim = Dimention::find($rm->invoice_dimention_id);
        $width = $inv_dim->width;
        $thick = $inv_dim->thick;
        $length = $inv_dim->length;

        $grade = Grade::find($rm->grade_id);
        $code_grade = $grade->name;

        $productcode = $code_species."-".$code_category."-".$thick."x".$width."x".$length."-".$code_grade;

        //cek
        $ip = Itemproduct::all();
        if(! $ip->isEmpty())
        {
            //tbl itemproduct ada
            //cek apakah sudah ada productcode tersebut di tbl itemproduct?
            $cek_ip = Itemproduct::where('productcode', $productcode)->get();
            if(count($cek_ip) > 0)
            {
                //artinya productcode tersebut udah ada
                foreach($cek_ip as $items)
                {
                    //update raw material
                    $rawmt = RM::find($id);
                    $rawmt->itemproduct_id = $items->id;

                    ////////update qty
                    $cek = WarehouseRM::where('itemproduct_id', $items->id)->get();
                    if(count($cek) > 0)
                    {
                        //udah ada
                        foreach($cek as $c)
                        {
                            $w = WarehouseRM::find($c->id);
                            // $w->itemproduct_id = $items->id;
                            $w->qty = $w->qty+$rawmt->pcs;
                            $w->save();
                        }
                        
                    }
                    else{
                        
                            $w = new WarehouseRM();
                            $w->itemproduct_id = $items->id;
                            $w->qty = $rawmt->pcs;
                            $w->save();
                        
                    }
                    // if($rawmt->warehouse_rm_id == null)
                    // {
                    //     $wrm = new WarehouseRM();
                    //     $wrm->save();
                    //     $lastIDwrm = $wrm->id;

                    //     $rawmt->warehouse_rm_id = $lastIDwrm;
                    //     $rawmt->save();
                    // }
                    // else
                    // {
                    //     $rawmt->save();
                    // }
                    $rawmt->save();
                    return redirect()->route('rm.list')->with('success', 'Data has been approve. Item Product '.$productcode);
                }
            }
            else
            {
                //productcode tersebut belum ada
                $item = new Itemproduct();
                $item->productcode = $productcode;
                $item->save();
                
                $insertedId = $item->id;

                //update raw material
                $rawm = RM::find($id);
                $rawm->itemproduct_id = $insertedId;
                // $rawm->save();

                $cek = WarehouseRM::where('itemproduct_id', $insertedId)->get();
                if(count($cek) > 0)
                {
                    //udah ada
                    foreach($cek as $c)
                    {
                        $w = WarehouseRM::find($c->id);
                        // $w->itemproduct_id = $insertedId;
                        $w->qty = $w->qty+$rawm->pcs;
                        $w->save();
                    }
                    
                }
                else{
                   
                        $w = new WarehouseRM();
                        $w->itemproduct_id = $insertedId;
                        $w->qty = $rawm->pcs;
                        $w->save();
                }

                $rawm->save();
                return redirect()->route('rm.list')->with('success', 'Data has been approve. Item Product '.$productcode);
            }
        }
        else
        {
            //tbl itemproduct kosong
            $items = new Itemproduct();
            $items->productcode = $productcode;
            $items->save();
            
            $inserted_id = $items->id;

            //update raw material
            $rawma = RM::find($id);
            $rawma->itemproduct_id = $inserted_id;
            

            $cek = WarehouseRM::where('itemproduct_id', $inserted_id)->get();
            
            if(count($cek) > 0)
            {
            //     //udah ada
                foreach($cek as $c)
                {
                    $w = WarehouseRM::find($c->id);
                    $w->qty = $w->qty + $rawma->pcs;
                    $w->save();
                }
                
            }
            else{
           
                    $w = new WarehouseRM();
                    $w->itemproduct_id = $inserted_id;
                    $w->qty = $rawma->pcs;
                    $w->save();
           
            }

            $rawma->save();

            return redirect()->route('rm.list')->with('success', 'Data has been approve. Item Product '.$productcode);
        }
    }

    // public function reject($id){
    //     $rm = RM::find($id);

    //     if($rm->itemproduct_id == null)
    //     {
    //         $rm->status = '2';
    //         $rm->reason_reject = 
    //         $rm->save();
    //     }
    //     else
    //     {
            
    //         $wrm = WarehouseRM::find($rm->warehouse_rm_id);
    //         $wrm->qty = $wrm->qty - $rm->pcs;
    //         $wrm->save();

    //         $rm->status = '2';
    //         $rm->save();
    //     }
        
    //     return redirect()->route('rm.list')->with('success', 'Data has been send reject.');
    // }

    public function get_reason($id){
        // $rm =RM::findOrFail($id);
        $rm = RM::find($id);
        return json_encode(array($id,$rm->reason_reject));
    }

    public function reasonreject(Request $request, $id){
   
        $rm = RM::find($id);


        if($rm->itemproduct_id == null)
        {
            $rm->status = '2';
            $rm->reason_reject = $request->get('reason_reject');
            $rm->save();
        }
        else
        {
            $wrm = WarehouseRM::where('itemproduct_id',$rm->itemproduct_id)->get();
            foreach($wrm as $w){
                $up = WarehouseRM::where('id', $w->id)->update(['qty' => $w->qty - $rm->pcs]);
                // dd($w);
            }
            
            $rm->itemproduct_id = null;
            $rm->reason_reject = $request->get('reason_reject');
            $rm->status = '2';
            $rm->save();
        }

        return response()->json([
            'success'=>'Data has been reject.'
        ]);
           
    }
}
