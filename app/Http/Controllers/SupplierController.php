<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\IndProv;
use App\IndCity;
use App\Supplier;


class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.create')->with(['countries'=>Country::all()]);
    }

    public function get_province($id){
        $get = IndProv::where('country_id', $id)->pluck('name', 'id');
        return json_encode($get);
    }

    public function get_city($id){
        $get = IndCity::where('province_id', $id)->pluck('name', 'id');
        return json_encode($get);
    }

    public function edit($id){
        return view('supplier.edit')->with(['suplr'=>Supplier::find($id), 'countries'=>Country::all(), 'city'=>IndCity::all(), 'province'=>IndProv::all()]);
    }

    public function update(Request $request, $id){
        try{
            $s = Supplier::find($id);
            $s->name = $request->get('name');
            $s->address = $request->get('address');
            $s->country_id = $request->get('country_id');
            $s->province_id = $request->get('province_id');
            $s->city_id = $request->get('city_id');
            $s->phone = $request->get('phone');
            $s->email = $request->get('email');
            $s->save();
            
            return redirect()->route('master.supplier')->with('success', 'Data has been updated.');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function store(Request $request){
        try{
            $s = new Supplier();
            $s->name = $request->get('name');
            $s->address = $request->get('address');
            $s->country_id = $request->get('country_id');
            $s->province_id = $request->get('province_id');
            $s->city_id = $request->get('city_id');
            $s->phone = $request->get('phone');
            $s->email = $request->get('email');
            $s->save();
            return redirect()->route('master.supplier')->with('success', 'Data has been saved.');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function destroy($id){
        try{
            $sdel = Supplier::find($id);
            $sdel->delete();
            return redirect()->route('master.supplier.list')->with('success', 'Data has been delete.');
            // return response()->json([
            //     'success'=>'Data has been delete.'
            // ]);
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                // return response()->json([
                //     'warning'=>'Cant delete data ready in use.'
                // ]);
                return redirect()->route('master.supplier.list')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

    public function list(){
        return view('supplier.list')->with(['suppliers'=>Supplier::all()]);
    }
}
